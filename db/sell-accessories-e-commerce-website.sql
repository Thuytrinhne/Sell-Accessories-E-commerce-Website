-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 06:12 AM
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
(1, 'Quảng Ngãi', 'Bình Sơn ', 'Bình Thuận ', 'THPT Trần Kỳ Phong, thị trấn Châu Ổ', '2023-11-06 09:33:32', '2023-11-06 09:33:32'),
(2, 'Tỉnh Cao Bằng', 'Huyện Quảng Hòa', 'Xã Tự Do', 'trường thcs bình thuận', '2023-12-24 03:17:54', '2023-12-24 03:17:54'),
(3, 'Tỉnh Quảng Ngãi', 'Huyện Bình Sơn', 'Xã Bình Thuận', 'nhà rj á', '2023-12-24 03:18:29', '2023-12-24 03:18:29');

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
(1, 1, '2023-11-09 07:25:47', '2023-11-09 07:25:47'),
(2, 2, '2023-12-24 03:10:31', '2023-12-24 03:10:31');

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
(1, 1, 1, 1, 32, 77, '2023-11-09 07:26:00', '2023-11-09 07:26:00'),
(2, 2, 2, 4, 25000, 40000, '2023-12-24 03:11:20', '2023-12-24 03:11:20');

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
(1, 'Balo & Túi xách, Ví tiền', NULL, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(2, 'Phụ kiện tóc & Máy làm tóc', NULL, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(3, 'Quạt cầm tay & Đồ điện dụng', NULL, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(4, 'Dụng cụ học tập', 4, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(5, 'Đồ chơi', 6, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0'),
(6, 'Bình giữ nhiệt & Ly', NULL, '2023-11-06 09:35:09', '2023-11-06 09:35:09', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `email`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'mongthitrinhtkp@gmail.com', '189941', '2023-12-24 03:07:49', '2023-12-24 03:07:49');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `deleted` bit(1) DEFAULT b'0',
  `default_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name_product`, `description`, `category_id`, `created_at`, `updated_at`, `deleted`, `default_image`) VALUES
(1, 'Kẹp tóc nơ', 'rất đẹp á', 1, '2023-11-06 09:37:48', '2023-12-10 11:50:15', b'0', 'https://aothungame.vn/wp-content/uploads/imager_97443.jpg'),
(2, 'Lược gỡ rối tóc', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(3, 'Cài tóc ngọc trai', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(4, 'Lược gỡ rối', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(5, 'Băng đô nơ to', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(6, 'Cài tóc hoa hồng trắng', 'rất đẹp', 6, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(7, 'Cài tóc tay thỏ', 'rất đẹp', 1, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(8, 'Cài tóc len lông cừu', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(9, 'Cài tóc', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(10, 'Cài tóc bằng da', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(11, 'Kẹp tóc nơ đính ngọc trai', 'rất đẹp', 1, '2023-11-06 09:37:48', '2023-12-10 18:26:04', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(13, 'Lược gỡ rối tóc+ gương', 'rất đẹp', 1, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(14, 'Lược gỡ rối +gương gập nhỏ gọn', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(15, 'Trâm cài tóc', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(16, 'Ly giữ nhiệt inox+ ống hút', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(17, 'Cài tóc hình gấu', 'rất đẹp', 1, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(18, 'Cài tóc ngôi sao', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(19, 'Cài tóc mèo đen', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(20, 'Cài tóc nơ hồng to', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(21, 'Cài tóc Kuromi', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(22, 'Cài tóc đính đá', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(23, 'Ly giữ nhiệt nhựa+ kèm ống hút nhựa', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(24, 'Cài tóc chữ D', 'rất đẹp', 4, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(25, 'Bình giữ nhiệt', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(26, 'Cài tóc nơ đính đá', 'rất đẹp', 6, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png'),
(27, 'Lọ đựng bút', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', ''),
(28, 'Lọ đựng bút bằng lưới', 'rất đẹp', 2, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', ''),
(29, 'Dập ghim mini', 'rất đẹp', 5, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', ''),
(30, 'Tranh tô màu số hóa', 'rất đẹp', 3, '2023-11-06 09:37:48', '2023-11-06 09:37:48', b'0', ''),
(84, 'Luong Quoc Toan', '', 0, '2023-12-09 13:25:45', '2023-12-09 13:25:45', b'0', ''),
(86, 'aâ', '', 0, '2023-12-09 13:41:36', '2023-12-09 13:41:36', b'0', ''),
(87, 'Luong Quoc Toan', '', 0, '2023-12-09 13:43:21', '2023-12-09 13:43:21', b'0', ''),
(88, 'Luong Quoc Toan', 'aâ', 1, '2023-12-09 13:47:35', '2023-12-09 13:47:35', b'0', ''),
(91, 'Lương Quốc Toàn Trường', 'Như c rất xịn', 5, '2023-12-10 10:02:48', '2023-12-10 10:02:48', b'0', ''),
(95, 'The my beo', 'rat dep', 1, '2023-12-10 16:00:00', '2023-12-10 16:00:00', b'0', ''),
(96, '2', '1', 1, '2023-12-10 18:29:09', '2023-12-10 18:29:09', b'0', ''),
(99, 'aaaaaaaaaa', 'sdfádfsdfàds', 1, '2023-12-12 21:32:46', '2023-12-12 21:32:46', b'0', ''),
(100, 'tgjv', 'jkk', 1, '2023-12-24 04:55:58', '2023-12-24 04:55:58', b'0', 'http://127.0.0.1:8000/Product_images/1703393758.png'),
(101, 'hhvbmn', 'nmn', 1, '2023-12-24 05:08:39', '2023-12-24 05:08:39', b'0', 'http://127.0.0.1:8000/Product_images/1703394519.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_configuration`
--

CREATE TABLE `product_configuration` (
  `product_item_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `name_color` varchar(100) DEFAULT NULL,
  `variation_value` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_configuration`
--

INSERT INTO `product_configuration` (`product_item_id`, `variation_id`, `created_at`, `updated_at`, `id`, `name_color`, `variation_value`) VALUES
(1, 1, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 1, 'red', '#FF0000'),
(2, 1, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 2, 'lime', '#00FF00'),
(3, 1, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 3, 'blue', '#0000FF'),
(4, 1, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 4, 'yellow', '#FFFF00'),
(5, 1, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 5, 'cyan', '#00FFFF'),
(6, 2, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 6, '', 'X'),
(7, 2, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 7, '', 'M'),
(8, 2, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 8, '', 'XL'),
(9, 2, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 9, '', 'K'),
(10, 2, '2023-12-17 03:47:09', '2023-12-17 03:47:09', 10, '', 'XS'),
(11, 2, '2023-12-17 04:07:12', '2023-12-17 04:07:12', 11, '', 'XLL'),
(42, 1, '2023-12-17 04:07:12', '2023-12-17 04:07:12', 12, 'Navy', '#000080'),
(45, 1, '2023-12-17 04:07:12', '2023-12-17 04:07:12', 13, 'Grey', '#808080');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_image`, `created_at`) VALUES
(1, 1, 'djtmeme', '2023-12-17 05:36:54');

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
(1, 1, 54000, 23, 'Nothing', 'https://c.wallhere.com/photos/0b/33/Ekko_Leauge_of_Legends_Ekko_League_of_Legends_Riot_Games_futuristic_video_game_art_fire_PC_gaming-1855907.jpg!d', 2000, b'1', '2023-11-06 09:38:28', '2023-12-10 08:06:45', b'0'),
(2, 2, 34000, 53, 'something', 'https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/6/16/1-1686878499743583349365.png', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(3, 3, 48000, 52, 'something', 'https://hipposhop.vn/wp-content/uploads/2023/07/z4490402928689_dfc0efbbfedbb29f1af546750a490069.jpg', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(4, 4, 46000, 12, 'something', 'https://hipposhop.vn/wp-content/uploads/2023/09/z4660347193749_28fe6cf4d8b7d70713d599881eeb9919.jpg', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(5, 5, 30000, 47, 'something', 'https://hipposhop.vn/wp-content/uploads/2023/07/z4490406203138_7af56f475493733186ab6812c2defbd5.jpg', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(6, 6, 60000, 42, 'something', 'https://hipposhop.vn/wp-content/uploads/2023/07/z4490593992903_3da963e09b450d38d4c174e8a7a4e332.jpg', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(7, 7, 40000, 54, 'something', 'https://hipposhop.vn/wp-content/uploads/2023/07/z4490593992903_3da963e09b450d38d4c174e8a7a4e332.jpg', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(8, 8, 10000, 64, 'something', 'https://hipposhop.vn/wp-content/uploads/2023/07/z4490594005199_8757521d795a6d6ec2a89251c3d8b97f.jpg', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(9, 9, 50000, 24, 'something', 'https://hipposhop.vn/wp-content/uploads/2023/07/z4490594001350_2b4503381803c6eccfb99c46545e8770.jpg', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(10, 10, 48000, 32, 'something', 'https://hipposhop.vn/wp-content/uploads/2023/07/z4490593997765_0cb375fc7e712a5db6bd34843b78bc31.jpg', 35000, b'1', '2023-11-06 09:38:28', '2023-11-06 09:38:28', b'0'),
(11, 10, 45000, 10, 'somthing', 'https://hipposhop.vn/wp-content/uploads/2023/07/z4490333280085_8a269e5ee87979795a56a6a1e67f893f.jpg', 10000, b'1', '2023-11-21 19:05:26', '2023-11-21 19:05:26', b'0'),
(42, 1, 123, 123, 'smoe', 'https://avatars.github\r\n\r\n\r\n\r\n\r\ncontent.com/u/69000303?v=4', 10000, b'1', '2023-12-10 19:37:28', '2023-12-10 19:37:28', b'0'),
(45, 1, 122, 123, 'smoe', 'https://lol-skin.weblog.vc/img/wallpaper/splash/Kassadin_6.jpg?1701786054', NULL, b'1', '2023-12-12 21:32:34', '2023-12-12 21:32:34', b'0');

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
  `password` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` bit(1) DEFAULT b'0',
  `remember_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `phone`, `email`, `password`, `role_id`, `sex`, `birth`, `created_at`, `updated_at`, `deleted`, `remember_token`) VALUES
(1, 'Nguyễn Trần Công Trung', '0878005489', 'cskh@gmail.com', '123456789', 1, 0, '2002-04-01', '2023-11-06 09:39:35', '2023-11-06 09:39:35', b'0', NULL),
(2, 'Nguyễn Thùy Trinh', NULL, 'mongthitrinhtkp@gmail.com', '$2y$12$FUStFETzMJLB2aER4IHWbO3RsxLnPAHhNoINl.gZuldLc92KcNCey', 3, 0, '2023-12-28', '2023-12-24 03:09:14', '2023-12-24 03:14:19', b'0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

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
(1, 'Nguyễn Trần Công Trung', '0878005489', b'1', 1, 1, '2023-11-06 09:40:25', '2023-11-06 09:40:25'),
(2, 'Nguyễn Thùy Trinh', '0896442976', b'1', 2, 2, '2023-12-24 03:17:54', '2023-12-24 03:17:54'),
(3, 'Nguyễn Anh Tuấn Ngọc', '0896442927', b'0', 3, 2, '2023-12-24 03:18:29', '2023-12-24 03:18:29');

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
  `wislist_id` int(11) DEFAULT NULL,
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
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_item_id` (`product_item_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `variation`
--
ALTER TABLE `variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD CONSTRAINT `product_configuration_ibfk_1` FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`),
  ADD CONSTRAINT `product_configuration_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `variation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
