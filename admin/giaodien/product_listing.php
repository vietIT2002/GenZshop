<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm </title>
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
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 5;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if (isset($_GET['sapxep'])) {
            if ($_GET['sapxep'] == 'idgiam')
                $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'idtang')
                $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tengiam')
                $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `ten_sp` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tentang')
                $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `ten_sp` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tongiam')
                $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `so_luong` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tontang')
                $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `so_luong` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'bangiam')
                $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `sl_da_ban` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'bantang')
                $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `sl_da_ban` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        mysqli_close($con);
    ?> 
<div class="main-content">
    <br> 
            <h1> DANH SÁCH SẢN PHẨM</h1>
             
            
            <div class="buttons">
                    <a   href="admin.php?act=add">
                        <i class="fa fa-plus" aria-hidden="true" >  </i> Thêm mới
                     

                       </a>
                
    </div> 
            <div class="product-items">
                <div class="table-responsive-xl ">
                    <table class="table table-bordered table-striped table-hover" >
                        <thead >
                            <tr>
                            <th class="bg">ID<a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idgiam"><i class="pdl-5px fa fa-arrow-down"></i></a><a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idtang"><i class="fa fa-arrow-up"></i></a></th>
                                <th class="bg">Ảnh </th>
                                <th class="bg">Tên sản phẩm<a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tengiam"><i class="pdl-5px fa fa-arrow-down"></i></a><a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tentang"><i class="fa fa-arrow-up"></i></a></th>
                                <th class="bg">Số lượng<a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tongiam"><i class="pdl-5px fa fa-arrow-down"></i></a><a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tontang"><i class="fa fa-arrow-up"></i></a></th>
                                <th class="bg">Giá gốc<a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bangiam"><i class="pdl-5px fa fa-arrow-down"></i></a><a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bantang"><i class="fa fa-arrow-up"></i></a></th>
                                <!-- <th class="bg">Trạng thái</th> -->
                                <th class="bg">Đơn Giá</th>
                                <th class="bg">Thể loại</th>
                                <th class="bg">Sửa</th>
                                <th class="bg">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($products)) {
                            ?>
                                <tr>                 
                                    <td><center>
                                    <?= $row['id'] ?>
                                    </center></td>         
                                    <td><img class="wh100" src="../img/<?= $row['hinh_anh'] ?>" />
                                        <?php !empty($row['name']) ? $row['name'] : '' ?></td>
                                    <td><?= $row['ten_sp'] ?></td>
                                    <td><center><?= $row['so_luong'] ?></center></td>
                                    <td><center><?= $row['gia_goc'] ?></center></td>
                                   
                                    <!-- <td><center>
                                        
                                        <?php if ($row['trangthai'] == 0) echo "Hiển thị";
                                                                else echo "Bị ẩn" ?><center></td>
                                   -->
                                    <td><center>
                                    <?= $row['don_gia'] ?>
                                    </center></td>
                                    <td><center>
                                    <?= $row['id_the_loai'] ?>
                                    </center></td>
                                    <td><center>
                                    <div class="pts-abl"><a class="btn btn-outline-success" href="admin.php?act=sua&id=<?= $row['id'] ?>"><i class=" update_product fa-solid fa-pen-to-square"></i></a></div>
                                        
                                    </center>
                                    </td>
                                    <td>
                                        <center>
                                            
                                            <?php if ($row['trangthai'] == '0') { ?><a class="btn btn-outline-danger" href="admin.php?act=xoa&id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
                                        </center>
                                         
                                      
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
        </div>
    <?php
    }
    ?>
</body>
</html>

