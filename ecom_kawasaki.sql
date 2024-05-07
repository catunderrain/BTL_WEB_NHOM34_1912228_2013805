-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2024 lúc 09:03 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecom_kawasaki`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(39, 4, 'mpu9sqvh0aa6ukhihjv5sr2mk8', 'NINJA H2 CARBON', '1372000000', 1, 'https://i.imgur.com/o8HmO2Y.png'),
(70, 29, 'mtn9atdlgtegrg9pgmdsf97vg4', 'VULCAN S', '956000000', 4, 'https://i.imgur.com/PrlAkSm.jpeg'),
(71, 4, 'e9j8eoe1no7kqmfofed0hf0haf', 'NINJA H2 CARBON', '1372000000', 1, 'https://i.imgur.com/o8HmO2Y.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'VULCAN'),
(2, 'Z'),
(11, 'NINJA'),
(13, 'klm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(1, 'Nguyễn Thị Hoài My', '93, đường số 1', 'Hồ Chí Minh', 'null', '700000', '0866781900', 'meo@gmail.com', 'hoaimy'),
(2, 'meomeo', '34. kdc DP MNN mnfgff', 'Hồ Chí Minh', 'AF', '700000', '0128746792', 'meo@gmail.com', 'meomeo'),
(4, 'toan', 'hcm', 'hcm', 'AF', '00000', '0948945963', 'toan@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `date_order`, `status`) VALUES
(16, 4, 'NINJA H2 CARBON', 2, 1, '1372000000', 'https://i.imgur.com/o8HmO2Y.png', '2024-05-07 06:48:24', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) UNSIGNED NOT NULL,
  `productDesc` text NOT NULL,
  `productType` int(11) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productImage_1` varchar(255) NOT NULL,
  `productImage_2` varchar(255) NOT NULL,
  `productImage_3` varchar(255) NOT NULL,
  `productImage_4` varchar(255) NOT NULL,
  `productImage_5` varchar(255) NOT NULL,
  `productImage_6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `productDesc`, `productType`, `productPrice`, `productImage`, `productImage_1`, `productImage_2`, `productImage_3`, `productImage_4`, `productImage_5`, `productImage_6`) VALUES
(4, 'NINJA H2 CARBON', 11, 'Thông số kỹ thuật:\r\nDài x Rộng x Cao: 1.455 mm, 2.085 mm và 1.125 mm\r\nCỡ lốp trước/sau : bộ lốp hiệu suất cao Bridgestone RS11\r\nDung tích xy-lanh : 998cc\r\nHộp số : 6 cấp\r\nPhanh trước/sau: phanh trước Brembo Stylema\r\nĐộ cao yên : 825mm\r\nLoại động cơ : 4 xy-lanh siêu nạp, 16 van\r\nCông suất tối đa : 227.7 mã lực tại 11.500 vòng/phút\r\nHệ thống cung cấp nhiên liệu:\r\nTên sản phẩm : Kawasaki Ninja H2 CARBON 2021\r\n', 1, '1372000000', 'https://i.imgur.com/o8HmO2Y.png', 'https://i.imgur.com/CxNYz80.jpeg', 'https://i.imgur.com/SpWzB4L.jpeg', 'https://i.imgur.com/06WIbjG.jpeg', 'https://i.imgur.com/ZFpOGNs.jpeg', 'https://i.imgur.com/YYHjAD9.jpeg', 'https://i.imgur.com/iz6zQYZ.jpeg'),
(5, 'NINJA ZX-10R ABS KRT EDITION', 11, 'Công suất cực đại	203 PS / 13.200 rpm\r\nCông suất tối đa với Ram Air	213 PS / 13.200 rpm\r\nMô-men xoắn cực đại	114,9 Nm {11,7 kgm} / 11.400 rpm\r\nLoại động cơ	DOHC, 4 xi-lanh thẳng hàng, làm mát bằng dung dịch\r\nDung tích động cơ	998 cm³\r\nKích thước và hành trình	76,0 x 55,0 mm\r\nTỉ số nén	13,0:1\r\nHT đánh lửa	B&C (TCBI EL. ADV. D.)\r\nHT khởi động	Khởi động điện\r\nHT bôi trơn	Bôi trơn cưỡng bức\r\nHộp số	Hộp số 6 cấp\r\nTỉ số truyền chính	1,681 (79/47)\r\nTỉ số truyền 1st	2,600 (39/15)', 0, '729000000', 'https://i.imgur.com/npHLWuv.png', 'https://i.imgur.com/Dz5UARp.jpeg', 'https://i.imgur.com/oxcd67R.jpeg', 'https://i.imgur.com/f31WPzF.jpeg', 'https://i.imgur.com/PVaLgoo.jpeg', 'https://i.imgur.com/vU8QEAs.jpeg', 'https://i.imgur.com/OKf7jDO.jpeg'),
(6, 'NINJA ZX-25R SE', 11, 'Công suất cực đại	34,5 kW {46 PS} / 15.500 rpm\r\nCông suất tối đa với Ram Air	35,2 kW {47 PS } / 15.500 rpm\r\nMô-men xoắn cực đại	22,0 Nm {2,2 kgfm} / 12.500 rpm\r\nLoại động cơ	Làm mát bằng dung dịch, 4 kỳ, 4 xi-lanh thẳng hàng\r\nDung tích động cơ	250 cm³\r\nKích thước và hành trình	50,0 x 31,8 mm\r\nTỉ số nén	12,5:1\r\nHệ thống nhiên liệu	Phun xăng điện tử\r\nHT đánh lửa	Điện tử\r\nHT khởi động	Khởi động điện\r\nHT bôi trơn	Bôi trơn cưỡng bức\r\nHộp số	Hộp số 6 cấp\r\nTỉ số truyền chính	2,900 (87/30)\r\nTỉ số truyền 1st	2,929 (41/14)', 1, '197300000', 'https://i.imgur.com/BVjAay5.jpeg', 'https://i.imgur.com/KuhBksc.jpeg', 'https://i.imgur.com/y4MI7Dm.jpeg', 'https://i.imgur.com/GdPZOQg.jpeg', 'https://i.imgur.com/rrBj8oR.jpeg', 'https://i.imgur.com/AQCg3b8.jpeg', ''),
(7, 'NINJA 400 ABS KRT EDITION', 11, 'Công suất cực đại	33,4 kW {45 PS} / 10.000 rpm\r\nMô-men xoắn cực đại	38,0 Nm {3,9 kgfm} / 8.000 rpm\r\nLoại động cơ	Động cơ xi-lanh đôi 399 cm³, 4 thì DOHC, làm mát bằng dung dịch\r\nDung tích động cơ	399 cm³\r\nKích thước và hành trình	70,0 x 51,8 mm\r\nTỉ số nén	11,5:1\r\nHT đánh lửa	B&C (TCBI, B. P&EL. ADV. D.)\r\nHT khởi động	Khởi động điện\r\nHT bôi trơn	Bôi trơn cưỡng bức\r\nHộp số	Hộp số 6 cấp\r\nTỉ số truyền chính	2,219 (71/32)\r\nTỉ số truyền 1st	2,929 (41/14)\r\nTỉ số truyền 2nd	2,056 (37/18)', 1, '171600000', 'https://i.imgur.com/bksi1Kw.png', 'https://i.imgur.com/s0vLbsF.jpeg', 'https://i.imgur.com/UGmOF8F.jpeg', 'https://i.imgur.com/wRmB2fY.jpeg', 'https://i.imgur.com/T7NC6N0.jpeg', 'https://i.imgur.com/9KMW33k.jpeg', 'https://i.imgur.com/rdoTIp5.jpeg'),
(8, 'NINJA 400 ABS', 11, 'Công suất cực đại	33,4 kW {45 PS} / 10.000 rpm\r\nMô-men xoắn cực đại	38,0 Nm {3,9 kgfm} / 8.000 rpm\r\nLoại động cơ	Động cơ xi-lanh đôi 399 cm³, 4 thì DOHC, làm mát bằng dung dịch\r\nDung tích động cơ	399 cm³\r\nKích thước và hành trình	70,0 x 51,8 mm\r\nTỉ số nén	11,5:1\r\nHT đánh lửa	B&C (TCBI, B. P&EL. ADV. D.)\r\nHT khởi động	Khởi động điện\r\nHT bôi trơn	Bôi trơn cưỡng bức\r\nHộp số	Hộp số 6 cấp\r\nTỉ số truyền chính	2,219 (71/32)\r\nTỉ số truyền 1st	2,929 (41/14)', 0, '168600000', 'https://i.imgur.com/peMhsP7.png', 'https://i.imgur.com/t2pa7Ig.jpeg', 'https://i.imgur.com/WMq7GRT.jpeg', 'https://i.imgur.com/nRwcFbM.jpeg', 'https://i.imgur.com/AvJ4KKd.jpeg', 'https://i.imgur.com/QZgnUnk.jpeg', 'https://i.imgur.com/m5aMabI.jpeg'),
(9, 'NINJA 650 ABS', 11, 'Công suất cực đại	50,2 kW {68 PS} / 8.000 rpm\r\nMô-men xoắn cực đại	64 N.m {6,5 kgf.m} / 6.700 rpm\r\nLoại động cơ	Động cơ xi-lanh đôi, 4 thì DOHC, làm mát bằng dung dịch\r\nDung tích động cơ	649 cm³\r\nKích thước và hành trình	83,0 x 60,0 mm\r\nTỉ số nén	10,8:1\r\nHệ thống nhiên liệu	Phun xăng\r\nHT đánh lửa	Kỹ thuật số\r\nHT khởi động	Khởi động điện\r\nHT bôi trơn	Hệ thông bôi trơn cưỡng bức\r\nHộp số	6 cấp\r\nTỉ số truyền chính	2,095 (88/42)\r\nTỉ số truyền 1st	2,438 (39/16)', 1, '210000000', 'https://i.imgur.com/2u9rmpZ.jpeg', 'https://i.imgur.com/Z6IfWMg.jpeg', 'https://i.imgur.com/3bMAK5b.jpeg', 'https://i.imgur.com/cAtnRXC.jpeg', '', '', ''),
(10, 'NINJA 650 ABS KRT EDITION', 11, 'Công suất cực đại	50,2 kW {68 PS} / 8.000 rpm\r\nMô-men xoắn cực đại	64 N.m {6,5 kgf.m} / 6.700 rpm\r\nLoại động cơ	Động cơ xi-lanh đôi, 4 thì DOHC, làm mát bằng dung dịch\r\nDung tích động cơ	649 cm³\r\nKích thước và hành trình	83,0 x 60,0 mm\r\nTỉ số nén	10,8:1\r\nHệ thống nhiên liệu	Phun xăng\r\nHT đánh lửa	Kỹ thuật số\r\nHT khởi động	Khởi động điện\r\nHT bôi trơn	Hệ thông bôi trơn cưỡng bức\r\nHộp số	6 cấp\r\nTỉ số truyền chính	2,095 (88/42)', 0, '210000000', 'https://i.imgur.com/Siy9lyA.jpeg', 'https://i.imgur.com/3jg6YoW.jpeg', 'https://i.imgur.com/zMQmaRu.jpeg', 'https://i.imgur.com/Fli2iOT.jpeg', 'https://i.imgur.com/p2EOK3h.jpeg', 'https://i.imgur.com/X1mINwO.jpeg', 'https://i.imgur.com/xyew1k9.jpeg'),
(11, 'KAWASAKI ZX25R ABS 2022', 11, '- Loại động cơ : 4 thì, 4 xy-lanh thẳng hàng\r\n- Dung tích : 249,8 cc\r\n- Đường kính x Hành trình Piston : 50,0 x 31,8 mm\r\n- Tỉ số nén : 11.5:1\r\n- Hệ thống bôi trơn : Bôi trơn cưỡng bức\r\n- Hệ thống khởi động : Khởi động điện\r\n- Hộp số : Hộp số 6 cấp\r\n- Công suất cực đại : 37,5 kW {51 PS} / 15.500 rpm (với Ram Air)\r\n- Mô-men xoắn cực đại : 22,9 Nm {2,3 kgfm} / 14.500 rpm\r\n- Dài / Rộng / Cao : 1.980 x 750 x 1.110 mm\r\n- Trọng lượng : 182 kg\r\n- Dung tích bình xăng : 15 Lit', 1, '192700000', 'https://i.imgur.com/3Irw2Ml.jpeg', 'https://i.imgur.com/Pg7gD6J.jpeg', 'https://i.imgur.com/GEiymiD.jpeg', 'https://i.imgur.com/zWGmVze.jpeg', '', '', ''),
(15, 'NINJA ZX-10R 2020', 11, '- Loại động cơ : 4 thì, 4 xy-lanh thẳng hàng\r\n- Dung tích : 998 cm3\r\n- Đường kính x Hành trình Piston : 76,0 x 55,0 mm\r\n- Tỉ số nén : 13,0:1\r\n- Hệ thống bôi trơn : Bôi trơn cưỡng bức\r\n- Hệ thống khởi động : Khởi động điện\r\n- Hộp số : Hộp số 6 cấp\r\n- Công suất cực đại : 203 PS (213 PS với Ram Air) / 13.500 rpm\r\n- Mô-men xoắn cực đại : 11.8 kgƒ·m / 11.200 rpm\r\n- Dài / Rộng / Cao : 2,085 / 740 / 1,145 mm\r\n- Chiều cao yên : 835 mm.\r\n- Dung tích bình xăng : 17 Lit', 1, '571100000', 'https://i.imgur.com/uLqCnPq.jpeg', 'https://i.imgur.com/3mS3MZk.jpeg', 'https://i.imgur.com/UrLr1J9.jpeg', 'https://i.imgur.com/fZh33iJ.jpeg', 'https://i.imgur.com/oZS1JU7.jpeg', 'https://i.imgur.com/nShSeGg.jpeg', 'https://i.imgur.com/2dmzYed.jpeg'),
(16, 'KAWASAKI Z650RS', 2, 'Loại động cơ Làm mát bằng chất lỏng, 4 thì Parallel Twin\r\nDịch chuyển 649cc\r\nhệ thống van DOHC, 8 van\r\nBore và đột quỵ 83,0 x 60,0 mm\r\nTỷ lệ nén 10,8:1\r\nQuá trình lây truyền 6 tốc độ, quay trở lại\r\nHệ thống đánh lửa Kỹ thuật số\r\nhệ thống nhiên liệu Phun nhiên liệu: ø36 mm 2 với van tiết lưu kép\r\nhệ thống khởi động Điện\r\nly hợp Đa đĩa ướt, thủ công\r\nlốp trước 120/70ZR17M/C (58W)\r\nlốp sau 160/60ZR17M/C (69W)\r\nTổng chiều dài 2.065 mm\r\nchiều rộng tổng thể 800 mm\r\nchiều cao tổng thể 1.115mm\r\nchiều dài cơ sở 1.405 mm\r\ngiải phóng mặt bằng 125mm\r\nChiều cao ghế ngồi 800 mm\r\nkhối lượng lề đường 187kg\r\nDung tích thùng nhiên liệu 12 lít', 1, '231000000', 'https://i.imgur.com/6gKup6R.jpeg', 'https://i.imgur.com/tlA6aJO.jpeg', 'https://i.imgur.com/3g3spCV.jpeg', 'https://i.imgur.com/OlwEr3D.jpeg', 'https://i.imgur.com/Wo299ZV.jpeg', 'https://i.imgur.com/81XXK46.jpeg', 'https://i.imgur.com/xdRtG2B.jpeg'),
(17, 'KAWASAKI Z1000R 2023', 2, 'Kích thước: 2.045 x 790 x 1.055 mm\r\nChiều dài cơ sở: 1.435 mm\r\nĐộ cao gầm xe:125 mm\r\nChiều cao yên: 815 mm\r\nTrọng lượng: 221 kg\r\nDung tích bình xăng: 17 lít\r\nMức tiêu hao nhiên liệu: 6,0 L/100km\r\nBảo hành: 24 tháng', 0, '498000000', 'https://i.imgur.com/v1ZdQhV.png', 'https://i.imgur.com/cuW8Lm4.jpeg', 'https://i.imgur.com/eWPAoDH.jpeg', 'https://i.imgur.com/SQgESB7.png', '', '', ''),
(18, 'KAWASAKI Z900RS 2022  ', 2, '- Loại động cơ : 4 thì, 4 xy-lanh thẳng hàng\r\n- Dung tích : 948 cm3\r\n- Đường kính x Hành trình Piston : 73,4 x 56,0 mm\r\n- Tỉ số nén : 10,8:1\r\n- Hệ thống bôi trơn : Bôi trơn cưỡng bức\r\n- Hệ thống khởi động : Khởi động điện\r\n- Hộp số : Hộp số 6 cấp\r\n- Công suất cực đại : 82.0 kW {111 PS} / 8,500 rpm\r\n- Mô-men xoắn cực đại : 98.0 Nm {10.0 kg¦m} / 6,500 rpm\r\n- Dài / Rộng / Cao : 2,100 / 865 / 1,150 mm\r\n- Chiều cao yên : 800 mm.\r\n- Dung tích bình xăng : 17 Lit', 1, '415000000', 'https://i.imgur.com/XZji8dg.jpeg', 'https://i.imgur.com/CYYEcMz.jpeg', 'https://i.imgur.com/muCbEAI.jpeg', 'https://i.imgur.com/l2r1pgL.jpeg', 'https://i.imgur.com/GsvavlU.jpeg', 'https://i.imgur.com/9Qm4eob.jpeg', 'https://i.imgur.com/u8CoFKo.jpeg'),
(19, 'Z650 ABS', 2, '- Loại động cơ : 4 thì, xy-lanh đôi\r\n- Dung tích : 649 cm3\r\n- Đường kính x Hành trình Piston : 83,0 x 60,0 mm\r\n- Tỉ số nén : 10,8:1\r\n- Hệ thống bôi trơn : Bôi trơn cưỡng bức\r\n- Hệ thống khởi động : Khởi động điện\r\n- Hộp số : Hộp số 6 cấp\r\n- Công suất cực đại : 50,2 kW {68 PS} / 8.000 rpm\r\n- Mô-men xoắn cực đại : 64 N.m {6,5 kgf.m} / 6.700 rpm\r\n- Dài / Rộng / Cao : 2,055 / 765 / 1,065 mm\r\n- Chiều cao yên : 790 mm.\r\n- Dung tích bình xăng : 15 Lit', 1, '187000000', 'https://i.imgur.com/yzfudDx.jpeg', 'https://i.imgur.com/iThqv6F.jpeg', 'https://i.imgur.com/iYgqb3k.jpeg', 'https://i.imgur.com/hmraGBU.jpeg', '', '', ''),
(20, 'Z400', 2, '- Loại động cơ : 4 thì, xy-lanh đôi, DOHC, 4 van, W /C\r\n- Dung tích : 399 cm3\r\n- Đường kính x Hành trình Piston : 70,0 x 51,8 mm\r\n- Tỉ số nén : 11,5:1\r\n- Hệ thống bôi trơn : Bôi trơn cưỡng bức\r\n- Hệ thống khởi động : Khởi động điện\r\n- Hộp số : Hộp số 6 cấp\r\n- Công suất cực đại : 33,4 kW {45 PS} / 10.000 rpm\r\n- Mô-men xoắn cực đại : 38,0 N·m {3,9 kgƒ·m} / 8.000 rpm\r\n- Dài / Rộng / Cao : 1,990 / 710 / 1,120 mm\r\n- Chiều cao yên : 785 mm.\r\n- Dung tích bình xăng : 14 Lit', 1, '149000000', 'https://i.imgur.com/9ul1ZwH.jpeg', 'https://i.imgur.com/860GJb7.jpeg', 'https://i.imgur.com/tQZ9utn.jpeg', 'https://i.imgur.com/3hvfBiL.jpeg', 'https://i.imgur.com/p4gCPbE.jpeg', 'https://i.imgur.com/wyovC0j.jpeg', 'https://i.imgur.com/Xeynhgc.jpeg'),
(21, 'Z900 ABS', 2, '- Loại động cơ: 4 thì, 4 xy-lanh, DOHC, W /C\r\n- Dung tích: 948 cm3\r\n- Đường kính x Hành trình Piston: 73.4 x 56.0 mm\r\n- Tỉ số nén: 11.8:1\r\n- Hệ thống bôi trơn: Bôi trơn cưỡng bức\r\n- Hệ thống khởi động: Khởi động điện\r\n- Hộp số: Hộp số 6 cấp\r\n- Công suất cực đại : 92.2 kW {125 PS} / 9,500 rpm\r\n- Mô-men xoắn cực đại : 98.6 Nm {10.1 kg¦m} / 7,700 rpm\r\n- Dài / Rộng / Cao : 2,065 / 825 / 1,065 mm\r\n- Chiều cao yên : 795 mm\r\n- Dung tích bình xăng : 15 Lit', 1, '288000000', 'https://i.imgur.com/5crNMz3.jpeg', 'https://i.imgur.com/bjZX0Uw.jpeg', 'https://i.imgur.com/eTuP4F9.jpeg', 'https://i.imgur.com/vKW2vtK.jpeg', 'https://i.imgur.com/PyBFcCP.jpeg', 'https://i.imgur.com/UinRict.jpeg', 'https://i.imgur.com/pD2q5IM.jpeg'),
(22, 'KAWASAKI Z1000 ABS', 2, '- Loại động cơ : 4 thì, 4 xy-lanh, DOHC, W /C\r\n- Dung tích : 1043 cm3\r\n- Đường kính x Hành trình Piston : 77,0 x 56,0 mm\r\n- Tỉ số nén : 11,8:1\r\n- Hệ thống bôi trơn : Bôi trơn cưỡng bức\r\n- Hệ thống khởi động : Khởi động điện\r\n- Hộp số : Hộp số 6 cấp\r\n- Công suất cực đại : 104.5 kW {142 PS} / 10,000 rpm\r\n- Mô-men xoắn cực đại : 111.0 Nm {11.3 kg¦m} / 7,300 rpm\r\n- Dài / Rộng / Cao : 2,045 / 790 / 1,055 mm\r\n- Chiều cao yên : 815 mm.\r\n- Dung tích bình xăng : 17 Lit', 1, '412000000 ', 'https://i.imgur.com/lhOSsSI.jpeg', 'https://i.imgur.com/aaCZsfv.jpeg', 'https://i.imgur.com/9LdNvy0.jpeg', 'https://i.imgur.com/7iwzl6N.jpeg', 'https://i.imgur.com/p5I6szk.jpeg', 'https://i.imgur.com/nrEjPQa.jpeg', ''),
(29, 'VULCAN S', 1, '- Loại động cơ : 4 thì, xy-lanh đôi, DOHC, W / C\r\n- Dung tích : 649 cm3\r\n- Đường kính x Hành trình Piston : 83,0 x 60,0 mm\r\n- Tỉ số nén : 10,8:1\r\n- Hệ thống bôi trơn : Bôi trơn cưỡng bức\r\n- Hệ thống khởi động : Khởi động điện\r\n- Hộp số : Hộp số 6 cấp\r\n- Công suất cực đại : 45.0 kW {61 PS} / 7,500 rpm\r\n- Mô-men xoắn cực đại : 63.0 Nm {6.4 kg¦m} / 6,600 rpm\r\n- Dài / Rộng / Cao : 2,310 / 880 / 1,100 mm\r\n- Chiều cao yên : 705 mm.\r\n- Dung tích bình xăng : 14 Lit', 1, '239000000', 'https://i.imgur.com/PrlAkSm.jpeg', 'https://i.imgur.com/TM5EGbN.jpeg', 'https://i.imgur.com/1y0W9kn.jpeg', 'https://i.imgur.com/5whO0Cy.jpeg', 'https://i.imgur.com/66UiLuf.jpeg', 'https://i.imgur.com/Ony0jIu.jpeg', 'https://i.imgur.com/ykamDhv.jpeg'),
(32, 'KLX230S', 13, 'Loại khung	Khung sườn dạng Perimeter bằng thép chịu lực cao\r\nHệ thống giảm xóc trước	Phuộc ống lồng ø37 mm\r\nHệ thống giảm xóc sau	Uni Trak thế hệ mới với khả năng điều chỉnh\r\nHành trình phuộc trước	158 mm\r\nHành trình phuộc sau	168 mm\r\nGóc Caster	27,5°\r\nĐường mòn	116 mm\r\nGóc lái (trái /phải)	45° / 45°\r\nLốp trước	2,75-21 45P\r\nLốp sau	4,10-18 59P\r\nPhanh trước	Đĩa đơn ø240 mm\r\nKích thước trước	ø213 mm\r\nPhanh sau	Đĩa đơn ø220 mm\r\nKích thước sau	ø186 mm', 1, '151000000', 'https://i.imgur.com/1NFB3MK.jpeg', 'https://i.imgur.com/vCq6sgY.jpeg', 'https://i.imgur.com/hmEhUGw.jpeg', 'https://i.imgur.com/pj9PKCw.png', 'https://i.imgur.com/i3mV93w.jpeg', 'https://i.imgur.com/7dfMfHK.jpeg', 'https://i.imgur.com/dLZYIUx.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `cartId` (`cartId`),
  ADD KEY `sId` (`sId`,`productName`,`price`,`quantity`,`image`),
  ADD KEY `productName` (`productName`),
  ADD KEY `sId_2` (`sId`,`productName`,`image`),
  ADD KEY `sId_3` (`sId`,`productName`,`price`,`image`),
  ADD KEY `quantity` (`quantity`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`),
  ADD KEY `catId` (`catId`,`catName`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `quantity` (`quantity`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `productName` (`productName`(255)),
  ADD KEY `productPrice` (`productPrice`);

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
