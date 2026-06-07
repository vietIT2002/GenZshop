<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link type="text/css" rel="stylesheet" href="css/header12.css?v=20260607-4"/>
<link type="text/css" rel="stylesheet" href="css/responsive.css?v=20260607-4"/>
<!-- TOP HEADER -->
<div id="top-header" style="background-color: #555;">
		<header>
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone" style="color: white;"></i> 0358881702</a></li>
						<li><a href="mailto:vietqv2002@gmail.com"><i class="fa fa-envelope-o" style="color: white;"></i> vietqv2002@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"style="color: white;"></i> TP Há»“ ChÃ­ Minh</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar" style="color: white;"></i> VNÄ</a></li>
						<?php
							if(isset($_SESSION['ten_dangnhap'])){
								 $ten_dangnhap=$_SESSION['ten_dangnhap'];
								 echo '<li><a href="?act=my_account"><i class="fa fa-user-o" style="color: white;"></i> Xin chÃ o, '.$ten_dangnhap.'!</a></li>';
							}
								else echo '<li><a href="index.php?act=register"><i class="fa fa-user-o" style="color: white;"></i> Táº¡o tÃ i khoáº£n</a></li>';
						?>

						<li><a href="admin/index.php"><i class="fa fa-lock" aria-hidden="true" style="color: white;"></i> TÃ i khoáº£n Admin</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header" style="padding: 10px 0;">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">

								</a>
							</div>
						</div>


						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="get" class="search-form">
									<select class="input-select" onchange="location = this.value;">
										<option value="0">Danh Má»¥c Sáº£n Pháº©m</option>
										<?php
										$sql='select id, ten_tl from theloai';
										$list=executeResult($sql);
										foreach($list as $item){
											echo '<option value="?act=category&id='.$item['id'].'" style="color: #ffffff; background-color:#333333;">'.$item['ten_tl'].'</option>';
										}
										?>
									</select>
									<div class="search-suggestions" aria-label="Gá»£i Ã½ tÃ¬m kiáº¿m">
										<span class="search-suggestions-title">Gá»£i Ã½ nhanh</span>
										<?php
											foreach(array_slice($list, 0, 5) as $suggestion){
												echo '<a href="?act=category&id='.$suggestion['id'].'">'.$suggestion['ten_tl'].'</a>';
											}
										?>
									</div>
									<input class="input" name="search" placeholder="TÃ¬m sáº£n pháº©m..." required oninvalid="this.setCustomValidity('Vui lÃ²ng nháº­p thÃ´ng tin')" oninput="setCustomValidity('')"/>
									<button class="search-btn" type="submit" aria-label="TÃ¬m kiáº¿m">
										<i class="fa-solid fa-magnifying-glass" style="color: #333;"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">


								<!-- Cart -->
								<?php
									$qty=0;
									if(isset($_SESSION['cart'])){
										$cart=$_SESSION['cart'];
										foreach($cart as $value){
											$qty += $value['qty'];
										}
									}
								?>
								<div class="">
									<a href="?act=cart">
										<i class="fa fa-shopping-cart" style="color: #ffffff; font-size: 20px;"></i>
										<!-- <span style=" font-size: 15px; color: black;">Giá» HÃ ng</span> -->
										<div class="qty" id="qtyPro"><?=$qty?></div>
									</a>
								</div>

								<!-- /Cart -->

								<!-- CÃ i Ä‘áº·t -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa-regular fa-user" style="color: #ffffff; font-size: 20px;"></i>
										<!-- <i style="color: black;"><img src="img/users-cog-solid.svg" alt="XYZ" style=" width:30px;" /></i> -->
										<!-- <span style=" font-size: 15px; color: black;">TÃ i Khoáº£n</span> -->

									</a>
									<div class="cart-dropdown">
										<?php
											if(isset($_SESSION['ten_dangnhap'])){
												echo '<div class="cart">
														<div class="product-widget">
														<a href="index.php?act=my_account">Quáº£n LÃ½ TÃ i Khoáº£n</a>
														</div>
														<div class="product-widget">
														<a href="index.php?act=my_bill">Quáº£n LÃ½ ÄÆ¡n HÃ ng</a>
														</div>
														<div class="product-widget">
															<a href="change_password.php"> Äá»•i máº­t kháº©u </a></div>
														</div>'
													;
											}
										?>

										<div class="cart-btns">
											<a href="index.php?act=login">ÄÄƒng Nháº­p</a>
											<?php
												if(isset($_SESSION['ten_dangnhap'])){
													echo '<a href="frontend/logout.php">ÄÄƒng Xuáº¥t <i class="fa fa-arrow-circle-right"></i></a>';
												}else echo '<a href="index.php?act=register">ÄÄƒng KÃ½</a>';
											?>

										</div>
									</div>
								</div>

								<div class="" style="margin-right: 8px;">
									<a href="bot.php">
										<!-- <i class="fa-regular fa-heart" style="color: #ffffff; font-size: 20px;"></i> -->
										<i class="fa-solid fa-robot" style="font-size: 20px;"></i>
										<!-- <span style=" font-size: 15px; color: black;">Giá» HÃ ng</span> -->
										<!-- <div class="qty" id="qtyPro"><?=$qty?></div> -->
									</a>
								</div>
								<!-- /CÃ i Ä‘áº·t -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<div class="marquee-container">
			<p class="marquee-text">GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp; GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP  &ensp; GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp; GENZSHOP</p>
		</div>

		<?php require_once __DIR__ . '/navbar.php'; ?>
</div>
