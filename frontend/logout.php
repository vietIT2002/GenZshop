<?php
    session_start();
    unset($_SESSION['ten_dangnhap']);
    header('Location: ../index.php')
?>