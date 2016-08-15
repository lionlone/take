-- phpMyAdmin SQL Dump
-- version 4.0.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2016 at 12:08 AM
-- Server version: 5.5.51
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_takenet`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `bank_number` varchar(16) NOT NULL,
  `bank_name` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bank_number` (`bank_number`,`bank_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `bank_number`, `bank_name`) VALUES
(1, 'LE HUY HOANG', '0451000320976', 'VCB'),
(2, 'DANG PHUONG THUY', '0451000320975', 'VCB'),
(3, 'CHU THI NGOC LINH', '0451000320763', 'VCB'),
(4, 'PHAM MINH HUY', '0931004175654', 'VCB'),
(5, 'NGUYEN MANH THANG', '0011004051515', 'VCB'),
(6, 'NGUYEN SY BA', '0011004051516', 'VCB'),
(7, 'NGUYEN QUOC HUY', '0931004175655', 'VCB'),
(8, 'PHAM MINH TIEN', '0931004175656', 'VCB'),
(9, 'VU NGOC ANH', '0451000320977', 'VCB'),
(10, 'NGUYEN THI YEN', '0011004051514', 'VCB'),
(11, 'VO DINH HUNG', '0011004051513', 'VCB'),
(12, 'PHAM NGOC LUONG', '0011004051512', 'VCB'),
(13, 'VI VAN CHUNG', '0011001694745', 'VCB'),
(14, 'TANG ANH THANG', '0011004051519', 'VCB'),
(15, 'NGUYEN QUANG DUC', '0011004051518', 'VCB'),
(16, 'NGUYEN THI BINH', '0451000320952', 'VCB'),
(17, 'PHAM VAN HAU', '0011004051511', 'VCB'),
(18, 'NGUYEN MANH THANG', '0491000091069', 'VCB'),
(19, 'NGUYEN XUAN QUYEN', '0591000318839', 'VCB'),
(20, 'TRAN HONG HAI', '0011004051517', 'VCB'),
(21, 'DUONG QUANG VIET', '0451000320974', 'VCB'),
(22, 'LE THI THUY TRANG', '0591000286383', 'VCB'),
(23, 'NGUYEN MINH HOAN', '0691000334673', 'VCB'),
(24, 'NGUYEN XUAN QUYEN', '0541000266639', 'VCB'),
(25, 'NGUYEN VAN TUAN', '0591000309602', 'VCB'),
(26, 'NGUYEN MINH HOAN', '0691000360697', 'VCB'),
(27, 'NGUYEN VAN TUAN', '0591000320023', 'VCB'),
(28, 'NGUYEN MINH HOAN', '0691000360850', 'VCB'),
(29, 'NGUYEN VAN TUAN', '0591000320026', 'VCB'),
(30, 'NGUYEN MINH HOAN', '0711000252791', 'VCB'),
(31, 'NGUYEN VAN TUAN', '0591000320830', 'VCB'),
(32, 'LE XUAN HIEP', '0591001681163', 'VCB'),
(33, 'LE THI YEN', '0711000242755', 'VCB'),
(34, 'NGO THI THUAN', '0541000241397', 'VCB'),
(35, 'TU MINH NGOC', '0011000454450', 'VCB'),
(36, 'DANG THI KHAO TRANG', '0021000279650', 'VCB'),
(37, 'LE CAO KHANH', '0451000302231', 'VCB'),
(38, 'PHUNG THI LOAN', '0011004298834', 'VCB'),
(39, 'CAO THI HUONG', '0021001057683', 'VCB'),
(40, 'NGUYEN THI NGOC HIEN', '0061001081418', 'VCB'),
(41, 'NGUYEN THI NGOC HAO', '0271001004183', 'VCB'),
(42, 'NGUYEN NHU DUNG', '0541000267201', 'VCB'),
(43, 'NGUYEN NHU DUNG', '0541000267202', 'VCB'),
(44, 'TRAN VAN DUNG', '0011004270245', 'VCB'),
(45, 'NGUYEN KIM SANG', '0451000259338', 'VCB'),
(46, 'LE THI HUYEN', '0591000299387', 'VCB'),
(47, 'LUU THI SINH(HIEN)', '0591000299378', 'VCB'),
(48, 'LE THI THO', '0591000320921', 'VCB'),
(49, 'NGUYEN THU TRANG', '0691000314265', 'VCB'),
(50, 'PHAN VIET ANH', '0341006831134', 'VCB'),
(51, 'PHAM THI CHEN', '0341006873526', 'VCB'),
(52, 'LE THI HUONG', '0341006978951', 'VCB'),
(53, 'LE THI HOA LAN', '0011004108410', 'VCB'),
(54, 'DINH THI HOA', '0341006961781', 'VCB'),
(55, 'HOANG KIM CUONG', '0541000226470', 'VCB'),
(56, 'PHAM KIEU THU', '0611001932008', 'VCB'),
(57, 'CHU VAN LUYEN', '0731000582910', 'VCB'),
(58, 'NGUYEN THI THUY HA', '0361000208949', 'VCB'),
(59, 'NGUYEN ANH TUAN', '0011001349766', 'VCB'),
(60, 'PHAM THI LOAN', '0691000357877', 'VCB'),
(61, 'NGUYEN MANH THANG', '0491000091071', 'VCB'),
(62, 'NGUYEN MANH THANG', '0491000091072', 'VCB'),
(63, 'NGUYEN MANH THANG', '0491000091073', 'VCB'),
(64, 'NGUYEN MANH THANG', '0491000091074', 'VCB'),
(65, 'NGUYEN NHU DUNG', '0351000963567', 'VCB'),
(66, 'NGUYEN NHU DUNG', '0541000266638', 'VCB'),
(67, 'PHAM THI TINH CA', '0801000213455', 'VCB'),
(68, 'HA THI ANH', '0541000178359', 'VCB'),
(69, 'HOANG THI DUNG', '0541000263609', 'VCB'),
(70, 'NGUYEN THI HOA', '0711000251357', 'VCB'),
(71, 'VAN DINH HOA', '0711000251044', 'VCB'),
(72, 'TRINH THI THO', '0021000355707', 'VCB'),
(73, 'PHAN THI ANH NGUYET', '0971000005464', 'VCB'),
(74, 'PHAN THI ANH NGUYET', '0451000371266', 'VCB'),
(75, 'NGUYEN ANH HIEU', '0591000321677', 'VCB'),
(76, 'TRAN THI HANG', '0451000324582', 'VCB'),
(77, 'HOANG THI HUYEN TRANG', '0011003721009', 'VCB'),
(78, 'NGUYEN THI MAI', '0451000354928', 'VCB'),
(79, 'PHAM THI NGAT', '0341006972968', 'VCB'),
(80, 'BUI ANH TUAN', '0341006979732', 'VCB'),
(81, 'NGUYEN VAN DAN', '0451001679468', 'VCB'),
(82, 'PHAN VAN HUONG', '0101000353179', 'VCB'),
(83, 'NGUYEN THI LANG', '0451000315352', 'VCB'),
(84, 'HOANG THI GIANG', '0451000310763', 'VCB'),
(85, 'CHU KHANH TOAN', '0541000265646', 'VCB'),
(86, 'HO THI THAO', '0381000477004', 'VCB'),
(87, 'NGUYEN VAN TUAN', '0801000204527', 'VCB'),
(88, 'TRAN THI CHANH', '0591000324311', 'VCB'),
(89, 'NGUYEN THI TRANG', '0021000351386', 'VCB'),
(90, 'NGUYEN VAN DUNG', '0011004304544', 'VCB'),
(91, 'NGUYEN DOAN DONG', '0021000619109', 'VCB'),
(92, 'DANG THI THANH', '0821000105557', 'VCB'),
(93, 'PHAM THI KIEU OANH', '0451000326795', 'VCB'),
(94, 'HOANG THU HUYEN', '0711000251364', 'VCB'),
(95, 'NGUYEN THI MINH THUY', '0361000238123', 'VCB'),
(96, 'HONG KIM THU', '0011004302448', 'VCB'),
(97, 'DOAN THI THU HUONG', '0071000691864', 'VCB'),
(98, 'NGUYEN KHAC HUNG', '0611001944858', 'VCB'),
(99, 'TRAN QUOC MINH', '0451000377769', 'VCB'),
(100, 'BUI THI NGOC', '0011004285504', 'VCB'),
(101, 'LE THI THUY TRANG', '0541000265685', 'VCB'),
(102, 'LE THI THUY TRANG', '0011004303435', 'VCB'),
(103, 'NGUYEN TRUNG KIEN', '0541000265280', 'VCB'),
(104, 'NGUYEN TRUNG KIEN', '0541000265288', 'VCB'),
(105, 'NGUYEN THI HOANG HUYEN', '0541000269324', 'VCB'),
(106, 'NGUYEN THI HOANG HUYEN', '0541000269325', 'VCB'),
(107, 'NGUYEN THI HOANG HUYEN', '0541000269326', 'VCB'),
(108, 'LE THI HOA LAN', '0491000091065', 'VCB'),
(109, 'LE THI HOA LAN', '0491000091066', 'VCB'),
(110, 'LE THI HOA LAN', '0491000091067', 'VCB'),
(111, 'LE THI HOA LAN', '0491000091068', 'VCB'),
(112, 'LE THI HOA LAN', '0491000091070', 'VCB'),
(113, 'VO THANH HOE', '0641002348888', 'VCB'),
(114, 'NGUYEN NHU DUNG', '0591000320138', 'VCB'),
(115, 'NGUYEN NHU DUNG', '0731000697118', 'VCB'),
(116, 'NGUYEN THI HANG NGA', '0351000964233', 'VCB'),
(117, 'NGUYEN THI HANG NGA', '0591000321690', 'VCB'),
(118, 'NGUYEN THI PHUONG', '0541000194682', 'VCB'),
(119, 'NGUYEN THI PHUONG', '0541000266718', 'VCB'),
(120, 'HOANG DUC THAM', '0591000302452', 'VCB'),
(121, 'LE THI THO', '0591000321448', 'VCB'),
(122, 'LE THI THO', '0591000321452', 'VCB'),
(123, 'PHAM THI MAO LOAN', '0951004180378', 'VCB'),
(124, 'NGUYEN THI LAM', '0591000321823', 'VCB'),
(125, 'NGUYEN THI MAI', '0541000266228', 'VCB');

-- --------------------------------------------------------

--
-- Table structure for table `history_pin`
--

CREATE TABLE IF NOT EXISTS `history_pin` (
  `exchange` int(11) NOT NULL AUTO_INCREMENT,
  `fromuser` int(11) NOT NULL,
  `touser` int(11) NOT NULL,
  `fromwalletid` int(11) NOT NULL,
  `towalletid` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`exchange`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `history_pin`
--

INSERT INTO `history_pin` (`exchange`, `fromuser`, `touser`, `fromwalletid`, `towalletid`, `pin`, `date`) VALUES
(23, 20, 91, 0, 0, 100, 1470160082),
(22, 20, 26, 0, 0, 500, 1469975893),
(24, 20, 27, 0, 0, 450, 1470305239),
(25, 26, 87, 0, 0, 4, 1470331791),
(26, 26, 87, 0, 0, 4, 1470331797),
(27, 20, 85, 0, 0, 300, 1470363696),
(28, 20, 110, 0, 0, 100, 1470364036),
(29, 20, 90, 0, 0, 100, 1470364336),
(30, 87, 109, 0, 0, 4, 1470366139),
(31, 27, 70, 0, 0, 12, 1470374087),
(32, 27, 70, 0, 0, 12, 1470374131),
(33, 70, 71, 0, 0, 3, 1470376179),
(34, 70, 114, 0, 0, 6, 1470376454),
(35, 70, 114, 0, 0, 6, 1470376470),
(36, 20, 56, 0, 0, 100, 1470392383),
(37, 20, 67, 0, 0, 50, 1470394468),
(38, 20, 87, 0, 0, 50, 1470407124),
(39, 26, 93, 0, 0, 1, 1470497870),
(40, 26, 93, 0, 0, 1, 1470497905),
(41, 26, 93, 0, 0, 1, 1470502280),
(42, 26, 93, 0, 0, 1, 1470502288),
(43, 27, 57, 0, 0, 6, 1470537283),
(44, 27, 108, 0, 0, 6, 1470537327),
(45, 27, 118, 0, 0, 6, 1470544403),
(46, 26, 93, 0, 0, 1, 1470557721),
(47, 20, 102, 0, 0, 10, 1470634593),
(48, 20, 102, 0, 0, 90, 1470634616),
(49, 27, 58, 0, 0, 55, 1470640807),
(50, 58, 59, 0, 0, 6, 1470645129),
(51, 58, 80, 0, 0, 6, 1470645253),
(52, 58, 62, 0, 0, 6, 1470645362),
(53, 58, 64, 0, 0, 6, 1470645422),
(54, 58, 66, 0, 0, 6, 1470646150),
(55, 20, 69, 0, 0, 50, 1470649454),
(56, 27, 75, 0, 0, 16, 1471170776),
(57, 75, 76, 0, 0, 2, 1471170988),
(58, 58, 152, 0, 0, 6, 1471187281),
(59, 58, 153, 0, 0, 6, 1471187342),
(60, 58, 155, 0, 0, 6, 1471187412),
(61, 110, 151, 0, 0, 2, 1471222968),
(62, 110, 150, 0, 0, 2, 1471223003),
(63, 110, 156, 0, 0, 2, 1471223464),
(64, 102, 119, 0, 0, 3, 1471228319),
(65, 102, 123, 0, 0, 3, 1471228353),
(66, 102, 103, 0, 0, 3, 1471228388),
(67, 119, 128, 0, 0, 1, 1471236333);

-- --------------------------------------------------------

--
-- Table structure for table `joinph`
--

CREATE TABLE IF NOT EXISTS `joinph` (
  `joinphid` int(11) NOT NULL AUTO_INCREMENT,
  `phid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `room` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`joinphid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `joinph`
--

INSERT INTO `joinph` (`joinphid`, `phid`, `status`, `starttime`, `endtime`, `profit`, `room`, `time`) VALUES
(1, 106, 1, 1470487566, 1470573966, 1500000, 'A', 1),
(2, 106, 1, 1470487566, 1470573966, 1500000, 'A', 1),
(3, 107, 1, 1470505801, 1470592201, 1500000, 'A', 1),
(4, 107, 1, 1470505801, 1470592201, 1500000, 'A', 1),
(5, 108, 1, 1470505982, 1470592382, 1500000, 'A', 1),
(6, 108, 1, 1470505982, 1470592382, 1500000, 'A', 1),
(7, 109, 1, 1470506042, 1470592442, 1500000, 'A', 1),
(8, 109, 1, 1470506042, 1470592442, 1500000, 'A', 1),
(9, 110, 1, 1470506102, 1470592502, 1500000, 'B', 1),
(10, 110, 1, 1470506102, 1470592502, 1500000, 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `type` varchar(7) NOT NULL DEFAULT 'success',
  `date` int(11) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `userid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `content`, `type`, `date`, `status`, `userid`) VALUES
(1, 'Thông báo vận hành giai đoạn 1', '<p>Ban quản trị tr&acirc;n trọng th&ocirc;ng b&aacute;o tới to&agrave;n bộ c&aacute;c th&agrave;nh vi&ecirc;n.</p>\n\n<p>Để c&oacute; bước tiến đầu ti&ecirc;n thuận lợi cũng như đảm bảo chiến lược đi l&acirc;u d&agrave;i , giai đoạn 1 chỉ được đặt 1&nbsp;lệnh PH ( k&iacute;ch&nbsp;PIN ) trong mỗi m&atilde; A v&agrave; B. Khi n&agrave;o đ&atilde; PH th&agrave;nh c&ocirc;ng lệnh ở m&atilde; A th&igrave; mới được k&iacute;ch th&ecirc;m 1 lệnh gối ở M&atilde; B. Giai đoạn tr&ecirc;n nhằm&nbsp;ổn định lượng GH về kịp thời , cũng như &nbsp;gi&uacute;p th&agrave;nh vi&ecirc;n dần quen với c&aacute;ch vận h&agrave;nh của Takemove. Sang giai đoạn 2 sẽ cho ph&eacute;p đặt lệnh ( k&iacute;ch PIN ) nhiều hơn, khi đ&oacute; sẽ c&oacute; th&ocirc;ng b&aacute;o tới to&agrave;n thể th&agrave;nh vi&ecirc;n. Sự hợp t&aacute;c của c&aacute;c th&agrave;nh vi&ecirc;n sẽ gi&uacute;p mang lại t&iacute;nh ổn định v&agrave; ph&aacute;t triển của ch&iacute;nh cộng đồng.</p>\n\n<p>Tr&acirc;n trọng !</p>\n', 'warning', 1470374493, 0, 1),
(2, 'Bảo trì định kỳ', '<p>BQT&nbsp;th&ocirc;ng b&aacute;o:</p>\n\n<p>Để tăng t&iacute;nh ổn định của hệ thống v&agrave; đảm bảo an to&agrave;n&nbsp;th&ocirc;ng tin, số liệu, định kỳ h&agrave;ng ng&agrave;y sẽ bảo tr&igrave; v&agrave; n&acirc;ng cấp từ 12:00 AM đến 01:00 AM. Trong khung giờ tr&ecirc;n Website sẽ ngừng hoạt động, Th&agrave;nh vi&ecirc;n sắp xếp&nbsp;thực hiện c&aacute;c&nbsp;giao dịch trước đ&oacute; để tr&aacute;nh bị t&igrave;nh trạng qu&aacute; thời gian.</p>\n\n<p>Tr&acirc;n trọng !</p>\n', 'success', 1470374750, 0, 1),
(3, 'Hướng dẫn chính sách và cách sử dụng website', '<p>Sau khi nhận được sự đ&oacute;ng g&oacute;p &yacute; kiến cũng như c&ocirc;ng sức của c&aacute;c th&agrave;nh vi&ecirc;n t&iacute;ch cực, hiện đ&atilde; ho&agrave;n th&agrave;nh c&aacute;c slide về ch&iacute;nh s&aacute;ch v&agrave; hướng dẫn sử dụng vận h&agrave;nh website cho tất cả c&aacute;c th&agrave;nh vi&ecirc;n của cộng đồng Takemove. Th&agrave;nh vi&ecirc;n tham gia c&oacute; thể đọc v&agrave; tải về trong phần hướng dẫn v&agrave; ch&iacute;nh s&aacute;ch. Trong thời gian tới BQT sẽ tiếp tục mở ra nhiều t&iacute;nh năng gi&uacute;p hỗ trợ th&agrave;nh vi&ecirc;n hiệu quả v&agrave; nhanh ch&oacute;ng.</p>\n\n<p>Tr&acirc;n trọng !</p>\n', 'info', 1470484788, 0, 1),
(4, 'Bắt đầu kích pin vận hành giai đoạn 1', '<p>Sau 1 thời gian chuẩn bị BQT th&ocirc;ng b&aacute;o thời gian v&agrave; quy c&aacute;ch vận h&agrave;nh giai đoạn 1 l&agrave; v&agrave;o đầu tuần tới, giai đoạn đầu chỉ c&oacute; nh&oacute;m đầu ti&ecirc;n vận h&agrave;nh để đảm bảo chất lượng, t&iacute;nh ổn định. Khi vận h&agrave;nh nh&oacute;m đầu cổng đăng k&yacute; cho th&agrave;nh vi&ecirc;n mới sẽ tạm thời đ&oacute;ng lại. Khi vận h&agrave;nh ổn định v&ograve;ng đầu BQT sẽ mở ra để cộng đồng tham gia mới v&agrave; ph&aacute;t triển.</p>\n\n<p>Mong nhận được sự hưởng ứng v&agrave; hợp t&aacute;c của tất cả c&aacute;c th&agrave;nh vi&ecirc;n.</p>\n\n<p>Tr&acirc;n trọng !</p>\n', 'danger', 1471140226, 0, 1),
(5, 'Thông báo cập nhật và kích pin', '<p>Như đ&atilde; th&ocirc;ng b&aacute;o về thời gian bắt đầu vận h&agrave;nh giai đoạn 1.</p>\n\n<p>21h:00 website sẽ tạm thời đ&oacute;ng lại để chốt danh s&aacute;ch nh&oacute;m đầu v&agrave; cập nhật dữ liệu cũng như cho ph&eacute;p k&iacute;ch pin. Sau khi cập nhật mỗi ID chỉ được k&iacute;ch 1 pin cho mỗi lệnh. BQT sẽ cố gắng ho&agrave;n th&agrave;nh nhanh nhất c&oacute; thể để đảm bảo tiến độ.</p>\n\n<p>Tr&acirc;n trọng !</p>\n', 'success', 1471264500, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ph`
--

CREATE TABLE IF NOT EXISTS `ph` (
  `phid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `room` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`phid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=111 ;

--
-- Dumping data for table `ph`
--

INSERT INTO `ph` (`phid`, `userid`, `status`, `starttime`, `endtime`, `profit`, `room`, `time`) VALUES
(106, 20, 2, 1470401122, 1470487522, 1500000, 'A', 1),
(107, 26, 2, 1470419399, 1470505799, 1500000, 'A', 1),
(108, 26, 2, 1470419538, 1470505938, 1500000, 'A', 1),
(109, 26, 2, 1470419538, 1470505938, 1500000, 'A', 1),
(110, 26, 2, 1470419581, 1470505981, 1500000, 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE IF NOT EXISTS `policy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` int(11) unsigned NOT NULL,
  `userid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `title`, `content`, `date`, `userid`) VALUES
(1, 'Hướng dẫn và Chính sách', '<p>Ch&iacute;nh s&aacute;ch.</p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_175813.jpg" style="height:164px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_175819.jpg" style="height:167px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_175821(1).jpg" style="height:169px; line-height:1.6; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_175824.jpg" style="height:168px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_175826.jpg" style="height:169px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_175828.jpg" style="height:169px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_175831.jpg" style="height:169px; width:300px" /></p>\n\n<p>​</p>\n\n<hr />\n<p>Hướng dẫn sử dụng.</p>\n\n<p>&nbsp;</p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_182818.jpg" style="height:538px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_182821.jpg" style="height:538px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_182826.jpg" style="height:538px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_182829.jpg" style="height:538px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_182832.jpg" style="height:538px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_182839.jpg" style="height:538px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_182842.jpg" style="height:538px; width:300px" /></p>\n\n<p><img alt="" src="http://takemove.net/ckfinder/userfiles/images/IMG_20160806_182845.jpg" style="height:538px; width:300px" /></p>\n\n<p style="text-align:right">End</p>\n\n<p>&nbsp;</p>\n', 1470634399, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `md5password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `md5password2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1',
  `referral` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `bank` (`bank`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=157 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `name`, `md5password`, `md5password2`, `email`, `bank`, `branch`, `phone`, `level`, `referral`, `admin`) VALUES
(1, 'admin', 'admin', 'f03f8746dcfe9256a8efcbe6fca07d05', '21232f297a57a5a743894a0e4a801fc3', 'hoanglh154@gmail.com', '0', '0', '0', 1, '', b'1'),
(20, 'Rio', '', 'f03f8746dcfe9256a8efcbe6fca07d05', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', 1, '', b'0'),
(26, 'Tailoc', 'NGUYEN MANH THANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Nguyenthang691983@gmail.com', '0011004051515', 'Ha Noi', '0986357567', 1, 'Rio', b'0'),
(27, 'xuanquyen', 'NGUYEN XUAN QUYEN', '88316675d7882e3fdbe066000273842c', 'b5e83ad478b634869d5e68a4cb2310fd', 'xuanquyen2204@gmai.com', '0591000318839', 'hung yen', '84987905158', 1, 'tailoc', b'0'),
(56, 'hoan61', 'NGUYEN MINH HOAN', '5f612c6d851745a20366002669a2a1e2', '924f454a9b5e6b543bd174119ac7b5e5', 'nguyenhoan61@gmail.com', '0691000334673', 'Ha Noi', '0982612468', 1, 'Tailoc', b'0'),
(57, 'quyenxuan', 'NGUYEN XUAN QUYEN', '88316675d7882e3fdbe066000273842c', 'b5e83ad478b634869d5e68a4cb2310fd', 'xuanquyen2204@gmail.com', '0541000266639', 'Ha noi', '84987905158', 1, 'xuanquyen', b'0'),
(58, 'tuanlan', 'NGUYEN VAN TUAN', '68b7859ce054584fbf40c9f923422d5b', '62853b9ed0888e4226872f614026446f', 'tuanlan5960@gmail.com', '0591000309602', 'Hung yen', '01684884618', 1, 'Xuanquyen', b'0'),
(59, 'tuanlan1', 'NGUYEN VAN TUAN', '68b7859ce054584fbf40c9f923422d5b', '62853b9ed0888e4226872f614026446f', 'tuanlan5960@gmail.com', '0591000320023', 'Hung yen', '01684884618', 1, 'tuanlan', b'0'),
(60, 'mrnguyen', 'NGUYEN MINH HOAN', '5f612c6d851745a20366002669a2a1e2', '924f454a9b5e6b543bd174119ac7b5e5', 'nguyenhoan61@gmail.com', '0691000360697', 'Hà Nội', '0982612468', 1, 'hoan61', b'0'),
(61, 'Hanoi', 'NGUYEN MINH HOAN', '5f612c6d851745a20366002669a2a1e2', '924f454a9b5e6b543bd174119ac7b5e5', 'nguyenhoan61@gmail.com', '0691000360850', 'Hà Nội', '0982612468', 1, 'hoan61', b'0'),
(62, 'tuanlan2', 'NGUYEN VAN TUAN', '68b7859ce054584fbf40c9f923422d5b', '62853b9ed0888e4226872f614026446f', 'tuanlan5960@gmail.com', '0591000320026', 'Hung yen', '01684884618', 1, 'tuanlan', b'0'),
(63, 'tommy', 'NGUYEN MINH HOAN', '5f612c6d851745a20366002669a2a1e2', '924f454a9b5e6b543bd174119ac7b5e5', 'nguyenhoan61@gmail.com', '0711000252791', 'hà nội', '0982612468', 1, 'hoan61', b'0'),
(64, 'tuanlan3', 'NGUYEN VAN TUAN', '68b7859ce054584fbf40c9f923422d5b', '62853b9ed0888e4226872f614026446f', 'tuanlan5960@gmail.com', '0591000320830', 'Hung yen', '01684884618', 1, 'tuanlan', b'0'),
(65, 'giabao', 'LE XUAN HIEP', '6ea79b291c609a79406920b2dc4d2244', '8c0e1ca435b59d612bba68382e5fee6e', 'xuanhiepqt601@gmail.com', '0591001681163', 'Hung yen', '0971935583', 1, 'tuanlan1', b'0'),
(66, 'yenbinh', 'LE THI YEN', '6ea79b291c609a79406920b2dc4d2244', '8c0e1ca435b59d612bba68382e5fee6e', 'leyen240174@gmail.com', '0711000242755', 'Ha noi ', '01655503039', 1, 'tuanlan1', b'0'),
(67, 'Thuan68', 'NGO THI THUAN', '871e389668b0d3c5842725e8d9b26a10', '251bd0442dfcc53b5a761e050f8022b8', 'ngothithuanz8989@gmail.com', '0541000241397', 'Ha Noi', '01656170192', 1, 'Tailoc', b'0'),
(68, 'Minhngoc', 'TU MINH NGOC', '871e389668b0d3c5842725e8d9b26a10', 'c667d53acd899a97a85de0c201ba99be', 'Tuminhngoc012@gmail.com', '0011000454450', 'Ha Noi', '0904285275', 1, 'Tailoc', b'0'),
(69, 'Trang68', 'DANG THI KHAO TRANG', '871e389668b0d3c5842725e8d9b26a10', 'c667d53acd899a97a85de0c201ba99be', 'Khaotrangvn@gmail.com', '0021000279650', 'Ha Noi', '0988565865', 1, 'Tailoc', b'0'),
(70, 'caokhanh', 'LE CAO KHANH', '39ee488c7696d8f3ee3456218666a3c9', '4e72fc6ef22b583e6cd69618a4f52cc9', 'lecaokhang1109@gmai.com', '0451000302231', 'Ha noi', '01673476030', 1, 'quyenxuan', b'0'),
(71, 'loan01', 'PHUNG THI LOAN', '39ee488c7696d8f3ee3456218666a3c9', '4e72fc6ef22b583e6cd69618a4f52cc9', 'loanls755@gmail.com', '0011004298834', 'Ha noi', '0984965652', 1, 'caokhanh', b'0'),
(72, 'huongtayho', 'CAO THI HUONG', 'f090ae84f96e0cc9638c491d4d358649', 'd352079b056a133a60c1f3091437fe23', 'tayho1968@gmail.com', '0021001057683', 'Ha Noi', '0989689861', 1, 'mrnguyen', b'0'),
(73, 'ngochien168', 'NGUYEN THI NGOC HIEN', '0659c7992e268962384eb17fafe88364', '9a361ed860ec2617da5af72079594a21', '0978501189@gmail.com', '0061001081418', 'Nha trang', '0978501189', 1, 'quyenxuan', b'0'),
(74, 'ngochao', 'NGUYEN THI NGOC HAO', '0659c7992e268962384eb17fafe88364', '9a361ed860ec2617da5af72079594a21', 'ngochao83qn@gmail.com', '0271001004183', 'Nha trang', '0965257557', 1, 'ngochien168', b'0'),
(75, 'nhudung', 'NGUYEN NHU DUNG', 'b10e21c108767be4aa8930778d70b084', 'f38bba9909deb1cd922bd61fdb76193c', 'nhudung1977@yahoo.com', '0541000267201', 'ha noi', '0962385858', 1, 'xuanquyen', b'0'),
(76, 'dungnga', 'NGUYEN NHU DUNG', 'b10e21c108767be4aa8930778d70b084', 'f38bba9909deb1cd922bd61fdb76193c', 'nhudung1977@yahoo.com', '0541000267202', 'Ha noi', '0962385858', 1, 'nhudung', b'0'),
(77, 'tonytran', 'TRAN VAN DUNG', '57e8bf1b415254046a2c8bd4f4c7d704', '921d95a2fe20bf51aee50e24602a86d0', 'trandungvn1512@gmail.com', '0011004270245', 'ha noi', '0968960077', 1, 'mrnguyen', b'0'),
(78, 'hanoinguyen', 'NGUYEN KIM SANG', 'd641813d142ee815426932926e2c73cf', 'd352079b056a133a60c1f3091437fe23', 'cvihanoinguyen@gmail.com', '0451000259338', 'ha noi', '0968555070', 1, 'huongtayho', b'0'),
(79, 'xuanchi58', 'LUU THI SINH(HIEN)', '1e55dbf412cb74d5e2c21fb6452408c7', '72037a2aba713bebfccfc4d3642d6ad3', 'xuanchi1958@gmail.com', '0591000299378', 'Hung yen', '0936628274', 1, 'quyenxuan', b'0'),
(80, 'letho', 'LE THI THO', '6ea79b291c609a79406920b2dc4d2244', '8c0e1ca435b59d612bba68382e5fee6e', 'letho3058@gmail.com', '0591000320921', 'Hung yen', '0973090649', 1, 'tuanlan2', b'0'),
(81, 'tuananh', 'PHAN VIET ANH', '7d02421f38f776867472b493e79906d7', '7d02421f38f776867472b493e79906d7', 'tuananhzewang1@gmail.com', '0341006831134', 'Hai duong', '0904832855', 1, 'xuanchi58', b'0'),
(82, 'trangdola', 'NGUYEN THU TRANG', '88ed3b690284e0a3be71d65dc330d05a', 'd352079b056a133a60c1f3091437fe23', 'duongbaonam29@gmail.com', '0691000314265', 'Hà Nội', '0978073251', 1, 'mrnguyen', b'0'),
(83, 'thichen01', 'PHAM THI CHEN', '25d55ad283aa400af464c76d713c07ad', 'fe58b538fcac1cb103596fce75d502ed', 'phamthichenhd@gmail.com', '0341006873526', 'Hai duong', '01637530588', 1, 'tuananh', b'0'),
(84, 'huong02', 'LE THI HUONG', '25d55ad283aa400af464c76d713c07ad', 'fe58b538fcac1cb103596fce75d502ed', 'tuananhzewang2@gmail.com', '0341006978951', 'Hai duong', '0964956583', 1, 'tuananh', b'0'),
(85, 'Hoalan', 'LE THI HOA LAN', '4b6d536030379cc8f25e0d3289c9d45a', '251bd0442dfcc53b5a761e050f8022b8', 'Vungtroibinhyen1303@gmail.com', '0011004108410', 'Ha Noi', '0932332129', 1, 'Rio', b'0'),
(86, 'hoabinh03', 'DINH THI HOA', '25d55ad283aa400af464c76d713c07ad', 'fe58b538fcac1cb103596fce75d502ed', 'tuananhzewang3@gmail.com', '0341006961781', 'Hai duong', '01666903758', 1, 'Tuananh', b'0'),
(87, 'Cuong55', 'HOANG KIM CUONG', '871e389668b0d3c5842725e8d9b26a10', '251bd0442dfcc53b5a761e050f8022b8', 'trangdhtm@gmail.com', '0541000226470', 'Ha Noi', '0989802098', 1, 'Thuan68', b'0'),
(88, 'Kieuthu89', 'PHAM KIEU THU', '871e389668b0d3c5842725e8d9b26a10', 'c667d53acd899a97a85de0c201ba99be', 'Kieuthu.vauto@gmail.com', '0611001932008', 'Ba Dinh', '0904431989', 1, 'Thuan68', b'0'),
(89, 'Luyen1989', 'CHU VAN LUYEN', '871e389668b0d3c5842725e8d9b26a10', 'c667d53acd899a97a85de0c201ba99be', 'Chuluyen1989@gmail.com', '0731000582910', 'Bac Giang', '0985065570', 1, 'Thuan68', b'0'),
(90, 'Thuyhavp', 'NGUYEN THI THUY HA', 'bcc17cc100eed268cfd6a752efbbe93c', '934b535800b1cba8f96a5d72f72f1611', 'hatlvp@gmail.com', '0361000208949', 'Vinh Phuc', '0964815522', 1, 'Tailoc', b'0'),
(91, 'Anhtuan83', 'NGUYEN ANH TUAN', 'e14c73fd5df27ab91c660dd4caa2bc36', 'c667d53acd899a97a85de0c201ba99be', 'Thienduc2016@gmail.com', '0011001349766', 'Ha Noi', '0936147468', 1, 'Tailoc', b'0'),
(92, 'Phamloan', 'PHAM THI LOAN', 'f92100f54888059d06f6f53af8191316', 'a54d3a6792210680d59cc3497e8d26ed', 'Loanpt65@gmail.com', '0691000357877', 'Hoa Binh', '0917359757', 1, 'Tailoc', b'0'),
(93, 'Quest69', 'NGUYEN MANH THANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Nguyenthang691983@gmail.com', '0491000091069', 'Ha Noi', '0986357567', 1, 'Tailoc', b'0'),
(94, 'Quest71', 'NGUYEN MANH THANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Nguyenthang691983@gmail.com', '0491000091071', 'Ha Noi', '0986357567', 1, 'Quest69', b'0'),
(95, 'Quest72', 'NGUYEN MANH THANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Nguyenthang691983@gmail.com', '0491000091072', 'Ha Noi', '0986357567', 1, 'Quest69', b'0'),
(96, 'Quest73', 'NGUYEN MANH THANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Nguyenthang691983@gmail.com', '0491000091073', 'Ha Noi', '0986357567', 1, 'Quest69', b'0'),
(97, 'Quest74', 'NGUYEN MANH THANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Nguyenthang691983@gmail.com', '0491000091074', 'Ha Noi', '0986357567', 1, 'Quest69', b'0'),
(98, 'dungnga01', 'NGUYEN NHU DUNG', 'b10e21c108767be4aa8930778d70b084', 'f38bba9909deb1cd922bd61fdb76193c', 'nhudung1977@yahoo.com', '0351000963567', '', '0962385858', 1, 'nhudung', b'0'),
(99, 'dungnga02', 'NGUYEN NHU DUNG', 'b10e21c108767be4aa8930778d70b084', 'f38bba9909deb1cd922bd61fdb76193c', 'nhudung1977@yahoo.com', '0541000266638', 'Ha Noi', '0962385858', 1, 'nhudung', b'0'),
(100, 'tinhcataybac', 'PHAM THI TINH CA', '9d0f2ec30f968fb9f34adffd0033e14c', '8b5700012be65c9da25f49408d959ca0', 'tinhcataybac1979@gmail.com', '0801000213455', 'phú thọ', '0978769123', 1, 'anhtuan83', b'0'),
(101, 'van68', 'HA THI ANH', '977ac90db3a4d88beb70c73c75d27e94', '3e0101ecf0d8427cf14f3f6dc2f0282d', 'anhvanha2686@gmail.com', '0541000178359', 'chuong duong', '0967509589', 1, 'anhtuan83', b'0'),
(102, 'Hoa68', 'NGUYEN THI HOA', '83b959282926655244495d10f565ff0f', '4ed65a5753b0d922d25689574ce72396', 'Nguyennguyenhoahn@gmail.com', '0711000251357', 'Ha Noi', '0975953991', 1, 'Tailoc', b'0'),
(103, 'vanhoa', 'VAN DINH HOA', '83b959282926655244495d10f565ff0f', '4ed65a5753b0d922d25689574ce72396', 'Vandinhhoahtc@gmail.com', '0711000251044', '', '01666674040', 1, 'Hoa68', b'0'),
(104, 'thanhtho68', 'TRINH THI THO', '8b6154cbb6acbc4bd887607895857f8a', '3e0101ecf0d8427cf14f3f6dc2f0282d', 'Trinh.thanhtho@gmail.com', '0021000355707', 'cat linh', '0962102801', 1, 'Anhtuan83', b'0'),
(105, 'Anhnguyet', 'PHAN THI ANH NGUYET', '3ea0f353ef5a9d089100ee99165b5dbf', 'd352079b056a133a60c1f3091437fe23', 'Phannguyethn01@gmai.com', '0971000005464', 'ha noi', '01639829839', 1, 'hanoi', b'0'),
(106, 'nguyetanh', 'PHAN THI ANH NGUYET', '3ea0f353ef5a9d089100ee99165b5dbf', 'd352079b056a133a60c1f3091437fe23', 'Phannguyethn01@gmai.com', '0451000371266', 'ha noi', '01639829839', 1, 'Anhnguyet', b'0'),
(107, 'Hangnga', 'TRAN THI HANG', '871e389668b0d3c5842725e8d9b26a10', 'c667d53acd899a97a85de0c201ba99be', 'Chihangnga2015@gmail.com', '0451000324582', 'Thanh Cong', '0969093458', 1, 'Tailoc', b'0'),
(108, 'bonbon', 'NGUYEN ANH HIEU', '88316675d7882e3fdbe066000273842c', 'b5e83ad478b634869d5e68a4cb2310fd', 'Tonynguyen2204@live.com', '0591000321677', 'Hung yen', '0911496677', 1, 'quyenxuan', b'0'),
(109, 'Tranghth', 'HOANG THI HUYEN TRANG', '8e1b75e199f632834593fb75026a0e22', 'adbf4244bf9bf8a10e8d7f88ef1437e4', 'Trangdhtm@gmail.com', '0011003721009 ', 'Cn Hà Nội', '0989802098', 1, 'Cuong55', b'0'),
(110, 'Maint68', 'NGUYEN THI MAI', '984cefd6d27eb0471fc401a493a4fdff', '1679091c5a880faf6fb5e6087eb1b2dc', 'maitchc2011@gmail.com', '0451000354928', 'Thành Công', '0974157192', 1, 'thuyhavp', b'0'),
(111, 'ngatdola', 'PHAM THI NGAT', '7f50abee5511a17d03e76867acf8c36c', '93279e3308bdbbeed946fc965017f67a', 'phamngat2471984@gmail.com', '0341006972968', 'vietcombank hải dương', '01667983000', 1, 'tuananh', b'0'),
(112, 'anhtuanhd', 'BUI ANH TUAN', '25d55ad283aa400af464c76d713c07ad', 'e807f1fcf82d132f9bb018ca6738a19f', 'anhtuanhdv@gmail.com', '0341006979732', 'vietcombank hải dương', '0981185158', 1, 'tuananh', b'0'),
(113, 'Vandan', 'NGUYEN VAN DAN', '871e389668b0d3c5842725e8d9b26a10', 'c667d53acd899a97a85de0c201ba99be', 'anhdan05@gmail.com', '0451001679468', 'Thanh Cong', '0976868530', 1, 'Tailoc', b'0'),
(114, 'hoanggiang', 'HOANG THI GIANG', '39ee488c7696d8f3ee3456218666a3c9', '4e72fc6ef22b583e6cd69618a4f52cc9', 'Hoanggiang112009@gmail.com', '0451000310763', 'Thanh cong ha noi', '01657647402', 1, 'caokhanh', b'0'),
(115, 'dragon', 'CHU KHANH TOAN', 'f44669c03a076e4e820da1450b327817', 'e9fd92b4e8a79b1c0b046ec770197f60', 'Lequocanh8788@gmail.com', '0541000265646', 'ha noi', '0947780645', 1, 'hanoi', b'0'),
(116, 'hothithao1977', 'HO THI THAO', '0659c7992e268962384eb17fafe88364', '9a361ed860ec2617da5af72079594a21', 'Hothithao1977@yahoo.com.vn', '0381000477004', 'Ho Chi Minh', '0909784368', 1, 'ngochien168', b'0'),
(117, 'Nguyentuan686', 'NGUYEN VAN TUAN', '7f50abee5511a17d03e76867acf8c36c', '93279e3308bdbbeed946fc965017f67a', 'Nguyentuan68hd@gmail.com', '0801000204527', 'Phú thọ', '0971132324', 1, 'Ngatdola', b'0'),
(118, 'chanhhl', 'TRAN THI CHANH', '6ea79b291c609a79406920b2dc4d2244', '8c0e1ca435b59d612bba68382e5fee6e', 'thtranchanh2904@gmai.com', '0591000324311', 'Hung yen', '01646274935', 1, 'tuanlan1', b'0'),
(119, 'Trang87', 'NGUYEN THI TRANG', 'd286e7931188e24138ec28e2d78ef1c6', '0bf9e254fc918eab0747c148778e4013', 'Tranghieuduong@gmail.com', '0021000351386', 'Ha Noi', '01687088991', 1, 'Hoa68', b'0'),
(120, 'anhdung', 'NGUYEN VAN DUNG', 'e10adc3949ba59abbe56e057f20f883e', '25f9e794323b453885f5181f1b624d0b', 'dungnv.vauto@gmail.com', '0011004304544', 'Hà Nội', '0974438428', 1, 'thuyhavp', b'0'),
(121, 'dongtay', 'NGUYEN DOAN DONG', '39ee488c7696d8f3ee3456218666a3c9', 'c9b235ee97e89b3615897f2d53f7dee2', 'nguyendongvision@gmai.com', '0021000619109', 'Ha noi', '01629651136', 1, 'bonbon', b'0'),
(122, 'dangthanhdt', 'DANG THI THANH', 'e10adc3949ba59abbe56e057f20f883e', 'b3275960d68fda9d831facc0426c3bbc', 'dangthanhdt60@gmail.com', '0821000105557', 'Thai nguyen', '01687043160', 1, 'thuyhavp', b'0'),
(123, 'Hieuroyal', 'HOANG THU HUYEN', 'bd16a6e4d33c97ca1e4f25b785fa5c3d', 'c667d53acd899a97a85de0c201ba99be', 'hieuroyalr2@gmail.com', '0711000251364', 'Ha Noi', '0973158584', 1, 'Hoa68', b'0'),
(124, 'minhthuy88', 'NGUYEN THI MINH THUY', 'e10adc3949ba59abbe56e057f20f883e', 'b3275960d68fda9d831facc0426c3bbc', 'minhthuyuyen@gmail.com', '0361000238123', 'vinh phuc', '0967889514', 1, 'thuyhavp', b'0'),
(125, 'Kieuoanh', 'PHAM THI KIEU OANH', '9b8fa5a398f4b83a10d07d15d2f74fa6', '7f9d88fe83d3e7fce3136e510b0a9a38', 'phamkieuoanh39@gmail.com', '0451000326795', 'Ha Noi', '0908950987', 1, 'Tailoc', b'0'),
(126, 'dtthuhuong', 'DOAN THI THU HUONG', '2b9cdebb444dbb2fe8380860104f0573', '95829626de85df8d286e40d519eee9ac', 'lenghia8620@gmail.com', '0071000691864', 'Ho Chi Minh', '01656911568', 1, 'anhtuan83', b'0'),
(127, 'Kimthu', 'HONG KIM THU', '871e389668b0d3c5842725e8d9b26a10', 'c667d53acd899a97a85de0c201ba99be', 'Hongkimthu1957@gmail.com', '0011004302448', 'Ha Noi', '0978862629', 1, 'Tailoc', b'0'),
(128, 'khachung', 'NGUYEN KHAC HUNG', 'a591af89e9d9169830a41488891526c5', '228b77eba2dcd9b080a215b5c32b741c', 'nguyenkhachung0801@gmail.com', '0611001944858', 'ha noi', '0934501478', 1, 'trang87', b'0'),
(129, 'minhto', 'TRAN QUOC MINH', '88316675d7882e3fdbe066000273842c', 'b5e83ad478b634869d5e68a4cb2310fd', 'tranminh228@gmail.com', '0451000377769', 'cầu giấy - hà nội ', '0972646227', 1, 'bonbon', b'0'),
(130, 'Lacoste', 'BUI THI NGOC', '3c248d9df61f79adc2f6f8205580f666', '5a9357674d717868c8a1275e73fbb9b7', 'Heritageltc1102@gmail.com', '0011004285504', 'Cầu giấy', '0911146245', 1, 'Bonbon', b'0'),
(131, 'Huongpro', 'PHAN VAN HUONG', '9f84cd11dbe67acc92f82a31223c6983', 'c667d53acd899a97a85de0c201ba99be', 'Phatloc.org@gmail.com', '0101000353179', 'Nghe An', '0961167125', 1, 'tailoc', b'0'),
(132, 'Dochanh83', 'LE THI THUY TRANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Dochanh_1102@gmail.com', '0591000286383', 'Hung Yen', '01685537975', 1, 'Hoalan', b'0'),
(133, 'Dochanh85', 'LE THI THUY TRANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Dochanh_1102@gmail.com', '0541000265685', 'Ha Noi', '01685537975', 1, 'Hoalan', b'0'),
(134, 'Dochanh35', 'LE THI THUY TRANG', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Dochanh_1102@gmail.com', '0011004303435', 'Ha Noi', '01685537975', 1, 'Hoalan', b'0'),
(135, 'Kien68', 'NGUYEN TRUNG KIEN', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Dochanh_1102@gmail.com', '0541000265280', 'Ha Noi', '01685537975', 1, 'Hoalan', b'0'),
(136, 'Kien88', 'NGUYEN TRUNG KIEN', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Kien_1979@gmail.cim', '0541000265288', 'Ha Noi', '01239788892', 1, 'Hoalan', b'0'),
(137, 'Huyen24', 'NGUYEN THI HOANG HUYEN', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Kien_1979@gmail.com', '0541000269324', 'Ha Noi', '01239788892', 1, 'Hoalan', b'0'),
(138, 'Huyen25', 'NGUYEN THI HOANG HUYEN', '101937a8769e3c3ee647b12d0717326f', 'c667d53acd899a97a85de0c201ba99be', 'Kien_1979@gmail.com', '0541000269325', 'Ha noi', '01239788892', 1, 'Huyen24', b'0'),
(139, 'Huyen26', 'NGUYEN THI HOANG HUYEN', '101937a8769e3c3ee647b12d0717326f', '251bd0442dfcc53b5a761e050f8022b8', 'Kien_1979@gmail.com', '0541000269326', 'Ha Noi', '01239788892', 1, 'Huyen24', b'0'),
(140, 'Hoalan65', 'LE THI HOA LAN', '0ea84fd56d8becb2e424cf043482bf61', 'c667d53acd899a97a85de0c201ba99be', 'Vungtroibinhyen1303@gmail.com', '0491000091065', 'Thang Long', '0932332129', 1, 'Hoalan', b'0'),
(141, 'Hoalan66', 'LE THI HOA LAN', '0ea84fd56d8becb2e424cf043482bf61', 'c667d53acd899a97a85de0c201ba99be', 'Vungtroibinhyen1303@gmail.com', '0491000091066', 'Thang Long', '0932332129', 1, 'Hoalan', b'0'),
(142, 'Hoalan67', 'LE THI HOA LAN', '0ea84fd56d8becb2e424cf043482bf61', 'c667d53acd899a97a85de0c201ba99be', 'Vungtroibinhyen1303@gmail.com', '0491000091067', 'Thang Long', '01239788892', 1, 'Hoalan66', b'0'),
(143, 'Hoalan68', 'LE THI HOA LAN', '0ea84fd56d8becb2e424cf043482bf61', 'c667d53acd899a97a85de0c201ba99be', 'Vungtroibinhyen1303@gmail.com', '0491000091068', 'Thang Long', '01239788892', 1, 'Hoalan66', b'0'),
(144, 'Hoalan70', 'LE THI HOA LAN', '0ea84fd56d8becb2e424cf043482bf61', 'c667d53acd899a97a85de0c201ba99be', 'Vungtroibinhyen1303@gmail.com', '0491000091070', 'Thang Long', '01239788892', 1, 'Hoalan66', b'0'),
(145, 'Tailocht', 'VO THANH HOE', '08b868b06baed1e65e3e8a067a6b187f', '3aa97a02b3cb0a3766e1a20a23147ff9', 'vothanhhoe@gmail.com', '0641002348888', 'VCB Ha Tinh', '01297399999', 1, 'Huongpro', b'0'),
(146, 'dungmanh', 'NGUYEN NHU DUNG', 'b10e21c108767be4aa8930778d70b084', 'f38bba9909deb1cd922bd61fdb76193c', 'nhudung1977@yahoo.com', '0591000320138', 'hung yen', '0962385858', 1, 'dungnga', b'0'),
(147, 'dungmanh01', 'NGUYEN NHU DUNG', 'b10e21c108767be4aa8930778d70b084', 'f38bba9909deb1cd922bd61fdb76193c', 'nhudung1977@yahoo.com', '0731000697118', 'bac giang', '0962385858', 1, 'dungnga', b'0'),
(148, 'ngatuan', 'NGUYEN THI HANG NGA', 'b10e21c108767be4aa8930778d70b084', 'f38bba9909deb1cd922bd61fdb76193c', 'nhudung1977@yahoo.com', '0351000964233', 'bac ninh', '0962385858', 1, 'dungnga', b'0'),
(149, 'ngatuan01', 'NGUYEN THI HANG NGA', 'b10e21c108767be4aa8930778d70b084', 'f38bba9909deb1cd922bd61fdb76193c', 'nhudung1977@yahoo.com', '0591000321690', 'hung yen', '0962385858', 1, 'dungnga', b'0'),
(150, 'Phuongvh', 'NGUYEN THI PHUONG', '9d85cd8bf53996df44dddb9a988da293', 'c81e728d9d4c2f636f067f89cc14862c', 'Nhimme18011993@gmail.com', '0541000266718', 'Chương Dương', '0962986269', 1, 'Maint68', b'0'),
(151, 'Thamhd', 'HOANG DUC THAM', '9d85cd8bf53996df44dddb9a988da293', 'c81e728d9d4c2f636f067f89cc14862c', 'ducthamm7@gmail.com', '0591000302452', 'Như Quỳnh Hưng Yên', '0968587999', 1, 'Maint68', b'0'),
(152, 'letho1', 'LE THI THO', '6ea79b291c609a79406920b2dc4d2244', '8c0e1ca435b59d612bba68382e5fee6e', 'letho3058@gmail.com', '0591000321448', 'Hung yen', '0973090649', 1, 'tuanlan2', b'0'),
(153, 'letho2', 'LE THI THO', '6ea79b291c609a79406920b2dc4d2244', '8c0e1ca435b59d612bba68382e5fee6e', 'letho3058@gmail.com', '0591000321452', 'Hung yen', '0973090649', 1, 'tuanlan2', b'0'),
(154, 'maoloan88', 'PHAM THI MAO LOAN', '6ea79b291c609a79406920b2dc4d2244', '8c0e1ca435b59d612bba68382e5fee6e', 'phamthimaoloan@gmail.com', '0951004180378', 'hung yen', '01647272696', 1, 'tuanlan3', b'0'),
(155, 'nguyenlam', 'NGUYEN THI LAM', '6ea79b291c609a79406920b2dc4d2244', '8c0e1ca435b59d612bba68382e5fee6e', 'nguyenlamctd@gmail.com', '0591000321823', 'Hung yen', '0976812921', 1, 'tuanlan3', b'0'),
(156, 'Maint9999', 'NGUYEN THI MAI', '984cefd6d27eb0471fc401a493a4fdff', '1679091c5a880faf6fb5e6087eb1b2dc', 'maitchc2011@gmai.com', '0541000266228', 'Chương Dương', '0912074434', 1, 'Maint68', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `walletid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `pin` int(11) NOT NULL DEFAULT '0',
  `monney` varchar(20) NOT NULL DEFAULT '0',
  `bitcoin` varchar(20) NOT NULL DEFAULT '0',
  `point` varchar(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`walletid`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`walletid`, `userid`, `pin`, `monney`, `bitcoin`, `point`) VALUES
(1, 1, 0, '0', '0', '0'),
(2, 20, 8099, '0', '0', '0'),
(15, 55, 0, '0', '0', '0'),
(16, 56, 100, '0', '0', '0'),
(11, 27, 337, '0', '0', '0'),
(7, 26, 483, '0', '0', '0'),
(17, 57, 6, '0', '0', '0'),
(18, 58, 7, '0', '0', '0'),
(19, 59, 6, '0', '0', '0'),
(20, 60, 0, '0', '0', '0'),
(21, 61, 0, '0', '0', '0'),
(22, 62, 6, '0', '0', '0'),
(23, 63, 0, '0', '0', '0'),
(24, 64, 6, '0', '0', '0'),
(25, 65, 0, '0', '0', '0'),
(26, 66, 6, '0', '0', '0'),
(27, 67, 50, '0', '0', '0'),
(28, 68, 0, '0', '0', '0'),
(29, 69, 50, '0', '0', '0'),
(30, 70, 9, '0', '0', '0'),
(31, 71, 3, '0', '0', '0'),
(32, 72, 0, '0', '0', '0'),
(33, 73, 0, '0', '0', '0'),
(34, 74, 0, '0', '0', '0'),
(35, 75, 14, '0', '0', '0'),
(36, 76, 2, '0', '0', '0'),
(37, 77, 0, '0', '0', '0'),
(38, 78, 0, '0', '0', '0'),
(39, 79, 0, '0', '0', '0'),
(40, 80, 6, '0', '0', '0'),
(41, 81, 0, '0', '0', '0'),
(42, 82, 0, '0', '0', '0'),
(43, 83, 0, '0', '0', '0'),
(44, 84, 0, '0', '0', '0'),
(45, 85, 300, '0', '0', '0'),
(46, 86, 0, '0', '0', '0'),
(47, 87, 54, '0', '0', '0'),
(48, 88, 0, '0', '0', '0'),
(49, 89, 0, '0', '0', '0'),
(50, 90, 100, '0', '0', '0'),
(51, 91, 100, '0', '0', '0'),
(52, 92, 0, '0', '0', '0'),
(53, 93, 5, '0', '0', '0'),
(54, 94, 0, '0', '0', '0'),
(55, 95, 0, '0', '0', '0'),
(56, 96, 0, '0', '0', '0'),
(57, 97, 0, '0', '0', '0'),
(58, 98, 0, '0', '0', '0'),
(59, 99, 0, '0', '0', '0'),
(60, 100, 0, '0', '0', '0'),
(61, 101, 0, '0', '0', '0'),
(62, 102, 91, '0', '0', '0'),
(63, 103, 3, '0', '0', '0'),
(64, 104, 0, '0', '0', '0'),
(65, 105, 0, '0', '0', '0'),
(66, 106, 0, '0', '0', '0'),
(67, 107, 0, '0', '0', '0'),
(68, 108, 6, '0', '0', '0'),
(69, 109, 4, '0', '0', '0'),
(70, 110, 94, '0', '0', '0'),
(71, 111, 0, '0', '0', '0'),
(72, 112, 0, '0', '0', '0'),
(73, 113, 0, '0', '0', '0'),
(74, 114, 12, '0', '0', '0'),
(75, 115, 0, '0', '0', '0'),
(76, 116, 0, '0', '0', '0'),
(77, 117, 0, '0', '0', '0'),
(78, 118, 6, '0', '0', '0'),
(79, 119, 2, '0', '0', '0'),
(80, 120, 0, '0', '0', '0'),
(81, 121, 0, '0', '0', '0'),
(82, 122, 0, '0', '0', '0'),
(83, 123, 3, '0', '0', '0'),
(84, 124, 0, '0', '0', '0'),
(85, 125, 0, '0', '0', '0'),
(86, 126, 0, '0', '0', '0'),
(87, 127, 0, '0', '0', '0'),
(88, 128, 1, '0', '0', '0'),
(89, 129, 0, '0', '0', '0'),
(90, 130, 0, '0', '0', '0'),
(91, 131, 0, '0', '0', '0'),
(92, 132, 0, '0', '0', '0'),
(93, 133, 0, '0', '0', '0'),
(94, 134, 0, '0', '0', '0'),
(95, 135, 0, '0', '0', '0'),
(96, 136, 0, '0', '0', '0'),
(97, 137, 0, '0', '0', '0'),
(98, 138, 0, '0', '0', '0'),
(99, 139, 0, '0', '0', '0'),
(100, 140, 0, '0', '0', '0'),
(101, 141, 0, '0', '0', '0'),
(102, 142, 0, '0', '0', '0'),
(103, 143, 0, '0', '0', '0'),
(104, 144, 0, '0', '0', '0'),
(105, 145, 0, '0', '0', '0'),
(106, 146, 0, '0', '0', '0'),
(107, 147, 0, '0', '0', '0'),
(108, 148, 0, '0', '0', '0'),
(109, 149, 0, '0', '0', '0'),
(110, 150, 2, '0', '0', '0'),
(111, 151, 2, '0', '0', '0'),
(112, 152, 6, '0', '0', '0'),
(113, 153, 6, '0', '0', '0'),
(114, 154, 0, '0', '0', '0'),
(115, 155, 6, '0', '0', '0'),
(116, 156, 2, '0', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
