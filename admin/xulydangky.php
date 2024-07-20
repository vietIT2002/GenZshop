<!-- Tú -->
<?php 
session_start();

    if(isset($_GET['btnsend'])){
        echo 'welcome';
    
    $conn=mysqli_connect("localhost","root","","abc");
    $masv=$_GET['txtmatv'];
    $tensv=$_GET['txthoten'];
    $diachi=$_GET['txtdiachi'];
    $email=$_GET['txtemail'];
    $dt=$_GET['txtdt'];
    $sql1="INSERT INTO `sinhvien`(`masv`, `tensv`, `diachi`, `email`, `dt`) VALUES ('$masv','$tensv','$diachi','$email','$dt')";
    $result1=mysqli_query($conn,$sql1);
    if($result1)
    {
        header('location:index.php?dk=thanhcong');
    }
    else echo 'nhap ko thanh cong';
}
?>