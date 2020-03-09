-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 08:03 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommarce`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phone`, `message`, `day`, `month`, `year`, `time`, `approve_status`, `created_at`, `updated_at`) VALUES
(1, 'rijwan', 'rijwanc007@gmail.com', '01913315151', 'there is something you want to see...', '6', 'July', '2019', '11.30 am', 1, '2019-07-06 03:38:35', '2019-07-14 01:19:00'),
(4, 'nadim', 'nadimridoy019@gmail.com', '01913315151', 'there is something ...', '7', 'July', '2019', '1.30 pm', 1, '2019-07-06 21:56:38', '2019-07-09 03:28:13'),
(6, 'atoshi', 'abida.otoshi@visualmisconception.com', '01913315151', 'there is nothing', '7', 'July', '2019', '9.30 am', 0, '2019-07-07 00:38:09', '2019-07-07 00:38:23'),
(8, 'alamin', 'aminfaruk93@gmail.com', '01913315151', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '7', 'July', '2019', '11.00 am', 0, '2019-07-07 04:45:52', '2019-07-07 04:45:52'),
(9, 'setcolbd', 'rijwanc007@gmail.com', '01913315151', 'there is something', '23', 'July', '2019', '11.30 am', 0, '2019-07-22 22:41:33', '2019-07-22 22:41:33'),
(10, 'setcolbd', 'rijwanc007@gmail.com', '01913315151', 'there is something', '23', 'July', '2019', '11.30 am', 1, '2019-07-22 22:43:52', '2019-07-22 22:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `task`, `time`, `point`, `status`, `employee_name`, `employee_email`, `employee_id`, `created_at`, `updated_at`) VALUES
(59, '[\"spend some time with your elders Not everything is found on google\",\"if somebody offers you an amazing opportunity but you are can do it,say yes.then learn how to do it\",\"if somebody offers you an amazing opportunity but you are can do it,say yes.then learn how to do it\",\"education is the most powerful weapon which you can use to change the world\"]', '15', '8000', 'deactivate', 'supol', 'rijwanc007@gmail.com', '4', '2019-07-21 01:20:40', '2019-07-21 01:55:56'),
(60, '[\"bangla\",\"vmc_one\",\"english\"]', '10', '50', 'deactivate', 'supol', 'rijwanc007@gmail.com', '4', '2019-07-21 01:55:49', '2019-07-21 01:55:56'),
(61, '[\"bangla\",\"vmc_one\",\"spend some time with your elders Not everything is found on google\"]', '15', '50', 'deactivate', 'setcolbd', 'setcolbd@gmail.com', '2', '2019-07-21 05:18:25', '2019-07-21 21:13:57'),
(62, '[\"bangla\",\"vmc_one\"]', '10', '50', 'deactivate', 'setcolbd', 'setcolbd@gmail.com', '2', '2019-07-21 21:13:49', '2019-07-21 21:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `complete_assignments`
--

CREATE TABLE `complete_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gain_point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complete_assignments`
--

INSERT INTO `complete_assignments` (`id`, `task`, `time`, `point`, `status`, `assign_date`, `employee_name`, `employee_id`, `assignment_id`, `admin_status`, `gain_point`, `employee_email`, `created_at`, `updated_at`) VALUES
(17, '[\"spend some time with your elders Not everything is found on google\",\"if somebody offers you an amazing opportunity but you are can do it,say yes.then learn how to do it\",\"if somebody offers you an amazing opportunity but you are can do it,say yes.then learn how to do it\"]', '15', '8000', 'complete', 'July 21, 2019', 'supol', '4', '59', 'approved', '300', 'rijwanc007@gmail.com', '2019-07-21 01:20:48', '2019-07-21 01:29:55'),
(18, '[\"bangla\",\"vmc_one\",\"english\"]', '10', '50', 'complete', 'July 21, 2019', 'supol', '4', '60', 'approved', '20', 'rijwanc007@gmail.com', '2019-07-21 01:55:56', '2019-07-21 04:19:35'),
(19, '[\"bangla\",\"spend some time with your elders Not everything is found on google\"]', '15', '50', 'complete', 'July 21, 2019', 'setcolbd', '2', '61', 'approved', '20', 'setcolbd@gmail.com', '2019-07-21 05:18:43', '2019-07-21 21:12:02'),
(20, '[\"bangla\",\"vmc_one\"]', '10', '50', 'complete', 'July 22, 2019', 'setcolbd', '2', '62', 'approved', '50', 'setcolbd@gmail.com', '2019-07-21 21:13:57', '2019-07-21 21:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fashions`
--

CREATE TABLE `fashions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fashions`
--

INSERT INTO `fashions` (`id`, `image`, `type`, `created_at`, `updated_at`) VALUES
(4, '1562741526.jpg', 'image', '2019-07-10 00:52:06', '2019-07-10 00:52:06'),
(6, '1562745501.png', 'image', '2019-07-10 01:58:21', '2019-07-10 01:58:21'),
(8, '1562746470.jpg', 'image', '2019-07-10 02:14:30', '2019-07-10 02:14:30'),
(10, '1562757595.jpg', 'image', '2019-07-10 05:19:55', '2019-07-10 05:19:55'),
(11, '1562757607.mp4', 'video', '2019-07-10 05:20:07', '2019-07-10 05:20:07'),
(12, '1563089312.jpg', 'image', '2019-07-14 01:28:32', '2019-07-14 01:28:32'),
(14, '1563093454.mp4', 'video', '2019-07-14 02:37:34', '2019-07-14 02:37:34');

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
(3, '2019_07_06_080305_create_appointments_table', 2),
(4, '2019_07_07_060445_add_column_to_the_appointments_tabel', 3),
(5, '2019_07_07_105332_create_employees_table', 4),
(6, '2019_07_07_111031_add_columns_to_the_users_table', 4),
(7, '2019_07_08_062520_add_extra_columns_to_the_user', 5),
(8, '2019_07_10_033108_create_fashions_table', 6),
(9, '2019_07_10_073824_add_column_fashions_table', 7),
(10, '2019_07_16_063926_create_assignments_table', 8),
(11, '2019_07_17_055931_add_columns_to_the_assignment_table', 9),
(12, '2019_07_18_051703_add_column_to_the_assignments_table', 10),
(15, '2019_07_18_055120_create_complete_assignments_table', 11),
(16, '2019_07_18_101723_create_employee_complete_assignments_table', 12),
(17, '2019_07_20_054518_add_softdelete_track_table', 13),
(18, '2019_07_20_064652_create_roles_table', 14),
(19, '2019_07_20_071527_create_reports_table', 14),
(20, '2019_07_20_072904_add_column_to_complete_assignments', 14),
(21, '2019_07_20_073002_add_column_to_track_complete_assignments', 14),
(22, '2019_07_20_095315_add_column_track_table', 15),
(23, '2019_07_20_095350_add_column_complete_task', 15),
(24, '2019_07_21_043421_add_column_track_table', 16),
(25, '2019_07_21_043504_add_column_complete_table', 16),
(26, '2019_07_21_045619_add_columns_report_table', 17),
(27, '2019_07_22_040801_create_role_user_table', 18),
(28, '2019_07_22_043737_creat_permission_table', 19),
(29, '2019_07_22_043811_create_permission_role_table', 19),
(30, '2019_07_22_045759_add_columns_role_table', 20),
(31, '2019_07_22_073819_add_column_user-table', 21),
(32, '2019_07_22_074424_add_column_users_table', 22);

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
('rijwan_c007@yahoo.com', '$2y$10$hNDOjJ5SMQxQbVXqZRgB9ONw.cmAsSTPyMGiA56psUH5JfFKEqYm6', '2019-07-04 01:39:56'),
('faysalahmed.fa11@gmail.com', '$2y$10$KBQWa5l56xu/KMbwWxFnSejVvL0m6o13kBsY3IxxmflhM2OxR4et.', '2019-07-04 01:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `permission_for`, `created_at`, `updated_at`) VALUES
(1, 'task', 'assign assignment', NULL, NULL),
(2, 'task', 'complete assignment', NULL, NULL),
(3, 'employee', 'all employee', NULL, NULL),
(4, 'employee', 'create employee', NULL, NULL),
(5, 'schedule', 'all appointment', NULL, NULL),
(6, 'fashion', 'all fashion', NULL, NULL),
(7, 'fashion', 'create fashion', NULL, NULL),
(8, 'point', 'all assignment', NULL, NULL),
(9, 'point', 'create assignment', NULL, NULL),
(10, 'point', 'track complete assignment', NULL, NULL),
(11, 'point', 'recycle bin', NULL, NULL),
(12, 'point', 'report', NULL, NULL),
(13, 'role', 'all role', NULL, NULL),
(14, 'role', 'create role', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(19, '3', '1', NULL, NULL),
(20, '3', '2', NULL, NULL),
(21, '3', '5', NULL, NULL),
(22, '3', '13', NULL, NULL),
(23, '3', '14', NULL, NULL),
(24, '3', '8', NULL, NULL),
(25, '3', '9', NULL, NULL),
(26, '3', '10', NULL, NULL),
(27, '3', '11', NULL, NULL),
(28, '3', '12', NULL, NULL),
(29, '3', '6', NULL, NULL),
(30, '3', '7', NULL, NULL),
(31, '3', '3', NULL, NULL),
(32, '3', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `track_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `track_id`, `employee_id`, `assignment_id`, `employee_name`, `employee_email`, `total_point`, `created_at`, `updated_at`) VALUES
(3, '14', '2', '61', 'setcolbd', 'setcolbd@gmail.com', '20', '2019-07-21 05:28:49', '2019-07-22 04:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'rodoshi', 'super_admin', '2019-07-22 01:50:46', '2019-07-22 01:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '11', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `track_complete_assignments`
--

CREATE TABLE `track_complete_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gain_point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `track_complete_assignments`
--

INSERT INTO `track_complete_assignments` (`id`, `task`, `time`, `point`, `status`, `assign_date`, `employee_name`, `employee_id`, `assignment_id`, `admin_status`, `gain_point`, `employee_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, '[\"spend some time with your elders Not everything is found on google\",\"if somebody offers you an amazing opportunity but you are can do it,say yes.then learn how to do it\",\"if somebody offers you an amazing opportunity but you are can do it,say yes.then learn how to do it\"]', '15', '8000', 'complete', 'July 21, 2019', 'supol', '4', '59', 'approved', '300', 'rijwanc007@gmail.com', '2019-07-21 01:20:48', '2019-07-21 01:29:55', NULL),
(13, '[\"bangla\",\"vmc_one\",\"english\"]', '10', '50', 'complete', 'July 21, 2019', 'supol', '4', '60', 'approved', '20', 'rijwanc007@gmail.com', '2019-07-21 01:55:56', '2019-07-21 04:19:35', NULL),
(14, '[\"bangla\",\"spend some time with your elders Not everything is found on google\"]', '15', '50', 'complete', 'July 21, 2019', 'setcolbd', '2', '61', 'approved', '20', 'setcolbd@gmail.com', '2019-07-21 05:18:43', '2019-07-21 21:12:02', NULL),
(15, '[\"bangla\",\"vmc_one\"]', '10', '50', 'complete', 'July 22, 2019', 'setcolbd', '2', '62', 'approved', '50', 'setcolbd@gmail.com', '2019-07-21 21:13:58', '2019-07-21 21:14:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `description`, `image`, `role_name`, `position`, `email_verified_at`, `password`, `confirm_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rijwan', 'rijwan_c007@yahoo.com', '01913315151', 'these output is going for update test purpose', 'superman.png', 'html', 'admin', '0000-00-00 00:00:00', '$2b$10$JmnO9LKZKYyhjKGUIEPIxOKtF1CYvhM/1HEa5SDVi9Q7ZS9AVAGA2', NULL, NULL, '2019-07-03 04:45:22', '2019-07-09 00:59:27'),
(2, 'setcolbd', 'setcolbd@gmail.com', '01913315151', 'these input is going for test purpose', '1562655104.png', 'html', 'admin', NULL, '$2y$10$oPD2c99vJrv2KHXNTNeYdeIKd61zL3YqW.Qu1/p5MLR6pBzTqjjIa', NULL, NULL, '2019-07-03 04:45:55', '2019-07-21 05:17:45'),
(3, 'faysal', 'faysalahmed.fa11@gmail.com', '01913315987', 'these input is going for test purpose', '1562654999.png', NULL, 'admin', NULL, '$2y$10$ua/diIL2H9z8O2bbbBK10OzFSPjxYx62XIrWmnYz2AhAvzW4pW0xa', NULL, NULL, '2019-07-04 01:46:54', '2019-07-09 00:50:11'),
(4, 'supol', 'rijwanc007@gmail.com', '01913315151', 'these input is going for test purpose', 'joker.jpg', 'html', 'admin', NULL, '$2y$10$s1.BIiDHTimGnCCIqp/p2OtdcL15PljrpsltdI2rOY1oVR/0RdWu2', NULL, 'SigmUPbi5fcn10lfF8g4WReIuJ4M7GowAvH4n7w9r6ziAYO1xQzmWTR1Ru5B', '2019-07-04 02:25:07', '2019-07-09 21:43:43'),
(5, 'rijwan', 'rijwan_c008@yahoo.com', '01913315151', 'these input is going for test purpose', '1562576555.png', NULL, 'admin', NULL, '$2y$10$ILtWlq6pXA7VmAQNcqmh/.gnI8.IJQiGw3iuviBwiGoAn/kuR.QEO', NULL, NULL, '2019-07-08 03:02:35', '2019-07-08 03:02:35'),
(7, 'test_purpose', 'rijwan_c009@yahoo.com', '01913315151', 'these input is going for test purpose', '1562655194.png', 'html', 'admin', NULL, '$2y$10$c09GrwKeh1/p4jee8nK2SuynMjCAlUW6p6kV/9OAe.lKSix6PHriy', NULL, NULL, '2019-07-08 04:01:09', '2019-07-09 03:31:48'),
(8, 'final', 'rijwanc009@gmail.com', '01913315151', 'these input is going for final', '1562655323.png', 'html', 'admin', NULL, '$2y$10$fNRP8jPZ4SwwH.gVMeDzAODMifij3I.ESgb49M7h4cZ5K29wsHsGW', NULL, NULL, '2019-07-08 04:03:43', '2019-07-10 05:23:31'),
(9, 'alamin faruk', 'aminfaruk93@gmail.com', '01836362731', 'hi these is alamin,I am very passionate about my work hi these is alamin,I am very passionate about my workhi these is alamin,I am very passionate about my workhi these is alamin,I am very passionate about my workhi these is alamin,I am very passionate about my workhi these is alamin,I am very passionate about my workhi these is alamin,I am very passionate about my workhi these is alamin,I am very passionate about my workhi these is alamin,I am very passionate about my work', '1562583780.jpg', 'html', 'admin', NULL, '$2y$10$ahMOw7h0hmiFKEexCm8M0.fVcbYynFgms/zQlU1GbpTPHl4npW5VG', NULL, NULL, '2019-07-08 05:03:00', '2019-07-09 21:53:57'),
(10, 'employee_test', 'rijwanr007@gmail.com', '01913315151', 'these input is came from test purpose', '1562731065.jpg', 'No Role Selected Yet', 'admin', NULL, '$2y$10$wuaDC6eV4BauIG32HNQBp.nfiQntcIx2nJK6WZGPwF5wxCKz/KCia', NULL, NULL, '2019-07-09 21:57:45', '2019-07-23 01:29:43'),
(11, 'rodoshi', 'rodoshi@gmail.com', '01986348224', 'these output is came from test purpose and check how is role system working', '1563781913.jpg', 'rodoshi', 'super_admin', NULL, '$2y$12$dIlQNLBMQ5H5xZK7CJmN7eAdmUZ/TwPgxcQc9/Xya1Biq5Isw8VN6', NULL, NULL, '2019-07-22 01:51:53', '2019-07-22 01:51:53'),
(12, 'rijwan', '01986348224@gmail.com', '01836362762dd', 'dddd', '1563860815.jpg', 'No Role Selected Yet', 'admin', NULL, '$2y$10$uroXzv/aXLG.95D9yURM2uiXKZ57z4nX59GnaP2TBwLwRFmbsK1/a', NULL, NULL, '2019-07-22 23:46:55', '2019-07-23 01:29:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete_assignments`
--
ALTER TABLE `complete_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fashions`
--
ALTER TABLE `fashions`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_complete_assignments`
--
ALTER TABLE `track_complete_assignments`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `complete_assignments`
--
ALTER TABLE `complete_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fashions`
--
ALTER TABLE `fashions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `track_complete_assignments`
--
ALTER TABLE `track_complete_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
