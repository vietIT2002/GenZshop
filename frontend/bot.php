
<!-- Created By CampCodes -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Online Chatbot in PHP | CampCodes</title> -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/style1.css">
    <style>
        .red-text{
            color: White;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
    $act='';
    $search='';
    $id=0;
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        if($act=='category'){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            include('frontend/category.php');
        }
        if($act=='product'){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            include('frontend/product_detail.php');
        }
        if($act=='cart'){
            include('frontend/cart.php');
        }
        if($act=='my_bill'){
            include('frontend/my_bill.php');
        }
        if($act=='my_account'){
            include('frontend/my_account.php');
        }
        if($act=='bill_detail'){
            include('frontend/bill_detail.php');
        }
        if($act=='login'){
            if(isset($_SESSION['ten_dangnhap']))
                unset($_SESSION['ten_dangnhap']);
            include('frontend/login.php');
        }
        if($act=='register'){
            include('frontend/register.php');
        }
    }else
        if(isset($_GET['search'])){
            $search=$_GET['search'];
            if($search!='') include('frontend/category.php');
            
            
        }else if(isset($_GET['page']) && isset($_GET['id'])){ 
            $id=$_GET['id'];
            include('frontend/category.php');
        }
       
?>
<div class="wrapper1">
        <div class="title1">Trợ lý AI hỗ mọi thắc mắc của bạn khi mua hàng</div>
        <div class="form1">
            <div class="bot-inbox inbox1">
                <div class="icon">
                     <i class="fa-solid fa-robot"></i>
                </div>
                <div class="msg-header">
                    <p><span class="red-text">TRỢ LÝ Al</span><br>Xin chào! Mình là trợ lý Al của bạn tại GenZShop. Mình đang phát triển nên không phải lúc nào cũng đúng. Mình sẵn sàng giúp bạn với câu hỏi về chính sách và tìm kiếm sản phẩm.<br> Hôm nay bạn cần mình hỗ trợ gì hông nè? ^^Mình luôn sẳn lòng</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Nhập câu hỏi ở đây.." required>
                <button id="send-btn"><i class="fa-regular fa-paper-plane"></i></button>
            </div>
        </div>
    </div>

    <script>
        const API_URL = 'http://localhost:8000';

        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                var value = $("#data").val();

                if (value.trim() === "") {
                    alert("Vui lòng nhập yêu cầu.");
                    return;
                }

                var userMessage = '<div class="user-inbox inbox1"><div class="msg-header"><p>'+ value +'</p></div></div>';
                $(".form1").append(userMessage);
                $("#data").val('');

                console.log("Sending message:", value); // Debug log
                
                // Gửi tin nhắn đến API chatbot
                $.ajax({
                    url: API_URL + '/chat',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ text: value }),
                    success: function(result){
                        console.log("Success:", result); // Debug log
                        // var botReply = '<div class="bot-inbox inbox1"><div class="icon"><i class="fa-solid fa-robot"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        var botReply = '<div class="bot-inbox inbox1"><div class="icon"><i class="fa-solid fa-robot"></i></div><div class="msg-header"><p><span class="red-text">TRỢ LÝ AI</span><br>' + result + '</p></div></div>';
                        $(".form1").append(botReply);
                        $(".form1").scrollTop($(".form1")[0].scrollHeight);
                    },
                    error: function(xhr, status, error){
                        console.error("Error: ", xhr, status, error);
                        alert("Lỗi khi gửi tin nhắn tới chatbot: " + xhr.responseText + "\nStatus: " + status + "\nError: " + error);
                    }
                });

            });

            $("#data").keypress(function(e) {
                if(e.which == 13) {
                    $("#send-btn").click(); 
                }
            });
        });
    </script>

</body>
</html>
