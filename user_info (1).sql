-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 08 2023 г., 10:15
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user_info`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user_info`
--

CREATE TABLE `user_info` (
  `id` int NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `position` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `number` varchar(30) DEFAULT NULL,
  `number_home` varchar(30) DEFAULT NULL,
  `number_work` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `email`, `company_name`, `position`, `number`, `number_home`, `number_work`) VALUES
(784, 'Иван ', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '+7 (888) 888-88-88', '+7 (888) 888-88-88'),
(785, 'Иван', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '+7 (888) 888-88-88', '+7 (888) 888-88-88'),
(786, 'Иван', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '+7 (888) 888-88-88', ''),
(787, 'Иван', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(788, 'Иван', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(789, 'Иван', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(790, 'Олег', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(791, 'Вася', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(792, 'Дмитрий', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(793, 'Вадим', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(794, 'Николай', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(795, 'Адександр', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(796, 'Кирилл', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(797, 'Никита', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(798, 'Егор', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(799, 'Глеб', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(800, 'Виктор', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(801, 'Арсений', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(802, 'Ян', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(803, 'Алексей', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(804, 'Виталий', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', ''),
(805, 'Михаил', 'Иванов', 'ivan@mail.ru', 'ООО Ивановы', 'г. Иванов, ул. Ивановская 2', '+7 (999) 999-99-99', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=806;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
