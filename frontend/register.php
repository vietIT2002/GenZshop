<link type="text/css" rel="stylesheet" href="css/loginandk.css"/>

<div class="row1">
    <form method="post" action="index.php?act=register">

		<br><h4 class="title1">ĐĂNG KÝ TÀI KHOẢN</h4>
        <div class="form-group1">
        HỌ VÀ TÊN <br><input style="width:300px"class="input1" type="text" name="ten_kh" value="" required placeholder="Họ và tên..." /><br>
        </div>
        <div class="form-group1">
        EMAIL <br><input style="width:300px"class="input1" type="email" name="email" value="" required placeholder="Email..." autocomplete="off"/><br>
        </div>
        <div class="form-group1">
        SỐ ĐIỆN THOẠI <br><input style="width:300px"class="input1" type="text" name="phone" value="" pattern="[0][0-9]{9}" id="phone..." required placeholder="0xxxxxxxxx" /><br>
        </div>
        <div class="form-group1">
        ĐỊA CHỈ<br><input style="width:300px" class="input1" type="text" name="address" value="" required placeholder="Địa chỉ..." /><br>
        </div>
        <div class="form-group1">
        TÊN ĐĂNG NHẬP<br><input style="width:300px"class="input1" type="text" name="ten_dangnhap" value="" required placeholder="Tên đăng nhập..." ><br>
        </div>
        <div class="form-group1">
        MẬT KHẨU <br><input style="width:300px" class="input1" id="myInput1" type="password" name="mat_khau" value="" required placeholder="Mật khẩu..."/><br>
        <input type="checkbox" onclick="myFunction()">Show Password
        </div>
        <div style="display: flex; justify-content: center;">
            <input class="btn btn-danger" type="submit" name="dangky" value="Đăng Ký"/>
            <a href="index.php" class="btn btn-primary" style="margin-left: 10px;">Thoát</a>
            <?php require 'xulydangky.php';?>
        </div>
	</form>
      
</div><br>
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
<style>

</style>
