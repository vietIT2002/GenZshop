<?php
$genzFooterBase = '';
if (isset($_SERVER['SCRIPT_NAME']) && strpos($_SERVER['SCRIPT_NAME'], '/admin/') !== false) {
    $genzFooterBase = '../';
}
?>


<div class="footer-container">
    <div class="footer-column">
        <h3>Thông tin liên hệ</h3>
        <p><i class="fa-solid fa-shop" style="color: #fcfcfd;"></i>&#160;&#160;Cửa hàng quần áo GenzShop</p><br>
        <p><i class="fa-solid fa-location-dot" style="color: #fafafa;"></i>&#160;&#160;Địa chỉ: 12 Nguyễn Văn Bảo, phường 4, Gò Vấp, TP.HCM</p><br>
        <p><i class="fa-solid fa-envelope" style="color: #fcfcfd;"></i>&#160;&#160;Email: GenzShop@gmail.com</p><br>
        <p><i class="fa-solid fa-phone"></i>&#160;&#160;Liên hệ: 1900.746.384</p><br>
    </div>

    <div class="footer-column">
        <h3>Chính sách cửa hàng</h3>
        <ul>
            <li><a href="<?php echo $genzFooterBase; ?>private.php"><i class="fa-solid fa-play" style="color: #d1d3d6;font-size: 8px"></i>&#160;&#160;Chính sách bảo mật</a></li><br>
            <li><a href="<?php echo $genzFooterBase; ?>rules.php"><i class="fa-solid fa-play" style="color: #d1d3d6;font-size: 8px"></i>&#160;&#160;Điều khoản sử dụng</a></li><br>
            <li><a href="<?php echo $genzFooterBase; ?>shipper.php"><i class="fa-solid fa-play" style="color: #d1d3d6;font-size: 8px"></i>&#160;&#160;Chính sách vận chuyển</a></li><br>
            <li><a href="<?php echo $genzFooterBase; ?>BaoHanh.php"><i class="fa-solid fa-play" style="color: #d1d3d6;font-size: 8px"></i>&#160;&#160;Chính sách bảo hành</a></li><br>
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
            <a href="#" target="_blank">
                <i class="fa-brands fa-youtube" style="color: #f7f7f7;"></i>
            </a>
        </div><br>
        <div class="logo-image">
            <a href="<?php echo $genzFooterBase; ?>index.php">
                <img class="footer-logo-img" src="<?php echo $genzFooterBase; ?>img/GENZSHOP.jpg" alt="GenZShop">
            </a>
        </div>
    </div>
</div>
