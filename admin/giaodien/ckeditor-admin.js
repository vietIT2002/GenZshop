(function () {
    class GenzshopUploadAdapter {
        constructor(loader) {
            this.loader = loader;
            this.xhr = null;
        }

        upload() {
            return this.loader.file.then(file => new Promise((resolve, reject) => {
                const data = new FormData();
                data.append('upload', file);

                this.xhr = new XMLHttpRequest();
                this.xhr.open('POST', 'giaodien/fileupload.php', true);
                this.xhr.responseType = 'json';

                this.xhr.addEventListener('load', () => {
                    const response = this.xhr.response;

                    if (!response || response.error) {
                        const message = response && response.error && response.error.message
                            ? response.error.message
                            : 'Không thể tải ảnh lên.';
                        reject(message);
                        return;
                    }

                    resolve({ default: response.url });
                });

                this.xhr.addEventListener('error', () => reject('Không thể kết nối server upload ảnh.'));
                this.xhr.addEventListener('abort', () => reject('Upload ảnh đã bị hủy.'));
                this.xhr.send(data);
            }));
        }

        abort() {
            if (this.xhr) {
                this.xhr.abort();
            }
        }
    }

    function GenzshopUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = loader => new GenzshopUploadAdapter(loader);
    }

    window.createGenzshopEditor = function (selector) {
        const element = document.querySelector(selector);
        if (!element || !window.ClassicEditor) {
            return Promise.resolve(null);
        }

        return ClassicEditor.create(element, {
            extraPlugins: [GenzshopUploadAdapterPlugin],
            toolbar: {
                items: [
                    'undo', 'redo', '|',
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'uploadImage', 'insertTable', 'blockQuote', 'mediaEmbed', '|',
                    'bulletedList', 'numberedList', 'outdent', 'indent'
                ]
            },
            image: {
                toolbar: [
                    'imageTextAlternative', 'toggleImageCaption', '|',
                    'imageStyle:inline', 'imageStyle:block', 'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
            }
        }).then(editor => {
            window.genzshopEditors = window.genzshopEditors || {};
            window.genzshopEditors[selector] = editor;
            return editor;
        }).catch(error => {
            console.error(error);
            return null;
        });
    };
}());