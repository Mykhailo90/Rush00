-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 24 2018 г., 09:43
-- Версия сервера: 5.7.22
-- Версия PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rush00`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `sid` varchar(150) NOT NULL,
  `id_good` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `monufact` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_id`
--

CREATE TABLE `catalog_id` (
  `id` int(11) NOT NULL,
  `catalog_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_id`
--

INSERT INTO `catalog_id` (`id`, `catalog_name`) VALUES
(1, 'Протеины'),
(2, 'Аминокислоты'),
(3, 'Продукция для похудения'),
(4, 'Предтренировочные комплексы'),
(5, 'Витамины');

-- --------------------------------------------------------

--
-- Структура таблицы `foods_categ`
--

CREATE TABLE `foods_categ` (
  `id_categ` int(11) NOT NULL,
  `id_food` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `foods_categ`
--

INSERT INTO `foods_categ` (`id_categ`, `id_food`) VALUES
(1, 1),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `position` varchar(128) NOT NULL,
  `monufact` varchar(128) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `position`, `monufact`, `amount`, `price`, `img`) VALUES
(1, '100% Whey Proteine', 'Optimum Nutrition', '2.3kg', 1350, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/whey100rasprodazha-300x366.jpg'),
(2, 'Creatine Monogidrate', 'BioTech', '500gr', 260, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/01/100-Creatine-Monohydrate-BioTech-USA-1000g-300x366.jpg'),
(3, 'ZMA', 'Activlab', '120caps', 400, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/01/Pit4sport-_ZMA-120-caps-300x366.jpg'),
(4, 'Caffeine', 'Allmax', '100tab', 75, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/allmax-caffeine-100-tabs-1-300x366.jpg'),
(5, 'Brutal Muscle', 'Biotech', '908gr', 700, 'http://www.pit4sport.com.ua/wp-content/uploads/2017/02/brutal_on_pit4sport-e1488041033248-300x366.jpg'),
(6, 'Syntha-6', 'BSN', '2.2kg', 1350, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/BSN-Syntha-6-2-300x366.jpg'),
(7, 'Elite Gurme', 'Dymatize', '907gr', 590, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Dymatize-Nutrition-Elite-Gourmet-907g-1-300x366.jpg'),
(8, 'Elite Xt', 'Dymatize', '2kg', 950, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Dymatize-Nutrition-Elite-XT-2.000-kg-300x366.jpg'),
(9, 'Whey Perfomance', 'Optimum Nutrition', '1.95kg', 1000, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/03/ON-Whey-perfomance-300x366.jpg'),
(10, 'Whey-Proteine', 'Power Pro', '2kg', 360, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/01/WHEY_PROTEIN_POWER_PRO_vanil-300x366.jpg'),
(11, 'Amino 2700', 'Universal Nutrition', '120tab', 450, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/03/Pit4sport_-Amino_2700_Universal_Nutrition_120-300x366.jpg'),
(12, 'Amino Recover', 'Inner Armour', '104gr', 250, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Inner-Armour-Blue-Amino-Recovery-16-serving_supplementcentral-300x366.jpg'),
(13, 'Anabokic Amino 9000', 'Olimp', '300tab', 780, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/02/Pit4sport-_Anabolic-Amino-9000-mega-tabs-Olimp-Labs-300-tab-pit4sport.com_.ua_-300x366.jpg'),
(14, 'Bcaa 6000', 'Biotech', '100tab', 280, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/02/Pit4sport-_BCAA-6000-BioTech-USA-100-kapsul-300x366.jpg'),
(15, 'AminoX', 'BSN', '1.015kg', 950, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/BCAA-Amino-X-BSN-1.015-kg-70-porciy-1-300x366.jpg'),
(16, 'BCAA Xplode', 'Olimp', '1kg', 940, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/01/BCAA-XPLODE-Powder-300x366.jpg'),
(17, 'N.O-Xplode', 'BSN', '1.11kg', 1150, 'http://www.pit4sport.com.ua/wp-content/uploads/2017/02/no_xplode1.11-300x366.jpg'),
(18, 'Amino Energy', 'Gold Labs', '500gr', 460, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/07/9-300x366.jpg'),
(19, 'Amino Energy System', 'Power Pro', '500gr', 270, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Power-Pro-Amino-Energy-System-300x366.jpg'),
(20, 'Taurine', 'Olimp', '120tab', 150, 'http://www.pit4sport.com.ua/wp-content/uploads/2017/02/327840166_w640_h640_aminokisloty_o__s_120_caps-300x366.png'),
(21, 'Arginine', 'Power Pro', '300gr', 350, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Power-Pro-arginine-300x366.jpg'),
(22, 'Mega Men', 'GNC', '180tab', 560, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Mega-Men-GNC-180-tabletok-1-300x366.jpg'),
(23, 'Hair,Nails, Skin', 'Formlabs', '60tab', 320, 'http://www.pit4sport.com.ua/wp-content/uploads/2017/02/form_labs_naturals_hair-300x366.jpg'),
(24, 'Multi Mineral Complex', 'Biotech', '100', 175, 'http://www.pit4sport.com.ua/wp-content/uploads/2016/04/biotech-multi-mineral-complex-300x366.jpg'),
(25, 'Opti-Men', 'Optimum Nutrition', '240tab', 850, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Optimum-Nutrition-Opti-Men-240-tabletok-1-300x366.jpg'),
(26, 'Daily Vita-Min', 'Scitec Nutrition', '90tab', 270, 'http://www.pit4sport.com.ua/wp-content/uploads/2017/02/essentials-daily-vita-min-500x500-300x366.jpg'),
(27, 'Animal Pack', 'Universal Nutrition', '44pac', 890, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Universal-Nutrition-Animal-Pak-44-pak-300x366.jpg'),
(28, 'CLA', 'Scitec Nutrition', '60tab', 325, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Scitec-Nutrition-Essentials-CLA-1-1-300x366.jpg'),
(29, 'Black spider', 'Cloma Pharma', '100tab', 520, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Black-Spider-100-caps-2-300x366.jpg'),
(30, 'L-Carnitine 3000', 'BioTech', '25k', 450, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/L-Carnitine-ampule-3000-BioTech-20x25-ml-1-300x366.jpg'),
(31, 'L-Carnitine 2000', 'BioTech', '25k', 430, 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/L-Carnitine-ampule-2000-BioTech-20x25-ml-1-300x366.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `images_url`
--

CREATE TABLE `images_url` (
  `image_name` varchar(50) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images_url`
--

INSERT INTO `images_url` (`image_name`, `url`) VALUES
('pit4sport_logo', 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/Pit4Sport_logo-e1449069029336.png'),
('SN_Casein_2kg', 'http://www.pit4sport.com.ua/wp-content/uploads/2017/02/Scitec_Nutrition_100_Casein_Complex.jpg'),
('basket', 'http://mirfitness.info/wp-content/uploads/2017/07/Sportivnoe-pitanie-dlya-myishechnoy-massyi-2-3.jpg'),
('call_img', 'http://www.pit4sport.com.ua/wp-content/uploads/2015/12/widget221.png'),
('basket_ampty', 'https://thumbs.dreamstime.com/b/shopping-cart-icon-vector-14609780.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `zakaz` varchar(500) NOT NULL,
  `aktive` int(11) NOT NULL,
  `time_z` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `zakaz`, `aktive`, `time_z`) VALUES
(1, 's:205:\"-----------------------------------------------------\n24  June  2018    19:07      Misha 0660330233@ukr.net 1\nBioTech Creatine Monogidrate 500gr 260\nBSN Syntha-6 2.2kg 1350\nDymatize Elite Gurme 907gr 590\n\n\";', 1, '24  June  2018    19:07      '),
(2, 's:205:\"-----------------------------------------------------\n24  June  2018    19:07      Misha 0660330233@ukr.net 1\nBioTech Creatine Monogidrate 500gr 260\nBSN Syntha-6 2.2kg 1350\nDymatize Elite Gurme 907gr 590\n\n\";', 1, '24  June  2018    19:07      '),
(3, 's:203:\"-----------------------------------------------------\n24  June  2018    19:15      Misha 0660330233@ukr.net 1\nOlimp Anabokic Amino 9000 300tab 780\nBSN Syntha-6 2.2kg 1350\nDymatize Elite Gurme 907gr 590\n\n\";', 1, '24  June  2018    19:15      ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `phone`, `email`) VALUES
(26, 'admin', '$2y$10$8zHWdvUOaEw/8WlpXxQBV.4nNBcoSNRXGdzRUssv21DS4hT2g3Y9S', '+380730507755', 'mikhailosarapii@gmail.com'),
(32, 'r', '$2y$10$Ofs4XHE4BcvzN6J75QjrOeIpOQjAvB3309db9aaX261fyPb2wKqrO', '1111', '0660330233@ukr.net'),
(33, 'Misha', '$2y$10$Q3blPVFNm.VXeZEv/8fCFentYYMMQzv.r/QoWTMUMjTUUIYZyZh5C', '1', '0660330233@ukr.net'),
(34, 'Masha2', '$2y$10$wu3w7Ea2QHjVrllySrcxF.gombANxO1CORZMn0GXePWPytbS5Srsa', '21212121', '055@055');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_id`
--
ALTER TABLE `catalog_id`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT для таблицы `catalog_id`
--
ALTER TABLE `catalog_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
