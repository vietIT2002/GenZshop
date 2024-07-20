
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/GENZSHOP1.ico">
    <title><?=$title?></title>
    <style>
        .text-p p{
            font-size: 20px;
            font-weight: 500;
            text-align: justify;
            font-family: 'Roboto', sans-serif;
        }

        .text-p1 p
        {
            text-align: justify;
            font-family: 'Roboto', sans-serif;
            font-size: 19px;
        }

        .img-TH{
            max-width: 100%;
            height: auto;
            margin-left: 10px
        }

        .hover-animate {
            transition: transform 0.3s ease;
        }

        .hover-animate:hover {
            transform: scale(1.05);
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .text-p p {
                font-size: 18px;
            }

            .text-p1 p {
                font-size: 16px;
            }
        }


        @media (max-width: 576px) {
            .text-p p {
                font-size: 16px;
            }

            .text-p1 p {
                font-size: 14px;
            }
        }
    </style>

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenZ Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="slideshow-container fade-in">
        <div class="mySlides1">
            <img src="./img/anhth.png" class="hover-animate" style="width:100%">
        </div>
    </div>

    <div class="container" style="width:90%; margin: 0 auto;">
        <div class="text-p fade-in">
            <p>Nhóm chúng em xin trân trọng giới thiệu GenZ Shop – một cửa hàng thời trang chuyên biệt dành cho thế hệ GenZ. Trong cửa hàng, khách hàng có thể dễ dàng tìm thấy nhiều loại quần áo và phụ kiện như áo thun, áo khoác, quần jean, áo hoodie, và nhiều sản phẩm thời trang khác. Chúng tôi tự hào về sự phong phú và đa dạng trong từng sản phẩm, từ thiết kế đến chất liệu, nhằm đáp ứng mọi phong cách và cá tính riêng biệt của thế hệ GenZ.</p>
        </div><br>

        <div class="row">
            <div class="col-sm-5 text-p1 fade-in">
                <h4>1. Thông tin sản phẩm</h4>
                <p>Genz Shop là một nơi chuyên cung cấp các sản phẩm thời trang đa dạng unisex dành cho cả nam và nữ như quần áo, giày dép, phụ kiện và nhiều hơn nữa. Chúng tôi cam kết mang đến cho khách hàng những sản phẩm chất lượng và dịch vụ tốt nhất.<br>Ngoài ra, chúng tôi luôn cập nhật xu hướng thời trang mới nhất và có nhiều ưu đãi hấp dẫn dành cho khách hàng. Bạn có thể ghé thăm website của chúng tôi để khám phá các sản phẩm và thông tin chi tiết hơn.</p>
            </div>
            <div class="col-sm-6 bg-dark fade-in">
                <img src="./img/THbanner.jpg" alt="" class="img-fluid img-TH hover-animate">
                <p style="text-align: center; font-style: italic;">Sản phẩm thời trang GenZ Shop</p>
            </div>
        </div><br>

        <div class="row">
            <div class="col-sm-6 fade-in">
                <img src="./img/THbanner2.jpg" alt="" class="img-fluid img-TH hover-animate">
                <p style="text-align: center; font-style: italic;">Thời trang trẻ trung, năng động</p>
            </div>
            <div class="col-sm-5 text-p1 fade-in">
                <h4>2. Phong cách cá nhân</h4>
                <p>Genz Shop luôn cập nhật các xu hướng thời trang mới nhất hiện nay. Cung cấp quần áo mang tính trẻ trung, năng động phù hợp với nhiều lứa tuổi.<br>Với mong muốn mang lại dấu ấn cá nhân cho mỗi khách hàng khi mua sắm, chúng tôi luôn tạo ra sản phẩm mang phong cách cá nhân, nâng cao giá trị của khách hàng khi khoác lên mình các sản phẩm của GenZ Shop.<br>Hãy đến với GenZ Shop khám phá những sản phẩm mang đậm bản chất cá nhân và nâng tầm giá trị của bạn.</p>
            </div>
        </div>

        <div class="row text-p1 fade-in">
            <h4>3. Lời cảm ơn</h4>
            <p>Trước hết, nhóm muốn gửi lời cảm ơn sâu sắc đối với Thầy Võ Ngọc Tấn Phước và cô Phạm Thị Xuân Hiền. Được làm việc với Thầy/Cô và được Thầy/Cô chỉ bảo, góp ý là những kinh nghiệm quý giá đối với nhóm trong việc hoàn thành đề tài và cả trong công việc sau này.</p>
            <p>Nhóm xin chân thành cảm ơn quý Thầy/Cô trong Khoa Công Nghệ Thông Tin đã tận tình giảng dạy, trang bị cho chúng em những kiến thức quý báu trong suốt quá trình học tập để có thể thực hiện được đề tài.</p>
            <p>Thành viên nhóm:<br> + Tạ Quốc Việt <br> + Nguyễn Thị Kim Yến </p>
        </div>
        <div class="mySlide fade-in">
            <img src="./img/THbanner0.jpg" class="hover-animate" style="width:100%">
            <p style="text-align: center; font-style: italic;">Sản phẩm và thời trang GenZ</p>
        </div>
    </div>
    <script src="script.js"></script>
    <script>
            document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll('.fade-in');

        function checkVisibility() {
            const triggerBottom = window.innerHeight * 0.85;

            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;

                if (elementTop < triggerBottom) {
                    element.classList.add('visible');
                } else {
                    element.classList.remove('visible');
                }
            });
        }

        window.addEventListener('scroll', checkVisibility);
        checkVisibility();
    });
    </script>
</body>
</html>


    
</body>
</html>