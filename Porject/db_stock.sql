-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 04:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(255) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `remark`) VALUES
(31, 'ອາຫານ', ''),
(33, 'ເຄືອງດຶ້ມ', ''),
(34, 'ໂຟນີເຈີ', ''),
(35, 'ເຄືອງໃຊ້ໂຟຟ້າ', ''),
(53, 'ອາຫານກະປ໋ອງ', ''),
(55, 'ໂລຫະ', '');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `dis_id` int(100) NOT NULL,
  `dis_name` varchar(255) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`dis_id`, `dis_name`, `pro_id`, `remark`) VALUES
(48, 'ເມືອງໄຊຍະບູລີ', 27, ''),
(49, 'ເມືອງພຽງ', 27, ''),
(50, 'ເມືອງຄອບ', 27, ''),
(51, 'ເມືອງຫົງສາ', 27, ''),
(52, 'ເມືອງເງີນ', 27, ''),
(53, 'ເມືອງຊຽງຮ່ອນ', 27, ''),
(54, 'ເມືອງປາກລາຍ', 27, ''),
(55, 'ເມືອງແກ່ນພ້າວ', 27, ''),
(56, 'ເມືອງບໍ່ແຕນ', 27, ''),
(57, 'ເມືອງທົ່ງມີໄຊ', 27, ''),
(58, 'ເມືອງໄຊສະຖານ', 27, ''),
(59, 'ເມືອງວຽງຄຳ', 28, ''),
(60, 'ເມືອງໂພນໂຮງ', 28, ''),
(61, 'ເມືອງທຸລະຄົມ', 28, ''),
(62, 'ເມືອງແກ້ວອຸດົມ', 28, ''),
(64, 'ເມືອງວັງວຽງ', 28, ''),
(65, 'ເມືອງເຟຶອງ', 28, ''),
(66, 'ເມືອງຊະນະຄານ', 28, ''),
(67, 'ເມືອງແມດ', 28, ''),
(68, 'ເມືອງຫີນເຫີບ', 28, ''),
(69, 'ເມືອງໜື່ນ', 28, ''),
(70, 'ເມືອງກາສີ', 28, ''),
(73, 'ເມືອງຈັນທະບູລີ', 29, ''),
(74, 'ເມືອງສີໂຄດຕະບອງ', 29, ''),
(75, 'ເມືອງໄຊເສດຖານ', 29, ''),
(76, 'ເມືອງສີສັດຕະນາກ', 29, ''),
(77, 'ເມືອງນາຊາຍທອງ', 29, ''),
(78, 'ເມືອງໄຊທານີ', 29, ''),
(79, 'ເມືອງຫາດຊາຍຟອງ', 29, ''),
(80, 'ເມືອງສັງທອງ', 29, ''),
(81, 'ເມືອງປາກງຶ່ມ', 29, ''),
(82, 'ເມືອງທ່າແຂກ', 30, ''),
(83, 'ເມືອງມະຫາໄຊ', 30, ''),
(84, 'ເມືອງໜອງບົກ', 30, ''),
(85, 'ເມືອງຫີນບູນ', 30, ''),
(86, 'ເມືອງຍົມມະລາດ', 30, ''),
(87, 'ເມືອງບົວລະພາ', 30, ''),
(88, 'ເມືອງນາກາຍ', 30, ''),
(89, 'ເມືອງເຊບັ້ງໄຟ', 30, ''),
(90, 'ເມືອງໄຊບົວທອງ', 30, ''),
(91, 'ເມືອງຄູນຄຳ', 30, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `prod_id` varchar(255) NOT NULL,
  `oqty` varchar(255) NOT NULL,
  `sprice` decimal(12,2) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `odate` date NOT NULL,
  `otime` time NOT NULL,
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `bill_no`, `prod_id`, `oqty`, `sprice`, `amount`, `odate`, `otime`, `remark`) VALUES
(2, '', '333', '1', '1000000.00', '0.00', '2022-12-13', '23:16:36', ''),
(3, '', '333', '1', '1000000.00', '0.00', '2022-12-13', '23:19:32', ''),
(4, '', '46565', '2', '10000.00', '20000.00', '2022-12-13', '23:30:33', ''),
(5, '', '46565', '3', '10000.00', '30000.00', '2022-12-13', '23:31:27', 'ໂອນ'),
(6, '', '46565', '3', '10000.00', '30000.00', '2022-12-13', '23:33:11', 'ໂອນ'),
(7, '', '123', '1', '2000.00', '0.00', '2022-12-13', '23:49:13', ''),
(9, '', '123', '4', '2000.00', '8000.00', '2022-12-13', '23:52:12', ''),
(10, '', '3333', '25', '5000.00', '125000.00', '2022-12-13', '23:54:28', ''),
(11, '', '333', '1', '1000000.00', '0.00', '2022-12-14', '19:45:12', ''),
(12, '', '333', '2', '1000000.00', '2000000.00', '2022-12-17', '00:22:30', ''),
(13, '', '333', '1', '1000000.00', '1000000.00', '2022-12-17', '23:40:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` varchar(255) NOT NULL,
  `cate_id` int(50) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `bprice` decimal(12,2) NOT NULL,
  `sprice` decimal(12,2) NOT NULL,
  `remarck` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `cate_id`, `prod_name`, `qty`, `bprice`, `sprice`, `remarck`) VALUES
('123', 33, 'ນົມສົດ', -1, '3000.00', '2000.00', ''),
('123555', 33, 'ນ້ຳປາ', 2, '300000.00', '200000.00', ''),
('333', 55, 'ສັງກະສີ', 453, '6500.00', '1000000.00', 'ໂອນ'),
('3333', 33, 'ແປັບຊີ', 0, '6000.00', '5000.00', ''),
('333333', 33, 'ນ້ຳໜາກນາວໃຫ່ຍ', 33, '7000.00', '5000.00', ''),
('46565', 33, 'ເບຍ', 4, '12000.00', '10000.00', 'ຫ້າມຂາຍຕ້ຳກວ່າ  18 ປີ'),
('6767', 33, 'ນ້ຳດື້ມ', 36, '7000.00', '5000.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `pro_id` int(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`pro_id`, `pro_name`, `remark`) VALUES
(27, 'ໄຊຍະບູລີ', ''),
(28, 'ວຽງຈັນ', ''),
(29, 'ນະຄອນຫຼວງ', ''),
(30, 'ຄຳມວ່ນ', ''),
(31, 'ຈຳປາສັກ', ''),
(32, 'ຊຽງຂວາງ', ''),
(33, 'ໄຊສົມບູນ', ''),
(34, 'ເຊກອງ', ''),
(35, 'ບໍລິຄຳໄຊ', ''),
(36, 'ບໍ່ແກ້ວ', ''),
(37, 'ຜົົ້ງສາລີ', ''),
(38, 'ສາລະວັນ', ''),
(39, 'ສະຫວັນນະເຂດ', ''),
(40, 'ຫຼວງນ້ຳທາ', ''),
(41, 'ຫຼວງພະບາງ', ''),
(42, 'ຫົວພັນ', ''),
(43, 'ອັດຕະປຶ', ''),
(44, 'ອຸດົມໄຊ', '');

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `rid` int(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `prod_id` varchar(255) NOT NULL,
  `rqty` int(255) NOT NULL,
  `bprice` decimal(12,2) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `rdate` date NOT NULL,
  `rtime` time NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receives`
--

INSERT INTO `receives` (`rid`, `bill_no`, `prod_id`, `rqty`, `bprice`, `amount`, `rdate`, `rtime`, `remark`) VALUES
(6, '', '333', 1, '6500.00', '6500.00', '2022-12-01', '07:12:27', ''),
(7, '', '333', 1, '6500.00', '6500.00', '2022-12-03', '10:47:51', ''),
(8, '', '333', 1, '6500.00', '6500.00', '2022-12-02', '10:49:30', ''),
(9, '', '333', 1, '6500.00', '6500.00', '1910-01-05', '10:50:57', ''),
(10, '', '333333', 1, '7000.00', '7000.00', '2021-12-01', '10:58:39', ''),
(11, '', '333333', 1, '7000.00', '7000.00', '2022-12-01', '10:59:17', ''),
(12, '', '333333', 1, '7000.00', '7000.00', '2022-12-01', '11:00:13', ''),
(13, '', '333333', 4, '7000.00', '28000.00', '2022-12-01', '11:00:28', ''),
(14, '', '6767', 2, '7000.00', '14000.00', '2022-12-01', '11:02:22', ''),
(15, '', '333', 1, '6500.00', '6500.00', '2022-12-01', '11:03:51', ''),
(16, '', '333333', 8, '7000.00', '56000.00', '2022-12-07', '05:02:16', ''),
(17, '', '333', 1, '6500.00', '6500.00', '2022-12-07', '05:02:39', ''),
(18, '', '3333', 2, '6000.00', '12000.00', '2022-12-10', '00:12:24', ''),
(19, '', '123', 3, '3000.00', '9000.00', '2022-12-13', '23:51:43', ''),
(20, '', '333', 1, '6500.00', '6500.00', '2022-12-28', '17:25:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `tel` varchar(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `dis_id` int(100) NOT NULL,
  `vill_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `gender`, `dob`, `tel`, `pro_id`, `dis_id`, `vill_id`, `status`, `username`, `password`, `remark`) VALUES
(3, 'ເຈດີ', 'ສິງພະຫັດ', 'ຊາຍ', '2022-12-12', '20010', 27, 48, 1, 'admin', 'Mee', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(4, 'ເຈດີ', 'ສິງພະຫັດ', 'ຊາຍ', '2022-12-16', '20010', 27, 48, 5, 'admin', 'Tan', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(5, 'ເຈດີ', 'ສິງພະຫັດ', 'ຊາຍ', '2022-12-12', '20010', 28, 59, 6, 'admin', 'jay', 'c4ca4238a0b923820dcc509a6f75849b', '');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `vill_id` int(100) NOT NULL,
  `vill_name` varchar(255) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `dis_id` int(100) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`vill_id`, `vill_name`, `pro_id`, `dis_id`, `remark`) VALUES
(1, 'ນາຕໍນ້ອຍ', 27, 48, ''),
(5, 'ລອງປໍ', 27, 48, ''),
(6, 'ໂນນສະຫວ່າງ', 28, 59, ''),
(7, 'ແສງສະຫວາງ', 28, 62, ''),
(8, 'ທ່າລາດ', 28, 62, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `vill_id` (`vill_id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`vill_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `dis_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `pro_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `receives`
--
ALTER TABLE `receives`
  MODIFY `rid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `vill_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `provinces` (`pro_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);

--
-- Constraints for table `receives`
--
ALTER TABLE `receives`
  ADD CONSTRAINT `receives_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `provinces` (`pro_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `districts` (`dis_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`vill_id`) REFERENCES `villages` (`vill_id`);

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `provinces` (`pro_id`),
  ADD CONSTRAINT `villages_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `provinces` (`pro_id`),
  ADD CONSTRAINT `villages_ibfk_3` FOREIGN KEY (`dis_id`) REFERENCES `districts` (`dis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
