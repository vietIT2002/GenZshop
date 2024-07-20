<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $con = mysqli_connect($host, $user, $password, $database);
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `quyen`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $quyen = mysqli_query($con, "SELECT * FROM `quyen` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset."");
        // $quyen1=mysqli_query($con,"SELECT `id`, `ten_quyen` FROM `quyen`"); 
        // $data=$quyen1->fetch_all(MYSQLI_ASSOC);

    ?>
<div class="main-content">
            <h1>Quyền- Danh mục</h1>
            <div class="product-items">
            <div class="buttons">
                    <a href="admin.php?act=addquyen">Thêm Quyền</a>
                </div>
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Id</th>
                                <th>Tên quyền</th>
                                <th>Chỉnh sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($quyen)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['ten_quyen'] ?></td>
                                    <td><a href="admin.php?act=suaquyen&id=<?= $row['id'] ?>&tquyen=<?= $row['ten_quyen'] ?>">Sửa</a></td>
                                    <td><a href="admin.php?act=xoaquyen&id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a></td>
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