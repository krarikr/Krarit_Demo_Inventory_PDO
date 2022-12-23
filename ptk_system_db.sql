-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 07:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptk_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `his_hti`
--

CREATE TABLE `his_hti` (
  `hti_id` int(11) NOT NULL,
  `hti_od_id` int(11) NOT NULL,
  `hti_od_name` varchar(300) NOT NULL,
  `hti_od_date` varchar(100) NOT NULL,
  `hti_od_site` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `his_hti`
--

INSERT INTO `his_hti` (`hti_id`, `hti_od_id`, `hti_od_name`, `hti_od_date`, `hti_od_site`) VALUES
(1, 4, 'สุเวศ ศรีชัย', '06-01-22 07:01:05', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก'),
(2, 6, 'คริษฐ์ พิมพิลา', '06-01-22 09:41:21', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา');

-- --------------------------------------------------------

--
-- Table structure for table `his_sto`
--

CREATE TABLE `his_sto` (
  `hto_id` int(11) NOT NULL,
  `hto_od_id` int(11) NOT NULL,
  `hto_od_name` varchar(500) NOT NULL,
  `hto_od_date` varchar(100) NOT NULL,
  `hto_od_site` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `his_sto`
--

INSERT INTO `his_sto` (`hto_id`, `hto_od_id`, `hto_od_name`, `hto_od_date`, `hto_od_site`) VALUES
(1, 4, 'สุเวศ ศรีชัย', '06-01-22 06:58:34', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก'),
(2, 3, 'สุเวศ ศรีชัย', '06-01-22 06:57:37', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก'),
(3, 1, 'สุเวศ ศรีชัย', '06-01-22 06:55:12', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา'),
(4, 6, 'คริษฐ์ พิมพิลา', '06-01-22 09:37:20', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา'),
(5, 10, 'คริษฐ์ พิมพิลา', '06-01-22 09:53:27', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา'),
(6, 17, 'คริษฐ์ พิมพิลา', '17-01-22 01:27:15', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก'),
(7, 19, 'คริษฐ์ พิมพิลา', '17-01-22 02:00:50', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา');

-- --------------------------------------------------------

--
-- Table structure for table `his_sto_w`
--

CREATE TABLE `his_sto_w` (
  `hto_id` int(11) NOT NULL,
  `hto_od_id` int(11) NOT NULL,
  `hto_od_name` varchar(500) NOT NULL,
  `hto_od_date` varchar(100) NOT NULL,
  `hto_od_site` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `his_sto_w`
--

INSERT INTO `his_sto_w` (`hto_id`, `hto_od_id`, `hto_od_name`, `hto_od_date`, `hto_od_site`) VALUES
(1, 2, 'สุเวศ ศรีชัย', '06-01-22 06:57:01', 'คอนโด 55 ชั้น บางกะปิ'),
(2, 7, 'คริษฐ์ พิมพิลา', '06-01-22 09:46:56', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก'),
(3, 18, 'คริษฐ์ พิมพิลา', '17-01-22 01:28:12', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา'),
(4, 20, 'คริษฐ์ พิมพิลา', '17-01-22 02:01:10', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `type_id` varchar(10) NOT NULL,
  `mat_brand` varchar(100) NOT NULL,
  `mat_name` varchar(100) NOT NULL,
  `mat_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `type_id`, `mat_brand`, `mat_name`, `mat_amount`) VALUES
(1, '1', 'ช้าง', 'ปูนซีเมนต์(ถุงแดง)', '19'),
(2, '1', 'ช้าง', 'ปูนซีเมนต์(ถุงเขียว)', '17'),
(3, '1', 'อินทรีเพชร', 'ปูนซีเมนต์(ถุงแดง)', '25'),
(4, '1', 'อินทรีเพชร', 'ปูนซีเมนต์(ถุงเขียว)', '43'),
(5, '1', 'ดอกบัว', 'แท่งเหล็ก ขนาด 3/4นิ้ว*4ม. ', '55'),
(6, '1', 'ดอกบัว', 'แท่งเหล็ก ขนาด 3/4นิ้ว*4ม. ', '20'),
(7, '1', 'ดอกบัว', 'ลวดตาข่าย', '50'),
(8, '1', 'ทีพีไอ', 'ไม้อัดยาง', '13'),
(9, '1', 'ทีพีไอ', 'แผ่นฝ้ายิปซั่มสำเร็จรูป', '0'),
(10, '1', 'เสือ', 'ท่อปูน', '20'),
(11, '1', 'ตราเสือ', 'แผ่นพื้น', '33'),
(12, '1', 'อี.บี.เอ็ม', 'เหล็กเส้น', '99'),
(13, '1', 'อี.บี.เอ็ม', 'เหล็กรูปพรรณ', '70'),
(14, '1', 'อี.บี.เอ็ม', 'เหล็กแผ่น', '50'),
(15, '1', 'อี.บี.เอ็ม', 'ลวด', '20'),
(16, '1', 'เอสซีจี', 'แผ่นเพลต', '20'),
(17, '1', 'ตราช้าง', 'ท่อพีวีซีขนาด 3/4นิ้ว*4ม. เบอร์8.5', '30'),
(18, '1', 'ตราช้าง', 'ท่อพีวีซีขนาด3/4นิ้ว*4 ม.เบอร์13.5', '50'),
(19, '1', 'ตราช้าง', 'ท่อพีวีซีขนาด 1/2นิ้ว*4ม. เบอร์8.5', '50'),
(20, '1', 'ตราช้าง', 'ท่อพีวีซีขนาด1/2นิ้ว*4ม. เบอร์13.5', '50'),
(21, '1', 'ตราช้าง', 'ท่อพีวีซีขนาด1นิ้ว*4ม. เบอร์8.5', '50'),
(22, '1', 'ตราช้าง', 'ท่อพีวีซีขนาด1นิ้ว*4 ม. เบอร์13.5', '50'),
(23, '2', 'ตราช้าง', 'หมวกนิรภัย (ขาว)', '17'),
(24, '2', 'ตราช้าง', 'หมวกนิรภัย (เหลือง)', '16'),
(25, '2', 'มิซูมิ', 'เสื้อกั๊กตาข่าย (ช่าง)', '65'),
(26, '2', 'มิซูมิ', 'เสื้อกั๊กตาข่าย (วิศวกร)', '13'),
(27, '2', 'ตราช้าง', 'ถังปูน', '40'),
(28, '2', 'ตราช้าง', 'อ่างผสมปูน', '20'),
(29, '2', 'อี.บี.เอ็ม', 'อ่างผสมปูน', '20'),
(30, '2', 'ตราช้าง', 'เกียงฉาบ', '39'),
(31, '2', 'อี.บี.เอ็ม', 'เกียงฉาบ', '39'),
(32, '2', 'ตราช้าง', 'ยางกันซึม', '19'),
(33, '2', 'อี.บี.เอ็ม', 'ยางกันซึม', '20'),
(34, '2', 'เฮียชัย', 'นั้งร้าน', '20'),
(35, '2', 'อี.บี.เอ็ม', 'นั้งร้าน', '20'),
(36, '2', 'ไจแอนท์ คิงคอง', 'แม่แรงตะเข้ 3 ตัน', '10'),
(37, '2', 'ไจแอนท์ คิงคอง', 'แม่แรงตะเข้ 5 ตัน', '10'),
(38, '2', 'คลินต้อนท์', 'เครื่องตัดเหล็ก', '15'),
(39, '2', 'คลินต้อนท์', ' เครื่องดัดเหล็ก', '20'),
(40, '2', 'คีย์เอ็นซ์', 'กล้องวัดพื้นที่ 3 มิติ', '2'),
(41, '2', 'ตราช้าง', 'นั้งร้าน', '10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `d_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`d_id`, `o_id`, `m_id`, `qty`) VALUES
(1, 1, 23, '5'),
(2, 1, 24, '5'),
(3, 1, 25, '5'),
(4, 1, 26, '5'),
(5, 2, 2, '5'),
(6, 2, 3, '5'),
(7, 3, 23, '8'),
(8, 3, 24, '8'),
(9, 3, 25, '8'),
(10, 4, 30, '5'),
(11, 4, 31, '4'),
(12, 4, 29, '5'),
(13, 5, 23, '3'),
(14, 5, 24, '3'),
(15, 5, 25, '3'),
(16, 6, 23, '10'),
(17, 6, 25, '5'),
(18, 7, 1, '1'),
(19, 7, 2, '10'),
(20, 7, 3, '10'),
(21, 8, 1, '1'),
(22, 9, 23, '1'),
(23, 10, 23, '1'),
(24, 11, 30, '1'),
(25, 12, 23, '1'),
(26, 13, 23, '1'),
(27, 14, 23, '1'),
(28, 15, 25, '1'),
(29, 16, 25, '1'),
(30, 17, 23, '20'),
(31, 17, 24, '20'),
(32, 17, 25, '10'),
(33, 18, 2, '10'),
(34, 18, 3, '10'),
(35, 18, 4, '10'),
(36, 19, 27, '10'),
(37, 19, 25, '10'),
(38, 20, 4, '10'),
(39, 20, 5, '10'),
(40, 21, 25, '10'),
(41, 21, 27, '1'),
(42, 21, 28, '1'),
(43, 21, 32, '10'),
(44, 22, 1, '1'),
(45, 22, 2, '1'),
(46, 23, 24, '10'),
(47, 23, 25, '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `od_id` int(11) NOT NULL,
  `od_name` varchar(500) NOT NULL,
  `od_date` varchar(100) NOT NULL,
  `od_site` varchar(300) NOT NULL,
  `od_status` int(1) NOT NULL COMMENT '1=รอดำเนิน 2=ยกเลิก 3=เสร็จสิน',
  `od_ty` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`od_id`, `od_name`, `od_date`, `od_site`, `od_status`, `od_ty`) VALUES
(1, 'สุเวศ ศรีชัย', '06-01-22 06:55:12', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 3, 1),
(2, 'สุเวศ ศรีชัย', '06-01-22 06:57:01', 'คอนโด 55 ชั้น บางกะปิ', 5, 2),
(3, 'สุเวศ ศรีชัย', '06-01-22 06:57:37', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', 3, 1),
(4, 'สุเวศ ศรีชัย', '06-01-22 07:01:05', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', 5, 1),
(5, 'สุเวศ ศรีชัย', '06-01-22 08:49:50', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 2, 1),
(6, 'คริษฐ์ พิมพิลา', '06-01-22 09:41:21', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 5, 1),
(7, 'คริษฐ์ พิมพิลา', '06-01-22 09:46:56', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', 5, 2),
(8, 'คริษฐ์ พิมพิลา', '06-01-22 09:48:48', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', 2, 2),
(9, 'คริษฐ์ พิมพิลา', '06-01-22 09:52:08', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 2, 1),
(10, 'คริษฐ์ พิมพิลา', '17-01-22 01:27:55', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 3, 1),
(11, 'คริษฐ์ พิมพิลา', '06-01-22 09:57:44', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 2, 1),
(12, 'คริษฐ์ พิมพิลา', '06-01-22 09:57:54', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 2, 1),
(13, 'คริษฐ์ พิมพิลา', '06-01-22 09:58:32', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 2, 1),
(14, 'คริษฐ์ พิมพิลา', '06-01-22 09:58:47', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', 2, 1),
(15, 'คริษฐ์ พิมพิลา', '06-01-22 09:59:00', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 2, 1),
(16, 'คริษฐ์ พิมพิลา', '06-01-22 09:59:47', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 2, 1),
(17, 'คริษฐ์ พิมพิลา', '17-01-22 02:49:06', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', 4, 1),
(18, 'คริษฐ์ พิมพิลา', '17-01-22 01:28:12', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 5, 2),
(19, 'คริษฐ์ พิมพิลา', '17-01-22 02:20:46', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 4, 1),
(20, 'คริษฐ์ พิมพิลา', '17-01-22 02:01:10', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 5, 2),
(21, 'คริษฐ์ พิมพิลา', '17-01-22 02:19:20', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 1, 1),
(22, 'คริษฐ์ พิมพิลา', '17-01-22 02:37:11', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 1, 2),
(23, 'คริษฐ์ พิมพิลา', '17-01-22 02:47:40', 'ตึกรุ่งอรุณ 15ชั้น คุณ สมร ดวงดี ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_date` varchar(100) NOT NULL,
  `po_user` varchar(100) NOT NULL,
  `po_site` varchar(100) NOT NULL,
  `po_image` text NOT NULL,
  `po_level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `po_date`, `po_user`, `po_site`, `po_image`, `po_level`) VALUES
(1, '26-12-21 05:41:47', 'คริษฐ์ พิมพิลา', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', 'wallpaperflare.com_wallpaper (1).jpg', 'a'),
(2, '28-12-21 15:05:10', 'คริษฐ์ พิมพิลา', 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', 's2_5.PNG', 'a'),
(3, '28-12-21 15:31:18', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 's2_3.PNG', 'a'),
(4, '03-01-22 06:20:37', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', '20211026_153857.jpg', 'a'),
(5, '04-01-22 03:27:31', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 'wallpaperflare.com_wallpaper (3).jpg', 'a'),
(6, '04-01-22 10:51:21', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', '20211026_153857.jpg', 'a'),
(7, '06-01-22 06:29:37', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', '20211026_153857.jpg', 'a'),
(8, '06-01-22 06:53:56', 'สุเวศ ศรีชัย', 'คอนโด 55 ชั้น บางกะปิ', '20211026_153857.jpg', 'a'),
(9, '06-01-22 09:15:52', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', '20211026_153857.jpg', 'a'),
(10, '06-01-22 09:17:59', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 's2_4.PNG', 'a'),
(11, '12-01-22 13:33:32', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 'im-really-not-the-demon-gods-lackey-1.jpg', 'a'),
(12, '17-01-22 01:26:02', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 'j7j0o3.jpg', 'a'),
(13, '17-01-22 02:04:47', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 'j7j0o3.jpg', 'a'),
(14, '17-01-22 02:17:14', 'คริษฐ์ พิมพิลา', 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 'j7j0o3.jpg', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `site_name` varchar(300) NOT NULL,
  `site_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `site_name`, `site_status`) VALUES
(1, 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 'b'),
(2, 'ตึกรุ่งอรุณ 15ชั้น คุณ สมร ดวงดี ', 'b'),
(3, 'โครงการหมู่บ้านมัลดีฟ บีชส์ สร้างโครงบ้าน 2 บล็อก', 'a'),
(4, 'ภูเก็ต รีสอร์ท ธีรยา ', 'a'),
(5, 'งานถนนตัดใหม่แม่สอด ภาครัฐ', 'a'),
(6, 'แม่สอดตึก10ชั้น', 'a'),
(7, 'แม่สอดตึก 5 ชั้น', 'a'),
(8, 'งานขึ้นโครงเหล็กลานจอดรถ คุณสิงห์ เมืองโต', 'a'),
(9, 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', ''),
(10, 'คอนโด 55 ชั้น บางกะปิ', 'a'),
(11, 'test 2', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `user_ptk`
--

CREATE TABLE `user_ptk` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_fullname` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_role` varchar(1) NOT NULL,
  `user_level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_ptk`
--

INSERT INTO `user_ptk` (`id`, `user_name`, `user_fullname`, `user_password`, `user_role`, `user_level`) VALUES
(1, 'adminptk', 'adminptk', 'adminptk', 'a', 'b'),
(2, 'adminptk2', 'ชัชชาติ วงศ์สุวรรณ', '12345678', 'a', 'a'),
(3, 'ptkuser1', 'คริษฐ์ พิมพิลา', 'ptkuser1', 'u', 'b'),
(4, 'ptkuser2', 'อิมรอน ทองงามดี', 'ptkuser2', 'u', 'a'),
(5, 'ptkuser5', 'กรผกา พิมพิลา', 'ptkuser1', 'u', 'a'),
(6, 'ptkuser8', 'สุเวศ ศรีชัย', '12345678', 'u', 'b'),
(7, 'ptkuser56', 'สิงห์นาค ดวงมารี', 'krarit2542', 'u', 'b'),
(8, 'ptkuser57', 'อัลดาฮาน ทองงามดี', 'ptkuser1', 'u', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `his_hti`
--
ALTER TABLE `his_hti`
  ADD PRIMARY KEY (`hti_id`);

--
-- Indexes for table `his_sto`
--
ALTER TABLE `his_sto`
  ADD PRIMARY KEY (`hto_id`);

--
-- Indexes for table `his_sto_w`
--
ALTER TABLE `his_sto_w`
  ADD PRIMARY KEY (`hto_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ptk`
--
ALTER TABLE `user_ptk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `his_hti`
--
ALTER TABLE `his_hti`
  MODIFY `hti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `his_sto`
--
ALTER TABLE `his_sto`
  MODIFY `hto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `his_sto_w`
--
ALTER TABLE `his_sto_w`
  MODIFY `hto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_ptk`
--
ALTER TABLE `user_ptk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
