-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 06:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iznanc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(30) NOT NULL,
  `ridename` varchar(200) NOT NULL,
  `adult_price` int(30) NOT NULL,
  `child_price` int(30) NOT NULL,
  `ride_id`  int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--




-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `id` int(30) NOT NULL,
  `ridename` varchar(150) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rides`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `sales_report` (
  `id` int(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `cust_name` varchar(200) NOT NULL,
  `ridename` varchar(200) NOT NULL,
  `adult_ticket` int(30) NOT NULL,
  `adult_price` int(30) NOT NULL,
  `child_ticket` int(30) NOT NULL,
  `child_price` int(30) NOT NULL,
  `total_amount` int(30) NOT NULL,
  `ticket_id` int(30) NOT NULL
  


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--



-- --------------------------------------------------------

--
-- Table structure for table `ticket_items`
--


--
-- Dumping data for table `ticket_items`
--



-- --------------------------------------------------------

--
-- Table structure for table `ticket_list`
--

CREATE TABLE `ticketing` (
  `id` int(30) NOT NULL,
  `ticket_no` int(30) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `ridename`  varchar(200) NOT NULL,
  `adult_ticket` int(30) NOT NULL,
  `child_ticket` int(30) NOT NULL,
  `adult_price` int(30) NOT NULL,
  `child_price` int(30) NOT NULL,
  `total_amt` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_list`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `sales_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_items`
--


--
-- Indexes for table `ticket_list`
--
ALTER TABLE `ticketing`
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
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `sales_report`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_items`
--
ALTER TABLE `ticketing`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ticket_list`
--

  

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE `pricing` ADD FOREIGN KEY (`ride_id`) REFERENCES `rides`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;



CREATE TRIGGER `delete_madu` AFTER DELETE ON `ticketing`
 FOR EACH ROW DELETE FROM sales_report WHERE sales_report.ticket_id = old.id;

 CREATE TRIGGER `name` BEFORE INSERT ON `users`
 FOR EACH ROW SET NEW.name=UPPER(NEW.name);


 CREATE TRIGGER `ram` AFTER INSERT ON `ticketing`
 FOR EACH ROW INSERT INTO sales_report VALUES(NULL,current_timestamp(),NEW.customer_name,NEW.ridename,NEW.adult_ticket,NEW.adult_price,NEW.child_ticket,NEW.child_price,NEW.total_amt,NEW.ID);

 DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listing_user`()
SELECT * FROM users$$
DELIMITER ;