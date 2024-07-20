
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
    <!-- link css -->
    <link rel="stylesheet" href="./css/Blog.css">


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
        
        <div class="content">
     
              <aside>
                <div class="aside">
                  <div class="row">
                    <div class="col-md-16" >
                          <font size="6">
                          <center>
                            <b>
                              <i>
                                  Bài viết mới
                                <hr>
                              </i>
                            </b>
                          </center>
                        </font>
                      <br/>
                      <a href="index.php">  Tip và Hack dáng  </a> 
                          <br/>
                          <br/>
                      <a href="index.php"> GenZ có gì hot </a>
                          <br/>
                          <br/>
                      <a href="index.php">Chăm sóc cá nhân </a>
                          <br/>
                          <br/>
                     <a href="index.php">  Khám phá Local GenZ </a>
                          <br/>
                      
                    </div>
                  </div>
                </div>
              </aside>
        
              <section class="section">
              <div class="container-blog">
                  <div class="row">
                      <div class="col-md-10" >
                        <div class="div1">
                            <img class="imgblog" src="./img/4.png" alt="hinh1" >
                            <br>
                            <br>
                            <h2> GENZ x Single Stitch 2024 : Sự kiện triển lãm thời trang Vintage lớn nhất năm 2024</h2>
                        </div>    
                        
                        <div class="div2">
                        
                            <p><i> Single Stitch là sự kiện triển lãm thời trang Vintage đầu tiên với quy mô lớn mạnh qua các năm.
                                    Với sự tham gia của hơn 500 khách và 16 gian hàng/ shop vào 2022, Single Stitch đã bùng nổ mạnh mẽ khi thu hút hơn 2000 người tham dự với hơn 30 vendors chỉ một năm sau đó. </i></p>
                            
                            <h3>  1. Trăn trở về hành trình lưu giữ kỉ niệm Việt </h3>    
                                    <p>Single Stitch 2024 cùng với sự góp mặt của hơn 70 vendors hứa hẹn sẽ còn bùng nổ hơn như thế nữa với sự xuất hiện của hơn 500 áo Vintage giá trị cao và loạt các hoạt động trải nghiệm chưa từng có tại bất kì sự kiện thời trang Vintage nào.</p>
                            <h3>GENZ x Single Stitch 2024 : Sự kiện triển lãm thời trang Vintage</h3>
                                    <img class="image2" src="./img/blog/Blog1_1.webp" alt="" >
                                    <p> <br>Đặc biệt, với sự tham gia của TOBI, sự kiện còn đem đến loạt các hoạt động trải nghiệm đáng mong chờ:</p><br>
                                    <img class="image2" src="./img/blog/Blog12.webp" alt="" ><br>
                                  
                                    <img class="image2" src="./img/blog/Blog13.webp" alt="" >
                            
                          <h3><br> 2. "Custom by you" - In lụa nghệ thuật. </h3>
                                    <p> GENZ đem đến trải nghiệm IN LỤA MỸ THUẬT lần đầu tiên có mặt tại các sự kiện thời trang Vintage. Tại đây, các bạn sẽ có cơ hội tự tay trải nghiệm Custom in áo với sự hướng dẫn của Nghệ nhân In ấn Quốc tế FESPA - Quyen Cun. </p><br>
                                    <img class="image2" src="./img/blog/Blog14.webp" alt="" >
                                    <p> <br>
                                    Bước 1: Chọn ngay phôi áo GENZ cực chất lượng</p>
                                    <p>
                                    Bước 2: Lựa chọn các hình in có sẵn </p>
                                    <p> Bước 3: Trải nghiệm in lụa với sự hướng dẫn của Nghệ nhân in ấn Quốc tế _ QUYEN CUN </p>
                                    <p>  Bước 4: CHECKIN cùng sản phẩm "Custom by you" - In lụa Nghệ thuật</p>

                          <h3>2.  May lên lai bằng máy khâu 1 chỉ “Single Stitch” nguyên bản ngay tại sự kiện </h3>
                                    <p> Phục chế lại máy khâu 1 đường chỉ - Single Stitch? Tại sao không?</p><br>
                         
                                    <img class="image2" src="./img/blog/Blog15.webp" alt="" >
                                  
                                    <p><br> Được xem là tiêu chuẩn vàng của những chiếc áo thun Vintage, đường may đơn, chỉ khâu đơn - “Single Stitch” dường như đã ít xuất hiện sau những năm 2000. </p>
                                    <p> Với mong muốn làm sống lại những sản phẩm Vintage, TOBI đã phục chế máy khâu 1 đường chỉ - “Single Stitch” nguyên bản chỉ có tại sự kiện GENZ x SINGLE STITCH.</p>
                          <h3>3.  GENZ x Single Stitch với sản phẩm Parody limited (chỉ duy nhất 20 áo)  </h3>
                                    <img class="image2" src="./img/blog/Blog16.webp" alt="" >

                          <h3> <br>4. Giao lưu cùng Graffiti Artist - CRESK </h3><br>
                                    <img class="image2" src="./img/blog/Blog17.webp" alt="" >
                          <div>
                                      <p>
                                          <i><br> GENZ x SINGLE STITCH 2024 đã chính thức khép lại với sự hưởng ứng nồng nhiệt và những kỷ niệm khó quên!!
                                            Dù còn nhiều thiếu sót và chưa thể mang đến trải nghiệm trọn vẹn cho một số anh em nhưng TOBI xin chân thành cảm ơn tất cả tình cảm mà những anh em dành cho GENZ x SINGLE STITCH!
                                            Chân thành cảm ơn @single.stitch_vn đã đem đến một buổi triển lãm vô cùng giá trị và tạo sân chơi cho tất cả các anh em trong cộng đồng Vintage.
                                            TOBI rất vinh hạnh khi có mặt lần đầu tiên tại Single Stitch và được đông đảo các bạn đón nhận.
                                            Hy vọng sẽ luôn nhận được sự yêu thương và đón chào của tất cả các bạn!</i>
                                      </p>
                            
                          </div>
                          <div style="text-align: right;">
                              <p >Kim Yến - Ín Ín</p>
                              <p>Ngày đăng: 15/03/2024</p><br><br>
                          </div>
                          </div>      
                        </div>     
                      </div>    
                    </div>         
                  </div>
                </div>
              </section>

    </div> 
             
        

        <!-- jQuery Plugins -->
        
       
          <script type="text/javascript" src="js/jquery.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.min.js"></script>


          <script type="text/javascript" src="js/slick.min.js"></script>
          <script type="text/javascript" src="js/nouislider.min.js"></script>


          <script type="text/javascript" src="js/jquery.zoom.min.js"></script>
          <script type="text/javascript" src="js/main.js"></script> 
              <script>
            
      
     
   
    
</body>

</html>