<?php
if (!empty($_GET['id'])) {
    // $result = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `sanpham`.`id`=".$_GET['id']."");
    //$result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noi_dung`, `id_the_loai`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`,`theloai`.`id`,`theloai`.`ten_tl`,`nhacungcap`.`id`,`nhacungcap`.`ten_ncc` FROM `sanpham`,`theloai`,`nhacungcap` WHERE `sanpham`.`id`=" . $_GET['id'] . " AND `sanpham`.`id_the_loai`=`theloai`.`id` AND `sanpham`.`id_nha_cc`=`nhacungcap`.`id`");
    $result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `NoiDungChiTiet`, `id_the_loai`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`,`gia_goc`, `theloai`.`id`, `theloai`.`ten_tl` FROM `sanpham`, `theloai` WHERE `sanpham`.`id`=" . $_GET['id'] . " AND `sanpham`.`id_the_loai`=`theloai`.`id`");
    
    // $result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noidungchitiet`, `id_the_loai`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`, `theloai`.`id`, `theloai`.`ten_tl` FROM `sanpham`, `theloai` WHERE `sanpham`.`id`=" . $_GET['id'] . " AND `sanpham`.`id_the_loai`=`theloai`.`id`");
   
    $product = $result->fetch_assoc();
    $gallery = mysqli_query($con, "SELECT * FROM `hinhanhsp` WHERE `id_sp` = " . $_GET['id']);
    if (!empty($gallery) && !empty($gallery->num_rows)) {
        while ($row = mysqli_fetch_array($gallery)) {
            $product['gallery'][] = array(
                'id' => $row['id'],
                'path' => $row['hinh_anh']
            );
        }
    }
}

$theloai = mysqli_query($con, "SELECT * FROM `theloai`");
// $nhacungcap = mysqli_query($con, "SELECT * FROM `nhacungcap`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
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
        margin-top: 10px;}
        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 110px;
        }
    </style>
</head>

<body>
<h1>Sửa sản phẩm</h1>
<tr>
               
   <div class="box-contentt">
   
   <form  name="product-formsua" method="POST" action="./xulythem.php?act=sua&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
   <div class="clear-both"></div>
            <div class="row">
                    <div class="wrap-field form-group">
                    <label class="col-sm-2 col-form-label">ID sản phẩm: </label>
                            <div class="col-sm-4">
                                <input  class="form-control" type="text" name="id" value="<?= $_GET['id'] ?>" />
                            </div>
                            <label class="col-sm-2 col-form-label">Tên sản phẩm: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="name" value="<?= (!empty($product) ? $product['ten_sp'] : "") ?>" />
                            </div>
                    </div>
            </div>
            
          
            <div class="row">
                    <div class="wrap-field form-group">
                        <label class="col-sm-2 col-form-label">Giá gốc:  </label>
                            <div class="col-sm-4">
                                <input  class="form-control" type="number" name="gia_goc" value="<?=(!empty($product)?number_format($product['gia_goc'], 0, ",", ".") : "") ?>" />
                            </div>
                        <label class="col-sm-2 col-form-label">Giá bán: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="number" name="don_gia" value="<?= (!empty($product) ? number_format($product['don_gia'], 0, ",", ".") : "") ?>" />
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
                                    <?php if (!empty($product['hinh_anh'])) { ?>
                                    <img style="width: 120px;height: 100px;" id="imageDisplay"  src="../img/<?= $product['hinh_anh'] ?>" /><br />
                                    <input class="form-control" id="fileInput" accept="image/*" type="hidden" name="image" value="<?= $product['hinh_anh'] ?>" /> 
                                <?php } ?>
                                <input class="form-control" type="file" name="image" />
                                 </div>
                                
                            </div>
                        
                        </div>
                        <div class="col-sm-6">

                                <div class="wrap-field form-group row ">
                                <label class="col-sm-4 col-form-label">Thể loại: </label>
                                            <div class="col-sm-8">
                                            <select class="form-control form-control-lg" name="idtl">
                            <option value="<?= $product['id_the_loai'] ?>"><?= $product['id_the_loai'] ?> - <?= $product['ten_tl'] ?></option>
                                 <?php
                                    while ($row = mysqli_fetch_array($theloai)) {
                                    ?>
                                        <option value="<?= $row['id'] ?>">
                                            <?= $row['id'] ?> - <?= $row['ten_tl'] ?>
                                        </option>
                                    <?php
                            } ?>
                        </select>    
                                        
                                        </div>
                                        </div>
                                <div class="wrap-field form-group row">
                                <label class="col-sm-4 col-form-label">Số lượng:  </label>
                                            <div class="col-sm-8">
                                            <input class="form-control" type="text" name="so_luong" value="<?= (!empty($product) ? $product['so_luong'] : "") ?>" />
                                            </div>
                                
                                </div>
                                
                                <!-- <div class="wrap-field form-group row ">
                                <label class="col-sm-4 col-form-label">Trạng thái: </label>
                                            <div class="col-sm-8">
                                            
                                            <input type="checkbox" name="trangthai" value="on" <?php if ($product['trangthai'] == 0 ) echo "checked" ?>>
                                            <input type="checkbox" name="trangthai" value="off" <?php if ($product['trangthai'] == 1 ) echo "checked" ?>>
                                                
                                        </div>
                                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="wrap-field form-group">
                
                 
                
                <label class="col-sm-2 col-form-label">Thư viện ảnh: </label>
                    <div class="col-sm-10" >
                        <?php if (!empty($product['gallery'])) { ?>
                            <ul>
                                <?php foreach ($product['gallery'] as $image) {
                                    if ($image['path'] != '') { ?>
                                        <li style="display: inline-block;">
                                            <img style="width: 120px;height: 100px;" src="../img/<?= $image['path'] ?>" />
                                            <a href="./admin.php?act=gallery_delete&id=<?= $image['id'] ?>">Xóa</a>
                                        </li>
                                <?php }
                                } ?>
                            </ul>
                        <?php } ?>
                        <?php if (isset($_GET['task']) && !empty($product['gallery'])) { ?>
                            <?php foreach ($product['gallery'] as $image) {
                                 if ($image['path'] != '') { ?>
                                 <li style="display: inline-block;">
                                        <img style="width: 120px;height: 100px;" id="imageDisplay"  src="../img/<?= $image['path'] ?>" />
                                        <input class="form-control" id="fileInput" accept="image/*" multiple="" type="hidden" name="gallery_image[]" value="<?= $image['path'] ?>" />
                                </li>
                            <?php } ?>
                        <?php } ?>
                    
                        <?php } ?>
                             <input class="form-control" multiple="" type="file" name="gallery[]" />
                       
                     </div>
            </div>
            </div>
            <div class="row">
                    <div class="wrap-field form-group">
                        <label class="col-sm-2 col-form-label">Nội dung: </label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="content" id="product-content" rows="5"<?= (!empty($product) ? $product['NoiDungChiTiet'] : "") ?>></textarea>
                        </div>
                    </div>
            </div>
            <center>
                        <button class="btn btn-danger btnLuu" name="btnsua" type="submit"title="Lưu sản phẩm" value="Thêm">Cập nhật </button>
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

