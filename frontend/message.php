<?php
// // Kích hoạt báo lỗi để dễ phát hiện lỗi
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Kiểm tra xem dữ liệu 'text' đã được gửi chưa
//     if (isset($_POST['text'])) {
//         // Lấy tin nhắn của người dùng từ biểu mẫu
//         $user_message = $_POST['text'];

//         // URL của API chatbot
//         $chatbot_url = 'http://127.0.0.1:8000/chat';

//         // Dữ liệu gửi đến API chatbot
//         $data = array(
//             'text' => $user_message,
//             'threshold' => 0.6
//         );

//         // Chuyển đổi dữ liệu sang JSON
//         $jsonData = json_encode($data);

//         // Khởi tạo phiên cURL
//         $ch = curl_init($chatbot_url);

//         // Thiết lập tùy chọn cURL
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//             'Content-Type: application/json',
//             'Accept: application/json'
//         ));
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

//         // Thực thi yêu cầu POST
//         $response = curl_exec($ch);

//         // Kiểm tra lỗi
//         if ($response === false) {
//             $error = curl_error($ch);
//             echo "Lỗi cURL: $error";
//         } else {
//             // Xuất phản hồi
//             echo $response;
//         }

//         // Đóng phiên cURL
//         curl_close($ch);
//     } else {
//         // Trả về thông báo lỗi nếu dữ liệu 'text' không tồn tại
//         echo 'Dữ liệu không hợp lệ';
//     }
// } else {
//     // Trả về thông báo lỗi nếu không phải là phương thức POST
//     echo 'Phương thức yêu cầu không hợp lệ';
// }
?>

<?php
// Bật báo cáo lỗi và thiết lập tiêu đề phản hồi là JSON
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json; charset=utf-8');

// Kiểm tra nếu phương thức yêu cầu là POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu JSON từ nội dung yêu cầu
    $data = json_decode(file_get_contents('php://input'), true);

    // Kiểm tra xem dữ liệu có chứa khóa 'text' hay không
    if (isset($data['text'])) {
        $text = $data['text'];

        $url = 'http://127.0.0.1:8000/chat'; // Địa chỉ API chatbot

        // Dữ liệu gửi đi
        $postData = [
            'text' => $text,
            'threshold' => 0.6,
        ];

        // Khởi tạo phiên cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

        // Thực thi yêu cầu cURL và nhận phản hồi
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Xử lý các trường hợp lỗi cURL hoặc mã HTTP không phải 200
        if (curl_errno($ch)) {
            $error = 'Lỗi cURL: ' . curl_error($ch);
            echo json_encode(['response' => $error]);
        } elseif ($httpCode !== 200) {
            $error = 'Mã lỗi HTTP: ' . $httpCode . ' Phản hồi: ' . $response;
            echo json_encode(['response' => $error]);
        } else {
            // Giải mã phản hồi JSON
            $responseData = json_decode($response, true);
            if (isset($responseData['response'])) {
                echo json_encode(['response' => $responseData['response']]);
            } else {
                echo json_encode(['response' => 'Định dạng phản hồi không hợp lệ']);
            }
        }

        // Đóng phiên cURL
        curl_close($ch);
    } else {
        echo json_encode(['response' => 'Không có văn bản được cung cấp']);
    }
} else {
    echo json_encode(['response' => 'Phương thức yêu cầu không hợp lệ']);
}
?>
