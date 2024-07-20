
<style>
</style>

<div class ="Suafix">
    <!-- <a href="admin.php?vitri=left&giatri=1"><div>Hóa đơn</div> </a> 
    <a href="admin.php?vitri=left&giatri=2"><div>Thống kê</div></a> 
    <a href="admin.php?vitri=left&giatri=5"><div>Khách hàng</div></a>
    <a href="admin.php?vitri=left&giatri=3"><div>Sản phẩm</div></a>
    <a href="admin.php?vitri=left&giatri=4"><div>Thể loại</div></a>
    <a href="admin.php?vitri=left&giatri=5"><div>Phiếu nhập</div></a>
    <a href="admin.php?vitri=left&giatri=5"><div>Nhân viên</div></a>
    <a href="admin.php?vitri=left&giatri=5"><div>Tài khoản</div></a> -->
    
    <ul class="input-select2" >    
    <?php
            $sql = "select id, ten_danhmuc, icon_dm from danhmuc,quyendahmuc where `id_danhmuc`=`id` AND `id_quyen`=" . $_SESSION['quyen'] . "";
            $list = executeResult($sql);
            
            foreach ($list as $item) {
                echo '<li class="item"><a href="admin.php?muc=' . $item['id'] . '&tmuc=' . urlencode($item['ten_danhmuc']) . '" class="d-flex align-items-center">';
                echo $item['icon_dm']; // Đảm bảo rằng $item['icon_dm'] chứa mã HTML của icon
                echo '<span class="ml-2">' . $item['ten_danhmuc'] . '</span>'; // Thêm khoảng cách bằng cách sử dụng class ml-2
                echo '</a></li>';
            }
        ?>
    </ul>
</div>
