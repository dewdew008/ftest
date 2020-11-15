-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2020 at 08:00 AM
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
-- Database: `shoot`
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
(1, 'admin', 'abcwh', 'Dew', 'Chanayut', 'admin@gmail.com', '0954141762', 'USER'),
(2, 'admin2', 'abcwh8', 'admin2', 'admin2', 'admin2@gmail.com', '0000000000', 'USER'),
(3, 'admin3', 'abcwhD', 'dew', 'qws', 'asdwq@dwe.com', '0000000000', 'USER'),
(5, 'test', 'TeWT', 'ยีน', 'test', 'thanathorn002@gmail.com', '0000000000', 'USER'),
(6, 'Gene013', 'paWKhqVD', 'Thanathorn', 'Songpinit', 'thanathorn001@gmail.com', '0829919610', 'USER');

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
(25, '1__DSC5867.JPG', 'img/customer/1__DSC5867.JPG', 'image/jpeg', '0000', 'img/with-credit/result_1__DSC5867.JPG', 1),
(26, '2_blogmedia-32872.jpg', 'img/customer/2_blogmedia-32872.jpg', 'image/jpeg', '00', 'img/with-credit/result_2_blogmedia-32872.jpg', 2),
(29, '6_70.jpg', 'img/customer/6_70.jpg', 'image/jpeg', 'ss', 'img/with-credit/result_6_70.jpg', 6),
(31, '6_23270290_1164002033731839_6561955943675112130_o.jpg', 'img/customer/6_23270290_1164002033731839_6561955943675112130_o.jpg', 'image/jpeg', 'gene', 'img/with-credit/result_6_23270290_1164002033731839_6561955943675112130_o.jpg', 6),
(33, '6_99-1.jpg', 'img/customer/6_99-1.jpg', 'image/jpeg', 'test', 'img/with-credit/result_6_99-1.jpg', 6),
(35, '6_0CA5ADBC-3FC3-4D34-BCB8-7793F3286B6E - Pawanrat SANGKHTHORN.jpeg', 'img/customer/6_0CA5ADBC-3FC3-4D34-BCB8-7793F3286B6E - Pawanrat SANGKHTHORN.jpeg', 'image/jpeg', '0', 'img/with-credit/result_6_0CA5ADBC-3FC3-4D34-BCB8-7793F3286B6E - Pawanrat SANGKHTHORN.jpeg', 6),
(37, '6_Annotation 2020-07-21 143604.png', 'img/customer/6_Annotation 2020-07-21 143604.png', 'image/png', '00', 'img/with-credit/result_6_Annotation 2020-07-21 143604.png', 6);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
