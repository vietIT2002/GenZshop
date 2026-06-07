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


    if($act=='danhmucbaiviet' && $id==0){
      $title='Danh mục bài viết';
    }
    if ($act == 'danhmucbaiviet' || $id > 0) {
      $sql = 'SELECT tendanhmucbv FROM danhmucbaiviet WHERE id_danhmucbv=' . $id;
      $cate = executeSingleResult($sql);
  
      if ($cate && isset($cate['tendanhmucbv'])) {
          $title = $cate['tendanhmucbv'];
      } else {
          $title = 'Không tìm thấy danh mục';
      }
    }

    if($act=='baiblog'){
      $sql='select tenbaiblog from baiblog where id_baiblog='.$id;
      $detailblog=executeSingleResult($sql);
      $title=$detailblog['tenbaiblog'];
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
<?php
    $pageTitle = $title;
    $extraStyles = ['css/Blog.css'];
    $extraHeadContent = <<<'HTML'
    <style>
      .vertical-menu {
          width: 200px;
      }

      .vertical-menu a {
          background-color: #eee;
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none;
      }

      .vertical-menu a:hover {
          background-color: #ccc;
      }

      .vertical-menu a.active {
          color: #8B8682;
      }
    </style>
HTML;
    require_once('includes/head.php');
?>
<body>

<div id="wapper">
                <div id="header">
                    <?php require_once('frontend/header.php'); ?>
                </div>
                
                <div class="content">
     
  <aside>
        <div class="aside">
          <h4>DANH MỤC BÀI VIẾT</h4>
          <?php
              if(isset($_GET['id_danhmucbv'])) $id=$_GET['id_danhmucbv'];
              if($act=='product'){
                  $sql='select id_danhmucbv from danhmucbaiviet where id_danhmucbv='.$id;
                  $id=executeSingleResult($sql)['id_danhmucbv'];
              }
              $sql='select id_danhmucbv, tendanhmucbv from danhmucbaiviet';
              $list=executeResult($sql);
          ?>
          <div class="vertical-menu">
              <?php
                  foreach($list as $item){
                      if($item['id_danhmucbv']==$id){
                          echo '<a href="?act=danhmucbaiviet&id_danhmucbv='.$item['id_danhmucbv'].'" class="active">'.$item['tendanhmucbv'].'</a>';
                      }else{
                          echo '<a href="?act=danhmucbaiviet&id_danhmucbv='.$item['id_danhmucbv'].'">'.$item['tendanhmucbv'].'</a>';
                      }
                  }
              ?>
          </div> 
       </div>
  </aside>




   <section class="section">
         <div class="div div3">
         <a href="./blog3.php">
                  
           <div class="div2_blog">
           
               <b class="hovertext1">
               <font size="5">
               Những Tri Kỉ Cùng Đồng Hành Trong Chuyến Hành Trình Lưu Giữ Kỉ Niệm Việt
               </font>
               </b>
            
             <br>
              19/02/2024<
               <br> 
             <i>
             Sinh ra cùng dòng máu đỏ da vàng.  <br>
             Lớn lên với từng tiếng ru của mẹ. <br>
             Trưởng thành qua từng gian khó của 4000 năm lịch sử. <br>
             Mang trong mình biết bao kỉ niệm, hoài bão và tràn đầy tự hào hai tiếng “Dân Tộc”... 
             </i>
             
          
             </a>
          </div>
       </div>
       
       <div class="div div5" >
       <img class="imgblog" src="./img/blog/blog1.png" alt="hinh">
             <!-- <img class="" src="./img/blog1.png" alt="hinh"> -->
         
       </div>
       
     </section>
                </div>
                <div id="footer">
                <?php require_once('frontend/footer.php'); ?>
                </div>
        </div>
        <?php require_once('includes/scripts.php'); ?>
</body>
</html>
