
<?php
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];
$conn = mysqli_connect("localhost", "root", "", "bannuocdb");
$sql = "SELECT * FROM `taikhoang` WHERE username='$user' AND pass='$pass'";
echo $sql;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$sql2 = "SELECT * FROM `nhanvien` WHERE ten_dangnhap='".$row['username']."'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
if ($row['trang_thai'] == '1')
    header("location:index.php?dn=khoa");
else
    if (mysqli_num_rows($result) > 0) {
    $_SESSION['nguoidung'] = $row['fullname'];
    $_SESSION['quyen'] = $row['id_quyen'];
    $_SESSION['user'] = $row['username'];
    $_SESSION['idnhanvien'] = $row2['id'];
    $_SESSION['tennhanvien'] = $row2['ten_nv'];
    header("location:admin.php?dn=true");
} else header("location:index.php?dn=false");
?>