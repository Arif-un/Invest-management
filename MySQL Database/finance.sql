-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2019 at 09:48 AM
-- Server version: 5.7.18
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `tab_id` int(11) NOT NULL,
  `debit` bigint(20) DEFAULT NULL,
  `credit` bigint(20) DEFAULT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `tab_id`, `debit`, `credit`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, NULL, 3000, '2018-05-25 03:09:47', '2018-05-28 03:09:47'),
(2, 3, NULL, 500, 2500, '2018-05-25 03:09:59', '2018-05-28 03:11:15'),
(3, 6, NULL, 200, 2300, '2018-05-26 03:11:57', '2018-05-28 03:11:57'),
(5, 8, 300, NULL, 2600, '2018-05-26 03:15:02', '2018-05-28 03:15:02'),
(13, 1, 100, NULL, 2700, '2018-05-26 03:37:51', '2018-05-28 03:37:51'),
(14, 2, NULL, 200, 2500, '2018-05-27 03:38:01', '2018-05-28 03:38:01'),
(15, 3, 500, NULL, 3000, '2018-05-27 03:38:08', '2018-05-28 03:38:08'),
(16, 4, 2000, NULL, 5000, '2018-05-27 03:38:16', '2018-05-28 03:38:16'),
(17, 6, NULL, 1000, 4000, '2018-05-27 03:38:23', '2018-05-28 03:38:23'),
(18, 7, 1500, NULL, 5500, '2018-05-28 03:38:31', '2018-05-28 03:38:31'),
(19, 8, 500, NULL, 6000, '2018-05-28 03:38:39', '2018-05-28 03:38:39'),
(20, 9, NULL, 1000, 5000, '2018-05-28 03:38:46', '2018-05-28 03:38:46'),
(21, 10, NULL, 200, 4800, '2018-05-28 03:39:05', '2018-05-28 03:39:05'),
(22, 2, NULL, 100, 4700, '2018-06-28 02:36:19', '2018-06-28 02:36:19'),
(23, 12, 200, NULL, 4900, '2018-06-28 02:36:34', '2018-06-28 02:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `invests`
--

CREATE TABLE `invests` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invests`
--

INSERT INTO `invests` (`id`, `partner_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 500, '2018-05-28 02:54:56', '2018-05-28 03:00:38'),
(2, 2, 500, '2018-05-28 02:56:14', '2018-05-28 02:56:14'),
(4, 4, 1000, '2018-05-28 02:57:12', '2018-05-28 02:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_19_072925_create_tabs_table', 1),
(4, '2018_05_23_045637_create_accounts_table', 1),
(5, '2018_05_23_072146_create_partners_table', 1),
(6, '2018_05_23_124029_create_invests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `partner_id`, `mobile`, `email`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'Arif', 'P1527490168', '234234212', 'arif@gmail.com', 'P-123', '2018-05-28 00:49:28', '2018-05-28 00:49:28'),
(2, 'Sukkur', 'P1527495568', '23412311', 'sukkur@gmail.com', 'P-123', '2018-05-28 02:19:28', '2018-05-28 02:19:28'),
(4, 'Sakawatt', 'P1527495649', '3234234', 'sakwatt@yahoo.com', 'P-123', '2018-05-28 02:20:49', '2018-05-28 02:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabs`
--

CREATE TABLE `tabs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabs`
--

INSERT INTO `tabs` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Bank Cash', 0, '2018-05-28 00:23:08', '2018-05-28 00:23:08'),
(2, 'Bills-Payable', 1, '2018-05-28 00:24:09', '2018-05-28 00:43:09'),
(3, 'Deposits', 0, '2018-05-28 00:24:29', '2018-05-28 00:24:29'),
(4, 'Cash', 0, '2018-05-28 00:28:14', '2018-05-28 00:28:14'),
(6, 'Credit-Tab', 1, '2018-05-28 03:11:57', '2018-05-28 03:11:57'),
(7, 'Debit-tab', 0, '2018-05-28 03:14:05', '2018-05-28 03:14:05'),
(8, 'Sale', 0, '2018-05-28 03:15:02', '2018-05-28 03:15:02'),
(9, 'Buy', 1, '2018-05-28 03:15:59', '2018-05-28 03:15:59'),
(10, 'Machine-Repair', 1, '2018-05-28 03:22:33', '2018-05-28 03:22:33'),
(11, 'asd', 0, '2018-06-28 02:36:02', '2018-06-28 02:36:02'),
(12, 'aksjdfh', 0, '2018-06-28 02:36:34', '2018-06-28 02:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invests`
--
ALTER TABLE `invests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tabs`
--
ALTER TABLE `tabs`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `invests`
--
ALTER TABLE `invests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabs`
--
ALTER TABLE `tabs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
