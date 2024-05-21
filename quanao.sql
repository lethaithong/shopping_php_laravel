-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 10, 2023 lúc 10:07 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Cat_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Cat_name` varchar(100) NOT NULL,
  `Cat_image` varchar(100) DEFAULT NULL,
  `Cat_parent` int(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Cat_status` int(10) NOT NULL,
  PRIMARY KEY (`Cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`Cat_id`, `Cat_name`, `Cat_image`, `Cat_parent`, `updated_at`, `created_at`, `Cat_status`) VALUES
(43, 'ĐỒ NAM', '/upload/files/0af397173daffaf1a3be53.jpg', 0, '2023-01-09 15:08:28', '2023-01-09 15:08:28', 0),
(44, 'ĐỒ NỮ', '/upload/files/0af397173daffaf1a3be53.jpg', 0, '2023-01-09 15:08:38', '2023-01-09 15:08:38', 0),
(45, 'TRẺ EM', '/upload/files/0af397173daffaf1a3be53.jpg', 0, '2023-01-09 15:06:25', '2023-01-09 15:06:25', 0),
(46, 'Áo', '/upload/files/0af397173daffaf1a3be53.jpg', 43, '2023-01-09 15:07:08', '2023-01-09 15:07:08', 0),
(47, 'Quần', '/upload/files/0af397173daffaf1a3be53.jpg', 43, '2023-01-09 15:07:22', '2023-01-09 15:07:22', 0),
(48, 'Đồ Thể Thao', '/upload/files/0af397173daffaf1a3be53.jpg', 43, '2023-01-09 15:07:53', '2023-01-09 15:07:53', 0),
(49, 'Phụ Kiện', '/upload/files/0af397173daffaf1a3be53.jpg', 43, '2023-01-09 15:08:08', '2023-01-09 15:08:08', 0),
(50, 'Áo', '/upload/files/0af397173daffaf1a3be53.jpg', 44, '2023-01-09 15:10:09', '2023-01-09 15:10:09', 0),
(51, 'Quần', '/upload/files/0af397173daffaf1a3be53.jpg', 44, '2023-01-09 15:10:22', '2023-01-09 15:10:22', 0),
(52, 'Đồ Thể Thao', '/upload/files/0af397173daffaf1a3be53.jpg', 44, '2023-01-09 15:10:39', '2023-01-09 15:10:39', 0),
(53, 'Đồ Bộ', '/upload/files/0af397173daffaf1a3be53.jpg', 44, '2023-01-09 15:10:55', '2023-01-09 15:10:55', 0),
(54, 'Đồ Bộ Trẻ Em', '/upload/files/0af397173daffaf1a3be53.jpg', 45, '2023-01-09 15:11:28', '2023-01-09 15:11:28', 0),
(55, 'Đồ Thể Thao', '/upload/files/0af397173daffaf1a3be53.jpg', 45, '2023-01-09 15:37:53', '2023-01-09 15:37:53', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `Coupon_id` int(100) NOT NULL AUTO_INCREMENT,
  `Coupon_name` varchar(250) NOT NULL,
  `Coupon_code` varchar(100) NOT NULL,
  `Coupon_quantity` int(150) NOT NULL,
  `Coupon_condition` varchar(150) NOT NULL,
  `Coupon_number` varchar(150) NOT NULL,
  PRIMARY KEY (`Coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`Coupon_id`, `Coupon_name`, `Coupon_code`, `Coupon_quantity`, `Coupon_condition`, `Coupon_number`) VALUES
(2, 'ddd', 'wdwd', 5, '1', '10'),
(3, 'moi', 'tao9', 7, '2', '4567'),
(4, 'hai', 'lolo', 2, '1', '50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `Order_id` int(250) NOT NULL AUTO_INCREMENT,
  `User_id` int(150) DEFAULT NULL,
  `Coupon_id` varchar(100) DEFAULT NULL,
  `Full_name` varchar(100) NOT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Phone` int(50) NOT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `Total` int(50) NOT NULL,
  `Total_coupon` int(50) DEFAULT NULL,
  `HTTT` varchar(150) DEFAULT NULL,
  `date_order` varchar(150) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`Order_id`, `User_id`, `Coupon_id`, `Full_name`, `Email`, `Phone`, `Address`, `Total`, `Total_coupon`, `HTTT`, `date_order`, `Status`, `created_at`, `updated_at`) VALUES
(111, 181, NULL, 'thong', 'thai@gmail.com', 123456789, 'qưe', 599000, NULL, NULL, '2023-01-10', 0, '2023-01-10 07:19:14', '2023-01-10 07:19:14'),
(112, 183, NULL, 'a', 'admin1@gsa', 1234567890, 'QQQ', 769000, NULL, NULL, '2023-01-10', 0, '2023-01-10 07:22:32', '2023-01-10 07:22:32'),
(113, 182, '2', 'thái thông', 'thaithong03071999@gmail.com', 987654321, 'm', 997000, 897300, 'Tiền Mặt', '2023-01-10', 1, '2023-01-10 07:23:45', '2023-01-10 07:23:45'),
(114, NULL, NULL, 'test1', NULL, 123456, NULL, 700000, NULL, NULL, '2023-01-10', 0, '2023-01-10 08:38:26', '2023-01-10 08:38:26'),
(115, NULL, NULL, 'test2', NULL, 1234567, NULL, 650000, NULL, NULL, '2023-01-10', 0, '2023-01-10 08:39:47', '2023-01-10 08:39:47'),
(116, NULL, NULL, 'test3', NULL, 123123, NULL, 1100000, NULL, NULL, '2022-09-29', 0, '2023-01-10 08:41:49', '2023-01-10 08:41:49'),
(117, NULL, NULL, 'test3', NULL, 123123, NULL, 1500000, NULL, NULL, '2022-09-28', 0, '2023-01-10 08:42:23', '2023-01-10 08:42:23'),
(118, NULL, NULL, 'test4', NULL, 123123, NULL, 900000, NULL, NULL, '2022-09-27', 0, '2023-01-10 08:42:43', '2023-01-10 08:42:43'),
(119, NULL, NULL, 'test4', NULL, 123123, NULL, 670000, NULL, NULL, '2022-09-27', 0, '2023-01-10 08:43:08', '2023-01-10 08:43:08'),
(120, NULL, NULL, 'test5', NULL, 123123, NULL, 780000, NULL, NULL, '2022-09-26', 0, '2023-01-10 08:43:44', '2023-01-10 08:43:44'),
(121, NULL, NULL, 'nv1', NULL, 123, NULL, 390000, NULL, NULL, '2023-01-05', 0, '2023-01-10 09:32:15', '2023-01-10 09:32:15'),
(122, NULL, NULL, 'nv2', NULL, 123321, NULL, 560000, NULL, NULL, '2023-01-05', 0, '2023-01-10 09:32:15', '2023-01-10 09:32:15'),
(123, NULL, NULL, 'nv1', NULL, 123, NULL, 890000, NULL, NULL, '2023-01-06', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(124, NULL, NULL, 'nv2', NULL, 123321, NULL, 560000, NULL, NULL, '2023-01-07', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(125, NULL, NULL, 'nv1', NULL, 123, NULL, 590000, NULL, NULL, '2023-01-08', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(126, NULL, NULL, 'nv2', NULL, 123321, NULL, 1060000, NULL, NULL, '2023-01-09', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(127, NULL, NULL, 'nv1', NULL, 123, NULL, 390000, NULL, NULL, '2022-12-01', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(128, NULL, NULL, 'nv2', NULL, 123321, NULL, 560000, NULL, NULL, '2022-12-04', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(129, NULL, NULL, 'nv1', NULL, 123, NULL, 390000, NULL, NULL, '2022-12-08', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(130, NULL, NULL, 'nv2', NULL, 123321, NULL, 560000, NULL, NULL, '2022-12-12', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(131, NULL, NULL, 'nv1', NULL, 123, NULL, 390000, NULL, NULL, '2022-12-16', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(132, NULL, NULL, 'nv2', NULL, 123321, NULL, 560000, NULL, NULL, '2022-12-22', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(133, NULL, NULL, 'nv1', NULL, 123, NULL, 390000, NULL, NULL, '2022-12-26', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27'),
(134, NULL, NULL, 'nv2', NULL, 123321, NULL, 560000, NULL, NULL, '2022-12-28', 0, '2023-01-10 09:35:27', '2023-01-10 09:35:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `Order_detail_id` int(250) NOT NULL AUTO_INCREMENT,
  `Order_id` int(250) NOT NULL,
  `Pro_name` varchar(250) NOT NULL,
  `image` varchar(150) NOT NULL,
  `Pro_id` int(150) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(150) NOT NULL,
  PRIMARY KEY (`Order_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`Order_detail_id`, `Order_id`, `Pro_name`, `image`, `Pro_id`, `Price`, `Quantity`) VALUES
(117, 111, 'Áo Phao Nam Có Mũ Siêu Nhẹ Siêu Ấm', '/upload/images/product/product_6/phm5001-den-4.jpg', 50, 599000, 1),
(118, 112, 'Bộ Đồ Thể Thao Nam Nỉ Phối Sọc - CAM', '/upload/images/product/product_7/sdm5057-cam-3-03271db8-bc2c-4acb-878b-1bcf252a5685-f39f7be8-b2c3-4e32-9ad2-ba9b8dcc1cae.jpg', 62, 769000, 1),
(119, 113, 'Quần Âu Nữ Dáng Sông Đai Oze', '/upload/images/product/product_8/qan5204-den-6.jpg', 75, 499000, 1),
(120, 113, 'Bộ Đồ Trẻ Em Da Cá In Logo Yody', '/upload/images/product/product_5/qmk5021-den-bdk5356-cpd-8.jpg', 82, 498000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `Cat_id` int(100) UNSIGNED NOT NULL,
  `Pro_name` varchar(150) NOT NULL,
  `Pro_price` varchar(50) NOT NULL,
  `Pro_image` varchar(150) NOT NULL,
  `Pro_des` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Pro_status` int(1) NOT NULL,
  PRIMARY KEY (`Pro_id`),
  KEY `Cat_id` (`Cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`Pro_id`, `Cat_id`, `Pro_name`, `Pro_price`, `Pro_image`, `Pro_des`, `created_at`, `updated_at`, `Pro_status`) VALUES
(50, 46, 'Áo Phao Nam Có Mũ Siêu Nhẹ Siêu Ấm', '599000', '/upload/images/product/product_6/phm5001-den-4.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>D&ograve;ng &Aacute;o Phao 3S m&ugrave;a đ&ocirc;ng&nbsp;năm 2022</p>\r\n\r\n<p>&Aacute;o c&oacute; cấu tr&uacute;c 3 lớp chắc chắn: Lớp ngo&agrave;i v&agrave; lớp l&oacute;t&nbsp;được l&agrave;m từ 100% Nylon, Lớp giữa b&ocirc;ng nhẹ 100% polyester</p>\r\n\r\n<p>M&agrave;u sắc sản phẩm đa dạng, thiết kế form d&aacute;ng trẻ trung</p>\r\n\r\n<p>C&oacute; thiết kế t&uacute;i đựng nhỏ gọn, dễ d&agrave;ng mang theo sản phẩm</p>\r\n\r\n<p>Si&ecirc;u nhẹ, c&oacute; t&aacute;c dụng giữ ấm cho cơ thể</p>\r\n\r\n<p>&Aacute;o c&oacute; thể tr&aacute;nh mưa nhẹ, chống tĩnh điện</p>\r\n\r\n<p>YODY - Look good. Feel good</p>', '2023-01-09 08:15:50', '2023-01-09 08:15:50', 0),
(51, 46, 'Áo T-Shirt Nam Cotton USA Phiên Bản Premium', '229000', '/upload/images/product/product_6/tsm5231-vag-2.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu 100% Cotton USA cao cấp</p>\r\n\r\n<p>Cotton bền vững: G&oacute;p phần bảo vệ m&ocirc;i trường sống</p>\r\n\r\n<p>Loại sợi chất lượng cao: Độ mảnh v&agrave; khả năng nhuộm ưu việt</p>\r\n\r\n<p>Thấm h&uacute;t mồ h&ocirc;i tốt, tho&aacute;ng m&aacute;t, rất th&iacute;ch hợp với thời tiết n&oacute;ng ẩm việt Nam</p>\r\n\r\n<p>Co gi&atilde;n nhẹ, ph&ugrave; hợp với chuyển động của cơ thể</p>\r\n\r\n<p>Form d&aacute;ng su&ocirc;ng gi&uacute;p tạo sự thoải m&aacute;i cử động cho người&nbsp;mặc</p>\r\n\r\n<p>Đa dạng&nbsp;m&agrave;u sắc dễ d&agrave;ng&nbsp;kết hợp c&ugrave;ng quần shorts hoặc quần jeans</p>\r\n\r\n<p>YODY - Look good. Feel good</p>', '2023-01-09 08:18:06', '2023-01-09 08:18:06', 0),
(52, 46, 'Áo Polo Nam Cafe Dệt Tổ Ong Bo 3 Màu', '379000', '/upload/images/product/product_6/apm5409-tra-4.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>&Aacute;o polo nam&nbsp;vải cafe dệt tổ ong - thiết kế độc lạ, phối cổ nhấn nh&aacute;</p>\r\n\r\n<p>Chất vải cafe ti&ecirc;n phong cải tiến th&acirc;n thiện m&ocirc;i trường</p>\r\n\r\n<p>&Aacute;o c&oacute; khả năng thấm thấm h&uacute;t tốt, kh&aacute;ng khuẩn khử m&ugrave;i hiệu quả</p>\r\n\r\n<p>Chống tia UV gi&uacute;p bảo vệ cơ thể của người mặc</p>\r\n\r\n<p>Thoải m&aacute;i, tiện lợi nhờ t&iacute;nh năng nhanh kh&ocirc;</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:19:35', '2023-01-09 08:19:35', 0),
(53, 46, 'Áo Sơ Mi Nam Dài Tay Bamboo Chấm Bi', '459000', '/upload/images/product/product_6/smm5097-den-5-jpg.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu : Chất liệu Bamboo c&oacute; th&agrave;nh phần&nbsp;&nbsp;48% Bamboo + 49% Polyester + 3% Spandex</p>\r\n\r\n<p>Kết cấu vải mềm mại, mịn m&agrave;ng</p>\r\n\r\n<p>Th&ocirc;ng tho&aacute;ng, thấm h&uacute;t mồ h&ocirc;i tốt&nbsp;</p>\r\n\r\n<p>Hạn chế độ nh&agrave;u một c&aacute;c tối đa</p>\r\n\r\n<p>Co khả năng co gi&atilde;n nhẹ, ph&ugrave; hợp với chuyển động của cơ thể&nbsp;</p>\r\n\r\n<p>Form d&aacute;ng slim &ocirc;m vừa với người mặc, đem lại cảm gi&aacute;c lịch sự, cuốn h&uacute;t</p>\r\n\r\n<p>YODY - Look good. Feel good</p>', '2023-01-09 08:20:47', '2023-01-09 08:20:47', 0),
(54, 46, 'Áo Thun Nam Thêu Trái Tim', '489000', '/upload/images/product/product_6/atm5091-tra-5.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu 63% Cotton + 37% Polyester</p>\r\n\r\n<p>K&ecirc;t hợp từ sợi cotton&nbsp;v&agrave; poly tạo n&ecirc;n vải mềm mại, mịn m&agrave;ng, hạn chế nhăn nh&agrave;u</p>\r\n\r\n<p>Thấm h&uacute;t mồ h&ocirc;i tạo cảm gi&aacute;c&nbsp;tho&aacute;ng kh&iacute;</p>\r\n\r\n<p>Cấu tr&uacute;c dệt 4 hệ sợi li&ecirc;n kết chặt chẽ. Bề mặt chắc chắn.</p>\r\n\r\n<p>&Aacute;o c&oacute; form d&aacute;ng su&ocirc;ng rộng gi&uacute;p tạo sự cử động thoải m&aacute;i cho người mặc</p>\r\n\r\n<p>Thiết kế h&igrave;nh th&ecirc;u trước ngực tạo điểm nhấn</p>\r\n\r\n<p>&Aacute;o c&oacute; chất liệu nỉ co gi&atilde;n, giữ ấm, bề mặt vải mịn c&ugrave;ng m&agrave;u sắc thanh lịch c&oacute; thể kết hợp c&ugrave;ng quần nỉ hoặc quần jeans.</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:22:31', '2023-01-09 08:22:31', 0),
(55, 46, 'Áo Giữ Nhiệt Nam Cao Cổ', '269000', '/upload/images/product/product_6/atm5149-nav-4.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>&Aacute;o c&oacute; chất liệu viscose co gi&atilde;n, giữ ấm, bề mặt vải mịn đem lại cảm gi&aacute;c thoải m&aacute;i&nbsp;dễ chịu, ngăn chặn được c&aacute;c k&iacute;ch ứng tr&ecirc;n da nhạy cảm</p>\r\n\r\n<p>&Aacute;o c&oacute; form d&aacute;ng &ocirc;m gi&uacute;p t&ocirc;n d&aacute;ng cho người mặc</p>\r\n\r\n<p>M&agrave;u sắc thanh lịch, c&oacute; thể kết hợp c&ugrave;ng quần nỉ hoặc quần jeans</p>\r\n\r\n<p>Sản phẩm th&iacute;ch hợp mặc ở nh&agrave;, đi l&agrave;m v&agrave; đi chơi v&agrave;o m&ugrave;a đ&ocirc;ng</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:23:32', '2023-01-09 08:23:32', 0),
(56, 46, 'Áo Ba Lỗ Nam 100% Cotton Siêu Mềm Siêu Thoáng', '99000', '/upload/images/product/product_6/blm5007-trg10.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu 100% Cotton</p>\r\n\r\n<p>Phi&ecirc;n bản n&acirc;ng cấp năm 2022 từ chất liệu tới kiểu d&aacute;ng</p>\r\n\r\n<p>Thiết kế năng động, trẻ trung ph&ugrave; hợp với mọi v&oacute;c d&aacute;ng.</p>\r\n\r\n<p>Cải tiến về chất liệu mềm mại, thấm h&uacute;t v&agrave; m&aacute;t hơn</p>\r\n\r\n<p>Co gi&atilde;n, c&oacute; độ đ&agrave;n hồi tối đa.&nbsp;</p>\r\n\r\n<p>Chất liệu vải thể thao kh&ocirc;ng qu&aacute; d&agrave;y.&nbsp;</p>\r\n\r\n<p>Đem lại cảm gi&aacute;c thoải m&aacute;i cho người mặc.&nbsp;</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:24:37', '2023-01-09 08:24:37', 0),
(57, 46, 'Áo Vest Nam Nano Công Sở Trẻ Trung', '15890000', '/upload/images/product/product_6/vem4007-xnh-2.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu vải polyester c&ocirc;ng nghệ Nano</p>\r\n\r\n<p>Ve &aacute;o hẹp với chi tiết th&ugrave;a khuyết. Ve &aacute;o được c&agrave;i chặt bằng hai n&uacute;t ph&iacute;a trước</p>\r\n\r\n<p>Th&acirc;n trước c&oacute; 2 b&ecirc;n&nbsp;t&uacute;i c&acirc;n xứng c&ugrave;ng&nbsp;t&uacute;i trong gi&uacute;p để những vật dụng quan trọng như v&iacute;, thẻ</p>\r\n\r\n<p>H&agrave;ng c&uacute;c tr&ecirc;n cổ tay &aacute;o c&oacute; bọ nổi</p>\r\n\r\n<p>Kiểu d&aacute;ng Slim Fit,&nbsp;vừa vặn với ngực v&agrave; eo, v&agrave; tay &aacute;o</p>\r\n\r\n<p>YODY - Look good. Feel good</p>', '2023-01-09 08:26:39', '2023-01-09 08:26:39', 0),
(58, 47, 'Quần Jeans Nam Slim Thêu Túi', '569000', '/upload/images/product/product_6/qjm5021-xna-8-yodyvn.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu Jean Denim</p>\r\n\r\n<p>Quần jeans nam d&aacute;ng slim fit &ocirc;m&nbsp;vừa vặn gi&uacute;p t&ocirc;n l&ecirc;n đ&ocirc;i ch&acirc;n săn chắc của ph&aacute;i mạnh&nbsp;</p>\r\n\r\n<p>Kiểu quần c&oacute; phần ống rộng ở đ&ugrave;i v&agrave; thu&ocirc;n dần xuống mắt c&aacute; ch&acirc;n để tạo cảm gi&aacute;c thoải m&aacute;i cho người mặc</p>\r\n\r\n<p>Chiếc quần dễ d&agrave;ng mix đồ để đi chơi, đi học, đi l&agrave;m</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:28:17', '2023-01-09 08:28:17', 0),
(59, 47, 'Quần Âu Nam Ống Đứng Vải Nano Cao Cấp Giữ Phom, Co Giãn Thoải Mái', '549000', '/upload/images/product/product_7/qam3190-nau-2131231.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu vải Nano được tạo th&agrave;nh từ 100% Polyester</p>\r\n\r\n<p>Vải sử dụng c&ocirc;ng nghệ Nano xoắn nhiều sợi li ti th&agrave;nh một sợi.</p>\r\n\r\n<p>Nano thuộc nh&oacute;m vải c&ocirc;ng nghệ mới,l&agrave; bước đột ph&aacute; trong ng&agrave;nh vải sợi thế giới</p>\r\n\r\n<p>Vải dệt đ&ocirc;i 2 mặt l&agrave; kiểu dệt kh&aacute; phức tạp gi&uacute;p định h&igrave;nh form d&aacute;ng sản phẩm</p>\r\n\r\n<p>Cấu tr&uacute;c dệt kh&aacute;c biệt, gi&uacute;p tạo cảm gi&aacute;c thoải m&aacute;i.</p>\r\n\r\n<p>YODY - Look good. Feel good</p>', '2023-01-09 08:29:34', '2023-01-09 08:29:34', 0),
(60, 47, 'Quần Kaki Nam Regular Thêu Cạnh Túi', '499000', '/upload/images/product/product_7/qkm6005-den-06.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Quần kaki nam d&aacute;ng regular thoải m&aacute;i, dễ mặc</p>\r\n\r\n<p>Chất liệu kaki d&agrave;y dặn, bền chắc</p>\r\n\r\n<p>Thiết kế basic, ph&ugrave; hợp với nhiều d&aacute;ng người ch&acirc;u &Aacute;</p>\r\n\r\n<p>Th&iacute;ch hợp mặc đi l&agrave;m, đi chơi, đi học</p>\r\n\r\n<p>Phối đồ đa dạng c&ugrave;ng sơ mi, &aacute;o thun, &aacute;o polo, &aacute;o kho&aacute;c&hellip;</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:30:40', '2023-01-09 08:30:40', 0),
(61, 47, 'Quần Short Nam Thể Thao Quốc Dân', '179000', '/upload/images/product/product_7/sqm5021-den-3.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Quần short nam thể thao YODY</p>\r\n\r\n<p>Thiết kế cạp chun cả v&ograve;ng bản to v&ocirc; c&ugrave;ng khỏe khoắn</p>\r\n\r\n<p>D&acirc;y r&uacute;t chất lượng bền đẹp, c&oacute; in logo ch&iacute;nh h&atilde;ng tại đầu d&acirc;y</p>\r\n\r\n<p>T&uacute;i cạnh sườn c&oacute; kh&oacute;a k&eacute;o v&ocirc; c&ugrave;ng thuận tiện cho c&aacute;c anh</p>\r\n\r\n<p>Thiết kế thể thao, khỏe khoắn, chất liệu mềm mại, nhẹ nh&agrave;ng ph&ugrave; hợp vận động</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:31:30', '2023-01-09 08:31:30', 0),
(62, 48, 'Bộ Đồ Thể Thao Nam Nỉ Phối Sọc - CAM', '769000', '/upload/images/product/product_7/sdm5057-cam-3-03271db8-bc2c-4acb-878b-1bcf252a5685-f39f7be8-b2c3-4e32-9ad2-ba9b8dcc1cae.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Bộ đồ thể thao d&agrave;nh cho nam chất liệu nỉ d&agrave;y dặn, thoải m&aacute;i</p>\r\n\r\n<p>Thiết kế &aacute;o kho&aacute;c đa&nbsp;năng c&ugrave;ng quần nỉ d&aacute;ng đứng trẻ trung, năng động</p>\r\n\r\n<p>Đường phối m&agrave;u mang lại cho bạn&nbsp;một vẻ ngo&agrave;i v&ocirc; c&ugrave;ng khỏe khoắn</p>\r\n\r\n<p>Sản phẩm c&oacute; thể mặc ở nh&agrave;, đi l&agrave;m, đi học hay đi chơi, v&ocirc;&nbsp;c&ugrave;ng linh hoạt trong mọi ho&agrave;n cảnh sử dụng</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:32:50', '2023-01-09 08:32:50', 0),
(63, 48, 'Bộ Đông Nam Hoodie Thêu Logo', '899000', '/upload/images/product/product_7/btm5089-den-5.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Bộ đồ nam bao gồm &aacute;o hoodie d&agrave;i tay v&agrave; quần jogger d&aacute;ng su&ocirc;ng rộng gi&uacute;p tạo sự cử động thoải m&aacute;i cho người mặc</p>\r\n\r\n<p>Thiết kế h&igrave;nh th&ecirc;u ở ngực tạo điểm nhấn&nbsp;trẻ trung, năng động</p>\r\n\r\n<p>Bộ đồ c&oacute; chất liệu nỉ co gi&atilde;n, giữ ấm tốt</p>\r\n\r\n<p>Bề mặt vải mịn c&ugrave;ng m&agrave;u sắc thanh lịch c&oacute; thể mặc ở nh&agrave;, đi l&agrave;m v&agrave; đi chơi v&agrave;o m&ugrave;a đ&ocirc;ng</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:33:56', '2023-01-09 08:33:56', 0),
(64, 49, 'Thắt Lưng Nam Da Trơn TLM4025', '499000', '/upload/images/product/product_7/tlm4025-den-3.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Thắt lưng da b&ograve; 100% d&agrave;nh cho c&aacute;c ch&agrave;ng trai lịch l&atilde;m</p>\r\n\r\n<p>Đai lưng nam&nbsp;da thật kết hợp với mặt th&eacute;p cao cấp</p>\r\n\r\n<p>Mặt đai kim loại tự động gi&uacute;p tăng th&ecirc;m phần lịch sự cho người mặc</p>\r\n\r\n<p>Một chiếc thắt lưng cao cấp với đường may tỉ mỉ</p>\r\n\r\n<p>Một sự bổ sung cho bất kỳ trang phục theo phong c&aacute;ch n&agrave;o</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:35:14', '2023-01-09 08:35:14', 0),
(65, 49, 'Giày Nam Moccasin Đục Lỗ Da Nappa', '989000', '/upload/images/product/product_7/gim5043-den-2.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Gi&agrave;y nam&nbsp;mocca c&oacute; kiểu d&aacute;ng hiện đại</p>\r\n\r\n<p>Thiết kế đục lỗ trước mũi gi&agrave;y tạo sự th&ocirc;ng tho&aacute;ng khi đi</p>\r\n\r\n<p>Chất liệu da nappa mềm mại, b&oacute;ng đẹp tự nhi&ecirc;n, kh&ocirc;ng bong tr&oacute;c, kh&ocirc;ng bị nổ da, tho&aacute;ng kh&iacute;, kh&ocirc;ng g&acirc;y b&iacute; ch&acirc;n</p>\r\n\r\n<p>Gi&agrave;y c&oacute; thể kết hợp c&ugrave;ng nhiều trang phục,&nbsp;th&iacute;ch hợp diện&nbsp;đi chơi,&nbsp;đi l&agrave;m</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:36:08', '2023-01-09 08:36:08', 0),
(66, 50, 'Áo Phao Nữ Dáng Dài Thời Trang Siêu Ấm', '999000', '/upload/images/product/product_7/pvn5042-den-5.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>&Aacute;o phao nữ d&aacute;ng d&agrave;i, sang trọng v&agrave; hiện đại</p>\r\n\r\n<p>Ấm &aacute;p, d&agrave;y dặn nhưng nhẹ gi&uacute;p cả gi&oacute;, giữ ấm hiệu quả</p>\r\n\r\n<p>Thiết kế d&aacute;ng d&agrave;i ph&ugrave; hợp để phối đồ với những chiếc ch&acirc;n v&aacute;y, &aacute;o thun d&agrave;i tay thu đ&ocirc;ng để mặc đẹp m&agrave; vẫn ấm &aacute;p</p>\r\n\r\n<p>Hai phi&ecirc;n bản m&agrave;u sắc cơ bản: Đen &amp; be</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:39:41', '2023-01-09 08:39:41', 0),
(67, 50, 'Áo Len Nữ Gia Đình Dáng Ôm Xẻ Tay', '349000', '/upload/images/product/product_7/aln5032-nau-1.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>&Aacute;o len nữ với chất liệu mềm mại, độ d&agrave;y vừa phải, si&ecirc;u co d&atilde;n tạo cảm gi&aacute;c thoải m&aacute;i nhưng giữ ấm rất tốt</p>\r\n\r\n<p>Kiểu d&aacute;ng &ocirc;m s&aacute;t nữ t&iacute;nh với phần xẻ tay c&aacute;ch điệu độc đ&aacute;o</p>\r\n\r\n<p>Chiếc &aacute;o len thiết kế cơ bản nhưng kh&ocirc;ng hề nh&agrave;m ch&aacute;n</p>\r\n\r\n<p>N&agrave;ng c&oacute; thể kết hợp c&ugrave;ng ch&acirc;n v&aacute;y, quần &acirc;u hay quần legging đều rất đẹp</p>\r\n\r\n<p>Ph&ugrave; hợp cho kh&aacute;ch h&agrave;ng&nbsp;mặc khi đi chơi, đi l&agrave;m</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:40:49', '2023-01-09 08:40:49', 0),
(68, 50, 'Áo Thu Đông Nữ In Gấu Puff', '369000', '/upload/images/product/product_8/atn5136-den-6.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>&Aacute;o nỉ thu đ&ocirc;ng cho nữ, ấm &aacute;p ri&ecirc;ng cho m&ugrave;a lạnh n&agrave;y</p>\r\n\r\n<p>Chất vải nỉ với th&agrave;nh phần ch&iacute;nh l&agrave; sợi cotton v&agrave; polyester d&agrave;y dặn mang lại nhiều ưu điểm</p>\r\n\r\n<p>&Aacute;o c&oacute; khả năng giữ ấm hiệu quả nhưng đồng thời vẫn đảm bảo tho&aacute;ng kh&iacute; cho người mặc thoải m&aacute;i</p>\r\n\r\n<p>Chất sờ mềm mịn, co gi&atilde;n để thuận tiện vận động</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:42:14', '2023-01-09 08:42:14', 0),
(69, 50, 'Áo Polo Nữ Cafe Phối Nẹp Siêu Nhẹ Siêu Mát', '329000', '/upload/images/product/product_8/apn3700-vag-5.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu: Vải Cafe với th&agrave;nh phần 50% Sợi cafe, 50% sợi t&aacute;i chế PET</p>\r\n\r\n<p>Vải Cafe được l&agrave;m từ bột cafe c&oacute; đặc t&iacute;nh khử m&ugrave;i tốt - nhanh kh&ocirc; - chống tia UV</p>\r\n\r\n<p>Bảo vệ cơ thể, hạn chế tiếp x&uacute;c với tia UV</p>\r\n\r\n<p>Kh&aacute;ng khuẩn, khử m&ugrave;i gi&uacute;p bạn tự tin khi vận động, ng&agrave;y h&egrave; hay đơn giản l&agrave; tham gia 1 bữa tiệc nướng</p>\r\n\r\n<p>An to&agrave;n cho da, th&acirc;n thiện m&ocirc;i trường</p>\r\n\r\n<p>&Aacute;o c&oacute; form d&aacute;ng su&ocirc;ng nhẹ, bo nẹp, phối cổ v&agrave; tay &aacute;o khỏe khoắn v&agrave; lịch sự, th&iacute;ch hợp mặc đi chơi, đi l&agrave;m</p>\r\n\r\n<p><strong>FREESHIP&nbsp;</strong>d&ugrave; chỉ 1 chiếc Polo APN3700 (độc quyền tr&ecirc;n website Yody.vn)</p>\r\n\r\n<p>YODY&nbsp;- Look good. Feel good.</p>', '2023-01-09 08:43:16', '2023-01-09 08:43:16', 0),
(70, 50, 'Áo Sơ Mi Tay Dài Nữ Suông Cúc Bọc', '389000', '/upload/images/product/product_8/smn5212-hog-6.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu: Lụa satin</p>\r\n\r\n<p>&Aacute;o sơ mi nữ tay d&agrave;i su&ocirc;ng c&uacute;c bọc c&oacute; t&ocirc;ng m&agrave;u thanh lịch</p>\r\n\r\n<p>Thiết kế đơn giản với đường may tinh tế v&agrave; tỉ mỉ khiến c&aacute;c chi tiết tạo n&ecirc;n chiếc &aacute;o v&ocirc; c&ugrave;ng bắt mắt v&agrave; tinh xảo</p>\r\n\r\n<p>Kiểu d&aacute;ng phổ th&ocirc;ng&nbsp;dễ d&agrave;ng kết hợp với nhiều item như quần &acirc;u, ch&acirc;n v&aacute;y v&agrave; phụ kiện kh&aacute;c nhau</p>\r\n\r\n<p>Sản phẩm hiện đại,&nbsp;trẻ trung ph&ugrave; hợp để mặc đi l&agrave;m, đi chơi, dạo phố</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:44:51', '2023-01-09 08:44:51', 0),
(71, 50, 'Áo Phông Nữ Vissco Dáng Ôm Siêu Co Giãn', '199000', '/upload/images/product/product_8/tsn5178-cdt-4.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu Vissco</p>\r\n\r\n<p>&Aacute;o thun chất liệu m&aacute;t nhẹ, thoải m&aacute;i trong từng chuyển động</p>\r\n\r\n<p>Kiểu d&aacute;ng &ocirc;m s&aacute;t cơ thể, thiết kế thời trang, tạo điểm nhấn ri&ecirc;ng</p>\r\n\r\n<p>Sử dụng kết hợp với nhiều loại trang phục: quần jean, ch&acirc;n v&aacute;y,...</p>\r\n\r\n<p>Mặc đồ đi chơi, đi l&agrave;m, đi d&atilde; ngoại thoải m&aacute;i, thời trang</p>\r\n\r\n<p>YODY - Look good. Fell good</p>', '2023-01-09 08:46:32', '2023-01-09 08:46:32', 0),
(72, 50, 'Áo Giữ Nhiệt Nữ Cổ Tròn', '249000', '/upload/images/product/product_8/atn5170-nav-10.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu viscose&nbsp;co gi&atilde;n, giữ ấm, bề mặt vải mịn&nbsp;đem lại cảm gi&aacute;c thoải m&aacute;i, dễ chịu, ngăn chặn được c&aacute;c k&iacute;ch ứng l&ecirc;n da nhạy cảm</p>\r\n\r\n<p>Vải&nbsp;thấm h&uacute;t tốt, &iacute;t nhăn, giữ phom, độ bền cao</p>\r\n\r\n<p>Chiếc &aacute;o c&oacute; form d&aacute;ng &ocirc;m gi&uacute;p t&ocirc;n d&aacute;ng cho người mặc, thiết kế cổ tr&ograve;n trẻ trung c&ugrave;ng m&agrave;u sắc thanh lịch</p>\r\n\r\n<p>C&oacute; thể kết hợp c&ugrave;ng quần nỉ, quần jeans hoặc ch&acirc;n v&aacute;y. Sản phẩm th&iacute;ch hợp mặc ở nh&agrave;, đi l&agrave;m v&agrave; đi chơi v&agrave;o m&ugrave;a đ&ocirc;ng.</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:48:09', '2023-01-09 08:48:09', 0),
(73, 50, 'Áo Ba Lỗ Nữ Cotton Hack Dáng', '149000', '/upload/images/product/product_8/bln5048-den-plus-qjn5098-xah-6.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu zib cotton</p>\r\n\r\n<p>Vải&nbsp;co d&atilde;n cực tốt, mềm mại, thoải m&aacute;i v&agrave; thấm h&uacute;t</p>\r\n\r\n<p>Kiểu d&aacute;ng &ocirc;m s&aacute;t cơ thể, ba lỗ khoẻ, năng động</p>\r\n\r\n<p>Kết hợp c&ugrave;ng quần jean, quần nỉ v&agrave;&nbsp;&aacute;o kho&aacute;c, blazze c&ugrave;ng ch&acirc;n v&aacute;y với phong c&aacute;ch nữ t&iacute;nh, c&aacute;&nbsp;t&iacute;nh</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:49:07', '2023-01-09 08:49:07', 0),
(74, 51, 'Quần Jeans Nữ Ống Đứng Lưng Cao', '315000', '/upload/images/product/product_8/qjn4064-xdm5.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Quần jean ống đứng, chất liệu jean co gi&atilde;n&nbsp;</p>\r\n\r\n<p>Vải mềm, c&oacute; sự đ&agrave;n hồi tạo cảm gi&aacute;c thoải m&aacute;i cho người mặc</p>\r\n\r\n<p>Quần rất t&ocirc;n d&aacute;ng, gi&uacute;p che đi khuyết điểm ch&acirc;n cong</p>\r\n\r\n<p>Thiết kế basic, chải m&agrave;u tự nhi&ecirc;n tạo c&aacute;c sắc độ m&agrave;u trẻ trung, dễ phối đồ</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:50:43', '2023-01-09 08:50:43', 0),
(75, 51, 'Quần Âu Nữ Dáng Sông Đai Oze', '499000', '/upload/images/product/product_8/qan5204-den-6.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Quần &acirc;u nữ d&aacute;ng su&ocirc;ng thoải m&aacute;i&nbsp;v&agrave; thanh lịch d&agrave;nh cho ph&aacute;i đẹp đi chơi, đi l&agrave;m</p>\r\n\r\n<p>M&agrave;u sắc&nbsp;nh&atilde; nhặn, dễ l&ecirc;n đồ</p>\r\n\r\n<p>Mềm mại, tho&aacute;ng m&aacute;t, &iacute;t nhăn v&agrave; bền m&agrave;u</p>\r\n\r\n<p>Thiết kế&nbsp; ống rộng, d&aacute;ng s&ocirc;ng&nbsp;gi&uacute;p kh&eacute;o l&eacute;o che đi khuyết điểm bụng mỡ v&agrave; ch&acirc;n to&nbsp;của người mặc</p>\r\n\r\n<p>Điểm nhấn với d&acirc;y buộc trang tr&iacute;&nbsp;ph&iacute;a trước cạp</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:51:49', '2023-01-09 08:51:49', 0),
(76, 51, 'Quần Kaki Nữ Dáng Boy Trẻ Trung', '469000', '/upload/images/product/product_8/qjn5052-bsa-9.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Sử dụng chất liệu khaki,&nbsp;co gi&atilde;n 4 chiều mềm mại</p>\r\n\r\n<p>Quần d&aacute;ng boy vừa vặn, trẻ trung, kh&ocirc;ng qu&aacute; &ocirc;m hay qu&aacute; rộng</p>\r\n\r\n<p>Dễ mặc v&agrave; dễ d&agrave;ng kết hợp với nhiều loại trang phục kh&aacute;c nhau như sơ mi, polo, t-shirt,...</p>\r\n\r\n<p>Thiết kế mới, ph&aacute; c&aacute;ch mới c&ugrave;ng YODY</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:52:48', '2023-01-09 08:52:48', 0),
(77, 52, 'Bộ Đồ Thể Thao Nữ Nỉ Double Face Áo Khoác Kéo Khóa', '799000', '/upload/images/product/product_5/sdn5010-den-00772.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu 91% Polyester + 9% Spandex</p>\r\n\r\n<p>Được dệt từ sợi Polyester d&agrave;i &amp; mảnh, kết hợp c&ugrave;ng kiểu dệt Double Face cho nền vải chắc chắn nhưng vẫn c&oacute; độ xốp, nhẹ nh&agrave;ng.</p>\r\n\r\n<p>Độ bền cao, &iacute;t nhăn nh&agrave;u</p>\r\n\r\n<p>Co gi&atilde;n, ph&ugrave; hợp với chuyển động của cơ thể</p>\r\n\r\n<p>Hỗ trợ giữ ấm cơ thể, th&ocirc;ng tho&aacute;ng</p>\r\n\r\n<p>Bộ đồ thể thao in h&igrave;nh trẻ trung năng động, &aacute;o kho&aacute;c k&eacute;o kh&oacute;a với chi tiết phối đơn giản</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:54:55', '2023-01-09 08:54:55', 0),
(78, 52, 'Bộ Quần Áo Thể Thao Nữ Cotton Form Rộng', '730000', '/upload/images/product/product_5/sbn5004-ttm-14-1.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Bộ Quần &Aacute;o Thể Thao Nữ Cotton Form Rộng&nbsp;</p>\r\n\r\n<p>Thiết kế trẻ trung, hiện đại với 3 phối m&agrave;u si&ecirc;u ấn tượng</p>\r\n\r\n<p>Chất vải cotton mềm, thoải m&aacute;i, co gi&atilde;n, thấm h&uacute;t mồ h&ocirc;i tốt</p>\r\n\r\n<p>Quần thể thao &ocirc;m theo đường cong cơ thể gi&uacute;p cho mọi chuyển động đều linh hoạt, dễ d&agrave;ng</p>\r\n\r\n<p>&Aacute;o ph&ocirc;ng in chữ nổi bật tinh thần mạnh mẽ, thể thao, năng động</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:56:05', '2023-01-09 08:56:05', 0),
(79, 52, 'Bộ Quần Áo Thể Thao Nữ Cotton Form Rộng', '730000', '/upload/images/product/product_5/sbn5004-ttm-14-1.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Bộ Quần &Aacute;o Thể Thao Nữ Cotton Form Rộng&nbsp;</p>\r\n\r\n<p>Thiết kế trẻ trung, hiện đại với 3 phối m&agrave;u si&ecirc;u ấn tượng</p>\r\n\r\n<p>Chất vải cotton mềm, thoải m&aacute;i, co gi&atilde;n, thấm h&uacute;t mồ h&ocirc;i tốt</p>\r\n\r\n<p>Quần thể thao &ocirc;m theo đường cong cơ thể gi&uacute;p cho mọi chuyển động đều linh hoạt, dễ d&agrave;ng</p>\r\n\r\n<p>&Aacute;o ph&ocirc;ng in chữ nổi bật tinh thần mạnh mẽ, thể thao, năng động</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:56:05', '2023-01-09 08:56:05', 0),
(80, 53, 'Bộ Đồ Nữ Mùa Hè Co Giãn Tốt Phối Tay Raglan', '399000', '/upload/images/product/product_5/bdn5104-nau-4.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Sản phẩm bộ đồ nữ mặc h&egrave; mới nhất 2022</p>\r\n\r\n<p>Sản phẩm gồm 1 quần v&agrave; 1 &aacute;o thiết kế theo bộ h&agrave;i h&ograve;a</p>\r\n\r\n<p>Kiểu d&aacute;ng su&ocirc;ng cơ bản, thoải m&aacute;i ngay cả khi vận động</p>\r\n\r\n<p>H&igrave;nh th&ecirc;u gấu nhỏ xinh tạo điểm nhấn ri&ecirc;ng biệt cho bộ đồ</p>\r\n\r\n<p>Chất vải cotton mềm, thấm h&uacute;t tốt, thoải m&aacute;i vận động</p>\r\n\r\n<p>Phối m&agrave;u trẻ trung, hiện đại h&agrave;i h&ograve;a, ph&ugrave; hợp với nhiều m&agrave;u da</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 08:57:45', '2023-01-09 08:57:45', 0),
(81, 53, 'Bộ Quần Áo Nữ Mùa Hè Co Giãn In Chữ Possible', '399000', '/upload/images/product/product_5/bdn5134-tit1.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu 95% cotton + 5% spandex</p>\r\n\r\n<p>Bộ đồ d&aacute;ng cơ bản, co gi&atilde;n thoải m&aacute;i</p>\r\n\r\n<p>Thiết kế họa tiết trẻ trung, thời trang, &aacute;o in chữ nghệ thuật, quần d&aacute;ng &ocirc;m tự nhi&ecirc;n</p>\r\n\r\n<p>Bộ đồ mặc nh&agrave;, mặc đi chợ thoải m&aacute;i, m&aacute;t mẻ</p>\r\n\r\n<p>YODY - Look good. Feel good</p>', '2023-01-09 08:58:59', '2023-01-09 08:58:59', 0),
(82, 54, 'Bộ Đồ Trẻ Em Da Cá In Logo Yody', '498000', '/upload/images/product/product_5/qmk5021-den-bdk5356-cpd-8.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Bộ đồ kid kiểu d&aacute;ng cơ bản ấm &aacute;p, thoải m&aacute;i cho m&agrave;u đ&ocirc;ng lạnh</p>\r\n\r\n<p>Chất liệu da c&aacute; giữ ấm tốt, thấm &nbsp;h&uacute;t tốt hiệu quả ,thoải m&aacute;i mềm mại cho b&eacute;.&nbsp;</p>\r\n\r\n<p>Th&agrave;nh phần&nbsp;sợi vải: 58% cotton, 39% polyester v&agrave; 3% spandex mang đến những đặc t&iacute;nh ưu việt gi&uacute;p b&eacute; thoải m&aacute;i, tự tin khi diện đồ</p>\r\n\r\n<p>Sản phẩm c&oacute; độ bền cao</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 09:00:06', '2023-01-09 09:00:06', 0),
(83, 54, 'Bộ Đồ Trẻ Em Unisex In Hình Thỏ Cute', '469000', '/upload/images/product/product_5/btk5073-tim01.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Bộ đồ cho b&eacute;, ấm &aacute;p - thoải m&aacute;i - thời trang</p>\r\n\r\n<p>Vải c&oacute; sự kết hợp của sợi cotton v&agrave; polyester tạo n&ecirc;n đặc t&iacute;nh ưu việt cho sản phẩm như: giữ ấm tốt, thấm h&uacute;t, độ bền cao</p>\r\n\r\n<p>B&eacute; đi học hay ở nh&agrave; đều c&oacute; thể linh hoạt diện bộ đồ v&agrave; thoải m&aacute;i học tập, vận động vui chơi</p>\r\n\r\n<p>Chất vải mềm mịn, an to&agrave;n cho c&aacute;c b&eacute;, ba mẹ y&ecirc;n t&acirc;m</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 09:00:58', '2023-01-09 09:00:58', 0),
(84, 55, 'Bộ Đồ Thể Thao Trẻ Em In Sọc', '420000', '/upload/images/product/product_5/sdk5007-cvt-3.jpg', '<p>ĐẶC T&Iacute;NH NỔI BẬT</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>Chất liệu:&nbsp;&nbsp;91% Polyester + 9% Spandex c&oacute; độ bền cao,&nbsp;&iacute;t nhăn nh&agrave;u</p>\r\n\r\n<p>Vải co gi&atilde;n tốt, ấm,&nbsp;tho&aacute;ng, ph&ugrave; hợp với chuyển động cơ thể b&eacute;</p>\r\n\r\n<p>Bộ nỉ thể thao cho b&eacute; d&aacute;ng cơ bản,&nbsp;&ocirc;m vừa người dễ mặc</p>\r\n\r\n<p>Thiết kế phong c&aacute;ch basic, điểm nhấn&nbsp;l&agrave; h&igrave;nh in phản quang tinh tế ở ngực &aacute;o v&agrave; hai b&ecirc;n sườn quần</p>\r\n\r\n<p>Ph&ugrave; hợp để b&eacute; mặc ở&nbsp;nh&agrave;, đi chơi, cafe c&ugrave;ng gia đ&igrave;nh bạn b&egrave;</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', '2023-01-09 09:02:02', '2023-01-09 09:02:02', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_id` int(10) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `Username` varchar(100) NOT NULL,
  `Phone` int(15) DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `Image` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Level` int(1) NOT NULL DEFAULT '5',
  `Status` int(1) DEFAULT '0',
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`User_id`, `Email`, `password`, `Username`, `Phone`, `Address`, `Image`, `created_at`, `updated_at`, `Level`, `Status`) VALUES
(31, 'admin@gmail.com', '$2a$12$Un0Ar78QnfEMj.rPtSLChOXXrbolb2JTuLIeo.Y7TE8wQmJ1i5RYi', 'Admin', 123, 'gia lai', NULL, '2023-01-10 07:25:24', '2022-11-04 19:16:15', 0, 0),
(181, 'thai@gmail.com', NULL, 'thong', 123456789, 'qưe', NULL, '2023-01-10 07:19:14', '2023-01-10 07:19:14', 6, 0),
(182, 'thaithong03071999@gmail.com', '$2y$10$R4QazmXmIVAjqbsbYcZahONf2Wi./aU6hrZEwi4YZppY.2XYaySoS', 'thông thái', 935753308, 'gia lai', '/upload/images/tải xuống.jpg', '2023-01-10 09:59:47', '2023-01-10 07:20:29', 5, 0),
(183, 'admin1@gsa', NULL, 'a', 1234567890, 'QQQ', NULL, '2023-01-10 07:22:32', '2023-01-10 07:22:32', 6, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_id`) REFERENCES `category` (`Cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
