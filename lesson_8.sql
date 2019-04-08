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
  `show` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=358 DEFAULT CHARSET=utf8 COMMENT='Каталог кросовок';

-- Дамп данных таблицы personal.catalog: ~19 rows (приблизительно)
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
REPLACE INTO `catalog` (`id`, `name`, `price`, `category`, `img`, `discr`, `full_discr`, `size`, `show`) VALUES
	(144, 'Кроссовки № 34', 2209, 0, '144_2019-03-04_191452.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '41,43,45,47,49,51,53,55', 'Y'),
	(145, 'Кроссовки № 83', 1539, 0, '145_2019-03-04_191854.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '39,41,43,45,47,49,51,53,55', 'Y'),
	(146, 'Кроссовки № 76', 1279, 0, '146_2019-03-04_191810.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '40,42,44,46,48,50,52', 'Y'),
	(147, 'Кроссовки № 22', 1789, 0, '147_2019-03-04_191739.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '27,29,31,33,35,37,39,41', 'Y'),
	(148, 'Кроссовки № 40', 2729, 0, '148_2019-03-04_191539.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '43,45,47,49,51,53,55', 'Y'),
	(150, 'Кроссовки № 19', 1999, 0, '150_2019-03-04_191513.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '34,36,38,40,42,44', 'Y'),
	(151, 'Кроссовки № 68', 1469, 0, '151_2019-03-04_191353.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '20,22,24,26', 'Y'),
	(152, 'Кроссовки № 84', 2439, 0, '152_2019-03-04_191343.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '37,39,41,43,45,47,49,51,53', 'Y'),
	(153, 'Кроссовки № 999', 2509, 0, '153_2019-03-04_191305.png', 'Кроссовки не кроссовки', 'Лучшие кроссовки не кроссовки =)', '32,34,36,38,48', 'Y'),
	(154, 'Кроссовки № 89', 1089, 0, '154_2019-03-04_191255.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '22,24,26,28,30,32,34', 'Y'),
	(155, 'Кроссовки № 44', 1479, 0, '155_2019-03-04_191245.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '41,43,45,47,49,51', 'Y'),
	(156, 'Кроссовки № 10', 2859, 0, '156_2019-03-04_191235.png', 'Кроссовки что надо', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '32,34,36', 'Y'),
	(159, 'Кроссовки № 23', 1519, 0, '159_2019-03-04_191138.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '32', 'Y'),
	(160, 'Кроссовки № 98', 1999, 0, '160_2019-03-04_191131.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '44,46,48,50,52,54,56,58', 'Y'),
	(161, 'Кроссовки № 79', 1299, 0, '161_2019-03-04_191108.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '37,39,41,43,45,47,49,51', 'Y'),
	(162, 'Кроссовки № 202', 1499, 0, '162_2019-03-04_191053.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.', '32,34,36', 'Y'),
	(163, 'Кроссовки № 49', 1369, 0, '163_2019-03-04_185825.png', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis consectetur aut nesciunt explicabo, quia est.', '35,37,39,41,43,45', 'Y'),
	(200, 'Тестовое название', 2999, 0, '200_2019-03-04_234003.png', 'Тестовое описание', 'полное тестовое описание', '42,44,46', 'Y'),
	(204, 'Туфли - гробы', 999, 0, '204_2019-04-04_101308.jpg', 'Ну гробы ну', 'Туфель с тупым носом , как и его хозяин, аха ха ха)))', 'Какой нужен? Есть все! ', 'N');
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
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы personal.comment: ~38 rows (приблизительно)
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
	(65, 'Создатель', 'Самая настоящая авторизация. ', '2019-03-19 15:30:31', '82.151.209.202', 'comments'),
	(66, 'булочка', 'сходи на обед, отдохни)))', '2019-03-20 14:16:33', '188.16.23.87', 'gallery'),
	(67, 'Создатель', 'сегодня увы без обеда =))', '2019-03-21 11:35:36', '82.151.209.202', 'gallery'),
	(73, 'Дрон', 'Какой Дрон это Самвэл- где острый нос и гробики говорю? А! ', '2019-03-22 01:39:58', '95.25.51.197', 'comments'),
	(75, 'Том', 'Когда товар выбираешь, там какая абракадабра слева от слова корзина! ', '2019-03-22 08:09:56', '93.100.164.13', 'comments'),
	(76, 'Андрей', 'воу', '2019-03-22 12:22:03', '82.151.209.202', 'comments'),
	(77, 'Андрей', 'ау', '2019-03-22 12:22:29', '82.151.209.202', 'comments'),
	(78, 'Robert', 'sfawefawef', '2019-03-25 12:40:17', '109.167.245.171', 'comments'),
	(107, 'Самвэл', 'Здарова, это снова я, где мои туфли с острыми носами найк? Я жду заказ уже 100 лет!', '2019-03-25 14:15:30', '95.25.70.116', 'comments'),
	(108, 'test', 'test', '2019-03-25 15:16:50', '82.151.209.202', 'comments'),
	(109, 'Самвэл', 'Наконец-то появились мои туфли, сколько надо было ждать, что так долго то!))', '2019-04-04 00:08:45', '95.25.70.116', 'comments'),
	(110, 'Александр', 'Дел  много)) Завтра скорее всего сможешь их купить =))) ', '2019-04-04 00:38:08', '82.151.209.202', 'comments');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Дамп структуры для таблица personal.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_order` datetime DEFAULT NULL,
  `client_id` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT '0',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT '0',
  `status` enum('open','job','close','cancel') DEFAULT 'open',
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='Уникальные заказы';

-- Дамп данных таблицы personal.order: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
REPLACE INTO `order` (`id`, `date_order`, `client_id`, `name`, `phone`, `email`, `status`, `total_price`) VALUES
	(51, '2019-04-05 12:44:14', 'Александр_guest_2019-04-05_12_44_14', 'Александр', '79505555668', 'as@alltel24.ru', 'close', 6357),
	(52, '2019-04-05 13:02:33', '122', 'Александр', '79505555668', 'as@alltel24.ru', 'close', 4858);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Дамп структуры для таблица personal.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id_basket` int(11) NOT NULL DEFAULT '0',
  `id_product` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы personal.orders: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
REPLACE INTO `orders` (`id_basket`, `id_product`, `count`, `price`) VALUES
	(51, 156, 1, 2859),
	(51, 162, 1, 1499),
	(52, 156, 1, 2859),
	(52, 150, 1, 1999),
	(51, 150, 1, 1999);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Дамп структуры для таблица personal.photo
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_photo` varchar(255) NOT NULL,
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_photo` (`url_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=961 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы personal.photo: ~30 rows (приблизительно)
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
REPLACE INTO `photo` (`id`, `url_photo`, `views`) VALUES
	(905, 'lookcomua134270.jpg', 4),
	(906, 'meganfoksmeganfox1412.jpg', 6),
	(908, 'devushkaspinanebo.jpg', 2),
	(909, 'nastolcomua221886.jpg', 4),
	(910, 'nastolcomua220083.jpg', 3),
	(911, 'nastolcomua225898.jpg', 4),
	(912, 'krasivaiadevushkavkrasnompricheskamakiiazhportretsad.jpg', 12),
	(913, 'ulibaetsyadenizmilaniorig.jpg', 5),
	(914, 'platedevushkavvodeprirodareka.jpg', 10),
	(916, 'nastolcomua219310.jpg', 23),
	(917, '1501852608cutegirls20170804000626011.jpg', 13),
	(931, 'lookcomua166922.jpg', 4),
	(938, '4224EB87358B46E284D8E9DB2E16D99E.jpeg', 8),
	(941, '3d252.jpg', 2),
	(942, '48628533000x2000.jpg', 1),
	(943, '000497.jpg', 0),
	(944, '00712.jpg', 0),
	(945, '99125.jpg', 0),
	(946, 'upl1502545054104083.jpg', 1),
	(949, 'nazvaniya2.jpeg', 1),
	(950, 'nazvaniya.jpeg', 0),
	(951, '113918square250.jpg', 0),
	(952, 'depositphotos72609979stockphotoojosdegata.jpg', 1),
	(953, '173815maxresdefault.jpg', 0),
	(954, '11small.jpg', 0),
	(955, 'gbph.jpg', 0),
	(956, '1437940894971867398.jpg', 1),
	(957, 'b476ab37dd386ba1e36740856a3ff358980x.jpg', 0),
	(958, 'maxresdefault.jpg', 1),
	(960, 'e962a04d55604be39dea3b8a452dcaa61024x683.jpg', 3);
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;

-- Дамп структуры для таблица personal.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `role` enum('0','1','2','3') DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COMMENT='Юзеры сайта';

-- Дамп данных таблицы personal.users: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `last_name`, `phone`, `login`, `pass`, `role`) VALUES
	(110, 'Жанна ', 'Валерьевна', NULL, 'Valera90@mail.ru', '6eb54624134e320efe1df34453dacf3f', '0'),
	(112, 'Дрон', 'Сухариков', NULL, 'mamba@huyamba.com', '4fddc98ade1a63c547e1f9d92fdc3537', '0'),
	(113, 'Том', 'Ли', NULL, 'p200300@mail.ru', '83f7a45793355606c6c9fa40de2d54f6', '0'),
	(114, 'Андрей', 'Давыдов', NULL, 'davydov@alltel24.ru', 'c444bdc0d57ae7fa4d3761118946bbda', '0'),
	(115, 'Robert', 'Sabirov', NULL, 'wok95777@zoqqa.com', '9711bae4efb11d9125e65dcdf8478d45', '0'),
	(116, 'Артем', 'Климов', NULL, 'artem@klimov.com', 'e396c5746301c2edf96790128ff39cae', '1'),
	(117, 'Helen', 'Lan', NULL, 'belkahlpro@gmail.com', '9d2a8ff479838d708cf0dfd50a927cfa', '1'),
	(118, 'Пупырка', 'Огненная', NULL, 'pupirkagon@bk.com', '12893c3cd4cf46f79a8b7abd4ca8da26', '1'),
	(121, 'Александр', 'Челноков', '+79505555668', 'as@as.ru', '4a667bf77b9ecad0c7562a08a9594c02', '1'),
	(122, 'Александр', 'Челноков', '79505555668', 'as@alltel24.ru', '4a667bf77b9ecad0c7562a08a9594c02', '1'),
	(123, 'Александр', 'Чепиков', '79505555668', 'as@123.ru', '4a667bf77b9ecad0c7562a08a9594c02', '1'),
	(124, 'Самвэл', 'Карапитян', '79281280088', 'samvel@bk.ru', 'd22c2b568850dfc95b3ae2f6489ed0ed', '1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
