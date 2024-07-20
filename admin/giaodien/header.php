<style></style>
<!-- MAIN HEADER -->
		<div id="nd">
			<?php 
				include('./connect_db.php');
				include('./function.php');	
				$text = "<i class='fa fa-user fa-fw'> </i>" . $_SESSION['nguoidung'];
				echo '<div style="text-transform:uppercase;margin-right:5px">' .$text ."</div>";
				
			?>
		</div>
		<div id="nd1">
				<a   href="../index.php"> <i class="fa fa-home"> &nbsp;</i>Trang chủ</a> 
				
				<a href="./index.php?logout=yes" ><i class="fa fa-sign-out" aria-hidden="true"> &nbsp; </i>Đăng xuất</a>
				
		</div>