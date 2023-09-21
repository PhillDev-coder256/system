-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2023 at 02:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aemail` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL,
  `atel` varchar(15) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `fullname`, `apassword`, `atel`, `created_by`, `date_created`) VALUES
('rootadmin@igc.com', 'RootAdmin', '46b75e025a11a94efd4a232e3d16e921', '0760802891', 'rootadmin@igc.com', '2023-09-13 13:14:43'),
('phillipphilcourts540@gmail.com', 'Phillip', 'c4b7f93da52b4a617d04d2086a91043a', '0760802891', 'rootadmin@igc.com', '2023-09-14 06:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_expenditure`
--

CREATE TABLE `deleted_expenditure` (
  `ID` int(11) NOT NULL,
  `old_id` int(10) NOT NULL,
  `date_inserted` text NOT NULL,
  `date_deleted` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` text NOT NULL,
  `comment` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_income`
--

CREATE TABLE `deleted_income` (
  `ID` int(11) NOT NULL,
  `old_id` int(10) NOT NULL,
  `date_inserted` text NOT NULL,
  `date_deleted` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` text NOT NULL,
  `comment` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_income`
--

INSERT INTO `deleted_income` (`ID`, `old_id`, `date_inserted`, `date_deleted`, `amount`, `comment`, `email`) VALUES
(1, 1, '2023-09-13 15:42:22', '2023-09-13 16:45:26', '30000', 'MOBILE MONEY', 'demouser@igc.com');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_loan`
--

CREATE TABLE `deleted_loan` (
  `ID` int(11) NOT NULL,
  `old_id` int(10) NOT NULL,
  `date_inserted` text NOT NULL,
  `date_deleted` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` text NOT NULL,
  `comment` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_saving`
--

CREATE TABLE `deleted_saving` (
  `ID` int(11) NOT NULL,
  `old_id` int(10) NOT NULL,
  `date_inserted` text NOT NULL,
  `date_deleted` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` text NOT NULL,
  `comment` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_wishlist`
--

CREATE TABLE `deleted_wishlist` (
  `ID` int(11) NOT NULL,
  `old_id` int(10) NOT NULL,
  `date_inserted` text NOT NULL,
  `date_deleted` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` text NOT NULL,
  `comment` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(10) NOT NULL,
  `amount` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL,
  `useremail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(100) NOT NULL,
  `amount` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `useremail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `amount`, `comment`, `date`, `useremail`) VALUES
(2, '15000', 'demo', '2023-09-13 16:34:07', 'demouser@igc.com'),
(3, '500000', 'savings', '2023-09-14 14:36:33', 'demouser@igc.com'),
(4, '3000000', 'savings', '2023-09-14 14:42:07', 'nami@igc.com');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(10) NOT NULL,
  `amount` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL,
  `useremail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `messagebody` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paid_loan`
--

CREATE TABLE `paid_loan` (
  `ID` int(11) NOT NULL,
  `old_id` int(10) NOT NULL,
  `date_inserted` text NOT NULL,
  `date_paid` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` text NOT NULL,
  `comment` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_requests`
--

CREATE TABLE `password_reset_requests` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b33e89bb4f62', '2023-09-15 06:58:30'),
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b3aa7862b2c8', '2023-09-15 06:59:00'),
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b311fc4e8078', '2023-09-15 06:59:27'),
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b36082783516', '2023-09-15 07:08:02'),
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b3e221284a86', '2023-09-15 07:50:59'),
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b3d862ac8067', '2023-09-15 07:51:33'),
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b37c26676301', '2023-09-15 08:31:49'),
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b3407ccc2ae7', '2023-09-15 08:36:25'),
('admin@igc.com', '61d47113f98ef88fa4a9891a2b2382b370d028e89b', '2023-09-15 09:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `pass_reset`
--

CREATE TABLE `pass_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saving`
--

CREATE TABLE `saving` (
  `id` int(10) NOT NULL,
  `amount` int(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `useremail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uemail` varchar(255) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `upassword` varchar(255) DEFAULT NULL,
  `utel` varchar(15) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uemail`, `uname`, `upassword`, `utel`, `created_by`, `date_created`) VALUES
('demouser@igc.com', 'DemoUser', 'dbf186e72e0ab712fd337e60304f20d2', '0704796843', 'rootadmin@igc.com', '2023-09-13 15:34:19'),
('nami@igc.com', 'namigande', 'f7b5fefdac9228a525acd5a6dcdb9e48', '0756365522', 'rootadmin@igc.com', '2023-09-14 14:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('nami@igc.com', 'u'),
('phillipphilcourts540@gmail.com', 'a'),
('demouser@igc.com', 'u'),
('rootadmin@igc.com', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) NOT NULL,
  `amount` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL,
  `useremail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aemail`);

--
-- Indexes for table `deleted_expenditure`
--
ALTER TABLE `deleted_expenditure`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `deleted_income`
--
ALTER TABLE `deleted_income`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `deleted_loan`
--
ALTER TABLE `deleted_loan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `deleted_saving`
--
ALTER TABLE `deleted_saving`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `deleted_wishlist`
--
ALTER TABLE `deleted_wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useremail` (`useremail`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `paid_loan`
--
ALTER TABLE `paid_loan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_reset`
--
ALTER TABLE `pass_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving`
--
ALTER TABLE `saving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uemail`);

--
-- Indexes for table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deleted_expenditure`
--
ALTER TABLE `deleted_expenditure`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deleted_income`
--
ALTER TABLE `deleted_income`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deleted_loan`
--
ALTER TABLE `deleted_loan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deleted_saving`
--
ALTER TABLE `deleted_saving`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deleted_wishlist`
--
ALTER TABLE `deleted_wishlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_loan`
--
ALTER TABLE `paid_loan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pass_reset`
--
ALTER TABLE `pass_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saving`
--
ALTER TABLE `saving`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
