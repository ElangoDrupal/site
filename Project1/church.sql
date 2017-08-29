-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 08:17 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delangobioango`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `type`) VALUES
(1, 'm_admin', 'm_admin', 'master'),
(2, 'admin', 'admin', 'admin'),
(3, 'admin1', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_comments`
--

CREATE TABLE `admin_comments` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `comment_id` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_comments`
--

INSERT INTO `admin_comments` (`id`, `admin_id`, `comment_id`, `comment`, `time`) VALUES
(1, 2, '7b06e72d088f0a57c83cf4a94dff6fe1', 'aasdsad', 1490788429),
(2, 2, '7b06e72d088f0a57c83cf4a94dff6fe1', 'fine', 1491021485),
(3, 2, '7b06e72d088f0a57c83cf4a94dff6fe1', 'test comment test comment test comment test comment test comment test comment test comment ', 1490788944),
(4, 2, '7b06e72d088f0a57c83cf4a94dff6fe1', 'asdasdasd sadasdasd', 1490745987),
(5, 2, '7b06e72d088f0a57c83cf4a94dff6fe1', 'asdsadsdaasd', 1490832524),
(6, 2, '7b06e72d088f0a57c83cf4a94dff6fe1', 'sdasasdsad red', 1490875745),
(7, 2, '4f3402759711a219f72cdb16a84135c0', 'asdasdasd', 1490789638),
(8, 2, '4f3402759711a219f72cdb16a84135c0', 'fine', 1491021553),
(9, 1, '1c3cb33cfe8467b9a2a789209702baf4', 'hmm', 1491022073),
(10, 1, '4f3402759711a219f72cdb16a84135c0', 'good', 1490794607),
(11, 2, '4f3402759711a219f72cdb16a84135c0', 'hmm', 1491021593),
(12, 1, '1c3cb33cfe8467b9a2a789209702baf4', '1 more', 1491022082);

-- --------------------------------------------------------

--
-- Table structure for table `guest_details`
--

CREATE TABLE `guest_details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `memb_name` varchar(50) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `comment_id` varchar(50) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `time_start` bigint(20) NOT NULL,
  `respond_time` bigint(20) DEFAULT NULL,
  `history` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_details`
--

INSERT INTO `guest_details` (`id`, `name`, `email`, `phone`, `memb_name`, `comment`, `comment_id`, `admin_id`, `time_start`, `respond_time`, `history`) VALUES
(3, 'test123', 'sadasd@asd.asd', '2344234234', '', 'asdasdasd', NULL, NULL, 1490362223, NULL, 0),
(4, 'test324', 'addasas@adas.sad', '45345', '', 'asdas', NULL, NULL, 1490452680, NULL, 0),
(6, 'test', 'sdfsfd@sad.sad', 'sdf', '', 'sfd', '1c3cb33cfe8467b9a2a789209702baf4', 3, 1490466813, 1490793964, 1),
(7, 'sdasd', 'sdasd', '6456456', 'asdsad', 'good', '4f3402759711a219f72cdb16a84135c0', 2, 1490770632, 1490789638, 0),
(8, 'sdasd', 'dasd@sdsa.asd', '6456456', 'asdsad', 'asdsda', NULL, NULL, 1490780244, NULL, 0),
(9, 'test', 'asdsad@sda.asd', '5345', 'asd', 'asdasd', '7b06e72d088f0a57c83cf4a94dff6fe1', 2, 1490780707, 1490788547, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_comments`
--
ALTER TABLE `admin_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_details`
--
ALTER TABLE `guest_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin_comments`
--
ALTER TABLE `admin_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `guest_details`
--
ALTER TABLE `guest_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
