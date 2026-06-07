<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/loginandk.css"/>
</head>
<body>
    <div class="login-container">
        <form action="index.php?act=login" class="login-form" method="POST">
            <h4 class="login-title">ĐĂNG NHẬP TÀI KHOẢN</h4>

            <div class="form-group">
                <label class="auth-label" for="loginUsername">TÊN ĐĂNG NHẬP</label>
                <input class="login-input" id="loginUsername" type="text" name="username" placeholder="Tên đăng nhập..." />
            </div>

            <div class="form-group">
                <label class="auth-label" for="passwordField">MẬT KHẨU</label>
                <div class="password-input-container">
                    <input class="login-input" id="passwordField" type="password" name="password" placeholder="Mật khẩu..." />
                    <i onclick="togglePassword()" class="toggle-password fa-regular fa-eye" id="togglePasswordButton"></i>
                </div>
            </div>

            <div class="centered auth-actions">
                <input class="login-button btn" type="submit" name="dangnhap" value="Đăng nhập" />
                <a href="index.php" class="login-link">Thoát</a>
            </div>

            <div class="login-text">
                <span>Bạn chưa có tài khoản?</span>
                <a href="index.php?act=register" class="auth-text-link" title="Đăng ký">Đăng ký</a>
            </div>

            <?php require 'xulydangnhap.php';?>
        </form>
    </div>

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
