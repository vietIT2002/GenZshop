<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `theloai`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $theloai = mysqli_query($con, "SELECT * FROM `theloai` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

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
            <h1>Thể loại</h1>
            <br> 
            <div class="buttons">
              
              <a href="admin.php?act=addtl">  <i class="fa fa-plus" aria-hidden="true" >  </i> Thêm mới</a>
          </div>
            <div class="product-items">
               
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>ID</th>
                                <th>Tên thể loại</th>
                                <th>Tổng sản phẩm</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($theloai)) {
                            ?>
                                <tr>            
                                    <td><center><?= $row['id'] ?></center></td>            
                                    <td><?= $row['ten_tl'] ?></td>
                                    <td><center><?= $row['tong_sp'] ?></center></td>
                                    <td><center><a class="btn btn-outline-success" href="admin.php?act=suatl&id=<?= $row['id'] ?>" > 
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a></center>
                                    </td>
                                    <td>
                                        <center>
                                        <a class="btn btn-outline-danger" href="admin.php?act=xoatl&id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa thể loại này không?');">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
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
