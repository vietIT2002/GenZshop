<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `khachhang`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $khachhang = mysqli_query($con, "SELECT * FROM `khachhang` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

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
    <center>
<br>
    
            <h1>Khách hàng</h1>
            <br> 
            <div class="product-items">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover" >
                        <thead >
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Số tiền đã mua hàng</th>
                                <th>Trạng thái</th>
                                <th>Password</th>
                                <th>Tên đăng nhập </th>
                                <th>Thay đổi</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($khachhang)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['ten_kh'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['dia_chi'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><center>
                                    <?= $row['tong_tien_muahang'] ?>
                                    </center></td>
                                    <td><center>
                                            <form method="POST" action="./xulythem.php?id=<?= $row['id'] ?>">
                                                <input type="checkbox" name="trangthai"<?php if($row['trangthai']==0) echo "checked";?> >
                                    </center>
                                    </td>
                                    <td><?= str_repeat('*', strlen($row['mat_khau'])) ?></td>
                                    <td><?= $row['ten_dangnhap'] ?></td>
                                    <td><center>
                                    <button type="submit" name="btnkhtt">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    </center></td></form>                                
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
    }
    ?>
    </body>
    </html>
