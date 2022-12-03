-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2022 at 02:35 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rezervasyon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ad`, `sifre`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `tarih_id` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `saat_id` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kullanici`
--

INSERT INTO `kullanici` (`id`, `adsoyad`, `email`, `telefon`, `tarih_id`, `saat_id`) VALUES
(10, 'Batuhan Yazıcı', 'batuhan@gmail.com', '05369904898', '2', '4'),
(11, 'Mehmet Selçuk Batal', 'mehmet@gmail.com', '05318976452', '1', '1'),
(12, 'Hüseyin Karagülle', 'hüseyin@gmail.com', '05427894561', '3', '6'),
(14, 'Samet Gültekin', 'samet@gmail.com', '05317564123', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `saat`
--

DROP TABLE IF EXISTS `saat`;
CREATE TABLE IF NOT EXISTS `saat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saat` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `tarih_id` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `kullanıcı_id` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `musait` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `saat`
--

INSERT INTO `saat` (`id`, `saat`, `tarih_id`, `kullanıcı_id`, `musait`) VALUES
(1, '09:00', '1', '11', 1),
(2, '12:00', '1', '14', 1),
(3, '11:00', '2', '0', 0),
(4, '15:00', '2', '10', 1),
(5, '08:00', '3', '0', 0),
(6, '08:30', '3', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tarih`
--

DROP TABLE IF EXISTS `tarih`;
CREATE TABLE IF NOT EXISTS `tarih` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarih` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `tarih`
--

INSERT INTO `tarih` (`id`, `tarih`) VALUES
(1, '2022-12-21'),
(2, '2022-12-22'),
(3, '2022-12-20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
