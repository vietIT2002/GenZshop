<?php

if (!empty($_SESSION['nguoidung'])) {
    ?>
    <div class="main-content">
        <h1>Xóa bài blog</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id_baiblog']) && !empty($_GET['id_baiblog'])) {
                include_once './connect_db.php';
                include_once './function.php';
                // $result7=mysqli_query($con,"SELECT `id_the_loai` FROM `sanpham` WHERE `id`=".$_GET['id']."");
                // $r7=mysqli_fetch_array($result7);
                // $result8 = mysqli_query($con,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`=".$r7['id_the_loai']."");
                // $r9=mysqli_fetch_array($result8);
                // $result9 = mysqli_query($con,"UPDATE `theloai` SET `tong_sp`=".$r9['cid_the_loai']." WHERE `id`=".$r7['id_the_loai']."");
                $result = mysqli_query($con, "DELETE FROM `baiblog` WHERE `id_baiblog` = " . $_GET['id_baiblog']."");
                if (!$result) {
                    $error = "Không thể xóa bài blog.";
                }
                mysqli_close($con);
                if ($error != false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Thất bại</h2>
                        <a href="./admin.php?tmuc=Bài blog">Danh sách bài blog</a>
                    </div>
        <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h2>Xóa bài blog thành công</h2>
                        <a href="./admin.php?tmuc=Bài blog">Danh sách bài blog</a>
                    </div>
                <?php } ?>
    <?php } ?>
        </div>
    </div>
    <?php
}

?>