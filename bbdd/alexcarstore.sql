-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 09:03:00
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alexcarstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) NOT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `estado` enum('En preparacion','Enviado','Entregado','No entregado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `stock`, `imagen`, `precio`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'BMW E38 750 iL', 'El BMW E38 750iL es un sedán de gama alta de los años 2000. Su V12 de 5,4l ofrece el buque insignia de la marca bávara, una manejabilidad y unas prestaciones dignas de un deportivo. Casi 300 km/h a velocidad máxima y un nivel inusual de equipamiento no estándar, se presenta en 3 versiones, la versión estándar, la versión L (+140 mm) y la versión mucho más rara, la L7 (+394 mm). Era el coche de James Bond en \"El mañana nunca muere\" de 1997.', 38, 'IMAGEN', '79.00', '2023-11-04', '2023-11-04'),
(3, 'BMW M3 E46', 'El BMW M3 E46 tenía la pesada carga de suceder a los icónicos E30 y E36 que habían dado al blasón del automovilismo sus colores nobles. Esta nueva generación se presentaría como un coupé Grand Touring con una estética depurada y equilibrada. Sería en la versión M3 donde se ensancharían las aletas y el capó sería de aluminio con varias hendiduras para alojar el motor de 6 cilindros y 24 válvulas. Sus 343 CV permitirían al M3 hacer de 0 a 100 en apenas 5 ,2 segundos. Todavía hoy esta generación de BMW sigue siendo, a ojos del coleccionista, imprescindible.', 25, 'IMAGEN', '59.00', '2023-11-04', '2023-11-04'),
(4, 'Volkswagen Golf 7 R', 'Promocionada a través del programa Volkswagen WRC, la línea \"R\" de la marca ofrece los modelos más deportivos del catálogo. Si el Golf GTI te parece deportivo, ¡espera a ver el Golf R y sus 300 CV! Al Golf de séptima generación, lanzado en 2012, le siguió una versión \"R\" al año siguiente. Estéticamente bastante sobria, la berlina ofrece sólidas prestaciones gracias a su motor Audi, ofreciendo al mismo tiempo un buen nivel de confort y acabados de gama bastante alta.\r\n', 16, 'IMAGEN', '65.00', '2023-11-04', '2023-11-04'),
(5, 'Audi S8 (D3)', 'En 2008, Audi presentó una especie de “limusina deportiva” para suceder al antiguo S8 D2, producido por última vez en 2003. El S8 D3 obviamente está basado en el sedán A8, con algunos cambios exteriores para permitirle pasar desapercibido. Sin embargo, las llantas de 20”, las tomas de aire adicionales y los cuatro tubos de escape revelan su verdadera potencia. Debajo del capó encontrarás un motor Lamborghini Gallardo V10 que alcanza los 450 CV. Sólo una cosita que puede llevar esta limusina de dos toneladas a una velocidad de hasta 250 km/h (¡y esa es su velocidad autofrenada!).\r\n', 17, 'IMAGEN', '74.00', '2023-11-04', '2023-11-04'),
(6, 'Renault Megane R.S. Trophy', 'El Mégane RS Trophy de 2018 es el Mégane más potente jamás construido. Para superar el listón de los 300 caballos, se le ha equipado con el motor de su primo Alpine, aunque ligeramente rediseñado. Su potencia se ha incrementado en 20 caballos y el par en 20 Nm. La transmisión está confiada a una caja EDC de doble embrague y 6 velocidades. Con una velocidad máxima de 260 km/h, este Mégane no tiene mucho en común con un compacto silencioso. En comparación con el Alpine A110, el RS utiliza un turbocompresor avanzado, montado sobre rodamientos de bolas cerámicos que limitan la fricción y reducen el tiempo de respuesta del Turbo. El Mégane RS Trophy se erige como el nuevo referente de los coches compactos hiperdeportivos.', 20, 'IMAGEN', '49.00', '2023-11-04', '2023-11-04'),
(7, 'Nissan GT-R (R34) Nismo Z-Tune', 'Después de 15 años de éxito en la carretera y en la pista con el Skyline R32, R333 y R34, Nismo rindió homenaje al legendario deportivo ofreciéndole una serie limitada conocida como R34GT-RZ-tune. Sólo se producirán 19 unidades del coche, de las 20 iniciales, para celebrar los 20 años de la división deportiva de Nissan. Se construyó únicamente a partir de modelos Skyline comprados de segunda mano que fueron completamente rediseñados. Con 500 caballos de fuerza y ​​un peso de 1600 kg, sus prestaciones eran impresionantes con una velocidad máxima de 290 km/h y una aceleración de 0 a 100 km/h en 3,9 segundos.', 5, 'IMAGEN', '68.00', '2023-11-04', '2023-11-04'),
(8, 'Toyota Supra Mk.4', 'Al intentar imaginar la cuarta generación del Supra, el fabricante japonés empezó de cero. Los años noventa fueron la década de los coches deportivos de \"biodiseño\", y Toyota demostraría ser muy fiel a este mantra. Con un imponente alerón trasero, su estética era inimitable, pero fue el motor (un 6 cilindros y 24 válvulas equipado con 2 turbos y que desarrollaba 330 caballos de fuerza) lo que hizo que el automóvil fuera verdaderamente especial. Eventualmente reviviría sus días de gloria a través de varios videojuegos, incluido el popular Gran Turismo.', 13, 'IMAGEN', '69.00', '2023-11-04', '2023-11-04'),
(9, 'Dodge Charger R/T', 'El Dodge Charger por sí solo representa todo lo que Estados Unidos tiene derecho a esperar de un muscle car. Entró al mercado en 1966 rivalizando con Ford y su Mustang, y todavía se produce en la actualidad. Sus apariciones en cine y televisión son numerosas, desde el coche de un asesino en Bullit hasta un icono de culto en Los duques de Hazzard, pasando por un icono tarantinesco en Death Boulevard. La versión de 1969 es sin duda la más representativa de la estirpe con su V8 ​​HEMI de 425 caballos. Puede alcanzar hasta 250 km/h y acelera de 0 a 100 en 5 segundos en medio de una enorme nube de humo. A este ritmo, el consumo roza los 30 litros a los 100 km.', 11, 'IMAGEN', '85.00', '2023-11-04', '2023-11-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usuario` varchar(256) NOT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `tipo_usuario` enum('cliente','admin') NOT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `usuario`, `contraseña`, `tipo_usuario`, `direccion`, `telefono`) VALUES
(1, 'Alex', 'adiezriabets@gmail.com', 'adiez', '123', 'cliente', 'Ronda Ibon de Plan 24', '620756123'),
(2, 'Dario', 'daureña@gmail.com', 'daureña', 'sysadmin', 'admin', 'Calle Batala de Lepanto 30', '617265178');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `fk_producto` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
