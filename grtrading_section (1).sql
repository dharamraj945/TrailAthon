-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 05:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grtrading_section`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_section`
--

CREATE TABLE `assigned_section` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned_section`
--

INSERT INTO `assigned_section` (`id`, `page_id`, `section_id`, `created_date`, `Updated_date`) VALUES
(17, 25, 8, '2023-12-13 19:34:16', '2023-12-13 19:34:16'),
(18, 26, 7, '2023-12-15 17:11:25', '2023-12-15 17:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(200) NOT NULL,
  `page_handler` varchar(200) NOT NULL,
  `page_sequence` int(11) NOT NULL,
  `assign_sectiona` varchar(200) NOT NULL,
  `page_status` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_handler`, `page_sequence`, `assign_sectiona`, `page_status`, `created_date`, `updated_date`) VALUES
(26, 'This Page is About New Section', 'this-page-is-about-new-section', 0, '7', 0, '2023-12-15 17:11:25', '2023-12-15 17:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `section_content`
--

CREATE TABLE `section_content` (
  `sno` int(11) NOT NULL,
  `content_title` varchar(500) NOT NULL,
  `content_desc` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content_seq` int(11) NOT NULL DEFAULT 0,
  `content_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_content`
--

INSERT INTO `section_content` (`sno`, `content_title`, `content_desc`, `created_date`, `Updated_date`, `content_seq`, `content_status`) VALUES
(7, 'Floral Tulip Slim Phone Case Cover', '%3Cul%3E%3Cli%3EHigh+quality+printing%3C%2Fli%3E%3Cli%3EFree+access+to+buttons%3C%2Fli%3E%3Cli%3EAll+side+design%3C%2Fli%3E%3Cli%3E%3Cstrong%3EEligible+For+Cash+On+Delivery%3C%2Fstrong%3E%3C%2Fli%3E%3Cli%3EDesigns+Are+Exactly+Same+As+Shown%3C%2Fli%3E%3Cli%3EImpact+Resistant+and+Highly+Durable+Polycarbonate.%26nbsp%3BDurable+Hard+Plastic+Case+with+Matte+Finish%3C%2Fli%3E%3Cli%3ENeed+Help+Placing+Order+Whatsapp+Us+9266887788%3C%2Fli%3E%3C%2Ful%3E', '2023-12-13 18:57:28', '2023-12-13 18:57:28', 0, 0),
(8, 'Flutterby Floral Slim Phone Case Cover', '%3Cul%3E%3Cli%3EHigh+quality+printing%3C%2Fli%3E%3Cli%3EFree+access+to+buttons%3C%2Fli%3E%3Cli%3EAll+side+design%3C%2Fli%3E%3Cli%3E%3Cstrong%3EEligible+For+Cash+On+Delivery%3C%2Fstrong%3E%3C%2Fli%3E%3Cli%3EDesigns+Are+Exactly+Same+As+Shown%3C%2Fli%3E%3Cli%3EImpact+Resistant+and+Highly+Durable+Polycarbonate.%26nbsp%3BDurable+Hard+Plastic+Case+with+Matte+Finish%3C%2Fli%3E%3Cli%3ENeed+Help+Placing+Order+Whatsapp+Us+9266887788%3C%2Fli%3E%3C%2Ful%3E%3Cp%3EShare%3C%2Fp%3E%3Cp%3EActual+Product+Slightly+Different+Form+Digital+Images%3C%2Fp%3E', '2023-12-13 18:57:53', '2023-12-13 18:57:53', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `section_menu`
--

CREATE TABLE `section_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `menu_handler` varchar(200) NOT NULL,
  `menu_type` int(200) NOT NULL DEFAULT 0,
  `menu_action` varchar(500) NOT NULL,
  `menu_action_type` varchar(200) NOT NULL,
  `menu_status` int(11) NOT NULL,
  `menu_seq` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_menu`
--

INSERT INTO `section_menu` (`id`, `menu_name`, `menu_handler`, `menu_type`, `menu_action`, `menu_action_type`, `menu_status`, `menu_seq`, `created_date`, `updated_date`) VALUES
(49, 'Contact Us', 'contact-us', 1, '26', '0', 1, 1, '2023-12-15 18:07:52', '2023-12-15 18:07:52'),
(50, 'Gallary', 'gallary', 0, 'https://www.youtube.com/watch?v=jLHpTVLifMk', '1', 0, 2, '2023-12-15 18:08:11', '2023-12-15 18:08:11'),
(51, 'About US', 'about-us', 1, 'https://www.youtube.com/watch?v=4KT6VVGQPF0&list=RD0fLTVWJmMzA&index=27', '1', 1, 10, '2023-12-15 18:17:07', '2023-12-15 18:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_pwd` varchar(300) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0,
  `user_type` int(11) DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_mobile`, `user_pwd`, `user_status`, `user_type`, `created_date`, `updated_date`) VALUES
(1, 'Dharmraj Kumar', 'kumardharamraj2017@gmail.com', '8851096421 ', '123', 0, 0, '2023-10-09 10:02:04', '2023-10-10 11:09:48'),
(4, 'dharamraj', 'kunal8851@gmail.com', '8851096421', '1234', 0, 0, '2023-10-09 12:11:29', '2023-10-10 13:22:10'),
(5, 'kunal k', 'kk@gmail.com', '9910706197', 'djdrmrajx8851', 0, 0, '2023-10-09 12:12:48', '2023-10-10 10:35:36'),
(6, 'kunal', 'kdk@gmail.com', '9910706197', '58', 0, 0, '2023-10-09 12:13:03', '2023-10-09 17:43:03'),
(7, 'Bad Boy', 'BadBoy@gmail.com', '123456789', '123', 0, 0, '2023-10-14 16:45:52', '2023-10-14 22:15:52'),
(8, 'kanika', 'kanika@gmail.com', '7290873574', 'kanika@8851', 0, 0, '2023-11-05 09:39:28', '2023-11-05 15:09:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_section`
--
ALTER TABLE `assigned_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_content`
--
ALTER TABLE `section_content`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `section_menu`
--
ALTER TABLE `section_menu`
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
-- AUTO_INCREMENT for table `assigned_section`
--
ALTER TABLE `assigned_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `section_content`
--
ALTER TABLE `section_content`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `section_menu`
--
ALTER TABLE `section_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
