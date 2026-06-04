<?php
if (isset($_POST['dangnhap'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'GenZshopdb') or die('Lỗi kết nối');
    mysqli_set_charset($conn, 'utf8mb4');

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        echo '<div class="login-error">Tên đăng nhập hoặc mật khẩu không được để trống!</div>';
    } else {
        $stmt = mysqli_prepare($conn, 'SELECT ten_dangnhap, mat_khau, trangthai FROM khachhang WHERE ten_dangnhap = ? AND mat_khau = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 0) {
            echo '<div class="login-error">Tên đăng nhập hoặc mật khẩu không đúng!</div>';
        } else {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ((int) $row['trangthai'] === 1) {
                echo "<script type='text/javascript'>alert('Tài khoản của bạn đã bị khóa');window.location='index.php?act=login';</script>";
            } else {
                $_SESSION['ten_dangnhap'] = $username;
                echo "<script type='text/javascript'>alert('Đăng nhập thành công');window.location='index.php';</script>";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>