-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 03:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tummy_mummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `flag`, `created_at`) VALUES
(1, 'Master Admin', 'admin@tummymummy.com', '$2y$10$pSEdSnmlRZiVEJDoqh0SXemUj2yDABjng4Z2ABVcOohMOq.pUMfOq', 1, 1, '2023-07-25 06:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `navigation_bar`
--

CREATE TABLE `navigation_bar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(55) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `icon` varchar(55) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation_bar`
--

INSERT INTO `navigation_bar` (`id`, `menu`, `slug`, `icon`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'User Management', 'user_management', 'mdi-account-circle', 1, '2022-12-26 13:31:56', NULL),
(24, 'Test', 'test', 'mdi-chemical-weapon', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `navigation_inner_inner_menu`
--

CREATE TABLE `navigation_inner_inner_menu` (
  `id` int(11) NOT NULL,
  `navigation_id` int(11) NOT NULL,
  `navigation_inner_id` int(11) NOT NULL,
  `inner_inner_menu` varchar(55) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navigation_inner_inner_menu`
--

INSERT INTO `navigation_inner_inner_menu` (`id`, `navigation_id`, `navigation_inner_id`, `inner_inner_menu`, `slug`, `flag`, `created_at`, `updated_at`) VALUES
(1, 5, 22, 'Product Destruction', 'product_destruction', 0, '2023-05-31 10:05:46', '2023-05-31 10:05:46'),
(2, 5, 22, 'Waste Collection', 'waste_collection', 0, '2023-05-31 10:05:46', '2023-05-31 10:05:46'),
(3, 5, 22, 'Godown Expenses', 'godown_expenses', 0, '2023-05-31 10:05:46', '2023-05-31 10:05:46'),
(4, 5, 22, 'Scrap Collection', 'scrap_collection', 0, '2023-05-31 10:05:46', '2023-05-31 10:05:46'),
(5, 5, 22, 'Transpotation Service', 'transport_service', 0, '2023-05-31 10:05:46', '2023-05-31 10:05:46'),
(6, 5, 22, 'Rental Truck', 'rental_truck', 0, '2023-05-31 10:05:46', '2023-05-31 10:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `navigation_inner_menu`
--

CREATE TABLE `navigation_inner_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navigation_id` int(11) NOT NULL,
  `inner_menu` varchar(55) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation_inner_menu`
--

INSERT INTO `navigation_inner_menu` (`id`, `navigation_id`, `inner_menu`, `slug`, `flag`, `created_at`, `updated_at`) VALUES
(1, 1, 'Roles', 'role', 1, NULL, NULL),
(2, 1, 'Users', 'users', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `flag`, `created_at`) VALUES
(1, 'Master Admin', 1, '2023-07-24 12:47:04'),
(7, 'Sub Admin', 1, '2023-07-26 11:15:29'),
(8, 'Sub Admin1', 1, '2023-07-26 11:19:19'),
(9, 'Sub Admin13', 1, '2023-07-26 11:19:28'),
(10, 'Sub Admin 355', 1, '2023-07-26 11:30:09'),
(11, 'Sub Admin 355', 1, '2023-07-26 11:42:19'),
(12, 'subadmin123', 1, '2023-07-26 11:53:12'),
(13, 'subadmin12346', 1, '2023-07-26 12:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu` varchar(10) NOT NULL,
  `nav_id` varchar(11) NOT NULL,
  `read_per` int(11) DEFAULT 0,
  `write_per` int(11) NOT NULL DEFAULT 0,
  `flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation_bar`
--
ALTER TABLE `navigation_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation_inner_inner_menu`
--
ALTER TABLE `navigation_inner_inner_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation_inner_menu`
--
ALTER TABLE `navigation_inner_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `navigation_bar`
--
ALTER TABLE `navigation_bar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `navigation_inner_inner_menu`
--
ALTER TABLE `navigation_inner_inner_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `navigation_inner_menu`
--
ALTER TABLE `navigation_inner_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
