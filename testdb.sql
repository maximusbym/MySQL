-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 01 2016 г., 20:11
-- Версия сервера: 5.7.16-0ubuntu0.16.04.1
-- Версия PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `guid` varchar(15) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `guid`, `description`) VALUES
(1, '5819061245cbb', 'var_acc'),
(2, '5819061e2c2b9', 'acc 2'),
(3, '581906288b084', 'account 201'),
(4, '58190631a774d', 'acc 20019'),
(5, '5819063766efd', 'my 2 acc'),
(6, '581906e1a44ca', 'my 2 acc'),
(7, '581a19bab00b6', 'Main Acc'),
(8, '581a19c175197', 'sub acc'),
(9, '581a19c8ab7b9', 'bonus acc'),
(10, '581a19cf1b75b', 'credit acc'),
(11, '581a1a2e3439c', 'credit acc');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'salary'),
(2, 'purchases'),
(3, 'donations'),
(4, 'taxes'),
(5, 'business'),
(6, 'credit'),
(7, 'deposit'),
(8, '854'),
(9, '854'),
(10, '854'),
(11, '854'),
(12, '854'),
(13, '854'),
(14, '854'),
(15, '854'),
(16, '854'),
(17, '854'),
(18, '854'),
(19, '854'),
(20, '854'),
(21, '854'),
(22, '854'),
(23, '854'),
(24, '854'),
(25, '854'),
(26, '854');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` double(19,4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `account_id`, `category_id`, `price`, `created_at`) VALUES
(2, 'New TA', 7, 1, 2500.0000, '2016-11-02 19:49:36'),
(3, 'debt', 7, 1, -150.0000, '2016-11-02 19:56:10'),
(4, 'add', 8, 2, 250.0000, '2016-11-02 20:09:33'),
(5, 'new', 4, 5, 2788.0000, '2016-11-02 20:10:10'),
(6, 'bad', 1, 1, -78.0000, '2016-11-02 20:10:21'),
(7, 'oo', 3, 4, 50.0000, '2016-11-02 20:10:40'),
(8, 'new 23', 4, 5, -2500.0000, '2016-11-03 19:02:16'),
(9, 'fhcf', 8, 8, 23.0000, '2016-11-03 19:47:23'),
(10, 'fhcf', 8, 8, 23.0000, '2016-11-03 19:49:48'),
(11, 'fhcf', 8, 8, 23.0000, '2016-11-03 20:09:53'),
(12, 'last', 10, 1, 1508.0000, '2016-11-03 20:25:17'),
(13, 'last', 10, 1, 1508.0000, '2016-11-03 20:30:59'),
(14, 'add some product', 6, 6, 2500.0000, '2016-11-07 13:41:16');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'user', 'user@mail', '12345678'),
(2, 'user2', 'user2@mail', '12345678'),
(3, 'user3', 'ss@!sss.ss12313', '13');

-- --------------------------------------------------------

--
-- Структура таблицы `users_accounts`
--

CREATE TABLE `users_accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_accounts`
--

INSERT INTO `users_accounts` (`id`, `user_id`, `account_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 2),
(13, 3, 2),
(14, 2, 9);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_accounts`
--
ALTER TABLE `users_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users_accounts`
--
ALTER TABLE `users_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
