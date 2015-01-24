-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2013 at 03:35 PM
-- Server version: 5.1.66
-- PHP Version: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ordinacija`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `ordinacija`;

USE `ordinacija`;

--
-- Table structure for table `dnevnik`
--

CREATE TABLE IF NOT EXISTS `dnevnik` (
  `korisnicko_ime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `datum` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `trajanje` int(11) NOT NULL,
  `intenzitet` int(11) NOT NULL,
  `terapija` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dnevnik`
--

INSERT INTO `dnevnik` (`korisnicko_ime`, `datum`, `trajanje`, `intenzitet`, `terapija`) VALUES
('maja', '24-01-2013', 120, 6, ''),
('maja', '20-01-2013', 80, 7, 'kafetin'),
('zika', '10-01-2013', 30, 9, 'imigran'),
('pera', '10-01-2013', 150, 3, 'andol'),
('maja', '9-01-2013', 300, 7, 'kafetin'),
('maja', '27-12-2012', 400, 4, 'kafetin'),
('ivana', '02-01-2013', 100, 5, 'andol'),
('ivana', '03-01-2013', 120, 7, 'novalgetol'),
('ivana', '05-01-2013', 45, 8, 'nimulid'),
('ivana', '06-01-2013', 60, 5, ''),
('zika', '28-12-2012', 40, 8, 'imigran'),
('zika', '13-01-2013', 120, 5, ''),
('pera', '01-01-2013', 100, 3, 'andol'),
('pera', '04-01-2013', 20, 9, 'imigran'),
('pera', '08-01-2013', 30, 9, 'imigran'),
('zika', '02-01-2013', 150, 5, 'kafetin'),
('zika', '03-01-2013', 150, 8, 'imigran'),
('zika', '08-01-2013', 150, 4, 'andol'),
('maja', '20-01-2013', 40, 9, 'imigranX2'),
('ivana', '20-01-2013', 20, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `korisnicko_ime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sifra` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `mod` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`korisnicko_ime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnicko_ime`, `sifra`, `mod`) VALUES
('aleksandra', 'alex', 'lekar'),
('ivana', 'ivana', 'pacijent'),
('jasna', 'jasna', 'lekar'),
('maja', 'maja', 'pacijent'),
('milan', 'milan', 'pacijent'),
('pera', 'pera', 'pacijent'),
('zika', 'zika', 'pacijent');

-- --------------------------------------------------------

--
-- Table structure for table `lekari`
--

CREATE TABLE IF NOT EXISTS `lekari` (
  `korisnicko_ime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ime_prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `specijalizacija` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`korisnicko_ime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lekari`
--

INSERT INTO `lekari` (`korisnicko_ime`, `ime_prezime`, `specijalizacija`) VALUES
('aleksandra', 'Aleksandra Radojicic', 'neurolog'),
('jasna', 'Jasna Zidverc', 'neurolog');

-- --------------------------------------------------------

--
-- Table structure for table `pacijenti`
--

CREATE TABLE IF NOT EXISTS `pacijenti` (
  `korisnicko_ime` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ime_prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pol` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `godina_rodjenja` int(11) NOT NULL,
  `dijagnoza` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`korisnicko_ime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pacijenti`
--

INSERT INTO `pacijenti` (`korisnicko_ime`, `ime_prezime`, `pol`, `godina_rodjenja`, `dijagnoza`) VALUES
('ivana', 'Ivana Simic', 'z', 1975, 'hronicna migrena'),
('maja', 'Maja Velemir', 'z', 1978, 'tenzorna glavobolja'),
('milan', 'Milan Peric', 'm', 1980, 'akutna migrena'),
('pera', 'Pera Peric', 'm', 1980, 'hronicna migrena'),
('zika', 'Zika Jovanovic', 'm', 1960, 'akutna migrena');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lekari`
--
ALTER TABLE `lekari`
  ADD CONSTRAINT `lekari_ibfk_1` FOREIGN KEY (`korisnicko_ime`) REFERENCES `korisnici` (`korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pacijenti`
--
ALTER TABLE `pacijenti`
  ADD CONSTRAINT `pacijenti_ibfk_1` FOREIGN KEY (`korisnicko_ime`) REFERENCES `korisnici` (`korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
