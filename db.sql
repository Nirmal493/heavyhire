-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2023 at 03:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heavyhire`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `acc_id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_id`, `email`, `pass`, `type_id`, `name`, `phone`) VALUES
(1, 'abhinav@gmail.com', 'abhinav', 2, 'Abhinav', '+919778393558'),
(2, 'abhinavcv007@gmail.com', 'Abhinav7zz!', 2, 'Abhinav C V', ''),
(3, 'jishnu@gmail.com', 'jishnu', 2, 'ishnu', ''),
(4, 'jishnu@gmail.com', 'jishnu', 2, 'ishnu', ''),
(5, 'abbas@gmail.com', 'abbas', 1, 'abbas', '+9123423423'),
(20, 'abhinavcv009@gmail.com', 'abhinav', 2, 'abhinav', '+919778393558');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `acc_id` int(100) NOT NULL,
  `address` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `avai_id` int(100) NOT NULL,
  `acc_id` int(100) NOT NULL,
  `v_id` int(100) NOT NULL,
  `from_id` int(100) NOT NULL,
  `to_id` int(100) NOT NULL,
  `tfrom` time(6) NOT NULL,
  `tto` time(6) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`avai_id`, `acc_id`, `v_id`, `from_id`, `to_id`, `tfrom`, `tto`, `phone`, `image`) VALUES
(16, 5, 3, 1, 12, '09:45:00.000000', '10:30:00.000000', '+919778393558', 'istockphoto-859916128-612x612.jpg'),
(17, 5, 3, 14, 19, '09:45:00.000000', '10:30:00.000000', '+919778393558', 'istockphoto-1156528620-612x612.jpg'),
(18, 5, 3, 11, 17, '09:45:00.000000', '10:30:00.000000', '+919778393558', 'istockphoto-1284419710-612x612.jpg'),
(19, 5, 3, 8, 13, '09:45:00.000000', '10:30:00.000000', '+919778393558', 'istockphoto-1355096028-170667a.webp');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(100) NOT NULL,
  `avai_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `driver_id` int(100) NOT NULL,
  `pick_up` varchar(200) NOT NULL,
  `drop_off` varchar(200) NOT NULL,
  `type` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `avai_id`, `user_id`, `driver_id`, `pick_up`, `drop_off`, `type`) VALUES
(33, 16, 1, 5, '', '', 0),
(34, 17, 1, 5, '', '', 2),
(35, 18, 1, 5, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--
-- Error reading structure for table heavyhire.chat: #1932 - Table 'heavyhire.chat' doesn't exist in engine
-- Error reading data for table heavyhire.chat: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `heavyhire`.`chat`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chatid` int(11) NOT NULL,
  `sender_acc_id` int(11) NOT NULL,
  `reciever_acc_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `sender_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chatid`, `sender_acc_id`, `reciever_acc_id`, `message`, `timestamp`, `status`, `sender_name`) VALUES
(43, 1, 5, 'hi', '2023-07-31 09:39:46', 1, 'Abhinav'),
(44, 1, 5, 'hello', '2023-07-31 09:48:02', 1, 'Abhinav'),
(45, 1, 5, 'yolo', '2023-07-31 09:48:23', 1, 'Abhinav'),
(46, 0, 1, 'hi', '2023-07-31 09:55:02', 1, 'null'),
(47, 0, 1, 'hello', '2023-07-31 09:55:07', 1, 'null'),
(48, 5, 1, 'hi im abbas', '2023-07-31 09:56:19', 1, 'abbas'),
(49, 1, 5, 'hello again', '2023-07-31 11:39:34', 1, 'Abhinav'),
(50, 1, 5, 'hey!', '2023-07-31 11:41:19', 1, 'abbas'),
(53, 5, 1, 'yo', '2023-07-31 11:43:14', 1, 'Abhinav'),
(56, 5, 1, 'hey again', '2023-07-31 11:52:18', 1, 'abbas'),
(57, 5, 1, 'can you see', '2023-07-31 11:54:00', 1, 'abbas'),
(58, 1, 5, 'yes', '2023-07-31 11:54:07', 1, 'Abhinav'),
(59, 1, 5, 'test', '2023-07-31 11:54:14', 1, 'Abhinav');

-- --------------------------------------------------------

--
-- Table structure for table `drivinglicense`
--

CREATE TABLE `drivinglicense` (
  `acc_id` int(100) NOT NULL,
  `dlno` int(100) NOT NULL,
  `expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_dir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_dir`) VALUES
('64ac46b41b6fc_favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `loc`
--

CREATE TABLE `loc` (
  `loc_id` int(100) NOT NULL,
  `loc_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loc`
--

INSERT INTO `loc` (`loc_id`, `loc_name`) VALUES
(1, 'Kannur'),
(2, 'Kasargod'),
(3, 'Andhra Pradesh'),
(4, 'Arunachal Pradesh'),
(5, 'Assam'),
(6, 'Bihar'),
(7, 'Chhattisgarh'),
(8, 'Goa'),
(9, 'Gujarat'),
(10, 'Haryana'),
(11, 'Himachal Pradesh'),
(12, 'Jharkhand'),
(13, 'Karnataka'),
(14, 'Kerala'),
(15, 'Madhya Pradesh'),
(16, 'Maharashtra'),
(17, 'Manipur'),
(18, 'Meghalaya'),
(19, 'Mizoram'),
(20, 'Nagaland'),
(21, 'Odisha'),
(22, 'Punjab'),
(23, 'Rajasthan'),
(24, 'Sikkim'),
(25, 'Tamil Nadu'),
(26, 'Telangana'),
(27, 'Tripura'),
(28, 'Uttar Pradesh'),
(29, 'Uttarakhand'),
(30, 'West Bengal'),
(31, 'Thiruvananthapuram'),
(32, 'Kollam'),
(33, 'Pathanamthitta'),
(34, 'Alappuzha'),
(35, 'Kottayam'),
(36, 'Idukki'),
(37, 'Ernakulam'),
(38, 'Thrissur'),
(39, 'Palakkad'),
(40, 'Malappuram'),
(41, 'Kozhikode'),
(42, 'Wayanad'),
(43, 'Kannur'),
(44, 'Kasaragod'),
(45, 'Mumbai'),
(46, 'Delhi'),
(47, 'Bangalore'),
(48, 'Kolkata'),
(49, 'Chennai'),
(50, 'Hyderabad'),
(51, 'Pune'),
(52, 'Ahmedabad'),
(53, 'Surat'),
(54, 'Jaipur'),
(55, 'Lucknow'),
(56, 'Kanpur'),
(57, 'Nagpur'),
(58, 'Indore'),
(59, 'Bhopal'),
(60, 'Vadodara'),
(61, 'Coimbatore'),
(62, 'Ludhiana'),
(63, 'Agra'),
(64, 'Varanasi'),
(65, 'Patna'),
(66, 'Bhubaneswar'),
(67, 'Amritsar'),
(68, 'Vijayawada'),
(69, 'Guwahati'),
(70, 'Kochi'),
(71, 'Visakhapatnam'),
(72, 'Jodhpur'),
(73, 'Chandigarh'),
(74, 'Srinagar'),
(75, 'Mysore'),
(76, 'Dehradun'),
(77, 'Nashik'),
(78, 'Aurangabad'),
(79, 'Thane'),
(80, 'Jalandhar'),
(81, 'Raipur'),
(82, 'Gwalior'),
(83, 'Vijayawada'),
(84, 'Trivandrum'),
(85, 'Madurai'),
(86, 'Warangal'),
(87, 'Jamshedpur'),
(88, 'Faridabad'),
(89, 'Rajkot'),
(90, 'Jabalpur'),
(91, 'Ghaziabad'),
(92, 'Ludhiana'),
(93, 'Kanpur'),
(94, 'Noida'),
(95, 'Vadodara'),
(96, 'Patna'),
(97, 'Gurgaon');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `star_id` int(100) NOT NULL,
  `acc_id` int(100) NOT NULL,
  `rating` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`star_id`, `acc_id`, `rating`, `user_id`) VALUES
(7, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `type_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `name`) VALUES
(1, 'driver'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(100) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `insurance` int(100) NOT NULL,
  `reg_no` int(100) NOT NULL,
  `exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `acc_id`, `brand`, `model`, `insurance`, `reg_no`, `exp_date`) VALUES
(3, 5, 'Ashok Leyland new', 'Random Model new', 123123, 1231231123, '2023-12-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`avai_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `loc`
--
ALTER TABLE `loc`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`star_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `avai_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `loc`
--
ALTER TABLE `loc`
  MODIFY `loc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `star_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
