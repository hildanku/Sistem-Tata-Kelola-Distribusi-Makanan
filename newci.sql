-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 08:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitakesima`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'administrator', 'Manage all data                                                                                                                                                                                                                                       ');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'siapanich01@gmail.com', 1, '2023-05-02 16:12:16', 1),
(2, '::1', 'siapanich01@gmail.com', 1, '2023-05-05 03:06:04', 1),
(3, '::1', 'siapanich01@gmail.com', 1, '2023-05-05 03:30:12', 1),
(4, '::1', 'siapanich01@gmail.com', 1, '2023-05-07 10:26:37', 1),
(5, '::1', 'siapanich01@gmail.com', 1, '2023-05-07 10:34:28', 1),
(6, '::1', 'siapanich01@gmail.com', 1, '2023-05-12 01:04:25', 1),
(7, '::1', 'siapanich01@gmail.com', 1, '2023-05-19 09:41:17', 1),
(8, '::1', 'siapanich01@gmail.com', 1, '2023-05-20 02:55:47', 1),
(9, '::1', 'siapanich01@gmail.com', 1, '2023-05-24 11:53:04', 1),
(10, '::1', 'siapanich01@gmail.com', 1, '2023-05-25 04:09:48', 1),
(11, '::1', 'siapanich01@gmail.com', 1, '2023-05-26 12:42:48', 1),
(12, '::1', 'siapanich01@gmail.com', 1, '2023-05-27 02:21:21', 1),
(13, '::1', 'siapanich01@gmail.com', 1, '2023-05-29 12:14:10', 1),
(14, '::1', 'siapanich01@gmail.com', 1, '2023-05-31 07:36:37', 1),
(15, '::1', 'siapanich01@gmail.com', 1, '2023-05-31 11:31:56', 1),
(16, '::1', 'siapanich01@gmail.com', 1, '2023-05-31 11:45:55', 1),
(17, '::1', 'siapanich01@gmail.com', 1, '2023-06-01 03:50:57', 1),
(18, '::1', 'siapanich01@gmail.com', 1, '2023-06-03 03:02:46', 1),
(19, '::1', 'siapanich01@gmail.com', 1, '2023-06-03 05:37:56', 1),
(20, '::1', 'siapanich01@gmail.com', 1, '2023-06-03 14:41:35', 1),
(21, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 04:44:45', 1),
(22, '::1', 'hildankusto', NULL, '2023-06-04 05:02:48', 0),
(23, '::1', 'hildankusto', NULL, '2023-06-04 05:02:52', 0),
(24, '::1', 'hildankusto', NULL, '2023-06-04 05:04:38', 0),
(25, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 05:09:56', 1),
(26, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 06:35:30', 1),
(27, '::1', 'readybang001', NULL, '2023-06-04 07:05:05', 0),
(28, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 07:05:10', 1),
(29, '::1', 'demodemo001', NULL, '2023-06-04 07:05:58', 0),
(30, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 07:06:44', 1),
(31, '::1', 'bcrypt001', NULL, '2023-06-04 07:15:35', 0),
(32, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 07:15:47', 1),
(33, '::1', 'xliyobo10', NULL, '2023-06-04 07:16:38', 0),
(34, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 07:18:41', 1),
(35, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 07:18:42', 1),
(36, '::1', 'hildankusto', NULL, '2023-06-04 07:20:41', 0),
(37, '::1', 'hildankusto', NULL, '2023-06-04 07:20:50', 0),
(38, '::1', 'hildankusto', NULL, '2023-06-04 07:21:03', 0),
(39, '::1', 'ridhoo001', NULL, '2023-06-04 07:35:28', 0),
(40, '::1', 'ridhoo001', NULL, '2023-06-04 07:36:59', 0),
(41, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 07:37:03', 1),
(42, '::1', 'ridhoo001', NULL, '2023-06-04 07:57:03', 0),
(43, '::1', 'siapanich01@gmail.com', 1, '2023-06-04 07:59:12', 1),
(44, '::1', 'siapanich01@gmail.com', 1, '2023-06-08 14:48:17', 1),
(45, '::1', 'siapanich01@gmail.com', 1, '2023-06-09 04:02:35', 1),
(46, '::1', 'siapanich01@gmail.com', 1, '2023-06-09 21:38:49', 1),
(47, '::1', 'pandongaku1', NULL, '2023-06-09 21:54:15', 0),
(48, '::1', 'hildankutomeeeeo@gmail.com', 24, '2023-06-09 21:54:43', 1),
(49, '::1', 'hildanksssutomo@gmail.com', 26, '2023-06-09 21:58:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(5) NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `shop_name` varchar(36) NOT NULL,
  `shop_owner` varchar(36) NOT NULL,
  `shop_address` text NOT NULL,
  `phone_number` int(16) NOT NULL,
  `email` varchar(36) NOT NULL,
  `status` enum('Active','Non Active') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `uuid`, `shop_name`, `shop_owner`, `shop_address`, `phone_number`, `email`, `status`, `created_at`, `updated_at`) VALUES
(5, '646ef334ae6ff', 'HenryShop', 'Henry D', 'Jl. Kenangan No36 Cempaka Putih', 2147483647, 'henry@denata.com', 'Active', '2023-05-24 22:33:40', '2023-05-24 22:33:40'),
(7, '6474ba65b9a20', 'DNR.STORE', 'DinaRahma', 'TanjungBale', 2147483647, 'adsas@ca.com', '', '2023-05-29 07:44:53', '2023-05-29 07:44:53'),
(9, '647ad1d826a6d', 'dasd', 'sada', 'asda', 0, 'dasda', '', '2023-06-02 22:38:32', '2023-06-02 22:38:32'),
(10, '', 'testing', 'testing', 'testing', 2147483647, 'hildanddkutomo@gmail.com', '', '2023-06-09 15:40:30', '2023-06-09 15:40:30'),
(11, '', 'sadasd', '', 'asdasdas', 2147483647, 'hildankutomssso@gmail.com', '', '2023-06-09 15:41:32', '2023-06-09 15:41:32'),
(12, '', 'testings', 'testings', 'sadasdasdas', 0, 'testings', '', '2023-06-09 15:42:38', '2023-06-09 15:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE `distributions` (
  `distribution_id` int(11) NOT NULL,
  `driver_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `distribution_description` text NOT NULL,
  `distribution_destination` text NOT NULL,
  `purchase_amount` varchar(36) NOT NULL,
  `pay_amount` varchar(36) NOT NULL,
  `distribution_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `distribution_progress` enum('diproses','dalam_perjalanan','batal','diterima','dikembalikan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributions`
--

INSERT INTO `distributions` (`distribution_id`, `driver_id`, `product_id`, `distribution_description`, `distribution_destination`, `purchase_amount`, `pay_amount`, `distribution_datetime`, `distribution_progress`, `created_at`, `updated_at`) VALUES
(5, 3, 1, 'dasdasdas', '0', '', '', '2023-05-03 14:08:00', 'diterima', '2023-05-29 07:08:47', '2023-05-29 07:08:47'),
(6, 3, 1, 'dasdas', 'TanjungPinang', '', '', '2023-05-04 14:10:00', 'diproses', '2023-05-29 07:10:18', '2023-05-29 07:10:18'),
(7, 3, 1, 'das', 'TanjungPinang', '44', '528000', '2023-05-06 10:14:00', 'batal', '2023-05-31 03:17:42', '2023-06-02 20:37:58'),
(8, 5, 10, 'ada aja', 'TanjungPinang', '20', '240000', '2023-05-31 10:23:00', 'dalam_perjalanan', '2023-05-31 03:27:49', '2023-05-31 03:27:49'),
(9, 3, 1, 'dasda', 'sadas', '5', '60000', '2023-05-31 10:28:00', 'diterima', '2023-05-31 03:28:24', '2023-06-02 20:41:35'),
(10, 3, 10, 'adasd', 'asdfasdas', '2', '24000', '2023-05-20 10:36:00', 'diproses', '2023-05-31 03:36:54', '2023-05-31 03:36:54'),
(11, 3, 1, 'ewew', 'TanjungPinang', '2', '24000', '2023-06-29 23:00:00', 'batal', '2023-06-09 16:00:19', '2023-06-09 16:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(5) NOT NULL,
  `driver_name` varchar(36) NOT NULL,
  `driver_phone` varchar(36) NOT NULL,
  `driver_email` varchar(36) NOT NULL,
  `driver_status` enum('Active','Non Active') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `driver_phone`, `driver_email`, `driver_status`, `created_at`, `updated_at`) VALUES
(3, 'Hendro Gunawan', '08312220210', 'hildankutomo@gmail.com', 'Active', '2023-05-29 05:42:41', '2023-05-29 05:42:41'),
(4, 'Ridwan Kurniawan', '083124062506', 'mencariarti@selamanyatakanberhenti.c', 'Active', '2023-05-29 08:25:00', '2023-05-29 08:25:00'),
(5, 'Supriyadie', '08312220210', 'hildankutomo@gmail.com', 'Active', '2023-05-29 08:25:14', '2023-06-09 16:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1683043183, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(5) NOT NULL,
  `status` enum('danger','warning','info','') NOT NULL,
  `title` varchar(36) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `status`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'danger', 'Test', 'testing', '2023-05-29 15:16:43', '2023-05-29 08:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(36) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(36) NOT NULL,
  `product_quantity` varchar(36) NOT NULL,
  `category_id` int(5) NOT NULL,
  `product_made` varchar(255) NOT NULL,
  `product_expired` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_quantity`, `category_id`, `product_made`, `product_expired`, `created_at`, `updated_at`) VALUES
(1, 'Keju Mozzarela', 'Lezat Enak Bergizi', 26000, '49', 1, '2022-05-01', '2022-12-01', '2023-05-25 04:27:03', '2023-06-02 20:28:29'),
(10, 'Lanting Bumbu', 'Lanting Enak Bergizi', 12000, '80', 1, '2023-06-23T06:01', '2023-07-06T06:01', '2023-05-24 22:36:03', '2023-06-09 16:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE `products_category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Makanan Tahan Lama', '2023-05-25 04:26:17', '2023-05-29 08:24:28'),
(2, 'Vegetarian', '2023-05-25 04:50:36', '2023-05-25 04:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'siapanich01@gmail.com', NULL, 'hildankusto', '$2y$10$J3XnpRmg9r/4rj40XWm.Duhw7BFmwfTqFWkObPpS4rHIGxyvsFX6W', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-05-02 16:12:12', '2023-05-02 16:12:12', NULL),
(26, 'hildanksssutomo@gmail.com', 'usersusers', 'usersusers', '$2y$10$PERNCKrWN.esnUCsASSTC.tmfI3oph1s6Bo70bzY81ZqRVza47BZy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-09 21:58:25', '2023-06-09 21:58:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `webconfig`
--

CREATE TABLE `webconfig` (
  `id` int(11) NOT NULL,
  `app_logo` varchar(36) NOT NULL,
  `app_name` varchar(36) NOT NULL,
  `app_title` varchar(36) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webconfig`
--

INSERT INTO `webconfig` (`id`, `app_logo`, `app_name`, `app_title`, `description`, `created_at`, `updated_at`) VALUES
(1, '', 'SITAKESIMA', 'SITAKESIMA::DASHBOARD', '', '2023-05-12 01:10:47', '2023-05-29 08:16:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`distribution_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `webconfig`
--
ALTER TABLE `webconfig`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `distribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `webconfig`
--
ALTER TABLE `webconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `products_category` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `products_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;