-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2023 at 11:11 PM
-- Server version: 10.6.10-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5668851_db_asset_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `as_id` int(30) NOT NULL,
  `as_nama` varchar(35) NOT NULL,
  `as_jenis` varchar(35) NOT NULL,
  `as_kode` varchar(35) NOT NULL,
  `as_jml` int(10) NOT NULL,
  `as_sat` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_aset`
--

CREATE TABLE `berita_acara_aset` (
  `ba_id` int(35) NOT NULL,
  `user_nik` int(35) NOT NULL,
  `user_nama` int(35) NOT NULL,
  `date_request` int(11) NOT NULL,
  `date_approval` int(11) NOT NULL,
  `status_request` int(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_lap` int(30) NOT NULL,
  `lap_nama` varchar(35) NOT NULL,
  `lap_jenis` varchar(35) NOT NULL,
  `lap_kode` varchar(35) NOT NULL,
  `lap_jml` int(10) NOT NULL,
  `lap_sat` varchar(10) NOT NULL,
  `date_lap` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_aset`
--

CREATE TABLE `order_aset` (
  `id_order` int(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nik` int(35) NOT NULL,
  `nama_aset` varchar(35) NOT NULL,
  `jenis_aset` varchar(35) NOT NULL,
  `jml_aset` int(11) NOT NULL,
  `date_order` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_pengadaan_aset`
--

CREATE TABLE `request_pengadaan_aset` (
  `id_req` int(35) NOT NULL,
  `ba_id` int(35) NOT NULL,
  `kode_aset` varchar(35) NOT NULL,
  `jenis_aset` varchar(50) NOT NULL,
  `jml_aset` int(10) NOT NULL,
  `sat_aset` varchar(10) NOT NULL,
  `app` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'SUPERUSER', 20971108, '$2y$10$ZsloeCzMhHN8VL79xJP9LuU684KH0bw5q5XX.Jg3XZLW7kbBjWDPu', 'ADMIN', 1, 1, '2023-02-12 23:11:51', '2023-02-14 21:07:42'),
(2, 'ASETINVENTARIS', 123456, '$2y$10$ncFYbtLsojhmWmZpRPusdOQ/Ku3L6DHSXpGfGtkG2jpKX304VlMYW', 'ADMIN', 1, 1, '2023-02-14 23:04:09', '2023-02-14 23:05:33');

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

--
-- Dumping data for table `users_access_menu`
--

INSERT INTO `users_access_menu` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-02-14 21:02:53', NULL),
(2, 1, 100, '2023-02-14 23:10:15', NULL);

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

--
-- Dumping data for table `users_menu`
--

INSERT INTO `users_menu` (`id`, `menu`, `group_menu`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 0, '2023-02-14 20:53:54', '2023-02-14 22:22:35'),
(100, 'Manajemen User', 0, '2023-02-14 20:53:54', '2023-02-14 22:22:35');

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

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-02-14 20:56:33', NULL);

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
-- Dumping data for table `users_sub_menu`
--

INSERT INTO `users_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dashboard Utama', 'dashboard-utama', 'fas fa-tachometer-alt', 1, '2023-02-14 21:02:12', '2023-02-14 22:12:41'),
(2, 1, 'Dashboard GRAFIK', 'dashboard-utama', 'fas fa-tachometer-alt', 1, '2023-02-14 21:02:12', '2023-02-14 22:12:41'),
(3, 100, 'Add User', 'registration', '', 1, '2023-02-14 23:09:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `berita_acara_aset`
--
ALTER TABLE `berita_acara_aset`
  ADD PRIMARY KEY (`ba_id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `order_aset`
--
ALTER TABLE `order_aset`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `request_pengadaan_aset`
--
ALTER TABLE `request_pengadaan_aset`
  ADD PRIMARY KEY (`id_req`),
  ADD UNIQUE KEY `ba_id` (`ba_id`);

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
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `as_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berita_acara_aset`
--
ALTER TABLE `berita_acara_aset`
  MODIFY `ba_id` int(35) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_lap` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_aset`
--
ALTER TABLE `order_aset`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_pengadaan_aset`
--
ALTER TABLE `request_pengadaan_aset`
  MODIFY `id_req` int(35) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
