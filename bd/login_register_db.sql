-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2024 a las 01:40:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_register_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `cliente_nombre` text NOT NULL,
  `cliente_correo` varchar(100) NOT NULL,
  `cliente_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `cliente_nombre`, `cliente_correo`, `cliente_password`) VALUES
(7, 'erik v', 'erik@gmail.com', '123456'),
(8, 'Mario b', 'mario@gmail.com', '123456'),
(9, 'manuel l', 'manuel@gmail.com', '123456'),
(10, 'Jaime H', 'jaime@gmail.com', '123456'),
(11, 'Jorge L', 'jorge@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventocalendario`
--

CREATE TABLE `eventocalendario` (
  `Id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `eventocalendario`
--

INSERT INTO `eventocalendario` (`Id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`) VALUES
(6, 'evento 30', 'descripcion prueba...', '#94e3fe', '#FFFFFF', '2024-05-09 08:30:00', '2024-05-09 08:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `Id` int(11) NOT NULL,
  `Id_nombre_completo` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `telefono` int(7) NOT NULL,
  `servicio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`Id`, `Id_nombre_completo`, `titulo`, `descripcion`, `telefono`, `servicio_id`) VALUES
(27, 10, 'servicio de plomeria 24 horas ', 'prueba ', 55523, 8),
(28, 10, 'carpintero', 'prueba 3', 99999, 10),
(29, 10, 'mecanico', 'prueba 7', 99999, 15),
(30, 10, 'lavador', 'prueba9', 99999, 12),
(31, 12, 'Jardineria', 'jardineria 24 horas', 43222, 15),
(32, 10, 'plomeria', 'probando x1000', 3333333, 8),
(33, 10, 'Guardia de seguridad', 'guardia de seguridad 24 horas ', 9992311, 15),
(34, 10, 'construcción', 'constructos 24 horas del dia', 99999, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre_servicio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre_servicio`) VALUES
(8, 'plomeria'),
(9, 'construccion'),
(10, 'carpinteria'),
(11, 'electricidad '),
(12, 'limpieza'),
(13, 'instalaciones'),
(14, 'remodelación '),
(15, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `Id` int(11) NOT NULL,
  `Id_publicaciones` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` text NOT NULL,
  `correo_cliente` varchar(50) NOT NULL,
  `descripcion_cliente` varchar(100) NOT NULL,
  `direccion_cliente` varchar(100) NOT NULL,
  `telefono_cliente` int(10) NOT NULL,
  `progreso` int(11) DEFAULT NULL,
  `mensaje` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`Id`, `Id_publicaciones`, `id_cliente`, `nombre_cliente`, `correo_cliente`, `descripcion_cliente`, `direccion_cliente`, `telefono_cliente`, `progreso`, `mensaje`) VALUES
(24, 28, 8, 'mario o', 'mario@gmail.com', 'probando', 'probando', 21111, 10, 'SERVICIO ACEPTADO'),
(25, 27, 8, 'mario', 'mario@gmai.com', 'probando', 'probando', 233112, 10, 'ACEPTADO'),
(26, 31, 9, 'manolo', 'manuel@gmail.com', 'limpiar jardín de 30 x 30', 'calle 89 ', 672722, NULL, NULL),
(27, 28, 9, 'manolo', 'manuel@gmail.com', 'hacer una mesa de 4 sillas', 'calle 8', 671726, 10, 'aceptado'),
(28, 30, 9, 'ignacio', 'ig@fff.com', 'adad', 'adasdads', 32121, NULL, NULL),
(29, 31, 9, 'rrr', 'dgdg@fef.com', 'dss', 'sds', 333, NULL, NULL),
(30, 27, 9, 'ddd', 'sedad@ddd.com', 'asdasd', 'dad', 2211, NULL, NULL),
(31, 33, 9, 'carlos h', 'carlos@gmail.com', 'guardia de tienda lunes y martes', 'calle 69', 9992122, 75, 'LLegando el miercoles 24 de mayo'),
(32, 32, 10, 'jaime', 'erik@gmail.com', 'shshha', 'jddaja', 21221, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `nombre_completo` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `nombre_completo`, `correo`, `usuario`, `contrasena`) VALUES
(8, 'juan hernandez', 'juan@we.com', 'juan ', '123456'),
(10, 'cisco ', 'cisco@gmail.com', 'cisco', '123456'),
(12, 'Miguel J', 'miguel@gmail.com', 'miguel', '123456'),
(13, 'Enrique J', 'enrique@gmail.com', 'enrique', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventocalendario`
--
ALTER TABLE `eventocalendario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_nombre_completo` (`Id_nombre_completo`),
  ADD KEY `servicio_id` (`servicio_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_publicaciones` (`Id_publicaciones`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `eventocalendario`
--
ALTER TABLE `eventocalendario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`Id_nombre_completo`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`Id_publicaciones`) REFERENCES `publicaciones` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
