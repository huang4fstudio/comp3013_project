-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2016 at 04:16 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `original`
--

-- --------------------------------------------------------

--
-- Table structure for table `Auction`
--
-- Creation: Feb 23, 2016 at 03:08 PM
--

CREATE TABLE IF NOT EXISTS `Auction` (
  `id` int(11) NOT NULL,
  `reserve_price` int(11) NOT NULL,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `highest_bid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Auction`:
--   `highest_bid_id`
--       `Bid` -> `id`
--   `item_id`
--       `Item` -> `id`
--   `seller_id`
--       `User_id` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bid`
--
-- Creation: Feb 23, 2016 at 03:08 PM
--

CREATE TABLE IF NOT EXISTS `Bid` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Bid`:
--   `auction_id`
--       `Auction` -> `id`
--   `user_id`
--       `User_id` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--
-- Creation: Feb 23, 2016 at 03:08 PM
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Category`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--
-- Creation: Feb 23, 2016 at 03:09 PM
--

CREATE TABLE IF NOT EXISTS `Feedback` (
  `buyer_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Feedback`:
--   `auction_id`
--       `Auction` -> `id`
--   `buyer_id`
--       `User_id` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--
-- Creation: Feb 23, 2016 at 03:09 PM
--

CREATE TABLE IF NOT EXISTS `Item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Item`:
--   `owner_id`
--       `User_id` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `Item_category`
--
-- Creation: Feb 23, 2016 at 02:37 PM
--

CREATE TABLE IF NOT EXISTS `Item_category` (
  `category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Item_category`:
--   `category_id`
--       `Category` -> `id`
--   `item_id`
--       `Item` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--
-- Creation: Feb 23, 2016 at 03:09 PM
--

CREATE TABLE IF NOT EXISTS `Roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `privilege` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Roles`:
--   `auction_id`
--       `Auction` -> `id`
--   `user_id`
--       `User_id` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--
-- Creation: Feb 23, 2016 at 02:46 PM
--

CREATE TABLE IF NOT EXISTS `User` (
  `name` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `seller_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `User`:
--

-- --------------------------------------------------------

--
-- Table structure for table `User_id`
--
-- Creation: Feb 23, 2016 at 03:10 PM
--

CREATE TABLE IF NOT EXISTS `User_id` (
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `User_id`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Auction`
--
ALTER TABLE `Auction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_id` (`item_id`),
  ADD UNIQUE KEY `seller_id` (`seller_id`),
  ADD UNIQUE KEY `highest_bid_id` (`highest_bid_id`);

--
-- Indexes for table `Bid`
--
ALTER TABLE `Bid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `auction_id` (`auction_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`auction_id`),
  ADD UNIQUE KEY `buyer_id` (`buyer_id`),
  ADD UNIQUE KEY `auction_id` (`auction_id`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owner_id` (`owner_id`);

--
-- Indexes for table `Item_category`
--
ALTER TABLE `Item_category`
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `auction_id` (`auction_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `User_id`
--
ALTER TABLE `User_id`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User_id`
--
ALTER TABLE `User_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
