-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2021 at 09:44 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `islampoultry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2021-09-20 04:33:18', '$2y$10$8VB5Tq0DXc3hIxiq9inQFedq2DERK77ya/F1sJLQS1CY3d/Q8k2fy', '5CBSvFmIEfGUFACItftz4ew8Q1di3uHQfAjl3Mmqdzaq7NzMdVod6iNI2p2x', NULL, '202109201202Ambrose-Chui-Cropped-200x200.jpg', '2021-09-20 04:33:18', '2021-09-20 06:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug_en`, `brand_image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Square Feed', 'square-feed', 'upload/brand/1712489109765204.jpg', 1, NULL, '2021-09-28 08:58:47', '2021-10-02 00:41:21'),
(2, 'Feed', 'feed', 'upload/brand/1712129990142224.jpg', 1, NULL, '2021-09-28 07:58:57', '2021-09-28 03:25:07'),
(3, 'test', 'test', NULL, 0, NULL, '2021-09-28 03:57:46', '2021-09-28 03:58:00'),
(4, 'Pepsi', 'pepsi', 'upload/brand/1712488403819241.png', 1, NULL, '2021-10-02 00:30:08', NULL),
(5, 'Coca cola', 'coca-cola', 'upload/brand/1712488469714114.jpg', 1, NULL, '2021-10-02 00:31:10', NULL),
(6, 'Aci Food Limited', 'aci-food-limited', 'upload/brand/1712488994988555.jpg', 1, NULL, '2021-10-02 00:39:31', NULL),
(7, 'BD Food Ltd', 'bd-food-ltd', 'upload/brand/1712489039446306.jpg', 1, NULL, '2021-10-02 00:40:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Feed', 'feed', 1, '2021-09-29 04:36:01', '2021-09-28 04:54:53', '2021-09-29 04:36:01'),
(2, 'Permarcy', 'permarcy', 0, '2021-09-28 04:59:35', '2021-09-28 04:56:03', '2021-09-28 04:59:35'),
(3, 'Pharmacy', 'pharmacy', 1, '2021-09-29 04:40:52', '2021-09-29 03:26:12', '2021-09-29 04:40:52'),
(4, 'Food', 'food', 1, NULL, '2021-09-29 04:02:44', NULL),
(5, 'Pharmacy', 'pharmacy', 1, NULL, '2021-10-01 22:48:59', NULL),
(6, 'Feed', 'feed', 0, NULL, '2021-10-01 22:49:14', NULL),
(7, 'Square Feed', 'square-feed', 1, NULL, '2021-10-01 22:50:14', NULL),
(8, 'Soft water', 'soft-water', 1, NULL, '2021-10-02 00:47:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `date_of_birth`, `gender`, `age`, `city`, `state`, `country`, `status`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Rasel Hossain', 1786343465, 'rasel@gmail.com', '1999-02-02', 'male', 21, 'pabna', NULL, NULL, 1, 'pabna', '2021-10-30 04:50:26', '2021-10-30 05:26:30'),
(2, 'Yeasin Hossain', 1768491641, 'coderyeasin@gmail.com', '1996-02-02', 'male', 25, 'pabna', NULL, NULL, 1, 'pabna', '2021-10-30 04:57:22', '2021-10-30 05:24:02'),
(3, 'Shamim Hossain', 789665222, 'shamim@gmail.com', '2001-02-03', 'male', 20, 'Pabna', NULL, NULL, 1, 'pabna sadar', '2021-11-03 03:24:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_due_paids`
--

CREATE TABLE `customer_due_paids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `due_paid` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_due` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_products`
--

CREATE TABLE `inventory_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_in_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_out_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_products`
--

INSERT INTO `inventory_products` (`id`, `product_id`, `quantity`, `unit`, `stock_in_date`, `stock_out_date`, `stock_by`, `created_at`, `updated_at`) VALUES
(1, 1, 20, '4', '2021-10-23 14:08:14', NULL, '1', '2021-10-23 08:08:14', '2021-10-23 08:08:14'),
(2, 1, 22, '1', '2021-10-23 14:12:52', NULL, '1', '2021-10-23 08:12:52', '2021-10-23 08:12:52');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_08_10_023434_create_sessions_table', 1),
(7, '2021_08_10_025855_create_admins_table', 1),
(9, '2021_09_28_061230_create_brands_table', 2),
(10, '2021_09_28_100848_create_categories_table', 3),
(12, '2021_09_29_092800_create_suppliers_table', 4),
(22, '2021_09_30_055609_create_units_table', 5),
(23, '2021_09_30_053906_create_products_table', 6),
(24, '2021_10_02_073139_add_soft_deletes_to_products_table', 7),
(25, '2021_10_02_082827_create_pmethods_table', 8),
(26, '2021_10_03_101845_create_purchases_table', 9),
(27, '2021_10_23_131314_create_inventory_products_table', 10),
(29, '2021_10_28_070111_add_product_quantity_to_products', 12),
(30, '2021_10_28_055625_create_stock_products_table', 13),
(31, '2021_10_30_091303_create_customers_table', 14),
(32, '2021_11_02_055045_create_sells_table', 15),
(33, '2021_11_03_052835_add_date_to_sells', 16),
(34, '2021_11_03_062520_add_status_to_sells', 17),
(35, '2021_11_03_085414_create_customer_due_paids_table', 18),
(36, '2021_11_03_090646_add_customer_due_paids_to_total_due', 19);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmethods`
--

CREATE TABLE `pmethods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_details` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pmethods`
--

INSERT INTO `pmethods` (`id`, `payment_name`, `payment_slug`, `payment_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bkash', 'bkash', 'Bkash a Brack Bank Service', 1, '2021-10-03 00:22:44', '2021-11-09 01:40:43'),
(2, 'Cash', 'cash', 'Payment method details goes here', 1, '2021-10-03 00:23:54', '2021-11-09 01:40:42'),
(3, 'Gift card', 'gift-card', 'Details of giftcard payment method', 0, '2021-10-03 00:26:40', '2021-11-09 01:40:49'),
(4, 'Credit', 'credit', 'Payment by customer credited balance', 1, '2021-10-03 00:27:01', '2021-11-08 01:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `supplier_id`, `unit_id`, `product_name`, `product_code`, `product_price`, `product_quantity`, `product_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 5, 4, 'Coca-Cola 600 ml', 'C-0001', 40, 210, 'upload/product/1712491822469679.png', 1, '2021-10-02 01:27:10', '2021-10-02 01:37:28'),
(2, 5, 8, 5, 5, 'Coca-Cola 2.25 ltr', 'C-0002', 110, -14, 'upload/product/1712491773215273.png', 1, '2021-10-02 01:25:31', '2021-10-02 01:37:33'),
(3, 4, 8, 4, 4, 'pepsi-diet-can 250ml', 'P-0001', 40, 40, 'upload/product/1712490185337620.png', 1, '2021-10-02 00:58:26', '2021-10-02 01:37:37'),
(4, 7, 4, 1, 1, 'Chanacur 150 gm', '152622', 30, 150, 'upload/product/1714847224535969.jpg', 1, '2021-10-28 01:22:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `today_date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `pmethod_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `invoice_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `available` int(11) DEFAULT NULL,
  `cost` decimal(8,2) NOT NULL DEFAULT '0.00',
  `subtotal` decimal(8,2) DEFAULT NULL,
  `instant_commisition` decimal(8,2) NOT NULL DEFAULT '0.00',
  `monthly_commisition` decimal(8,2) NOT NULL DEFAULT '0.00',
  `yearly_commisition` decimal(8,2) NOT NULL DEFAULT '0.00',
  `transport_commisition` decimal(8,2) NOT NULL DEFAULT '0.00',
  `extra_one_commisition` decimal(8,2) NOT NULL DEFAULT '0.00',
  `extra_two_commisition` decimal(8,2) NOT NULL DEFAULT '0.00',
  `payable_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `paid_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `due_paid` decimal(8,2) NOT NULL DEFAULT '0.00',
  `due` decimal(8,2) NOT NULL DEFAULT '0.00',
  `return_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `today_date`, `product_id`, `supplier_id`, `pmethod_id`, `note`, `invoice_name`, `reference_no`, `add_product`, `quantity`, `available`, `cost`, `subtotal`, `instant_commisition`, `monthly_commisition`, `yearly_commisition`, `transport_commisition`, `extra_one_commisition`, `extra_two_commisition`, `payable_amount`, `paid_amount`, `due_paid`, `due`, `return_amount`, `balance`, `created_at`, `updated_at`) VALUES
(2, '2021-10-28', 3, 4, 1, 'test', NULL, '60', NULL, 20, NULL, '15.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '300.00', '250.00', '0.00', '50.00', '0.00', '0.00', NULL, NULL),
(3, '2021-10-28', 1, 5, 2, 'oopp', NULL, '85622', NULL, 60, NULL, '35.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2100.00', '2000.00', '0.00', '100.00', '0.00', '0.00', NULL, NULL),
(4, '2021-10-28', 1, 5, 1, 'test', NULL, '55222', NULL, 60, NULL, '35.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2100.00', '2100.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(5, '2021-10-30', 1, 5, 1, NULL, NULL, '855222', NULL, 35, NULL, '20.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '700.00', '700.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(6, '2021-10-30', 1, 5, 1, NULL, NULL, '855222', NULL, 35, NULL, '20.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '700.00', '700.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(7, '2021-10-30', 1, 5, 1, NULL, NULL, '855222', NULL, 35, NULL, '20.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '700.00', '700.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(8, '2021-10-30', 1, 5, 1, NULL, NULL, '855222', NULL, 35, NULL, '20.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '700.00', '700.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(9, '2021-10-30', 1, 5, 1, NULL, NULL, '855222', NULL, 35, NULL, '20.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '700.00', '700.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(10, '2021-10-30', 1, 5, 1, NULL, NULL, '856655', NULL, 50, NULL, '35.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1750.00', '1750.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(11, '2021-10-30', 3, 4, 2, NULL, NULL, '85522', NULL, 100, NULL, '15.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1500.00', '1200.00', '0.00', '300.00', '0.00', '0.00', NULL, NULL),
(12, '2021-10-30', 4, 1, 1, 'dddd', NULL, '855522', NULL, 120, NULL, '25.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3000.00', '2000.00', '0.00', '1000.00', '0.00', '0.00', NULL, NULL),
(13, '2021-10-30', 4, 1, 1, NULL, NULL, 'ggggg', NULL, 50, NULL, '25.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1250.00', '1250.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(14, '2021-10-30', 4, 1, 2, 'ff', NULL, '552222', NULL, 150, NULL, '25.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3750.00', '3750.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(15, '2021-10-30', 1, 5, 2, 'test', NULL, '52552', NULL, 200, NULL, '35.00', NULL, '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6300.00', '6000.00', '0.00', '300.00', '0.00', '0.00', '2021-10-30 01:20:42', NULL),
(16, '2021-10-30', 4, 1, 1, 'bd', NULL, '85622', NULL, 50, NULL, '25.00', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1250.00', '1250.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(17, '2021-11-02', 3, 4, 1, NULL, NULL, '5655255', NULL, 50, NULL, '35.00', NULL, '5.00', '10.00', '10.00', '15.00', '7.00', '8.00', '1612.50', '1612.00', '0.00', '0.50', '0.00', '0.00', NULL, NULL),
(18, '2021-11-04', 1, 5, 1, NULL, NULL, '44444', NULL, 20, NULL, '35.00', NULL, '0.00', '100.00', '0.00', '0.00', '0.00', '0.00', '600.00', '600.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(19, '2021-11-04', 2, 5, 2, NULL, NULL, '8888888', NULL, 15, NULL, '105.00', NULL, '0.00', '30.00', '30.00', '30.00', '45.00', '45.00', '1395.00', '1300.00', '0.00', '95.00', '0.00', '0.00', NULL, NULL),
(20, '2021-11-06', 1, 5, 2, NULL, NULL, '522', NULL, 20, NULL, '70.00', NULL, '40.00', '40.00', '40.00', '40.00', '40.00', '40.00', '640.00', '640.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pmethod_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `payable_amount` int(11) NOT NULL DEFAULT '0',
  `paid_amount` int(11) NOT NULL DEFAULT '0',
  `due` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `paid_due` int(11) NOT NULL DEFAULT '0',
  `return` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `product_id`, `customer_id`, `pmethod_id`, `invoice_no`, `payable_amount`, `paid_amount`, `due`, `quantity`, `paid_due`, `return`, `created_at`, `updated_at`, `date`, `status`) VALUES
(1, 3, 2, 1, 659875, 800, 700, 100, 20, 0, 0, NULL, '2021-11-03 01:34:31', '2021-11-03', 1),
(2, 1, 1, 2, 612859, 2400, 2400, 0, 60, 0, 0, NULL, '2021-11-03 01:33:06', '2021-11-03', 1),
(3, 2, 2, 2, 899156, 550, 500, 50, 5, 0, 0, NULL, NULL, '2021-11-03', 1),
(4, 2, 1, 2, 141684, 440, 400, 40, 4, 0, 0, NULL, NULL, '2021-11-03', 1),
(5, 2, 3, 2, 342465, 1100, 1000, 100, 10, 0, 0, NULL, NULL, '2021-11-03', 1),
(6, 3, 3, 2, 890144, 800, 500, 300, 20, 0, 0, NULL, NULL, '2021-11-03', 1),
(7, 4, 3, 2, 330849, 1500, 1200, 300, 50, 0, 0, NULL, NULL, '2021-11-03', 1),
(8, 3, 2, 2, 0, 800, 800, 0, 20, 0, 0, NULL, NULL, '2021-11-04', 1),
(9, 3, 3, 2, 924164, 1600, 1200, 400, 40, 0, 0, NULL, NULL, '2021-11-06', 1),
(10, 3, 3, 2, 855123, 800, 800, 0, 20, 0, 0, NULL, NULL, '2021-11-06', 1),
(11, 2, 2, 2, 206959, 2200, 2000, 200, 20, 0, 0, NULL, NULL, '2021-11-06', 1),
(12, 1, 1, 1, 100163, 1200, 1000, 200, 30, 0, 0, NULL, NULL, '2021-11-06', 1),
(13, 3, 2, 2, 625073, 400, 350, 50, 10, 0, 0, NULL, NULL, '2021-11-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('T1BIn4Brxeke9nPJPLdxx4BzdgcG4mfbxTwmMCWF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieTBiREVqQ3I2S1lwNkg2VUxrTGpkRVUxUE04cE1DRnJKcUVyWGlIVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vaXNsYW1wb3VsdHJ5LmRldi9yZXBvcnQvY29tbWlzaXRpb24vYmFsYW5jZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1636443829);

-- --------------------------------------------------------

--
-- Table structure for table `stock_products`
--

CREATE TABLE `stock_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_products`
--

INSERT INTO `stock_products` (`id`, `product_id`, `supplier_id`, `purchase_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 2, 20, NULL, NULL),
(2, 1, 5, 3, 60, NULL, NULL),
(3, 1, 5, 4, 60, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_slug`, `email`, `mobile`, `address`, `city`, `state`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'BD Food Limited', 'bd-food-limited', 'bdfood@gmail.com', '01700000000', 'Dhaka, Bangladesh', 'Dhaka', 'Bangladesh', 1, NULL, '2021-09-29 04:18:21', '2021-10-02 00:37:09'),
(2, 'Square Food', 'square-food', 'squarefood@gmail.com', '019653252', 'Pabna, Dhaka, Bangladesh', 'Pabna', 'Dhaka', 1, NULL, '2021-09-29 04:19:44', '2021-09-29 04:42:27'),
(3, 'ACI Food Limited', 'aci-food-limited', 'acifood@gmail.com', '001248522', 'Dhaka', 'Dhaka', 'Dhaka', 1, NULL, '2021-09-29 04:31:14', NULL),
(4, 'Pepsi', 'pepsi', 'pepsi@gmail.com', '01799650010', 'Dhaka', 'Dhaka', 'Bangladesh', 1, NULL, '2021-10-02 00:35:46', NULL),
(5, 'Coco Cola', 'coco-cola', 'cocoCola@gmail.com', '0198652352', 'Dhaka, Bangladesh', 'Gazipur', 'Bangladesh', 1, NULL, '2021-10-02 00:38:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_details` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `short_name`, `unit_slug`, `unit_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kelogram', 'kg', 'kelogram', 'kelogram', 1, '2021-09-30 05:36:36', NULL),
(2, 'Gram', 'Gram', 'gram', 'Gram', 1, '2021-09-30 05:37:02', '2021-10-02 00:42:33'),
(4, 'Mililittter', 'ml', 'mililittter', 'Mililittter', 1, '2021-09-30 05:51:44', '2021-10-02 00:42:27'),
(5, 'Litter', 'ltr', 'litter', 'Litter', 1, '2021-10-02 00:44:15', NULL);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_due_paids`
--
ALTER TABLE `customer_due_paids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventory_products`
--
ALTER TABLE `inventory_products`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pmethods`
--
ALTER TABLE `pmethods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_supplier_name_unique` (`supplier_name`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_mobile_unique` (`mobile`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_unit_name_unique` (`unit_name`),
  ADD UNIQUE KEY `units_short_name_unique` (`short_name`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_due_paids`
--
ALTER TABLE `customer_due_paids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_products`
--
ALTER TABLE `inventory_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmethods`
--
ALTER TABLE `pmethods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
