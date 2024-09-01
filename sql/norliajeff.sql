-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2024 a las 02:39:07
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
-- Base de datos: `norliajeff`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID`, `Nombre`, `Apellido`, `Correo`, `Direccion`, `Telefono`, `UsuarioID`) VALUES
(1, 'Jefferson', 'Hinojoza', 'DFSGFHG@GMAIL.COM', '3124454654', 'Medellin', 9),
(2, 'Jefferson', 'Hinojoza', 'DFSGFHG@GMAIL.COM', '3124454654', 'Medellin', 9),
(3, 'Liang', 'Reyes', 'liangreyes@gmail.com', '3456789', 'Cucuta', 11),
(4, 'Luis', 'Alberto ', 'LuisAlberto@gmail.com', 'Cucuta', '3125678990', 11),
(7, 'Luis', 'Armando', 'h@gmail.com', 'sadfs', '13242354', 17),
(8, 'Michael', 'Jordan', 'jordan@gmail.com', 'dsfdgfhgh', '12345', 17),
(9, 'Armando', 'Suarez', 'leonardoreyesalviarez@gmail.com', 'refds', '3245', 17),
(10, 'Liang', 'Reyes', 'liang@gmail.com', 'Cuucta', '34567890', 17),
(35, 'Fernando', 'Luis', 'liangreyes9@gmail.com', 'CUCUTA', '232536465', 16),
(36, 'Liang', 'Reyes', 'liangreyes9@gmail.com', 'cucuta', '3505344454', 20),
(58, 'Michael', 'Jordan', 'h@gmail.com', 'EEUU', '232536465', 21),
(60, 'Liang', 'Reyes', 'liangreyes@gmail.com', 'Av 35 - 29 -85', '35078978990', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `ID` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `ProductoID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `ProveedorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`ID`, `Fecha`, `Total`, `Cantidad`, `Precio`, `ProductoID`, `UsuarioID`, `ProveedorID`) VALUES
(2, '2024-08-31', 20000.00, 10, 2000.00, 5, 25, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) NOT NULL,
  `ProveedorID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Nombre`, `Descripcion`, `Precio`, `Stock`, `ProveedorID`, `UsuarioID`) VALUES
(2, 'galleta', 'vienen paquetes 10 de U', 20.00, 200, 3, NULL),
(3, 'galletas', 'Vienen de paquetes de 10 Unidades', 2000.00, 200, 2, 25),
(5, 'televisor', 'televisor SMART TV ', 500000.00, 1, 3, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ID`, `Nombre`, `Direccion`, `Telefono`, `UsuarioID`) VALUES
(2, 'michael', 'Cucuta - Norte de Santander', '35078978990', 25),
(3, 'Exito S.A.S', 'Cucuta - Norte de Santander', '34567890', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Apellido`, `Email`, `Contrasena`) VALUES
(1, 'Liang', 'Reyes', 'liangreyes9@gmail.com', '123456'),
(2, 'Liang', 'Reyes', 'liangreyes9@gmail.com', '123456'),
(3, 'Jesus', 'Reyes', 'liangreyes9@gmail.com', '12345'),
(4, 'Leonardo', 'Reyes', 'leo@gmail.com', '$2y$10$EKzA5Z3gBq8KZTrM1t2yKefEnlvuT.LvilNLor5ZPdUNEyQFRC8fa'),
(5, 'Leonardo', 'Reyes', 'leo@gmail.com', '$2y$10$OZVu0NTPAV9TpQJ4iiWu3O3XYkpZr.flny6M2IEnLUC50DIq.r1qm'),
(6, 'Christian ', 'Moreno', 'Moreno@gmail.com', '$2y$10$d2jIsF6b2imD3YOj48mLbum1lYsJEJrk/ZH/OE7NUu3yCnTd6uCPS'),
(7, 'jesus', 'Colmenares', 'jesus@gmail.com', '$2y$10$gyhz0Ryc1IqPyE6Wb4TVFOk9h8P7YCnmemeb.yo9Q4Ne9iQyAbb7C'),
(8, 'David', 'Reyes', 'David@gmail.com', '$2y$10$76aZG4zgYEF1Rlaw7wBTk.b8cG/JVpuvu/Jd8IxPSJfdhqFGuKb4u'),
(9, 'Jhon', 'Moreno', 'jhon@gmail.com', '$2y$10$Xw.glbsO9NOUHxLSoGtVLeFG9LuoElsg1/9mfESDHcRw2xrwuIkrm'),
(10, 'David', 'Luis', 'luis@gmail.com', '$2y$10$b2VqAb4cc4y4FCdutlSDY.7ETf3PVxyEBxwXKf0z/tNN02Hy4d0BO'),
(11, 'Christian ', 'Suarez', 'ChristianSENA@gmail.com', '$2y$10$Gowu7sy3svMDhx6bS75qVeWYyZOKwHp2AiiOg.yOqNOR.vjTiYb6O'),
(12, 'Juan', 'Perez', 'juan@example.com', 'password'),
(13, 'Michael', 'Jordan', 'Jordan@gmail.com', '$2y$10$NkrIgwU0N62wt.ivFFcpM.apijPpFkQhBF21hxegjs/qnBC/WVldy'),
(14, 'Jesus', 'Nazareno', 'Jesus@gmail.com', '$2y$10$IL7MAN8SJnNViN.N6lfYAOjwQa/T7vQ6h/frTVIv9KRR27l875pom'),
(15, 'Liang', 'Reyes', 'liangreyes9@gmail.com', '$2y$10$ixmwt2tb3hLpWtsQG4JN2OOovsQEr172PU1NWVknkr3rbj./4DF02'),
(16, 'Elianny', 'Reyes', 'elianny@gmail.com', '$2y$10$JPF8p3SiYDUjJQ3ELpL/heJMIFGA.8lHJ/fipiir/VP9ZjLCCbqLO'),
(17, 'Armando', 'Paredes', 'armando@gmail.com', '$2y$10$uNm.g4TiaThJg532CXyXe.GuFdYrNvFCZqoSzwHc5FluI9qUyugg.'),
(18, 'Liang', 'Reyes', 'liangreyes9@gmail.com', '$2y$10$TphglVBC2/Uz42FG8PbVg.BjaUBCZJZwSZjyZsf3FFBs423XdKrpu'),
(19, 'jhon', 'woodz', 'jhon@gmail.com', '$2y$10$F.OVLnmX2l3/UuObqeVIC.Ivk5YF0xNi8f4/q7fNBfkyqW5HcQacK'),
(20, 'Pedro', 'Pascal', 'pedro@gmail.com', '$2y$10$DkLO7rhsRmUREmGlyr6h5.XpAMeHh6EUhR5uSMeygY.3NOEMc87Ua'),
(21, 'Gilberto', 'Flores', 'Gilbert@gmail.com', '$2y$10$5ifGO98.nhSs5FBVMhkWjeKwvXlzvguc/ajyBtD560d2llOGqsjNq'),
(22, 'Susana', 'Rosales', 'susana@gmail.com', '$2y$10$Zw3q7UJNt7aTxLDxz73eFOTyUccgJcVlrqPpz9e6cylm.Gg1EhEOO'),
(23, 'Maria', 'Corina', 'VenezuelaLibre@gmail.com', '$2y$10$GSSblyARVMoas/h/8068O.Ty7.zcHP63DxdF0kOldqXL0gqOTts22'),
(24, 'Liang', 'Reyes', 'liangreyes9@gmail.com', '$2y$10$MCdaY0cugBgffnqz3czHper.XXChiYn1BsVo2H2WlVpnUzArFt6cS'),
(25, 'Jaime', 'Altozano', 'jaimito@gmail.com', '$2y$10$HZdzgUcJjzNBbx74mP/aEeS8wOsmBNcr.kXRREfZuPtZJJgPXuFA2'),
(26, 'Quico', 'Nose', 'chavo@gmail.com', '$2y$10$b5vusvG/7vm/oc8MjaH/c.JSYeiiXP3r9chEI0EgYexFmXs3sAFNi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `ProductoID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `ClienteID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `Fecha`, `Total`, `Cantidad`, `Precio`, `ProductoID`, `UsuarioID`, `ClienteID`) VALUES
(1, '2024-09-01', 12.00, 10, 200.00, 3, NULL, 60),
(3, '2024-08-31', 1.00, 1, 500000.00, 5, 25, 60);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductoID` (`ProductoID`),
  ADD KEY `UsuarioID` (`UsuarioID`),
  ADD KEY `ProveedorID` (`ProveedorID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProveedorID` (`ProveedorID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductoID` (`ProductoID`),
  ADD KEY `UsuarioID` (`UsuarioID`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ID`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`ID`),
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`ProveedorID`) REFERENCES `proveedor` (`ID`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`ProveedorID`) REFERENCES `proveedor` (`ID`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ID`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`ID`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`ClienteID`) REFERENCES `cliente` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
