-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 10:33 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Product_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `quantity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `name` varchar(30) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `added_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`name`, `category_id`, `added_by`) VALUES
('Electronics', '1', 'vk'),
('Fashion', '2', 'vk'),
('Office Stationery', '3', 'np'),
('Furniture', '4', 'np'),
('Sports', '5', 'vk'),
('Household', '6', 'vk');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Name` varchar(50) NOT NULL,
  `Product_id` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Category_id` varchar(30) DEFAULT NULL,
  `added_by` varchar(30) DEFAULT NULL,
  `Supplier_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Name`, `Product_id`, `Description`, `Price`, `Image`, `Category_id`, `added_by`, `Supplier_id`) VALUES
('iPhone 7', '1', 'Check out the New iPhone 7 now..!!', 649, 'iphone.jpg', '1', 'np', '1'),
('Beige Curtains', '10', '100% Silk curtains', 349.99, 'curtain.jpg', '6', 'vk', '1'),
('Samsung S7', '2', 'All new Samsung Galaxy S7 is here!', 599, 's7.jpg', '1', 'np', '1'),
('Men\'s Formal Suits', '3', 'A perfect finish for your formal events.', 299, 'suit.jpg', '2', 'vk', '2'),
('Women Shoes', '4', 'Show stopper shoes!', 49.99, 'shoes.jpg', '2', 'np', '2'),
('File Holder', '5', 'Now never misplace a file with this file holder.', 29.99, 'Office.jpg', '3', 'np', '1'),
('Modern Coffee Table', '6', 'Time to say goodbye to your old coffee table for this modern, unique coffee table.', 139.99, 'table.jpg', '4', 'vk', '2'),
('Sofa', '7', 'Add comfort to your living space with this afordable compy sofa.', 299.99, 'sofa.jpg', '4', 'vk', '1'),
('Wilson Stream 99 Tennis Racquet', '8', 'Shift your game to attacking gear with this advanced racquet from Wilson.', 120, 'tennis.jpg', '5', 'np', '1'),
('Golf Kit', '9', 'Play like a professional with this professional golf kit.', 899.99, 'golf.jpg', '5', 'np', '2');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `name` varchar(30) NOT NULL,
  `supplier_id` varchar(30) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `addr_line1` varchar(255) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `added_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`name`, `supplier_id`, `email_id`, `phone_no`, `addr_line1`, `zip_code`, `added_by`) VALUES
('Best Sales', '1', 'abc@bs.com', '1234567890', '230, East block,\r\n', '28262', 'np'),
('Just Deals', '2', 'abc@jd.com', '1234567890', '21, Enterprise Avenue,\r\n', '28262', 'vk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `addr_line1` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `zip_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `password`, `username`, `addr_line1`, `role`, `zip_code`) VALUES
('Nitin', 'Purohit', 'np@123', 'np', '9309, Kittansett Dr.', 'Product Manager', '28262'),
('Pratik', 'Doshi', 'p@123', 'pd', '9309, Kittansett Dr.\r\nAPT: G', 'customer', '28262'),
('Sashi', 'Tammaa', 'st@123', 'st', '9309, Kittansett Dr.,', 'customer', '28262'),
('Vandita', 'K', 'v@123', 'vk', '9309, Kittansett Dr.', 'Product Manager', '28262');

-- --------------------------------------------------------

--
-- Table structure for table `zipcode`
--

CREATE TABLE `zipcode` (
  `zip_code` varchar(10) CHARACTER SET latin1 NOT NULL,
  `city` varchar(30) CHARACTER SET latin1 NOT NULL,
  `state` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zipcode`
--

INSERT INTO `zipcode` (`zip_code`, `city`, `state`) VALUES
('28262', 'Charlotte', 'North Carlina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `username` (`username`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `Category_id` (`Category_id`),
  ADD KEY `Supplier_id` (`Supplier_id`),
  ADD KEY `added_by` (`added_by`);
ALTER TABLE `product` ADD FULLTEXT KEY `added_by_2` (`added_by`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `zip_code` (`zip_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `zip_code` (`zip_code`);

--
-- Indexes for table `zipcode`
--
ALTER TABLE `zipcode`
  ADD PRIMARY KEY (`zip_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`username`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`Category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `supplier_ibfk_2` FOREIGN KEY (`zip_code`) REFERENCES `zipcode` (`zip_code`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`zip_code`) REFERENCES `zipcode` (`zip_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
