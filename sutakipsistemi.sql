-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Tem 2019, 02:26:11
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sutakipsistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kampanya`
--

CREATE TABLE `kampanya` (
  `idkampanya` int(11) NOT NULL,
  `slogan` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` int(11) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kampanya`
--

INSERT INTO `kampanya` (`idkampanya`, `slogan`, `icerik`, `fiyat`, `tarih`) VALUES
(1, '%50 indirim', '5 damacana su 60 tl yerine sadece', 30, '2018-05-12'),
(3, '%25 indirim ', 'Yeni ürünlerimize özel', 5, '2018-05-31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE `musteri` (
  `idmusteri` int(11) NOT NULL,
  `ad_soyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kod` int(11) NOT NULL,
  `telefon` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ilce` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `il` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sozlesme_kabul` int(11) NOT NULL,
  `odeme_yontemi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `yonetici` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`idmusteri`, `ad_soyad`, `kod`, `telefon`, `adres`, `ilce`, `il`, `sozlesme_kabul`, `odeme_yontemi`, `onay`, `yonetici`) VALUES
(1, 'umut ekici', 1, '0555', 'süleymaniye ', 's', 'a', 1, 'kredi', 1, 1),
(3, 'ahmet sever', 2, '205', '', 'Karesi', 'Balıkesir', 0, 'kredi', 1, 0),
(47, 'eyüpcan aker', 37, '0224', ' yenimahalle', 'Karesi', 'Balıkesir', 1, 'PayPal', 0, 0),
(77, 'hilal ekici', 38, '0245', ' hfghgfh', 'Altıeylül', 'İstanbul', 1, 'banka', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `idsiparis` int(11) NOT NULL,
  `musteri` int(11) NOT NULL,
  `tane` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`idsiparis`, `musteri`, `tane`) VALUES
(11, 1, 1),
(14, 2, 2),
(15, 38, 1),
(16, 40, 2),
(17, 1, 2),
(18, 41, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kampanya`
--
ALTER TABLE `kampanya`
  ADD PRIMARY KEY (`idkampanya`);

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`idmusteri`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`idsiparis`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kampanya`
--
ALTER TABLE `kampanya`
  MODIFY `idkampanya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `idmusteri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `idsiparis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
