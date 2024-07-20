<?php
if (!empty($_GET['id_baiblog'])) {
    // $result = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `sanpham`.`id`=".$_GET['id']."");
    //$result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noi_dung`, `id_the_loai`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`,`theloai`.`id`,`theloai`.`ten_tl`,`nhacungcap`.`id`,`nhacungcap`.`ten_ncc` FROM `sanpham`,`theloai`,`nhacungcap` WHERE `sanpham`.`id`=" . $_GET['id'] . " AND `sanpham`.`id_the_loai`=`theloai`.`id` AND `sanpham`.`id_nha_cc`=`nhacungcap`.`id`");
    //$result = mysqli_query($con, "SELECT `baiblog`.`id_baiblog`, `tenbaiblog`, `tomtat`, `hinh_anh`, `noidungblog`, `id_danhmucbv`, `luotxem`, `baiblog`.`ngaydang`, `trangthai`, `danhmucbaiviet`.`id_danhmucbv`, `danhmucbaiviet`.`tendanhmucbv` FROM `baiblog`, `danhmucbaiviet` WHERE `baiblog`.`id_baiblog`=" . $_GET['id_baiblog'] . " AND `baiblog`.`id_danhmucbv`=`danhmucbaiviet`.`id_danhmucbv`");
    //$result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `NoiDungChiTiet`, `id_the_loai`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`,`gia_goc`, `theloai`.`id`, `theloai`.`ten_tl` FROM `sanpham`, `theloai` WHERE `sanpham`.`id`=" . $_GET['id'] . " AND `sanpham`.`id_the_loai`=`theloai`.`id`");
    // $result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noidungchitiet`, `id_the_loai`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`, `theloai`.`id`, `theloai`.`ten_tl` FROM `sanpham`, `theloai` WHERE `sanpham`.`id`=" . $_GET['id'] . " AND `sanpham`.`id_the_loai`=`theloai`.`id`");
    $result = mysqli_query($con, "SELECT `baiblog`.`id_baiblog`, `tenbaiblog`, `tomtat`, `hinh_anh`, `noidungblog`, `baiblog`.`id_danhmucbv`, `luotxem`, `baiblog`.`ngaydang`, `trangthai`, `danhmucbaiviet`.`tendanhmucbv` 
                              FROM `baiblog`, `danhmucbaiviet` 
                              WHERE `baiblog`.`id_baiblog`=" . $_GET['id_baiblog'] . " 
                              AND `baiblog`.`id_danhmucbv`=`danhmucbaiviet`.`id_danhmucbv`");


    $baiblog = $result->fetch_assoc();
}

$theloai = mysqli_query($con, "SELECT * FROM `danhmucbaiviet`");
// $nhacungcap = mysqli_query($con, "SELECT * FROM `nhacungcap`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        max-width: 250px;
        max-height: 200px;
        margin-top: 10px;}
        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 110px;
        }
    </style>
</head>

<body>
    <br>
<h1>SỬA BÀI BLOG</h1>
<tr>
               
   <div class="box-contentt">
   
   <form  name="baiblog-formsua" method="POST" action="./xulythem.php?act=suablog&id_baiblog=<?= $_GET['id_baiblog'] ?>" enctype="multipart/form-data">
   <div class="clear-both"></div>
            
            
            <div class="row">
                <div class="wrap-field form-group ">
                    <div class="row">
                        <div class="col-sm-4">
                                
                                <div class="col-sm-12">
                                    <!-- <label class="col-sm-4 col-form-label">Ảnh đại diện:   </label> -->
                                    <div class="col-sm-12">
                                    <?php if (!empty($baiblog['hinh_anh'])) { ?>
                                    <img style="width: 250px;height: 200px;" id="imageDisplay"  src="../img/<?= $baiblog['hinh_anh'] ?>" /><br />
                                    <input class="form-control" id="fileInput" accept="image/*" type="hidden" name="image" value="<?= $baiblog['hinh_anh'] ?>" /> 
                                <?php } ?>
                                <input class="form-control" type="file" name="image" />
                                 </div>
                                
                            </div>
                        
                        </div>
                        <div class="col-sm-8">
                                <div class="wrap-field form-group row ">
                                    <label class="col-sm-4 col-form-label">ID bài blog:</label>
                                        <div class="col-sm-8">
                                        <input  class="form-control" type="text" name="id_baiblog" value="<?= $_GET['id_baiblog'] ?>" />  
                                        
                                        </div>
                                </div>
                                <div class="wrap-field form-group row ">
                                    <label class="col-sm-4 col-form-label">Tên bài blog:</label>
                                        <div class="col-sm-8">
                                        <input class="form-control" type="text" name="tenbaiblog" value="<?= (!empty($baiblog) ? $baiblog['tenbaiblog'] : "") ?>" />
                                        </div>
                                </div>
                                <div class="wrap-field form-group row ">
                                    <label class="col-sm-4 col-form-label">Danh mục bài viết: </label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-lg" name="id_danhmucbv">
                                                <option value="<?= $baiblog['id_danhmucbv'] ?>"><?= $baiblog['id_danhmucbv'] ?> - <?= $baiblog['tendanhmucbv'] ?></option>
                                                    <?php
                                                        while ($row = mysqli_fetch_array($theloai)) {
                                                        ?>
                                                            <option value="<?= $row['id_danhmucbv'] ?>">
                                                                <?= $row['id_danhmucbv'] ?> - <?= $row['tendanhmucbv'] ?>
                                                            </option>
                                                        <?php
                                                } ?>
                                            </select>    
                                        
                                        </div>
                                </div>
                                <!-- <div class="wrap-field form-group row ">
                                <label class="col-sm-4 col-form-label">Trạng thái: </label>
                                            <div class="col-sm-8">
                                            <input type="checkbox" name="trangthai" value="<?= $baiblog['trangthai'] ?>" <?php if ($baiblog['trangthai'] == '0') echo "checked" ?> />
                     
                                            </div>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="wrap-field form-group">
                    <label class="col-sm-2 col-form-label">Tóm tắt bài blog: </label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="tomtat" id="tomtat" rows="4"<?= (!empty( $baiblog) ?  $baiblog['tomtat'] : "") ?>></textarea>
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="wrap-field form-group">
                        <label class="col-sm-2 col-form-label">Nội dung bài blog: </label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="noidungblog" id="noidungblog" rows="10"<?= (!empty( $baiblog) ?  $baiblog['noidungblog'] : "") ?>></textarea>
                        </div>
                    </div>
            </div>
            
            <center>
                        <button class="btn btn-danger btnLuu" name="btnsuablog" type="submit"title="Lưu sản phẩm" value="Thêm">CẬP NHẬT</button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">HỦY</button>
              
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