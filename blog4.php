
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
                      
                            <img class="imgblog" src="./img/blog/Anh-bia-Cùng-Khát-Vọng-Made-By-Việt.png" alt="hinh1" >

                            <h2>
                            Việt Souvenirs - "Người Việt - Câu Chuyện Việt" Cùng Khát Vọng Made By Việt - "Thương Hiệu Bởi Người Việt"
                            </h2>
                            
                        </div>    
                        
                        <div class="div2">
                        
                                    <p><i> Từ những tiếng ru khi lọt lòng, những bài hát hay những câu ca dao, tục ngữ; lòng tự hào dân tộc đã được nuôi dưỡng và vun đắp suốt 4,000 năm qua....</i></p>
                                    <p><i> Tự hào vì đất nước nhỏ bé nhưng có bề dày lịch sử vẻ vang. Tự hào vì con người nơi đây kiên trung vượt mọi gian khó. Tự hào vì mình bé nhỏ nhưng “sánh vai cùng các Cường Quốc Năm Châu”</i></p>
                                    
                          <h3>1. Trăn trở về hành trình lưu giữ kỉ niệm Việt</h3>    
                                    <p>“Dân tộc” – cụm từ ngắn gọn nhưng chứa đựng biết bao kỷ niệm, hoài bão và tràn đầy tự hào. Dù bạn đến từ đâu, khi bạn nhận được thông điệp này, chúng ta đều cùng một “Dân tộc”, cùng một trăn trở: Làm sao để gìn giữ và tiếp nối những giá trị của “Dân tộc”.</p>
                          <h3>Nếu như con người Thủ đô nho nhã, thanh lịch, hiếu khách.</h3>
                                  <img class="image2" src="./img/blog/Blog41.webp" alt="" >
                                  <p>Quá trình hội tụ, giao lưu đã kết tinh nên phẩm chất cao đẹp của người Kẻ Chợ – Kinh Kì và không biết từ bao giờ trong dân gian đã cất tiếng ngợi ca một trong nhiều cái nhất của Thăng Long – Hà Nội:</p>
                                  <center>
                                      <p> <i>“Nhất cao là núi Ba Vì  </i></p>
                                      <p> <i> Nhất lịch, nhất sắc Kinh Kì Thăng Long” </i></p>
                                  </center> 
                                  <img class="image2" src="./img/blog/Blog42.webp" alt="" >
                                  <p>Từ tài liệu của các nhà nghiên cứu lịch sử, văn hóa cho thấy, lịch sử hình thành áo dài Việt Nam đã trải qua nhiều giai đoạn biến thể trong phong cách sáng tạo, cách tân từ kiểu dáng đến chất liệu...</p>
                                  <br />
                                  <br />
                          <h3>2. Người miền Trung lại nghĩa tình, vượt khó, hiếu học. </h3>
                                  <p>
                                    <i>"Khô cằn bên ngoài lại chan chứa nghĩa tình bên trong; khắc nghiệt cơ cực chỉ càng làm sáng tỏ cái đẹp con người". </i>
                                  </p>
                                    <img class="image2" src="./img/blog/Blog44.webp" alt="" >
                                    <p>
                                    Khúc ruột miền Trung làm say lòng bao lữ khách, là nơi đất cày lên sỏi đá, là nơi gồng gánh thiên tai nối liền 2 miền Nam-Bắc.
                                    Người miền Trung sống với nhau bằng cái nghĩa cái tình. Những tấm gương hiếu học "Thanh - Nghệ - Tĩnh" làm rạng danh vùng đất gian khó cơ hàn. 
                                    </p>
                          <h3> 3. Thì Sài Gòn lại nổi tiếng hào sảng, năng động và nghĩa khí. </h3>
                                  <p>Sài Gòn nổi bật với văn hóa đường phố về hàng quán, kẹt xe và một nhịp sống vội vã, là trung tâm kinh tế của cả
                                      nước, là nơi giao lưu hội tụ của các nền văn hóa. Người Sài Gòn niềm nở, không câu nệ, không hoàn hảo nhưng vẫn
                                      đáng tự hào.</p>
                                
                                  <img class="image2" src="./img/blog/Blog43.webp" alt="" >
                                  <center>
                                      <p>
                                          <i>"Sài Gòn chẳng ngủ đâu em <p> 
                                      Phố phường ngày cũng như đêm nhịp nhàng"</i>
                                      </p>
                                  </center>
                                  
                                  <p> “Việt Souvenirs – Người Việt Câu Chuyện Việt” là dự án TOBI đã ấp ủ suốt thời gian qua. Với mong muốn mang lại 
                                     cho các bạn một dòng sản phẩm “Made By Việt” mà không phải “Made In Vietnam”. Dòng sản phẩm mang trong 
                                    mình sự tự hào dân tộc, niềm thương, nỗi nhớ của thế hệ trẻ. Hãy cùng chúng tôi dừng lại một phút để cùng  
                                    nhìn lại “Quê Hương”, “Đất Nước”, nhìn lại những giá trị mà chúng ta dần quên đi trong cuộc hành trình hội nhập với thế giới.<br> 
                                  </p>
                          <div style="text-align: right;">
                            <p >Kim Yến - Ín Ín</p>
                            <p>Ngày đăng: 06/02/2024</p><br><br>
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