-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 02:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cliquebait`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follower_id`, `followed_id`, `timestamp`) VALUES
(4, 5, '2023-03-13 17:16:56'),
(7, 4, '2023-03-13 18:40:23'),
(7, 5, '2023-03-13 18:40:28'),
(5, 7, '2023-03-13 19:18:26'),
(13, 11, '2023-03-14 00:21:50'),
(13, 11, '2023-03-14 00:21:55'),
(13, 12, '2023-03-14 00:22:12'),
(13, 12, '2023-03-14 00:22:16'),
(13, 10, '2023-03-14 00:22:29'),
(10, 13, '2023-03-14 00:24:12'),
(10, 12, '2023-03-14 00:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `first_name`, `middle_name`, `last_name`) VALUES
(4, 'Imran ', '', 'Maslianov'),
(5, 'Ali', '', 'Raza'),
(7, 'Imran', '', 'Ali'),
(9, 'TEST', '', ''),
(10, 'TEST1', '', ''),
(11, 'TEST2', '', ''),
(12, 'TEST3', '', ''),
(13, 'TEST4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `picture` varchar(128) NOT NULL,
  `caption` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `picture`, `caption`, `timestamp`) VALUES
(27, 9, '640fbc6f351ad.jpg', 'MEME1', '2023-03-14 00:14:39'),
(28, 10, '640fbc8c0033f.png', 'MEME2', '2023-03-14 00:15:08'),
(29, 11, '640fbcb02497b.jpg', 'MEME3', '2023-03-14 00:15:44'),
(30, 12, '640fbcfa60e1a.png', 'MEME4', '2023-03-14 00:16:58'),
(31, 13, '640fbd8e8c088.jpg', 'MEME5', '2023-03-14 00:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(4, 'Imran', '$2y$10$J5nRgg9Mach9fcpIfnJFpuUHEkvkD8EbR1a3pOCUgNeA/i1QLnJ2S'),
(5, 'Ali', '$2y$10$Iam6adv78nh9A.PuuxxdmeB/LzaCm2IzDkVzUza/44PzzB4/hGCpG'),
(7, 'IMRO', '$2y$10$u7dL8HeMDJ/6xBxpAOe6P.1kgP/Uyxhd1hLpn9crSXloGwBfGoXBm'),
(9, 'TEST', '$2y$10$26oJWy1vjj/7cgNwvtXpBuFCBGQKJbVzdu1n9tSQkUoBF90c37I/C'),
(10, 'TEST1', '$2y$10$W9IgL/xynRoaRazoNpYJ1.mFTXzdUUiMNJTFZGIDlLiifoKSCCxwe'),
(11, 'TEST2', '$2y$10$56Q9FHzqieBJMYaWxZlvKeDijYqNm1A66EpRJIxh4sJCc6BHoR6.u'),
(12, 'TEST3', '$2y$10$jnVTgUI6.QhaifYWBSOmN.Qpt2Obp6VBzaOxphdO9xYVjxyldGRie'),
(13, 'TEST4', '$2y$10$NCaKOOrvYuySTTShPNG9EuJ.RYvC5JYRXmRxgpu8gnnQULPIvIHCm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD UNIQUE KEY `user_id` (`profile_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `publication_to_profile` (`profile_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`profile_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
