-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 04:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@gmail.com', '4b9ff88cb282b788087938cfe3662ce8bea3515c', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `question_attempts`
--

CREATE TABLE `question_attempts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `correct_answer` text NOT NULL,
  `given_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_attempts`
--

INSERT INTO `question_attempts` (`id`, `user_id`, `correct_answer`, `given_answer`) VALUES
(41, 30, 'True', 'True'),
(42, 30, 'John McVie', 'David Tennant'),
(43, 30, 'Markup Language', 'Scripting Language'),
(44, 30, 'Median, Achaemenid, Parthian, Sassanid', ''),
(45, 30, 'True', 'True'),
(46, 30, 'Extreme Dungeons &amp; Dragons', 'Dungeons & Dragons 3.5th edition'),
(47, 30, 'Central Processing Unit', 'Motherboard'),
(48, 30, 'Rex', 'Switch'),
(49, 30, 'Leonard Nimoy', 'Leonard Nimoy'),
(50, 30, 'Michael Jackson ', 'George Michael');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `submitted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `submitted_on`) VALUES
(30, 'nitin@gmail.com', 'Nitin', '2021-07-20 19:32:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_attempts`
--
ALTER TABLE `question_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_attempts_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_attempts`
--
ALTER TABLE `question_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question_attempts`
--
ALTER TABLE `question_attempts`
  ADD CONSTRAINT `question_attempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
