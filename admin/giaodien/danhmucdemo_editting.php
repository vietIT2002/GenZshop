<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $danhmuc1=mysqli_query($con,"SELECT * FROM `danhmuc`");
        // $row = mysqli_fetch_array($danhmuc);
        $quyendanhmuc1 = mysqli_query($con, "SELECT * FROM `quyendahmuc`,`danhmuc` WHERE `id_danhmuc`=`id` AND`id_quyen`=".$_GET['id']."  ORDER BY `id` ASC ");
        $row1 = mysqli_fetch_all($quyendanhmuc1, MYSQLI_ASSOC);
        $quyendanhmuc1List = array();
        if(!empty($row1)){
            foreach($row1 as $rowl1){
                $quyendanhmuc1List[] = $rowl1['id_danhmuc'];
            }
        }
        mysqli_close($con);
    ?>
<div class="main-content">
            <h1>Sửa</h1>
            <div class="product-items">
            <form action="./xulythem.php?idq=<?= $_GET['id']?>" method="POST">
            <input type="text" name="tendanhmuc" value="<?= $_GET['tquyen'] ?>">
            <input type="submit" name="btndmsua"value="Lưu">
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
                                    <td><?= $row['ten_danhmuc'] ?></td>
                                    <td><input type="checkbox" value="<?= $row['id']?>" name="row[]" <?php if(in_array($row['id'], $quyendanhmuc1List))echo "checked"?>> </td>                                  
                                    <div class="clear-both"></div></form>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clear-both"></div>
    <?php
    }
    ?>