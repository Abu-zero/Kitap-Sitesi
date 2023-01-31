-- --------------------------------------------------------
-- Sunucu:                       localhost
-- Sunucu sürümü:                5.7.24 - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- kitap için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `kitap` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `kitap`;

-- tablo yapısı dökülüyor kitap.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `katid` int(11) NOT NULL AUTO_INCREMENT,
  `kisim` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`katid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- kitap.kategori: ~4 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`katid`, `kisim`) VALUES
	(1, 'Felsefe'),
	(2, 'Roman'),
	(3, 'Çocuk Edebiyatı'),
	(4, 'Bilim-Fantastik Kurgu ');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- tablo yapısı dökülüyor kitap.kitap
CREATE TABLE IF NOT EXISTS `kitap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `yazar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `yil` int(11) DEFAULT NULL,
  `resim` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ozet` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `katid` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- kitap.kitap: ~7 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `kitap` DISABLE KEYS */;
INSERT INTO `kitap` (`id`, `isim`, `yazar`, `yil`, `resim`, `ozet`, `katid`, `rating`) VALUES
	(5, 'Küçük Prens', 'Antoine de Saint-Exupéry', 1943, 'uploads/prens.jpg', 'Küçük Prens, Fransız yazar ve pilot Antoine de Saint-Exupéry tarafından yazılan ve 1943\'te yayımlanan masal. Dünyanın en çok satan ve okunan kitaplarından biridir. Eserde bir çocuğun gözünden büyüklerin dünyası anlatılır.', 3, 0),
	(6, 'Pinokyo', 'Carlo Collodi', 1881, 'uploads/pinokyo.jpg', 'Pinokyo, İtalyan yazar Carlo Collodi 1881 yılında yazdığı Pinokyo\'nun Serüvenleri adlı çocuk kitabının baş karakteri olan ve daha sonra kitabın değişik türde yapıtlara uyarlanmasıyla pek çok film, animasyon film, tiyatro oyunu, televizyon filminin kahramanı olan kurgusal karakter.', 3, 0),
	(7, 'Suç Ve Ceza', 'Fyodor Dostoyevski', 1866, 'uploads/suç.jpg', 'Tüm zamanların en çok konuşulan romanlarından Suç ve Ceza, psikolojik derinliği ve topluma tuttuğu aynayla gündemde kalmaya devam ediyor. St. Petersburg’dan dünyaya yayılan, hatta sınırlarını edebiyatın dışına çıkararak tartışma platformlarına ve sinema festivallerine taşıyan bu yapıt, tekrar tekrar okunmaya ve konuşulmaya değer!', 2, 0),
	(8, 'Şeker Portakalı', ' Jose Mauro De Vasconcelos', 1968, 'uploads/şeker.jpg', 'Acı dolu bir hayat sürdürmek ve bunu yaşamın olağan seyri gibi kabul etmek, ta ki hayattaki en gerçek ve karşı konulamaz acının ne olduğunu öğrenene kadar… Şeker Portakalı; yoksulluk ve sevgisizlik içinde yaşayan küçük Zeze’nin dünyasını, okuyucusuna yalnızca minik bir çocuğun gözünden değil, evrensel bir hakikat penceresinden sunuyor. ', 2, 0),
	(9, 'Fahrenheit 451', 'Ray Bradbury', 1953, 'uploads/451.png', 'Amerikan edebiyatının öne çıkan yazarlarından Ray Bradbury’nin 1953 yılında yayımlanan eseri Fahrenheit 451, on yıllar öncesinden bugünün ve uzak geleceğin dünyasına sert eleştiriler savuruyor. Distopik bir kurgusal düzlemde ilerleyen eser, teknolojinin gelişmesiyle birlikte toplumun gerileyen sanat ve düşünce dünyasını ele alıyor.', 4, 0),
	(10, 'Yüzüklerin Efendisi - I - Yüzük Kardeşliği', 'J. R. R. Tolkien', 1954, 'uploads/yuzuk.jpg', '\'Yüzüklerin Efendisi\' son yüzyılın en çok okunan yüz kitabı arasında en başta geliyor; bilimkurgu, fantezi, polisiye, best-seller ya da ana akım demeden, tüm edebiyat türleri arasında tartışmasız bir önderliğe sahip. Bir açıdan bakarsanız bir fantezi romanı, başka bir açıdan baktığınızda, insanlık durumu, sorumluluk, iktidar ve savaş üzerine bir roman. Bir yolculuk, bir büyüme öyküsü; fedakârlık ve dostluk üzerine, hırs ve ihanet üzerine bir roman.', 4, 0),
	(13, 'Yüzüklerin Efendisi - II - İki Kule', 'J. R. R. Tolkien', 1954, 'uploads/yüz.jpg', 'Macera, son hız devam ediyor! Yüzüklerin Efendisi – İki Kule, efsane serinin ikinci kitabı olarak okurlarıyla buluşuyor. Yazar John Ronald Reuel Tolkien’in unutulmaz serisi, okurlarını fantastik ve macera dolu bir dünyaya yolculuğa çıkarıyor. İlk kitapta öne çıkan Yüzük Kardeşliği ikinci kitapta bozulurken, taşlar yerinden oynuyor ve büyük savaşa giden yolda pek çok gizem netlik kazanıyor. Orta Dünya efsanesinin büyüsüne kapılacağınız bu serüven, bir çırpıda okunmayı bekleyen eserler arasında!', 4, 0);
/*!40000 ALTER TABLE `kitap` ENABLE KEYS */;

-- tablo yapısı dökülüyor kitap.yorumlar
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yildiz` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kitap_id` int(11) NOT NULL,
  `zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yisim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yorum` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`yorum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- kitap.yorumlar: ~5 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `yorumlar` DISABLE KEYS */;
INSERT INTO `yorumlar` (`yorum_id`, `yildiz`, `kitap_id`, `zaman`, `yisim`, `yorum`) VALUES
	(49, '★★★★', 6, '2021-06-13 15:36:37', '&Ouml;mer', 'Bu kitap harika :)'),
	(50, '★★★', 6, '2021-06-13 15:37:22', 'Deniz', 'Okuduğum en g&uuml;zel kitaplardan biriydi :)'),
	(51, '★★★★★', 5, '2021-06-13 15:38:00', '&Ouml;mer', 'Bu kitap muhteşem :)'),
	(52, '★★★★', 5, '2021-06-13 15:38:43', 'Deniz ', 'Bu kitap bir harika dostum :)'),
	(55, '★★★★★', 13, '2021-06-13 20:13:36', 'Deniz Eryılmaz', 'Okuduğum en g&uuml;zel fantastik kitaplardan :)');
/*!40000 ALTER TABLE `yorumlar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
