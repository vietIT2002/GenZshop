<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$user = trim($_POST['username'] ?? '');
$pass = $_POST['password'] ?? '';

if ($user === '' || $pass === '') {
    header('Location: index.php?dn=false');
    exit;
}

$conn = mysqli_connect('localhost', 'root', '', 'GenZshopdb');
if (!$conn) {
    header('Location: index.php?dn=false');
    exit;
}
mysqli_set_charset($conn, 'utf8mb4');

$statement = mysqli_prepare(
    $conn,
    'SELECT trang_thai, id_quyen, username, fullname
     FROM taikhoang
     WHERE username = ? AND pass = ?'
);
mysqli_stmt_bind_param($statement, 'ss', $user, $pass);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$account = mysqli_fetch_assoc($result);

if (!$account) {
    mysqli_close($conn);
    header('Location: index.php?dn=false');
    exit;
}

if ((int) $account['trang_thai'] === 1) {
    mysqli_close($conn);
    header('Location: index.php?dn=khoa');
    exit;
}

$employeeStatement = mysqli_prepare(
    $conn,
    'SELECT id, ten_nv FROM nhanvien WHERE ten_dangnhap = ? LIMIT 1'
);
mysqli_stmt_bind_param($employeeStatement, 's', $account['username']);
mysqli_stmt_execute($employeeStatement);
$employeeResult = mysqli_stmt_get_result($employeeStatement);
$employee = mysqli_fetch_assoc($employeeResult);

$_SESSION['nguoidung'] = $account['fullname'];
$_SESSION['quyen'] = $account['id_quyen'];
$_SESSION['user'] = $account['username'];
$_SESSION['idnhanvien'] = $employee['id'] ?? 0;
$_SESSION['tennhanvien'] = $employee['ten_nv'] ?? $account['fullname'];

mysqli_close($conn);
header('Location: admin.php?dn=true');
exit;
