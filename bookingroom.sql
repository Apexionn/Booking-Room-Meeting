-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2023 at 05:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=booked,1=rejected/canceled',
  `description` text NOT NULL,
  `booking_date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `room_id`, `name`, `department`, `status`, `description`, `booking_date`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Lintang', 'Jakarta', '1', 'dsad', '2023-09-13', '11:03:00', '12:03:00', '2023-09-05 21:04:16', '2023-09-06 20:36:58'),
(2, 3, 2, 'Lintang', 'Jakarta', '1', 'tess', '2023-09-20', '11:51:00', '12:51:00', '2023-09-05 21:51:29', '2023-09-05 23:27:03'),
(3, 3, 3, 'Lintang', 'Jakarta', '1', 'meeting dadakan', '2023-09-13', '09:30:00', '11:00:00', '2023-09-06 00:34:14', '2023-09-06 20:35:31'),
(4, 3, 2, 'Lintang', 'Jakarta', '1', 'dsads', '2023-09-14', '10:12:00', '10:13:00', '2023-09-06 20:12:09', '2023-09-06 20:27:47'),
(5, 3, 2, 'Lintang', 'Jakarta', '1', 'sadsa', '2023-09-22', '10:37:00', '10:38:00', '2023-09-06 20:37:24', '2023-09-06 20:37:28'),
(6, 3, 4, 'Lintang', 'Jakarta', '1', 'dsads', '2023-09-12', '11:38:00', '11:39:00', '2023-09-06 20:38:10', '2023-09-06 20:38:19'),
(7, 3, 4, 'Lintang', 'Jakarta', '1', 'fsafas', '2023-09-20', '12:40:00', '13:40:00', '2023-09-06 20:39:01', '2023-09-06 20:39:19'),
(8, 3, 6, 'Lintang', 'Jakarta', '1', 'haiy', '2023-09-13', '12:55:00', '13:00:00', '2023-09-06 20:53:40', '2023-09-06 20:54:09'),
(9, 3, 4, 'Lintang', 'Jakarta', '1', 'xixi', '2023-09-18', '12:55:00', '13:00:00', '2023-09-06 20:55:29', '2023-09-06 20:55:37'),
(10, 3, 4, 'Lintang', 'Jakarta', '1', 'tess', '2023-09-18', '14:00:00', '15:00:00', '2023-09-06 21:00:19', '2023-09-06 21:00:28'),
(11, 3, 2, 'Lintang', 'Jakarta', '1', 'dsaads', '2023-09-11', '13:34:00', '13:35:00', '2023-09-06 23:34:07', '2023-09-06 23:35:50'),
(12, 3, 6, 'Lintang', 'Jakarta', '1', 'dsadsas', '2023-09-11', '13:37:00', '13:38:00', '2023-09-06 23:37:19', '2023-09-06 23:38:59'),
(13, 5, 1, 'Zahra', 'Bekasi', '1', 'dsfdafd', '2023-09-14', '13:50:00', '13:51:00', '2023-09-06 23:51:02', '2023-09-06 23:51:11'),
(14, 3, 1, 'Lintang', 'Jakarta', '1', 'Tes', '2023-09-20', '16:32:00', '16:35:00', '2023-09-07 02:32:38', '2023-09-07 19:52:08'),
(15, 4, 3, 'Raihan', 'Bekasi', '1', 'tess', '2023-09-26', '09:36:00', '09:37:00', '2023-09-07 19:37:00', '2023-09-07 19:37:08'),
(16, 3, 4, 'Lintang', 'Jakarta', '1', 'a', '2023-09-20', '09:54:00', '09:55:00', '2023-09-07 19:54:48', '2023-09-07 19:54:54'),
(17, 3, 3, 'Lintang', 'Jakarta', '1', 'a', '2023-09-20', '09:54:00', '09:55:00', '2023-09-07 19:57:31', '2023-09-07 19:57:38'),
(18, 3, 1, 'Lintang', 'Jakarta', '1', 'a', '2023-09-20', '09:54:00', '09:55:00', '2023-09-07 19:59:20', '2023-09-07 19:59:28'),
(19, 3, 6, 'Lintang', 'Jakarta', '1', 'a', '2023-09-20', '09:54:00', '09:55:00', '2023-09-07 20:00:13', '2023-09-07 20:00:18'),
(20, 3, 1, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-21', '10:33:00', '10:34:00', '2023-09-07 20:33:33', '2023-09-08 01:14:41'),
(21, 3, 2, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-21', '10:33:00', '10:34:00', '2023-09-07 20:33:59', '2023-09-08 01:06:49'),
(22, 3, 3, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-21', '10:33:00', '10:34:00', '2023-09-07 20:34:08', '2023-09-07 20:40:27'),
(23, 3, 5, 'Lintang', 'Jakarta', '1', 'Meeting', '2023-09-20', '14:20:00', '14:25:00', '2023-09-08 00:22:39', '2023-09-14 02:02:46'),
(24, 3, 1, 'Lintang', 'Jakarta', '1', 'tess', '2023-09-21', '08:26:00', '09:26:00', '2023-09-08 00:26:33', '2023-09-14 02:03:37'),
(25, 3, 4, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-27', '15:15:00', '15:20:00', '2023-09-08 01:15:53', '2023-09-14 20:19:08'),
(26, 3, 2, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-27', '15:15:00', '15:20:00', '2023-09-08 01:16:13', '2023-09-14 01:57:42'),
(27, 3, 3, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-27', '15:15:00', '15:20:00', '2023-09-08 01:16:22', '2023-09-08 05:57:12'),
(28, 3, 2, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-27', '20:00:00', '20:05:00', '2023-09-08 06:00:31', '2023-09-14 01:57:58'),
(29, 3, 6, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-27', '20:00:00', '20:05:00', '2023-09-08 06:00:44', '2023-09-14 01:58:13'),
(30, 3, 9, 'Lintang', 'Jakarta', '1', 'tes', '2023-09-27', '20:00:00', '20:05:00', '2023-09-08 06:00:59', '2023-09-14 01:58:27'),
(31, 4, 4, 'Raihan', 'Bekasi', '1', 'dsfsd', '2023-09-20', '08:55:00', '08:56:00', '2023-09-10 18:56:01', '2023-09-11 19:49:40'),
(32, 6, 1, 'Najwa', 'Bekasi', '1', 'Meeting', '2023-09-14', '16:36:00', '16:37:00', '2023-09-11 02:36:27', '2023-09-14 02:04:24'),
(33, 3, 10, 'Lintang', 'Jakarta', '1', 'p', '2023-09-27', '08:34:00', '08:35:00', '2023-09-11 18:34:41', '2023-09-14 01:59:59'),
(34, 3, 9, 'Lintang', 'Jakarta', '1', 'p', '2023-09-27', '08:34:00', '08:35:00', '2023-09-11 18:34:48', '2023-09-14 02:00:14'),
(35, 3, 8, 'Lintang', 'Jakarta', '1', 'p', '2023-09-27', '08:34:00', '08:35:00', '2023-09-11 18:34:56', '2023-09-14 02:00:20'),
(36, 3, 7, 'Lintang', 'Jakarta', '1', 'p', '2023-09-27', '08:34:00', '08:35:00', '2023-09-11 18:35:04', '2023-09-14 02:01:46'),
(37, 3, 1, 'Lintang', 'Jakarta', '1', 'a', '2023-09-27', '08:42:00', '08:43:00', '2023-09-11 18:42:52', '2023-09-14 02:01:51'),
(38, 3, 2, 'Lintang', 'Jakarta', '1', 'a', '2023-09-27', '08:42:00', '08:43:00', '2023-09-11 18:42:58', '2023-09-14 20:20:27'),
(39, 3, 3, 'Lintang', 'Jakarta', '1', 'a', '2023-09-27', '08:42:00', '08:43:00', '2023-09-11 18:43:03', '2023-09-14 20:26:27'),
(40, 4, 4, 'Raihan', 'Bekasi', '1', 'dsad', '2023-09-28', '16:05:00', '16:06:00', '2023-09-14 02:04:48', '2023-09-14 02:05:22'),
(41, 4, 3, 'Raihan', 'Bekasi', '1', 'dsads', '2023-09-29', '16:08:00', '16:09:00', '2023-09-14 02:05:11', '2023-09-14 02:05:48'),
(42, 4, 8, 'Raihan', 'Bekasi', '1', 'pp', '2023-09-28', '16:06:00', '16:07:00', '2023-09-14 02:06:13', '2023-09-14 02:06:51'),
(43, 4, 2, 'Raihan', 'Bekasi', '1', 'lll', '2023-09-26', '16:08:00', '16:10:00', '2023-09-14 02:06:30', '2023-09-14 06:06:21'),
(44, 4, 7, 'Raihan', 'Bekasi', '1', 'Buat ketemu zee', '2023-09-27', '20:04:00', '21:05:00', '2023-09-14 06:05:56', '2023-09-14 06:09:50'),
(45, 6, 2, 'Najwa', 'Bekasi', '1', 'Tes', '2023-09-27', '21:33:00', '21:35:00', '2023-09-14 07:33:04', '2023-09-18 01:25:47'),
(46, 3, 1, 'Lintang', 'Jakarta', '1', 'Tes', '2023-09-27', '10:10:00', '10:15:00', '2023-09-14 20:08:56', '2023-09-14 21:31:34'),
(47, 3, 1, 'Lintang', 'Jakarta', '1', 'Tes', '2023-09-28', '11:20:00', '11:25:00', '2023-09-14 21:14:43', '2023-09-14 23:21:29'),
(48, 3, 1, 'Lintang', 'Jakarta', '1', 'Tes', '2023-09-28', '17:20:00', '18:20:00', '2023-09-14 21:15:00', '2023-09-14 23:33:41'),
(49, 3, 2, 'Lintang', 'Jakarta', '1', 'dasdas', '2023-09-29', '16:20:00', '17:21:00', '2023-09-14 21:15:17', '2023-09-18 19:33:30'),
(50, 7, 3, 'Panji', 'Jakarta', '0', 'Tes', '2023-09-27', '15:30:00', '16:30:00', '2023-09-15 00:29:54', '2023-09-15 00:29:54'),
(51, 7, 2, 'Panji', 'Jakarta', '1', 'Tes', '2023-09-27', '15:30:00', '16:30:00', '2023-09-15 00:30:13', '2023-09-18 00:55:50'),
(52, 5, 1, 'Zahra', 'Bekasi', '1', 'tes', '2023-09-28', '08:40:00', '09:42:00', '2023-09-17 18:42:53', '2023-09-17 19:01:41'),
(53, 5, 3, 'Zahra', 'Bekasi', '1', 'TES', '2023-09-27', '08:43:00', '09:43:00', '2023-09-17 18:43:47', '2023-09-17 19:04:11'),
(54, 5, 1, 'Zahra', 'Bekasi', '1', 'Tes', '2023-09-27', '10:45:00', '11:45:00', '2023-09-17 18:45:43', '2023-09-17 19:04:26'),
(55, 5, 1, 'Zahra', 'Bekasi', '1', 'Tes', '2023-09-27', '08:45:00', '09:45:00', '2023-09-17 18:46:01', '2023-09-17 19:14:35'),
(56, 5, 1, 'Zahra', 'Bekasi', '1', 'Tes', '2023-09-27', '10:15:00', '11:15:00', '2023-09-17 19:14:16', '2023-09-17 20:07:44'),
(57, 5, 1, 'Zahra', 'Bekasi', '1', 'sadasds', '2023-09-27', '15:20:00', '17:20:00', '2023-09-17 19:14:55', '2023-09-17 19:16:05'),
(58, 5, 4, 'Zahra', 'Bekasi', '1', 'TESS', '2023-09-21', '15:09:00', '15:13:00', '2023-09-17 20:09:32', '2023-09-17 20:13:55'),
(59, 5, 4, 'Zahra', 'Bekasi', '1', 'TESS', '2023-09-21', '16:18:00', '16:21:00', '2023-09-17 20:12:30', '2023-09-18 00:55:25'),
(60, 3, 2, 'Lintang', 'Jakarta', '1', 'Tes', '2023-09-28', '10:55:00', '11:55:00', '2023-09-17 20:53:36', '2023-09-17 20:53:42'),
(61, 5, 3, 'Zahra', 'Bekasi', '1', 'TESS', '2023-09-27', '20:55:00', '21:55:00', '2023-09-18 00:50:38', '2023-09-18 01:27:21'),
(62, 5, 3, 'Zahra', 'Bekasi', '1', 'tess', '2023-09-25', '19:55:00', '20:55:00', '2023-09-18 00:51:41', '2023-09-18 00:52:22'),
(63, 5, 3, 'Zahra', 'Bekasi', '1', 'dsadas', '2023-09-26', '19:55:00', '20:55:00', '2023-09-18 00:52:10', '2023-09-18 00:52:59'),
(64, 6, 10, 'Najwa', 'Bekasi', '1', 'TESS', '2023-09-25', '19:26:00', '20:32:00', '2023-09-18 01:26:56', '2023-09-18 01:42:50'),
(65, 6, 7, 'Najwa', 'Bekasi', '1', 'tes', '2023-09-28', '19:30:00', '20:30:00', '2023-09-18 01:30:54', '2023-09-18 01:46:35'),
(66, 6, 5, 'Najwa', 'Bekasi', '1', 'y', '2023-09-25', '20:44:00', '21:44:00', '2023-09-18 01:44:24', '2023-09-18 02:30:39'),
(67, 6, 3, 'Najwa', 'Bekasi', '0', 'dsadas', '2023-09-28', '21:29:00', '22:29:00', '2023-09-18 02:29:42', '2023-09-18 02:29:42'),
(68, 6, 2, 'Najwa', 'Bekasi', '0', 'aa', '2023-09-27', '16:43:00', '16:44:00', '2023-09-18 02:38:14', '2023-09-18 02:38:14'),
(69, 6, 1, 'Najwa', 'Bekasi', '0', 'tES', '2023-09-25', '16:38:00', '16:40:00', '2023-09-18 02:38:29', '2023-09-18 02:38:29'),
(70, 6, 1, 'Najwa', 'Bekasi', '0', 'Tes', '2023-09-26', '16:40:00', '17:40:00', '2023-09-18 02:38:54', '2023-09-18 02:38:54'),
(71, 3, 3, 'Lintang', 'Jakarta', '1', 'Tes', '2023-09-23', '15:00:00', '16:00:00', '2023-09-18 19:03:36', '2023-09-18 19:29:26'),
(72, 3, 4, 'Lintang', 'Jakarta', '1', 'AAA', '2023-09-30', '09:03:00', '09:04:00', '2023-09-18 19:03:56', '2023-09-18 19:27:47'),
(73, 3, 2, 'Lintang', 'Jakarta', '1', 'dsdads', '2023-09-20', '09:04:00', '09:05:00', '2023-09-18 19:04:38', '2023-09-18 19:27:35'),
(74, 3, 3, 'Lintang', 'Jakarta', '1', 'dsadas', '2023-09-20', '13:35:00', '13:38:00', '2023-09-18 19:32:05', '2023-09-18 19:33:25'),
(75, 3, 5, 'Lintang', 'Jakarta', '1', 'tess', '2023-09-30', '18:37:00', '20:37:00', '2023-09-18 19:32:39', '2023-09-18 19:33:20'),
(76, 3, 8, 'Lintang', 'Jakarta', '1', 'dsads', '2023-09-21', '14:37:00', '20:36:00', '2023-09-18 19:33:03', '2023-09-18 19:33:16'),
(77, 3, 2, 'Lintang', 'Jakarta', '1', 'dsadas', '2023-09-20', '09:33:00', '09:38:00', '2023-09-18 19:34:04', '2023-09-18 19:36:56'),
(78, 3, 1, 'Lintang', 'Jakarta', '1', 'TESS', '2023-09-21', '15:40:00', '15:50:00', '2023-09-18 19:34:35', '2023-09-18 19:38:00'),
(79, 3, 3, 'Lintang', 'Jakarta', '1', 'dsadas', '2023-09-29', '13:36:00', '13:40:00', '2023-09-18 19:35:35', '2023-09-18 19:37:08'),
(80, 3, 3, 'Lintang', 'Jakarta', '0', 'dsadas', '2023-09-20', '09:42:00', '13:40:00', '2023-09-18 19:38:17', '2023-09-18 19:38:17'),
(81, 3, 5, 'Lintang', 'Jakarta', '1', 'Tes', '2023-09-19', '09:40:00', '10:40:00', '2023-09-18 19:38:36', '2023-09-18 19:38:54'),
(82, 3, 1, 'Lintang', 'Jakarta', '0', 'pp', '2023-09-29', '09:40:00', '10:40:00', '2023-09-18 19:39:12', '2023-09-18 19:39:12'),
(83, 3, 3, 'Lintang', 'Jakarta', '0', 'dssa', '2023-09-24', '09:41:00', '11:41:00', '2023-09-18 19:39:28', '2023-09-18 19:39:28'),
(84, 3, 1, 'Lintang', 'Jakarta', '0', 'fdaadfd', '2023-09-28', '09:40:00', '10:40:00', '2023-09-18 19:39:44', '2023-09-18 19:39:44');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_27_042342_create_rooms_table', 1),
(6, '2023_08_27_042415_create_bookings_table', 1);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'BR 1', '64f8031da8b77.jpg', '2023-09-05 21:03:40', '2023-09-05 21:42:05'),
(2, 'BR 2', '64f8021dd901f.jpg', '2023-09-05 21:37:49', '2023-09-05 21:37:49'),
(3, 'BR 3', '64f82375669d3.jpg', '2023-09-05 23:18:39', '2023-09-06 00:00:05'),
(4, 'BR 4', '64f89eecbb4df.jpg', '2023-09-06 08:46:52', '2023-09-06 08:46:52'),
(5, 'BR 5', '64f941c8ab72d.jpg', '2023-09-06 20:21:44', '2023-09-06 20:21:44'),
(6, 'BR 6', '64f941df53d71.jpg', '2023-09-06 20:22:07', '2023-09-06 20:22:07'),
(7, 'BR 7', '6507ff9f60530.jpeg', '2023-09-06 20:22:31', '2023-09-18 00:43:27'),
(8, 'BR 8', '6502cf63c6916.jpeg', '2023-09-06 20:22:45', '2023-09-14 02:16:19'),
(9, 'BR 9', '6502cf49f042a.jpeg', '2023-09-06 21:05:10', '2023-09-14 02:15:53'),
(10, 'BR 10', '6502cda21e22a.jpeg', '2023-09-06 21:17:20', '2023-09-14 02:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `role` enum('employee','admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `division`, `image`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Employee', '$2y$10$BmR1KQwJn3.V0BpGEcnTE.dW.7WHJWTlJoorrMqFNzUPGm0JIRZOi', 'employee@gmail.com', 'Jakarta', 0x363466393536373934313032632e6a706567, 'employee', NULL, NULL, '2023-09-06 21:50:01'),
(2, 'admin', '$2y$10$AqBFrU/WBIBNnhu3/xi6fe7gy8LP3LSmFmtR8pxtHTlAc6Ov7XTcC', 'admin@gmail.com', 'Jakarta', 0x363466383030356161663662612e6a706567, 'admin', NULL, NULL, '2023-09-05 21:30:18'),
(3, 'Lintang', '$2y$10$1/uaEm3VcfNKq3/HFegKI..emk4mTaNlGIvGzQqhie5lJZrISez7O', 'saya.lintang@gmail.com', 'Jakarta', 0x363530393130336164633961312e706e67, 'employee', NULL, NULL, '2023-09-18 20:06:34'),
(4, 'Raihan', '$2y$10$Ix7OwSrgefNhBTC2XwsSfe56QVql4LpUAJLqwsRw5dB5NXQcR68ly', 'raihan@gmail.com', 'Bekasi', 0x363530333035373064343566632e6a706567, 'employee', NULL, '2023-09-06 06:19:56', '2023-09-14 06:06:56'),
(5, 'Zahra', '$2y$10$xTYuWHMXbrRny3BIkygzMOmBBn56GzDw/6rfiCWxQ1KvyyJTybxZ.', 'zahra@gmail.com', 'Bekasi', 0x363466393536343932333736332e6a706567, 'employee', NULL, '2023-09-06 21:49:12', '2023-09-06 21:49:13'),
(6, 'Najwa', '$2y$10$vYc9WgFbZqs7vMGasKNvWu/wLKbyKRHYoMEhi2bDiCEbxhdJoCZ0G', 'najwa@gmail.com', 'Bekasi', 0x363466393536363765313739612e6a706567, 'employee', NULL, '2023-09-06 21:49:43', '2023-09-15 00:25:19'),
(7, 'Panji', '$2y$10$sHVi9fpaTJPTb7F9.6I/UOGqyOOLvBi3p2PzSOdBJYn5c2LVJeS2y', 'panji@gmail.com', 'Jakarta', 0x363530383030373031353231652e6a706567, 'employee', NULL, '2023-09-06 23:08:53', '2023-09-18 00:46:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
