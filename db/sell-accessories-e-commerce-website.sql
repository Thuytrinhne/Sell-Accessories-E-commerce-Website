-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 06:39 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ReportProduct` ()   BEGIN
    CREATE TEMPORARY TABLE temp_table
    AS
    SELECT product.id as idProduct, product.name_product, category.name_category, product_item.id, SUM(cart_item.quantity) AS total_quantity, SUM(cart_item.price*cart_item.quantity) AS total_revenue, count(`order`.id) as sl
    FROM `order`
    JOIN cart ON cart.id = `order`.cart_id
    JOIN cart_item ON cart_item.cart_id = cart.id
    JOIN product_item ON product_item.id = cart_item.product_item_id
    JOIN product ON product_item.product_id = product.id
    join category
    on category.id = product.category_id
  
    GROUP BY product.id,product_item.id, product.name_product;

    SELECT idProduct, name_product, name_category, SUM(total_quantity) AS total_quantity, SUM(total_revenue) AS total_revenue, sl
    FROM temp_table
    GROUP BY idProduct, name_product;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ReportProductByAllCategory` (IN `startDate` DATETIME, IN `endDate` DATETIME)   BEGIN
    CREATE TEMPORARY TABLE temp_table
    AS
    SELECT product.id as idProduct, product.name_product, category.name_category, product_item.id, SUM(cart_item.quantity) AS total_quantity, SUM(cart_item.price*cart_item.quantity) AS total_revenue, count(`order`.id) as sl
    FROM `order`
    JOIN cart ON cart.id = `order`.cart_id
    JOIN cart_item ON cart_item.cart_id = cart.id
    JOIN product_item ON product_item.id = cart_item.product_item_id
    JOIN product ON product_item.product_id = product.id
    join category
    on category.id = product.category_id
    WHERE   `order`.date_order >= startDate AND `order`.date_order <= endDate
    GROUP BY product.id,product_item.id, product.name_product;

    SELECT idProduct, name_product, name_category, SUM(total_quantity) AS total_quantity, SUM(total_revenue) AS total_revenue, sl
    FROM temp_table
    GROUP BY idProduct, name_product;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ReportProductByOneCategory` (IN `category` INT, IN `startDate` DATETIME, IN `endDate` DATETIME)   BEGIN
    CREATE TEMPORARY TABLE temp_table
    AS
    SELECT product.id as idProduct, product.name_product, category.name_category, product_item.id, SUM(cart_item.quantity) AS total_quantity, SUM(cart_item.price*cart_item.quantity) AS total_revenue, count(`order`.id) as sl
    FROM `order`
    JOIN cart ON cart.id = `order`.cart_id
    JOIN cart_item ON cart_item.cart_id = cart.id
    JOIN product_item ON product_item.id = cart_item.product_item_id
    JOIN product ON product_item.product_id = product.id
    join category
    on category.id = product.category_id
    WHERE product.category_id = category
    and  `order`.date_order >= startDate AND `order`.date_order <= endDate
    GROUP BY product.id,product_item.id, product.name_product;

    SELECT idProduct, name_product, name_category, SUM(total_quantity) AS total_quantity, SUM(total_revenue) AS total_revenue, sl
    FROM temp_table
    GROUP BY idProduct, name_product;
END$$

DELIMITER ;

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
(3, 'Tỉnh Quảng Ngãi', 'Huyện Bình Sơn', 'Xã Bình Thuận', 'nhà rj á', '2023-12-24 03:18:29', '2023-12-24 03:18:29'),
(4, 'Tỉnh Vĩnh Phúc', 'Huyện Bình Xuyên', 'Thị trấn Gia Khánh', '202 lạc long quân', '2023-12-28 07:28:56', '2023-12-28 07:28:56'),
(5, 'Tỉnh Vĩnh Phúc', 'Huyện Lập Thạch', 'Xã Đình Chu', '20', '2023-12-28 07:33:46', '2023-12-28 07:33:46');

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
(20, 2, '2023-12-30 05:30:47', '2023-12-30 05:30:47'),
(21, 2, '2023-12-30 05:31:49', '2023-12-30 05:31:49');

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
(42, 1, 20, 77, 85000, 85000, '2023-12-30 05:30:47', '2023-12-30 05:30:47'),
(43, 1, 20, 75, 56000, 56000, '2023-12-30 05:31:01', '2023-12-30 05:31:01');

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
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  `image_category` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`, `parent_id`, `created_at`, `updated_at`, `deleted`, `image_category`) VALUES
(69, 'Balo & Túi xách, Ví tiền', NULL, '2023-12-29 16:05:12', '2023-12-30 04:32:09', b'0', 'http://127.0.0.1:8000/Category_images/1703910729.jpg'),
(70, 'Phụ kiện tóc & Máy làm tóc', NULL, '2023-12-29 16:06:22', '2023-12-29 16:06:22', b'0', 'http://127.0.0.1:8000/Category_images/1703865982.jpg'),
(71, 'Quạt cầm tay & Đồ điện dụng', NULL, '2023-12-29 16:08:04', '2023-12-29 16:08:04', b'0', 'http://127.0.0.1:8000/Category_images/1703866084.jpg'),
(72, 'Dụng cụ học tập', NULL, '2023-12-29 16:08:24', '2023-12-29 16:08:24', b'0', 'http://127.0.0.1:8000/Category_images/1703866104.jpg'),
(73, 'Đồ chơi', NULL, '2023-12-29 16:09:29', '2023-12-29 16:09:29', b'0', 'http://127.0.0.1:8000/Category_images/1703866169.jpg'),
(74, 'Bình giữ nhiệt & Ly', NULL, '2023-12-29 16:10:05', '2023-12-29 16:10:05', b'0', 'http://127.0.0.1:8000/Category_images/1703866205.jpg'),
(75, 'Túi xách', 69, '2023-12-29 16:11:57', '2023-12-29 16:11:57', b'0', 'http://127.0.0.1:8000/Category_images/1703866317.jpg'),
(76, 'Túi đa năng', 69, '2023-12-29 16:12:33', '2023-12-29 16:12:33', b'0', 'http://127.0.0.1:8000/Category_images/1703866353.jpg'),
(77, 'Túi đựng laptop', 69, '2023-12-29 16:13:36', '2023-12-29 16:13:36', b'0', 'http://127.0.0.1:8000/Category_images/1703866416.jpg'),
(78, 'Cài tóc', 70, '2023-12-29 16:14:26', '2023-12-29 16:14:26', b'0', 'http://127.0.0.1:8000/Category_images/1703866466.jpg'),
(79, 'Cột tóc', 70, '2023-12-29 16:15:17', '2023-12-29 16:15:17', b'0', 'http://127.0.0.1:8000/Category_images/1703866517.jpg'),
(80, 'Kẹp tóc', 70, '2023-12-29 16:21:16', '2023-12-29 16:21:16', b'0', 'http://127.0.0.1:8000/Category_images/1703866876.jpg'),
(81, 'Quạt cầm tay mini', 71, '2023-12-30 04:21:28', '2023-12-30 04:21:28', b'0', 'http://127.0.0.1:8000/Category_images/1703910088.jpg'),
(82, 'Quạt giấy', 71, '2023-12-30 04:22:33', '2023-12-30 04:22:33', b'0', 'http://127.0.0.1:8000/Category_images/1703910153.jpg'),
(83, 'Bút chì', 72, '2023-12-30 04:23:18', '2023-12-30 04:23:18', b'0', 'http://127.0.0.1:8000/Category_images/1703910198.jpg'),
(85, 'Lego', 73, '2023-12-30 04:25:18', '2023-12-30 04:25:18', b'0', 'http://127.0.0.1:8000/Category_images/1703910318.jpg'),
(86, 'Ly thủy tinh', 74, '2023-12-30 04:25:53', '2023-12-30 04:25:53', b'0', 'http://127.0.0.1:8000/Category_images/1703910353.jpg'),
(87, 'Thước', 72, '2023-12-30 04:39:08', '2023-12-30 04:39:08', b'0', 'http://127.0.0.1:8000/Category_images/1703911148.jpg'),
(88, 'Ví', 69, '2023-12-30 04:54:56', '2023-12-30 04:54:56', b'0', 'http://127.0.0.1:8000/Category_images/1703912096.jpg');

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
  `date_order` datetime DEFAULT current_timestamp(),
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
(27, '2023-12-30 12:31:49', 176000, 3, 2, 1, 35000, 2, '2024-01-06 12:31:49', 'dễ vỡ', 20, '2023-12-30 05:31:49', '2023-12-30 05:32:41');

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
(1, 'Thanh toán khi nhận hàng', '2023-11-06 09:35:48', '2023-11-06 09:35:48'),
(2, 'Thanh toán với VN PAY', '2023-12-27 02:33:30', '2023-12-27 02:33:30');

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
(109, 'Lego con mèo', 'xinh lắm nhá', 85, '2023-12-29 17:35:14', '2023-12-30 04:53:08', b'0', 'http://127.0.0.1:8000/Product_item_images/1703911988.jpg'),
(110, 'Kẹp tóc nơ xinh', NULL, 79, '2023-12-29 17:46:58', '2023-12-30 04:42:17', b'0', 'http://127.0.0.1:8000/Product_item_images/1703911337.jpg'),
(113, 'Ví đựng tiền', NULL, 88, '2023-12-30 04:55:12', '2023-12-30 04:55:12', b'0', 'http://127.0.0.1:8000/Product_images/1703912112.jpg'),
(114, 'Lược gỡ rối tóc', NULL, 78, '2023-12-30 05:15:34', '2023-12-30 05:15:34', b'0', 'http://127.0.0.1:8000/Product_images/1703913334.jpg'),
(115, 'Túi xách', NULL, 75, '2023-12-30 05:17:41', '2023-12-30 05:17:41', b'0', 'http://127.0.0.1:8000/Product_images/1703913461.jpg'),
(116, 'Túi xách sarino', NULL, 75, '2023-12-30 05:19:38', '2023-12-30 05:19:38', b'0', 'http://127.0.0.1:8000/Product_images/1703913578.jpg'),
(117, 'Ly thủy tinh hologram', NULL, 86, '2023-12-30 05:21:46', '2023-12-30 05:21:46', b'0', 'http://127.0.0.1:8000/Product_images/1703913706.jpg');

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
(64, 31, '2023-12-30 04:58:44', '2023-12-30 04:58:44', 13, NULL, '#ffff00'),
(65, 32, '2023-12-30 05:02:11', '2023-12-30 05:13:34', 14, NULL, '#000000'),
(67, 34, '2023-12-30 05:08:44', '2023-12-30 05:13:45', 16, NULL, '#000000'),
(68, 35, '2023-12-30 05:09:10', '2023-12-30 05:09:10', 17, NULL, '#000000'),
(69, 36, '2023-12-30 05:09:41', '2023-12-30 05:09:41', 18, NULL, '#ffa6a6'),
(70, 37, '2023-12-30 05:10:29', '2023-12-30 05:10:29', 19, NULL, '#ffaaaa'),
(71, 38, '2023-12-30 05:16:25', '2023-12-30 05:16:25', 20, NULL, '#ff9f9f'),
(72, 39, '2023-12-30 05:17:04', '2023-12-30 05:17:04', 21, NULL, '#8080ff'),
(73, 40, '2023-12-30 05:18:31', '2023-12-30 05:18:31', 22, NULL, '#fbca59'),
(74, 41, '2023-12-30 05:19:01', '2023-12-30 05:19:01', 23, NULL, '#ffffff'),
(75, 42, '2023-12-30 05:20:22', '2023-12-30 05:20:22', 24, NULL, '#8080ff'),
(76, 43, '2023-12-30 05:20:46', '2023-12-30 05:20:46', 25, NULL, '#ff8080'),
(77, 44, '2023-12-30 05:22:19', '2023-12-30 05:22:19', 26, NULL, '1'),
(78, 45, '2023-12-30 05:22:54', '2023-12-30 05:22:54', 27, NULL, '2');

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
(64, 109, 50000, 256, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703912324.jpg', 20000, b'1', '2023-12-30 04:58:44', '2023-12-30 04:58:44', b'0'),
(65, 110, 25000, 256, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703912531.jpg', 20000, b'1', '2023-12-30 05:02:11', '2023-12-30 05:02:11', b'0'),
(67, 113, 115000, 254, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703913259.jpg', 115000, b'1', '2023-12-30 05:08:44', '2023-12-30 05:14:19', b'0'),
(68, 113, 115000, 586, '67YHJ', 'http://127.0.0.1:8000/Product_item_images/1703912950.jpg', 115000, b'1', '2023-12-30 05:09:10', '2023-12-30 05:09:10', b'0'),
(69, 113, 115000, 256, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703912981.jpg', 115000, b'1', '2023-12-30 05:09:41', '2023-12-30 05:09:41', b'0'),
(70, 110, 25000, 256, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703913029.jpg', 20000, b'1', '2023-12-30 05:10:29', '2023-12-30 05:10:29', b'0'),
(71, 114, 55000, 55000, '67YHJ', 'http://127.0.0.1:8000/Product_item_images/1703913385.jpg', 55000, b'1', '2023-12-30 05:16:25', '2023-12-30 05:16:25', b'0'),
(72, 114, 55000, 55000, '67YHJ', 'http://127.0.0.1:8000/Product_item_images/1703913424.jpg', 55000, b'1', '2023-12-30 05:17:04', '2023-12-30 05:17:04', b'0'),
(73, 115, 185000, 25, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703913511.jpg', 185000, b'1', '2023-12-30 05:18:31', '2023-12-30 05:18:31', b'0'),
(74, 115, 185000, 56, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703913541.jpg', 185000, b'1', '2023-12-30 05:19:01', '2023-12-30 05:19:01', b'0'),
(75, 116, 56000, 256, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703913622.jpg', 50000, b'1', '2023-12-30 05:20:22', '2023-12-30 05:20:22', b'0'),
(76, 116, 56000, 562, '78NHJ', 'http://127.0.0.1:8000/Product_item_images/1703913646.jpg', 56000, b'1', '2023-12-30 05:20:46', '2023-12-30 05:20:46', b'0'),
(77, 117, 85000, 844, '67YHJ', 'http://127.0.0.1:8000/Product_item_images/1703913739.jpg', 80000, b'1', '2023-12-30 05:22:19', '2023-12-30 05:22:19', b'0'),
(78, 117, 85000, 123, '67YHJ', 'http://127.0.0.1:8000/Product_item_images/1703913774.jpg', 80000, b'1', '2023-12-30 05:22:54', '2023-12-30 05:23:11', b'0');

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
(2, 'Nguyễn Thùy Trinh', '0389183497', 'mongthitrinhtkp@gmail.com', '$2y$12$FUStFETzMJLB2aER4IHWbO3RsxLnPAHhNoINl.gZuldLc92KcNCey', 3, 0, '2023-12-28', '2023-12-24 03:09:14', '2023-12-24 03:14:19', b'0', NULL);

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
(3, 'Nguyễn Anh Tuấn Ngọc', '0896442927', b'0', 3, 2, '2023-12-24 03:18:29', '2023-12-24 03:18:29'),
(5, 'Nguyễn Thị Thùy Trinh', '+84389183498', b'1', 5, 2, '2023-12-28 07:33:46', '2023-12-28 07:33:46');

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
(2, 'size', '2023-11-06 09:40:45', '2023-11-06 09:40:45'),
(28, 'size', '2023-12-29 17:47:19', '2023-12-29 17:47:19'),
(29, 'size', '2023-12-29 20:35:05', '2023-12-29 20:35:05'),
(30, 'màu', '2023-12-30 02:32:16', '2023-12-30 02:32:16'),
(31, 'màu', '2023-12-30 04:58:44', '2023-12-30 04:58:44'),
(32, 'màu', '2023-12-30 05:02:11', '2023-12-30 05:02:11'),
(33, 'màu', '2023-12-30 05:04:36', '2023-12-30 05:04:36'),
(34, 'màu', '2023-12-30 05:08:44', '2023-12-30 05:08:44'),
(35, 'màu', '2023-12-30 05:09:10', '2023-12-30 05:09:10'),
(36, 'màu', '2023-12-30 05:09:41', '2023-12-30 05:09:41'),
(37, 'màu', '2023-12-30 05:10:29', '2023-12-30 05:10:29'),
(38, 'màu', '2023-12-30 05:16:25', '2023-12-30 05:16:25'),
(39, 'màu', '2023-12-30 05:17:04', '2023-12-30 05:17:04'),
(40, 'màu', '2023-12-30 05:18:31', '2023-12-30 05:18:31'),
(41, 'màu', '2023-12-30 05:19:01', '2023-12-30 05:19:01'),
(42, 'màu', '2023-12-30 05:20:22', '2023-12-30 05:20:22'),
(43, 'màu', '2023-12-30 05:20:46', '2023-12-30 05:20:46'),
(44, 'size', '2023-12-30 05:22:19', '2023-12-30 05:22:19'),
(45, 'size', '2023-12-30 05:22:54', '2023-12-30 05:22:54');

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
(1, 1, '2023-11-06 09:44:35', '2023-11-06 09:44:35'),
(2, 2, '2023-12-24 06:38:54', '2023-12-24 06:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_item`
--

CREATE TABLE `wishlist_item` (
  `id` int(11) NOT NULL,
  `wishlist_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT -1,
  `product_item_id` int(11) DEFAULT -1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist_item`
--

INSERT INTO `wishlist_item` (`id`, `wishlist_id`, `product_id`, `product_item_id`, `created_at`, `updated_at`) VALUES
(29, 2, 117, -1, '2023-12-30 05:37:01', '2023-12-30 05:37:01');

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
  ADD KEY `whislist_id` (`wishlist_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_item_id` (`product_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `product_configuration`
--
ALTER TABLE `product_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `variation`
--
ALTER TABLE `variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist_item`
--
ALTER TABLE `wishlist_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
