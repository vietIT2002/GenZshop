
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
</head>
<body>
<?php
    $con = mysqli_connect("localhost", "root", "", "bannuocdb");
    $result = mysqli_query($con, "SELECT * FROM `taikhoang` WHERE `username` = '" . $_SESSION['user']."'");
    $taikhoang = $result->fetch_assoc();
?>



</form>
<div>
                    <center>
                    <br> <br>
                        <h2>Đổi mật khẩu</h2> <br>
                    </center>
            </div>
    <div class="box-contentt">
   
    <form name="taikhoang-formsua" method="POST" action="./xulythem.php?user=<?= $_SESSION['user']?>" enctype="multipart/form-data">
    
            <div class="clear-both">  <br> 
            </div>
            
                   
            <div class="wrap-field form-group">
                <label>Mật khẩu mới:</label><br>
                <input class="form-control"  type="text" name="matkhaumoi" value=""/>
                <!-- <input type="text" name="matkhaumoi" value=""/> -->
                <div class="clear-both"></div>
            </div>
            <!-- <div class="wrap-field form-group">
                <label>mk cu</label>
                <input class="form-control" type="email" name="email" value="" placeholder="VD: yen823@gmail.com"/>
                <div class="clear-both"></div>
            </div> -->
           
            <center>
            
                        <button class="btn btn-danger btnLuu" name="btntkmk" type="submit" title="Lưu mật khẩu" value="Lưu" >Luu </button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">Hủy</button>
                    </center>
            </div>
           
            
        </form>
        <div class="clear-both"></div>

        </body>
</html>