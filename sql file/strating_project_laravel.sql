-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 07:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strating_project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Electronics', '2019-07-25 21:13:19', NULL, NULL),
(2, 'Man', '2019-07-25 21:19:01', NULL, NULL),
(3, 'Womens', '2019-07-25 21:22:03', NULL, NULL),
(4, 'Child', '2019-07-25 21:23:51', NULL, NULL);

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
(14, '2019_07_20_091053_create_categories_table', 4),
(16, '2019_07_17_033908_create_products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kholil@gmail.com', '$2y$10$MrCQjCvLWNwVksuviC2ohONRqRNnpb3BcDZmH6j6GVgIX9IQDbaPO', '2019-07-29 22:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `alert_quantity` int(11) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_product_image.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_quantity`, `alert_quantity`, `product_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 'poccophpone', 29000, 'poccophpone F1 smartphone 6gb ram 128 gb rom', 100, 5, '5.jpg', '2019-07-26 00:37:52', '2019-07-26 00:37:52', NULL),
(6, 2, 'T-Shirt', 1800, 'T-Shirt', 100, 5, '6.jpg', '2019-07-25 21:19:45', '2019-07-25 21:19:45', NULL),
(7, 2, 'T-Shirt', 3000, 'T-Shirt', 500, 50, '7.jpg', '2019-07-25 21:20:15', '2019-07-25 21:20:15', NULL),
(8, 2, 'T-Shirt', 2200, 'T-Shirt', 50, 1, '8.jpg', '2019-07-25 21:20:43', '2019-07-25 21:20:43', NULL),
(9, 2, 'shoes', 3800, 'shoes', 100, 12, '9.jpg', '2019-07-25 21:21:13', '2019-07-25 21:21:13', NULL),
(10, 2, 'shoes', 9800, 'shoes', 50, 1, '10.jpg', '2019-07-25 21:21:46', '2019-07-25 21:21:46', NULL),
(11, 3, 'sari', 20000, 'sari', 500, 50, '11.jpg', '2019-07-25 21:22:37', '2019-07-25 21:22:37', NULL),
(12, 3, 'sari', 9000, 'sari', 100, 1, '12.jpg', '2019-07-25 21:23:12', '2019-07-25 21:23:12', NULL),
(13, 4, 'child accessories', 1800, 'child accessories', 100, 12, '13.jpg', '2019-07-25 21:24:31', '2019-07-25 21:24:31', NULL),
(14, 4, 'child accessories', 1800, 'child accessories', 500, 50, '14.jpg', '2019-07-25 21:24:59', '2019-07-25 21:24:59', NULL),
(15, 4, 'child accessories', 1800, 'child accessories', 100, 12, '15.jpg', '2019-07-25 21:25:39', '2019-07-25 21:25:39', NULL),
(16, 4, 'default', 500, 'default image', 100, 1, 'default_product_image.jpg', '2019-07-25 22:24:50', NULL, NULL),
(17, 1, 'default', 500, 'asdf', 500, 50, 'default_product_image.jpg', '2019-07-25 22:25:38', NULL, NULL),
(18, 1, 'shawmi mi A2', 23000, 'shawmi mi A2', 100, 5, '18.jpg', '2019-07-25 22:53:19', '2019-07-25 22:53:20', NULL),
(19, 1, 'readmi note 6 prod quad camera 3+32', 25000, 'readmi note 6 prod quad camera 3+32', 100, 5, '19.jpg', '2019-07-25 22:53:46', '2019-07-28 12:51:08', '2019-07-28 12:51:08'),
(20, 1, 'readmi note 6 prod quad camera 4+64', 50000, 'readmi note 6 prod quad camera 4+64', 500, 50, '20.jpg', '2019-07-25 22:54:16', '2019-07-28 12:51:11', '2019-07-28 12:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(10) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Raju', 'raju@gmail.com', NULL, '$2y$10$lBhfOXT7fA/UvP6T9B13qexZFNGVNxNXWdmOZTelXTFFq/apcTrPy', 'r9wDukTQB8YEWZgpJyqvF2DKBdbDodiEvpzCTb2V2Pgo3GUtmUCoqZQgYd7x', 1, '2019-07-16 10:41:08', '2019-07-16 10:41:08'),
(2, 'Pavel', 'pavel@gmail.com', NULL, '$2y$10$GW5WWTit/hWMI3Rn2L5dtu2TmkzTqtiW.wTPuaFkAylbZIAviD.H.', NULL, 1, '2019-07-16 11:15:10', '2019-07-16 11:15:10'),
(3, 'mijan', 'mijan@gmail.com', NULL, '$2y$10$dKRgpuVMRzRxvF6/Kps81O8/qL4UTGXIWQFgyGUtlSG/GQw09JZVG', NULL, 1, '2019-07-16 11:15:32', '2019-07-16 11:15:32'),
(4, 'kholil', 'kholil@gmail.com', NULL, '$2y$10$zcez7ep7G61FckigtbE.huX0L42onte5VaJ3lPDRoCpcN1JwstzKm', 'TTEbT1EK4dnX0iBHlQVx1LvbpY1pRIk5cvfa5oHoXGZMQRaMWkXg9cJCL5Jd', 1, '2019-07-29 14:09:26', '2019-07-29 14:09:26'),
(5, 'sama', 'sama@gmail.com', NULL, '$2y$10$MEo9OnKo.tzyj/IpjLXHQukD0csHlcFn8SMAqEuWLgNRmBDB398e6', NULL, 1, '2019-07-29 22:46:44', '2019-07-29 22:46:44'),
(6, 'test', 'test@gmail.com', NULL, '$2y$10$TWanfrmnod2WucMzYlTjwOl2PkdF5axNY57aP01wRdiVJcFFCcCiW', NULL, 1, '2019-08-01 13:48:24', '2019-08-01 13:48:24'),
(7, 'raju', 'raju2021@gmail.com', NULL, '$2y$10$tFapbHNE9esUVsBjyMkVTOPdZUfUUD3ykWUftxUKu4kxwx65ogOMO', NULL, 1, '2019-11-06 12:20:42', '2019-11-06 12:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
