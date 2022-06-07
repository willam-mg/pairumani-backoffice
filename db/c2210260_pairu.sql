-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-06-2022 a las 22:20:38
-- Versión del servidor: 5.7.33-log
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c2210260_pairu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acompanhantes`
--

CREATE TABLE `acompanhantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo_documento` enum('Ci','Dni','Pasaporte') NOT NULL,
  `num_documento` varchar(50) NOT NULL DEFAULT '',
  `nacionalidad` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acompanhantes`
--

INSERT INTO `acompanhantes` (`id`, `nombre`, `tipo_documento`, `num_documento`, `nacionalidad`, `fecha_nacimiento`, `ciudad`, `cliente_id`) VALUES
(2, 'adrianita', 'Ci', '481545', 'boliviana', '2022-01-19', 'Cochabamba - cercad', 23),
(3, 'Lorem ipsum', 'Dni', '8444842', 'Lorem ipsum', '2021-08-12', 'beni', 23),
(4, 'lorem ipsum dolor', 'Ci', '418444', 'boliviana', '2022-01-13', 'sucre', 23),
(5, 'lupita', 'Ci', '481122', 'brasilera', '2021-08-18', 'brasilia', 23),
(6, 'darlin', 'Dni', '481222', 'Lorem ipsum', '2021-10-26', 'Lorem ipsum', 22),
(7, 'inka', 'Ci', '4842285', 'boliviana', '2021-10-23', 'peruana', 22),
(8, 'rolando', 'Ci', '3543343', 'peruano', '2021-10-23', 'lima', 22),
(9, 'rolando cespedes', 'Dni', '418255', 'argentina', '2021-10-22', 'brasilia', 22),
(10, 'carlos', 'Ci', '4811225', 'boliviana', '2021-10-13', 'cochabamba', 21),
(11, 'rodolfo', 'Ci', '4811225', 'boliviana', '2021-10-13', 'cochabamba', 21),
(12, 'reinaldo', 'Ci', '481128', 'mexicana', '2021-10-15', 'juarez', 20),
(13, 'mariana', 'Dni', '7818452', 'ecuatoriana', '2021-10-23', 'quito', 20),
(14, 'celia', 'Ci', '428455', 'Boliviana', '2021-10-30', 'bolivian', 18),
(15, 'manual', 'Ci', '7885285', 'española', '2021-10-31', 'madrid', 18),
(17, 'juan perez', 'Ci', '3423423', 'bolivia', '2022-05-05', 'Cochabamba', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeteria_categorias`
--

CREATE TABLE `cafeteria_categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafeteria_categorias`
--

INSERT INTO `cafeteria_categorias` (`id`, `nombre`, `descripcion`, `foto`) VALUES
(2, 'Cafes', '<p>Cafes</p>', 'cafeteriacategoria_210708213226.jpg'),
(4, 'lorem ipsum dolor', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit condimentum ac netus duis, quis tortor blandit faucibus vel erat venenatis taciti torquent. Vehicula parturient etiam ultricies urna lacinia mi, nec sodales ultrices ad interdum praesent, vel nulla quam tempor ligula. Nascetur vitae fusce aliquam maecenas vestibulum nibh, quam sapien litora feugiat ligula vel praesent, senectus commodo lacus montes felis.</p>', 'cafeteriacategoria_211026164859.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeteria_detalle_reserva`
--

CREATE TABLE `cafeteria_detalle_reserva` (
  `id` int(11) NOT NULL,
  `cafeteria_reserva_id` int(11) NOT NULL,
  `cafeteria_producto_id` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafeteria_detalle_reserva`
--

INSERT INTO `cafeteria_detalle_reserva` (`id`, `cafeteria_reserva_id`, `cafeteria_producto_id`, `precio`, `cantidad`) VALUES
(16, 13, 1, '20.00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeteria_detalle_reserva_productos`
--

CREATE TABLE `cafeteria_detalle_reserva_productos` (
  `id` int(11) NOT NULL,
  `cafeteria_detalle_reserva_id` int(11) NOT NULL,
  `cafeteria_producto_opciones_id` int(11) DEFAULT NULL,
  `cafeteria_producto_tamanho_id` int(11) DEFAULT NULL,
  `precio_tamanho` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafeteria_detalle_reserva_productos`
--

INSERT INTO `cafeteria_detalle_reserva_productos` (`id`, `cafeteria_detalle_reserva_id`, `cafeteria_producto_opciones_id`, `cafeteria_producto_tamanho_id`, `precio_tamanho`) VALUES
(16, 16, 2, 3, '8.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeteria_productos`
--

CREATE TABLE `cafeteria_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cafeteria_categoria_id` int(11) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafeteria_productos`
--

INSERT INTO `cafeteria_productos` (`id`, `nombre`, `cafeteria_categoria_id`, `descripcion`, `precio`, `foto`) VALUES
(1, 'Batido de Chocolate', 2, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', '20.00', 'producto_210922105924.jpg'),
(4, 'cola cola de maiz', 4, '<p>vLorem ipsum dolor sit amet consectetur adipiscing elit condimentum ac netus duis, quis tortor blandit faucibus vel erat venenatis taciti torquent. Vehicula parturient etiam ultricies urna lacinia mi, nec sodales ultrices ad interdum praesent, vel nulla quam tempor ligula. Nascetur vitae fusce aliquam maecenas vestibulum nibh, quam sapien litora feugiat ligula vel praesent, senectus commodo lacus montes felis.</p>', '43.00', 'producto_211026165410.jpg'),
(5, 'chocolate con leche', 4, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit condimentum ac netus duis, quis tortor blandit faucibus vel erat venenatis taciti torquent. Vehicula parturient etiam ultricies urna lacinia mi, nec sodales ultrices ad interdum praesent, vel nulla quam tempor ligula. Nascetur vitae fusce aliquam maecenas vestibulum nibh, quam sapien litora feugiat ligula vel praesent, senectus commodo lacus montes felis.</p>', '12.00', 'producto_211026165440.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeteria_producto_opciones`
--

CREATE TABLE `cafeteria_producto_opciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cafeteria_producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafeteria_producto_opciones`
--

INSERT INTO `cafeteria_producto_opciones` (`id`, `nombre`, `cafeteria_producto_id`) VALUES
(1, 'Batido de Chocolate', 1),
(2, 'Batido de Vainilla', 1),
(3, 'Batido de Mermelada', 1),
(6, 'lorem ipsum dolor', 4),
(7, 'lorem ipsum dolor', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafeteria_producto_tamanho`
--

CREATE TABLE `cafeteria_producto_tamanho` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cafeteria_producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafeteria_producto_tamanho`
--

INSERT INTO `cafeteria_producto_tamanho` (`id`, `nombre`, `precio`, `cafeteria_producto_id`) VALUES
(1, 'Grande', '15.00', 1),
(2, 'Mediano', '10.00', 1),
(3, 'Pequeño', '8.00', 1),
(6, 'mediano', '11.00', 4),
(8, 'tamaño mediano', '44.00', 5),
(9, 'tamaño delivery', '55.00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `tipo_documento` enum('Ci','Pasaporte') DEFAULT NULL,
  `num_documento` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `oficio` varchar(50) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `motivo_viaje` enum('Recreacion','Negocios','Salud','Otro') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `imei_celular` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `tipo_documento`, `num_documento`, `celular`, `direccion`, `ciudad`, `pais`, `oficio`, `empresa`, `telefono`, `email`, `password`, `fecha_nacimiento`, `motivo_viaje`, `foto`, `api_token`, `imei_celular`) VALUES
(15, 'Iber Arnol', 'Fernandez Mercado', NULL, NULL, '76499880', NULL, NULL, NULL, NULL, NULL, NULL, 'iber.fernandez1992@gmail.com', '$2y$10$7tWdaO1SHKIB12Io3TZAY.N90axsBZP8P2.3c9XHIl8y1S/QzONYm', NULL, NULL, NULL, 'QxMj9EbtRFLETlt7sZjwLPfVrf4e7DA59yxyCVcPW2iu6SbBYDtL2ZOWJyji', NULL),
(16, 'Paola', 'Montecinos Pardo', 'Ci', '46464546', '8888888', 'Av Pando', 'Cochabamba', 'Bolivia', 'Arquitecto', 'Otro', '9999999', 'paola@gmail.com', '$2y$10$P/HJXJNiTTcYS2kO6RNfLeyoCm16SOYDLIz/q5X4HRacZYuR78dUy', '1994-07-22', 'Otro', 'foto.jpg', '2Uv2Ubvkr4VN5aTN7VS26vTx9SAfHcS2hloGPBDwfr4ZE5ZrIpEJjVsWJHrn', '354651100023680'),
(18, 'boris ponde', 'rojas  da silv', 'Pasaporte', '8741586', '58448411', 'c.quevedo cirbumbaalcion', 'cochcbamba', 'Bolivia', 'ingeniero industrial', 'YPFB', '345333', 'distribuidoradics@gmail.com', '$2y$10$jW5wz1rOe1n3Z/kmQ8bauejZBeVlpevMLAG7Gy4ADbFyPLO61rj1m', '2021-10-11', 'Recreacion', NULL, 'DFXdn8c32b8BgiWKnu1BeEvcYh9RA3YsVKmqiA5NSKlvVXhuZLGoShmxLIO5', NULL),
(19, 'Elizabeth', 'Surco', 'Ci', '8741841', '76946560', 'Av. 6 de Marzo, nro 7575', 'los angeles - california', 'estados unidos', 'cocinera teimpo completo', 'restaurante chifa victoria', '+59122852326', 'samypantoja@gmail.com', '$2y$10$rCR7Nx5lPgQZNZrIg1Ut0uN7x2fD5tO7UOBUBStEYO1T34vv7fQ3C', '2021-10-06', 'Salud', NULL, 'XLOBENW78tTXd5sORIEfQqRoZhnWlVIoB2i2CwKoGWsWRQ0FIfUmpnqvWenn', NULL),
(20, 'selena', 'gomez silvert', 'Ci', '4114112', '7694665', 'Av. 6 de Marzo, nro 7575', 'El Alto - La Paz', 'Bolivia', 'ingeniera de alimentos', 'difashon center', '4498222', 'selena@gmail.com', '$2y$10$Vw7dGEG135sUTJmR87MziOMPdC.zTjE4xFMdM1snJzK7zQn66DgVe', '2021-09-30', 'Negocios', NULL, 'lRBpbOcoNGgywkvx33Z0a7CnV3qZ8O5R5sJWGjhpwzwv6ZQ7CkTSl5GbY152', NULL),
(21, 'roberto', 'sanjines martinez', 'Ci', '33583723', '70473373', 'Av. 6 de Marzo, nro 7575', 'El Alto - La Paz', 'Bolivia', 'abogado', 'bufete', '492450', 'roberto_33@hotmail.com', '$2y$10$5Fu1UmkWezKqa29Mj0l/FepTmacpiMWkcceMEcJ.mO/vJ/0Rw.XNS', '2021-12-16', 'Salud', NULL, 'qnaRFbOHu6lUowvxbmWhaLfvj4ofT8ZrUy0QJ4wFaG7ZWPJXd1HEXrDc2dXg', NULL),
(22, 'Lorem ipsum', 'Lorem ipsum', 'Ci', '229344', '2999934', 'Lorem ipsum dolor sit amet,', 'lorem ipsum dolor', 'españa', 'ingeniero agroindustrial', 'manaco', '4200300', 'lorem-dolor@hotmail.com', '$2y$10$vRS5c6yDCvR3aJc/d5UUz.aF.OVWbMo/QcA3m0VMYx/abvBpcwyoq', '2021-06-16', 'Recreacion', NULL, 'EKp7IJQ5bHJ5C2XvE2iaemdlzR4Z3qNzZQj1HA2OLbUt8oZYt8Jdcq2dHGv6', NULL),
(23, 'luis alberto', 'fuentes santos', 'Ci', '4000000', '5000000', 'zona sud ostedes av.america otb centenario', 'la paz ciudad maravilla', 'bolivia', 'cantante', 'hotel padilla los oropesa', '422263', 'lushito-adrianita@hotmail.com', '$2y$10$cNGeJLCXfd2BGKGugMBy3e9vy41v.YSkv9s26dt7DLTOMr/iQ2Zsi', '2003-06-03', 'Otro', NULL, 'z749eIFxDpFAN7k6Fq2b86FCOIqHQoHUwiAcwlYV6Wjf8n1Oov1Qr3ajWsXH', NULL),
(24, 'Brian', 'Fernandez Mercado', NULL, NULL, '69489025', NULL, NULL, NULL, NULL, NULL, NULL, 'nsklobuchar666@gmail.com', '$2y$10$JMppmf/68lkAxTe/gxo6VelOefYT1T8Pa7YZpApURvnKLbfGjeBBa', NULL, NULL, NULL, '7fdSKMJ0L3xxlpEwsi6C81KGWMGxZy2xw87B1YE6BpHgVkoEMq1qJBFoLk93', NULL),
(25, 'Boris Osmar', 'Ponce De Leon Fuentes', NULL, NULL, '74322394', NULL, NULL, NULL, NULL, NULL, NULL, 'borisponcedeleo@gmail.com', '$2y$10$UHImaOMWiP5UCc0.Xgy8..kYCyW2GmfrnH95yKf9OVgq/gPDvFBSi', NULL, NULL, NULL, 'CRYbjBI9ydf0Z8GgJohRzL6BPJhk30TWPbVzqb4k4Xxq66z1SvJgztVTgUtj', NULL),
(26, 'brian', 'Fernandez', NULL, NULL, '69489026', NULL, NULL, NULL, NULL, NULL, NULL, 'brian@gmail.com', '$2y$10$4/8o9Ne1CEyJtUkxnGNDl.zTPxj1wQR71c3KiBNg5v.tht3lu08aW', NULL, NULL, NULL, 'zc3IsQ9LoK6corWvQUdGO3CzyrgqGXSr9SKOxXZpYkdg1Wr42HrFpFYORiU2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `fecha` date NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `fecha`, `foto`) VALUES
(4, 'Fiesta Carnavalera 2021', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '2021-06-26', 'evento_210617171709.jpg'),
(5, 'Evento de innovacion', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '2021-06-23', 'evento_210617171740.jpg'),
(6, 'Evento Happoy Birday', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '2021-06-21', 'evento_210617171813.jpg'),
(7, 'Comadres Paceña', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '2021-07-14', 'evento_210617171844.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_cafeteria_producto`
--

CREATE TABLE `galeria_cafeteria_producto` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `cafeteria_producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria_cafeteria_producto`
--

INSERT INTO `galeria_cafeteria_producto` (`id`, `foto`, `cafeteria_producto_id`) VALUES
(1, 'foto_1_1.jpg', 1),
(2, 'foto_1_2.jpg', 1),
(3, 'foto_1_3.jpg', 1),
(4, 'foto_4_4.jpg', 4),
(6, 'foto_4_6.jpg', 4),
(7, 'foto_5_7.jpg', 5),
(8, 'foto_5_8.png', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_evento`
--

CREATE TABLE `galeria_evento` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `evento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria_evento`
--

INSERT INTO `galeria_evento` (`id`, `foto`, `evento_id`) VALUES
(1, 'foto_7_1.jpg', 7),
(2, 'foto_7_2.jpg', 7),
(3, 'foto_7_3.jpg', 7),
(4, 'foto_7_4.jpg', 7),
(5, 'foto_6_5.jpg', 6),
(6, 'foto_6_6.jpg', 6),
(7, 'foto_6_7.jpg', 6),
(8, 'foto_5_8.jpg', 5),
(9, 'foto_5_9.jpg', 5),
(10, 'foto_5_10.jpg', 5),
(11, 'foto_4_11.jpg', 4),
(12, 'foto_4_12.jpg', 4),
(13, 'foto_4_13.jpg', 4),
(14, 'foto_4_14.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_habitacion`
--

CREATE TABLE `galeria_habitacion` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `descripcion` longtext,
  `habitacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria_habitacion`
--

INSERT INTO `galeria_habitacion` (`id`, `foto`, `descripcion`, `habitacion_id`) VALUES
(3, 'foto_18_3.jpeg', NULL, 18),
(4, 'foto_18_4.jpeg', NULL, 18),
(5, 'foto_18_5.jpeg', NULL, 18),
(6, 'foto_18_6.jpeg', NULL, 18),
(7, 'foto_18_7.jpeg', NULL, 18),
(8, 'foto_19_8.jpeg', NULL, 19),
(9, 'foto_19_9.jpeg', NULL, 19),
(10, 'foto_19_10.jpeg', NULL, 19),
(11, 'foto_19_11.jpeg', NULL, 19),
(12, 'foto_19_12.jpeg', NULL, 19),
(13, 'foto_20_13.jpeg', NULL, 20),
(14, 'foto_20_14.jpeg', NULL, 20),
(15, 'foto_20_15.jpeg', NULL, 20),
(16, 'foto_20_16.jpeg', NULL, 20),
(17, 'foto_20_17.jpeg', NULL, 20),
(18, 'foto_21_18.jpeg', NULL, 21),
(19, 'foto_21_19.jpeg', NULL, 21),
(20, 'foto_21_20.jpeg', NULL, 21),
(21, 'foto_21_21.jpeg', NULL, 21),
(22, 'foto_21_22.jpeg', NULL, 21),
(23, 'foto_22_23.jpg', NULL, 22),
(24, 'foto_22_24.jpg', NULL, 22),
(25, 'foto_22_25.jpg', NULL, 22),
(26, 'foto_22_26.jpg', NULL, 22),
(27, 'foto_22_27.jpg', NULL, 22),
(28, 'foto_23_28.jpg', NULL, 23),
(29, 'foto_23_29.jpg', NULL, 23),
(30, 'foto_23_30.jpg', NULL, 23),
(31, 'foto_23_31.jpg', NULL, 23),
(32, 'foto_23_32.jpg', NULL, 23),
(33, 'foto_24_33.jpg', NULL, 24),
(34, 'foto_24_34.jpg', NULL, 24),
(35, 'foto_24_35.jpg', NULL, 24),
(36, 'foto_24_36.jpg', NULL, 24),
(37, 'foto_24_37.jpg', NULL, 24),
(38, 'foto_25_38.jpg', NULL, 25),
(39, 'foto_25_39.jpg', NULL, 25),
(40, 'foto_25_40.jpg', NULL, 25),
(41, 'foto_25_41.jpg', NULL, 25),
(42, 'foto_25_42.jpg', NULL, 25),
(43, 'foto_26_43.jpg', NULL, 26),
(44, 'foto_26_44.jpg', NULL, 26),
(45, 'foto_26_45.jpg', NULL, 26),
(46, 'foto_26_46.jpg', NULL, 26),
(47, 'foto_26_47.jpg', NULL, 26),
(48, 'foto_27_48.jpg', NULL, 27),
(49, 'foto_27_49.jpg', NULL, 27),
(50, 'foto_27_50.jpg', NULL, 27),
(51, 'foto_27_51.jpg', NULL, 27),
(52, 'foto_27_52.jpg', NULL, 27),
(53, 'foto_27_53.jpg', NULL, 27),
(54, 'foto_29_54.jpg', NULL, 29),
(55, 'foto_29_55.jpg', NULL, 29),
(56, 'foto_29_56.jpg', NULL, 29),
(57, 'foto_29_57.jpg', NULL, 29),
(58, 'foto_29_58.jpg', NULL, 29),
(59, 'foto_30_59.jpg', NULL, 30),
(60, 'foto_30_60.jpg', NULL, 30),
(61, 'foto_30_61.jpg', NULL, 30),
(62, 'foto_30_62.jpg', NULL, 30),
(63, 'foto_30_63.jpg', NULL, 30),
(64, 'foto_32_64.jpeg', NULL, 32),
(65, 'foto_32_65.jpeg', NULL, 32),
(66, 'foto_32_66.jpeg', NULL, 32),
(67, 'foto_32_67.jpeg', NULL, 32),
(68, 'foto_32_68.jpeg', NULL, 32),
(69, 'foto_33_69.jpeg', NULL, 33),
(70, 'foto_33_70.jpeg', NULL, 33),
(71, 'foto_33_71.jpeg', NULL, 33),
(72, 'foto_33_72.jpeg', NULL, 33),
(73, 'foto_33_73.jpeg', NULL, 33),
(74, 'foto_34_74.jpeg', NULL, 34),
(75, 'foto_34_75.jpeg', NULL, 34),
(76, 'foto_34_76.jpeg', NULL, 34),
(77, 'foto_34_77.jpeg', NULL, 34),
(78, 'foto_34_78.jpeg', NULL, 34),
(79, 'foto_35_79.jpeg', NULL, 35),
(80, 'foto_35_80.jpeg', NULL, 35),
(81, 'foto_35_81.jpeg', NULL, 35),
(82, 'foto_35_82.jpeg', NULL, 35),
(83, 'foto_35_83.jpeg', NULL, 35),
(84, 'foto_36_84.jpeg', NULL, 36),
(85, 'foto_36_85.jpeg', NULL, 36),
(86, 'foto_36_86.jpeg', NULL, 36),
(87, 'foto_36_87.jpeg', NULL, 36),
(88, 'foto_36_88.jpeg', NULL, 36),
(89, 'foto_37_89.jpg', NULL, 37),
(90, 'foto_37_90.jpg', NULL, 37),
(91, 'foto_37_91.jpg', NULL, 37),
(92, 'foto_37_92.jpg', NULL, 37),
(93, 'foto_37_93.jpg', NULL, 37),
(94, 'foto_38_94.jpg', NULL, 38),
(95, 'foto_38_95.jpg', NULL, 38),
(96, 'foto_38_96.jpg', NULL, 38),
(97, 'foto_38_97.jpg', NULL, 38),
(98, 'foto_38_98.jpg', NULL, 38),
(99, 'foto_39_99.jpg', NULL, 39),
(100, 'foto_39_100.jpg', NULL, 39),
(101, 'foto_39_101.jpg', NULL, 39),
(102, 'foto_39_102.jpg', NULL, 39),
(103, 'foto_39_103.jpg', NULL, 39),
(104, 'foto_40_104.jpg', NULL, 40),
(105, 'foto_40_105.jpg', NULL, 40),
(106, 'foto_40_106.jpg', NULL, 40),
(107, 'foto_40_107.jpg', NULL, 40),
(108, 'foto_40_108.jpg', NULL, 40),
(109, 'foto_41_109.jpg', NULL, 41),
(110, 'foto_41_110.jpg', NULL, 41),
(111, 'foto_41_111.jpg', NULL, 41),
(112, 'foto_41_112.jpg', NULL, 41),
(113, 'foto_41_113.jpg', NULL, 41),
(114, 'foto_42_114.jpg', NULL, 42),
(115, 'foto_42_115.jpg', NULL, 42),
(116, 'foto_42_116.jpg', NULL, 42),
(117, 'foto_42_117.jpg', NULL, 42),
(118, 'foto_42_118.jpg', NULL, 42),
(119, 'foto_43_119.jpg', NULL, 43),
(120, 'foto_43_120.jpg', NULL, 43),
(121, 'foto_43_121.jpg', NULL, 43),
(122, 'foto_43_122.jpg', NULL, 43),
(123, 'foto_43_123.jpg', NULL, 43),
(124, 'foto_44_124.jpg', NULL, 44),
(125, 'foto_44_125.jpg', NULL, 44),
(126, 'foto_44_126.jpg', NULL, 44),
(127, 'foto_44_127.jpg', NULL, 44),
(128, 'foto_44_128.jpg', NULL, 44),
(129, 'foto_45_129.jpg', NULL, 45),
(130, 'foto_45_130.jpg', NULL, 45),
(131, 'foto_45_131.jpg', NULL, 45),
(132, 'foto_45_132.jpg', NULL, 45),
(133, 'foto_45_133.jpg', NULL, 45),
(134, 'foto_45_134.jpg', NULL, 45),
(135, 'foto_46_135.jpg', NULL, 46),
(136, 'foto_46_136.jpg', NULL, 46),
(137, 'foto_46_137.jpg', NULL, 46),
(138, 'foto_46_138.jpg', NULL, 46),
(139, 'foto_46_139.jpg', NULL, 46),
(140, 'foto_47_140.jpg', NULL, 47),
(141, 'foto_47_141.jpg', NULL, 47),
(142, 'foto_47_142.jpg', NULL, 47),
(143, 'foto_47_143.jpg', NULL, 47),
(144, 'foto_47_144.jpg', NULL, 47),
(145, 'foto_48_145.jpg', NULL, 48),
(146, 'foto_48_146.jpg', NULL, 48),
(147, 'foto_48_147.jpg', NULL, 48),
(148, 'foto_48_148.jpg', NULL, 48),
(149, 'foto_48_149.jpg', NULL, 48),
(150, 'foto_49_150.jpg', NULL, 49),
(151, 'foto_49_151.jpg', NULL, 49),
(152, 'foto_49_152.jpg', NULL, 49),
(153, 'foto_49_153.jpg', NULL, 49),
(154, 'foto_49_154.jpg', NULL, 49),
(155, 'foto_50_155.jpeg', NULL, 50),
(156, 'foto_50_156.jpeg', NULL, 50),
(157, 'foto_50_157.jpeg', NULL, 50),
(158, 'foto_50_158.jpeg', NULL, 50),
(159, 'foto_50_159.jpeg', NULL, 50),
(160, 'foto_51_160.jpeg', NULL, 51),
(161, 'foto_51_161.jpeg', NULL, 51),
(162, 'foto_51_162.jpeg', NULL, 51),
(163, 'foto_51_163.jpeg', NULL, 51),
(164, 'foto_51_164.jpeg', NULL, 51),
(165, 'foto_52_165.jpeg', NULL, 52),
(166, 'foto_52_166.jpeg', NULL, 52),
(167, 'foto_52_167.jpeg', NULL, 52),
(168, 'foto_52_168.jpeg', NULL, 52),
(169, 'foto_52_169.jpeg', NULL, 52),
(170, 'foto_53_170.jpeg', NULL, 53),
(171, 'foto_53_171.jpeg', NULL, 53),
(172, 'foto_53_172.jpeg', NULL, 53),
(173, 'foto_53_173.jpeg', NULL, 53),
(174, 'foto_53_174.jpeg', NULL, 53),
(175, 'foto_54_175.jpeg', NULL, 54),
(176, 'foto_54_176.jpeg', NULL, 54),
(177, 'foto_54_177.jpeg', NULL, 54),
(178, 'foto_54_178.jpeg', NULL, 54),
(179, 'foto_54_179.jpeg', NULL, 54),
(180, 'foto_55_180.jpeg', NULL, 55),
(181, 'foto_55_181.jpeg', NULL, 55),
(182, 'foto_55_182.jpeg', NULL, 55),
(183, 'foto_55_183.jpeg', NULL, 55),
(184, 'foto_55_184.jpeg', NULL, 55),
(185, 'foto_56_185.jpeg', NULL, 56),
(186, 'foto_56_186.jpeg', NULL, 56),
(187, 'foto_56_187.jpeg', NULL, 56),
(188, 'foto_56_188.jpeg', NULL, 56),
(189, 'foto_56_189.jpeg', NULL, 56),
(190, 'foto_57_190.jpeg', NULL, 57),
(191, 'foto_57_191.jpeg', NULL, 57),
(192, 'foto_57_192.jpeg', NULL, 57),
(193, 'foto_57_193.jpeg', NULL, 57),
(194, 'foto_57_194.jpeg', NULL, 57),
(195, 'foto_58_195.jpeg', NULL, 58),
(196, 'foto_58_196.jpeg', NULL, 58),
(197, 'foto_58_197.jpeg', NULL, 58),
(198, 'foto_58_198.jpeg', NULL, 58),
(199, 'foto_58_199.jpeg', NULL, 58),
(200, 'foto_59_200.jpeg', NULL, 59),
(201, 'foto_59_201.jpeg', NULL, 59),
(202, 'foto_59_202.jpeg', NULL, 59),
(203, 'foto_59_203.jpeg', NULL, 59),
(204, 'foto_59_204.jpeg', NULL, 59),
(205, 'foto_60_205.jpeg', NULL, 60),
(206, 'foto_60_206.jpeg', NULL, 60),
(207, 'foto_60_207.jpeg', NULL, 60),
(208, 'foto_60_208.jpeg', NULL, 60),
(209, 'foto_60_209.jpeg', NULL, 60),
(210, 'foto_61_210.jpeg', NULL, 61),
(211, 'foto_61_211.jpeg', NULL, 61),
(212, 'foto_61_212.jpeg', NULL, 61),
(213, 'foto_61_213.jpeg', NULL, 61),
(214, 'foto_61_214.jpeg', NULL, 61),
(215, 'foto_62_215.jpeg', NULL, 62),
(216, 'foto_62_216.jpeg', NULL, 62),
(217, 'foto_62_217.jpeg', NULL, 62),
(218, 'foto_62_218.jpeg', NULL, 62),
(219, 'foto_62_219.jpeg', NULL, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_hotel`
--

CREATE TABLE `galeria_hotel` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `descripcion` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria_hotel`
--

INSERT INTO `galeria_hotel` (`id`, `foto`, `descripcion`) VALUES
(3, 'foto_210617114505.png', NULL),
(4, 'foto_210617114516.png', NULL),
(5, 'foto_211027163107.jfif', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_lugares_turisticos`
--

CREATE TABLE `galeria_lugares_turisticos` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `descripcion` longtext,
  `lugar_turistico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria_lugares_turisticos`
--

INSERT INTO `galeria_lugares_turisticos` (`id`, `foto`, `descripcion`, `lugar_turistico_id`) VALUES
(11, 'foto_2_11.jpg', NULL, 2),
(12, 'foto_2_12.jpg', NULL, 2),
(13, 'foto_2_13.jpg', NULL, 2),
(15, 'foto_2_15.jpg', NULL, 2),
(17, 'foto_2_17.jpg', NULL, 2),
(20, 'foto_2_20.jpg', NULL, 2),
(21, 'foto_3_21.jpg', NULL, 3),
(22, 'foto_3_22.jpg', NULL, 3),
(23, 'foto_3_23.jpg', NULL, 3),
(24, 'foto_3_24.jpg', NULL, 3),
(25, 'foto_3_25.jpg', NULL, 3),
(26, 'foto_3_26.jpg', NULL, 3),
(27, 'foto_3_27.jpg', NULL, 3),
(28, 'foto_3_28.jpg', NULL, 3),
(29, 'foto_4_29.jpg', NULL, 4),
(30, 'foto_4_30.jpg', NULL, 4),
(31, 'foto_4_31.jpg', NULL, 4),
(32, 'foto_4_32.jpg', NULL, 4),
(33, 'foto_4_33.jpg', NULL, 4),
(34, 'foto_4_34.jpg', NULL, 4),
(35, 'foto_4_35.jpg', NULL, 4),
(36, 'foto_4_36.jpg', NULL, 4),
(37, 'foto_5_37.jpg', NULL, 5),
(38, 'foto_5_38.jpg', NULL, 5),
(39, 'foto_5_39.jpg', NULL, 5),
(40, 'foto_5_40.jpg', NULL, 5),
(41, 'foto_5_41.jpg', NULL, 5),
(42, 'foto_5_42.jpg', NULL, 5),
(43, 'foto_5_43.jpg', NULL, 5),
(44, 'foto_5_44.jpg', NULL, 5),
(45, 'foto_6_45.jpg', NULL, 6),
(46, 'foto_6_46.jpg', NULL, 6),
(47, 'foto_6_47.jpg', NULL, 6),
(48, 'foto_6_48.jpg', NULL, 6),
(49, 'foto_6_49.jpg', NULL, 6),
(50, 'foto_6_50.jpg', NULL, 6),
(51, 'foto_6_51.jpg', NULL, 6),
(52, 'foto_6_52.jpg', NULL, 6),
(53, 'foto_7_53.jpg', NULL, 7),
(54, 'foto_7_54.jpg', NULL, 7),
(55, 'foto_7_55.jpg', NULL, 7),
(56, 'foto_7_56.jpg', NULL, 7),
(57, 'foto_7_57.jpg', NULL, 7),
(58, 'foto_7_58.jpg', NULL, 7),
(59, 'foto_7_59.jpg', NULL, 7),
(60, 'foto_7_60.jpg', NULL, 7),
(61, 'foto_8_61.jpg', NULL, 8),
(63, 'foto_8_63.jpg', NULL, 8),
(64, 'foto_8_64.jpg', NULL, 8),
(65, 'foto_8_65.jpg', NULL, 8),
(66, 'foto_8_66.jpg', NULL, 8),
(67, 'foto_8_67.jpg', NULL, 8),
(68, 'foto_9_68.jpg', NULL, 9),
(69, 'foto_9_69.jpg', NULL, 9),
(70, 'foto_9_70.jpg', NULL, 9),
(71, 'foto_9_71.jpg', NULL, 9),
(72, 'foto_9_72.jpg', NULL, 9),
(74, 'foto_9_74.jpg', NULL, 9),
(75, 'foto_10_75.jpg', NULL, 10),
(76, 'foto_10_76.jpg', NULL, 10),
(77, 'foto_10_77.jpg', NULL, 10),
(78, 'foto_10_78.jpg', NULL, 10),
(79, 'foto_10_79.jpg', NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_restaurante_producto`
--

CREATE TABLE `galeria_restaurante_producto` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `restaurante_producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria_restaurante_producto`
--

INSERT INTO `galeria_restaurante_producto` (`id`, `foto`, `restaurante_producto_id`) VALUES
(1, 'foto_4_1.jpg', 4),
(2, 'foto_4_2.jpg', 4),
(3, 'foto_5_3.jpg', 5),
(4, 'foto_5_4.jpg', 5),
(5, 'foto_5_5.jpg', 5),
(6, 'foto_6_6.jpg', 6),
(7, 'foto_6_7.jpg', 6),
(8, 'foto_6_8.jpg', 6),
(9, 'foto_7_9.jpg', 7),
(10, 'foto_7_10.jpg', 7),
(11, 'foto_7_11.jpg', 7),
(12, 'foto_7_12.jpg', 7),
(13, 'foto_3_13.jpg', 3),
(14, 'foto_3_14.jpg', 3),
(15, 'foto_3_15.jpg', 3),
(16, 'foto_2_16.jpg', 2),
(17, 'foto_2_17.jpg', 2),
(18, 'foto_2_18.jpg', 2),
(19, 'foto_2_19.jpg', 2),
(20, 'foto_8_20.jpg', 8),
(21, 'foto_8_21.jpg', 8),
(22, 'foto_8_22.jpg', 8),
(23, 'foto_8_23.jpg', 8),
(24, 'foto_9_24.jpg', 9),
(25, 'foto_9_25.jpg', 9),
(26, 'foto_9_26.jpg', 9),
(27, 'foto_9_27.jpg', 9),
(28, 'foto_10_28.jpg', 10),
(29, 'foto_10_29.jpeg', 10),
(30, 'foto_10_30.jpg', 10),
(31, 'foto_11_31.jpg', 11),
(32, 'foto_11_32.jpg', 11),
(33, 'foto_11_33.jpg', 11),
(34, 'foto_11_34.jpg', 11),
(35, 'foto_12_35.jpg', 12),
(36, 'foto_12_36.jpg', 12),
(37, 'foto_12_37.jpg', 12),
(38, 'foto_12_38.jpg', 12),
(39, 'foto_13_39.jpg', 13),
(40, 'foto_13_40.jpg', 13),
(41, 'foto_13_41.jpg', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `num_habitacion` varchar(50) NOT NULL DEFAULT '',
  `habitacion_categoria_id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `capacidad_minima` varchar(50) NOT NULL,
  `capacidad_maxima` varchar(50) NOT NULL,
  `estado` enum('Disponible','Ocupado','Reservado','Limpieza') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `nombre`, `descripcion`, `num_habitacion`, `habitacion_categoria_id`, `foto`, `precio`, `capacidad_minima`, `capacidad_maxima`, `estado`) VALUES
(18, 'Suit Estándar', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', 'SE1', 10, 'habitacion_210617121120.jpeg', '430.00', '2', '8', 'Ocupado'),
(19, 'Suit Estándar 1', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', 'SE2', 10, 'habitacion_210617122518.jpeg', '450.00', '2', '8', 'Reservado'),
(20, 'Suit Estándar 3', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE3', 10, 'habitacion_210617122750.jpeg', '450.00', '2', '5', 'Disponible'),
(21, 'Suit Estándar 4', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE4', 10, 'habitacion_210617123220.jpeg', '450.00', '2', '8', 'Disponible'),
(22, 'Doble Estandar 01', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE01', 11, 'habitacion_210617123725.jpg', '450.00', '2', '5', 'Reservado'),
(23, 'Doble Estandar 02', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE02', 11, 'habitacion_210617123842.jpg', '400.00', '2', '8', 'Reservado'),
(24, 'Doble Estandar 03', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE03', 11, 'habitacion_210617124043.jpg', '450.00', '2', '8', 'Reservado'),
(25, 'Doble Estandar 04', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE04', 11, 'habitacion_210617124158.jpg', '450.00', '2', '8', 'Disponible'),
(26, 'Doble Estandar 05', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE05', 11, 'habitacion_210617124309.jpg', '450.00', '2', '5', 'Disponible'),
(27, 'Doble Superior 01', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE-1', 12, 'habitacion_210617125049.jpg', '450.00', '2', '8', 'Disponible'),
(28, 'Doble Superior 02', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE-2', 12, 'habitacion_210617132719.jpg', '400.00', '2', '8', 'Disponible'),
(29, 'Doble Superior 03', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE-3', 12, 'habitacion_210617133155.jpg', '450.00', '2', '8', 'Disponible'),
(30, 'Doble Superior 04', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE-4', 12, 'habitacion_210617133355.jpg', '450.00', '2', '8', 'Disponible'),
(31, 'Doble Superior 05', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE-5', 12, 'habitacion_210617133448.jpg', '450.00', '2', '8', 'Disponible'),
(32, 'Triple Estandar 1', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE/1', 13, 'habitacion_210617133710.jpeg', '450.00', '2', '7', 'Disponible'),
(33, 'Triple Estandar 2', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE/2', 13, 'habitacion_210617134003.jpeg', '450.00', '2', '3', 'Disponible'),
(34, 'Triple Estandar 3', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE/3', 13, 'habitacion_210617134150.jpeg', '450.00', '2', '6', 'Disponible'),
(35, 'Triple Estandar 4', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE/4', 13, 'habitacion_210617134324.jpeg', '450.00', '3', '8', 'Disponible'),
(36, 'Triple Estandar 5', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE/5', 13, 'habitacion_210617134458.jpeg', '450.00', '2', '8', 'Disponible'),
(37, 'Matrimonial Superior 1', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=1', 14, 'habitacion_210617135115.jpg', '450.00', '3', '8', 'Disponible'),
(38, 'Matrimonial Superior 2', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=2', 14, 'habitacion_210617135702.jpg', '450.00', '3', '7', 'Disponible'),
(39, 'Matrimonial Superior 3', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=3', 14, 'habitacion_210617140601.jpg', '340.00', '2', '6', 'Disponible'),
(40, 'Matrimonial Superior 4', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=4', 14, 'habitacion_210617140811.jpg', '450.00', '2', '8', 'Disponible'),
(41, 'Matrimonial Superior 5', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=5', 14, 'habitacion_210617141015.jpg', '450.00', '2', '8', 'Disponible'),
(42, 'Matrimonial Superior 6', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=6', 14, 'habitacion_210617141151.jpg', '450.00', '3', '8', 'Disponible'),
(43, 'Matrimonial Superior 7', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=7', 14, 'habitacion_210617141308.jpg', '450.00', '2', '8', 'Disponible'),
(44, 'Matrimonial Superior 8', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=8', 14, 'habitacion_210617141524.jpg', '400.00', '2', '5', 'Disponible'),
(45, 'Matrimonial Superior 9', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=9', 14, 'habitacion_210617141655.jpg', '450.00', '2', '6', 'Disponible'),
(46, 'Matrimonial Superior 10', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=10', 14, 'habitacion_210617142256.jpg', '450.00', '2', '5', 'Disponible'),
(47, 'Matrimonial Superior 11', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=11', 14, 'habitacion_210617142442.jpg', '450.00', '2', '6', 'Disponible'),
(48, 'Matrimonial Superior 12', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=12', 14, 'habitacion_210617142559.jpg', '450.00', '2', '8', 'Disponible'),
(49, 'Matrimonial Superior 13', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE=13', 14, 'habitacion_210617142728.jpg', '450.00', '2', '6', 'Disponible'),
(50, 'Matrimonial Estándar 1', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--1', 15, 'habitacion_210617142950.jpeg', '450.00', '2', '7', 'Reservado'),
(51, 'Matrimonial Estándar 2', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--2', 15, 'habitacion_210617143201.jpeg', '450.00', '2', '5', 'Disponible'),
(52, 'Matrimonial Estándar 3', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--3', 15, 'habitacion_210617143408.jpeg', '450.00', '2', '6', 'Disponible'),
(53, 'Matrimonial Estándar 4', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--4', 15, 'habitacion_210617143532.jpeg', '450.00', '2', '6', 'Disponible'),
(54, 'Matrimonial Estándar 5', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--5', 15, 'habitacion_210617143835.jpeg', '450.00', '2', '8', 'Disponible'),
(55, 'Matrimonial Estándar 6', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--6', 15, 'habitacion_210617144409.jpeg', '450.00', '2', '6', 'Disponible'),
(56, 'Matrimonial Estándar 7', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--7', 15, 'habitacion_210617144611.jpeg', '450.00', '2', '7', 'Disponible'),
(57, 'Matrimonial Estándar 8', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--8', 15, 'habitacion_210617144821.jpeg', '450.00', '2', '7', 'Disponible'),
(58, 'Matrimonial Estándar 9', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--9', 15, 'habitacion_210617145550.jpeg', '450.00', '2', '8', 'Disponible'),
(59, 'Matrimonial Estándar 10', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--10', 15, 'habitacion_210617145751.jpeg', '450.00', '2', '7', 'Disponible'),
(60, 'Matrimonial Estándar 11', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--11', 15, 'habitacion_210617150049.jpeg', '450.00', '2', '8', 'Disponible'),
(61, 'Matrimonial Estándar 12', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--12', 15, 'habitacion_210617150207.jpeg', '450.00', '2', '8', 'Disponible'),
(62, 'Matrimonial Estándar 13', '<p>Lorem ipsum dolor sit amet consectetur adipiscing, elit pulvinar nunc tincidunt primis ullamcorper habitasse, purus quis montes volutpat conubia. Pretium fames enim parturient tempus vitae diam, feugiat est vehicula in vulputate non at, lacus nunc imperdiet mattis sem. Dis duis iaculis ridiculus porta integer ligula odio viverra venenatis pretium imperdiet, mattis posuere suspendisse sem metus fames non lobortis urna pellentesque, ante praesent mollis senectus eget laoreet mus maecenas phasellus pharetra.</p>', 'SE--13', 15, 'habitacion_210617150452.jpeg', '450.00', '2', '4', 'Disponible'),
(64, 'Habitacion para dos personas', '<p>Lorem salutandi eu mea, eam in soleat iriure assentior. Tamquam lobortis id qui. Ea sanctus democritum mei, per eu alterum electram adversarium. Ea vix probo dicta iuvaret, posse epicurei suavitate eam an, nam et vidit menandri. Ut his accusata petentium.</p>\r\n\r\n<p>Lorem salutandi eu mea, eam in soleat iriure assentior. Tamquam lobortis id qui. Ea sanctus democritum mei, per eu alterum electram adversarium. Ea vix probo dicta iuvaret, posse epicurei suavitate eam an, nam et vidit menandri. Ut his accusata petentium.</p>', '383', 16, 'habitacion_211022165731.jfif', '1200.00', '1', '2', 'Ocupado'),
(66, 'HABITACION DE LUJO', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', '450', 18, 'habitacion_211027172243.jpg', '25000.00', '2', '2', 'Disponible'),
(67, 'Erick Bustamante', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', '550', 18, 'habitacion_211025161306.jfif', '322.00', '3', '3', 'Ocupado'),
(68, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', '200', 18, 'habitacion_211025161625.jfif', '450.00', '2', '2', 'Reservado'),
(69, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', '201', 18, 'habitacion_211025161712.jfif', '121.00', '2', '2', 'Limpieza'),
(70, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', '900', 18, 'habitacion_211025161933.jfif', '4.00', '4', '1', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion_categorias`
--

CREATE TABLE `habitacion_categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion_categorias`
--

INSERT INTO `habitacion_categorias` (`id`, `nombre`, `descripcion`, `foto`) VALUES
(10, 'Suit Estándar', '<p>Suit Est&aacute;ndar</p>', 'habitacioncategoria_210922181138.png'),
(11, 'Doble Estándar', '<p>Doble Est&aacute;ndar</p>', 'habitacioncategoria_210922181130.png'),
(12, 'Doble Superior', '<p>Doble Superior</p>', 'habitacioncategoria_210922181119.png'),
(13, 'Triple Estándar', '<p>Triple Est&aacute;ndar</p>', 'habitacioncategoria_210922181109.png'),
(14, 'Matrimonial Superior', '<p>Matrimonial Superior</p>', 'habitacioncategoria_210922181100.png'),
(15, 'Matrimonial Estándar', '<p>Matrimonial Est&aacute;ndar</p>', 'habitacioncategoria_210922181050.png'),
(16, 'HABITACION SUPER VIP 2.0', '<p>Lorem salutandi eu mea, eam in soleat iriure assentior. Tamquam lobortis id qui. Ea sanctus democritum mei, per eu alterum electram adversarium. Ea vix probo dicta iuvaret, posse epicurei suavitate eam an, nam et vidit menandri. Ut his accusata petentium.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem salutandi eu mea, eam in soleat iriure assentior. Tamquam lobortis id qui. Ea sanctus democritum mei, per eu alterum electram adversarium. Ea vix probo dicta iuvaret, posse epicurei suavitate eam an, nam et vidit menandri. Ut his accusata petentium.</p>', 'habitacioncategoria_211022163011.jfif'),
(18, 'habitaciones imperdibles', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', 'habitacioncategoria_211025161027.jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion_frigobar`
--

CREATE TABLE `habitacion_frigobar` (
  `id` int(11) NOT NULL,
  `habitacion_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion_frigobar`
--

INSERT INTO `habitacion_frigobar` (`id`, `habitacion_id`, `nombre`, `precio`) VALUES
(1, 15, 'Coca Cola', '10.00'),
(2, 62, 'Paceña', '12.00'),
(3, 63, 'lata de maltin', '12.00'),
(4, 63, 'cola cola', '5.00'),
(5, 63, 'agua', '6.00'),
(6, 63, 'chocolate blanco', '1.00'),
(7, 64, 'agua con gas', '3.00'),
(8, 64, 'chocolate caliente', '5.00'),
(9, 64, 'sprite', '5.00'),
(10, 64, 'fanta', '5.00'),
(11, 70, 'fdsfs', '23.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedajes`
--

CREATE TABLE `hospedajes` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha_checkin` datetime NOT NULL,
  `fecha_checkout` datetime NOT NULL,
  `niños` int(11) NOT NULL,
  `adultos` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `precio_promocion` decimal(11,2) DEFAULT NULL,
  `habitacion_id` int(11) NOT NULL,
  `estado` enum('Ocupado','Desocupado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedajes`
--

INSERT INTO `hospedajes` (`id`, `cliente_id`, `fecha_checkin`, `fecha_checkout`, `niños`, `adultos`, `precio`, `precio_promocion`, `habitacion_id`, `estado`) VALUES
(11, 15, '2022-05-06 15:05:00', '2022-05-09 15:05:00', 2, 1, '4.00', NULL, 70, 'Desocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedaje_detalle_acompanantes`
--

CREATE TABLE `hospedaje_detalle_acompanantes` (
  `id` int(11) NOT NULL,
  `hospedaje_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `num_documento` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedaje_detalle_acompanantes`
--

INSERT INTO `hospedaje_detalle_acompanantes` (`id`, `hospedaje_id`, `nombre`, `num_documento`, `nacionalidad`, `ciudad`) VALUES
(1, 2, 'gdfgdfgfd', '65465465464', 'gfd', 'gdfgdgfd'),
(2, 3, 'gdfgdfgfd', '65465465464', 'gfd', 'gdfgdgfd'),
(3, 11, 'Boris ponce', '3423423', 'bolivia', 'Cochabamba'),
(4, 11, 'juan perez', '3423423', 'bolivia', 'Cochabamba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedaje_detalle_frigobar`
--

CREATE TABLE `hospedaje_detalle_frigobar` (
  `id` int(11) NOT NULL,
  `hospedaje_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedaje_detalle_frigobar`
--

INSERT INTO `hospedaje_detalle_frigobar` (`id`, `hospedaje_id`, `nombre`, `precio`, `cantidad`) VALUES
(1, 11, 'fdsfs', '23.00', 2),
(2, 11, 'fdsfs', '23.00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedaje_detalle_transporte`
--

CREATE TABLE `hospedaje_detalle_transporte` (
  `id` int(11) NOT NULL,
  `hospedaje_id` int(11) NOT NULL,
  `transporte_id` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares_turisticos`
--

CREATE TABLE `lugares_turisticos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio_recorrido` decimal(11,2) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `tipo` enum('Turismo','Gastronomia') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugares_turisticos`
--

INSERT INTO `lugares_turisticos` (`id`, `nombre`, `descripcion`, `precio_recorrido`, `lat`, `lng`, `tipo`, `foto`) VALUES
(2, 'Plaza Principal', '<p>El Cristo de la Concordia es una estatua monumental de Jesucristo, que se encuentra sobre el cerro de San Pedro en la ciudad de Cochabamba, Bolivia, a una altura de 265 metros sobre la ciudad. La estatua mide 34,20 metros de altura, sobre un pedestal de 6,24 metros, con una altura total de 40,44 m.</p>', '10.00', '-17.400799264650537', '-66.12142251973228', 'Turismo', 'lugar_210614163925.jpg'),
(3, 'El palacio portales', '<p>El Palacio Portales es un edificio ubicado en la ciudad de Cochabamba, Bolivia. Fue construido entre los a&ntilde;os 1915 y 1927 en base en un dise&ntilde;o del arquitecto Eugene Bliault. Concebido como residencia de Sim&oacute;n Iturri Pati&ntilde;o nunca fue habitado por la familia.</p>', '120.00', '-17.374875208493542', '-66.15282582287864', 'Turismo', 'lugar_210614165107.jpg'),
(4, 'Plaza 14 de septiembre', '<p>La Plaza 14 de Septiembre es una plaza ubicada en la ciudad de Cochabamba, Bolivia. Corresponde a la tipolog&iacute;a de plaza mayor o de armas, espacios urbanos caracter&iacute;sticos de los trazados hispanoamericanos, se halla flanqueada por los edificios que representaban el poder estatal y religioso en la ciudad.</p>', '5.00', '-17.393878351608212', '-66.1569778824337', 'Turismo', 'lugar_210614165708.jpg'),
(5, 'convento Museo Santa Teresa', '<p>La Iglesia y Convento de Santa Teresa de Cochabamba es un conjunto conventual en Cochabamba, Bolivia. Data del siglo XVIII. Est&aacute; ubicado en la Plaza del Granado, centro hist&oacute;rico de Cochabamba. HISTORIA DE LA FUNDACI&Oacute;N DEL CONVENTO DE CARMELITAS DESCALZAS DE COCHABAMBA</p>', '70.00', '-17.38995706718855', '-66.15805076603965', 'Turismo', 'lugar_210614170430.jpg'),
(6, 'Casa de Campo', '<p>Las mejores comidas exquicitas al servicio de nuestros cleintes, es la mejor manera de disfrutar y compatir en familia, tenemos la mejor comida cochala para disfrutar en familia.</p>', '248.00', '-17.378735381625237', '-66.15154909138755', 'Gastronomia', 'lugar_210614171606.jpg'),
(7, 'Kansas Gril & Bar', '<p>La mejor comida internacional solo lo cuentras en&nbsp;&nbsp;Kansas Gril &amp; Bar, un lugar agradable para compartir con amigos y familia&nbsp;</p>', '250.00', '-17.392598568283628', '-66.15882324223594', 'Gastronomia', 'lugar_210614173244.jpg'),
(8, 'Marvinos Restaurant', '<p>Lo mejor de nuestra gastronomia cochala en un solo lugar Marvinos restaurant, compartoe con la famili y amigos con nuestros tradicionales platos.&nbsp;</p>', '140.00', '-17.374721619019724', '-66.15475701336936', 'Gastronomia', 'lugar_210614174004.jpg'),
(9, 'Las moras Parrilla restaurant', '<p>Las moras un lugar con la mejor comida a la parrilla, con los mejores platos, ven y disfrta con tu famili y amigos en un ambiente comodo, celebramos cumplea&ntilde;os y aconcecimeintos especiales.</p>', '200.00', '-17.376083441194645', '-66.1499183083065', 'Gastronomia', 'lugar_210614174953.jpg'),
(10, 'Tuesday', '<p>En tuesday puedes compartir de formas diferentes.&nbsp;</p>', '100.00', '-17.373349547337863', '-66.15216063504295', 'Gastronomia', 'lugar_210614180607.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `foto` varchar(50) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `habitacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `nombre`, `descripcion`, `foto`, `precio`, `estado`, `habitacion_id`) VALUES
(1, 'Promocion hallowen', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit condimentum ac netus duis, quis tortor blandit faucibus vel erat venenatis taciti torquent. Vehicula parturient etiam ultricies urna lacinia mi, nec sodales ultrices ad interdum praesent, vel nulla quam tempor ligula. Nascetur vitae fusce aliquam maecenas vestibulum nibh, quam sapien litora feugiat ligula vel praesent, senectus commodo lacus montes felis.</p>', 'promocion_211026173229.jpg', '2300.00', 'Activo', 18),
(2, 'lorem ipsum dolor', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit condimentum ac netus duis, quis tortor blandit faucibus vel erat venenatis taciti torquent. Vehicula parturient etiam ultricies urna lacinia mi, nec sodales ultrices ad interdum praesent, vel nulla quam tempor ligula. Nascetur vitae fusce aliquam maecenas vestibulum nibh, quam sapien litora feugiat ligula vel praesent, senectus commodo lacus montes felis.</p>', 'promocion_211026173315.jpg', '2200.00', 'Activo', 18),
(3, 'Promocion carnacalero', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit condimentum ac netus duis, quis tortor blandit faucibus vel erat venenatis taciti torquent. Vehicula parturient etiam ultricies urna lacinia mi, nec sodales ultrices ad interdum praesent, vel nulla quam tempor ligula. Nascetur vitae fusce aliquam maecenas vestibulum nibh, quam sapien litora feugiat ligula vel praesent, senectus commodo lacus montes felis.</p>', 'promocion_211026174032.jpg', '12.00', 'Activo', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL,
  `adultos` int(11) NOT NULL,
  `niños` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `habitacion_id` int(11) NOT NULL,
  `estado` enum('Reservado','Activo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `checkin`, `checkout`, `adultos`, `niños`, `cliente_id`, `habitacion_id`, `estado`) VALUES
(27, '2022-05-06 15:05:00', '2022-05-09 15:05:00', 1, 2, 15, 70, 'Activo'),
(28, '2022-05-17 00:00:00', '2022-05-19 00:00:00', 3, 2, 26, 24, 'Reservado'),
(29, '2022-06-06 00:00:00', '2022-06-07 00:00:00', 2, 0, 15, 19, 'Reservado'),
(30, '2022-06-06 17:16:00', '2022-06-06 17:16:00', 2, 1, 15, 22, 'Reservado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_cafeteria`
--

CREATE TABLE `reservas_cafeteria` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `hospedaje_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas_cafeteria`
--

INSERT INTO `reservas_cafeteria` (`id`, `cliente_id`, `hospedaje_id`, `fecha`, `hora`, `total`) VALUES
(13, NULL, 11, '2022-05-06', '15:09:20', '56.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_lugares_turisticos`
--

CREATE TABLE `reservas_lugares_turisticos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `lugar_turistico_id` int(11) NOT NULL,
  `estado` enum('Reservado','Activo') NOT NULL,
  `hospedaje_id` int(11) DEFAULT NULL,
  `precio` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas_lugares_turisticos`
--

INSERT INTO `reservas_lugares_turisticos` (`id`, `cliente_id`, `fecha`, `lugar_turistico_id`, `estado`, `hospedaje_id`, `precio`) VALUES
(9, 15, '2022-05-06', 2, 'Activo', 11, '10.00'),
(10, 15, '2022-05-06', 6, 'Activo', NULL, '248.00'),
(11, 15, '2022-05-05', 7, 'Activo', NULL, '250.00'),
(12, NULL, '2022-05-05', 2, 'Reservado', 11, '10.00'),
(13, 15, '2022-05-05', 2, 'Activo', 11, '10.00'),
(14, 15, '2022-06-06', 2, 'Activo', NULL, '10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_promocion`
--

CREATE TABLE `reservas_promocion` (
  `id` int(11) NOT NULL,
  `promocion_id` int(11) NOT NULL,
  `habitacion_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL,
  `adultos` int(11) NOT NULL,
  `niños` int(11) NOT NULL,
  `estado` enum('Reservado','Activo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_restaurante`
--

CREATE TABLE `reservas_restaurante` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `hospedaje_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante_categorias`
--

CREATE TABLE `restaurante_categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurante_categorias`
--

INSERT INTO `restaurante_categorias` (`id`, `nombre`, `descripcion`, `foto`) VALUES
(2, 'DESAYUNOS AMERICANOS', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit condimentum ac netus duis, quis tortor blandit faucibus vel erat venenatis taciti torquent. Vehicula parturient etiam ultricies urna lacinia mi, nec sodales ultrices ad interdum praesent, vel nulla quam tempor ligula. Nascetur vitae fusce aliquam maecenas vestibulum nibh, quam sapien litora feugiat ligula vel praesent, senectus commodo lacus montes felis.</p>', 'restaurantecategoria_210617124226.jpeg'),
(3, 'Almuerzo', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo&nbsp;</p>', 'restaurantecategoria_210617154143.jpg'),
(4, 'Cena', '<p>sbsjkgnisuunqurnfwefqweirujtiejinasdodfoqjriojqiojweiojweiojrweiofjiowejfiowefiowerjfiowerj eiogjjio jgioj iojgiojio jio gjojiojfwjfoiwjfiowjfioj gwrfw&nbsp;</p>', 'restaurantecategoria_210617154856.jpg'),
(5, 'Postres', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo&nbsp;</p>', 'restaurantecategoria_210617155144.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante_detalle_reserva`
--

CREATE TABLE `restaurante_detalle_reserva` (
  `id` int(11) NOT NULL,
  `restaurante_reserva_id` int(11) NOT NULL,
  `restaurante_producto_id` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante_detalle_reserva_productos`
--

CREATE TABLE `restaurante_detalle_reserva_productos` (
  `id` int(11) NOT NULL,
  `restaurante_detalle_reserva_id` int(11) NOT NULL,
  `restaurante_producto_opciones_id` int(11) DEFAULT NULL,
  `restaurante_producto_tamanho_id` int(11) DEFAULT NULL,
  `precio_tamanho` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante_productos`
--

CREATE TABLE `restaurante_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `restaurante_categoria_id` int(11) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurante_productos`
--

INSERT INTO `restaurante_productos` (`id`, `nombre`, `restaurante_categoria_id`, `descripcion`, `precio`, `foto`) VALUES
(2, 'Tortitas Vips', 2, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '20.00', 'producto_210617124333.jpg'),
(3, 'Pancakes', 2, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '20.00', 'producto_210617124613.jpg'),
(4, 'Flan de leche', 5, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo&nbsp;</p>', '15.00', 'producto_210617155253.jpg'),
(5, 'Dulce de leche', 5, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '14.00', 'producto_210617161009.jpg'),
(6, 'Tiramizu', 5, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '4.00', 'producto_210617162517.jpg'),
(7, 'Revuelto de huevos con tocino', 2, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '12.00', 'producto_210617162653.jpg'),
(8, 'Pique macho', 3, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '80.00', 'producto_210617163143.jpg'),
(9, 'Silpancho', 3, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '20.00', 'producto_210617163238.jpg'),
(10, 'Saisi Tarijeño', 3, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '25.00', 'producto_210617163322.jpg'),
(11, 'Costillas de cerdo aumadas', 4, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '35.00', 'producto_210617163435.jpg'),
(12, 'Plato de Picaña', 4, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '40.00', 'producto_210617163523.jpg'),
(13, 'Pollo a la brasa', 4, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '23.00', 'producto_210617163610.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante_producto_opciones`
--

CREATE TABLE `restaurante_producto_opciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `restaurante_producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurante_producto_opciones`
--

INSERT INTO `restaurante_producto_opciones` (`id`, `nombre`, `restaurante_producto_id`) VALUES
(4, 'Guarniciones Extra', 10),
(5, 'Dulce de leche', 6),
(6, 'Limón', 6),
(7, 'Salsa Extra', 13),
(8, 'Extra Papas', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante_producto_tamanho`
--

CREATE TABLE `restaurante_producto_tamanho` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `restaurante_producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurante_producto_tamanho`
--

INSERT INTO `restaurante_producto_tamanho` (`id`, `nombre`, `precio`, `restaurante_producto_id`) VALUES
(3, 'Pequeño', '15.00', 2),
(4, 'Mediano', '17.00', 2),
(5, 'Mediano', '15.00', 3),
(6, 'Pequeño', '12.00', 3),
(7, 'Grande', '25.00', 3),
(8, 'Grande', '25.00', 10),
(9, 'Grande', '10.50', 6),
(10, 'Mediano', '7.00', 6),
(11, 'Pequeño', '5.00', 6),
(12, 'Grande', '25.00', 13),
(13, 'Mediano', '20.00', 13),
(14, 'Pequeño', '15.00', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `permisos` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `permisos`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Puede modificar todos los modulos del sistema', '{\"roles_index\":\"true\",\"roles_create\":\"true\",\"roles_edit\":\"true\",\"roles_destroy\":\"true\",\"roles_reporte\":\"true\",\"roles_permisos\":\"true\",\"usuarios_index\":\"true\",\"usuarios_create\":\"true\",\"usuarios_edit\":\"true\",\"usuarios_destroy\":\"true\",\"usuarios_reporte\":\"true\",\"usuarios_show\":\"true\",\"clientes_index\":\"true\",\"clientes_create\":\"true\",\"clientes_show\":\"true\",\"clientes_edit\":\"true\",\"clientes_destroy\":\"true\",\"acompanantes_index\":\"true\",\"acompanantes_create\":\"true\",\"acompanantes_show\":\"true\",\"acompanantes_edit\":\"true\",\"acompanantes_destroy\":\"true\",\"eventos_index\":\"true\",\"eventos_create\":\"true\",\"eventos_show\":\"true\",\"eventos_edit\":\"true\",\"eventos_destroy\":\"true\",\"eventos_galeria\":\"true\",\"eventos_galeria_destroy\":\"true\",\"habitacioncategorias_index\":\"true\",\"habitacioncategorias_create\":\"true\",\"habitacioncategorias_show\":\"true\",\"habitacioncategorias_edit\":\"true\",\"habitacioncategorias_destroy\":\"true\",\"habitaciones_index\":\"true\",\"habitaciones_create\":\"true\",\"habitaciones_show\":\"true\",\"habitaciones_edit\":\"true\",\"habitaciones_destroy\":\"true\",\"habitaciones_galeria\":\"true\",\"habitaciones_galeria_destroy\":\"true\",\"reservas_index\":\"true\",\"reservas_create\":\"true\",\"reservas_show\":\"true\",\"reservas_edit\":\"true\",\"reservas_destroy\":\"true\",\"reservas_hospedaje\":\"true\",\"habitacionfrigobar_index\":\"true\",\"habitacionfrigobar_create\":\"true\",\"habitacionfrigobar_show\":\"true\",\"habitacionfrigobar_edit\":\"true\",\"habitacionfrigobar_destroy\":\"true\",\"hospedajes_index\":\"true\",\"hospedajes_create\":\"true\",\"hospedajes_show\":\"true\",\"hospedajes_edit\":\"true\",\"hospedajes_destroy\":\"true\",\"hospedajes_transporte\":\"true\",\"hospedajes_transporte_destroy\":\"true\",\"hospedajes_reserva_lugar\":\"true\",\"hospedajes_reserva_productos\":\"true\",\"hospedajes_reserva_cafeteria_productos\":\"true\",\"hospedajes_frigobar\":\"true\",\"restaurantecategorias_index\":\"true\",\"restaurantecategorias_create\":\"true\",\"restaurantecategorias_show\":\"true\",\"restaurantecategorias_edit\":\"true\",\"restaurantecategorias_destroy\":\"true\",\"productos_index\":\"true\",\"productos_create\":\"true\",\"productos_show\":\"true\",\"productos_edit\":\"true\",\"productos_destroy\":\"true\",\"productos_galeria\":\"true\",\"productos_galeria_destroy\":\"true\",\"opciones_index\":\"true\",\"opciones_create\":\"true\",\"opciones_show\":\"true\",\"opciones_edit\":\"true\",\"opciones_destroy\":\"true\",\"tamanos_index\":\"true\",\"tamanos_create\":\"true\",\"tamanos_show\":\"true\",\"tamanos_edit\":\"true\",\"tamanos_destroy\":\"true\",\"restaurantes_index\":\"true\",\"restaurantes_create\":\"true\",\"restaurantes_show\":\"true\",\"restaurantes_reporte\":\"true\",\"restaurantes_destroy\":\"true\",\"cafeteriacategorias_index\":\"true\",\"cafeteriacategorias_create\":\"true\",\"cafeteriacategorias_show\":\"true\",\"cafeteriacategorias_edit\":\"true\",\"cafeteriacategorias_destroy\":\"true\",\"cafeteria_productos_index\":\"true\",\"cafeteria_productos_create\":\"true\",\"cafeteria_productos_show\":\"true\",\"cafeteria_productos_edit\":\"true\",\"cafeteria_productos_destroy\":\"true\",\"cafeteria_productos_galeria\":\"true\",\"cafeteria_productos_galeria_destroy\":\"true\",\"cafeteria_opciones_index\":\"true\",\"cafeteria_opciones_create\":\"true\",\"cafeteria_opciones_show\":\"true\",\"cafeteria_opciones_edit\":\"true\",\"cafeteria_opciones_destroy\":\"true\",\"cafeteria_tamanos_index\":\"true\",\"cafeteria_tamanos_create\":\"true\",\"cafeteria_tamanos_show\":\"true\",\"cafeteria_tamanos_edit\":\"true\",\"cafeteria_tamanos_destroy\":\"true\",\"cafeteria_index\":\"true\",\"cafeteria_create\":\"true\",\"cafeteria_show\":\"true\",\"cafeteria_reporte\":\"true\",\"cafeteria_destroy\":\"true\",\"promociones_index\":\"true\",\"promociones_create\":\"true\",\"promociones_show\":\"true\",\"promociones_edit\":\"true\",\"promociones_destroy\":\"true\",\"promocionreservas_index\":\"true\",\"promocionreservas_create\":\"true\",\"promocionreservas_show\":\"true\",\"promocionreservas_edit\":\"true\",\"promocionreservas_destroy\":\"true\",\"lugaresturisticos_index\":\"true\",\"lugaresturisticos_create\":\"true\",\"lugaresturisticos_show\":\"true\",\"lugaresturisticos_edit\":\"true\",\"lugaresturisticos_destroy\":\"true\",\"lugaresturisticos_galeria\":\"true\",\"lugaresturisticos_galeria_destroy\":\"true\",\"reservaslugaresturisticos_index\":\"true\",\"reservaslugaresturisticos_create\":\"true\",\"reservaslugaresturisticos_show\":\"true\",\"reservaslugaresturisticos_edit\":\"true\",\"reservaslugaresturisticos_destroy\":\"true\",\"reservaslugaresturisticos_hospedaje\":\"true\",\"transportes_index\":\"true\",\"transportes_create\":\"true\",\"transportes_show\":\"true\",\"transportes_edit\":\"true\",\"transportes_destroy\":\"true\",\"hotel_galeria\":\"true\",\"hotel_galeria_destroy\":\"true\",\"reporte_ingresos_hospedajes\":\"true\",\"reporte_ingresos_restaurante\":\"true\",\"reporte_ingresos_lugaresturisticos\":\"true\",\"reporte_ingresos_transportes\":\"true\"}', '2020-12-30 13:20:29', '2021-07-09 00:29:18'),
(3, 'prueba', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut', '{}', '2021-10-27 19:54:33', '2021-10-27 19:54:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`id`, `nombre`, `descripcion`, `precio`, `foto`) VALUES
(6, 'RADIO TAXI TEMPORAL', '<p>Es posible que cuando hayas acabado de actualizar tu equipo de&nbsp;<a href=\"https://www.ivanandrei.com/tag/windows-10/\" target=\"_blank\">Windows 10</a>&nbsp;a&nbsp;<a href=\"https://www.ivanandrei.com/tag/windows-11/\" target=\"_blank\">Windows 11</a>, veas un mensaje en el escritorio dici&eacute;ndote que&nbsp;<strong>&ldquo;Windows no est&aacute; activado&rdquo;</strong>. Tranquilo, no te imagines que el establecimiento de confianza donde compraste el equipo te lo vendi&oacute; con una licencia pirata de Windows 10. Como no colocaste la clave de Windows 11 al momento de la instalaci&oacute;n, la activaci&oacute;n lo debes de hacer de manera manual.</p>', '20.00', 'transporte_210617122904.jpg'),
(7, 'Radio taxi Cantuta', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '30.00', 'transporte_210617164423.jpg'),
(8, 'Radio Taxi Ciudad Jardin', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '2000.00', 'transporte_210617164540.jpg'),
(9, 'Radio Taxi Temporal', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '20.00', 'transporte_210617164612.png'),
(10, 'Radio taxi h', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit nisl sed class habitasse eu, quis magna ullamcorper mollis quisque viverra nullam vehicula tristique odio suspendisse. Dictumst rutrum scelerisque nulla vehicula ultrices dui posuere est non, consequat tortor leo sodales montes placerat massa senectus dignissim tristique,</p>', '19.00', 'transporte_210617170616.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `imei_celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `email`, `telefono`, `direccion`, `password`, `rol_id`, `api_token`, `imei_celular`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Admin', 'Admin', 'admin@gmail.com', '4444444', 'Av Potosi', '$2y$10$OcoV32XQi2U69UClu.lvUeDXZ2h/RXNgVC0DCcih23oJpSvYOoM.2', 1, 'OFecZiFBn1MV5GIniAYgL5XNxactmLX9G5B3vNg5YEfFd8prqFbhOuxtT9oK', '', NULL, NULL, '2021-04-16 16:31:44', '2021-04-16 16:31:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acompanhantes`
--
ALTER TABLE `acompanhantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_acompanante_cliente` (`cliente_id`);

--
-- Indices de la tabla `cafeteria_categorias`
--
ALTER TABLE `cafeteria_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cafeteria_detalle_reserva`
--
ALTER TABLE `cafeteria_detalle_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_reserva_cafeteria_producto` (`cafeteria_producto_id`),
  ADD KEY `fk_detalle_reserva_cafeteria_reserva` (`cafeteria_reserva_id`);

--
-- Indices de la tabla `cafeteria_detalle_reserva_productos`
--
ALTER TABLE `cafeteria_detalle_reserva_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cafeteria_detalle_producto_opciones` (`cafeteria_producto_opciones_id`),
  ADD KEY `fk_cafeteria_detalle_producto_tamanho` (`cafeteria_producto_tamanho_id`),
  ADD KEY `fk_cafeteria_detalle_producto_reserva` (`cafeteria_detalle_reserva_id`);

--
-- Indices de la tabla `cafeteria_productos`
--
ALTER TABLE `cafeteria_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cafeteria_producto_categoria` (`cafeteria_categoria_id`);

--
-- Indices de la tabla `cafeteria_producto_opciones`
--
ALTER TABLE `cafeteria_producto_opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cafeteria_producto_opciones_producto` (`cafeteria_producto_id`);

--
-- Indices de la tabla `cafeteria_producto_tamanho`
--
ALTER TABLE `cafeteria_producto_tamanho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cafeteria_producto_tamanho_producto` (`cafeteria_producto_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria_cafeteria_producto`
--
ALTER TABLE `galeria_cafeteria_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_cafeteria_producto_producto` (`cafeteria_producto_id`);

--
-- Indices de la tabla `galeria_evento`
--
ALTER TABLE `galeria_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_evento_evento` (`evento_id`);

--
-- Indices de la tabla `galeria_habitacion`
--
ALTER TABLE `galeria_habitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_habitacion_habitacion` (`habitacion_id`);

--
-- Indices de la tabla `galeria_hotel`
--
ALTER TABLE `galeria_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria_lugares_turisticos`
--
ALTER TABLE `galeria_lugares_turisticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_lugar_turistico` (`lugar_turistico_id`);

--
-- Indices de la tabla `galeria_restaurante_producto`
--
ALTER TABLE `galeria_restaurante_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_restaurante_producto_producto` (`restaurante_producto_id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_habitacion_categoria` (`habitacion_categoria_id`);

--
-- Indices de la tabla `habitacion_categorias`
--
ALTER TABLE `habitacion_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitacion_frigobar`
--
ALTER TABLE `habitacion_frigobar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hospedaje_cliente` (`cliente_id`),
  ADD KEY `fk_hospedaje_habitacion` (`habitacion_id`);

--
-- Indices de la tabla `hospedaje_detalle_acompanantes`
--
ALTER TABLE `hospedaje_detalle_acompanantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hospedaje_detalle_acompanantes_hospedaje` (`hospedaje_id`);

--
-- Indices de la tabla `hospedaje_detalle_frigobar`
--
ALTER TABLE `hospedaje_detalle_frigobar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hospedaje_detalle_transporte`
--
ALTER TABLE `hospedaje_detalle_transporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hospedaje_detalle_transporte_hospedaje` (`hospedaje_id`),
  ADD KEY `fk_hospedaje_detalle_transporte_transporte` (`transporte_id`);

--
-- Indices de la tabla `lugares_turisticos`
--
ALTER TABLE `lugares_turisticos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_promociones_habitacion` (`habitacion_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_cliente` (`cliente_id`),
  ADD KEY `fk_reserva_habitacion` (`habitacion_id`);

--
-- Indices de la tabla `reservas_cafeteria`
--
ALTER TABLE `reservas_cafeteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservas_cafeteria_hospedaje` (`hospedaje_id`),
  ADD KEY `fk_reservas_cafeteria_cliente` (`cliente_id`);

--
-- Indices de la tabla `reservas_lugares_turisticos`
--
ALTER TABLE `reservas_lugares_turisticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservas_lugar_turistico` (`lugar_turistico_id`),
  ADD KEY `fk_reserva_lugar_turistico_cliente` (`cliente_id`),
  ADD KEY `fk_reservas_lugar_turistico_hospedaje` (`hospedaje_id`);

--
-- Indices de la tabla `reservas_promocion`
--
ALTER TABLE `reservas_promocion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservas_promocion_promocion` (`promocion_id`),
  ADD KEY `fk_reservas_promocion_habitacion` (`habitacion_id`),
  ADD KEY `fk_reservas_promocion_cliente` (`cliente_id`);

--
-- Indices de la tabla `reservas_restaurante`
--
ALTER TABLE `reservas_restaurante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservas_resturante_hospedaje` (`hospedaje_id`),
  ADD KEY `fk_reservas_restaurante_cliente` (`cliente_id`);

--
-- Indices de la tabla `restaurante_categorias`
--
ALTER TABLE `restaurante_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurante_detalle_reserva`
--
ALTER TABLE `restaurante_detalle_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_reserva_restaurante_producto` (`restaurante_producto_id`),
  ADD KEY `fk_detalle_reserva_restaurante_reserva` (`restaurante_reserva_id`);

--
-- Indices de la tabla `restaurante_detalle_reserva_productos`
--
ALTER TABLE `restaurante_detalle_reserva_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_restaurante_detalle_producto_opciones` (`restaurante_producto_opciones_id`),
  ADD KEY `fk_restaurante_detalle_producto_tamanho` (`restaurante_producto_tamanho_id`),
  ADD KEY `fk_restaurante_detalle_producto_reserva` (`restaurante_detalle_reserva_id`);

--
-- Indices de la tabla `restaurante_productos`
--
ALTER TABLE `restaurante_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_restaurante_producto_categoria` (`restaurante_categoria_id`);

--
-- Indices de la tabla `restaurante_producto_opciones`
--
ALTER TABLE `restaurante_producto_opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_restaurante_producto_opciones_producto` (`restaurante_producto_id`);

--
-- Indices de la tabla `restaurante_producto_tamanho`
--
ALTER TABLE `restaurante_producto_tamanho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_restaurante_producto_tamanho_producto` (`restaurante_producto_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acompanhantes`
--
ALTER TABLE `acompanhantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cafeteria_categorias`
--
ALTER TABLE `cafeteria_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cafeteria_detalle_reserva`
--
ALTER TABLE `cafeteria_detalle_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cafeteria_detalle_reserva_productos`
--
ALTER TABLE `cafeteria_detalle_reserva_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cafeteria_productos`
--
ALTER TABLE `cafeteria_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cafeteria_producto_opciones`
--
ALTER TABLE `cafeteria_producto_opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cafeteria_producto_tamanho`
--
ALTER TABLE `cafeteria_producto_tamanho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `galeria_cafeteria_producto`
--
ALTER TABLE `galeria_cafeteria_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `galeria_evento`
--
ALTER TABLE `galeria_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `galeria_habitacion`
--
ALTER TABLE `galeria_habitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de la tabla `galeria_hotel`
--
ALTER TABLE `galeria_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `galeria_lugares_turisticos`
--
ALTER TABLE `galeria_lugares_turisticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `galeria_restaurante_producto`
--
ALTER TABLE `galeria_restaurante_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `habitacion_categorias`
--
ALTER TABLE `habitacion_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `habitacion_frigobar`
--
ALTER TABLE `habitacion_frigobar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `hospedaje_detalle_acompanantes`
--
ALTER TABLE `hospedaje_detalle_acompanantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `hospedaje_detalle_frigobar`
--
ALTER TABLE `hospedaje_detalle_frigobar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hospedaje_detalle_transporte`
--
ALTER TABLE `hospedaje_detalle_transporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `lugares_turisticos`
--
ALTER TABLE `lugares_turisticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `reservas_cafeteria`
--
ALTER TABLE `reservas_cafeteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reservas_lugares_turisticos`
--
ALTER TABLE `reservas_lugares_turisticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reservas_promocion`
--
ALTER TABLE `reservas_promocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservas_restaurante`
--
ALTER TABLE `reservas_restaurante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `restaurante_categorias`
--
ALTER TABLE `restaurante_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `restaurante_detalle_reserva`
--
ALTER TABLE `restaurante_detalle_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `restaurante_detalle_reserva_productos`
--
ALTER TABLE `restaurante_detalle_reserva_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `restaurante_productos`
--
ALTER TABLE `restaurante_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `restaurante_producto_opciones`
--
ALTER TABLE `restaurante_producto_opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `restaurante_producto_tamanho`
--
ALTER TABLE `restaurante_producto_tamanho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acompanhantes`
--
ALTER TABLE `acompanhantes`
  ADD CONSTRAINT `fk_acompanante_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `cafeteria_detalle_reserva`
--
ALTER TABLE `cafeteria_detalle_reserva`
  ADD CONSTRAINT `fk_detalle_reserva_cafeteria_producto` FOREIGN KEY (`cafeteria_producto_id`) REFERENCES `cafeteria_productos` (`id`),
  ADD CONSTRAINT `fk_detalle_reserva_cafeteria_reserva` FOREIGN KEY (`cafeteria_reserva_id`) REFERENCES `reservas_cafeteria` (`id`);

--
-- Filtros para la tabla `cafeteria_detalle_reserva_productos`
--
ALTER TABLE `cafeteria_detalle_reserva_productos`
  ADD CONSTRAINT `fk_cafeteria_detalle_producto_opciones` FOREIGN KEY (`cafeteria_producto_opciones_id`) REFERENCES `cafeteria_producto_opciones` (`id`),
  ADD CONSTRAINT `fk_cafeteria_detalle_producto_reserva` FOREIGN KEY (`cafeteria_detalle_reserva_id`) REFERENCES `cafeteria_detalle_reserva` (`id`),
  ADD CONSTRAINT `fk_cafeteria_detalle_producto_tamanho` FOREIGN KEY (`cafeteria_producto_tamanho_id`) REFERENCES `cafeteria_producto_tamanho` (`id`);

--
-- Filtros para la tabla `cafeteria_productos`
--
ALTER TABLE `cafeteria_productos`
  ADD CONSTRAINT `fk_cafeteria_producto_categoria` FOREIGN KEY (`cafeteria_categoria_id`) REFERENCES `cafeteria_categorias` (`id`);

--
-- Filtros para la tabla `cafeteria_producto_opciones`
--
ALTER TABLE `cafeteria_producto_opciones`
  ADD CONSTRAINT `fk_cafeteria_producto_opciones_producto` FOREIGN KEY (`cafeteria_producto_id`) REFERENCES `cafeteria_productos` (`id`);

--
-- Filtros para la tabla `cafeteria_producto_tamanho`
--
ALTER TABLE `cafeteria_producto_tamanho`
  ADD CONSTRAINT `fk_cafeteria_producto_tamanho_producto` FOREIGN KEY (`cafeteria_producto_id`) REFERENCES `cafeteria_productos` (`id`);

--
-- Filtros para la tabla `galeria_cafeteria_producto`
--
ALTER TABLE `galeria_cafeteria_producto`
  ADD CONSTRAINT `fk_galeria_cafeteria_producto_producto` FOREIGN KEY (`cafeteria_producto_id`) REFERENCES `cafeteria_productos` (`id`);

--
-- Filtros para la tabla `galeria_evento`
--
ALTER TABLE `galeria_evento`
  ADD CONSTRAINT `fk_galeria_evento_evento` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`);

--
-- Filtros para la tabla `galeria_habitacion`
--
ALTER TABLE `galeria_habitacion`
  ADD CONSTRAINT `fk_galeria_habitacion_habitacion` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id`);

--
-- Filtros para la tabla `galeria_lugares_turisticos`
--
ALTER TABLE `galeria_lugares_turisticos`
  ADD CONSTRAINT `fk_galeria_lugar_turistico` FOREIGN KEY (`lugar_turistico_id`) REFERENCES `lugares_turisticos` (`id`);

--
-- Filtros para la tabla `galeria_restaurante_producto`
--
ALTER TABLE `galeria_restaurante_producto`
  ADD CONSTRAINT `fk_galeria_restaurante_producto_producto` FOREIGN KEY (`restaurante_producto_id`) REFERENCES `restaurante_productos` (`id`);

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `fk_habitacion_categoria` FOREIGN KEY (`habitacion_categoria_id`) REFERENCES `habitacion_categorias` (`id`);

--
-- Filtros para la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  ADD CONSTRAINT `fk_hospedaje_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_hospedaje_habitacion` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id`);

--
-- Filtros para la tabla `hospedaje_detalle_acompanantes`
--
ALTER TABLE `hospedaje_detalle_acompanantes`
  ADD CONSTRAINT `fk_hospedaje_detalle_acompanantes_hospedaje` FOREIGN KEY (`hospedaje_id`) REFERENCES `hospedajes` (`id`);

--
-- Filtros para la tabla `hospedaje_detalle_transporte`
--
ALTER TABLE `hospedaje_detalle_transporte`
  ADD CONSTRAINT `fk_hospedaje_detalle_transporte_hospedaje` FOREIGN KEY (`hospedaje_id`) REFERENCES `hospedajes` (`id`),
  ADD CONSTRAINT `fk_hospedaje_detalle_transporte_transporte` FOREIGN KEY (`transporte_id`) REFERENCES `transportes` (`id`);

--
-- Filtros para la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD CONSTRAINT `fk_promociones_habitacion` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reserva_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_reserva_habitacion` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id`);

--
-- Filtros para la tabla `reservas_cafeteria`
--
ALTER TABLE `reservas_cafeteria`
  ADD CONSTRAINT `fk_reservas_cafeteria_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_reservas_cafeteria_hospedaje` FOREIGN KEY (`hospedaje_id`) REFERENCES `hospedajes` (`id`);

--
-- Filtros para la tabla `reservas_lugares_turisticos`
--
ALTER TABLE `reservas_lugares_turisticos`
  ADD CONSTRAINT `fk_reserva_lugar_turistico_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_reservas_lugar_turistico` FOREIGN KEY (`lugar_turistico_id`) REFERENCES `lugares_turisticos` (`id`),
  ADD CONSTRAINT `fk_reservas_lugar_turistico_hospedaje` FOREIGN KEY (`hospedaje_id`) REFERENCES `hospedajes` (`id`);

--
-- Filtros para la tabla `reservas_promocion`
--
ALTER TABLE `reservas_promocion`
  ADD CONSTRAINT `fk_reservas_promocion_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_reservas_promocion_habitacion` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id`),
  ADD CONSTRAINT `fk_reservas_promocion_promocion` FOREIGN KEY (`promocion_id`) REFERENCES `promociones` (`id`);

--
-- Filtros para la tabla `reservas_restaurante`
--
ALTER TABLE `reservas_restaurante`
  ADD CONSTRAINT `fk_reservas_restaurante_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_reservas_resturante_hospedaje` FOREIGN KEY (`hospedaje_id`) REFERENCES `hospedajes` (`id`);

--
-- Filtros para la tabla `restaurante_detalle_reserva`
--
ALTER TABLE `restaurante_detalle_reserva`
  ADD CONSTRAINT `fk_detalle_reserva_restaurante_producto` FOREIGN KEY (`restaurante_producto_id`) REFERENCES `restaurante_productos` (`id`),
  ADD CONSTRAINT `fk_detalle_reserva_restaurante_reserva` FOREIGN KEY (`restaurante_reserva_id`) REFERENCES `reservas_restaurante` (`id`);

--
-- Filtros para la tabla `restaurante_detalle_reserva_productos`
--
ALTER TABLE `restaurante_detalle_reserva_productos`
  ADD CONSTRAINT `fk_restaurante_detalle_producto_opciones` FOREIGN KEY (`restaurante_producto_opciones_id`) REFERENCES `restaurante_producto_opciones` (`id`),
  ADD CONSTRAINT `fk_restaurante_detalle_producto_reserva` FOREIGN KEY (`restaurante_detalle_reserva_id`) REFERENCES `restaurante_detalle_reserva` (`id`),
  ADD CONSTRAINT `fk_restaurante_detalle_producto_tamanho` FOREIGN KEY (`restaurante_producto_tamanho_id`) REFERENCES `restaurante_producto_tamanho` (`id`);

--
-- Filtros para la tabla `restaurante_productos`
--
ALTER TABLE `restaurante_productos`
  ADD CONSTRAINT `fk_restaurante_producto_categoria` FOREIGN KEY (`restaurante_categoria_id`) REFERENCES `restaurante_categorias` (`id`);

--
-- Filtros para la tabla `restaurante_producto_opciones`
--
ALTER TABLE `restaurante_producto_opciones`
  ADD CONSTRAINT `fk_restaurante_producto_opciones_producto` FOREIGN KEY (`restaurante_producto_id`) REFERENCES `restaurante_productos` (`id`);

--
-- Filtros para la tabla `restaurante_producto_tamanho`
--
ALTER TABLE `restaurante_producto_tamanho`
  ADD CONSTRAINT `fk_restaurante_producto_tamanho_producto` FOREIGN KEY (`restaurante_producto_id`) REFERENCES `restaurante_productos` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
