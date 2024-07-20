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
        $totalRecords = mysqli_query($con, "SELECT * FROM `baiblog`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $baiblog = mysqli_query($con, "SELECT * FROM `baiblog` ORDER BY `id_baiblog` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        mysqli_close($con);
    ?> 
<div class="main-content">
    <br> 
            <h1> DANH SÁCH BÀI BLOG</h1>
             
            
            <div class="buttons">
                    <a   href="admin.php?act=addblog">
                        <i class="fa fa-plus" aria-hidden="true" >  </i> Thêm mới
                     

                       </a>
                
    </div> 
            <div class="product-items">
                <div class="table-responsive-xl ">
                    <table class="table table-bordered table-striped table-hover" >
                        <thead >
                            <tr>
                            <th class="bg">ID bài blog</th>
                                <th class="bg">Ảnh </th>
                                <th class="bg">Tên Bài blog</th>
                                <th class="bg">Danh mục</th>
                                <th class="bg">Lượt xem</th>
                                <th class="bg">Ngày đăng</th>
                                <!-- <th class="bg">Trạng thái</th> -->
                                <th class="bg">Sửa</th>
                                <th class="bg">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($baiblog)) {
                            ?>
                                <tr>                 
                                    <td><center>
                                    <?= $row['id_baiblog'] ?>
                                    </center></td>         
                                    <td><img class="wh100" src="../img/<?= $row['hinh_anh'] ?>" />
                                        <?php !empty($row['name']) ? $row['name'] : '' ?></td>
                                    <td><?= $row['tenbaiblog'] ?></td>
                                    <td><?= $row['id_danhmucbv'] ?></td>
                                    <td><center><?= $row['luotxem'] ?></center></td>
                                    <td><center>
                                    <?= $row['ngaydang'] ?>
                                    </center></td>
                                    <!-- <td><center>
                                    <?php if ($row['trangthai'] ==0 ) echo "Hiển thị";
                                                                else echo "Bị ẩn" ?>
                                       <center></td> -->
                                  
                                    <td><center>
                                    <div class="pts-abl">
                                        <a class="btn btn-outline-success" href="admin.php?act=suablog&id_baiblog=<?= $row['id_baiblog'] ?>"><i class=" update_product fa-solid fa-pen-to-square"></i>
                                    </a></div>
                                        
                                    </center>
                                    </td>
                                    <td>
                                    <center>
                                            
                                        <?php if ($row['trangthai'] == '0') { ?><a class="btn btn-outline-danger" href="admin.php?act=xoablog&id_baiblog=<?= $row['id_baiblog'] ?>" onclick="return confirm('Bạn có muốn xóa bài blog này không?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
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

