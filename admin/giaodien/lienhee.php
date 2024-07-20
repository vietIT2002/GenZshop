<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên </title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `lien_he`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        
        $lienhe = mysqli_query($con, "SELECT * FROM `lien_he` ORDER BY `id_lienhe` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
}
        
    mysqli_close($con);
?>
<div class="main-content">
    <br> 
            <h1> Liên hệ khách hàng </h1>
   
            <div class="product-items">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover" >
                        <thead >
                            <tr>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung liên hệ</th>
                                <th>thời gian</th>
                                <th>Trạng thái</th>
                                <th>Xác nhận</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($lienhe)) {
                            ?>
                                <tr>                            
                                    <td><?= $row['ho_ten'] ?></td>
                                    <td><?= $row['email_ss'] ?></td>
                                    <td><?= $row['sdt'] ?></td>
                                    <td><?= $row['tieu_de'] ?></td>  
                                    <td><?= $row['noidung'] ?></td> 
                                    <td><?= $row['ngay_gui'] ?></td>
                                    <td><?php if($row['trang_thai']=="1")echo "Đã xử lý"; else echo "Chưa xử lý";?></td>
                                    <td>
                                        <?php if($row['trang_thai'] == "1"): ?>
                                            
                                        <?php else: ?>
                                            <a href="./xulythem.php?act=lhtttc&id=<?= $row['id_lienhe'] ?>">Xác nhận</a>
                                        <?php endif; ?>
                                    </td>
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
        </center>
        </div>
    <?php
    ?>
</body>
</html>

