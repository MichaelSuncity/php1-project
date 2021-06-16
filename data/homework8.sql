-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 14 2021 г., 18:25
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homework8`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `goods_id` int(11) NOT NULL,
  `itemPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `goods_id`, `itemPrice`) VALUES
(21, '6t893f5phgf3ihe0qb2rbnfi6j6m812c', 7, 100),
(22, '6t893f5phgf3ihe0qb2rbnfi6j6m812c', 11, 50),
(23, '6t893f5phgf3ihe0qb2rbnfi6j6m812c', 11, 50),
(24, '7lhqm3rubl4rb0mtmo059h3f54jnj01l', 7, 100),
(25, '7lhqm3rubl4rb0mtmo059h3f54jnj01l', 7, 100),
(26, 'uifjuho4033on06ei6av03jelmie3tg2', 9, 100),
(27, 'uifjuho4033on06ei6av03jelmie3tg2', 9, 100),
(28, '40581to7eqrm5blv7ov693e6amj9ap9p', 7, 100),
(29, '40581to7eqrm5blv7ov693e6amj9ap9p', 7, 100),
(30, 'cj50rbn78pa7s3avu4r2uhod8k5p1blq', 9, 100),
(31, 'cj50rbn78pa7s3avu4r2uhod8k5p1blq', 9, 100),
(32, 'mapdsm721nkaos93ik7bnrvkg336nfi4', 2, 100),
(33, 'mapdsm721nkaos93ik7bnrvkg336nfi4', 2, 100),
(34, 'mapdsm721nkaos93ik7bnrvkg336nfi4', 2, 100),
(35, 'mapdsm721nkaos93ik7bnrvkg336nfi4', 2, 100),
(36, 'bf1tfigl45cilg73kfh0url1ss2btnu7', 9, 100),
(37, 'bf1tfigl45cilg73kfh0url1ss2btnu7', 9, 100),
(39, 'b3s3rgnnnq76kqh3576o6uuq5ra5cn8a', 15, 100),
(41, 'b3s3rgnnnq76kqh3576o6uuq5ra5cn8a', 15, 100),
(42, 'b3s3rgnnnq76kqh3576o6uuq5ra5cn8a', 6, 100),
(45, '12k0mlrni1o03egahaefjtg7ktmqvvkp', 15, 100),
(49, '49cpbk6qpe0ib2fqlor69nnriipe5hpf', 9, 100),
(51, '49cpbk6qpe0ib2fqlor69nnriipe5hpf', 12, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `author` varchar(128) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `author`, `message`, `time`) VALUES
(3, 'Michael Ivanov', 'hello bro', '2020-07-29 12:36:39'),
(4, 'admin', 'как дела?', '2020-07-29 12:37:12'),
(6, 'Людмила123', 'пвапв', '2020-07-29 13:32:43'),
(8, 'John', 'hello bro', '2021-01-14 11:20:33');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_goods`
--

CREATE TABLE `feedback_goods` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `message` text NOT NULL,
  `id_good` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback_goods`
--

INSERT INTO `feedback_goods` (`id`, `author`, `message`, `id_good`) VALUES
(4, 'пав', 'hello12', 7),
(8, 'test123', '123', 7),
(13, 'admin', '1111', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `size` int(11) NOT NULL,
  `itemName` varchar(128) NOT NULL DEFAULT 'товар',
  `description` varchar(128) NOT NULL DEFAULT 'описание товара',
  `itemPrice` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `views`, `size`, `itemName`, `description`, `itemPrice`) VALUES
(1, '01.jpg', 0, 0, 'товар', 'описание товара', 100),
(2, '02.jpg', 5, 0, 'товар', 'описание товара', 100),
(3, '03.jpg', 2, 0, 'товар', 'описание товара', 100),
(4, '04.jpg', 5, 0, 'товар', 'описание товара', 100),
(5, '05.jpg', 6, 0, 'товар', 'описание товара', 100),
(6, '06.jpg', 1, 0, 'товар', 'описание товара', 100),
(7, '07.jpg', 222, 0, 'товар', 'описание товара', 100),
(8, '08.jpg', 19, 0, 'товар', 'описание товара', 100),
(9, '09.jpg', 68, 0, 'товар', 'описание товара', 100),
(10, '10.jpg', 1, 0, 'товар', 'описание товара', 100),
(11, '11.jpg', 34, 0, 'товар', 'описание товара', 50),
(12, '12.jpg', 4, 0, 'товар', 'описание товара', 100),
(13, '13.jpg', 1, 0, 'товар', 'описание товара', 100),
(14, '14.jpg', 0, 0, 'товар', 'описание товара', 100),
(15, '15.jpg', 2, 0, 'товар', 'описание товара', 100);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `clientName` text NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `clientName`, `phone`) VALUES
(1, 'tjtuq7v96hqas9gii7fcv74o836rc4q9', 'Yoyo', 123),
(10, '40581to7eqrm5blv7ov693e6amj9ap9p', 'Yoyo', 444),
(11, 'cj50rbn78pa7s3avu4r2uhod8k5p1blq', 'human', 555),
(12, 'cj50rbn78pa7s3avu4r2uhod8k5p1blq', 'tapki', 123),
(13, 'mapdsm721nkaos93ik7bnrvkg336nfi4', 'eeeee', 999999),
(14, 'bf1tfigl45cilg73kfh0url1ss2btnu7', 'naki', 123),
(15, 'b3s3rgnnnq76kqh3576o6uuq5ra5cn8a', 'admin', 11111),
(16, '12k0mlrni1o03egahaefjtg7ktmqvvkp', 'admintest', 53458),
(17, '49cpbk6qpe0ib2fqlor69nnriipe5hpf', 'test', 1111111);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$ldZ9AaFDd9r1r4M5CK8YF.B6x06LC9X9xb/P3TSIEN1zv7DNh3gQ6', '75494879160000ec7ba2bd1.53809492'),
(2, 'user', '$2y$10$YDfbARThWrne7jgFs6os8.VTpak6wdo7Swp1U/GsOOz.TE980hUju', '3482852826000093265d412.12521997'),
(3, 'user2', '$2y$10$wv4iWjFwo6fgea.PPOERsuKvATiMq3gzOvZBfy273KUt1buM.IE9C', '402050666000081ed155c6.71042209');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback_goods`
--
ALTER TABLE `feedback_goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `feedback_goods`
--
ALTER TABLE `feedback_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
