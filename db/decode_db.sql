-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2014 at 06:07 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `decode_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_analys`
--

CREATE TABLE IF NOT EXISTS `tbl_analys` (
  `analys_id` int(11) NOT NULL AUTO_INCREMENT,
  `analys_time` int(11) NOT NULL,
  `analys_status` tinyint(1) DEFAULT NULL,
  `analys_ip` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`analys_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_analys`
--

INSERT INTO `tbl_analys` (`analys_id`, `analys_time`, `analys_status`, `analys_ip`) VALUES
  (19, 1414147529, 1, '127.0.0.1'),
  (23, 1414144699, 1, '192.168.7.97');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_bookinfo` (
  `bookinfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  PRIMARY KEY (`bookinfo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE IF NOT EXISTS `tbl_bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `paricipants` int(11) NOT NULL DEFAULT '2',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `game_id` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `booking_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `contacts_ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contacts_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contacts_diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contacts_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contacts_tinnhan` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contacts_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs`
--

CREATE TABLE IF NOT EXISTS `tbl_faqs` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faq_answer` text COLLATE utf8_unicode_ci,
  `faq_status` tinyint(2) NOT NULL DEFAULT '1',
  `faq_lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `faq_sort` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_faqs`
--

INSERT INTO `tbl_faqs` (`faq_id`, `faq_question`, `faq_answer`, `faq_status`, `faq_lang`, `faq_sort`) VALUES
  (1, 'DECODE là gì? ', '<br />DECODE l&agrave; 1 tr&ograve; chơi thực được chuyển thể từ c&aacute;c game online tho&aacute;t khỏi&nbsp;ph&ograve;ng k&iacute;n. Trong 1 nh&oacute;m 2-5 người, người chơi sẽ phải chạy đua với thời&nbsp;gian v&agrave; vận dụng tr&iacute; tuệ đ&atilde; giải m&atilde; b&iacute; mật của căn ph&ograve;ng nơi bị nhốt để&nbsp;t&igrave;m ch&igrave;a kho&aacute; tho&aacute;t ra ngo&agrave;i. Kh&ocirc;ng c&oacute; bất kỳ hoạt động n&agrave;o trong tr&ograve; chơi&nbsp;l&agrave; nguy hiểm hay đ&ograve;i hỏi khả năng thể lực cao.&nbsp;<br /><br />&nbsp;DECODE được s&aacute;ng tạo với mục ti&ecirc;u duy nhất l&agrave; đem đến một tr&ograve; chơi vui&nbsp;nhộn, khơi gợi tư duy s&aacute;ng tạo v&agrave; đầy t&iacute;nh h&agrave;nh động cho tất cả mọi người&nbsp;bất kể lứa tuổi. ECODE hy vọng tạo ra một s&acirc;n chơi th&uacute; vị gi&uacute;p gắn kết&nbsp;mọi người với nhau th&ocirc;ng qua trải nghiệm chung vai s&aacute;t c&aacute;nh vượt qua&nbsp;thử th&aacute;ch.&nbsp;<br /><br />Hiện tại DECODE c&oacute; 4 chủ đề ph&ograve;ng kh&aacute;c nhau (sẽ được thay đổi định kỳ&nbsp;để gi&uacute;p mọi người lu&ocirc;n c&oacute; những trải nghiệm mới mẻ nhất).<br />Để hiểu th&ecirc;m về tr&ograve; chơi v&agrave; đặt ph&ograve;ng, h&atilde;y ấn &ldquo;Đặt ph&ograve;ng&rdquo; tr&ecirc;n thanh&nbsp;điều khiển của website.', 1, 'vi', 1),
  (2, 'Tại sao nên chọn DECODE?', 'DECODE chú trọng niềm vui của mọi người và hướng tới một sân chơi mới mẻ có khả năng “gây nghiện” với những khoảnh khắc đáng nhớ bên bạn bè và gia đình.\r\nGiá của DECODE được cân nhắc cẩn thận sao cho phù hợp với túi tiền người Việt – thấp hơn tới 40% so với các nước bạn như Malaysia, Singapore và Thái Lan! \r\nCác Game Master của DECODE sẽ tận tình quan tâm chăm sóc khách hàng từ lúc đến cho lúc đi. Khách sẽ được hướng dẫn tỉ mỉ cách chơi trò chơi và nếu như đi 1 nhóm 4 hoặc 5 người, khách sẽ nhận được 1 tấm ảnh polaroid miễn phí chụp cả nhóm với phông ảnh DECODE. \r\nDECODE quảng bá trí tuệ của người chơi với những người chơi khác: khách có thể được đề tên trên bảng vàng top 5 nhóm xuất sắc nhất mỗi tuần. Bảng được đặt ở ngay trụ sở DECODE và cả up lên Facebook!\r\n', 1, 'en', 0),
  (4, 'Tôi nên chơi phòng nào trước? ', '<br />Mỗi ph&ograve;ng c&oacute; 1 độ kh&oacute; kh&aacute;c nhau ( được n&ecirc;u r&otilde; b&ecirc;n cạnh c&aacute;c poster&nbsp;ph&ograve;ng). Nếu như bạn lần đầu tới chơi, DECODE khuyến kh&iacute;ch bạn n&ecirc;n bắt&nbsp;đầu từ căn ph&ograve;ng dễ nhất &ndash; bạn sẽ c&oacute; khả năng gi&agrave;nh chiến thắng cao hơn&nbsp;rất nhiều!&nbsp;<br /><br />2 căn ph&ograve;ng như &ldquo;L&ograve; mổ&rdquo; v&agrave; &ldquo;Kh&aacute;ch sạn ma &aacute;m&rdquo; được x&acirc;y dựng với nhiều&nbsp;chi tiết kinh dị c&oacute; thể khiến bạn th&oacute;t tim. Bạn n&agrave;o yếu b&oacute;ng v&iacute;a c&oacute; thể chơi&nbsp;2 ph&ograve;ng c&ograve;n lại.<br /><br />Đương nhi&ecirc;n, nếu như bạn th&iacute;ch bất kỳ 1 chủ đề ph&ograve;ng n&agrave;o, bạn cứ việc&nbsp;thử! DECODE v&ocirc; c&ugrave;ng hoan ngh&ecirc;nh :D', 1, 'vi', 3),
  (5, 'Tôi nên chơi 1 nhóm bao nhiêu người? ', '<br />V&igrave; DECODE l&agrave; một tr&ograve; chơi c&oacute; t&iacute;nh đồng đội (v&agrave; cũng v&igrave; độ kh&oacute; của tr&ograve;&nbsp;chơi), bạn cần &iacute;t nhất 2 người để chơi. Tuy nhi&ecirc;n, c&agrave;ng nhiều bộ n&atilde;o vận&nbsp;h&agrave;nh th&igrave; khả năng bạn thắng c&agrave;ng cao. H&atilde;y tới c&ugrave;ng 4 người bạn kh&aacute;c (5 l&agrave;&nbsp;con số tối đa cho 1 ph&ograve;ng chơi) v&agrave; chiến thắng!', 1, 'vi', 4),
  (6, 'DECODE phù hợp cho độ tuổi nào? ', '<br />DECODE l&agrave; một tr&ograve; chơi vui nhộn d&agrave;nh cho mọi lứa tuổi, mặc d&ugrave; trẻ em&nbsp;dưới 9 tuổi c&oacute; thể cảm thấy qu&aacute; kh&oacute; hiểu. Trẻ em từ độ tuổi 9-15 n&ecirc;n c&oacute; &iacute;t&nbsp;nhất 1 người lớn đi c&ugrave;ng.&nbsp;<br /><br />Nếu bạn c&oacute; 1 trẻ em dưới 9 tuổi trong đội của bạn, bạn sẽ phải chịu ho&agrave;n&nbsp;to&agrave;n tr&aacute;ch nhiệm đối với những h&agrave;nh động của trẻ (bao gồm đổ vỡ, g&acirc;y hư&nbsp;hại cho đồ đạc trong ph&ograve;ng) v&agrave; cần k&yacute; một giấy đảm bảo trước khi chơi.&nbsp;<br /><br />Kh&ocirc;ng c&oacute; giới hạn độ tuổi tr&ecirc;n.', 1, 'vi', 5),
  (7, 'Tôi sợ không gian kín. Tôi có thể chơi không? ', '<br />C&aacute;c ph&ograve;ng của DECODE đều được thiết kế với trần nh&agrave; cao &iacute;t nhất 3.5m v&agrave;&nbsp;diện t&iacute;ch ph&ograve;ng kh&aacute; rộng r&atilde;i.&nbsp;<br /><br />C&aacute;c ph&ograve;ng đều c&oacute; camera v&agrave; chu&ocirc;ng k&ecirc;u cứu để kh&aacute;ch c&oacute; thể bấm bất cứ&nbsp;l&uacute;c n&agrave;o trong khi chơi v&agrave; c&aacute;c Game Masters sẽ lập tức tới hỗ trợ.<br /><br />Nếu như bạn cảm thấy kh&ocirc;ng thoải m&aacute;i, bạn c&oacute; thể rời bỏ tr&ograve; chơi bất cứ&nbsp;l&uacute;c n&agrave;o.', 1, 'vi', 6),
  (8, 'Làm thế nào để đặt phòng chơi?', '<br />Để xem khung thời gian c&ograve;n trống cho c&aacute;c ph&ograve;ng, vui l&ograve;ng xem phần &ldquo;Đặt&nbsp;ph&ograve;ng&rdquo;. Bạn c&oacute; thể đặt ph&ograve;ng trước 4 tuần!<br /><br />Sau khi bạn đ&atilde; chọn được căn ph&ograve;ng y&ecirc;u th&iacute;ch v&agrave; khung thời gian, vui&nbsp;l&ograve;ng điền v&agrave;o mẫu đơn li&ecirc;n hệ sẵn c&oacute; v&agrave; bấm &ldquo;Gửi&rdquo;. Một x&aacute;c nhận đặt&nbsp;ph&ograve;ng sẽ được gửi đến email của bạn. H&atilde;y nhớ rằng bạn cần phải đến 10&nbsp;ph&uacute;t sớm hơn thời gian đặt ph&ograve;ng để nghe hướng dẫn chơi.<br /><br />Xong rồi, b&acirc;y giờ bạn chỉ cần thả lỏng v&agrave; thư gi&atilde;n chờ đợi tới chuyến&nbsp;phi&ecirc;u lưu ngo&agrave;i đời thực của m&igrave;nh th&ocirc;i!', 1, 'vi', 7),
  (9, 'Làm thế nào để thanh toán? ', '<br />Hiện tại, DECODE chỉ chấp nhận thanh to&aacute;n bằng tiền mặt ngay tại quầy lễ t&acirc;n của DECODE tại tầng 8, to&agrave; nh&agrave; Qunimex, 29 L&ecirc; Đại H&agrave;nh, H&agrave; Nội.', 1, 'vi', 8),
  (10, 'Tôi có thể không cần đặt mà cứ đi vào chơi không?', '<br />Bạn c&oacute; thể! Tuy nhi&ecirc;n DECODE kh&oacute; c&oacute; thể đảm bảo cho bạn l&agrave; sẽ c&oacute; ph&ograve;ng&nbsp;trống. Để tr&aacute;nh bị thất vọng, bạn h&atilde;y sử dụng hệ thống đặt ph&ograve;ng của&nbsp;DECODE để đặt chỗ trước cho chắc chắn.', 1, 'vi', 9),
  (11, 'Tổng thời gian đến chơi mất bao lâu?', '<br />Khoảng 60 ph&uacute;t! Thời gian tối đa bạn c&oacute; thể ở trong ph&ograve;ng chơi l&agrave; 45&nbsp;ph&uacute;t. Tuy nhi&ecirc;n, bạn sẽ c&oacute; 5-10 ph&uacute;t hướng dẫn trước khi chơi v&agrave; 5 ph&uacute;t&nbsp;nữa để chụp ảnh với ph&ocirc;ng của DECODE v&agrave; những đồ costume độc đ&aacute;o.&nbsp;<br /><br />Vui l&ograve;ng đến sớm hơn 10 ph&uacute;t so với thời gian đặt ph&ograve;ng chơi. Nếu bạn&nbsp;đến muộn, h&atilde;y gọi điện thoại b&aacute;o trước cho DECODE. Muộn qu&aacute; 15 ph&uacute;t&nbsp;so với thời gian đặt ph&ograve;ng, DECODE sẽ kh&ocirc;ng thể đảm bảo giữ ph&ograve;ng cho&nbsp;bạn. Mong bạn th&ocirc;ng cảm!', 1, 'vi', 10),
  (12, 'Tôi sẽ có bao nhiêu gợi ý?', 'Đội của bạn sẽ có nhiều nhất 2 gợi ý từ các Game Masters của DECODE. Các bạn có thể nhấn chuông xin gợi ý bất cứ lúc nào trong cuộc chơi. ', 1, 'en', 0),
  (13, 'Tôi nên đến lúc mấy giờ? ', 'Vui lòng chỉ đến sớm hơn 10 phút so với thời gian đặt phòng chơi của bạn vì DECODE không có nhiều phòng đợi. \r\nNếu bạn đến muộn, vui lòng báo sớm cho DECODE qua điện thoại.', 1, 'en', 0),
  (14, 'Giá tiền như thế nào? ', '<br />Tất cả c&aacute;c ph&ograve;ng của DECODE đều c&ugrave;ng 1 gi&aacute;:<br />1. Ban ng&agrave;y (trước 5h chiều từ thứ Hai đến thứ Năm): 120k VND&nbsp;<br />2. Buổi tối (sau 5h chiều từ thứ Hai đến thứ Năm): 140k VND<br />3. Cuối tuần (tất cả c&aacute;c giờ từ thứ S&aacute;u đến CN): 160k VND&nbsp;<br /><br />DECODE c&oacute; chương tr&igrave;nh giảm gi&aacute; 10% cho học sinh sinh vi&ecirc;n. Chỉ cần&nbsp;bạn đưa ra thẻ học sinh, sinh vi&ecirc;n l&agrave; sẽ được giảm gi&aacute; ngay!&nbsp;<br /><br />DECODE c&oacute; những ưu đ&atilde;i giảm gi&aacute; kh&aacute;c kh&ocirc;ng định kỳ. H&atilde;y theo&nbsp;d&otilde;i DECODE tr&ecirc;n FB để &ldquo;chộp&rdquo; được nhiều ưu đ&atilde;i v&ocirc; c&ugrave;ng hấp dẫn:&nbsp;<a href="http://www.facebook.com/decodetvvn">www.facebook.com/decodetvvn</a>', 1, 'vi', 13),
  (15, 'Hỗ trợ người khuyết tật và các nhu cầu đặc biệt khác', '<br />DECODE rất tiếc ở thời điểm n&agrave;y c&aacute;c căn ph&ograve;ng của DECODE chưa được&nbsp;trang bị cho c&aacute;c thiết bị như xe lăn. Trong khi chơi, DECODE c&oacute; hệ thống&nbsp;loa mỗi ph&ograve;ng để tăng độ kịch t&iacute;nh nhưng người chơi kh&ocirc;ng nhất thiết cần&nbsp;nghe loa mới giải được mật m&atilde;.&nbsp;<br /><br />Nếu bạn c&oacute; nhu cầu đặc biệt kh&aacute;c, vui l&ograve;ng li&ecirc;n hệ DECODE v&agrave; ch&uacute;ng t&ocirc;i sẽ&nbsp;cố gắng hết sức để đ&aacute;p ứng nhu cầu của bạn.', 1, 'vi', 14),
  (16, 'Làm thế nào để đi đến DECODE?', '<br />Địa chỉ DECODE: tầng 8, to&agrave; nh&agrave; Qunimex, 29 L&ecirc; Đại H&agrave;nh, H&agrave; Nội. To&agrave;&nbsp;Qunimex nằm ngay đối diện Vincom B&agrave; Triệu v&agrave; s&aacute;t cạnh Starbucks&nbsp;Coffee.<br /><br />Khi sử dụng thang m&aacute;y, vui l&ograve;ng bấm l&ecirc;n tầng 7 v&agrave; đi 1 qu&atilde;ng thang bộ&nbsp;ngắn l&ecirc;n tầng 8.', 1, 'vi', 15),
  (17, 'Bãi đỗ xe ô tô và xe máy ', 'Vào ban ngày DECODE không có nhiều chỗ để xe máy, nếu hết chỗ, vui lòng để xe dưới hầm Vincom. Vào buổi tối khách có thể để xe trực tiếp ở DECODE thoải mái. Các chú bảo vệ vui tính của DECODE sẽ rất tận tình hướng dẫn chỗ để xe hợp lý. \r\nDECODE không có hầm để xe ô tô. Vui lòng đỗ xe ô tô dưới hầm Vincom. \r\nDECODE khuyên khách hàng nên để xe dưới hầm Vincom (chỉ từ 2-3k VND cho xe máy và quãng đường từ Vincom ra DECODE rất gần chưa tới 3 phút đi bộ). Có rất nhiều địa điểm khác có thể đỗ xe, tuy nhiên giá trông xe có thể cao tới 10-15k VND tuỳ thuộc đơn vị trông xe. ', 1, 'en', 0),
  (18, 'Khi bạn đặt chân tới DECODE ', '<br />Khi bạn tới DECODE, vui l&ograve;ng giới thiệu với lễ t&acirc;n mục đ&iacute;ch đến thăm của&nbsp;bạn. Nếu bạn đ&atilde; đặt ph&ograve;ng, bạn chỉ cần b&aacute;o cho lễ t&acirc;n th&ocirc;ng tin đặt ph&ograve;ng&nbsp;v&agrave; thanh to&aacute;n.<br /><br />Nếu lễ t&acirc;n đang bận tiếp kh&aacute;ch kh&aacute;c, xin h&atilde;y thoải m&aacute;i thư gi&atilde;n tại khu&nbsp;vực giải tr&iacute; của DECODE trong khi chờ đợi.', 1, 'vi', 17),
  (19, 'Tại sao nên chọn DECODE?', '<br />DECODE ch&uacute; trọng niềm vui của mọi người v&agrave; hướng tới một s&acirc;n chơi&nbsp;mới mẻ c&oacute; khả năng &ldquo;g&acirc;y nghiện&rdquo; với những khoảnh khắc đ&aacute;ng nhớ b&ecirc;n&nbsp;bạn b&egrave; v&agrave; gia đ&igrave;nh.<br /><br />Gi&aacute; của DECODE được c&acirc;n nhắc cẩn thận sao cho ph&ugrave; hợp với t&uacute;i tiền&nbsp;người Việt &ndash; thấp hơn tới 40% so với c&aacute;c nước bạn như Malaysia,&nbsp;Singapore v&agrave; Th&aacute;i Lan!&nbsp;<br /><br />C&aacute;c Game Master của DECODE sẽ tận t&igrave;nh quan t&acirc;m chăm s&oacute;c kh&aacute;ch h&agrave;ng&nbsp;từ l&uacute;c đến cho l&uacute;c đi. Kh&aacute;ch sẽ được hướng dẫn tỉ mỉ c&aacute;ch chơi tr&ograve; chơi&nbsp;v&agrave; nếu như đi 1 nh&oacute;m 4 hoặc 5 người, kh&aacute;ch sẽ nhận được 1 tấm ảnh&nbsp;polaroid miễn ph&iacute; chụp cả nh&oacute;m với ph&ocirc;ng ảnh DECODE.&nbsp;<br /><br />DECODE quảng b&aacute; tr&iacute; tuệ của người chơi với những người chơi kh&aacute;c:&nbsp;kh&aacute;ch c&oacute; thể được đề t&ecirc;n tr&ecirc;n bảng v&agrave;ng top 5 nh&oacute;m xuất sắc nhất mỗi&nbsp;tuần. Bảng được đặt ở ngay trụ sở DECODE v&agrave; cả up l&ecirc;n Facebook!', 1, 'vi', 2),
  (20, 'Tôi sẽ có bao nhiêu gợi ý?', '<br />Đội của bạn sẽ c&oacute; nhiều nhất 2 gợi &yacute; từ c&aacute;c Game Masters của DECODE.&nbsp;C&aacute;c bạn c&oacute; thể nhấn chu&ocirc;ng xin gợi &yacute; bất cứ l&uacute;c n&agrave;o trong cuộc chơi.', 1, 'vi', 11),
  (21, 'Tôi nên đến lúc mấy giờ?', '<br />Vui l&ograve;ng chỉ đến sớm hơn 10 ph&uacute;t so với thời gian đặt ph&ograve;ng chơi của bạn&nbsp;v&igrave; DECODE kh&ocirc;ng c&oacute; nhiều ph&ograve;ng đợi.&nbsp;<br /><br />Nếu bạn đến muộn, vui l&ograve;ng b&aacute;o sớm cho DECODE qua điện thoại.', 1, 'vi', 12),
  (22, 'Bãi đỗ xe ô tô và xe máy', '<br />V&agrave;o ban ng&agrave;y DECODE kh&ocirc;ng c&oacute; nhiều chỗ để xe m&aacute;y, nếu hết chỗ, vui&nbsp;l&ograve;ng để xe dưới hầm Vincom. V&agrave;o buổi tối kh&aacute;ch c&oacute; thể để xe trực tiếp ở&nbsp;DECODE thoải m&aacute;i. C&aacute;c ch&uacute; bảo vệ vui t&iacute;nh của DECODE sẽ rất tận t&igrave;nh&nbsp;hướng dẫn chỗ để xe hợp l&yacute;.&nbsp;<br /><br />DECODE kh&ocirc;ng c&oacute; hầm để xe &ocirc; t&ocirc;. Vui l&ograve;ng đỗ xe &ocirc; t&ocirc; dưới hầm Vincom.&nbsp;<br /><br />DECODE khuy&ecirc;n kh&aacute;ch h&agrave;ng n&ecirc;n để xe dưới hầm Vincom (chỉ từ 2-3k&nbsp;VND cho xe m&aacute;y v&agrave; qu&atilde;ng đường từ Vincom ra DECODE rất gần chưa tới 3&nbsp;ph&uacute;t đi bộ). C&oacute; rất nhiều địa điểm kh&aacute;c c&oacute; thể đỗ xe, tuy nhi&ecirc;n gi&aacute; tr&ocirc;ng xe&nbsp;c&oacute; thể cao tới 10-15k VND tuỳ thuộc đơn vị tr&ocirc;ng xe.', 1, 'vi', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_games`
--

CREATE TABLE IF NOT EXISTS `tbl_games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `game_desc` text COLLATE utf8_unicode_ci,
  `game_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_difficult` int(11) NOT NULL DEFAULT '1',
  `game_status` tinyint(4) DEFAULT NULL,
  `game_lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `game_sort` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_games`
--

INSERT INTO `tbl_games` (`game_id`, `game_name`, `game_desc`, `game_image`, `game_difficult`, `game_status`, `game_lang`, `game_sort`) VALUES
  (1, 'Lò mổ', 'B&ugrave;m! Bạn thức dậy trong 1 căn ph&ograve;ng tối tăm với những mảnh cơ thể người gh&ecirc; rợn v&agrave; những con chuột to đen trũi. Cửa đ&atilde; bị kho&aacute; chặt. Tại sao bạn lại ở đ&acirc;y? C&oacute; phải bạn đ&atilde; rơi v&agrave;o b&agrave;n tay t&ecirc;n s&aacute;t nh&acirc;n đồ tể? Qu&aacute; nhiều c&acirc;u hỏi, qu&aacute; &iacute;t thời gian! Bạn chỉ biết, nếu bạn kh&ocirc;ng nhanh ch&acirc;n, bạn sẽ trở th&agrave;nh thứ trong c&aacute;i t&uacute;i b&oacute;ng lơ lửng kia. Liệu bạn c&oacute; trốn kịp trước khi t&ecirc;n s&aacute;t nh&acirc;n quay lại?', '91370_201410240134.heButchery.jpg', 4, 1, 'vi', 1),
  (3, 'Khách sạn ma ám', 'Lời đồn kh&aacute;ch sạn Castello bị ma &aacute;m bắt nguồn từ 4000 năm trước, khi nữ ho&agrave;ng Mary bị giam ở đ&acirc;y v&agrave;o đ&ecirc;m cuối trước ng&agrave;y h&agrave;nh quyết v&igrave; tội ph&ugrave; thuỷ. Đ&ecirc;m đ&ecirc;m tiếng k&ecirc;u kh&oacute;c nỉ non xen kẽ với tiếng cười the th&eacute; khiến người ta dựng t&oacute;c g&aacute;y. Kinh ho&agrave;ng hơn, s&aacute;ng ra, 1 vị kh&aacute;ch sẽ biến mất. Bạn c&oacute; phải l&agrave; vị kh&aacute;ch đ&oacute;?', '28412_201410240116.otel_Final_view.jpg', 5, 1, 'vi', 2),
  (5, 'Giải cứu Santa', 'Một lời nguyền hắc &aacute;m h&ugrave;ng mạnh đ&atilde; khiến những y&ecirc;u tinh vui vẻ ở Bắc Cực trở n&ecirc;n xấu xa v&agrave; nổi dậy bắt tr&oacute;i &ocirc;ng gi&agrave; Noel. Bạn được ti&ecirc;n Nicole trao cho nhiệm vụ giải cứu v&ocirc; c&ugrave;ng kh&oacute; khăn: đột nhập Bắc Cực v&agrave; giải cứu &ocirc;ng gi&agrave; Noel trước khi những y&ecirc;u tinh canh g&aacute;c tỉnh dậy!! Năm nay trẻ em to&agrave;n thế giới c&oacute; được đ&oacute;n Noel kh&ocirc;ng?!! Tất cả đều do bạn quyết định!', '5365_201410240136.anta_RGB_view.jpg', 3, 1, 'vi', 3),
  (6, 'Siêu mọt sách', 'Bạn - một kẻ to x&aacute;c lu&ocirc;n bắt nạt bạn b&egrave; sắp nhận được sự trả đũa từ những nạn&nbsp;nh&acirc;n b&eacute; nhỏ bạn thường cười nhạo. Những si&ecirc;u mọt s&aacute;ch đ&atilde; bắt c&oacute;c v&agrave; nhốt bạn&nbsp;v&agrave;o 1 căn ph&ograve;ng kỳ b&iacute; nằm ngay cạnh Hố Đen Vũ Trụ Hoặc l&agrave; bạn giải những c&acirc;u&nbsp;đố của si&ecirc;u mọt s&aacute;ch thật nhanh, hoặc bạn sẽ bị h&uacute;t v&agrave;o Hố Đen m&atilde;i m&atilde;i...', '4383_201410240152.ega-Nerd.jpg', 4, 1, 'vi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE IF NOT EXISTS `tbl_options` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_value` text COLLATE utf8_unicode_ci,
  `option_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_group` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `option_status` tinyint(2) NOT NULL DEFAULT '1',
  `option_lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`option_id`, `option_name`, `option_value`, `option_image`, `option_group`, `option_status`, `option_lang`) VALUES
  (1, 'Logo1', 'Logo4', '76185_201410240343.ecode-logo.png', 'GLOBAL_LOGO', 1, 'en'),
  (7, 'Banner', 'WELCOME TO DECODE VIETNAM', 'Banner', 'HOME_BANNER', 1, 'en'),
  (8, 'Video Home', '//www.youtube.com/embed/jbPW10koNj0?rel=0&amp;controls=0&amp;modestbranding=1&amp;showinfo=0', 'Video Home', 'HOME_VIDEO', 1, 'en'),
  (9, 'DECODE - THE LIVE ESCAPE ROOM', 'Sign up for DECODE’s 45 minute escape challenge, where you will be locked in a room... or rooms, filled with mysteries, clues, brain teasers and puzzles, for you to decipher. Your chance of success rests on two factors: first, your teamwork,  and second, your brainpower. You will need plenty of both (and maybe a little luck) to finish our quest.Enough said. So... Ready to work side-by-side with your pals? Ready to release your inner detective? Challenge accepted? Book your escape now!', 'Decode Home', 'HOME_DECODE', 1, 'en'),
  (10, 'Slideshow The Game', 'Slideshow', 'Slideshow', 'GAMES_SLIDESHOW_IMG', 1, 'en'),
  (11, 'Rule', 'In a team of 2-5 people, you will be locked in a custom designed, captivating and pulse-raising environment, in which you will attempt to solve many riddles and puzzles in place. Unlocking the room’s mysteries will lead you to the final key to escape. To facilitate your quest, we will allow you 2 hints at anytime during the game. REMEMBER: to emerge a winner, you have to complete the quest in 45 minutes! It’s a race against the clock!<br/>\r\nWe have 4 room themes at the moment: The Butchery, Haunted Hotel, Mega-Nerd and Save Santa . Each theme is carefully crafted to cover you the entire emotional spectrum from shock and frantic to thrill and accomplished.', 'The Game Rule', 'GAMES_RULE', 0, 'en'),
  (12, 'Email', '<a href="mailto:info@decode.com.vn"><strong>info@decode.com.vn</strong></a>', 'Contact Email', 'CONTACT_EMAIL', 1, 'en'),
  (13, 'Phone', '+84.000.000.000', 'Contact Phone', 'CONTACT_PHONE', 1, 'en'),
  (14, 'Address', '8th Floor,Qunimex Building, 29 Le Dai Hanh, Ha Noi, Viet Nam', 'Contact Address', 'CONTACT_ADDRESS', 1, 'en'),
  (15, 'Contact Facebook', 'http://facebook.com', 'Contact Facebook', 'CONTACT_FACEBOOK', 1, 'en'),
  (20, 'Logo', 'Decode', '83530_201410050847.ogo.png', 'GLOBAL_LOGO', 1, 'vi'),
  (27, 'Banner', 'CHÀO MỪNG BẠN ĐẾN VỚI DECODE VIỆT NAM', 'Banner', 'HOME_BANNER', 1, 'vi'),
  (28, 'Video Trang Chủ', '//www.youtube.com/embed/jbPW10koNj0?rel=0&amp;controls=0&amp;modestbranding=1&amp;showinfo=0', 'Video Home', 'HOME_VIDEO', 1, 'vi'),
  (29, 'DECODE –Trò Chơi Thoát Khỏi Phòng Kín ', '<br />Đăng k&yacute; tham gia ngay thử th&aacute;ch c&acirc;n n&atilde;o của DECODE với 45 ph&uacute;t chạy đua cật&nbsp;lực c&ugrave;ng thời gian để kh&aacute;m ph&aacute; những b&iacute; mật của căn ph&ograve;ng k&iacute;n v&agrave; trốn tho&aacute;t&nbsp;th&agrave;nh c&ocirc;ng!<br /><br />Được chuyển thể từ c&aacute;c game online nổi tiếng như Crimson Room, DECODE&nbsp;sẽ &ldquo;nhốt&rdquo; bạn (v&agrave; đồng đội) v&agrave;o 1 kh&ocirc;ng gian huyền b&iacute; v&agrave; kịch t&iacute;nh với v&ocirc; v&agrave;n&nbsp;những mật m&atilde;, c&acirc;u đố v&agrave; đầu mối m&agrave; c&aacute;c bạn cần giải m&atilde; nhanh nhất c&oacute; thể&nbsp;nhằm t&igrave;m ra chiếc ch&igrave;a kho&aacute; mở căn ph&ograve;ng đang bị kho&aacute; k&iacute;n. Hai yếu tố then chốt&nbsp;quyết định sự th&agrave;nh c&ocirc;ng của bạn ch&iacute;nh l&agrave; tư duy logic v&agrave; khả năng phối hợp&nbsp;đồng đội. Bạn sẽ cần c&oacute; rất rất nhiều cả hai yếu tố n&agrave;y (v&agrave; một ch&uacute;t may mắn&nbsp;nữa) để c&oacute; thể &ldquo;qua mặt&rdquo; thử th&aacute;ch của DECODE.<br /><br />Một tr&ograve; chơi khơi gợi tr&iacute; tưởng tượng, khả năng quan s&aacute;t v&agrave; k&iacute;ch th&iacute;ch tư duy.&nbsp;Một thử th&aacute;ch cho khả năng phối hợp v&agrave; l&agrave;m việc nh&oacute;m. Một kh&ocirc;ng gian si&ecirc;u&nbsp;thực với những b&iacute; ẩn chưa c&oacute; lời giải đ&aacute;p. Tất cả đều sẽ c&oacute; ở DECODE!&nbsp;<br /><br />Vậy... bạn đ&atilde; sẵn s&agrave;ng chấp nhận th&aacute;ch thức của DECODE? Sẵn s&agrave;ng giải ph&oacute;ng&nbsp;con người th&aacute;m tử b&ecirc;n trong bạn? :D H&atilde;y đặt ngay ph&ograve;ng chơi DECODE!', '55578_201410240136.4186_201410240108.he-game.jpg', 'HOME_DECODE', 1, 'vi'),
  (30, 'Slideshow The Game', 'Slideshow', '84645_201410240154.ecode.jpg|95820_201410240154.otel_Final_view.jpg|27530_201410240154.ega-Nerd.jpg|33920_201410240154.anta_RGB_view.jpg|57826_201410240154.heButchery.jpg', 'GAMES_SLIDESHOW_IMG', 1, 'vi'),
  (31, 'Luật chơi', '<br />Trong 1 nh&oacute;m từ 2-5 người (tuỳ chọn), bạn sẽ bị &ldquo;nhốt&rdquo; v&agrave;o 1 căn ph&ograve;ng k&iacute;n&nbsp;được thiết kế cầu k&igrave; với nhiều chủ đề sống động v&agrave; độc đ&aacute;o kh&aacute;c nhau. Thoạt&nbsp;nh&igrave;n, đồ đạc b&agrave;y đặt trong ph&ograve;ng kh&ocirc;ng c&oacute; g&igrave; đặc biệt. Tuy nhi&ecirc;n, thị gi&aacute;c của bạn&nbsp;đ&atilde; bị đ&aacute;nh lừa! Căn ph&ograve;ng ẩn giấu v&ocirc; số b&iacute; mật trong đ&oacute; bao gồm cả c&aacute;ch gi&uacute;p&nbsp;bạn tho&aacute;t ra. Nhiệm vụ của bạn l&agrave; từng bước giải m&atilde; những đầu mối rải r&aacute;c trong&nbsp;ph&ograve;ng v&agrave; t&igrave;m ra chiếc ch&igrave;a kho&aacute; v&agrave;ng c&oacute; thể mở cửa. Để hỗ trợ bạn, DECODE sẽ&nbsp;cho bạn 2 gợi &yacute; c&oacute; thể sử dụng bất cứ l&uacute;c n&agrave;o trong cuộc chơi, chỉ cần bạn nhấn&nbsp;chu&ocirc;ng cứu. H&Atilde;Y NHỚ: Bạn chỉ chiến thắng nếu như bạn tho&aacute;t được khỏi căn&nbsp;ph&ograve;ng trong v&ograve;ng 45 ph&uacute;t! Đ&acirc;y thật sự sẽ l&agrave; 1 cuộc đua quyết liệt giữa tr&iacute; tuệ v&agrave;&nbsp;thời gian!!!<br /><br />* Để biết th&ecirc;m th&ocirc;ng tin, vui l&ograve;ng xem phần &ldquo;<a href="http://decode.com.vn/faqs">Hỏi đ&aacute;p</a>&rdquo;<br /><br />Hiện tại DECODE c&oacute; 4 chủ đề ph&ograve;ng: L&ograve; mổ, Kh&aacute;ch sạn ma &aacute;m, Si&ecirc;u mọt s&aacute;ch v&agrave;&nbsp;Giải cứu Santa. Mỗi chủ đề đều được đầu tư x&acirc;y dựng nội dung tỉ mỉ để đảm bảo&nbsp;cho bạn những trải nghiệm đ&aacute;ng nhớ nhất từ t&ograve; m&ograve;, hoảng hốt, hồi hộp, tự h&agrave;o v&agrave;&nbsp;kể cả sốc nặng! :D', '13960_201410240153.5578_201410240136.4186_201410240108.he-game.jpg', 'GAMES_RULE', 1, 'vi'),
  (32, 'Email', '<strong><a href="mailto:info@decode.com.vn">info@decode.com.vn</a></strong>', 'Contact Email', 'CONTACT_EMAIL', 1, 'vi'),
  (33, 'SĐT', '+84.000.000.000', 'Contact Phone', 'CONTACT_PHONE', 1, 'vi'),
  (34, 'Địa chỉ', '8th Floor,Qunimex Building, 29 L&ecirc; Đại H&agrave;nh, H&agrave; Nội, Việt Nam', 'Contact Address', 'CONTACT_ADDRESS', 1, 'vi'),
  (35, 'Liên kết Facebook', 'www.facebook.com/decodetvvn', 'Contact Facebook', 'CONTACT_FACEBOOK', 1, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prices`
--

CREATE TABLE IF NOT EXISTS `tbl_prices` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `price_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_value` float NOT NULL,
  `price_status` tinyint(4) NOT NULL DEFAULT '1',
  `price_lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_prices`
--

INSERT INTO `tbl_prices` (`price_id`, `price_name`, `price_desc`, `price_value`, `price_status`, `price_lang`) VALUES
  (1, 'Off-peak', '2 - 5, before 5 pm', 5, 1, 'en'),
  (2, 'Evening', '2 - 5 before 5pm', 6, 1, 'en'),
  (3, 'Off-peak', '2 - 5, trước 17 giờ', 100, 1, 'vi'),
  (4, 'Evening', '2 - 5, sau 17 giờ', 120, 1, 'vi'),
  (5, 'Weekend', '6 - Sunday', 7.5, 1, 'en'),
  (8, 'Weekend', '6 - Chủ Nhật', 150, 1, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_times`
--

CREATE TABLE IF NOT EXISTS `tbl_times` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `time_status` tinyint(4) NOT NULL DEFAULT '1',
  `is_weekend` tinyint(1) NOT NULL COMMENT 'discrimination weekend with normal days',
  `time_sort` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_times`
--

INSERT INTO `tbl_times` (`time_id`, `time`, `time_status`, `is_weekend`, `time_sort`) VALUES
  (1, '10:45:00', 1, 0, 1),
  (2, '12:00:00', 1, 0, 2),
  (3, '13:15:00', 1, 0, 3),
  (4, '14:30:00', 1, 0, 4),
  (5, '15:45:00', 1, 0, 4),
  (6, '17:00:00', 1, 0, 5),
  (7, '18:15:00', 1, 0, 6),
  (8, '19:30:00', 1, 0, 7),
  (9, '20:45:00', 1, 0, 8),
  (10, '21:00:00', 1, 0, 9),
  (11, '22:15:00', 1, 0, 10),
  (12, '10:45:00', 1, 1, 11),
  (13, '12:00:00', 1, 1, 12),
  (14, '13:15:00', 1, 1, 13),
  (15, '14:30:00', 1, 1, 14),
  (16, '15:45:00', 1, 1, 15),
  (17, '17:00:00', 1, 1, 16),
  (18, '18:15:00', 1, 1, 17),
  (19, '19:30:00', 1, 1, 18),
  (20, '20:45:00', 1, 1, 19),
  (21, '21:00:00', 1, 1, 20),
  (22, '22:15:00', 1, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_password`, `user_name`, `user_status`) VALUES
  (1, 'admin@gmail.com', '722e0c45e1906f22b4afcb75ba164fb4', 'Phan The Binh', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
