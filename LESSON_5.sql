-- --------------------------------------------------------
-- Хост:                         sip23.alltel24.ru
-- Версия сервера:               10.0.27-MariaDB-0+deb8u1 - (Debian)
-- Операционная система:         debian-linux-gnu
-- HeidiSQL Версия:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица personal.photo
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_photo` varchar(255) NOT NULL,
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_photo` (`url_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=565 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы personal.photo: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` (`id`, `url_photo`, `views`) VALUES
	(553, '1437940894971867398.jpg', 0),
	(556, 'maxresdefault.jpg', 0),
	(558, 'images2.jpeg', 0),
	(559, 'images.jpeg', 0),
	(560, '113918square250.jpg', 0),
	(563, '11small.jpg', 0);
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
