-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 03:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user`, `time`, `date`, `description`) VALUES
(26, 'Administrator', '21:59:29', '2024-02-06', 'Administrator Login Session'),
(27, 'Administrator', '21:59:29', '2024-02-06', 'Administrator Logout Session'),
(28, 'Princess Shane Garcia', '21:59:04', '2024-02-06', 'Princess Shane Garcia Login Session'),
(29, 'Princess Shane Garcia', '21:59:04', '2024-02-06', 'Princess Shane Garcia Logout Session'),
(30, 'Princess Shane Garcia', '02:08:57', '2024-02-25', 'Princess Shane Garcia Login Session'),
(31, 'Princess Shane Garcia', '02:09:04', '2024-02-25', 'Princess Shane Garcia Logout Session'),
(32, 'Administrator', '02:09:15', '2024-02-25', 'Administrator Login Session'),
(33, 'Administrator', '02:09:24', '2024-02-25', 'Administrator Logout Session'),
(34, 'Princess Shane Garcia', '15:10:51', '2024-02-26', 'Princess Shane Garcia Login Session');

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `borrower_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrower_history`
--

CREATE TABLE `borrower_history` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_borrowed` date DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `whereplace` text DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `quantity` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tagid` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `item_created` date NOT NULL DEFAULT current_timestamp(),
  `expiry` date DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `conditions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrower_history`
--

INSERT INTO `borrower_history` (`id`, `item`, `name`, `date_borrowed`, `contactno`, `whereplace`, `returndate`, `quantity`, `category`, `tagid`, `room`, `status`, `item_created`, `expiry`, `unit`, `conditions`) VALUES
(461, 'Energy Drink', 'Administrator', '1970-01-01', '', '', '0000-00-00', 34, 'Supplies', '65c23623f35c2', 'Supplies Room', 'Added', '2024-02-06', '2024-03-08', '290mL', NULL),
(462, 'Energy Drink', 'Administrator', '1970-01-01', '', '', '0000-00-00', 50, 'Supplies', '65c2363994166', 'Supplies Room', 'Added', '2024-02-06', '2024-03-08', '320mL', NULL),
(464, 'Fork', 'Administrator', '1970-01-01', '', '', '0000-00-00', 365, 'Tools', '65c237548d919', 'Tools Room', 'Added', '2024-02-06', NULL, NULL, NULL),
(465, 'Spoon', 'Administrator', '1970-01-01', '', '', '0000-00-00', 365, 'Tools', '65c2376256b6c', 'Tools Room', 'Added', '2024-02-06', NULL, NULL, NULL),
(466, 'Blender', 'Administrator', '1970-01-01', '', '', '0000-00-00', 4, 'Equipment', '65c2376d67a60', 'Equipment Room', 'Added', '2024-02-06', NULL, NULL, NULL),
(467, 'Aircon', 'Administrator', '1970-01-01', '', '', '0000-00-00', 9, 'Equipment', '65c237759b8ca', 'Equipment Room', 'Added', '2024-02-06', NULL, NULL, NULL),
(468, 'Fork', 'Princess Shane Garcia', '2024-02-06', '09552125421', 'Testing', '2024-03-09', 65, 'Tools', '65c237548d919', 'Tools Room', 'Borrowed', '2024-02-06', NULL, NULL, NULL),
(469, 'Fork', 'Administrator', '2024-02-06', '09552125421', 'Testing', '2024-02-06', 50, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, 'Good'),
(470, 'Fork', 'Administrator', '2024-02-06', '09552125421', 'Testing', '2024-02-06', 5, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, 'Good'),
(471, 'Energy Drink', 'Administrator', '2024-02-06', NULL, 'Testing', NULL, 2, 'Supplies', '65c2363994166', 'Supplies Room', 'Consumed', '2024-02-06', NULL, NULL, NULL),
(472, 'Spoon', 'Administrator', '2024-02-06', '09552125421', 'Testing', '2024-02-28', 5, 'Tools', '65c2376256b6c', 'Tools Room', 'Borrowed', '2024-02-06', NULL, NULL, NULL),
(473, 'Roasted Coffee', 'Administrator', '1970-01-01', '', '', '0000-00-00', 4, 'Supplies', '65c23b08648c3', 'Supplies Room', 'Added', '2024-02-06', '2024-03-01', '10kg', NULL),
(474, 'Roasted Coffee', 'Princess Shane Garcia', NULL, NULL, NULL, NULL, 4, 'Supplies', '65c23b08648c3', '', 'Deleted', '2024-02-06', '2024-03-01', '10kg', '-'),
(475, 'Energy Drink', 'Administrator', NULL, NULL, NULL, NULL, 4, 'Energy Drink', 'Supplies Room', 'Supplies Room', 'Delivered', '2024-02-06', NULL, NULL, NULL),
(476, 'Energy Drink', 'Administrator', NULL, NULL, NULL, NULL, 2, 'Energy Drink', 'Supplies Room', 'Supplies Room', 'Delivered', '2024-02-06', NULL, NULL, NULL),
(477, 'Energy Drink', 'Administrator', NULL, NULL, NULL, NULL, 2, 'Energy Drink', 'Supplies Room', 'Supplies Room', 'Delivered', '2024-02-06', NULL, NULL, NULL),
(478, 'Fork', 'Administrator', '2024-02-06', '09552125421', 'Testing', '2024-02-06', 5, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, 'Good'),
(479, 'Energy Drink', 'Administrator', NULL, NULL, NULL, NULL, 5, 'Energy Drink', 'Supplies Room', 'Supplies Room', 'Delivered', '2024-02-06', NULL, NULL, NULL),
(480, 'Energy Drink', 'Administrator', NULL, NULL, NULL, NULL, 2, 'Energy Drink', 'Supplies Room', 'Supplies Room', 'Delivered', '2024-02-06', NULL, NULL, NULL),
(481, 'Energy Drink', 'Administrator', NULL, NULL, NULL, NULL, 2, 'Energy Drink', 'Supplies Room', 'Supplies Room', 'Delivered', '2024-02-06', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `tagid` varchar(255) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `quantity` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `tagid`, `itemname`, `room`, `brand`, `quantity`) VALUES
(54, '65c2376d67a60', 'Blender', 'Equipment Room', 'Hanabishi', 4),
(55, '65c237759b8ca', 'Aircon', 'Equipment Room', 'Carrier', 9);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `tagid` varchar(255) NOT NULL,
  `supplyname` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `item` varchar(255) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `activity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `name`, `date`, `item`, `quantity`, `activity`) VALUES
(85, 'Princess Shane Garcia', '2024-02-06 13:27:44', 'NULL', 'NULL', 'Logged In'),
(86, 'Princess Shane Garcia', '2024-02-06 13:27:56', 'NULL', 'NULL', 'Logged Out'),
(87, 'Administrator', '2024-02-06 13:28:06', 'NULL', 'NULL', 'Logged In'),
(88, 'Administrator', '2024-02-06 13:38:01', 'Energy Drink', '34', 'Added'),
(89, 'Administrator', '2024-02-06 13:38:17', 'Energy Drink', '50', 'Added'),
(90, 'Princess Shane Garcia', '2024-02-06 13:38:47', 'NULL', 'NULL', 'Logged In'),
(92, 'Administrator', '2024-02-06 13:42:58', 'Fork', '365', 'Added'),
(93, 'Administrator', '2024-02-06 13:43:05', 'Spoon', '365', 'Added'),
(94, 'Administrator', '2024-02-06 13:43:17', 'Blender', '4', 'Added'),
(95, 'Administrator', '2024-02-06 13:43:29', 'Aircon', '9', 'Added'),
(96, 'Administrator', '2024-02-06 13:43:45', 'NULL', 'NULL', 'Logged Out'),
(97, 'Princess Shane Garcia', '2024-02-06 13:43:49', 'NULL', 'NULL', 'Logged In'),
(98, 'Princess Shane Garcia', '2024-02-06 13:44:12', 'Fork', '65', 'Borrowed'),
(99, 'Princess Shane Garcia', '2024-02-05 16:00:00', 'Blender', '4', 'Updated'),
(100, 'Princess Shane Garcia', '2024-02-06 13:44:42', 'NULL', 'NULL', 'Logged Out'),
(101, 'Administrator', '2024-02-06 13:44:49', 'NULL', 'NULL', 'Logged In'),
(102, 'Administrator', '2024-02-06 13:45:06', 'Fork', '50', 'Returned'),
(103, 'Administrator', '2024-02-06 13:50:09', 'Fork', '5', 'Returned'),
(104, 'Administrator', '2024-02-05 16:00:00', 'Energy Drink', '2', 'Consumed'),
(105, 'Administrator', '2024-02-06 13:57:31', 'Spoon', '5', 'Borrowed'),
(106, 'Administrator', '2024-02-06 13:58:52', 'Roasted Coffee', '4', 'Added'),
(107, 'Administrator', '2024-02-06 13:58:57', 'NULL', 'NULL', 'Logged Out'),
(108, 'Princess Shane Garcia', '2024-02-06 13:59:04', 'NULL', 'NULL', 'Logged In'),
(109, 'Princess Shane Garcia', '2024-02-06 13:59:24', 'Roasted Coffee', 'NULL', 'Deleted'),
(110, 'Princess Shane Garcia', '2024-02-06 13:59:26', 'NULL', 'NULL', 'Logged Out'),
(111, 'Administrator', '2024-02-06 13:59:29', 'NULL', 'NULL', 'Logged In'),
(112, 'Administrator', '2024-02-06 14:03:25', 'Energy Drink', '38', 'Delivered'),
(113, 'Administrator', '2024-02-06 14:03:15', 'Energy Drink', '40', 'Delivered'),
(114, 'Administrator', '2024-02-06 14:02:00', 'Energy Drink', '40', 'Delivered'),
(115, 'Administrator', '2024-02-06 14:04:12', 'Fork', '5', 'Returned'),
(116, 'Administrator', '2024-02-06 14:05:51', 'Energy Drink', '45', 'Delivered'),
(117, 'Administrator', '2024-02-06 14:14:26', 'Energy Drink', '42', 'Delivered'),
(118, 'Administrator', '2024-02-06 14:18:36', 'Energy Drink', '2', 'Delivered'),
(119, 'Princess Shane Garcia', '2024-02-24 18:08:57', 'NULL', 'NULL', 'Logged In'),
(120, 'Princess Shane Garcia', '2024-02-24 18:09:04', 'NULL', 'NULL', 'Logged Out'),
(121, 'Administrator', '2024-02-24 18:09:15', 'NULL', 'NULL', 'Logged In'),
(122, 'Administrator', '2024-02-24 18:09:24', 'NULL', 'NULL', 'Logged Out'),
(123, 'Princess Shane Garcia', '2024-02-26 07:10:51', 'NULL', 'NULL', 'Logged In');

-- --------------------------------------------------------

--
-- Table structure for table `return_history`
--

CREATE TABLE `return_history` (
  `id` int(11) NOT NULL DEFAULT 0,
  `item` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_borrowed` timestamp NOT NULL DEFAULT current_timestamp(),
  `contactno` varchar(255) DEFAULT NULL,
  `whereplace` text DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `quantity` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tagid` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `item_created` date NOT NULL DEFAULT current_timestamp(),
  `expiry` date DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `conditions` text DEFAULT NULL,
  `eventname` varchar(50) NOT NULL,
  `function` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `return_history`
--

INSERT INTO `return_history` (`id`, `item`, `name`, `date_borrowed`, `contactno`, `whereplace`, `returndate`, `quantity`, `category`, `tagid`, `room`, `status`, `item_created`, `expiry`, `unit`, `conditions`, `eventname`, `function`) VALUES
(162, 'Fork', 'Administrator', '2023-12-11 02:05:09', '09423291288', 'try', '2023-12-12', 56, 'Tools', '6575f4ebcb7ed', 'Tools Room', 'Borrowed', '2023-12-11', NULL, NULL, NULL, '', ''),
(163, 'Fork', 'Administrator', '2023-12-11 02:05:09', '09423291288', 'try', '2023-12-12', 50, 'Tools', '6575f4ebcb7ed', 'Tools Room', 'Returned', '2023-12-11', NULL, NULL, NULL, '', ''),
(164, 'Fork', 'Administrator', '2023-12-11 02:05:09', '09423291288', 'try', '2023-12-12', 6, 'Tools', '6575f4ebcb7ed', 'Tools Room', 'Returned', '2023-12-11', NULL, NULL, NULL, '', ''),
(165, 'Chef\'s Knife', 'Administrator', '2023-12-11 02:09:04', '09423291288', 'try', '2023-12-12', 56, 'Tools', '6575f508185fa', 'Tools Room', 'Borrowed', '2023-12-11', NULL, NULL, NULL, '', ''),
(166, 'Chef\'s Knife', 'Administrator', '2023-12-11 02:09:04', '09423291288', 'try', '2023-12-12', 56, 'Tools', '6575f508185fa', 'Tools Room', 'Returned', '2023-12-11', NULL, NULL, NULL, '', ''),
(167, 'Spatula', 'Administrator', '2023-12-11 02:14:39', '09423291288', 'try', '2023-12-12', 32, 'Tools', '6575f5433331c', 'Tools Room', 'Borrowed', '2023-12-11', NULL, NULL, NULL, '', ''),
(168, 'Spatula', 'Administrator', '2023-12-11 02:16:29', '09423291288', 'try', '2023-12-12', 32, 'Tools', '6575f5433331c', 'Tools Room', 'Borrowed', '2023-12-11', NULL, NULL, NULL, '', ''),
(169, 'Spatula', 'Administrator', '2023-12-11 02:16:29', '09423291288', 'try', '2023-12-12', 32, 'Tools', '6575f5433331c', 'Tools Room', 'Returned', '2023-12-11', NULL, NULL, NULL, '', ''),
(170, 'Coffee Maker', 'Princess Shane Garcia', '2023-12-11 05:50:35', '09653324571', 'lalang', '2023-12-14', 2, 'Equipment', '6575f573f061b', 'Equipment Room', 'Borrowed', '2023-12-11', NULL, NULL, NULL, '', ''),
(171, 'Coffee Maker', 'Princess Shane Garcia', '2023-12-11 05:50:35', '09653324571', 'lalang', '2023-12-14', 1, 'Equipment', '6575f573f061b', 'Equipment Room', 'Returned', '2023-12-11', NULL, NULL, NULL, '', ''),
(172, 'Juice', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 7, 'Supplies', '65797e939bdbe', 'Supplies Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(173, 'Soft Drinks', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 79, 'Supplies', '65797ea44fe1a', 'Supplies Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(174, 'Water', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 190, 'Supplies', '65797eab9b483', 'Supplies Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(175, 'Coffee Beans', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 14, 'Supplies', '65797eb30db19', 'Supplies Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(176, 'Banana Ketchup', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 13, 'Supplies', '65797ebe78d17', 'Supplies Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(177, 'Kitchen Knife', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 16, 'Tools', '65797ec90828f', 'Tools Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(178, 'Food Smasher', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 7, 'Tools', '65797ece32bc1', 'Tools Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(179, 'Whisk', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65797ed3d8303', 'Tools Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(180, 'Spatula', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 11, 'Tools', '65797ed706ed5', 'Tools Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(181, 'Spoon', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 123, 'Tools', '65797ededd94f', 'Tools Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(182, 'Fork', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 100, 'Tools', '65797ee5736c6', 'Tools Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(183, 'Bread Toaster', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 5, 'Equipment', '65797f03d4395', 'Equipment Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(184, 'Blender', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 6, 'Equipment', '65797f0c80bf1', 'Equipment Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(185, 'Stove', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 9, 'Equipment', '65797f127f1bc', 'Equipment Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(186, 'Freezer', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 5, 'Equipment', '65797f22dfe48', 'Equipment Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(187, 'Refrigerator', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 6, 'Equipment', '65797f2a7d5d0', 'Equipment Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(188, 'Food Processor', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 2, 'Equipment', '65797f374f5bd', 'Equipment Room', NULL, '2023-12-13', NULL, NULL, NULL, '', ''),
(189, 'Kitchen Knife', 'Trixie Mae T. Roseta', '2023-12-13 09:54:59', NULL, 'Graduation', '2023-12-27', 3, 'Tools', '65797ec90828f', 'Tools Room', 'Borrowed', '2023-12-13', NULL, NULL, NULL, '', ''),
(190, 'Whisk', 'Trixie Mae T. Roseta', '2023-12-13 10:01:05', '09954839122', 'Graduation', '2023-12-30', 1, 'Tools', '65797ed3d8303', 'Tools Room', 'Borrowed', '2023-12-13', NULL, NULL, NULL, '', ''),
(191, 'Kitchen Knife', 'Trixie Mae T. Roseta', '2023-12-13 09:54:59', NULL, 'Graduation', '2023-12-13', 3, 'Tools', '65797ec90828f', 'Tools Room', 'Returned', '2023-12-13', NULL, NULL, NULL, '', ''),
(192, 'Whisk', 'Trixie Mae T. Roseta', '2023-12-13 10:01:05', '09954839122', 'Graduation', '2023-12-13', 1, 'Tools', '65797ed3d8303', 'Tools Room', 'Returned', '2023-12-13', NULL, NULL, NULL, '', ''),
(193, 'Fork', 'Trixie Mae T. Roseta', '2023-12-13 10:02:27', '09954839178', 'Graduation', '2023-12-23', 20, 'Tools', '65797ee5736c6', 'Tools Room', 'Borrowed', '2023-12-13', NULL, NULL, NULL, '', ''),
(194, 'Fork', 'Trixie Mae T. Roseta', '2023-12-13 10:02:27', '09954839178', 'Graduation', '2023-12-13', 12, 'Tools', '65797ee5736c6', 'Tools Room', 'Returned', '2023-12-13', NULL, NULL, NULL, '', ''),
(195, 'Hammer', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65a6b1886f306', 'Tools Room', NULL, '2024-01-16', NULL, NULL, NULL, '', ''),
(196, 'Flour', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65a6bdc9b6800', 'Supplies Room', 'Added', '2024-01-16', NULL, NULL, NULL, '', ''),
(197, 'Book', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65abdf4cbae3f', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', 'mL', NULL, '', ''),
(198, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65abdf984d172', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', 'mL', NULL, '', ''),
(199, 'update', 'Administrator', '2024-01-19 16:00:00', '', '', '0000-00-00', 5, 'Supplies', '65abe14b9d51b', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', '2024-01-20', NULL, '', ''),
(200, 'Sample', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 5, 'Supplies', '65abe263aa4ac', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', 'mL', NULL, '', ''),
(201, 'Sample', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 4, 'Supplies', '65abe29da9018', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', 'mL', NULL, '', ''),
(202, 'edwwwwwe', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65abe2a923ad5', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', 'pc', NULL, '', ''),
(203, 'asdfs', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 2, 'Supplies', '65abe9e79c058', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', 'mL', NULL, '', ''),
(204, 'Sample', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65abea5ea7560', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', 'mLBrand New', NULL, '', ''),
(205, 'Sample', 'Administrator', '0000-00-00 00:00:00', 'contact', 'where', '0000-00-00', 1, 'Supplies', '65abebb1b032b', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', '2024-02-01100', NULL, '', ''),
(206, 'MAC', 'Administrator', '0000-00-00 00:00:00', 'contact', 'where', '0000-00-00', 1, 'Supplies', '65abebba12f21', 'Supplies Room', 'Added', '2024-01-20', '0000-00-00', '2024-01-2710', NULL, '', ''),
(207, 'Aqua', 'Administrator', '0000-00-00 00:00:00', 'contact', 'where', '0000-00-00', 1, 'Supplies', '65abecd653765', 'Supplies Room', 'Added', '2024-01-20', '2024-01-30', '100mL', NULL, '', ''),
(208, 'Perfume', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65abed025b435', 'Supplies Room', 'Added', '2024-01-20', '2024-01-27', '100mL', NULL, '', ''),
(209, 'Brand New Car', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65abeed35a718', 'Supplies Room', 'Added', '2024-01-20', '2024-01-21', '100mL', NULL, '', ''),
(210, 'Kape', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65ad0db7bac9c', 'Supplies Room', 'Added', '2024-01-21', '2025-01-21', '300mL', NULL, '', ''),
(211, 'Kape', 'Administrator', '2024-01-21 12:28:30', NULL, 'Wala', NULL, 100, 'Supplies', '65ad0db7bac9c', 'Supplies Room', 'Consumed', '2024-01-21', NULL, NULL, NULL, '', ''),
(212, 'Sample Tool', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 10, 'Tools', '65afb93a369b0', 'Tools Room', NULL, '2024-01-23', NULL, NULL, NULL, '', ''),
(213, 'Sample Tool', 'Administrator', '2024-01-23 13:27:09', '0938831513', 'Wala', '2024-01-24', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(214, 'Sample Tool', 'Administrator', '2024-01-23 13:27:56', '237979743', 'Jester', '2024-01-30', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(215, 'Sample Tool', 'Administrator', '2024-01-23 13:29:32', '0938831513', 'SAMPE', '2024-01-30', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(216, 'Kitchen Knife', 'Administrator', '2024-01-23 13:30:58', '0938831513', 'SAMPE', '2024-01-31', 1, 'Tools', '65797ec90828f', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(217, 'Sample Tool', 'Administrator', '2024-01-23 13:35:28', '798139', 'Dalas', '2024-01-31', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(218, 'Sample Tool', 'Administrator', '2024-01-23 13:37:11', '798139', 'Dalas', '2024-01-30', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(219, 'Sample Tool', 'Administrator', '2024-01-23 13:38:24', '0938831513', 'SAMPE', '2024-02-01', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(220, 'Sample Tool', 'Administrator', '2024-01-23 13:42:33', '0938831513', 'SAMPE', '2024-02-07', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(221, 'Sample Tool', 'Administrator', '2024-01-23 13:43:28', '0938831513', 'SAMPE', '2024-02-07', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(222, 'Sample Tool', 'Administrator', '2024-01-23 13:45:14', '0938831513', 'SAMPE', '2024-02-07', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(223, 'Sample Tool', 'Administrator', '2024-01-23 13:45:43', '0938831513', '555', '2024-01-31', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(224, 'Sample Tool', 'Administrator', '2024-01-23 13:46:17', '0938831513', 'Tooling', '2024-01-29', 1, 'Tools', '65afb93a369b0', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(225, 'Sample Tool', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 20, 'Tools', '65afc37f0653e', 'Tools Room', NULL, '2024-01-23', NULL, NULL, NULL, '', ''),
(226, 'Sample Tool', 'Administrator', '2024-01-23 13:48:03', '0938831513', 'SAMPE', '2024-01-24', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(227, 'Sample Tool', 'Administrator', '2024-01-23 13:49:08', '0938831513', 'SAMPE', '2024-01-24', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(228, 'Sample Tool', 'Administrator', '2024-01-23 13:50:05', '0938831513', 'SAMPE', '2024-01-31', 10, 'Tools', '65afc37f0653e', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(229, 'Sample Equipment', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 30, 'Equipment', '65afc4268353f', 'Equipment Room', NULL, '2024-01-23', NULL, NULL, NULL, '', ''),
(230, 'Sample Equipment', 'Administrator', '2024-01-23 13:51:11', '09267387', 'Somewhere', '2024-01-24', 1, 'Equipment', '65afc4268353f', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(231, 'Sample SUpplies', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 30, 'Supplies', '65afc45939286', 'Supplies Room', 'Added', '2024-01-23', '2024-01-25', '10g', NULL, '', ''),
(232, 'Sample SUpplies', 'Administrator', '2024-01-23 13:52:13', NULL, 'None', NULL, 60, 'Supplies', '65afc45939286', 'Supplies Room', 'Consumed', '2024-01-23', NULL, NULL, NULL, '', ''),
(233, 'Sample Equipment', 'Administrator', '2024-01-23 13:51:11', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afc4268353f', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(234, 'Sample Tool', 'Administrator', '2024-01-23 13:49:08', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(235, 'Sample Tool', 'Administrator', '2024-01-23 13:49:08', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(236, 'Sample Tool', 'Administrator', '2024-01-23 13:49:08', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(237, 'Sample Tool', 'Administrator', '2024-01-23 13:49:08', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(238, 'Sample Tool', 'Administrator', '2024-01-23 13:48:03', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(239, 'Sample Tool', 'Administrator', '2024-01-23 13:49:08', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(240, 'Sample Tool', 'Administrator', '2024-01-23 13:49:08', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(241, 'Sample Tool', 'Administrator', '2024-01-23 13:49:08', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(242, 'Sample Tool', 'Administrator', '2024-01-23 13:48:03', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(243, 'Sample Tool', 'Administrator', '2024-01-23 13:50:05', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afc37f0653e', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(244, 'Sample Equipment', 'Administrator', '2024-01-23 14:12:53', '09267387', 'Somewhere', '2024-01-25', 10, 'Equipment', '65afc4268353f', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(245, 'Sample Equipment', 'Administrator', '2024-01-23 14:12:53', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afc4268353f', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(246, 'Sample Equipment', 'Administrator', '2024-01-23 14:12:53', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afc4268353f', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(247, 'Sample Equipment', 'Administrator', '2024-01-23 14:15:16', '09267387', 'Somewhere', '2024-01-25', 10, 'Equipment', '65afc4268353f', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(248, 'Sample Equipment', 'Administrator', '2024-01-23 14:15:16', '09267387', 'Somewhere', '2024-01-23', 10, 'Equipment', '65afc4268353f', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(249, 'Sample Equipment', 'Administrator', '2024-01-23 14:15:16', '09267387', 'Somewhere', '2024-01-23', 10, 'Equipment', '65afc4268353f', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(250, 'Sample Equipment', 'Administrator', '2024-01-23 14:15:16', '09267387', 'Somewhere', '2024-01-23', 10, 'Equipment', '65afc4268353f', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(251, 'Sample Equipment', 'Administrator', '2024-01-23 14:15:16', '09267387', 'Somewhere', '2024-01-23', 10, 'Equipment', '65afc4268353f', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(252, 'Sample Equipment', 'Administrator', '2024-01-23 14:15:16', '09267387', 'Somewhere', '2024-01-23', 10, 'Equipment', '65afc4268353f', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(253, 'Sample Equipment', 'Administrator', '2024-01-23 14:18:44', '09267387', 'Somewhere', '2024-01-24', 10, 'Equipment', '65afc4268353f', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(254, 'Sample Tool', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 20, 'Tools', '65afcacf8ea80', 'Tools Room', NULL, '2024-01-23', NULL, NULL, NULL, '', ''),
(255, 'Equipt', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 10, 'Equipment', '65afcaf4a62fc', 'Equipment Room', NULL, '2024-01-23', NULL, NULL, NULL, '', ''),
(256, 'Equipt', 'Administrator', '2024-01-23 14:19:56', '09267387', 'Somewhere', '2024-01-30', 5, 'Equipment', '65afcaf4a62fc', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(257, 'Equipt', 'Administrator', '2024-01-23 14:19:56', '09267387', 'Somewhere', '2024-01-23', 5, 'Equipment', '65afcaf4a62fc', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(258, 'Equipt', 'Administrator', '2024-01-23 14:34:03', '09267387', 'Somewhere', '2024-01-31', 5, 'Equipment', '65afcaf4a62fc', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(259, 'Equipt', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 10, 'Equipment', '65afce6d15fa9', 'Equipment Room', NULL, '2024-01-23', NULL, NULL, NULL, '', ''),
(260, 'Equipt', 'Administrator', '2024-01-23 14:34:38', '09267387', 'Somewhere', '2024-01-24', 5, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(261, 'Equipt', 'Administrator', '2024-01-23 14:34:38', '09267387', 'Somewhere', '2024-01-23', 5, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(262, 'Equipt', 'Administrator', '2024-01-23 14:37:05', '09267387', 'Somewhere', '2024-02-01', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(263, 'Equipt', 'Administrator', '2024-01-23 14:37:12', '09267387', 'Toweling', '2024-02-03', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(264, 'Equipt', 'Administrator', '2024-01-23 14:37:05', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(265, 'Equipt', 'Administrator', '2024-01-23 14:37:05', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(266, 'Equipt', 'Administrator', '2024-01-23 14:37:05', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(267, 'Equipt', 'Administrator', '2024-01-23 14:37:05', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(268, 'Equipt', 'Administrator', '2024-01-23 14:37:05', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(269, 'Equipt', 'Administrator', '2024-01-23 14:37:05', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(270, 'Equipt', 'Administrator', '2024-01-23 14:37:12', '09267387', 'Toweling', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(271, 'Equipt', 'Administrator', '2024-01-23 14:37:12', '09267387', 'Toweling', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(272, 'Equipt', 'Administrator', '2024-01-23 14:37:12', '09267387', 'Toweling', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(273, 'Equipt', 'Administrator', '2024-01-23 14:37:12', '09267387', 'Toweling', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(274, 'Equipt', 'Administrator', '2024-01-23 14:42:55', '09267387', 'Somewhere', '2024-01-31', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(275, 'Equipt', 'Administrator', '2024-01-23 14:42:55', '09267387', 'Somewhere', '2024-01-23', 1, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(276, 'Equipt', 'Administrator', '2024-01-23 14:44:21', '09267387', 'Somewhere', '2024-01-31', 5, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(277, 'Equipt', 'Administrator', '2024-01-23 14:44:21', '09267387', 'Somewhere', '2024-01-23', 5, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(278, 'Equipt', 'Administrator', '2024-01-23 14:44:51', '09267387', 'Somewhere', '2024-01-26', 20, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(279, 'Equipt', 'Administrator', '2024-01-23 14:44:51', '09267387', 'Somewhere', '2024-01-23', 15, 'Equipment', '65afce6d15fa9', 'Equipment Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(280, 'Sample Tool', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65afd0f41e0f5', 'Tools Room', NULL, '2024-01-23', NULL, NULL, NULL, '', ''),
(281, 'Sample Tool', 'Administrator', '2024-01-23 14:45:24', '0938831513', 'SAMPE', '2024-01-31', 1, 'Tools', '65afd0f41e0f5', 'Tools Room', 'Borrowed', '2024-01-23', NULL, NULL, NULL, '', ''),
(282, 'Sample Tool', 'Administrator', '2024-01-23 14:45:24', '0938831513', 'SAMPE', '2024-01-23', 1, 'Tools', '65afd0f41e0f5', 'Tools Room', 'Returned', '2024-01-23', NULL, NULL, NULL, '', ''),
(283, 'Sample Tool', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b12064aa417', 'Tools Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(284, 'Fork', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b1206c56efb', 'Tools Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(285, 'Fork', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b120d9e0db5', 'Tools Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(286, 'Jester', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b12555f1081', 'Tools Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(287, 'Jester', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b1256b5eef8', 'Tools Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(288, 'Sample', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b126065800c', 'Tools Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(289, 'Salen', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b1261045402', 'Tools Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(290, 'Aicel', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b1262a0d0ac', 'Tools Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(291, 'Sample Equipment', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b126e997a3e', 'Equipment Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(292, 'Sample Equipment', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b126f3d05d2', 'Equipment Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(293, 'Aixel', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b126fb1c788', 'Equipment Room', NULL, '2024-01-24', NULL, NULL, NULL, '', ''),
(294, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12a95c463e', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '100mL', NULL, '', ''),
(295, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12aa3867ef', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '100mL', NULL, '', ''),
(296, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12ab2c9255', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '100mL', NULL, '', ''),
(297, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12adb2c9fe', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '1000mL', NULL, '', ''),
(298, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12afc52797', 'Supplies Room', 'Added', '2024-01-24', '2024-01-26', '100mL', NULL, '', ''),
(299, 'Item', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12c5bcf8e8', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '100mL', NULL, '', ''),
(300, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12c65df188', 'Supplies Room', 'Added', '2024-01-24', '2024-02-02', '100mL', NULL, '', ''),
(301, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12cde47787', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '100mL', NULL, '', ''),
(302, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12cedcb993', 'Supplies Room', 'Added', '2024-01-24', '2024-01-26', '100mL', NULL, '', ''),
(303, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12d57288cc', 'Supplies Room', 'Added', '2024-01-24', '2024-01-26', '100mL', NULL, '', ''),
(304, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12d6f46115', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '1000mL', NULL, '', ''),
(305, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12dca77950', 'Supplies Room', 'Added', '2024-01-24', '2024-01-27', '100mL', NULL, '', ''),
(306, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12de64a13f', 'Supplies Room', 'Added', '2024-01-24', '2024-01-26', '100mL', NULL, '', ''),
(307, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12e0eb3c1b', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '1000mL', NULL, '', ''),
(308, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12e1727af9', 'Supplies Room', 'Added', '2024-01-24', '2024-01-25', '100mL', NULL, '', ''),
(309, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12e316c7b3', 'Supplies Room', 'Added', '2024-01-24', '2024-01-26', '100mL', NULL, '', ''),
(310, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12f8f00595', 'Supplies Room', 'Added', '2024-01-24', '2024-01-26', '1000mL', NULL, '', ''),
(311, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b12fa355014', 'Supplies Room', 'Added', '2024-01-24', '2024-01-26', '1000mL', NULL, '', ''),
(312, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b13015c6a83', 'Supplies Room', 'Added', '2024-01-24', '2024-01-26', '1000mL', NULL, '', ''),
(313, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b130ade999b', 'Supplies Room', 'Added', '2024-01-24', '2024-01-31', '1000mL', NULL, '', ''),
(314, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b130f6bf401', 'Supplies Room', 'Added', '2024-01-24', '2024-01-31', '1000mL', NULL, '', ''),
(315, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b13102a7b33', 'Supplies Room', 'Added', '2024-01-24', '2024-02-07', '1000g', NULL, '', ''),
(316, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b131370aa11', 'Supplies Room', 'Added', '2024-01-24', '2024-02-01', '1000kg', NULL, '', ''),
(317, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1319f781aa', 'Supplies Room', 'Added', '2024-01-24', '2024-01-31', '1000mL', NULL, '', ''),
(318, 'Kitchen Knife', 'Administrator', '2024-01-24 15:56:43', '0938831513', 'SAMPE', '2024-02-01', 1, 'Tools', '65797ec90828f', 'Tools Room', 'Borrowed', '2024-01-24', NULL, NULL, NULL, '', ''),
(319, 'Salen', 'Administrator', '2024-01-24 15:57:41', '0938831513', 'Tooling', '2024-02-02', 1, 'Tools', '65b1261045402', 'Tools Room', 'Borrowed', '2024-01-24', NULL, NULL, NULL, '', ''),
(320, 'Item 2', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1ae43dd873', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(321, 'Item 3', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1ae5d6beeb', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(322, 'Item 2', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1ae743d520', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(323, 'Item 2', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1ae8193477', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(324, 'Item 2', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1ae9ef1efc', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(325, 'Item 2', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1af5d97044', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '100mL', NULL, '', ''),
(326, 'Item 2', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b0930bce2', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '100mL', NULL, '', ''),
(327, 'Brand 43', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b18989d89', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(328, 'Brand', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b1b19f402', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(329, 'Brand', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b1cb70b7a', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '10mL', NULL, '', ''),
(330, 'Brand', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b1dfcda1d', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '10mL', NULL, '', ''),
(331, 'Brand', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b1f5daa15', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '100kg', NULL, '', ''),
(332, 'Tesr', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b4da8828d', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(333, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b4eb2fd6f', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(334, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b4faa54ea', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(335, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b50a9a098', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '1mL', NULL, '', ''),
(336, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1b51b0be52', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '300kg', NULL, '', ''),
(337, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1bac33b4df', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(338, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1bada43c72', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '100mL', NULL, '', ''),
(339, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1bc98aa4bf', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '1mL', NULL, '', ''),
(340, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c08b634b2', 'Supplies Room', 'Added', '2024-01-25', '2024-02-03', '300mL', NULL, '', ''),
(341, 'tester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c0dcb92ee', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(342, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c11ed7c30', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '100g', NULL, '', ''),
(343, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c16a727f1', 'Supplies Room', 'Added', '2024-01-25', '2024-01-30', '300pc', NULL, '', ''),
(344, 'Cutie', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c1e2a690b', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(345, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c2188304d', 'Supplies Room', 'Added', '2024-01-25', '2024-02-22', '10mL', NULL, '', ''),
(346, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c31ccd712', 'Supplies Room', 'Added', '2024-01-25', '2024-02-05', '300g', NULL, '', ''),
(347, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c34173996', 'Supplies Room', 'Added', '2024-01-25', '2024-02-08', '100kg', NULL, '', ''),
(348, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c3861f6b4', 'Supplies Room', 'Added', '2024-01-25', '2024-02-28', '10kg', NULL, '', ''),
(349, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b1c3a67e5b4', 'Supplies Room', 'Added', '2024-01-25', '2024-02-10', '100546mL', NULL, '', ''),
(350, 'Juice', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b23ba62c73b', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(351, 'Juice', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b23c8e6da97', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '1000L', NULL, '', ''),
(352, 'Juice', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b23d20df536', 'Supplies Room', 'Added', '2024-01-25', '2024-01-29', '1000pc', NULL, '', ''),
(353, 'Juice', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b23d20df536', 'Supplies Room', 'Added', '2024-01-25', '2024-01-29', '1000pc', NULL, '', ''),
(354, 'Juice', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b23d591eb12', 'Supplies Room', 'Added', '2024-01-25', '2024-02-01', '100mL', NULL, '', ''),
(355, 'Juice', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b23d7fa635e', 'Supplies Room', 'Added', '2024-01-25', '2024-02-01', '100mL', NULL, '', ''),
(356, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b23db1a19f4', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '100mL', NULL, '', ''),
(357, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b240a6bc33c', 'Supplies Room', 'Added', '2024-01-25', '2024-01-29', '900mL', NULL, '', ''),
(358, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d3017f42c', 'Supplies Room', 'Added', '2024-01-25', '2024-01-31', '100mL', NULL, '', ''),
(359, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d3017f42c', 'Supplies Room', 'Added', '2024-01-25', '2024-01-31', '100mL', NULL, '', ''),
(360, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d3017f42c', 'Supplies Room', 'Added', '2024-01-25', '2024-01-31', '100mL', NULL, '', ''),
(361, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d3309d53d', 'Supplies Room', 'Added', '2024-01-25', '2024-01-30', '10045mL', NULL, '', ''),
(362, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d39873e44', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '10045mL', NULL, '', ''),
(363, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d3a3ef5bf', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '900kg', NULL, '', ''),
(364, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d3b2246f4', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '900mL', NULL, '', ''),
(365, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d3b2246f4', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '900mL', NULL, '', ''),
(366, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d3b2246f4', 'Supplies Room', 'Added', '2024-01-25', '2024-01-26', '900mL', NULL, '', ''),
(367, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d5db27944', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '100mL', NULL, '', ''),
(368, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d60160127', 'Supplies Room', 'Added', '2024-01-25', '2024-01-28', '100mL', NULL, '', ''),
(369, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d60160127', 'Supplies Room', 'Added', '2024-01-25', '2024-01-28', '100mL', NULL, '', ''),
(370, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2d60160127', 'Supplies Room', 'Added', '2024-01-25', '2024-01-28', '100mL', NULL, '', ''),
(371, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2db0852bb9', 'Supplies Room', 'Added', '2024-01-25', '2024-01-29', '100mL', NULL, '', ''),
(372, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2db418760a', 'Supplies Room', 'Added', '2024-01-25', '2024-02-07', '100mL', NULL, '', ''),
(373, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2db76829f2', 'Supplies Room', 'Added', '2024-01-25', '2024-02-10', '100mL', NULL, '', ''),
(374, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2db8c77d71', 'Supplies Room', 'Added', '2024-01-25', '2024-02-01', '100mL', NULL, '', ''),
(375, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2dd2389062', 'Supplies Room', 'Added', '2024-01-25', '2024-01-28', '100mL', NULL, '', ''),
(376, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2dd3c1aa40', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '10045mL', NULL, '', ''),
(377, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2dd3c1aa40', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '10045mL', NULL, '', ''),
(378, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e0234fcd4', 'Supplies Room', 'Added', '2024-01-25', '2024-02-01', '10045mL', NULL, '', ''),
(379, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e07a964f8', 'Supplies Room', 'Added', '2024-01-25', '2024-02-08', '10054mL', NULL, '', ''),
(380, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e0c45dcaa', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '100mL', NULL, '', ''),
(381, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e52bcfe65', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '1mL', NULL, '', ''),
(382, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e538cb260', 'Supplies Room', 'Added', '2024-01-25', '2024-01-31', '100mL', NULL, '', ''),
(383, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e549e75a7', 'Supplies Room', 'Added', '2024-01-25', '2024-01-29', '100mL', NULL, '', ''),
(384, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e55c544ce', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '10045mL', NULL, '', ''),
(385, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e5719a375', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '1000g', NULL, '', ''),
(386, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e5955d87b', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '1000g', NULL, '', ''),
(387, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e6747d825', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '100g', NULL, '', ''),
(388, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e68aef9ab', 'Supplies Room', 'Added', '2024-01-25', '2024-02-03', '1000kg', NULL, '', ''),
(389, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e6951bba7', 'Supplies Room', 'Added', '2024-01-25', '2028-06-26', '100g', NULL, '', ''),
(390, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e6a72c559', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '900pc', NULL, '', ''),
(391, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e721133b9', 'Supplies Room', 'Added', '2024-01-25', '2024-02-07', '100mL', NULL, '', ''),
(392, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e72c8c680', 'Supplies Room', 'Added', '2024-01-25', '2024-02-07', '100mL', NULL, '', ''),
(393, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2e77a90139', 'Supplies Room', 'Added', '2024-01-25', '2024-01-27', '1000mL', NULL, '', ''),
(394, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2ea7eae995', 'Supplies Room', 'Added', '2024-01-26', '2024-02-10', '100mL', NULL, '', ''),
(395, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2ea86d5d17', 'Supplies Room', 'Added', '2024-01-26', '2024-02-10', '100mL', NULL, '', ''),
(396, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2ea9760e59', 'Supplies Room', 'Added', '2024-01-26', '2024-02-06', '1000mL', NULL, '', ''),
(397, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2eaa334de7', 'Supplies Room', 'Added', '2024-01-26', '2024-02-10', '1000kg', NULL, '', ''),
(398, 'Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b2eaae04d96', 'Supplies Room', 'Added', '2024-01-26', '2024-02-09', '100mL', NULL, '', ''),
(399, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b4301c1abd3', 'Supplies Room', 'Added', '2024-01-26', '2024-01-28', '100mL', NULL, '', ''),
(400, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b4355ce681b', 'Supplies Room', 'Added', '2024-01-26', '2024-01-28', '100mL', NULL, '', ''),
(401, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b441454c61b', 'Supplies Room', 'Added', '2024-01-27', '2024-01-30', '900L', NULL, '', ''),
(402, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b441a1abd5e', 'Supplies Room', 'Added', '2024-01-27', '2024-02-07', '1000g', NULL, '', ''),
(403, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b441b24486b', 'Supplies Room', 'Added', '2024-01-27', '2024-01-28', '10045mL', NULL, '', ''),
(404, 'Sample', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b760865278a', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(405, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b76513cee4b', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '1000mL', NULL, '', ''),
(406, 'Andrey', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b767918f4b0', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(407, 'Aicel', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b767d67d95d', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(408, 'Sam', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b7681e5d8b4', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(409, 'Sam', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b76854d55e3', 'Supplies Room', 'Added', '2024-01-29', '2024-01-31', '200mL', NULL, '', ''),
(410, '1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b768c52d206', 'Supplies Room', 'Added', '2024-01-29', '2024-02-07', '10045mL', NULL, '', ''),
(411, 'Item1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b769368d9ae', 'Supplies Room', 'Added', '2024-01-29', '2024-02-02', '900mL', NULL, '', ''),
(412, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b769405586e', 'Supplies Room', 'Added', '2024-01-29', '2024-02-08', '10054mL', NULL, '', ''),
(413, 'JJ', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b7a7afa1049', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '1mL', NULL, '', ''),
(414, 'Admin', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b7af715cbe7', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(415, 'JJE', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b7afa79e4e7', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(416, 'dshjh', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b7b0944b4fe', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(417, 'Item', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 8, 'Supplies', '65b7b0e45eb1c', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(418, 'Sample', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b7b11a0acf1', 'Supplies Room', 'Added', '2024-01-29', '2024-01-31', '100mL', NULL, '', ''),
(419, 'Jester123', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b7b4cd87be3', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(420, '123', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b7b52dd5e9c', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(421, 'fgdg', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 3, 'Tools', '65b7b5ee8cd0d', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(422, 'sdfsdf', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7b62f3d038', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(423, 'Sample Equipmentas', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7b6b4be4bc', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(424, 'Aicel', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65b7b8788e1eb', 'Supplies Room', 'Added', '2024-01-29', '2024-01-30', '100mL', NULL, '', ''),
(425, 'Jes', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7b9b835760', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(426, 'Equipt', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7ba4b8bcbe', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(427, 'Sam', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bae5e15f9', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(428, 'Sam', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bb157d86e', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(429, 'Tests', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bb26db025', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(430, 'Tester', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bb6874ad4', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', '');
INSERT INTO `return_history` (`id`, `item`, `name`, `date_borrowed`, `contactno`, `whereplace`, `returndate`, `quantity`, `category`, `tagid`, `room`, `status`, `item_created`, `expiry`, `unit`, `conditions`, `eventname`, `function`) VALUES
(431, 'Tester', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bb701b096', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(432, 'Blender', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bb7b2f841', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(433, 'Jester', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bbcd77956', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(434, 'Jester', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bbf72a6f1', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(435, 'Jester', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bbff25fa8', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(436, 'Jester', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bc4ecbc5a', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(437, 'Test', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bc96486bf', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(438, 'Test', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b7bcf73f9a5', 'Equipment Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(439, 'JJ', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b7be3616b21', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(440, 'Sami', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 6, 'Tools', '65b7be571f569', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(441, 'k', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b7beb36b00e', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(442, 'Sample', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b7bf0039ca2', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(443, 'E', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b7bfe2bdf51', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(444, 'Sami', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65b7c123a545a', 'Tools Room', NULL, '2024-01-29', NULL, NULL, NULL, '', ''),
(445, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b8facc98c35', 'Equipment Room', NULL, '2024-01-30', NULL, NULL, NULL, '', ''),
(446, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65b8fb33d2350', 'Equipment Room', NULL, '2024-01-30', NULL, NULL, NULL, '', ''),
(447, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65bb7b4ddf7ab', 'Supplies Room', 'Added', '2024-02-01', '2024-02-02', '100mL', NULL, '', ''),
(448, 'Sample Tools', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65bb7b68bc0be', 'Tools Room', NULL, '2024-02-01', NULL, NULL, NULL, '', ''),
(449, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65bb7b8052cb2', 'Equipment Room', NULL, '2024-02-01', NULL, NULL, NULL, '', ''),
(450, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65bb7c5b511b3', 'Supplies Room', 'Added', '2024-02-01', '2024-02-02', '100mL', NULL, '', ''),
(451, 'Jester', 'Administrator', '2024-02-01 11:12:07', NULL, 'Booking', NULL, 1, 'Supplies', '65bb7c5b511b3', 'Supplies Room', 'Consumed', '2024-02-01', NULL, NULL, NULL, '', ''),
(452, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 8, 'Supplies', '65bb7cf2cf5a6', 'Supplies Room', 'Added', '2024-02-01', '2024-02-23', '10mL', NULL, '', ''),
(453, 'JK', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65bb7d5a37f73', 'Supplies Room', 'Added', '2024-02-01', '2024-02-02', '100mL', NULL, '', ''),
(454, 'Test', 'Administrator', '2024-02-01 11:19:02', '09267387', 'Somewhere', '2024-02-17', 1, 'Equipment', '65b7bcf73f9a5', 'Equipment Room', 'Borrowed', '2024-02-01', NULL, NULL, NULL, '', ''),
(455, 'Equipt', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65bb7e9988122', 'Equipment Room', NULL, '2024-02-01', NULL, NULL, NULL, '', ''),
(456, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65bb7eb669f37', 'Equipment Room', NULL, '2024-02-01', NULL, NULL, NULL, '', ''),
(457, 'Example', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65bb7f3e42b13', 'Equipment Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(458, 'Sample', 'Administrator', '2024-02-01 11:24:43', '0938831513', 'Tooling', '2024-02-24', 1, 'Tools', '65b7bf0039ca2', 'Tools Room', 'Borrowed', '2024-02-01', NULL, NULL, NULL, '', ''),
(459, 'Sample Tool', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65bb7fca83b5b', 'Tools Room', NULL, '2024-02-01', NULL, NULL, NULL, '', ''),
(460, 'JestTools', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 3, 'Tools', '65bb800a7b51f', 'Tools Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(461, 'Unique', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65bb81f612fc8', 'Tools Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(462, 'Jk', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65bb82f1eb59f', 'Equipment Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(463, 'Toolings', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65bb830e1b829', 'Tools Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(464, 'Kim', '', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65bb83f5b1d52', 'Tools Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(465, 'Import', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65bb85bdc517e', 'Tools Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(466, 'Supply1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 100, 'Supplies', '65bb863356337', 'Supplies Room', 'Added', '2024-02-01', '2024-02-08', '100mL', NULL, '', ''),
(467, 'SampleTool', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 100, 'Tools', '65bb864c3adf1', 'Tools Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(468, 'Sample Equipment', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 100, 'Equipment', '65bb865d017e7', 'Equipment Room', 'Added', '2024-02-01', NULL, NULL, NULL, '', ''),
(469, 'Supply1', 'Administrator', '2024-02-01 11:54:35', NULL, 'Jester', NULL, 50, 'Supplies', '65bb863356337', 'Supplies Room', 'Consumed', '2024-02-01', NULL, NULL, NULL, '', ''),
(470, 'SampleTool', 'Administrator', '2024-02-01 11:56:56', '0938831513', 'Tooling', '2024-02-23', 4, 'Tools', '65bb864c3adf1', 'Tools Room', 'Borrowed', '2024-02-01', NULL, NULL, NULL, '', ''),
(471, 'Sample Equipment', 'Administrator', '2024-02-01 11:57:24', '09267387', 'Toweling', '2024-03-01', 1, 'Equipment', '65bb865d017e7', 'Equipment Room', 'Borrowed', '2024-02-01', NULL, NULL, NULL, '', ''),
(472, 'Supply101', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 36, 'Supplies', '65bc2f817941c', 'Supplies Room', 'Added', '2024-02-02', '2024-02-03', '100mL', NULL, '', ''),
(473, 'Supply101', 'Princess Shane Garcia', '2024-02-01 23:57:03', NULL, '1', NULL, 1, 'Supplies', '65bc2f817941c', 'Supplies Room', 'Consumed', '2024-02-02', NULL, NULL, NULL, '', ''),
(474, 'STool', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65bc2febc8f86', 'Tools Room', 'Added', '2024-02-02', NULL, NULL, NULL, '', ''),
(475, 'Baso', 'Princess Shane Garcia', '0000-00-00 00:00:00', '', '', '0000-00-00', 100, 'Tools', '65bc30c08a75c', 'Tools Room', 'Added', '2024-02-02', NULL, NULL, NULL, '', ''),
(476, 'Baso', 'Princess Shane Garcia', '2024-02-02 00:01:24', '0938831513', 'SAMPE', '2024-02-17', 1, 'Tools', '65bc30c08a75c', 'Tools Room', 'Borrowed', '2024-02-02', NULL, NULL, NULL, '', ''),
(477, 'Baso', 'Princess Shane Garcia', '2024-02-02 00:01:24', '0938831513', 'SAMPE', '2024-02-02', 1, 'Tools', '65bc30c08a75c', 'Tools Room', 'Returned', '2024-02-02', NULL, NULL, NULL, '', ''),
(478, 'Baso', 'Administrator', '2024-02-02 00:06:00', '798139', 'Dalas', '2024-03-01', 10, 'Tools', '65bc30c08a75c', 'Tools Room', 'Borrowed', '2024-02-02', NULL, NULL, NULL, '', ''),
(479, 'Baso', 'Administrator', '2024-02-02 00:06:00', '798139', 'Dalas', '2024-02-02', 10, 'Tools', '65bc30c08a75c', 'Tools Room', 'Returned', '2024-02-02', NULL, NULL, NULL, '', ''),
(480, 'Baso', 'Administrator', '2024-02-02 00:08:03', '798139', 'TO USer', '2024-02-28', 10, 'Tools', '65bc30c08a75c', 'Tools Room', 'Borrowed', '2024-02-02', NULL, NULL, NULL, '', ''),
(481, 'Baso', 'Princess Shane Garcia', '2024-02-02 00:08:03', '798139', 'TO USer', '2024-02-02', 10, 'Tools', '65bc30c08a75c', 'Tools Room', 'Returned', '2024-02-02', NULL, NULL, NULL, '', ''),
(482, 'Test', 'Administrator', '2024-02-02 00:08:54', '792719', 'To User Equipmemt', '2024-03-01', 1, 'Equipment', '65bb7eb669f37', 'Equipment Room', 'Borrowed', '2024-02-02', NULL, NULL, NULL, '', ''),
(483, 'Baso', 'Administrator', '2024-02-02 13:03:24', '0938831513', 'SAMPE', '2024-02-15', 50, 'Tools', '65bc30c08a75c', 'Tools Room', 'Borrowed', '2024-02-02', NULL, NULL, NULL, '', ''),
(484, 'Baso', 'Princess Shane Garcia', '2024-02-02 13:03:24', '0938831513', 'SAMPE', '2024-02-02', 50, 'Tools', '65bc30c08a75c', 'Tools Room', 'Returned', '2024-02-02', NULL, NULL, NULL, '', ''),
(485, 'Sample', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65c075b124bfe', 'Supplies Room', 'Added', '2024-02-05', '2024-02-24', '100mL', NULL, '', ''),
(486, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 100, 'Supplies', '65c07757339d8', 'Supplies Room', 'Added', '2024-02-05', '2024-02-06', '100mL', NULL, '', ''),
(487, 'Jester', 'Administrator', '2024-02-05 06:01:37', NULL, 'Bookingas', NULL, 5, 'Supplies', '65c07757339d8', 'Supplies Room', 'Consumed', '2024-02-05', NULL, NULL, NULL, '', ''),
(488, 'Jester', 'Administrator', '2024-02-05 06:03:01', NULL, '12', NULL, 1, 'Supplies', '65c07757339d8', 'Supplies Room', 'Consumed', '2024-02-05', NULL, NULL, NULL, '', ''),
(489, 'Baso', 'Administrator', '2024-02-05 06:05:52', '0938831513', 'SAMPE', '2024-02-23', 50, 'Tools', '65bc30c08a75c', 'Tools Room', 'Borrowed', '2024-02-05', NULL, NULL, NULL, '', ''),
(490, 'Test', 'Administrator', '2024-02-05 06:06:21', '09267387', 'Somewhere', '2024-02-17', 3, 'Equipment', '65bb7eb669f37', 'Equipment Room', 'Borrowed', '2024-02-05', NULL, NULL, NULL, '', ''),
(491, 'Sample', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65c07bb43320c', 'Tools Room', 'Added', '2024-02-05', NULL, NULL, NULL, '', ''),
(492, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65c07c5c49ee3', 'Equipment Room', 'Added', '2024-02-05', NULL, NULL, NULL, '', ''),
(493, 'Test', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65c07cf30a898', 'Equipment Room', 'Added', '2024-02-05', NULL, NULL, NULL, '', ''),
(494, 'S1', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 8, 'Supplies', '65c07e6c22580', 'Supplies Room', 'Added', '2024-02-05', '2024-02-07', '100mL', NULL, '', ''),
(495, 'S1', 'Administrator', '2024-02-05 06:21:59', NULL, 'Booking', NULL, 4, 'Supplies', '65c07e6c22580', 'Supplies Room', 'Consumed', '2024-02-05', NULL, NULL, NULL, '', ''),
(496, 'as', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 13, 'Tools', '65c07e97aced8', 'Tools Room', 'Added', '2024-02-05', NULL, NULL, NULL, '', ''),
(497, 'as', 'Administrator', '2024-02-05 06:22:38', '0938831513', 'Tooling', '2024-03-01', 6, 'Tools', '65c07e97aced8', 'Tools Room', 'Borrowed', '2024-02-05', NULL, NULL, NULL, '', ''),
(498, 'Testa', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 3, 'Equipment', '65c07eb892bf7', 'Equipment Room', 'Added', '2024-02-05', NULL, NULL, NULL, '', ''),
(499, 'Testa', 'Administrator', '2024-02-05 06:23:09', '09267387', 'Somewhere', '2024-02-22', 5, 'Equipment', '65c07eb892bf7', 'Equipment Room', 'Borrowed', '2024-02-05', NULL, NULL, NULL, '', ''),
(500, 'Sample', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Supplies', '65c0e6f7e3714', 'Supplies Room', 'Added', '2024-02-05', '2024-02-07', '100mL', NULL, '', ''),
(501, 'Sample', 'Administrator', '2024-02-05 13:47:57', NULL, 'Booking', NULL, 1, 'Supplies', '65c0e6f7e3714', 'Supplies Room', 'Consumed', '2024-02-05', NULL, NULL, NULL, '', ''),
(502, 'Sample Toolaas', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Tools', '65c0e7158a5cd', 'Tools Room', 'Added', '2024-02-05', NULL, NULL, NULL, '', ''),
(503, 'Sample Toolaas', 'Administrator', '2024-02-05 13:48:25', '0938831513', 'SAMPE', '2024-02-16', 3, 'Tools', '65c0e7158a5cd', 'Tools Room', 'Borrowed', '2024-02-05', NULL, NULL, NULL, '', ''),
(504, 'Jester', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 1, 'Equipment', '65c0e73c0d0a1', 'Equipment Room', 'Added', '2024-02-05', NULL, NULL, NULL, '', ''),
(505, 'Jester', 'Administrator', '2024-02-05 13:49:01', '09267387', 'Somewhere', '2024-02-15', 1, 'Equipment', '65c0e73c0d0a1', 'Equipment Room', 'Borrowed', '2024-02-05', NULL, NULL, NULL, '', ''),
(506, 'Sample Equipment', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 4, 'Equipment', '65c0e8017df74', 'Equipment Room', 'Added', '2024-02-05', NULL, NULL, NULL, '', ''),
(507, 'Sample Equipment', 'Administrator', '2024-02-05 13:52:15', '09267387', 'Somewhere', '2024-02-10', 1, 'Equipment', '65c0e8017df74', 'Equipment Room', 'Borrowed', '2024-02-05', NULL, NULL, NULL, '', ''),
(508, 'Sample Equipment', 'Administrator', '2024-02-05 13:52:15', '09267387', 'Somewhere', '2024-02-05', 1, 'Equipment', '65c0e8017df74', 'Equipment Room', 'Returned', '2024-02-05', NULL, NULL, NULL, '', ''),
(509, 'Sample Tool', 'Administrator', '2024-02-05 14:15:56', '09552125421', 'Testing', '2024-03-01', 6, 'Tools', '65bb7fca83b5b', 'Tools Room', 'Borrowed', '2024-02-05', NULL, NULL, NULL, '', ''),
(510, 'Baso', 'Administrator', '2024-02-06 01:45:51', '09552125421', 'Testing', '2024-02-29', 10, 'Tools', '65bc30c08a75c', 'Tools Room', 'Borrowed', '2024-02-06', NULL, NULL, NULL, '', ''),
(511, 'Baso', 'Administrator', '2024-02-06 01:45:51', '09552125421', 'Testing', '2024-02-06', 5, 'Tools', '65bc30c08a75c', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, NULL, '', ''),
(512, 'Energy Drink', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 34, 'Supplies', '65c23623f35c2', 'Supplies Room', 'Added', '2024-02-06', '2024-03-08', '290mL', NULL, '', ''),
(513, 'Energy Drink', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 50, 'Supplies', '65c2363994166', 'Supplies Room', 'Added', '2024-02-06', '2024-03-08', '320mL', NULL, '', ''),
(514, 'Energy Drink', 'Administrator', '2024-02-06 13:39:40', NULL, 'Testing', NULL, 10, 'Supplies', '65c2363994166', 'Supplies Room', 'Consumed', '2024-02-06', NULL, NULL, NULL, '', ''),
(515, 'Fork', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 365, 'Tools', '65c237548d919', 'Tools Room', 'Added', '2024-02-06', NULL, NULL, NULL, '', ''),
(516, 'Spoon', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 365, 'Tools', '65c2376256b6c', 'Tools Room', 'Added', '2024-02-06', NULL, NULL, NULL, '', ''),
(517, 'Blender', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 4, 'Equipment', '65c2376d67a60', 'Equipment Room', 'Added', '2024-02-06', NULL, NULL, NULL, '', ''),
(518, 'Aircon', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 9, 'Equipment', '65c237759b8ca', 'Equipment Room', 'Added', '2024-02-06', NULL, NULL, NULL, '', ''),
(519, 'Fork', 'Princess Shane Garcia', '2024-02-06 13:44:12', '09552125421', 'Testing', '2024-03-09', 65, 'Tools', '65c237548d919', 'Tools Room', 'Borrowed', '2024-02-06', NULL, NULL, NULL, '', ''),
(520, 'Fork', 'Administrator', '2024-02-06 13:44:12', '09552125421', 'Testing', '2024-02-06', 50, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, NULL, '', ''),
(521, 'Fork', 'Administrator', '2024-02-06 13:44:12', '09552125421', 'Testing', '2024-02-06', 5, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, NULL, '', ''),
(522, 'Energy Drink', 'Administrator', '2024-02-06 13:57:10', NULL, 'Testing', NULL, 2, 'Supplies', '65c2363994166', 'Supplies Room', 'Consumed', '2024-02-06', NULL, NULL, NULL, '', ''),
(523, 'Spoon', 'Administrator', '2024-02-06 13:57:31', '09552125421', 'Testing', '2024-02-28', 5, 'Tools', '65c2376256b6c', 'Tools Room', 'Borrowed', '2024-02-06', NULL, NULL, NULL, '', ''),
(524, 'Roasted Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 4, 'Supplies', '65c23b08648c3', 'Supplies Room', 'Added', '2024-02-06', '2024-03-01', '10kg', NULL, '', ''),
(525, 'Fork', 'Administrator', '2024-02-06 13:44:12', '09552125421', 'Testing', '2024-02-06', 5, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`) VALUES
(1, 'Supplies Room'),
(2, 'Tools Room'),
(3, 'Equipment Room');

-- --------------------------------------------------------

--
-- Table structure for table `supp_borrowed`
--

CREATE TABLE `supp_borrowed` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_borrowed` timestamp NOT NULL DEFAULT current_timestamp(),
  `contactno` varchar(255) DEFAULT NULL,
  `whereplace` text DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `quantity` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tagid` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `item_created` date NOT NULL DEFAULT current_timestamp(),
  `expiry` date DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `conditions` text DEFAULT NULL,
  `eventname` varchar(50) NOT NULL,
  `function` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supp_borrowed`
--

INSERT INTO `supp_borrowed` (`id`, `item`, `name`, `date_borrowed`, `contactno`, `whereplace`, `returndate`, `quantity`, `category`, `tagid`, `room`, `status`, `item_created`, `expiry`, `unit`, `conditions`, `eventname`, `function`) VALUES
(512, 'Energy Drink', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 42, 'Supplies', '65c23623f35c2', 'Supplies Room', 'Added', '2024-02-06', '2024-03-08', '290mL', NULL, '', ''),
(513, 'Energy Drink', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 45, 'Supplies', '65c2363994166', 'Supplies Room', 'Added', '2024-02-06', '2024-03-08', '320mL', NULL, '', ''),
(514, 'Energy Drink', 'Administrator', '2024-02-06 13:39:40', NULL, 'Testing', NULL, 10, 'Supplies', '65c2363994166', 'Supplies Room', 'Consumed', '2024-02-06', NULL, NULL, NULL, '', ''),
(515, 'Fork', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 365, 'Tools', '65c237548d919', 'Tools Room', 'Added', '2024-02-06', NULL, NULL, NULL, '', ''),
(516, 'Spoon', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 365, 'Tools', '65c2376256b6c', 'Tools Room', 'Added', '2024-02-06', NULL, NULL, NULL, '', ''),
(517, 'Blender', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 4, 'Equipment', '65c2376d67a60', 'Equipment Room', 'Added', '2024-02-06', NULL, NULL, NULL, '', ''),
(518, 'Aircon', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 9, 'Equipment', '65c237759b8ca', 'Equipment Room', 'Added', '2024-02-06', NULL, NULL, NULL, '', ''),
(519, 'Fork', 'Princess Shane Garcia', '2024-02-06 13:44:12', '09552125421', 'Testing', '2024-03-09', 5, 'Tools', '65c237548d919', 'Tools Room', 'Borrowed', '2024-02-06', NULL, NULL, NULL, '', ''),
(520, 'Fork', 'Administrator', '2024-02-06 13:44:12', '09552125421', 'Testing', '2024-02-06', 50, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, 'Good', '', ''),
(521, 'Fork', 'Administrator', '2024-02-06 13:44:12', '09552125421', 'Testing', '2024-02-06', 5, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, 'Good', '', ''),
(522, 'Energy Drink', 'Administrator', '2024-02-06 13:57:10', NULL, 'Testing', NULL, 2, 'Supplies', '65c2363994166', 'Supplies Room', 'Consumed', '2024-02-06', NULL, NULL, NULL, '', ''),
(523, 'Spoon', 'Administrator', '2024-02-06 13:57:31', '09552125421', 'Testing', '2024-02-28', 5, 'Tools', '65c2376256b6c', 'Tools Room', 'Borrowed', '2024-02-06', NULL, NULL, NULL, '', ''),
(524, 'Roasted Coffee', 'Administrator', '0000-00-00 00:00:00', '', '', '0000-00-00', 4, 'Supplies', '65c23b08648c3', 'Supplies Room', 'Added', '2024-02-06', '2024-03-01', '10kg', NULL, '', ''),
(525, 'Fork', 'Administrator', '2024-02-06 13:44:12', '09552125421', 'Testing', '2024-02-06', 5, 'Tools', '65c237548d919', 'Tools Room', 'Returned', '2024-02-06', NULL, NULL, 'Good', '', '');

--
-- Triggers `supp_borrowed`
--
DELIMITER $$
CREATE TRIGGER `after_insert_supp_borrowed` AFTER INSERT ON `supp_borrowed` FOR EACH ROW BEGIN
    INSERT INTO borrower_history (
        `item`, 
        `name`, 
        `date_borrowed`, 
        `contactno`, 
        `whereplace`, 
        `returndate`, 
        `quantity`, 
        `category`, 
        `tagid`, 
        `room`, 
        `status`, 
        `item_created`,
        `expiry`,
        `unit`,
        `conditions`
    )
    VALUES (
        NEW.`item`, 
        NEW.`name`, 
        NEW.`date_borrowed`, 
        NEW.`contactno`, 
        NEW.`whereplace`, 
        NEW.`returndate`, 
        NEW.`quantity`, 
        NEW.`category`, 
        NEW.`tagid`, 
        NEW.`room`, 
        NEW.`status`, 
        NEW.`item_created`,
        NEW.`expiry`,
        NEW.`unit`,
        NEW.`conditions`
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_update_supp_borrowed` AFTER INSERT ON `supp_borrowed` FOR EACH ROW BEGIN
    INSERT INTO return_history (
        id, item, name, date_borrowed, contactno, whereplace,
        returndate, quantity, category, tagid, room, status,
        item_created,expiry,unit, eventname, function
    ) VALUES (
        NEW.id, NEW.item, NEW.name, NEW.date_borrowed, NEW.contactno, NEW.whereplace,
        NEW.returndate, NEW.quantity, NEW.category, NEW.tagid, NEW.room, NEW.status,
        NEW.item_created,NEW.expiry,NEW.unit,NEW.eventname, NEW.function
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `cat_desc`) VALUES
(1, 'Equipment'),
(2, 'Furniture And Fixture');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_con`
--

CREATE TABLE `tbl_con` (
  `con_id` int(11) NOT NULL,
  `con_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_con`
--

INSERT INTO `tbl_con` (`con_id`, `con_desc`) VALUES
(1, 'Working'),
(2, 'Condemed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `pos_id` int(11) DEFAULT 1,
  `off_id` int(11) DEFAULT 1,
  `emp_un` varchar(100) DEFAULT NULL,
  `emp_pass` varchar(40) DEFAULT NULL,
  `type_id` int(11) DEFAULT 2,
  `accountname` varchar(255) DEFAULT NULL,
  `office` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `pos_id`, `off_id`, `emp_un`, `emp_pass`, `type_id`, `accountname`, `office`, `position`, `email`) VALUES
(48, 1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrator', 'admin', 'Manager', 'admin@gmail.com'),
(57, 1, 1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 'Princess Shane Garcia', 'Kitchen', 'Cook', 'user@gmail.com'),
(59, 1, 1, 'imman', '6503d1117b8ffdab5ebdad7f7f22e569', 2, 'Immanuel C. Baling', 'Lobby', 'Clerk', 'imman@gmail.com'),
(60, 1, 1, 'meh', '15927d9ab6ea93229b4f22a561664ec1', 2, 'Trixie Mae T. Roseta', 'Supplies Room ', 'Clerk', 'meh@gmail.com'),
(61, 1, 1, 'jp', '3f6d6bd92f0814f435890172083a9b46', 2, 'Jaypee A. Parcon', 'Tools Room', 'Maintenance', 'jparcon@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_type`
--

CREATE TABLE `tbl_emp_type` (
  `type_id` int(11) NOT NULL,
  `type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_emp_type`
--

INSERT INTO `tbl_emp_type` (`type_id`, `type_desc`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_serno` varchar(50) NOT NULL,
  `item_modno` varchar(50) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_amount` double NOT NULL,
  `item_purdate` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL DEFAULT 4,
  `status_id` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `tagid` varchar(255) NOT NULL,
  `supplyname` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `Unit` varchar(200) NOT NULL,
  `Expiry` date NOT NULL,
  `brand` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `tagid`, `supplyname`, `room`, `Unit`, `Expiry`, `brand`, `quantity`) VALUES
(133, '65c23623f35c2', 'Energy Drink', 'Supplies Room', '290mL', '2024-03-08', 'Sting', 44),
(134, '65c2363994166', 'Energy Drink', 'Supplies Room', '320mL', '2024-03-08', 'Sting', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_status`
--

CREATE TABLE `tbl_item_status` (
  `status_id` int(11) NOT NULL,
  `status_desc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_item_status`
--

INSERT INTO `tbl_item_status` (`status_id`, `status_desc`) VALUES
(1, 'for repair'),
(2, 'for transfer'),
(3, 'for condemed'),
(4, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_off`
--

CREATE TABLE `tbl_off` (
  `off_id` int(11) NOT NULL,
  `off_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_off`
--

INSERT INTO `tbl_off` (`off_id`, `off_desc`) VALUES
(1, 'PERSONNEL'),
(2, 'SGOD'),
(8, 'AAA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pos`
--

CREATE TABLE `tbl_pos` (
  `pos_id` int(11) NOT NULL,
  `pos_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pos`
--

INSERT INTO `tbl_pos` (`pos_id`, `pos_desc`) VALUES
(1, 'Information Technology Officer'),
(2, 'Book Keeper');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `req_id` int(11) NOT NULL,
  `req_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `req_type_id` int(11) NOT NULL,
  `req_status_id` int(11) NOT NULL DEFAULT 1,
  `req_is_done` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_req_status`
--

CREATE TABLE `tbl_req_status` (
  `req_status_id` int(11) NOT NULL,
  `req_status_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_req_status`
--

INSERT INTO `tbl_req_status` (`req_status_id`, `req_status_desc`) VALUES
(1, 'pending'),
(2, 'accepted'),
(3, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_req_type`
--

CREATE TABLE `tbl_req_type` (
  `req_type_id` int(11) NOT NULL,
  `req_type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_req_type`
--

INSERT INTO `tbl_req_type` (`req_type_id`, `req_type_desc`) VALUES
(1, 'repair'),
(2, 'transfer'),
(3, 'condemed'),
(4, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tools`
--

CREATE TABLE `tbl_tools` (
  `id` int(11) NOT NULL,
  `tagid` varchar(255) NOT NULL,
  `toolname` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tools`
--

INSERT INTO `tbl_tools` (`id`, `tagid`, `toolname`, `room`, `quantity`) VALUES
(56, '65c237548d919', 'Fork', 'Tools Room', 360),
(57, '65c2376256b6c', 'Spoon', 'Tools Room', 360);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `accountname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`borrower_id`);

--
-- Indexes for table `borrower_history`
--
ALTER TABLE `borrower_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supp_borrowed`
--
ALTER TABLE `supp_borrowed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_con`
--
ALTER TABLE `tbl_con`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `pos_id` (`pos_id`),
  ADD KEY `off_id` (`off_id`);

--
-- Indexes for table `tbl_emp_type`
--
ALTER TABLE `tbl_emp_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `con_id` (`con_id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item_status`
--
ALTER TABLE `tbl_item_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_off`
--
ALTER TABLE `tbl_off`
  ADD PRIMARY KEY (`off_id`);

--
-- Indexes for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `req_type_id` (`req_type_id`),
  ADD KEY `req_status_id` (`req_status_id`);

--
-- Indexes for table `tbl_req_status`
--
ALTER TABLE `tbl_req_status`
  ADD PRIMARY KEY (`req_status_id`);

--
-- Indexes for table `tbl_req_type`
--
ALTER TABLE `tbl_req_type`
  ADD PRIMARY KEY (`req_type_id`);

--
-- Indexes for table `tbl_tools`
--
ALTER TABLE `tbl_tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `borrower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `borrower_history`
--
ALTER TABLE `borrower_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supp_borrowed`
--
ALTER TABLE `supp_borrowed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=526;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_con`
--
ALTER TABLE `tbl_con`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_emp_type`
--
ALTER TABLE `tbl_emp_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tbl_item_status`
--
ALTER TABLE `tbl_item_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_off`
--
ALTER TABLE `tbl_off`
  MODIFY `off_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_req_status`
--
ALTER TABLE `tbl_req_status`
  MODIFY `req_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_req_type`
--
ALTER TABLE `tbl_req_type`
  MODIFY `req_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_tools`
--
ALTER TABLE `tbl_tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tbl_emp_type` (`type_id`),
  ADD CONSTRAINT `tbl_employee_ibfk_2` FOREIGN KEY (`pos_id`) REFERENCES `tbl_pos` (`pos_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_employee_ibfk_3` FOREIGN KEY (`off_id`) REFERENCES `tbl_off` (`off_id`);

--
-- Constraints for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employee` (`emp_id`),
  ADD CONSTRAINT `tbl_item_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `tbl_cat` (`cat_id`),
  ADD CONSTRAINT `tbl_item_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `tbl_item_status` (`status_id`),
  ADD CONSTRAINT `tbl_item_ibfk_5` FOREIGN KEY (`con_id`) REFERENCES `tbl_con` (`con_id`);

--
-- Constraints for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD CONSTRAINT `tbl_request_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`item_id`),
  ADD CONSTRAINT `tbl_request_ibfk_2` FOREIGN KEY (`req_type_id`) REFERENCES `tbl_req_type` (`req_type_id`),
  ADD CONSTRAINT `tbl_request_ibfk_3` FOREIGN KEY (`req_status_id`) REFERENCES `tbl_req_status` (`req_status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
