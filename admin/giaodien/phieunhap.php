
<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if(isset($_GET['sapxep'])){
            if($_GET['sapxep']=='idgiam')
            $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='idtang')
            $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='tggiam')
            $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='tgtang')
            $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`ngay_tao` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='tiengiam')
            $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`tong_tien` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='tientang')
            $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`tong_tien` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        mysqli_close($con);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    </head>
    <body>
    <div class="main-content">
<br> 
            <h1>Phiếu nhập</h1>
            <br> 
            <div class="product-items">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>ID<a href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=idgiam"><i class="fa fa-arrow-down"></i></a><a href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=idtang"><i class="fa fa-arrow-up"></i></a></th>
                                <th>Tên công ty</th>
                                <th>Nhân viên đảm nhiệm</th>
                                <th>Thời gian<a href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=tggiam"><i class="fa fa-arrow-down"></i></a><a href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=tgtang"><i class="fa fa-arrow-up"></i></a></th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Ghi chú</th>
                                <th>Tổng tiền<a href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=tiengiam"><i class="fa fa-arrow-down"></i></a><a href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=tientang"><i class="fa fa-arrow-up"></i></a></th>
                                <th>Xem chi tiết</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($phieunhap)) {
                            ?>
                                <tr>                 
                                    <td><?= $row['idpn'] ?></td>         
                                    <td><?= $row['nguoi_nhan'] ?></td>
                                    <td><?= $row['ten_nv'] ?></td>
                                    <td><?= $row['ntpn'] ?></td>
                                    <td><?= $row['sdt'] ?></td>
                                    <td><?= $row['diachi'] ?></td>
                                    <td><?= $row['ghichu'] ?></td>
                                    <td><?= $row['tong_tien'] ?></td>
                                    <td><a href="./admin.php?act=ctphieunhap&id=<?=$row['idpn']?>">Xem chi tiết</a></td>
                                    <td><a href="./admin.php?act=xoapn&id=<?= $row['idpn'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a></td>                              
                                    <div class="clear-both"></div>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        include './pagination.php';
        ?>
        <div class="clear-both"></div>
        </div>
    <?php
    }
    ?>
    </body>
    </html>
