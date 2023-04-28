-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2023 г., 13:52
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

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
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL
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
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
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
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
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
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `class_list`
--

CREATE TABLE `class_list` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_study` int NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `class_list`
--

INSERT INTO `class_list` (`id`, `name`, `year_study`, `date_create`) VALUES
(1, '11 А класс', 11, '2023-04-23 09:12:08'),
(2, '11 Б класс', 11, '2023-04-23 09:12:24'),
(3, '11 В класс', 11, '2023-04-23 09:12:34'),
(4, '1 Г класс', 1, '2023-04-24 16:09:19');

-- --------------------------------------------------------

--
-- Структура таблицы `class_type`
--

CREATE TABLE `class_type` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `class_type`
--

INSERT INTO `class_type` (`id`, `name`, `about`, `active`) VALUES
(1, '1', NULL, 0),
(2, '2', NULL, 0),
(3, '3', NULL, 0),
(4, '4', NULL, 0),
(5, '5', NULL, 0),
(6, '6', NULL, 0),
(7, '7', NULL, 0),
(8, '8', NULL, 0),
(9, '9', NULL, 0),
(10, '10', NULL, 0),
(11, '11', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active` smallint NOT NULL DEFAULT '0'
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
-- Структура таблицы `disciplines_class_schedule`
--

CREATE TABLE `disciplines_class_schedule` (
  `id` int NOT NULL,
  `disciplines_class_list_id` int NOT NULL,
  `lesson_list_id` int NOT NULL,
  `day` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `disciplines_class_schedule`
--

INSERT INTO `disciplines_class_schedule` (`id`, `disciplines_class_list_id`, `lesson_list_id`, `day`) VALUES
(1, 7, 2, 2),
(2, 7, 5, 3),
(3, 7, 1, 5),
(4, 8, 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines_class_type`
--

CREATE TABLE `disciplines_class_type` (
  `id` int NOT NULL,
  `class_type_id` int NOT NULL,
  `disciplines_id` int NOT NULL,
  `active` smallint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `disciplines_class_type`
--

INSERT INTO `disciplines_class_type` (`id`, `class_type_id`, `disciplines_id`, `active`) VALUES
(7, 11, 2, 0),
(8, 11, 3, 0),
(9, 11, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson_list`
--

CREATE TABLE `lesson_list` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` tinyint DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lesson_list`
--

INSERT INTO `lesson_list` (`id`, `name`, `number`, `time_start`, `time_end`) VALUES
(1, '1 урок', 1, '08:30:00', '09:15:00'),
(2, '2 урок', 2, '09:20:00', '10:05:00'),
(3, '3 урок', 3, NULL, NULL),
(4, '4 урок', 4, NULL, NULL),
(5, '5 урок', 5, NULL, NULL),
(6, '6 урок', 6, NULL, NULL),
(7, '7 урок', 7, NULL, NULL),
(8, '8 урок', 8, NULL, NULL),
(9, '9 урок', 9, NULL, NULL),
(10, '10 урок', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int DEFAULT NULL
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
  `user_id` int NOT NULL DEFAULT '0',
  `sname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `adress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` smallint NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `iin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` smallint NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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
  `user_id` int NOT NULL,
  `classroom_id` int NOT NULL,
  `date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `students_classrooms`
--

INSERT INTO `students_classrooms` (`user_id`, `classroom_id`, `date_update`, `date_create`) VALUES
(12, 1, '2023-04-26 08:52:44', '2023-04-26 02:52:44'),
(14, 1, '2023-04-23 17:34:28', '2023-04-23 14:34:28');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL
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
  `id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `class_list`
--
ALTER TABLE `class_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `class_type`
--
ALTER TABLE `class_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines_class_schedule`
--
ALTER TABLE `disciplines_class_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines_class_type`
--
ALTER TABLE `disciplines_class_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lesson_list`
--
ALTER TABLE `lesson_list`
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
-- AUTO_INCREMENT для таблицы `class_list`
--
ALTER TABLE `class_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `class_type`
--
ALTER TABLE `class_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `disciplines_class_schedule`
--
ALTER TABLE `disciplines_class_schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `disciplines_class_type`
--
ALTER TABLE `disciplines_class_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `lesson_list`
--
ALTER TABLE `lesson_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `profiles_type`
--
ALTER TABLE `profiles_type`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `students_classrooms`
--
ALTER TABLE `students_classrooms`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `сlassroom_teachers`
--
ALTER TABLE `сlassroom_teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
