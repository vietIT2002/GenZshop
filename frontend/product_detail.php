<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery-3.6.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script>
	        $(document).ready(function() {
            var i = 2;
            $("#formDangKy").click(function() {
                $("#Mymodal").modal()
            })
		})
</script>
<style>
#product-main-img {
    border: 2px solid #ddd; 
    border-radius: 4px; 
    overflow: hidden; 
	padding: 5px;
}
/* Phần Product Details */
.col-md-5 .product-details {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.col-md-5 .product-name {
    font-size: 2em;
    color: #333;
    margin-bottom: 10px; 

}

.col-md-5 .product-rating {
    color: #ffc107;
}

.col-md-5 .product-price {
    font-size: 1.2em;
}

.col-md-5 .qty-label {
    margin-top: 15px;
}

.col-md-5 .input-number {
    display: flex;
    align-items: center;
}

.col-md-5 .add-to-cart-btn {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    cursor: pointer;
}


.col-md-5 .product-details .textt{
	font-size: 1.2em;
	border-bottom: 0.5px solid #000;
}

.col-md-5 .product-links {
    list-style: none;
    padding: 0;
    margin: 10px 0;
}

.col-md-5 .product-links li {
    display: inline-block;
    margin-right: 10px;
}

.col-md-5 .product-links a:hover {
    color: #4caf50;
}


#fonnt {
    background-color: red; 
    color: #fff; 
    padding: 10px 15px; 
    border: 1px solid #ff4d4d; 
    border-radius: 4px;
    cursor: pointer; 
}

#fonnt:hover {
    background-color: #cc4d00; 
    border: 1px solid #cc4d00;  
}


/* Phần Product Tab */
.col-md-12 #product-tab {
    margin-top: 20px;
}

.col-md-12 .tab-nav {
    list-style: none;
    padding: 0;
}

.col-md-12 .tab-nav li {
    display: inline-block;
    margin-right: 20px;
}

.col-md-12 .tab-nav li a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    font-size: 1.2em;
}

.col-md-12 .tab-nav li.active a {
    color: #4caf50;
}

.col-md-12 .tab-content {
    margin-top: 20px;
}

.col-md-12 .tab-content p {
    margin-top: 10px;
}
    #tab1 {
        border: 1px solid #ccc;
        padding: 10px;
}
.chufont{
	font-family: 'Lucida Console',sans-serif;
}

#formDangKy:hover{
	text-decoration: underline;
}

/* .size {
     margin-right: 10px;
}

.size:first-of-type {
     margin-left: 40px;
}

.sizes,
{
    text-transform: UPPERCASE;
    font-weight: bold;
}

.size {
        cursor: pointer;
    }
    
    .size:focus, .size:active {
        outline: none; /* loại bỏ đường viền khi được chọn */
        /* background-color: lightblue; màu nền khi được chọn */
/* } */ 

.sizes {
    display: flex;
    align-items: center;
    padding-right: 10px; 
}

.size {
    padding: 8px 10px;
    margin-right: 10px;
    border: 1px solid #ccc;
    cursor: pointer;
}

.size:hover {
    background-color: #f0f0f0;
}

.size.selected {
    background-color: lightgray;
}


</style>
<!-- Lấy tên thể loại khi biết id sản phẩm -->
<?php
	$sql='select ten_sp, ten_tl, theloai.id as id_tl from sanpham, theloai where sanpham.id='.$id.' and theloai.id=sanpham.id_the_loai';
	$listcate_pro=executeSingleResult($sql);
?>
<!-- /Lấy tên thể loại khi biết id sản phẩm -->

<!-- Lấy thông tin chi tiết của sản phẩm -->
<?php
	$sql='select * from sanpham where id='.$id;
	$detailproduct=executeSingleResult($sql);
?>
<!-- /Lấy thông tin chi tiết của sản phẩm -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang Chủ</a></li>
							<li><a href="?act=category">Danh Mục Sản Phẩm</a></li>
							<li><a href="?act=category&id=<?=$listcate_pro['id_tl']?>"><?=$listcate_pro['ten_tl']?></a></li>
							<li class="active"><?=$listcate_pro['ten_sp']?></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
						<?php
							$sql='select hinh_anh from hinhanhsp where id_sp='.$id;
							$listImg=executeResult($sql);
							foreach($listImg as $item){
								echo'<div class="product-preview">
								<img src="./img/'.$item['hinh_anh'].'" alt="">
							</div>';
							}
						?>
							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
						<?php
							foreach($listImg as $item){
								echo'<div class="product-preview">
								<img src="./img/'.$item['hinh_anh'].'" alt="">
							</div>';
							}
						?>
							
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					
					
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?= $detailproduct['ten_sp']?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#"><?=$detailproduct['sl_da_ban']?> Đã bán</a>
							</div>
							<div>
								<h3 class="product-price"><?= currency_format($detailproduct['don_gia'])?> <del class="product-old-price"><?= currency_format($detailproduct['gia_goc'])?></del></h3>
								<span class="product-available">còn hàng</span>
							</div>
							<div class="add-to-cart">
                            <div class="qty-label">
									Số Lượng
									<div class="input-number">
										<?php
											$soLuongHienCoTrongGioHang=0;
											if(isset($_SESSION['cart'][$id]))
												$soLuongHienCoTrongGioHang=$_SESSION['cart'][$id]['qty'];
										?>
										<input type="number" id="qtyAdd" value=1 onchange="kiemTraSoLuong(<?=$detailproduct['so_luong']-$soLuongHienCoTrongGioHang?>);">
										<div id="sl_tonkho<?=$id?>" style="display:none"><?=($detailproduct['so_luong']-$soLuongHienCoTrongGioHang)?></div>
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
							</div>

							<div>
								<button style="font-style: italic; background-color: transparent; border: none; padding:10px"  class="" id="formDangKy"><i class="fa-solid fa-ruler"></i>Hướng dẫn chọn size</button>
							</div>

					
							<div class="sizes">
								<h5>Chọn size
								<span class="size" tabindex="0" data-toggle="tooltip" title="cỡ Nhỏ" data-size="s">S</span>
								<span class="size" tabindex="0" data-toggle="tooltip" title="cỡ Trung bình" data-size="m">M</span>
								<span class="size" tabindex="0" data-toggle="tooltip" title="cỡ Lớn" data-size="l">L</span>
								<span class="size" tabindex="0" data-toggle="tooltip" title="cỡ Đại" data-size="xl">XL</span>
								</h5>
							</div><br>
							
							<script>
								document.addEventListener('DOMContentLoaded', function() {
								var sizes = document.querySelectorAll('.size');

								sizes.forEach(function(size) {
									size.addEventListener('click', function() {
										// Loại bỏ lớp selected từ tất cả các phần tử kích cỡ
										sizes.forEach(function(s) {
											s.classList.remove('selected');
										});
										// Thêm lớp selected cho phần tử đã được chọn
										size.classList.add('selected');
									});
								});
							});
							</script>


							<!-- <div>
							<button id="fonnt" class="btn btn-default btn-sm btn-outline-danger" onclick="addCart(<?=$id?>,1);themThanhCong(<?=$id?>);"><i class="fa fa-shopping-cart"></i> <span id="messAddCart<?=$id?>">Thêm vào giỏ hàng</span></button>
							<a class="review-link" href="#"><?=$detailproduct['so_luong']?> sản phẩm còn lại</a>
							</div> -->
							
							<div>
								<button id="fonnt" class="btn btn-default btn-sm btn-outline-danger" onclick="addCartWithCheck(<?=$id?>, 1);"><i class="fa fa-shopping-cart"></i> <span id="messAddCart<?=$id?>">Thêm vào giỏ hàng</span></button>
								<a class="review-link" href="#"><?=$detailproduct['so_luong']?> sản phẩm còn lại</a>
								<div id="errorMessage" style="color: red; display: none;">Vui lòng chọn một kích cỡ</div>
							</div>
							<div id="tbQty" style="color:red"></div>

							<script>
								function addCartWithCheck(id, quantity) {
									var selectedSize = document.querySelector('.size.selected');
									var errorMessage = document.getElementById('errorMessage');
									if (!selectedSize) {
										errorMessage.style.display = 'block'; 
										return;
									} else {
										errorMessage.style.display = 'none'; 
									}
									addCart(id, quantity);
									themThanhCong(id);
								}
							</script>
							

							<ul class="product-links">
								<li>Danh mục:</li>
								
								<li><a href="?act=category&id=<?=$listcate_pro['id_tl']?>"><?=$listcate_pro['ten_tl']?></a></li>
								<li><a href=""><?=$listcate_pro['ten_sp']?></a></li>
							</ul>

							<ul class="product-links">
								<li>Chia sẽ:</li>
								<li><a href="#"><i class="fa-brands fa-facebook-f"></i></i></a></li>
								<li><a href="#"><i class="fa-solid fa-x"></i></a></li>
								<li><a href="#"><i class="fa-brands fa-instagram"></i></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->
				

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Thông Tin Sản Phẩm</a></li>
								
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p class="chufont"><?=$detailproduct['NoiDungChiTiet']?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>

			<!-- /container -->
		</div>
		<!-- /SECTION -->

        <!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Các sản phẩm tương tự</h3>
						</div>
					</div>
					<!-- product -->
					<?php
						$sql='select * from sanpham where id_the_loai='.$listcate_pro['id_tl'].' limit 2, 4';
						$list=executeResult($sql);
						foreach($list as $item){
							if($item['so_luong']==0 && $item['trangthai']==0){
								echo '<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img" style="height:250px">
										<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
										<div class="product-label">
											
											<span class="new">HẾT HÀNG</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
										<h3 class="product-name"><a href="index.php?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
										<h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"> SẢN PHẨM ĐÃ HẾT</button>
									</div>
								</div>
							</div>';
							}else if($item['trangthai']==0)
							echo'<div class="col-md-3 col-xs-6">
							<div class="product" >
								<div class="product-img">
									<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
									<div class="product-label">
										
										<span class="new">NEW</span>
									</div>
								</div>
								<div class="product-body">
									<p class="product-category">sản phẩm</p>
									<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
									<h4 class="product-price">'.currency_format($item['don_gia']).' </h4>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn" onclick="addCart('.$item['id'].',1); themThanhCong('.$item['id'].'); "><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
								</div>
							</div>
						</div>';
						}
					?>
					<!-- /product -->

					

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

			<div class="modal" id="Mymodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
					<button type="button" class="close" data-dismiss="modal" style="display: flex;">&times;</button>
                        <h3 style="text-align: center">Hướng dẫn chọn size</h3>
                       
                    </div>
					
					<div class="modal-body">
					<img src="./img/chon_size.jpg" alt="" width="100%">
					</div>

                </div>
            </div>
        </div>
		</div>
		<!-- /Section -->