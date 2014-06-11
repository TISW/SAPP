-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2014 a las 04:27:14
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_ctrl_practicas`
--

-- --------------------------------------------------------

--
-- Estructura para la vista `not_presentacion`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`grupo33`@`localhost` SQL SECURITY DEFINER VIEW `not_presentacion` AS select `c`.`CAR_NOMBRE` AS `CAR_NOMBRE`,`c`.`CAR_SIGLA` AS `CAR_SIGLA`,`n`.`NOT_TITULO` AS `NOT_TITULO`,`n`.`NOT_CONTENIDO` AS `NOT_CONTENIDO`,`o`.`OFR_INICIO` AS `OFR_INICIO` from ((`carrera` `c` join `ofrece` `o` on((`c`.`CAR_CODIGO` = `o`.`CAR_CODIGO`))) join `noticias` `n` on((`o`.`NOT_ID` = `n`.`NOT_ID`))) where ((`o`.`OFR_ESTADO` = 'Activo') and (curdate() > `o`.`OFR_INICIO`) and (curdate() < `o`.`OFR_TERMINO`));

--
-- VIEW  `not_presentacion`
-- Datos: Ninguna
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
