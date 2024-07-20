<?php
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    require_once('db/dbhelper.php');
    require_once('common/utility.php'); 
    if(isset($_SESSION['ten_dangnhap'])){
		$ten_dangnhap=$_SESSION['ten_dangnhap'];
		$sql='select * from khachhang where ten_dangnhap="'.$ten_dangnhap.'"';
		$info=executeSingleResult($sql);
	}
    $act='';
    $search='';
    $id=0;
    $title='Trang Chủ';
    if(isset($_GET['act'])){
        $act=$_GET['act'];
    }
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    if(isset($_GET['search'])){
        $search=$_GET['search'];
    }
    // if($act=='category' || $id>0){
    //     $sql='select ten_tl from theloai where id='.$id;
    //     $cate=executeSingleResult($sql);
    //     $title=$cate['ten_tl'];
    // }
    if ($act == 'category' || $id > 0) {
        $sql = 'SELECT ten_tl FROM theloai WHERE id=' . $id;
        $cate = executeSingleResult($sql);
    
        if ($cate && isset($cate['ten_tl'])) {
            $title = $cate['ten_tl'];
        } else {
            $title = 'Không tìm thấy danh mục';
        }
    }
    
    if($act=='category' && $id==0){
        $title='Danh Mục Sản Phẩm';
    }
    if($act=='product'){
        $sql='select ten_sp from sanpham where id='.$id;
        $pro=executeSingleResult($sql);
        $title=$pro['ten_sp'];
    }
    if($act=='cart'){
        $title='Giỏ Hàng';
    }
    if($act=='login'){
        if(isset($_SESSION['cart'])&& isset($_SESSION['ten_dangnhap']))
            unset($_SESSION['cart']);
        $title='Đăng nhập';
    }
    if($act=='register'){
        $title='Tạo tài khoản mới';
    }
    if($act=='my_bill'){
        $title='Đơn hàng của tôi';
    }
    if($act=='bill_detail'){
        $title='Chi tiết đơn hàng';
    }
    if($act=='my_account'){
        $title='Tài khoản của tôi';
    }
    if($search!=''){
        $title='Tìm kiếm '.$search;
    }
?>
<?php
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    require_once('db/dbhelper.php');
    require_once('common/utility.php'); 

    // Check if the user is logged in
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['doimatkhau'])) {
    // Handle password change logic here
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the old password is correct
    $check_old_password_sql = 'SELECT * FROM khachhang WHERE ten_dangnhap = "'.$ten_dangnhap.'" AND mat_khau = "'.$old_password.'"';
    $result = executeSingleResult($check_old_password_sql);

    if ($result) {
        // Old password is correct, proceed with the change
        if ($new_password === $confirm_password) {
            // Update the password in the database (without hashing)
            $update_sql = 'UPDATE khachhang SET mat_khau = "'.$new_password.'" WHERE ten_dangnhap = "'.$ten_dangnhap.'"';
            execute($update_sql);

            // Set success message
            $success_message = 'Đổi mật khẩu thành công.';
            
            // You can redirect to another page if needed
            // header('Location: change_password_success.php');
            // exit();
        } else {
            $error_message = 'Mật khẩu mới và xác nhận mật khẩu không khớp.';
        }
    } else {
        $error_message = 'Mật khẩu cũ không đúng.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
<style>
    .change-password-container {
        max-width: 400px;
        margin: 30px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .change-password-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .change-password-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .change-password-input:focus {
        border-color: #3498db;
    }

    .change-password-button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .change-password-button:hover {
        background-color: #2980b9;
    }
</style>
</head>
<body>
<div id="wapper">
    <div class="change-password-container">
        <form action='change_password.php' style="text-align:center;" class="change-password-form" method='POST'> 
            <h3 class="change-password-title">ĐỔI MẬT KHẨU</h3>
            
            <?php if (!empty($success_message)): ?>
                <p style="color: green;"><?php echo $success_message; ?></p>
                <script>
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 3000); // Redirect after 3 seconds
                </script>
            <?php endif; ?>
            
            <?php if (isset($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            
            <div class="form-group">
                <!-- Display the current username, which cannot be changed -->
                <span style="font-size: 18px; font-weight: bold;"><?php echo $ten_dangnhap; ?></span>
            </div>
                        
            <div class="form-group">
                <input class="change-password-input" type='password' name='old_password' placeholder="Mật khẩu cũ" required oninvalid="this.setCustomValidity('Vui lòng nhập thông tin')" oninput="setCustomValidity('')"/>
            </div>
            
            <div class="form-group">
                <input class="change-password-input" type='password' name='new_password' placeholder="Mật khẩu mới" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])\S{8,}$" title="Mật khẩu phải có ít nhất 8 ký tự, không chứa khoảng trắng, ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa và ít nhất một ký tự đặc biệt." />
            </div>
            
            <div class="form-group">
                <input class="change-password-input" type='password' name='confirm_password' placeholder="Xác nhận mật khẩu mới" required oninvalid="this.setCustomValidity('Vui lòng nhập thông tin')" oninput="setCustomValidity('')"/>
            </div>
            
            <input class="change-password-button" type='submit' name="doimatkhau" value='Đổi mật khẩu' />
            <a href="index.php" class="btn btn-primary">Thoát</a>
        </form>
    </div>
</div>


                
            </body>
            </html>