<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên </title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>

/**/ 
        .btntkadd {
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

    <br> 
    <br>
    <h1>Thêm tài khoản</h1> <br>
    <div class="box-contentt">
    <form name="taikhoan-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
  
            <div class="clear-both"></div>
            <div class="wrap-field form-group">
                    <label>Tài khoản: </label>
                <input class="form-control" type="text" name="tendangnhap" value="" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field form-group">
                        <label>Mật khẩu: </label>
                    <input class="form-control" type="text" name="matkhau" value="" />
                    <div class="clear-both"></div>
            </div>
            <div class="wrap-field form-group">
                            <label>Họ và tên: </label>
                        <input class="form-control" type="text" name="name" value="" />
                        <div class="clear-both"></div>
            </div>
            <div class="wrap-field form-group">
                        <center>
                        <button class="btn btn-danger btntkadd" name="btntkadd" type="submit"title="Lưu sản phẩm" value="Thêm">Thêm </button>
                                <!-- <input class="btn btn-danger btntkadd" type="submit" title="Lưu tài khoản" value="Them">Thêm </button> -->
                                <button class="btn btn-primary btntkadd" type="reset" value="Hủy">Hủy</button>
                            
                                </center>
            </div>
            
           
            
        </form>
        <div class="clear-both"></div>
        </div>
</body>

</html>
    <!--hhhhshsskkkkkkkkkkkk-->
