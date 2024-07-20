<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `theloai` WHERE `id` = " . $_GET['id']);
    $theloai = $result->fetch_assoc();
}
?>
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
                        <h2>Sửa thể loại</h2> <br>
                    </center>
            </div>
    <div class="box-contentt">
   
         
        <form name="theloai-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
        <div class="clear-both">  <br> 
            </div>
            
                   
            <div class="wrap-field form-group">
                <label>Tên thể loại:</label><br>
                <input class="form-control"  type="text" name="name" value="<?= (!empty($theloai) ? $theloai['ten_tl'] : "") ?>" />
               
                <div class="clear-both"></div>
            </div>
                    
            <div class="wrap-field form-group">
                <label>Số lượng: </label><br>
                <input class="form-control"  type="text" name="tong_sp" value="<?= (!empty($theloai) ? $theloai['tong_sp'] : "") ?>" />
               
                <div class="clear-both"></div>
            </div>
           
           
            <center>
            
                        <button class="btn btn-danger btnLuu" name="btntlsua" type="submit" title="Lưu thể loại" value="Lưu"   >Lưu </button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">Hủy</button>
                    </center>
            </div>
           
            
        </form>
        <div class="clear-both"></div>