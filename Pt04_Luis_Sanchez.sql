-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2024 a las 12:26:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt04_luis_sanchez`
--
DROP DATABASE IF EXISTS `pt04_luis_sanchez`;
CREATE DATABASE IF NOT EXISTS `pt04_luis_sanchez` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt04_luis_sanchez`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titol` varchar(255) NOT NULL,
  `cos` text NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `titol`, `cos`, `usuario_id`, `created_at`) VALUES
(4, 'El oso polar', 'El oso polar vive en las regiones árticas y está adaptado al frío extremo.', 4, '2024-10-11 07:55:05'),
(5, 'El águila calva', 'El águila calva es un ave rapaz y el símbolo nacional de los Estados Unidos.', 5, '2024-10-11 07:55:05'),
(6, 'El león africano', 'El león africano es conocido como el rey de la selva y es un depredador formidable.', 1, '2024-10-11 07:55:05'),
(7, 'El delfín nariz de botella', 'El delfín nariz de botella es un mamífero marino muy inteligente.', 2, '2024-10-11 07:55:05'),
(8, 'El gorila de montaña', 'El gorila de montaña vive en las selvas africanas y es una especie en peligro.', 3, '2024-10-11 07:55:05'),
(9, 'El rinoceronte blanco', 'El rinoceronte blanco es uno de los animales más grandes y se encuentra en África.', 4, '2024-10-11 07:55:05'),
(10, 'El jaguar', 'El jaguar es el felino más grande de América y tiene una fuerza impresionante.', 5, '2024-10-11 07:55:05'),
(11, 'El pingüino emperador', 'El pingüino emperador vive en la Antártida y es el más grande de todas las especies de pingüinos....', 1, '2024-10-11 07:55:05'),
(12, 'El camello bactriano', 'El camello bactriano tiene dos jorobas y es nativo de las regiones desérticas de Asia.', 2, '2024-10-11 07:55:05'),
(13, 'El puma', 'El puma, también conocido como león de montaña, habita en América del Norte y del Sur.', 3, '2024-10-11 07:55:05'),
(14, 'El zorro ártico', 'El zorro ártico es un animal que vive en las regiones más frías del planeta.', 4, '2024-10-11 07:55:05'),
(15, 'El canguro rojo', 'El canguro rojo es el marsupial más grande y vive en Australia.', 5, '2024-10-11 07:55:05'),
(17, 'La ballena azul', 'La ballena azul es el animal más grande que haya existido en la Tierra.', 2, '2024-10-11 07:55:05'),
(18, 'El oso negro americano', 'El oso negro americano es una especie de oso que vive en América del Norte.', 3, '2024-10-11 07:55:05'),
(19, 'El búho nival', 'El búho nival es una especie de ave rapaz que vive en las regiones árticas.', 4, '2024-10-11 07:55:05'),
(20, 'La jirafa', 'La jirafa es el animal terrestre más alto y vive en las sabanas africanas.', 5, '2024-10-11 07:55:05'),
(28, 'asdgf', 'dfgdfg', 10, '2024-10-12 14:55:53'),
(36, 'león', 'leones', 1, '2024-10-12 17:44:58'),
(37, '1234', 'gfdzdzfg', 7, '2024-10-13 17:27:33'),
(38, 'dfgdzf', 'dgffg', 7, '2024-10-13 17:27:35'),
(40, 'Delfines', 'Los delfines son mamíferos marinos altamente inteligentes que viven en grupos sociales. Son conocidos por su capacidad para comunicarse a través de sonidos y por sus acrobacias en el agua. Su estructura social es compleja, y se ha demostrado que forman fuertes lazos familiares.', 1, '2024-10-13 19:46:32'),
(41, 'Elefantes', 'Los elefantes son los mamíferos terrestres más grandes y son reconocidos por su extraordinaria memoria y su comportamiento social. Viven en manadas lideradas por una matriarca, y son cruciales para el ecosistema, ya que contribuyen a la creación y mantenimiento de hábitats.', 1, '2024-10-13 19:46:45'),
(42, 'Pez coral', 'Los peces de coral son una parte vital de los arrecifes marinos, donde viven en simbiosis con los corales. Su diversidad de colores y patrones los hace destacar, y desempeñan un papel esencial en la salud del ecosistema, actuando como limpiadores y fuente de alimento para otros organismos marinos.', 1, '2024-10-13 19:47:06'),
(43, 'Gatos Salvajes', 'Los gatos salvajes, como el lince y el serval, son cazadores excepcionales que se han adaptado a diversas condiciones ambientales. Con una aguda visión y un sigilo notable, son capaces de capturar presas que superan su tamaño. Sin embargo, enfrentan amenazas significativas debido a la pérdida de hábitat.', 1, '2024-10-13 19:47:20'),
(44, 'Pulpos', 'Los pulpos son criaturas intrigantes del océano, conocidos por su inteligencia y habilidades de camuflaje. Pueden cambiar de color y textura para mimetizarse con su entorno, y poseen una sorprendente capacidad para resolver problemas, lo que los convierte en fascinantes objetos de estudio en la biología marina.', 1, '2024-10-13 19:47:34'),
(45, 'sgd', 'zgdfgv', 1, '2024-10-13 19:47:53'),
(46, 'paloma', 'palomo', 7, '2024-10-13 20:57:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `password`, `fecha_registro`) VALUES
(1, 'luis', 'usuario1@example.com', '$2y$10$XhoSE.pG/E3QZ5Gu5Wf1Meq3Zx/mTR8Z63BU.q/AXKoIEdJYnoYTm', '2024-10-11 07:55:05'),
(2, 'paco', 'usuario2@example.com', '$2y$10$bNH3wqWFSTb2s9fcTItbMu5BkgBnBkEE/P1Zkvpd16C/psdoxBiL6', '2024-10-11 07:55:05'),
(3, 'pepe', 'usuario3@example.com', '$2y$10$bNH3wqWFSTb2s9fcTItbMu5BkgBnBkEE/P1Zkvpd16C/psdoxBiL6', '2024-10-11 07:55:05'),
(4, 'paca', 'usuario4@example.com', '$2y$10$bNH3wqWFSTb2s9fcTItbMu5BkgBnBkEE/P1Zkvpd16C/psdoxBiL6', '2024-10-11 07:55:05'),
(5, 'lala', 'lala@la.com', '$2y$10$bNH3wqWFSTb2s9fcTItbMu5BkgBnBkEE/P1Zkvpd16C/psdoxBiL6', '2024-10-11 07:55:05'),
(7, '1234', '1234@1234.com', '$2y$10$XhoSE.pG/E3QZ5Gu5Wf1Meq3Zx/mTR8Z63BU.q/AXKoIEdJYnoYTm', '2024-10-11 20:34:21'),
(8, 'dfg', 'dsf@gf.fs', '$2y$10$gQHzjZNDmm7uhRZYvxFsPuf6V4qwffkEJa9DtgsK0KbRTiAwcR.eC', '2024-10-12 13:43:10'),
(10, 'pedro', 'dsf@gf.fss', '$2y$10$bNH3wqWFSTb2s9fcTItbMu5BkgBnBkEE/P1Zkvpd16C/psdoxBiL6', '2024-10-12 13:43:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
