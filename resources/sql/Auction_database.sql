-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2016 at 01:19 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `Auction`
--

CREATE TABLE IF NOT EXISTS `Auction` (
  `id` int(11) NOT NULL,
  `reserve_price` int(11) NOT NULL,
  `start_price` int(11) NOT NULL,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_id` int(11) NOT NULL,
  `views` int(255) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Bid`
--

CREATE TABLE IF NOT EXISTS `Bid` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE IF NOT EXISTS `Feedback` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` mediumblob NOT NULL,
  `image_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Item_category`
--

CREATE TABLE IF NOT EXISTS `Item_category` (
  `id` int(111) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `privilege` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `location` varchar(255) NOT NULL,
  `seller_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User_id`
--

CREATE TABLE IF NOT EXISTS `User_id` (
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Watch_list`
--

CREATE TABLE IF NOT EXISTS `Watch_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Auction`
--
ALTER TABLE `Auction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `Bid`
--
ALTER TABLE `Bid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `auction_id` (`auction_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `auction_id` (`auction_id`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Item_category`
--
ALTER TABLE `Item_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `auction_id` (`auction_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User_id`
--
ALTER TABLE `User_id`
  ADD PRIMARY KEY (`email`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `Watch_list`
--
ALTER TABLE `Watch_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Auction`
--
ALTER TABLE `Auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Bid`
--
ALTER TABLE `Bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Item_category`
--
ALTER TABLE `Item_category`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Watch_list`
--
ALTER TABLE `Watch_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Auction`
--
ALTER TABLE `Auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Item` (`id`),
  ADD CONSTRAINT `auction_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Bid`
--
ALTER TABLE `Bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`auction_id`) REFERENCES `Auction` (`id`);

--
-- Constraints for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`auction_id`) REFERENCES `Auction` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`auction_id`) REFERENCES `Auction` (`id`);

--
-- Constraints for table `Item_category`
--
ALTER TABLE `Item_category`
  ADD CONSTRAINT `item_category_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `Item` (`id`),
  ADD CONSTRAINT `item_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

--
-- Constraints for table `Roles`
--
ALTER TABLE `Roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`auction_id`) REFERENCES `Auction` (`id`);

--
-- Constraints for table `User_id`
--
ALTER TABLE `User_id`
  ADD CONSTRAINT `user_id_ibfk_1` FOREIGN KEY (`id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Watch_list`
--
ALTER TABLE `Watch_list`
  ADD CONSTRAINT `watch_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);
  ADD CONSTRAINT `watch_list_ibfk_2` FOREIGN KEY (`auction_id`) REFERENCES `Auction` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
