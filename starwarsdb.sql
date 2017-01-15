-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2017 at 02:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starwarsdb`
--
CREATE DATABASE IF NOT EXISTS `starwarsdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `starwarsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

DROP TABLE IF EXISTS `artikal`;
CREATE TABLE `artikal` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` text COLLATE utf8_slovenian_ci NOT NULL,
  `cijena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`id`, `naziv`, `opis`, `cijena`) VALUES
(1, 'Stormtrooper poster', 'A stormtrooper is a fictional soldier in the Star Wars franchise created by George Lucas. ', 5),
(2, 'Darth Vader kostim', 'Darth Vader, also known by his birth name Anakin Skywalker, is a fictional character in the Star Wars film franchise.', 50),
(3, 'Jabba the Hutt kostim', 'Jabba the Hutt was one of the galaxy’s most powerful gangsters, with far-reaching influence in both politics and the criminal underworld.', 55);

-- --------------------------------------------------------

--
-- Table structure for table `osoba`
--

DROP TABLE IF EXISTS `osoba`;
CREATE TABLE `osoba` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `uloga` varchar(10) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `osoba`
--

INSERT INTO `osoba` (`id`, `ime`, `prezime`, `email`, `password`, `uloga`) VALUES
(2, 'Admin', 'Admin', 'admin@admin.com', '98b347ae0606d2d1bc2c4e19fe3f3db3', 'admin'),
(3, 'Bruce', 'Dickinson', 'bruced@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'sef'),
(24, 'Lejla', 'Zecevic', 'lejla@gmail.com', 'df3c496edbd8121b6bb7149ad2b96fb0', 'user'),
(25, 'Ellie', 'Goulding', 'elgo@popmusic.com', '81b03a352693413fc7d91411400ae72a', 'sef'),
(27, 'Nermin', 'Puskar', 'npusko@gmail.com', '3ae42522f7f6c51c0e3328269d0e1e4a', 'sef'),
(28, 'Frodo', 'Baggins', 'frodob@lotr.com', 'f92c4644b194b5872df6971e18f638ca', 'sef');

-- --------------------------------------------------------

--
-- Table structure for table `poslovnica`
--

DROP TABLE IF EXISTS `poslovnica`;
CREATE TABLE `poslovnica` (
  `id` int(11) NOT NULL,
  `adresa` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `telefon` varchar(12) COLLATE utf8_slovenian_ci NOT NULL,
  `sef` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `poslovnica`
--

INSERT INTO `poslovnica` (`id`, `adresa`, `telefon`, `sef`) VALUES
(1, 'Zmaja od Bosne bb', '033 234 567', 3),
(7, 'Semira Fraste 7', '033 556 777', 25),
(8, 'Trg Grada Prato 2', '033 667 888', 27);

-- --------------------------------------------------------

--
-- Table structure for table `skladiste`
--

DROP TABLE IF EXISTS `skladiste`;
CREATE TABLE `skladiste` (
  `id` int(11) NOT NULL,
  `poslovnica` int(11) NOT NULL,
  `artikal` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `skladiste`
--

INSERT INTO `skladiste` (`id`, `poslovnica`, `artikal`, `kolicina`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 2),
(3, 8, 3, 10),
(4, 7, 1, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikal`
--
ALTER TABLE `artikal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poslovnica`
--
ALTER TABLE `poslovnica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sef` (`sef`);

--
-- Indexes for table `skladiste`
--
ALTER TABLE `skladiste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poslovnica` (`poslovnica`),
  ADD KEY `artikal` (`artikal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `osoba`
--
ALTER TABLE `osoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `poslovnica`
--
ALTER TABLE `poslovnica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `skladiste`
--
ALTER TABLE `skladiste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `poslovnica`
--
ALTER TABLE `poslovnica`
  ADD CONSTRAINT `poslovnica_ibfk_1` FOREIGN KEY (`sef`) REFERENCES `osoba` (`id`);

--
-- Constraints for table `skladiste`
--
ALTER TABLE `skladiste`
  ADD CONSTRAINT `skladiste_ibfk_1` FOREIGN KEY (`poslovnica`) REFERENCES `poslovnica` (`id`),
  ADD CONSTRAINT `skladiste_ibfk_2` FOREIGN KEY (`artikal`) REFERENCES `artikal` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
