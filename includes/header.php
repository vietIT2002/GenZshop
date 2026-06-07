<!-- TOP HEADER -->
<div id="top-header" style="background-color: #555;">
        <header>
                <div class="container">
                    <ul class="header-links pull-left">
                        <li><a href="#"><i class="fa fa-phone" style="color: white;"></i> 0358881702</a></li>
                        <li><a href="mailto:vietqv2002@gmail.com"><i class="fa fa-envelope-o" style="color: white;"></i> vietqv2002@gmail.com</a></li>
                        <li><a href="#"><i class="fa fa-map-marker" style="color: white;"></i> TP H&#7891; Ch&#237; Minh</a></li>
                    </ul>
                    <ul class="header-links pull-right">
                        <li><a href="#"><i class="fa fa-dollar" style="color: white;"></i> VN&#272;</a></li>
                        <?php
                            if(isset($_SESSION['ten_dangnhap'])){
                                 $ten_dangnhap=$_SESSION['ten_dangnhap'];
                                 echo '<li><a href="?act=my_account"><i class="fa fa-user-o" style="color: white;"></i> Xin ch&#224;o, '.$ten_dangnhap.'!</a></li>';
                            }
                                else echo '<li><a href="index.php?act=register"><i class="fa fa-user-o" style="color: white;"></i> T&#7841;o t&#224;i kho&#7843;n</a></li>';
                        ?>

                        <li><a href="admin/index.php"><i class="fa fa-lock" aria-hidden="true" style="color: white;"></i> T&#224;i kho&#7843;n Admin</a></li>
                    </ul>
                </div>
            </div>
            <!-- /TOP HEADER -->

            <!-- MAIN HEADER -->
            <div id="header" style="padding: 10px 0;">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- LOGO -->
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="index.php" class="logo">

                                </a>
                            </div>
                        </div>

                        <!-- /LOGO -->

                        <!-- SEARCH BAR -->
                        <div class="col-md-6">
                            <div class="header-search">
                                <form method="get" class="search-form">
                                    <select class="input-select" onchange="location = this.value;">
                                        <option value="0">Danh M&#7909;c S&#7843;n Ph&#7849;m</option>
                                        <?php
                                        $sql='select id, ten_tl from theloai';
                                        $list=executeResult($sql);
                                        foreach($list as $item){
                                            echo '<option value="?act=category&id='.$item['id'].'" style="color: #ffffff; background-color:#333333;">'.$item['ten_tl'].'</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="search-suggestions" aria-label="G&#7907;i &#253; t&#236;m ki&#7871;m">
                                        <span class="search-suggestions-title">G&#7907;i &#253; nhanh</span>
                                        <?php
                                            foreach(array_slice($list, 0, 5) as $suggestion){
                                                echo '<a href="?act=category&id='.$suggestion['id'].'">'.$suggestion['ten_tl'].'</a>';
                                            }
                                        ?>
                                    </div>
                                    <input class="input" name="search" placeholder="T&#236;m s&#7843;n ph&#7849;m..." required oninvalid="this.setCustomValidity('Vui l&#242;ng nh&#7853;p th&#244;ng tin')" oninput="setCustomValidity('')"/>
                                    <button class="search-btn" type="submit" aria-label="T&#236;m ki&#7871;m">
                                        <i class="fa-solid fa-magnifying-glass" style="color: #333;"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- /SEARCH BAR -->

                        <!-- ACCOUNT -->
                        <div class="col-md-3 clearfix">
                            <div class="header-ctn">

                                <!-- Cart -->
                                <?php
                                    $qty=0;
                                    if(isset($_SESSION['cart'])){
                                        $cart=$_SESSION['cart'];
                                        foreach($cart as $value){
                                            $qty += $value['qty'];
                                        }
                                    }
                                ?>
                                <div class="">
                                    <a href="?act=cart">
                                        <i class="fa fa-shopping-cart" style="color: #ffffff; font-size: 20px;"></i>
                                        <!-- <span style=" font-size: 15px; color: black;">Gi&#7887; H&#224;ng</span> -->
                                        <div class="qty" id="qtyPro"><?=$qty?></div>
                                    </a>
                                </div>

                                <!-- /Cart -->

                                <!-- C&#224;i &#273;&#7863;t -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa-regular fa-user" style="color: #ffffff; font-size: 20px;"></i>
                                        <!-- <i style="color: black;"><img src="img/users-cog-solid.svg" alt="XYZ" style=" width:30px;" /></i> -->
                                        <!-- <span style=" font-size: 15px; color: black;">T&#224;i Kho&#7843;n</span> -->

                                    </a>
                                    <div class="cart-dropdown">
                                        <?php
                                            if(isset($_SESSION['ten_dangnhap'])){
                                                echo '<div class="cart">
                                                        <div class="product-widget">
                                                        <a href="index.php?act=my_account">Qu&#7843;n L&#253; T&#224;i Kho&#7843;n</a>
                                                        </div>
                                                        <div class="product-widget">
                                                        <a href="index.php?act=my_bill">Qu&#7843;n L&#253; &#272;&#417;n H&#224;ng</a>
                                                        </div>
                                                        <div class="product-widget">
                                                            <a href="change_password.php"> &#272;&#7893;i m&#7853;t kh&#7849;u </a></div>
                                                        </div>';
                                            }
                                        ?>

                                        <div class="cart-btns">
                                            <a href="index.php?act=login">&#272;&#259;ng Nh&#7853;p</a>
                                            <?php
                                                if(isset($_SESSION['ten_dangnhap'])){
                                                    echo '<a href="frontend/logout.php">&#272;&#259;ng Xu&#7845;t <i class="fa fa-arrow-circle-right"></i></a>';
                                                }else echo '<a href="index.php?act=register">&#272;&#259;ng K&#253;</a>';
                                            ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="" style="margin-right: 8px;">
                                    <a href="bot.php">
                                        <!-- <i class="fa-regular fa-heart" style="color: #ffffff; font-size: 20px;"></i> -->
                                        <i class="fa-solid fa-robot" style="font-size: 20px;"></i>
                                        <!-- <span style=" font-size: 15px; color: black;">Gi&#7887; H&#224;ng</span> -->
                                        <!-- <div class="qty" id="qtyPro"><?=$qty?></div> -->
                                    </a>
                                </div>
                                <!-- /C&#224;i &#273;&#7863;t -->

                                <!-- Menu Toogle -->
                                <div class="menu-toggle">
                                    <a href="#">
                                        <i class="fa fa-bars"></i>
                                        <span>Menu</span>
                                    </a>
                                </div>
                                <!-- /Menu Toogle -->
                            </div>
                        </div>
                        <!-- /ACCOUNT -->
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
            <!-- /MAIN HEADER -->
        </header>
        <!-- /HEADER -->
        <div class="marquee-container">
            <p class="marquee-text">GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp; GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP  &ensp; GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp;  GENZSHOP &ensp; GENZSHOP</p>
        </div>

        <?php require_once __DIR__ . '/navbar.php'; ?>
</div>