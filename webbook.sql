-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2023 lúc 08:05 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Cate 1', NULL, 'cate-1', '2023-10-31 22:33:36', '2023-11-01 20:30:49'),
(2, 'Cate 2', NULL, 'cate-2', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(3, 'Cate 3', NULL, 'cate-3', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(4, 'Cate 4', NULL, 'cate-4', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(5, 'Cate 5', NULL, 'cate-5', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(6, 'Cate 6', NULL, 'cate-6', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(7, 'Cate 7', NULL, 'cate-7', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(8, 'Cate 8', NULL, 'cate-8', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(9, 'Cate 9', NULL, 'cate-9', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(10, 'Cate 10', NULL, 'cate-10', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(11, 'Cate 11', NULL, 'cate-11', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(12, 'Cate 12', NULL, 'cate-12', '2023-10-31 22:33:36', '2023-11-01 22:33:36'),
(13, 'Cate 1.1', 1, 'cate-1-1', '2023-10-31 22:34:02', '2023-11-01 22:34:02'),
(14, 'Cate 1.2', 2, 'cate-1-2', '2023-10-31 22:34:02', '2023-11-01 22:34:02'),
(15, 'Cate 1.3', 1, 'cate-1-3', '2023-10-31 22:34:02', '2023-11-01 22:34:02'),
(16, 'Cate 1.4', 1, 'cate-1-4', '2023-10-31 22:34:02', '2023-11-01 22:34:02'),
(17, 'Cate 1.1.1', 13, 'cate-1-5', '2023-10-31 22:34:02', '2023-11-01 22:34:02'),
(18, 'Cate 1.1.2', 13, 'cate-1-6', '2023-10-31 22:34:02', '2023-10-31 22:34:02'),
(19, 'Cate 1.2.1', 14, 'cate-1-1-1', '2023-10-31 22:34:02', '2023-10-31 22:34:02'),
(20, 'Cate 1.2.2', 14, 'cate-1-1-2', '2023-10-31 22:34:02', '2023-10-31 22:34:02'),
(21, 'Cate 1.3.1', 15, 'cate-1-1-3', '2023-10-31 22:34:02', '2023-10-31 22:34:02'),
(22, 'Cate 1.3.2', 15, 'cate-1-1-4', '2023-10-31 22:34:02', '2023-10-31 22:34:02'),
(23, 'Cate 1.4.1', 16, 'cate-1-1-5', '2023-10-31 22:34:02', '2023-10-31 22:34:02'),
(24, 'Cate 1.4.2', 16, 'cate-1-1-6', '2023-10-31 22:34:02', '2023-10-31 22:34:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `used` varchar(255) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `price`, `used`, `start`, `end`, `status`, `created_at`, `updated_at`) VALUES
(1, 'giam20k', 20000, '', '2023-09-17', '2023-12-17', 0, '2023-11-02 09:21:50', '2023-11-02 02:19:51'),
(2, 'giam10k', 10000, '', '2023-03-28', '2023-04-09', 1, '2023-11-01 03:34:10', '2023-11-03 03:34:10'),
(3, 'giam30k', 30000, ',5', '2023-03-30', '2023-06-20', 0, '2023-11-02 01:13:19', '2023-10-31 21:54:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageDefault` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `imageDefault`, `image`, `created_at`, `updated_at`) VALUES
(1, '6459c3db8d1c5_1683604443.jpg', NULL, '2023-02-11 21:12:48', '2023-05-08 20:54:03'),
(2, '6459c3d03a91d_1683604432.jpg', NULL, '2023-04-01 00:33:18', '2023-05-08 20:53:52'),
(3, '6459c28e7a9a0_1683604110.jpg', NULL, '2023-05-08 20:48:31', '2023-05-08 20:48:31'),
(4, '6459c30d30d30_1683604237.jpg', '645f3ba31aeb0_1683962787.jpg|645f3ba43df35_1683962788.jpg', '2023-05-08 20:50:37', '2023-05-13 00:26:28'),
(5, '6459c349da48b_1683604297.jpg', NULL, '2023-05-08 20:51:37', '2023-05-08 20:51:37'),
(6, '6459c4264ec02_1683604518.jpg', NULL, '2023-05-08 20:55:18', '2023-05-08 20:55:18'),
(7, '655824252816c_1700275237.jpg', '6558242592a78_1700275237.jpg|65582425a55ea_1700275237.jpg|65582425b83f8_1700275237.jpg|65582425cb9c1_1700275237.jpg|65582425de2de_1700275237.jpg', '2023-11-17 19:40:37', '2023-11-17 19:40:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2022_12_29_074659_create_products_table', 1),
(19, '2022_12_29_080139_create_categories_table', 1),
(20, '2022_12_29_080511_create_galleries_table', 1),
(21, '2022_12_29_081456_create_orders_table', 1),
(22, '2022_12_29_081601_create_order_details_table', 1),
(23, '2022_12_29_082323_create_discounts_table', 1),
(24, '2022_12_29_082553_create_sliders_table', 1),
(25, '2022_12_29_083450_create_order_customers_table', 1),
(26, '2023_02_12_040238_create_product_infos_table', 1),
(27, '2023_05_27_061648_create_roles_table', 2),
(28, '2023_05_27_061753_create_permissions_table', 2),
(29, '2023_05_27_062121_create_table_user_role', 2),
(30, '2023_05_27_062210_create_table_permission_role', 2),
(31, '2023_06_10_095823_create_wishlists_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cusId` bigint(20) UNSIGNED NOT NULL,
  `discountId` bigint(20) UNSIGNED DEFAULT NULL,
  `totalPrice` double NOT NULL,
  `debt` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `payment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `cusId`, `discountId`, `totalPrice`, `debt`, `status`, `payment`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 50000, 0, 2, 1, '2023-10-31 17:00:00', '2023-11-01 00:12:05'),
(2, 2, NULL, 700000, 700000, 1, 0, '2023-11-01 05:16:35', '2023-11-17 02:20:38'),
(3, 3, NULL, 800000, 0, 3, 1, '2023-10-31 22:44:27', '2023-10-31 22:45:54'),
(4, 4, NULL, 400000, 0, 2, 1, '2023-10-31 20:20:30', '2023-10-31 20:20:30'),
(5, 5, NULL, 500000, 0, 2, 1, '2023-07-31 18:43:48', '2023-10-31 18:43:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_customers`
--

CREATE TABLE `order_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_customers`
--

INSERT INTO `order_customers` (`id`, `userId`, `name`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(1, 5, 'canh 123', '0123456789', '123, ABC', '12h tối', '2023-11-01 00:12:05', '2023-11-17 02:20:24'),
(2, 5, 'canh mua hang', '0123456789', '123, ABC', 'baka baka', '2023-10-01 05:16:35', '2023-11-17 02:20:38'),
(3, 5, 'canhpro', '0123456789', '123, ABC', NULL, '2023-10-31 22:44:27', '2023-11-17 02:20:49'),
(4, 5, 'canhhd', '0123456789', '123sasa', NULL, '2023-10-31 20:20:30', '2023-11-17 02:20:58'),
(5, 5, 'user1', '0123456789', '123 qqqqq', NULL, '2023-10-31 18:43:48', '2023-11-08 18:43:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` bigint(20) UNSIGNED NOT NULL,
  `proId` bigint(20) UNSIGNED NOT NULL,
  `qtyBuy` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `proId`, `qtyBuy`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 50000, '2023-11-01 00:12:05', '2023-11-02 00:12:05'),
(2, 2, 5, 1, 300000, '2023-11-01 05:16:35', '2023-11-01 05:16:35'),
(3, 2, 4, 1, 400000, '2023-11-01 05:16:35', '2023-11-01 05:16:35'),
(4, 3, 4, 2, 400000, '2023-10-31 22:44:27', '2023-10-31 22:44:27'),
(5, 4, 4, 1, 400000, '2023-10-31 20:20:30', '2023-10-31 20:20:30'),
(6, 5, 1, 1, 500000, '2023-10-31 18:43:48', '2023-10-31 18:43:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `key_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `parent_id`, `key_code`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'Tổng quan', NULL, NULL, '2023-05-27 22:17:42', '2023-05-27 22:17:42'),
(2, 'list', 'list', 1, 'list_dashboard', '2023-05-27 22:17:42', '2023-05-27 22:17:42'),
(3, 'add', 'add', 1, 'add_dashboard', '2023-05-27 22:17:42', '2023-05-27 22:17:42'),
(4, 'edit', 'edit', 1, 'edit_dashboard', '2023-05-27 22:17:42', '2023-05-27 22:17:42'),
(5, 'delete', 'delete', 1, 'delete_dashboard', '2023-05-27 22:17:42', '2023-05-27 22:17:42'),
(6, 'category', 'Thể loại', NULL, NULL, '2023-05-27 22:18:21', '2023-05-27 22:18:21'),
(7, 'list', 'list', 6, 'list_category', '2023-05-27 22:18:21', '2023-05-27 22:18:21'),
(8, 'add', 'add', 6, 'add_category', '2023-05-27 22:18:21', '2023-05-27 22:18:21'),
(9, 'edit', 'edit', 6, 'edit_category', '2023-05-27 22:18:21', '2023-05-27 22:18:21'),
(10, 'delete', 'delete', 6, 'delete_category', '2023-05-27 22:18:21', '2023-05-27 22:18:21'),
(11, 'product', 'Sản phẩm', NULL, NULL, '2023-05-27 22:18:24', '2023-05-27 22:18:24'),
(12, 'list', 'list', 11, 'list_product', '2023-05-27 22:18:24', '2023-05-27 22:18:24'),
(13, 'add', 'add', 11, 'add_product', '2023-05-27 22:18:24', '2023-05-27 22:18:24'),
(14, 'edit', 'edit', 11, 'edit_product', '2023-05-27 22:18:24', '2023-05-27 22:18:24'),
(15, 'delete', 'delete', 11, 'delete_product', '2023-05-27 22:18:24', '2023-05-27 22:18:24'),
(16, 'order', 'Đơn hàng', NULL, NULL, '2023-05-27 22:18:26', '2023-05-27 22:18:26'),
(17, 'list', 'list', 16, 'list_order', '2023-05-27 22:18:26', '2023-05-27 22:18:26'),
(18, 'add', 'add', 16, 'add_order', '2023-05-27 22:18:26', '2023-05-27 22:18:26'),
(19, 'edit', 'edit', 16, 'edit_order', '2023-05-27 22:18:26', '2023-05-27 22:18:26'),
(20, 'delete', 'delete', 16, 'delete_order', '2023-05-27 22:18:26', '2023-05-27 22:18:26'),
(21, 'discount', 'Mã giảm giá', NULL, NULL, '2023-05-27 22:18:30', '2023-05-27 22:18:30'),
(22, 'list', 'list', 21, 'list_discount', '2023-05-27 22:18:30', '2023-05-27 22:18:30'),
(23, 'add', 'add', 21, 'add_discount', '2023-05-27 22:18:30', '2023-05-27 22:18:30'),
(24, 'edit', 'edit', 21, 'edit_discount', '2023-05-27 22:18:30', '2023-05-27 22:18:30'),
(25, 'delete', 'delete', 21, 'delete_discount', '2023-05-27 22:18:30', '2023-05-27 22:18:30'),
(26, 'slider', 'Slider', NULL, NULL, '2023-05-27 22:18:33', '2023-05-27 22:18:33'),
(27, 'list', 'list', 26, 'list_slider', '2023-05-27 22:18:33', '2023-05-27 22:18:33'),
(28, 'add', 'add', 26, 'add_slider', '2023-05-27 22:18:33', '2023-05-27 22:18:33'),
(29, 'edit', 'edit', 26, 'edit_slider', '2023-05-27 22:18:33', '2023-05-27 22:18:33'),
(30, 'delete', 'delete', 26, 'delete_slider', '2023-05-27 22:18:33', '2023-05-27 22:18:33'),
(31, 'user', 'Tài khoản', NULL, NULL, '2023-05-27 22:18:37', '2023-05-27 22:18:37'),
(32, 'list', 'list', 31, 'list_user', '2023-05-27 22:18:37', '2023-05-27 22:18:37'),
(33, 'add', 'add', 31, 'add_user', '2023-05-27 22:18:37', '2023-05-27 22:18:37'),
(34, 'edit', 'edit', 31, 'edit_user', '2023-05-27 22:18:37', '2023-05-27 22:18:37'),
(35, 'delete', 'delete', 31, 'delete_user', '2023-05-27 22:18:37', '2023-05-27 22:18:37'),
(36, 'role', 'Tài khoản (Phân Quyền)', NULL, NULL, '2023-05-28 22:52:42', '2023-05-28 22:52:42'),
(37, 'list', 'list', 36, 'list_role', '2023-05-28 22:52:42', '2023-05-28 22:52:42'),
(38, 'add', 'add', 36, 'add_role', '2023-05-28 22:52:42', '2023-05-28 22:52:42'),
(39, 'edit', 'edit', 36, 'edit_role', '2023-05-28 22:52:42', '2023-05-28 22:52:42'),
(40, 'delete', 'delete', 36, 'delete_role', '2023-05-28 22:52:42', '2023-05-28 22:52:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(6, 1, 7, '2023-05-28 01:56:01', '2023-05-28 01:56:01'),
(7, 1, 8, '2023-05-28 02:02:28', '2023-05-28 02:02:28'),
(8, 1, 9, '2023-05-28 02:02:28', '2023-05-28 02:02:28'),
(9, 1, 10, '2023-05-28 02:02:28', '2023-05-28 02:02:28'),
(10, 1, 12, '2023-05-28 22:26:23', '2023-05-28 22:26:23'),
(12, 1, 17, '2023-05-28 22:34:47', '2023-05-28 22:34:47'),
(14, 1, 22, '2023-05-28 22:39:56', '2023-05-28 22:39:56'),
(15, 1, 27, '2023-05-28 22:43:42', '2023-05-28 22:43:42'),
(16, 1, 32, '2023-05-28 22:47:54', '2023-05-28 22:47:54'),
(17, 1, 37, '2023-05-28 22:56:07', '2023-05-28 22:56:07'),
(18, 1, 2, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(19, 1, 3, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(20, 1, 4, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(21, 1, 5, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(22, 1, 13, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(23, 1, 14, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(24, 1, 15, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(25, 1, 18, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(26, 1, 19, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(27, 1, 20, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(28, 1, 23, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(29, 1, 24, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(30, 1, 25, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(31, 1, 28, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(32, 1, 29, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(33, 1, 30, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(34, 1, 33, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(35, 1, 34, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(36, 1, 35, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(37, 1, 38, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(38, 1, 39, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(39, 1, 40, '2023-05-28 22:56:25', '2023-05-28 22:56:25'),
(40, 3, 2, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(41, 3, 3, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(42, 3, 4, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(43, 3, 5, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(44, 3, 7, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(45, 3, 8, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(46, 3, 9, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(47, 3, 10, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(48, 3, 12, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(49, 3, 13, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(50, 3, 14, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(51, 3, 15, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(52, 3, 17, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(53, 3, 18, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(54, 3, 19, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(55, 3, 20, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(56, 3, 22, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(57, 3, 23, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(58, 3, 24, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(59, 3, 25, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(60, 3, 27, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(61, 3, 28, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(62, 3, 29, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(63, 3, 30, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(64, 3, 32, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(65, 3, 33, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(66, 3, 34, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(67, 3, 35, '2023-05-28 23:03:14', '2023-05-28 23:03:14'),
(68, 4, 12, '2023-05-28 23:03:26', '2023-05-28 23:03:26'),
(72, 4, 2, '2023-05-29 00:13:12', '2023-05-29 00:13:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cateId` bigint(20) UNSIGNED NOT NULL,
  `productInfoId` bigint(20) UNSIGNED NOT NULL,
  `galleryId` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `priceOld` double NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `cateId`, `productInfoId`, `galleryId`, `price`, `priceOld`, `description`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sản Phẩm 1', 'san-pham-1', 13, 1, 1, 500000, 0, 'pro 1', 11, 0, '2023-02-11 21:12:48', '2023-06-23 18:43:48'),
(2, 'Sản Phẩm 2', 'san-pham-2', 3, 2, 2, 50000, 0, 'pro 2', 10, 0, '2023-04-01 00:33:18', '2023-05-15 06:34:24'),
(3, 'sản phẩm 3', 'san-pham-3', 17, 3, 3, 200000, 0, 'sản phẩm 3', 4, 0, '2023-05-08 20:48:31', '2023-05-15 06:34:24'),
(4, 'sản phẩm 4', 'san-pham-4', 4, 4, 4, 400000, 500000, '<p><strong>Đã bao giờ các bạn nhỏ gặp phải tình huống bạn bè, người thân ho ốm hay bản thân phải vật lộn cùng cơn đau bụng khi vắng mặt bố mẹ?</strong></p>\r\n\r\n<p>Dù bạn nhỏ tò mò về công việc của bác sĩ hay muốn tự chăm sóc bản thân, giúp đỡ mọi người, cuốn sách này sẽ hỗ trợ ít nhiều. Làm sao để xì mũi đúng cách? Viêm amidan có được ăn kem không? Bị lây chấy phải làm gì? Tại sao cần uống đủ nước? Xử trí nhiệt miệng thế nào?</p>\r\n\r\n<p>Hơn hết, Sổ tay bác sĩ nhí cung cấp những thông tin về các bệnh thường gặp, giúp độc giả nhí tự trang bị kiến thức để từ đó hiểu về cơ thể, chủ động hợp tác với bố mẹ và bác sĩ để cùng chăm sóc sức khoẻ. Xen kẽ thông tin khoa học là những minh hoạ hài hước, sinh động, cùng lối truyền tải đối thoại thân thiện, chắc chắn độc giả nhí sẽ không thể rời mắt khỏi cuốn sách dù chỉ một giây.</p>', 11, 0, '2023-05-08 20:50:37', '2023-06-22 20:20:30'),
(5, 'sản phẩm 5', 'san-pham-5', 4, 5, 5, 300000, 0, 'sản phẩm 5', 16, 0, '2023-05-08 20:51:37', '2023-06-09 05:16:35'),
(6, 'sản phẩm 6', 'san-pham-6', 1, 6, 6, 250000, 300000, 'sản phẩm 6', 14, 0, '2023-05-08 20:55:18', '2023-05-15 06:34:24'),
(7, 'Trạm Tín Hiệu Số 23 - Hugh Howey', '', 1, 7, 7, 75000, 0, 'GIỚI THIỆU NỘI DUNG:\r\n\r\nTừ ngàn xưa, khi nhân loại bắt đầu biết giương buồm chinh phục biển lớn, đã bao con người ngày đêm túc trực những ngọn hải đăng để đảm bảo an nguy cho tàu bè qua lại. Những người gác hải đăng phải sống rất cô đơn, thậm chí không mấy ai biết họ tồn tại. Trừ khi có chuyện xảy ra. Trừ khi có tàu gặp nạn.\r\n\r\nSang thế kỷ 23, con người hướng mắt về những vì sao, và vũ trụ trở thành đại dương mới. Khắp dải Ngân Hà, một mạng lưới những trạm tín hiệu được thiết lập, giúp các chuyến tàu với tốc độ gấp nhiều lần vận tốc ánh sáng quá cảnh an toàn. Mọi trạm tín hiệu đều rất tối tân. Chúng không bao giờ hỏng. Không bao giờ sập.\r\n\r\nRiêng Trạm tín hiệu số 23 thì...\r\n\r\n***\r\n\r\nTÌNH TRẠNG SÁCH:\r\n\r\nSách thật, mới 100%.\r\nKHÔNG bị rách nát, nhàu nhĩ, viết vẽ bậy, hay mất trang.', 5, 0, '2023-11-17 19:40:37', '2023-11-17 19:40:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_infos`
--

CREATE TABLE `product_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namePublishing` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `translator` varchar(255) NOT NULL,
  `publishing` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `page` int(11) NOT NULL,
  `formality` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_infos`
--

INSERT INTO `product_infos` (`id`, `namePublishing`, `author`, `translator`, `publishing`, `year`, `weight`, `size`, `page`, `formality`, `created_at`, `updated_at`) VALUES
(1, 'asa', 'sasa', 'sa', 'sas', 1999, 13, '12', 12, 'bìa cứng', '2023-02-11 21:12:47', '2023-02-11 21:12:47'),
(2, 'kim đồng', 'chung quy', 'vinh pi', 'kim đồng', 1999, 10, '12x20', 36, 'bìa cứng', '2023-04-01 00:33:17', '2023-04-01 00:33:17'),
(3, 'sản phẩm 3', 'sản phẩm 3', 'sản phẩm 3', 'sản phẩm 3', 1999, 19, '12x12', 16, 'sản phẩm 3', '2023-05-08 20:48:30', '2023-05-08 20:48:30'),
(4, 'SAN HÔ', 'Marta Matus', 'tiếng việt', 'NXB Thanh Niên', 2022, 500, '20.5 x 26 cm', 80, 'bìa cứng', '2023-05-08 20:50:37', '2023-05-08 20:50:37'),
(5, 'sản phẩm 5', 'sản phẩm 5', 'sản phẩm 5', 'sản phẩm 5', 2013, 15, '12x12', 18, 'sản phẩm 5', '2023-05-08 20:51:37', '2023-05-08 20:51:37'),
(6, 'sản phẩm 6', 'sản phẩm 6', 'sản phẩm 6', 'sản phẩm 6', 1999, 12, '12x12', 14, 'sản phẩm 6', '2023-05-08 20:55:18', '2023-05-08 20:55:18'),
(7, 'Tiểu thuyết và thơ Tiếng Việt', 'Hugh Howey', 'Nguyễn Đức Cảnh', 'Kim Đồng', 2023, 50, '50', 1000, '123', '2023-11-17 19:40:37', '2023-11-17 19:40:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị viên', NULL, NULL),
(2, 'guset', 'Khách hàng', NULL, NULL),
(3, 'developer', 'Phát triển hệ thống', NULL, NULL),
(4, 'content', 'Chỉnh sửa nội dung', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `desc`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khởi Màu <br>Sáng Tạo', '<span class=\"sale1\">-20%</span>\r\n<span class=\"sale2\">\r\n   <strong>80.000</strong> 60.000\r\n</span>', '65583417beefb_1700279319.jpg', NULL, 0, '2023-05-12 22:37:14', '2023-11-17 20:48:40'),
(2, 'Tự Làm <br>cho Ban', '<span class=\"sale1\">-20%</span>\r\n<span class=\"sale2\">\r\n   <strong>80.000</strong> 60.000\r\n</span>', '65583442340fa_1700279362.jpg', NULL, 0, '2023-05-12 23:00:53', '2023-11-17 20:49:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '01234567878', 'ABC, 123', '$2y$10$f9T36WpzK80pllMnookQ0eGbOpy5/ri6Dmgsx2PN2z80FJC2JZ68q', NULL, '2023-03-27 01:02:51', '2023-11-17 02:17:42'),
(2, 'Cảnh Content', 'user@gmail.com', '0883654219', 'ABC, 123', '$2y$10$f9T36WpzK80pllMnookQ0eGbOpy5/ri6Dmgsx2PN2z80FJC2JZ68q', NULL, '2023-03-27 01:03:53', '2023-11-17 02:17:55'),
(3, 'Cảnh developer', 'user2@gmail.com', '01234567878', 'ABC, 123', '$2y$10$f9T36WpzK80pllMnookQ0eGbOpy5/ri6Dmgsx2PN2z80FJC2JZ68q', NULL, '2023-05-27 00:32:44', '2023-11-17 02:18:05'),
(4, 'shopdemo', 'aa123@gmail.com', '01234567878', 'ABC, 123ABC, 123', '$2y$10$f9T36WpzK80pllMnookQ0eGbOpy5/ri6Dmgsx2PN2z80FJC2JZ68q', NULL, '2023-05-27 00:34:55', '2023-05-27 00:34:55'),
(5, 'Cảnh Pro', 'user1@gmail.com', '01234567878', 'ABC, 123', '$2y$10$U9dirDfsJcK0RG/6Xph5vuM2WHB4o16ByAEVJ//HRqBjDW0sfWN.y', NULL, '2023-05-31 00:49:39', '2023-11-17 02:18:20'),
(6, 'canhpro123', 'admin@example.com', '', NULL, '$2y$10$k8/2G7T6tKUxch5LclTu8eps4EQrwrh69nbFlY2wEUMzU3pV3P4eK', NULL, '2023-11-16 22:26:11', '2023-11-16 22:26:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '2023-05-27 20:25:23', '2023-05-27 20:25:23'),
(6, 3, 3, '2023-05-28 23:52:51', '2023-05-28 23:52:51'),
(7, 4, 2, '2023-05-28 23:54:02', '2023-05-28 23:54:02'),
(9, 5, 2, '2023-05-31 00:49:39', '2023-05-31 00:49:39'),
(10, 2, 4, '2023-06-16 22:48:13', '2023-06-16 22:48:13'),
(11, 6, 1, '2023-11-16 22:26:11', '2023-11-16 22:26:11'),
(12, 2, 3, '2023-11-16 22:28:04', '2023-11-16 22:28:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `pro_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 4, 5, '2023-06-10 03:53:32', '2023-06-10 03:53:32'),
(12, 6, 6, '2023-11-17 19:36:05', '2023-11-17 19:36:05');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cusId` (`cusId`),
  ADD UNIQUE KEY `discountId` (`discountId`);

--
-- Chỉ mục cho bảng `order_customers`
--
ALTER TABLE `order_customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`,`proId`),
  ADD KEY `proId` (`proId`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_id` (`role_id`,`permission_id`),
  ADD KEY `permission_role_ibfk_1` (`permission_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cateId` (`cateId`,`productInfoId`,`galleryId`),
  ADD KEY `productInfoId` (`productInfoId`),
  ADD KEY `galleryId` (`galleryId`);

--
-- Chỉ mục cho bảng `product_infos`
--
ALTER TABLE `product_infos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pro_id` (`pro_id`),
  ADD UNIQUE KEY `pro_id_2` (`pro_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_customers`
--
ALTER TABLE `order_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product_infos`
--
ALTER TABLE `product_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cusId`) REFERENCES `order_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`discountId`) REFERENCES `discounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`proId`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`productInfoId`) REFERENCES `product_infos` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`galleryId`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
