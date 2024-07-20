<?php
if (!empty($_GET['id_danhmucbv'])) {
    $result = mysqli_query($con, "SELECT * FROM `danhmucbaiviet` WHERE `id_danhmucbv` = " . $_GET['id_danhmucbv']);
    $danhmucbv = $result->fetch_assoc();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Danh Mục Bài Viết</title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>


<style>
 
     .btnLuu {
            margin-top: 20px;
            width: 100%;
            padding: 10px 20px;
        }

        .wrap-field {
            margin-top: 10px;
            width: 100%;

        }  
    </style>

<div>
                    <center>
                    <br> <br>
                        <h2>Sửa danh mục bài viết</h2> <br>
                    </center>
            </div>
    <div class="box-contentt">
   
         
        <form name="theloai-formsua" method="POST" action="./xulythem.php?id_danhmucbv=<?= $_GET['id_danhmucbv'] ?>" enctype="multipart/form-data">
        <div class="clear-both">  <br> 
            </div>
            
                   
            <div class="wrap-field form-group">
                <label>Mã danh mục:</label><br>
                <input class="form-control"  type="text" name="thutu" value="<?= (!empty($danhmucbv) ? $danhmucbv['thutu'] : "") ?>" />
               
                <div class="clear-both"></div>
            </div>
                    
            <div class="wrap-field form-group">
                <label>Tên danh mục bài viết: </label><br>
                <input class="form-control"  type="text" name="tendanhmucbv" value="<?= (!empty($danhmucbv) ? $danhmucbv['tendanhmucbv'] : "") ?>" />
               
                <div class="clear-both"></div>
            </div>
           
           
            <center>
            
                        <button class="btn btn-danger btnLuu" name="btnmaasua" type="submit" title="Lưu danh mục" value="Lưu"   >Lưu </button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">Hủy</button>
                    </center>
            </div>
           
            
        </form>
        <div class="clear-both"></div>