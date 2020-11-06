-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 07:08 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
  `q` int(11) NOT NULL,
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

INSERT INTO `member` (`user_id`, `q`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `status`) VALUES
(1, 0, 'admin', 'admin', 'Dew', 'Chanayut', 'admin@gmail.com', '0954141762', 'USER'),
(2, 0, 'admin2', 'admin2', 'admin2', 'admin2', 'admin2@gmail.com', '0000000000', 'USER'),
(3, 0, 'admin3', 'admin3', 'dew', 'qws', 'asdwq@dwe.com', '0000000000', 'USER');

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
  `img_watermark` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`img_id`, `img_name`, `img_path`, `img_type`, `img_title`, `img_watermark`, `user_id`) VALUES
(21, '170.jpg', 'img/customer/170.jpg', 'image/jpeg', '0000', 'img/with-credit/result_170.jpg', 1),
(22, '1_23270290_1164002033731839_6561955943675112130_o.jpg', 'img/customer/1_23270290_1164002033731839_6561955943675112130_o.jpg', 'image/jpeg', 'gene', 'img/with-credit/result_1_23270290_1164002033731839_6561955943675112130_o.jpg', 1),
(23, '1__DSC5867.JPG', 'img/customer/1__DSC5867.JPG', 'image/jpeg', '0000', 'img/with-credit/result_1__DSC5867.JPG', 1),
(24, '1__DSC5867.JPG', 'img/customer/1__DSC5867.JPG', 'image/jpeg', '0000', 'img/with-credit/result_1__DSC5867.JPG', 1),
(25, '1__DSC5867.JPG', 'img/customer/1__DSC5867.JPG', 'image/jpeg', '0000', 'img/with-credit/result_1__DSC5867.JPG', 1);

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
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
