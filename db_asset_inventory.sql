-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 05:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asset_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `role_id` int(5) NOT NULL,
  `is_active` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `position`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'SUPERUSER', 20971108, '$2y$10$ZsloeCzMhHN8VL79xJP9LuU684KH0bw5q5XX.Jg3XZLW7kbBjWDPu', 'ADMIN', 0, 1, '2023-02-12 23:11:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_access_menu`
--

CREATE TABLE `users_access_menu` (
  `id` int(5) NOT NULL,
  `role_id` int(5) NOT NULL,
  `menu_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_menu`
--

CREATE TABLE `users_menu` (
  `id` int(5) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `group_menu` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(5) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_sub_menu`
--

CREATE TABLE `users_sub_menu` (
  `id` int(5) NOT NULL,
  `menu_id` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
