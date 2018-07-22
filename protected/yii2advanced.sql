-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 22 2018 г., 20:54
-- Версия сервера: 5.6.38-log
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1532182619),
('m130524_201442_init', 1532182619);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_bonuses`
--

CREATE TABLE `tbl_bonuses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `bonuses_type` varchar(20) NOT NULL COMMENT 'Значения range(диапазон) или item(единственное значение)',
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Дамп данных таблицы `tbl_bonuses`
--

INSERT INTO `tbl_bonuses` (`id`, `title`, `description`, `bonuses_type`, `min`, `max`, `count`) VALUES
(1, 'money', 'Денежный приз', 'range', 10, 1000, 20),
(2, 'points', 'Баллы лояльности', 'range', 15, 5000, -1),
(3, 'gifts', 'Ценный подарок', 'item', 0, 0, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_bonuses_status`
--

CREATE TABLE `tbl_bonuses_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Дамп данных таблицы `tbl_bonuses_status`
--

INSERT INTO `tbl_bonuses_status` (`id`, `name`) VALUES
(1, 'new'),
(2, 'received');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_gifts`
--

CREATE TABLE `tbl_gifts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Дамп данных таблицы `tbl_gifts`
--

INSERT INTO `tbl_gifts` (`id`, `name`) VALUES
(7, 'Приз-1'),
(8, 'Приз-2'),
(9, 'Приз-3'),
(10, 'Приз-4'),
(11, 'Приз-5'),
(12, 'Приз-6');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf16 NOT NULL,
  `bonuses_status_id` int(11) NOT NULL,
  `count_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Дамп данных таблицы `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_name`, `bonuses_status_id`, `count_points`) VALUES
(1, 'test1', 2, 61571),
(2, 'test2', 1, 1702),
(3, 'test3', 2, 50),
(4, 'test4', 1, 50);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tbl_bonuses`
--
ALTER TABLE `tbl_bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tbl_bonuses_status`
--
ALTER TABLE `tbl_bonuses_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbl_bonuses`
--
ALTER TABLE `tbl_bonuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tbl_bonuses_status`
--
ALTER TABLE `tbl_bonuses_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
