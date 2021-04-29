-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2021 г., 04:53
-- Версия сервера: 5.6.41
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
-- База данных: `aservis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `avto`
--

CREATE TABLE `avto` (
  `id_avto` int(11) NOT NULL,
  `marka` varchar(30) DEFAULT NULL,
  `model` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `avto`
--

INSERT INTO `avto` (`id_avto`, `marka`, `model`) VALUES
(1, 'Ниссан', 'x-trail'),
(2, 'Ниссан', 'quashqai'),
(3, 'Ниссан', 'gt-r'),
(4, 'Ниссан', 'murano'),
(5, 'Ниссан', 'terrano'),
(6, 'BMW', 'x3 II'),
(7, 'BMW', 'x5 III'),
(8, 'BMW', 'E60/E61'),
(9, 'LADA', 'Vesta'),
(10, 'LADA', 'Granta'),
(11, 'LADA', 'Largus'),
(12, 'LADA', 'xray'),
(13, 'LADA', 'niva travel'),
(14, 'Lamborgini', 'aventador'),
(15, 'Lamborgini', 'aventador roadster'),
(16, 'Lamborgini', 'huracan');

-- --------------------------------------------------------

--
-- Структура таблицы `klient`
--

CREATE TABLE `klient` (
  `id_klient` int(11) NOT NULL,
  `fio` varchar(30) DEFAULT NULL,
  `tel` decimal(30,0) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `prichina` varchar(150) DEFAULT NULL,
  `d_zaezda` date DEFAULT NULL,
  `vremya` varchar(20) DEFAULT NULL,
  `id_stancia` int(11) DEFAULT NULL,
  `id_avto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `klient`
--

INSERT INTO `klient` (`id_klient`, `fio`, `tel`, `email`, `prichina`, `d_zaezda`, `vremya`, `id_stancia`, `id_avto`) VALUES
(1, 'Иванов И.И.', '898876341165', 'iva@mail.ru', 'Пробитое колесо', '2021-04-24', '09:10', 2, 9),
(2, 'Быкова А.М.', '88005553535', 'bik@gmail.com', 'Поломка двигателя', '2021-05-02', '10:00', 1, 14),
(8, 'Жиглов Г.В.', '89106863546', 'jiji@mail.ru', 'Замена краски', '2021-04-27', '16:30', 2, 13),
(9, 'Ереванов И.Д.', '87894423467', 'ereva@yandex.ru', 'Барахлит коробка передач', '2021-04-17', '13:30', 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `stancia`
--

CREATE TABLE `stancia` (
  `id_stancia` int(11) NOT NULL,
  `nazvanie` varchar(30) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stancia`
--

INSERT INTO `stancia` (`id_stancia`, `nazvanie`, `adres`) VALUES
(1, 'Автосервис ССС филиал 2', 'Ул.Вавилова'),
(2, 'Автосервис ССС филиал 1', 'Ул.Буйнакская');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `loggin` varchar(30) DEFAULT NULL,
  `parol` varchar(30) DEFAULT NULL,
  `rol` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `loggin`, `parol`, `rol`) VALUES
(1, 'vlasov', '322', 'админ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `avto`
--
ALTER TABLE `avto`
  ADD PRIMARY KEY (`id_avto`);

--
-- Индексы таблицы `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klient`),
  ADD KEY `id_stancia` (`id_stancia`),
  ADD KEY `id_avto` (`id_avto`);

--
-- Индексы таблицы `stancia`
--
ALTER TABLE `stancia`
  ADD PRIMARY KEY (`id_stancia`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `avto`
--
ALTER TABLE `avto`
  MODIFY `id_avto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `stancia`
--
ALTER TABLE `stancia`
  MODIFY `id_stancia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `klient`
--
ALTER TABLE `klient`
  ADD CONSTRAINT `klient_ibfk_1` FOREIGN KEY (`id_stancia`) REFERENCES `stancia` (`id_stancia`),
  ADD CONSTRAINT `klient_ibfk_2` FOREIGN KEY (`id_avto`) REFERENCES `avto` (`id_avto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
