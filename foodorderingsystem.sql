-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 03:37 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorderingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shipping_address` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `total_price` float NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `approved` tinyint(100) NOT NULL DEFAULT '0',
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `receive_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `shipping_address`, `first_name`, `last_name`, `total_price`, `status`, `approved`, `paid`, `receive_status`) VALUES
(1, 2, '2018-11-04 02:21:11', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 'Ali', 'Baba', 48, 'close', 0, 1, 1),
(2, 2, '2018-10-30 02:35:49', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 'Ali', 'Baba', 60, 'close', 0, 1, 0),
(3, 2, '2018-11-04 02:50:47', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 'Ali', 'Baba', 72, 'close', 0, 1, 0),
(4, 2, '2018-11-04 02:50:55', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 'Ali', 'Baba', 105, 'close', 0, 1, 0),
(5, 2, '2018-11-06 04:23:21', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 'Ali', 'Baba', 84, 'close', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `order_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `product_name`, `price`, `order_id`, `date`) VALUES
(1, 'beef burger', 6.99, 1, '2018-09-26 04:39:41'),
(2, 'beef burger', 6.99, 1, '2018-09-26 04:39:41'),
(3, 'beef burger', 6.99, 1, '2018-09-26 04:39:41'),
(4, 'beef burger', 6.99, 1, '2018-09-26 04:39:41'),
(5, 'beef burger', 6.99, 1, '2018-09-26 04:39:41'),
(6, 'beef burger', 6.99, 4, '2018-09-30 02:35:42'),
(7, 'beef burger', 6.99, 4, '2018-09-30 02:35:42'),
(8, 'beef burger', 6.99, 4, '2018-09-30 02:35:42'),
(9, 'cheese burger', 2, 5, '2018-09-30 07:25:10'),
(10, 'cheese burger', 2, 6, '2018-10-05 04:49:48'),
(11, 'cheese burger', 2, 6, '2018-10-05 04:49:48'),
(12, 'cheese burger', 2, 6, '2018-10-05 04:49:49'),
(13, 'cheese burger', 2, 6, '2018-10-05 04:49:49'),
(14, 'gaga', 12, 7, '2018-10-16 03:18:29'),
(15, 'gaga', 12, 7, '2018-10-16 03:18:29'),
(16, 'gaga', 12, 7, '2018-10-16 03:18:29'),
(17, 'gaga', 12, 7, '2018-10-16 03:18:29'),
(18, 'gaga', 12, 7, '2018-10-16 03:18:29'),
(19, 'gaga', 12, 8, '2018-10-16 03:19:10'),
(20, 'gaga', 12, 8, '2018-10-16 03:19:10'),
(21, 'tata', 21, 9, '2018-10-21 01:59:47'),
(22, 'tata', 21, 9, '2018-10-21 01:59:47'),
(23, 'tata', 21, 10, '2018-10-21 09:52:52'),
(24, 'tata', 21, 10, '2018-10-21 09:52:52'),
(25, 'tata', 21, 10, '2018-10-21 09:52:52'),
(26, 'tata', 21, 10, '2018-10-21 09:52:52'),
(27, 'gaga', 12, 11, '2018-10-23 02:36:53'),
(28, 'gaga', 12, 11, '2018-10-23 02:36:53'),
(29, 'gaga', 12, 11, '2018-10-23 02:36:53'),
(30, 'gaga', 12, 11, '2018-10-23 02:36:54'),
(31, 'gaga', 12, 11, '2018-10-23 02:36:54'),
(32, 'beef burger', 12, 12, '2018-10-23 03:52:04'),
(33, 'beef burger', 12, 12, '2018-10-23 03:52:04'),
(34, 'beef burger', 12, 12, '2018-10-23 03:52:04'),
(35, 'beef burger', 12, 12, '2018-10-23 03:52:04'),
(36, 'beef burger', 12, 1, '2018-10-28 12:55:05'),
(37, 'beef burger', 12, 1, '2018-10-28 12:55:05'),
(38, 'beef burger', 12, 1, '2018-10-28 12:55:05'),
(39, 'beef burger', 12, 1, '2018-10-28 12:55:05'),
(40, 'beef burger', 12, 2, '2018-10-30 02:34:56'),
(41, 'beef burger', 12, 2, '2018-10-30 02:34:57'),
(42, 'beef burger', 12, 2, '2018-10-30 02:34:57'),
(43, 'beef burger', 12, 2, '2018-10-30 02:34:57'),
(44, 'beef burger', 12, 2, '2018-10-30 02:34:57'),
(45, 'beef burger', 12, 3, '2018-11-04 02:21:29'),
(46, 'beef burger', 12, 3, '2018-11-04 02:21:29'),
(47, 'beef burger', 12, 3, '2018-11-04 02:21:29'),
(48, 'beef burger', 12, 3, '2018-11-04 02:21:29'),
(49, 'beef burger', 12, 3, '2018-11-04 02:21:29'),
(50, 'beef burger', 12, 3, '2018-11-04 02:21:29'),
(51, 'tata', 21, 4, '2018-11-04 02:45:38'),
(52, 'tata', 21, 4, '2018-11-04 02:45:38'),
(53, 'tata', 21, 4, '2018-11-04 02:45:38'),
(54, 'tata', 21, 4, '2018-11-04 02:45:38'),
(55, 'tata', 21, 4, '2018-11-04 02:45:38'),
(56, 'gaga', 21, 5, '2018-11-04 03:02:43'),
(57, 'gaga', 21, 5, '2018-11-04 03:02:43'),
(58, 'gaga', 21, 5, '2018-11-04 03:02:43'),
(59, 'gaga', 21, 5, '2018-11-04 03:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `image_name` varchar(1000) NOT NULL,
  `product_price` float NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'In Stock',
  `unit` int(100) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `image_name`, `product_price`, `status`, `unit`, `description`, `is_deleted`) VALUES
(11, 'chicken burger', '11.jpg', 12, 'In Stock', 21, 'dsadas', 0),
(12, 'tata', '12.jpg', 21, 'In Stock', 21, '2121', 0),
(13, 'tata', '13.jpg', 21, 'In Stock', 21, 'sw', 0),
(14, 'rabbit burger', '14.jpg', 21, 'In Stock', 21, 'dsadsad', 0),
(15, 'beef burger', '15.jpg', 12, 'In Stock', 2, '2121', 0),
(16, 'cat burger', '16.jpg', 212, 'In Stock', 21212, 'dasdsadsa', 0),
(17, 'gaga', '17.jpg', 21, 'In Stock', 21, '2121', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image_name` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `pass` varchar(100) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image_name`, `email`, `role`, `pass`, `first_name`, `last_name`, `address`, `age`, `contact_no`, `created_at`, `is_deleted`) VALUES
(1, '1.png', 'admin@gmail.com', 'admin', '123456', 'cheam ', 'hau han', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 21, '174353910', '2018-09-10 03:17:34', 0),
(2, '2.jpg', 'ali@gmail.com', 'user', '123456', 'Ali', 'Baba', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 25, '174353910', '2018-09-10 15:00:27', 0),
(3, '3.jpg', 'baba@gmail.com', 'user', '123456', 'cheam', 'hau han', 'kedah', 16, '174353910', '2018-09-16 08:15:05', 1),
(4, '4.jpg', 'ali@gmail.comgogo', 'user', '123456', 'cheam', 'han', '23', 16, '174353910', '2018-09-16 08:18:08', 1),
(10, '10.jpg', '2B@gmail.com', 'user', '123456', '2B', '2B', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 19, '174353910', '2018-10-06 04:57:48', 0),
(11, '11.png', 'hauhan1993@gmail.com', 'user', '', 'cheam', 'han', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 22, '174353910', '2018-10-15 14:52:26', 0),
(12, NULL, 'dada@gmail.com', 'user', '123456', 'cheam', 'han', 'kedah', 16, '174353910', '2018-10-21 01:59:14', 1),
(13, '13.png', 'yrtrwtrere@gmail.com', 'user', '123456', 'cheam', 'han', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 16, '174353910', '2018-10-21 09:20:43', 0),
(14, '14.jpg', 'admin@gmail.comfafaf', 'user', '123456', 'cheam', 'han', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 16, '174353910', '2018-10-21 09:22:29', 0),
(15, '15.png', 'dswqd@gmail.com', 'user', '123456', 'cheam', 'han', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 16, '174353910', '2018-10-21 09:23:25', 0),
(16, '16.jpg', 'ff@gmail.com', 'user', '123456', 'cheam', 'han', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 16, '174353910', '2018-10-21 09:23:39', 0),
(17, '17.png', 'admibvn@gmail.com', 'user', '123456', 'cheam', 'han', '16,Lorong 66,Taman Patani Jaya,08000,Sungai Petani,Kedah', 16, '174353910', '2018-10-21 09:24:33', 0),
(18, NULL, 'fdvn@gmail.com', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-21 09:25:52', 1),
(19, NULL, 'g@gmail.com', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-21 09:26:15', 1),
(20, NULL, 'g@gmail.com22', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-21 09:26:44', 1),
(21, NULL, 'g@gmail.com22ds', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-21 09:28:10', 1),
(22, NULL, 'gdsa@gmail.com22ds', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-21 09:30:48', 1),
(23, NULL, 'trexn@gmail.com', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-21 09:31:42', 1),
(24, NULL, 'hans@gmail.com', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-21 09:32:31', 1),
(25, NULL, 'jaja@gmail.com', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-23 03:51:41', 0),
(26, NULL, 'VWZEJFQCVT@gmail.com', 'user', '123456', 'Harry', 'Flores', '24', 0, '0123456672', '2018-10-29 14:22:19', 0),
(27, NULL, 'rara@gmail.com', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-29 14:23:31', 0),
(28, NULL, '91TDNH60XT@gmail.com', 'user', '123456', 'Lily', 'Robinson', '35', 0, '0152263391', '2018-10-29 14:24:19', 0),
(29, NULL, 'dsadsad@gmail.com', 'user', '123456', 'cheam', 'han', '21', 16, '174353910', '2018-10-29 14:24:37', 0),
(30, NULL, 'ESBJUHPB6I@gmail.com', 'user', '123456', 'Alice', 'Robinson', '50', 0, '0182223333', '2018-10-29 14:26:02', 0),
(31, NULL, 'RLQBKAAGDD@gmail.com', 'user', '123456', 'Taurus', 'Phillips', '12', 0, '0132223901', '2018-10-29 14:26:46', 0),
(32, NULL, 'J3UZFUJA9Y@gmail.com', 'user', '123456', 'Ron', 'Robinson', '33', 0, '0123456672', '2018-10-29 14:27:29', 0),
(33, NULL, '3WMUP2GGJR@gmail.com', 'user', '123456', 'Taurus', 'Brown', '37', 0, '0189223711', '2018-10-29 14:28:20', 0),
(34, NULL, '19BLDEWN44@gmail.com', 'user', '123456', 'Ron', 'Williams', '36', 0, '0116227381', '2018-10-29 14:32:12', 0),
(35, NULL, '1B0QVU7WS0@gmail.com', 'user', '123456', 'Shiny', 'Smith', '9', 0, '0152263391', '2018-10-30 02:59:02', 0),
(36, NULL, 'I6BH5VX0LS@gmail.com', 'user', '123456', 'Harry', 'Williams', '18', 0, '0123456672', '2018-10-30 03:05:49', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
