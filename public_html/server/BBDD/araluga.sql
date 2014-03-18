-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-03-2014 a las 08:21:37
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `araluga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `droping`
--

CREATE TABLE IF NOT EXISTS `droping` (
  `drop_id` int(11) NOT NULL AUTO_INCREMENT,
  `fkTheme` int(11) NOT NULL,
  `drop_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `drop_textsArabic` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `drop_textsSpanish` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `drop_correctAnswer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`drop_id`),
  KEY `fkTheme` (`fkTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `droping`
--

INSERT INTO `droping` (`drop_id`, `fkTheme`, `drop_description`, `drop_textsArabic`, `drop_textsSpanish`, `drop_correctAnswer`) VALUES
(10, 0, 'Te est&aacute; costando mucho? Como diria Abdel: &iexcl;Es F&aacute;cil!<br>Antes de Continuar,repasemos lo aprendido.<br> Une cada letra con su correspondiente fonema.', '&#1575;,&#1576;,&#1578;,&#1579;', 'Ta,Ba,Za,Alif', '.Alif,#Ta,.Ba,#Ba,.Ta,#Za,.Za,#Alif'),
(12, 1, 'Repasa las 4 anteriores letras', '&#1575;,&#1576;,&#1578;,&#1579;', 'Za,Ta,Alif,Ba', '.Alif,#Za,.Ba,#Ta,.Ta,#Alif,.Za,#Ba'),
(13, 1, 'Te est&aacute; costando mucho? Como diria Abdel: &iexcl;Es F&aacute;cil!<br>Antes de Continuar,repasemos lo aprendido.<br> Une cada letra con su correspondiente fonema.', '&#1580;,&#1581;,&#1582;,&#1577;', 'Ha,TaMarbuta,Yim,Ja', '.Yim,#Ha,.Ha,#TaMarbuta,.Ja,#Yim,.TaMarbuta,#Ja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selected`
--

CREATE TABLE IF NOT EXISTS `selected` (
  `sel_id` int(11) NOT NULL AUTO_INCREMENT,
  `fkTheme` int(11) NOT NULL,
  `sel_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sel_routeOne` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sel_routeTwo` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sel_routeThree` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sel_textArabic` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sel_textSpanish` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sel_answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sel_id`),
  KEY `fkTheme` (`fkTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `selected`
--

INSERT INTO `selected` (`sel_id`, `fkTheme`, `sel_description`, `sel_routeOne`, `sel_routeTwo`, `sel_routeThree`, `sel_textArabic`, `sel_textSpanish`, `sel_answer`) VALUES
(8, 0, 'Perfecto!<br> Pincha sobra las letras Ba y Za', '/images/sel/1.jpg', '/images/sel/3.jpg', '/images/sel/2.jpg', 'baza', 'A', '/images/sel/3.jpg'),
(10, 0, 'Perfecto!<br> Pincha sobra las letras Alif y Za', '/images/sel/2.jpg', '/images/sel/3.jpg', '/images/sel/1.jpg', 'alifza', 'A', '/images/sel/1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theme_img` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theme_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theme_coorX` float NOT NULL DEFAULT '0',
  `theme_coorY` float NOT NULL DEFAULT '0',
  `vertex_coorX` float NOT NULL DEFAULT '0',
  `vertex_coorY` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_description`, `theme_img`, `theme_name`, `theme_coorX`, `theme_coorY`, `vertex_coorX`, `vertex_coorY`) VALUES
(0, '<b>Entidad</b>	Ciudad<br>\n  Pa&iacute;s Marruecos<br>\n<b>Superficie</b>	 <br>\n  Total	302 5 km2<br>\n<b>Altitud</b>	 <br>\n  Media	80 msnm<br>\n<b>Poblaci&oacute;n</b> (2008)	 <br>\n  Total	c, 700,000 hab.<br>\n  Densidad	3356,82 hab/km2<br>\n<b>Gentilicio</b>	tangerino, na, tingitano<br>\n<b>C&oacute;digo postal</b>	90000<br>', '/images/perfil/0.jpg', 'Tanger', 237.863, 16.2269, 0, 0),
(1, '<b>Pa&iacute;s</b> Marruecos<br>\n<b> Regi&oacute;n</b>	Fez-Bulm&aacute;n<br>\n<b>Fundaci&oacute;n</b>	789<br>\n<b>Poblaci&oacute;n</b>	1.968.950 hab. (2010)<br>', '/images/perfil/1.jpg', 'Fes', 249.219, 49.5657, 247.991, 37.7644),
(2, '<b>Pa&iacute;s</b>	 Marruecos<br>\n<b>Regi&oacute;n</b>	Marrakech-Tensift-Al Haouz<br>\n<b>Altitud</b>	466 msnm<br>\n<b>Superficie</b>	230 km2<br>\n<b>Fundaci&oacute;n</b>	1062<br>\n<b>Poblaci&oacute;n</b>	1.070.8381 hab. (2004)<br>\n<b>Alcalde</b>	Fatima-Zahra Mansouri (2009)<br>', '/images/perfil/2.jpg', 'Marrakesh', 200.112, 64.9075, 273.772, 89.6903),
(3, '<b>Pa&iacute;s</b> Marruecos<br>\n<b>Regi&oacute;n</b>	Sus-Masa-Draa<br>\n<b>Prefectura</b>	Bandera de Agadir Ida-Outanane Agadir Ida-Outanane<br>\n<b>Altitud</b>	23 msnm<br>\n<b>Poblaci&oacute;n</b>	678.596 hab. (2004)<br>\n<b>Gentilicio</b>	Agadireno, -na<br>\n<b>Alcalde (2009)</b>	Tariq Kabbage (USFP)', '/images/perfil/3.jpg', 'Agadir', 171.875, 103.852, 180.469, 84.9698),
(4, '<b>Pa&iacute;s	</b> Sahara Occidental<br>(administrada de facto Marruecos)<br>\n<b>Regi&oacute;n</b>	El Aai&uacute;n-Bujador-Sakia El Hamra<br>\n<b>Altitud</b>	19 msnm<br>\n<b>Distancia</b>	870 km a Rabat<br>\n<b>Fundaci&oacute;n</b>	1938 \npor los espanoles<br>\n<b>Poblaci&oacute;n</b>	194.668 hab. (Estimaci&oacute;n de 2009)<br>\n<b>Gentilicio</b>	Aaiun&eacute;s/esa', '/images/perfil/4.jpg', 'Laayoune', 108.036, 141.616, 184.152, 155.778),
(5, '', '/images/perfil/5.jpg', 'Dakhla', 57.7009, 185.281, 111.719, 155.778),
(6, '', '', 'Nouakchott', 45.4241, 266.711, 57.7009, 224.226),
(7, '', '', 'Nema', 136.272, 312.736, 55.2455, 322.177),
(8, '', '', 'Tindouf', 187.835, 151.057, 196.429, 330.438),
(9, '', '', 'Adrar', 299.554, 149.877, 190.29, 130.995),
(10, '', '', 'Ain Salah', 341.295, 174.66, 398.996, 187.642),
(11, '', '', 'Tamanrasset', 343.75, 257.27, 169.42, 231.307),
(12, '', '', 'Biskra', 383.036, 60.1869, 421.094, 261.99),
(13, '', '', '', 446.875, 49.5657, 385.491, 36.5842),
(14, '', '', '', 428.46, 88.5102, 472.656, 69.628),
(15, '', '', '', 508.259, 114.473, 419.866, 116.833),
(16, '', '', '', 500.893, 190.002, 538.951, 122.734),
(17, '', '', '', 596.652, 133.355, 505.804, 256.09),
(18, '', '', '', 604.018, 349.32, 671.54, 88.5102),
(19, '', '', '', 511.942, 420.128, 613.839, 389.445),
(20, '', '', '', 740.29, 355.221, 470.201, 473.235),
(21, '', '', '', 845.871, 302.115, 870.424, 324.537),
(22, '', '', '', 753.795, 185.281, 773.438, 278.512),
(23, '', '', '', 741.518, 116.833, 756.25, 135.716),
(24, '', '', '', 903.571, 354.041, 766.071, 83.7896),
(25, '', '', '', 867.969, 351.681, 867.969, 342.239),
(26, '', '', '', 951.451, 402.426, 947.768, 389.445),
(27, '', '', '', 1000.56, 430.75, 977.232, 451.992),
(28, '', '', '', 1065.62, 378.824, 1057.03, 431.93),
(29, '', '', 'Sanaa', 973.549, 350.5, 1096.32, 359.941),
(30, '', '', 'Seiyun', 1038.62, 312.736, 933.036, 356.401),
(31, '', '', 'Salalah', 1106.96, 272.906, 1109, 309.294),
(32, '', '', 'Muscat', 1132.53, 155.385, 1162.2, 192.264),
(33, '', '', 'RasAlKhaimah', 1088.95, 129.815, 1117.19, 135.716),
(34, '', '', 'Abu Dhabi', 1076.67, 160.498, 1089.05, 155.876),
(35, '', '', 'Qatar', 1034.32, 155.876, 1091.41, 207.704),
(36, '', '', 'Riyadh', 974.777, 181.741, 995.647, 130.995),
(37, '', '', 'Medina', 877.79, 199.443, 990.737, 270.251),
(38, '', '', 'Baghdad', 917.076, 55.4664, 843.517, 187.838),
(39, '', '', 'Amman', 812.723, 97.9513, 960.045, 31.8637),
(40, '', '', 'Beirut', 796.456, 59.0068, 801.572, 125.389),
(41, '', '', 'Aleppo', 821.01, 20.1607, 820.499, 32.4537);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(200) NOT NULL AUTO_INCREMENT,
  `user_nick` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_role` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_diamonds` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_nick`, `user_role`, `user_email`, `user_password`, `user_diamonds`) VALUES
(9, 'aurora', '', 'aurawfwfv@egrg.com', 'aurora', 41),
(10, 'javier', '', 'javier@swre.com', 'javier', 3),
(11, 'abdel', '', 'abdel@gm.com', 'abdel', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `writing`
--

CREATE TABLE IF NOT EXISTS `writing` (
  `write_id` int(11) NOT NULL AUTO_INCREMENT,
  `fkTheme` int(11) NOT NULL,
  `write_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `write_textArabic` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `write_textSpanish` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `write_answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`write_id`),
  KEY `fkTheme` (`fkTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `writing`
--

INSERT INTO `writing` (`write_id`, `fkTheme`, `write_description`, `write_textArabic`, `write_textSpanish`, `write_answer`) VALUES
(9, 0, 'Nunca se une a la letra siguiente pero si con la anterior (solo hay seis letras de este tipo y la Alif es una de ellas)<br>\nSuena como la A castellana', '&#1575;', 'Alif', '&#1575;'),
(10, 0, 'Se escribe diferente seg&uacute;n este al principio, medio o final, esta formado por un palo pequeno casi vertical que sigue con una linea horizontal y un punto debajo; si es la &uacute;ltima letra se cierra con una curva hacia arriba\n<br>\nSuena como la B castellana', '&#1576;', 'Ba', '&#1576;'),
(11, 0, 'Igual que la anterior pero dos puntos encima.<br>\nSuena como la T castellana', '&#1578;', 'Ta', '&#1578;'),
(12, 0, 'Igual que las dos anteriores pero tres puntos encima<br>Suena como la TH inglesa', '&#1579;', 'Za', '&#1579;'),
(13, 1, 'Tiene diferente forma según su posición en la frase, su forma es como la boca de un cocodrilo que se une con una linea horizontal a la siguiente letra en cambio si es la última se cierra con un semicírculo hacia abajo.<br>\nSe pronuncia como una J francesa.', '&#1580;', 'Yim', '&#1580;'),
(14, 1, 'Igual que Yim pero sin punto', '&#1581;', 'Ha', '&#1581;'),
(15, 1, 'Igual que Yim pero con el punto encima', '&#1582;', 'Ja', '&#1582;'),
(16, 1, 'Igual que Yim pero con el punto encima', '&#1577;', 'TaBarmuta', '&#1577;');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `droping`
--
ALTER TABLE `droping`
  ADD CONSTRAINT `droping_ibfk_1` FOREIGN KEY (`fkTheme`) REFERENCES `themes` (`theme_id`);

--
-- Filtros para la tabla `selected`
--
ALTER TABLE `selected`
  ADD CONSTRAINT `selected_ibfk_1` FOREIGN KEY (`fkTheme`) REFERENCES `themes` (`theme_id`);

--
-- Filtros para la tabla `writing`
--
ALTER TABLE `writing`
  ADD CONSTRAINT `writing_ibfk_1` FOREIGN KEY (`fkTheme`) REFERENCES `themes` (`theme_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
