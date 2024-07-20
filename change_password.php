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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="icon" href="img/GENZSHOP1.ico">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">


    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="js/jquery1.min.js"></script>
    <!-- Popper JS  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script type="text/javascript" src="js/popper.min.js"></script> 
</head>
<body>
        <div id="wapper">
                <div id="header">
                    <?php require_once('frontend/header.php'); ?>
                </div>
                <div id="content">
                <?php require_once('frontend/content_doimk.php'); ?>
                </div>
                <div id="footer">
                <?php require_once('frontend/footer.php'); ?>
                </div>
        </div>

         <!-- jQuery Plugins -->
        
       
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>


		<script type="text/javascript" src="js/slick.min.js"></script>
		<script type="text/javascript" src="js/nouislider.min.js"></script>


		 <script type="text/javascript" src="js/jquery.zoom.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script> 
        <script>
            
            function addCart(idPro,act){
                if(act==0 && $('#soLuong'+idPro).val()==1) act=-1;
                if(act==-1){
                    var option=confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');
                    if(!option) return;
                }
                var qtyAdd=$('#qtyAdd').val();
                var soLuongTrongKho=parseInt($("#sl_tonkho"+idPro).text());
                if(qtyAdd > soLuongTrongKho){
                    alert("Số lượng bạn chọn vượt quá số lượng tồn trong kho.");
                    return;
                }else if(qtyAdd<=0){
                    alert("Vui lòng chọn số lượng lớn hơn 0");
                    return;
                }
                $.post('frontend/addCart.php',
                        {'id':idPro,'qtyAdd':qtyAdd,'act':act},
                        function(data){
                            $('#qtyPro').text(data);
                        })
            }
            function thanhtoan(user){
                
                $.post('frontend/thanh_toan.php',
                    {'user':user},
                    function(data){
                        location='index.php?act=my_bill';
                    })
            }
            async function delay(delayInms) {
                return new Promise(resolve  => {
                setTimeout(() => {
                resolve(2);
                }, delayInms);
            });
            }
            async function themThanhCong(id) {
                var qtyAdd=$('#qtyAdd').val() || 'a';
                var soLuongTrongKho=parseInt($("#sl_tonkho"+id).text()) || 'a';
                if((qtyAdd>0 && qtyAdd<=soLuongTrongKho)||(soLuongTrongKho==='a')){    
                    document.getElementById("messAddCart"+id).innerText="Thêm thành công";
                    let delayres = await delay(200);
                    document.getElementById("messAddCart"+id).innerText="thêm vào giỏ";

                }
                }
            async function thanhToanThanhCong() {
                document.getElementById("btnThanhToanThanhCong").style.display="block";
                let delayres = await delay(9000);
                document.getElementById("btnThanhToanThanhCong").style.display="none";
                }
                function checkPhone(){
                    var phoneno=/^\d{3}[-\s]?\d{3}[-\s]?\d{4}$/;
                    var sdt=$("#sdt").val();
                    if(phoneno.test(sdt)){
                        document.getElementById("thongbaoloisdt").innerText="";
                    }else document.getElementById("thongbaoloisdt").innerText="Không phải số điện thoại";
                }
                function checkPass(n){
                    var pass=document.getElementById("pswd").value;
                    var passOld=document.getElementById("passOld").value;
                    var passNew1=document.getElementById("passNew1").value;
                    var passNew2=document.getElementById("passNew2").value;
                    if(n==1){
                        if(passOld!=pass) document.getElementById("tb1").innerText="Mật khẩu củ không chính xác!!!";
                            else document.getElementById("tb1").innerText="";
                    }else if(n==2){
                        if(passNew1==pass) document.getElementById("tb2").innerText="Mật khẩu mới trùng với mật khẩu củ!!!";
                            else document.getElementById("tb2").innerText="";
                    }else if(n==3){
                        if(passNew2!=passNew1) document.getElementById("tb3").innerText="Mật khẩu mới không chính xác!!!";
                            else document.getElementById("tb3").innerText="";
                    }
                }
                function kiemTraSoLuong(n){
                       
                    var a=document.getElementById("qtyAdd").value;
                    if(a<1) document.getElementById("tbQty").innerText="Nhập số lượng sản phẩm phù hợp.";
                        else if(a>n) document.getElementById("tbQty").innerText="Số lượng bạn chọn lớn hơn số lượng còn trông kho.";
                            else document.getElementById("tbQty").innerText="";
                }
                function kiemTraSoLuong1(a,b){
                    var c=document.getElementById("soLuong"+b).value;
                    if(c<1) document.getElementById("tbQty"+b).innerText="Nhập số lượng sản phẩm phù hợp.";
                        else if(c>=a) alert("Quá số lượng trong kho.");
                            else document.getElementById("tbQty"+b).innerText="";
                }
                function huydonhang(id){
                    var option=confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?');
                    if(!option) return;
                    $.post('frontend/delete_bill.php',{'id_hoadon':id},
                    function data(){
                        location.reload();
                    })
                }
        </script>
</body>
</html>