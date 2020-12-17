-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2020 a las 17:52:49
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calzado_solis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `Num_Folio` int(10) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Talla` float NOT NULL,
  `Diabetico` tinyint(1) NOT NULL,
  `Ortopedico` tinyint(1) NOT NULL,
  `Pedidos_Folio` int(10) NOT NULL,
  `Producto_Modelo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `Tipo` varchar(10) NOT NULL,
  `Responsable` varchar(25) NOT NULL,
  `Referencia` varchar(26) NOT NULL,
  `Pedidos_Folio` int(10) NOT NULL,
  `Usuario_Cuenta` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Folio` int(10) NOT NULL,
  `Facturacion` tinyint(1) NOT NULL,
  `Monto` float NOT NULL,
  `FechaEntrega` date NOT NULL,
  `Usuario_Cuenta` varchar(25) NOT NULL,
  `Pago_Referencia` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `modelo` varchar(30) NOT NULL,
  `Linea` varchar(20) NOT NULL,
  `Estilo` varchar(20) NOT NULL,
  `Plantilla` varchar(10) NOT NULL,
  `Suela` varchar(20) NOT NULL,
  `Corte` varchar(20) NOT NULL,
  `Montado` varchar(20) NOT NULL,
  `Casquillo` varchar(20) NOT NULL,
  `Color` varchar(15) NOT NULL,
  `Precio` float NOT NULL,
  `Imagen` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Cuenta` varchar(25) NOT NULL,
  `Contraseña` varchar(25) NOT NULL,
  `Tipo` varchar(13) NOT NULL,
  `Nombres` varchar(25) NOT NULL,
  `ApellidoMat` varchar(20) NOT NULL,
  `ApellidoPat` varchar(20) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `CorreoElectronico` varchar(25) NOT NULL,
  `Edad` int(2) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `CodigoPostal` int(5) NOT NULL,
  `Localidad` varchar(20) NOT NULL,
  `Provincia` varchar(20) NOT NULL,
  `Pais` varchar(20) NOT NULL,
  `Pedidos_Folio` int(10) NOT NULL,
  `ImagenUsu` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`Num_Folio`),
  ADD KEY `carritofk1` (`Pedidos_Folio`),
  ADD KEY `carritofk2` (`Producto_Modelo`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`Responsable`),
  ADD KEY `pagofk1` (`Pedidos_Folio`),
  ADD KEY `pagofk2` (`Usuario_Cuenta`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `pedidosfk1` (`Usuario_Cuenta`),
  ADD KEY `pedidosfk2` (`Pago_Referencia`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`modelo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Cuenta`),
  ADD KEY `usuario` (`Pedidos_Folio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `Num_Folio` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Folio` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carritofk1` FOREIGN KEY (`Pedidos_Folio`) REFERENCES `pedidos` (`Folio`),
  ADD CONSTRAINT `carritofk2` FOREIGN KEY (`Producto_Modelo`) REFERENCES `producto` (`modelo`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pagofk1` FOREIGN KEY (`Pedidos_Folio`) REFERENCES `pedidos` (`Folio`),
  ADD CONSTRAINT `pagofk2` FOREIGN KEY (`Usuario_Cuenta`) REFERENCES `usuario` (`Cuenta`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidosfk1` FOREIGN KEY (`Usuario_Cuenta`) REFERENCES `usuario` (`Cuenta`),
  ADD CONSTRAINT `pedidosfk2` FOREIGN KEY (`Pago_Referencia`) REFERENCES `pago` (`Responsable`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`Pedidos_Folio`) REFERENCES `pedidos` (`Folio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
