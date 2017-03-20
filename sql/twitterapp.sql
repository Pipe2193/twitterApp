-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2017 a las 04:21:58
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `twitterapp`
--
CREATE DATABASE IF NOT EXISTS `twitterapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `twitterapp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `accion` varchar(80) NOT NULL,
  `tabla` varchar(80) NOT NULL,
  `registro` bigint(20) UNSIGNED DEFAULT NULL,
  `observacion` varchar(1024) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `usuario_id`, `accion`, `tabla`, `registro`, `observacion`, `fecha`) VALUES
(1, 1, 'identificacion', 'NINGUNA', NULL, NULL, '2017-03-17 18:30:24'),
(2, 1, 'salida del sistema', 'NINGUNA', NULL, NULL, '2017-03-17 18:30:32'),
(3, 1, 'identificacion', 'NINGUNA', NULL, NULL, '2017-03-17 18:30:39'),
(4, 1, 'salida del sistema', 'NINGUNA', NULL, NULL, '2017-03-17 19:43:47'),
(5, 1, 'identificacion', 'NINGUNA', NULL, NULL, '2017-03-17 23:41:59'),
(6, 1, 'salida del sistema', 'NINGUNA', NULL, NULL, '2017-03-17 23:42:16'),
(12, 831265185717506049, 'salida del sistema', 'NINGUNA', NULL, NULL, '2017-03-18 05:06:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--

CREATE TABLE `credencial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `credencial`
--

INSERT INTO `credencial` (`id`, `nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '2017-03-17 13:18:58', '2017-03-17 13:19:12', NULL),
(2, 'user', '2017-03-17 13:18:58', '2017-03-17 13:19:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordar_me`
--

CREATE TABLE `recordar_me` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `hash_cookie` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `password` varchar(32) NOT NULL,
  `actived` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'TRUE (1) = activado | FALSE (0) = desactivado',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user_name`, `password`, `actived`, `last_login_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '3fde6bb0541387e4ebdadf7c2ff31123', 1, '2017-03-17 23:41:59', '2017-03-17 13:20:19', '2017-03-17 18:41:59', NULL),
(831265185717506049, 'alpachino2193', 'a33e88f07357665d9663ee630aa0581d', 1, NULL, '2017-03-18 00:06:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_credencial`
--

CREATE TABLE `usuario_credencial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `credencial_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_credencial`
--

INSERT INTO `usuario_credencial` (`id`, `usuario_id`, `credencial_id`, `created_at`) VALUES
(1, 1, 1, '2017-03-17 13:20:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bitacora_fecha_Idx` (`fecha`) USING BTREE,
  ADD KEY `bitacora_usuario_id_Idx` (`usuario_id`) USING BTREE;

--
-- Indices de la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recordar_me`
--
ALTER TABLE `recordar_me`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recordar_me_ip_address_hash_cookie_Idx` (`ip_address`,`hash_cookie`) USING BTREE,
  ADD KEY `recordar_me_usuario_id_Idx` (`usuario_id`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_user_name_Idx` (`user_name`) USING BTREE,
  ADD KEY `usuario_actived_Idx` (`actived`) USING BTREE,
  ADD KEY `usuario_deleted_at_Idx` (`deleted_at`) USING BTREE,
  ADD KEY `usuario_user_name_password_Idx` (`user_name`,`password`) USING BTREE;

--
-- Indices de la tabla `usuario_credencial`
--
ALTER TABLE `usuario_credencial`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_credencial_usuario_id_credencial_id_Idx` (`usuario_id`,`credencial_id`) USING BTREE,
  ADD KEY `usuario_credencial_credencial_id_Idx` (`credencial_id`) USING BTREE,
  ADD KEY `usuario_credencial_usuario_id_Idx` (`usuario_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `credencial`
--
ALTER TABLE `credencial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `recordar_me`
--
ALTER TABLE `recordar_me`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT de la tabla `usuario_credencial`
--
ALTER TABLE `usuario_credencial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `fk_bitacora_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `recordar_me`
--
ALTER TABLE `recordar_me`
  ADD CONSTRAINT `fk_recordar_me_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario_credencial`
--
ALTER TABLE `usuario_credencial`
  ADD CONSTRAINT `fk_usuario_credencial_credencial` FOREIGN KEY (`credencial_id`) REFERENCES `credencial` (`id`),
  ADD CONSTRAINT `fk_usuario_credencial_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
