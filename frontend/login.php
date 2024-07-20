<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/loginandk.css"/>
    <style>
    </style>
</head>
<body>
    <div class="login-container">
        <form action='index.php?act=login'  class="login-form" method='POST'> 
            <h4 class="login-title">ĐĂNG NHẬP TÀI KHOẢN</h4>
            <div class="form-group">
                TÊN ĐĂNG NHẬP<input class="login-input" type='text' name='username' placeholder="Tên đăng nhập..." />
            </div>
            <div class="form-group">
            <div class="password-input-container">
                MẬU KHẨU
                <input class="login-input" id="passwordField" type='password' name='password' placeholder="Mật khẩu..." />
                <i onclick="togglePassword()" class="toggle-password fa-regular fa-eye" id="togglePasswordButton"></i>
            </div><br>
            <div class="centered">
                <input class="login-button btn" type='submit' name="dangnhap" value='Đăng nhập' />
                <a href="index.php" class="login-link">Thoát</a>
            </div>
            <div class="login-text">
                <span>Bạn chưa có tài khoản?</span> <a href='index.php?act=register' class="" value='Đăng nhập' title='Đăng ký' style="color:blue">Đăng ký</a>
            </div>
            <?php require 'xulydangnhap.php';?>
        </form>
    </div>
</body>
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
</html>
