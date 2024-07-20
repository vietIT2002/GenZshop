<?php
if (isset($_POST['dangnhap']))
{
//Kết nối tới database
$conn = mysqli_connect('localhost', 'root', '', 'bannuocdb') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

  
//Lấy dữ liệu nhập vào
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);

if ($username == "" || $password =="") {
    echo '<br><p style="color:red;">Tên đăng nhập hoặc mật khẩu không được để trống!</p>';
}else{
    $sql = "select ten_dangnhap, mat_khau, trangthai from khachhang where ten_dangnhap = '$username' and mat_khau = '$password' ";
    $query = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($query);
    if ($num_rows==0) {
        echo '<br><p style="color:red;">Tên đăng nhập hoặc mật khẩu không đúng !</p>';
    }else{
        $row =mysqli_fetch_array($query, 1);
        //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
        if ($row['trangthai'] == 1) {
            echo "<script type='text/javascript'>alert('Tài khoản của bạn đã bị khóa');window.location='index.php?act=login';</script>";
        }else {
            $_SESSION['ten_dangnhap'] = $username;
            echo "<script type='text/javascript'>alert('Đăng nhập thành công');window.location='index.php';</script>";
        }
    }
}
}
?>