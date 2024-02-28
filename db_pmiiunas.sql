-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 04:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pmiiunas`
--

-- --------------------------------------------------------

--
-- Table structure for table `afirasis`
--

CREATE TABLE `afirasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kader_id` bigint(20) UNSIGNED NOT NULL,
  `catatan` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_arsip_mapabas`
--

CREATE TABLE `file_arsip_mapabas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_arsip_penguruses`
--

CREATE TABLE `file_arsip_penguruses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'PMII Komisariat Universitas Nasional', 'pmiiunas', NULL, NULL, NULL, NULL, '-', 'active', NULL, 'pmiiunas1949@gmail.com', NULL, '$2y$10$jdmbcrkyoI2hKVlZlm3pT.p8sDQMFwkWMvs7fXIO5nqfazo1PLw26', NULL, '2020-01-19 06:10:44', '2020-01-19 06:10:44'),
(2, 'Farhan Rizky Ramadhan', 'farhanrizkyr_', NULL, NULL, NULL, NULL, 'Web Programmer', 'active', NULL, 'aananjay5@gmail.com', NULL, '$2y$10$.3pnCa7WA25SFYb/sJT9H.iq4fH9CEXdyHgFfN9zJ4Ph91iQtNU4W', NULL, '2020-01-19 06:10:44', '2020-01-19 06:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `mapabas`
--

CREATE TABLE `mapabas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `kampus` text NOT NULL,
  `archive` varchar(255) NOT NULL DEFAULT 'not',
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `progdi_id` bigint(20) UNSIGNED NOT NULL,
  `hp` varchar(255) NOT NULL,
  `pengalaman` text NOT NULL,
  `minat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_16_090606_mrc', 1),
(6, '2022_08_23_062537_pemberitahuan', 1),
(7, '2022_09_04_013353_category', 1),
(8, '2022_09_04_052744_create_jobs_table', 1),
(9, '2022_09_04_175353_post', 1),
(10, '2022_09_05_111129_create_tahuns_table', 1),
(11, '2022_09_05_153115_create_progdis_table', 1),
(12, '2022_09_06_124332_create_sliders_table', 1),
(13, '2022_09_07_164321_create_testimonis_table', 1),
(14, '2022_09_08_175612_create_file_arsip_mapabas_table', 1),
(15, '2022_09_08_175751_create_file_arsip_penguruses_table', 1),
(16, '2022_09_09_101254_create_sigs_table', 1),
(17, '2022_09_10_133112_create_struktur_organisasis_table', 1),
(18, '2022_09_11_192554_create_mapabas_table', 1),
(19, '2022_09_12_211503_create_profile_rayons_table', 1),
(20, '2022_09_15_171027_kaders', 1),
(21, '2023_01_18_223944_create_penguruses_table', 1),
(22, '2023_02_07_234600_create_profile_p_m_i_i_u_n_a_s_table', 1),
(23, '2023_02_09_223829_create_sejarah_p_m_i_i_s_table', 1),
(24, '2023_03_31_092140_create_sarans_table', 1),
(25, '2024_02_28_100450_create_afirasis_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mrc`
--

CREATE TABLE `mrc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk` longtext NOT NULL,
  `slug` longtext NOT NULL,
  `gambar` longtext DEFAULT NULL,
  `harga` longtext NOT NULL,
  `diskon` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Stock Ada',
  `cp` text NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulpem` text NOT NULL,
  `gambar` text DEFAULT NULL,
  `slug` text NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penguruses`
--

CREATE TABLE `penguruses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `tempat` varchar(255) NOT NULL,
  `tanggallahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `progdi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `status` text NOT NULL DEFAULT 'publish',
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `kader_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_p_m_i_i_u_n_a_s`
--

CREATE TABLE `profile_p_m_i_i_u_n_a_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text NOT NULL,
  `profile` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_p_m_i_i_u_n_a_s`
--

INSERT INTO `profile_p_m_i_i_u_n_a_s` (`id`, `judul`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'Belum Ada', 'Belum Ada', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_rayons`
--

CREATE TABLE `profile_rayons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progdis`
--

CREATE TABLE `progdis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `progdi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sarans`
--

CREATE TABLE `sarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sejarah_p_m_i_i_s`
--

CREATE TABLE `sejarah_p_m_i_i_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text NOT NULL,
  `profile` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sejarah_p_m_i_i_s`
--

INSERT INTO `sejarah_p_m_i_i_s` (`id`, `judul`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'Belum Ada', 'Belum Ada', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sigs`
--

CREATE TABLE `sigs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `status` text NOT NULL DEFAULT 'Belum Divalidasi',
  `email1` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `asalrayon` varchar(255) NOT NULL,
  `pasangan` text DEFAULT NULL,
  `bukti1` varchar(255) DEFAULT NULL,
  `bukti2` varchar(255) DEFAULT NULL,
  `bukti3` varchar(255) DEFAULT NULL,
  `sertifat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `links` varchar(255) DEFAULT NULL,
  `gambar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasis`
--

CREATE TABLE `struktur_organisasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `gambar` text NOT NULL,
  `tw` varchar(255) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `linkeld` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `biro` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahuns`
--

CREATE TABLE `tahuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `biro` varchar(255) DEFAULT NULL,
  `bio` text NOT NULL DEFAULT '-',
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `username`, `gender`, `biro`, `bio`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PMII  Komisariat Universitas Nasional', 'Pengurus', 'pmiiunas', NULL, NULL, 'Pengurus', NULL, 'pmiiunas@gmail.com', NULL, '$2y$10$fb9i5UU9R2K7o3jVFDFjHe7G4xeGmLn/IGVkxZYu6zoKh0IprXEOG', NULL, '2020-01-19 06:10:44', '2020-01-19 06:10:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afirasis`
--
ALTER TABLE `afirasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_arsip_mapabas`
--
ALTER TABLE `file_arsip_mapabas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_arsip_penguruses`
--
ALTER TABLE `file_arsip_penguruses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kaders`
--
ALTER TABLE `kaders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kaders_email_unique` (`email`);

--
-- Indexes for table `mapabas`
--
ALTER TABLE `mapabas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mrc`
--
ALTER TABLE `mrc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penguruses`
--
ALTER TABLE `penguruses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_p_m_i_i_u_n_a_s`
--
ALTER TABLE `profile_p_m_i_i_u_n_a_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_rayons`
--
ALTER TABLE `profile_rayons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progdis`
--
ALTER TABLE `progdis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sarans`
--
ALTER TABLE `sarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah_p_m_i_i_s`
--
ALTER TABLE `sejarah_p_m_i_i_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sigs`
--
ALTER TABLE `sigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasis`
--
ALTER TABLE `struktur_organisasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahuns`
--
ALTER TABLE `tahuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afirasis`
--
ALTER TABLE `afirasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_arsip_mapabas`
--
ALTER TABLE `file_arsip_mapabas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_arsip_penguruses`
--
ALTER TABLE `file_arsip_penguruses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kaders`
--
ALTER TABLE `kaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapabas`
--
ALTER TABLE `mapabas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mrc`
--
ALTER TABLE `mrc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penguruses`
--
ALTER TABLE `penguruses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_p_m_i_i_u_n_a_s`
--
ALTER TABLE `profile_p_m_i_i_u_n_a_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_rayons`
--
ALTER TABLE `profile_rayons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progdis`
--
ALTER TABLE `progdis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sarans`
--
ALTER TABLE `sarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sejarah_p_m_i_i_s`
--
ALTER TABLE `sejarah_p_m_i_i_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sigs`
--
ALTER TABLE `sigs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struktur_organisasis`
--
ALTER TABLE `struktur_organisasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahuns`
--
ALTER TABLE `tahuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
