-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2019 г., 13:18
-- Версия сервера: 10.3.13-MariaDB
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
-- База данных: `sitedb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(100) NOT NULL,
  `login` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `about` text NOT NULL,
  `hobby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `about`, `hobby`) VALUES
(1, 'Юрий', 'hello', '12345', 'Я хороший человек', 'Рыбалка'),
(2, 'Юрий', 'qwe', '12345', 'ожож', 'ждложд'),
(3, 'qwr', 'qwer', 'qer', 'qerw', 'qewr'),
(4, 'adsf', 'asdf', 'asdf', 'adf', 'adsf'),
(5, 'adfs', 'adsf', 'adsf', 'adsf', 'adsf'),
(6, 'adf', 'adsff', 'asdf', 'adsf', 'asdf'),
(7, 'afda', 'asdffad', 'adsf', 'adsf', 'asfd'),
(8, 'gad', 'dfhg', 'jhd', 'dgfs', 'dsfg'),
(9, 'asdf', 'adsfasf', 'adsfa', 'asdfadsf', 'asdfas'),
(10, 'zxcvz', 'zxcv', 'zxcvzx', 'zxcvzcxv', 'zxcvzxc');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
