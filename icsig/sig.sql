-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2021 a las 20:28:48
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sig`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_usuario`
--

CREATE TABLE `cargo_usuario` (
  `id_cargo_usuario` int(10) UNSIGNED ZEROFILL NOT NULL,
  `cargo_usuario_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `permiso_cargo_usuario` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT '2',
  `fk_id_linea` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_cargo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_cargo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo_usuario`
--

INSERT INTO `cargo_usuario` (`id_cargo_usuario`, `cargo_usuario_nombre`, `permiso_cargo_usuario`, `fk_id_linea`, `fk_id_sucursal`, `fecha_reg_cargo`, `estatus_cargo`) VALUES
(0000000001, 'Usuario maestro', 1, 0000000001, 0000000001, '', 1),
(0000000002, 'Gerente general', 2, 0000000001, 0000000001, '', 1),
(0000000003, 'Usuario bÃ¡sico', 3, 0000000001, 0000000001, '', 1),
(0000000004, 'Vendedor#1', 1, 0000000036, 0000000006, '25/12/20', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id_categoria_producto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_linea` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_categoria` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_categoria` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id_categoria_producto`, `nombre_categoria`, `fk_id_linea`, `fecha_reg_categoria`, `estatus_categoria`) VALUES
(0000000001, 'DirecciÃ³n', 0000000001, '28/12/20', 1),
(0000000002, 'Prendas de hombre', 0000000022, '28/12/20', 0),
(0000000003, 'SuspensiÃ³n', 0000000001, '27/01/21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra`
--

CREATE TABLE `factura_compra` (
  `id_factura_compra` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_producto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_rtn_proveedor` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_fcompra` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `total_factura_compra` decimal(10,2) UNSIGNED NOT NULL,
  `estatus_fcompra` tinyint(1) NOT NULL DEFAULT '1',
  `fk_id_usuario` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_venta`
--

CREATE TABLE `factura_venta` (
  `id_factura_venta` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_cliente` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_producto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_detalle_producto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `total_factura_venta` decimal(10,2) UNSIGNED NOT NULL,
  `fecha_reg_fventa` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_usuario` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `estatus_fventa` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE `gasto` (
  `id_gasto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_tipo_gasto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `descripcion_gasto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `monto_gasto` decimal(10,2) UNSIGNED NOT NULL,
  `total_gasto` decimal(10,2) UNSIGNED NOT NULL,
  `fk_id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_gasto` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_gasto` tinyint(1) NOT NULL DEFAULT '1',
  `fk_id_usuario` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id_gasto`, `fk_id_tipo_gasto`, `descripcion_gasto`, `monto_gasto`, `total_gasto`, `fk_id_sucursal`, `fecha_reg_gasto`, `estatus_gasto`, `fk_id_usuario`) VALUES
(0000000001, 0000000001, '', '0.00', '4.00', 0000000001, '07/02/21', 1, 0000000002),
(0000000002, 0000000001, '\"[{\"descripcion\":\"k\",\"gasto\":\"1\"},{\"descripcion\":\"i\",\"gasto\":\"8\"}]\"', '0.00', '9.00', 0000000001, '07/02/21', 1, 0000000002),
(0000000003, 0000000001, '\"[{\"descripcion\":\"k\",\"gasto\":\"1\"},{\"descripcion\":\"i\",\"gasto\":\"8\"}]\"', '0.00', '9.00', 0000000001, '07/02/21', 1, 0000000002),
(0000000004, 0000000003, '\"[{\"descripcion\":\"X\",\"gasto\":\"99\"}]\"', '0.00', '99.00', 0000000006, '07/02/21', 1, 0000000002),
(0000000005, 0000000001, '\"[{\"descripcion\":\"Agyua sula\",\"gasto\":\"100\"},{\"descripcion\":\"Herramienta\",\"gasto\":\"50\"}]\"', '0.00', '150.00', 0000000001, '07/02/21', 1, 0000000002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `id_linea` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_linea` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg_linea` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_linea` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`id_linea`, `nombre_linea`, `fecha_reg_linea`, `estatus_linea`) VALUES
(0000000001, 'Isaac Cromos', '14/12/20', 1),
(0000000021, 'Ropa nueva', '14/12/20', 1),
(0000000022, 'Ropa usada', '14/12/20', 1),
(0000000023, 'Ropa', '15/12/20', 0),
(0000000024, 'repuestos', '15/12/20', 0),
(0000000025, 'Rpuestos usados', '15/12/20', 0),
(0000000026, 'Daycas', '15/12/20', 0),
(0000000027, 'Bonbon', '15/12/20', 0),
(0000000028, 'Repuestos nuevos', '17/12/20', 1),
(0000000029, 'Decoracion hogar', '21/12/20', 1),
(0000000030, 'Decoracion de exterior', '21/12/20', 1),
(0000000031, 'Decoracion interior', '21/12/20', 1),
(0000000032, 'Ropa americana', '21/12/20', 1),
(0000000033, 'Probando', '21/12/20', 1),
(0000000034, 'Probando', '21/12/20', 1),
(0000000035, 'probando1', '21/12/20', 0),
(0000000036, 'Videojuegos#1', '25/12/20', 1),
(0000000037, 'Daycas#2', '25/12/20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_producto`
--

CREATE TABLE `marca_producto` (
  `id_marca` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_proveedor` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_marca` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_marca` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca_producto`
--

INSERT INTO `marca_producto` (`id_marca`, `nombre_marca`, `fk_id_proveedor`, `fecha_reg_marca`, `estatus_marca`) VALUES
(0000000001, '555', 0000000001, '28/12/20', 1),
(0000000002, '333', 0000000001, '29/12/20', 1),
(0000000003, 'probando', 0000000001, '29/12/20', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numero_parte_fabrica` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_producto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_producto` int(10) UNSIGNED NOT NULL,
  `fk_id_marca` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_categoria_producto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_proveedor` int(10) UNSIGNED ZEROFILL NOT NULL,
  `precio_compra_producto` decimal(10,2) UNSIGNED NOT NULL,
  `precio_venta_producto` decimal(10,2) UNSIGNED NOT NULL,
  `fk_id_linea` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_sub_categoria` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_producto` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_producto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `numero_parte_fabrica`, `descripcion_producto`, `cantidad_producto`, `fk_id_marca`, `fk_id_categoria_producto`, `fk_id_proveedor`, `precio_compra_producto`, `precio_venta_producto`, `fk_id_linea`, `fk_id_sub_categoria`, `fk_id_sucursal`, `fecha_reg_producto`, `estatus_producto`) VALUES
(0000000001, 'Freno', 'nnn10x', 'Repuesto', 5, 0000000001, 0000000001, 0000000001, '100.00', '150.00', 0000000001, 0000000001, 0000000001, '29/12/20', 1),
(0000000002, 'Pastillas', 'GT45', 'Pastillas de freno de tambor.', 3, 0000000001, 0000000001, 0000000001, '200.00', '320.00', 0000000001, 0000000001, 0000000001, '29/12/20', 1),
(0000000003, 'probando', 'probando', 'probando', 100, 0000000001, 0000000001, 0000000001, '1.00', '2.00', 0000000001, 0000000001, 0000000001, '29/12/20', 0),
(0000000004, 'sdrytgregt', '4535', 'wefwaf', 10, 0000000002, 0000000003, 0000000001, '55.00', '100.00', 0000000001, 0000000003, 0000000001, '25/08/21', 0),
(0000000005, 'proando2', '456123', 'probando n.', 0, 0000000002, 0000000003, 0000000001, '50.00', '100.00', 0000000001, 0000000003, 0000000001, '01/10/21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_proveedor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `numero_rtn_proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_proveedor` int(10) NOT NULL,
  `celular_proveedor` int(10) NOT NULL,
  `correo_proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_proveedor` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_proveedor` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_proveedor`, `direccion_proveedor`, `numero_rtn_proveedor`, `telefono_proveedor`, `celular_proveedor`, `correo_proveedor`, `fk_id_sucursal`, `fecha_reg_proveedor`, `estatus_proveedor`) VALUES
(0000000001, 'Isaac Cromos', 'Barrio el carmen', '0501199310509', 0, 0, '', 0000000001, '28/12/20', 1),
(0000000005, 'La paz', 'calle, barrio, avenida.', '55555555555555', 55566666, 66665555, 'Nada@nada', 0000000001, '25/08/21', 1),
(0000000008, 'Esperanza', 'Calle, barrio.', '11111111111111', 77777777, 444444, 'nada', 0000000001, '25/08/21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categoria`
--

CREATE TABLE `sub_categoria` (
  `id_sub_categoria` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_sub_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_categoria` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_subc` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_subc` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sub_categoria`
--

INSERT INTO `sub_categoria` (`id_sub_categoria`, `nombre_sub_categoria`, `fk_id_categoria`, `fecha_reg_subc`, `estatus_subc`) VALUES
(0000000001, 'Freno de pastilla', 0000000001, '28/12/20', 1),
(0000000002, 'Ropa', 0000000001, '28/12/20', 0),
(0000000003, 'Frenos de tambor', 0000000001, '27/01/21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_sucursal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion_sucursal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_sucursal` int(10) NOT NULL,
  `celular_sucursal` int(10) NOT NULL,
  `correo_sucursal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_linea` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_sucursal` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_sucursal` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre_sucursal`, `ubicacion_sucursal`, `telefono_sucursal`, `celular_sucursal`, `correo_sucursal`, `fk_id_linea`, `fecha_reg_sucursal`, `estatus_sucursal`) VALUES
(0000000001, 'Isaac Cromo\'s #1', 'Siguatepeque, Comayagua\r\nCalle 21 de agosto, entre 11 y 12 avenida.', 27731817, 98120692, 'isaac.cromos@gmail.com', 0000000001, '2016', 1),
(0000000004, 'Dilsia', 'Barrio el carmen', 98989898, 23232323, 'dscsad.a@gmail.com', 0000000022, '20/12/20', 0),
(0000000005, 'Daycas', '', 98989898, 23232323, 'dscsad', 0000000022, '20/12/20', 0),
(0000000006, 'Zonagamer', '', 27731111, 95991111, 'zona.gamer@gmail.com', 0000000036, '25/12/20', 1),
(0000000007, 'Probando', 'Nada, de nada', 23232323, 23232323, 'probando@nada.com', 0000000032, '12/01/21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_gasto`
--

CREATE TABLE `tipo_gasto` (
  `id_tipo_gasto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_tipo_gasto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nota_tipo_gasto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_linea` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha_reg_tgasto` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_tgasto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_gasto`
--

INSERT INTO `tipo_gasto` (`id_tipo_gasto`, `nombre_tipo_gasto`, `nota_tipo_gasto`, `fk_id_linea`, `fecha_reg_tgasto`, `estatus_tgasto`) VALUES
(0000000001, 'Agua potable', 'Pago de servicio publico potable', 0000000001, '27/12/20', 1),
(0000000002, 'EnergÃ­a elÃ©ctrica', 'Servicio pÃºblico', 0000000001, '27/12/20', 0),
(0000000003, 'EnergÃ­a solar', 'Gastos sobre servicio elÃ©ctrico.', 0000000036, '27/01/21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nick_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(1) NOT NULL,
  `fk_id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fk_id_cargo_usuario` int(10) UNSIGNED ZEROFILL NOT NULL,
  `telefono_usuario` int(12) NOT NULL,
  `celular_usuario` int(12) UNSIGNED NOT NULL,
  `correo_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena_usuario` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg_usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_usuario` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nick_usuario`, `nombre_usuario`, `apellido_usuario`, `tipo_usuario`, `fk_id_sucursal`, `fk_id_cargo_usuario`, `telefono_usuario`, `celular_usuario`, `correo_usuario`, `contrasena_usuario`, `fecha_reg_usuario`, `estatus_usuario`) VALUES
(0000000001, 'UsuarioM', 'Usuario', 'Maestro', 1, 0000000001, 0000000001, 11111111, 11111111, '', '4321', '', 1),
(0000000002, 'Aquiles', 'Aquiles', 'Isaac', 2, 0000000001, 0000000002, 27731817, 98120692, '', '1234', '', 1),
(0000000004, 'LeticiaT', 'Leticia', 'Torres', 2, 0000000006, 0000000003, 99989998, 27732773, 'zona.gamerv@gmail.com', '1234', '26/12/20', 0),
(0000000005, 'ProbandoM', 'Probando', 'Modificar', 3, 0000000006, 0000000003, 99999999, 23232323, 'probando.probando@gmail.com', '1234', '26/12/20', 1),
(0000000006, 'JulanSu', 'Julano', 'Sutano', 3, 0000000006, 0000000003, 11111111, 22222222, 'x.x@gmail.com', '4321', '26/12/20', 1),
(0000000007, 'Anita', 'Ana', 'Maria', 3, 0000000006, 0000000003, 33333333, 55555555, 'a.m@gmail.com', '2222', '27/12/20', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo_usuario`
--
ALTER TABLE `cargo_usuario`
  ADD PRIMARY KEY (`id_cargo_usuario`),
  ADD KEY `fk_id_linea` (`fk_id_linea`),
  ADD KEY `fk_id_sucursal` (`fk_id_sucursal`);

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id_categoria_producto`),
  ADD KEY `fk_id_linea` (`fk_id_linea`);

--
-- Indices de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  ADD PRIMARY KEY (`id_factura_compra`),
  ADD KEY `fk_id_producto` (`fk_id_producto`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_sucursal` (`fk_id_sucursal`),
  ADD KEY `fk_id_rtn_proveedor` (`fk_id_rtn_proveedor`);

--
-- Indices de la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  ADD PRIMARY KEY (`id_factura_venta`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`),
  ADD KEY `fk_id_detalle_producto` (`fk_id_detalle_producto`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_producto` (`fk_id_producto`),
  ADD KEY `fk_id_sucursal` (`fk_id_sucursal`);

--
-- Indices de la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `fk_id_tipo_gasto` (`fk_id_tipo_gasto`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_sucursal` (`fk_id_sucursal`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`id_linea`);

--
-- Indices de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  ADD PRIMARY KEY (`id_marca`),
  ADD KEY `fk_id_proveedor` (`fk_id_proveedor`) USING BTREE;

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `FK_ID_CATEGORIA` (`fk_id_categoria_producto`),
  ADD KEY `fk_id_linea` (`fk_id_linea`),
  ADD KEY `fk_id_sub_categoria` (`fk_id_sub_categoria`),
  ADD KEY `fk_id_sucursal` (`fk_id_sucursal`),
  ADD KEY `fk_id_marca` (`fk_id_marca`),
  ADD KEY `fk_id_proveedor` (`fk_id_proveedor`) USING BTREE;

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `fk_id_sucursal` (`fk_id_sucursal`);

--
-- Indices de la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD PRIMARY KEY (`id_sub_categoria`),
  ADD KEY `fk_id_categoria` (`fk_id_categoria`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD KEY `fk_id_linea` (`fk_id_linea`);

--
-- Indices de la tabla `tipo_gasto`
--
ALTER TABLE `tipo_gasto`
  ADD PRIMARY KEY (`id_tipo_gasto`),
  ADD KEY `fk_id_linea` (`fk_id_linea`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nick_usuario` (`nick_usuario`),
  ADD KEY `fk_id_cargo_usuario` (`fk_id_cargo_usuario`),
  ADD KEY `fk_id_sucursal` (`fk_id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo_usuario`
--
ALTER TABLE `cargo_usuario`
  MODIFY `id_cargo_usuario` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `id_categoria_producto` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  MODIFY `id_factura_compra` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  MODIFY `id_factura_venta` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id_gasto` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `id_linea` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  MODIFY `id_marca` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
  MODIFY `id_sub_categoria` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_gasto`
--
ALTER TABLE `tipo_gasto`
  MODIFY `id_tipo_gasto` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargo_usuario`
--
ALTER TABLE `cargo_usuario`
  ADD CONSTRAINT `cargo_usuario_ibfk_1` FOREIGN KEY (`fk_id_linea`) REFERENCES `linea` (`id_linea`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cargo_usuario_ibfk_2` FOREIGN KEY (`fk_id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD CONSTRAINT `categoria_producto_ibfk_2` FOREIGN KEY (`fk_id_linea`) REFERENCES `linea` (`id_linea`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  ADD CONSTRAINT `factura_compra_ibfk_1` FOREIGN KEY (`fk_id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_compra_ibfk_6` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_compra_ibfk_7` FOREIGN KEY (`fk_id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_compra_ibfk_8` FOREIGN KEY (`fk_id_rtn_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  ADD CONSTRAINT `factura_venta_ibfk_3` FOREIGN KEY (`fk_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_venta_ibfk_4` FOREIGN KEY (`fk_id_detalle_producto`) REFERENCES `detalle_producto` (`id_detalle_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_venta_ibfk_5` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_venta_ibfk_7` FOREIGN KEY (`fk_id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_venta_ibfk_8` FOREIGN KEY (`fk_id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD CONSTRAINT `gasto_ibfk_1` FOREIGN KEY (`fk_id_tipo_gasto`) REFERENCES `tipo_gasto` (`id_tipo_gasto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gasto_ibfk_3` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gasto_ibfk_4` FOREIGN KEY (`fk_id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `marca_producto`
--
ALTER TABLE `marca_producto`
  ADD CONSTRAINT `marca_producto_ibfk_1` FOREIGN KEY (`fk_id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`fk_id_categoria_producto`) REFERENCES `categoria_producto` (`id_categoria_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`fk_id_linea`) REFERENCES `linea` (`id_linea`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_5` FOREIGN KEY (`fk_id_sub_categoria`) REFERENCES `sub_categoria` (`id_sub_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_6` FOREIGN KEY (`fk_id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_7` FOREIGN KEY (`fk_id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_8` FOREIGN KEY (`fk_id_marca`) REFERENCES `marca_producto` (`id_marca`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_2` FOREIGN KEY (`fk_id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD CONSTRAINT `sub_categoria_ibfk_1` FOREIGN KEY (`fk_id_categoria`) REFERENCES `categoria_producto` (`id_categoria_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_gasto`
--
ALTER TABLE `tipo_gasto`
  ADD CONSTRAINT `tipo_gasto_ibfk_1` FOREIGN KEY (`fk_id_linea`) REFERENCES `linea` (`id_linea`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_5` FOREIGN KEY (`fk_id_cargo_usuario`) REFERENCES `cargo_usuario` (`id_cargo_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_6` FOREIGN KEY (`fk_id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
