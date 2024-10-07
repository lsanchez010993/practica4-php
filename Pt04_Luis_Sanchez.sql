-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2024 a las 12:37:22
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

CREATE DATABASE IF NOT EXISTS `pt04_luis_sanchez` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt04_luis_sanchez`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titol` varchar(255) NOT NULL,
  `cos` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `titol`, `cos`, `created_at`) VALUES
(1, 'Elefante', 'Los elefantes son los mamíferos terrestres más grandes del mundo y son conocidos por su inteligencia excepcional y su memoria impresionante. Viven en manadas lideradas por una hembra matriarca y tienen una estructura social compleja. Sus largas trompas les permiten realizar una variedad de tareas, como recoger objetos, comunicarse y beber agua.', '2024-09-25 09:30:34'),
(2, 'Mariposa Monarca', 'La mariposa monarca es famosa por sus migraciones anuales que abarcan miles de kilómetros desde América del Norte hasta México. Durante este viaje, las monarcas enfrentan numerosos desafíos, como cambios climáticos y depredadores. Su distintivo patrón de alas naranjas y negras las hace fácilmente reconocibles y son un símbolo de la belleza y la fragilidad de la naturaleza.', '2024-09-25 09:31:04'),
(3, 'Tiburón Blanco', 'El tiburón blanco es uno de los depredadores más temidos de los océanos, conocido por su tamaño impresionante y su poderosa mandíbula. A pesar de su reputación, estos tiburones juegan un papel crucial en mantener el equilibrio de los ecosistemas marinos al controlar las poblaciones de otras especies. Su comportamiento y migraciones aún son objeto de intensa investigación científica.', '2024-09-25 09:31:32'),
(4, 'Colibrí', 'El colibrí es una de las aves más pequeñas del mundo, destacándose por su capacidad de vuelo estacionario y sus rápidos aleteos. Estas aves se alimentan principalmente del néctar de las flores, lo que las convierte en importantes polinizadores. Su vibrante plumaje y su agilidad en el aire los hacen fascinantes para observadores de aves y amantes de la naturaleza.', '2024-09-25 09:32:09'),
(5, 'Orangután', 'Los orangutanes son primates altamente inteligentes que habitan principalmente en las selvas tropicales de Borneo y Sumatra. Son conocidos por su pelaje rojizo y su comportamiento solitario. Estos animales enfrentan amenazas significativas debido a la deforestación y la pérdida de hábitat, lo que ha llevado a una disminución en sus poblaciones. Los esfuerzos de conservación son cruciales para asegurar su supervivencia a largo plazo.', '2024-09-25 09:32:29'),
(6, 'Ballena Azul', 'La ballena azul es el animal más grande que ha existido en la Tierra, llegando a medir hasta 30 metros de longitud. Se alimenta principalmente de kril y pasa largas temporadas migrando entre aguas frías y cálidas. A pesar de su tamaño colosal, está en peligro de extinción debido a la caza comercial y los impactos humanos en los océanos.', '2024-09-25 09:32:58'),
(7, 'Pingüino Emperador', 'El pingüino emperador es la especie de pingüino más grande y habita en la Antártida. Son conocidos por sus increíbles adaptaciones al frío extremo y su singular forma de criar a sus crías durante el invierno antártico, donde los machos cuidan los huevos mientras las hembras se alimentan en el mar.', '2024-09-25 09:33:21'),
(8, 'Águila Real', 'El águila real es una de las aves rapaces más majestuosas, con una envergadura de hasta 2.3 metros. Estas águilas son cazadoras excepcionales, usando su velocidad y fuerza para capturar presas como conejos y roedores. Son un símbolo de poder y libertad en muchas culturas alrededor del mundo.', '2024-09-25 09:33:45'),
(9, 'Leopardo de las Nieves', 'El leopardo de las nieves es un felino solitario que habita en las montañas de Asia Central. Su pelaje grueso y manchado le proporciona camuflaje en su hábitat nevado, y es conocido por su habilidad para saltar grandes distancias en busca de presas. Sin embargo, está en peligro de extinción debido a la caza furtiva y la pérdida de hábitat.', '2024-09-25 09:34:05'),
(10, 'Panda Gigante', 'El panda gigante es famoso por su dieta exclusiva de bambú y su carácter pacífico. Nativo de China, este oso enfrenta amenazas debido a la deforestación y la fragmentación de su hábitat. Los programas de conservación han mejorado su situación, pero sigue siendo una especie vulnerable.', '2024-09-25 09:34:29'),
(11, 'Delfín Nariz de Botella', 'El delfín nariz de botella es una de las especies de delfines más conocidas y es famoso por su inteligencia y su comportamiento social. Viven en grupos llamados manadas y se comunican mediante una serie de clics y silbidos. Son capaces de realizar complejas tareas cognitivas y son utilizados en investigaciones sobre la cognición animal.', '2024-09-25 09:34:58'),
(12, 'Camaleón', 'El camaleón es un reptil conocido por su habilidad de cambiar de color para camuflarse en su entorno. Esta capacidad les permite evitar depredadores y cazar insectos con su larga lengua. También son conocidos por sus ojos independientes, lo que les da una visión panorámica de su entorno.', '2024-09-25 09:35:19'),
(13, 'Rinoceronte Blanco', 'El rinoceronte blanco es uno de los mamíferos más grandes que habitan en la Tierra, con un peso de hasta 2 toneladas. A pesar de su tamaño y fuerza, esta especie está en peligro crítico de extinción debido a la caza furtiva por su cuerno, que es altamente valorado en el mercado negro.', '2024-09-25 09:35:45'),
(14, 'Lobo Gris', 'El lobo gris es un depredador social que vive en manadas organizadas con una estructura jerárquica bien definida. Estos animales son cruciales para los ecosistemas, ya que ayudan a controlar las poblaciones de herbívoros. A pesar de su importancia ecológica, han sido perseguidos durante siglos por humanos.', '2024-09-25 09:36:13'),
(15, 'Tortuga Marina', 'Las tortugas marinas son criaturas migratorias que pasan la mayor parte de su vida en el océano. Son conocidas por sus largos viajes entre las áreas de alimentación y las playas de anidación. Sin embargo, enfrentan múltiples amenazas, como la contaminación plástica y la captura accidental en redes de pesca.', '2024-09-25 09:36:39'),
(16, 'Canguro Rojo', 'El canguro rojo es el marsupial más grande de Australia y es conocido por su capacidad para saltar largas distancias. Se alimenta principalmente de pasto y tiene una gran habilidad para sobrevivir en climas áridos. Su bolsa marsupial es un símbolo característico de la maternidad entre los mamíferos.', '2024-09-25 09:37:05'),
(17, 'Jirafa', 'La jirafa es el animal terrestre más alto, con su cuello largo que les permite alimentarse de las hojas de los árboles altos en las sabanas africanas. Son conocidas por sus manchas distintivas y su caminar elegante. A pesar de su tamaño, las jirafas son presas de grandes depredadores como los leones.', '2024-09-25 09:37:33'),
(18, 'Cóndor Andino', 'El cóndor andino es uno de los pájaros voladores más grandes del mundo, con una envergadura que puede superar los 3 metros. Son carroñeros que juegan un papel vital en el ecosistema al limpiar los restos de animales muertos. Este majestuoso ave está culturalmente vinculado a los pueblos indígenas de los Andes.', '2024-09-25 09:37:59'),
(19, 'Nutria', 'La nutria es un mamífero acuático conocido por su comportamiento juguetón y su habilidad para usar herramientas. Viven en ríos y lagos y son expertas cazadoras de peces y crustáceos. Son también indicadoras de la salud ambiental de los cuerpos de agua donde habitan.', '2024-09-25 09:38:23'),
(20, 'León Africano', 'El león africano es conocido como el rey de la selva, aunque habita principalmente en sabanas y praderas. Los leones son animales sociales que viven en manadas dirigidas por un macho dominante. Su poderosa mordida y su fuerza los convierten en depredadores tope en su ecosistema.', '2024-09-25 09:38:47');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
