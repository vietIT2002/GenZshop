<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<title>Document</title>
	<style>
		.product .add-to-cart
		{
			background-color: #7f0000;
		}
		
		.slideshow-container 
		{
			max-width: 100%;
			position: relative;
			margin: auto;
			padding-top: -30px;
			height: 100%;
		}

		.dot1 
		{
			height: 15px;
			width: 15px;
			margin: 0 2px;
			background-color: #bbb;
			border-radius: 50%;
			display: inline-block;
			transition: background-color 0.6s ease;
		}
		.activ 
		{
			background-color: #000000;
		}
		.fade 
		{
			animation-name: fade;
			animation-duration: 1.5s;
		}
		.img-fluid{
			border: 1px solid #ccc;
			max-width: 100%;
		}

	</style>
</head>
<body>
	<!-- SECTION -->
	<div class="slideshow-container">
		<div class="mySlides1">
			<img src="./img/3.png" style="width:100%">
		</div>

		<div class="mySlides1">
			<img src="./img/4.png" style="width:100%">
		</div>

		<div class="mySlides1">
			<a href="./index.php?act=category&id=3"><img src="./img/5.png" style="width:100%"></a>
		</div>

		<div style="text-align:center;position: absolute; bottom: 10px; width: 100%;">
			<span class="dot1"></span> 
			<span class="dot1"></span> 
			<span class="dot1"></span> 
		</div>
	</div>

<script>
	let slideIndex = 0;
	showSlides();

	function showSlides() {
	let i;
	let slides = document.getElementsByClassName("mySlides1");
	let dots = document.getElementsByClassName("dot1");
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	}
	slideIndex++;
	if (slideIndex > slides.length) {slideIndex = 1}    
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" activ", "");
	}
	slides[slideIndex-1].style.display = "block";  
	dots[slideIndex-1].className += " activ";
	setTimeout(showSlides, 4000);
	}
</script>
			<!-- container -->
			<div class="container" style="width:90%">

			<!-- Banner -->

				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/Man_Fashion.png" alt="">
							</div>
							<div class="shop-body">
								<a href="Blog.php"> <h3 style=''>Tin thời trang</h3> </a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner-thuonghieu.jpg" alt="">
							</div>
						<div class="shop-body">
							<a href="thuonghieu.php"> <h3>Thương Hiệu</h3> </a>
						</div>
					</div>
				</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner_lienhe.jpg" alt="">
							</div>
							<div class="shop-body">
								<a href="Lienhe.php"><h3>Liên Hệ</h3></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div><br>
			<!-- /container -->
			<div class="container-fluid">
				<h2 class="text-center">XU HƯỚNG THỜI TRANG</h2>
				<div class="row">
					<div class="col-sm-4 mb-4">
						<img src="./img/slide11.jpg" alt="Mô tả ảnh của bạn" id="image1" class="img-fluid img-transition" style="max-width: 100%;">
					</div>
					<div class="col-sm-4 mb-4">
						<img src="./img/slide12.jpg" alt="Mô tả ảnh của bạn" id="image2" class="img-fluid img-transition" style="max-width: 100%;">
					</div>
					<div class="col-sm-4 mb-4">
						<img src="./img/anh202.jpg" alt="Mô tả ảnh của bạn" id="image3"  class="img-fluid img-transition" style="max-width: 100%;">
					</div>
				</div>
			</div>
			<script>
    function changeImage() {
        var img1 = document.getElementById('image1');
        var img2 = document.getElementById('image2');
        var img3 = document.getElementById('image3');

        setTimeout(function() {
            img1.src = './img/slide19.jpg';
            img1.classList.remove('fade-in');
            img1.classList.add('fade-out');
            setTimeout(function() {
                img1.src = './img/slide11.jpg'; // Chuyển về ảnh cũ
                img1.classList.remove('fade-out');
                img1.classList.add('fade-in');
            }, 5000); // Sau 3 giây
        }, 5000); // Sau 3 giây

        setTimeout(function() {
            img2.src = './img/slide15.jpg';
            img2.classList.remove('fade-in');
            img2.classList.add('fade-out');
            setTimeout(function() {
                img2.src = './img/slide12.jpg'; // Chuyển về ảnh cũ
                img2.classList.remove('fade-out');
                img2.classList.add('fade-in');
            }, 8000); // Sau 5 giây
        }, 8000); // Sau 5 giây

        setTimeout(function() {
            img3.src = './img/anh303.jpg';
            img3.classList.remove('fade-in');
            img3.classList.add('fade-out');
            setTimeout(function() {
                img3.src = './img/anh202.jpg'; // Chuyển về ảnh cũ
                img3.classList.remove('fade-out');
                img3.classList.add('fade-in');
            }, 7000); // Sau 4 giây
        }, 7000); // Sau 4 giây

        // Gọi lại chính hàm này để lặp lại quá trình
        setTimeout(changeImage, 9000); // 9000 = 3000 (cho ảnh 1) + 5000 (cho ảnh 2) + 4000 (cho ảnh 3)
    }

    // Bắt đầu quá trình
    changeImage();
</script>

    <!-- /Banner -->
		</div>
		<!-- /SECTION -->
        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title  text-center">
							<h3 class="title text-center">Sản Phẩm</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs" style="padding-bottom: 25px">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
                                        <!-- product -->
                                        <?php
                                        $sql='select * from sanpham where 1 limit 4, 5';
                                        $list=executeResult($sql);
                                        foreach($list as $item){
											if($item['so_luong']==0 && $item['trangthai']==0){ // Hết hàng 
												echo '
												<div class="product">
												<div class="product-img" style="height:250px">
													<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
													<div class="product-label">
														
														<span class="new">HẾT HÀNG</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">SẢN PHẨM</p>
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
													<button class="add-to-cart-btn" >SẢN PHẨM ĐÃ HẾT</button>
												</div>
											</div>';
											}else if($item['trangthai']==0)// Còn hàng
                                            echo '<div class="product" >
											<div class="product-img" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
												<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
												<div class="product-label">
													
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
												<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
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
												<button class="add-to-cart-btn" onclick="addCart('.$item['id'].',1);themThanhCong('.$item['id'].');"><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
											</div>
										</div>';
                                        }
                                        ?>
										<!-- /product -->
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

</body>
</html>

