-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 07, 2023 at 03:16 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventy`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `artist_image` varchar(100) NOT NULL,
  `artist_name` varchar(100) NOT NULL,
  `biography` varchar(225) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `artist_image`, `artist_name`, `biography`, `facebook`, `instagram`, `twitter`) VALUES
(1, 'jerryjay.jpeg', 'Jerry Jay', 'Southeast Asian Electronic Musician From Myanmar(Burma)', 'https://www.facebook.com/thejerryjay?mibextid=b06tZ0', 'https://instagram.com/thejerryjay?igshid=MzRlODBiNWFlZA==', 'https://twitter.com/thejerryjay'),
(2, 'fakecake.jpeg', 'Fakecake', 'Electronic Musician From Myanmar(Burma)', 'https://www.facebook.com/fakecakeofficial?mibextid=b06tZ0', 'https://instagram.com/fakecakeofficial?igshid=MzRlODBiNWFlZA==', 'https://twitter.com/fakecakemusic_?lang=en'),
(3, 'ouj.jpeg', 'OU J', 'DJ & Music Producer From Myanmar(Burma)', '-https://www.facebook.com/oujofficial?mibextid=b06tZ0', 'https://instagram.com/oujartist?igshid=MzRlODBiNWFlZA==', ''),
(4, 'y3llo.jpeg', 'Y3LLO', 'DJ & Music Producer ', 'https://www.facebook.com/y3llomusicofficial?mibextid=b06tZ0', 'https://instagram.com/y3llomusicofficial?igshid=MzRlODBiNWFlZA==', 'https://twitter.com/y3llo_official?lang=zh-Hant'),
(5, 'terrorbass.jpeg', 'Terror Bass', 'Electronic Music Producers,Sailus & LZ From Myanmar(Burma)\r\n', 'https://www.facebook.com/ItsTerrorBass?mibextid=b06tZ0', 'https://instagram.com/terrorbassmusic?igshid=MzRlODBiNWFlZA==', 'https://twitter.com/terror_bass'),
(6, 'eternalgosh.jpeg', 'Eternal Gosh', 'Musician/Band', 'https://www.facebook.com/eternalgoshfamily?mibextid=b06tZ0', 'https://instagram.com/eternal_gosh?igshid=MzRlODBiNWFlZA==', ''),
(7, 'zig.jpeg', 'ZIG', 'Musician/Band', 'https://www.facebook.com/zigmusicofficial?mibextid=b06tZ0', 'https://instagram.com/zigdgafxxk?igshid=MzRlODBiNWFlZA==', ''),
(8, 'yunghugo.jpeg', 'Yung Hugo', 'Rapper', 'https://www.facebook.com/yungislivingthing?mibextid=b06tZ0', 'https://instagram.com/yungislivingthing?igshid=MzRlODBiNWFlZA==', ''),
(9, 'food-court.jpg', 'M Food Court', 'Dine-in resturant', 'https://www.facebook.com/MFoodCourt.ygn/', '', ''),
(10, 'xpay.jpg', 'fadf', 'adfdf', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(60) NOT NULL,
  `artist_id` varchar(20) NOT NULL,
  `attendance` varchar(20) NOT NULL,
  `fees` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image`, `title`, `category`, `artist_id`, `attendance`, `fees`, `date`, `starttime`, `endtime`) VALUES
(1, 'IMG_2008.jpeg', 'Raw Music Festival ', ' Music Event', '5', '200', '40000MMK', '2023-03-04', '15:00:00', '23:00:00'),
(2, 'IMG_2005.jpeg', 'Invasion Festival', 'Music Event', '4', '60', '60000MMK', '2023-10-07', '16:00:00', '23:00:00'),
(3, 'IMG_2006.jpeg', 'MONOCHROME Chapter 2', 'Music Event', '1', '100', '50000MMK', '2023-09-09', '16:00:00', '23:00:00'),
(4, 'IMG_2011.jpeg', 'A Night In Yangon With Beforeigo', 'Food Festival ', '9', '80', '35000MMK', '2023-09-30', '14:00:00', '19:00:00'),
(5, 'IMG_2007.jpeg', 'MONOCHROME Chapter 1', 'Music Event', '2', '200', '50000MMK', '2023-02-17', '22:00:00', '04:00:00'),
(6, 'IMG_2004.jpeg', 'The Concert ', 'Music Event', '6', '40', '30000MMK', '2023-08-05', '19:00:00', '23:00:00'),
(7, 'IMG_2005.jpeg', 'Invasion Festival ', 'Music Event', '3', '150', '40000MMK', '2022-08-31', '15:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'test', 'test'),
(2, 'admin', 'admin'),
(3, 'admin', 'admin'),
(4, 'staff', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
