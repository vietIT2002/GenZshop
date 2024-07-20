<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $con = mysqli_connect($host, $user, $password, $database);
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT `trang_thai`, `id_quyen`, `username`, `pass`, `fullname`,`id`, `ten_quyen` FROM `taikhoang`, `quyen` WHERE `id`=`id_quyen`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $taikhoang = mysqli_query($con, "SELECT `trang_thai`, `id_quyen`, `username`, `pass`, `fullname`,`id`, `ten_quyen` FROM `taikhoang`, `quyen` WHERE `id`=`id_quyen` ORDER BY `username` ASC LIMIT " . $item_per_page . " OFFSET " . $offset."");
        $quyen1=mysqli_query($con,"SELECT `id`, `ten_quyen` FROM `quyen`"); 
        $data=$quyen1->fetch_all(MYSQLI_ASSOC);

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
            <h1>Tài khoản</h1>
            <br> 
            <div class="buttons">
                    <a href="admin.php?act=addtk">  <i class="fa fa-plus" aria-hidden="true" >  </i>Thêm mới </a>
                </div>
            <div class="product-items">
           
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Tên tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Họ và tên</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th>Thay đổi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($taikhoang)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['username'] ?></td>
                                    <td><center><?= str_repeat('*', strlen($row['pass'])) ?></center></td>
                                    <td><?= $row['fullname'] ?></td>
                                    <td><center><form method="POST" action="./xulythem.php?id=<?= $row['username'] ?>">
                                    <select name="quyen"><option value="<?=$row['id_quyen']?>"><?=$row['ten_quyen']?></option><?php foreach($data as $quyen2){?><option value="<?= $quyen2['id']?>"><?=$quyen2['ten_quyen']?></option><?php } ?></select><center></td>
                                    <td><center>
                                        <input type="checkbox" name="trangthai"<?php if($row['trang_thai']==0) echo "checked";?> >
                                        <?php if($row['trang_thai']==0) echo "Bình thường"; else echo"Bị khóa";?>
                                        </center>
                                    </td>
                                    <td><center><input type="submit" name="btntksua"value="Thay đổi"></center></td></form>                                
                                    <!-- <td><?php if($row['trang_thai']==1){?>
                                        <a href="admin.php?act=xoatk&id=<?= $row['username'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"></a><?php }?></td> -->
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
