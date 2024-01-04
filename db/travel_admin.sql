-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 12:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`, `role_id`, `status`, `name`, `email`, `mobile`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'admin@gmail.com', '$2y$12$msTPHUg6YZqNnLhm1EVSBO8jzBir/Nh7cOpkvSpp5Eqsj65/ctE3y', 1, 1, 'Administrator', 'admin@gmail.com', NULL, NULL, NULL, NULL),
(2, 'vendor@gmail.com', '$2y$10$b2XJnT/MIgxkMiYEI5OxYuE4ecp84kV.X.MyA0FHxDOPAoZdMcIyG', 3, 1, 'Vendor', 'vendor@gmail.com', 1234567890, NULL, '2023-06-03 04:00:21', NULL),
(5, 'testhotel@gmail.com', '$2y$10$8Movf6fHTGfC9NNMJ57Fou8Dg.gIhfVnaKjyTo1g2LtZsr07D6kVe', 2, 1, 'Test Hotel', 'testhotel@gmail.com', 1234567890, NULL, '2023-05-04 00:03:22', '2023-05-03 23:30:32'),
(6, 'johnsmith2k22s@gmail.com', '$2y$10$mmOH0g3CaGt2Z5l/S1qlpO1.ksIeIAkFWFPD.zpmQgHcTTSP5KpeK', 4, 1, 'John Smith', 'johnsmith2k22s@gmail.com', 7231876076, NULL, '2023-09-29 05:20:19', '2023-09-27 05:00:25'),
(10, 'grn1@gmail.com', '$2y$10$9mZJWsAhBICSqSa2rn.aX.PT.rkY4KqWS8lWsLSoWcGx/90g0GPJy', 4, 1, 'GRN1', 'grn1@gmail.com', 7829244477, NULL, '2023-09-27 06:39:28', '2023-09-27 05:16:18'),
(11, 'grn2@gmail.com', '$2y$10$DM3hV9TM1fO1xKqhwZl/Q.aW6.9roWUzEM4vUY3y9Tp1WwoeIEgS6', 4, 1, 'GRN 2', 'grn2@gmail.com', 7829244477, NULL, '2023-09-27 06:41:18', '2023-09-27 06:41:18'),
(12, 'tripti@getpill.in', '$2y$10$sINi7IqNc4SGDbd/PNaIcOBQx0q/.7G8DWhCfQoqwDSe7t8FuBwJK', 3, 1, 'Tripti M', 'tripti@getpill.in', 9801776800, NULL, '2023-10-12 06:49:47', '2023-10-12 06:49:47'),
(13, 'customertest@gmail.com', '$2y$10$gnfmF.tl5/bNcWg/M1jagOgYGk/O/qo7GZ/puEwiHB2oZZYNrWPZG', 3, 1, 'Customer Test', 'customertest@gmail.com', 1234567890, NULL, '2023-10-12 07:02:05', '2023-10-12 07:02:05'),
(14, 'order@gmail.com', '$2y$10$n8QDBOFXcBH9jYtlUYryM.L8nFwv8Xlu6Fxkjhfv8FnG.TC.2Bn7K', 13, 1, 'Order Manager', 'order@gmail.com', 9999999999, NULL, '2023-12-12 01:25:34', '2023-10-26 10:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `show_on_menu` tinyint(1) NOT NULL DEFAULT 0,
  `show_on_home` tinyint(4) NOT NULL DEFAULT 0,
  `show_on_footer` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` int(11) DEFAULT 0,
  `is_popular` tinyint(4) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
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
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `type` enum('category','tour_package') DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_code` varchar(255) NOT NULL,
  `perm_create` tinyint(4) NOT NULL DEFAULT 0,
  `perm_edit` tinyint(4) NOT NULL DEFAULT 0,
  `perm_delete` tinyint(4) NOT NULL DEFAULT 0,
  `perm_view` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_code`, `perm_create`, `perm_edit`, `perm_delete`, `perm_view`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Modules', 'modules', 1, 1, 1, 1, 1, '2022-01-07 06:42:37', '2022-01-07 06:42:37'),
(2, 'Roles', 'roles', 1, 1, 1, 1, 1, '2022-01-03 02:05:39', '2022-01-03 02:05:39'),
(3, 'Role Permissions', 'role-permissions', 0, 1, 0, 0, 1, '2022-01-03 02:05:39', '2022-01-03 02:05:39'),
(4, 'Users', 'users', 1, 1, 1, 1, 1, '2022-01-03 02:05:39', '2022-01-03 02:05:39'),
(10, 'Sliders', 'sliders', 1, 1, 1, 1, 0, '2022-02-09 04:48:37', '2022-02-09 04:48:37'),
(15, 'Settings', 'settings', 1, 1, 1, 1, 0, '2022-06-09 06:32:04', '2022-06-09 06:32:04'),
(19, 'Members', 'members', 1, 1, 1, 1, 1, '2023-06-14 06:47:20', '2023-06-14 06:47:49'),
(35, 'Categories', 'categories', 1, 1, 1, 1, 1, '2023-12-12 03:47:15', '2023-12-12 03:47:15'),
(36, 'Tour Packages', 'tour_packages', 1, 1, 1, 1, 1, '2023-12-12 04:10:58', '2023-12-12 04:11:30');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2021-12-30 23:24:11'),
(2, 'Admin', NULL, NULL),
(3, 'Customer', NULL, '2022-06-09 05:53:55'),
(4, 'Agent', '2022-06-09 05:53:44', '2022-06-09 05:53:44'),
(13, 'Order Manager', '2023-05-23 22:31:38', '2023-10-26 10:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_rights`
--

CREATE TABLE `role_rights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rr_create` tinyint(4) NOT NULL DEFAULT 0,
  `rr_edit` tinyint(4) NOT NULL DEFAULT 0,
  `rr_delete` tinyint(4) NOT NULL DEFAULT 0,
  `rr_view` tinyint(4) NOT NULL DEFAULT 0,
  `module_id` tinyint(4) NOT NULL DEFAULT 0,
  `role_id` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_rights`
--

INSERT INTO `role_rights` (`id`, `rr_create`, `rr_edit`, `rr_delete`, `rr_view`, `module_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2022-01-03 04:16:48', '2023-12-12 04:12:13'),
(2, 1, 1, 1, 1, 2, 1, '2022-01-03 04:16:48', '2023-12-12 04:12:13'),
(3, 0, 1, 0, 0, 3, 1, '2022-01-03 04:16:48', '2023-12-12 04:12:13'),
(4, 1, 1, 1, 1, 4, 1, '2022-01-03 04:16:48', '2023-12-12 04:12:13'),
(5, 1, 1, 1, 1, 5, 1, '2022-01-07 04:30:12', '2023-12-11 05:45:48'),
(6, 1, 1, 1, 1, 6, 1, '2022-01-07 06:42:54', '2023-12-11 05:45:48'),
(7, 1, 1, 1, 1, 7, 1, '2022-01-17 01:42:22', '2023-12-11 05:45:48'),
(8, 1, 1, 1, 1, 8, 1, '2022-01-17 23:04:35', '2023-12-11 05:45:48'),
(9, 1, 1, 1, 1, 10, 1, '2022-03-09 04:16:52', '2023-12-12 04:12:13'),
(10, 0, 1, 0, 1, 11, 1, '2022-03-09 04:16:52', '2023-12-11 05:45:48'),
(11, 1, 1, 1, 1, 12, 1, '2022-03-09 04:16:52', '2023-12-11 05:45:48'),
(12, 1, 1, 1, 1, 13, 1, '2022-04-13 07:01:22', '2023-12-11 05:45:48'),
(13, 1, 1, 1, 1, 14, 1, '2022-04-26 00:50:28', '2023-12-11 05:45:48'),
(14, 1, 1, 1, 1, 15, 1, '2023-03-13 01:05:47', '2023-12-12 04:12:13'),
(15, 1, 1, 1, 1, 16, 1, '2023-03-13 01:05:47', '2023-12-11 05:45:48'),
(16, 0, 0, 0, 0, 1, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(17, 0, 0, 0, 0, 2, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(18, 0, 0, 0, 0, 3, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(19, 0, 0, 0, 0, 4, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(20, 1, 1, 1, 1, 5, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(21, 1, 1, 1, 1, 6, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(22, 1, 1, 1, 1, 7, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(23, 1, 1, 1, 1, 8, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(24, 1, 1, 1, 1, 10, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(25, 0, 0, 1, 1, 11, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(26, 1, 1, 1, 1, 12, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(27, 1, 1, 1, 1, 13, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(28, 1, 1, 1, 1, 14, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(29, 0, 0, 0, 0, 15, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(30, 1, 1, 1, 1, 16, 2, '2023-03-27 01:06:46', '2023-05-15 00:03:05'),
(31, 1, 0, 0, 0, 17, 1, '2023-05-18 02:07:11', '2023-12-11 05:45:48'),
(32, 1, 1, 1, 1, 18, 1, '2023-06-14 06:43:20', '2023-12-11 05:45:48'),
(33, 1, 1, 1, 1, 19, 1, '2023-06-14 06:47:31', '2023-12-12 04:12:13'),
(34, 1, 1, 1, 1, 22, 1, '2023-06-15 05:41:06', '2023-12-11 05:45:48'),
(35, 1, 1, 1, 1, 23, 1, '2023-06-15 05:41:06', '2023-12-11 05:45:48'),
(36, 1, 1, 1, 1, 24, 1, '2023-06-15 05:41:06', '2023-12-11 05:45:48'),
(37, 1, 1, 1, 1, 25, 1, '2023-06-15 05:41:06', '2023-12-11 05:45:48'),
(38, 0, 1, 0, 1, 26, 1, '2023-06-17 01:20:37', '2023-06-17 01:25:06'),
(39, 0, 0, 0, 0, 1, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(40, 0, 0, 0, 0, 2, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(41, 0, 0, 0, 0, 3, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(42, 0, 0, 0, 0, 4, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(43, 0, 0, 0, 0, 5, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(44, 0, 0, 0, 0, 6, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(45, 0, 0, 0, 0, 7, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(46, 0, 1, 0, 1, 8, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(47, 0, 0, 0, 0, 10, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(48, 0, 0, 0, 0, 11, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(49, 0, 0, 0, 0, 12, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(50, 0, 0, 0, 0, 13, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(51, 0, 0, 0, 0, 14, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(52, 0, 0, 0, 0, 15, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(53, 0, 0, 0, 0, 16, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(54, 0, 0, 0, 0, 17, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(55, 0, 0, 0, 0, 18, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(56, 0, 0, 0, 1, 19, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(57, 0, 0, 0, 0, 22, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(58, 0, 0, 0, 0, 23, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(59, 0, 0, 0, 0, 24, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(60, 0, 0, 0, 0, 25, 4, '2023-09-27 04:57:48', '2023-09-29 06:28:51'),
(61, 0, 0, 0, 0, 1, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(62, 0, 0, 0, 0, 2, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(63, 0, 0, 0, 0, 3, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(64, 0, 0, 0, 0, 4, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(65, 1, 1, 1, 1, 5, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(66, 1, 1, 1, 1, 6, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(67, 1, 1, 1, 1, 7, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(68, 1, 1, 1, 1, 8, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(69, 1, 1, 0, 1, 10, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(70, 0, 1, 0, 1, 11, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(71, 0, 0, 0, 0, 12, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(72, 1, 1, 1, 1, 13, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(73, 0, 0, 0, 0, 14, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(74, 0, 0, 0, 0, 15, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(75, 0, 0, 0, 0, 16, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(76, 0, 0, 0, 0, 17, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(77, 1, 1, 1, 1, 18, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(78, 0, 0, 0, 0, 19, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(79, 1, 1, 1, 1, 22, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(80, 0, 0, 0, 0, 23, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(81, 1, 1, 1, 1, 24, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(82, 0, 0, 0, 0, 25, 3, '2023-10-12 06:49:07', '2023-10-12 06:49:07'),
(83, 1, 1, 1, 1, 27, 1, '2023-10-12 12:17:28', '2023-12-11 05:45:48'),
(84, 0, 0, 0, 0, 1, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(85, 0, 0, 0, 0, 2, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(86, 0, 0, 0, 0, 3, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(87, 0, 0, 0, 0, 4, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(88, 0, 0, 0, 0, 5, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(89, 0, 0, 0, 0, 6, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(90, 0, 0, 0, 0, 7, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(91, 0, 0, 0, 0, 8, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(92, 0, 0, 0, 0, 10, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(93, 0, 1, 0, 1, 11, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(94, 0, 0, 0, 0, 12, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(95, 0, 0, 0, 0, 13, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(96, 0, 0, 0, 0, 14, 13, '2023-10-26 10:53:15', '2023-10-26 10:53:15'),
(97, 0, 0, 0, 0, 15, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(98, 0, 0, 0, 0, 16, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(99, 0, 0, 0, 0, 17, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(100, 0, 0, 0, 0, 18, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(101, 0, 0, 0, 0, 19, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(102, 0, 0, 0, 0, 22, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(103, 0, 0, 0, 0, 23, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(104, 0, 0, 0, 0, 24, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(105, 0, 0, 0, 0, 25, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(106, 0, 0, 0, 0, 27, 13, '2023-10-26 10:53:16', '2023-10-26 10:53:16'),
(107, 1, 1, 1, 1, 28, 1, '2023-11-03 09:50:09', '2023-11-03 10:28:14'),
(108, 1, 1, 1, 1, 29, 1, '2023-11-03 10:28:14', '2023-12-11 05:45:48'),
(109, 1, 1, 1, 1, 30, 1, '2023-11-03 10:28:14', '2023-12-11 05:45:48'),
(110, 1, 1, 1, 1, 31, 1, '2023-11-03 10:28:14', '2023-12-11 05:45:48'),
(111, 0, 0, 0, 1, 32, 1, '2023-12-01 05:56:17', '2023-12-11 05:45:48'),
(112, 0, 0, 0, 1, 33, 1, '2023-12-07 07:22:09', '2023-12-11 05:45:48'),
(113, 1, 1, 1, 1, 34, 1, '2023-12-11 05:45:48', '2023-12-11 05:45:48'),
(114, 1, 1, 1, 1, 35, 1, '2023-12-12 03:48:32', '2023-12-12 04:12:13'),
(115, 1, 1, 1, 1, 36, 1, '2023-12-12 04:12:13', '2023-12-12 04:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `header_line` text DEFAULT NULL,
  `top_header_text` text NOT NULL,
  `footer_text` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `fav_icon` varchar(255) DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`address`)),
  `socialLinks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`socialLinks`)),
  `disclaimer` text DEFAULT NULL,
  `custom_css` longtext DEFAULT NULL,
  `custom_js` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `header_line`, `top_header_text`, `footer_text`, `logo`, `fav_icon`, `address`, `socialLinks`, `disclaimer`, `custom_css`, `custom_js`, `created_at`, `updated_at`) VALUES
(1, 'Travel Admin', 'QUICK BUY! Get 15% off on medicines*', 'laracms@gmail.com', 'LaraCMS.com', '650abec5f1db8.png', '65110fec2ec32.png', '{\"streetAddress\":\"242 Ring Road Jaipur\",\"addressLocality\":\"Rajasthan\",\"addressRegion\":\"India\",\"postalCode\":\"302026\",\"telephone\":\"8854810117\"}', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/GetPillOfficial\",\"twitter\":\"https:\\/\\/twitter.com\\/GetPillOfficial\",\"youtube\":\"https:\\/\\/caknowledge.com\\/youtube\",\"instagram\":\"https:\\/\\/www.instagram.com\\/getpillofficial\",\"linkedin\":\"https:\\/\\/www.linkedin.com\\/company\\/getpillofficial\"}', NULL, NULL, NULL, NULL, '2023-12-12 01:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1:active,0:deactive',
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1:Full Width,\r\n2:Event Slider',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `heading` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `btn_text` text DEFAULT NULL,
  `btn_link` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `slider_url` text DEFAULT NULL,
  `deep_link` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `open_url_for_android_app` tinyint(4) DEFAULT NULL COMMENT '1=web browser, 2=webview',
  `slider_for` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=all, 1=web, 2=app',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_packages`
--

CREATE TABLE `tour_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_ids` varchar(255) NOT NULL DEFAULT '0',
  `number_of_days` int(11) DEFAULT NULL,
  `number_of_nights` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `major_attraction` text DEFAULT NULL,
  `destination_ids` varchar(255) DEFAULT NULL,
  `tag_ids` varchar(255) DEFAULT NULL,
  `inclusion` text DEFAULT NULL,
  `exclusion` text DEFAULT NULL,
  `itinerary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`itinerary`)),
  `dynamic_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dynamic_content`)),
  `faq` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `show_on_menu` tinyint(1) NOT NULL DEFAULT 0,
  `show_on_home` tinyint(4) NOT NULL DEFAULT 0,
  `show_on_footer` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) DEFAULT 0,
  `is_popular` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
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
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
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
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_packages`
--
ALTER TABLE `tour_packages`
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
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_rights`
--
ALTER TABLE `role_rights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_packages`
--
ALTER TABLE `tour_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
