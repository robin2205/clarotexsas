-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2017 a las 01:23:06
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clarotexsas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_InsertarDetColorTelas` (IN `_idtela` INT, IN `_idcolor` INT, IN `_idinv` INT)  BEGIN
INSERT INTO detallescolorestelas(idTela,idColor,idInventario) VALUES(_idtela,_idcolor,_idinv);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_InsertarInvTelas` (IN `_cantidad` DOUBLE, IN `_disponible` DOUBLE)  BEGIN
INSERT INTO inventariotelas(cantidad,disponible) VALUES(_cantidad,_disponible);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_InsertarTelas` (IN `_referencia` VARCHAR(7), IN `_descripcion` TEXT, IN `_costo` DOUBLE, IN `_unidad` INT, IN `_ancho` DOUBLE, IN `_rendimiento` DOUBLE, IN `_tipoI` CHAR(1), IN `_estado` INT)  BEGIN

DECLARE UltimoRegistro INT;

INSERT INTO telas(referencia,descripcion,costo) VALUES(_referencia,_descripcion,_costo);

SET UltimoRegistro=(SELECT MAX(idtelas) FROM telas);

INSERT INTO detallestelas(idTipo,idTela,idUniMedida,idEstado,rendimiento,ancho) VALUES(_tipoI,UltimoRegistro,_unidad,_estado,_rendimiento,_ancho);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `color`) VALUES
(1, 'Rojo'),
(2, 'Azul'),
(3, 'Verde'),
(4, 'Estampado Flores'),
(5, 'Estampado Patos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallescoloresinsumos`
--

CREATE TABLE `detallescoloresinsumos` (
  `id` int(11) NOT NULL,
  `idColor` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `idInventarioI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallescolorestelas`
--

CREATE TABLE `detallescolorestelas` (
  `id` int(11) NOT NULL,
  `idTela` int(11) NOT NULL,
  `idColor` int(11) NOT NULL,
  `idInventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallescolorestelas`
--

INSERT INTO `detallescolorestelas` (`id`, `idTela`, `idColor`, `idInventario`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 2),
(3, 1, 3, 3),
(4, 2, 2, 4),
(5, 2, 1, 5),
(6, 3, 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesinsumos`
--

CREATE TABLE `detallesinsumos` (
  `iddetallesInsumos` int(11) NOT NULL,
  `idTipo` char(1) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `idUniMedida` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `color` varchar(15) DEFAULT NULL,
  `talla` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallestelas`
--

CREATE TABLE `detallestelas` (
  `iddetallesTelas` int(11) NOT NULL,
  `idTipo` char(1) NOT NULL,
  `idTela` int(11) NOT NULL,
  `idUniMedida` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `rendimiento` double DEFAULT NULL,
  `ancho` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallestelas`
--

INSERT INTO `detallestelas` (`iddetallesTelas`, `idTipo`, `idTela`, `idUniMedida`, `idEstado`, `rendimiento`, `ancho`) VALUES
(1, 'T', 1, 3, 2, 3.5, 1.6),
(2, 'T', 2, 3, 1, 3.5, 1.6),
(3, 'T', 3, 2, 1, 0, 1.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `idestados` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idestados`, `descripcion`) VALUES
(1, 'Ingresado'),
(2, 'Disponible'),
(3, 'Corte'),
(4, 'Confección'),
(5, 'Estampación Localizada'),
(6, 'Sesgo'),
(7, 'Entregado'),
(8, 'Proceso Externo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `idinsumos` int(11) NOT NULL,
  `referencia` varchar(7) DEFAULT NULL,
  `descripcion` text,
  `costo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarioinsumos`
--

CREATE TABLE `inventarioinsumos` (
  `idinventarioInsumos` int(11) NOT NULL,
  `cantidad` double DEFAULT NULL,
  `disponible` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventariotelas`
--

CREATE TABLE `inventariotelas` (
  `idinventarioTelas` int(11) NOT NULL,
  `cantidad` double DEFAULT NULL,
  `disponible` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventariotelas`
--

INSERT INTO `inventariotelas` (`idinventarioTelas`, `cantidad`, `disponible`) VALUES
(1, 20, 20),
(2, 10, 10),
(3, 25, 25),
(4, 10, 10),
(5, 30, 30),
(6, 30, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `idperfil` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idperfil`, `descripcion`) VALUES
(1, 'admon'),
(2, 'editor'),
(3, 'consultor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telas`
--

CREATE TABLE `telas` (
  `idtelas` int(11) NOT NULL,
  `referencia` varchar(7) DEFAULT NULL,
  `descripcion` text,
  `costo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `telas`
--

INSERT INTO `telas` (`idtelas`, `referencia`, `descripcion`, `costo`) VALUES
(1, 'GOQX8Y1', 'Minotauro', 21000),
(2, 'BU4F639', 'Centauro', 24500),
(3, '6V6CCKV', 'Hawai', 4000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinventario`
--

CREATE TABLE `tipoinventario` (
  `idtipoInventario` char(1) NOT NULL,
  `descripcion` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoinventario`
--

INSERT INTO `tipoinventario` (`idtipoInventario`, `descripcion`) VALUES
('I', 'Insumos'),
('T', 'Telas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidaddemedidas`
--

CREATE TABLE `unidaddemedidas` (
  `idunidaddeMedidas` int(11) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidaddemedidas`
--

INSERT INTO `unidaddemedidas` (`idunidaddeMedidas`, `descripcion`) VALUES
(1, 'Unidad'),
(2, 'Metros'),
(3, 'Kilos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` varchar(13) NOT NULL,
  `nombre` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `email`, `usuario`, `password`, `perfil`) VALUES
('1017137664', 'Robinson Gallego Alzate', 'pineda2110@hotmail.com', 'rgallegoa', 'fifa2010', 1),
('1111111111', 'Carlos Vasco', 'vasco.1019@gmail.com', 'cvasco10', 'cvasco10', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallescoloresinsumos`
--
ALTER TABLE `detallescoloresinsumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idColor` (`idColor`),
  ADD KEY `idInsumo` (`idInsumo`),
  ADD KEY `idInventarioI` (`idInventarioI`);

--
-- Indices de la tabla `detallescolorestelas`
--
ALTER TABLE `detallescolorestelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInsumo` (`idTela`),
  ADD KEY `idColor` (`idColor`),
  ADD KEY `idInventario` (`idInventario`);

--
-- Indices de la tabla `detallesinsumos`
--
ALTER TABLE `detallesinsumos`
  ADD PRIMARY KEY (`iddetallesInsumos`),
  ADD KEY `idTipoI_idx` (`idTipo`),
  ADD KEY `idInsumoI_idx` (`idInsumo`),
  ADD KEY `idUniMedidaI_idx` (`idUniMedida`),
  ADD KEY `idEstadoI_idx1` (`idEstado`);

--
-- Indices de la tabla `detallestelas`
--
ALTER TABLE `detallestelas`
  ADD PRIMARY KEY (`iddetallesTelas`),
  ADD KEY `idTela_idx` (`idTela`),
  ADD KEY `idTipo_idx` (`idTipo`),
  ADD KEY `idUniMedida_idx` (`idUniMedida`),
  ADD KEY `idEstado_idx` (`idEstado`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idestados`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`idinsumos`);

--
-- Indices de la tabla `inventarioinsumos`
--
ALTER TABLE `inventarioinsumos`
  ADD PRIMARY KEY (`idinventarioInsumos`);

--
-- Indices de la tabla `inventariotelas`
--
ALTER TABLE `inventariotelas`
  ADD PRIMARY KEY (`idinventarioTelas`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indices de la tabla `telas`
--
ALTER TABLE `telas`
  ADD PRIMARY KEY (`idtelas`);

--
-- Indices de la tabla `tipoinventario`
--
ALTER TABLE `tipoinventario`
  ADD PRIMARY KEY (`idtipoInventario`);

--
-- Indices de la tabla `unidaddemedidas`
--
ALTER TABLE `unidaddemedidas`
  ADD PRIMARY KEY (`idunidaddeMedidas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `idPerfil_idx` (`perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `detallescoloresinsumos`
--
ALTER TABLE `detallescoloresinsumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detallescolorestelas`
--
ALTER TABLE `detallescolorestelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detallesinsumos`
--
ALTER TABLE `detallesinsumos`
  MODIFY `iddetallesInsumos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detallestelas`
--
ALTER TABLE `detallestelas`
  MODIFY `iddetallesTelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idestados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `idinsumos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventarioinsumos`
--
ALTER TABLE `inventarioinsumos`
  MODIFY `idinventarioInsumos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventariotelas`
--
ALTER TABLE `inventariotelas`
  MODIFY `idinventarioTelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `telas`
--
ALTER TABLE `telas`
  MODIFY `idtelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `unidaddemedidas`
--
ALTER TABLE `unidaddemedidas`
  MODIFY `idunidaddeMedidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallescoloresinsumos`
--
ALTER TABLE `detallescoloresinsumos`
  ADD CONSTRAINT `detallescoloresinsumos_ibfk_1` FOREIGN KEY (`idColor`) REFERENCES `colores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallescoloresinsumos_ibfk_2` FOREIGN KEY (`idInsumo`) REFERENCES `insumos` (`idinsumos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallescoloresinsumos_ibfk_3` FOREIGN KEY (`idInventarioI`) REFERENCES `inventarioinsumos` (`idinventarioInsumos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallescolorestelas`
--
ALTER TABLE `detallescolorestelas`
  ADD CONSTRAINT `detallescolorestelas_ibfk_1` FOREIGN KEY (`idTela`) REFERENCES `telas` (`idtelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallescolorestelas_ibfk_2` FOREIGN KEY (`idColor`) REFERENCES `colores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallescolorestelas_ibfk_3` FOREIGN KEY (`idInventario`) REFERENCES `inventariotelas` (`idinventarioTelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallesinsumos`
--
ALTER TABLE `detallesinsumos`
  ADD CONSTRAINT `idEstadoI` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idestados`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idInsumoI` FOREIGN KEY (`idInsumo`) REFERENCES `insumos` (`idinsumos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idTipoI` FOREIGN KEY (`idTipo`) REFERENCES `tipoinventario` (`idtipoInventario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUniMedidaI` FOREIGN KEY (`idUniMedida`) REFERENCES `unidaddemedidas` (`idunidaddeMedidas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallestelas`
--
ALTER TABLE `detallestelas`
  ADD CONSTRAINT `idEstado` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idestados`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idTela` FOREIGN KEY (`idTela`) REFERENCES `telas` (`idtelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idTipo` FOREIGN KEY (`idTipo`) REFERENCES `tipoinventario` (`idtipoInventario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUniMedida` FOREIGN KEY (`idUniMedida`) REFERENCES `unidaddemedidas` (`idunidaddeMedidas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idPerfil` FOREIGN KEY (`perfil`) REFERENCES `perfiles` (`idperfil`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
