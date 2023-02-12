-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 10:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kriviccnnadella`
--
CREATE DATABASE IF NOT EXISTS `kriviccnnadella` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `kriviccnnadella`;

-- --------------------------------------------------------

--
-- Table structure for table `krivicnodelo`
--
DROP TABLE IF EXISTS `krivicnodelo`; 

CREATE TABLE `krivicnodelo` (
  `id` bigint(20) NOT NULL,
  `osudjenik` bigint(20) NOT NULL,
  `datum` date DEFAULT NULL,
  `nazivDela` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `krivicnodelo`
--

INSERT INTO `krivicnodelo` (`id`, `osudjenik`, `datum`, `nazivDela`) VALUES
(1, 1, '2020-01-08', 'krivicno delo protiv života i tela'),
(2, 2, '2022-02-02', 'krivicno ddelo protiv imovine'),
(3, 6, '2021-05-09', 'krivicno delo protiv polne slobode'),
(4, 5, '2022-01-01', 'ubijanje i zlostavljanje životinja');

-- --------------------------------------------------------

--
-- Table structure for table `osudjenik`
--
DROP TABLE IF EXISTS `osudjenik`; 

CREATE TABLE `osudjenik` (
  `id` bigint(20) NOT NULL,
  `imePrezime` varchar(40) DEFAULT NULL,
  `sudija` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `osudjenik`
--

INSERT INTO `osudjenik` (`id`, `imePrezime`, `sudija`) VALUES
(1, 'Momcilo Momic', 1),
(2, 'Pavle Pavlovic', 1),
(3, 'Bozidar Savic', 3),
(4, 'Marija Jovanovic', 4),
(5, 'Dunja Djordjevic', 4),
(6, 'Nadja Ignjatovic', 3),
(7, 'Sasa Gogic', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sudija`
--
DROP TABLE IF EXISTS `sudija`;

CREATE TABLE `sudija` (
  `id` bigint(20) NOT NULL,
  `imePrezime` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sudija`
--

INSERT INTO `sudija` (`id`, `imePrezime`) VALUES
(1, 'Marija Antonijevic'),
(2, 'Ivan Lesnjak'),
(3, 'Ilija Trifunovic'),
(4, 'Gordana Milojevic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `krivicnodelo`
--
ALTER TABLE `krivicnodelo`
  ADD PRIMARY KEY (`id`,`osudjenik`),
  ADD KEY `osudjenik` (`osudjenik`);

--
-- Indexes for table `osudjenik`
--
ALTER TABLE `osudjenik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sudija` (`sudija`);

--
-- Indexes for table `sudija`
--
ALTER TABLE `sudija`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `krivicnodelo`
--
ALTER TABLE `krivicnodelo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `osudjenik`
--
ALTER TABLE `osudjenik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sudija`
--
ALTER TABLE `sudija`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `krivicnodelo`
--
ALTER TABLE `krivicnodelo`
  ADD CONSTRAINT `krivicnodelo_osudjenik_fk` FOREIGN KEY (`osudjenik`) REFERENCES `osudjenik` (`id`);

--
-- Constraints for table `osudjenik`
--
ALTER TABLE `osudjenik`
  ADD CONSTRAINT `osudjenik_suija_fk` FOREIGN KEY (`sudija`) REFERENCES `sudija` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
