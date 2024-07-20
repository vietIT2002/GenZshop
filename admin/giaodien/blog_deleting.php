<?php
if (!empty($_SESSION['nguoidung'])) {
    ?>
    <div class="main-content">
        <h1>Xóa danh mục bài viết</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id_danhmucbv']) && !empty($_GET['id_danhmucbv'])) {
                include_once './connect_db.php';
                include_once './function.php';
                $result = execute("DELETE FROM `danhmucbaiviet` WHERE `id_danhmucbv` = " . $_GET['id_danhmucbv']."");
                if (!$result) {
                    $error = "Không thể xóa danh mục bài viết.";
                }
                if ($error = false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Thất bại</h2>
                        
                        <a href="./admin.php?tmuc=Danh mục bài viết">Danh sách danh mục bài viết</a>
                    </div>
        <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h2>Xóa danh mục thành công</h2>
                        <a href="./admin.php?tmuc=Danh mục bài viết">Danh sách danh mục bài viết</a>
                    </div>
                <?php } ?>
    <?php } ?>
        </div>
    </div>
    <?php
}

?>