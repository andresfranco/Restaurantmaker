-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2016 a las 22:25:23
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testphalcon`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `testprocedure` (IN `companyid` INT(4), IN `towerid` INT(4))  BEGIN
select c.name as companyname , t.number as towernumber  from company c inner join tower t
on (t.companyid =c.id) where c.id =companyid and  t.id =towerid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `action` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `action`
--

INSERT INTO `action` (`id`, `action`, `description`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'Manage Addresses', 'Permite la administración de direcciones', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 'Manage Security', 'Permite manejar la seguridad del sistema', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(4, 'Manage Users', 'Permite administrar Usuarios', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(5, 'Manage Roles', 'Permite administrar Roles', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(6, 'Manage Actions', 'Permite administrar Acciones', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(7, 'Create User', 'Permite agregar usuarios', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(8, 'Delete User', 'Permite eliminar usuarios', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(9, 'Edit User', 'Permite editar usuarios', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(10, 'Change User Password', 'Permite cambiar las contraseñas de los usuarios', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(11, 'Manage User Role', 'Permite asociar roles a los usuarios', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(12, 'Manage Languages', 'Permite ver los idiomas', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(13, 'Create Language', 'Permite agreagar un nuevo idioma', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(14, 'Edit Language', 'Permite editar un idioma', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(15, 'Delete Language', 'Permite eliminar un idioma', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(16, 'Manage Translations', 'Permite manejar las opciones de idiomas y traducciones', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(18, 'Create Translation', 'Permite crear traducciones', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(19, 'Edit Translation', 'Permite editar traducciones', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(20, 'Delete Translation', 'Permite eliminar traducciones', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(22, 'Manage Role Actions', 'Permite agregar acciones a un rol', 'admin', 'admin', '2015-09-29 11:25:15', '2015-09-29 11:25:15'),
(23, 'Create Role', 'Permite crear roles', 'admin', 'admin', '2015-09-29 11:30:56', '2015-09-29 11:30:56'),
(24, 'Edit Role', 'Permite editar roles', 'admin', 'admin', '2015-09-29 11:32:32', '2015-09-29 11:32:32'),
(25, 'Delete Role', 'Permite eliminar roles', 'admin', 'admin', '2015-09-29 11:32:48', '2015-09-29 11:32:48'),
(26, 'Create Action', 'Permite crear acciones', 'admin', 'admin', '2015-09-29 13:51:25', '2015-09-29 13:51:25'),
(27, 'Edit Action', 'Permite editar acciones', 'admin', 'admin', '2015-09-29 13:52:11', '2015-09-29 13:52:11'),
(28, 'Delete Action', 'Permite eliminar acciones', 'admin', 'admin', '2015-09-29 13:52:26', '2015-09-29 13:52:26'),
(29, 'Create Country', 'Permite crear paises', 'admin', 'admin', '2015-09-29 16:15:13', '2015-09-29 16:15:13'),
(30, 'Edit Country', 'Permite editar paises', 'admin', 'admin', '2015-09-29 16:15:40', '2015-09-29 16:15:40'),
(31, 'Delete Country', 'Permite eliminar paises', 'admin', 'admin', '2015-09-29 16:15:57', '2015-09-29 16:15:57'),
(32, 'Create State', 'Permite crear estados', 'admin', 'admin', '2015-09-30 09:44:25', '2015-09-30 09:44:25'),
(33, 'Edit State', 'Permite editar estados', 'admin', 'admin', '2015-09-30 09:44:41', '2015-09-30 09:44:41'),
(34, 'Delete State', 'Permite eliminar estados', 'admin', 'admin', '2015-09-30 09:45:07', '2015-09-30 09:45:07'),
(35, 'Create City', 'Permite crear ciudades', 'admin', 'admin', '2015-09-30 14:21:24', '2015-09-30 14:21:24'),
(36, 'Edit City', 'Permite editar ciudades', 'admin', 'admin', '2015-09-30 14:21:48', '2015-09-30 14:21:48'),
(37, 'Delete City', 'Permite eliminar ciudades', 'admin', 'admin', '2015-09-30 14:22:15', '2015-09-30 14:22:15'),
(38, 'Create Township', 'Permite crear sectores', 'admin', 'admin', '2015-09-30 14:22:36', '2015-09-30 14:22:36'),
(39, 'Edit Township', 'Permite editar sectores', 'admin', 'admin', '2015-09-30 15:11:31', '2015-09-30 15:11:31'),
(40, 'Delete Township', 'Permite eliminar sectores', 'admin', 'admin', '2015-09-30 15:11:49', '2015-09-30 15:11:49'),
(41, 'Create Neighborhood', 'Permite crear barrios', 'admin', 'admin', '2015-09-30 15:13:01', '2015-09-30 15:18:23'),
(42, 'Edit Neighborhood', 'Permite editar barrios ', 'admin', 'admin', '2015-09-30 15:13:31', '2015-09-30 15:18:44'),
(43, 'Delete Neighborhood', 'Permite eliminar barrios', 'admin', 'admin', '2015-09-30 15:14:48', '2015-09-30 15:19:25'),
(44, 'Create Address', 'Permite crear direcciones', 'admin', 'admin', '2015-10-02 14:22:45', '2015-10-02 14:22:45'),
(45, 'Edit Address', 'Permite editar direcciones', 'admin', 'admin', '2015-10-02 14:23:19', '2015-10-02 14:23:19'),
(46, 'Delete Address', 'Permite eliminar direcciones', 'admin', 'admin', '2015-10-02 14:23:44', '2015-10-02 14:23:44'),
(47, 'Manage Countries', 'Permite ver los paises', 'admin', 'admin', '2015-10-05 14:02:19', '2015-10-05 14:02:19'),
(48, 'Manage States', 'Permite ver los estados', 'admin', 'admin', '2015-10-05 14:02:38', '2015-10-05 14:02:38'),
(49, 'Manage Cities', 'Permite ver las ciudades', 'admin', 'admin', '2015-10-05 14:02:56', '2015-10-05 14:02:56'),
(50, 'Manage Townships', 'Permite ver los sectores', 'admin', 'admin', '2015-10-05 14:04:07', '2015-10-05 14:04:07'),
(51, 'Manage Neighborhoods', 'Permite ver los barrios', 'admin', 'admin', '2015-10-05 14:04:35', '2015-10-05 14:04:35'),
(52, 'Manage Media', 'Permite ver los archivos multimedia', 'admin', 'admin', '2015-10-05 14:24:41', '2015-10-05 14:24:41'),
(53, 'Manage Files', 'Permite ver administrar archivos', 'admin', 'admin', '2015-10-05 14:25:10', '2015-10-05 14:25:10'),
(54, 'Create Gallery', '', 'admin', 'admin', '2015-10-19 10:40:51', '2015-10-19 10:40:51'),
(55, 'Edit Gallery', '', 'admin', 'admin', '2015-10-19 10:41:02', '2015-10-19 10:41:02'),
(56, 'Delete Gallery', '', 'admin', 'admin', '2015-10-19 10:41:21', '2015-10-19 10:41:21'),
(57, 'Manage System Parameter', '', 'admin', 'admin', '2015-10-20 14:36:59', '2015-10-20 14:38:47'),
(58, 'Create System Parameter', '', 'admin', 'admin', '2015-10-20 14:47:06', '2015-10-20 14:47:06'),
(59, 'Edit System Parameter', '', 'admin', 'admin', '2015-10-20 14:47:19', '2015-10-20 14:47:19'),
(60, 'Delete System Parameter', '', 'admin', 'admin', '2015-10-20 14:47:32', '2015-10-20 14:47:32'),
(61, 'Create File Format', '', 'admin', 'admin', '2015-10-22 14:36:53', '2015-10-22 14:36:53'),
(62, 'Edit File Format', '', 'admin', 'admin', '2015-10-22 14:37:25', '2015-10-22 14:37:25'),
(63, 'Delete File Format', '', 'admin', 'admin', '2015-10-22 14:37:38', '2015-10-22 14:37:38'),
(64, 'Manage Articles', '', 'admin', 'admin', '2015-10-25 17:38:49', '2015-10-25 17:38:49'),
(65, 'Create Article', '', 'admin', 'admin', '2015-10-25 17:42:15', '2015-10-25 17:42:15'),
(66, 'Edit Article', '', 'admin', 'admin', '2015-10-25 17:42:22', '2015-10-25 17:42:22'),
(67, 'Delete Article', '', 'admin', 'admin', '2015-10-25 17:42:31', '2015-10-25 17:42:31'),
(68, 'Manage Article Comment', '', 'admin', 'admin', '2015-10-29 13:46:44', '2015-10-29 13:46:44'),
(69, 'Create Article Comment', '', 'admin', 'admin', '2015-10-29 14:07:29', '2015-10-29 14:07:29'),
(70, 'Edit Article Comment', '', 'admin', 'admin', '2015-10-29 14:07:40', '2015-10-29 14:07:40'),
(71, 'Delete Article Comment', '', 'admin', 'admin', '2015-10-29 14:08:03', '2015-10-29 14:08:03'),
(72, 'Delete File', '', 'admin', 'admin', '2015-11-23 09:03:26', '2015-11-23 09:03:26'),
(73, 'Manage Restaurant', '', 'admin', 'admin', '2015-11-25 11:19:24', '2015-11-25 11:21:11'),
(74, 'Manage Menu', '', 'admin', 'admin', '2015-12-09 10:22:54', '2015-12-09 10:22:54'),
(75, 'Create Menu', '', 'admin', 'admin', '2015-12-09 10:23:05', '2015-12-09 10:23:05'),
(76, 'Edit Menu', '', 'admin', 'admin', '2015-12-09 10:23:15', '2015-12-09 10:23:15'),
(77, 'Delete Menu', '', 'admin', 'admin', '2015-12-09 10:23:25', '2015-12-09 10:23:25'),
(78, 'Create Dish Category', '', 'admin', 'admin', '2015-12-15 15:16:14', '2015-12-15 15:16:14'),
(79, 'Edit Dish Category', '', 'admin', 'admin', '2015-12-15 15:16:26', '2015-12-15 15:16:26'),
(80, 'Manage Dish Category', '', 'admin', 'admin', '2015-12-15 15:16:35', '2015-12-15 15:16:35'),
(81, 'Delete Dish Category', '', 'admin', 'admin', '2015-12-15 15:16:45', '2015-12-15 15:16:45'),
(82, 'Create Article Translation', '', 'admin', 'admin', '2015-12-17 16:26:42', '2015-12-17 16:26:42'),
(83, 'Edit Article Translation', '', 'admin', 'admin', '2015-12-17 16:26:50', '2015-12-17 16:26:50'),
(84, 'Delete Article Translation', '', 'admin', 'admin', '2015-12-17 16:26:58', '2015-12-17 16:26:58'),
(85, 'Manage Article Translation', '', 'admin', 'admin', '2015-12-17 16:27:06', '2015-12-17 16:27:06'),
(86, 'Manage Event', '', 'admin', 'admin', '2015-12-18 16:17:11', '2015-12-18 16:17:11'),
(87, 'Create Event', '', 'admin', 'admin', '2015-12-18 16:17:20', '2015-12-18 16:17:20'),
(88, 'Edit Event', '', 'admin', 'admin', '2015-12-18 16:17:36', '2015-12-18 16:17:36'),
(89, 'Delete Event', '', 'admin', 'admin', '2015-12-18 16:17:45', '2015-12-18 16:17:45'),
(90, 'Create EventGallery', '', 'admin', 'admin', '2016-01-08 15:52:48', '2016-01-08 15:52:48'),
(91, 'Edit EventGallery', '', 'admin', 'admin', '2016-01-08 15:54:43', '2016-01-08 15:54:43'),
(92, 'Manage EventGallery', '', 'admin', 'admin', '2016-01-08 15:54:58', '2016-01-08 15:54:58'),
(93, 'Delete EventGallery', '', 'admin', 'admin', '2016-01-08 15:55:09', '2016-01-08 15:55:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `action_role`
--

CREATE TABLE `action_role` (
  `actionid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `action_role`
--

INSERT INTO `action_role` (`actionid`, `roleid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(1, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(4, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(4, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(5, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(6, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(7, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(7, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(8, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(8, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(9, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(9, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(10, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(10, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(11, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(11, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(12, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(13, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(14, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(15, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(16, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(18, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(19, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(19, 2, 'admin', 'admin', '2015-09-29 09:19:56', '2015-09-29 09:19:56'),
(20, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(22, 1, 'admin', 'admin', '2015-09-29 11:34:16', '2015-09-29 11:34:16'),
(23, 1, 'admin', 'admin', '2015-09-29 11:34:39', '2015-09-29 11:34:39'),
(24, 1, 'admin', 'admin', '2015-09-29 11:35:04', '2015-09-29 11:35:04'),
(25, 1, 'admin', 'admin', '2015-09-29 11:35:33', '2015-09-29 11:35:33'),
(26, 1, 'admin', 'admin', '2015-09-29 13:51:49', '2015-09-29 13:51:49'),
(27, 1, 'admin', 'admin', '2015-09-29 13:54:10', '2015-09-29 13:54:10'),
(28, 1, 'admin', 'admin', '2015-09-29 13:54:19', '2015-09-29 13:54:19'),
(29, 1, 'admin', 'admin', '2015-09-29 16:17:44', '2015-09-29 16:17:44'),
(30, 1, 'admin', 'admin', '2015-09-29 16:18:03', '2015-09-29 16:18:03'),
(31, 1, 'admin', 'admin', '2015-09-29 16:18:11', '2015-09-29 16:18:11'),
(32, 1, 'admin', 'admin', '2015-09-30 09:45:23', '2015-09-30 09:45:23'),
(33, 1, 'admin', 'admin', '2015-09-30 09:45:31', '2015-09-30 09:45:31'),
(34, 1, 'admin', 'admin', '2015-09-30 09:45:40', '2015-09-30 09:45:40'),
(35, 1, 'admin', 'admin', '2015-09-30 15:10:24', '2015-09-30 15:10:24'),
(36, 1, 'admin', 'admin', '2015-09-30 15:10:32', '2015-09-30 15:10:32'),
(37, 1, 'admin', 'admin', '2015-09-30 15:10:42', '2015-09-30 15:10:42'),
(38, 1, 'admin', 'admin', '2015-09-30 15:12:02', '2015-09-30 15:12:02'),
(39, 1, 'admin', 'admin', '2015-09-30 15:12:11', '2015-09-30 15:12:11'),
(40, 1, 'admin', 'admin', '2015-09-30 15:12:23', '2015-09-30 15:12:23'),
(41, 1, 'admin', 'admin', '2015-09-30 15:15:38', '2015-09-30 15:15:38'),
(42, 1, 'admin', 'admin', '2015-09-30 15:15:49', '2015-09-30 15:15:49'),
(43, 1, 'admin', 'admin', '2015-09-30 15:16:00', '2015-09-30 15:16:00'),
(44, 1, 'admin', 'admin', '2015-10-02 14:24:19', '2015-10-02 14:24:19'),
(45, 1, 'admin', 'admin', '2015-10-02 14:24:31', '2015-10-02 14:24:31'),
(46, 1, 'admin', 'admin', '2015-10-02 14:25:08', '2015-10-02 14:25:08'),
(47, 1, 'admin', 'admin', '2015-10-05 14:11:48', '2015-10-05 14:11:48'),
(48, 1, 'admin', 'admin', '2015-10-05 14:12:02', '2015-10-05 14:12:02'),
(49, 1, 'admin', 'admin', '2015-10-05 14:12:36', '2015-10-05 14:12:36'),
(50, 1, 'admin', 'admin', '2015-10-05 14:12:47', '2015-10-05 14:12:47'),
(51, 1, 'admin', 'admin', '2015-10-05 14:13:00', '2015-10-05 14:13:00'),
(52, 1, 'admin', 'admin', '2015-10-05 14:25:25', '2015-10-05 14:25:25'),
(53, 1, 'admin', 'admin', '2015-10-19 10:39:18', '2015-10-19 10:39:18'),
(54, 1, 'admin', 'admin', '2015-10-19 10:41:38', '2015-10-19 10:41:38'),
(55, 1, 'admin', 'admin', '2015-10-19 10:41:48', '2015-10-19 10:41:48'),
(56, 1, 'admin', 'admin', '2015-10-19 10:41:59', '2015-10-19 10:41:59'),
(57, 1, 'admin', 'admin', '2015-10-20 14:39:19', '2015-10-20 14:39:19'),
(58, 1, 'admin', 'admin', '2015-10-20 14:48:39', '2015-10-20 14:48:39'),
(59, 1, 'admin', 'admin', '2015-10-20 14:48:49', '2015-10-20 14:48:49'),
(60, 1, 'admin', 'admin', '2015-10-20 14:48:59', '2015-10-20 14:48:59'),
(61, 1, 'admin', 'admin', '2015-10-22 14:38:01', '2015-10-22 14:38:01'),
(62, 1, 'admin', 'admin', '2015-10-22 14:38:11', '2015-10-22 14:38:11'),
(63, 1, 'admin', 'admin', '2015-10-22 14:38:33', '2015-10-22 14:38:33'),
(64, 1, 'admin', 'admin', '2015-10-25 17:39:01', '2015-10-25 17:39:01'),
(65, 1, 'admin', 'admin', '2015-10-25 17:43:18', '2015-10-25 17:43:18'),
(66, 1, 'admin', 'admin', '2015-10-25 17:43:26', '2015-10-25 17:43:26'),
(67, 1, 'admin', 'admin', '2015-10-25 17:43:34', '2015-10-25 17:43:34'),
(68, 1, 'admin', 'admin', '2015-10-29 13:47:06', '2015-10-29 13:47:06'),
(69, 1, 'admin', 'admin', '2015-10-29 14:08:32', '2015-10-29 14:08:32'),
(70, 1, 'admin', 'admin', '2015-10-29 14:08:43', '2015-10-29 14:08:43'),
(71, 1, 'admin', 'admin', '2015-10-29 14:08:55', '2015-10-29 14:08:55'),
(72, 1, 'admin', 'admin', '2015-11-23 09:03:53', '2015-11-23 09:03:53'),
(73, 1, 'admin', 'admin', '2015-11-25 11:19:43', '2015-11-25 11:19:43'),
(74, 1, 'admin', 'admin', '2015-12-09 10:23:45', '2015-12-09 10:23:45'),
(75, 1, 'admin', 'admin', '2015-12-09 10:23:57', '2015-12-09 10:23:57'),
(76, 1, 'admin', 'admin', '2015-12-09 10:24:08', '2015-12-09 10:24:08'),
(77, 1, 'admin', 'admin', '2015-12-09 10:24:18', '2015-12-09 10:24:18'),
(78, 1, 'admin', 'admin', '2015-12-15 15:17:36', '2015-12-15 15:17:36'),
(79, 1, 'admin', 'admin', '2015-12-15 15:17:48', '2015-12-15 15:17:48'),
(80, 1, 'admin', 'admin', '2015-12-15 15:17:56', '2015-12-15 15:17:56'),
(81, 1, 'admin', 'admin', '2015-12-15 15:18:02', '2015-12-15 15:18:02'),
(82, 1, 'admin', 'admin', '2015-12-17 16:27:51', '2015-12-17 16:27:51'),
(83, 1, 'admin', 'admin', '2015-12-17 16:27:58', '2015-12-17 16:27:58'),
(84, 1, 'admin', 'admin', '2015-12-17 16:28:11', '2015-12-17 16:28:11'),
(85, 1, 'admin', 'admin', '2015-12-17 16:28:18', '2015-12-17 16:28:18'),
(86, 1, 'admin', 'admin', '2015-12-18 16:18:50', '2015-12-18 16:18:50'),
(87, 1, 'admin', 'admin', '2015-12-18 16:18:57', '2015-12-18 16:18:57'),
(88, 1, 'admin', 'admin', '2015-12-18 16:19:03', '2015-12-18 16:19:03'),
(89, 1, 'admin', 'admin', '2015-12-18 16:19:09', '2015-12-18 16:19:09'),
(90, 1, 'admin', 'admin', '2016-01-08 15:55:24', '2016-01-08 15:55:24'),
(91, 1, 'admin', 'admin', '2016-01-08 15:55:32', '2016-01-08 15:55:32'),
(92, 1, 'admin', 'admin', '2016-01-08 15:55:45', '2016-01-08 15:55:45'),
(93, 1, 'admin', 'admin', '2016-01-08 15:55:54', '2016-01-08 15:55:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `townshipid` int(11) DEFAULT NULL,
  `neighborhoodid` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `address`
--

INSERT INTO `address` (`id`, `countryid`, `stateid`, `cityid`, `townshipid`, `neighborhoodid`, `description`, `address`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 49, 16, 2, 4, 3, '', 'calle 100 edificio iserra 100 , torre 3 apartamento 10 B', 'admin', 'admin', '2015-10-05 11:36:07', '2015-11-25 11:47:46'),
(3, 49, 16, 2, 4, 3, NULL, 'test', 'admin', 'admin', '2015-11-27 11:25:46', '2015-11-27 11:25:46'),
(4, 49, 16, 2, 4, 3, NULL, 'tesat', 'admin', 'admin', '2015-11-27 12:58:15', '2015-11-27 12:58:15'),
(5, 49, 16, 2, 4, 3, NULL, 'test44', 'admin', 'admin', '2015-11-27 13:07:55', '2015-11-27 13:07:55'),
(6, 49, 16, 2, 4, 3, NULL, 'test55', 'admin', 'admin', '2015-11-27 13:34:45', '2015-11-27 13:34:45'),
(7, 49, 16, 2, 4, 3, NULL, 'test666', 'admin', 'admin', '2015-11-27 14:05:45', '2015-11-27 14:05:45'),
(8, 49, 16, 2, 4, 3, NULL, 'test77', 'admin', 'admin', '2015-11-27 14:08:01', '2015-11-27 14:08:01'),
(9, 49, 16, 2, 4, 3, NULL, 'test99', 'admin', 'admin', '2015-11-27 15:16:54', '2015-11-27 15:16:54'),
(10, 49, 16, 2, 4, 3, NULL, 'test99a', 'admin', 'admin', '2015-11-27 15:17:24', '2015-11-27 15:17:24'),
(11, 49, 16, 2, 4, 3, NULL, 'test99b', 'admin', 'admin', '2015-11-27 15:18:21', '2015-11-27 15:18:21'),
(12, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,test99ba', 'test99ba', 'admin', 'admin', '2015-11-27 15:19:28', '2015-11-27 15:19:28'),
(13, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,test778', 'test778', 'admin', 'admin', '2015-11-27 15:21:52', '2015-11-27 15:21:52'),
(14, 173, 1, 1, 1, 1, 'Panama,Panamá,Panamá,Juan Diaz,Chanis,test', 'test', 'admin', 'admin', '2015-12-03 15:36:35', '2015-12-03 15:36:35'),
(15, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,test111', 'test111', 'admin', 'admin', '2015-12-03 15:38:11', '2015-12-03 15:38:11'),
(16, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,ressd', 'ressd', 'admin', 'admin', '2015-12-03 15:51:34', '2015-12-03 15:51:34'),
(17, 173, 1, 1, 1, 1, 'Panama,Panamá,Panamá,Juan Diaz,Chanis,test22', 'test22', 'admin', 'admin', '2015-12-04 09:55:57', '2015-12-04 09:55:57'),
(18, 173, 1, 1, 1, 1, 'Panama,Panamá,Panamá,Juan Diaz,Chanis,test55', 'test55', 'admin', 'admin', '2015-12-04 10:24:04', '2015-12-04 10:24:04'),
(19, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,asasas', 'asasas', 'admin', 'admin', '2015-12-04 10:52:12', '2015-12-04 10:52:12'),
(20, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,test3434', 'test3434', 'admin', 'admin', '2015-12-04 10:54:05', '2015-12-04 10:54:05'),
(21, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,erererer', 'erererer', 'admin', 'admin', '2015-12-04 10:59:46', '2015-12-04 10:59:46'),
(22, 173, 1, 1, 1, 1, 'Panama,Panamá,Panamá,Juan Diaz,Chanis,testtt', 'testtt', 'admin', 'admin', '2015-12-04 11:29:15', '2015-12-04 11:29:15'),
(23, 173, 1, 1, 1, 1, ' Colombia,Cundinamarca,Norte,Cedritos,test45', 'aereeerre', 'admin', 'admin', '2015-12-04 14:43:53', '2015-12-04 14:43:53'),
(24, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,wewweew', 'wewweew', 'admin', 'admin', '2015-12-04 15:30:56', '2015-12-04 15:30:56'),
(25, 49, 16, 2, 4, 3, 'Colombia,Cundinamarca,Bogotá,Norte,Cedritos,testtt', 'testtt', 'admin', 'admin', '2015-12-07 13:53:20', '2015-12-07 13:53:20'),
(26, 173, 4, 3, 10, 4, 'Panama,Coclé,Penonomé,Penonomé,Barrio Random,Entrando por Hotel Dos Continentes, por Banistmo, Harin', 'Entrando por Hotel Dos Continentes, por Banistmo, Harinos Mall, Local #4', 'admin', 'admin', '2015-12-09 11:30:00', '2015-12-09 11:30:00'),
(27, 173, 1, 1, 1, 1, ' Panama,Coclé,Penonomé,Barrio Random,Entrando por Hotel Dos Continentes, por Banistmo, Harinos Mall, Local #4.', 'saasasa', 'admin', 'admin', '2015-12-09 12:54:44', '2015-12-09 12:54:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartment`
--

CREATE TABLE `apartment` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `towerid` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apartment`
--

INSERT INTO `apartment` (`id`, `companyid`, `towerid`, `name`) VALUES
(1, 1, 1, '16 C'),
(2, 1, 2, '16 C'),
(3, 2, 4, '1A'),
(4, 2, 5, '3B');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `apartmentlist`
--
CREATE TABLE `apartmentlist` (
`id` int(11)
,`name` varchar(45)
,`company` varchar(45)
,`tower` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `author` varchar(60) DEFAULT NULL,
  `content` text,
  `active` varchar(1) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` date NOT NULL,
  `modifydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`id`, `title`, `author`, `content`, `active`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(12, 'asssasa', 'sasassa', '<p>asddffdfdfd<br></p>', 'Y', 'admin', 'admin', '2015-10-27', '2015-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_comment`
--

CREATE TABLE `article_comment` (
  `id` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `comment` text,
  `active` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `article_comment`
--

INSERT INTO `article_comment` (`id`, `articleid`, `name`, `email`, `comment`, `active`) VALUES
(4, 12, 'test', 'test@test.com', '<p>assasa<br></p>', 'Y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_translation`
--

CREATE TABLE `article_translation` (
  `id` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `languagecode` varchar(10) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `content` text,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `article_translation`
--

INSERT INTO `article_translation` (`id`, `articleid`, `languagecode`, `title`, `content`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(3, 12, 'en', 'test', '<p>test<br></p>', 'admin', 'admin', '2015-12-17 17:34:46', '2015-12-17 17:34:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`id`, `stateid`, `countryid`, `city`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 1, 173, 'Panamá', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(2, 16, 49, 'Bogotá', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 4, 173, 'Penonomé', 'admin', 'admin', '2015-12-09 11:01:23', '2015-12-09 11:01:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `name`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'Empresa1', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(2, 'Empresa2', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 'Empresa3', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company_address`
--

CREATE TABLE `company_address` (
  `companyid` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `code` varchar(4) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id`, `code`, `country`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'AD', 'Andorra', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(2, 'AE', 'United Arab Emirates', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 'AF', 'Afghanistan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(4, 'AG', 'Antigua and Barbuda', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(5, 'AI', 'Anguilla', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(6, 'AL', 'Albania', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(7, 'AM', 'Armenia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(8, 'AO', 'Angola', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(9, 'AQ', 'Antarctica', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(10, 'AR', 'Argentina', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(11, 'AS', 'American Samoa', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(12, 'AT', 'Austria', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(13, 'AU', 'Australia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(14, 'AW', 'Aruba', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(15, 'AX', 'Åland', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(16, 'AZ', 'Azerbaijan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(17, 'BA', 'Bosnia and Herzegovina', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(18, 'BB', 'Barbados', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(19, 'BD', 'Bangladesh', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(20, 'BE', 'Belgium', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(21, 'BF', 'Burkina Faso', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(22, 'BG', 'Bulgaria', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(23, 'BH', 'Bahrain', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(24, 'BI', 'Burundi', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(25, 'BJ', 'Benin', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(26, 'BL', 'Saint Barthélemy', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(27, 'BM', 'Bermuda', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(28, 'BN', 'Brunei', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(29, 'BO', 'Bolivia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(30, 'BQ', 'Bonaire', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(31, 'BR', 'Brazil', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(32, 'BS', 'Bahamas', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(33, 'BT', 'Bhutan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(34, 'BV', 'Bouvet Island', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(35, 'BW', 'Botswana', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(36, 'BY', 'Belarus', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(37, 'BZ', 'Belize', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(38, 'CA', 'Canada', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(39, 'CC', 'Cocos [Keeling] Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(40, 'CD', 'Democratic Republic of the Congo', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(41, 'CF', 'Central African Republic', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(42, 'CG', 'Republic of the Congo', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(43, 'CH', 'Switzerland', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(44, 'CI', 'Ivory Coast', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(45, 'CK', 'Cook Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(46, 'CL', 'Chile', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(47, 'CM', 'Cameroon', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(48, 'CN', 'China', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(49, 'CO', 'Colombia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(50, 'CR', 'Costa Rica', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(51, 'CU', 'Cuba', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(52, 'CV', 'Cape Verde', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(53, 'CW', 'Curacao', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(54, 'CX', 'Christmas Island', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(55, 'CY', 'Cyprus', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(56, 'CZ', 'Czech Republic', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(57, 'DE', 'Germany', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(58, 'DJ', 'Djibouti', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(59, 'DK', 'Denmark', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(60, 'DM', 'Dominica', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(61, 'DO', 'Dominican Republic', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(62, 'DZ', 'Algeria', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(63, 'EC', 'Ecuador', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(64, 'EE', 'Estonia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(65, 'EG', 'Egypt', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(66, 'EH', 'Western Sahara', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(67, 'ER', 'Eritrea', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(68, 'ES', 'Spain', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(69, 'ET', 'Ethiopia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(70, 'FI', 'Finland', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(71, 'FJ', 'Fiji', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(72, 'FK', 'Falkland Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(73, 'FM', 'Micronesia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(74, 'FO', 'Faroe Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(75, 'FR', 'France', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(76, 'GA', 'Gabon', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(77, 'GB', 'United Kingdom', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(78, 'GD', 'Grenada', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(79, 'GE', 'Georgia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(80, 'GF', 'French Guiana', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(81, 'GG', 'Guernsey', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(82, 'GH', 'Ghana', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(83, 'GI', 'Gibraltar', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(84, 'GL', 'Greenland', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(85, 'GM', 'Gambia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(86, 'GN', 'Guinea', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(87, 'GP', 'Guadeloupe', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(88, 'GQ', 'Equatorial Guinea', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(89, 'GR', 'Greece', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(91, 'GT', 'Guatemala', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(92, 'GU', 'Guam', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(93, 'GW', 'Guinea-Bissau', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(94, 'GY', 'Guyana', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(95, 'HK', 'Hong Kong', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(96, 'HM', 'Heard Island and McDonald Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(97, 'HN', 'Honduras', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(98, 'HR', 'Croatia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(99, 'HT', 'Haiti', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(100, 'HU', 'Hungary', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(101, 'ID', 'Indonesia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(102, 'IE', 'Ireland', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(103, 'IL', 'Israel', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(104, 'IM', 'Isle of Man', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(105, 'IN', 'India', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(106, 'IO', 'British Indian Ocean Territory', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(107, 'IQ', 'Iraq', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(108, 'IR', 'Iran', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(109, 'IS', 'Iceland', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(110, 'IT', 'Italy', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(111, 'JE', 'Jersey', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(112, 'JM', 'Jamaica', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(113, 'JO', 'Jordan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(114, 'JP', 'Japan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(115, 'KE', 'Kenya', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(116, 'KG', 'Kyrgyzstan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(117, 'KH', 'Cambodia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(118, 'KI', 'Kiribati', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(119, 'KM', 'Comoros', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(120, 'KN', 'Saint Kitts and Nevis', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(121, 'KP', 'North Korea', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(122, 'KR', 'South Korea', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(123, 'KW', 'Kuwait', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(124, 'KY', 'Cayman Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(125, 'KZ', 'Kazakhstan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(126, 'LA', 'Laos', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(127, 'LB', 'Lebanon', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(128, 'LC', 'Saint Lucia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(129, 'LI', 'Liechtenstein', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(130, 'LK', 'Sri Lanka', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(131, 'LR', 'Liberia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(132, 'LS', 'Lesotho', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(133, 'LT', 'Lithuania', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(134, 'LU', 'Luxembourg', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(135, 'LV', 'Latvia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(136, 'LY', 'Libya', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(137, 'MA', 'Morocco', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(138, 'MC', 'Monaco', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(139, 'MD', 'Moldova', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(140, 'ME', 'Montenegro', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(141, 'MF', 'Saint Martin', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(142, 'MG', 'Madagascar', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(143, 'MH', 'Marshall Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(144, 'MK', 'Macedonia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(145, 'ML', 'Mali', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(146, 'MM', 'Myanmar [Burma]', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(147, 'MN', 'Mongolia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(148, 'MO', 'Macao', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(149, 'MP', 'Northern Mariana Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(150, 'MQ', 'Martinique', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(151, 'MR', 'Mauritania', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(152, 'MS', 'Montserrat', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(153, 'MT', 'Malta', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(154, 'MU', 'Mauritius', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(155, 'MV', 'Maldives', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(156, 'MW', 'Malawi', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(157, 'MX', 'Mexico', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(158, 'MY', 'Malaysia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(159, 'MZ', 'Mozambique', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(160, 'NA', 'Namibia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(161, 'NC', 'New Caledonia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(162, 'NE', 'Niger', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(163, 'NF', 'Norfolk Island', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(164, 'NG', 'Nigeria', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(165, 'NI', 'Nicaragua', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(166, 'NL', 'Netherlands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(167, 'NO', 'Norway', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(168, 'NP', 'Nepal', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(169, 'NR', 'Nauru', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(170, 'NU', 'Niue', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(171, 'NZ', 'New Zealand', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(172, 'OM', 'Oman', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(173, 'PA', 'Panama', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(174, 'PE', 'Peru', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(175, 'PF', 'French Polynesia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(176, 'PG', 'Papua New Guinea', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(177, 'PH', 'Philippines', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(178, 'PK', 'Pakistan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(179, 'PL', 'Poland', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(180, 'PM', 'Saint Pierre and Miquelon', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(181, 'PN', 'Pitcairn Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(182, 'PR', 'Puerto Rico', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(183, 'PS', 'Palestine', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(184, 'PT', 'Portugal', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(185, 'PW', 'Palau', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(186, 'PY', 'Paraguay', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(187, 'QA', 'Qatar', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(188, 'RE', 'Réunion', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(189, 'RO', 'Romania', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(190, 'RS', 'Serbia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(191, 'RU', 'Russia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(192, 'RW', 'Rwanda', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(193, 'SA', 'Saudi Arabia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(194, 'SB', 'Solomon Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(195, 'SC', 'Seychelles', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(196, 'SD', 'Sudan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(197, 'SE', 'Sweden', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(198, 'SG', 'Singapore', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(199, 'SH', 'Saint Helena', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(200, 'SI', 'Slovenia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(201, 'SJ', 'Svalbard and Jan Mayen', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(202, 'SK', 'Slovakia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(203, 'SL', 'Sierra Leone', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(204, 'SM', 'San Marino', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(205, 'SN', 'Senegal', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(206, 'SO', 'Somalia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(207, 'SR', 'Suriname', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(208, 'SS', 'South Sudan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(209, 'ST', 'São Tomé and Príncipe', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(210, 'SV', 'El Salvador', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(211, 'SX', 'Sint Maarten', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(212, 'SY', 'Syria', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(213, 'SZ', 'Swaziland', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(214, 'TC', 'Turks and Caicos Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(215, 'TD', 'Chad', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(216, 'TF', 'French Southern Territories', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(217, 'TG', 'Togo', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(218, 'TH', 'Thailand', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(219, 'TJ', 'Tajikistan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(220, 'TK', 'Tokelau', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(221, 'TL', 'East Timor', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(222, 'TM', 'Turkmenistan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(223, 'TN', 'Tunisia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(224, 'TO', 'Tonga', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(225, 'TR', 'Turkey', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(226, 'TT', 'Trinidad and Tobago', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(227, 'TV', 'Tuvalu', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(228, 'TW', 'Taiwan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(229, 'TZ', 'Tanzania', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(230, 'UA', 'Ukraine', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(231, 'UG', 'Uganda', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(232, 'UM', 'U.S. Minor Outlying Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(233, 'US', 'United States', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(234, 'UY', 'Uruguay', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(235, 'UZ', 'Uzbekistan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(236, 'VA', 'Vatican City', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(237, 'VC', 'Saint Vincent and the Grenadines', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(238, 'VE', 'Venezuela', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(239, 'VG', 'British Virgin Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(240, 'VI', 'U.S. Virgin Islands', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(241, 'VN', 'Vietnam', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(242, 'VU', 'Vanuatu', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(243, 'WF', 'Wallis and Futuna', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(244, 'WS', 'Samoa', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(245, 'XK', 'Kosovo', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(246, 'YE', 'Yemen', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(247, 'YT', 'Mayotte', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(248, 'ZA', 'South Africa', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(249, 'ZM', 'Zambia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(250, 'ZW', 'Zimbabwe', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `galleryid` int(11) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `image_path` varchar(2000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dish`
--

INSERT INTO `dish` (`id`, `menuid`, `categoryid`, `name`, `galleryid`, `price`, `image_path`, `description`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 2, 2, 'Sopa Gulash', 0, '5.00', 'sopa_gulash.jpg', 'sopa de tomate y carne', 'admin', 'admin', '2015-12-15 17:31:34', '2015-12-15 17:32:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dish_category`
--

CREATE TABLE `dish_category` (
  `id` int(11) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dish_category`
--

INSERT INTO `dish_category` (`id`, `category`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 'Entrance', 'admin', 'admin', '2015-12-15 15:31:38', '2015-12-16 19:01:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dish_translation`
--

CREATE TABLE `dish_translation` (
  `id` int(11) NOT NULL,
  `dishid` int(11) NOT NULL,
  `languagecode` varchar(10) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dish_translation`
--

INSERT INTO `dish_translation` (`id`, `dishid`, `languagecode`, `name`, `description`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 2, 'en', 'Gulash Soup', 'Tomato and meat soup', 'admin', 'admin', '2015-12-16 20:03:26', '2015-12-16 20:03:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `description` text,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`id`, `name`, `location`, `start_date`, `finish_date`, `description`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(6, 'saassa', '', '2015-12-24 16:50:00', '2015-12-31 03:10:00', '', 'admin', 'admin', '2015-12-21 20:18:53', '2015-12-21 20:40:02'),
(7, 'test', 'Gambrinus Penonomé', '2016-01-09 08:00:00', '2016-01-10 03:00:00', 'test', 'admin', 'admin', '2016-01-06 16:54:32', '2016-01-06 16:54:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_gallery`
--

CREATE TABLE `event_gallery` (
  `eventid` int(11) NOT NULL,
  `galleryid` int(11) NOT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `event_gallery`
--

INSERT INTO `event_gallery` (`eventid`, `galleryid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(6, 4, 'admin', 'admin', '2016-01-08 22:20:34', '2016-01-08 22:20:34'),
(7, 4, 'admin', 'admin', '2016-01-08 22:01:00', '2016-01-08 22:01:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `path` varchar(2000) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `file`
--

INSERT INTO `file` (`id`, `name`, `type`, `path`, `size`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'Jellyfish.jpg', 'image/jpeg', 'C:\\xampp\\htdocs\\Phalcontest\\public\\files\\images\\Jellyfish.jpg', '775702', 'admin', 'admin', '2015-11-13 08:43:55', '2015-11-13 08:43:55'),
(2, 'Koala.jpg', 'image/jpeg', 'C:\\xampp\\htdocs\\Phalcontest\\public\\files\\images\\Koala.jpg', '780831', 'admin', 'admin', '2015-11-13 08:51:35', '2015-11-13 08:51:35'),
(3, 'logo.png', 'image/png', 'C:\\xampp\\htdocs\\Phalcontest\\public\\files\\images\\logo.png', '14881', 'admin', 'admin', '2015-12-09 11:31:14', '2015-12-09 11:31:14'),
(4, 'sopa_gulash.jpg', 'image/jpeg', 'C:\\xampp\\htdocs\\Phalcontest\\public\\files\\images\\sopa_gulash.jpg', '3860', 'admin', 'admin', '2015-12-15 17:12:23', '2015-12-15 17:12:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_format`
--

CREATE TABLE `file_format` (
  `id` int(11) NOT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `accept` varchar(1) DEFAULT NULL,
  `mimetype` varchar(80) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `file_format`
--

INSERT INTO `file_format` (`id`, `extension`, `type`, `accept`, `mimetype`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'jpg', 'image', 'T', 'image/jpeg', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:24:03'),
(2, 'gif', 'image', 'T', 'image/gif', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:24:43'),
(3, 'png', 'image', 'T', 'image/png', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:24:56'),
(5, 'jpeg', 'image', 'T', 'image/jpg', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:25:57'),
(6, 'mpg', 'video', 'T', 'video/mpeg', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:26:51'),
(7, 'mpeg', 'video', 'T', 'video/mpeg', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:27:05'),
(8, 'rm', 'video', 'T', 'application/vnd.rn-realmedia', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:27:45'),
(9, 'avi', 'video', 'T', 'video/x-msvideo', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:28:58'),
(10, 'mkv', 'video', 'T', 'video/mkv', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:41:48'),
(11, 'flv', 'video', 'T', 'video/x-flv', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:42:32'),
(12, 'mov', 'video', 'T', 'video/quicktime', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:44:08'),
(13, 'wmv', 'video', 'T', 'video/x-ms-wmv', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:44:37'),
(14, 'asf', 'video', 'T', 'video/x-ms-asf', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:45:04'),
(15, 'mp4', 'video', 'T', 'video/mp4', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:46:01'),
(16, 'rtf', 'document', 'T', 'application/rtf', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:46:35'),
(17, 'doc', 'document', 'T', 'application/msword', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:47:08'),
(18, 'docx', 'document', 'T', 'application/vnd.openxmlformats-officedocument', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-24 10:20:15'),
(19, 'csv', 'document', 'T', 'text/csv', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:48:56'),
(20, 'xls', 'document', 'T', 'application/vnd.ms-excel', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:49:27'),
(21, 'xlsx', 'document', 'T', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:49:54'),
(22, 'pptx', 'document', 'T', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:50:27'),
(23, 'ppt', 'document', 'T', 'application/vnd.ms-powerpoint', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:51:03'),
(24, 'odt', 'document', 'T', 'application/vnd.oasis.opendocument.text', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:51:45'),
(25, 'pdf', 'document', 'T', 'application/pdf', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:52:11'),
(26, 'txt', 'document', 'T', 'text/plain', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:52:36'),
(27, 'html', 'document', 'T', 'text/html', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:53:01'),
(28, 'xml', 'document', 'T', 'application/xml', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:53:35'),
(29, 'php', 'document', 'T', 'application/x-httpd-php', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:57:07'),
(30, 'css', 'document', 'T', 'text/css', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:57:46'),
(31, 'js', 'document', 'T', 'application/javascript', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:58:19'),
(32, 'rar', 'other', 'T', 'application/x-rar-compressed', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:58:59'),
(33, 'zip', 'other', 'T', 'application/zip', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 15:59:50'),
(34, '7z', 'other', 'T', 'application/x-7z-compressed', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 16:00:28'),
(35, 'deb', 'other', 'T', 'application/x-debian-package', 'admin', 'admin', '2015-09-16 09:38:01', '2015-11-23 16:01:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `title`, `type`, `description`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(4, 'prueba', 'prueba', 'image', '', 'admin', 'admin', '2015-11-11 10:07:16', '2015-11-11 10:07:17'),
(5, 'test', 'dsds', 'image', 'sd', 'admin', 'admin', '2016-01-08 20:22:11', '2016-01-08 20:22:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_image`
--

CREATE TABLE `gallery_image` (
  `id` int(11) NOT NULL,
  `galleryid` int(11) NOT NULL,
  `imageid` int(11) NOT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gallery_image`
--

INSERT INTO `gallery_image` (`id`, `galleryid`, `imageid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(6, 4, 9, 'admin', 'admin', '2015-11-12 14:31:33', '2015-11-12 14:31:33'),
(7, 4, 10, 'admin', 'admin', '2015-11-12 16:11:56', '2015-11-12 16:11:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `path` varchar(2000) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`id`, `name`, `title`, `path`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(9, 'failure_succes.jpg', 'failure_succes.jpg', 'C:\\xampp\\htdocs\\Phalcontest\\public\\files\\galleries\\prueba_gallery\\failure_succes.jpg', 'admin', 'admin', '2015-11-12 14:31:33', '2015-11-12 14:31:33'),
(10, 'error.png', 'error.png', 'C:\\xampp\\htdocs\\Phalcontest\\public\\files\\galleries\\prueba_gallery\\error.png', 'admin', 'admin', '2015-11-12 16:11:56', '2015-11-12 16:11:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `code` varchar(10) NOT NULL,
  `language` varchar(60) DEFAULT NULL,
  `flag` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`code`, `language`, `flag`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
('en', 'Ingles', 'us.png', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
('es', 'Español', 'es.png', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `active` varchar(1) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `restaurantid`, `name`, `active`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 7, 'Menu Principal', 'Y', 'admin', 'admin', '2015-12-09 13:59:10', '2015-12-09 13:59:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `neighborhood`
--

CREATE TABLE `neighborhood` (
  `id` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `townshipid` int(11) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `neighborhood`
--

INSERT INTO `neighborhood` (`id`, `cityid`, `townshipid`, `neighborhood`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 1, 1, 'Chanis', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(2, 1, 1, 'test', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 2, 4, 'Cedritos', 'admin', 'admin', '2015-10-05 11:35:22', '2015-10-05 11:35:22'),
(4, 3, 10, 'Barrio Random', 'admin', 'admin', '2015-12-09 11:26:47', '2015-12-09 11:26:47');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `neighborhoodview`
--
CREATE TABLE `neighborhoodview` (
`id` int(11)
,`city` varchar(100)
,`country` varchar(100)
,`state` varchar(100)
,`township` varchar(100)
,`neighborhood` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(65) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `logo_path` varchar(2000) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `addressid` int(11) NOT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `phone`, `email`, `logo_path`, `website`, `addressid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(7, 'Gambrinus Penonomé', '908-5894', 'pedidos@gambrinus.net', 'logo.png', '', 27, 'admin', 'admin', '2015-12-09 12:54:45', '2015-12-09 13:11:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `role`, `description`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'Administrator', 'Administrador del sistema', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(2, 'Standard User', 'Standard User', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `state` varchar(100) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `state`
--

INSERT INTO `state` (`id`, `countryid`, `state`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 173, 'Panamá', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(2, 173, 'Panamá Oeste', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 173, 'Colon', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(4, 173, 'Coclé', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(5, 173, 'Herrera', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(6, 173, 'Los Santos', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(7, 173, 'Veraguas', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(8, 173, 'Chiriquí', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(9, 173, 'Bocas del Toro', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(10, 173, 'Darién', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(11, 173, 'Comarca Guna Yala', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(12, 173, 'Comarca Emberá-Wounaan', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(13, 173, 'Comarca Ngäbe-Buglé', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(14, 173, 'Comarca Madungandi', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(15, 173, 'Comarca Wargandí', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(16, 49, 'Cundinamarca', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_parameter`
--

CREATE TABLE `system_parameter` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `parameter` varchar(60) DEFAULT NULL,
  `textvalue` text,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `system_parameter`
--

INSERT INTO `system_parameter` (`id`, `code`, `parameter`, `textvalue`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(4, 'file_upload', 'max_file_size', '95000000', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(5, 'file_upload', 'min_file_size', '0', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(6, 'file_upload', 'max_number_of_files', '10', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testtabla`
--

CREATE TABLE `testtabla` (
  `id` int(11) NOT NULL,
  `test` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tower`
--

CREATE TABLE `tower` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tower`
--

INSERT INTO `tower` (`id`, `companyid`, `number`) VALUES
(1, 1, 'Torre 1'),
(2, 1, 'Torre 2'),
(3, 1, 'Torre 3'),
(4, 2, 'Torre 1'),
(5, 2, 'Torre 2'),
(6, 2, 'Torre 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `township`
--

CREATE TABLE `township` (
  `id` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `township` varchar(100) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `township`
--

INSERT INTO `township` (`id`, `cityid`, `township`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 1, 'Juan Diaz', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(4, 2, 'Norte', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(5, 1, 'San Francisco2', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(7, 1, 'Tocumen', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(8, 2, 'Usaquen2', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(9, 1, 'sasasa', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(10, 3, 'Penonomé', 'admin', 'admin', '2015-12-09 11:18:43', '2015-12-09 11:18:43');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `townshipview`
--
CREATE TABLE `townshipview` (
`id` int(11)
,`cityid` int(11)
,`city` varchar(100)
,`country` varchar(100)
,`state` varchar(100)
,`township` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `translation`
--

CREATE TABLE `translation` (
  `id` int(11) NOT NULL,
  `languagecode` varchar(10) NOT NULL,
  `translatekey` varchar(50) DEFAULT NULL,
  `value` varchar(2000) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `translation`
--

INSERT INTO `translation` (`id`, `languagecode`, `translatekey`, `value`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'en', 'Español', 'Spanish', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(2, 'es', 'English', 'Ingles', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(3, 'en', 'Ingles', 'English', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(4, 'en', 'Seleccione un idioma', 'Select a language', 'admin', 'admin', '2015-09-28 23:14:26', '2015-09-28 23:14:26'),
(6, 'en', 'translation.required.key', 'You must enter a key', 'admin', 'admin', '2015-09-28 23:18:35', '2015-09-28 23:18:35'),
(7, 'es', 'translation.required.key', 'Debe ingresar una llave', 'admin', 'admin', '2015-09-28 23:19:30', '2015-09-28 23:19:30'),
(8, 'en', 'translation.required.value', 'You must enter a value', 'admin', 'admin', '2015-09-28 23:21:12', '2015-09-28 23:21:12'),
(9, 'es', 'translation.required.value', 'Debe ingresar un valor', 'admin', 'admin', '2015-09-28 23:21:31', '2015-09-28 23:21:31'),
(10, 'en', 'translation.required.language', 'You must select a language', 'admin', 'admin', '2015-09-28 23:24:47', '2015-09-28 23:24:47'),
(11, 'es', 'translation.required.language', 'Debe seleccionar un idioma', 'admin', 'admin', '2015-09-28 23:25:06', '2015-09-28 23:25:06'),
(12, 'en', 'translation.key.exist', 'The key for this language already exist', 'admin', 'admin', '2015-09-29 01:58:20', '2015-09-29 01:58:20'),
(13, 'es', 'translation.key.exist', 'Ya existe esa llave para el idioma seleccionado', 'admin', 'admin', '2015-09-29 01:59:17', '2015-09-29 01:59:17'),
(15, 'en', 'Traducciones', 'Translations', 'admin', 'admin', '2015-09-29 02:01:00', '2015-09-29 02:01:00'),
(16, 'en', 'Idioma', 'Language', 'admin', 'admin', '2015-09-29 02:04:13', '2015-09-29 02:04:13'),
(17, 'en', 'Valor', 'Value', 'admin', 'admin', '2015-09-29 02:04:27', '2015-09-29 02:04:27'),
(18, 'en', 'Llave', 'Key', 'admin', 'admin', '2015-09-29 02:04:39', '2015-09-29 02:04:39'),
(19, 'en', 'Buscar', 'Search', 'admin', 'admin', '2015-09-29 02:07:13', '2015-09-29 02:07:13'),
(20, 'en', 'Primero', 'First', 'admin', 'admin', '2015-09-29 02:07:50', '2015-09-29 02:07:50'),
(21, 'en', 'Anterior', 'Back', 'admin', 'admin', '2015-09-29 02:08:08', '2015-09-29 02:08:08'),
(22, 'en', 'Siguiente', 'Next', 'admin', 'admin', '2015-09-29 02:08:25', '2015-09-29 02:08:25'),
(23, 'en', 'Ultimo', 'Last', 'admin', 'admin', '2015-09-29 02:08:44', '2015-09-29 02:08:44'),
(24, 'en', 'Página', 'Page', 'admin', 'admin', '2015-09-29 02:09:04', '2015-09-29 02:09:04'),
(25, 'en', 'de', 'of', 'admin', 'admin', '2015-09-29 02:09:18', '2015-09-29 02:09:18'),
(26, 'en', 'No se encontraron Traducciones', 'Not found translations', 'admin', 'admin', '2015-09-29 02:10:11', '2015-09-29 02:10:11'),
(27, 'en', 'Perfil', 'Profile', 'admin', 'admin', '2015-09-29 02:23:54', '2015-09-29 02:23:54'),
(28, 'en', 'logout.text', 'Logout', 'admin', 'admin', '2015-09-29 02:24:48', '2015-09-29 02:24:48'),
(29, 'es', 'logout.text', 'Salir', 'admin', 'admin', '2015-09-29 02:30:05', '2015-09-29 02:30:05'),
(30, 'en', 'Direcciones', 'Addresses', 'admin', 'admin', '2015-09-29 02:30:54', '2015-09-29 02:30:54'),
(31, 'en', 'Seguridad', 'Security', 'admin', 'admin', '2015-09-29 02:31:08', '2015-09-29 02:31:08'),
(32, 'en', 'Paises', 'Countries', 'admin', 'admin', '2015-09-29 02:31:26', '2015-09-29 02:31:26'),
(33, 'en', 'Estados', 'States', 'admin', 'admin', '2015-09-29 02:31:39', '2015-09-29 02:31:39'),
(34, 'en', 'Ciudades', 'Cities', 'admin', 'admin', '2015-09-29 02:32:06', '2015-09-29 02:32:06'),
(35, 'en', 'Sectores', 'Townships', 'admin', 'admin', '2015-09-29 02:32:30', '2015-09-29 02:32:30'),
(36, 'en', 'Barrios', 'Neigborhoods', 'admin', 'admin', '2015-09-29 02:32:58', '2015-09-29 02:32:58'),
(37, 'en', 'Usuarios', 'Users', 'admin', 'admin', '2015-09-29 02:33:17', '2015-09-29 02:33:17'),
(38, 'en', 'Acciones', 'Actions', 'admin', 'admin', '2015-09-29 02:33:37', '2015-09-29 02:33:37'),
(39, 'en', 'Idiomas', 'Languages', 'admin', 'admin', '2015-09-29 02:33:55', '2015-09-29 02:33:55'),
(40, 'en', 'Nueva Traducción', 'New Translation', 'admin', 'admin', '2015-09-29 02:35:21', '2015-09-29 02:35:21'),
(41, 'en', 'Guardar', 'Save', 'admin', 'admin', '2015-09-29 02:35:36', '2015-09-29 02:35:36'),
(42, 'en', 'Cancelar', 'Cancel', 'admin', 'admin', '2015-09-29 02:35:50', '2015-09-29 02:35:50'),
(43, 'en', 'Editar Traducción', 'Edit Translation', 'admin', 'admin', '2015-09-29 02:36:42', '2015-09-29 02:36:42'),
(45, 'en', 'Esta seguro que desea eliminar esta traducción?', 'Are you sure you want to delete this translation?', 'admin', 'admin', '2015-09-29 02:39:04', '2015-09-29 02:39:04'),
(46, 'en', 'Eliminar', 'Delete', 'admin', 'admin', '2015-09-29 02:40:09', '2015-09-29 02:40:09'),
(47, 'en', 'Código', 'Code', 'admin', 'admin', '2015-09-29 09:25:32', '2015-09-29 09:25:32'),
(48, 'en', 'Bandera', 'Flag', 'admin', 'admin', '2015-09-29 09:25:47', '2015-09-29 09:25:47'),
(49, 'en', 'Nuevo idioma', 'New Language', 'admin', 'admin', '2015-09-29 09:28:33', '2015-09-29 09:29:19'),
(50, 'en', 'Nuevo Usuario', 'New User', 'admin', 'admin', '2015-09-29 09:35:51', '2015-09-29 09:35:51'),
(51, 'en', 'username.required', 'You must enter a username', 'admin', 'admin', '2015-09-29 09:36:40', '2015-09-29 09:36:40'),
(52, 'es', 'username.required', 'Debe ingresar un usuario', 'admin', 'admin', '2015-09-29 09:37:16', '2015-09-29 09:37:16'),
(53, 'en', 'email.required', 'You must to enter an email', 'admin', 'admin', '2015-09-29 09:41:11', '2015-09-29 09:41:11'),
(54, 'es', 'email.required', 'Debe ingresar un email', 'admin', 'admin', '2015-09-29 09:41:26', '2015-09-29 09:41:26'),
(55, 'en', 'pass.required', 'You must enter a password', 'admin', 'admin', '2015-09-29 09:42:22', '2015-09-29 09:42:22'),
(56, 'es', 'pass.required', 'Debe ingresar un password', 'admin', 'admin', '2015-09-29 09:42:41', '2015-09-29 09:42:41'),
(57, 'en', 'confirm.required', 'You must enter a password confirmation', 'admin', 'admin', '2015-09-29 09:43:59', '2015-09-29 09:43:59'),
(58, 'es', 'confirm.required', 'Debe ingresar una confirmación de password', 'admin', 'admin', '2015-09-29 09:44:51', '2015-09-29 09:44:51'),
(59, 'es', 'User Name', 'Usuario', 'admin', 'admin', '2015-09-29 09:45:29', '2015-09-29 09:45:29'),
(60, 'en', 'Confirmar Password', 'Confirm Password', 'admin', 'admin', '2015-09-29 09:47:10', '2015-09-29 09:47:10'),
(61, 'en', 'username.unique', 'This username already exist', 'admin', 'admin', '2015-09-29 09:48:31', '2015-09-29 09:48:31'),
(62, 'es', 'username.unique', 'Ya existe un usuario con ese nombre', 'admin', 'admin', '2015-09-29 09:54:01', '2015-09-29 09:54:01'),
(63, 'en', 'email.valid', 'You must enter a valid email', 'admin', 'admin', '2015-09-29 09:54:35', '2015-09-29 09:54:35'),
(64, 'es', 'email.valid', 'Debe ingresar un email válido', 'admin', 'admin', '2015-09-29 09:55:06', '2015-09-29 09:55:06'),
(65, 'en', 'Editar Usuario', 'Edit User', 'admin', 'admin', '2015-09-29 09:56:44', '2015-09-29 09:56:44'),
(66, 'en', 'Esta seguro que desea eliminar este Usuario?', 'Are you sure you want to delete this User?', 'admin', 'admin', '2015-09-29 09:57:34', '2015-09-29 09:57:34'),
(67, 'en', 'user.constraintviolation', 'You can not delete this user , there are data associated', 'admin', 'admin', '2015-09-29 10:06:44', '2015-09-29 10:07:17'),
(68, 'es', 'user.constraintviolation', 'No se puede eliminar el usuario ya que tiene otros datos asociados', 'admin', 'admin', '2015-09-29 10:09:13', '2015-09-29 10:09:13'),
(69, 'en', 'user.equal.confirm_password', 'Password and Confirmation password have to be equal', 'admin', 'admin', '2015-09-29 10:33:00', '2015-09-29 10:33:00'),
(70, 'es', 'user.equal.confirm_password', 'El password y la confirmación de password deben ser iguales', 'admin', 'admin', '2015-09-29 10:33:36', '2015-09-29 10:33:36'),
(71, 'en', 'confirm.equal', 'Password and Confirmation password have to be equal', 'admin', 'admin', '2015-09-29 10:38:41', '2015-09-29 10:38:41'),
(72, 'es', 'confirm.equal', 'El password y la confirmación de password deben ser iguales', 'admin', 'admin', '2015-09-29 10:39:09', '2015-09-29 10:39:09'),
(73, 'en', 'Rol', 'Role', 'admin', 'admin', '2015-09-29 11:35:59', '2015-09-29 11:35:59'),
(74, 'en', 'Descripción', 'Description', 'admin', 'admin', '2015-09-29 11:36:44', '2015-09-29 11:36:44'),
(75, 'en', 'Nuevo Rol', 'New Role', 'admin', 'admin', '2015-09-29 11:40:09', '2015-09-29 11:40:09'),
(76, 'en', 'role.required', 'You must enter a role', 'admin', 'admin', '2015-09-29 11:43:02', '2015-09-29 11:43:02'),
(77, 'es', 'role.required', 'Debe ingresar un rol', 'admin', 'admin', '2015-09-29 11:44:01', '2015-09-29 11:44:01'),
(78, 'en', 'role.exist', 'This role already exist', 'admin', 'admin', '2015-09-29 11:46:02', '2015-09-29 11:46:02'),
(79, 'es', 'role.exist', 'Ya existe un rol con ese nombre', 'admin', 'admin', '2015-09-29 11:46:33', '2015-09-29 11:46:33'),
(80, 'en', 'role.constraintviolation', 'You can not delete this role , there are data associated', 'admin', 'admin', '2015-09-29 11:54:53', '2015-09-29 11:54:53'),
(81, 'es', 'role.constraintviolation', 'No se puede eliminar el rol ya que tiene otros datos asociados', 'admin', 'admin', '2015-09-29 11:55:19', '2015-09-29 11:55:19'),
(82, 'en', 'Esta seguro que desea eliminar este Rol?', 'Are you sure you want to delete this Role?', 'admin', 'admin', '2015-09-29 13:23:59', '2015-09-29 13:24:42'),
(83, 'en', 'action.required', 'You must enter an action', 'admin', 'admin', '2015-09-29 13:37:58', '2015-09-29 13:37:58'),
(84, 'es', 'action.required', 'Debe ingresar una acción', 'admin', 'admin', '2015-09-29 13:38:16', '2015-09-29 13:38:16'),
(85, 'en', 'action.exist', 'Already exist an action with this name', 'admin', 'admin', '2015-09-29 13:41:49', '2015-09-29 13:41:49'),
(86, 'es', 'action.exist', 'Ya existe una acción con ese nombre', 'admin', 'admin', '2015-09-29 13:42:15', '2015-09-29 13:42:15'),
(87, 'en', 'action.constraintviolation', 'You can not delete this action , there are data associated', 'admin', 'admin', '2015-09-29 13:44:01', '2015-09-29 13:44:01'),
(88, 'es', 'action.constraintviolation', 'No se puede eliminar la acción ya que tiene otros datos asociados', 'admin', 'admin', '2015-09-29 13:44:35', '2015-09-29 13:44:35'),
(89, 'en', 'Acción', 'Action', 'admin', 'admin', '2015-09-29 13:55:11', '2015-09-29 13:55:11'),
(90, 'en', 'Nueva Acción', 'New Action', 'admin', 'admin', '2015-09-29 13:55:50', '2015-09-29 13:55:50'),
(91, 'en', 'Editar Acción', 'Edit Action', 'admin', 'admin', '2015-09-29 13:57:10', '2015-09-29 13:57:41'),
(92, 'en', 'Esta seguro que desea eliminar esta acción?', 'Are you sure you want to delete this action?', 'admin', 'admin', '2015-09-29 13:59:47', '2015-09-29 13:59:47'),
(93, 'en', 'Roles del Usuario', 'User Roles', 'admin', 'admin', '2015-09-29 14:28:56', '2015-09-29 14:30:06'),
(94, 'en', 'Nuevo Rol del usuario', 'New User Role', 'admin', 'admin', '2015-09-29 14:31:51', '2015-09-29 14:31:51'),
(95, 'en', 'userrole.roleid.required', 'You must select a role', 'admin', 'admin', '2015-09-29 14:44:07', '2015-09-29 14:44:07'),
(96, 'es', 'userrole.roleid.required', 'Debe seleccionar un rol', 'admin', 'admin', '2015-09-29 14:44:30', '2015-09-29 14:44:30'),
(97, 'en', 'Seleccione un Rol', 'Select a Role', 'admin', 'admin', '2015-09-29 14:55:37', '2015-09-29 14:55:37'),
(98, 'en', 'Esta seguro que desea quitar ese rol?', 'Are you sure you want to quit this role?', 'admin', 'admin', '2015-09-29 14:57:54', '2015-09-29 14:57:54'),
(99, 'en', 'Acciones del Rol', 'Role Actions', 'admin', 'admin', '2015-09-29 15:00:19', '2015-09-29 15:00:19'),
(100, 'en', 'Nueva acción del rol', 'New rol action', 'admin', 'admin', '2015-09-29 15:04:11', '2015-09-29 15:04:11'),
(101, 'en', 'Seleccione una Acción', 'Select an Action', 'admin', 'admin', '2015-09-29 15:19:06', '2015-09-29 15:19:06'),
(102, 'en', 'actionrole.actionid.required', 'You must select an action', 'admin', 'admin', '2015-09-29 15:22:28', '2015-09-29 15:22:28'),
(103, 'es', 'actionrole.actionid.required', 'Debe seleccionar una acción', 'admin', 'admin', '2015-09-29 15:22:44', '2015-09-29 15:22:44'),
(104, 'en', 'Esta seguro que desea quitar esta acción?', 'Are you sure you want to quit this action?', 'admin', 'admin', '2015-09-29 15:25:45', '2015-09-29 15:25:45'),
(105, 'en', 'País', 'Country', 'admin', 'admin', '2015-09-29 16:14:45', '2015-09-29 16:14:45'),
(106, 'en', 'Nuevo País', 'New Country', 'admin', 'admin', '2015-09-29 16:20:03', '2015-09-29 16:20:38'),
(107, 'en', 'country.code.required', 'You must enter a code', 'admin', 'admin', '2015-09-29 16:25:16', '2015-09-29 16:25:16'),
(108, 'es', 'country.code.required', 'Debe ingresar un código', 'admin', 'admin', '2015-09-29 16:25:32', '2015-09-29 16:25:32'),
(109, 'en', 'country.required', 'You must enter a country', 'admin', 'admin', '2015-09-29 16:26:11', '2015-09-29 16:26:11'),
(110, 'es', 'country.required', 'Debe ingresar un país', 'admin', 'admin', '2015-09-29 16:26:26', '2015-09-29 16:26:26'),
(111, 'en', 'country.code.exist', 'Already exist a country with this code', 'admin', 'admin', '2015-09-30 09:18:45', '2015-09-30 09:18:45'),
(112, 'es', 'country.code.exist', 'Ya existe un pais con ese código', 'admin', 'admin', '2015-09-30 09:19:32', '2015-09-30 09:19:32'),
(113, 'en', 'country.name.code.exist', 'Already exist a country with this code and name', 'admin', 'admin', '2015-09-30 09:20:32', '2015-09-30 09:20:32'),
(114, 'es', 'country.name.code.exist', 'Ya existe un pais el código y nombre ingresados', 'admin', 'admin', '2015-09-30 09:21:44', '2015-09-30 09:22:12'),
(115, 'en', 'country.constraintviolation', 'You can not delete this country , there are data associated', 'admin', 'admin', '2015-09-30 09:22:58', '2015-09-30 09:22:58'),
(116, 'es', 'country.constraintviolation', 'No se puede eliminar el país ya que tiene otros datos asociados', 'admin', 'admin', '2015-09-30 09:23:23', '2015-09-30 09:23:23'),
(117, 'en', 'Esta seguro que desea eliminar este país?', 'Are you sure you want to delete this country?', 'admin', 'admin', '2015-09-30 09:28:30', '2015-09-30 09:28:30'),
(118, 'en', 'Estado', 'State', 'admin', 'admin', '2015-09-30 09:42:14', '2015-09-30 09:42:14'),
(119, 'en', 'state.required', 'You must enter a state', 'admin', 'admin', '2015-09-30 09:46:51', '2015-09-30 09:46:51'),
(120, 'es', 'state.required', 'Debe ingresar un estado', 'admin', 'admin', '2015-09-30 09:47:13', '2015-09-30 09:47:13'),
(121, 'en', 'Nuevo Estado', 'New State', 'admin', 'admin', '2015-09-30 09:48:15', '2015-09-30 09:48:15'),
(122, 'en', 'state.country.required', 'You must select a country', 'admin', 'admin', '2015-09-30 09:52:13', '2015-09-30 09:52:13'),
(123, 'es', 'state.country.required', 'Debe seleccionar un país', 'admin', 'admin', '2015-09-30 09:52:27', '2015-09-30 09:52:27'),
(124, 'en', 'state.country.state.exist', 'Already exist a state with this country and name', 'admin', 'admin', '2015-09-30 09:53:13', '2015-09-30 09:55:02'),
(125, 'es', 'state.country.state.exist', 'Ya existe un estado con ese país y nombre', 'admin', 'admin', '2015-09-30 09:55:32', '2015-09-30 09:55:32'),
(126, 'en', 'state.constraintviolation', 'You can not delete this state , there are data associated', 'admin', 'admin', '2015-09-30 09:56:16', '2015-09-30 09:56:16'),
(127, 'es', 'state.constraintviolation', 'No se puede eliminar el estado ya que tiene otros datos asociados', 'admin', 'admin', '2015-09-30 09:56:46', '2015-09-30 09:56:46'),
(128, 'en', 'Editar Estado', 'Edit State', 'admin', 'admin', '2015-09-30 09:59:13', '2015-09-30 09:59:13'),
(129, 'en', 'Esta seguro que desea eliminar este estado?', 'Are you sure you want to delete this state?', 'admin', 'admin', '2015-09-30 10:00:31', '2015-09-30 10:00:31'),
(130, 'es', 'state.delete.question', '¿ Esta seguro que desea eliminar este estado?', 'admin', 'admin', '2015-09-30 10:01:37', '2015-09-30 13:26:09'),
(131, 'en', 'state.delete.question', 'Are you sure you want to delete this state?', 'admin', 'admin', '2015-09-30 10:01:59', '2015-09-30 10:01:59'),
(132, 'en', 'country.delete.question', 'Are you sure you want to delete this country ?', 'admin', 'admin', '2015-09-30 10:03:12', '2015-09-30 12:54:07'),
(133, 'es', 'country.delete.question', '¿ Esta seguro que desea eliminar este país ?', 'admin', 'admin', '2015-09-30 10:03:48', '2015-09-30 12:54:23'),
(134, 'en', 'user.entity.notfound', 'Entity User not found', 'admin', 'admin', '2015-09-30 10:22:59', '2015-09-30 10:22:59'),
(135, 'es', 'user.entity.notfound', 'No se encontro la entidad User', 'admin', 'admin', '2015-09-30 10:23:17', '2015-09-30 10:23:17'),
(136, 'en', 'user.delete.question', 'Are you sure you want to delete this user?', 'admin', 'admin', '2015-09-30 10:23:49', '2015-09-30 10:23:49'),
(137, 'es', 'user.delete.question', '¿ Esta seguro que desea eliminar este usuario?', 'admin', 'admin', '2015-09-30 10:24:19', '2015-09-30 10:24:19'),
(138, 'en', 'user.list.title', 'Users', 'admin', 'admin', '2015-09-30 10:26:16', '2015-09-30 10:26:16'),
(139, 'es', 'user.list.title', 'Usuarios', 'admin', 'admin', '2015-09-30 10:26:27', '2015-09-30 10:26:27'),
(140, 'en', 'user.title.new', 'New User', 'admin', 'admin', '2015-09-30 10:27:21', '2015-09-30 10:27:21'),
(141, 'es', 'user.title.new', 'Nuevo Usuario', 'admin', 'admin', '2015-09-30 10:27:47', '2015-09-30 10:27:47'),
(142, 'en', 'button.cancel', 'Cancel', 'admin', 'admin', '2015-09-30 10:29:03', '2015-09-30 10:29:03'),
(143, 'es', 'button.cancel', 'Cancelar', 'admin', 'admin', '2015-09-30 10:29:16', '2015-09-30 10:29:16'),
(144, 'en', 'user.title.edit', 'Edit User', 'admin', 'admin', '2015-09-30 10:30:01', '2015-09-30 10:30:01'),
(145, 'es', 'user.title.edit', 'Editar Usuario', 'admin', 'admin', '2015-09-30 10:30:31', '2015-09-30 10:30:31'),
(146, 'en', 'button.delete', 'Delete', 'admin', 'admin', '2015-09-30 10:33:28', '2015-09-30 10:33:28'),
(147, 'es', 'button.delete', 'Eliminar', 'admin', 'admin', '2015-09-30 10:33:41', '2015-09-30 10:33:41'),
(148, 'en', 'user.notfound', 'User not found', 'admin', 'admin', '2015-09-30 10:35:51', '2015-09-30 10:36:41'),
(149, 'es', 'user.notfound', 'No se encontraron usuarios', 'admin', 'admin', '2015-09-30 10:36:13', '2015-09-30 10:36:59'),
(150, 'en', 'role.list.title', 'Roles', 'admin', 'admin', '2015-09-30 10:40:46', '2015-09-30 10:40:46'),
(151, 'es', 'role.list.title', 'Roles', 'admin', 'admin', '2015-09-30 10:40:57', '2015-09-30 10:40:57'),
(152, 'en', 'role.notfound', 'Role not found', 'admin', 'admin', '2015-09-30 10:41:46', '2015-09-30 10:41:46'),
(153, 'es', 'role.notfound', 'No se encontraron roles', 'admin', 'admin', '2015-09-30 10:42:12', '2015-09-30 10:42:12'),
(154, 'en', 'role.title.new', 'New Role', 'admin', 'admin', '2015-09-30 10:42:53', '2015-09-30 10:42:53'),
(155, 'es', 'role.title.new', 'Nuevo Rol', 'admin', 'admin', '2015-09-30 10:43:26', '2015-09-30 10:43:26'),
(156, 'en', 'role.delete.question', 'Are you sure you want to delete this role ?', 'admin', 'admin', '2015-09-30 10:44:21', '2015-09-30 10:45:47'),
(157, 'es', 'role.delete.question', '¿ Esta seguro que desea eliminar este rol ?', 'admin', 'admin', '2015-09-30 10:44:55', '2015-09-30 10:44:55'),
(158, 'en', 'role.entity.notfound', 'Entity Role not found', 'admin', 'admin', '2015-09-30 10:46:45', '2015-09-30 10:46:45'),
(159, 'es', 'role.entity.notfound', 'No se encontró la entidad Role', 'admin', 'admin', '2015-09-30 10:47:09', '2015-09-30 10:47:09'),
(160, 'en', 'action.entity.notfound', 'Entity Action not found', 'admin', 'admin', '2015-09-30 10:48:27', '2015-09-30 10:48:27'),
(161, 'es', 'action.entity.notfound', 'No se encontro la entidad Action', 'admin', 'admin', '2015-09-30 10:48:50', '2015-09-30 10:48:50'),
(162, 'en', 'action.delete.question', 'Are you sure you want to quit this action ?', 'admin', 'admin', '2015-09-30 10:52:25', '2015-09-30 10:52:25'),
(163, 'es', 'action.delete.question', '¿ Esta seguro que desea eliminar esta acción ?', 'admin', 'admin', '2015-09-30 10:53:14', '2015-09-30 10:53:14'),
(164, 'en', 'action.list.title', 'Actions', 'admin', 'admin', '2015-09-30 10:53:48', '2015-09-30 10:53:48'),
(165, 'es', 'action.list.title', 'Acciones', 'admin', 'admin', '2015-09-30 10:53:59', '2015-09-30 10:53:59'),
(166, 'en', 'action.title.new', 'New Action', 'admin', 'admin', '2015-09-30 10:54:36', '2015-09-30 10:54:36'),
(167, 'es', 'action.title.new', 'Nueva Acción', 'admin', 'admin', '2015-09-30 10:54:52', '2015-09-30 10:54:52'),
(168, 'en', 'action.title.edit', 'Edit Action', 'admin', 'admin', '2015-09-30 10:55:27', '2015-09-30 10:55:27'),
(169, 'es', 'action.title.edit', 'Editar Acción', 'admin', 'admin', '2015-09-30 10:55:41', '2015-09-30 10:55:41'),
(170, 'en', 'action.notfound', 'Not found action', 'admin', 'admin', '2015-09-30 10:56:35', '2015-09-30 10:56:35'),
(171, 'es', 'action.notfound', 'No se encontraron acciones', 'admin', 'admin', '2015-09-30 10:56:53', '2015-09-30 10:56:53'),
(172, 'en', 'userrole.entity.notfound', 'Entity UserRole not found', 'admin', 'admin', '2015-09-30 11:04:03', '2015-09-30 11:04:03'),
(173, 'es', 'userrole.entity.notfound', 'No se encontro la entidad UserRole', 'admin', 'admin', '2015-09-30 11:04:23', '2015-09-30 11:04:23'),
(174, 'en', 'userrole.delete.question', 'Are you sure you want to quit this role ?', 'admin', 'admin', '2015-09-30 11:05:13', '2015-09-30 11:05:13'),
(175, 'es', 'userrole.delete.question', '¿ Esta seguro que desea quitar este rol ?', 'admin', 'admin', '2015-09-30 11:05:38', '2015-09-30 11:05:38'),
(176, 'en', 'userrole.list.title', 'User Role', 'admin', 'admin', '2015-09-30 11:06:09', '2015-09-30 11:06:09'),
(177, 'es', 'userrole.list.title', 'Roles del usuario', 'admin', 'admin', '2015-09-30 11:06:40', '2015-09-30 11:06:40'),
(178, 'en', 'userrole.title.new', 'New User role', 'admin', 'admin', '2015-09-30 11:08:36', '2015-09-30 11:08:36'),
(179, 'es', 'userrole.title.new', 'Nuevo rol del usuario', 'admin', 'admin', '2015-09-30 11:08:56', '2015-09-30 11:08:56'),
(180, 'en', 'userrole.notfound', 'Role not found', 'admin', 'admin', '2015-09-30 11:11:48', '2015-09-30 11:11:48'),
(181, 'es', 'userrole.notfound', 'No se encontraron roles', 'admin', 'admin', '2015-09-30 11:12:07', '2015-09-30 11:12:07'),
(182, 'en', 'actionrole.entity.notfound', 'Entity ActionRole not found', 'admin', 'admin', '2015-09-30 11:17:16', '2015-09-30 11:17:16'),
(183, 'es', 'actionrole.entity.notfound', 'No se encontro la entidad ActionRole', 'admin', 'admin', '2015-09-30 11:17:35', '2015-09-30 11:17:35'),
(184, 'en', 'actionrole.delete.question', 'Are you sure you want to quit this action ?', 'admin', 'admin', '2015-09-30 11:18:01', '2015-09-30 11:18:01'),
(185, 'es', 'actionrole.delete.question', '¿ Esta seguro que desea quitar esta acción ?', 'admin', 'admin', '2015-09-30 11:18:39', '2015-09-30 11:18:39'),
(186, 'en', 'actionrole.list.title', 'Role Action', 'admin', 'admin', '2015-09-30 11:19:06', '2015-09-30 11:20:03'),
(187, 'es', 'actionrole.list.title', 'Acciones del rol', 'admin', 'admin', '2015-09-30 11:20:27', '2015-09-30 11:20:27'),
(188, 'en', 'actionrole.notfound', 'Action not found', 'admin', 'admin', '2015-09-30 11:22:20', '2015-09-30 11:22:20'),
(189, 'es', 'actionrole.notfound', 'No se encontraron acciones', 'admin', 'admin', '2015-09-30 11:22:35', '2015-09-30 11:22:35'),
(190, 'en', 'userrole.button.title', 'Users', 'admin', 'admin', '2015-09-30 11:24:03', '2015-09-30 11:24:03'),
(191, 'es', 'userrole.button.title', 'Usuarios', 'admin', 'admin', '2015-09-30 11:24:16', '2015-09-30 11:24:16'),
(192, 'en', 'actionrole.button.title', 'Roles', 'admin', 'admin', '2015-09-30 11:25:43', '2015-09-30 11:25:43'),
(193, 'es', 'actionrole.button.title', 'Roles', 'admin', 'admin', '2015-09-30 11:25:56', '2015-09-30 11:25:56'),
(194, 'en', 'language.entity.notfound', 'Entity language not found', 'admin', 'admin', '2015-09-30 11:33:48', '2015-09-30 11:33:48'),
(195, 'es', 'language.entity.notfound', 'No se encontro la entidad Language', 'admin', 'admin', '2015-09-30 11:34:18', '2015-09-30 11:34:18'),
(196, 'en', 'language.delete.question', 'Are you sure you want to delete this Language ?', 'admin', 'admin', '2015-09-30 11:34:43', '2015-09-30 11:51:34'),
(197, 'es', 'language.delete.question', '¿ Esta seguro que desea eliminar este idioma ?', 'admin', 'admin', '2015-09-30 11:35:06', '2015-09-30 11:50:37'),
(198, 'en', 'language.list.title', 'Languages', 'admin', 'admin', '2015-09-30 11:35:24', '2015-09-30 11:35:24'),
(199, 'es', 'language.list.title', 'Idiomas', 'admin', 'admin', '2015-09-30 11:35:36', '2015-09-30 11:35:36'),
(201, 'es', 'language.title.new', 'Nuevo Idioma', 'admin', 'admin', '2015-09-30 11:36:18', '2015-09-30 11:36:18'),
(202, 'en', 'language.title.edit', 'Edit Language', 'admin', 'admin', '2015-09-30 11:36:35', '2015-09-30 11:36:35'),
(203, 'es', 'language.title.edit', 'Editar Idioma', 'admin', 'admin', '2015-09-30 11:36:50', '2015-09-30 11:36:50'),
(204, 'en', 'language.notfound', 'Language not found', 'admin', 'admin', '2015-09-30 11:37:07', '2015-09-30 11:37:07'),
(205, 'es', 'language.notfound', 'No se encontraron idiomas', 'admin', 'admin', '2015-09-30 11:37:28', '2015-09-30 11:37:28'),
(206, 'en', 'language.title.new', 'New Language', 'admin', 'admin', '2015-09-30 11:39:14', '2015-09-30 11:41:10'),
(208, 'en', 'translation.entity.notfound', 'Entity Translation not found', 'admin', 'admin', '2015-09-30 12:33:24', '2015-09-30 12:33:24'),
(209, 'es', 'translation.entity.notfound', 'No se encontro la entidad Translation', 'admin', 'admin', '2015-09-30 12:34:02', '2015-09-30 12:34:02'),
(210, 'en', 'translation.delete.question', 'Are you sure you want to quit this translation ?', 'admin', 'admin', '2015-09-30 12:34:39', '2015-09-30 12:34:39'),
(211, 'es', 'translation.delete.question', '¿ Esta seguro que desea eliminar esta traducción ?', 'admin', 'admin', '2015-09-30 12:35:33', '2015-09-30 12:35:33'),
(212, 'en', 'translation.list.title', 'Translations', 'admin', 'admin', '2015-09-30 12:35:59', '2015-09-30 12:35:59'),
(213, 'es', 'translation.list.title', 'Traducciones', 'admin', 'admin', '2015-09-30 12:36:15', '2015-09-30 12:36:15'),
(214, 'en', 'translation.title.new', 'New Translation', 'admin', 'admin', '2015-09-30 12:37:09', '2015-09-30 12:37:09'),
(215, 'es', 'translation.title.new', 'Nueva Traducción', 'admin', 'admin', '2015-09-30 12:37:35', '2015-09-30 12:37:35'),
(216, 'en', 'translation.title.edit', 'Edit Translation', 'admin', 'admin', '2015-09-30 12:38:11', '2015-09-30 12:38:11'),
(217, 'es', 'translation.title.edit', 'Editar Traducción', 'admin', 'admin', '2015-09-30 12:38:40', '2015-09-30 12:38:40'),
(218, 'en', 'translation.notfound', 'Translation not found', 'admin', 'admin', '2015-09-30 12:39:23', '2015-09-30 12:39:23'),
(219, 'es', 'translation.notfound', 'No se encontraron traducciones', 'admin', 'admin', '2015-09-30 12:39:44', '2015-09-30 12:39:44'),
(220, 'en', 'country.entity.notfound', 'Entity Country not found', 'admin', 'admin', '2015-09-30 12:51:39', '2015-09-30 12:51:39'),
(221, 'es', 'country.entity.notfound', 'No se encontro la entidad Country', 'admin', 'admin', '2015-09-30 12:52:04', '2015-09-30 12:52:04'),
(222, 'en', 'country.list.title', 'Countries', 'admin', 'admin', '2015-09-30 12:54:52', '2015-09-30 12:54:52'),
(223, 'es', 'country.list.title', 'Países', 'admin', 'admin', '2015-09-30 12:55:12', '2015-09-30 12:55:12'),
(224, 'en', 'country.title.new', 'New Country', 'admin', 'admin', '2015-09-30 12:58:14', '2015-09-30 12:58:14'),
(225, 'es', 'country.title.new', 'Nuevo País', 'admin', 'admin', '2015-09-30 12:58:31', '2015-09-30 12:58:31'),
(226, 'en', 'country.title.edit', 'Edit Country', 'admin', 'admin', '2015-09-30 12:59:01', '2015-09-30 12:59:01'),
(227, 'es', 'country.title.edit', 'Editar País', 'admin', 'admin', '2015-09-30 12:59:47', '2015-09-30 12:59:47'),
(228, 'en', 'country.notfound', 'Country not found', 'admin', 'admin', '2015-09-30 13:00:31', '2015-09-30 13:00:31'),
(229, 'es', 'country.notfound', 'No se encontraron países', 'admin', 'admin', '2015-09-30 13:00:48', '2015-09-30 13:00:48'),
(230, 'en', 'state.entity.notfound', 'Entity State not found', 'admin', 'admin', '2015-09-30 13:24:27', '2015-09-30 13:24:27'),
(231, 'es', 'state.entity.notfound', 'No se encontro la entidad State', 'admin', 'admin', '2015-09-30 13:24:59', '2015-09-30 13:24:59'),
(232, 'en', 'state.list.title', 'States', 'admin', 'admin', '2015-09-30 13:26:28', '2015-09-30 13:26:28'),
(233, 'es', 'state.list.title', 'Estados', 'admin', 'admin', '2015-09-30 13:26:46', '2015-09-30 13:26:46'),
(234, 'en', 'state.title.new', 'New State', 'admin', 'admin', '2015-09-30 13:27:06', '2015-09-30 13:27:06'),
(235, 'es', 'state.title.new', 'Nuevo Estado', 'admin', 'admin', '2015-09-30 13:27:24', '2015-09-30 13:27:24'),
(236, 'en', 'state.title.edit', 'Edit State', 'admin', 'admin', '2015-09-30 13:28:19', '2015-09-30 13:28:19'),
(237, 'es', 'state.title.edit', 'Editar Estado', 'admin', 'admin', '2015-09-30 13:28:37', '2015-09-30 13:28:37'),
(238, 'en', 'state.notfound', 'State not found', 'admin', 'admin', '2015-09-30 13:29:05', '2015-09-30 13:29:05'),
(239, 'es', 'state.notfound', 'No se encontraron estados', 'admin', 'admin', '2015-09-30 13:29:29', '2015-09-30 13:29:29'),
(240, 'en', 'city.entity.notfound', 'Entity City not found', 'admin', 'admin', '2015-09-30 15:37:05', '2015-09-30 15:37:05'),
(241, 'es', 'city.entity.notfound', 'No se encontro la entidad City', 'admin', 'admin', '2015-09-30 15:37:24', '2015-09-30 15:37:24'),
(242, 'en', 'city.delete.question', 'Are you sure you want to delete this city ?', 'admin', 'admin', '2015-09-30 15:37:57', '2015-09-30 15:50:32'),
(243, 'es', 'city.delete.question', '¿ Esta seguro que desea eliminar esta ciudad ?', 'admin', 'admin', '2015-09-30 15:38:55', '2015-09-30 15:50:51'),
(244, 'en', 'city.list.title', 'Cities', 'admin', 'admin', '2015-09-30 15:39:12', '2015-09-30 15:39:12'),
(245, 'es', 'city.list.title', 'Ciudades', 'admin', 'admin', '2015-09-30 15:39:23', '2015-09-30 15:39:23'),
(246, 'en', 'city.title.new', 'New City', 'admin', 'admin', '2015-09-30 15:40:34', '2015-09-30 15:40:34'),
(247, 'es', 'city.title.new', 'Nueva Ciudad', 'admin', 'admin', '2015-09-30 15:41:00', '2015-09-30 15:41:00'),
(248, 'en', 'city.title.edit', 'Edit City', 'admin', 'admin', '2015-09-30 15:41:24', '2015-09-30 15:41:24'),
(249, 'es', 'city.title.edit', 'Editar Ciudad', 'admin', 'admin', '2015-09-30 15:41:43', '2015-09-30 15:41:43'),
(250, 'en', 'city.notfound', 'City not found', 'admin', 'admin', '2015-09-30 15:42:19', '2015-09-30 15:42:19'),
(251, 'es', 'city.notfound', 'No se encontraron ciudades', 'admin', 'admin', '2015-09-30 15:42:37', '2015-09-30 15:42:37'),
(252, 'en', 'city.country.required', 'You must to select a country', 'admin', 'admin', '2015-09-30 15:43:39', '2015-09-30 15:46:49'),
(253, 'es', 'city.country.required', 'Debe seleccionar un país', 'admin', 'admin', '2015-09-30 15:44:01', '2015-09-30 15:47:10'),
(254, 'en', 'city.state.required', 'You must select a state', 'admin', 'admin', '2015-09-30 15:44:23', '2015-09-30 15:44:23'),
(255, 'es', 'city.state.required', 'Debe seleccionar un estado', 'admin', 'admin', '2015-09-30 15:44:36', '2015-09-30 15:44:36'),
(256, 'en', 'city.required', 'You must enter a city', 'admin', 'admin', '2015-09-30 15:45:06', '2015-09-30 15:45:06'),
(257, 'es', 'city.required', 'Debe ingresar una ciudad', 'admin', 'admin', '2015-09-30 15:45:20', '2015-09-30 15:45:20'),
(258, 'en', 'city.country.city.exist', 'Already exist a city with this name for the selected country', 'admin', 'admin', '2015-09-30 15:47:33', '2015-09-30 15:47:33'),
(259, 'es', 'city.country.city.exist', 'Ya existe una ciudad con ese nombre para el país seleccionado', 'admin', 'admin', '2015-09-30 15:48:01', '2015-09-30 15:48:01'),
(260, 'en', 'township.entity.notfound', 'Entity Township not found', 'admin', 'admin', '2015-09-30 16:03:15', '2015-09-30 16:03:15'),
(261, 'es', 'township.entity.notfound', 'No se encontro la entidad Township', 'admin', 'admin', '2015-09-30 16:03:39', '2015-09-30 16:03:39'),
(262, 'en', 'township.delete.question', 'Are you sure you want to delete this township ?', 'admin', 'admin', '2015-09-30 16:04:03', '2015-09-30 16:04:03'),
(263, 'es', 'township.delete.question', '¿ Esta seguro que desea eliminar este sector ?', 'admin', 'admin', '2015-09-30 16:04:27', '2015-09-30 16:04:27'),
(264, 'en', 'township.list.title', 'Townships', 'admin', 'admin', '2015-09-30 16:04:56', '2015-09-30 16:04:56'),
(265, 'es', 'township.list.title', 'Sectores', 'admin', 'admin', '2015-09-30 16:05:11', '2015-09-30 16:05:11'),
(266, 'en', 'township.title.new', 'New Township', 'admin', 'admin', '2015-09-30 16:05:29', '2015-09-30 16:05:29'),
(267, 'es', 'township.title.new', 'Nuevo Sector', 'admin', 'admin', '2015-09-30 16:05:43', '2015-09-30 16:05:43'),
(268, 'en', 'township.title.edit', 'Edit Township', 'admin', 'admin', '2015-09-30 16:05:59', '2015-09-30 16:05:59'),
(269, 'es', 'township.title.edit', 'Editar Sector', 'admin', 'admin', '2015-09-30 16:06:14', '2015-09-30 16:06:14'),
(270, 'en', 'township.notfound', 'Township not found', 'admin', 'admin', '2015-09-30 16:06:30', '2015-09-30 16:06:30'),
(271, 'es', 'township.notfound', 'No se encontraron sectores', 'admin', 'admin', '2015-09-30 16:07:02', '2015-09-30 16:07:02'),
(272, 'en', 'city.select.required', 'You must select a city', 'admin', 'admin', '2015-09-30 16:07:21', '2015-09-30 16:07:21'),
(273, 'es', 'city.select.required', 'Debe seleccionar una ciudad', 'admin', 'admin', '2015-09-30 16:07:41', '2015-09-30 16:07:41'),
(274, 'en', 'township.required', 'You must enter a township', 'admin', 'admin', '2015-09-30 16:08:20', '2015-09-30 16:08:20'),
(275, 'es', 'township.required', 'Debe ingresar un sector', 'admin', 'admin', '2015-09-30 16:08:43', '2015-09-30 16:08:43'),
(276, 'en', 'township.city.township.exist', 'Already exist a township with this name for the selected city', 'admin', 'admin', '2015-09-30 16:09:15', '2015-09-30 16:09:15'),
(277, 'es', 'township.city.township.exist', 'Ya existe un sector con ese nombre para la ciudad seleccionada', 'admin', 'admin', '2015-09-30 16:10:55', '2015-09-30 16:10:55'),
(278, 'en', 'township.constraintviolation', 'You can not delete this township, there are data associated', 'admin', 'admin', '2015-09-30 16:11:36', '2015-09-30 16:11:36'),
(279, 'es', 'township.constraintviolation', 'No se puede eliminar el sector ya que tiene otros datos asociados', 'admin', 'admin', '2015-09-30 16:11:53', '2015-09-30 16:11:53'),
(280, 'en', 'neighborhood.entity.notfound', 'Entity Neighborhood not found', 'admin', 'admin', '2015-10-01 14:22:17', '2015-10-01 14:22:17'),
(281, 'es', 'neighborhood.entity.notfound', 'No se encontro la entidad Neighborhood', 'admin', 'admin', '2015-10-01 14:22:59', '2015-10-01 14:22:59'),
(282, 'en', 'neighborhood.delete.question', 'Are you sure you want to delete this neighborhood ?', 'admin', 'admin', '2015-10-01 14:23:56', '2015-10-01 14:23:56'),
(283, 'es', 'neighborhood.delete.question', '¿ Esta seguro que desea eliminar este barrio ?', 'admin', 'admin', '2015-10-01 14:24:24', '2015-10-01 14:24:24'),
(284, 'en', 'neighborhood.list.title', 'Neighborhoods', 'admin', 'admin', '2015-10-01 14:24:51', '2015-10-01 14:24:51'),
(285, 'es', 'neighborhood.list.title', 'Barrios', 'admin', 'admin', '2015-10-01 14:25:05', '2015-10-01 14:25:05'),
(286, 'en', 'neighborhood.title.new', 'New Neighborhood', 'admin', 'admin', '2015-10-01 14:26:06', '2015-10-01 14:26:06'),
(287, 'es', 'neighborhood.title.new', 'Nuevo Barrio', 'admin', 'admin', '2015-10-01 14:26:23', '2015-10-01 14:26:23'),
(288, 'en', 'neighborhood.title.edit', 'Edit Neighborhood', 'admin', 'admin', '2015-10-01 14:26:43', '2015-10-01 14:26:43'),
(289, 'es', 'neighborhood.title.edit', 'Editar Barrio', 'admin', 'admin', '2015-10-01 14:27:01', '2015-10-01 14:27:01'),
(290, 'en', 'neighborhood.notfound', 'Neighborhood not found', 'admin', 'admin', '2015-10-01 14:27:34', '2015-10-01 14:27:34'),
(291, 'es', 'neighborhood.notfound', 'No se encontraron barrios', 'admin', 'admin', '2015-10-01 14:27:59', '2015-10-01 14:27:59'),
(292, 'en', 'neighborhood.township.required', 'You must to select a township', 'admin', 'admin', '2015-10-01 14:28:58', '2015-10-01 14:28:58'),
(293, 'es', 'neighborhood.township.required', 'Debe ingresar un sector', 'admin', 'admin', '2015-10-01 14:29:40', '2015-10-01 14:29:40'),
(294, 'en', 'neighborhood.required', 'You must to enter a neighborhood', 'admin', 'admin', '2015-10-01 14:30:12', '2015-10-01 14:30:12'),
(295, 'es', 'neighborhood.required', 'Debe ingresar un barrio', 'admin', 'admin', '2015-10-01 14:30:33', '2015-10-01 14:30:33'),
(296, 'en', 'neighborhood.township.exist', 'Already exist this neighborhood for the selected township', 'admin', 'admin', '2015-10-01 14:35:45', '2015-10-01 14:35:45'),
(297, 'es', 'neighborhood.township.exist', 'Ya existe ese barrio para el sector seleccionado', 'admin', 'admin', '2015-10-01 14:36:27', '2015-10-01 14:36:27'),
(298, 'en', 'neighborhood.constraintviolation', 'You can not delete this neighborhood, there are data associated', 'admin', 'admin', '2015-10-01 14:37:34', '2015-10-01 14:37:34'),
(299, 'es', 'neighborhood.constraintviolation', 'No se puede eliminar el barrio ya que tiene otros datos asociados', 'admin', 'admin', '2015-10-01 14:37:59', '2015-10-01 14:37:59'),
(300, 'en', 'Ciudad', 'City', 'admin', 'admin', '2015-10-01 15:09:36', '2015-10-01 15:09:36'),
(301, 'en', 'Sector', 'Township', 'admin', 'admin', '2015-10-01 15:09:53', '2015-10-01 15:09:53'),
(302, 'en', 'Barrio', 'Neighborhood', 'admin', 'admin', '2015-10-01 15:10:10', '2015-10-01 15:10:10'),
(303, 'en', 'actionrole.title.new', 'New Role Action', 'admin', 'admin', '2015-10-01 16:24:35', '2015-10-01 16:24:35'),
(304, 'es', 'actionrole.title.new', 'Nueva accion del rol', 'admin', 'admin', '2015-10-01 16:24:54', '2015-10-01 16:24:54'),
(305, 'en', 'address.entity.notfound', 'Entity Address not found', 'admin', 'admin', '2015-10-02 13:46:30', '2015-10-02 13:46:30'),
(306, 'es', 'address.entity.notfound', 'No se encontro la entidad Address', 'admin', 'admin', '2015-10-02 13:46:52', '2015-10-02 13:46:52'),
(307, 'en', 'address.delete.question', 'Are you sure you want to delete this address ?', 'admin', 'admin', '2015-10-02 13:47:54', '2015-10-02 13:47:54'),
(308, 'es', 'address.delete.question', 'Esta seguro que desea eliminar esta dirección ?', 'admin', 'admin', '2015-10-02 13:51:08', '2015-10-02 13:51:08'),
(309, 'en', 'address.list.title', 'Addresses', 'admin', 'admin', '2015-10-02 13:54:10', '2015-10-02 13:54:10'),
(310, 'es', 'address.list.title', 'Direcciones', 'admin', 'admin', '2015-10-02 13:54:45', '2015-10-02 13:54:45'),
(311, 'en', 'address.title.new', 'New Address', 'admin', 'admin', '2015-10-02 13:55:13', '2015-10-02 13:55:13'),
(312, 'es', 'address.title.new', 'Nueva Dirección', 'admin', 'admin', '2015-10-02 13:55:53', '2015-10-02 13:55:53'),
(313, 'en', 'address.title.edit', 'Edit Address', 'admin', 'admin', '2015-10-02 13:57:01', '2015-10-02 13:57:01'),
(314, 'es', 'address.title.edit', 'Editar Dirección', 'admin', 'admin', '2015-10-02 13:58:29', '2015-10-02 13:58:29'),
(315, 'en', 'address.notfound', 'Not found address', 'admin', 'admin', '2015-10-02 14:01:30', '2015-10-02 14:01:30'),
(316, 'es', 'address.notfound', 'No se encontraron direcciones', 'admin', 'admin', '2015-10-02 14:07:30', '2015-10-02 14:07:30'),
(317, 'en', 'address.country.required', 'You must to select a country', 'admin', 'admin', '2015-10-02 14:08:38', '2015-10-02 14:08:38'),
(318, 'es', 'address.country.required', 'Debe seleccionar un país', 'admin', 'admin', '2015-10-02 14:09:18', '2015-10-02 14:09:18'),
(319, 'en', 'address.state.required', 'You must to select a state', 'admin', 'admin', '2015-10-02 14:09:47', '2015-10-02 14:09:47'),
(320, 'es', 'address.state.required', 'Debe seleccionar un estado', 'admin', 'admin', '2015-10-02 14:10:07', '2015-10-02 14:10:07'),
(321, 'en', 'address.city.required', 'You must to select a city', 'admin', 'admin', '2015-10-02 14:11:27', '2015-10-02 14:11:27'),
(322, 'es', 'address.city.required', 'Debe seleccionar una ciudad', 'admin', 'admin', '2015-10-02 14:11:47', '2015-10-02 14:11:47'),
(323, 'en', 'address.neighborhood.required', 'You must select a neighborhood', 'admin', 'admin', '2015-10-02 14:12:31', '2015-10-02 14:12:31'),
(324, 'es', 'address.neighborhood.required', 'Debe seleccionar un barrio', 'admin', 'admin', '2015-10-02 14:12:58', '2015-10-02 14:12:58'),
(325, 'en', 'address.required', 'You must enter an address', 'admin', 'admin', '2015-10-02 14:14:33', '2015-10-02 14:14:33'),
(326, 'es', 'address.required', 'Debe ingresar una dirección', 'admin', 'admin', '2015-10-02 14:14:54', '2015-10-02 14:33:56'),
(327, 'en', 'complete_address.exist', 'Already exist this address', 'admin', 'admin', '2015-10-02 14:15:47', '2015-10-02 14:15:47'),
(328, 'es', 'complete_address.exist', 'Ya existe esa dirección', 'admin', 'admin', '2015-10-02 14:17:22', '2015-10-02 14:17:22'),
(329, 'en', 'address.constraintviolation', 'You can not delete this address, there are data associated', 'admin', 'admin', '2015-10-02 14:17:56', '2015-10-02 14:17:56'),
(330, 'es', 'address.constraintviolation', 'No se puede eliminar la dirección ya que tiene otros datos asociados', 'admin', 'admin', '2015-10-02 14:18:32', '2015-10-02 14:18:32'),
(331, 'es', 'Manage Media', 'Administrar Multimedia', 'admin', 'admin', '2015-10-05 14:41:36', '2015-10-05 14:41:36'),
(332, 'es', 'Upload Files', 'Subir Archivos', 'admin', 'admin', '2015-10-05 14:42:33', '2015-10-05 14:42:33'),
(333, 'en', 'files.button.title', 'Manage Files', 'admin', 'admin', '2015-10-13 11:29:02', '2015-10-13 11:29:02'),
(334, 'es', 'files.button.title', 'Mantener Archivos', 'admin', 'admin', '2015-10-13 11:29:33', '2015-10-13 11:29:33'),
(335, 'en', 'validate.file.validformats', 'File type is not allowed', 'admin', 'admin', '2015-10-16 14:49:10', '2015-10-16 14:49:10'),
(336, 'es', 'validate.file.validformats', 'El tipo de archivo no esta permitido', 'admin', 'admin', '2015-10-16 14:49:31', '2015-10-16 14:49:31'),
(337, 'en', 'validate.file.maxsize', 'File is to big', 'admin', 'admin', '2015-10-16 14:51:17', '2015-10-16 14:51:17'),
(338, 'es', 'validate.file.maxsize', 'El tamaño del archivo es mas grande del permitido', 'admin', 'admin', '2015-10-16 14:52:21', '2015-10-16 14:52:21'),
(339, 'en', 'validate.file.minsize', 'File is too small', 'admin', 'admin', '2015-10-16 14:52:49', '2015-10-16 14:52:49'),
(340, 'es', 'validate.file.minsize', 'El tamaño del archivo es menor del permitido', 'admin', 'admin', '2015-10-16 14:53:20', '2015-10-16 14:53:20'),
(341, 'en', 'validate.file.filesnumber', 'Maximum number of files exceeded', 'admin', 'admin', '2015-10-16 14:53:56', '2015-10-16 14:53:56'),
(342, 'es', 'validate.file.filesnumber', 'Se ha exedido la máxima cantidad de archivos permitido', 'admin', 'admin', '2015-10-16 14:54:45', '2015-10-16 14:54:45'),
(343, 'en', 'upload.files.add_files_title', 'Add Files', 'admin', 'admin', '2015-10-16 14:55:06', '2015-10-16 14:55:06'),
(344, 'es', 'upload.files.add_files_title', 'Agregar Archivos', 'admin', 'admin', '2015-10-16 14:55:41', '2015-10-16 14:55:41'),
(345, 'en', 'upload.files.start_upload_title', 'Start Upload', 'admin', 'admin', '2015-10-16 14:56:01', '2015-10-16 14:56:01'),
(346, 'es', 'upload.files.start_upload_title', 'Iniciar Subida', 'admin', 'admin', '2015-10-16 14:57:28', '2015-10-16 14:57:28'),
(347, 'en', 'upload.files.cancel_upload_title', 'Cancel Upload', 'admin', 'admin', '2015-10-16 14:58:36', '2015-10-16 14:58:36'),
(348, 'es', 'upload.files.cancel_upload_title', 'Cancelar Subida', 'admin', 'admin', '2015-10-16 14:59:03', '2015-10-16 14:59:03'),
(349, 'en', 'upload.files.title', 'Upload Files', 'admin', 'admin', '2015-10-16 15:00:00', '2015-10-16 15:01:00'),
(350, 'es', 'upload.files.title', 'Subir Archivos', 'admin', 'admin', '2015-10-16 15:00:22', '2015-10-16 15:00:22'),
(351, 'en', 'upload.start_button', 'Start', 'admin', 'admin', '2015-10-16 15:37:07', '2015-10-16 15:37:07'),
(352, 'es', 'upload.start_button', 'Iniciar', 'admin', 'admin', '2015-10-16 15:37:41', '2015-10-16 15:37:41'),
(353, 'en', 'upload.cancel_button', 'Cancel', 'admin', 'admin', '2015-10-16 15:38:06', '2015-10-16 15:38:06'),
(354, 'es', 'upload.cancel_button', 'Cancelar', 'admin', 'admin', '2015-10-16 15:38:23', '2015-10-16 15:38:23'),
(355, 'en', 'index.files.title', 'Manage Files', 'admin', 'admin', '2015-10-16 15:54:11', '2015-10-16 15:54:11'),
(356, 'es', 'index.files.title', 'Mantenimiento de Archivos', 'admin', 'admin', '2015-10-16 15:54:49', '2015-10-16 16:18:07'),
(357, 'en', 'index.files.images_title', 'Images', 'admin', 'admin', '2015-10-16 15:55:08', '2015-10-16 15:55:08'),
(358, 'es', 'index.files.images_title', 'Imágenes', 'admin', 'admin', '2015-10-16 15:55:22', '2015-10-16 15:55:22'),
(359, 'en', 'index.files.documents_title', 'Documents', 'admin', 'admin', '2015-10-16 15:55:48', '2015-10-16 15:55:48'),
(360, 'es', 'index.files.documents_title', 'Documentos', 'admin', 'admin', '2015-10-16 15:56:07', '2015-10-16 15:56:07'),
(361, 'en', 'index.files.videos_title', 'Videos', 'admin', 'admin', '2015-10-16 15:56:48', '2015-10-16 15:56:48'),
(362, 'es', 'index.files.videos_title', 'Videos', 'admin', 'admin', '2015-10-16 15:57:05', '2015-10-16 15:57:05'),
(363, 'en', 'index.files.others_title', 'Others', 'admin', 'admin', '2015-10-16 15:57:32', '2015-10-16 15:57:32'),
(364, 'es', 'index.files.others_title', 'Otros', 'admin', 'admin', '2015-10-16 15:57:47', '2015-10-16 15:57:47'),
(365, 'en', 'files.list.no_data', 'Not file records found', 'admin', 'admin', '2015-10-16 16:13:13', '2015-10-16 16:13:13'),
(366, 'es', 'files.list.no_data', 'No se encontraron archivos', 'admin', 'admin', '2015-10-16 16:13:37', '2015-10-16 16:13:37'),
(367, 'es', 'Images', 'Imágenes', 'admin', 'admin', '2015-10-16 16:13:59', '2015-10-16 16:13:59'),
(368, 'es', 'Videos', 'Videos', 'admin', 'admin', '2015-10-16 16:14:17', '2015-10-16 16:14:17'),
(369, 'es', 'Documents', 'Documentos', 'admin', 'admin', '2015-10-16 16:14:42', '2015-10-16 16:14:42'),
(370, 'es', 'Other', 'Otros', 'admin', 'admin', '2015-10-16 16:15:02', '2015-10-16 16:15:02'),
(371, 'es', 'Other Files', 'Otros Archivos', 'admin', 'admin', '2015-10-16 16:16:32', '2015-10-16 16:17:06'),
(372, 'es', 'Manage Files', 'Administrar Archivos', 'admin', 'admin', '2015-10-16 16:21:21', '2015-10-16 16:21:21'),
(373, 'es', 'Manage Galleries', 'Administrar Galerias', 'admin', 'admin', '2015-10-16 16:21:59', '2015-10-16 16:21:59'),
(374, 'es', 'File Name', 'Nombre del Archivo', 'admin', 'admin', '2015-10-16 16:23:24', '2015-10-16 16:23:24'),
(375, 'es', 'Type', 'Tipo', 'admin', 'admin', '2015-10-16 16:23:46', '2015-10-16 16:23:46'),
(376, 'es', 'Size', 'Tamaño', 'admin', 'admin', '2015-10-16 16:24:14', '2015-10-16 16:24:14'),
(377, 'es', 'Name', 'Nombre', 'admin', 'admin', '2015-10-17 12:57:41', '2015-10-17 12:57:41'),
(378, 'es', 'Description', 'Descripción', 'admin', 'admin', '2015-10-17 12:57:54', '2015-10-17 12:57:54'),
(379, 'es', 'Title', 'Título', 'admin', 'admin', '2015-10-17 12:58:21', '2015-10-17 12:58:21'),
(380, 'en', 'gallery.list.title', 'Galleries', 'admin', 'admin', '2015-10-17 13:00:16', '2015-10-17 13:00:16'),
(381, 'es', 'gallery.list.title', 'Galerias', 'admin', 'admin', '2015-10-17 13:00:27', '2015-10-17 13:00:27'),
(382, 'en', 'gallery.title.new', 'New Gallery', 'admin', 'admin', '2015-10-17 13:01:40', '2015-10-17 13:01:40'),
(383, 'es', 'gallery.title.new', 'Nueva Galería', 'admin', 'admin', '2015-10-17 13:01:52', '2015-10-17 13:01:52'),
(384, 'en', 'gallery.title.edit', 'Edit gallery', 'admin', 'admin', '2015-10-17 13:02:09', '2015-10-17 13:02:09'),
(385, 'es', 'gallery.title.edit', 'Editar Galería', 'admin', 'admin', '2015-10-17 13:02:24', '2015-10-17 13:02:24'),
(386, 'en', 'gallery.delete.question', 'Are you sure you want to delete this gallery ?', 'admin', 'admin', '2015-10-17 13:02:55', '2015-10-17 13:02:55'),
(387, 'es', 'gallery.delete.question', '¿ Esta seguro que desea eliminar esta galería ?', 'admin', 'admin', '2015-10-17 13:03:19', '2015-10-17 13:03:19'),
(388, 'en', 'gallery.name.required', 'You must enter a name', 'admin', 'admin', '2015-10-17 13:04:35', '2015-10-17 13:04:35'),
(389, 'es', 'gallery.name.required', 'Debe ingresar un nombre', 'admin', 'admin', '2015-10-17 13:04:54', '2015-10-17 13:04:54'),
(390, 'en', 'gallery.title.required', 'You must enter a title', 'admin', 'admin', '2015-10-17 13:05:12', '2015-10-17 13:05:12'),
(391, 'es', 'gallery.title.required', 'Debe ingresar un título', 'admin', 'admin', '2015-10-17 13:05:27', '2015-10-17 13:05:27'),
(392, 'en', 'gallery.name.exist', 'Already exist a gallery with this name', 'admin', 'admin', '2015-10-17 13:05:55', '2015-10-17 13:05:55'),
(393, 'es', 'gallery.name.exist', 'Ya existe una galería con ese nombre', 'admin', 'admin', '2015-10-17 13:06:12', '2015-10-17 13:06:12'),
(394, 'en', 'upload.images.title', 'Upload Images', 'admin', 'admin', '2015-10-20 10:39:05', '2015-10-20 10:39:05'),
(395, 'es', 'upload.images.title', 'Subir Imágenes', 'admin', 'admin', '2015-10-20 10:39:25', '2015-10-20 10:39:25'),
(396, 'es', 'Galleries', 'Galerias', 'admin', 'admin', '2015-10-20 10:39:52', '2015-10-20 10:39:52'),
(397, 'en', 'systemparameter.list.title', 'General Parameters', 'admin', 'admin', '2015-10-23 10:51:28', '2015-10-23 10:51:28'),
(398, 'es', 'systemparameter.list.title', 'Parámetros Generales', 'admin', 'admin', '2015-10-23 10:51:46', '2015-10-23 10:51:46'),
(399, 'es', 'Code', 'Código', 'admin', 'admin', '2015-10-23 10:52:07', '2015-10-23 10:52:07'),
(400, 'es', 'Parameter', 'Parámetro', 'admin', 'admin', '2015-10-23 10:53:15', '2015-10-23 10:53:15'),
(401, 'es', 'Value', 'Valor', 'admin', 'admin', '2015-10-23 10:53:29', '2015-10-23 10:53:29'),
(402, 'en', 'systemparameter.title.new', 'New Parameter', 'admin', 'admin', '2015-10-23 10:54:26', '2015-10-23 10:54:26'),
(403, 'es', 'systemparameter.title.new', 'Nuevo Parámetro', 'admin', 'admin', '2015-10-23 10:54:43', '2015-10-23 10:54:43'),
(404, 'en', 'systemparameter.code.required', 'You must enter a code', 'admin', 'admin', '2015-10-23 10:55:06', '2015-10-23 10:55:06'),
(405, 'es', 'systemparameter.code.required', 'Debe ingresar un código', 'admin', 'admin', '2015-10-23 10:55:22', '2015-10-23 10:55:22'),
(406, 'en', 'systemparameter.parameter.required', 'You must enter a parameter', 'admin', 'admin', '2015-10-23 10:56:12', '2015-10-23 10:56:12'),
(407, 'es', 'systemparameter.parameter.required', 'Debe ingresar un parámetro', 'admin', 'admin', '2015-10-23 10:56:29', '2015-10-23 10:56:29');
INSERT INTO `translation` (`id`, `languagecode`, `translatekey`, `value`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(408, 'en', 'systemparameter.textvalue.required', 'You must enter a value', 'admin', 'admin', '2015-10-23 10:57:00', '2015-10-23 10:57:00'),
(409, 'es', 'systemparameter.textvalue.required', 'Debe ingresar un valor', 'admin', 'admin', '2015-10-23 10:57:48', '2015-10-23 10:57:48'),
(410, 'en', 'systemparameter.delete.question', 'Are you sure you want to delete this parameter ?', 'admin', 'admin', '2015-10-23 10:58:15', '2015-10-23 10:58:15'),
(411, 'es', 'systemparameter.delete.question', '¿ Esta seguro que desea eliminar este parámetro ?', 'admin', 'admin', '2015-10-23 10:59:52', '2015-10-23 10:59:52'),
(412, 'en', 'systemparameter.title.edit', 'Edit Parameter', 'admin', 'admin', '2015-10-23 11:00:11', '2015-10-23 11:00:11'),
(413, 'es', 'systemparameter.title.edit', 'Editar Parámetro', 'admin', 'admin', '2015-10-23 11:01:00', '2015-10-23 11:01:00'),
(414, 'en', 'systemparameter.code_parameter.exist', 'Already exist this parameter', 'admin', 'admin', '2015-10-23 11:07:43', '2015-10-23 11:07:43'),
(415, 'es', 'systemparameter.code_parameter.exist', 'Ya existe este parámetro', 'admin', 'admin', '2015-10-23 11:08:41', '2015-10-23 11:08:41'),
(416, 'en', 'fileformat.list.title', 'File Formats', 'admin', 'admin', '2015-10-23 16:00:26', '2015-10-23 16:00:26'),
(417, 'es', 'fileformat.list.title', 'Formatos de Archivos', 'admin', 'admin', '2015-10-23 16:00:45', '2015-10-23 16:00:45'),
(418, 'en', 'fileformat.title.edit', 'Edit Format Files', 'admin', 'admin', '2015-10-23 16:01:07', '2015-10-23 16:01:07'),
(419, 'es', 'fileformat.title.edit', 'Editar Formatos de Archivo', 'admin', 'admin', '2015-10-23 16:02:31', '2015-10-23 16:02:31'),
(420, 'en', 'fileformat.title.new', 'New Format File', 'admin', 'admin', '2015-10-23 16:03:49', '2015-10-23 16:03:49'),
(421, 'es', 'fileformat.title.new', 'Nuevo Formato de Archivo', 'admin', 'admin', '2015-10-23 16:04:10', '2015-10-23 16:04:10'),
(422, 'en', 'fileformat.extension.required', 'You must enter an extension', 'admin', 'admin', '2015-10-23 16:04:28', '2015-10-23 16:04:28'),
(423, 'es', 'fileformat.extension.required', 'Debe ingresar una extensión', 'admin', 'admin', '2015-10-23 16:04:48', '2015-10-23 16:04:48'),
(424, 'en', 'fileformat.extension.exist', 'Already exist this extension', 'admin', 'admin', '2015-10-23 16:06:27', '2015-10-23 16:06:27'),
(425, 'es', 'fileformat.extension.exist', 'Ya existe esta extensión', 'admin', 'admin', '2015-10-23 16:06:48', '2015-10-23 16:06:48'),
(426, 'en', 'fileformat.delete.question', 'Are you sure you want to delete this file format ?', 'admin', 'admin', '2015-10-23 16:07:22', '2015-10-23 16:07:22'),
(427, 'es', 'fileformat.delete.question', '¿ Esta seguro que desea eliminar este formato de archivo ?', 'admin', 'admin', '2015-10-23 16:07:46', '2015-10-23 16:07:46'),
(428, 'es', 'Extension', 'Extensión', 'admin', 'admin', '2015-10-23 16:08:39', '2015-10-23 16:08:39'),
(429, 'es', 'Accepted', 'Aceptado', 'admin', 'admin', '2015-10-23 16:09:10', '2015-10-23 16:09:10'),
(430, 'es', 'Yes', 'Si', 'admin', 'admin', '2015-10-23 16:11:07', '2015-10-23 16:11:07'),
(431, 'es', 'Image', 'Imagen', 'admin', 'admin', '2015-10-23 16:14:20', '2015-10-23 16:14:20'),
(432, 'es', 'Document', 'Documentos', 'admin', 'admin', '2015-10-23 16:15:16', '2015-10-23 16:15:16'),
(433, 'es', 'Author', 'Autor', 'admin', 'admin', '2015-10-27 15:31:54', '2015-10-27 15:31:54'),
(434, 'es', 'Content', 'Contenido', 'admin', 'admin', '2015-10-27 15:32:09', '2015-10-27 15:32:09'),
(435, 'es', 'Active', 'Activo', 'admin', 'admin', '2015-10-27 15:32:22', '2015-10-27 15:32:22'),
(436, 'en', 'article.title.required', 'You must enter a title', 'admin', 'admin', '2015-10-27 15:32:39', '2015-10-27 15:34:30'),
(437, 'es', 'article.title.required', 'Debe ingresar un título', 'admin', 'admin', '2015-10-27 15:33:00', '2015-10-27 15:34:52'),
(438, 'en', 'article.list.title', 'Articles', 'admin', 'admin', '2015-10-27 15:35:25', '2015-10-27 15:36:25'),
(439, 'es', 'article.list.title', 'Artículos', 'admin', 'admin', '2015-10-27 15:35:50', '2015-10-27 15:36:39'),
(440, 'en', 'article.title.new', 'New Article', 'admin', 'admin', '2015-10-27 15:39:19', '2015-10-27 15:39:19'),
(441, 'es', 'article.title.new', 'Nuevo Artículo', 'admin', 'admin', '2015-10-27 15:39:34', '2015-10-27 15:39:34'),
(442, 'en', 'article.title.edit', 'Edit Article', 'admin', 'admin', '2015-10-27 15:39:56', '2015-10-27 15:39:56'),
(443, 'es', 'article.title.edit', 'Editar Artículo', 'admin', 'admin', '2015-10-27 15:40:14', '2015-10-27 15:40:14'),
(444, 'en', 'article.delete.question', 'Are you sure you want to delete this article ?', 'admin', 'admin', '2015-10-27 15:40:46', '2015-10-27 15:40:46'),
(445, 'es', 'article.delete.question', '¿ Esta seguro que desea eliminar este artículo ?', 'admin', 'admin', '2015-10-27 15:41:10', '2015-10-27 15:41:10'),
(446, 'en', 'article.author.required', 'You must enter an author', 'admin', 'admin', '2015-10-27 15:41:38', '2015-10-27 15:41:38'),
(447, 'es', 'article.author.required', 'Debe ingresar un autor', 'admin', 'admin', '2015-10-27 15:42:02', '2015-10-27 15:42:02'),
(448, 'en', 'article.content.required', 'You must enter a content', 'admin', 'admin', '2015-10-27 15:42:33', '2015-10-27 15:42:33'),
(449, 'es', 'article.content.required', 'Debe ingresar un contenido', 'admin', 'admin', '2015-10-27 15:42:47', '2015-10-27 15:42:47'),
(450, 'en', 'article.title.exist', 'Already exist an article with this title', 'admin', 'admin', '2015-10-27 15:43:28', '2015-10-27 15:43:28'),
(451, 'es', 'article.title.exist', 'Ya existe un artículo con ese título', 'admin', 'admin', '2015-10-27 15:43:59', '2015-10-27 15:43:59'),
(452, 'en', 'article.notfound', 'Article not found', 'admin', 'admin', '2015-10-29 14:02:37', '2015-10-29 14:02:37'),
(453, 'es', 'article.notfound', 'No se encontraron artículos', 'admin', 'admin', '2015-10-29 14:03:00', '2015-10-29 14:03:00'),
(454, 'es', 'Select an Article', 'Seleccione un artículo', 'admin', 'admin', '2015-10-29 14:15:54', '2015-10-29 14:15:54'),
(455, 'es', 'Article', 'Artículo', 'admin', 'admin', '2015-11-06 10:32:30', '2015-11-06 10:32:30'),
(456, 'es', 'Comment', 'Comentario', 'admin', 'admin', '2015-11-06 10:33:20', '2015-11-06 10:33:20'),
(457, 'en', 'article_comment.list.title', 'Article Comments', 'admin', 'admin', '2015-11-06 10:34:18', '2015-11-06 10:34:18'),
(458, 'es', 'article_comment.list.title', 'Comentarios de Artículos', 'admin', 'admin', '2015-11-06 10:37:55', '2015-11-06 10:37:55'),
(459, 'en', 'article_comment.title.new', 'New Comment', 'admin', 'admin', '2015-11-06 10:39:26', '2015-11-06 10:39:26'),
(460, 'es', 'article_comment.title.new', 'Nuevo Comentario', 'admin', 'admin', '2015-11-06 10:39:41', '2015-11-06 10:39:41'),
(461, 'en', 'article_comment.name.required', 'You must enter a name', 'admin', 'admin', '2015-11-06 10:41:04', '2015-11-06 10:41:04'),
(462, 'es', 'article_comment.name.required', 'Debe ingresar un nombre', 'admin', 'admin', '2015-11-06 10:41:28', '2015-11-06 10:41:28'),
(463, 'en', 'article_comment.email.required', 'You must enter an email', 'admin', 'admin', '2015-11-06 10:43:16', '2015-11-06 10:43:16'),
(464, 'es', 'article_comment.email.required', 'Debe ingresar un email', 'admin', 'admin', '2015-11-06 10:43:35', '2015-11-06 10:43:35'),
(465, 'en', 'article_comment.comment.required', 'You must enter a comment', 'admin', 'admin', '2015-11-06 10:44:01', '2015-11-06 10:44:01'),
(466, 'es', 'article_comment.comment.required', 'Debe ingresar un comentario', 'admin', 'admin', '2015-11-06 10:44:24', '2015-11-06 10:44:24'),
(467, 'en', 'article_comment.email', 'You must enter a valid email', 'admin', 'admin', '2015-11-06 13:54:06', '2015-11-06 13:54:06'),
(468, 'es', 'article_comment.email', 'Debe ingresar un email válido', 'admin', 'admin', '2015-11-06 13:54:39', '2015-11-06 13:54:39'),
(469, 'en', 'article_comment.title.edit', 'Edit Comment', 'admin', 'admin', '2015-11-06 13:55:04', '2015-11-06 13:55:22'),
(470, 'es', 'article_comment.title.edit', 'Editar Comentario', 'admin', 'admin', '2015-11-06 13:55:39', '2015-11-06 13:55:39'),
(471, 'en', 'article_comment.delete.question', 'Are you sure you want to delete this comment ?', 'admin', 'admin', '2015-11-06 13:56:27', '2015-11-06 13:56:27'),
(472, 'es', 'article_comment.delete.question', '¿ Esta seguro que desea eliminar este comentario ?', 'admin', 'admin', '2015-11-06 13:57:52', '2015-11-06 13:57:52'),
(473, 'en', 'gallery.view.noitems', 'There are no images in this gallery', 'admin', 'admin', '2015-11-12 13:50:09', '2015-11-12 13:50:09'),
(474, 'es', 'gallery.view.noitems', 'No hay imágenes en esta galería', 'admin', 'admin', '2015-11-12 13:50:37', '2015-11-12 13:50:37'),
(475, 'en', 'file.notfound.message', 'File not found', 'admin', 'admin', '2015-11-23 13:32:51', '2015-11-23 13:32:51'),
(476, 'es', 'file.notfound.message', 'No se encontró el archivo', 'admin', 'admin', '2015-11-23 13:33:43', '2015-11-23 13:33:43'),
(477, 'en', 'files.list.title', 'Manage Files', 'admin', 'admin', '2015-11-23 13:34:40', '2015-11-23 13:34:40'),
(478, 'es', 'files.list.title', 'Administrar Archivos', 'admin', 'admin', '2015-11-23 13:35:23', '2015-11-23 13:35:23'),
(479, 'en', 'files.delete.question', 'Are you sure you want to delete this file ?', 'admin', 'admin', '2015-11-23 13:36:11', '2015-11-23 13:36:11'),
(480, 'es', 'files.delete.question', '¿ Esta seguro que desea eliminar este idioma ?', 'admin', 'admin', '2015-11-23 13:37:01', '2015-11-23 13:37:01'),
(481, 'es', 'Restaurants', 'Restaurantes', 'admin', 'admin', '2015-12-07 15:07:53', '2015-12-07 15:09:39'),
(482, 'es', 'Phone', 'Teléfono', 'admin', 'admin', '2015-12-07 15:10:17', '2015-12-07 15:10:17'),
(483, 'en', 'restaurant.list.title', 'Restaurants', 'admin', 'admin', '2015-12-07 15:15:32', '2015-12-07 15:15:32'),
(484, 'es', 'restaurant.list.title', 'Restaurantes', 'admin', 'admin', '2015-12-07 15:15:47', '2015-12-07 15:15:47'),
(485, 'en', 'restaurant.notfound', 'Restaurant not found', 'admin', 'admin', '2015-12-07 15:16:28', '2015-12-07 15:16:28'),
(486, 'es', 'restaurant.notfound', 'No se encontraron restaurantes', 'admin', 'admin', '2015-12-07 15:16:45', '2015-12-07 15:16:45'),
(487, 'en', 'restaurant.title.new', 'New Restaurant', 'admin', 'admin', '2015-12-07 15:17:07', '2015-12-07 15:17:07'),
(488, 'es', 'restaurant.title.new', 'Nuevo Restaurante', 'admin', 'admin', '2015-12-07 15:17:25', '2015-12-07 15:17:25'),
(489, 'en', 'restaurant.title.edit', 'Edit Restaurant', 'admin', 'admin', '2015-12-07 15:21:12', '2015-12-07 15:21:12'),
(490, 'es', 'restaurant.title.edit', 'Editar Restaurante', 'admin', 'admin', '2015-12-07 15:21:33', '2015-12-07 15:21:33'),
(491, 'en', 'restaurant.name.required', 'You must enter a name', 'admin', 'admin', '2015-12-07 15:21:55', '2015-12-07 15:21:55'),
(492, 'es', 'restaurant.name.required', 'Debe ingresar un nombre', 'admin', 'admin', '2015-12-07 15:24:03', '2015-12-07 15:24:03'),
(493, 'en', 'restaurant.phone.required', 'You must  enter a phone', 'admin', 'admin', '2015-12-07 15:24:25', '2015-12-07 15:24:25'),
(494, 'es', 'restaurant.phone.required', 'Debe ingresar un teléfono', 'admin', 'admin', '2015-12-07 15:24:56', '2015-12-07 15:24:56'),
(495, 'en', 'restaurant.address.required', 'You must enter an address', 'admin', 'admin', '2015-12-07 15:25:23', '2015-12-07 15:25:23'),
(496, 'es', 'restaurant.address.required', 'Debe ingresar una dirección', 'admin', 'admin', '2015-12-07 15:25:50', '2015-12-07 15:25:50'),
(497, 'en', 'restaurant.email.required', 'You must enter an email', 'admin', 'admin', '2015-12-07 15:26:16', '2015-12-07 15:26:16'),
(498, 'es', 'restaurant.email.required', 'Debe ingresar un email', 'admin', 'admin', '2015-12-07 15:26:38', '2015-12-07 15:26:38'),
(499, 'en', 'restaurant.delete.question', 'Are you sure you want to delete this restaurant ?', 'admin', 'admin', '2015-12-07 15:27:03', '2015-12-07 15:27:03'),
(500, 'es', 'restaurant.delete.question', '¿ Esta seguro que desea eliminar este restaurante ?', 'admin', 'admin', '2015-12-07 15:27:28', '2015-12-07 15:27:28'),
(501, 'es', 'Address', 'Dirección', 'admin', 'admin', '2015-12-07 15:31:46', '2015-12-07 15:31:46'),
(502, 'en', 'files.notfound', 'Files not found', 'admin', 'admin', '2015-12-09 09:23:56', '2015-12-09 09:23:56'),
(503, 'es', 'files.notfound', 'No se encontraron archivos', 'admin', 'admin', '2015-12-09 09:24:14', '2015-12-09 09:24:14'),
(504, 'es', 'Restaurant', 'Restaurante', 'admin', 'admin', '2015-12-09 14:13:59', '2015-12-09 14:13:59'),
(505, 'en', 'menu.list.title', 'Menus', 'admin', 'admin', '2015-12-09 14:15:53', '2015-12-09 14:21:23'),
(506, 'es', 'menu.list.title', 'Menus', 'admin', 'admin', '2015-12-09 14:16:12', '2015-12-09 14:21:47'),
(507, 'en', 'menu.title.new', 'New Menu', 'admin', 'admin', '2015-12-09 14:16:28', '2015-12-09 14:16:28'),
(508, 'es', 'menu.title.new', 'Nuevo Menu', 'admin', 'admin', '2015-12-09 14:16:46', '2015-12-09 14:16:46'),
(509, 'en', 'menu.title.edit', 'Edit Menu', 'admin', 'admin', '2015-12-09 14:17:29', '2015-12-09 14:17:29'),
(510, 'es', 'menu.title.edit', 'Editar Menu', 'admin', 'admin', '2015-12-09 14:17:47', '2015-12-09 14:17:47'),
(511, 'en', 'menu.restaurant.required', 'You must select a restaurant', 'admin', 'admin', '2015-12-09 14:18:14', '2015-12-09 14:18:14'),
(512, 'es', 'menu.restaurant.required', 'Debe seleccionar un restaurante', 'admin', 'admin', '2015-12-09 14:18:32', '2015-12-09 14:18:32'),
(513, 'en', 'menu.name.required', 'You must enter a name', 'admin', 'admin', '2015-12-09 14:18:55', '2015-12-09 14:18:55'),
(514, 'es', 'menu.name.required', 'Debe ingresar un nombre', 'admin', 'admin', '2015-12-09 14:19:11', '2015-12-09 14:19:11'),
(515, 'en', 'menu.delete.question', 'Are you sure you want to delete this menu ?', 'admin', 'admin', '2015-12-09 14:23:46', '2015-12-09 14:23:46'),
(516, 'es', 'menu.delete.question', '¿ Esta seguro que desea eliminar este menu ?', 'admin', 'admin', '2015-12-09 14:24:41', '2015-12-09 14:24:41'),
(517, 'en', 'menu.notfound', 'Menu not found', 'admin', 'admin', '2015-12-09 14:25:04', '2015-12-09 14:25:04'),
(518, 'es', 'menu.notfound', 'No se encontraron menus', 'admin', 'admin', '2015-12-09 14:25:32', '2015-12-09 14:25:32'),
(519, 'es', 'Category', 'Categoria', 'admin', 'admin', '2015-12-15 15:40:34', '2015-12-15 15:40:34'),
(520, 'en', 'dish_category.list.title', 'Categories', 'admin', 'admin', '2015-12-15 15:42:25', '2015-12-15 15:43:04'),
(521, 'es', 'dish_category.list.title', 'Categorias', 'admin', 'admin', '2015-12-15 15:42:38', '2015-12-15 15:43:15'),
(522, 'en', 'dish_category.title.new', 'New Category', 'admin', 'admin', '2015-12-15 15:44:16', '2015-12-15 15:44:16'),
(523, 'es', 'dish_category.title.new', 'Nueva Categoria', 'admin', 'admin', '2015-12-15 15:44:31', '2015-12-15 15:44:31'),
(524, 'en', 'dish_category.title.edit', 'Edit Category', 'admin', 'admin', '2015-12-15 15:44:53', '2015-12-15 15:44:53'),
(525, 'es', 'dish_category.title.edit', 'Editar Categoria', 'admin', 'admin', '2015-12-15 15:45:05', '2015-12-15 15:45:05'),
(526, 'en', 'dish_category.delete.question', 'Are you sure you want to delete this category ?', 'admin', 'admin', '2015-12-15 15:45:45', '2015-12-15 15:45:45'),
(527, 'es', 'dish_category.delete.question', '¿ Esta seguro que desea eliminar esta categoria ?', 'admin', 'admin', '2015-12-15 15:46:23', '2015-12-15 15:46:23'),
(528, 'en', 'category.required', 'You must enter a category', 'admin', 'admin', '2015-12-15 15:46:46', '2015-12-15 15:46:46'),
(529, 'es', 'category.required', 'Debe ingresar una categoria', 'admin', 'admin', '2015-12-15 15:47:29', '2015-12-15 15:47:29'),
(530, 'en', 'category.exist', 'Already exist a category with this name', 'admin', 'admin', '2015-12-15 15:48:03', '2015-12-15 15:48:03'),
(531, 'es', 'category.exist', 'Ya existe una categoria con ese nombre', 'admin', 'admin', '2015-12-15 15:48:21', '2015-12-15 15:48:21'),
(532, 'en', 'category.constraintviolation', 'You can not delete this category, there are data associated', 'admin', 'admin', '2015-12-15 15:49:11', '2015-12-15 15:49:11'),
(533, 'es', 'category.constraintviolation', 'No se puede eliminar esta categoria ya que tiene otros datos asociados', 'admin', 'admin', '2015-12-15 15:58:15', '2015-12-15 15:58:15'),
(534, 'es', 'Price', 'Precio', 'admin', 'admin', '2015-12-15 18:31:33', '2015-12-15 18:31:33'),
(535, 'en', 'dish.list.title', 'Dishes', 'admin', 'admin', '2015-12-15 18:32:28', '2015-12-15 18:32:28'),
(536, 'es', 'dish.list.title', 'Platos', 'admin', 'admin', '2015-12-15 18:32:44', '2015-12-15 18:32:44'),
(537, 'en', 'dish.title.new', 'New Dish', 'admin', 'admin', '2015-12-15 18:33:16', '2015-12-15 18:38:50'),
(538, 'es', 'dish.title.new', 'Nuevo Plato', 'admin', 'admin', '2015-12-15 18:33:34', '2015-12-15 18:33:34'),
(539, 'en', 'dish.title.edit', 'Edit Dish', 'admin', 'admin', '2015-12-15 18:33:48', '2015-12-15 18:33:48'),
(540, 'es', 'dish.title.edit', 'Editar Plato', 'admin', 'admin', '2015-12-15 18:33:58', '2015-12-15 18:33:58'),
(541, 'en', 'dish.delete.question', 'Are you sure you want to delete this dish ?', 'admin', 'admin', '2015-12-15 18:34:24', '2015-12-15 18:34:24'),
(542, 'es', 'dish.delete.question', '¿ Esta seguro que desea eliminar este plato ?', 'admin', 'admin', '2015-12-15 18:34:44', '2015-12-15 18:34:44'),
(543, 'en', 'dish.name.required', 'You must enter a name', 'admin', 'admin', '2015-12-15 18:35:06', '2015-12-15 18:35:06'),
(544, 'es', 'dish.name.required', 'Debe ingresar un nombre', 'admin', 'admin', '2015-12-15 18:35:18', '2015-12-15 18:35:18'),
(545, 'en', 'dish.price.required', 'You must enter a price', 'admin', 'admin', '2015-12-15 18:35:38', '2015-12-15 18:35:38'),
(546, 'es', 'dish.price.required', 'Debe ingresar un precio', 'admin', 'admin', '2015-12-15 18:35:51', '2015-12-15 18:35:51'),
(547, 'en', 'dish.exist', 'Already exist a dish with this name', 'admin', 'admin', '2015-12-15 18:36:45', '2015-12-15 18:36:45'),
(548, 'es', 'dish.exist', 'Ya existe un plato con ese nombre', 'admin', 'admin', '2015-12-15 18:37:31', '2015-12-15 18:37:31'),
(549, 'es', 'Gallery', 'Galeria', 'admin', 'admin', '2015-12-15 18:45:43', '2015-12-15 18:45:43'),
(550, 'en', 'dish.notfound', 'Dish not found', 'admin', 'admin', '2015-12-15 21:24:29', '2015-12-15 21:24:29'),
(551, 'es', 'dish.notfound', 'No se encontraron platos', 'admin', 'admin', '2015-12-15 21:24:52', '2015-12-15 21:24:52'),
(552, 'es', 'Dish', 'Plato', 'admin', 'admin', '2015-12-16 20:10:43', '2015-12-16 20:10:43'),
(553, 'es', 'Language', 'Idioma', 'admin', 'admin', '2015-12-16 20:11:00', '2015-12-16 20:11:00'),
(554, 'es', 'Dish Name', 'Nombre del Plato', 'admin', 'admin', '2015-12-16 20:12:11', '2015-12-16 20:12:11'),
(555, 'es', 'Name translation', 'Traducción del nombre', 'admin', 'admin', '2015-12-16 20:12:28', '2015-12-16 20:12:28'),
(556, 'es', 'Description translation', 'Traducción de la descripción', 'admin', 'admin', '2015-12-16 20:12:49', '2015-12-16 20:12:49'),
(557, 'en', 'dish_translation.list.title', 'Dish Translations', 'admin', 'admin', '2015-12-16 20:15:41', '2015-12-16 20:15:41'),
(558, 'es', 'dish_translation.list.title', 'Traducciones del plato', 'admin', 'admin', '2015-12-16 20:16:20', '2015-12-16 20:16:20'),
(559, 'en', 'dish_translation.title.new', 'New Translation', 'admin', 'admin', '2015-12-16 20:17:29', '2015-12-16 20:17:29'),
(560, 'es', 'dish_translation.title.new', 'Nueva traducción', 'admin', 'admin', '2015-12-16 20:17:43', '2015-12-16 20:17:43'),
(561, 'en', 'dish_translation.title.edit', 'Edit Translation', 'admin', 'admin', '2015-12-16 20:18:25', '2015-12-16 20:18:25'),
(562, 'es', 'dish_translation.title.edit', 'Editar Traducción', 'admin', 'admin', '2015-12-16 20:18:42', '2015-12-16 20:18:42'),
(563, 'en', 'dish_translation.delete.question', 'Are you sure you want to delete this translation ?', 'admin', 'admin', '2015-12-16 20:21:27', '2015-12-16 20:21:27'),
(564, 'es', 'dish_translation.delete.question', '¿ Esta seguro que desea eliminar esta traducción ?', 'admin', 'admin', '2015-12-16 20:22:32', '2015-12-16 20:22:32'),
(565, 'en', 'dish_translation.language.required', 'You must select a language', 'admin', 'admin', '2015-12-16 20:23:09', '2015-12-16 20:23:09'),
(566, 'es', 'dish_translation.language.required', 'Debe seleccionar un idioma', 'admin', 'admin', '2015-12-16 20:23:34', '2015-12-16 20:23:34'),
(567, 'en', 'dish_translation.name.required', 'You must enter a translate name', 'admin', 'admin', '2015-12-16 20:23:59', '2015-12-16 20:23:59'),
(568, 'es', 'dish_translation.name.required', 'Debe ingresar una traducción para el nombre', 'admin', 'admin', '2015-12-16 20:24:18', '2015-12-16 20:24:18'),
(569, 'en', 'dish_translation.description.required', 'You must enter a description translation', 'admin', 'admin', '2015-12-16 20:24:44', '2015-12-16 20:48:06'),
(570, 'es', 'dish_translation.description.required', 'Debe ingresar una traducción para la descripción', 'admin', 'admin', '2015-12-16 20:25:06', '2015-12-16 20:25:06'),
(571, 'en', 'dish_translation.language.exist', 'Already exist a translation for this language', 'admin', 'admin', '2015-12-16 20:49:27', '2015-12-16 20:49:27'),
(572, 'es', 'dish_translation.language.exist', 'Ya existe una traducción para ese idioma', 'admin', 'admin', '2015-12-16 20:49:49', '2015-12-16 20:49:49'),
(573, 'en', 'article_translation.list.title', 'Article translations', 'admin', 'admin', '2015-12-17 19:37:30', '2015-12-17 19:37:30'),
(574, 'es', 'article_translation.list.title', 'Traducciones del artículo', 'admin', 'admin', '2015-12-17 19:38:40', '2015-12-17 19:38:40'),
(575, 'es', 'Article Name', 'Nombre del Artículo', 'admin', 'admin', '2015-12-17 19:38:57', '2015-12-17 19:38:57'),
(576, 'es', 'Translate title', 'Traducción del título', 'admin', 'admin', '2015-12-17 19:39:20', '2015-12-17 19:39:20'),
(577, 'en', 'article_translation.title.new', 'New Translation', 'admin', 'admin', '2015-12-17 19:39:41', '2015-12-17 19:39:41'),
(578, 'es', 'article_translation.title.new', 'Nueva traducción', 'admin', 'admin', '2015-12-17 19:40:00', '2015-12-17 19:40:00'),
(579, 'en', 'article_translation.title.edit', 'Edit Translation', 'admin', 'admin', '2015-12-17 19:41:10', '2015-12-17 19:41:10'),
(580, 'es', 'article_translation.title.edit', 'Editar Traducción', 'admin', 'admin', '2015-12-17 19:41:24', '2015-12-17 19:41:24'),
(581, 'en', 'article_translation.delete.question', 'Are you sure you want to delete this translation ?', 'admin', 'admin', '2015-12-17 19:41:50', '2015-12-17 19:41:50'),
(582, 'es', 'article_translation.delete.question', '¿ Esta seguro que desea eliminar esta traducción ?', 'admin', 'admin', '2015-12-17 19:42:14', '2015-12-17 19:42:14'),
(583, 'en', 'article_translation.language.required', 'You must select a language', 'admin', 'admin', '2015-12-17 19:42:36', '2015-12-17 19:42:36'),
(584, 'es', 'article_translation.language.required', 'Debe seleccionar un idioma', 'admin', 'admin', '2015-12-17 19:44:29', '2015-12-17 19:44:29'),
(585, 'en', 'article_translation.title.required', 'You must enter a translate title', 'admin', 'admin', '2015-12-17 19:45:15', '2015-12-17 19:45:15'),
(586, 'es', 'article_translation.title.required', 'Debe ingresar un título traducido', 'admin', 'admin', '2015-12-17 19:47:00', '2015-12-17 19:47:00'),
(587, 'en', 'article_translation.content.required', 'You must enter a translate content', 'admin', 'admin', '2015-12-17 19:47:44', '2015-12-17 19:47:44'),
(588, 'es', 'article_translation.content.required', 'Debe ingresar la traducción del contenido', 'admin', 'admin', '2015-12-17 19:48:31', '2015-12-17 19:48:31'),
(589, 'en', 'article_translation.language.exist', 'Already exist a translation for this language', 'admin', 'admin', '2015-12-17 19:51:15', '2015-12-17 19:51:15'),
(590, 'es', 'article_translation.language.exist', 'Ya existe una traducción para ese idioma', 'admin', 'admin', '2015-12-17 19:51:36', '2015-12-17 19:51:36'),
(591, 'es', 'Location', 'Localización', 'admin', 'admin', '2015-12-21 20:53:52', '2015-12-21 20:53:52'),
(592, 'es', 'Start Date', 'Fecha Inicial', 'admin', 'admin', '2015-12-21 20:54:08', '2015-12-21 20:54:08'),
(593, 'es', 'Finish Date', 'Fecha Final', 'admin', 'admin', '2015-12-21 20:54:30', '2015-12-21 20:54:30'),
(594, 'en', 'event.list.title', 'Events', 'admin', 'admin', '2015-12-21 20:55:22', '2015-12-21 20:55:22'),
(595, 'es', 'event.list.title', 'Eventos', 'admin', 'admin', '2015-12-21 20:56:07', '2015-12-21 20:56:07'),
(596, 'en', 'event.title.new', 'New Event', 'admin', 'admin', '2015-12-21 20:56:24', '2015-12-21 20:56:24'),
(597, 'es', 'event.title.new', 'Nuevo Evento', 'admin', 'admin', '2015-12-21 20:56:35', '2015-12-21 20:56:35'),
(598, 'en', 'event.title.edit', 'Edit Event', 'admin', 'admin', '2015-12-21 20:56:57', '2015-12-21 20:56:57'),
(599, 'es', 'event.title.edit', 'Editar Evento', 'admin', 'admin', '2015-12-21 20:57:21', '2015-12-21 20:57:21'),
(600, 'en', 'event.delete.question', 'Are you sure you want to delete this event ?', 'admin', 'admin', '2015-12-21 20:59:39', '2015-12-21 20:59:39'),
(601, 'es', 'event.delete.question', '¿ Esta seguro que desea eliminar este evento ?', 'admin', 'admin', '2015-12-21 21:00:11', '2015-12-21 21:00:11'),
(602, 'en', 'event.name.required', 'You must to enter a name', 'admin', 'admin', '2015-12-21 21:54:00', '2015-12-21 21:54:00'),
(603, 'es', 'event.name.required', 'Debe ingresar un nombre', 'admin', 'admin', '2015-12-21 21:54:21', '2015-12-21 21:54:21'),
(604, 'en', 'event.start_date.required', 'You must to enter a start date', 'admin', 'admin', '2015-12-21 21:54:48', '2015-12-21 21:54:48'),
(605, 'es', 'event.start_date.required', 'Debe ingresar un fecha inicial', 'admin', 'admin', '2015-12-21 21:55:50', '2015-12-21 21:58:45'),
(606, 'en', 'event.finish_date.required', 'You must enter a finish date', 'admin', 'admin', '2015-12-21 21:57:13', '2015-12-21 21:57:13'),
(607, 'es', 'event.finish_date.required', 'Debe ingresar una fecha final', 'admin', 'admin', '2015-12-21 21:58:00', '2015-12-21 21:58:00'),
(608, 'en', 'event.exist', 'Already exist a event with this name', 'admin', 'admin', '2015-12-21 22:00:07', '2015-12-21 22:00:07'),
(609, 'es', 'event.exist', 'Ya existe un evento con ese nombre', 'admin', 'admin', '2015-12-21 22:00:28', '2015-12-21 22:00:28'),
(610, 'en', 'event.constraintviolation', 'You can not delete this event, there are data associated', 'admin', 'admin', '2015-12-21 22:01:07', '2015-12-21 22:01:07'),
(611, 'es', 'event.constraintviolation', 'No se puede eliminar este evento ya que tiene otros datos asociados', 'admin', 'admin', '2015-12-21 22:01:39', '2015-12-21 22:01:39'),
(612, 'en', 'event.invalid_dates', 'Start date must be less than the end date', 'admin', 'admin', '2015-12-21 22:02:52', '2015-12-21 22:02:52'),
(613, 'es', 'event.invalid_dates', 'La fecha inicial debe ser menor que la fecha final', 'admin', 'admin', '2015-12-21 22:32:37', '2015-12-21 22:32:37'),
(614, 'en', 'Seleccione una galeria', 'Select a gallery', 'admin', 'admin', '2016-01-08 22:12:00', '2016-01-08 22:12:00'),
(615, 'en', 'eventgallery.list.title', 'Galleries', 'admin', 'admin', '2016-01-08 22:12:40', '2016-01-08 22:13:18'),
(616, 'es', 'eventgallery.list.title', 'Galerias', 'admin', 'admin', '2016-01-08 22:13:00', '2016-01-08 22:13:00'),
(617, 'en', 'eventgallery.notfound', 'Gallery not found', 'admin', 'admin', '2016-01-08 22:13:42', '2016-01-08 22:13:42'),
(618, 'es', 'eventgallery.notfound', 'No se encontraron galerias', 'admin', 'admin', '2016-01-08 22:13:59', '2016-01-08 22:14:18'),
(619, 'en', 'eventgallery.title.new', 'Add Gallery', 'admin', 'admin', '2016-01-08 22:14:52', '2016-01-08 22:14:52'),
(620, 'es', 'eventgallery.title.new', 'Agregar Galeria', 'admin', 'admin', '2016-01-08 22:15:05', '2016-01-08 22:15:05'),
(621, 'en', 'eventgallery.delete.question', 'Are you sure you want to remove this gallery ?', 'admin', 'admin', '2016-01-08 22:15:49', '2016-01-08 22:15:49'),
(622, 'es', 'eventgallery.delete.question', '¿ Esta seguro que desea quitar esta galeria ?', 'admin', 'admin', '2016-01-08 22:16:29', '2016-01-08 22:16:29'),
(623, 'en', 'event.gallery.required', 'You must select a gallery', 'admin', 'admin', '2016-01-08 22:16:51', '2016-01-08 22:16:51'),
(624, 'es', 'event.gallery.required', 'Debe seleccionar una galeria', 'admin', 'admin', '2016-01-08 22:17:06', '2016-01-08 22:17:06'),
(625, 'en', 'eventgallery.gallery.exist', 'Already exists this gallery in the event', 'admin', 'admin', '2016-01-08 22:18:37', '2016-01-08 22:18:37'),
(626, 'es', 'eventgallery.gallery.exist', 'Ya esta asociada esta galeria al evento', 'admin', 'admin', '2016-01-08 22:20:21', '2016-01-08 22:20:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` longtext,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(30, 'admin', 'andresfranco@cableonda.net', '$2a$08$GYhoUJZxQha4xYSX4WbapebHRBYhT.biiqsia63QICJhS8NMepN1W', 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(37, 'test2', 'andresfranco@cableonda.net', '$2a$08$13NjHo7VHfGd7DRkPCCoW.8a.hWjDUTcBJXNCL3OC2o61aeRcJr8y', 'admin', 'admin', '2015-09-16 22:45:49', '2015-09-16 22:45:49'),
(38, 'test5', 'andresfranco@cableonda.net', '$2a$08$RbaMD9e6TZ1d6U9qljY1WeFROKpfYrV6sqMD8OeSc.92A5HurGqii', 'admin', 'admin', '2015-09-16 23:04:10', '2015-09-16 23:04:10'),
(39, 'test99as', 'andresfranco@cableonda.net', '$2a$08$f6fK6GRyZwgPCLMienjls.0npOUESpFXSPGvprrSmxULBP5niTT8G', 'admin', 'admin', '2015-09-29 03:21:01', '2015-09-28 20:28:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_role`
--

CREATE TABLE `user_role` (
  `userid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_role`
--

INSERT INTO `user_role` (`userid`, `roleid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(30, 1, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(37, 2, 'admin', 'admin', '2015-09-16 09:38:01', '2015-09-16 09:38:01'),
(39, 2, 'admin', 'admin', '2015-09-29 09:08:09', '2015-09-29 09:08:09');

-- --------------------------------------------------------

--
-- Estructura para la vista `apartmentlist`
--
DROP TABLE IF EXISTS `apartmentlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `apartmentlist`  AS  select `a`.`id` AS `id`,`a`.`name` AS `name`,`c`.`name` AS `company`,`t`.`number` AS `tower` from ((`apartment` `a` join `tower` `t` on((`a`.`towerid` = `t`.`id`))) join `company` `c` on((`a`.`companyid` = `c`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `neighborhoodview`
--
DROP TABLE IF EXISTS `neighborhoodview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `neighborhoodview`  AS  select `n`.`id` AS `id`,`c`.`city` AS `city`,`c2`.`country` AS `country`,`s`.`state` AS `state`,`t`.`township` AS `township`,`n`.`neighborhood` AS `neighborhood` from ((((`neighborhood` `n` join `city` `c` on((`c`.`id` = `n`.`cityid`))) join `country` `c2` on((`c2`.`id` = `c`.`countryid`))) join `state` `s` on((`s`.`id` = `c`.`stateid`))) join `township` `t` on((`t`.`id` = `n`.`townshipid`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `townshipview`
--
DROP TABLE IF EXISTS `townshipview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `townshipview`  AS  select `t`.`id` AS `id`,`t`.`cityid` AS `cityid`,`c`.`city` AS `city`,`c2`.`country` AS `country`,`s`.`state` AS `state`,`t`.`township` AS `township` from (((`township` `t` join `city` `c` on((`c`.`id` = `t`.`cityid`))) join `country` `c2` on((`c2`.`id` = `c`.`countryid`))) join `state` `s` on((`s`.`id` = `c`.`stateid`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `action_role`
--
ALTER TABLE `action_role`
  ADD PRIMARY KEY (`actionid`,`roleid`),
  ADD KEY `fk_action_role_role1_idx` (`roleid`);

--
-- Indices de la tabla `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_country1_idx` (`countryid`),
  ADD KEY `fk_address_city1_idx` (`cityid`),
  ADD KEY `fk_address_township1_idx` (`townshipid`),
  ADD KEY `fk_address_neighborhood1_idx` (`neighborhoodid`),
  ADD KEY `fk_address_state1_idx` (`stateid`);

--
-- Indices de la tabla `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_apartment_tower1_idx` (`towerid`),
  ADD KEY `fk_apartment_company1_idx` (`companyid`);

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `article_comment`
--
ALTER TABLE `article_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_article1_idx` (`articleid`);

--
-- Indices de la tabla `article_translation`
--
ALTER TABLE `article_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_translation_article1_idx` (`articleid`),
  ADD KEY `fk_article_translation_language1_idx` (`languagecode`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_city_country1_idx` (`countryid`),
  ADD KEY `fk_city_state1_idx` (`stateid`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `company_address`
--
ALTER TABLE `company_address`
  ADD PRIMARY KEY (`companyid`,`addressid`),
  ADD KEY `fk_company_address_address1_idx` (`addressid`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dish_menu1_idx` (`menuid`),
  ADD KEY `fk_dish_dish_category1_idx` (`categoryid`);

--
-- Indices de la tabla `dish_category`
--
ALTER TABLE `dish_category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dish_translation`
--
ALTER TABLE `dish_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dish_translation_dish1_idx` (`dishid`),
  ADD KEY `fk_dish_translation_language1_idx` (`languagecode`);

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `event_gallery`
--
ALTER TABLE `event_gallery`
  ADD PRIMARY KEY (`eventid`,`galleryid`),
  ADD KEY `fk_event_gallery_event1_idx` (`eventid`),
  ADD KEY `fk_event_gallery_gallery1_idx` (`galleryid`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `file_format`
--
ALTER TABLE `file_format`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gallery_image_gallery1_idx` (`galleryid`),
  ADD KEY `fk_gallery_image_image1_idx` (`imageid`);

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_restaurant1_idx` (`restaurantid`);

--
-- Indices de la tabla `neighborhood`
--
ALTER TABLE `neighborhood`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_neighborhood_township1_idx` (`townshipid`),
  ADD KEY `fk_neighborhood_city1_idx` (`cityid`);

--
-- Indices de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_restaurant_address1_idx` (`addressid`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_state_country1_idx` (`countryid`);

--
-- Indices de la tabla `system_parameter`
--
ALTER TABLE `system_parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testtabla`
--
ALTER TABLE `testtabla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tower`
--
ALTER TABLE `tower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tower_company_idx` (`companyid`);

--
-- Indices de la tabla `township`
--
ALTER TABLE `township`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_township_city1_idx` (`cityid`);

--
-- Indices de la tabla `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_translation_language1_idx` (`languagecode`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`userid`,`roleid`),
  ADD KEY `fk_user_role_user1_idx` (`userid`),
  ADD KEY `fk_user_role_role1_idx` (`roleid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT de la tabla `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `article_comment`
--
ALTER TABLE `article_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `article_translation`
--
ALTER TABLE `article_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT de la tabla `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dish_category`
--
ALTER TABLE `dish_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dish_translation`
--
ALTER TABLE `dish_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `file_format`
--
ALTER TABLE `file_format`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `neighborhood`
--
ALTER TABLE `neighborhood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `system_parameter`
--
ALTER TABLE `system_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `testtabla`
--
ALTER TABLE `testtabla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tower`
--
ALTER TABLE `tower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `township`
--
ALTER TABLE `township`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `translation`
--
ALTER TABLE `translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=627;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `action_role`
--
ALTER TABLE `action_role`
  ADD CONSTRAINT `fk_action_role_action1` FOREIGN KEY (`actionid`) REFERENCES `action` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_action_role_role1` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_city1` FOREIGN KEY (`cityid`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_address_country1` FOREIGN KEY (`countryid`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_address_neighborhood1` FOREIGN KEY (`neighborhoodid`) REFERENCES `neighborhood` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_address_state1` FOREIGN KEY (`stateid`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_address_township1` FOREIGN KEY (`townshipid`) REFERENCES `township` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `fk_apartment_company1` FOREIGN KEY (`companyid`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartment_tower1` FOREIGN KEY (`towerid`) REFERENCES `tower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `article_comment`
--
ALTER TABLE `article_comment`
  ADD CONSTRAINT `fk_comment_article1` FOREIGN KEY (`articleid`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `article_translation`
--
ALTER TABLE `article_translation`
  ADD CONSTRAINT `fk_article_translation_article1` FOREIGN KEY (`articleid`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_translation_language1` FOREIGN KEY (`languagecode`) REFERENCES `language` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_country1` FOREIGN KEY (`countryid`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_city_state1` FOREIGN KEY (`stateid`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `company_address`
--
ALTER TABLE `company_address`
  ADD CONSTRAINT `fk_company_address_address1` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company_address_company1` FOREIGN KEY (`companyid`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `fk_dish_dish_category1` FOREIGN KEY (`categoryid`) REFERENCES `dish_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dish_menu1` FOREIGN KEY (`menuid`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dish_translation`
--
ALTER TABLE `dish_translation`
  ADD CONSTRAINT `fk_dish_translation_dish1` FOREIGN KEY (`dishid`) REFERENCES `dish` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dish_translation_language1` FOREIGN KEY (`languagecode`) REFERENCES `language` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `event_gallery`
--
ALTER TABLE `event_gallery`
  ADD CONSTRAINT `fk_event_gallery_event1` FOREIGN KEY (`eventid`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_event_gallery_gallery1` FOREIGN KEY (`galleryid`) REFERENCES `gallery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD CONSTRAINT `fk_gallery_image_gallery1` FOREIGN KEY (`galleryid`) REFERENCES `gallery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gallery_image_image1` FOREIGN KEY (`imageid`) REFERENCES `image` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_restaurant1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `neighborhood`
--
ALTER TABLE `neighborhood`
  ADD CONSTRAINT `fk_neighborhood_city1` FOREIGN KEY (`cityid`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_neighborhood_township1` FOREIGN KEY (`townshipid`) REFERENCES `township` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `fk_restaurant_address1` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `fk_state_country1` FOREIGN KEY (`countryid`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tower`
--
ALTER TABLE `tower`
  ADD CONSTRAINT `fk_tower_company` FOREIGN KEY (`companyid`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `township`
--
ALTER TABLE `township`
  ADD CONSTRAINT `fk_township_city1` FOREIGN KEY (`cityid`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `translation`
--
ALTER TABLE `translation`
  ADD CONSTRAINT `fk_translation_language1` FOREIGN KEY (`languagecode`) REFERENCES `language` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_user_role_role1` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_role_user1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
