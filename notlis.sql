-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 25 Oca 2018, 23:08:07
-- Sunucu sürümü: 5.7.19
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `obs`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notlis`
--

DROP TABLE IF EXISTS `notlis`;
CREATE TABLE IF NOT EXISTS `notlis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrNo` int(11) NOT NULL,
  `dersAdi` varchar(45) COLLATE utf16_turkish_ci NOT NULL,
  `vize` varchar(3) CHARACTER SET latin5 DEFAULT NULL,
  `final` varchar(3) CHARACTER SET latin5 DEFAULT NULL,
  `ortalama` varchar(3) CHARACTER SET latin5 DEFAULT NULL,
  `durum` varchar(45) COLLATE utf16_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `notlis`
--

INSERT INTO `notlis` (`id`, `ogrNo`, `dersAdi`, `vize`, `final`, `ortalama`, `durum`) VALUES
(6, 8, 'Sayısal Görüntü İşleme', '80', '50', '62', 'GEÇTİ'),
(8, 9, 'Sayısal Görüntü İşleme', '50', '45', '47', 'GEÇTİ'),
(9, 9, 'Mikroişlemciler', '40', '80', '64', 'GEÇTİ'),
(10, 8, 'Mikroişlemciler', '30', '90', '66', 'GEÇTİ'),
(11, 9, 'Algoritma', '75', '--', '--', '--'),
(12, 9, 'Nesneye Dayalı Programlama', '52', '32', '40', 'KALDI'),
(13, 8, 'Nesneye Dayalı Programlama', '80', '50', '62', 'GEÇTİ'),
(14, 10, 'Sayısal Görüntü İşleme', '10', '80', '52', 'GEÇTİ'),
(15, 9, 'Grafik Programlama', '--', '--', '--', '--');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
