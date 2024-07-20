-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 09:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bannuocdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiblog`
--

CREATE TABLE `baiblog` (
  `id_baiblog` int(10) UNSIGNED NOT NULL,
  `tenbaiblog` varchar(255) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `noidungblog` mediumtext NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_danhmucbv` int(10) UNSIGNED NOT NULL,
  `luotxem` int(11) NOT NULL,
  `ngaydang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baiblog`
--

INSERT INTO `baiblog` (`id_baiblog`, `tenbaiblog`, `tomtat`, `noidungblog`, `hinh_anh`, `id_danhmucbv`, `luotxem`, `ngaydang`, `trangthai`) VALUES
(1397, 'Áo he', '<p>Áo đẹp cho mùa hè</p><p>&nbsp;</p><p>&gt;</p>', '<p>Sản phẩm phù hợp cho mùa hè&nbsp;</p><p>&nbsp;</p><p>&gt;</p>', 'Ao-thun-co tron MLB-den.jpg', 3, 0, '2024-05-07 15:53:12', 0),
(1975, 'Ao khoác đẹp', '<p>MSGFJG</p>', '<p>,msagfnsabmhjjn</p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', 'drop-shoulder-knit-t-shirt-off-white-870910_1800x1800.jpg', 3, 0, '2024-05-04 15:04:43', 0),
(10497, 'dnfgkdsfhnvcc', '<p>Hãy làm việc chăm chỉ</p><p>&nbsp;</p><p>&gt;</p>', '<p>12356</p><p>&nbsp;</p><p>&gt;</p>', '43pks_3atsb1134_2_e0420bb68ba54c868002855b9379fb51_2652294519a54aef857a0d7745a19338_master.jpg', 4, 0, '2024-05-04 15:28:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sanpham` int(10) UNSIGNED NOT NULL,
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `so_luong` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`id`, `id_sanpham`, `id_hoadon`, `so_luong`) VALUES
(262, 223, 145, 1),
(263, 331, 145, 1),
(264, 222, 145, 1),
(265, 223, 146, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `id_phieunhap` int(10) UNSIGNED NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(15) UNSIGNED NOT NULL,
  `icon_dm` varchar(255) NOT NULL,
  `ten_danhmuc` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `icon_dm`, `ten_danhmuc`) VALUES
(1, '<i class=\"fa fa-money\" aria-hidden=\"true\"></i>', 'Hóa đơn'),
(2, '<i class=\"fa fa-bar-chart\" aria-hidden=\"true\"></i>', 'Thống kê'),
(5, '<i class=\"fa fa-users\" aria-hidden=\"true\"></i>', 'Khách hàng'),
(7, '<i class=\"fa fa-cubes\" aria-hidden=\"true\"></i>', 'Sản phẩm'),
(8, '<i class=\"fa fa-sitemap\" aria-hidden=\"true\"></i>', 'Thể loại'),
(9, '<i class=\"fa-solid fa-blog\"></i>', 'Bài blog'),
(10, '<i class=\'fa fa-user fa-fw\'> </i>', 'Tài khoản'),
(11, '<i class=\"fa fa-comment-o\" aria-hidden=\"true\"></i>', 'Liên hệ'),
(12, '<i class=\"fa-solid fa-newspaper\"></i>', 'Danh mục bài viết'),
(13, '<i class=\"fa fa-male\" aria-hidden=\"true\"></i>', 'Nhân viên'),
(14, '<i class=\"fa fa-cog\" aria-hidden=\"true\"></i>', 'Đổi mật khẩu'),
(21, '', 'Phiếu nhập');

-- --------------------------------------------------------

--
-- Table structure for table `danhmucbaiviet`
--

CREATE TABLE `danhmucbaiviet` (
  `id_danhmucbv` int(10) UNSIGNED NOT NULL,
  `tendanhmucbv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thutu` int(11) NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ngaysua` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmucbaiviet`
--

INSERT INTO `danhmucbaiviet` (`id_danhmucbv`, `tendanhmucbv`, `thutu`, `ngaytao`, `ngaysua`) VALUES
(1, 'Xu hướng thời trang', 1123, '2024-04-29 18:21:52', '2024-04-29 18:21:52'),
(2, 'Thời trang GenZ có gì HOT', 1124, '2024-04-29 18:26:40', '2024-04-29 18:26:40'),
(3, 'Các tip phối quần áo thịnh hành', 1125, '2024-04-29 18:26:40', '2024-04-29 18:26:40'),
(4, 'Sự kiện thời trang', 1126, '2024-04-29 18:27:16', '2024-04-29 18:27:16'),
(5, 'Thời trang, cuộc sống', 1127, '2024-04-30 15:41:38', '2024-04-30 15:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsp`
--

CREATE TABLE `hinhanhsp` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinhanhsp`
--

INSERT INTO `hinhanhsp` (`id`, `hinh_anh`, `id_sp`) VALUES
(111, 'drop-shoulder-knit-t-shirt-off-white-945316_1800x1800.jpg', 112),
(112, 'drop-shoulder-knit-t-shirt-black-666881_720x.jpg', 112),
(113, 'drop-shoulder-knit-t-shirt-off-white-870910_1800x1800.jpg', 112),
(1111, '84rs.rep.1_28.jpg', 111),
(1112, 'Ao_thun_oversize_84RISING_REPRESENTshadwo1.jpg', 111),
(1113, 'model-84-nu-nam-25_44.jpg', 111),
(1131, 'multi-technique-boxy-t-shirt-black-352192_720x.jpg', 113),
(1132, 'multi-technique-boxy-t-shirt-off-white-376657_720x.jpg', 113),
(1133, 'IMG_6768_360x.jpg', 113),
(1141, 'ao-thun_84RESing.jpg', 114),
(1142, 'ao-thun_84RESing_2.jpg', 114),
(1143, 'ao-thun_84RESing_1.jpg', 114),
(1151, 'goods_466165_sub14.jpg', 115),
(1152, 'vngoods_56_466165.jpg', 115),
(1153, 'goods_466165_sub17.jpg', 115),
(1161, 'goods_69_456433.jpg', 116),
(1162, 'goods_456433_sub17.jpg', 116),
(1163, 'goods_456433_sub20.jpg', 116),
(2211, 'áo-khoac-cool-touch.jpg', 221),
(2212, 'ao-khoac-cook-touch.jpg', 221),
(2213, 'ao-khoac-cool-touch3.jpg', 221),
(2221, 'ao-khoac-bong-chày.jpg', 222),
(2222, 'ao-khoac-bong-chay1.jpg', 222),
(2223, 'ao-khoac-bong-chay-2.jpg', 222),
(2231, 'wavy-track-jacket-black-850362_360x.jpg', 223),
(2233, 'wavy-track-jacket-black-187110_120x.jpg', 223),
(2251, '20240129_I4KH17cyKo.jpg', 224),
(2252, '20240129_u2aCQ8Cgc0.jpg', 224),
(2253, '20240129_Gyl55cnQtw.jpg', 224),
(2261, 'e2792e2c242d43a284b3a460752229a4_master.jpg', 225),
(2262, '794e5ef166724cd3940383465ff14560_master.jpg', 225),
(2263, '04b8d8dc4ddb4a2ba4379396ea8a5ac7_master.jpg', 225),
(3311, 'Ao-hoodie-Loosefit.jpg', 331),
(3312, 'Ao-hoodie-loosefie-1.jpg', 331),
(3313, 'ao-hoodie-loosefit-2.jpg', 331),
(3321, 'ao-hoodie-basic-unisex.jpg', 332),
(3322, 'ao-hoodie-basic-unisex-sau.jpg', 332),
(3323, 'ao-hoodie-basic-unisex-girl.jpg', 332),
(3324, 'ao-nike-sportswear-men-s.png', 335),
(3325, 'sportswear-mens-hoodie-m4nlkb-54ff8a75-8475-458d-8020-aee9e225f0bb.jpg', 335),
(3326, 'sportswear-mens-hoodie-m4nlkb.jpg', 335),
(3331, 'tobi-regular-boxy-sweater-off-white-780828_120x.jpg', 333),
(3332, 'tobi-regular-boxy-sweater-off-white-767352_1800x1800.jpg', 333),
(3333, 'tobi-regular-boxy-sweater-nude-475636_1800x1800.jpg', 333),
(3334, '50bks_3ahtms136.jpg', 445),
(3335, '50bks_3ahtms136_4_d86f.jpg', 445),
(3336, '50bks_3ahtms136_5_46018b763e4f4eae9403ff1d57d1227master.jpg', 445),
(3341, 'tobi-regular-patches-hoodie-coconut-milk-769680_360x.jpg', 334),
(3342, 'tobi-regular-patches-hoodie-coconut-milk-904249_120x.jpg', 334),
(3343, 'tobi-regular-patches-hoodie-coconut-milk-378797_360x.jpg', 334),
(4411, 'mu-rong-vanh-thoi-trang-1-768x768.jpg', 441),
(4412, 'mu-rong-vanh-cho-nam-1-768x768.jpg', 441),
(4413, 'non-rong-vanh-nam-1-768x768.jpg', 441),
(4421, 'tui-xach-mini-malabon.png', 442),
(4431, 'IMG_9909.PNG', 443),
(4432, 'IMG_9908.PNG', 443),
(4433, 'IMG_9910.png', 443),
(4441, 'tui-vai.jpg', 444),
(4442, 'tui-vai-1.jpg', 444),
(4443, 'tui-vai-3.jpg', 444),
(4445, 'wavy-track-jacket-black-382423_360x.jpg', 223),
(4447, 'O1CN01PgADic1cUDsAY9fGa_!!2211953043603-0-cib.jpg', 551),
(4448, 'O1CN01ws5jGR1cUDsZbTHrk_!!2211953043603-0-cib(1).jpg', 552),
(4461, 'khan-quang-co-cashmere-chowd01-1.jpg', 446),
(4462, 'khan-quang-co-cashmere-cho-nam-kqn-wd01-2.jpg', 446),
(4463, 'khan-quang-cashmere-cho-nam-kqn-wd01-1.jpg', 446),
(5512, 'O1CN01vrWOgj1cUDsFKRrn9_!!2211953043603-0-cib.jpg', 551),
(5513, 'O1CN01sFt8H51cUDsCsiRy2_!!2211953043603-0-cib.jpg', 551),
(5521, 'O1CN018HhVCO1cUDsXpoNce_!!2211953043603-0-cib.jpg', 552),
(5522, 'O1CN01Y7yZqI1cUDsSLEAzm_!!2211953043603-0-cib.jpg', 552),
(5531, 'goods_467384_sub14.jpg', 553),
(5532, 'goods_467384_sub15.jpg', 553),
(5533, 'vngoods_10_467384.jpg', 553),
(5541, 'z5051174191309_cea89d874a356af8984f4cab878d9894802690_master.jpg', 554),
(5542, '7aa5bf4e9e87962dd6ee36706e_master.jpg', 554),
(5543, 'yay_rabbit_baggy_jeans_1.jpg', 554);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_khachhang` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_nhanvien` int(10) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_khachhang`, `tong_tien`, `ngay_tao`, `id_nhanvien`, `trang_thai`) VALUES
(129, 15, 1440000, '2024-04-23 16:20:57', 1, 1),
(132, 15, 1120000, '2024-04-23 16:21:55', 1, 1),
(133, 15, 802000, '2024-03-12 15:20:39', 0, 1),
(140, 15, 518000, '2023-12-12 16:48:37', 0, 1),
(141, 15, 200000, '2023-12-12 16:48:57', 6, 1),
(142, 18, 1510000, '2023-12-13 10:13:06', 0, 1),
(145, 21, 1315000, '2024-04-09 15:47:17', 0, 1),
(146, 20, 900000, '2024-04-22 16:55:34', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_kh` varchar(191) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `ten_dangnhap` varchar(191) NOT NULL,
  `mat_khau` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `dia_chi` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `tong_tien_muahang` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten_kh`, `hinh_anh`, `ten_dangnhap`, `mat_khau`, `email`, `dia_chi`, `phone`, `ngay_tao`, `ngay_sua`, `tong_tien_muahang`, `trangthai`) VALUES
(15, 'Phạm Đan Vy', '', 'Đan Vy', '1234567', 'danzy123@gmail.com', 'Đống Đa Hà Nội', '0358881765', '2023-11-23 10:10:11', '2024-04-26 18:18:08', 26857000, 0),
(17, '', '', 'HuyHoang', '10001', 'huy@gmail.com', 'An Giang', '0465876254', '2023-12-11 12:18:33', '2023-12-11 12:18:33', 0, 1),
(18, 'Lê Vy An', '', 'Anvy', '2002', 'anvy@gmail.com', 'TP-HCM', '0987376812', '2023-12-13 10:09:56', '2024-04-26 18:44:09', 2312000, 0),
(19, '', '', 'Viet1010', 'viet1987', 'viet2002@gmail.com', 'An Giang', '0357891604', '2024-03-26 16:29:49', '2024-03-26 16:29:49', 0, 0),
(20, 'Trần Minh Quân', '', 'quan890', 'quaN$1234', 'quenanhdi@gmail.com', 'Thủ Đức, tphcm', '0876498754', '2024-03-26 16:42:40', '2024-04-22 16:36:46', 900000, 0),
(21, 'Nguyễn Minh Hoàng', '', 'hoangg', 'hoang123', 'hoang102@gmail.com', 'Quận 7, tphcm', '0983487132', '2024-03-26 16:51:23', '2024-03-26 16:51:23', 1315000, 0),
(25, 'Lê Huy Anh', '', 'hyAnh', 'Hyanh31007', 'anhHy@gmail.com', 'Bình Thuận', '0563183240', '2024-04-22 16:33:57', '2024-04-22 16:33:57', 0, 0),
(26, 'Phạm Vy Vy', '', 'Vy124', 'Vy209#197', 'vy@gmail.com', 'Bến Tre', '0846874875', '2024-05-04 15:44:13', '2024-05-04 15:44:13', 0, 0),
(32, 'Phạm Minh Hải', '', 'Haicute1', 'Haib#2009', 'Hai209@gmail.com', 'Bến Tre', '0957984787', '2024-05-05 16:42:27', '2024-05-05 16:42:27', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `id_lienhe` int(10) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `email_ss` varchar(50) NOT NULL,
  `tieu_de` varchar(50) NOT NULL,
  `noidung` text NOT NULL,
  `ngay_gui` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lien_he`
--

INSERT INTO `lien_he` (`id_lienhe`, `ho_ten`, `sdt`, `email_ss`, `tieu_de`, `noidung`, `ngay_gui`, `trang_thai`) VALUES
(4, 'Phạm Minh Hưng', '0476935976', 'hungzero@gmail.com', 'Đổi size áo phong', 'Tôi mặc áo không vừa, tôi muốn đổi lại size lớn hơn?', '2024-04-27 09:07:06', 1),
(5, 'Trà My', '0359871256', 'myyy101@gmail.com', 'Chương trình khuyến mãi', 'Cho tôi hỏi về chương trình khuyến mãi tại cửa hàng trong 4/2024', '2024-04-27 09:08:01', 1),
(6, 'Phạm Việt Hoàng', '0345687323', 'hoangcute@gmail.com', 'Thanh Toán online', 'Mình muốn hỏi về việc thanh toán online 50% trước khi nhận hàng được không?', '2024-04-27 14:12:48', 1),
(7, 'Nguyễn Như Ý', '0548656983', 'NhuY@gmail.com', 'giới thiệu sản phẩm', 'Tôi sắp đi du lịch mùa hè, bạn có thể giới thiệu cho tôi một vài bộ quần áo.', '2024-04-23 15:12:23', 0),
(8, 'Phạm Minh Anh', '0598387635', 'minhAnh@gmail.com', 'Sản phẩm mùa hè', 'Giới thiệu cho tôi vài sản phẩm mùa hè', '2024-04-27 13:38:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_nv` varchar(191) NOT NULL,
  `chuc_vu` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ten_dangnhap` varchar(191) NOT NULL,
  `mat_khau` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten_nv`, `chuc_vu`, `ten_dangnhap`, `mat_khau`, `phone`, `hinh_anh`, `email`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'Nguyễn Văn Bình', 'Bán hàng', 'VanBinh', 'Binh@1987', '0353535353', 'z5419014830009_fb009725fd8aa182b826d2deacf58d01.jpg', 'vanbinh@gmail.com', '2023-10-12 15:32:29', '2023-10-12 15:32:29'),
(3, 'Nguyễn Gia Nghi', 'Bán hàng', 'ZaNghi', 'giaN&1209', '0375587453', 'z5419049923695_3902a4e928ef9bdc6e57866369634a79.jpg', 'zanghi@gmail.com', '2023-11-12 15:33:41', '2023-11-12 15:33:41'),
(4, 'Trường Thịnh', 'Bán hàng', 'ThinhCute', 'Thinh#12974', '0130329875', 'z5419036048718_14c3dbf81ae545947433da57779c56e0.jpg', 'DucThinhok@gmail.com', '2023-10-12 15:34:10', '2023-10-12 15:34:10'),
(6, 'Lê Hoàng Nam', 'Bán hàng', 'HoangNam', 'thinh@H846t', '0457687453', 'z5419041450250_99b07ef08127a9281f275cc2afc1eba0.jpg', 'Nam@gmail.com', '2023-12-12 14:16:12', '2023-12-12 14:16:12'),
(7, 'Nguyễn Mỹ Mỹ', 'Bán hàng', 'myMy', 'mymy@1975H', '0387598465', 'z5418995494560_ac66038d52d005fad3982af3712c9f8c.jpg', 'mymy@gmail.com', '2023-12-13 10:44:32', '2023-12-13 10:44:32'),
(10, 'Nguyễn Thị Trà My', 'Bán hàng', 'traMy', 'traMy@10947', '0475698564', 'z5419014802816_588c607aa435c0dabeb802e9df052b18.jpg', 'tramy@gmail.com', '2024-04-22 17:27:31', '2024-04-22 17:27:31'),
(11, 'Lê Minh Phúc', 'Bán hàng', 'PhucLe', 'PhucLe#9567', '0766847634', 'z5419014283658_70cea1f23dd8a064ea336b9309da1b57.jpg', 'phuc@gmai.com', '2024-04-27 14:23:23', '2024-04-27 14:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nv` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `nguoi_nhan` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `ghichu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `id_nv`, `tong_tien`, `ngay_tao`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`) VALUES
(6, 11, 1000000, '2024-05-05 15:14:10', 'GenZ shop', 856349845, 'An Giang', 'Sản phẩm nhập kho');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_quyen` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`id`, `ten_quyen`) VALUES
(1, 'admin'),
(2, 'Quản lý'),
(3, 'Nhân viên'),
(4, 'Tự chọn'),
(6, 'ABC'),
(7, 'Nhân Viên Tư Vấn');

-- --------------------------------------------------------

--
-- Table structure for table `quyendahmuc`
--

CREATE TABLE `quyendahmuc` (
  `id_quyen` int(10) UNSIGNED NOT NULL,
  `id_danhmuc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyendahmuc`
--

INSERT INTO `quyendahmuc` (`id_quyen`, `id_danhmuc`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 11),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 1),
(4, 2),
(1, 1),
(1, 2),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(6, 1),
(6, 2),
(6, 7),
(6, 8),
(7, 11),
(0, 21),
(7, 21);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--
Vải được tạo nên từ sợi Cotton hiệu suất cao
CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_sp` varchar(191) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_the_loai` int(10) UNSIGNED NOT NULL,
  `so_luong` tinyint(4) NOT NULL,
  `sl_da_ban` tinyint(4) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `trangthai` tinyint(1) NOT NULL,
  `gia_goc` int(11) NOT NULL,
  `NoiDungChiTiet` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_sp`, `don_gia`, `hinh_anh`, `id_the_loai`, `so_luong`, `sl_da_ban`, `ngay_tao`, `ngay_sua`, `trangthai`, `gia_goc`, `NoiDungChiTiet`) VALUES
(111, 'Áo Thun 84RISING REPRESENT', 240000, '84rs.rep.1_28.jpg', 1, 50, 40, '2024-03-10 18:11:21', '0000-00-00 00:00:00', 0, 458000, '<ul><li>Chất liệu 100% Cotton USA chất lượng cao thấm hút mồ hôi tốt</li><li>Chất Liệu:Mềm mại, bền dai, không bai, nhão, xù lông và không gây khó chịu khi mặc</li><li>Form Áo: Boxy Fit.</li><li>Độ Co Giãn: Ít</li><li>Các hình in sắc nét, và chất lượng cao đảm bảo KHÔNG bong, tróc</li><li>Cổ Áo: Cổ Tròn</li><li>Phong Cách: Casual</li><li>Định lượng vải: 280gsm dày dặn Top đầu thị trường</li></ul><p>&gt;</p>'),
(112, 'Áo Thun Drop Shoulder Knit ', 460000, 'drop-shoulder-knit-t-shirt-off-white-945316_1800x1800.jpg', 1, 33, 12, '2024-03-10 18:11:21', '0000-00-00 00:00:00', 0, 600000, '<h4>Thông tin chi tiết</h4><p>Hashtag: #Men #Casual</p><ul><li>Chất Liệu:100% Cotton - 2 Chiều</li><li>Form Áo: Boxy Fit.</li><li>Độ Co Giãn: Ít</li><li>Tay Áo: Tay Dài</li><li>Cổ Áo: Cổ Tròn</li><li>Phong Cách: Casual</li><li>Định Lượng: 270GSM</li></ul>'),
(113, 'Áo Thun Multi Technique Boxy ', 450000, 'multi-technique-boxy-t-shirt-black-352192_720x.jpg', 1, 100, 10, '2024-03-09 18:18:42', '2024-03-16 18:18:42', 0, 500000, '<h4>Thông tin chi tiết</h4>\r\n        <ul>\r\n            <li>Hashtag: #Men #Casual</li>\r\n            <li>Chất Liệu:100% Cotton - 2 Chiều</li>\r\n            <li>Form Áo: Boxy Fit.</li>\r\n            <li>Độ Co Giãn: Ít</li>\r\n            <li>Tay Áo: Tay Dài</li>\r\n            <li>Cổ Áo: Cổ Tròn</li>\r\n            <li>Phong Cách: Casual</li>\r\n            <li>Định Lượng: 270GSM</li>\r\n        </ul>'),
(114, 'Áo thun 84RISING Walk Tee tay ngắn', 239000, 'ao-thun_84RESing.jpg', 1, 100, 1, '2024-03-16 19:05:09', '0000-00-00 00:00:00', 0, 0, '<p>Thông tin chi tiết</p><ul><li>Hashtag: #Men #Casual</li><li>Chất liệu: 100% Cotton</li><li>Định lượng 245gsm dày dặn</li><li>Form áo: Unisex oversize</li><li>Bo cổ dày dặn, không bai nhão</li><li>Đường may 3 kim tỉ mỉ, hoàn thiện tốt Công nghệ in lụa, giúp hình in phồng, không lo bong tróc Tự hào sản xuất tại Việt Nam</li></ul>'),
(115, 'Áo Thun UT HOKUSAI TAY NGẮN', 293000, 'goods_466165_sub14.jpg', 1, 5, 0, '2024-04-26 08:32:03', '0000-00-00 00:00:00', 0, 391000, '<p>Bức tranh ukiyo-e được sản xuất thông qua một quy trình ba bước:</p><p>Nghệ sĩ vẽ hình ảnh, một thợ thủ công khắc các khối gỗ, và một người in áp dụng các màu sắc lên các khối gỗ và in chúng lên giấy Nhật Bản.</p><p>&nbsp;</p><p>Nhiều tác phẩm ukiyo-e chia sẻ cùng một chủ đề nhưng khác nhau về cả cấu trúc và màu sắc.</p><p>Bộ sưu tập này được tạo ra bằng cách tái tạo nhiều tác phẩm ukiyo-e của Katsushika Hokusai được sản xuất theo cách này.</p><p>&gt;</p>'),
(116, 'Áo Thun UT HOKUSAI Ngắn Tay', 391000, 'goods_69_456433.jpg', 1, 5, 0, '2024-04-26 08:41:27', '2024-04-26 08:41:27', 0, 391000, '<p>Hokusai có sở trường khắc họa nhiều khía cạnh khác nhau của nước, từ hình ảnh những giọt nước rơi, gợn sóng, hay đang chảy thành dòng. Bộ sưu tập lần này mang nhiều hình ảnh từ loạt tranh in phong cảnh đầu tiên của Hokusai như ”Ba mươi sáu cảnh sắc của núi Phú Sĩ” và loạt tranh duy nhất mà ông vẽ phong cảnh theo chiều dọc.</p>\r\n<p>Xin lưu ý mã số nhận diện của sản phẩm có thể có sự khác biệt, kể cả khi đó là cùng một mặt hàng.</p>'),
(221, 'Áo Khoác Có Nón Vải Thun Cool Touch', 452000, 'áo-khoac-cool-touch.jpg', 2, 100, 10, '2024-03-11 14:57:58', '2024-03-18 14:57:58', 0, 600000, '<h4>Thông tin chi tiết</h4>\r\n        <ul>\r\n            <li>Chất liệu: Mini Zurry 4 chiều</li>\r\n            <li>Thành phần: 94% Cotton 6% Spandex</li>\r\n            <li> High TPI (Twists per inch) - sợi có chỉ số vòng xoắn cao (cao hơn 25% so với sợi thông thường) . Kết hợp công nghệ Cool Touch giúp vải:</li>\r\n            <li>- Siêu mềm mướt</li>\r\n            <li>- Mịn mát</li>\r\n            <li>- Co giãn cực thoải mái khi sử dụng</li>\r\n            \r\n        </ul>'),
(222, 'Áo khoác bóng chày phối nút cài Nylon ', 380000, 'ao-khoac-bong-chày.jpg', 2, 99, 2, '2024-03-12 04:59:51', '2024-03-18 04:59:51', 0, 400000, '<h4>Thông tin chi tiết</h4>\r\n        <ul>\r\n            <li>Chất liệu: Mini Zurry 4 chiều</li>\r\n            <li>Chất liệu: 100% nylon</li>\r\n            <li>Lớp lót: 100% polyester/77% acrylic, 20% polyester, 3% polyurethane.</li>\r\n            <li>Cổ áo và tay bo viền nổi bật</li>\r\n            <li>Hoạ tiết: Trơn một màu</li>\r\n            \r\n            \r\n        </ul>'),
(223, 'Áo Khoác Wavy Track Jacket ', 450000, 'wavy-track-jacket-black-850362_360x.jpg', 2, 97, 13, '2024-03-06 04:59:51', '2024-03-11 04:59:51', 0, 0, '<h4>Thông tin chi tiết</h4>\r\n        <ul>\r\n            <li>Chất liệu: Mini Zurry 4 chiều</li>\r\n            <li>Logo Tobi được in lụa</li>\r\n            <li>Phần bo tay và bo lai áo được may ôm vào giúp khi mặc lên sẽ tạo cảm giảm phồng hơn, chia tỉ lệ cơ thể ⅓ giúp người mặc trông cao hơn</li>\r\n            <li>Chi tiết đường rã gợn sóng được may tinh tế tạo sự liên kết giữa mặt trước và sau\r\n\r\n</li>\r\n            <li>Đường sọc trên tay áo với 2 sọc nhỏ và 1 sọc lớn cực kỳ trendy và sporty</li>\r\n            \r\n            \r\n        </ul>'),
(224, 'ÁO KHOÁC TOTODAY DÙ UNISEX', 450000, '20240129_I4KH17cyKo.jpg', 2, 4, 0, '2024-04-26 08:53:30', '2024-04-26 08:53:30', 0, 480000, '<h4>Mô tả sản phẩm:</h4>\r\n<p>Áo khoác Ombre với thiết kế hiện đại, trẻ trung cùng điểm nhấn màu vải màu ombre vô cùng bắt mắt. Áo khoác với chất vải dù có khả năng che nắng và tránh gió cùng định lượng 150gsm khá dày dặn mang lại cảm giác ấm áp cho Friends.</p>\r\n<h4>Ưu điểm nổi bật:</h4>\r\n<p> Form Oversize thời thượng phù hợp với mọi vóc dáng</p>\r\n<p>Chất liệu dù che nắng, chắn gió và giữ ấm tốt</p>\r\n<p>Áo khoác có nón, thiết kế rã phối thân thời trang, chữ in tổng thể trẻ trung năng động.</p>'),
(225, 'ÁO BLACK CARTOON CARDIGAN UNISEX', 248900, 'e2792e2c242d43a284b3a460752229a4_master.jpg', 2, 10, 2, '2024-04-26 10:27:16', '2024-04-26 10:27:16', 0, 389000, '<h4>BLACK CARTOON CARDIGAN: Sự Kết Hợp Giữa Phong Cách và Sự Độc Đáo</h4>\r\n<p>BLACK CARTOON CARDIGAN là một mảnh thời trang độc đáo và phong cách, mang lại sự thoải mái và phong cách cho người mặc.</p> \r\n<h4>Cardigan này nổi bật và thu hút ngay từ cái nhìn đầu tiên.</h4>\r\n<p>Chất Liệu Mềm Mại, Thoải Mái Suốt Ngày Dài</p>\r\n<p>Sản phẩm được làm từ chất liệu vải cao cấp, mềm mại và thoải mái, giúp người mặc cảm thấy dễ chịu và tự tin.</p>\r\n<h4>BLACK CARTOON CARDIGAN là một lựa chọn lý tưởng cho những ngày mùa thu hoặc đông, khi bạn cần sự ấm áp mà không làm mất đi phong cách.</h4>\r\n<p>Phối Hợp Dễ Dàng, Phong Cách Đa Dạng\r\nVới kiểu dáng cardigan thông dụng, BLACK CARTOON CARDIGAN dễ dàng phối hợp với nhiều loại trang phục khác nhau.</p> '),
(331, 'Áo hoodie Loose Fit usenisex Basic', 485000, 'Ao-hoodie-Loosefit.jpg', 3, 99, 11, '2024-03-13 06:45:28', '2024-03-17 06:45:28', 0, 500000, '<h4>Thông tin chi tiết</h4>\r\n        <ul>\r\n            \r\n            <li>Mặt ngoài:\r\nBông 60%, Pôlyexte 40%\r\n</li>\r\n            <li>Lớp lót mũ trùm:\r\nBông 60%, Pôlyexte 40%\r\n</li>\r\n            <li>Bo viền cổ tay và vạt áo mềm mại</li>\r\n            <li>Chi tiết logo thương hiệu nổi bật ở giữa ngực</li>\r\n            <li>Thiết kế túi kangaroo trẻ trung ở mặt trước</li>\r\n            <li>Chất liệu: \r\nCotton\r\n</li>\r\n            <li>Gam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện</li>\r\n            <li>Xuất xứ thương hiệu: Hàn Quốc</li>\r\n        </ul>\r\n<h4>Thông tin bảo quản</h4>\r\n        <ul>\r\n            <li>Lộn trái và giặt tay riêng với nước lạnh</li>\r\n            <li>Không giặt chung với sản phẩm khác màu</li>\r\n            <li>Không sấy, không ủi và không giặt khô</li>\r\n        </ul>'),
(332, 'Áo hoodie Basic Big Logo Brushed ', 500000, 'ao-hoodie-basic-unisex.jpg', 3, 50, 0, '2023-11-12 08:28:00', '2023-11-12 08:28:00', 0, 550000, '<h4>Thông tin chi tiết</h4>\r\n<ul>\r\n            <li>Chất liệu: 100% Cotton</li>\r\n            <li>Kiểu dáng: Áo hoodie phom suông năng động</li>\r\n            <li>Tay dài, phối mũ trùm và dây rút</li>\r\n            <li>Túi kangaroo lớn ở phía trước</li>\r\n            <li>Thiết kế lấy cảm hứng từ hiệp hội bóng chày MLB</li>\r\n            <li>Phối logo bóng chày thêu nổi bật ở ngực trái</li>\r\n            <li>Chất vải mềm mịn, giữ ấm và thấm hút tốt</li>\r\n            <li>Gam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện</li>\r\n            <li>Xuất xứ thương hiệu: Hàn Quốc</li>\r\n</ul>\r\n<h4>Hướng dẫn bảo quản</h4>\r\n<ul>\r\n<li>Không giặt chung với sản phẩm khác màu</li>\r\n            <li>Không sử dụng bột giặt có chất tẩy quá mạnh</li>\r\n            <li>Giặt bằng nước có nhiệt độ không quá 30 độ C</li>\r\n            <li>Phơi nơi râm mát, thoáng khí</li>\r\n        </ul>'),
(333, 'Áo Hoodie Regular Boxy Sweater ', 435000, 'tobi-regular-boxy-sweater-off-white-780828_120x.jpg', 3, 100, 89, '2024-03-12 14:52:56', '2024-03-18 14:52:56', 0, 490000, '<h4>Thông tin chi tiết</h4>\r\n<ul>\r\n            <li>Form Dáng: Boxy Fit.</li>\r\n            <li>Chất liệu: 100% Cotton - Chân cua\r\n/li>\r\n            <li>Định lượng: 430gsm </li>\r\n            <li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li>\r\n            <li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li>\r\n            <li>Phần To bản lai áo và tay được may 3cm tạo cảm giác cứng cáp chắc chắn hơn</li>\r\n            <li>Chất vải mềm mịn, giữ ấm và thấm hút tốt</li>\r\n            <li>Gam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện</li>\r\n            <li>Logo được in lụa nổi cao thành, chắn chắn.</li>\r\n</ul>\r\n<h4>Hướng dẫn bảo quản</h4>\r\n<ul>\r\n<li>Không giặt chung với sản phẩm khác màu</li>\r\n            <li>Không sử dụng bột giặt có chất tẩy quá mạnh</li>\r\n            <li>Giặt bằng nước có nhiệt độ không quá 30 độ C</li>\r\n            <li>Phơi nơi râm mát, thoáng khí</li>\r\n        </ul>'),
(334, 'Áo Hoodie Regular Patches Hoodie ', 439000, 'tobi-regular-patches-hoodie-coconut-milk-769680_360x.jpg', 3, 100, 11, '2024-03-04 05:17:57', '2024-03-18 05:17:57', 0, 0, '<h4>Thông tin chi tiết</h4>\r\n<ul>\r\n            <li>Form Dáng: Boxy Fit.</li>\r\n            <li>Chất liệu: Tobi Flex Air chống tia UV\r\n/li>\r\n            <li>Định lượng: 0gsm </li>\r\n            <li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li>\r\n            \r\n            <li>Các phần rã trên áo được may ẩn trong một cách tinh tế</li>\r\n            <li>Chất vải mềm mịn, giữ ấm và thấm hút tốt</li>\r\n            <li>Gam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện</li>\r\n            <li>Logo kim loại được đóng chắc chắn trước phần ngực </li>\r\n</ul>\r\n<h4>Hướng dẫn bảo quản</h4>\r\n<ul>\r\n<li>Không giặt chung với sản phẩm khác màu</li>\r\n            <li>Không sử dụng bột giặt có chất tẩy quá mạnh</li>\r\n            <li>Giặt bằng nước có nhiệt độ không quá 30 độ C</li>\r\n            <li>Phơi nơi râm mát, thoáng khí</li>\r\n        </ul>'),
(335, 'Áo Hoodie Nike Sportswear Midnight Navy', 235000, 'ao-nike-sportswear-men-s.png', 3, 6, 0, '2024-04-25 18:39:22', '2024-04-25 18:39:22', 0, 280000, '<p>Áo Nike Sportswear Men\'s Hoodie Midnight Navy là một sản phẩm thời trang thể thao dành cho nam giới được thiết kế bởi thương hiệu Nike. Đây là một chiếc áo hoodie có màu sắc Midnight Navy, tức là một màu xanh đậm đầy phong cách và dễ kết hợp.<p>\r\n<p>Với chất liệu vải chất lượng cao, áo Nike Sportswear Men\'s Hoodie mang lại sự thoải mái và cảm giác ấm áp cho người mặc. Thiết kế hoodie với một túi tiện lợi ở phía trước và cổ áo có dây rút giúp điều chỉnh theo sở thích của bạn.</p>'),
(441, 'Mũ Bucket Vành Tròn Phong Cách Hàn Quốc', 130000, 'non-rong-vanh-nam-1-768x768.jpg', 5, 47, 5, '2023-11-13 03:00:00', '2023-11-13 04:00:00', 0, 200000, '<h4>Mũ Bucket vành tròn - Item giải nhiệt mùa hè</h4>\r\n        <p>Những kiểu mũ tai bèo vành tròn luôn nhận được rất nhiều sự ưu ái của các tín đồ thời trang mỗi khi phối đồ.</p>\r\n        <p>Và đây là gợi ý dành cho bạn: Mũ Bucket vành tròn nam, nữ thêu chữ ký sở hữu kiểu mũ siêu tiện vừa che nắng tốt, không quá khó mix đồ lại có thể tạo điểm nhấn cho outfit.</p>\r\n        <h4>Thông tin chi tiết:</h4>\r\n        <ul>\r\n            <li>Kiểu dáng: Mũ bucket / Nón tai bèo / Mũ vành tròn</li>\r\n            <li>Size: Vòng đầu 56-58 cm</li>\r\n            <li>Chất liệu: 100% cotton loại vải có thấm hút tốt và tạo cảm giác thoáng mát khi sử dụng</li>\r\n            <li>Màu sắc: Đen, trắng, be</li>\r\n            <li>Giới tính phù hợp: Nam, nữ</li>\r\n        </ul>'),
(442, 'Túi xách tay mini bán nguyệt', 190000, 'tui-xach-mini-malabon.png', 5, 50, 23, '2024-03-10 13:38:23', '2024-03-17 13:38:23', 0, 200000, '<h4>Mô tả sản phẩm</h4>\r\n        <ul>\r\n            <li>Mã sản phẩm: 1011SAT0326</li>\r\n            <li>Loại sản phẩm: Túi Xách Tay</li>\r\n            <li>Kích thước (dài x rộng x cao): 17.6 x 6.2 x 13.2 cm</li>\r\n            <li>Chất liệu: Da nhân tạo</li>\r\n            <li>Chất liệu dây đeo: Da nhân tạo</li>\r\n            <li>Kiểu khóa: Khóa nam châm</li>\r\n            <li>Số ngăn: 1 ngăn lớn, 1 ngăn nhỏ, 3 ngăn đựng thẻ</li>\r\n            <li>Kích cỡ: Nhỏ</li>\r\n            <li>Phù hợp sử dụng: Đi làm, đi chơi</li>\r\n        </ul>\r\n<h4>Hướng dẫn bảo quản</h4>\r\n        <ul>\r\n            <li>Cách 1: Sử dụng vải cotton trắng, chấm nhẹ một chút vào nước tẩy nhẹ. Sau đó lau qua vị trí cần vệ sinh.</li>\r\n            <li>Cách 2: Sử dụng vải cotton trắng, nhúng vào nước sạch và vắt khô. Sau đó nhẹ nhàng lau qua vị trí cần vệ sinh trên sản phẩm.</li>\r\n        </ul>'),
(443, 'KÍNH RÂM THỜI TRANG REEMAN 58217 C4 ', 89000, 'IMG_9909.PNG', 5, 100, 9, '2024-03-12 14:33:25', '2024-03-18 14:33:25', 0, 90000, '<h4>Chi tiết sản phẩm </h4>\r\n<p>Kính râm thời trang RM 58217 là mẫu sản phẩm được thiết kế độc quyền bởi Ree-man. RM58217 được thiết kế bởi chất liệu nhựa cao cấp bền bỉ với thời gian, mang đến những trải nghiệm độc đáo như: giá trị sử dụng lâu dài, mặt kính bóng đẹp, khó bị gỉ, chống chịu tốt bởi tác động của môi trường, … Reeman 58217 nổi bật với sự kết hợp khéo léo gam màu vàng cá tính cho cả phần gọng và mắt kính cá tính, tất cả tạo nên một tổng thể hài hoà. Chắc chắn sẽ đem lại vẻ thời trang tối đa cho bạn.'),
(444, 'Túi Tote Organic Cotton Thêu Chữ ', 215000, 'tui-vai.jpg', 5, 100, 10, '2024-03-12 13:29:36', '0000-00-00 00:00:00', 0, 250000, '<p>Mô tả sản phẩm</p><ul><li>Mã sản phẩm: 1011SAT0326</li><li>Loại sản phẩm: Túi Xách Tay</li><li>Kích thước (dài x rộng x cao): 17.6 x 6.2 x 13.2 cm</li><li>Chất liệu: Da nhân tạo</li><li>Chất liệu dây đeo: Da nhân tạo</li><li>Kiểu khóa: Khóa nam châm</li><li>Số ngăn: 1 ngăn lớn, 1 ngăn nhỏ, 3 ngăn đựng thẻ</li><li>Kích cỡ: Nhỏ</li><li>Phù hợp sử dụng: Đi làm, đi chơi</li></ul><h4>Hướng dẫn bảo quản</h4><ul><li>Cách 1: Sử dụng vải cotton trắng, chấm nhẹ một chút vào nước tẩy nhẹ. Sau đó lau qua vị trí cần vệ sinh.</li><li>Cách 2: Sử dụng vải cotton trắng, nhúng vào nước sạch và vắt khô. Sau đó nhẹ nhàng lau qua vị trí cần vệ sinh trên sản phẩm.</li></ul>'),
(445, 'Nón bucket unisex thời trang Classic', 229000, '50bks_3ahtms136.jpg', 5, 3, 0, '2024-04-25 18:49:19', '2024-04-25 18:49:19', 0, 320000, '<p>Được hoàn thiện với tông màu tinh tế kết hợp cùng chất liệu vải cao cấp, chiếc nón bucket Classic Monogram Suade sẽ mang đến cho bạn sự mềm mại, ấm áp vô cùng đẳng cấp. Có thiết kế basic với logo thêu nổi bật tạo điểm nhấn ấn tượng, item này không chỉ giúp bạn giữ ấm trong mùa đông lạnh giá, mà còn thể hiện sự tinh tế và gu thẩm mỹ thời thượng của bạn.</p>\r\n<p>Thương hiệu: MLB</p>\r\n<p>Xuất xứ: Hàn Quốc</p>\r\n<p>Giới tính: Unisex</p>\r\n<p>Kiểu dáng: Nón bucket</p>\r\n<p>Màu sắc: Brown, Black</p>\r\n<p>Chất liệu: TBC</p>'),
(446, 'Khăn Cashmere Unisex KQN-WD01', 500000, 'khan-quang-co-cashmere-chowd01-1.jpg', 5, 12, 3, '2024-04-26 09:51:16', '2024-04-26 09:51:16', 0, 750000, '<p>Với sự kết hợp hoàn hảo giữa len Cashmere và thiết kế tinh tế thể hiện sự sang trọng và đẳng cấp. Được làm từ chất liệu cao cấp và có độ bền cao, sản phẩm này sẽ đồng hành cùng bạn trong nhiều mùa đông tới.</p>\r\n<p>Chất liệu: Len Cashmere</p>\r\n<p>Kích thước (rộng x dài): 30x180cm</p>\r\n<p>Trọng lượng: 310 gram</p>'),
(551, 'QUẦN NAM NỮ GUTDEN PHỤC CỔ CỔ ĐIỂN', 350000, 'O1CN01sFt8H51cUDsCsiRy2_!!2211953043603-0-cib.jpg', 4, 5, 0, '2024-04-23 12:13:18', '2024-04-23 12:13:18', 0, 470000, ' <p>Quần nam nữ Gutden Phục Cổ Cổ Điển là biểu tượng của sự kết hợp giữa phong cách cổ điển và hiện đại trong thế giới thời trang ngày nay.</p>\r\n<p>Với sự đa dạng về kiểu dáng và màu sắc, sản phẩm này mang lại sự linh hoạt cho người mặc, từ quần dài đến quần short, đồng thời đảm bảo chất lượng với các loại vải như cotton, linen, hoặc polyester.</p>\r\n<p>Quần Gutden Phục Cổ Cổ Điển không chỉ phục vụ cho mục đích thời trang hàng ngày mà còn thích hợp cho nhiều dịp khác nhau như đi làm, dạo phố, hay thậm chí là dự tiệc, mang lại sự thoải mái và phong cách cho người mặc.</p>'),
(552, 'QUẦN NAM NỮ GUTDEN THÊU HỌA TIẾT HOA', 460000, 'O1CN01ws5jGR1cUDsZbTHrk_!!2211953043603-0-cib.jpg', 4, 5, 0, '2024-04-23 12:36:50', '2024-04-23 12:36:50', 0, 499000, '<p>Cho dù là dạo phố hay dự sự kiện, quần nam nữ Gutden Thêu Họa Tiết Hoa sẽ làm bạn nổi bật mọi lúc, mọi nơi, là sự lựa chọn không thể thiếu cho những người yêu thời trang.</p>\r\n<p>Với chi tiết thêu tỉ mỉ và chất liệu vải cao cấp, sản phẩm này không chỉ mang lại vẻ đẹp mắt mà còn là biểu tượng của phong cách và sang trọng.</p>\r\n<p>Quần nam nữ Gutden Thêu Họa Tiết Hoa là biểu tượng của sự kết hợp tinh tế giữa phong cách hiện đại và hoa tiết họa tiết hoa độc đáo trong thế giới thời trang ngày nay.</p>'),
(553, 'Quần Cargo Nỉ Túi Hộp Unisex', 293000, 'goods_467384_sub14.jpg', 4, 10, 0, '2024-04-26 09:40:29', '2024-04-26 09:40:29', 0, 890000, '<h4>Mô tả sản phẩm</h4>\r\n<p>- Thân quần được làm bằng vải có lót lông thoải mái.</p>\r\n<p>- Thiết kế lưng thun co giãn dễ mặc.</p>\r\n<p>- Thiết kế unisex.</p>\r\n<p>- Bộ điều chỉnh ở gấu quần cho phép bạn tạo dáng áo suông thẳng hoặc dáng jogger.</p>\r\n<p>- Có túi bên hông và túi bên ngoài tiện lợi.</p>\r\n<p>- Có dây rút eo bên trong để điều chỉnh kích cỡ.</p>\r\n<p>- Quần túi hộp bằng vải jersey thoải mái.</p>\r\n<p>- Kết hợp với nhiều loại áo khác nhau.</p>'),
(554, 'QUẦN RABBIT YAY BAGGY JEANS', 215000, 'z5051174191309_cea89d874a356af8984f4cab878d9894802690_master.jpg', 4, 6, 0, '2024-04-26 10:11:28', '2024-04-26 10:11:28', 0, 399000, '<h4>YAY RABBIT BAGGY JEANS:</h4>\r\n<p> Sự Kết Hợp Độc Đáo Giữa Phong Cách và Sự Tiện Lợi\r\n<p>YAY RABBIT BAGGY JEANS là sự kết hợp hoàn hảo giữa phong cách thời trang và sự thoải mái hàng ngày.</p> \r\n<h4>Chất Liệu Chất Lượng, Đường May Tỉ Mỉ</h4>\r\n<p>YAY RABBIT BAGGY JEANS được làm từ chất liệu vải denim chất lượng cao, đảm bảo độ bền và thoải mái suốt cả ngày dài.</p>\r\n<p>Đường may tỉ mỉ và chắc chắn giúp sản phẩm luôn giữ form dáng và không bị biến dạng sau nhiều lần sử dụng.</p>\r\n<h4>BAGGY JEANS là sự lựa chọn hoàn hảo cho những người yêu thích phong cách cá tính và độc đáo.</h4>\r\n<p>Dễ dàng kết hợp với nhiều loại trang phục và phụ kiện khác nhau, sản phẩm này sẽ là điểm nhấn tuyệt vời trong bộ sưu tập thời trang của bạn.</p>\r\n\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoang`
--

CREATE TABLE `taikhoang` (
  `trang_thai` tinyint(4) NOT NULL,
  `id_quyen` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoang`
--

INSERT INTO `taikhoang` (`trang_thai`, `id_quyen`, `username`, `pass`, `fullname`) VALUES
(0, 6, 'cuong', '20028751', 'Trần Quốc Cường'),
(0, 3, 'HoangNam', '1098', 'Lê Hoàng Nam'),
(0, 7, 'kinhanh', 'Anh@12345', 'Phạm Kim Anh'),
(0, 3, 'VanBinh', 'Binh@1987', 'Nguyễn Văn Bình'),
(0, 1, 'viet', '12345', 'Tạ Quốc Việt');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_tl` varchar(191) NOT NULL,
  `tong_sp` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `ten_tl`, `tong_sp`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'ÁO THUN', 283, '2024-03-03 10:20:34', '2024-03-03 10:20:34'),
(2, 'ÁO KHOÁC', 296, '2024-03-03 10:20:34', '2024-03-03 10:20:34'),
(3, 'ÁO HOODIE', 349, '2024-03-03 10:20:34', '2024-03-03 10:20:34'),
(4, 'QUẦN', 10, '2024-03-03 10:20:34', '2024-03-03 10:20:34'),
(5, 'PHỤ KIỆN', 297, '2024-03-03 10:20:34', '2024-03-03 10:20:34'),
(6, 'BỘ SƯU TẬP', 0, '2024-03-03 10:20:34', '2024-03-03 10:20:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiblog`
--
ALTER TABLE `baiblog`
  ADD PRIMARY KEY (`id_baiblog`),
  ADD KEY `id_danhmucbv` (`id_danhmucbv`);

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `cthoadon_ibfk_1` (`id_hoadon`);

--
-- Indexes for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `ctphieunhap_ibfk_1` (`id_phieunhap`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmucbaiviet`
--
ALTER TABLE `danhmucbaiviet`
  ADD PRIMARY KEY (`id_danhmucbv`);

--
-- Indexes for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhanhsp_ibfk_1` (`id_sp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nv` (`id_nv`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyendahmuc`
--
ALTER TABLE `quyendahmuc`
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_the_loai` (`id_the_loai`);

--
-- Indexes for table `taikhoang`
--
ALTER TABLE `taikhoang`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiblog`
--
ALTER TABLE `baiblog`
  MODIFY `id_baiblog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134766;

--
-- AUTO_INCREMENT for table `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `danhmucbaiviet`
--
ALTER TABLE `danhmucbaiviet`
  MODIFY `id_danhmucbv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5553;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id_lienhe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19657;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88888891;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiblog`
--
ALTER TABLE `baiblog`
  ADD CONSTRAINT `baiblog_ibfk_1` FOREIGN KEY (`id_danhmucbv`) REFERENCES `danhmucbaiviet` (`id_danhmucbv`);

--
-- Constraints for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`id_phieunhap`) REFERENCES `phieunhap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctphieunhap_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD CONSTRAINT `hinhanhsp_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`id_nv`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_the_loai`) REFERENCES `theloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
