
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
                      
                            <img class="imgblog" src="./img/blog/Anh-bia-Chat-lieu-vai-moi.png" alt="hinh1" >

                            <h2>
                            Waffle – Chất liệu vải mới toanh của local brand Việt Nam
                            </h2>
                            
                        </div>    
                        
                        <div class="div2">
                        
                            <p><i>
                                Loại vải dệt waffle là một loại vải có các kết cấu ô vuông nhỏ, làm cho loại vải cotton này trông giống như món ăn sáng phổ biến mà nó được đặt theo tên của nó (Waffle). 
                              
                                </i>
                            </p>
                            
                          <h3> Chất liệu hiếm thấy ở sản phẩm local brand Việt Nam.</h3>    
                                  <p>Mặc dù không thể "ăn" được nhưng nó có thể giữ ấm cho bạn, đó là lý do tại sao nó là một mặt hàng chủ yếu trong quần áo mùa thu - đông. Hiệu ứng bánh quế có thể được tìm thấy trong các loại vải dệt kim và vải dệt thoi. </p>
                                  <p>Vải dệt kim waffle, có cấu trúc tương tự như kiểu dệt kim nhiệt, được sử dụng cho các lớp cơ bản mùa đông như vải long johns.</p>
                                  <img class="image2" src="./img/blog/Blog21.webp" alt="" >
                                  <p>Vải dệt waffle có đặc tính cách nhiệt, cung cấp sự ấm áp và cách nhiệt bằng cách giữ nhiệt cơ thể và tạo thành một lớp ấm bên cạnh da, do đó tăng khả năng giữ nhiệt. </p>
                                  <p>Ngoài ra, vải dệt waffle có khả năng thấm hút cao và có nhiều trọng lượng khác nhau. Những đặc điểm này làm cho loại vải này trở nên hoàn hảo cho chăn và áo choàng.</p>
                                  <p>Tùy thuộc vào độ chặt của kiểu dệt, vải waffle vẫn có thể nhẹ, nhưng thiết kế của kiểu dệt giúp tạo ra một lớp không khí ấm áp bên cạnh da, điều này khiến đây trở thành loại vải lý tưởng cho quần áo và bộ đồ giường mùa đông.</p>
                                  <img src="" alt="">
                                  <p>Có rất nhiều điều để yêu thích về loại vải waffle đặc biệt này. Nếu bạn thích vẻ ngoài có cấu trúc, sắc nét cho những chiếc áo phông trong tủ đồ của mình, thì loại vải dệt waffle chắc chắn là một sự lựa chọn không thể hoàn hảo hơn.</p>
                                  <p>Ngoài ra, bởi vì vải dệt bẫy và giữ nhiệt cơ thể, nên vải waffle rất lý tưởng để làm ấm và giữ nhiệt- nhưng có thể hơi quá ấm trong thời tiết mùa hè nóng bức.</p>
                                  <p>Đặc biệt khi được sử dụng trong một vài đồ dùng sinh hoạt như khăn, chăn,… Vải waffle có kiểu dệt lỏng hơn để tối đa hóa khả năng thấm hút. Kiểu dệt thoải mái đó có nghĩa là vải sẽ co lại một cách tự nhiên và giãn ra một chút để tạo ra trải nghiệm thoải mái đó.</p>
                          <h3>Vải Waffle trong sản phẩm mới của Tobi Streetwear</h3>
                                  <img class="image2" src="./img/blog/Blog22.webp" alt="" >
                                  <p>Để dẫn đầu xu hướng áp dụng chất liệu vải này vào thời trang nội địa, Tobi Streetwear đã nghiên cứu và đưa loại vải này vào với dòng sản phẩm cao cấp bên mình.</p>
                                  <p>Từ đó, lần lượt các mẫu tee, short sử dụng chất liệu vải này được mở bán và đem lại những phản hồi vô cùng tích cực từ các bạn trẻ về sự mới mẻ cũng như tính ứng dụng cực kỳ cao của sản phẩm.</p>
                                  <img class="image2" src="./img/blog/Blog23.webp" alt="" >
                                
                                 
                            
                          <h3> Hướng dẫn bảo quản sản phẩm chất liệu vải waffle </h3>
                                  <p>Tips: Để vệ sinh và bảo quản sản phẩm một cách tốt nhất trước tiên sản phẩm cần được phân loại theo chất liệu, cân nặng và màu sắc với nhau. </p>
                                  <p>- Theo chất liệu: Các sản phẩm từ Cotton không nên giặt chung với jean và các chất liệu có tính co giãn như Polyester, Spandex…</p>
                                  <p> - Theo cân nặng: Các sản phẩm có độ dày và nặng không nên giặt chung với các sản phẩm nhẹ như tee, shirt… </p>
                                  <p>- Theo màu sắc: Các sản phẩm có màu sáng như (trắng, xám nhạt, beige, cream, nude) không nên giặt chung với các sản phẩm tối màu (đen, xám đậm, xám than) và các sản phẩm có màu nổi (đỏ,cam, vàng, neon…) </p>
                 


                          <h3>Tailored Pants - Quần ống loe của năm 2024</h3>
                            
                                  <p>Phục chế lại máy khâu 1 đường chỉ - Single Stitch? Tại sao không?</p>
                                  
                                    <p> Tương tự như chiếc raglan tee được TOBI đem trở lại lần này, mẫu quần ống loe mới nhất của hãng cũng đã có một sự xuất hiện hoành tráng và bất ngờ không kém. Vì đây sẽ là một trong những item nhất-định-bạn-phải-thử.
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