-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 11:23 AM
-- Server version: 5.7.14
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmps`
--

CREATE TABLE `cmps` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cmp` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmps`
--

INSERT INTO `cmps` (`id`, `name`, `cmp`, `username`, `fullname`) VALUES
(1, 'f', 'f', 'admin', 'Mahantesh Kumbar');

-- --------------------------------------------------------

--
-- Table structure for table `room_rental_registrations`
--

CREATE TABLE `room_rental_registrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternat_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plot_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rooms` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accommodation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_for_sharing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacant` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_rental_registrations`
--

INSERT INTO `room_rental_registrations` (`id`, `fullname`, `mobile`, `alternat_mobile`, `email`, `country`, `state`, `city`, `landmark`, `rent`, `sale`, `deposit`, `plot_number`, `rooms`, `address`, `accommodation`, `description`, `image`, `open_for_sharing`, `other`, `vacant`, `created_at`, `updated_at`, `user_id`) VALUES
(13, 'Nithish Kumar', '2345676567', '98888787', 'admin@admin.com', 'india', 'karnataka', 'Belagavi', 'aaaaaa', '3', '12', '3', '78 nh', '2bhk', 'dsdsd', '4', 'dssd', 'uploads/', NULL, 'zx', 0, '2018-02-16 12:21:43', '2018-02-16 12:21:43', 1),
(14, 'Ram', '2345676997', '', 'chet@gmrail.com', 'india', 'karnataka', 'Belagavi', '', '1232', '12', '33333', '78 nh', '1bhk', 'port road bgm', '', '', 'uploads/', NULL, NULL, 1, '2018-03-09 05:06:43', '2018-03-09 05:06:43', 2),
(15, 'aaa', '2222222222', '', 'admin@admmmin.com', 'india', 'karnataka', 'Belagavi', '', '1232', '12666', '33333', '78 nh', '1bhk', 'port road bgm', 'wifi,pridge', 'good to see', 'uploads/Penguins.jpg', NULL, NULL, 1, '2018-04-04 11:19:09', '2018-04-04 11:19:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_rental_registrations_apartment`
--

CREATE TABLE `room_rental_registrations_apartment` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternat_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plot_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_number_of_plats` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rooms` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `own` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accommodation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_for_sharing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacant` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_rental_registrations_apartment`
--

INSERT INTO `room_rental_registrations_apartment` (`id`, `fullname`, `mobile`, `alternat_mobile`, `email`, `country`, `state`, `city`, `landmark`, `rent`, `deposit`, `plot_number`, `apartment_name`, `ap_number_of_plats`, `rooms`, `floor`, `purpose`, `own`, `area`, `address`, `accommodation`, `description`, `image`, `open_for_sharing`, `other`, `vacant`, `created_at`, `updated_at`, `user_id`) VALUES
(3, 'Nithish', '2345676567', '', 'admin@admddin.com', 'india', 'karnataka', 'Belagavi', 'near ramdev', '1212', '22222', '78 nh', 'mant apartment', '101', '2bhk', '2nd', 'Residential', 'rented', '1sqr feet', 'port road bgm', 'wifi', 'well ', 'uploads/Jellyfish.jpg', NULL, NULL, 1, '2018-04-04 11:20:56', '2018-04-04 11:20:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `mobile`, `username`, `email`, `password`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'Nithish Kumar', '9879879787', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'admin', 1),
(2, 'Nithish Kumar', '56456565', 'manu', 'mant1@gmail.com', '9aee390f19345028f03bb16c588550e1', '2018-02-08 06:53:53', '2018-02-08 06:53:53', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmps`
--
ALTER TABLE `cmps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_rental_registrations`
--
ALTER TABLE `room_rental_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_rental_registrations_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `room_rental_registrations_email_unique` (`email`);

--
-- Indexes for table `room_rental_registrations_apartment`
--
ALTER TABLE `room_rental_registrations_apartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmps`
--
ALTER TABLE `cmps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `room_rental_registrations`
--
ALTER TABLE `room_rental_registrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `room_rental_registrations_apartment`
--
ALTER TABLE `room_rental_registrations_apartment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
