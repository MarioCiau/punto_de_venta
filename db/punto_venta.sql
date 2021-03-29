-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2021 a las 19:57:43
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `punto_venta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `id` int(255) NOT NULL,
  `ventas_id` int(255) NOT NULL,
  `cliente_id` int(255) NOT NULL,
  `monto` float(100,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `saldo` float(100,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`id`, `ventas_id`, `cliente_id`, `monto`, `fecha`, `hora`, `saldo`) VALUES
(1, 1, 1, 0.99, '2021-03-19', '17:32:21', 599.00),
(2, 1, 1, 99.00, '2021-03-19', '17:34:09', 500.00),
(3, 1, 1, 50.00, '2021-03-19', '17:34:43', 450.00),
(4, 1, 1, 50.00, '2021-03-19', '17:34:49', 400.00),
(5, 1, 1, 50.00, '2021-03-19', '17:44:11', 350.00),
(6, 2, 2, 900.00, '2021-03-19', '17:46:26', 20000.00),
(7, 1, 1, 50.00, '2021-03-19', '17:47:48', 300.00),
(8, 2, 2, 1000.00, '2021-03-21', '10:23:43', 19000.00),
(9, 3, 1, 100.00, '2021-03-21', '12:40:01', 900.00),
(10, 3, 1, 10.00, '2021-03-21', '12:41:41', 890.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Lavadoras'),
(2, 'Televisores'),
(3, 'Refrigeradores'),
(4, 'Bicicletas'),
(5, 'Iphones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `edad` int(255) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `estado`, `localidad`, `direccion`, `edad`, `telefono`, `fecha`) VALUES
(1, 'Mario Josue', 'Yucatan', 'Uman', 'Calle 11 # 103 x 20 y 22 ', 23, '9997378025', '2021-03-18'),
(2, 'Ximena Ayuso', 'Yucatan', 'Uman', 'Calle 11-A # 123 x 18 y 20 ', 20, '9993371819', '2021-03-18'),
(3, 'William Ciau', 'Yucatan', 'Uman', 'Calle 11 # 103 x 20 y 22 Uman', 33, '9991881166', '2021-03-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_ventas`
--

CREATE TABLE `lineas_ventas` (
  `id` int(255) NOT NULL,
  `venta_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lineas_ventas`
--

INSERT INTO `lineas_ventas` (`id`, `venta_id`, `producto_id`, `unidades`) VALUES
(2, 1, 1, 1),
(3, 2, 4, 1),
(4, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `oferta` varchar(2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) VALUES
(1, 5, 'Iphone 11', 'Iphone 11', 1599.99, 5, NULL, '2021-03-18', 'iphone.png'),
(2, 1, 'Lavadora Mabe', 'Lavadora Mabe', 1789.00, 10, NULL, '2021-03-18', 'lavadora.jpg'),
(3, 2, 'Televisor LG', 'Televisor LG', 1500.00, 3, NULL, '2021-03-18', 'televisor.png'),
(4, 5, 'Iphone XR', 'Iphone XR', 21000.00, 7, NULL, '2021-03-18', 'iphone2.png'),
(5, 5, 'Iphone XR', 'Iphone ', 21000.00, 3, NULL, '2021-03-21', 'iphone3.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `usuario`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin@admin.com', 'contraseña', 'admin', NULL),
(2, 'Mario Josue', 'Ciau Chuil', 'MCiau', 'mario_josue@hotmail.com', '$2y$04$4W6jCHJiJyBlHfWnE6oow.KN6ZMF/LHmkq/qu4uU8IUmV584LSDSi', 'admin', NULL),
(3, 'Mario Josue', 'Ciau Chuil', 'JCiau', 'mario_josue1110@hotmail.com', '$2y$04$kjzGOtjACypPCZT21ojy/ObaZMe.pGoWRoDc3z4xXZsYBaXpAg8RW', 'user', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(255) NOT NULL,
  `cliente_id` int(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `total` float(200,2) NOT NULL,
  `enganche` float(200,2) DEFAULT NULL,
  `saldo` float(200,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `cliente_id`, `tipo`, `total`, `enganche`, `saldo`, `fecha`, `hora`, `estado`) VALUES
(1, 1, 'credito', 1599.99, 1000.00, 300.00, '2021-03-18', '16:52:38', 'pendiente'),
(2, 2, 'credito', 21000.00, 100.00, 19000.00, '2021-03-19', '17:45:56', 'pendiente'),
(3, 1, 'credito', 1500.00, 500.00, 890.00, '2021-03-21', '12:39:25', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_abonos_ventas` (`ventas_id`),
  ADD KEY `fk_abonos_cliente` (`cliente_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_ventas`
--
ALTER TABLE `lineas_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_linea_venta` (`venta_id`),
  ADD KEY `fk_linea_producto` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario` (`usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ventas_cliente` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lineas_ventas`
--
ALTER TABLE `lineas_ventas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD CONSTRAINT `fk_abonos_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_abonos_ventas` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `lineas_ventas`
--
ALTER TABLE `lineas_ventas`
  ADD CONSTRAINT `fk_linea_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_linea_venta` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
