<?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'bannuocdb') or die ('Lỗi kết nối');
mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['lien_he'])){
    $ho_ten = trim($_POST['ho_ten']);
    $sdt = trim($_POST['sdt']);
    $email_ss = trim($_POST['email_ss']);
    $tieu_de = trim($_POST['tieu_de']);
    $noidung = trim($_POST['noidung']);
    $ngay_gui = date('Y-m-d H:i:s');

    if (empty($ho_ten)) {
        echo '<script language="javascript">alert("Vui lòng nhập tên đăng nhập!"); window.location="lienhe.php";</script>';
        die();
    }

    // Validate email format
    if (!filter_var($email_ss, FILTER_VALIDATE_EMAIL)) {
        echo '<script language="javascript">alert("Địa chỉ email không hợp lệ!"); window.location="lienhe.php";</script>';
        die();
    }

    // Check if the email has the domain "@gmail.com"
    if (substr($email_ss, -10) !== "@gmail.com") {
        echo '<script language="javascript">alert("Địa chỉ email phải là địa chỉ Gmail!"); window.location="lienhe.php";</script>';
        die();
    }

    if (empty($sdt)) {
        echo '<script language="javascript">alert("Vui lòng nhập số điện thoại!"); window.location="lienhe.php";</script>';
        die();
    }

    // Kiểm tra định dạng số điện thoại và không cho phép số âm
    if (!preg_match('/^[0][0-9]{9}$/', $sdt) || $sdt < 0) {
        echo '<script language="javascript">alert("Số điện thoại không hợp lệ!"); window.location="lienhe.php";</script>';
        die();
    }
    if (empty($tieu_de)) {
        echo '<script language="javascript">alert("Vui lòng nhập nội dung!"); window.location="lienhe.php";</script>';
        die();
    }

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
   
        // Check if the address is empty
        if (empty($noidung)) {
            echo '<script language="javascript">alert("Vui lòng nhập nội dung!"); window.location="lienhe.php";</script>';
            die();
        }

        $sql = "INSERT INTO lien_he (ho_ten, sdt, email_ss, tieu_de, noidung, ngay_gui) VALUES ('$ho_ten','$sdt','$email_ss','$tieu_de','$noidung', '$ngay_gui')";

        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("Gửi thành công!");window.location="lienhe.php";</script>';
            echo "Họ và tên: ".$_POST['ho_ten']."<br/>";
            echo "Số điện thoại: ".$_POST['sdt']."<br/>";
            echo "Email: " .$_POST['email_ss']."<br/>";
            echo "Tiêu đề: ".$_POST['tieu_de']."<br/>";
            echo "Nội dung: ".$_POST['noidung']."<br/>";
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình gửi");window.location="lienhe.php";</script>';
        }
}
?>
