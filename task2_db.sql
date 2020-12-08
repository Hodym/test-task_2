-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 09 2020 г., 01:22
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task2_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `created_at`, `updated_at`) VALUES
(2, 1606838254, 1606838254),
(3, 1606845115, 1606845115),
(4, 1606846862, 1606846862);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reviews` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `created_at`, `updated_at`, `product_id`, `username`, `email`, `reviews`) VALUES
(1, 1607022938, 1607022938, 1, 'fhnfgn', 'fgnfg.fdfd@dfsdvf.rg', 'fgbgfnbfg'),
(2, 1607024543, 1607024543, 1, 'Dimon', 'efghjdfd@d.sfsd', 'SELECT\r\n    `kcu`.`CONSTRAINT_NAME` AS `constraint_name`,\r\n    `kcu`.`COLUMN_NAME` AS `column_name`,\r\n    `kcu`.`REFERENCED_TABLE_NAME` AS `referenced_table_name`,\r\n    `kcu`.`REFERENCED_COLUMN_NAME` AS `referenced_column_name`\r\nFROM `information_schema`.`REFERENTIAL_CONSTRAINTS` AS `rc`\r\nJOIN `information_schema`.`KEY_COLUMN_USAGE` AS `kcu` ON\r\n    (\r\n        `kcu`.`CONSTRAINT_CATALOG` = `rc`.`CONSTRAINT_CATALOG` OR\r\n        (`kcu`.`CONSTRAINT_CATALOG` IS NULL AND `rc`.`CONSTRAINT_CATALOG` IS NULL)\r\n    ) AND\r\n    `kcu`.`CONSTRAINT_SCHEMA` = `rc`.`CONSTRAINT_SCHEMA` AND\r\n    `kcu`.`CONSTRAINT_NAME` = `rc`.`CONSTRAINT_NAME`\r\nWHERE `rc`.`CONSTRAINT_SCHEMA` = database() AND `kcu`.`TABLE_SCHEMA` = database()\r\nAND `rc`.`TABLE_NAME` = \'feedback\' AND `kcu`.`TABLE_NAME` = \'feedback\''),
(3, 1607030025, 1607030025, 1, 'ghgjghfg', 'fdsvfd.ff@df.teg', 'Для того чтобы добавить модальному окну семантики, предназначенной в основном вспомогательным технологиям (экранным дикторам и др. пользовательским агентам), можно воспользоваться атрибутами ARIA.'),
(4, 1607030199, 1607030199, 1, 'gdgdf', 'efghjdfd@d.sffsd', 'Для того чтобы добавить модальному окну семантики, предназначенной в основном вспомогательным технологиям (экранным дикторам и др. пользовательским агентам), можно воспользоваться атрибутами ARIA.'),
(5, 1607096866, 1607096866, 1, 'nfhrt', 'tgrtg@fs.dve', 'tgrtg'),
(6, 1607097144, 1607097144, 1, 'gbdfb', 'efghfdjddfd@d.sfsd', 'dffffffffffffffffg fffffffffffffffffff sssssssssssssssss yyyyyyyyyyyyyyy eeeeeeeeeeee'),
(7, 1607097260, 1607097260, 1, 'fdfvd', 'efghfccdjddfd@d.sfsd', 'dffffffffffffffffg fffffffffffffvdfdsfffffff sssssssssssssssss yyyyyyyyyyyyyyy eeeeeeeeeeee'),
(8, 1607097842, 1607097842, 1, 'gdgdfgdf', 'efghfdjdffdfd@d.sfsd', 'fffff ssssssssssss ffffffffffffffff'),
(9, 1607097928, 1607097928, 2, 'gdgcvcdf', 'efghfdjvvdffdfd@d.sfsd', 'xxxxxxxxxxxxxxxxxx tttttttttttttttt uuuuuuuuuuuuu zzzzzzzzzzz'),
(10, 1607101873, 1607101873, 2, 'fdfvdhgf', 'efghfdjdhffdfd@d.sfsd', 'hhhhhhhhhhhhhhh mmmmmmmmmmmm rrrrrrrrrrrrr'),
(11, 1607102006, 1607102006, 2, 'ddvd', 'fffffddd@fs.dve', 'ffffffffff hhhhhhhhh sssssssss'),
(12, 1607102536, 1607102536, 2, 'gfgf', 'tgrtggg@fs.dve', 'gggggggggggg lllllllllllllll rrrrrrrrrrr'),
(13, 1607104800, 1607104800, 2, 'папв', 'dsds@df.rs', 'ddfg rrrrrrr ssss'),
(14, 1607105258, 1607105258, 2, 'тиьт', 'tgrtg@efs.dve', 'eeeeeeeeeee'),
(15, 1607106147, 1607106147, 2, ' vxfsds', 'sda@sad.tyr', 'bbbbbuuuuuuuuir eeeeeeeeeeeeee'),
(16, 1607106243, 1607106243, 2, 'gdgtdf', 'tgrrtg@fs.dve', 'nght'),
(17, 1607107036, 1607107036, 2, 'dcdc', 'efghfdjdfhfdfd@d.sfsd', 'hhhhhhhhhh fffffffff'),
(18, 1607107287, 1607107287, 2, 'Dimon', 'efghfccdjoddfd@d.sfsd', ' x xxxxxxxxxxxxxxxxx'),
(19, 1607107298, 1607107298, 2, 'Dimon', 'efghfccdjoddfd@d.sfsd', ' x xxxxxxxxxxxxxxxxx'),
(20, 1607107304, 1607107304, 2, 'Dimon', 'efghfccdjoddfd@d.sfsd', ' x xxxxxxxxxxxxxxxxx'),
(21, 1607107360, 1607107360, 2, 'Dimon', 'efghfdjdffdfd@d.sfsd', ' v ccccccccccccccc'),
(22, 1607107423, 1607112823, 2, 'Dimon', 'efghfdjdffdfd@d.sfsd', 'nnnnnnnnnnn ffffffffffff gggggggggg'),
(23, 1607107455, 1607112846, 2, 'Dimon', 'tgrtg@fs.dve', 'nnnnnnnnnnnnnnnn fhhtyrgfvc update'),
(24, 1607110409, 1607113099, 2, 'nfhrt', 'efghfccdjdgdfd@d.sfsd', 'nfnfgfg updated'),
(25, 1607111737, 1607111737, 1, 'Dimon', 'efghfdjdffdfd@d.sfsd', 'ds ggggggg yyyyyyyyyy'),
(26, 1607125191, 1607125191, 1, 'Dimon', 'efghffccdjddfd@d.sfsd', 'hhhhee ssssssss ggggggggg'),
(27, 1607125449, 1607125449, 1, 'dsgfrs', 'efghfddjdffdfd@d.sfsd', 'ffffffff hhhhhhhhhh jjjjjjjjjjj yyyyyyyyyyy'),
(28, 1607125837, 1607125837, 1, 'Dimon', 'efghfccdjddfd@d.sfsd', 'flash'),
(29, 1607125919, 1607125919, 1, 'Dimon', 'efghfccdjddfd@d.sfsd', 'flash 2'),
(30, 1607453218, 1607453244, 3, 'Dimon', 'tgrxtg@fs.dve', 'Very cool sneakers)'),
(31, 1607453407, 1607453407, 4, 'Dimon', 'efghfdjdffdfd@d.sfsd', 'де фото???');

-- --------------------------------------------------------

--
-- Структура таблицы `lang_category`
--

CREATE TABLE `lang_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `lang` varchar(32) NOT NULL,
  `category_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lang_category`
--

INSERT INTO `lang_category` (`id`, `name`, `description`, `lang`, `category_id`) VALUES
(3, 'Обувь', 'бла бла блал', 'ru', 2),
(4, 'Footwear', 'blah blah blahl', 'en', 2),
(5, 'Перчатки', 'бла бла бла', 'ru', 3),
(6, 'Gloves', 'blah blah blah', 'en', 3),
(7, 'Шапки', 'бла бла бла бла', 'ru', 4),
(8, 'Hats', 'blah blah blah blah', 'en', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `lang_product`
--

CREATE TABLE `lang_product` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `lang` varchar(32) NOT NULL,
  `product_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lang_product`
--

INSERT INTO `lang_product` (`id`, `name`, `description`, `lang`, `product_id`) VALUES
(1, 'Шапка Staff черная', 'Тёплая шапка от Staff имеет слегка приподнятую посадку, что делает данный аксессуар необычным и подходящим под разные образы.', 'ru', 1),
(2, 'Hats Staff black', 'Warm hat from Staff has a slightly raised fit, which makes this accessory unusual and suitable for different looks.', 'en', 1),
(3, 'Перчатки Staff fleece black size S-M', 'Перчатки от Staff – это стильный и удобный аксессуар, который будет уместен в повседневном образе. Они защищают от воды и холода, а также имеют удобный крой со вставками на большом пальце и ладони для удобной фиксации предметов в руке.  Материал: - микрофлис.  Детали икрой: - длина: 26 см; - ширина: 12 см; - лента с пластиковым фиксатором для удобной стяжки на запястье; - бирка с фирменным логотипом Staff вшита в боковой шов; - небольшой пластиковый фастекс для крепления между собой.  Цвет: - чёрный.  Сезон: - зима.', 'ru', 2),
(4, 'Gloves Staff fleece black size S-M', 'Staff gloves are a stylish and comfortable accessory that will be appropriate for your everyday look. They protect against water and cold, and also have a comfortable fit with inserts on the thumb and palm for a comfortable fixation of objects in the hand.  Material: - microfleece.  Caviar details: - length: 26 cm; - width: 12 cm; - tape with a plastic retainer for a comfortable wrist strap; - a tag with the staff logo is sewn into the side seam; - a small plastic fastex for attaching to each other.  Colour: - the black.  Season: - winter.', 'en', 2),
(5, 'Кроссовки Puma Enzo', 'Все новые Enzo имеют уникальный внешний вид и привлекают внимание. Увеличенная высота язычка и конструкция застежки придают модели свежесть и оригинальность. На носке и пятке – воздухопроницаемая сетка. Ремешок в средней части стопы надежно фиксирует ногу, гарантирует идеальную посадку и поддержку. Анатомическая стелька Softfoam и промежуточная подошва IMEVA обеспечивают отличную амортизацию и комфорт во время каждой тренировки. Характеристики Коллекция: Весна-лето 2020 Материал подошвы: Промежуточная подошва IMEVA обеспечивает отличную амортизацию и комфорт во время тренировок Стиль: Спортивный Вид спорта: Бег Cтелька с эффектом памяти SoftFoam принимает форму стопы и предохраняет мышцы ног от усталости Страна-производитель: Китай', 'ru', 3),
(6, 'Sneakers Puma Enzo', 'All new Enzo have a unique look and feel. The increased tongue height and fastening design give the model freshness and originality. Breathable mesh on the toe and heel. The midfoot strap secures the foot securely for a perfect fit and support. Anatomical Softfoam insole and IMEVA midsole provide excellent cushioning and comfort during every workout. Specifications Collection: Spring-Summer 2020 Outsole material: IMEVA midsole provides excellent cushioning and comfort during training Style: Sports Sport: Running SoftFoam memory foam insole conforms to the shape of the foot and protects the leg muscles from fatigue Country of origin: China', 'en', 3),
(7, 'Черные кроссовки Puma INTERFLEX Modern', 'Кроссовки INTERFLEX Modern – это олицетворение современности и уличного стиля. Это сочетание эффектного дизайна и непревзойденного комфорта. Подходят для мужчин и женщин. Детали Коллекция: Весна-лето 2020 Стиль: Спортивный Вид спорта: Бег Характеристики Материал верха: Легкий и воздухопроницаемый сетчатый материал Материал подошвы: Промежуточная подошва – ЭВА; внешнее покрытие – резина, ЭВА Пол: Унисекс Заниженный силуэт Классическая конструкция язычка На шнуровке Стелька SoftFoam – для дополнительного комфорта Петельки на язычке и пятке: обувь легко надевать и снимать Надпись «PUMA», логотип PUMA Cat Страна-производитель: Китай', 'ru', 4),
(8, 'Black sneakers Puma INTERFLEX Modern', 'INTERFLEX Modern sneakers are the embodiment of modernity and street style. It is a combination of effective design and unsurpassed comfort. Suitable for men and women. Details Collection: Spring-Summer 2020 Style: Sport Sport: Running Characteristics Top material: Lightweight and breathable mesh material Sole material: Intermediate sole - EVA; outer cover - rubber, EVA Gender: Unisex Lower silhouette Classic tongue design On lacing SoftFoam insole - for extra comfort Loops on the tongue and heel: shoes are easy to put on and take off Inscription \"PUMA\", PUMA Cat logo Country of origin: China', 'en', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1606310016),
('m201126_110637_Multilingual', 1606836580);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `filename`, `price`, `category_id`) VALUES
(1, '1607001143__M4d0.jpeg', 199.99, 4),
(2, '1607001377_N9811.jpg', 180, 3),
(3, '1607453150_OL_5L.jpeg', 999, 2),
(4, NULL, 1270, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-feedback-product_id` (`product_id`);

--
-- Индексы таблицы `lang_category`
--
ALTER TABLE `lang_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-lang_category-category_id` (`category_id`);

--
-- Индексы таблицы `lang_product`
--
ALTER TABLE `lang_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-lang_product-product_id` (`product_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-product-category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `lang_category`
--
ALTER TABLE `lang_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `lang_product`
--
ALTER TABLE `lang_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk-feedback-product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lang_category`
--
ALTER TABLE `lang_category`
  ADD CONSTRAINT `fk-lang_category-category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lang_product`
--
ALTER TABLE `lang_product`
  ADD CONSTRAINT `fk-lang_product-product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk-product-category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
