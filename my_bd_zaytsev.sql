-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 03 2020 г., 14:35
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_bd_zaytsev`
--

-- --------------------------------------------------------

--
-- Структура таблицы `komments`
--

CREATE TABLE `komments` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_mail` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_k` date NOT NULL,
  `pol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `komments`
--

INSERT INTO `komments` (`id`, `name`, `e_mail`, `data_k`, `pol`, `category`, `komment`, `subscription`) VALUES
(1, 'Сергей', 'sergei199907@mail.ru', '2020-09-03', '1', 'Жалоба', '2й3123йкф', '1'),
(2, '1', '', '2020-09-03', '2', 'Отзыв', '', '1'),
(3, '1', '', '2020-09-03', '2', 'Отзыв', '', '1'),
(4, '1', '', '2020-09-03', '2', 'Отзыв', '', '1'),
(5, '1', '', '2020-09-03', '2', 'Отзыв', '', '1'),
(6, 'Сергей', 'asd@afsas', '2020-09-03', '1', 'Отзыв', 'asda', '1'),
(7, 'Сергей', 'sergei199907@mail.ru', '2020-09-03', '1', 'Предложение', 'Zdasfasfasfasfasfasfas', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `news` text NOT NULL,
  `data` date NOT NULL,
  `foto` varchar(20) NOT NULL,
  `skidki` int(10) NOT NULL,
  `aktsii` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `autor`, `subject`, `news`, `data`, `foto`, `skidki`, `aktsii`) VALUES
(1, 'Зайцев Сергей', 'Пришёл новый завоз', 'Пришла четвёртая партия бахил, в размере 50 штук', '2018-10-01', '/images/1.jpg', 10, 'Купи одну пару бахил и проходи на пары.'),
(2, 'Пащенко Дарья', 'Не пропустили на пары без бахил', 'Я не буду покупать ваши бахилы. Я поднимаю бунд. Лучше буду таскать переобувку.', '2018-10-02', 'images/2.jpg', 0, 'Не покупай бахилы, и не придёшь на пары.'),
(3, 'Гринёв Андрей', 'Купил бахилы, а они с дырками', 'У кого тоже такая проблема, отзовитесь ', '2018-10-03', 'images/3.jpg', 0, 'Купи бахилы, и они порвутся.'),
(4, 'Аноним', 'Пропустили без переобувки', 'Я нашёл секрет, как бороться с этим. Можно просто сказать \"Я с общежития\" и тебя пропустят.', '2018-10-04', 'images/4.jpg', 4, ''),
(5, 'Фёдоров Денис', 'Бахилы 2.0', 'Новая партия бахил, более устойчивые и надёжные.', '2018-10-05', 'images/5.jpg', 10, 'Новая партия будет надёжнее и дешевле. Всё для студентов. Всё в массы'),
(6, 'Зайцев Сергей', 'Пришёл новый товар', 'Товар пришёл, и не ушёл', '2020-09-02', 'images/pic02.jpg', 10, '12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prava` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `prava`, `email`, `pol`) VALUES
(1, 'zettrap', '199907qqq', 'admin', 'sergei199907@mail.ru', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `komments`
--
ALTER TABLE `komments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT для таблицы `komments`
--
ALTER TABLE `komments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
