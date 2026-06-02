<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "GenZshopdb";
$con = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($con, 'utf8mb4');
if (mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno();exit;
}
