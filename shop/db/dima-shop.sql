-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 02 2021 г., 18:13
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dima-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(300) NOT NULL,
  `price` bigint(30) NOT NULL,
  `stars` bigint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `price`, `stars`) VALUES
(1, 'Sesama', 'https://www.victoria-group.ru/upload/iblock/ec2/ec29948dc569a22e350361e41e445aca.jpg', 318, 5),
(2, 'Yanniway ', 'https://cstor.nn2.ru/userfiles/data/ufiles/2018-02/90/f1/b7/5a75bb8b14ccf_unduk_malina_2_kg_-_60600.jpg', 301, 3),
(5, 'UGURLU', 'https://vsspb.com/wp-content/uploads/lukum_stambul_s_aromatom_granata_i_fundukom_35kg.jpg', 562, 5),
(6, 'HALEB', 'https://cdn.shopify.com/s/files/1/0436/5497/1550/products/Turkaland-KF46-Walnut-Turkish-Delight-1_1024x1024.jpg?v=1597689736', 123, 4),
(7, 'Sesama', 'https://www.victoria-group.ru/upload/iblock/ec2/ec29948dc569a22e350361e41e445aca.jpg', 318, 5),
(8, 'UGURLU', 'https://vsspb.com/wp-content/uploads/lukum_stambul_s_aromatom_granata_i_fundukom_35kg.jpg', 562, 5),
(9, 'HALEB', 'https://cdn.shopify.com/s/files/1/0436/5497/1550/products/Turkaland-KF46-Walnut-Turkish-Delight-1_1024x1024.jpg?v=1597689736', 123, 4),
(10, 'Sesama', 'https://www.victoria-group.ru/upload/iblock/ec2/ec29948dc569a22e350361e41e445aca.jpg', 318, 5),
(11, 'Lukeria', 'https://shop-dobro.ru/wa-data/public/shop/products/91/72/27291/images/8867/8867.750x0.jpg', 1000, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `password`) VALUES
(3, 'dima', 'dima@mail.ru', '12345'),
(4, 'dina', 'dina@mail.ru', '12345'),
(5, 'anna', 'anna@mail.ru', '12345'),
(6, 'honda', 'honda@mail.ru', '12345'),
(7, 'dima32', 'dimaa@mail.ru', '12345'),
(8, 'lesha', 'lesha@mail.ru', '12345');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
