<?php
header('Content-Type: application/json; charset=UTF-8');

function respond($payload, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(['error' => ['message' => 'Phương thức không hợp lệ.']], 405);
}

if (!isset($_FILES['upload']) || $_FILES['upload']['error'] !== UPLOAD_ERR_OK) {
    respond(['error' => ['message' => 'Không nhận được file ảnh.']], 400);
}

$file = $_FILES['upload'];
$maxSize = 5 * 1024 * 1024;

if ($file['size'] > $maxSize) {
    respond(['error' => ['message' => 'Ảnh không được vượt quá 5MB.']], 400);
}

$imageInfo = @getimagesize($file['tmp_name']);
if ($imageInfo === false) {
    respond(['error' => ['message' => 'File tải lên không phải ảnh hợp lệ.']], 400);
}

$allowedMimeTypes = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/gif' => 'gif',
    'image/webp' => 'webp',
    'image/bmp' => 'bmp',
];

$mimeType = $imageInfo['mime'] ?? '';
if (!isset($allowedMimeTypes[$mimeType])) {
    respond(['error' => ['message' => 'Chỉ hỗ trợ ảnh JPG, PNG, GIF, WEBP hoặc BMP.']], 400);
}

$uploadDir = realpath(__DIR__ . '/../../img');
if ($uploadDir === false) {
    respond(['error' => ['message' => 'Không tìm thấy thư mục img.']], 500);
}

$editorDir = $uploadDir . DIRECTORY_SEPARATOR . 'editor';
if (!is_dir($editorDir) && !mkdir($editorDir, 0775, true)) {
    respond(['error' => ['message' => 'Không thể tạo thư mục lưu ảnh editor.']], 500);
}

$originalName = pathinfo($file['name'], PATHINFO_FILENAME);
$baseName = preg_replace('/[^a-zA-Z0-9_-]+/', '-', $originalName);
$baseName = trim($baseName, '-');
if ($baseName === '') {
    $baseName = 'editor-image';
}

$extension = $allowedMimeTypes[$mimeType];
$fileName = $baseName . '-' . date('YmdHis') . '-' . bin2hex(random_bytes(4)) . '.' . $extension;
$targetPath = $editorDir . DIRECTORY_SEPARATOR . $fileName;

if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
    respond(['error' => ['message' => 'Không thể lưu ảnh tải lên.']], 500);
}

respond([
    'url' => '/img/editor/' . $fileName,
]);