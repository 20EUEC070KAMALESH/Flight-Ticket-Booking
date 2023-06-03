-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2023 at 02:26 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `flight_id` int NOT NULL,
  `no_of_tickets` int NOT NULL,
  `flight_detail_id` bigint UNSIGNED NOT NULL,
  `mode_of_payment` varchar(20) NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `flight_id`, `no_of_tickets`, `flight_detail_id`, `mode_of_payment`, `amount`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2, 1, 4, 1, 'online', 10000, '0000-00-00 00:00:00', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `city` varchar(20) NOT NULL,
  `city_shortcode` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `city`, `city_shortcode`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'chennai', 'che', '0000-00-00 00:00:00', NULL, 0, NULL),
(2, 'BANGALORE', 'BLR', '2023-06-03 05:18:26', NULL, 0, NULL),
(3, 'Mumbai', 'MUB', '0000-00-00 00:00:00', NULL, 0, NULL),
(4, 'DELHI', 'DEL', '0000-00-00 00:00:00', NULL, 0, NULL),
(5, 'KERALA', 'KLR', '0000-00-00 00:00:00', NULL, 0, NULL),
(6, 'ANDHRA PRADESH', 'AP', '0000-00-00 00:00:00', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fare_details`
--

DROP TABLE IF EXISTS `fare_details`;
CREATE TABLE IF NOT EXISTS `fare_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `flight_id` int NOT NULL,
  `depature_date` timestamp NOT NULL,
  `fare_amount` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fare_details`
--

INSERT INTO `fare_details` (`id`, `flight_id`, `depature_date`, `fare_amount`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '2023-06-03 08:48:05', 9500, '2023-06-03 08:48:05', NULL, 0, NULL),
(2, 1, '2023-06-04 18:30:00', 8500, '2023-06-03 08:49:20', NULL, 0, NULL),
(3, 1, '2023-06-08 09:06:43', 7000, '2023-06-03 09:06:43', NULL, 0, NULL),
(4, 1, '2023-06-12 09:07:03', 5000, '2023-06-03 08:46:15', NULL, 0, NULL),
(5, 1, '2023-06-15 09:07:23', 4750, '2023-06-03 08:46:06', NULL, 0, NULL),
(6, 1, '2023-06-18 09:07:35', 3500, '2023-06-03 08:45:56', NULL, 0, NULL),
(7, 1, '2023-06-21 09:07:41', 2500, '2023-06-03 08:45:47', NULL, 0, NULL),
(8, 4, '2023-06-04 18:30:00', 3500, '0000-00-00 00:00:00', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `flight_name` varchar(20) NOT NULL,
  `flight_shortcode` varchar(10) NOT NULL,
  `company_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_seats` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `flight_name`, `flight_shortcode`, `company_name`, `no_of_seats`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Air Asia', 'ASA', 'AIR ASIA', 60, '2023-06-03 06:50:56', NULL, 0, NULL),
(2, 'GOFIRST', 'GOW', 'Go Air', 60, '2023-06-03 06:57:06', NULL, 0, NULL),
(3, 'AIRINDIA', 'AIC', 'Air India', 60, '0000-00-00 00:00:00', NULL, 0, NULL),
(4, 'SPICEJET', 'SEJ', 'Spice Jet', 60, '0000-00-00 00:00:00', NULL, 0, NULL),
(5, 'AKSHARASIR', 'AKE', 'Akshara Air', 60, '0000-00-00 00:00:00', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flights_details`
--

DROP TABLE IF EXISTS `flights_details`;
CREATE TABLE IF NOT EXISTS `flights_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `depature_id` bigint NOT NULL,
  `arrival_id` bigint NOT NULL,
  `flight_id` int NOT NULL,
  `depature_date` timestamp NOT NULL,
  `arrival_date` timestamp NOT NULL,
  `depature_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `total_hours` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flights_details`
--

INSERT INTO `flights_details` (`id`, `depature_id`, `arrival_id`, `flight_id`, `depature_date`, `arrival_date`, `depature_time`, `arrival_time`, `total_hours`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2, 5, 1, '2023-06-02 18:30:00', '2023-06-02 18:30:00', '16:50:00', '18:50:00', 0, '0000-00-00 00:00:00', NULL, 0, NULL),
(2, 3, 5, 4, '2023-06-04 18:30:00', '2023-06-04 18:30:00', '10:00:00', '17:00:00', 420, '0000-00-00 00:00:00', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(10) NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `created_by` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `active_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin', 1, '2023-06-02 17:58:45', 0, NULL, NULL),
(2, 'user', 1, '2023-06-02 17:59:23', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint NOT NULL DEFAULT '2',
  `user_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `adhar_id` bigint NOT NULL,
  `passport_no` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `user_name`, `password`, `mobile`, `email_id`, `address`, `adhar_id`, `passport_no`, `pass`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'admin', '$2y$10$DJ3R2UXuR1HrKySsMTXUwe9xXbBwRqlWeE.YO9rcZizzY0grDURnC', 0, 'admin@admin.com', '', 1234567890123456, 'rwrrwtrwtwr', 'admin@123', '2023-06-02 18:10:04', NULL, 0, NULL),
(2, 2, 'kamalesh', '', 7904530662, 'admin@admin.com', '18/2,Bangaru Street', 3473483834, 'jsdhisdisjid', '', '0000-00-00 00:00:00', NULL, 0, NULL),
(3, 2, 'dheva', '$2y$10$4NgqbJQEPobmTOEXV.WyHOlasXoq.Py/VHGQrcbE14buqP5S58y1i', 7904530662, 'admin@admin.com', '18/2,Bangaru Street', 943423202, 'dssndksdsnksak', '', '2023-06-03 12:52:46', NULL, 0, NULL),
(4, 2, 'jithish', '$2y$10$s/EH8k1OhU8NRamh37T59.c.zQhqJ.OXUamhSnKlW3Grk2ClmzCmy', 87434300922, '20euec070@skcet.ac.in', '!8/22,banfaru street,bodinayakur', 943423202, 'sjdsjdnsdknk', '', '2023-06-03 12:53:02', NULL, 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
