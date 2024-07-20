<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">

</head>

<body>


    <?php
    include_once('function.php');
    include_once('connect_db.php');
    
    if (isset($_POST['btnadd'])) {
        if (isset($_POST['id']))
            if ($_POST['id'] != '') {
                 if (isset($_POST['name']))
                    if ($_POST['name'] != '') {
                        if (isset($_POST['don_gia']))
                            if ($_POST['don_gia'] != '') {
                                if (isset($_POST['gia_goc']))
                                    if ($_POST['gia_goc'] != '') {
                                        if (isset($_POST['so_luong']))
                                    if ($_POST['so_luong'] != '') {
                                        if (isset($_POST['idtl']))
                                            if ($_POST['idtl'] != '') {
                                                if (isset($_POST['content']))
                                                    if ($_POST['content'] != '') {
                                                    $conn = mysqli_connect("localhost", "root", "", "bannuocdb");
                                                    $namei = $_POST['name'];
                                                    $don_gia = $_POST['don_gia'];
                                                    $gia_goc = $_POST['gia_goc'];
                                                    $id_sanpham = $_POST['id'];
                                                    // $image=$_FILES['image'];
                                                    $so_luong = $_POST['so_luong'];
                                                    $idtl = $_POST['idtl'];
                                                    // $idncc = $_POST['idncc'];
                                                    $content = $_POST['content'];
                                                    if ($_FILES['image']['name'] != NULL) {
                                                        // Kiểm tra file up lên có phải là ảnh không
                                                        if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {

                                                            // Nếu là ảnh tiến hành code upload
                                                            $path1 = ""; // Ảnh sẽ lưu vào thư mục images
                                                            $path2 = "../img/";
                                                            $tmp_name = $_FILES['image']['tmp_name'];
                                                            $name = $_FILES['image']['name'];
                                                            // Upload ảnh vào thư mục images
                                                            move_uploaded_file($tmp_name, $path2 . $name);
                                                            $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
// Insert ảnh vào cơ sở dữ liệu
                                                            $sql1 = "INSERT INTO `sanpham` (`id`,`ten_sp`, `hinh_anh`, `don_gia`, `gia_goc`, `noidungchitiet`,`so_luong`,`id_the_loai`,`trangthai`) VALUES ('$id_sanpham','$namei','$image_url', " . str_replace('.', '', $don_gia) . "," . str_replace('.', '', $gia_goc) . ", '$content','$so_luong','$idtl',0);";
                                                            $result1 = mysqli_query($conn, $sql1);
                                                            if (isset($_FILES['gallery']))
                                                            if ($_FILES['gallery'] != '') {
                                                                $uploadedFiles = $_FILES['gallery'];
                                                                @$result = uploadFiles($uploadedFiles);
                                                                if ($result) {
                                                                    $galleryImages = $result['uploaded_files'];
                                                                    if (!empty($galleryImages)) {
                                                                        $product_id = $conn->insert_id;
                                                                        $insertValues = "";
                                                                        foreach ($galleryImages as $path) {
                                                                            if (empty($insertValues)) {
                                                                                $insertValues = "( " . $product_id . ", '" . $path . "')";
                                                                            } else {
                                                                                $insertValues .= ",( " . $product_id . ", '" . $path . "')";
                                                                            }
                                                                        }
                                                                        $result = mysqli_query($conn, "INSERT INTO `hinhanhsp` ( `id_sp`, `hinh_anh`) VALUES " . $insertValues . ";");
                                                                    }
                                                                } else "ko them duoc";
                                                            }
                                                        if ($result1) {
                                                            // $result2 = mysqli_query($conn,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`='$idtl'");
                                                            // $r=mysqli_fetch_array($result2);
// $result3 = mysqli_query($conn,"UPDATE `theloai` SET `tong_sp`=".$r['cid_the_loai']." WHERE `id`=$idtl");
                                                            // if ($result3) { 
                                                            header('location:admin.php?act=addsptc&dk=yes');
                                                            // }else header("location:./admin.php?act=addsptc&dk=no");
                                                        } else header("location:./admin.php?act=addsptc&dk=no");
                                                    }
                                                }
                                            } else header("location:./admin.php?act=addsptc&dk=no");
                                        } else header("location:./admin.php?act=addsptc&dk=no");
                                        } else header("location:./admin.php?act=addsptc&dk=no");
                                    } else header("location:./admin.php?act=addsptc&dk=no");
                            } else header("location:./admin.php?act=addsptc&dk=no");
                    } else header("location:./admin.php?act=addsptc&dk=no");
            } else header("location:./admin.php?act=addsptc&dk=no");
        }
    
        if (isset($_POST['btnsua'])) {
            if (isset($_POST['id']))
            if ($_POST['id'] != '') {
                 if (isset($_POST['name']))
                    if ($_POST['name'] != '') {
                        if (isset($_POST['don_gia']))
                            if ($_POST['don_gia'] != '') {
                                if (isset($_POST['gia_goc']))
                                    if ($_POST['gia_goc'] != '') {
                                        if (isset($_POST['so_luong']))
                                    if ($_POST['so_luong'] != '') {
                                        if (isset($_POST['idtl']))
                                            if ($_POST['idtl'] != '') {
                                                if (isset($_POST['content']))
                                                    if ($_POST['content'] != '') {
                                                    if (isset($_POST['trangthai']) == "on") $trangthai = 0;
                                                    if (isset($_POST['trangthai']) == NULL) $trangthai = 1;
                                                    include_once('function.php');
                                                    $con = mysqli_connect("localhost", "root", "", "bannuocdb");
                                                    $result4 = mysqli_query($con, "SELECT `id_the_loai` FROM `sanpham` WHERE `id`=" . $_GET['id'] . "");
                                                    $r2 = mysqli_fetch_array($result4);
                                                    if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                                                        $uploadedFiles = $_FILES['gallery'];
                                                        $result = uploadFiles($uploadedFiles);
                                                        $galleryImages = $result['uploaded_files'];
                                                    }
                                                    if (!empty($_POST['gallery_image'])) {
                                                        $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                                                    }
                                                    if (!isset($image_url) && !empty($_POST['image'])) {
                                                        $image_url = $_POST['image'];
                                                    }
                                                    if ($_FILES['image']['name'] != NULL) {
                                                        // Kiểm tra file up lên có phải là ảnh không
                                                        if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {
    
                                                            // Nếu là ảnh tiến hành code upload
                                                            $path1 = "";
                                                            $path = "../img/"; // Ảnh sẽ lưu vào thư mục images
                                                            $tmp_name = $_FILES['image']['tmp_name'];
                                                            $name = $_FILES['image']['name'];
                                                            // Upload ảnh vào thư mục images
                                                            move_uploaded_file($tmp_name, $path . $name);
                                                            $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                                            // Insert ảnh vào cơ sở dữ liệu
                                                        }
                                                    }
                                                      $result1 = mysqli_query($con,"UPDATE `sanpham` SET `id`='" . $_POST['id'] . "',`ten_sp`='" . $_POST['name'] . "',`don_gia`=" . str_replace('.', '', $_POST['don_gia']) . ",`hinh_anh`='$image_url',`id_the_loai` = " . $_POST['idtl'] . ",`so_luong`='" . $_POST['so_luong'] . "', `ngay_sua` = " . time() . ",`trangthai`='. $trangthai . ',`gia_goc`=" . str_replace('.', '', $_POST['gia_goc']) . ",`NoiDungChiTiet`='" . $_POST['content'] . "' WHERE `sanpham`.`id` = " . $_GET['id']);
                                                    if (!empty($galleryImages)) {
                                                        $product_id = ($_GET['act'] == 'sua' && !empty($_GET['id'])) ? $_GET['id'] : $con->insert_id;
                                                        $insertValues = "";
                                                        foreach ($galleryImages as $path) {
                                                            if (empty($insertValues)) {
                                                                $insertValues = "( " . $product_id . ", '" . $path . "')";
                                                            } else {
                                                                $insertValues .= ",( " . $product_id . ", '" . $path . "')";
                                                            }
                                                        }
                                                        $result = mysqli_query($con, "INSERT INTO `hinhanhsp` ( `id_sp`, `hinh_anh`) VALUES " . $insertValues . ";");
                                                        echo "cap nhat thanh cong";
                                                    }
                                                    if ($result1) {
                                                        // $result5 = mysqli_query($con,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`=".$r2['id_the_loai']."");
                                                        // $r5=mysqli_fetch_array($result5);
                                                        // $result6 = mysqli_query($con,"UPDATE `theloai` SET `tong_sp`=".$r5['cid_the_loai']." WHERE `id`=".$r2['id_the_loai']."");
    // $result2 = mysqli_query($con,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`=".$_POST['idtl']."");
                                                        // $r=mysqli_fetch_array($result2);
                                                        // $result3 = mysqli_query($con,"UPDATE `theloai` SET `tong_sp`=".$r['cid_the_loai']." WHERE `id`=".$_POST['idtl']."");
                                                        // if ($result6&&$result3) { 
                                                        header("location:./admin.php?act=suasptc&dk=yes");
                                                        // else header("location:./admin.php?act=suasptc&dk=no"); 
                                                    } else header("location:./admin.php?act=suasptc&dk=no");
                                                } else header("location:./admin.php?act=addsptc&dk=no");
                                            } else header("location:./admin.php?act=addsptc&dk=no");
                                            } else header("location:./admin.php?act=addsptc&dk=no");
                                        } else header("location:./admin.php?act=addsptc&dk=no");
                                } else header("location:./admin.php?act=addsptc&dk=no");
                        } else header("location:./admin.php?act=addsptc&dk=no");
                } else header("location:./admin.php?act=addsptc&dk=no");
            }


    if (isset($_POST['btntladd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['tong_sp']))
                    if ($_POST['tong_sp'] != '') {
                        $namei = $_POST['name'];
                        $tong = $_POST['tong_sp'];
                        $sql = "INSERT INTO `theloai`(`ten_tl`,`tong_sp`) VALUES ('$namei','$tong')";
                        $result = mysqli_query($con, $sql);
                        if ($result)
                            header("location:./admin.php?act=addtltc&dk=yes");
                        else header("location:./admin.php?act=addtltc&dk=no");
                    } else header("location:./admin.php?act=addtltc&dk=no");
            } else header("location:./admin.php?act=addtltc&dk=no");
    }
    if (isset($_POST['btntlsua'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['tong_sp']))
                if ($_POST['tong_sp'] != '') {
                $con = mysqli_connect("localhost", "root", "", "bannuocdb");
                $result1 = mysqli_query($con, "UPDATE `theloai` SET `ten_tl` = '" . $_POST['name'] . "',`tong_sp` = '" . $_POST['tong_sp'] . "'WHERE `theloai`.`id` = " . $_GET['id'] . " ");
                if ($result1)
                    header("location:./admin.php?act=suatltc&dk=yes");
                
                else header("location:./admin.php?act=suatltc&dk=no");
            } else header("location:./admin.php?act=suatltc&dk=no");
        } else header("location:./admin.php?act=suatltc&dk=no");
    }
    // if (isset($_POST['btnnccadd'])) {
    //     if (isset($_POST['name']))
    //         if ($_POST['name'] != '') {
    //             if (isset($_POST['email']))
    //                 if ($_POST['email'] != '') {
    //                     if (isset($_POST['website']))
    //                         if ($_POST['website'] != '') {
    //                             if (isset($_POST['sdt']))
    //                                 if ($_POST['sdt'] != '') {
    //                                     $sql = "INSERT INTO `nhacungcap`(`ten_ncc`, `email`, `web_site`,`phone`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['website'] . "','" . $_POST['sdt'] . "')";
    //                                     $result = execute($sql);
    //                                     header("location:./admin.php?act=nccaddtc&dk=yes");
    //                                 } else header("location:./admin.php?act=nccaddtc&dk=no");
    //                         } else header("location:./admin.php?act=nccaddtc&dk=no");
    //                 } else header("location:./admin.php?act=nccaddtc&dk=no");
    //         } else header("location:./admin.php?act=nccaddtc&dk=no");
    // }
    // if (isset($_POST['btnnccdat'])) {
    //     if ($_POST['sldat'] != "") {
    //         if (is_int(intval($_POST['sldat']))) {
    //             $con = mysqli_connect("localhost", "root", "", "bannuocdb");
    //             $sanpham = mysqli_query($con, "SELECT `so_luong` FROM `sanpham` WHERE `id` = " . $_GET['id'] . "");
    //             $b = mysqli_fetch_array($sanpham);
    //             $a = $_POST['sldat'] + $b['so_luong'];
    //             $result1 = execute("UPDATE `sanpham` SET `so_luong` = '$a' WHERE `sanpham`.`id` = " . $_GET['id'] . " ");
    //         }

    //     }

    //     echo "xin chao";
    // }
    if (isset($_POST['btnkhtt'])) {
        if (isset($_POST['trangthai']) == "on") $trangthai = 0;
        if (isset($_POST['trangthai']) == NULL) $trangthai = 1;
        $sql = "UPDATE `khachhang` SET `trangthai` = '" . $trangthai . "' WHERE `khachhang`.`id` = " . $_GET['id'] . " ";
        $result = execute($sql);
        header("location:./admin.php?act=khtttc&dk=yes");
    }

    if (isset($_POST['btnnvadd'])) {
        if (isset($_POST['id']))
            if ($_POST['id'] != '') {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['chuc_vu']))
                    if ($_POST['chuc_vu'] != '') {
                        if (isset($_POST['mat_khau'])) 
                            if ($_POST['mat_khau'] != '') {
                                if (isset($_POST['phone']))
                                    if ($_POST['phone'] != '') {
                                        if (isset($_POST['email']))
                                            if ($_POST['email'] != '') {
                                                if ($_POST['tendangnhap'] != '') $tendangnhap=null;
                                                $conn = mysqli_connect("localhost", "root", "", "bannuocdb");
                                                $id = $_POST['id'];
                                                $namei = $_POST['name'];
                                                 $chuc_vu = $_POST['chuc_vu'];
                                                 $mat_khau = $_POST['mat_khau'];
                                                 $phone = $_POST['phone'];
                                                 $email = $_POST['email'];
                                                 $tendangnhap = $_POST['tendangnhap'];
                                                if ($_FILES['image']['name'] != NULL) {
                                                    // Kiểm tra file up lên có phải là ảnh không
                                                    if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {

                                                        // Nếu là ảnh tiến hành code upload
                                                        $path1 = ""; // Ảnh sẽ lưu vào thư mục images
                                                        $path2 = "../img/";
                                                        $tmp_name = $_FILES['image']['tmp_name'];
                                                        $name = $_FILES['image']['name'];
                                                        // Upload ảnh vào thư mục images
                                                        move_uploaded_file($tmp_name, $path2 . $name);
                                                        $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                                        // Insert ảnh vào cơ sở dữ liệu


                                                $sql1 = "INSERT INTO `nhanvien`(`id`,`ten_nv`, `hinh_anh`, `chuc_vu`, `ten_dangnhap`, `email`, `phone`, `mat_khau`) VALUES ('$id','$namei','$image_url','$chuc_vu','$tendangnhap','$email','$phone','$mat_khau')";
                                                $result = mysqli_query($con, $sql1);
                                                if ($result)
                                                header("location:./admin.php?act=addnvtc&dk=yes");
                                                else header("location:./admin.php?act=addnvtc&dk=no");
                                            } else header("location:./admin.php?act=addnvtc&dk=no");
                                            }}
                                        } else header("location:./admin.php?act=addnvtc&dk=no");
                                } else header("location:./admin.php?act=addnvtc&dk=no");
                        } else header("location:./admin.php?act=addnvtc&dk=no");
                } else header("location:./admin.php?act=addnvtc&dk=no");
            } else header("location:./admin.php?act=addnvtc&dk=no");
        }

        if (isset($_POST['btnnvsua'])) {
            if (isset($_POST['id']))
                if ($_POST['id'] != '') {
            if (isset($_POST['name']))
                if ($_POST['name'] != '') {
                    if (isset($_POST['chuc_vu']))
                        if ($_POST['chuc_vu'] != '') {
                            if (isset($_POST['phone']))
                                if ($_POST['phone'] != '') {
                                    if (isset($_POST['mat_khau']))
                                        if ($_POST['mat_khau'] != '') {
                                            if (isset($_POST['email']))
                                                if ($_POST['email'] != '') {
                                                    if ($_POST['tendangnhap'] != '') $tendangnhap=null;
                                                            $conn = mysqli_connect("localhost", "root", "", "bannuocdb");
                                                        
                                                            if ($_FILES['image']['name'] != NULL) {
                                                                // Kiểm tra file up lên có phải là ảnh không
                                                                if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif" || $_FILES['image']['type'] == "image/jpg") {
            
                                                                    // Nếu là ảnh tiến hành code upload
                                                                    $path1 = ""; // Ảnh sẽ lưu vào thư mục images
                                                                    $path2 = "../img/";
                                                                    $tmp_name = $_FILES['image']['tmp_name'];
                                                                    $name = $_FILES['image']['name'];
                                                                    // Upload ảnh vào thư mục images
                                                                    move_uploaded_file($tmp_name, $path2 . $name);
                                                                    $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                                                    // Insert ảnh vào cơ sở dữ liệu
                                                                }
                                                            }
                                                            $con = mysqli_connect("localhost", "root", "", "bannuocdb");
                                                            $result1 = mysqli_query($con, "UPDATE `nhanvien` SET `id` = '" . $_POST['id'] . "', `ten_nv` = '" . $_POST['name'] . "',`hinh_anh`='$image_url', `mat_khau` = '" . $_POST['mat_khau'] . "', `email` = '" . $_POST['email'] . "', `phone` = '" . $_POST['phone'] . "', `ten_dangnhap` = '" . $_POST['tendangnhap'] . "', `chuc_vu` = '" . $_POST['chuc_vu'] . "' WHERE `nhanvien`.`id` = " . $_GET['id']);
                                                                                                       
                                                            if ($result1)
                                                    header("location:./admin.php?act=suanvtc&dk=yes");
                                                else header("location:./admin.php?act=suanvtc&dk=no");
                                        } else header("location:./admin.php?act=suanvtc&dk=no");
                                    } else header("location:./admin.php?act=suanvtc&dk=no");
                                } else header("location:./admin.php?act=suanvtc&dk=no");
                        } else header("location:./admin.php?act=suanvtc&dk=no");
                } else header("location:./admin.php?act=suanvtc&dk=no");
            } else header("location:./admin.php?act=suanvtc&dk=no");
        }



    if (isset($_POST['btntkmk'])) {
        if (isset($_POST['matkhaumoi']))
            if ($_POST['matkhaumoi'] != '') {
                $result1 = mysqli_query($con, "UPDATE `taikhoang` SET `pass` = '" . $_POST['matkhaumoi'] . "' WHERE `username` = '" . $_GET['user'] . "'");
                var_dump($result1);
                if ($result1)
                    header("location:./admin.php?act=tkmktc&dk=yes");
                else header("location:./admin.php?act=tkmktc&dk=no");
            } else header("location:./admin.php?act=tkmktc&dk=no");
    }
    if (isset($_POST['btntkadd'])) {
        if (isset($_POST['tendangnhap']))
            if ($_POST['tendangnhap'] != '') {
                if (isset($_POST['matkhau']))
                    if ($_POST['matkhau'] != '') {
                        if (isset($_POST['name']))
                            if ($_POST['name'] != '') {
                                $sql2 = "INSERT INTO `taikhoang`(`id_quyen`,`username`,`pass`,`fullname`) VALUES (3,'" . $_POST['tendangnhap'] . "','" . $_POST['matkhau'] . "','" . $_POST['name'] . "')";
                                $result1 = mysqli_query($con, $sql2);
                                if ($result1)
                                    header("location:./admin.php?act=addtktc&dk=yes");
                                else header("location:./admin.php?act=addtktc&dk=no");
                            } else header("location:./admin.php?act=addtktc&dk=no");
                    } else header("location:./admin.php?act=addtktc&dk=no");
            } else header("location:./admin.php?act=addtktc&dk=no");
    }
    if (isset($_POST['btntksua'])) {
        if (isset($_POST['quyen']))
            if ($_POST['quyen'] != '') {
                if (isset($_POST['trangthai']) == "on") $trangthai = 0;
                if (isset($_POST['trangthai']) == NULL) $trangthai = 1;
                var_dump(intval($_POST['quyen']));
                // if ($_POST['quyen'] == '1' || $_POST['quyen'] == '2' || $_POST['quyen'] == '3' || $_POST['quyen'] == '4') {
                    $result1 = mysqli_query($con, "UPDATE `taikhoang` SET `id_quyen` = '" . $_POST['quyen'] . "', `trang_thai` = ' " . $trangthai . "' WHERE `username` = '" . $_GET['id'] . "'");
                    if ($result1)
                        header("location:./admin.php?act=suatktc&dk=yes");
                    else header("location:./admin.php?act=suatktc&dk=no");
                // } else header("location:./admin.php?act=suatktc&dk=no");
            } else header("location:./admin.php?act=suatktc&dk=no");
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xnhd') {
            if (isset($_GET['cuser']))
                if ($_GET['cuser'] == '') {
                    $conn = mysqli_connect("localhost", "root", "", "bannuocdb");
                    //$sql="SELECT `hoadon`.`id`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`, `trangthai`, `ten_dangnhap`, `ten_nv`,`nhanvien`.`id` AS `idnv` FROM (`hoadon` LEFT JOIN `nhanvien` ON `nhanvien`.`id`=`id_nhanvien` ) WHERE `hoadon`.`id` = " . $_GET['id'] . "";
                    $taikhoan = mysqli_query($conn, "SELECT `id`, `ten_dangnhap` FROM `nhanvien` WHERE `id`='" . $_GET['iduser'] . "'");
                    // $hoadon=mysqli_query($conn,$sql);var_dump($hoadon);
                    $row = mysqli_fetch_array($taikhoan);
                    $result1 = mysqli_query($conn, "UPDATE `hoadon` SET `trang_thai` = '1' ,`id_nhanvien` = '" . $row['id'] . "',`ngay_tao`=`ngay_tao` WHERE `id` = '" . $_GET['id'] . "'");
                    if ($result1)
                        header("location:./admin.php?act=xnhdtc&dk=yes");
                    else header("location:./admin.php?act=xnhdtc&dk=no");
                } else header("location:./admin.php?act=xnhdtc&dk=no");
        }
    }


    if (isset($_GET['act']) && $_GET['act'] == 'lhtttc' && isset($_GET['id'])) {
        include_once("./connect_db.php");
        $id_lienhe = $_GET['id'];
        $result = mysqli_query($con, "UPDATE `lien_he` SET `trang_thai` = '1' WHERE `id_lienhe` = '$id_lienhe'");
        mysqli_close($con);
        if ($result) {
            header("location: ./admin.php?act=lhtttc&dk=yes");
            exit(); 
            header("location: ./admin.php?act=lhtttc&dk=no");
            exit(); 
    }
    }
    
    // if (isset($_POST['btndm1'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=1");
    //     foreach($data['row1'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(1,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./admin.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm2'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=2");
    //     foreach($data['row2'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(2,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./admin.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm3'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=3");
    //     foreach($data['row3'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(3,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./admin.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm4'])) {
    //     $data=$_POST;
    //     var_dump($data);
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=4");
    //     foreach($data['row4'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(4,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");

    // }
    if (isset($_POST['btndmadd'])) {
        $data = $_POST;
        $inserts = "";
        if(isset($data['row'])){
        $them = mysqli_query($con, "INSERT INTO `quyen`(`ten_quyen`) VALUES ('" . $_POST['tendanhmuc'] . "')");
        $id_quyen = mysqli_insert_id($con);
        foreach ($data['row'] as $insertid) {
            $inserts .= !empty($inserts) ? "," : "";
            $inserts .= "(" . $id_quyen . "," . $insertid . ")";var_dump($data['row']);
        }
        
        $inserted = mysqli_query($con, "INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES " . $inserts . "");
        if($inserted) header("location:./admin.php?act=btndmaddtc&dk=yes");
        else header("location:./admin.php?act=btndmaddtc&dk=no");
        }else header("location:./admin.php?act=btndmaddtc&dk=no");
        
        // $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=1");
        // foreach($data['row1'] as $insertid){
        //     $inserts .= !empty($inserts) ? "," : "";
        //     $inserts .= "(1,".$insertid.")";
        // }
        // $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
        // header("location:./admin.php?act=btndmtc&dk=yes");
    }
    if (isset($_POST['btndmsua'])) {
        $data = $_POST;
        $inserts = "";
        if(isset($_POST['tendanhmuc']))
        if($_POST['tendanhmuc']!=''){
            if(isset($data['row'])){
        $sua = mysqli_query($con, "UPDATE `quyen` SET `ten_quyen`='" . $_POST['tendanhmuc'] . "' WHERE `id`=".$_GET['idq']."");
        $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=".$_GET['idq']."");
        foreach ($data['row'] as $insertid) {
            $inserts .= !empty($inserts) ? "," : "";
            $inserts .= "(".$_GET['idq']."," . $insertid . ")";var_dump($inserts);
        }
        
        $inserted = mysqli_query($con, "INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES " . $inserts . "");
        var_dump($inserted);
        if($inserted) header("location:./admin.php?act=btndmsuatc&dk=yes");
        else header("location:./admin.php?act=btndmsuatc&dk=no");
        }else header("location:./admin.php?act=btndmsuatc&dk=no");
        }else header("location:./admin.php?act=btndmsuatc&dk=no");
        
    }


    if (isset($_POST['btndmaddd'])) {
        if (isset($_POST['tendanhmucbv']))
            if ($_POST['tendanhmucbv'] != '') {
                if (isset($_POST['thutu']))
                    if ($_POST['thutu'] != '') {
                        $tendanhmucbv = $_POST['tendanhmucbv'];
                        $thutu = $_POST['thutu'];
                        $sql = "INSERT INTO `danhmucbaiviet`(`tendanhmucbv`,`thutu`) VALUES ('$tendanhmucbv','$thutu')";
                        $result = mysqli_query($con, $sql);
                        if ($result)
                            header("location:./admin.php?act=addmtc&dk=yes");
                        else header("location:./admin.php?act=addmtc&dk=no");
                    } else header("location:./admin.php?act=addmtc&dk=no");
            } else header("location:./admin.php?act=addmtc&dk=no");
    }

    if (isset($_POST['btnmaasua'])) {
        if (isset($_POST['tendanhmucbv']))
            if ($_POST['tendanhmucbv'] != '') {
                if (isset($_POST['thutu']))
                if ($_POST['thutu'] != '') {
                $con = mysqli_connect("localhost", "root", "", "bannuocdb");
                $result1 = mysqli_query($con, "UPDATE `danhmucbaiviet` SET `tendanhmucbv` = '" . $_POST['tendanhmucbv'] . "',`thutu` = '" . $_POST['thutu'] . "'WHERE `danhmucbaiviet`.`id_danhmucbv` = " . $_GET['id_danhmucbv'] . " ");
                if ($result1)
                    header("location:./admin.php?act=suadmmtc&dk=yes");
                
                else header("location:./admin.php?act=suadmmtc&dk=no");
            } else header("location:./admin.php?act=suadmmtc&dk=no");
        } else header("location:./admin.php?act=suadmmtc&dk=no");
    }


//     if (isset($_POST['btnaddblog'])) {
//         if (isset($_POST['id_baiblog']))
//             if ($_POST['id_baiblog'] != '') {
//                  if (isset($_POST['tenbaiblog']))
//                     if ($_POST['tenbaiblog'] != '') {
//                         if (isset($_POST['tomtat']))
//                             if ($_POST['tomtat'] != '') {
//                                 if (isset($_POST['noidungbaiblog']))
//                                     if ($_POST['noidungbaiblog'] != '') {
//                                         if (isset($_POST['id_danhmucbv']))
//                                             if ($_POST['id_danhmucbv'] != '') {
//                                                     $conn = mysqli_connect("localhost", "root", "", "bannuocdb");
//                                                     $tenbaiblog = $_POST['tenbaiblog'];
//                                                     $tomtat = $_POST['tomtat'];
//                                                     $noidungbaiblog = $_POST['noidungbaiblog'];
//                                                     $id_baiblog = $_POST['id_baiblog'];
//                                                     $id_danhmucbv = $_POST['id_danhmucbv'];
//                                                     if ($_FILES['image']['name'] != NULL) {
//                                                         // Kiểm tra file up lên có phải là ảnh không
//                                                         if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {

//                                                             // Nếu là ảnh tiến hành code upload
//                                                             $path1 = ""; // Ảnh sẽ lưu vào thư mục images
//                                                             $path2 = "../img/";
//                                                             $tmp_name = $_FILES['image']['tmp_name'];
//                                                             $name = $_FILES['image']['name'];
//                                                             // Upload ảnh vào thư mục images
//                                                             move_uploaded_file($tmp_name, $path2 . $name);
//                                                             $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
// // Insert ảnh vào cơ sở dữ liệu
//                                                             $sql1 = "INSERT INTO `baiblog` (`id_baiblog`,`tenbaiblog`, `hinh_anh`, `tomtat`, `noidungbaiblog`,`id_danhmucbv`,`trangthai`) VALUES ('$id_baiblog','$tenbaiblog','$image_url', '$tomtat','$noidungbaiblog','$id_danhmucbv',0);";
//                                                             $result1 = mysqli_query($conn, $sql1);
//                                                             if (isset($_FILES['gallery']))
//                                                             if ($_FILES['gallery'] != '') {
//                                                                 $uploadedFiles = $_FILES['gallery'];
//                                                                 @$result = uploadFiles($uploadedFiles);
//                                                                 if ($result) {
//                                                                     $galleryImages = $result['uploaded_files'];
//                                                                     if (!empty($galleryImages)) {
//                                                                         $product_id = $conn->insert_id;
//                                                                         $insertValues = "";
//                                                                         foreach ($galleryImages as $path) {
//                                                                             if (empty($insertValues)) {
//                                                                                 $insertValues = "( " . $product_id . ", '" . $path . "')";
//                                                                             } else {
//                                                                                 $insertValues .= ",( " . $product_id . ", '" . $path . "')";
//                                                                             }
//                                                                         }
//                                                                     }
//                                                                 } else "ko them duoc";
//                                                             }
//                                                         if ($result1) {
//                                                             // $result2 = mysqli_query($conn,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`='$idtl'");
//                                                             // $r=mysqli_fetch_array($result2);
// // $result3 = mysqli_query($conn,"UPDATE `theloai` SET `tong_sp`=".$r['cid_the_loai']." WHERE `id`=$idtl");
//                                                             // if ($result3) { 
//                                                             header('location:admin.php?act=addblogtc&dk=yes');
//                                                             // }else header("location:./admin.php?act=addsptc&dk=no");
//                                                         } else header("location:./admin.php?act=addblogtc&dk=no");
//                                                     }
//                                                 }
//                                             } else header("location:./admin.php?act=addblogtc&dk=no");
//                                         } else header("location:./admin.php?act=addblogtc&dk=no");
//                                         } else header("location:./admin.php?act=aaddblogtc&dk=no");
//                                     } else header("location:./admin.php?act=addblogtc&dk=no");
//                             } else header("location:./admin.php?act=addblogtc&dk=no");
//         }

// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if (isset($_POST['btnaddblog'])) {
    // Kiểm tra xem các trường bắt buộc đã được điền đầy đủ thông tin chưa
    if (
        isset($_POST['id_baiblog']) && !empty($_POST['id_baiblog']) &&
        isset($_POST['tenbaiblog']) && !empty($_POST['tenbaiblog']) &&
        isset($_POST['tomtat']) && !empty($_POST['tomtat']) &&
        isset($_POST['noidungblog']) && !empty($_POST['noidungblog']) &&
        isset($_POST['id_danhmucbv']) && !empty($_POST['id_danhmucbv'])
    ) {
        // Kiểm tra xem có file ảnh được chọn không
        if ($_FILES['image']['name'] != NULL) {
            // Xử lý tệp ảnh được gửi đi
            $conn = mysqli_connect("localhost", "root", "", "bannuocdb");
            $tenbaiblog = $_POST['tenbaiblog'];
            $tomtat = $_POST['tomtat'];
            $noidungblog = $_POST['noidungblog'];
            $id_baiblog = $_POST['id_baiblog'];
            $id_danhmucbv = $_POST['id_danhmucbv'];

            // Kiểm tra và xử lý tệp ảnh
            if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {
                $path1 = ""; // Thư mục ảnh sẽ lưu vào
                $path2 = "../img/";
                $tmp_name = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                move_uploaded_file($tmp_name, $path2 . $name);
                $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu

                // Thực hiện truy vấn SQL để thêm dữ liệu vào cơ sở dữ liệu
                $sql1 = "INSERT INTO `baiblog` (`id_baiblog`,`tenbaiblog`, `hinh_anh`, `tomtat`, `noidungblog`,`id_danhmucbv`,`trangthai`) VALUES ('$id_baiblog','$tenbaiblog','$image_url', '$tomtat','$noidungblog','$id_danhmucbv',0);";
                $result1 = mysqli_query($conn, $sql1);

                if ($result1) {
                    header('location:admin.php?act=addblogtc&dk=yes');
                } else {
                    header("location:./admin.php?act=addblogtc&dk=no");
                }
            } else {
                // Hiển thị thông báo lỗi nếu trường hình ảnh là bắt buộc
                echo "Lỗi: Vui lòng chọn ảnh đại diện.";
            }
        } else {
            // Hiển thị thông báo lỗi nếu trường hình ảnh là bắt buộc
            echo "Lỗi: Vui lòng chọn ảnh đại diện.";
        }
    } else {
        // Hiển thị thông báo lỗi nếu không điền đầy đủ thông tin
        echo "Lỗi: Vui lòng nhập đầy đủ thông tin.";
    }
}


if (isset($_POST['btnsuablog'])) {
    if (isset($_POST['id_baiblog']))
    if ($_POST['id_baiblog'] != '') {
         if (isset($_POST['tenbaiblog']))
            if ($_POST['tenbaiblog'] != '') {
                if (isset($_POST['tomtat']))
                    if ($_POST['tomtat'] != '') {
                        if (isset($_POST['noidungblog']))
                            if ($_POST['noidungblog'] != '') {
                                if (isset($_POST['id_danhmucbv']))
                                    if ($_POST['id_danhmucbv'] != '') {
                                            if (isset($_POST['trangthai']) == "on") $trangthai = 0;
                                            if (isset($_POST['trangthai']) == NULL) $trangthai = 1;
                                            include_once('function.php');
                                            $con = mysqli_connect("localhost", "root", "", "bannuocdb");
                                            $result4 = mysqli_query($con, "SELECT `id_danhmucbv` FROM `baiblog` WHERE `id_baiblog`=" . $_GET['id_baiblog'] . "");
                                            $r2 = mysqli_fetch_array($result4);
                                            if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                                                $uploadedFiles = $_FILES['gallery'];
                                                $result = uploadFiles($uploadedFiles);
                                                $galleryImages = $result['uploaded_files'];
                                            }
                                            if (!empty($_POST['gallery_image'])) {
                                                $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                                            }
                                            if (!isset($image_url) && !empty($_POST['image'])) {
                                                $image_url = $_POST['image'];
                                            }
                                            if ($_FILES['image']['name'] != NULL) {
                                                // Kiểm tra file up lên có phải là ảnh không
                                                if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {

                                                    // Nếu là ảnh tiến hành code upload
                                                    $path1 = "";
                                                    $path = "../img/"; // Ảnh sẽ lưu vào thư mục images
                                                    $tmp_name = $_FILES['image']['tmp_name'];
                                                    $name = $_FILES['image']['name'];
                                                    // Upload ảnh vào thư mục images
                                                    move_uploaded_file($tmp_name, $path . $name);
                                                    $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                                    // Insert ảnh vào cơ sở dữ liệu
                                                }
                                            }
                                              $result1 = mysqli_query($con,"UPDATE `baiblog` SET `id_baiblog`='" . $_POST['id_baiblog'] . "',`tenbaiblog`='" . $_POST['tenbaiblog'] . "',`hinh_anh`='$image_url',`id_danhmucbv` = " . $_POST['id_danhmucbv'] . ",`tomtat`='" . $_POST['tomtat'] . "', `ngaydang` = NOW(),`trangthai`='. $trangthai . ',`noidungblog`='" . $_POST['noidungblog'] . "' WHERE `baiblog`.`id_baiblog` = " . $_GET['id_baiblog']);
                                            if ($result1) {
                                                header("location:./admin.php?act=suablogtc&dk=yes");
                                            } else header("location:./admin.php?act=suablogtc&dk=no");
                                        } else header("location:./admin.php?act=suablogtc&dk=no");
                                    } else header("location:./admin.php?act=suablogtc&dk=no");
                                } else header("location:./admin.php?act=suablogtc&dk=no");
                        } else header("location:./admin.php?act=suablogtc&dk=no");
        } else header("location:./admin.php?act=suablogtc&dk=no");
    }
// if (isset($_POST['btnsuablog'])) {
//     if (isset($_POST['id_baiblog']) && $_POST['id_baiblog'] != '') {
//         if (isset($_POST['tenbaiblog']) && $_POST['tenbaiblog'] != '') {
//             if (isset($_POST['tomtat']) && $_POST['tomtat'] != '') {
//                 if (isset($_POST['noidungblog']) && $_POST['noidungblog'] != '') {
//                     if (isset($_POST['id_danhmucbv']) && $_POST['id_danhmucbv'] != '') {
//                         if (isset($_POST['trangthai'])) {
//                             $trangthai = ($_POST['trangthai'] == "on") ? 0 : 1;
//                         } else {
//                             $trangthai = 1; // Mặc định là 1 nếu không có checkbox được chọn
//                         }
//                         include_once('function.php');
//                         $con = mysqli_connect("localhost", "root", "", "bannuocdb");

//                         // Lấy id_danhmucbv từ form POST
//                         $id_danhmucbv = mysqli_real_escape_string($con, $_POST['id_danhmucbv']);

//                         // Kiểm tra xem có tệp hình ảnh được tải lên không
//                         if (!empty($_FILES['image']['name'])) {
//                             // Kiểm tra nếu file được tải lên là ảnh
//                             $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
//                             if (in_array($_FILES['image']['type'], $allowed_types)) {
//                                 $path = "../img/"; // Thư mục lưu trữ ảnh
//                                 $image_name = $_FILES['image']['name'];
//                                 $tmp_name = $_FILES['image']['tmp_name'];

//                                 // Di chuyển và lưu trữ ảnh vào thư mục
//                                 if (move_uploaded_file($tmp_name, $path . $image_name)) {
//                                     $image_url = $path . $image_name; // Đường dẫn ảnh trong thư mục
//                                 } else {
//                                     // Xử lý lỗi nếu không thể di chuyển ảnh
//                                     echo "Lỗi khi di chuyển ảnh";
//                                     exit;
//                                 }
//                             } else {
//                                 // Xử lý lỗi nếu tệp không phải là ảnh
//                                 echo "Chỉ chấp nhận file ảnh định dạng JPEG, PNG hoặc GIF";
//                                 exit;
//                             }
//                         } else {
//                             // Nếu không có tệp hình ảnh mới, sử dụng URL hình ảnh cũ
//                             $image_url = isset($_POST['image']) ? $_POST['image'] : '';
//                         }

//                         // Cập nhật dữ liệu vào bảng baiblog
//                         $result1 = mysqli_query($con, "UPDATE `baiblog` SET `id_baiblog`='" . $_POST['id_baiblog'] . "',`tenbaiblog`='" . $_POST['tenbaiblog'] . "',`hinh_anh`='$image_url',`id_danhmucbv` = $id_danhmucbv,`tomtat`='" . $_POST['tomtat'] . "', `ngaydang` = " . time() . ",`trangthai`= $trangthai,`noidungblog`='" . $_POST['noidungblog'] . "' WHERE `baiblog`.`id_baiblog` = " . $_GET['id_baiblog']);

//                         if ($result1) {
//                             header("location:./admin.php?act=suablogtc&dk=yes");
//                         } else {
//                             echo "Lỗi khi cập nhật dữ liệu vào cơ sở dữ liệu";
//                             exit;
//                         }
//                     } else {
//                         echo "Thiếu thông tin danh mục bài viết";
//                         exit;
//                     }
//                 } else {
//                     echo "Thiếu nội dung bài viết";
//                     exit;
//                 }
//             } else {
//                 echo "Thiếu tóm tắt bài viết";
//                 exit;
//             }
//         } else {
//             echo "Thiếu tên bài viết";
//             exit;
//         }
//     } else {
//         echo "Thiếu ID bài viết";
//         exit;
//     }
//}
?>
    
</body>

</html>