<link type="text/css" rel="stylesheet" href="css/loginandk.css"/>

<div class="row1 register-container">
    <form method="post" action="index.php?act=register" class="register-form">
        <h4 class="title1">ĐĂNG KÝ TÀI KHOẢN</h4>

        <div class="form-group1">
            <label class="auth-label" for="registerName">HỌ VÀ TÊN</label>
            <input class="input1" id="registerName" type="text" name="ten_kh" value="" required placeholder="Họ và tên..." />
        </div>

        <div class="form-group1">
            <label class="auth-label" for="registerEmail">EMAIL</label>
            <input class="input1" id="registerEmail" type="email" name="email" value="" required placeholder="Email..." autocomplete="off" />
        </div>

        <div class="form-group1">
            <label class="auth-label" for="registerPhone">SỐ ĐIỆN THOẠI</label>
            <input class="input1" id="registerPhone" type="text" name="phone" value="" pattern="[0][0-9]{9}" required placeholder="0xxxxxxxxx" />
        </div>

        <div class="form-group1">
            <label class="auth-label" for="registerAddress">ĐỊA CHỈ</label>
            <input class="input1" id="registerAddress" type="text" name="address" value="" required placeholder="Địa chỉ..." />
        </div>

        <div class="form-group1">
            <label class="auth-label" for="registerUsername">TÊN ĐĂNG NHẬP</label>
            <input class="input1" id="registerUsername" type="text" name="ten_dangnhap" value="" required placeholder="Tên đăng nhập..." >
        </div>

        <div class="form-group1">
            <label class="auth-label" for="myInput1">MẬT KHẨU</label>
            <input class="input1" id="myInput1" type="password" name="mat_khau" value="" required placeholder="Mật khẩu..." />
            <label class="show-password-option">
                <input type="checkbox" onclick="myFunction()">
                <span>Hiện mật khẩu</span>
            </label>
        </div>

        <div class="auth-actions">
            <input class="btn btn-danger" type="submit" name="dangky" value="Đăng ký"/>
            <a href="index.php" class="btn btn-primary">Thoát</a>
        </div>

        <?php require 'xulydangky.php';?>
    </form>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myInput1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
