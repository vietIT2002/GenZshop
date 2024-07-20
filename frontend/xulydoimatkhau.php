<?php
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    session_start();
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
    $title='Đổi Mật Khẩu';

    if(isset($_GET['act'])){
        $act=$_GET['act'];
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }

    if(isset($_GET['search'])){
        $search=$_GET['search'];
    }

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

    //Handle password change
    if(isset($_POST['doimatkhau'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate if the old password matches the stored password
        if(password_verify($old_password, $info['mat_khau'])) {
            // Validate if the new password and confirm password match
            if($new_password === $confirm_password) {
                // Update the password in the database
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = 'UPDATE khachhang SET mat_khau="'.$hashed_password.'" WHERE ten_dangnhap="'.$ten_dangnhap.'"';
                execute($update_sql);
                echo '<script>alert("Đổi mật khẩu thành công!"); window.location="index.php?act=my_account";</script>';
            } else {
                echo '<script>alert("Mật khẩu mới và xác nhận mật khẩu không khớp!");</script>';
            }
        } else {
            echo '<script>alert("Mật khẩu cũ không đúng!");</script>';
        }
    }
    
?>