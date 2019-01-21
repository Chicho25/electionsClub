-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2019 a las 05:11:39
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `club3_election`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidates`
--

CREATE TABLE `candidates` (
  `id_candidate` int(11) NOT NULL,
  `name` varchar(10000) NOT NULL,
  `last_name` varchar(10000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `id_meeting` int(11) NOT NULL,
  `date_registration` datetime NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `candidates`
--

INSERT INTO `candidates` (`id_candidate`, `name`, `last_name`, `email`, `image`, `id_meeting`, `date_registration`, `stat`) VALUES
(1, 'usuario 1', 'usuario 1', 'usuario1@hotmail.com', 'imagenes/1.jpg', 1, '2016-11-12 15:04:34', 1),
(2, 'usuario 2', 'usuario 2', 'usuario2@hotmail.com', 'imagenes/2.jpg', 2, '2016-11-12 15:05:34', 1),
(3, 'usuario 3', 'usuario 3', 'usuario3@hotmail.com', 'imagenes/3.jpg', 2, '2016-11-12 15:11:31', 1),
(4, 'usuario 4', 'usuario 4', 'usuario4@hotmail.com', 'imagenes/4.jpg', 2, '2016-11-12 15:11:57', 1),
(5, 'usuario 5', 'usuario 5', 'usuario5@hotmail.com', 'imagenes/5.jpg', 2, '2016-11-12 15:13:04', 1),
(6, 'usuario 6', 'usuario 6', 'usuario6@hotmail.com', 'imagenes/6.jpg', 1, '2016-11-12 15:14:34', 1),
(7, 'usuario 7', 'usuario 7', 'usuario7@hotmail.com', 'imagenes/7.jpg', 1, '2016-11-12 15:15:18', 1),
(8, 'usuario 8', 'usuario 8', 'usuario8@hotmail.com', 'imagenes/8.jpg', 1, '2016-11-12 15:16:56', 1),
(9, 'usuario 9', 'usuario 9', 'usuario9@hotmail.com', 'imagenes/9.jpg', 1, '2016-11-12 15:21:10', 1),
(10, 'usuario 10', 'usuario 10', 'usuario10@hotmail.com', 'imagenes/10.jpg', 1, '2016-11-12 15:21:41', 1),
(11, 'usuario 11', 'usuario 11', 'usuario11@hotmail.com', 'imagenes/11.jpg', 1, '2016-11-12 15:26:54', 1),
(12, 'usuario 12', 'usuario 12', 'usuario12@hotmail.com', 'imagenes/12.jpg', 1, '2016-11-12 15:27:20', 1),
(13, 'usuario 13', 'usuario 13', 'usuario13@hotmail.com', 'imagenes/13.jpg', 1, '2016-11-12 15:28:07', 1),
(14, 'usuario 14', 'usuario 14', 'usuario14@hotmail.com', 'imagenes/14.jpg', 1, '2016-11-12 15:29:16', 1),
(15, 'usuario 15', 'usuario 15', 'usuario15@hotmail.com', 'imagenes/15.jpg', 1, '2016-11-12 15:29:55', 1),
(16, 'usuario 16', 'usuario 16', 'usuario16@hotmail.com', 'imagenes/16.jpg', 1, '2016-11-12 15:30:20', 1),
(17, 'usuario 17', 'usuario 17', 'usuario17@hotmail.com', 'imagenes/17.jpg', 1, '2016-11-12 15:30:49', 1),
(18, 'usuario 18', 'usuario 18', 'usuario18@hotmail.com', 'imagenes/18.jpg', 1, '2016-11-12 15:32:10', 1),
(19, 'usuario 19', 'usuario 19', 'usuario19@hotmail.com', 'imagenes/19.jpg', 1, '2016-11-12 15:34:26', 1),
(20, 'usuario 20', 'usuario 20', 'usuario20@hotmail.com', 'imagenes/20.jpg', 1, '2016-11-12 15:35:15', 1),
(27, 'rot', 'rw', 'lhernandez@dchain.com', 'imagenes/27_thumb.jpg', 1, '2016-11-14 20:49:32', 1),
(28, 'usuario prueba', 'prueba', 'pirgui19@hotmail.com', 'imagenes/28_thumb.jpg', 1, '2016-11-15 18:56:24', 1),
(29, 'luis', 'hernandez', 'prueba@prueba.com', 'imagenes/29_thumb.jpg', 2, '2016-11-15 20:28:32', 1),
(30, 'elvis', 'Ortega', 'prueba@prueba.com', 'imagenes/30_thumb.jpg', 1, '2016-11-15 20:33:02', 1),
(31, 'robert', 'robert', 'prueba@prueba.com', 'imagenes/31_thumb.jpg', 1, '2016-11-15 20:54:11', 1),
(32, 'alexis', 'receda', 'prueba@prueba.com', 'imagenes/32_thumb.jpg', 1, '2016-11-15 20:54:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choice`
--

CREATE TABLE `choice` (
  `id_choice` int(11) NOT NULL,
  `date_hour_star` date NOT NULL,
  `date_hour_end` date NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `choice`
--

INSERT INTO `choice` (`id_choice`, `date_hour_star`, `date_hour_end`, `stat`) VALUES
(28, '2016-11-26', '2019-01-21', 2),
(29, '2019-01-21', '2019-01-21', 2),
(30, '2019-01-21', '2019-01-21', 2),
(31, '2019-01-21', '2019-01-21', 2),
(32, '2019-01-21', '2019-01-21', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historical`
--

CREATE TABLE `historical` (
  `id_choice` int(11) NOT NULL,
  `id_kind_choice` int(11) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `date_historical` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind_meeting`
--

CREATE TABLE `kind_meeting` (
  `id_kind_meeting` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kind_meeting`
--

INSERT INTO `kind_meeting` (`id_kind_meeting`, `description`) VALUES
(1, 'Admision'),
(2, 'Directiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind_user`
--

CREATE TABLE `kind_user` (
  `id_kind_user` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kind_user`
--

INSERT INTO `kind_user` (`id_kind_user`, `description`, `stat`) VALUES
(1, 'Usuario Staff', 1),
(2, 'Usuario Administrador', 1),
(3, 'Super Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result`
--

CREATE TABLE `result` (
  `id_result` int(11) NOT NULL,
  `number_control` int(11) NOT NULL,
  `id_kind_meeting` int(11) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `id_choice` int(11) NOT NULL,
  `id_table` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `result`
--

INSERT INTO `result` (`id_result`, `number_control`, `id_kind_meeting`, `id_candidate`, `stat`, `id_choice`, `id_table`) VALUES
(487, 1, 2, 2, 4, 28, 1),
(488, 1, 2, 3, 4, 28, 1),
(489, 1, 1, 1, 4, 28, 1),
(490, 1, 1, 6, 4, 28, 1),
(491, 1, 1, 7, 4, 28, 1),
(492, 1, 1, 8, 4, 28, 1),
(493, 1, 1, 9, 4, 28, 1),
(494, 1, 1, 10, 4, 28, 1),
(495, 1, 1, 11, 4, 28, 1),
(496, 1, 1, 12, 4, 28, 1),
(497, 1, 1, 13, 4, 28, 1),
(498, 1, 1, 14, 4, 28, 1),
(499, 1, 1, 15, 4, 28, 1),
(500, 1, 1, 16, 4, 28, 1),
(501, 2, 2, 2, 4, 28, 1),
(502, 2, 2, 3, 4, 28, 1),
(503, 2, 1, 6, 4, 28, 1),
(504, 2, 1, 7, 4, 28, 1),
(505, 2, 1, 12, 4, 28, 1),
(506, 2, 1, 13, 4, 28, 1),
(507, 2, 1, 14, 4, 28, 1),
(508, 2, 1, 18, 4, 28, 1),
(509, 2, 1, 19, 4, 28, 1),
(510, 2, 1, 20, 4, 28, 1),
(511, 2, 1, 31, 4, 28, 1),
(512, 3, 2, 2, 4, 28, 1),
(513, 3, 2, 4, 4, 28, 1),
(514, 3, 2, 29, 4, 28, 1),
(515, 3, 1, 6, 4, 28, 1),
(516, 3, 1, 7, 4, 28, 1),
(517, 3, 1, 10, 4, 28, 1),
(518, 3, 1, 12, 4, 28, 1),
(519, 3, 1, 13, 4, 28, 1),
(520, 3, 1, 14, 4, 28, 1),
(521, 3, 1, 15, 4, 28, 1),
(522, 3, 1, 16, 4, 28, 1),
(523, 3, 1, 18, 4, 28, 1),
(524, 3, 1, 19, 4, 28, 1),
(525, 3, 1, 20, 4, 28, 1),
(526, 3, 1, 27, 4, 28, 1),
(527, 3, 1, 28, 4, 28, 1),
(528, 4, 2, 2, 4, 28, 1),
(529, 4, 2, 3, 4, 28, 1),
(530, 4, 1, 6, 4, 28, 1),
(531, 4, 1, 11, 4, 28, 1),
(532, 4, 1, 12, 4, 28, 1),
(533, 4, 1, 13, 4, 28, 1),
(534, 4, 1, 18, 4, 28, 1),
(535, 4, 1, 20, 4, 28, 1),
(536, 4, 1, 27, 4, 28, 1),
(537, 6, 2, 5, 4, 28, 1),
(538, 6, 2, 29, 4, 28, 1),
(539, 6, 1, 7, 4, 28, 1),
(540, 6, 1, 8, 4, 28, 1),
(541, 6, 1, 9, 4, 28, 1),
(542, 6, 1, 10, 4, 28, 1),
(543, 6, 1, 13, 4, 28, 1),
(544, 6, 1, 14, 4, 28, 1),
(545, 6, 1, 15, 4, 28, 1),
(546, 6, 1, 16, 4, 28, 1),
(547, 6, 1, 20, 4, 28, 1),
(548, 6, 1, 27, 4, 28, 1),
(549, 6, 1, 28, 4, 28, 1),
(550, 1, 2, 2, 4, 28, 2),
(551, 1, 2, 3, 4, 28, 2),
(552, 1, 1, 6, 4, 28, 2),
(553, 1, 1, 7, 4, 28, 2),
(554, 1, 1, 12, 4, 28, 2),
(555, 1, 1, 13, 4, 28, 2),
(556, 6078728, 2, 29, 4, 29, 1),
(557, 6078728, 1, 32, 4, 29, 1),
(558, 6078728, 1, 30, 4, 29, 1),
(559, 6078728, 1, 1, 4, 29, 1),
(560, 6078728, 1, 10, 4, 29, 1),
(561, 6078728, 1, 12, 4, 29, 1),
(562, 6078728, 1, 13, 4, 29, 1),
(563, 6078728, 1, 14, 4, 29, 1),
(564, 6078728, 1, 15, 4, 29, 1),
(565, 6078728, 1, 16, 4, 29, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stat`
--

CREATE TABLE `stat` (
  `id_stat` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stat`
--

INSERT INTO `stat` (`id_stat`, `description`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'Begin of the voting '),
(4, 'Selection of the adm'),
(5, 'print'),
(6, 'end of the process'),
(7, 'null vote');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table`
--

CREATE TABLE `table` (
  `id_user` int(11) NOT NULL,
  `number_table` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table`
--

INSERT INTO `table` (`id_user`, `number_table`) VALUES
(2, 1),
(5, 2),
(6, 3),
(8, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_kind_user` int(11) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `password`, `id_kind_user`, `stat`) VALUES
(1, 'super', '12345', 3, 1),
(2, 'mesa1 ', '12345', 1, 1),
(3, 'lhernandez', '123456', 3, 1),
(4, 'admin', '12345', 2, 1),
(5, 'mesa2', '12345', 1, 1),
(6, 'mesa3', '12345', 1, 1),
(7, 'Andrea', '12345', 3, 1),
(8, 'r', '1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voter_stat`
--

CREATE TABLE `voter_stat` (
  `number_control` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `number_table` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id_candidate`);

--
-- Indices de la tabla `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id_choice`);

--
-- Indices de la tabla `kind_meeting`
--
ALTER TABLE `kind_meeting`
  ADD PRIMARY KEY (`id_kind_meeting`);

--
-- Indices de la tabla `kind_user`
--
ALTER TABLE `kind_user`
  ADD PRIMARY KEY (`id_kind_user`);

--
-- Indices de la tabla `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_result`);

--
-- Indices de la tabla `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`id_stat`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id_candidate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `choice`
--
ALTER TABLE `choice`
  MODIFY `id_choice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `kind_meeting`
--
ALTER TABLE `kind_meeting`
  MODIFY `id_kind_meeting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `kind_user`
--
ALTER TABLE `kind_user`
  MODIFY `id_kind_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `result`
--
ALTER TABLE `result`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

--
-- AUTO_INCREMENT de la tabla `stat`
--
ALTER TABLE `stat`
  MODIFY `id_stat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
