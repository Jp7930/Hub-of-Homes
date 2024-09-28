-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 09:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hubofhomes`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `username` varchar(30) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `bedrooms` tinyint(3) UNSIGNED DEFAULT NULL,
  `bathrooms` tinyint(3) UNSIGNED DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  `residencetype` varchar(20) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `rent` varchar(10) DEFAULT NULL,
  `short_desc` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `property_name`, `address`, `bedrooms`, `bathrooms`, `area`, `residencetype`, `price`, `rent`, `short_desc`, `description`) VALUES
(1, 'Trovilla Plan in Sereno Canyon - Estate Collection by Toll Brothers', '2861 62nd Ave, Oakland, CA 94605', 3, 1, '1,032', 'Family', '649,900', '850', 'Well-constructed 1562 Sq Ft Home Is Now Offering To You In Uttara For Sale', 'A slider is great way to display a slideshow featuring images or videos, usually on your homepage.\r\n              Adding sliders to your site is no longer difficult. You don’t have to know coding anymore. Just use a slider widget and it will automatically insert the slider on your web page.\r\n              So, the Elementor slider would be a great tool to work with when building a WordPress site.'),
(2, 'Trovilla Plan in Sereno Canyon - Estate Collection by Toll Brothers', '2861 62nd Ave, Oakland, CA 94605', 3, 1, '1,032', 'Family', '649,900', '850', 'Well-constructed 1562 Sq Ft Home Is Now Offering To You In Uttara For Sale', 'A slider is great way to display a slideshow featuring images or videos, usually on your homepage.\r\n              Adding sliders to your site is no longer difficult. You don’t have to know coding anymore. Just use a slider widget and it will automatically insert the slider on your web page.\r\n              So, the Elementor slider would be a great tool to work with when building a WordPress site.'),
(3, 'Trovilla Plan in Sereno Canyon - Estate Collection by Toll Brothers', '2861 62nd Ave, Oakland, CA 94605', 3, 1, '1,032', 'Family', '649,900', '850', 'Well-constructed 1562 Sq Ft Home Is Now Offering To You In Uttara For Sale', 'A slider is great way to display a slideshow featuring images or videos, usually on your homepage.\r\n              Adding sliders to your site is no longer difficult. You don’t have to know coding anymore. Just use a slider widget and it will automatically insert the slider on your web page.\r\n              So, the Elementor slider would be a great tool to work with when building a WordPress site.'),
(4, 'Trovilla Plan in Sereno Canyon - Estate Collection by Toll Brothers', '2861 62nd Ave, Oakland, CA 94605', 3, 1, '1,032', 'Family', '649,900', '850', 'Well-constructed 1562 Sq Ft Home Is Now Offering To You In Uttara For Sale', 'A slider is great way to display a slideshow featuring images or videos, usually on your homepage.\r\n              Adding sliders to your site is no longer difficult. You don’t have to know coding anymore. Just use a slider widget and it will automatically insert the slider on your web page.\r\n              So, the Elementor slider would be a great tool to work with when building a WordPress site.'),
(5, 'Trovilla Plan in Sereno Canyon - Estate Collection by Toll Brothers', '2861 62nd Ave, Oakland, CA 94605', 3, 1, '1,032', 'Family', '649,900', '850', 'Well-constructed 1562 Sq Ft Home Is Now Offering To You In Uttara For Sale', 'A slider is great way to display a slideshow featuring images or videos, usually on your homepage.\r\n              Adding sliders to your site is no longer difficult. You don’t have to know coding anymore. Just use a slider widget and it will automatically insert the slider on your web page.\r\n              So, the Elementor slider would be a great tool to work with when building a WordPress site.'),
(6, 'Trovilla Plan in Sereno Canyon - Estate Collection by Toll Brothers', '2861 62nd Ave, Oakland, CA 94605', 3, 1, '1,032', 'Family', '649,900', '850', 'Well-constructed 1562 Sq Ft Home Is Now Offering To You In Uttara For Sale', 'A slider is great way to display a slideshow featuring images or videos, usually on your homepage.\r\n              Adding sliders to your site is no longer difficult. You don’t have to know coding anymore. Just use a slider widget and it will automatically insert the slider on your web page.\r\n              So, the Elementor slider would be a great tool to work with when building a WordPress site.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenum` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


--
-- Table structure for table `visit_requests`
--

CREATE TABLE `visit_requests` (
  `timeOfRequest` timestamp NULL DEFAULT current_timestamp(),
  `property_id` tinyint(4) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD KEY `username` (`username`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
