-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2021 a las 07:51:37
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electivaphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `id_conductores` int(11) NOT NULL,
  `doc_identidad` int(12) NOT NULL,
  `tipo_licencia` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `correo` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`id_conductores`, `doc_identidad`, `tipo_licencia`, `nombre`, `apellido`, `telefono`, `correo`) VALUES
(1, 29891212, 'B1', 'Carlos', 'fernades', '6222222', 'carlos@ejemplo.com'),
(3, 98818118, 'Barco', 'kevin', 'rodiguez', '6222222', 'kevinrincon8@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(11) NOT NULL,
  `tipo_movimiento` char(10) NOT NULL,
  `origen` varchar(25) NOT NULL,
  `destino` varchar(25) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(40) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cedula_usuario` int(50) NOT NULL,
  `placa` varchar(6) NOT NULL,
  `cedula_conductor` int(50) NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `transportadora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_movimiento`, `tipo_movimiento`, `origen`, `destino`, `fecha`, `hora`, `producto`, `estado`, `cedula_usuario`, `placa`, `cedula_conductor`, `observacion`, `transportadora`) VALUES
(1, 'Entrada', 'Barranquilla', 'Bogota', '2021-06-03', '2021-05-26 16:32:11', 'jabon', 'Disponible', 123456789, '1', 98818118, 'Revisando  las  especificaciones  del  cilindraje ', 'Servientrega'),
(5, 'Salida', 'Barranquilla', 'Bogota', '2021-06-03', '2021-05-26 16:32:11', 'Sillas', 'No Disponible', 123456789, 'XDR691', 29891212, 'Revisando  las  especificaciones  del  cilindraje ', 'Envia'),
(6, 'Salida', 'Barranquilla', 'Yondo', '2021-06-03', '11:00', 'Condones', 'No Disponible', 123456789, 'XDR692', 98818118, 'Viene En mal Estado el Auto', 'Envia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` int(50) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Placa` varchar(50) NOT NULL,
  `Hora` varchar(50) NOT NULL,
  `Peso` double NOT NULL,
  `Observacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id_proceso`, `Fecha`, `Placa`, `Hora`, `Peso`, `Observacion`) VALUES
(13, '2021-05-31 04:05:14', '1', '02:01', 123, 'Nada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo_producto` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `tipo_producto`, `descripcion`, `estado`) VALUES
(1, 'jabon', 1, 'barra de jabon', 'A'),
(2, 'Zapatos', 2, 'asdasd', 'A'),
(12, 'adasd', 1, 'asdasd', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_producto`, `nombre`) VALUES
(1, 'limpieza'),
(2, 'Calzado'),
(3, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(50) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Operador'),
(3, 'Consulta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportadoras`
--

CREATE TABLE `transportadoras` (
  `id_transportadora` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `nit` varchar(12) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transportadoras`
--

INSERT INTO `transportadoras` (`id_transportadora`, `nombre`, `descripcion`, `nit`, `contacto`, `direccion`, `estado`) VALUES
(29, 'FedEx', 'transportadora', '45398', '1111', 'dadsa', 'S'),
(30, 'Envia', 'transportadora', '11111', '212121', 'calle ejemplo', 'N'),
(31, 'Servientrega', 'transportadora', '11111', '212121', 'calle ejemplo', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` int(12) NOT NULL,
  `telefono` int(14) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `cedula`, `telefono`, `correo`, `clave`, `tipo_usuario`, `foto`) VALUES
(1, 'Jean Carlos', 'Mejia Galvis', 123456789, 31212331, 'jean@udi.edu.co', 'e807f1fcf82d132f9bb018ca6738a19f', '1', 'Publicas\\Perfil/perfil.jpg'),
(2, 'Irene Yulieth', 'Gonzalez Angarita', 123456788, 31212332, 'irene@udi.edu.co', 'e807f1fcf82d132f9bb018ca6738a19f', '2', 'Publicas\\Perfil/perfil.jpg'),
(3, 'Dayana Lizeth', 'Rico Agamez', 123456787, 31212333, 'dayana@udi.edu.co', 'e807f1fcf82d132f9bb018ca6738a19f', '1', 'Publicas\\Perfil/perfil.jpg'),
(4, 'Cristhian Guillermo', 'Balaguera', 123456786, 31212334, 'crisrhian@udi.edu.co', 'e807f1fcf82d132f9bb018ca6738a19f', '3', 'Publicas\\Perfil/perfil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `placa` varchar(6) NOT NULL,
  `capacidad` float NOT NULL,
  `remolque` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `placa`, `capacidad`, `remolque`) VALUES
(1, 'IEX651', 5000, 'Si'),
(3, 'XDR691', 4500, 'Si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`id_conductores`),
  ADD UNIQUE KEY `doc_identidad` (`doc_identidad`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `cedula_conductor` (`cedula_conductor`),
  ADD KEY `cedula_usuario` (`cedula_usuario`),
  ADD KEY `placa` (`placa`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`),
  ADD KEY `Placa` (`Placa`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `tipo_producto` (`tipo_producto`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transportadoras`
--
ALTER TABLE `transportadoras`
  ADD PRIMARY KEY (`id_transportadora`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `placa` (`placa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `id_conductores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id_proceso` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transportadoras`
--
ALTER TABLE `transportadoras`
  MODIFY `id_transportadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`cedula_usuario`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`cedula_conductor`) REFERENCES `conductores` (`doc_identidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
