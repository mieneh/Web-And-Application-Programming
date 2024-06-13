-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 11:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doancuoikiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `airport` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `code`, `airport`) VALUES
(1, 'HAN', 'Sân bay Quốc tế Nội Bài'),
(2, 'SGN', 'Sân bay Quốc tế Tân Sơn Nhất'),
(3, 'DAD', 'Sân bay Quốc tế Đà Nẵng'),
(4, 'VDO', 'Sân bay Quốc tế Vân Đồn'),
(5, 'HPH', 'Sân bay Quốc tế Cát Bi'),
(6, 'VII', 'Sân bay Quốc tế Vinh'),
(7, 'HUI', 'Sân bay Quốc tế Phú Bài'),
(8, 'CXR', 'Sân bay Quốc tế Cam Ranh'),
(9, 'DLI', 'Sân bay Quốc tế Liên Khương'),
(10, 'UIH', 'Sân bay Quốc tế Phù Cát'),
(11, 'VCA', 'Sân bay Quốc tế Cần Thơ'),
(12, 'PQC', 'Sân bay Quốc tế Phú Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `flight_id`, `fullname`, `gender`, `phone`, `email`, `address`) VALUES
(1, 1, 'Đinh Phương My', 'Nữ', '0374773039', 'dpm2003@gmail.com', 'Đồng Nai'),
(2, 2, 'User 4', 'Nam', '', 'user04@gmail.com', 'Hà Nội'),
(3, 1, 'User 7', '', '', 'user07@gmail.com', ''),
(4, 4, 'User 5', 'Nữ', '', 'user05@gmail.com', 'Bình Dương'),
(5, 2, 'User 10', '', '', 'user10@gmail.com', 'Tp Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `origin` int(30) DEFAULT NULL,
  `destination` int(30) DEFAULT NULL,
  `departure_datetime` datetime NOT NULL,
  `arrival_datetime` datetime NOT NULL,
  `seats` int(10) NOT NULL DEFAULT 0,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `code`, `origin`, `destination`, `departure_datetime`, `arrival_datetime`, `seats`, `price`) VALUES
(1, 'VNA-000', 1, 2, '2023-04-30 19:25:00', '2023-05-01 09:50:00', 22, 2700000),
(2, 'QH-001', 2, 3, '2023-04-30 06:20:00', '2023-04-30 14:50:00', 25, 2800000),
(3, 'VJ-002', 3, 4, '2023-04-29 06:35:00', '2023-04-29 15:10:00', 23, 2000000),
(4, 'BL-003', 4, 5, '2023-05-15 06:20:00', '2023-05-15 14:50:00', 20, 1700000),
(5, 'VNA-004', 5, 6, '2023-05-30 06:35:00', '2023-05-30 15:10:00', 10, 1900000),
(6, 'QH-005', 6, 7, '2023-05-30 06:20:00', '2023-05-30 14:50:00', 19, 2300000),
(7, 'VJ-006', 7, 8, '2023-05-30 06:35:00', '2023-05-30 15:10:00', 23, 1900000),
(8, 'BL-007', 8, 9, '2023-04-30 06:20:00', '2023-04-30 14:50:00', 25, 2200000),
(9, 'VNA-008', 9, 10, '2023-04-24 19:25:00', '2023-04-25 09:50:00', 21, 2500000),
(10, 'QH-009', 10, 11, '2023-04-24 06:20:00', '2023-04-24 14:50:00', 18, 2900000),
(11, 'BL-010', 11, 12, '2023-04-22 06:35:00', '2023-04-22 15:10:00', 20, 2700000),
(12, 'GD-000', 2, 1, '2023-04-30 19:25:00', '2023-05-01 09:50:00', 22, 2700000),
(13, 'GD-001', 3, 2, '2023-04-30 06:20:00', '2023-04-30 14:50:00', 25, 2800000),
(14, 'GD-002', 4, 3, '2023-04-29 06:35:00', '2023-04-29 15:10:00', 23, 2000000),
(15, 'GD-003', 5, 4, '2023-05-15 06:20:00', '2023-05-15 14:50:00', 20, 1700000),
(16, 'GD-004', 6, 5, '2023-05-30 06:35:00', '2023-05-30 15:10:00', 10, 1900000),
(17, 'GD-005', 7, 6, '2023-05-30 06:20:00', '2023-05-30 14:50:00', 19, 2300000),
(18, 'GD-006', 8, 7, '2023-05-30 06:35:00', '2023-05-30 15:10:00', 23, 1900000),
(19, 'GD-007', 9, 8, '2023-04-30 06:20:00', '2023-04-30 14:50:00', 25, 2200000),
(20, 'GD-008', 10, 9, '2023-04-24 19:25:00', '2023-04-25 09:50:00', 21, 2500000),
(21, 'GD-009', 11, 10, '2023-04-24 06:20:00', '2023-04-24 14:50:00', 18, 2900000),
(22, 'GD-010', 12, 11, '2023-04-22 06:35:00', '2023-04-22 15:10:00', 20, 2700000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `isAdmin` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `fullname`, `birthday`, `address`, `gender`, `phone`, `avatar`, `isAdmin`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 'Admin', '0000-00-00', NULL, '', '', '', b'1'),
(2, 'dpm', 'e10adc3949ba59abbe56e057f20f883e', '52100703@student.edu.vn', 'Đinh Phương My', '0000-00-00', NULL, 'Nữ', '0374773039', '', b'0'),
(3, 'ndat', 'e10adc3949ba59abbe56e057f20f883e', '52100594@student.edu.vn', 'Nguyễn Đình Ái Trinh', '0000-00-00', NULL, '', '', '', b'0'),
(4, 'dqn', 'e10adc3949ba59abbe56e057f20f883e', '52100099@student.edu.vn', 'Đặng Như Quỳnh', '0000-00-00', NULL, '', '', '', b'0'),
(5, 'httm', 'e10adc3949ba59abbe56e057f20f883e', '52100704@student.edu.vn', 'Huỳnh Thị Trà My', '0000-00-00', NULL, '', '', '', b'0'),
(6, 'user01', 'e10adc3949ba59abbe56e057f20f883e', 'user01@gmail.com', 'User 1', '0000-00-00', NULL, '', '', '', b'0'),
(7, 'user02', 'e10adc3949ba59abbe56e057f20f883e', 'user02@gmail.com', 'User 2', '0000-00-00', NULL, '', '', '', b'0'),
(8, 'user03', 'e10adc3949ba59abbe56e057f20f883e', 'user03@gmail.com', 'User 3', '0000-00-00', NULL, '', '', '', b'0'),
(9, 'user04', 'e10adc3949ba59abbe56e057f20f883e', 'user04@gmail.com', 'User 4', '0000-00-00', NULL, '', '', '', b'0'),
(10, 'user05', 'e10adc3949ba59abbe56e057f20f883e', 'user05@gmail.com', 'User 5', '0000-00-00', NULL, '', '', '', b'0'),
(11, 'user06', 'e10adc3949ba59abbe56e057f20f883e', 'user06@gmail.com', 'User 6', '0000-00-00', NULL, '', '', '', b'0'),
(12, 'user07', 'e10adc3949ba59abbe56e057f20f883e', 'user07@gmail.com', 'User 7', '0000-00-00', NULL, '', '', '', b'0'),
(13, 'user08', 'e10adc3949ba59abbe56e057f20f883e', 'user08@gmail.com', 'User 8', '0000-00-00', NULL, '', '', '', b'0'),
(14, 'user09', 'e10adc3949ba59abbe56e057f20f883e', 'user09@gmail.com', 'User 9', '0000-00-00', NULL, '', '', '', b'0'),
(15, 'user10', 'e10adc3949ba59abbe56e057f20f883e', 'user10@gmail.com', 'User 10', '0000-00-00', NULL, '', '', '', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_flight_id` (`flight_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `FK_origin_airport_id` (`origin`),
  ADD KEY `FK_destination_airport_id` (`destination`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_flight_id` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`);

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `FK_destination_airport_id` FOREIGN KEY (`destination`) REFERENCES `airport` (`id`),
  ADD CONSTRAINT `FK_origin_airport_id` FOREIGN KEY (`origin`) REFERENCES `airport` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
