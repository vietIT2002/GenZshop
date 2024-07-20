<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</style>

<style>
	#footer {
    font-family: 'Tohoma', sans-serif;
    background-color: #333333;
    color: #ffffff;
    padding: 20px 0;
    margin-top: auto;
    width: 100%;
    transition: background-color 0.3s ease;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 1;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    gap: 10px; 
    background-color: #333333;

}

.footer-column {
    flex: 1;
    max-width: 350px;
    padding: 15px;
    box-sizing: border-box;
	text-align: left;
}

.footer-column h3 {
    color:  #ffffff;
    border-bottom: 1px solid #fff; 
    padding-bottom: 8px;
}

.footer-column p,
.footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
    line-height: 1.8;
}

.footer-column a {
    color: #ffff;
    text-decoration: none;
    transition: color 0.3s;

}
.footer-column a:hover {
    text-decoration: underline; 
}

.logo-container i {
    max-width: 25px; 
    height: auto; 
    margin: 6px; 
}

.footer-column .logo-container i {
    font-size: 24px;
} 

.centered-image {
    display: block;
    margin: 0 auto; 
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }

    .footer-column {
        max-width: 100%;
        margin-bottom: 15px;
    }
}


</style>
    <div class="footer-container">
        <div class="footer-column">
            <h3></i>Thông tin liên hệ</h3>
            <p><i class="fa-solid fa-shop" style="color: #fcfcfd;"></i>&#160;&#160;Cửa hàng quần áo GenzShop</p><br>
            <p><i class="fa-solid fa-location-dot" style="color: #fafafa;"></i>&#160;&#160;Địa chỉ: 12 Nguyễn Văn Bảo, phường 4, Gò Vấp, TP.HCM</p><br>
            <p><i class="fa-solid fa-envelope" style="color: #fcfcfd;"></i>&#160;&#160;Email: GenzShop@gmail.com</p><br>
            <p><i class="fa-solid fa-phone">&#160;&#160;</i>Liên hệ: 1900.746.384</p><br>
        </div>

        <div class="footer-column">
            <h3>Chính sách cửa hàng</h3>
            <ul>
                <li><a href="private.php"><i class="fa-solid fa-play" style="color: #d1d3d6;font-size: 8px"></i></i>&#160;&#160;Chính sách bảo mật</a></li><br>
                <li><a href="#"><i class="fa-solid fa-play" style="color: #d1d3d6; font-size: 8px"></i></i>&#160;&#160;Điều khoản sử dụng</a></li><br>
                <li></i><a href="shipper.php"><i class="fa-solid fa-play" style="color: #d1d3d6; font-size: 8px"></i></i>&#160;&#160;Chính sách vận chuyển</a></li><br>
                <li><a href="BaoHanh.php"><i class="fa-solid fa-play" style="color: #d1d3d6;font-size: 8px"></i></i>&#160;&#160;Chính sách bảo hành</a></li><br>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Theo dõi chúng tôi</h3>
            <p>Kênh truyền thông và kết nối với khách hàng</p>
            <div class="logo-container">
                <a href="#" target="_blank">
                    <i class="fa-brands fa-facebook" style="color: #ffffff;"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fa-brands fa-instagram" style="color: #fafafa;"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fa-brands fa-tiktok" style="color: #ffffff;"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fa-brands fa-pinterest" style="color: #ffffff;"></i>
                </a>
                <a>
                    <i class="fa-brands fa-youtube" style="color: #f7f7f7;"></i>
                </a>
                
            </div><br>
            <div class="logo-image">
                <a href="#">
                    <img src="./img/GENZSHOP.jpg" alt="" style="height: 150px; width: 100%">
                </a>
            </div>
        </div>
    </div>
