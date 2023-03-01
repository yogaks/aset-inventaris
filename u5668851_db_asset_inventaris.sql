-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Mar 2023 pada 21.55
-- Versi server: 10.6.10-MariaDB-cll-lve
-- Versi PHP: 7.4.30

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
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `as_id` int(30) NOT NULL,
  `as_nama` varchar(35) NOT NULL,
  `as_jenis` varchar(35) NOT NULL,
  `as_kode` varchar(35) NOT NULL,
  `as_jml` int(10) NOT NULL,
  `as_sat` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`as_id`, `as_nama`, `as_jenis`, `as_kode`, `as_jml`, `as_sat`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(6, 'Vario 123', 'Motor', 'MTR', 16, 'pieces', '2023-02-25 13:43:42', '20971108', '2023-02-25 19:39:15', '2'),
(7, 'sumitomo', 'splicer', 'SP', 3, 'pcs', '2023-02-26 22:33:04', '20971108', '2023-02-26 22:33:40', '20971108');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_teknisi`
--

CREATE TABLE `aset_teknisi` (
  `id` int(10) NOT NULL,
  `ba_id` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset_teknisi`
--

INSERT INTO `aset_teknisi` (`id`, `ba_id`, `kode`, `jenis`, `jumlah`, `satuan`, `kondisi`, `keterangan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '63f9b7dc825e6', 'MTR', 'Motor', 1, 'pieces', 'Baik', '', '2023-02-25 16:56:04', '20971108', '2023-02-25 17:23:33', '20971108'),
(2, '63f9db81b8ead', 'MTR', 'Motor', 1, 'pieces', 'Rusak', 'rantai putus', '2023-02-25 17:06:09', '20971108', '2023-02-25 17:23:51', '20971108'),
(3, '63f9ed809dde6', 'MTR', 'Motor', 1, 'pieces', '', '', '2023-02-25 18:25:44', '20971108', NULL, ''),
(4, '63f9fdec458a3', 'MTR', 'Motor', 1, 'pieces', 'Baik', '', '2023-02-25 19:34:46', '3', '2023-02-25 19:39:51', '3'),
(5, '63fa014dd137b', 'MTR', 'Motor', 1, 'pieces', 'Rusak', 'ban hilang', '2023-02-25 19:39:15', '3', '2023-02-25 19:40:01', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara_aset`
--

CREATE TABLE `berita_acara_aset` (
  `ba_id` varchar(30) NOT NULL,
  `user_nik` int(35) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `date_request` datetime NOT NULL DEFAULT current_timestamp(),
  `date_approval` datetime NOT NULL,
  `status_request` int(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita_acara_aset`
--

INSERT INTO `berita_acara_aset` (`ba_id`, `user_nik`, `user_nama`, `date_request`, `date_approval`, `status_request`, `created_at`, `updated_at`) VALUES
('63f9ed809dde6', 20971108, 'SUPERUSER', '2023-02-25 18:14:30', '2023-02-25 11:25:44', 2, '2023-02-25 18:14:30', '2023-02-25 18:25:44'),
('63f9eecfd1dd0', 20971108, 'SUPERUSER', '2023-02-25 18:19:59', '0000-00-00 00:00:00', 1, '2023-02-25 18:19:59', '2023-02-25 18:27:34'),
('63f9fdec458a3', 3, 'TEKNISI', '2023-02-25 19:24:30', '2023-02-25 12:34:46', 2, '2023-02-25 19:24:30', '2023-02-25 19:34:46'),
('63fa014dd137b', 3, 'TEKNISI', '2023-02-25 19:38:49', '2023-02-25 19:39:15', 2, '2023-02-25 19:38:49', '2023-02-25 19:39:15'),
('63fa026d0a4ed', 2, 'ADMIN GUDANG', '2023-02-25 19:44:31', '0000-00-00 00:00:00', 0, '2023-02-25 19:44:31', NULL),
('63fb7bdbdd20a', 20971108, 'SUPERUSER', '2023-02-26 22:34:32', '0000-00-00 00:00:00', 0, '2023-02-26 22:34:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
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
-- Struktur dari tabel `order_aset`
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
-- Struktur dari tabel `request_pengadaan_aset`
--

CREATE TABLE `request_pengadaan_aset` (
  `id_req` int(35) NOT NULL,
  `ba_id` varchar(30) NOT NULL,
  `kode_aset` varchar(35) NOT NULL,
  `jenis_aset` varchar(50) NOT NULL,
  `jml_aset` int(10) NOT NULL,
  `sat_aset` varchar(10) NOT NULL,
  `app` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request_pengadaan_aset`
--

INSERT INTO `request_pengadaan_aset` (`id_req`, `ba_id`, `kode_aset`, `jenis_aset`, `jml_aset`, `sat_aset`, `app`, `status`, `keterangan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(6, '63f9af5102bc8', 'MTR', 'Motor', 1, 'pieces', 2, 2, '', '2023-02-25 13:48:49', '20971108', '2023-02-25 16:39:20', '20971108'),
(7, '63f9b7dc825e6', 'MTR', 'Motor', 1, 'pieces', 2, 2, '', '2023-02-25 14:25:16', '20971108', '2023-02-25 16:56:04', '20971108'),
(8, '63f9db81b8ead', 'MTR', 'Motor', 1, 'pieces', 2, 2, '', '2023-02-25 16:57:21', '20971108', '2023-02-25 17:06:09', '20971108'),
(9, '63f9ed809dde6', 'MTR', 'Motor', 1, 'pieces', 2, 2, '', '2023-02-25 18:14:30', '20971108', '2023-02-25 18:25:44', '20971108'),
(10, '63f9eecfd1dd0', 'MTR', 'Motor', 1, 'pieces', 1, 1, '', '2023-02-25 18:19:59', '20971108', '2023-02-25 18:27:34', '20971108'),
(11, '63f9fdec458a3', 'MTR', 'Motor', 1, 'pieces', 2, 2, 'silahkan ambil barangnya', '2023-02-25 19:24:30', '3', '2023-02-25 19:34:46', '2'),
(12, '63fa014dd137b', 'MTR', 'Motor', 1, 'pieces', 2, 2, '', '2023-02-25 19:38:49', '3', '2023-02-25 19:39:15', '2'),
(13, '63fa026d0a4ed', 'OPM', 'Alat Ukur', 1, 'pieces', 0, 0, '', '2023-02-25 19:44:31', '2', NULL, ''),
(14, '63fb7bdbdd20a', 'MTR', 'MOTOR', 1, 'PCS', 0, 0, 'A', '2023-02-26 22:34:32', '20971108', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `position`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'SUPERUSER', 20971108, '$2y$10$ZsloeCzMhHN8VL79xJP9LuU684KH0bw5q5XX.Jg3XZLW7kbBjWDPu', 'ADMIN', 1, 1, '2023-02-12 23:11:51', '2023-02-25 18:57:55'),
(2, 'ASETINVENTARIS', 123456, '$2y$10$ncFYbtLsojhmWmZpRPusdOQ/Ku3L6DHSXpGfGtkG2jpKX304VlMYW', 'ADMIN', 1, 1, '2023-02-14 23:04:09', '2023-02-14 23:05:33'),
(3, 'NOCSAS', 97156637, '$2y$10$sVha2P2ZsGnf43LagWpMA.hld85ESJLeiRHiObfdbnLorIuSXteKq', 'ADMIN', 1, 1, '2023-02-16 11:43:32', NULL),
(4, 'ADMIN GUDANG', 2, '$2y$10$sWG4H7k/ImMgsKaEC5/aX.U35Qw0SD3aq7dSP3NMm5TFKMGVO7Rd6', 'ADMIN GUDANG', 2, 1, '2023-02-25 18:52:39', NULL),
(5, 'TEKNISI', 3, '$2y$10$7hotXQEAs4mMTAgPEa6s0espqxMx2DmWkGTowIOmzCSWVVLTnvXUy', 'TEKNISI', 3, 1, '2023-02-25 18:53:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_access_menu`
--

CREATE TABLE `users_access_menu` (
  `id` int(5) NOT NULL,
  `role_id` int(5) NOT NULL,
  `menu_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_access_menu`
--

INSERT INTO `users_access_menu` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-02-14 21:02:53', '2023-02-25 20:26:46'),
(2, 1, 100, '2023-02-14 23:10:15', '2023-02-25 20:26:44'),
(3, 1, 2, '2023-02-15 19:05:58', '2023-02-25 20:26:29'),
(4, 2, 1, '2023-02-25 18:50:10', '2023-02-25 20:26:22'),
(5, 2, 2, '2023-02-25 18:50:10', '2023-02-25 20:27:02'),
(6, 3, 1, '2023-02-25 18:50:10', '2023-02-25 20:27:02'),
(7, 3, 2, '2023-02-25 18:50:10', '2023-02-25 20:27:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_menu`
--

CREATE TABLE `users_menu` (
  `id` int(5) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_menu`
--

INSERT INTO `users_menu` (`id`, `menu`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'fa fa-circle', '2023-02-14 20:53:54', '2023-02-16 00:51:43'),
(2, 'Aset', 'fa fa-columns', '2023-02-15 19:03:07', '2023-02-16 00:51:48'),
(100, 'Manajemen User', 'fa fa-user', '2023-02-14 20:53:54', '2023-02-16 00:52:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id` int(5) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-02-14 20:56:33', '2023-02-25 18:47:55'),
(2, 'Admin Gudang', '2023-02-25 18:46:09', NULL),
(3, 'Teknisi', '2023-02-25 18:46:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_sub_menu`
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
-- Dumping data untuk tabel `users_sub_menu`
--

INSERT INTO `users_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dashboard Utama', 'dashboard-utama', 'fas fa-tachometer-alt', 1, '2023-02-14 21:02:12', '2023-02-14 22:12:41'),
(3, 100, 'Add User', 'registration', '', 1, '2023-02-14 23:09:31', NULL),
(4, 2, 'Aset', 'aset', 'fas fa-table me-1', 1, '2023-02-15 19:04:45', '2023-02-16 23:57:52'),
(5, 2, 'Request Aset', 'requestAset', '', 1, '2023-02-18 17:37:38', '2023-02-25 11:45:50'),
(6, 2, 'Kondisi Aset Teknisi', 'asetTeknisi', '', 1, '2023-02-25 18:12:21', '2023-03-01 18:01:29'),
(7, 2, 'Berita Acara Aset', 'beritaAcara', '', 1, '2023-02-25 18:12:42', '2023-02-25 18:13:18'),
(8, 2, 'Laporan', 'laporan', '', 0, '2023-02-25 18:12:42', '2023-03-01 21:45:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`as_id`),
  ADD UNIQUE KEY `as_kode` (`as_kode`);

--
-- Indeks untuk tabel `aset_teknisi`
--
ALTER TABLE `aset_teknisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita_acara_aset`
--
ALTER TABLE `berita_acara_aset`
  ADD PRIMARY KEY (`ba_id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indeks untuk tabel `order_aset`
--
ALTER TABLE `order_aset`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `request_pengadaan_aset`
--
ALTER TABLE `request_pengadaan_aset`
  ADD PRIMARY KEY (`id_req`),
  ADD UNIQUE KEY `ba_id` (`ba_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `as_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `aset_teknisi`
--
ALTER TABLE `aset_teknisi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_lap` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_aset`
--
ALTER TABLE `order_aset`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `request_pengadaan_aset`
--
ALTER TABLE `request_pengadaan_aset`
  MODIFY `id_req` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
