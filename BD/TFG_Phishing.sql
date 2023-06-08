-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 08-06-2023 a las 16:27:23
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TFG_Phishing`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers_iq`
--

CREATE TABLE `answers_iq` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quest_iq` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `correct` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers_mail`
--

CREATE TABLE `answers_mail` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `question_num` int(11) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers_operas`
--

CREATE TABLE `answers_operas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'Negro'),
(2, 'Verde'),
(3, 'Amarillo'),
(4, 'Rojo'),
(5, 'Violeta'),
(6, 'Naranja'),
(7, 'Marrón'),
(8, 'Rosa'),
(9, 'Granate'),
(10, 'Gris'),
(11, 'Azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`id`, `name`) VALUES
(1, 'Estudios básicos/obligatorios'),
(2, 'Estudios de grado medio'),
(3, 'Estudios de grado superior/universitarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar_residencia`
--

CREATE TABLE `lugar_residencia` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugar_residencia`
--

INSERT INTO `lugar_residencia` (`id`, `name`) VALUES
(1, 'Europa'),
(2, 'América del Norte'),
(3, 'América del Sur'),
(4, 'Asia'),
(5, 'Oceanía'),
(6, 'Antártida'),
(7, 'África');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacion`
--

CREATE TABLE `ocupacion` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ocupacion`
--

INSERT INTO `ocupacion` (`id`, `name`) VALUES
(1, 'Estudiante'),
(2, 'Empleado'),
(3, 'Desempleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `operas` int(11) DEFAULT NULL,
  `iq` int(11) DEFAULT NULL,
  `mail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions_iq`
--

CREATE TABLE `questions_iq` (
  `id` int(11) NOT NULL,
  `path_q` varchar(255) DEFAULT NULL,
  `path_a` varchar(255) DEFAULT NULL,
  `correct_a` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `questions_iq`
--

INSERT INTO `questions_iq` (`id`, `path_q`, `path_a`, `correct_a`) VALUES
(1, 'assets/images_iq/1q.png', 'assets/images_iq/1a.png', 2),
(2, 'assets/images_iq/2q.png', 'assets/images_iq/2a.png', 5),
(3, 'assets/images_iq/3q.png', 'assets/images_iq/3a.png', 4),
(4, 'assets/images_iq/4q.png', 'assets/images_iq/4a.png', 3),
(5, 'assets/images_iq/5q.png', 'assets/images_iq/5a.png', 3),
(6, 'assets/images_iq/6q.png', 'assets/images_iq/6a.png', 2),
(7, 'assets/images_iq/7q.png', 'assets/images_iq/7a.png', 2),
(8, 'assets/images_iq/8q.png', 'assets/images_iq/8a.png', 3),
(9, 'assets/images_iq/9q.png', 'assets/images_iq/9a.png', 1),
(10, 'assets/images_iq/10q.png', 'assets/images_iq/10a.png', 5),
(11, 'assets/images_iq/11q.png', 'assets/images_iq/11a.png', 1),
(12, 'assets/images_iq/12q.png', 'assets/images_iq/12a.png', 2),
(13, 'assets/images_iq/13q.png', 'assets/images_iq/13a.png', 4),
(14, 'assets/images_iq/14q.png', 'assets/images_iq/14a.png', 5),
(15, 'assets/images_iq/15q.png', 'assets/images_iq/15a.png', 1),
(16, 'assets/images_iq/16q.png', 'assets/images_iq/16a.png', 4),
(17, 'assets/images_iq/17q.png', 'assets/images_iq/17a.png', 3),
(18, 'assets/images_iq/18q.png', 'assets/images_iq/18a.png', 2),
(19, 'assets/images_iq/19q.png', 'assets/images_iq/19a.png', 2),
(20, 'assets/images_iq/20q.png', 'assets/images_iq/20a.png', 1),
(21, 'assets/images_iq/21q.png', 'assets/images_iq/21a.png', 5),
(22, 'assets/images_iq/22q.png', 'assets/images_iq/22a.png', 3),
(23, 'assets/images_iq/23q.png', 'assets/images_iq/23a.png', 4),
(24, 'assets/images_iq/24q.png', 'assets/images_iq/24a.png', 3),
(25, 'assets/images_iq/25q.png', 'assets/images_iq/25a.png', 3),
(26, 'assets/images_iq/26q.png', 'assets/images_iq/26a.png', 2),
(27, 'assets/images_iq/27q.png', 'assets/images_iq/27a.png', 1),
(28, 'assets/images_iq/28q.png', 'assets/images_iq/28a.png', 2),
(29, 'assets/images_iq/29q.png', 'assets/images_iq/29a.png', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions_mail`
--

CREATE TABLE `questions_mail` (
  `id` int(11) NOT NULL,
  `correct_answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `questions_mail`
--

INSERT INTO `questions_mail` (`id`, `correct_answer`) VALUES
(1, 'phishing'),
(2, 'phishing'),
(3, 'phishing'),
(4, 'legitimo'),
(5, 'phishing'),
(6, 'phishing'),
(7, 'phishing'),
(8, 'legitimo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions_operas`
--

CREATE TABLE `questions_operas` (
  `id` int(11) NOT NULL,
  `quest_esp` varchar(100) NOT NULL,
  `quest_eng` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `questions_operas`
--

INSERT INTO `questions_operas` (`id`, `quest_esp`, `quest_eng`) VALUES
(1, 'Me gusta probar cosas nuevas.', 'I like trying new things.'),
(2, 'Soy el alma de la fiesta.', 'I am the life and soul of the party.'),
(3, 'Me siento cómodo conmigo mismo.', 'I feel at ease with myself.'),
(4, 'Siempre estoy dispuesto a asumir responsabilidades.', 'I am always prepared to assume responsibility.'),
(5, 'Siempre mantengo mi palabra.', 'I always keep my word.'),
(6, 'Suelo hablar bien de los demás.', 'I usually speak well of others.'),
(7, 'El arte me parece aburrido.', 'I find art boring.'),
(8, 'Me desenvuelvo bien en situaciones sociales.', 'I find it easy to cope with social situations.'),
(9, 'A menudo tengo el ánimo por el suelo.', 'I often feel down.'),
(10, 'Evito mis obligaciones.', 'I avoid my obligations.'),
(11, 'Alguna vez he cogido algo que no era mío.', 'I have sometimes taken something that was not mine.'),
(12, 'Respeto a los demás.', 'I respect others.'),
(13, 'Creo en la importancia de formarse culturalmente.', 'I believe that it is important to receive a cultural education.'),
(14, 'Hablo poco.', 'I am not very talkative.'),
(15, 'A menudo me siento triste.', 'I often feel sad.'),
(16, 'Dejo las cosas a medias.', 'I leave things half done.'),
(17, 'Creo que los demás tienen buenas intenciones.', 'I believe that others are well intentioned.'),
(18, 'Evito las discusiones filosóficas.', 'I avoid philosophical discussions.'),
(19, 'Alguna vez he dicho algo malo de alguien.', 'On occasion I have spoken badly of someone else.'),
(20, 'Hago amigos con facilidad.', 'I make friends easily.'),
(21, 'Es difícil que las cosas me preocupen.', 'I am not worried easily.'),
(22, 'Dejo mis cosas desordenadas.', 'I am untidy.'),
(23, 'Soy muy crítico con los demás.', 'I am very critical with others.'),
(24, 'Me gusta visitar museos.', 'I like visiting museums.'),
(25, 'Prefiero que otros sean el centro de atención.', 'I prefer others to be the centre of attention.'),
(26, 'Alguna vez me he aprovechado de alguien.', 'On occasion I have taken advantage of someone.'),
(27, 'Me dejo llevar por el pánico con facilidad.', 'I panic easily.'),
(28, 'Soy perfeccionista.', 'I am a perfectionist.'),
(29, 'A menudo soy desagradable con otras personas.', 'I am often unpleasant to others.'),
(30, 'Me gusta visitar sitios nuevos.', 'I like visiting new places.'),
(31, 'Permanezco en segundo plano.', 'I remain in the background.'),
(32, 'Cambio de humor a menudo.', 'My mood changes frequently.'),
(33, 'Pierdo el tiempo.', 'I waste time.'),
(34, 'Acepto a la gente tal y como es.', 'I accept people just as they are.'),
(35, 'Siento curiosidad por el mundo que me rodea.', 'I am curious about the world around me.'),
(36, 'Sé cautivar a la gente.', 'I know how to get on with people.'),
(37, 'Me desagrado.', 'I do not like myself.'),
(38, 'Cuando hago planes los mantengo.', 'When I make plans, I stick to them.'),
(39, 'Cuando alguien me la juega, se la devuelvo.', 'When someone messes with me, I pay them back.'),
(40, 'El teatro me parece poco interesante.', 'I do not find the theatre very interesting.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `name`) VALUES
(1, 'Mujer'),
(2, 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_sex` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_lugar_residencia` int(11) DEFAULT NULL,
  `id_estudios` int(11) DEFAULT NULL,
  `id_ocupacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `answers_iq`
--
ALTER TABLE `answers_iq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_quest_id` (`id_quest_iq`);

--
-- Indices de la tabla `answers_mail`
--
ALTER TABLE `answers_mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_answers_mail_users` (`id_user`),
  ADD KEY `fk_answers_question_num` (`question_num`);

--
-- Indices de la tabla `answers_operas`
--
ALTER TABLE `answers_operas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_question` (`id_question`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugar_residencia`
--
ALTER TABLE `lugar_residencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `questions_iq`
--
ALTER TABLE `questions_iq`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions_mail`
--
ALTER TABLE `questions_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions_operas`
--
ALTER TABLE `questions_operas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ocupación` (`id_ocupacion`),
  ADD KEY `id_color` (`id_color`) USING BTREE,
  ADD KEY `id_estudios` (`id_estudios`) USING BTREE,
  ADD KEY `id_lugar_residencia` (`id_lugar_residencia`) USING BTREE,
  ADD KEY `fk_id_sex` (`id_sex`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `answers_iq`
--
ALTER TABLE `answers_iq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `answers_mail`
--
ALTER TABLE `answers_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `answers_operas`
--
ALTER TABLE `answers_operas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lugar_residencia`
--
ALTER TABLE `lugar_residencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `questions_iq`
--
ALTER TABLE `questions_iq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `questions_mail`
--
ALTER TABLE `questions_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `answers_iq`
--
ALTER TABLE `answers_iq`
  ADD CONSTRAINT `fk_id_quest_id` FOREIGN KEY (`id_quest_iq`) REFERENCES `questions_iq` (`id`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `answers_mail`
--
ALTER TABLE `answers_mail`
  ADD CONSTRAINT `fk_answers_mail_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_answers_question_num` FOREIGN KEY (`question_num`) REFERENCES `questions_mail` (`id`);

--
-- Filtros para la tabla `answers_operas`
--
ALTER TABLE `answers_operas`
  ADD CONSTRAINT `fk_question` FOREIGN KEY (`id_question`) REFERENCES `questions_operas` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD CONSTRAINT `puntuaciones_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `color` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `estudios` FOREIGN KEY (`id_estudios`) REFERENCES `estudios` (`id`),
  ADD CONSTRAINT `fk_id_sex` FOREIGN KEY (`id_sex`) REFERENCES `sexo` (`id`),
  ADD CONSTRAINT `lugar_residencia` FOREIGN KEY (`id_lugar_residencia`) REFERENCES `lugar_residencia` (`id`),
  ADD CONSTRAINT `ocupacion` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
