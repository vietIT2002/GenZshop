
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
                      
                            <img class="imgblog" src="./img/blog/Anh-bia-nhung-tri-ki-cung-dong-hanh-trong-chuyen-luu-giu-ki-niem.png" alt="hinh1" >

                            <h2>
                            Những Tri Kỉ Cùng Đồng Hành Trong Chuyến Hành Trình Lưu Giữ Kỉ Niệm Việt
                            </h2>
                            
                        </div>    
                        
                        <div class="div2">
                                        <center>
                                                <p><i>
                                                    Sinh ra cùng dòng máu đỏ da vàng.  <br>
                                                    Lớn lên với từng tiếng ru của mẹ. <br>
                                                    Trưởng thành qua từng gian khó của 4000 năm lịch sử. <br>
                                                    Mang trong mình biết bao kỉ niệm, hoài bão và tràn đầy tự hào hai tiếng “Dân Tộc”. <br>
                                                    </i>
                                                </p>
                                        </center>
                                        
                                        <img class="image2" src="./img/blog/Blog31.webp" alt="" >
                            
                          <h3> Dù đi đến đâu, những con người Việt Nam vẫn luôn cùng một niềm trăn trở: “Làm gì để gìn giữ và phát huy những giá trị Việt?"</h3>    
                                  
                                  <img class="image2" src="./img/blog/Blog32.webp" alt="" >
                                  <p>“Việt Souvenirs, Người Việt - Câu chuyện Việt” là dự án TOBI đã ấp ủ suốt thời gian qua với mong muốn tạo ra những giá trị Việt thông qua thời trang - tạo ra những sản phẩm nghệ thuật có thể mặc được. Dòng sản phẩm thể hiện sự nâng niu từng kỉ niệm và tỉ mỉ trong khâu sản xuất giúp TOBI tự hào “Made By Việt” - thương hiệu được kiến tạo bởi người Việt Nam, chứ không phải “Made In Vietnam” (gia công tại Việt Nam).  </p>
                                  
                                  
                          <h3>“Đợi cho đến khi nào mà chẳng phải hôm nay!”.</h3>
                                  <img class="image2" src="./img/blog/Blog33.webp" alt="" >
                                  <p>Đội ngũ TOBI Team với tinh thần "Người trẻ vẽ tương lai" cùng với những hoài bão, tự hào làm ra những sản phẩm nghệ thuật có thể mặc được và mỗi sản phẩm đều sẽ khiến chúng ta tự hào, không phải bởi vì “Made In Vietnam” mà bởi vì chúng ta tự hào về những sản phẩm "Made By Việt". </p>
                                  
                                  <img class="image2" src="./img/blog/Blog3.webp" alt="" >
                                  <p>Cùng với khát vọng ra mắt dòng sản phẩm TOBI Heritages™ - sử dụng mỹ thuât in lụa thủ công để biến những chiếc áo thun trở thành sản phẩm đậm tính nghệ thuật, có thể mặc được (Wearable-Art). TOBI và Giám đốc sản xuất Quyen Cun đã nỗ lực không ngừng nghỉ để mang đến tay khách hàng những sản phẩm với kỹ thuật in lụa thủ công độc quyền để tạo ra những tác phẩm nghệ thuật có thể mặc được, chứ không đơn thuần chỉ là áo thun.  </p>
                                 
                          <h3> Hành trình biến những điều nhỏ bé thành điều phi thường</h3>
                                  <p>Sự đồng hành của tất cả các bạn trong cuộc hành trình đã biến những điều nhỏ bé thành điều phi thường này. TOBI chân thành cảm ơn những người bạn tri kỉ đã chúng tôi khoác lên lòng tự hào, mang đến cho người Việt Nam những sản phẩm “Thuần Việt”.</p>
                                  <img class="image2" src="./img/blog/Blog4.webp" alt="" >
                                  <p>Có thể các sản phẩm "Thuần Việt" sẽ còn đôi chút chưa hoàn thiện nhưng chúng ta có quyền tự hào vì những gì người Việt Nam có thể làm</p>
                                  <p>TOBI hy vọng sẽ có được sự ủng hộ của bạn trong cuộc hành trình biến những điều nhỏ bé thành điều phi thường này. Các bạn là nguồn động lực để TOBI hoàn thiện bản thân và tiếp lửa local brand vươn mình ra thế giới.</p>
                                  <p>Hãy cùng chúng tôi khoác lên lòng tự hào, bảo tồn văn hoá Việt và tiếp lửa khát vọng thương hiệu Việt.</p>
                                  <p> Hy vọng bài viết này sẽ giúp ích cho các bạn ít nhiều trong việc lựa chọn mà mua sắm. Cảm ơn các bạn đã đọc bài!</p>
                          <div style="text-align: right;">
                              <p >Kim Yến - Ín Ín</p>
                              <p>Ngày đăng: 10/01/2024</p><br><br>
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