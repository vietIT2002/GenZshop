<?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    unset($_SESSION['ten_dangnhap']);
    header('Location: ../index.php')
?>