-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2023 at 01:56 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `live_status` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `user_avatar` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `signupDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `username`, `email`, `address`, `password`, `live_status`, `user_avatar`, `signupDate`) VALUES
(1, 'Robin', 'robinkujur@aidcom.in', 'Bettiah', '12345', 'Offline', 'http://localhost/session/avatar/avatar2.png', '2023-12-12 01:26:57'),
(2, 'Kishan', 'kishan@gmail.com', 'Bettiah', '12345', 'Offline', 'http://localhost/session/avatar/avatar4.png', '2023-12-12 01:27:39'),
(3, 'Akriti', 'akriti@gmail.com', 'Samastipur', '12345', 'Offline', 'http://localhost/session/avatar/avatar2.png', '2023-12-12 01:28:09'),
(4, 'Bipul', 'bipul@gmail.com', 'Bettiah', '12345', 'Offline', 'http://localhost/session/avatar/avatar11.png', '2023-12-12 01:28:41'),
(5, 'Chandan', 'chandan@gmail.com', 'Bettiah', '12345', 'Offline', 'http://localhost/session/avatar/avatar2.png', '2023-12-12 01:37:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
