-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 02:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `firstname` varchar(1000) NOT NULL,
  `lastname` varchar(1000) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `status`) VALUES
(1, 'admin', 'admin', 'Dew', 'Chanayut', 'admin@gmail.com', '0954141762', 'USER'),
(2, 'admin2', 'admin2', 'admin2', 'admin2', 'admin2@gmail.com', '0000000000', 'USER'),
(3, 'admin3', 'admin3', 'dew', 'qws', 'asdwq@dwe.com', '0000000000', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `img_path` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `img_type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `img_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`img_id`, `img_name`, `img_path`, `img_type`, `img_title`, `user_id`) VALUES
(2, 'C:\\xampp\\tmp\\php9792.tmp', 'img/_DSC5867.JPG', 'image/jpeg', 'valentine2', 1),
(3, 'C:\\xampp\\tmp\\php1CB6.tmp', 'img/99-1.jpg', 'image/jpeg', 'studio', 2),
(4, 'C:\\xampp\\tmp\\phpB98B.tmp', 'img/_DSC7347.jpg', 'image/jpeg', 'To be Ku', 1),
(5, 'C:\\xampp\\tmp\\php328.tmp', 'img/PUN_9960.JPG', 'image/jpeg', 'To be KU 2', 1),
(6, 'C:\\xampp\\tmp\\php7D79.tmp', 'img/IMG_2294.jpg', 'image/jpeg', 'add photo', 1),
(7, 'C:\\xampp\\tmp\\php88C0.tmp', 'img/art-baanmok.png', 'image/png', 'art-bannmok', 1),
(8, 'C:\\xampp\\tmp\\php36B6.tmp', 'img/art-baanmok.png', 'image/png', 'art-bannmok', 1),
(9, 'C:\\xampp\\tmp\\phpC9E3.tmp', 'img/china-oil-paper-umbrella-red-png-favpng-GhLyZmmr6NDmdsz394DkzrHfm.jpg', 'image/jpeg', 'ad', 1),
(10, 'C:\\xampp\\tmp\\php2936.tmp', 'img/112-1129024_chefs-uniform-cook-hat-chef-hat-cartoon-png.png', 'image/png', 'ad23', 1),
(11, 'C:\\xampp\\tmp\\phpFEA8.tmp', 'img/ผศ.ดร.อมรฤทธิ์  พุทธิพิพัฒน์ขจร.jpg', 'image/jpeg', 'อมรฤทธิ์', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`img_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `member` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
