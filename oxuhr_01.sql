-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2023 г., 10:30
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oxuhr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `person_id` int NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `person_id`, `comment`, `date`) VALUES
(21, 1, 55, '<p>fasd</p>', '2023-06-08'),
(22, 1, 55, '<p>fasd</p>', '2023-06-08'),
(23, 1, 57, '<p>32423</p>', '2023-06-08'),
(24, 1, 57, '<p>asdfas</p>', '2023-06-08'),
(25, 1, 57, '<p>rweq</p>', '2023-06-08'),
(26, 1, 57, '<p>afsdafsd34</p>', '2023-06-08'),
(27, 1, 57, '<p>rt43w45</p>', '2023-06-08'),
(28, 1, 56, '<p>afsdfasdfasdf</p>', '2023-06-08'),
(29, 21, 55, '<p>045540604558789</p><p>&nbsp;</p>', '2023-06-09');

-- --------------------------------------------------------

--
-- Структура таблицы `personnel`
--

CREATE TABLE `personnel` (
  `id` int NOT NULL,
  `fio` varchar(355) COLLATE utf8mb4_general_ci NOT NULL,
  `bith_date` date NOT NULL,
  `direction` varchar(355) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `foto` varchar(355) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `personnel`
--

INSERT INTO `personnel` (`id`, `fio`, `bith_date`, `direction`, `status`, `foto`) VALUES
(55, 'afs', '2023-06-08', '2345', 1, '/upload/foto/user/c0fb7f6d853dff3c8e7f4244dd98283b.jpg'),
(56, 'asfd', '2023-06-08', '2345', 2, '/upload/foto/user/0c24c57ffbea93d32dc9d2652b305b94.jpg'),
(57, 'fasdf', '2023-06-08', '321', 0, '/upload/foto/user/a08b0c924a7001c59b29016479044b71.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `full_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `father_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `user_level` tinyint NOT NULL,
  `activity` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `usertbl`
--

INSERT INTO `usertbl` (`id`, `username`, `password`, `full_name`, `last_name`, `father_name`, `gender`, `user_level`, `activity`, `add_date`) VALUES
(1, 'rector', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'Alisher', '', '', NULL, 1, 1, '2023-06-07 21:00:00'),
(21, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'Alisher 1 ', '', '', NULL, 2, 1, '2023-06-07 21:00:00'),
(22, 'department', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'Alisher 2', '', '', NULL, 3, 1, '2023-06-07 21:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
