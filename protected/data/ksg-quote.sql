-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2012 at 01:36 AM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yiiquote`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authors`
--

CREATE TABLE IF NOT EXISTS `tbl_authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(250) NOT NULL,
  `author_preview` text NOT NULL,
  `author_desc` longtext NOT NULL,
  `author_img` varchar(250) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_authors`
--

INSERT INTO `tbl_authors` (`author_id`, `author_name`, `author_preview`, `author_desc`, `author_img`, `create_time`, `update_time`, `user_id`) VALUES
(0, 'Не указан', 'Не указан', '', '', 1342617945, 1342617945, 1),
(1, 'Пушкин Александр Сергеевич', '<p>\r\n	<span style="text-align: justify; ">Пушкин Александр Сергеевич (1799- 1837 гг.)</span></p>\r\n<p style="text-align: justify; ">\r\n	<img align="" alt="" height="207" src="/yiiquote/images/pushkin.jpg" width="186" /></p>\r\n<p style="text-align: justify; ">\r\n	<br />\r\n	Великий русский поэт, прозаик, драматург, публицист, критик.<br />\r\n	<br />\r\n	Родился 26 мая (6 июня) в Москве, в Немецкой слободе. Воспитанный французскими гувернерами, из домашнего обучения вынес только прекрасное знание французского и любовь к чтению.</p>\r\n<p style="text-align: justify; ">\r\n	<span style="text-align: justify; ">В 1811 г. Пушкин поступил в только что открытый Царскосельский лицей. После окончания лицея в июне 1817 г. в чине коллежского секретаря Пушкин был определен на службу в Коллегию иностранных дел, где не работал и дня, всецело отдавшись творчеству. К этому периоду относятся стихотворения &laquo;Вольность&raquo;, &laquo;К Чаадаеву&raquo;, &laquo;Деревня&raquo;, &laquo;На Аракчеева&raquo;.</span></p>\r\n', '<p style="text-align: justify; ">\r\n	Еще до окончания лицея, в 1817 г., начал писать поэму &laquo;Руслан и Людмила&raquo;, которую закончил в марте 1820 г.</p>\r\n<p>\r\n	<span style="text-align: justify; ">В мае он был сослан на юг России за то, что &laquo;наводнил Россию возмутительными стихами&raquo;. В июле 1823 г Пушкина перевели под начало графа Воронцова, и он переехал в Одессу. В Михайловском, куда он был выслан в 1824 г, Пушкин сформировался как художник-реалист: продолжил писать &laquo;Евгения Онегина&raquo;, начал &laquo;Бориса Годунова&raquo;, написал стихи &laquo;Давыдову&raquo;, &laquo;На Воронцова&raquo;, &laquo;На Александра I&raquo; и др.</span></p>\r\n<p style="text-align: justify; ">\r\n	17 декабря 1825 г узнает о восстании декабристов и аресте многих своих друзей. Опасаясь обыска, он уничтожил автобиографические записки, которые, по его словам, &laquo;могли замешать многих и, может быть, умножить число жертв&raquo;.<br />\r\n	<br />\r\n	В 1828 г самовольно уехал на Кавказ. Впечатления от этой поездки переданы в его очерках &laquo;Путешествие в Арзрум&raquo;, стихотворениях &laquo;Кавказ&raquo;, &laquo;Обвал&raquo;, &laquo;На холмах Грузии&raquo;.<br />\r\n	<br />\r\n	В 1830 г эпидемия холеры вынудила его на несколько месяцев задержаться в Болдино. Этот период творчества поэта известен как &laquo;Болдинская осень&raquo;. В Болдине написаны такие произведения, как &laquo;Повести покойного Ивана Петровича Белкина&raquo;, &laquo;Маленькие трагедии&raquo;, &laquo;Домик в Коломне&raquo;, &laquo;Сказка о попе и о работнике его Балде&raquo;, стихотворения &laquo;Элегия&raquo;, &laquo;Бесы&raquo;, &laquo;Прощение&raquo; и множество других, закончен &laquo;Евгений Онегин&raquo;.<br />\r\n	<br />\r\n	Летом 1831 г. вновь поступил на государственную службу в Иностранную коллегию с правом доступа в государственный архив. Начал писать &laquo;Историю Пугачева&raquo;, историческое исследование &laquo;История Петра I&raquo;.<br />\r\n	<br />\r\n	Последние годы жизни Пушкина прошли в тяжелой обстановке все обострявшихся отношений с царем и вражды к поэту влиятельных кругов придворной и чиновничьей аристократии. Но, хотя в таких условиях творческая работа не могла быть интенсивной, именно в последние годы написаны &laquo;Пиковая дама&raquo;, &laquo;Египетские ночи&raquo;, &laquo;Капитанская дочка&raquo;, поэма &laquo;Медный всадник&raquo;, сказки.<br />\r\n	<br />\r\n	В конце 1835 г. Пушкин получил разрешение на издание своего журнала, названного им &laquo;Современник&raquo;.<br />\r\n	<br />\r\n	Зимой 1836 г. завистники и враги Пушкина из высшей петербургской аристократии пустили в ход подлую клевету о взаимоотношениях его жены Натальи Николаевны с Ж. Дантесом. Пушкин вызвал Дантеса на дуэль, которая состоялась 27 января (8 февраля) 1837 г. на Черной речке. Поэт был смертельно ранен.<br />\r\n	<br />\r\n	Опасаясь демонстраций, царь приказал тайно вывезти тело Пушкина из Петербурга.</p>\r\n', 'pushkin.jpg', 1342617945, 1342617945, 1),
(3, 'Анатоль Франс', '<p>\r\n	<img align="" alt="" height="314" src="/yiiquote/images/220px-Anatole_France_1921.png" width="220" /></p>\r\n<p>\r\n	Отец Анатоля Франса был владельцем книжного магазина, специализировавшегося на литературе, посвященной истории Великой французской революции. Анатоль Франс с трудом закончил иезуитский коллеж, в котором учился крайне неохотно, и, провалившись несколько раз на выпускных экзаменах, сдал их только в возрасте 20 лет.<br />\r\n	В 1866 Анатоль Франс вынужден был сам зарабатывать на жизнь, и начал карьеру библиографом. Постепенно он знакомится с литературной жизнью того времени, и становится одним из заметных участников парнасской школы.</p>\r\n', '<p>\r\n	Во время Франко-прусской войны 1870&mdash;1871 Франс некоторое время служил в армии, а после демобилизации продолжал писать и выполнять различную редакторскую работу.<br />\r\n	В 1875 у него появляется первая настоящая возможность проявить себя в качестве журналиста, когда парижская газета &laquo;Время&raquo; (&laquo;Le Temps&raquo;) заказала ему серию критических статей о современных писателях. Уже в следующем году он становится ведущим литературным критиком этой газеты и ведёт свою собственную рубрику под названием &laquo;Литературная жизнь&raquo;.<br />\r\n	В 1876 он также назначается заместителем директора библиотеки французского Сената и в течение последующих четырнадцати лет занимает этот пост, что давало ему возможность и средства заниматься литературой.<br />\r\n	В 1922 его сочинения были включены в католический &laquo;Индекс запрещённых книг&raquo;.</p>\r\n', '', 1342617945, 1342617945, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `create_time`, `update_time`, `user_id`) VALUES
(1, 'Мудрые', 1342613253, 1343212358, 1),
(4, 'Жизненные', 1343309602, 1343309602, 1),
(5, 'Смешные', 1343596133, 1343596133, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quote`
--

CREATE TABLE IF NOT EXISTS `tbl_quote` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_name` varchar(100) NOT NULL,
  `quote_date` int(11) NOT NULL,
  `quote_text` longtext NOT NULL,
  `quote_source` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`quote_id`),
  KEY `author_id` (`author_id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2497 ;

--
-- Dumping data for table `tbl_quote`
--

INSERT INTO `tbl_quote` (`quote_id`, `quote_name`, `quote_date`, `quote_text`, `quote_source`, `category_id`, `author_id`, `user_id`, `create_time`, `update_time`) VALUES
(1, 'Лучше понять мало, чем понять плохо.', 1343160000, '<p>\r\n	Лучше понять мало, чем понять плохо.</p>\r\n', '', 1, 3, 1, 1343212336, 1343212336),
(2, 'Не гонялся бы ты, поп, за дешевизной', 1343160000, '<p>\r\n	А Балда приговаривал с укоризной:<br />\r\n	&quot;Не гонялся бы ты, поп, за дешевизной&quot;.&nbsp;</p>\r\n', '', 4, 1, 1, 1343212336, 1343595824),
(3, 'Вешают за морем За два яица', 1343160000, '<p>\r\n	Говорил он с горем<br />\r\n	Фрейлинам дворца:<br />\r\n	&laquo;Вешают за морем<br />\r\n	За два яица!<br />\r\n	То есть разумею, &mdash;<br />\r\n	Вдруг примолвил он, &mdash;<br />\r\n	Вешают за шею,<br />\r\n	Но жесток закон&raquo;.</p>\r\n', '', 5, 1, 1, 1343212336, 1343596151),
(4, '«Это невозможно» — сказала Причина', 1343160000, '<p>\r\n	&laquo;Это невозможно&raquo; &mdash; сказала Причина. </p>\r\n<p>\r\n	&laquo;Это безрассудно&raquo; &mdash; сказал Опыт.</p>\r\n<p>\r\n	&laquo;Это бесполезно&raquo; &mdash; отрезала Гордость. </p>\r\n<p>\r\n	&laquo;Попробуй...&raquo; &mdash; шепнула Мечта...</p>\r\n', '', 1, 0, 1, 1343212336, 1343596789);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_sname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `salt`, `user_sname`, `email`, `profile`, `is_admin`) VALUES
(1, 'admin', 'c435aa582b2c10e16536bdf1424e8fd2', 'mp3eptygbsnwajnhxk2d6vjbbv6i6kip', 'Администратор', 'admin@ksg-quote.loc', '', 1),
(2, 'demo', 'a2be7e621e8c2deed5fd135c72fc5da8', 'ohchy6yww256nco8pqwm7fq7r6fjf6uj', 'Демо-пользователь', 'demo@ksg-quote.loc', '', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_quote`
--
ALTER TABLE `tbl_quote`
  ADD CONSTRAINT `tbl_quote_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `tbl_authors` (`author_id`),
  ADD CONSTRAINT `tbl_quote_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`),
  ADD CONSTRAINT `tbl_quote_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);
