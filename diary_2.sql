-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2023 г., 18:49
-- Версия сервера: 5.7.39
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1679576591);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('adminAccess', 2, NULL, NULL, NULL, 1679576571, 1679576571),
('admin', 1, NULL, NULL, NULL, 1679576588, 1679576588),
('/rbac/*', 2, NULL, NULL, NULL, 1679576634, 1679576634),
('/debug/*', 2, NULL, NULL, NULL, 1679576634, 1679576634),
('/gii/*', 2, NULL, NULL, NULL, 1679576634, 1679576634),
('Ученик', 1, NULL, NULL, NULL, 1679576728, 1679576728),
('Родитель', 1, NULL, NULL, NULL, 1679576737, 1679576737),
('АУП', 1, NULL, NULL, NULL, 1679576749, 1679576749),
('Педагог', 1, NULL, NULL, NULL, 1679576765, 1679576776),
('/admin/*', 2, NULL, NULL, NULL, 1679579770, 1679579770),
('/student/*', 2, NULL, NULL, NULL, 1679579802, 1679579802),
('/personal/*', 2, NULL, NULL, NULL, 1679579810, 1679579810),
('/parents/*', 2, NULL, NULL, NULL, 1679579820, 1679579820);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('adminAccess', '/*'),
('adminAccess', '/debug/*'),
('adminAccess', '/gii/*'),
('adminAccess', '/rbac/*'),
('admin', 'adminAccess'),
('adminAccess', '/admin/*'),
('adminAccess', '/parents/*'),
('adminAccess', '/personal/*'),
('adminAccess', '/student/*');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_study` smallint(6) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `year_study`, `date_create`) VALUES
(1, '11 А класс', 11, '2023-04-23 09:12:08'),
(2, '11 Б класс', 11, '2023-04-23 09:12:24'),
(3, '11 В класс', 11, '2023-04-23 09:12:34');

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`id`, `name`, `about`, `active`) VALUES
(1, 'Математика', 'Описание дисциплины - Математика', 0),
(2, 'Казахский язык', '', 0),
(3, 'Информатика', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines_classroom`
--

CREATE TABLE `disciplines_classroom` (
  `id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `disciplines_id` int(11) NOT NULL,
  `active` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1679575268),
('m140602_111327_create_menu_table', 1679575443),
('m160312_050000_create_user', 1679575443);

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` smallint(6) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `iin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`user_id`, `sname`, `name`, `fname`, `birthday`, `adress`, `type_id`, `gender`, `iin`, `photo`, `date_update`, `date_create`) VALUES
(12, 'Бурк', 'Евгений', NULL, '2023-04-13', 'Алиханова 28/1\r\n9', 2, 1, '111111', 'user1.jpg', '2023-04-23 10:42:04', '2023-04-22 07:04:37'),
(14, 'Чехов', 'Антон', NULL, '1999-07-24', 'Караганда, Гоголя 12/2, кв. 37', 2, 1, '555466622625', NULL, '2023-04-23 10:42:06', '2023-04-23 05:07:54'),
(16, 'Петров', 'Сергей', NULL, '2023-04-26', 'Алиханова 28/1\r\n9', 2, 1, '4444444444444', '16_photo.jpg', '2023-04-23 10:41:56', '2023-04-23 05:58:42');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles_type`
--

CREATE TABLE `profiles_type` (
  `id` smallint(6) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profiles_type`
--

INSERT INTO `profiles_type` (`id`, `name`) VALUES
(1, 'Сотрудник'),
(2, 'Ученик'),
(3, 'Родитель');

-- --------------------------------------------------------

--
-- Структура таблицы `students_classrooms`
--

CREATE TABLE `students_classrooms` (
  `user_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `students_classrooms`
--

INSERT INTO `students_classrooms` (`user_id`, `classroom_id`, `date_update`, `date_create`) VALUES
(12, 1, '2023-04-23 18:18:24', '2023-04-23 15:18:24'),
(14, 1, '2023-04-23 17:34:28', '2023-04-23 14:34:28'),
(16, 1, '2023-04-23 17:37:36', '2023-04-23 14:37:36');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'S1uhsDURRKOQ1RSrvIKX3OeFkBffWks5', '$2y$13$swNV7b6VMpM4Wb.ndABocO5ZaR2AASmNha1XUZUVYTpYsItwq1DWO', NULL, 'admin@admin.kz', 10, 1679576393, 1679576393),
(12, '123123', '9c-719x5vtYXQX1oQGYj7G7Ci3tVvP4H', '$2y$13$kjwNl/ZN6rmrYtwI30hrhu1Nu3Lu9bRZNMs98GyzcE4PIf4/1ujge', NULL, 'freexub@gmail.com', 10, 1682147077, 1682147077),
(14, 'a.chehov', 'VgQ6oVUBrruHnF3mFjLoUniCzEOjzKrI', '$2y$13$GV4UGST4K7Gcu7LpYFdIUev4I7IL0KTYUb/fAGxUvp4n2qG8nFIcC', NULL, 'a.chehov@ok.kz', 10, 1682226474, 1682226474),
(16, '321321', '_TXi2Jpi10U1pMFwNfLyvYKeozGbhQbc', '$2y$13$ZfmyaRmy2PPMcnLq2K.qAOyQdAhShBi3DLG0vvHaiOPks3c7opnEC', NULL, '321321@gmail.com', 10, 1682229522, 1682229522);

-- --------------------------------------------------------

--
-- Структура таблицы `сlassroom_teachers`
--

CREATE TABLE `сlassroom_teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines_classroom`
--
ALTER TABLE `disciplines_classroom`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `profiles_type`
--
ALTER TABLE `profiles_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students_classrooms`
--
ALTER TABLE `students_classrooms`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `сlassroom_teachers`
--
ALTER TABLE `сlassroom_teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `disciplines_classroom`
--
ALTER TABLE `disciplines_classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `profiles_type`
--
ALTER TABLE `profiles_type`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `students_classrooms`
--
ALTER TABLE `students_classrooms`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `сlassroom_teachers`
--
ALTER TABLE `сlassroom_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `profiles_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
