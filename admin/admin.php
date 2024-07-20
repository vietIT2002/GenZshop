<?php session_start()?>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="icon" href="img/GENZSHOP1.ico">
</head>
<?php if (!empty($_SESSION['nguoidung'])){?>
<body>
    <div id="wrapper">
        <div id="header2">
        <?php require_once('giaodien/header.php'); ?>

        </div>
        <div id="body">
            <div id="leftmenu">
                <?php require_once('giaodien/leftmenu.php'); ?>
            </div>
            <div id="content">
                <?php require_once('giaodien/content.php'); ?>
            </div>
        </div>

        <div id="footer">
                
        </div>
    </div>
</body>
<?php }?>
</html>