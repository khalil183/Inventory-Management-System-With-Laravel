-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 05:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zahid`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `due` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `total`, `due`, `created_at`, `updated_at`) VALUES
(1, 'rajibul islam edited', '01761326599', 13150, 4200, NULL, NULL),
(2, 'sumaia akter', '01765548761', 2315775, 10200, NULL, NULL),
(3, 'junaid islam', '01796726183', 4300, 300, NULL, NULL),
(4, 'monayem islam', '01733159603', 4000, 1900, NULL, NULL),
(5, 'sumaia akter edit', '01796726183', 1800, 200, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `expense_amount` double NOT NULL,
  `expense_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_amount`, `expense_details`, `expense_date`, `expense_month`, `expense_year`, `created_at`, `updated_at`) VALUES
(3, 75, 'cha-kofi', '2020-12-04', 'December-2020', '2020', NULL, NULL),
(4, 25, 'Cycling', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(5, 587, 'tea break', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(6, 874, 'decoration', '2020-12-01', 'December-2020', '2020', NULL, NULL),
(7, 5478, 'something', '2020-08-04', 'August-2020', '2020', NULL, NULL),
(8, 120, 'breakfast', '2020-12-05', 'December-2020', '2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_11_30_022630_create_products_table', 2),
(8, '2020_12_02_103630_create_customers_table', 3),
(9, '2020_12_03_042033_create_orders_table', 4),
(10, '2020_12_03_042945_create_order_products_table', 4),
(11, '2020_12_03_043826_create_payments_table', 4),
(12, '2020_12_04_032004_create_expenses_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` double NOT NULL,
  `payable_amount` double NOT NULL,
  `due_amount` double NOT NULL,
  `total_product` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_code`, `total_amount`, `payable_amount`, `due_amount`, `total_product`, `payment_method`, `order_date`, `order_month`, `order_year`, `created_at`, `updated_at`) VALUES
(44, 2, '730960', 1350, 1000, 350, 6, 'HandCash', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(45, 3, '144406', 2050, 1500, 550, 8, 'HandCash', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(46, 2, '547515', 3350, 0, 3350, 26, 'Due', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(47, 4, '445270', 450, 350, 100, 2, 'HandCash', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(48, 4, '796147', 600, 400, 200, 5, 'HandCash', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(49, 2, '241912', 100, 0, 100, 1, 'Due', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(50, 5, '29751', 100, 80, 20, 1, 'HandCash', '2020-12-03', 'December-2020', '2020', NULL, NULL),
(51, 5, '789870', 100, 80, 20, 1, 'HandCash', '2020-12-04', 'December-2020', '2020', NULL, NULL),
(52, 5, '467102', 1250, 1200, 50, 5, 'HandCash', '2020-12-04', 'December-2020', '2020', NULL, NULL),
(53, 4, '126632', 700, 500, 200, 4, 'HandCash', '2020-12-04', 'December-2020', '2020', NULL, NULL),
(54, 3, '371943', 1450, 1200, 250, 5, 'HandCash', '2020-12-04', 'December-2020', '2020', NULL, NULL),
(55, 4, '865645', 300, 0, 300, 3, 'Due', '2020-12-04', 'December-2020', '2020', NULL, NULL),
(56, 4, '862885', 1000, 0, 1000, 5, 'Due', '2020-12-04', 'December-2020', '2020', NULL, NULL),
(57, 1, '977688', 600, 500, 100, 4, 'HandCash', '2020-12-05', 'December-2020', '2020', NULL, NULL),
(58, 4, '40296', 950, 700, 250, 4, 'HandCash', '2020-12-09', 'December-2020', '2020', NULL, NULL),
(59, 2, '452186', 200, 0, 200, 1, 'Due', '2020-12-09', 'December-2020', '2020', NULL, NULL),
(60, 3, '325012', 300, 0, 300, 3, 'Due', '2020-12-09', 'December-2020', '2020', NULL, NULL),
(61, 5, '382533', 350, 200, 150, 1, 'HandCash', '2020-12-09', 'December-2020', '2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` int(11) NOT NULL,
  `details_total_amount` double NOT NULL,
  `purchase_total_amount` double NOT NULL,
  `details_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`details_id`, `order_id`, `customer_id`, `product_id`, `product_name`, `product_price`, `product_qty`, `details_total_amount`, `purchase_total_amount`, `details_date`, `details_month`, `details_year`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, 'test test', 100, 1, 100, 80, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(2, 11, 1, 1, 'test test', 100, 1, 100, 70, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(3, 11, 1, 2, 'test', 200, 1, 200, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(4, 12, 1, 1, 'test test', 100, 1, 100, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(5, 12, 1, 2, 'test', 200, 1, 200, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(6, 13, 3, 1, 'test test', 100, 1, 100, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(7, 13, 3, 2, 'test', 200, 1, 200, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(8, 15, 1, 3, 'product', 350, 4, 1400, 1200, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(9, 15, 1, 2, 'test', 200, 5, 1000, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(10, 16, 3, 1, 'test test', 100, 2, 200, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(11, 17, 1, 3, 'product', 350, 1, 350, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(12, 44, 2, 3, 'product', 350, 1, 350, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(13, 44, 2, 2, 'test', 200, 5, 1000, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(14, 45, 3, 2, 'test', 200, 5, 1000, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(15, 45, 3, 3, 'product', 350, 3, 1050, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(16, 46, 2, 3, 'product', 350, 1, 350, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(17, 46, 2, 2, 'test', 200, 5, 1000, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(18, 46, 2, 1, 'test test', 100, 20, 2000, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(19, 47, 4, 3, 'product', 350, 1, 350, 300, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(20, 47, 4, 1, 'test test', 100, 1, 100, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(21, 48, 4, 2, 'test', 200, 1, 200, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(22, 48, 4, 1, 'test test', 100, 4, 400, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(23, 49, 2, 1, 'test test', 100, 1, 100, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(24, 50, 5, 1, 'test test', 100, 1, 100, 0, '2020-12-03', 'December-2020', '2020', NULL, NULL),
(25, 51, 5, 1, 'test test', 100, 1, 100, 0, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(26, 52, 5, 3, 'product', 350, 3, 1050, 900, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(27, 52, 5, 1, 'test test', 100, 2, 200, 0, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(28, 53, 4, 1, 'test test', 100, 1, 100, 0, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(29, 53, 4, 2, 'test', 200, 3, 600, 0, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(30, 54, 3, 3, 'product', 350, 3, 1050, 1050, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(31, 54, 3, 2, 'test', 200, 2, 400, 300, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(32, 55, 4, 1, 'test test', 100, 3, 300, 240, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(33, 56, 4, 2, 'test', 200, 5, 1000, 750, '2020-12-04', 'December-2020', '2020', NULL, NULL),
(34, 57, 1, 2, 'test', 200, 2, 400, 300, '2020-12-05', 'December-2020', '2020', NULL, NULL),
(35, 57, 1, 1, 'test test', 100, 2, 200, 160, '2020-12-05', 'December-2020', '2020', NULL, NULL),
(36, 58, 4, 3, 'product', 350, 1, 350, 350, '2020-12-09', 'December-2020', '2020', NULL, NULL),
(37, 58, 4, 2, 'test', 200, 3, 600, 450, '2020-12-09', 'December-2020', '2020', NULL, NULL),
(38, 59, 2, 2, 'test', 200, 1, 200, 150, '2020-12-09', 'December-2020', '2020', NULL, NULL),
(39, 60, 3, 1, 'test test', 100, 3, 300, 240, '2020-12-09', 'December-2020', '2020', NULL, NULL),
(40, 61, 5, 3, 'product', 350, 1, 350, 350, '2020-12-09', 'December-2020', '2020', NULL, NULL);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `befor_payment_amount` double NOT NULL,
  `payment_amount` double NOT NULL,
  `after_payment_amount` double NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `customer_id`, `payment_code`, `befor_payment_amount`, `payment_amount`, `after_payment_amount`, `payment_date`, `payment_month`, `payment_year`, `created_at`, `updated_at`) VALUES
(1, 4, '', 300, 150, 150, '2020-12-04', '2020-Dec', '2020', NULL, NULL),
(2, 5, '', 40, 20, 20, '2020-12-04', '2020-Dec', '2020', NULL, NULL),
(3, 5, '', 20, 20, 0, '2020-12-04', '2020-Dec', '2020', NULL, NULL),
(4, 1, '', 10320, 320, 10000, '2020-12-04', '2020-Dec', '2020', NULL, NULL),
(5, 3, '', 1050, 1000, 50, '2020-12-04', '2020-Dec', '2020', NULL, NULL),
(6, 1, '65378', 10000, 5000, 5000, '2020-12-04', '2020-Dec', '2020', NULL, NULL),
(7, 4, '36264', 300, 150, 150, '2020-12-04', '2020-Dec', '2020', NULL, NULL),
(8, 2, '26736', 20850, 850, 20000, '2020-12-04', '2020-Dec', '2020', NULL, NULL),
(9, 1, '38166', 5100, 400, 4700, '2020-12-09', '2020-Dec', '2020', NULL, NULL),
(10, 1, '60158', 4700, 500, 4200, '2020-12-09', '2020-Dec', '2020', NULL, NULL),
(11, 1, '47850', 4700, 500, 4200, '2020-12-09', '2020-Dec', '2020', NULL, NULL),
(12, 1, '60188', 4700, 500, 4200, '2020-12-09', '2020-Dec', '2020', NULL, NULL),
(13, 2, '24101', 20200, 10000, 10200, '2020-12-09', '2020-Dec', '2020', NULL, NULL),
(14, 2, '22385', 20200, 10000, 10200, '2020-12-09', '2020-Dec', '2020', NULL, NULL),
(15, 3, '21243', 600, 150, 450, '2020-12-10', '2020-Dec', '2020', NULL, NULL),
(16, 3, '92964', 600, 150, 450, '2020-12-10', '2020-Dec', '2020', NULL, NULL),
(17, 3, '92175', 450, 150, 300, '2020-12-10', '2020-Dec', '2020', NULL, NULL),
(18, 3, '10141', 450, 150, 300, '2020-12-10', '2020-Dec', '2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `supplyer_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_qty`, `barcode`, `purchase_price`, `selling_price`, `supplyer_id`, `category_id`, `image`, `purchase_date`, `purchase_month`, `purchase_year`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test test', 89, '584rtfdsf85333', 80, 100, NULL, NULL, 'public/productImages/01-12-20-01-59-08-75311.jpg', '2020-11-30', 'November-2020', '2020', 1, NULL, NULL),
(2, 'test', 28, 'gfsdfds453', 150, 200, NULL, NULL, 'public/productImages/01-12-20-01-49-31-21948.png', '2020-12-01', 'December-2020', '2020', 1, NULL, NULL),
(3, 'product', 15, 'fsfsdf44343', 350, 350, NULL, NULL, 'public/productImages/01-12-20-02-01-06-85611.jpg', '2020-12-01', 'December-2020', '2020', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ibrahim khalil', 'admin@gmail.com', NULL, '$2y$10$jcVwoRsCJokoA1eyBmwS8O1Su.5dvqPQePQFqHsUQ96Suxb2107Dm', 'admin', NULL, '2020-11-29 06:40:00', '2020-11-29 06:40:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
