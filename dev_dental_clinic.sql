-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 09:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_dental_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_home_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `added_by_id` int(11) DEFAULT NULL,
  `patient_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL DEFAULT 0.00,
  `tax_total` double(8,2) NOT NULL DEFAULT 0.00,
  `grand_total` double(8,2) NOT NULL DEFAULT 0.00,
  `total_payment` int(11) NOT NULL,
  `paid_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `decrease` int(11) DEFAULT 0,
  `isClose` int(11) NOT NULL,
  `due_total` double(8,2) NOT NULL DEFAULT 0.00,
  `previous_due` int(11) NOT NULL,
  `isRegistered` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `payment_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `payment_method_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `patient_id`, `doctor_id`, `added_by_id`, `patient_phone`, `patient_name`, `patient_address`, `payment_date`, `total`, `tax_total`, `grand_total`, `total_payment`, `paid_amount`, `decrease`, `isClose`, `due_total`, `previous_due`, `isRegistered`, `payment_note`, `payment_method`, `payment_method_note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 8, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1520.00, 111, 120.00, 0, 1, 1400.00, 0, 'Yes', 'Payment Notes', 'master_card', 'Payment Method Notes', NULL, '2022-06-30 13:59:07', '2022-06-30 13:59:07'),
(2, '1', 8, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 510.00, 111, 2500.00, 0, 1, -590.00, 1400, 'Yes', NULL, 'master_card', NULL, NULL, '2022-06-30 14:04:35', '2022-06-30 14:04:35'),
(3, '1', 8, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 510.00, 111, -1200.00, 0, 0, 1120.00, -590, 'Yes', NULL, 'master_card', NULL, NULL, '2022-06-30 14:18:22', '2022-06-30 14:18:22'),
(4, '1', 7, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 1010.00, 111, -10.00, 0, 0, 0.00, 1120, 'Yes', NULL, 'master_card', NULL, NULL, '2022-06-30 14:27:05', '2022-06-30 14:27:05'),
(5, '1', 7, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 40.00, 2540.00, 111, 500.00, 0, 1, 0.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 07:00:59', '2022-07-02 07:00:59'),
(6, '1', 9, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1520.00, 111, 500.00, 0, 1, 0.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 07:02:28', '2022-07-02 07:02:28'),
(7, '1', 8, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 20.00, 0, 1, 0.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 07:06:53', '2022-07-02 07:06:53'),
(8, '1', 8, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 20.00, 0, 1, 1000.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 07:10:38', '2022-07-02 07:10:38'),
(9, '1', 7, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 20.00, 0, 1, 2000.00, 1000, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 07:11:42', '2022-07-02 07:11:42'),
(10, '1', 9, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 40.00, 2040.00, 111, 4500.00, 0, 0, 0.00, 2000, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 07:17:11', '2022-07-02 07:17:11'),
(11, '1', 7, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 1500.00, 0, 1, -480.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 11:36:35', '2022-07-02 11:36:35'),
(12, '1', 7, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 2020.00, 111, 1000.00, 0, 1, 540.00, -480, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 11:37:31', '2022-07-02 11:37:31'),
(13, '1', 8, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 1560.00, 0, 0, 0.00, 540, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 11:38:15', '2022-07-02 11:38:15'),
(14, '1', 9, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 510.00, 111, 10.00, 0, 0, 0.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 12:21:13', '2022-07-02 12:21:13'),
(15, '1', 9, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 20.00, 0, 1, 1000.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 12:21:39', '2022-07-02 12:21:39'),
(16, '1', 7, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 510.00, 111, 2000.00, 0, 1, -490.00, 1000, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 12:21:57', '2022-07-02 12:21:57'),
(17, '1', 8, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 510.00, 111, 10.00, 0, 1, 10.00, -490, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 12:40:43', '2022-07-02 12:40:43'),
(18, '1', 8, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 1010.00, 111, 500.00, 0, 0, 0.00, 10, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 13:00:31', '2022-07-02 13:00:31'),
(19, '1', 7, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 500.00, 111, 500.00, 0, 0, 0.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-02 13:02:31', '2022-07-02 13:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_name` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `service_total_tax` int(11) NOT NULL,
  `service_all_tax` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `service_id`, `service_name`, `quantity`, `discount`, `rate`, `total`, `service_total_tax`, `service_all_tax`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(2, 1, 9, 'Regular Check-up(RC)', 1, 0, 1000, 1000, 10, 10, NULL, NULL, NULL),
(3, 2, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(4, 3, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(5, 4, 9, 'Regular Check-up(RC)', 1, 0, 1000, 1000, 10, 10, NULL, NULL, NULL),
(6, 5, 8, 'Covic-19 test(C9)', 3, 0, 500, 1500, 10, 30, NULL, NULL, NULL),
(7, 5, 9, 'Regular Check-up(RC)', 1, 0, 1000, 1000, 10, 10, NULL, NULL, NULL),
(8, 6, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(9, 6, 9, 'Regular Check-up(RC)', 1, 0, 1000, 1000, 10, 10, NULL, NULL, NULL),
(10, 7, 8, 'Covic-19 test(C9)', 2, 0, 500, 1000, 10, 20, NULL, NULL, NULL),
(11, 8, 8, 'Covic-19 test(C9)', 2, 0, 500, 1000, 10, 20, NULL, NULL, NULL),
(12, 9, 8, 'Covic-19 test(C9)', 2, 0, 500, 1000, 10, 20, NULL, NULL, NULL),
(13, 10, 8, 'Covic-19 test(C9)', 4, 0, 500, 2000, 10, 40, NULL, NULL, NULL),
(14, 11, 8, 'Covic-19 test(C9)', 2, 0, 500, 1000, 10, 20, NULL, NULL, NULL),
(15, 12, 9, 'Regular Check-up(RC)', 2, 0, 1000, 2000, 10, 20, NULL, NULL, NULL),
(16, 13, 8, 'Covic-19 test(C9)', 2, 0, 500, 1000, 10, 20, NULL, NULL, NULL),
(17, 14, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(18, 15, 8, 'Covic-19 test(C9)', 2, 0, 500, 1000, 10, 20, NULL, NULL, NULL),
(19, 16, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(20, 17, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(21, 18, 9, 'Regular Check-up(RC)', 1, 0, 1000, 1000, 10, 10, NULL, NULL, NULL),
(22, 19, 8, 'Covic-19 test(C9)', 1, 10, 500, 490, 10, 10, NULL, NULL, NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_30_192752_create_doctors_table', 1),
(6, '2022_06_01_195252_create_notices_table', 1),
(7, '2022_06_06_151905_create_invoices_table', 1),
(8, '2022_06_14_182925_create_patients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heart_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diabetic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `age`, `gender`, `email`, `blood_group`, `address`, `heart_disease`, `high_blood`, `diabetic`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MD MOHOSIN MIAH', '01773193256', 24, 'Male', 'hamza1610330816@gmail.com', 'B+', 'HOUSE-39, KHAIRTUL, SHATAISH', 'No', 'No', 'No', 'short notes', NULL, '2022-06-30 13:47:29', '2022-06-30 13:47:29');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `description` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `model`, `service_name`, `price`, `tax`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'C9', 'Covic-19 test(C9)', 500, 10, 'Covic-19 test(C9)', NULL, NULL, NULL),
(9, 'RC', 'Regular Check-up(RC)', 1000, 10, 'Regular Check-up(RC)', NULL, NULL, NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
