<?php
	$name=$tel=$email=$address=$passwordOld=$passwordNew=$passwordNew2='';
	if(!empty($_POST)){
		if(isset($_POST['name'])){
			$name=$_POST['name'];
		}
		if(isset($_POST['tel'])){
			$tel=$_POST['tel'];
		}
		if(isset($_POST['email'])){
			$email=$_POST['email'];
		}
		if(isset($_POST['address'])){
			$address=$_POST['address'];
		}
		if(isset($_POST['passwordOld'])){
			$passwordOld=$_POST['passwordOld'];
		}
		if(isset($_POST['passwordNew'])){
			$passwordNew=$_POST['passwordNew'];
		}
		if(isset($_POST['passwordNew2'])){
			$passwordNew2=$_POST['passwordNew2'];
		}
		$ngay_sua=date('Y/m/d H:s:i');
		if($passwordNew2!='')
		$sql='update khachhang set ten_kh="'.$name.'", mat_khau="'.$passwordNew2.'", phone="'.$tel.'", email="'.$email.'", dia_chi="'.$address.'", ngay_sua="'.$ngay_sua.'" where id='.$info['id'];
		else $sql='update khachhang set ten_kh="'.$name.'", phone="'.$tel.'", email="'.$email.'", dia_chi="'.$address.'", ngay_sua="'.$ngay_sua.'" where id='.$info['id'];
		execute($sql);
		echo '<script>alert("Cập nhật thành công.")</script>';
	}
	if(isset($_SESSION['ten_dangnhap'])){
		$ten_dangnhap=$_SESSION['ten_dangnhap'];
		$sql='select * from khachhang where ten_dangnhap="'.$ten_dangnhap.'"';
		$info=executeSingleResult($sql);
	}
	
?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active">Tài khoản của tôi</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<!-- ĐƠN HÀNG CỦA TÔI -->
<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="row">
                <p>Tài khoản của<p>
                <strong><?=$ten_dangnhap?></strong>
            </div>
            <div>
                
                <ul class="footer-links">
									<li><a href="?act=my_account" style="color:#D10024;"><i class="fa fa-user-o" style="color:black;"></i>Tài Khoản Của Tôi</a></li>
									<li ><a href="?act=my_bill" ><i class="fa fa-bars" style="color:black;"></i>Đơn Hàng Của Tôi</a></li>
									
								</ul>
            </div>
        </div>
        <div class="col col-lg-9 col-sm-12">
            <!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Thông tin tài khoản</h3>
							</div>
							<form method="post">
                            <table width=100%> 
                                <tr>
                                    <td>Họ tên</td>
                                    <td><div class="form-group">
								<input class="input" type="text" name="name" placeholder="Nhập họ tên" value="<?=$info['ten_kh']?>" required oninvalid="this.setCustomValidity('Vui lòng nhập thông tin')" oninput="setCustomValidity('')">
							</div></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><div class="form-group">
								<input class="input" type="tel" id="sdt" name="tel" placeholder="Nhập số điện thoại" value="<?=$info['phone']?>" pattern="0[0-9]{9}" title="Số điện thoại không hợp lệ (bắt đầu bằng 0 và có 10 chữ số)" onchange="checkPhone();" required oninvalid="this.setCustomValidity('Vui lòng nhập thông tin')" oninput="setCustomValidity('')">
								<div style="color:red;" id="thongbaoloisdt"></div>
							</div></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><div class="form-group">
									<input class="input" type="email" id="email" name="email" placeholder="Nhập email" value="<?=$info['email']?>" required>
							</div></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>
                                    <div class="form-group">
									<input class="input" type="text" name="address" placeholder="Nhập địa chỉ" value="<?=$info['dia_chi']?>" required oninvalid="this.setCustomValidity('Vui lòng nhập thông tin')" oninput="setCustomValidity('')">
							</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Giới tính</td>
                                    <td>
                                        <input type="radio" id="male" name="gender" value="male" checked>
                                        <label for="male">Nam</label>

                                        <input type="radio" id="female" name="gender" value="female">
                                        <label for="female">Nữ</label>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td></td>
                                    <td>
                                        <div class="form-group">
								            <div class="input-checkbox">
									            <input type="checkbox" id="create-account">
									            <label for="create-account">
										        <span></span>
										        Thay đổi mật khẩu
									            </label>
									            <div class="caption">
													<input type="text" id="pswd" style="display:none;"value=<?=$info['mat_khau']?>>
                                                    <input class="input" id="passOld" type="password" name="passwordOld" placeholder="Nhập mật khẩu cũ" style="margin-bottom:5px;" onchange="checkPass(1);">
													<div style="color:red" id="tb1"></div>
                                                    <input class="input" id="passNew1" type="password" name="passwordNew" placeholder="Nhập mật khẩu mới từ 6 đến 32 ký tự" style="margin-bottom:5px;" onchange="checkPass(2);">
													<div style="color:red" id="tb2"></div>
                                                    <input class="input" id="passNew2" type="password" name="passwordNew2" placeholder="Nhập lại mật khẩu mới" onchange="checkPass(3);">
													<div style="color:red" id="tb3"></div>
									            </div>
								            </div>
							            </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="primary-btn order-submit" >Cập nhật</button>
                                    </td>
                                </tr>
                                
                            </table></form>
							<!--<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div>
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Create Account?
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div>-->
						</div>
						<!-- /Billing Details -->
        </div>
    </div>
</div>
<!-- /ĐƠN HÀNG CỦA TÔI -->