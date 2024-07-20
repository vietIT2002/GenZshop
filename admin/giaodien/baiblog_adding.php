<?php
$danhmucbaiviet = mysqli_query($con, "SELECT * FROM `danhmucbaiviet`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài blog </title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
    <style>

/**/ 
        .btnLuu {
            margin-top: 20px;
            width: 100%;
            padding: 10px 20px;
        }

        .wrap-field {
            margin-top: 10px;
            width: 100%;

        }

        img {
        max-width: 250px;
        max-height: 150px;
        margin-top: 10px;
        }

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 110px;
        }
    </style>
</head>

<body>
<!-- <input type="file" id="fileInput" accept="image/*">
    <br>
    <img id="imageDisplay" src="#" alt="Ảnh của bạn">
     -->
   


    <br> 
    <br>
    <h1>Thêm bài blog</h1> <br>
    <div class="box-contentt">
        <form name="baiblog-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
           
            
            <div class="row">
                <div class="wrap-field form-group ">
                    <div class="row">
                        <div class="col-sm-4">
                                
                                <div class="col-sm-12">
                                    <!-- <label class="col-sm-4 col-form-label">Ảnh đại diện:   </label> -->
                                    <div class="col-sm-12">
                                    <img style="width: 250px;height: 150px;" id="imageDisplay" src="#" alt="Ảnh bài viết">
                                        <input  class="form-control" type="file" name="image"  id="fileInput" accept="image/*">
                                    </div>
                                
                                </div>
                        
                        </div>
                        <div class="col-sm-8">
                            <div class="wrap-field form-group row">
                            
                                <label class="col-sm-4 col-form-label">ID bài blog1: </label>
                                <div class="col-sm-8">
                                    <input  class="form-control" type="text" name="id_baiblog" value="" />
                                </div>
                            </div>
                            <div class="wrap-field form-group row">
                                <label class="col-sm-4 col-form-label">Tên bài blog: </label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="tenbaiblog" value="" />
                                </div>
                            </div>
                            <div class="wrap-field form-group row">
                                <label class="col-sm-4 col-form-label">Danh mục blog: </label>
                                            <div class="col-sm-8">
                                            <select class="form-control form-control-lg"  name="id_danhmucbv"><?php while ($row = mysqli_fetch_array($danhmucbaiviet)) { ?><option value="<?= $row['id_danhmucbv'] ?>"><?= $row['id_danhmucbv'] ?> - <?= $row['tendanhmucbv'] ?></option><?php } ?></select>
                                            </div>
                            </div>
                            

                                
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                    <div class="wrap-field form-group">
                        <label class="col-sm-2 col-form-label">Tóm tắt bài blog: </label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="tomtat" id="tomtat" rows="4"></textarea>
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="wrap-field form-group">
                        <label class="col-sm-2 col-form-label">Nội dung bài blog: </label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="noidungblog" id="noidungblog" rows="10"></textarea>
                        </div>
                    </div>
            </div>
            <center>
                        <button class="btn btn-danger btnLuu" name="btnaddblog" type="submit"title="Lưu bài viết" value="Thêm">Thêm </button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">Hủy</button>
              
            </center>
            <!-- <input class="btn btn-success btnLuu" name="btnadd" type="submit" title="Lưu sản phẩm" value="Lưu" /> -->
        </form>
        <div class="clear-both"></div>

    </div>

    <script>
        const fileInput = document.getElementById('fileInput');
        const imageDisplay = document.getElementById('imageDisplay');
        
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                imageDisplay.src = e.target.result;
            }
            
            reader.readAsDataURL(file);
        });


        function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var imageDisplay = event.target.parentElement.querySelector('img');
            imageDisplay.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        input.addEventListener('change', previewImage);
    });
        </script>

        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
        <script src="ckeditor/ckeditor.js"> </script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#noidungblog'),{
                    simpleUpload:
                    {
                        // uploadUrl: 'fileupload.php'
                    }
                } )
                .then(editor =>{
                    window.editor = editor;
                })
                .catch( error => {
                    console.error( error.stack );
                } );
            ClassicEditor
                .create( document.querySelector( '#tomtat' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
</body>

</html>