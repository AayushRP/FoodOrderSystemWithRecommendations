-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 05:39 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhoklagyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_orders`
--

CREATE TABLE `available_orders` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(1, 'CHICKEN'),
(2, 'BUFF'),
(3, 'VEG'),
(4, 'DRINKS');

-- --------------------------------------------------------

--
-- Table structure for table `current_logged_admin`
--

CREATE TABLE `current_logged_admin` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `house_number` int(10) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `current_logged_deliverer`
--

CREATE TABLE `current_logged_deliverer` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `house_number` int(10) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `current_logged_user`
--

CREATE TABLE `current_logged_user` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `CHI` float NOT NULL,
  `BUF` float NOT NULL,
  `VEGG` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `house_number` int(11) NOT NULL,
  `usertype` enum('customer','deliverer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `current_order`
--

CREATE TABLE `current_order` (
  `productname` varchar(30) NOT NULL,
  `CHI` float NOT NULL,
  `BUF` float NOT NULL,
  `VEGG` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `purchaseid` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_hist`
--

CREATE TABLE `delivery_hist` (
  `purchaseid` int(11) NOT NULL,
  `date_purchase` datetime NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `customer` varchar(255) NOT NULL,
  `delivery_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_orders`
--

CREATE TABLE `new_orders` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL,
  `CHI` float NOT NULL,
  `BUF` float NOT NULL,
  `VEGG` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`, `CHI`, `BUF`, `VEGG`) VALUES
(1, 1, 'Chicken Momo', 150, 'upload/Chicken_Momo_Steam_1558947129_1559399948.png', 10, 0, 2),
(3, 3, 'Veg Momo', 120, 'upload/Veg_momo_1558947164_1559400056.jpg', 0, 0, 10),
(6, 1, 'Chicken Chilly', 200, 'upload/chickenchilly_1565338915.jpg', 10, 0, 4),
(7, 1, 'Chicken Tandoori', 190, 'upload/chickentandoori_1565339246.jpg', 10, 0, 2),
(8, 1, 'Chicken Pizza', 270, 'upload/chickenpizza_1565339745.jpeg', 8, 0, 6),
(9, 1, 'Chicken Burger', 180, 'upload/chickenburger_1565339805.jpg', 6, 0, 6),
(10, 1, 'Chicken Sekuwa', 185, 'upload/chickensekuwa_1565339902.jpeg', 10, 0, 1),
(11, 1, 'Chicken Chowmein', 120, 'upload/chickenchowmein_1565339958.jpg', 7, 0, 4),
(12, 1, 'Chicken Biryani', 400, 'upload/chickenbiryani_1565340061.png', 7, 0, 6),
(13, 4, 'Coca Cola', 50, 'upload/coke_1565340434.jpg', 0, 0, 0),
(14, 4, 'Fanta', 50, 'upload/fanta_1565340456.jpg', 0, 0, 0),
(15, 4, 'Sprite', 50, 'upload/sprite_1565340475.jpg', 0, 0, 0),
(16, 2, 'Buff Momo', 100, 'upload/buffmomo_1565340859.jpg', 0, 8.5, 2),
(17, 2, 'Buff Chowmein', 110, 'upload/buffchowmein_1565340897.jpg', 0, 8, 4),
(18, 2, 'Buff Burger', 150, 'upload/buffburger_1565340944.jpg', 0, 7, 3),
(19, 2, 'Buff Sekuwa', 80, 'upload/buffsekuwa_1565340992.jpg', 0, 10, 1),
(20, 2, 'Buff Chilly', 180, 'upload/buffchilly_1565341114.jpg', 0, 9, 3),
(21, 3, 'French Fries', 150, 'upload/frenchfries_1565341246.jpg', 0, 0, 10),
(22, 3, 'Spring Rolls', 95, 'upload/Vegetable-Spring-Rolls-1200x800_1565341296.jpg', 0, 0, 7.5),
(23, 3, 'Veg Chowmein', 100, 'upload/veg chowmin_1565341334.jpg', 0, 0, 7.2),
(24, 3, 'Veg Burger', 120, 'upload/vegburger_1565341587.jpg', 0, 0, 6.5),
(25, 3, 'Mushroom Chilly', 175, 'upload/mushroomchilly_1565341625.jpg', 0, 0, 6.8),
(26, 3, 'Butter Naan', 100, 'upload/butternan_1565341684.jpg', 0, 0, 9.2);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recom_details`
--

CREATE TABLE `recom_details` (
  `item_name` varchar(255) NOT NULL,
  `similarity` float NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `CHI` float NOT NULL,
  `BUF` float NOT NULL,
  `VEGG` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `house_number` int(11) NOT NULL,
  `usertype` enum('customer','deliverer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`first_name`, `last_name`, `email`, `mobile`, `password`, `CHI`, `BUF`, `VEGG`, `address`, `house_number`, `usertype`) VALUES
('Aayush', 'Pandey', 'aayush@gmail.com', 9841212955, '6bc80b9416b95aac0cf7757fc1bb1e65', 9, 1, 2, 'Chandol', 776, 'customer'),
('Ashish', 'KC', 'ashish@gmail.com', 9843074533, '6bc80b9416b95aac0cf7757fc1bb1e65', 0, 5, 5, 'Lazimpat', 123, 'customer'),
('Bibek', 'Bashyal', 'bibek@gmail.com', 9810134579, '6bc80b9416b95aac0cf7757fc1bb1e65', 0, 0, 0, 'Samakhusi', 456, 'deliverer'),
('Deepa', 'Shah', 'depa@gmail.com', 9841290504, '6bc80b9416b95aac0cf7757fc1bb1e65', 0, 0, 0, 'Hattiban', 658, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_orders`
--
ALTER TABLE `available_orders`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `current_logged_admin`
--
ALTER TABLE `current_logged_admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `current_logged_deliverer`
--
ALTER TABLE `current_logged_deliverer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `current_logged_user`
--
ALTER TABLE `current_logged_user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `delivery_hist`
--
ALTER TABLE `delivery_hist`
  ADD PRIMARY KEY (`purchaseid`),
  ADD UNIQUE KEY `purchaseid` (`purchaseid`);

--
-- Indexes for table `new_orders`
--
ALTER TABLE `new_orders`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_orders`
--
ALTER TABLE `available_orders`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_orders`
--
ALTER TABLE `new_orders`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
