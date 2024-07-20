<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên </title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">
<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `cthoadon`,`sanpham` WHERE `id_sanpham`=`sanpham`.`id`  AND `id_hoadon`=" .$_GET['id']. "");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $cthoadon = mysqli_query($con, "SELECT `id_hoadon`, `id_sanpham`, `cthoadon`.`so_luong`,`sanpham`.`id`,`ten_sp`,`don_gia`  FROM `cthoadon`,`sanpham` WHERE `id_sanpham`=`sanpham`.`id` AND `id_hoadon`=" .$_GET['id']. " ORDER BY `cthoadon`.`id_hoadon` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        mysqli_close($con);
    ?>
<button ><a href="./admin.php?muc=1&tmuc=Hóa%20đơn"><i>Quay lại</i></a></button>
<div class="clear-both"></div>
<div class="main-content">
            <h1>Chi tiết hóa đơn</h1>
            <div class="product-items">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($cthoadon)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['ten_sp'] ?></td>
                                    <td><?= $row['so_luong'] ?></td>
                                    <td><?= $row['don_gia'] ?></td>                      
                                    <div class="clear-both"></div>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        include './pagination2.php';
        ?>
        <div class="clear-both"></div>
        </div>
    <?php
    }
    ?>