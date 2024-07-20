<?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'bannuocdb') or die ('Lỗi kết nối');
mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['dangky'])){
    $hoten = trim($_POST['ten_kh']);
    $username = trim($_POST['ten_dangnhap']);
    $password = trim($_POST['mat_khau']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if (strlen($password) < 8) {
        echo '<script language="javascript">alert("Mật khẩu phải chứa ít nhất 8 ký tự!"); window.location="index.php?act=register";</script>';
        die();
    }
    
    if (preg_match('/\s/', $password)) {
        echo '<script language="javascript">alert("Mật khẩu không được chứa khoảng trắng!"); window.location="index.php?act=register";</script>';
        die();
    }
    
    // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\W_]+$/', $password)) {
    //     echo '<script language="javascript">alert("Mật khẩu phải chứa ít nhất một chữ cái in hoa, một chữ cái in thường và một số!"); window.location="index.php?act=register";</script>';
    //     die();
    // }
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[a-zA-Z\d!@#$%^&*(),.?":{}|<>]+$/', $password)) {
        echo '<script language="javascript">alert("Mật khẩu phải chứa ít nhất một chữ cái in hoa, một chữ cái in thường, một số và một ký tự đặc biệt!"); window.location="index.php?act=register";</script>';
        die();
    }
    
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[a-zA-Z\d!@#$%^&*(),.?":{}|<>]+$/', $password)) {
        echo '<script language="javascript">alert("Mật khẩu phải chứa ít nhất một chữ cái in hoa, một chữ cái in thường, một số và một ký tự đặc biệt!"); window.location="index.php?act=register";</script>';
        die();
    }    
    // Thêm điều kiện kiểm tra độ dài của tên đăng nhập
    if (strlen($username) < 4 || strlen($username) > 20) {
        echo '<script language="javascript">alert("Tên đăng nhập phải từ 4 đến 20 ký tự!"); window.location="index.php?act=register";</script>';
        die();
    }

    // Kiểm tra ký tự đặc biệt trong tên đăng nhập
    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        echo '<script language="javascript">alert("Tên đăng nhập không được chứa ký tự đặc biệt!"); window.location="index.php?act=register";</script>';
        die();
    }

    if (empty($username)) {
        echo '<script language="javascript">alert("Vui lòng nhập tên đăng nhập!"); window.location="index.php?act=register";</script>';
        die();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script language="javascript">alert("Địa chỉ email không hợp lệ!"); window.location="index.php?act=register";</script>';
        die();
    }

    // Check if the email has the domain "@gmail.com"
    if (substr($email, -10) !== "@gmail.com") {
        echo '<script language="javascript">alert("Địa chỉ email phải là địa chỉ Gmail!"); window.location="index.php?act=register";</script>';
        die();
    }

    if (empty($phone)) {
        echo '<script language="javascript">alert("Vui lòng nhập số điện thoại!"); window.location="index.php?act=register";</script>';
        die();
    }

    // Kiểm tra định dạng số điện thoại và không cho phép số âm
    if (!preg_match('/^[0][0-9]{9}$/', $phone) || $phone < 0) {
        echo '<script language="javascript">alert("Số điện thoại không hợp lệ!"); window.location="index.php?act=register";</script>';
        die();
    }

    if (empty($password)) {
        echo '<script language="javascript">alert("Vui lòng nhập mật khẩu!"); window.location="index.php?act=register";</script>';
        die();
    }


    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM khachhang WHERE ten_dangnhap = '$username' OR email = '$email'";

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);

    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Tên đăng nhập hoặc địa chỉ email đã tồn tại!"); window.location="index.php?act=register";</script>';
        die();
    } else {
        // Check if the address is empty
        if (empty($address)) {
            echo '<script language="javascript">alert("Vui lòng nhập địa chỉ!"); window.location="index.php?act=register";</script>';
            die();
        }
        $sql = "INSERT INTO khachhang (ten_kh, ten_dangnhap, mat_khau, email, phone, dia_chi) VALUES ('$hoten','$username','$password','$email','$phone','$address')";

        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="index.php?act=login";</script>';
            echo "Họ và tên: ".$_POST['ten_kh']."<br/>";
            echo "Tên đăng nhập: ".$_POST['ten_dangnhap']."<br/>";
            echo "Mật khẩu: " .$_POST['mat_khau']."<br/>";
            echo "Email đăng nhập: ".$_POST['email']."<br/>";
            echo "Số điện thoại: ".$_POST['phone']."<br/>";
            echo "Địa chỉ: ".$_POST['address']."<br/>";
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php?act=register";</script>';
        }
    }
}
?>
