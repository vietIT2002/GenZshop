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

        /* GenZShop admin login polish */
        html,
        body {
            min-height: 100%;
        }

        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        body {
            display: grid;
            place-items: center;
            min-height: 100dvh;
            margin: 0;
            padding: 32px;
            background: #f5f7fb;
            color: #111827;
            font-family: "Poppins", Arial, sans-serif;
            overflow-x: hidden;
        }

        .background {
            position: fixed;
            inset: 0;
            z-index: -1;
            width: auto;
            height: auto;
            background: #f5f7fb;
        }

        .homeee {
            position: relative;
            top: auto;
            left: auto;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(360px, 0.9fr);
            align-items: center;
            width: min(100%, 1080px);
            height: auto;
            min-height: 620px;
            margin: 0;
            overflow: hidden;
            transform: none;
            border: 1px solid #e5e7eb !important;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 28px 80px rgba(17, 24, 39, 0.14);
        }

        .contentt {
            width: 100%;
            margin: 0;
            padding: 56px;
        }

        .contentt img {
            display: block;
            width: 100%;
            max-height: 420px;
            object-fit: contain;
        }

        .loginnn {
            width: 100%;
            padding: 48px 56px;
        }

        .loginnn form {
            width: 100%;
            max-width: 460px;
            margin: 0 auto;
            padding: 0;
        }

        .loginnn h2 {
            margin: 0 0 34px;
            color: #111827;
            font-size: 34px;
            font-weight: 800;
            line-height: 1.15;
        }

        .loginnn .inputt {
            position: relative;
            height: auto;
            margin-bottom: 22px;
        }

        .loginnn .inputt .input11 {
            display: block;
            width: 100%;
            height: 48px;
            padding: 0 42px 0 14px;
            border: 1px solid #d9dee8;
            border-radius: 9px;
            background: #ffffff;
            color: #111827;
            font-size: 15px;
        }

        .loginnn .inputt .input11:focus {
            border-color: #d90429;
            box-shadow: 0 0 0 4px rgba(217, 4, 41, 0.10);
        }

        .loginnn .inputt i {
            position: absolute;
            right: 14px;
            bottom: auto;
            top: 50%;
            color: #6b7280;
            transform: translateY(-50%);
        }

        .loginnn .buttonnn {
            height: auto;
            margin: 8px 0 14px;
        }

        .loginnn button,
        .loginnn .login-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 46px;
            border-radius: 9px;
            font-size: 16px;
            font-weight: 800;
        }

        .loginnn button {
            background: #d90429;
        }

        .loginnn button:hover {
            background: #b80022;
        }

        .loginnn .login-link {
            background: #eef2f7;
            color: #111827;
        }

        .loginnn .login-link:hover {
            background: #e2e8f0;
        }

        @media (max-width: 900px) {
            body {
                display: block;
                padding: 20px;
            }

            .homeee {
                width: 100%;
                min-height: 0;
                grid-template-columns: 1fr;
                margin: 0 auto;
            }

            .contentt {
                padding: 26px 22px 0;
            }

            .contentt img {
                max-height: 220px;
            }

            .loginnn {
                padding: 26px 22px 30px;
            }

            .loginnn h2 {
                margin-bottom: 24px;
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 14px;
            }

            .homeee {
                width: calc(100vw - 28px);
                max-width: calc(100vw - 28px);
            }

            .contentt {
                display: none;
            }

            .loginnn {
                width: 100%;
                max-width: 100%;
                padding: 28px 20px;
            }

            .loginnn form,
            .loginnn .inputt,
            .loginnn .buttonnn,
            .loginnn .inputt .input11,
            .loginnn button,
            .loginnn .login-link {
                max-width: 100%;
            }

            .loginnn h2 {
                font-size: 26px;
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
