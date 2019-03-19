-- --------------------------------------------------------
-- Хост:                         filtron.alltel24.ru
-- Версия сервера:               10.0.26-MariaDB-0+deb8u1 - (Debian)
-- Операционная система:         debian-linux-gnu
-- HeidiSQL Версия:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных personal
CREATE DATABASE IF NOT EXISTS `personal` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `personal`;

-- Дамп структуры для таблица personal.catalog
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `category` int(11) NOT NULL COMMENT 'категория товара',
  `img` varchar(50) NOT NULL,
  `discr` text NOT NULL COMMENT 'краское описание',
  `full_discr` text NOT NULL COMMENT 'полное описание',
  `size` varchar(50) NOT NULL COMMENT 'цена',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8 COMMENT='Каталог кросовок';

-- Дамп данных таблицы personal.catalog: ~17 rows (приблизительно)
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
REPLACE INTO `catalog` (`id`, `name`, `price`, `category`, `img`, `discr`, `full_discr`, `size`) VALUES
	(144, 'Кроссовки № 34', 2200, 3, '11102014-1605b-009_1-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '41,43,45,47,49,51,53,55'),
	(145, 'Кроссовки № 83', 1537, 3, '12698149_3.jpeg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '39,41,43,45,47,49,51,53,55'),
	(146, 'Кроссовки № 76', 1272, 3, '13042016-4118-012_1-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '40,42,44,46,48,50,52'),
	(147, 'Кроссовки № 22', 1788, 3, '13042016-4124-004_1-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '27,29,31,33,35,37,39,41'),
	(148, 'Кроссовки № 40', 2721, 3, '13042016-4124-008_1-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '43,45,47,49,51,53,55'),
	(150, 'Кроссовки № 19', 2875, 3, '177618563f653-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '34,36,38,40,42,44'),
	(151, 'Кроссовки № 68', 1460, 3, '18062015-2771-004_1-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '20,22,24,26'),
	(152, 'Кроссовки № 83', 2438, 3, '20102016-5050-018_1-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '37,39,41,43,45,47,49,51,53'),
	(153, 'Кроссовки № 99', 2505, 3, '210213shoesneig26_1-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '39,41,43,45,47,49'),
	(154, 'Кроссовки № 89', 1083, 3, '27042016-4208-009_1-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '22,24,26,28,30,32,34'),
	(155, 'Кроссовки № 44', 1475, 3, '9409bbbd2282d62e107ae8533a71a02b.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '41,43,45,47,49,51'),
	(156, 'Кроссовки № 10', 2852, 3, 'IMG_6545-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '36,38,40,42,44,46,48,50'),
	(159, 'Кроссовки № 22', 1502, 3, 'air-jordan-13-retro-414571-042-0-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '21,23,25,27,29'),
	(160, 'Кроссовки № 98', 1067, 3, 'bd895861e13d9cda2e65cdd35d2e99d9.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '44,46,48,50,52,54,56,58'),
	(161, 'Кроссовки № 79', 1292, 3, 'detska-obuv.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '37,39,41,43,45,47,49,51'),
	(162, 'Кроссовки № 19', 1494, 3, 'takticheskie-botinki-assault-boot-esdy-black-2.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '36,38,40,42,44,46,48,50'),
	(163, 'Кроссовки № 49', 1368, 3, 'tommy-hilfiger-fm56821599-0768-270x270.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '35,37,39,41,43,45');
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;

-- Дамп структуры для таблица personal.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `text` text,
  `eventtime` datetime DEFAULT NULL,
  `person_ip_addr` varchar(20) DEFAULT NULL,
  `page` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы personal.comment: ~20 rows (приблизительно)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
REPLACE INTO `comment` (`id`, `name`, `text`, `eventtime`, `person_ip_addr`, `page`) VALUES
	(18, 'Александр', 'Первый комментарий! =)', '2019-03-18 01:07:15', NULL, 'comments'),
	(19, 'Александр', 'комментарий с телефона ', '2019-03-18 01:08:39', NULL, 'comments'),
	(22, 'Paradoxalyty', 'Нормальненько', '2019-03-18 01:17:53', NULL, 'comments'),
	(24, 'Mega-DRON', 'Достаточно прикольная и веселая штука :)', '2019-03-18 01:32:50', NULL, 'comments'),
	(29, 'SID SID', 'Я дебил, хотел хакнуть систему', '2019-03-18 13:28:11', NULL, 'comments'),
	(30, 'we', 'Я дебил, хотел хакнуть систему, но меня раскрыли =(', '2019-03-18 13:28:50', NULL, 'comments'),
	(31, 'шаша', 'Я дебил, хотел хакнуть систему, но меня раскрыли =(', '2019-03-18 13:37:22', NULL, 'comments'),
	(32, 'Bertrezen', 'Ещё на шаг ближе к цели)', '2019-03-18 15:41:18', NULL, 'comments'),
	(34, 'Тест', 'Тест', '2019-03-18 19:13:51', NULL, 'comments'),
	(35, 'test', 'Я дебил, хотел хакнуть систему, но меня раскрыли =(', '2019-03-18 19:14:34', NULL, 'comments'),
	(36, 'БелкОс', 'У тебя не пишет что загружает и загружает ли вообще файлы...Боль))', '2019-03-18 19:23:53', NULL, 'gallery'),
	(37, 'Добрый хрен', 'Ты не можешь меня забанить и не можешь удалить мой комент- знай, что php правит миром, а разработчики создают мир !)) ', '2019-03-18 20:47:05', NULL, 'gallery'),
	(42, 'Добрый хрен', 'Печеньки блин!', '2019-03-18 21:34:28', '188.162.64.217', 'gallery'),
	(46, 'Добрый хрен', 'Печеньки блин2!', '2019-03-18 21:40:35', '82.151.209.202', 'comments'),
	(47, 'Злостный хрен', 'Тебе Меня не победить!) бугага', '2019-03-18 21:48:48', '188.162.64.217', 'gallery'),
	(48, 'Белко', 'Пых пых))', '2019-03-18 22:03:03', '188.162.64.217', 'catalog'),
	(55, 'Пыхачу', 'Пыхачу черный не носит))', '2019-03-18 22:53:05', '139.28.52.92', 'catalog'),
	(56, 'Вай опять я сюда зашел !', 'Все , купил уже! Ухожу !', '2019-03-19 00:41:46', '95.25.51.197', 'catalog'),
	(57, 'Брат', 'Слушай, а твой конвертар доллары принимает, да? ', '2019-03-19 00:42:45', '95.25.51.197', 'calcucator'),
	(58, 'dfgh', 'srtherst', '2019-03-19 13:40:10', '82.151.209.202', 'calcucator'),
	(59, 'Приветики', 'Вчера же было много комментов! Капиталайз в цсс — это Особый жанр извращений )) Посмотрим, как в базу сохранится. Думаю, что там будет всё норм.', '2019-03-19 15:16:09', '31.173.83.49', 'ttp://lesson_6.geekbrains.club/'),
	(60, 'Йоу', 'Огонь! Работает.', '2019-03-19 15:16:32', '31.173.83.49', 'ttp://lesson_6.geekbrains.club/'),
	(61, 'Дизайнер другой', 'Дизайн отличается от всего Сайта ))', '2019-03-19 15:17:19', '31.173.83.49', 'catalog'),
	(62, 'Огонь!', 'Топчик!', '2019-03-19 15:17:36', '31.173.83.49', 'comments'),
	(63, 'Создатель', 'Как будет у меня личный дизайнерон обязательно будет писать хорошие дизайны =) а пока -  пишу их =))', '2019-03-19 15:19:39', '82.151.209.202', 'catalog'),
	(64, 'Ты уже авторизацию сделал?', 'Или это пока заглушка?', '2019-03-19 15:19:55', '31.173.83.49', 'comments'),
	(65, 'Создатель', 'Самая настоящая авторизация. ', '2019-03-19 15:30:31', '82.151.209.202', 'comments');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Дамп структуры для таблица personal.photo
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_photo` varchar(255) NOT NULL,
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_photo` (`url_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=948 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы personal.photo: ~19 rows (приблизительно)
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
REPLACE INTO `photo` (`id`, `url_photo`, `views`) VALUES
	(905, 'lookcomua134270.jpg', 4),
	(906, 'meganfoksmeganfox1412.jpg', 6),
	(908, 'devushkaspinanebo.jpg', 2),
	(909, 'nastolcomua221886.jpg', 3),
	(910, 'nastolcomua220083.jpg', 3),
	(911, 'nastolcomua225898.jpg', 4),
	(912, 'krasivaiadevushkavkrasnompricheskamakiiazhportretsad.jpg', 12),
	(913, 'ulibaetsyadenizmilaniorig.jpg', 5),
	(914, 'platedevushkavvodeprirodareka.jpg', 9),
	(916, 'nastolcomua219310.jpg', 21),
	(917, '1501852608cutegirls20170804000626011.jpg', 12),
	(931, 'lookcomua166922.jpg', 4),
	(938, '4224EB87358B46E284D8E9DB2E16D99E.jpeg', 7),
	(941, '3d252.jpg', 0),
	(942, '48628533000x2000.jpg', 1),
	(943, '000497.jpg', 0),
	(944, '00712.jpg', 0),
	(945, '99125.jpg', 0),
	(946, 'upl1502545054104083.jpg', 1);
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
