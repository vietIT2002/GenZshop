<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        if(isset($_POST['timebd'])&&isset($_POST['timekt']))
        {if(($_POST['timebd']=='')&&($_POST['timekt']==''))
        $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` )");
        if(($_POST['timebd']=='')&&(!empty($_POST['timekt'])))
        $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` <= DATE_ADD('".$_POST['timekt']."',INTERVAL '1' DAY)");
        if(($_POST['timekt']=='')&&(!empty($_POST['timebd'])))
        $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` >= '".$_POST['timebd']."'");
        if(!empty($_POST['timebd'])&&(!empty($_POST['timekt'])))
        $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` <= DATE_ADD('".$_POST['timekt']."',INTERVAL '1' DAY) AND `hoadon`.`ngay_tao` >= '".$_POST['timebd']."'");
        }
        else $totalRecords = mysqli_query($con, "SELECT * FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` )");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        if(isset($_POST['timebd'])&&isset($_POST['timekt']))
        {if(($_POST['timebd']=='')&&($_POST['timekt']==''))
        $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`,`ten_kh`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if(($_POST['timebd']=='')&&(!empty($_POST['timekt'])))
        $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`,`ten_kh`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` <= DATE_ADD('".$_POST['timekt']."',INTERVAL '1' DAY) ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if(($_POST['timekt']=='')&&(!empty($_POST['timebd'])))
        $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`,`ten_kh`,`tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` >= '".$_POST['timebd']."' ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if(!empty($_POST['timebd'])&&(!empty($_POST['timekt'])))
        $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`,`ten_kh`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) WHERE `hoadon`.`ngay_tao` <= DATE_ADD('".$_POST['timekt']."',INTERVAL '1' DAY) AND `hoadon`.`ngay_tao` >= '".$_POST['timebd']."' ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        // else $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id` FROM (hoadon LEFT JOIN nhanvien ON`id_nhanvien`=`nhanvien`.`id` ) ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `khachhang`.`ten_kh` AS `ten_kh`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`,`trang_thai`,`ten_nv`,`nhanvien`.`id` 
                        FROM (hoadon 
                        LEFT JOIN nhanvien ON `id_nhanvien` = `nhanvien`.`id` 
                        LEFT JOIN khachhang ON `id_khachhang` = `khachhang`.`id`) 
                        ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        mysqli_close($con);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý hóa đơn</title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
    <body>
    <div class="main-content">
<br> 
            <h1>HÓA ĐƠN</h1> <br> 
            <form action="./admin.php?muc=1&tmuc=Hóa%20đơn" method="POST">
            <div style=" text-align:left">
            <input type="date" name="timebd" >
            <input type="date" name="timekt" > 
            <input type="submit" value="Lọc">
            </div>
            <div class="product-items">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Id</th>
                                <th>Mã khách hàng</th>
                                <th>Tên Khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Ngày tạo</th>
                                <th>Tên nhân viên</th>
                                <th>Trạng thái</th>
                                <th>Xem chi tiết</th>
                                <th>Xác nhận</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($hoadon)) {
                            ?>
                                <tr>       
                                    <td><?= $row['idhoadon'] ?></td>                
                                    <td><?= $row['id_khachhang'] ?></td>
                                    <td><?= $row['ten_kh'] ?></td>
                                    <td><?= $row['tong_tien'] ?></td>
                                    <td><?= $row['ngay_tao'] ?></td>
                                    <td><?= $row['ten_nv'] ?></td>
                                    <td><?php if($row['trang_thai']=="1")echo "Đã xác nhận"; else echo "Chưa xác nhận";?></td>
                                    <td><a href="./admin.php?act=cthoadon&id=<?=$row['idhoadon']?>">Xem chi tiết</a></td>  
                                    <td><a href="./xulythem.php?act=xnhd&id=<?=$row['idhoadon']?>&cuser=<?=$row['ten_nv']?>&iduser=<?=$_SESSION['idnhanvien']?>">Xác nhận</a></td>  
                                    <td><?php if($row['trang_thai']=="0"){ ?><a href="./admin.php?act=xoahd&id=<?= $row['idhoadon'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a><?php } ?>  </td>                
                                    <div class="clear-both"></div>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div></form>
        <?php
        include './pagination.php';
        ?>
        <div class="clear-both"></div>
        </div>
    <?php
    
    ?>
    </body>
    </html>
