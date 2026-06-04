<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_GET['logout']))
if($_GET['logout']=='yes'){
    if(isset($_SESSION['nguoidung']))
    unset($_SESSION['nguoidung']);
    if(isset($_SESSION['cart']))
unset($_SESSION['cart']);
}

?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <!-- <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/fontawesome-all.css">
    <link rel="icon" href="img/GENZSHOP1.ico">
    <!-- <link rel="stylesheet" href="./css/style2.css"> -->
    <script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin "anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        .background{
            width:100%;
            height: 100vh;
            background-postion: center;
            background-size: cover;
        }

        .homeee{
            position: absolute;
            top: 50%;
            left: 50%;
            width: 75%;
            height: 75%;
            transform: translate(-50%, -50%);
            background-position: center;
            background-size: cover;
            display: flex;
            margin-top: 10px;
            border-radius: 10px;
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        .contentt
        {
        display: flex;
        flex-direction: column;
        width: 550px;
        padding: 65px 0;
        text-shadow: 2px;
        margin-right: 50px;
        }
        #togglePasswordButton {
            cursor: pointer; 
        }   
        
        .loginnn form {
            width: min(100%, 450px);
            position: relative;
            padding: 60px 20px;
        }

        .loginnn  h2 {
            font-size: 2.5em;
            text-align: center;
            margin-bottom: 50px;
            color: #000;
        }

        .loginnn  .inputt {
            /* position: relative; */
            width: 100%;
            height: 55px; 
            margin-bottom: 40px
        }

        .loginnn  .inputt .input11 {
            font-size: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 2px solid #000;
            color: #000;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
        }

        ``::placeholder {
            color: #fff;
            font-size: 18px;
        }

        .loginnn  .inputt i {
            position: relative;
            right: -90%; 
            bottom: 27px;
            color: #000;
        }

        .loginnn  .buttonnn {
            width: 100%;
            height: 40px;
            margin-bottom: 15px;
            
        }

        button {
            width: 100%;
            height: 40px;
            background-color: crimson;
            border: none;
            outline: none;
            font-size: 20px;
            font-weight: 700;
            border-radius: 7px;
            color: #fff;
        }

   
        .login-link {
            display: inline-block;
            display: block;
            width: 100%;
            max-width: 100%;
            padding: 10px 16px;
            text-align: center;
            background-color: #3498db; 
            color: #ffffff; 
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px; 
            transition: background-color 0.3s ease; 
        }

        /* GenZShop audit fixes: admin login responsive */
        .loginnn {
            flex: 1 1 420px;
            min-width: 0;
        }

        .contentt {
            flex: 1 1 320px;
            min-width: 0;
        }

        .contentt img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
        }

        .loginnn form,
        .loginnn .inputt,
        .loginnn .buttonnn,
        .loginnn .inputt .input11 {
            max-width: 100%;
        }

        @media (max-width: 900px) {
            .homeee {
                width: calc(100% - 32px);
                height: auto;
                min-height: 0;
                flex-direction: column;
                position: static;
                transform: none;
                margin: 32px auto;
            }

            .contentt {
                width: 100%;
                padding: 24px 20px 0;
                margin-right: 0;
            }

            .loginnn form {
                width: 100%;
                padding: 32px 20px;
            }
        }
    </style>
</head>


<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <?php
    if (isset($_GET['dn'])) {
        if ($_GET['dn']=='true') {
            echo '<style type="text/css">
            #dntb {
                display: none;
            }
            </style>';
        } else if ($_GET['dn']=='false') {
            echo '<style type="text/css">
            #dntb {
                display: inline;
            }
            </style>';
        }
        if ($_GET['dn']=='true') {
            echo '<style type="text/css">
            #dnbk {
                display: none;
            }
            </style>';
        } else if ($_GET['dn']=='khoa') {
            echo '<style type="text/css">
            #dnbk {
                display: inline;
            }
            </style>';
        }
    }
    ?>
    <div class="background"></div>
    <section class ="homeee" style="border: 1px solid black;">
        <div class = "contentt">
            <img src="./img/admin-am.jpg" alt="Avatar" class="avatar">
        </div>


        <div class="loginnn">
        
            <form action="xulydangnhap.php" method="POST">
                <h2>Đăng nhập</h2>
                <div class="inputt">
                    <input class="input11" name="username" type="text" placeholder="Tên đăng nhập" autocomplete="off">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="inputt">
                    <input class="input11" name="password" id="passwordField" type="password" placeholder="Mật khẩu" autocomplete="off" autocomplete=>
                    <i onclick="togglePassword()" class="fa-regular fa-eye" id="togglePasswordButton"></i>
                    <div class="spinner" id="spinner"></div>
                </div>
                <div class="buttonnn">
                    <button class="btn">Đăng nhập</button>
                </div>
                <div >
                    <a href="../index.php" class="login-link">Thoát</a>
                </div>

            </form>
        </div>
    </section>
        <script>
            function togglePassword() {
            var passwordField = document.getElementById("passwordField");
            var togglePasswordButton = document.getElementById("togglePasswordButton");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePasswordButton.classList.remove("fa-eye");
                togglePasswordButton.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                togglePasswordButton.classList.remove("fa-eye-slash");
                togglePasswordButton.classList.add("fa-eye");
            }
        }
        </script>
    

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> -->
</body>

</html>