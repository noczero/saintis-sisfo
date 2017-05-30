-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 06:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saintis`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `siswa_id`, `kelas_id`, `absen`, `created_at`, `updated_at`) VALUES
(7, 2, 3, 'S', '2017-05-25 12:07:24', '2017-05-25 12:07:24'),
(8, 5, 3, 'H', '2017-05-25 12:07:24', '2017-05-25 12:07:24'),
(9, 6, 3, 'S', '2017-05-25 12:07:24', '2017-05-25 12:07:24'),
(10, 2, 3, 'H', '2017-05-25 12:11:02', '2017-05-25 12:11:02'),
(11, 5, 3, 'H', '2017-05-25 12:11:02', '2017-05-25 12:11:02'),
(12, 6, 3, 'H', '2017-05-25 12:11:02', '2017-05-25 12:11:02'),
(13, 2, 3, 'I', '2017-05-25 12:47:04', '2017-05-25 12:47:04'),
(14, 5, 3, 'S', '2017-05-25 12:47:04', '2017-05-25 12:47:04'),
(15, 6, 3, 'S', '2017-05-25 12:47:04', '2017-05-25 12:47:04'),
(16, 3, 5, 'S', '2017-05-25 12:49:02', '2017-05-25 12:49:02'),
(17, 2, 3, 'S', '2017-05-25 20:46:02', '2017-05-25 20:46:02'),
(18, 5, 3, 'H', '2017-05-25 20:46:02', '2017-05-25 20:46:02'),
(19, 6, 3, 'S', '2017-05-25 20:46:02', '2017-05-25 20:46:02'),
(20, 2, 3, 'H', '2017-05-25 20:46:41', '2017-05-25 20:46:41'),
(21, 5, 3, 'H', '2017-05-25 20:46:41', '2017-05-25 20:46:41'),
(22, 6, 3, 'H', '2017-05-25 20:46:41', '2017-05-25 20:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Satrya', 'admin', '$2y$10$U65UPUVwTU84QeLGZMxmE.mYrv1LZ9s5fYZI.2egAWz1qPc8V83ye', NULL, '2017-05-18 01:04:03', '2017-05-18 01:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TTL` date DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `name`, `username`, `password`, `TTL`, `gaji`, `status`, `no_tel`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nowo Riveli', 'guruguru', '$2y$10$3YTpTg.VdNBMUDuNISvd0OWAo3F71a2ZhchtX3FgLusO2O9Kgxode', '1996-05-09', 500000, 'Lajang', '02812312', 'nSVcE9qOzjOQAOpiK2vXGIBFMZTPb09yb2g9SJargI5nqdQshBgQ62YqBInf', '2017-05-18 04:29:09', '2017-05-25 07:40:52'),
(2, 'guru1', 'guru1', 'guru1', '2017-05-08', 150000, 'Menikah', '08222323232', NULL, NULL, NULL),
(4, 'Udin', 'udin', '$2y$10$x3nWa21VVfcvPzvIP82XHuvmoQyG8cDvfO.9zCkT2nraQvWlzpgR2', '1997-01-21', 8000000, 'Menikah', '08132456384', NULL, NULL, NULL),
(5, 'Nama Guru', 'username', '$2y$10$0wDruK34F9NKQw6K07KKwOxovMdtYPnGoIonhugqg0YzaYiULA57C', '1989-03-21', 3219324, 'Jomblo', '0811123231234', NULL, NULL, NULL),
(6, 'AAA', 'asd', '$2y$10$UFpkURrPRSdnP/WpNFCLHe5/CA7XHFivmk75U1N3JyQ4Duti4EfNe', '1997-01-04', 12312312, 'Menikaha', '123124234', NULL, NULL, '2017-05-24 09:49:16'),
(8, 'A', 'guruku', '$2y$10$ru6RumN2Eoo7NSUC5hwt7OtGuCIZPhhokuQpcE/tHTHqruYx7AbIC', '1990-01-01', 200000, 'Menikah', '12345', NULL, NULL, NULL),
(9, 'Guru Saya', 'gurusaya', '$2y$10$YBKASVJzEqmmp2ZJhqarr.oE.rmYAkzXHGiQSm.8yeDOvfN9VDkRS', '2017-05-17', 1234, 'Mahasiswa', '1234', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru_kelas`
--

CREATE TABLE `guru_kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_kelas`
--

INSERT INTO `guru_kelas` (`id`, `guru_id`, `kelas_id`, `mapel`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'mm', NULL, NULL),
(2, 2, 3, 'indonesia', NULL, NULL),
(3, 1, 5, 'fisika', NULL, NULL),
(4, 8, 3, 'Fisika', NULL, NULL),
(5, 1, 6, 'Bahasa Indonesia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelass`
--

CREATE TABLE `kelass` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelass`
--

INSERT INTO `kelass` (`id`, `nama_kelas`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(3, 'C', '2017/2018', NULL, NULL),
(5, 'E', '2017/2018', NULL, NULL),
(6, 'F', '2017/2018', NULL, NULL),
(7, 'G', '2017/2018', NULL, NULL),
(8, 'A', '2017/2018', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TTL` date DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `no_tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `username`, `password`, `TTL`, `umur`, `jabatan`, `gaji`, `no_tel`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Iwan Irwandi', 'manager', '$2y$10$bwIAxQx7K5NCJZz.FvpkG.ux/1E4Zen6iyfkvFhsPcddw1MMvPMpS', '1990-05-08', NULL, 'Pendiri Saintis', 100000, '0238234', NULL, '2017-05-18 04:37:36', '2017-05-25 20:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_18_060334_create_admins_table', 1),
(4, '2017_05_18_083555_create_siswa_table', 2),
(5, '2017_05_18_084946_create_guru_table', 3),
(6, '2017_05_18_085524_create_manager_table', 4),
(7, '2017_05_22_044000_create_kelas_table', 5),
(8, '2017_05_22_044135_create_absensi_table', 5),
(9, '2017_05_22_180314_create_guru_kelas_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TTL` date DEFAULT NULL,
  `asal_sekolah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paket_bimbel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `no_tel` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `name`, `username`, `password`, `TTL`, `asal_sekolah`, `paket_bimbel`, `kelas_id`, `no_tel`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'siswa', 'siswa', '$2y$10$.XW6RVRcU9g/wGs90MqitenouKOjw3ksJ2PA/wwLEdUmno6gCRM5u', '2017-05-16', 'Bandung', 'Ekskulsif', 3, 1231232, NULL, '2017-05-18 04:09:52', '2017-05-25 06:16:38'),
(3, 'Satrya Budi Pratama', 'pratama', '$2y$10$tjx8DNN2kM7qC.6rOWOKpu41CamLcAKLbKBCVA8Wz74ieorCDSLMC', '2011-11-11', 'SMA 1', 'Normal', 5, 123123, NULL, NULL, '2017-05-25 06:17:37'),
(5, 'Hilal Nabil Abdillah', 'hilal123', '$2y$10$mIjNhhKrXp4QOJf3Q7o4jeAbD2uG4YNX/c.zNXqPlB.4wqFUTQ9ue', '1993-10-10', 'CImahi', 'Plus', 3, 123123123, NULL, NULL, NULL),
(6, 'Abdul Wahid', 'abdul123', '$2y$10$CkCia8wSubNfUo8qCle5FOoXGmwD5Jv2nKh64mtcnyb6ym56oz.Yq', '1992-09-01', 'Bandung', 'SBMPTN', 3, 123123, NULL, NULL, NULL),
(7, 'Edwin Satya', 'edwin123', '$2y$10$s1ffhx6hNPdcLrIEIFIGaOZX2eCmbBYaxTg7OO/LGVTYWoDQoRvdi', '1990-01-01', 'SMA Negeri 2 Bndung', 'Plus', 5, 82212, NULL, NULL, '2017-05-25 20:21:25'),
(8, 'AAA', 'AAA', '$2y$10$qTgAa8NPO9ucc8pEuZDk9uQzldF3eLqFXdEoG.gqJyIGDf3ogScUW', '2017-05-25', 'Medan', 'Plus Plus', 7, 3333, NULL, '2017-05-26 10:56:38', '2017-05-29 19:58:48'),
(9, 'Abdi Urang', 'abdiurang', '$2y$10$bBemfBdRTRtI5dWnPmETKux2q7K/7MMksCLN/cReJjgN0c3ufnJQu', '1998-12-14', 'SMA Negeri 1 Medan', 'EA', 3, 8134, NULL, '2017-05-29 20:05:03', '2017-05-29 20:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', '$2y$10$2li2Qw0ObRj0ebWQf1Cj9.fxITQddQNg3PAbCzs4APuca5p/qnWcC', 'H8e2Z4OT4rx62UmOCNcoYyTIh3TWs5FBfhcCluBNNdlz0cyVddFeoIJEsvpw', '2017-05-18 00:03:05', '2017-05-18 00:03:05'),
(2, 'Satrya Budi Pratama', 'satrya', '$2y$10$PAMTWVFZLA.SOcveJK69Iuxqif2LAVGQEn4FudEUgzA2bLLo4JZ1G', 'SqDnn38kknkmdeocBGK5Nr1KfBRnql3RqlyJlnhS0IH7bURqpW9vtmuPF8Lc', '2017-05-18 00:08:49', '2017-05-18 00:08:49'),
(3, 'budi', 'budi', '$2y$10$3YJa8PGAc869ccbquvcDreOr8ghhHV6zeKRuD/BDJJrSuFGh3/TiC', '4JHkClMZunkWSgD9sHq3krJFin8Z8jECB7LO4b5DnBQ1AmCDpywMUkWd0Ne5', '2017-05-18 00:17:03', '2017-05-18 00:17:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_username_unique` (`username`);

--
-- Indexes for table `guru_kelas`
--
ALTER TABLE `guru_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelass`
--
ALTER TABLE `kelass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manager_username_unique` (`username`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_username_unique` (`username`),
  ADD KEY `siswa_fk` (`kelas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `guru_kelas`
--
ALTER TABLE `guru_kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kelass`
--
ALTER TABLE `kelass`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswa_fk` FOREIGN KEY (`kelas_id`) REFERENCES `kelass` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
