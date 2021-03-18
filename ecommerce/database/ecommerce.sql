-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 04:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `country` varchar(10) NOT NULL,
  `addressType` enum('shipping','billing') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`) VALUES
(1, 10, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(3, 10, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(4, 11, 'ahmedabad', 'ahmedabad', 'gujarat', '380006', 'india', 'shipping'),
(5, 11, 'ahmedabad', 'ahmedabad', 'gujarat', '380006', 'india', 'billing'),
(6, 1, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(7, 2, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(8, 3, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(9, 4, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(10, 5, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(11, 6, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(12, 7, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(13, 8, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(14, 9, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(16, 1, 'surat', 'surat', 'gujarat', '395004', 'india', 'billing'),
(17, 3, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(18, 4, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(19, 5, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(20, 6, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(21, 7, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(22, 8, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(23, 9, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping'),
(26, 2, 'surat', 'surat', 'gujarat', '395004', 'india', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(12) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 'sumit', 'sumit1999', '1', '2021-02-25 11:03:30', '0000-00-00 00:00:00'),
(3, 'prasad', 'prasad123', '1', '2021-02-28 13:53:07', '0000-00-00 00:00:00'),
(4, 'dhruvin', 'sumit1999', '1', '2021-02-28 23:29:44', '2021-03-11 09:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('product','category') NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(20) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'product', 'color', 'color', 'select', 'varchar', 1, ''),
(2, 'product', 'price', 'pricefilter', 'checkbox', 'varchar', 1, ''),
(4, 'product', 'Material', 'material', 'select', 'varchar', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(12, '0-1000', 2, 0),
(13, '1000-5000', 2, 1),
(14, '5000-10000', 2, 2),
(26, '10000-20000', 2, 3),
(27, '20000-50000', 2, 4),
(28, '50000+', 2, 5),
(29, 'black', 1, 0),
(30, 'silver', 1, 1),
(31, 'white', 1, 3),
(32, 'leather', 4, 0),
(33, 'fabric', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(12) NOT NULL,
  `parentCategory` int(10) NOT NULL,
  `path` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentCategory`, `path`, `name`, `status`, `description`) VALUES
(1, 0, '1', 'Living Room', '1', 'Living Room'),
(2, 0, '2', 'Bed Room', '1', 'Bed Room'),
(3, 0, '3', 'Kitchen & Dining', '1', 'Kitchen & Dining'),
(4, 0, '4', 'office Room', '1', 'office Room'),
(6, 0, '6', 'gameRoom', '1', 'gameroom');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `pageId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `uniqueKey` varchar(50) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`pageId`, `title`, `uniqueKey`, `content`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 'Apple Macbook', 'apple', '<p>Apple</p>', '1', '0000-00-00 00:00:00', '2021-03-09 05:23:18'),
(3, 'contact us', 'contact us', '<p><strong>contact us</strong></p>', '1', '2021-03-08 17:06:15', '2021-03-09 05:20:10'),
(4, 'about us', 'about us', '<p><i><strong>hello,</strong></i></p>', '1', '2021-03-09 06:22:43', '2021-03-09 06:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `customerGroup` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerGroup`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 1, 'sumit', 'sapoliya', 'sapoliyasumit5674@gmail.com', '7990806058', 'sumit1999', '1', '2021-02-16 13:22:56', '2021-03-17 10:04:00'),
(2, 1, 'sumit', 'sapoliya', 'sapoliyasumit5674@gmail.com', '7990806058', 'sumit1999', '1', '2021-02-16 13:22:56', '0000-00-00 00:00:00'),
(4, 1, 'sumit', 'sapoliya', 'sapoliyasumit5674@gmail.com', '7990806058', 'sumit1999', '1', '2021-02-16 13:22:56', '0000-00-00 00:00:00'),
(5, 1, 'sumit', 'sapoliya', 'sapoliyasumit5674@gmail.com', '7990806058', 'sumit1999', '1', '2021-02-16 13:22:56', '0000-00-00 00:00:00'),
(6, 1, 'sumit', 'sapoliya', 'sapoliyasumit5674@gmail.com', '7990806058', 'sumit1999', '1', '2021-02-16 13:22:56', '0000-00-00 00:00:00'),
(8, 1, 'gunatit', 'gyan', 'gunatit@gmail.com', '7567500914', 'ssr1999', '1', '2021-02-17 09:56:38', '2021-02-28 16:58:34'),
(9, 1, 'gunatit', 'gyan', 'gunatit@gmail.com', '7567500914', 'beb16f7d99290c72886b05332c6eab0a', '1', '2021-02-17 09:57:13', '2021-02-28 18:50:36'),
(10, 1, 'prasad', 'SONANI', 'PRASADSONANI4444@GMAIL.COM', '7567500914', 'b4af804009cb036a4ccdc33431ef9ac9', '1', '2021-02-17 09:57:50', '2021-03-01 10:08:53'),
(11, 1, 'sumitsapoliya', 'sapoliya', 'sapoliyasumit5674@gmail.com', '7990806058', 'sumit1999', '1', '2021-02-24 07:14:50', '0000-00-00 00:00:00'),
(12, 1, 'sumitsapoliya', 'sapoliya', 'sapoliyasumit5674@gmail.com', '7990806058', 'sumit1999', '1', '2021-02-24 07:14:58', '0000-00-00 00:00:00'),
(13, 1, 'sumitsapoliya', 'sapoliya', 'sapoliyasumit5674@gmail.com', '7990806058', 'sumit1999', '1', '2021-02-24 07:15:40', '0000-00-00 00:00:00'),
(14, 1, 'kashyap', 'ghelani', 'kp@gmail.com', '9512935781', 'kp123', '1', '2021-02-28 18:51:36', '0000-00-00 00:00:00'),
(15, 1, '', '', '', '', '', '1', '2021-03-01 10:00:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `customerGroupId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(12) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`customerGroupId`, `name`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 'Retail', 0, '0000-00-00 00:00:00', '2021-03-09 05:59:04'),
(2, 'Wholesale', 0, '0000-00-00 00:00:00', '2021-03-09 05:59:22'),
(6, 'Holi Sale', 0, '2021-03-09 06:05:36', '2021-03-09 06:05:45'),
(7, 'Diwali sale', 0, '2021-03-12 07:34:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `name`, `code`, `status`, `description`, `createdDate`) VALUES
(1, 'sumit', '395004', '1', 'hello', '2021-02-18 00:00:00'),
(2, 'dhruvin', '395004', '1', 'hello', '2021-02-18 00:00:00'),
(4, 'kashyap', '395004', '1', 'hello', '2021-02-18 00:00:00'),
(6, 'sumit1', '395004', '1', 'dcdcd', '2021-02-18 11:09:00'),
(7, '', '', '1', '', '2021-03-17 10:14:00'),
(8, '', '', '1', '', '2021-03-17 10:14:05'),
(9, '', '', '1', '', '2021-03-17 10:14:09'),
(10, '', '', '1', '', '2021-03-17 10:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(12) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `discount` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color` varchar(20) NOT NULL,
  `pricefilter` int(12) NOT NULL,
  `material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `productName`, `price`, `discount`, `quantity`, `status`, `description`, `createdDate`, `updatedDate`, `color`, `pricefilter`, `material`) VALUES
(7, 'AP2021', 'Apple watch', '32000', 10, 5, '0', 'This is Water-resistance watch.', '2021-02-15 12:09:24', '2021-03-18 07:53:22', '29', 27, 32),
(17, 'LAP2021', 'laptop', '55000', 10, 5, '1', 'lenovo laptop 15.6 inch', '2021-02-16 11:40:55', '2021-02-16 11:40:55', '', 0, 0),
(18, 'AP20211', 'Apple watch', '12000', 10, 5, '0', 'this is water-resistance watch.', '2021-02-15 12:09:24', '2021-02-28 18:50:07', '', 0, 0),
(19, 'LAP20211', 'laptop', '55000', 10, 5, '1', 'Dell laptop 15.6 inch with 1TB SSD', '2021-02-16 11:40:55', '2021-02-28 14:17:21', '', 0, 0),
(20, 'MI2021', 'mi watch', '12000', 10, 5, '0', 'This is a water-resistance watch.', '2021-02-15 12:09:24', '2021-02-28 14:17:43', '', 0, 0),
(21, 'LAP20212', 'laptop', '55000', 10, 5, '1', 'lenovo laptop 15.6 inch', '2021-02-16 11:40:55', '2021-02-16 11:40:55', '', 0, 0),
(22, 'TS2022', 'Tesla Car', '111120000', 5, 8, '1', 'This is new to indiaðŸ˜‚ðŸ˜‚', '2021-02-15 12:09:24', '2021-02-28 14:13:31', '', 0, 0),
(23, 'BMW2021', 'BMW', '1120000', 2, 80, '1', 'multi-functionality', '2021-02-15 12:09:24', '2021-02-28 14:15:02', '', 0, 0),
(33, 'lap12345', 'macbook pro', '120000', 10, 100, '1', 'this is MacBook laptop', '2021-03-01 10:47:38', '2021-03-17 10:10:58', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`, `createdDate`, `updatedDate`) VALUES
(1, 7, 1, '1200', '2021-03-10 10:00:00', '2021-03-10 02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(12) NOT NULL,
  `image` varchar(50) NOT NULL,
  `small` int(1) NOT NULL DEFAULT '0',
  `base` int(1) NOT NULL DEFAULT '0',
  `thumbnail` int(1) NOT NULL DEFAULT '0',
  `label` varchar(20) NOT NULL,
  `productId` int(12) NOT NULL,
  `gallery` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `image`, `small`, `base`, `thumbnail`, `label`, `productId`, `gallery`) VALUES
(16, 'asset/1615272947.jpg', 1, 0, 0, 'dell laptop body vie', 17, 1),
(17, 'asset/1615272979.jpg', 0, 0, 1, 'dell laptop front vi', 17, 0),
(18, 'asset/1615272989.jpg', 0, 1, 0, 'dell inspiron laptop', 17, 1),
(19, 'asset/1615528108.jpg', 1, 1, 1, 'Dell inspiron laptop', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `methodId` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(2, 'sumit', '395004', '500', 'hello', '0', '2021-02-18 09:34:01'),
(3, 'dhruvin', '395004', '5000', 'hello', '0', '2021-02-18 09:34:01'),
(5, 'dhruvin', '395004', '5000', 'hello', '0', '2021-02-18 09:34:01'),
(6, 'sumit', '395004', '500', 'hello', '0', '2021-02-18 09:34:01'),
(7, 'prasad', '395004', '5000', 'hello', '1', '2021-02-18 09:34:01'),
(8, 'kashyap', '395004', '5000', 'hello', '1', '2021-02-18 09:34:01'),
(10, 'himalay', '152462', '2000', 'hi', '1', '2021-02-18 10:29:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`customerGroupId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `customerGroupId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `methodId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
