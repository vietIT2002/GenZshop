<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lien Hệ</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../assets/css/app.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    #row_mt-2 {
        margin: 20px auto;
        padding: 10px;
    }
    .container-fluid {
        position: relative;
        font-family: Arial;
    }

    .text-block {
        position: absolute;
        bottom: 40%;
        left: 3%;
        color: white;
        padding: 15px;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .text-block h1 {
        color: white;
        text-shadow: 2px 2px black;
    }

    .text-block p {
        font-style: italic;
        text-shadow: 1px 1px black;
        font-size: 20px;
    }

    .custom-container {
        width: 85%;
        margin-right: auto;
        margin-left: auto;
    }

    /* Responsive styles */
    @media screen and (max-width: 768px) {
        .text-block {
            bottom: 20%;
            right: 10%;
        }

        .text-block h1 {
            font-size: 20px; 
        }

        .text-block p {
            font-size: 10px; 
        }
    }

    @media screen and (max-width: 576px) {
        .text-block {
            bottom: 14%;
            right: 8%;
        }

        .text-block h1 {
            font-size: 18px; 
        }

        .text-block p {
            font-size: 8px; 
        }
    }
    </style>
    
</head>

<body>
    <div class="container-fluid">
        <img src="./img/anh_lienhe.jpg" alt="Nature" style="width:100%; filter: blur(1.5px);">
        <div class="text-block">
            <h1>LIÊN HỆ VỚI CHÚNG TÔI</h1>
            <p>Hãy liên hệ với chúng tôi nếu bạn có bất kỳ câu hỏi nào liên quan đến cửa hàng quần áo GenZ shop của chúng tôi hoặc các dịch vụ mà chúng tôi cung cấp.<br> Chúng tôi luôn sẵn lòng lắng nghe và giải đáp mọi thắc mắc của bạn!</p>
        </div>
    </div><br>
  
    <main role="main">
       
        <div class="container-fluid mt-2 custom-container">
                                
            <div class="row">
                <div class="col col-md-8">
                    
                    <form method="post" action="lienhe.php" style="border: 2px solid #ccc; border-radius:4px" id="form" width="50%">
                    <div style="margin: 10px 10px;">
                    <legend>
                        <center>
                             <h3 style='font-family: Arial;'>
                                 GỬI TIN NHẮN CHO CHÚNG TÔI
                            </h3>
                        </center>
                                           
                                        </legend>
                        <div class="col-md-6">
                            <div class="input__container">
                                <label for="hoten_ss">HỌ VÀ TÊN</label>
                                <input type="text" name="ho_ten" class="form-control" id="ho_ten" 
                                    placeholder="Họ tên của bạn*" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input__container">
                                <label for="email">EMAIL</label>
                                <input type="email" name="email_ss" class="form-control" id="email_ss" 
                                    placeholder="Email của bạn*" required>
                            </div></br>
                        </div>

                        <div class="col-md-6">
                            <div class="input__container">
                                <label for="email">SỐ ĐIỆN THOẠI</label>
                                <input type="tel" name="sdt" class="form-control" id="sdt" 
                                    placeholder="số điện thoại của bạn*" required>
                            </div></br>
                        </div>

                        <div class="col-md-6">
                            <div class="input__container">
                                <label for="title">TIÊU ĐỀ</label>
                                <input type="text" name="tieu_de" class="form-control" id="title" 
                                    placeholder="Tiêu đề của anh/chi*">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input__container">
                                <label for="message">LỜI NHẮN</label>
                                
                                <textarea name="noidung" class="form-control" cols="25" rows="8" placeholder="Nhập nội dung anh/chị muốn tư vấn*" required></textarea>
                            </div>
                            <br>
                        </div>
                        
                       <center>
                       <button class="btn btn-primary" name="lien_he">Gửi</button>&emsp;
                        <button class="btn btn-danger" type="reset" value="Hủy">Hủy</button>
                        <?php require 'xulylienhe.php'; ?>
                       </center>
                    </div>
                        
                        
                    </form>
                    <br>
                   
                </div>

                <div style=""  class="col col-md-4">
                    <div class="left-colum">
                    <h3><i class="fa-solid fa-shop"></i>&#160;&#160;CỬA HÀNG GENZ SHOP</h3>
                    <p><i class="fa-solid fa-location-dot"></i>&#160;&#160;<strong>Địa chỉ:</strong> 12 Nguyễn Văn Bảo, phường 4, Gò Vấp, thành phố Hồ Chí Minh</p>
                    <p><i class="fa-solid fa-envelope"></i>&#160;&#160;<strong>Email:</strong> GenzShop@gmail.com</p>
                    <p><i class="fa-solid fa-phone">&#160;&#160;</i><strong>Số điện thoại cửa hàng:</strong> 1900.746.384</p>
                    <p><i class="fa-solid fa-clock"></i>&#160;&#160;</i><strong>Thời gian làm việc:</strong> Từ 7h sáng đến 22h tối các ngày trong tuần</p>
                    </div>
                </div>
            </div>
            
            <div class="row mt-2" id="row_mt-2">
                <div class="col col-md-12" style="border: 2px solid #ccc; border-radius:4px; padding:10px">
                    <h3 style="text-align:center"><i class="fa-regular fa-map"></i>&#160;&#160;Vị trí cửa hàng </h3>
                <iframe width="100%"; 
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3918.7827191017213!2d106.67806721402438!3d10.827933261203555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zMDItMDYgxJDGsOG7nW5nIFPhu5EgMywgS2h1IENpdHlMYW5kIENlbnRlciBIaWxscywgUGjGsOG7nW5nIDcgLCBRdeG6rW4gR8OyIFbhuqVwLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1662645897948!5m2!1svi!2s"
                    width="200" height="445" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                       <a href="https://goo.gl/maps/wruwdjv4jnqjCed97 ">navigation gpsCVBNMNBVCVBNZXCVBNDSASDFGH</a>       `
                </iframe>
                
                 </div>
            
            </div>
        </div>
        <!-- End block content -->
    <!-- </main> -->

    
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <!-- <script src="../assets/js/app.js"></script>
    <script>
        "use strict";
            const form = document.getElementById("form");
            form.addEventListener("submit", function (event) { });
            form.addEventListener("submit", function (event) {
    // Preventing page reload on submit
    event.preventDefault(); 

    // Selecting the email value filled by the user
    const email = document.getElementById("email").value;

    // Checking for valid email using a simple regex pattern
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
      alert("Vui lòng nhập đúng định dạng");
      return;
    }

    // If everything passes, show success message
    alert("Bạn đã gửi phản hồi thành công");
});
        </script>
     -->
</body>

</html>