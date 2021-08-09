-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th8 08, 2021 lúc 04:41 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_hoatuoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `MA_HOA` char(9) NOT NULL,
  `MA_DH` int(11) DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  PRIMARY KEY (`MA_HOA`),
  KEY `MA_DH` (`MA_DH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MA_HOA`, `MA_DH`, `SOLUONG`) VALUES
('1', 10, 2),
('1036', 12, 1),
('2', 11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

DROP TABLE IF EXISTS `chucvu`;
CREATE TABLE IF NOT EXISTS `chucvu` (
  `MA_CV` char(9) NOT NULL,
  `TEN_CV` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MA_CV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MA_CV`, `TEN_CV`) VALUES
('1', 'admin'),
('2', 'bán hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude`
--

DROP TABLE IF EXISTS `chude`;
CREATE TABLE IF NOT EXISTS `chude` (
  `MA_CD` char(9) NOT NULL,
  `TEN_CD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MA_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chude`
--

INSERT INTO `chude` (`MA_CD`, `TEN_CD`) VALUES
('1', 'Hoa cưới\r\n'),
('2', 'Hoa sinh nhật\r\n'),
('3', 'Hoa chia buồn'),
('4', 'Hoa tình yêu'),
('5', 'Hoa khô');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `MA_DH` int(11) NOT NULL AUTO_INCREMENT,
  `MA_NV` char(9) NOT NULL,
  `MA_KH` char(9) NOT NULL,
  `NGAYDAT_DH` datetime DEFAULT NULL,
  `GHICHU_DH` text,
  `SDT_DH` varchar(11) NOT NULL,
  `TENKH_DH` varchar(255) NOT NULL,
  `DIACHI_DH` varchar(255) NOT NULL,
  `DUYET` tinyint(1) NOT NULL,
  PRIMARY KEY (`MA_DH`),
  KEY `FK_KHACHHANG_DONHANG` (`MA_KH`),
  KEY `FK_NHANVIEN_DONHANG` (`MA_NV`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MA_DH`, `MA_NV`, `MA_KH`, `NGAYDAT_DH`, `GHICHU_DH`, `SDT_DH`, `TENKH_DH`, `DIACHI_DH`, `DUYET`) VALUES
(1, '1', '1', '2021-08-07 12:31:49', '', '0384151501', 'tiendat', 'abc', 3),
(2, '1', '1', '2021-08-07 12:31:49', '', '0384151501', 'tiendat', 'abc', 1),
(3, '1', '1', '2021-08-07 12:33:24', '', '0384151501', 'tiendat', 'abc', 2),
(4, '1', '1', '2021-08-07 12:54:38', '', '0384151501', 'tiendat', 'abc', 0),
(5, '1', '1', '2021-08-07 12:57:47', '', '0384151501', 'tiendat', 'abc', 0),
(6, '1', '1', '2021-08-07 12:58:42', '', '0384151501', 'tiendat', 'abc', 0),
(7, '1', '1', '2021-08-07 13:02:22', '', '0384151501', 'tiendat', 'abc', 0),
(8, '1', '1', '2021-08-07 13:05:44', '', '0384151501', 'tiendat', 'abc', 0),
(9, '1', '1', '2021-08-07 13:06:59', '', '0384151501', 'tiendat', 'abc', 0),
(10, '1', '1', '2021-08-07 13:08:50', '', '0384151501', 'tiendat', 'abc', 0),
(11, '1', '1', '2021-08-07 13:09:14', '', '0384151501', 'tiendat', 'abc', 0),
(12, '1', '1', '2021-08-07 13:10:37', '', '0384151501', 'tiendat', 'abc', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gopy`
--

DROP TABLE IF EXISTS `gopy`;
CREATE TABLE IF NOT EXISTS `gopy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `MA_KH` int(10) NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `MA_KH` (`MA_KH`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gopy`
--

INSERT INTO `gopy` (`id`, `MA_KH`, `noidung`, `trangthai`) VALUES
(1, 1, 'ok', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa`
--

DROP TABLE IF EXISTS `hoa`;
CREATE TABLE IF NOT EXISTS `hoa` (
  `MA_HOA` char(9) NOT NULL,
  `MA_CD` char(9) NOT NULL,
  `MA_LOAIHOA` char(9) NOT NULL,
  `MA_NCC` char(9) NOT NULL,
  `TEN_HOA` varchar(255) DEFAULT NULL,
  `MAUSAC` varchar(255) DEFAULT NULL,
  `GIABAN` float(10,0) DEFAULT NULL,
  `YNGHIA` varchar(255) DEFAULT NULL,
  `CHITIET` text,
  `URL_IMG` varchar(255) DEFAULT NULL,
  `DISABLE` tinyint(1) NOT NULL,
  PRIMARY KEY (`MA_HOA`),
  KEY `FK_HOA_CDE` (`MA_CD`),
  KEY `FK_HOA_CHUDE` (`MA_LOAIHOA`),
  KEY `FK_HOA_NCC` (`MA_NCC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoa`
--

INSERT INTO `hoa` (`MA_HOA`, `MA_CD`, `MA_LOAIHOA`, `MA_NCC`, `TEN_HOA`, `MAUSAC`, `GIABAN`, `YNGHIA`, `CHITIET`, `URL_IMG`, `DISABLE`) VALUES
('1', '1', '1', '1', 'Hồng đỏ', 'Đỏ', 500000, 'Tình yêu mãi nồng cháy', '<div id=\"AmbientITVC\"></div><p>Phụ nữ thú vị sẽ luôn là món ăn ngon. Dù đơn giản nhưng vẫn sẽ ngon và đặc biệt theo cách riêng. Và mọi đàn ông đều thèm khát say đắm <a href=\"https://guu.vn/tag/phu-nu\" target=\"_blank\">phụ nữ</a> thú vị. Đàn ông lấy một người vợ đơn thuần, giản dị rồi sau đó than vãn vì hôn nhân tẻ nhạt lại ngoại tình với một cô khác đầy màu sắc. Đàn ông như thế, quá tham lam rồi!</p>', 'images/1.jpg', 0),
('1036', '1', '1', '1', 'Bó hoa hồng cưới\r\n\r\n\r\n', '', 700000, '', '', 'images/36.jpg', 0),
('1037', '1', '1', '1', 'Hoa hồng trắng\r\n\r\n\r\n\r\n', '', 150000, '', 'Trong ngày cưới bó hoa cưới cầm tay cho cô dâu là một trong những món phụ kiện không thể thiếu. Hoa cưới giúp tôn lên vẻ đẹp rạng ngời của cô dâu và làm nổi bật chiếc váy cưới màu trắng tinh khôi. Vậy nên việc lựa chọn cho mình một bó hoa cưới đẹp cũng quan trọng không kém váy cưới.\r\n', 'images/37.jpg', 0),
('1038', '1', '1', '1', 'Hoa cầm tay cô dâu – bóng dáng\r\n\r\n\r\n\r\n\r\n', '', 480000, '', '', 'images/38.jpg', 0),
('1039', '1', '1', '1', 'Hoa cưới – hạnh phúc xanh\r\n', '', 250000, '', '', 'images/40.jpg', 0),
('1040', '1', '1', '1', 'Hoa cưới – ngày em đến\r\n\r\n\r\n\r\n\r\n\r\n', '', 440000, '', '', 'images/39.jpg', 0),
('2', '1', '1', '1', 'Hồng vàng', 'Vàng', 500000, 'Tình yêu cuộc nhiệt', '<div id=\"AmbientITVC\"></div><p>Phụ nữ thú vị sẽ luôn là món ăn ngon. Dù đơn giản nhưng vẫn sẽ ngon và đặc biệt theo cách riêng. Và mọi đàn ông đều thèm khát say đắm <a href=\"https://guu.vn/tag/phu-nu\" target=\"_blank\">phụ nữ</a> thú vị. Đàn ông lấy một người vợ đơn thuần, giản dị rồi sau đó than vãn vì hôn nhân tẻ nhạt lại ngoại tình với một cô khác đầy màu sắc. Đàn ông như thế, quá tham lam rồi!</p>', 'images/2.jpg', 0),
('2031', '2', '1', '1', 'Những mặt trời bé con\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '', 700000, '', 'Nếu được hỏi loài hoa nào là món quà của ánh mặt trời, câu trả lời sẽ là những đóa hướng dương. Bởi thế, hoa mang đến cho người nhận niềm vui, nụ cười và một ngày tỏa nắng. Trong các buổi tiệc sinh nhật hay chúc mừng, mọi người thường tặng nhau hoa hướng dương vừa để thể hiện cảm chân thành vừa là là thông điệp cầu chúc người nhận được luôn rực rỡ, tỏa sáng như mặt trời.\r\n', 'images/31.jpg', 0),
('2032', '2', '1', '1', 'Như ý cát tường\r\n', '', 350000, '', 'Bó hoa bao gồm:\r\n\r\n- Các loại hoa cát tường nhiều màu\r\n- Lan chi - 1 bó\r\n- Giấy báo sọc\r\n- Nơ kem\"\r\n', 'images/32.jpg', 0),
('2033', '2', '1', '1', 'Niềm vui rực rỡ\r\n', '', 700000, '', '\"Vốn được xem là biểu tượng của tình bạn thân thiết, những đóa hồng vàng sẽ mang đến cho người nhận một ngày ngập tràn niềm vui. Đây là món quà sinh nhật hoặc cảm ơn đầy ý nghĩa.\r\n\r\n\r\nSản phẩm bao gồm: Hoa hồng vàng (10 cành), sao biển, lá chanh, lan chi, giấy gói, phụ liệu\"\r\n', 'images/33.jpg', 0),
('2034', '2', '1', '1', 'Mãi mãi xinh tươi\r\n', '', 450000, '', 'Với những ai yêu thích phong cách mạnh mẽ, cá tính, các tông màu rực rỡ của những đóa sống đời chính là sự chọn lựa lý tưởng. Loài hoa nhỏ nhắn nhưng màu sắc rực rỡ này mang một sức sống bền bỉ, mãnh liệt tượng trưng cho sự sinh sôi, nảy nở, sức khỏe và tình thân. Bạn có thể tặng hoa trong nhiều dịp như sinh nhật, Ngày của Mẹ, ngày của Cha hay để trang trí nhà cửa.\r\n', 'images/34.jpg', 0),
('3019', '3', '1', '1', 'Về Cỏi an nhiên\r\n', '', 800000, '', '<div id=\"AmbientITVC\"></div><p>\"Hoa Tuoi giới thiệu sản phẩm “Về cõi an nhiên”.\r\n\r\nLẵng hoa bao gồm:\r\n\r\nHồng tím - 10 cành\r\nCalimero tím - 20 cành\r\nCát tường trắng viền tím - 10 cành\r\nSao tím - 2 bó\r\nDương sĩ - 10 cành\r\nLá chanh - 5 cành\r\nHộp gỗ\"\r\n</p>', 'images/19.jpg', 0),
('3020', '3', '1', '1', 'Kỉ niệm trong tim\r\n\r\n', '', 800000, '', '\"Hoa Tuoigiới thiệu sản phẩm “Kỷ niệm trong tim”.\r\n\r\nBình hoa bao gồm:\r\n\r\nLily trắng - 3 cành\r\nPing pong tím - 10 cành\r\nCát tường trắng viền tím - 10 cành\r\nĐồng tiền trắng - 20 cành\r\nDương sĩ - 20 cành\r\nBình Clayton tím lớn\"\r\n', 'images/20.jpg', 0),
('3021', '3', '1', '1', 'Chân Trời bình yên\r\n\r\n', '', 1000000, '', '<div id=\"AmbientITVC\"></div><p>\"\"Hoa Tuoi giới thiệu sản phẩm “Chân trời bình yên”.\r\n\r\nKệ hoa bao gồm:\r\n\r\nLá trầu bà - 1 bó\r\nLá dong - 1 bó\r\nĐồng tiền trắng - 60 cành\r\nLan thái trắng - 4 bó\r\nGiấy vân long trắng\r\nKệ gỗ\"\r\n\r\n</p>', 'images/21.jpg', 0),
('4024', '4', '1', '1', 'Lời tỏ tình\r\n\r\n\r\n', '', 250000, '', 'Hoa Tuoi - Nếu bạn vẫn còn băn khoăn chưa biết thổ lộ tình cảm của mình như thế nào với “ai đó”, thì hãy để bó hoa LỜI TỎ TÌNH này giúp bạn nhé. Màu đỏ quyến rũ của những đóa hồng kiêu sa tựa như tình yêu nồng cháy mang đến cho người nhận cảm giác ấm áp, che chở, khiến trái tim họ tan chảy và ngập tràn hạnh phúc ngay mà xem.\r\n', 'images/24.jpg', 0),
('4025', '4', '1', '1', 'Ngàn Lời Yêu thương\r\n\r\n\r\n\r\n', '', 180000, '', 'Một lời tỏ tình lộng lẫy được kết hợp từ hàng trăm đóa hồngxinh đẹp, rực rỡ bùng cháy như tình cảm nồng nàn, đầy nhiệt huyết thay cho NGÀN LỜI YÊU THƯƠNG của con tim yêu sôi nổi.\r\n', 'images/25.jpg', 0),
('4026', '4', '1', '1', 'Yêu thật sự\r\n\r\n\r\n\r\n\r\n', '', 700000, '', '\"Những đóa hồng Red Naomi đỏ thắm luôn là ngôn ngữ muôn thuở của tình yêu. Nổi bật trên nền xanh mát của lá và sao biển xinh xắn, 20 đóa hồng này sẽ giúp bạn thổ lộ tình cảm của mình đến người đó rằng bạn yêu họ biết chừng nào.\r\n\r\n\r\nSản phẩm bao gồm: Hoa hồng Red Naomi (20 cành), lá chanh, sao biển, đế nhựa, giấy gói, nơ\"\r\n', 'images/26.png', 0),
('4027', '4', '1', '1', 'Ánh sáng trong tim\r\n\r\n\r\n\r\n\r\n\r\n', '', 570000, '', 'Quây quần trong chiếc giỏ mây đan tay mộc mạc, những đóa hoa thu hải đường đỏ nồng nàn như ÁNH SÁNG TRONG TIM sưởi ấm và mang niềm vui đến mọi người.\r\n', 'images/27.png', 0),
('4028', '4', '1', '1', 'LOVE YOU FOREVER\r\n\r\n\r\n\r\n\r\n\r\n', '', 780000, '', 'Không một ngôn ngữ nào có thể diễn tả trọn vẹn ngôn ngữ của trái tim bằng những bông hồng đỏ. LOVE YOU FOREVER với những đóa Red Naomi đỏ thắm, quyến rũ và đầy mê hoặc kết hợp cùng màu tím nồng nàn tạo nên một bó hoa ấn tượng .\r\n', 'images/28.jpg', 0),
('4029', '4', '1', '1', 'Tình Yêu Màu Xanh\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '', 5500000, '', 'Sở hữu vẻ đẹp dịu dàng, thanh tao nhưng không thiếu đi sự sang trọng, tinh tế, TÌNH YÊU MÀU XANH là sự kết hợp khéo léo theo tông màu xanh - vàng chủ đạo từ những loại hoa như hồng vàng, calimero, Green Wicky và cát tường. Giỏ hoa như khu vườn yêu xanh ngát cất lên những nốt nhạc tình trầm bổng, du dương. Thử tưởng tượng người bạn yêu quý nhận được một giỏ hoa xanh ngát như thế này, chắc chắn họ sẽ cảm nhận được tấm chân tình mà bạn trao gửi.\r\n', 'images/29.jpg', 0),
('5042', '5', '2', '1', 'Bó hoa sao vàng khô 350g\r\n\r\n\r\n\r\n', '', 350000, '', 'Hoa sao khô gồm hai loại chủ yếu là sao tím(hồng nhạt) và sao vàng, đây là một loại hoa thân nhỏ, dáng mỏng manh, thường mọc thành những bụi cây lớn. Hoa sao khô được rất nhiều người ưa thích bởi vẻ đẹp nhẹ nhàng, tinh khôi, tạo cảm giác thư thái cho người ngắm\r\n', 'images/42.jpg', 0),
('5044', '5', '2', '1', 'Bó Hoa Khô 200 cành Oải Hương \r\n', '', 179000, '', '', 'images/44.jpg', 0),
('5045', '5', '2', '1', 'Hoa khô Hơi Thở của Em Bé\r\n\r\n', '', 460000, '', '', 'images/45.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihoa`
--

DROP TABLE IF EXISTS `loaihoa`;
CREATE TABLE IF NOT EXISTS `loaihoa` (
  `MA_LOAIHOA` char(9) NOT NULL,
  `TEN_LOAIHOA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MA_LOAIHOA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaihoa`
--

INSERT INTO `loaihoa` (`MA_LOAIHOA`, `TEN_LOAIHOA`) VALUES
('1', 'Hoa Tươi'),
('2', 'Hoa Khô');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `MA_NCC` char(9) NOT NULL,
  `TEN_NCC` varchar(255) DEFAULT NULL,
  `Diachi_NCC` varchar(255) NOT NULL,
  PRIMARY KEY (`MA_NCC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MA_NCC`, `TEN_NCC`, `Diachi_NCC`) VALUES
('1', 'Lan Anh', 'Tân Quy Đông - TP Sadec'),
('2', 'Graden Flower', '332/3 Phường 4- TP Đà Lạt'),
('3', 'Hùng Thy', 'Tân Quy Đông- TP SaDec');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `MA_NV` char(9) NOT NULL,
  `MA_CV` char(9) NOT NULL,
  `TEN_NV` varchar(255) DEFAULT NULL,
  `SDT_NV` varchar(11) DEFAULT NULL,
  `DIACHI_NV` varchar(255) DEFAULT NULL,
  `GIOITINH_NV` tinyint(1) DEFAULT NULL,
  `DISABLE` tinyint(1) NOT NULL,
  PRIMARY KEY (`MA_NV`),
  KEY `FK_NHANVIEN_CHUCVU` (`MA_CV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MA_NV`, `MA_CV`, `TEN_NV`, `SDT_NV`, `DIACHI_NV`, `GIOITINH_NV`, `DISABLE`) VALUES
('1', '1', 'Ngọc Phượng', '0123654789', 'Vĩnh Long', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `MA_KH` int(10) NOT NULL AUTO_INCREMENT,
  `TEN_KH` char(10) DEFAULT NULL,
  `USERNAME` char(25) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `DIACHI_KH` varchar(255) DEFAULT NULL,
  `SDT_KH` char(11) DEFAULT NULL,
  `LOAI_TK` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`MA_KH`),
  UNIQUE KEY `USERNAME` (`USERNAME`),
  KEY `LOAI_TK` (`LOAI_TK`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MA_KH`, `TEN_KH`, `USERNAME`, `PASSWORD`, `DIACHI_KH`, `SDT_KH`, `LOAI_TK`) VALUES
(1, 'tiendat', 'tiendat', '202cb962ac59075b964b07152d234b70', 'abc', '0384151501', NULL),
(3, 'tiendat', 'tiendat1', '202cb962ac59075b964b07152d234b70', 'abc', '0384151501', NULL),
(4, 'tiendat', 'tiendat3', '202cb962ac59075b964b07152d234b70', 'abc', '0384151501', NULL),
(8, 'tiendat', 'tiendat99', '202cb962ac59075b964b07152d234b70', 'abc', '0384151501', NULL),
(9, 'tiendat', 'tiendat213123', '202cb962ac59075b964b07152d234b70', 'abc', '0384151501', NULL),
(11, 'tiendat', 'tiendat213123i9', '202cb962ac59075b964b07152d234b70', 'abc', '0384151501', NULL),
(12, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '09999999999', '1');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_HOA_CHITIETDONHANG` FOREIGN KEY (`MA_HOA`) REFERENCES `hoa` (`MA_HOA`),
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MA_DH`) REFERENCES `donhang` (`MA_DH`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_NHANVIEN_DONHANG` FOREIGN KEY (`MA_NV`) REFERENCES `nhanvien` (`MA_NV`);

--
-- Các ràng buộc cho bảng `hoa`
--
ALTER TABLE `hoa`
  ADD CONSTRAINT `FK_HOA_CDE` FOREIGN KEY (`MA_CD`) REFERENCES `chude` (`MA_CD`),
  ADD CONSTRAINT `FK_HOA_CHUDE` FOREIGN KEY (`MA_LOAIHOA`) REFERENCES `loaihoa` (`MA_LOAIHOA`),
  ADD CONSTRAINT `FK_HOA_NCC` FOREIGN KEY (`MA_NCC`) REFERENCES `nhacungcap` (`MA_NCC`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NHANVIEN_CHUCVU` FOREIGN KEY (`MA_CV`) REFERENCES `chucvu` (`MA_CV`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`LOAI_TK`) REFERENCES `chucvu` (`MA_CV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
