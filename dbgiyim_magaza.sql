-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 15 Haz 2021, 20:34:57
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dbgiyim_magaza`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `admin_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `admin_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `admin_eposta` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `admin_tel` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbladmin`
--

INSERT INTO `tbladmin` (`adminID`, `admin_ad`, `admin_soyad`, `admin_eposta`, `admin_tel`, `kullanici_adi`, `admin_sifre`) VALUES
(1, 'Uğur', 'Yılmaz', 'yilmazugur@gmail.com', '05378957345', 'yilmazugur', '1234'),
(2, 'Fatma', 'Çakır', 'fatmacakir@gmail.com', '05348567982', 'fatmacakirr', '123456'),
(3, 'Ahmet', 'Yilmaz', 'ahmetyilmaz@gmail.com', '05369807654', 'ahmetyilmazz', '1234'),
(4, 'Tuğçe', 'Aramaz', 'tugcearamaz@gmail.com', '05376542341', 'tugcearamaz', '123456'),
(5, 'Burak', 'Ören', 'burakoren@gmail.com', '05532347864', 'burakoren', '1234'),
(6, 'Serdar', 'Tutmaz', 'serdartutmaz@gmail.com', '05425673476', 'serdartutmaz', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblalisverisgecmisi`
--

DROP TABLE IF EXISTS `tblalisverisgecmisi`;
CREATE TABLE IF NOT EXISTS `tblalisverisgecmisi` (
  `alisverisID` int(11) NOT NULL AUTO_INCREMENT,
  `musteriID` int(11) NOT NULL,
  `urunID` int(11) NOT NULL,
  `renk` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `alisveris_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `toplam_tutar` float NOT NULL,
  PRIMARY KEY (`alisverisID`),
  KEY `musteriID` (`musteriID`),
  KEY `urunID` (`urunID`),
  KEY `renk` (`renk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tblalisverisgecmisi`
--

INSERT INTO `tblalisverisgecmisi` (`alisverisID`, `musteriID`, `urunID`, `renk`, `adet`, `alisveris_tarihi`, `adres`, `toplam_tutar`) VALUES
(1, 2, 87, 'Lacivert', 1, '2021-06-14 17:29:21', 'İstiklal Mh. Namık kemal sk. Selçuklu/Konya', 165.95);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblbeden`
--

DROP TABLE IF EXISTS `tblbeden`;
CREATE TABLE IF NOT EXISTS `tblbeden` (
  `bedenID` int(11) NOT NULL AUTO_INCREMENT,
  `beden_adi` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`bedenID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tblbeden`
--

INSERT INTO `tblbeden` (`bedenID`, `beden_adi`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, '4/5 yaş'),
(7, '5/6 yaş'),
(8, '6/7 yaş'),
(9, '7/8 yaş'),
(10, '8/9 yaş'),
(11, '3/6 ay'),
(12, '6/9 ay'),
(15, '9/12 ay'),
(16, '12/18 ay'),
(17, '24/36 ay'),
(18, '36'),
(19, '37'),
(20, '38'),
(21, '39'),
(22, '40'),
(23, '42'),
(24, '43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblcinsiyet`
--

DROP TABLE IF EXISTS `tblcinsiyet`;
CREATE TABLE IF NOT EXISTS `tblcinsiyet` (
  `cinsiyetID` int(2) NOT NULL AUTO_INCREMENT,
  `cinsiyet` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`cinsiyetID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tblcinsiyet`
--

INSERT INTO `tblcinsiyet` (`cinsiyetID`, `cinsiyet`) VALUES
(1, 'Kadın'),
(2, 'Erkek'),
(3, 'Erkek Çocuk'),
(4, 'Kız Çocuk'),
(5, 'Erkek Bebek'),
(6, 'Kız Bebek');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblfavoriler`
--

DROP TABLE IF EXISTS `tblfavoriler`;
CREATE TABLE IF NOT EXISTS `tblfavoriler` (
  `favoriID` int(11) NOT NULL AUTO_INCREMENT,
  `musteriID` int(11) NOT NULL,
  `favori_urunID` int(11) NOT NULL,
  PRIMARY KEY (`favoriID`),
  KEY `musteriID` (`musteriID`),
  KEY `favori_urunID` (`favori_urunID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tblfavoriler`
--

INSERT INTO `tblfavoriler` (`favoriID`, `musteriID`, `favori_urunID`) VALUES
(50, 2, 31),
(51, 2, 2),
(52, 2, 1),
(53, 2, 60),
(54, 2, 4),
(55, 2, 3),
(57, 2, 17),
(58, 2, 20);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblkategori`
--

DROP TABLE IF EXISTS `tblkategori`;
CREATE TABLE IF NOT EXISTS `tblkategori` (
  `kategoriID` int(4) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategoriID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tblkategori`
--

INSERT INTO `tblkategori` (`kategoriID`, `kategori_adi`) VALUES
(1, 'Dış Giyim'),
(2, 'Etek&Elbise'),
(3, 'Üst Giyim'),
(4, 'Alt Giyim'),
(5, 'Spor Giyim'),
(6, 'Pijama'),
(7, 'Ayakkabı'),
(8, 'Blazer&Takım Elbise'),
(9, 'Zıbın&Takım&Tulum');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblmusteri_hesaplari`
--

DROP TABLE IF EXISTS `tblmusteri_hesaplari`;
CREATE TABLE IF NOT EXISTS `tblmusteri_hesaplari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `musteri_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `musteri_soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `musteri_email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `musteri_adres` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_tel` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `musteri_sifre` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tblmusteri_hesaplari`
--

INSERT INTO `tblmusteri_hesaplari` (`id`, `musteri_ad`, `musteri_soyad`, `musteri_email`, `musteri_adres`, `musteri_tel`, `kullanici_adi`, `musteri_sifre`) VALUES
(1, 'Mete', 'Ermez', 'meteermez@gmail.com', 'Nişantaşı Mh. Atatürk Cd. No:4 D:5 İzmir', '05425670987', 'mete_ermez', 'fhmjk'),
(2, 'HAKKI', 'KANER', 'hakkikaner@gmail.com', 'Konya', '05443456789', 'hakkıkanerr', '123456'),
(3, 'Nazlı', 'Güler', 'nazliguler@gmail.com', 'namık kemal mh. nişantaşı sokak no8 d12 ist', '05342364253', 'nazli34', '12345'),
(4, 'ahmet', 'çavuş', 'ahmetcavus@gmail.com', 'savaşçılar mh. barış sokak. no7 d4', '05554443322', 'ahmetç', '1234566'),
(5, 'Zeynep', 'Aydın', 'zeynepaydin@gmail.com', 'Gazi Mh. Ada Sk. No:6 D:1 Ankara', '05367453215', 'zeynepaydin', '1234'),
(6, 'Mervegül', 'Kansak', 'merve_kansak@hotmail.com', 'İstiklal Mh. Osmanbey Sk. No:7 D:5 Azizbey Apartmanı Ümraniye/İSTANBUL', '05388370862', 'mgkansak', '123'),
(7, 'Burak', 'Solmaz', 'buraksolmaz@gmail.com', 'Rüzgar Mh. Kalem Sk. No:2 D:14 Antalya', '05456789654', 'buraksolmaz', '456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblsehir`
--

DROP TABLE IF EXISTS `tblsehir`;
CREATE TABLE IF NOT EXISTS `tblsehir` (
  `sehirID` int(11) NOT NULL AUTO_INCREMENT,
  `sehir_ad` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sehirID`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tblsehir`
--

INSERT INTO `tblsehir` (`sehirID`, `sehir_ad`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyonkarahisar'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'K.Maraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblurunler`
--

DROP TABLE IF EXISTS `tblurunler`;
CREATE TABLE IF NOT EXISTS `tblurunler` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `urun_foto` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `urun_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `renk` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `eski_fiyat` float DEFAULT NULL,
  `fiyat` float NOT NULL,
  `kategoriID` int(4) NOT NULL,
  `cinsiyetID` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategoriID` (`kategoriID`),
  KEY `cinsiyetID` (`cinsiyetID`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tblurunler`
--

INSERT INTO `tblurunler` (`id`, `urun_foto`, `urun_adi`, `renk`, `eski_fiyat`, `fiyat`, `kategoriID`, `cinsiyetID`) VALUES
(1, 'kadin-img/ceket-siyah.jpg', 'Kapüşonlu Suni Kürk Kaban ', 'Siyah', 249.99, 179.99, 1, 1),
(2, 'kadin-img/Ksweat.jpg', 'Kapüşonlu Gri Sweatshirt', 'Gri', NULL, 89.9, 3, 1),
(3, 'kadin-img/Kredkazak.jpg', 'Balıkçı Yaka Kırmızı Kazak', 'Kırmızı', NULL, 45.99, 3, 1),
(4, 'kadin-img/kot.jpg', 'Yüksek Bel Jean', 'Kot', 179.9, 119.9, 4, 1),
(5, 'kadin-img/hırkapink.jpg', 'Triko Hırka', 'Pembe', 69.9, 50.5, 3, 1),
(6, 'kadin-img/lilakazak.jpg', 'Bisiklet Yaka Triko Lila Kazak', 'Lila', NULL, 39.99, 3, 1),
(7, 'kadin-img/etek1.jpg', 'Fermuarlı Etek', 'Kiremit Rengi', NULL, 79.99, 2, 1),
(8, 'kadin-img/etek2.jpg', 'Kazayağı Kalem Etek', 'Siyah', 59.99, 29.99, 2, 1),
(9, 'kadin-img/etek3.jpg', 'Mini Kareli Etek', 'Gri', NULL, 55.85, 2, 1),
(10, 'kadin-img/etek4.jpg', 'Volanlı Mini Etek', 'Siyah', 79.99, 39.99, 2, 1),
(11, 'kadin-img/elbise1.jpg', 'Payet Elbise', 'Gri', 199.99, 79.99, 2, 1),
(12, 'kadin-img/elbise2.jpg', 'Simli V Yaka Elbise', 'Zümrüt Yeşili', NULL, 149.99, 2, 1),
(13, 'kadin-img/elbise3.jpg', 'Şal Desenli Elbise', 'Beyaz', NULL, 179.99, 2, 1),
(14, 'kadin-img/elbise4.jpg', 'Balıkçı Yaka Beli Bağlamalı Elbise', 'Gri', 139.99, 76.99, 2, 1),
(15, 'kadin-img/elbise5.jpg', 'Çiçekli V Yaka Elbise', 'Siyah', NULL, 74.9, 2, 1),
(16, 'kadin-img/kaban1.jpg', 'Siyah Kaşe Kaban', 'Siyah', NULL, 249.99, 1, 1),
(17, 'kadin-img/kaban2.jpg', 'Düğmeli Cepli Kaban', 'Siyah', NULL, 154.9, 1, 1),
(18, 'kadin-img/kaban3.jpg', 'Kemerli Kürk Detaylı Kaban', 'Bej', 349.99, 249.99, 1, 1),
(19, 'kadin-img/ceket1.jpg', 'Kemerli Blazer Ceket', 'Taba Rengi', 229.99, 165.95, 1, 1),
(20, 'kadin-img/ceket2.jpg', 'Gömlekli Yaka Cepli Ceket', 'Gri', NULL, 129.99, 1, 1),
(21, 'kadin-img/ayakkabi1.jpg', 'Bağcıklı Bot', 'Siyah', NULL, 125.99, 7, 1),
(22, 'kadin-img/ayakkabi2.jpg', 'Sim Detaylı Sneaker', 'Siyah', 109.99, 87.99, 7, 1),
(23, 'kadin-img/ayakkabi3.jpg', 'Bağcıklı Senakers Beyaz', 'Beyaz', NULL, 87.99, 7, 1),
(24, 'kadin-img/ayakkabi4.jpg', 'Toka Detaylı Bot', 'Siyah', 159.99, 79.99, 7, 1),
(25, 'kadin-img/ayakkabi5.jpg', 'Sivri Burun Topuklu Ayakkabı', 'Siyah', 99.99, 49.99, 7, 1),
(26, 'kadin-img/ayakkabi6.jpg', 'Fermuarlı Bot', 'Siyah', NULL, 104.99, 7, 1),
(27, 'kadin-img/pantolon1.jpg', 'Jogger Pantolon', 'Bej', NULL, 109.99, 4, 1),
(28, 'kadin-img/pantolon2.jpg', 'Geniş Paça Çizgili Pantolon', 'Vizon', 199.99, 109.99, 4, 1),
(29, 'kadin-img/pantolon3.jpg', 'Geniş Paça Pullu Pantolon', 'Siyah', 129.99, 51.99, 4, 1),
(30, 'kadin-img/pantolon4.jpg', 'Yüksek Bel Antrasit Pantolon', 'Antrasit', 169.99, 84.99, 4, 1),
(31, 'kadin-img/pantolon5.jpg', 'Çizgili Jogger Pantolon', 'Gri', NULL, 109.99, 4, 1),
(32, 'kadin-img/pantolon6.jpg', 'Cigarette Kareli Pantolon', 'Gri', NULL, 69.99, 4, 1),
(33, 'kadin-img/pantolon7.jpg', 'Skinny Fit Jean', 'Siyah', NULL, 41.99, 4, 1),
(34, 'kadin-img/pantolon8.jpg', 'Carmen Jean', 'Kot', 99.99, 59.99, 4, 1),
(35, 'kadin-img/spor1.jpg', 'Tül Detaylı Tayt', 'Siyah', NULL, 69.99, 5, 1),
(36, 'kadin-img/spor2.jpg', 'Fermuarlı Yeşil Sweatshirt', 'Yeşil', 129.99, 90.99, 5, 1),
(37, 'kadin-img/spor3.jpg', 'Mor Desenli Yüksek Bel Tayt', 'Yeşil', NULL, 48.99, 5, 1),
(38, 'kadin-img/spor4.jpg', 'Haki Yüksek Bel Tayt', 'Haki', 89.99, 53.99, 5, 1),
(39, 'kadin-img/spor6.jpg', 'Mermer Desenli Spor Sütyeni', 'Siyah', NULL, 59.99, 5, 1),
(40, 'kadin-img/spor5.jpg', 'Yüksek Bel Tayt Mor', 'Mor', 69.99, 48.99, 5, 1),
(41, 'kadin-img/pija1.jpg', 'Kapüşonlu Peluş Pijama Üstü', 'Pembe', NULL, 79.99, 6, 1),
(42, 'kadin-img/pija2.jpg', 'Disney Lisanslı Pijama Takımı', 'Pembe', 99.99, 69.99, 6, 1),
(43, 'kadin-img/pija3.jpg', 'Pamuklu Pijama Takımı', 'Lila', NULL, 79.99, 6, 1),
(44, 'kadin-img/pija4.jpg', 'Baskılı Pijama Takımı Lila', 'Lila', 89.99, 71.99, 6, 1),
(45, 'kadin-img/pija5.jpg', 'Harry Potter Pijama Üstü', 'Kırmızı', 89.99, 71.99, 6, 1),
(46, 'kadin-img/pija6.jpg', 'Vizon Pijama Altı', 'Vizon', NULL, 59.99, 6, 1),
(47, 'kadin-img/sweat4.jpg', 'Fermuarlı Hardal Sweatshirt', 'Hardal', NULL, 79.99, 3, 1),
(48, 'kadin-img/gömlek3.jpg', 'Desenli Bağlamalı Gömlek ', 'Siyah', 89.99, 49.99, 3, 1),
(49, 'kadin-img/bluz1.jpg', 'Sarı Kolsuz Bluz', 'Sarı', NULL, 55.85, 3, 1),
(50, 'kadin-img/bluz2.jpg', 'Omzu Açık Mavi Bluz', 'Açık Mavi', 79.99, 39.99, 3, 1),
(51, 'kadin-img/kazak2.jpg', 'V Yaka Uzun Kollu Kazak', 'Kırmızı', 199.99, 79.99, 3, 1),
(52, 'kadin-img/kazak1.jpg', 'Boğazlı Kazak', 'Vizon', NULL, 149.99, 3, 1),
(53, 'kadin-img/sweat3.jpg', 'Desenli Sarı Sweatshirt', 'Sarı', 79.99, 39.99, 3, 1),
(54, 'kadin-img/gömlek1.jpg', 'Kapüşonlu Oduncu Gömlek', 'Siyah', 199.99, 79.99, 3, 1),
(55, 'kadin-img/hırka1.jpg', 'Cepli Triko Hırka', 'Gri', NULL, 149.99, 3, 1),
(56, 'kadin-img/sweat2.jpg', 'Yeşil Sweatshirt', 'Haki', NULL, 179.99, 3, 1),
(57, 'kadin-img/gömlek2.jpg', 'Çizgili Uzun Gömlek ', 'Beyaz', 139.99, 76.99, 3, 1),
(58, 'kadin-img/kazak3.jpg', 'Bordo Örgü Kazak', 'Bordo', NULL, 74.9, 3, 1),
(59, 'erkek-img/ceket1.jpg', 'Kürk Yaka Bej Ceket', 'Bej', 249.99, 179.99, 1, 2),
(60, 'erkek-img/ceket2.jpg', 'Kahverengi Süet Ceket', 'Kahverengi', NULL, 249.95, 1, 2),
(61, 'erkek-img/ceket3.jpg', 'Gri Şişme Mont', 'Gri', NULL, 154.9, 1, 2),
(62, 'erkek-img/ceket4.jpg', 'Siyah Şişme Mont', 'Siyah', 349.99, 249.99, 1, 2),
(63, 'erkek-img/ceket5.jpg', 'Gri Kaşe Kaban', 'Gri', 229.99, 165.95, 1, 2),
(64, 'erkek-img/ceket6.jpg', 'Gri Kareli Uzun Ceket', 'Gri', NULL, 129.99, 1, 2),
(65, 'erkek-img/pant1.jpg', 'Siyah Skinny Jean', 'Siyah', 249.99, 179.99, 4, 2),
(66, 'erkek-img/pant2.jpg', 'Siyah Pantolon', 'Siyah', NULL, 249.95, 4, 2),
(67, 'erkek-img/pant3.jpg', 'Kot Pantolon', 'Kot', NULL, 154.9, 4, 2),
(68, 'erkek-img/şort1.jpg', 'Beyaz Şort ', 'Beyaz', 149.99, 89.99, 4, 2),
(69, 'erkek-img/şort2.jpg', 'Yeşil Kumaş Şort', 'Haki ', 229.99, 165.95, 4, 2),
(70, 'erkek-img/şort3.jpg', 'Turkuaz Şort', 'Turkuaz', NULL, 129.99, 4, 2),
(71, 'erkek-img/pija1.jpg', 'Siyah Eşofman Altı', 'Siyah', 249.99, 179.99, 6, 2),
(72, 'erkek-img/pija2.jpg', 'Gri Eşofman Takımı', 'Gri', NULL, 249.95, 6, 2),
(73, 'erkek-img/pija3.jpg', 'Açık Gri Eşofman Takımı', 'Açık Gri', NULL, 154.9, 6, 2),
(74, 'erkek-img/pija4.jpg', 'Beyaz Pijama Üstü', 'Beyaz', 59.99, 49.99, 6, 2),
(75, 'erkek-img/pija5.jpg', 'Siyah Eşofman Üstü', 'Siyah', 229.99, 165.95, 6, 2),
(76, 'erkek-img/pija6.jpg', 'Kırmızı Şort', 'Kırmızı', NULL, 129.99, 6, 2),
(77, 'erkek-img/spor1.jpg', 'Gri Kolsuz Spor Tshirt', 'Gri', 149.99, 79.99, 5, 2),
(78, 'erkek-img/spor2.jpg', 'Siyah Spor Şort', 'Siyah', NULL, 69.95, 5, 2),
(79, 'erkek-img/spor3.jpg', 'Siyah Eşofman Takımı', 'Siyah', NULL, 154.9, 5, 2),
(80, 'erkek-img/spor4.jpg', 'Gri Spor Tshirt', 'Gri', 89.99, 49.99, 5, 2),
(81, 'erkek-img/spor5.jpg', 'Siyah Baskılı Tshirt', 'Siyah', 79.99, 65.95, 5, 2),
(82, 'erkek-img/spor6.jpg', 'Siyah Spor Şort', 'Siyah', NULL, 129.99, 5, 2),
(83, 'erkek-img/blaz1.jpg', 'Kareli Cepli Blazer Ceket ', 'Siyah', 249.99, 179.99, 8, 2),
(84, 'erkek-img/blaz2.jpg', 'Lacivert Takım', 'Lacivert', NULL, 249.95, 8, 2),
(85, 'erkek-img/blaz3.jpg', 'Düğme Detaylı Kahve Blazer', 'Kahve', NULL, 99.9, 8, 2),
(86, 'erkek-img/takım1.jpg', 'Gri Takım Elbise', 'Gri', 349.99, 249.99, 8, 2),
(87, 'erkek-img/takım2.jpg', 'Cep Detaylı Blazer Ceket', 'Lacivert', 229.99, 165.95, 8, 2),
(88, 'erkek-img/takım3.jpg', 'Açık Mavi Takım', 'Açık Mavi', NULL, 329.99, 8, 2),
(89, 'erkek-img/ayak1.jpg', 'Kısa Siyah Bot', 'Siyah', 249.99, 179.99, 7, 2),
(90, 'erkek-img/ayak2.jpg', 'Beyaz Sneaker', 'Beyaz', NULL, 249.95, 7, 2),
(91, 'erkek-img/ayak3.jpg', 'Yüksek Taban Siyah Spor Ayakkabı', 'Siyah', NULL, 154.9, 7, 2),
(92, 'erkek-img/ayak4.jpg', 'Siyah Sneaker', 'Siyah', 349.99, 249.99, 7, 2),
(93, 'erkek-img/ayak5.jpg', 'Beyaz Spor Ayakkabı', 'Beyaz', 229.99, 165.95, 7, 2),
(94, 'erkek-img/ayak6.jpg', 'Haki Spor Ayakkabı', 'Haki', NULL, 129.99, 7, 2),
(95, 'erkek-img/üst1.jpg', 'Boğazlı Örgü Kazak', 'Bej', 99.99, 79.99, 3, 2),
(96, 'erkek-img/üst2.jpg', 'Baskılı Sweatshirt', 'Haki', NULL, 69.95, 3, 2),
(97, 'erkek-img/üst3.jpg', 'Gri Kapüşonlu Hırka', 'Gri', NULL, 64.9, 3, 2),
(98, 'erkek-img/üst4.jpg', 'Mavi Sweatshirt', 'Mavi', 109.99, 59.99, 3, 2),
(99, 'erkek-img/üst5.jpg', 'Kareli Yeşil Gömlek', 'Yeşil ', 129.99, 85.95, 3, 2),
(100, 'erkek-img/üst6.jpg', 'Gri Gömlek', 'Gri', NULL, 129.99, 3, 2),
(101, 'cocuk-img/ayak1.jpg', 'Puantiyeli Papatya Desenli Ayakkabı', 'Mavi', NULL, 125.99, 7, 4),
(102, 'cocuk-img/ayak2.jpg', 'Pul ve Kemer Detaylı Siyah Bot', 'Siyah', 109.99, 87.99, 7, 4),
(103, 'cocuk-img/ayak3.jpg', 'Beyaz Kuş Baskılı Bağcıklı Ayakkabı', 'Beyaz', NULL, 87.99, 7, 4),
(104, 'cocuk-img/ayak4.jpg', 'Gümüş Babet', 'Gümüş', 159.99, 79.99, 7, 4),
(105, 'cocuk-img/ayak5.jpg', 'Mor Fiyonk Babet', 'Mor ', 99.99, 49.99, 7, 4),
(106, 'cocuk-img/ayak6.jpg', 'Mickey Mouse Parmak Arası Terlik', 'Kırmızı', NULL, 104.99, 7, 4),
(107, 'cocuk-img/alt1.jpg', 'Siyah Baskılı Eşofman Altı ', 'Siyah', NULL, 125.99, 4, 4),
(108, 'cocuk-img/alt2.jpg', 'Kırmızı Kareli Tayt', 'Kırmızı', 109.99, 87.99, 4, 4),
(109, 'cocuk-img/alt3.jpg', 'Kareli Kemer Detaylı Etek', 'Gri', NULL, 87.99, 4, 4),
(110, 'cocuk-img/alt4.jpg', 'Siyah Kat Kat Etek', 'Siyah', 159.99, 79.99, 4, 4),
(111, 'cocuk-img/alt5.jpg', 'Gri Skinny Pantolon', 'Gri', 99.99, 49.99, 4, 4),
(112, 'cocuk-img/alt6.jpg', 'Siyah Yırtık Kot Pantolon', 'Siyah', NULL, 104.99, 4, 4),
(113, 'cocuk-img/mont1.jpg', 'Lacivert Şişme Mont', 'Lacivert', NULL, 125.99, 1, 4),
(114, 'cocuk-img/mont2.jpg', 'Pembe Tüylü Şapkalı Mont', 'Pembe', 109.99, 87.99, 1, 4),
(115, 'cocuk-img/mont3.jpg', 'Kapüşonlu Kaşe Kaban', 'Siyah', NULL, 87.99, 1, 4),
(116, 'cocuk-img/mont4.jpg', 'Yeşil Baskılı Şişme Mont', 'Yeşil', 159.99, 79.99, 1, 4),
(117, 'cocuk-img/mont5.jpg', 'Pembe Peluş Yelek', 'Pembe', 99.99, 49.99, 1, 4),
(118, 'cocuk-img/mont6.jpg', 'Siyah Deri Ceket', 'Siyah', NULL, 104.99, 1, 4),
(119, 'cocuk-img/üst1.jpg', 'Pembe Uzun Kollu Tshirt', 'Pembe', NULL, 125.99, 3, 4),
(120, 'cocuk-img/üst2.jpg', 'Siyah Baskılı Sweatshirt', 'Siyah', 109.99, 87.99, 3, 4),
(121, 'cocuk-img/üst3.jpg', 'Pembe Baskılı Sweatshirt', 'Pembe', NULL, 87.99, 3, 4),
(122, 'cocuk-img/üst4.jpg', 'Gri Yazılı Sweatshirt', 'Gri', 159.99, 79.99, 3, 4),
(123, 'cocuk-img/üst5.jpg', 'Siyah Düz Sweatshirt', 'Siyah', 99.99, 49.99, 3, 4),
(124, 'cocuk-img/üst6.jpg', 'Lila Düz Sweatshirt', 'Lila ', NULL, 104.99, 3, 4),
(125, 'cocuk-img/kaban1.jpg', 'Siyah Kapüşonlu Şişme Mont', 'Siyah', NULL, 125.99, 1, 3),
(126, 'cocuk-img/kaban2.jpg', 'Sarı Şişme Mont', 'Sarı', 109.99, 87.99, 1, 3),
(127, 'cocuk-img/kaban5.jpg', 'Mavi Penye Şapkalı Şişme Mont', 'Mavi', 99.99, 49.99, 1, 3),
(128, 'cocuk-img/kaban6.jpg', 'Bordo Şişme Mont', 'Bordo', NULL, 104.99, 1, 3),
(129, 'cocuk-img/eüst1.jpg', 'Sarı Uzun Kollu Tshirt', 'Sarı', NULL, 125.99, 3, 3),
(130, 'cocuk-img/eüst2.jpg', 'Beyaz Motor Baskılı Tshirt', 'Beyaz', 109.99, 87.99, 3, 3),
(131, 'cocuk-img/eüst3.jpg', 'Beyaz Baskılı Uzun Kollu Tshirt', 'Beyaz', NULL, 87.99, 3, 3),
(132, 'cocuk-img/eüst4.jpg', 'Gri Baskılı Sweatshirt', 'Gri', 159.99, 79.99, 3, 3),
(133, 'cocuk-img/eüst5.jpg', 'Turuncu Baskılı Sweatshirt', 'Turuncu', 99.99, 49.99, 3, 3),
(134, 'cocuk-img/eüst6.jpg', 'Hardal Baskılı Sweatshirt', 'Hardal', NULL, 104.99, 3, 3),
(135, 'cocuk-img/ealt1.jpg', 'Yazı Baskılı Belden Bağlamalı Eşofman Altı', 'Siyah', NULL, 25.99, 4, 3),
(136, 'cocuk-img/ealt2.jpg', 'Basic Belden Bağlamalı Eşofman Altı', 'Gri', 87.99, 29.99, 4, 3),
(137, 'cocuk-img/ealt3.jpg', '%100 Pamuk Siyah Cepi Pantolon', 'Siyah', NULL, 87.99, 4, 3),
(138, 'cocuk-img/ealt4.jpg', '5 Cep Slim Dar Paça Jean', 'Kot', 59.99, 39.99, 4, 3),
(139, 'cocuk-img/ealt5.jpg', 'Normal Bel Cepli Jean', 'Kot', 99.99, 49.99, 4, 3),
(140, 'cocuk-img/ealt6.jpg', 'Gri Cepli Kumaş Şort', 'Gri', NULL, 104.99, 4, 3),
(141, 'cocuk-img/eayak1.jpg', 'Baskılı Beyaz Sweatshirt', 'Beyaz', NULL, 55.99, 7, 3),
(142, 'cocuk-img/eayak2.jpg', 'Mavi Çıt Çıtlı Ayakkabı', 'Mavi', 69.99, 57.99, 7, 3),
(143, 'cocuk-img/eayak3.jpg', 'Lacivert-Yeşil Terlik', 'Lacivert-Yeşil', NULL, 27.99, 7, 3),
(144, 'bebek-img/üst1.jpg', 'Baskılı Beyaz Sweatshirt', 'Beyaz', NULL, 55.99, 3, 6),
(145, 'bebek-img/üst2.jpg', 'Pembe Baskılı Sweatshirt', 'Pembe', 69.99, 57.99, 3, 6),
(146, 'bebek-img/üst3.jpg', 'Pembe Unicorn Baskılı Sweatshirt', 'Pembe', NULL, 27.99, 3, 6),
(147, 'bebek-img/üst4.jpg', 'Gri Kedi Baskılı Tshirt', 'Gri', NULL, 55.99, 3, 6),
(148, 'bebek-img/üst5.jpg', 'Beyaz Baskılı Uzun Kollu Tshirt', 'Beyaz', 69.99, 57.99, 3, 6),
(149, 'bebek-img/üst6.jpg', 'Pembe Uzun Kollu Tshirt', 'Pembe', NULL, 27.99, 3, 6),
(150, 'bebek-img/alt1.jpg', 'Pembe Baskılı Eşofman Altı', 'Pembe', NULL, 55.99, 4, 6),
(151, 'bebek-img/alt2.jpg', 'Gri Yazı Baskılı Eşofman Altı', 'Gri', 69.99, 57.99, 4, 6),
(152, 'bebek-img/alt3.jpg', 'Kırmızı Eşofman Altı', 'Kırmızı', NULL, 27.99, 4, 6),
(153, 'bebek-img/alt4.jpg', 'Sarı Kedi Baskılı Eşofman Altı', 'Sarı', NULL, 55.99, 4, 6),
(154, 'bebek-img/alt5.jpg', 'Pembe Çizgili Pijama Altı', 'Pembe', 69.99, 57.99, 4, 6),
(155, 'bebek-img/alt6.jpg', 'Gri Puantiyeli Eşofman Altı', 'Gri', NULL, 27.99, 4, 6),
(156, 'bebek-img/zıbın1.jpg', 'Kareli Baskılı Bisiklet Yaka Takım', 'Kırmızı-Beyaz', NULL, 55.99, 9, 6),
(157, 'bebek-img/zıbın2.jpg', 'Baskılı Fırfırlı Gri Takım', 'Gri', 69.99, 57.99, 9, 6),
(158, 'bebek-img/zıbın3.jpg', 'Pembe Dantelli Zıbın', 'Pembe', NULL, 27.99, 9, 6),
(159, 'bebek-img/zıbın4.jpg', 'Lisanslı Tweety Baskılı Takım', 'Pembe', NULL, 55.99, 9, 6),
(160, 'bebek-img/zıbın5.jpg', 'Uzun Kollu Dantelli Body', 'Beyaz', 69.99, 57.99, 9, 6),
(161, 'bebek-img/zıbın6.jpg', 'Yazı Baskılı Bisiklet Yaka Zıbın', 'Gri', NULL, 17.99, 9, 6),
(162, 'bebek-img/ayak1.jpg', 'Gümüş Rengi Babet', 'Gümüş', NULL, 55.99, 7, 6),
(163, 'bebek-img/ayak2.jpg', 'Yüksek Boğazlı Spor Ayakkabı', 'Vizon', 69.99, 57.99, 7, 6),
(164, 'bebek-img/ayak3.jpg', 'Yüksek Boğazlı Spor Ayakkabı', 'Gri-Pembe', NULL, 27.99, 7, 6),
(165, 'bebek-img/ayak4.jpg', 'Tüy Astarlı Bot', 'Bej', NULL, 55.99, 7, 6),
(166, 'bebek-img/ayak5.jpg', 'Gold Babet', 'Gold', 69.99, 57.99, 7, 6),
(167, 'bebek-img/ayak6.jpg', 'Velboa Astarlı Bot', '', NULL, 179.99, 7, 6),
(168, 'bebek-img/eüst1.jpg', 'Köpek Baskılı Sweatshirt', 'Hardal', NULL, 55.99, 3, 5),
(169, 'bebek-img/eüst2.jpg', 'Sarı Sweatshirt', 'Sarı', 69.99, 57.99, 3, 5),
(170, 'bebek-img/eüst3.jpg', 'Yeşil Dinazor Baskılı Sweatshirt', 'Yeşil', NULL, 27.99, 3, 5),
(171, 'bebek-img/eüst4.jpg', 'Turuncu Baskılı Sweatshirt', 'Turuncu', NULL, 55.99, 3, 5),
(172, 'bebek-img/eüst5.jpg', 'Mavi Uzay Baskılı Sweatshirt', 'Mavi', 69.99, 57.99, 3, 5),
(173, 'bebek-img/e.jpg', 'Lacivert Sweatshirt', 'Lacivert', NULL, 17.99, 3, 5),
(174, 'bebek-img/ealt1.jpg', 'Koyu Gri Eşofman Altı', 'Gri', NULL, 55.99, 4, 5),
(175, 'bebek-img/ealt2.jpg', 'Açık Gri Baskılı Eşofman Altı', 'Gri', 69.99, 57.99, 4, 5),
(176, 'bebek-img/ealt3.jpg', 'Yeşil Uzay Baskılı Eşofman Altı', 'Yeşil', NULL, 27.99, 4, 5),
(177, 'bebek-img/ealt4.jpg', 'Kırmızı Baskılı Eşofman Altı', 'Kırmızı', NULL, 55.99, 4, 5),
(178, 'bebek-img/ealt5.jpg', 'Yarasa Baskılı Eşofman Altı', 'Siyah', 69.99, 57.99, 4, 5),
(179, 'bebek-img/ealt6.jpg', 'Açık Gri Eşofman Altı', 'Gri', NULL, 17.99, 4, 5),
(180, 'bebek-img/eayak1.jpg', 'Yüksek Boğazlı Spor Ayakkabı', 'Gri', NULL, 55.99, 7, 5),
(181, 'bebek-img/eayak2.jpg', 'Yüksek Boğazlı Spor Ayakkabı', 'Bej', 69.99, 57.99, 7, 5),
(182, 'bebek-img/eayak3.jpg', 'Yüksek Boğazlı Spor Ayakkabı', 'Beyaz', NULL, 27.99, 7, 5),
(183, 'bebek-img/eayak4.jpg', 'Yüksek Boğazlı Spor Ayakkabı', 'Lacivert', NULL, 55.99, 7, 5),
(184, 'bebek-img/eayak5.jpg', 'Yüksek Boğazlı Spor Ayakkabı', 'Gümüş', 69.99, 57.99, 7, 5),
(185, 'bebek-img/eayak6.jpg', 'Suni Koyun Yünü Astarlı Bot', 'Pembe', NULL, 79.99, 7, 5),
(186, 'bebek-img/ezıbın1.jpg', 'Lacivert Uzun Kollu Zıbın', 'Lacivert', NULL, 15.99, 9, 5),
(187, 'bebek-img/ezıbın2.jpg', 'Baskılı Uzun Kollu Zıbın', 'Mavi', 29.99, 17.99, 9, 5),
(188, 'bebek-img/ezıbın3.jpg', 'Kırmızı Baskılı Zıbın', 'Kırmızı', NULL, 27.99, 9, 5),
(189, 'bebek-img/ezıbın4.jpg', 'Beyaz Baskılı Zıbın', 'Beyaz', NULL, 15.99, 9, 5),
(190, 'bebek-img/ezıbın5.jpg', 'Yenidoğan 6\'lı Hastane Çıkış Seti', 'Mavi', 69.99, 57.99, 9, 5),
(191, 'bebek-img/ezıbın6.jpg', 'Baskılı Bisiklet Yaka Zıbın', 'Beyaz', NULL, 17.99, 9, 5),
(193, 'kadin.jpg', 'Bej Pantolon', 'Bej', 159.9, 95.9, 4, 1);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `tblalisverisgecmisi`
--
ALTER TABLE `tblalisverisgecmisi`
  ADD CONSTRAINT `tblalisverisgecmisi_ibfk_1` FOREIGN KEY (`musteriID`) REFERENCES `tblmusteri_hesaplari` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblalisverisgecmisi_ibfk_2` FOREIGN KEY (`urunID`) REFERENCES `tblurunler` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `tblfavoriler`
--
ALTER TABLE `tblfavoriler`
  ADD CONSTRAINT `tblfavoriler_ibfk_1` FOREIGN KEY (`musteriID`) REFERENCES `tblmusteri_hesaplari` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblfavoriler_ibfk_2` FOREIGN KEY (`favori_urunID`) REFERENCES `tblurunler` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `tblurunler`
--
ALTER TABLE `tblurunler`
  ADD CONSTRAINT `tblurunler_ibfk_1` FOREIGN KEY (`kategoriID`) REFERENCES `tblkategori` (`kategoriID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblurunler_ibfk_2` FOREIGN KEY (`cinsiyetID`) REFERENCES `tblcinsiyet` (`cinsiyetID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
