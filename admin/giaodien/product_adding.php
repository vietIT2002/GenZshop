<!-- if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['idtl']) && !empty($_POST['idtl']) && isset($_POST['idncc']) && !empty($_POST['idncc'])) {
$sql = "INSERT INTO `sanpham` (`id`, `ten_sp`, `hinh_anh`, `don_gia`, `noi_dung`, `ngay_tao`, `ngay_sua`,`so_luong`,`id_the_loai`,`id_nha_cc`) VALUES (NULL, '" . $_POST['name'] . "','" . $image . "', " . str_replace('.', '', $_POST['price']) . ", '" . $_POST['content'] . "', " . time() . ", " . time() . ",0,'" . $_POST['idtl'] . "','" . $_POST['idncc'] . "');";
    
-->

<?php
$theloai = mysqli_query($con, "SELECT * FROM `theloai`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên </title>
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
        max-width: 120px;
        max-height: 100px;
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
    <h1>Thêm sản phẩm</h1> <br>
    <div class="box-contentt">
        <form name="product-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
            <div class="clear-both"></div>
            <div class="row">
                    <div class="wrap-field form-group">
                        <label class="col-sm-2 col-form-label">ID sản phẩm: </label>
                            <div class="col-sm-4">
                                <input  class="form-control" type="text" name="id" value="" />
                            </div>
                        <label class="col-sm-2 col-form-label">Tên sản phẩm: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="name" value="" />
                            </div>
                    </div>
            </div>
            
          
            <div class="row">
                    <div class="wrap-field form-group">
                        <label class="col-sm-2 col-form-label">Giá gốc:  </label>
                            <div class="col-sm-4">
                                <input  class="form-control" type="number" name="gia_goc" value="" />
                            </div>
                        <label class="col-sm-2 col-form-label">Giá bán: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="number" name="don_gia" value="" />
                            </div>
                    </div>

            </div>
            
            <div class="row">
                <div class="wrap-field form-group ">
                    <div class="row">
                        <div class="col-sm-6">
                                
                                <div class="col-sm-12">
                                    <label class="col-sm-4 col-form-label">Ảnh đại diện:   </label>
                                    <div class="col-sm-8">
                                    <img style="width: 120px;height: 100px;" id="imageDisplay" src="#" alt="Ảnh sản phẩm">
                                        <input  class="form-control" type="file" name="image"  id="fileInput" accept="image/*">
                                    </div>
                                
                                </div>
                        
                        </div>
                        <div class="col-sm-6">

                                <div class="wrap-field form-group row ">
                                <label class="col-sm-4 col-form-label">Thể loại: </label>
                                            <div class="col-sm-8">
                                            <select  class="form-control" name="idtl"><?php while ($row = mysqli_fetch_array($theloai)) { ?><option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_tl'] ?></option><?php } ?></select>
                                            </div>
                                        </div>
                                <div class="wrap-field form-group row">
                                <label class="col-sm-4 col-form-label">Số lượng:  </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="so_luong" value="" />
                                            </div>
                                
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                        <div class="wrap-field form-group">
                            

                                <label class="col-sm-2 col-form-label">Thư viện ảnh: </label>
                            <div class="col-sm-3">
                              
                                <img style="width: 120px;height: 100px;" id="imageDisplay" src="#" alt="Ảnh sản phẩm">
                                <input class="form-control" multiple="" type="file" name="gallery[]" id="fileInput" accept="image/*"/>
                               
                            </div>
                            <div class="col-sm-3">
                                
                                <img style="width: 120px;height: 100px;" id="imageDisplay" src="#" alt="Ảnh sản phẩm">
                                <input class="form-control" multiple="" type="file" name="gallery[]" id="fileInput" accept="image/*"/>
                               
                            </div>
                            <div class="col-sm-3">
                               
                                <img style="width: 120px;height: 100px;" id="imageDisplay" src="#" alt="Ảnh sản phẩm">
                                <input class="form-control" multiple="" type="file" name="gallery[]"id="fileInput" accept="image/*" />
                            </div>
                        </div>
            </div>
            <div class="row">
                    <div class="wrap-field form-group">
                        <label class="col-sm-2 col-form-label">Nội dung: </label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="content" id="product-content" rows="5"></textarea>
                        </div>
                    </div>
            </div>
            <center>
                        <button class="btn btn-danger btnLuu" name="btnadd" type="submit"title="Lưu sản phẩm" value="Thêm">Thêm </button>
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

</body>

</html>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#product-content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
