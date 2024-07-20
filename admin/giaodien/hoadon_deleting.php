
<?php

if (!empty($_SESSION['nguoidung'])) {
    ?>
    <div class="main-content">
        <h1>Xóa hóa đơn</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include_once './connect_db.php';
                include_once './function.php';
                $result = execute("DELETE FROM `hoadon` WHERE `id` = " . $_GET['id']."");
                if (!$result) {
                    $error = "Không thể xóa hóa đơn.";
                }
                if ($error != false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Quay lại</h2>
                        
                        <a href="./admin.php?tmuc=Hóa đơn">Danh sách hóa đơn</a>
                    </div>
        <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h2>Xóa hóa đơn thành công</h2>
                        <a href="./admin.php?tmuc=Hóa đơn">Danh sách hóa đơn</a>
                    </div>
                <?php } ?>
    <?php } ?>
        </div>
    </div>
    <?php
}

?>