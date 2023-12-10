-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 08:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sell-accessories-e-commerce-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `city`, `district`, `village`, `detail_address`, `created_at`, `updated_at`) VALUES
(1, 'Quảng Ngãi', 'Bình Sơn ', 'Bình Thuận ', 'THPT Trần Kỳ Phong, thị trấn Châu Ổ', '2023-11-06 09:33:32', '2023-11-06 09:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-11-09 07:25:47', '2023-11-09 07:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_item_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `quantity`, `cart_id`, `product_item_id`, `price`, `total_money`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 32, 77, '2023-11-09 07:26:00', '2023-11-09 07:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`, `parent_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Balo & Túi xách, Ví tiền', 1, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(2, 'Phụ kiện tóc & Máy làm tóc', 2, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(3, 'Quạt cầm tay & Đồ điện dụng', 3, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(4, 'Dụng cụ học tập', 4, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(5, 'Đồ chơi', 5, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(6, 'Bình giữ nhiệt & Ly', 6, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(38, 'Đồ chơi', NULL, '2023-11-06 03:19:18', '2023-11-06 03:19:18', b'0'),
(56, 'Ao', NULL, '2023-11-06 14:27:06', '2023-11-06 14:27:06', b'0'),
(61, 'Tranh số hóa', 4, '2023-11-07 02:05:19', '2023-11-07 02:05:19', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date_order` datetime DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `address_shipping_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `shipping_cost` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date_order`, `total_price`, `address_shipping_id`, `user_id`, `payment_id`, `shipping_cost`, `status`, `delivered_date`, `note`, `cart_id`, `created_at`, `updated_at`) VALUES
(1, '2023-11-09 14:26:51', 135, 1, 1, 1, 35, 1, '2023-11-09 14:26:51', 'not gì đó', 1, '2023-11-09 07:26:51', '2023-11-09 07:26:51'),
(2, '2023-11-09 14:30:42', 50000, 1, 1, 1, 35000, 1, '2023-11-16 14:30:42', NULL, 1, '2023-11-09 07:31:23', '2023-11-09 07:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `Shipping_Price` int(11) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`Shipping_Price`, `Phone`, `Email`, `created_at`, `updated_at`) VALUES
(35, '0878005489', 'cskh@gmail.com', '2023-11-06 09:35:27', '2023-11-06 09:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name_method` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name_method`, `created_at`, `updated_at`) VALUES
(1, 'Thanh toán khi nhận hàng', '2023-11-06 09:35:48', '2023-11-06 09:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name_product` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name_product`, `description`, `category_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Kẹp tóc nơ', 'rất đẹp', 1, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(2, 'Lược gỡ rối tóc', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(3, 'Cài tóc ngọc trai', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(4, 'Lược gỡ rối', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(5, 'Băng đô nơ to', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(6, 'Cài tóc hoa hồng trắng', 'rất đẹp', 6, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(7, 'Cài tóc tay thỏ', 'rất đẹp', 1, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(8, 'Cài tóc len lông cừu', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(9, 'Cài tóc', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(10, 'Cài tóc bằng da', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(11, 'Kẹp tóc nơ đính ngọc trai', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(12, 'Kẹp nơ dài', 'rất đẹp', 6, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(13, 'Lược gỡ rối tóc+ gương', 'rất đẹp', 1, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(14, 'Lược gỡ rối +gương gập nhỏ gọn', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(15, 'Trâm cài tóc', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(16, 'Ly giữ nhiệt inox+ ống hút', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(17, 'Cài tóc hình gấu', 'rất đẹp', 1, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(18, 'Cài tóc ngôi sao', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(19, 'Cài tóc mèo đen', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(20, 'Cài tóc nơ hồng to', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(21, 'Cài tóc Kuromi', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(22, 'Cài tóc đính đá', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(23, 'Ly giữ nhiệt nhựa+ kèm ống hút nhựa', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(24, 'Cài tóc chữ D', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(25, 'Bình giữ nhiệt', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(26, 'Cài tóc nơ đính đá', 'rất đẹp', 6, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(27, 'Lọ đựng bút', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(28, 'Lọ đựng bút bằng lưới', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(29, 'Dập ghim mini', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0'),
(30, 'Tranh tô màu số hóa', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `product_configuration`
--

CREATE TABLE `product_configuration` (
  `product_item_id` int(11) NOT NULL,
  `variation_option_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_configuration`
--

INSERT INTO `product_configuration` (`product_item_id`, `variation_option_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-11-09 07:32:06', '2023-11-09 07:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `SKU` varchar(10) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `state` bit(1) DEFAULT b'1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`id`, `product_id`, `price`, `quantity`, `SKU`, `image`, `discount_price`, `state`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 54000, 23, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(2, 2, 34000, 53, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(3, 3, 48000, 52, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(4, 4, 46000, 12, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(5, 5, 30000, 47, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(6, 6, 60000, 42, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(7, 7, 40000, 54, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(8, 8, 10000, 64, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(9, 9, 50000, 24, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(10, 10, 48000, 32, 'something', 'product_image', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2023-11-06 09:38:58', '2023-11-06 09:38:58'),
(2, 'staff', '2023-11-06 09:38:58', '2023-11-06 09:38:58'),
(3, 'admin', '2023-11-06 09:38:58', '2023-11-06 09:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name_slider` varchar(100) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `birth` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `phone`, `email`, `password`, `role_id`, `sex`, `birth`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Nguyễn Trần Công Trung', '0878005489', 'cskh@gmail.com', '123456789', 1, 0, '2002-04-01 00:00:00', '2023-11-06 09:39:35', '2023-11-06 09:39:35', b'0');

----------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) NOT NULL,
  `is_default` bit(1) DEFAULT b'0',
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `full_name`, `phone`, `is_default`, `address_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Trần Công Trung', '0878005489', b'1', 1, 1, '2023-11-06 09:40:25', '2023-11-06 09:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `variation`
--

CREATE TABLE `variation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variation`
--

INSERT INTO `variation` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'màu', '2023-11-06 09:40:45', '2023-11-06 09:40:45'),
(2, 'size', '2023-11-06 09:40:45', '2023-11-06 09:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `variation_option`
--

CREATE TABLE `variation_option` (
  `id` int(11) NOT NULL,
  `value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_Variation` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variation_option`
--

INSERT INTO `variation_option` (`id`, `value`, `id_Variation`, `created_at`, `updated_at`) VALUES
(1, 'đỏ', 1, '2023-11-06 09:41:02', '2023-11-06 09:41:02'),
(2, 'M', 2, '2023-11-06 09:41:02', '2023-11-06 09:41:02'),
(3, 'L', 2, '2023-11-06 09:41:02', '2023-11-06 09:41:02'),
(4, 'cam', 1, '2023-11-06 09:41:02', '2023-11-06 09:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-11-06 09:44:35', '2023-11-06 09:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_item`
--

CREATE TABLE `wishlist_item` (
  `id` int(11) NOT NULL,
  `whislist_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT -1,
  `product_item_id` int(11) DEFAULT -1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist_item`
--

INSERT INTO `wishlist_item` (`id`, `whislist_id`, `product_id`, `product_item_id`, `created_at`, `updated_at`) VALUES
(3, 1, 5, NULL, '2023-11-09 07:34:21', '2023-11-09 07:34:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_item_id` (`product_item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `address_shipping_id` (`address_shipping_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD PRIMARY KEY (`product_item_id`,`variation_option_id`),
  ADD KEY `variation_option_id` (`variation_option_id`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `variation`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_option`
--
ALTER TABLE `variation_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Variation` (`id_Variation`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `whislist_id` (`whislist_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_item_id` (`product_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variation`
--
ALTER TABLE `variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `variation_option`
--
ALTER TABLE `variation_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`address_shipping_id`) REFERENCES `user_address` (`id`),
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD CONSTRAINT `product_configuration_ibfk_1` FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`),
  ADD CONSTRAINT `product_configuration_ibfk_2` FOREIGN KEY (`variation_option_id`) REFERENCES `variation_option` (`id`);

--
-- Constraints for table `product_item`
--
ALTER TABLE `product_item`
  ADD CONSTRAINT `product_item_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `variation_option`
--
ALTER TABLE `variation_option`
  ADD CONSTRAINT `variation_option_ibfk_1` FOREIGN KEY (`id_Variation`) REFERENCES `variation` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  ADD CONSTRAINT `wishlist_item_ibfk_1` FOREIGN KEY (`whislist_id`) REFERENCES `wishlist` (`id`),
  ADD CONSTRAINT `wishlist_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `wishlist_item_ibfk_3` FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
