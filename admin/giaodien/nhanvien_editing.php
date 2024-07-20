

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     .btnLuu {
            margin-top: 10px;
            width: 95%;
            padding: 10px 20px;
        }

        .wrap-field {
            margin-top: 10px;
            width: 100%;

        }    
        img {
        max-width: 300px;
        max-height: 300px;
        margin-top: 10px;}
        
        #togglePasswordButton {
            cursor: pointer; 
        } 
    </style>
   
</head>
<body>
<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `nhanvien` WHERE `id` = " . $_GET['id']);
    $nhanvien = $result->fetch_assoc();
    $tk=mysqli_query($con,"SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap`FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");

}
?>


   
            <div>
                    <center>
                    <br> <br>
                    <h2>Sửa Nhân Viên</h2> 
                    </center>
            </div>
            <div class="box-contentt">
   
            <form name="nhanvien-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">    
           <div class="wrap-field form-group">
               <div class="row">
                   <div class="col-sm-5">
                         
                               <div class="col-sm-12">

                                        <?php if (!empty($nhanvien['hinh_anh'])) { ?>
                                            <img style="width: 300px;height: 300px;" id="imageDisplay" src="../img/<?= $nhanvien['hinh_anh'] ?>" alt="Ảnh đại diện" /><br />
                                            <?php } ?>
                                            <input class="form-control" type="file" name="image"  id="fileInput" accept="image/*" value="<?= $nhanvien['hinh_anh'] ?>" /> 
                                       
                                          </div>
                   
                   </div>
                   <div class="col-sm-7">

                           <div class="wrap-field form-group row">
                           <label class="col-sm-4 col-form-label">ID Nhân viên: </label>
                               <div class="col-sm-8">
                                    <input  class="form-control form-control-sm" type="text" name="id" value="<?= $_GET['id'] ?>" />
                               </div>
                           </div>
                           <div class="wrap-field form-group row">
                           <label class="col-sm-4 col-form-label">Tên Nhân viên: </label>
                               <div class="col-sm-8">
                                   <input  class="form-control form-control-sm"  type="text" name="name" value="<?= (!empty($nhanvien) ? $nhanvien['ten_nv'] : "") ?>" />
                               </div>
                           </div>
                           <div class="wrap-field form-group row">
                           <label class="col-sm-4 col-form-label" for="chucvu">Chức vụ: </label>
                               <div class="col-sm-8">
                               <select class="form-control form-control-lg" name="chuc_vu" id="chucvu">
                                               <option value="Bán hàng" <?= (!empty($nhanvien) && $nhanvien['chuc_vu'] == 'ban_hang' ? 'selected' : '') ?>>Bán hàng</option>
                                               <option value="Tư vấn" <?= (!empty($nhanvien) && $nhanvien['chuc_vu'] == 'tu_van' ? 'selected' : '') ?>>Tư vấn</option>
                                               <option value="Quản lý sản phẩm" <?= (!empty($nhanvien) && $nhanvien['chuc_vu'] == 'quan_ly_san_pham' ? 'selected' : '') ?>>Quản lý sản phẩm</option>
                                               <option value="Quản lý khách hàng " <?= (!empty($nhanvien) && $nhanvien['chuc_vu'] == 'quan_ly_khach_hang' ? 'selected' : '') ?>>Quản lý khách hàng</option>
                                               <option value="Quản lý bài blog" <?= (!empty($nhanvien) && $nhanvien['chuc_vu'] == 'quan_ly_bai_blog' ? 'selected' : '') ?>>Quản lý bài blog</option>
                                               <option value="kế toán" <?= (!empty($nhanvien) && $nhanvien['chuc_vu'] == 'ke_toan' ? 'selected' : '') ?>>Kế toán</option>
                                               <option value="Thống kê bán hàng" <?= (!empty($nhanvien) && $nhanvien['chuc_vu'] == 'thong_ke_ban_hang' ? 'selected' : '') ?>>Thống kê bán hàng</option>
                                           </select>
                               </div>
                           </div>
                           <div class="wrap-field form-group row ">
                           <label class="col-sm-4 col-form-label">Email: </label>
                                   <div class="col-sm-8">
                                           <input  class="form-control form-control-sm" type="email" name="email" value="<?= (!empty($nhanvien) ? $nhanvien['email'] : "") ?>" placeholder="VD: abc@gmail.com"/>
                                   </div>
                                   </div>
                           <div class="wrap-field form-group row">
                           <label class="col-sm-4 col-form-label">Số điện thoại </label>
                                   <div class="col-sm-8">
                                           <input  class="form-control form-control-sm" type="tel" name="phone" value="<?= (!empty($nhanvien) ? $nhanvien['phone'] : "") ?>" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" />
                                       </div>
                           
                           </div>
                           <div class="wrap-field form-group row">
                           <label class="col-sm-4 col-form-label">Mật khẩu</label>
                                   <div class="col-sm-8">
                                           <input  class="form-control form-control-sm" type="text" name="mat_khau" id="passwordField" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])\S{8,}$" title="Mật khẩu phải có ít nhất 8 ký tự, không chứa khoảng trắng, ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa và ít nhất một ký tự đặc biệt." value="<?= (!empty($nhanvien) ? $nhanvien['mat_khau'] : "") ?>"> 
                                           <i onclick="togglePassword()" class="fa-regular fa-eye" id="togglePasswordButton" style="position: relative; right: -90%; bottom: 23px; color: #a0a0a0;"></i>
                                           <div class="spinner" id="spinner"></div>
                                       </div>
                                       
                           </div>
                           <div class="wrap-field form-group row">
                           <label class="col-sm-4 col-form-label">Tên đăng nhập </label>
                                   <div class="col-sm-8">
                                           <input  class="form-control form-control-sm"type="text" name="tendangnhap" value="<?= (!empty($nhanvien) ? $nhanvien['ten_dangnhap'] : "") ?>" />
                                   </div>
                           </div>
                                           
                   </div>
                                  
                   
                       
                                
                       
               
           </div>
           <center>
                        <button class="btn btn-danger btnLuu" name="btnnvsua" type="submit"title="Lưu nhân viên" value="Cập nhật">Cập nhật</button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">Hủy</button>
              
                    </center>    
           <!-- <input class="btn btn-success btnLuu" name="btnadd" type="submit" title="Lưu sản phẩm" value="Lưu" /> -->
       </form>
       

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
   </script>

<script>
            function togglePassword() {
            var passwordField = document.getElementById("passwordField");
            var togglePasswordButton = document.getElementById("togglePasswordButton");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePasswordButton.classList.remove("fa-eye");
                togglePasswordButton.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                togglePasswordButton.classList.remove("fa-eye-slash");
                togglePasswordButton.classList.add("fa-eye");
            }
        }
        </script>
</body>
</html>
    