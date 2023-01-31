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

-- kitap.yorumlar: ~4 rows (yaklaşık) tablosu için veriler indiriliyor
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
