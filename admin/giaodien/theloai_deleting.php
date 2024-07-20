<?php

if (!empty($_SESSION['nguoidung'])) {
    ?>
    <div class="main-content">
        <h1>Xóa thể loại</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include_once './connect_db.php';
                include_once './function.php';
                $result = execute("DELETE FROM `theloai` WHERE `id` = " . $_GET['id']."");
                if (!$result) {
                    $error = "Không thể xóa thể loại.";
                }
                if ($error = false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Thất bại</h2>
                        
                        <a href="./admin.php?tmuc=Thể loại">Danh sách thể loại</a>
                    </div>
        <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h2>Xóa thể loại thành công</h2>
                        <a href="./admin.php?tmuc=Thể loại">Danh sách thể loại</a>
                    </div>
                <?php } ?>
    <?php } ?>
        </div>
    </div>
    <?php
}

?>