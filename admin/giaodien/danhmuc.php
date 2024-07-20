<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $danhmuc1=mysqli_query($con,"SELECT * FROM `danhmuc`");
        $danhmuc2=mysqli_query($con,"SELECT * FROM `danhmuc`");
        $danhmuc3=mysqli_query($con,"SELECT * FROM `danhmuc`");
        $danhmuc4=mysqli_query($con,"SELECT * FROM `danhmuc`");
        // $row = mysqli_fetch_array($danhmuc);
        $quyendanhmuc1 = mysqli_query($con, "SELECT * FROM `quyendahmuc`,`danhmuc` WHERE `id_danhmuc`=`id` AND`id_quyen`=1  ORDER BY `id` ASC ");
        $quyendanhmuc2 = mysqli_query($con, "SELECT * FROM `quyendahmuc`,`danhmuc` WHERE `id_danhmuc`=`id` AND`id_quyen`=2  ORDER BY `id` ASC ");
        $quyendanhmuc3 = mysqli_query($con, "SELECT * FROM `quyendahmuc`,`danhmuc` WHERE `id_danhmuc`=`id` AND`id_quyen`=3  ORDER BY `id` ASC ");
        $quyendanhmuc4 = mysqli_query($con, "SELECT * FROM `quyendahmuc`,`danhmuc` WHERE `id_danhmuc`=`id` AND`id_quyen`=4  ORDER BY `id` ASC ");
        $row1 = mysqli_fetch_all($quyendanhmuc1, MYSQLI_ASSOC);
        $quyendanhmuc1List = array();
        if(!empty($row1)){
            foreach($row1 as $rowl1){
                $quyendanhmuc1List[] = $rowl1['id_danhmuc'];
            }
        }
        $row2 = mysqli_fetch_all($quyendanhmuc2, MYSQLI_ASSOC);
        $quyendanhmuc2List = array();
        if(!empty($row2)){
            foreach($row2 as $rowl2){
                $quyendanhmuc2List[] = $rowl2['id_danhmuc'];
            }
        }
        $row3 = mysqli_fetch_all($quyendanhmuc3, MYSQLI_ASSOC);
        $quyendanhmuc3List = array();
        if(!empty($row3)){
            foreach($row3 as $rowl3){
                $quyendanhmuc3List[] = $rowl3['id_danhmuc'];
            }
        }
        $row4 = mysqli_fetch_all($quyendanhmuc4, MYSQLI_ASSOC);
        $quyendanhmuc4List = array();
        if(!empty($row4)){
            foreach($row4 as $rowl4){
                $quyendanhmuc4List[] = $rowl4['id_danhmuc'];
            }
        }
        mysqli_close($con);
    ?>
<div class="main-content">
            <h1>Admin</h1>
            <div class="product-items">
            <form action="./xulythem.php" method="POST">
            <input type="submit" name="btndm1"value="Lưu">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Tên danh muc</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            
                            while($row = mysqli_fetch_array($danhmuc1)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['ten_danhmuc']  ?></td>
                                    <td><input type="checkbox" value="<?= $row['id']?>" name="row1[]" <?php if(in_array($row['id'], $quyendanhmuc1List))echo "checked"?>> </td>                                  
                                    <div class="clear-both"></div></form>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="clear-both"></div>
        </div>
        <div class="main-content" style="width: fit-content">
            <h1>Quản lý</h1>
            <div class="product-items">
            <form action="./xulythem.php" method="post">
            <input type="submit" name="btndm2"value="Lưu">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Tên danh muc</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while($row = mysqli_fetch_array($danhmuc2)) {
                                ?>
                                    <tr>                              
                                        <td><?= $row['ten_danhmuc'] ?></td>
                                        <td><input type="checkbox" value="<?= $row['id']?>" name="row2[]" <?php if(in_array($row['id'], $quyendanhmuc2List))echo "checked"?>></td>                                  
                                        <div class="clear-both"></div></form>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="clear-both"></div>
        </div>
        <div class="main-content" style="width: fit-content">
            <h1>Nhân viên</h1>
            <div class="product-items">
            <form action="./xulythem.php" method="post">
            <input type="submit" name="btndm3"value="Lưu">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Tên danh muc</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while($row = mysqli_fetch_array($danhmuc3)) {
                                ?>
                                    <tr>                              
                                        <td><?= $row['ten_danhmuc'] ?></td>
                                        <td><input type="checkbox" value="<?= $row['id']?>" name="row3[]" <?php if(in_array($row['id'], $quyendanhmuc3List))echo "checked"?>></td>                                  
                                        <div class="clear-both"></div></form>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="clear-both"></div>
        </div>
        <div class="main-content" style="width: fit-content">
            <h1>Tự chọn</h1>
            <div class="product-items">
            <form action="./xulythem.php" method="post">
            <input type="submit" name="btndm4"value="Lưu">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Tên danh muc</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while($row = mysqli_fetch_array($danhmuc4)) {
                                ?>
                                    <tr>                              
                                        <td><?= $row['ten_danhmuc'] ?></td>
                                        <td><input type="checkbox" value="<?= $row['id']?>" name="row4[]" <?php if(in_array($row['id'], $quyendanhmuc4List))echo "checked"?>></td>                                  
                                        <div class="clear-both"></div></form>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="clear-both"></div>
        </div>
    <?php
    }
    ?>