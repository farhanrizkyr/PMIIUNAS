-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 04:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmiiunasweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kaders`
--

CREATE TABLE `kaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `rayon` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `tl` date DEFAULT NULL,
  `bio` longtext NOT NULL DEFAULT '-',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kaders`
--

INSERT INTO `kaders` (`id`, `name`, `username`, `gender`, `rayon`, `tempat`, `tl`, `bio`, `status`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PMII Komisariat Universitas Nasional', 'pmiiunas', NULL, NULL, NULL, NULL, '-', 'active', NULL, 'pmiiunas1949@gmail.com', NULL, '$2y$10$jdmbcrkyoI2hKVlZlm3pT.p8sDQMFwkWMvs7fXIO5nqfazo1PLw26', NULL, '2023-02-02 01:01:47', '2023-02-02 01:01:47'),
(2, 'Farhan Rizky Ramadhan', 'farhanrizkyr_', NULL, NULL, NULL, NULL, 'Web Programmer', 'active', NULL, 'aananjay5@gmail.com', NULL, '$2y$10$.3pnCa7WA25SFYb/sJT9H.iq4fH9CEXdyHgFfN9zJ4Ph91iQtNU4W', NULL, '2023-02-02 01:02:39', '2023-02-02 01:02:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kaders`
--
ALTER TABLE `kaders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kaders_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kaders`
--
ALTER TABLE `kaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
