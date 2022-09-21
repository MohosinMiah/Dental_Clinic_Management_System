-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 09:32 PM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` int(11) DEFAULT 0,
  `patient_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isRegistered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `patient_phone`, `name`, `date`, `time`, `gender`, `email`, `doctor_id`, `note`, `isRegistered`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '01773193256', 'MD MOHOSIN MIAH 111', '2022-07-14', '02:38', 'Male', NULL, 3, 'This is notes 111', 'Yes', NULL, '2022-07-08 13:38:17', '2022-07-12 08:17:21'),
(2, 2, '01857126452', 'Hamza Khan', '2022-07-22', '05:34', 'Male', NULL, 3, 'This is ID 2 Updated', 'Yes', NULL, '2022-07-08 14:34:08', '2022-07-12 08:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `authentications`
--

CREATE TABLE `authentications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `profile_pic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authentications`
--

INSERT INTO `authentications` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `otp`, `role`, `profile_pic`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'MD MOHOSIN MIAH 111', '01857126452', 'hamza1610330816@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', NULL, '3', '1657977201_monkeykingBDNinja.JPG', NULL, '2022-07-16 03:55:57', '2022-07-16 13:07:27'),
(6, 'MD MOHOSIN MIAH 111', '01773193256', 'testmohosin@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', NULL, '3', '1657977201_monkeykingBDNinja.JPG', NULL, '2022-07-16 03:55:57', '2022-07-16 07:13:21');

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

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `phone`, `email`, `designation`, `personal_home_page`, `degress`, `department`, `specialist`, `experience`, `date_of_birth`, `gender`, `blood_group`, `address`, `about_me`, `profile_pic`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 'MD MOHOSIN MIAH', '01857126452', 'hamza1610330816@gmail.com', 'Jr.Software Engineer', 'www.google.com', 'Degress', 'Dental', 'Rootcanel', NULL, '1997-10-05', 'Male', 'A+', 'HOUSE-39, KHAIRTUL, SHATAISH, TONGI, GAZIPUR, TONGI WEST, ERSHAD NAGAR - 1712, GAZIPUR', 'This is MD MOHOSIN MIAH', '1657965357_monkeykingBD.JPG', '123', NULL, '2022-07-16 03:55:57', '2022-07-16 03:55:57');

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
  `total_discount` int(11) DEFAULT 0,
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

INSERT INTO `invoices` (`id`, `patient_id`, `doctor_id`, `added_by_id`, `patient_phone`, `patient_name`, `patient_address`, `payment_date`, `total`, `tax_total`, `grand_total`, `total_payment`, `paid_amount`, `total_discount`, `decrease`, `isClose`, `due_total`, `previous_due`, `isRegistered`, `payment_note`, `payment_method`, `payment_method_note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(27, '1', 9, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 20.00, 0, 0, 1, 1000.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-03 12:38:27', '2022-07-03 12:38:27'),
(28, '2', 7, NULL, '01857126452', 'Hamza Khan', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 410.00, 111, 10.00, 100, 0, 1, 400.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-03 12:39:04', '2022-07-03 12:39:04'),
(29, '1', 10, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 510.00, 111, 1500.00, 0, 200, 0, 0.00, 1000, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-03 12:40:59', '2022-07-03 12:40:59'),
(30, '2', 9, NULL, '01857126452', 'Hamza Khan', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 1500.00, 0, 0, 1, -480.00, 0, 'No', NULL, 'master_card', NULL, NULL, '2022-07-03 12:41:29', '2022-07-03 12:45:19'),
(31, '2', 8, NULL, '01857126452', 'Hamza Khan', 'Dhaka', '2022-06-06', 0.00, 10.00, 510.00, 111, 0.00, 0, 0, 0, 0.00, -590, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-03 12:41:55', '2022-07-03 12:41:55'),
(32, '1', 9, NULL, '01773193256', 'MD MOHOSIN MIAH', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 20.00, 1020.00, 111, 1000.00, 0, 0, 1, 20.00, 0, 'No', NULL, 'master_card', NULL, NULL, '2022-07-03 12:46:12', '2022-07-03 12:47:07'),
(33, '2', 9, NULL, '01857126452', 'Hamza Khan', 'HOUSE-39, KHAIRTUL, SHATAISH', '2022-06-06', 0.00, 10.00, 510.00, 111, 10.00, 0, 0, 1, 500.00, 0, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-16 03:05:02', '2022-07-16 03:05:02'),
(34, '2', 8, NULL, '01857126452', 'Hamza Khan', 'Dhaka', '2022-06-06', 0.00, 10.00, 510.00, 111, 1000.00, 0, 10, 0, 0.00, 500, 'Yes', NULL, 'master_card', NULL, NULL, '2022-07-16 03:06:11', '2022-07-16 03:06:11');

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
(35, 27, 8, 'Covic-19 test(C9)', 2, 0, 500, 1000, 10, 20, NULL, NULL, NULL),
(36, 28, 8, 'Covic-19 test(C9)', 1, 100, 500, 400, 10, 10, NULL, NULL, NULL),
(37, 29, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(39, 31, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(40, 30, 8, 'Covic-19 test(C9)', 2, 0, 500, 1000, 10, 20, NULL, NULL, NULL),
(43, 32, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(44, 32, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(45, 33, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL),
(46, 34, 8, 'Covic-19 test(C9)', 1, 0, 500, 500, 10, 10, NULL, NULL, NULL);

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
(8, '2022_06_14_182925_create_patients_table', 1),
(9, '2022_07_04_161709_create_appointments_table', 2),
(10, '2022_07_12_174739_create_authentications_table', 3);

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
(1, 'MD MOHOSIN MIAH', '01773193256', 24, 'Male', 'hamza1610330816@gmail.com', 'B+', 'HOUSE-39, KHAIRTUL, SHATAISH', 'No', 'No', 'No', 'short notes', NULL, '2022-06-30 13:47:29', '2022-06-30 13:47:29'),
(2, 'Hamza Khan', '01857126452', 30, 'Male', 'hamza161033@gmail.com', 'B+', NULL, 'No', 'No', 'No', NULL, NULL, '2022-07-03 08:43:06', '2022-07-03 08:43:06');

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
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 3,
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
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authentications`
--
ALTER TABLE `authentications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authentications_phone_unique` (`phone`),
  ADD UNIQUE KEY `authentications_email_unique` (`email`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authentications`
--
ALTER TABLE `authentications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
