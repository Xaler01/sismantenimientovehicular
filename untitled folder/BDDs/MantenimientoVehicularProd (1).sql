-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2023 at 01:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MantenimientoVehicularProd`
--

-- --------------------------------------------------------

--
-- Table structure for table `circuito`
--

CREATE TABLE `circuito` (
  `id` int(11) NOT NULL,
  `distrito_id` int(11) DEFAULT NULL,
  `codigo` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(11) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'LOJA', '2023-07-09 01:17:18', '2023-07-09 01:17:18'),
(2, 'QUITO', '2023-07-09 01:17:32', '2023-07-09 01:17:32'),
(3, 'GUAYAQUIL', '2023-07-09 01:19:26', '2023-07-09 01:19:26'),
(4, 'CUENCA', '2023-07-09 01:19:31', '2023-07-09 01:19:31'),
(5, 'SANTO DOMINGO DE LOS TSÁCHILAS', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(6, 'MACHALA', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(7, 'MANTA', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(8, 'PORTOVIEJO', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(9, 'AMBATO', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(10, 'DURÁN', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(11, 'ESMERALDAS', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(12, 'IBARRA', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(13, 'QUEVEDO', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(14, 'RIOBAMBA', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(15, 'TULCÁN', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(16, 'BABAHYO', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(17, 'LATACUNGA', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(18, 'SALINAS', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(19, 'SANTA ELENA', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(20, 'MILAGRO', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(21, 'SANGOLQUÍ', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(22, 'OTAVALO', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(23, 'GUARANDA', '2023-07-10 08:55:03', '2023-07-10 08:55:03'),
(24, 'AZOGUES', '2023-07-10 08:55:03', '2023-07-10 08:55:03');

-- --------------------------------------------------------

--
-- Stand-in structure for view `dependencia`
-- (See below for the actual view)
--
CREATE TABLE `dependencia` (
`provincia_id` int(11)
,`provincia_nombre` varchar(255)
,`parroquia_id` int(11)
,`parroquia_nombre` varchar(255)
,`distrito_id` int(11)
,`distrito_codigo` varchar(11)
,`distrito_nombre` varchar(50)
,`circuito_id` int(11)
,`circuito_codigo` varchar(11)
,`circuito_nombre` varchar(50)
,`subcircuito_id` int(11)
,`subcircuito_codigo` varchar(11)
,`subcircuito_nombre` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `dependencias`
--

CREATE TABLE `dependencias` (
  `id` int(11) NOT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  `num_distritos` int(11) DEFAULT NULL,
  `parroquia_id` int(11) DEFAULT NULL,
  `cod_distrito` varchar(255) DEFAULT NULL,
  `nombre_distrito` varchar(255) DEFAULT NULL,
  `num_circuitos` int(11) DEFAULT NULL,
  `cod_circuito` varchar(255) DEFAULT NULL,
  `nombre_circuito` varchar(255) DEFAULT NULL,
  `num_subcircuitos` int(11) DEFAULT NULL,
  `cod_subcircuito` varchar(255) NOT NULL,
  `nombre_subcircuito` varchar(255) DEFAULT NULL,
  `estado_id` int(15) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(11) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(0, 'Eliminado'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'CHEVROLET', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(2, 'HYUNDAI', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(3, 'KIA', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(4, 'NISSAN', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(5, 'TOYOTA', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(6, 'FORD', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(7, 'VOLKSWAGEN', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(8, 'HONDA', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(9, 'MITSUBISHI', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(10, 'YAMAHA', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(11, 'SUZUKI', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(12, 'BAJAJ', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(13, 'KTM', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(14, 'KAWASAKI', '2023-07-10 08:49:12', '2023-07-10 08:49:12'),
(15, 'TVS', '2023-07-10 08:49:12', '2023-07-10 08:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parroquia`
--

CREATE TABLE `parroquia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `estado` varchar(11) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_subcircuito`
--

CREATE TABLE `personal_subcircuito` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subcircuito_id` int(11) DEFAULT NULL,
  `fecha_asignacion` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`, `estado`) VALUES
(1, 'AZUAY', 'Eliminado'),
(2, 'BOLÍVAR', 'Eliminado'),
(3, 'CAÑAR', 'Eliminado'),
(4, 'CARCHI', 'Eliminado'),
(5, 'COTOPAXI', 'Eliminado'),
(6, 'CHIMBORAZO', 'Eliminado'),
(7, 'EL ORO', 'Eliminado'),
(8, 'ESMERALDAS', 'Eliminado'),
(9, 'GUAYAS', 'Eliminado'),
(10, 'IMBABURA', 'Eliminado'),
(11, 'LOJA', 'Activo'),
(12, 'LOS RIOS', 'Eliminado'),
(13, 'MANABI', 'Eliminado'),
(14, 'MORONA SANTIAGO', 'Eliminado'),
(15, 'NAPO', 'Eliminado'),
(16, 'PASTAZA', 'Eliminado'),
(17, 'PICHINCHA', 'Activo'),
(18, 'TUNGURAHUA', 'Eliminado'),
(19, 'ZAMORA CHINCHIPE', 'Eliminado'),
(20, 'GALAPAGOS', 'Eliminado'),
(21, 'SUCUMBIOS', 'Eliminado'),
(22, 'ORELLANA', 'Eliminado'),
(23, 'SANTO DOMINGO DE LOS TSACHILAS', 'Eliminado'),
(24, 'SANTA ELENA', 'Eliminado');

-- --------------------------------------------------------

--
-- Table structure for table `rango`
--

CREATE TABLE `rango` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rango`
--

INSERT INTO `rango` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Policía', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(2, 'Cabo Segundo', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(3, 'Cabo Primero', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(4, 'Sargento Segundo', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(5, 'Sargento Primero', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(6, 'Suboficial Segundo', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(7, 'Suboficial Primero', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(8, 'Suboficial Mayor', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(9, 'Subteniente de Policía', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(10, 'Teniente de Policía', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(11, 'Capitán de Policía', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(12, 'Mayor de Policía', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(13, 'Teniente Coronel de Policía', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(14, 'Coronel de Policía', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(15, 'General de Distrito', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(16, 'General Inspector', '2023-07-10 13:41:14', '2023-07-10 13:41:14'),
(17, 'General Superior', '2023-07-10 13:41:14', '2023-07-10 13:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes_mantenimiento`
--

CREATE TABLE `solicitudes_mantenimiento` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehiculo_id` int(11) DEFAULT NULL,
  `tipo_mantenimiento_id` int(15) NOT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `hora_solicitud` time DEFAULT NULL,
  `kilometraje_actual` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcircuito`
--

CREATE TABLE `subcircuito` (
  `id` int(11) NOT NULL,
  `circuito_id` int(11) NOT NULL,
  `parroquia_id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` varchar(11) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_mantenimiento`
--

CREATE TABLE `tipo_mantenimiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `detallemantenimiento` text DEFAULT NULL,
  `valor` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_sangre`
--

CREATE TABLE `tipo_sangre` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_sangre`
--

INSERT INTO `tipo_sangre` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'A+', '2023-07-10 13:42:23', '2023-07-10 13:42:23'),
(2, 'A-', '2023-07-10 13:42:23', '2023-07-10 13:42:23'),
(3, 'B+', '2023-07-10 13:42:23', '2023-07-10 13:42:23'),
(4, 'B-', '2023-07-10 13:42:23', '2023-07-10 13:42:23'),
(5, 'AB+', '2023-07-10 13:42:23', '2023-07-10 13:42:23'),
(6, 'AB-', '2023-07-10 13:42:23', '2023-07-10 13:42:23'),
(7, 'O+', '2023-07-10 13:42:23', '2023-07-10 13:42:23'),
(8, 'O-', '2023-07-10 13:42:23', '2023-07-10 13:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Automóvil', '2023-07-10 13:37:54', '2023-07-10 13:37:54'),
(2, 'Camioneta', '2023-07-10 13:37:54', '2023-07-10 13:37:54'),
(3, 'Motocicleta', '2023-07-10 13:37:54', '2023-07-10 13:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) DEFAULT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `tipo_sangre_id` int(11) NOT NULL,
  `ciudad_nacimiento_id` int(11) NOT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `rango_id` int(11) NOT NULL,
  `subcircuito_id` int(11) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `estado_id` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `cedula`, `fecha_nacimiento`, `tipo_sangre_id`, `ciudad_nacimiento_id`, `celular`, `rango_id`, `subcircuito_id`, `rol`, `estado_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alexander Jácome', 'eajacome1@utpl.edu.ec', '2023-07-09 22:20:24', '$2y$10$hURW6sGM2oofbaGiH2DUZ.cM8cqp6lyz3J1X6zM9LnE7Qh0nmaRaq', '1720108909', '2000-09-07', 7, 2, '0994246317', 17, NULL, 'Encargado', 1, '5dYzdp4gnx5JkX0y6iY9Qxx6xMsW8kl9gF78XrGktwQuiM81Aacs4m1U9WFu', '2023-06-16 19:07:31', '2023-06-20 13:35:17'),
(2, 'Eustaquio Sandoval', 'test1@utpl.edu.ec', '2023-07-16 22:55:42', '$2y$10$cSHmwVsJfzCvKyu688428erHBfBmQ6CjTaMZcs0rSBnOYz2YzN1w.', '1723734859', '1988-11-10', 8, 15, '0993476243', 5, NULL, 'Policia', 1, NULL, '2023-07-17 03:55:42', '2023-07-17 03:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `tipo_vehiculo_id` int(11) DEFAULT NULL,
  `placa` varchar(255) DEFAULT NULL,
  `chasis` varchar(255) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `motor` varchar(255) DEFAULT NULL,
  `kilometraje` int(11) DEFAULT NULL,
  `cilindraje` int(11) DEFAULT NULL,
  `capacidad_carga` int(11) DEFAULT NULL,
  `capacidad_pasajeros` int(11) DEFAULT NULL,
  `subcircuito_id` int(11) DEFAULT NULL,
  `estado_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `tipo_vehiculo_id`, `placa`, `chasis`, `marca_id`, `modelo`, `motor`, `kilometraje`, `cilindraje`, `capacidad_carga`, `capacidad_pasajeros`, `subcircuito_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(3, 3, 'HN348Z', 'XQ123ABC456XYZ', 3, '2021', 'PEQ934OW', 120480, 220, 1, 1, NULL, 1, '2023-07-17 04:01:11', '2023-07-17 04:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo_subcircuito`
--

CREATE TABLE `vehiculo_subcircuito` (
  `id` int(11) NOT NULL,
  `vehiculo_id` int(11) DEFAULT NULL,
  `subcircuito_id` int(11) DEFAULT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `user3_id` int(11) DEFAULT NULL,
  `user4_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_dependencia`
-- (See below for the actual view)
--
CREATE TABLE `vw_dependencia` (
`provincia_id` int(11)
,`provincia_nombre` varchar(255)
,`parroquia_id` int(11)
,`parroquia_nombre` varchar(255)
,`distrito_id` int(11)
,`distrito_codigo` varchar(11)
,`distrito_nombre` varchar(50)
,`circuito_id` int(11)
,`circuito_codigo` varchar(11)
,`circuito_nombre` varchar(50)
,`subcircuito_id` int(11)
,`subcircuito_codigo` varchar(11)
,`subcircuito_nombre` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `dependencia`
--
DROP TABLE IF EXISTS `dependencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mantenimientovehicularprod`.`dependencia`  AS SELECT `p`.`id` AS `provincia_id`, `p`.`nombre` AS `provincia_nombre`, `par`.`id` AS `parroquia_id`, `par`.`nombre` AS `parroquia_nombre`, `d`.`id` AS `distrito_id`, `d`.`codigo` AS `distrito_codigo`, `d`.`nombre` AS `distrito_nombre`, `c`.`id` AS `circuito_id`, `c`.`codigo` AS `circuito_codigo`, `c`.`nombre` AS `circuito_nombre`, `s`.`id` AS `subcircuito_id`, `s`.`codigo` AS `subcircuito_codigo`, `s`.`nombre` AS `subcircuito_nombre` FROM ((((`mantenimientovehicularz`.`subcircuito` `s` join `mantenimientovehicularz`.`circuito` `c` on(`s`.`circuito_id` = `c`.`id`)) join `mantenimientovehicularz`.`distrito` `d` on(`c`.`distrito_id` = `d`.`id`)) join `mantenimientovehicularz`.`parroquia` `par` on(`par`.`id` = `s`.`parroquia_id`)) join `mantenimientovehicularz`.`provincia` `p` on(`par`.`provincia_id` = `p`.`id`)) WHERE `p`.`estado` = 'Activo' AND `par`.`estado` = 'Activo' AND `d`.`estado` = 'Activo' AND `c`.`estado` = 'Activo' AND `s`.`estado` = 'Activo' ORDER BY `p`.`nombre` ASC, `par`.`nombre` ASC, `d`.`nombre` ASC, `c`.`nombre` ASC, `s`.`nombre` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `vw_dependencia`
--
DROP TABLE IF EXISTS `vw_dependencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mantenimientovehicularprod`.`vw_dependencia`  AS SELECT `p`.`id` AS `provincia_id`, `p`.`nombre` AS `provincia_nombre`, `par`.`id` AS `parroquia_id`, `par`.`nombre` AS `parroquia_nombre`, `d`.`id` AS `distrito_id`, `d`.`codigo` AS `distrito_codigo`, `d`.`nombre` AS `distrito_nombre`, `c`.`id` AS `circuito_id`, `c`.`codigo` AS `circuito_codigo`, `c`.`nombre` AS `circuito_nombre`, `s`.`id` AS `subcircuito_id`, `s`.`codigo` AS `subcircuito_codigo`, `s`.`nombre` AS `subcircuito_nombre` FROM ((((`mantenimientovehicularz`.`subcircuito` `s` join `mantenimientovehicularz`.`circuito` `c` on(`s`.`circuito_id` = `c`.`id`)) join `mantenimientovehicularz`.`distrito` `d` on(`c`.`distrito_id` = `d`.`id`)) join `mantenimientovehicularz`.`parroquia` `par` on(`par`.`id` = `s`.`parroquia_id`)) join `mantenimientovehicularz`.`provincia` `p` on(`par`.`provincia_id` = `p`.`id`)) ORDER BY `p`.`nombre` ASC, `par`.`nombre` ASC, `d`.`nombre` ASC, `c`.`nombre` ASC, `s`.`nombre` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `circuito`
--
ALTER TABLE `circuito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_circuito_distrito` (`distrito_id`);

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_subcircuito` (`nombre_subcircuito`),
  ADD KEY `fk_dependencias_estado` (`estado_id`),
  ADD KEY `fk_dependencias_provincias` (`provincia_id`);

--
-- Indexes for table `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_provincia_parroquia` (`provincia_id`);

--
-- Indexes for table `personal_subcircuito`
--
ALTER TABLE `personal_subcircuito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `dependencia_id` (`subcircuito_id`);

--
-- Indexes for table `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rango`
--
ALTER TABLE `rango`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitudes_mantenimiento`
--
ALTER TABLE `solicitudes_mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehiculo_id` (`vehiculo_id`),
  ADD KEY `tipo_mantenimiento_id` (`tipo_mantenimiento_id`);

--
-- Indexes for table `subcircuito`
--
ALTER TABLE `subcircuito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subcitrcuito_circuito` (`circuito_id`),
  ADD KEY `fk_subcitrcuito_parroquia` (`parroquia_id`);

--
-- Indexes for table `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_sangre`
--
ALTER TABLE `tipo_sangre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependencia_id` (`subcircuito_id`),
  ADD KEY `fk_users_tipo_sangre` (`tipo_sangre_id`),
  ADD KEY `fk_users_ciudad_nacimiento` (`ciudad_nacimiento_id`),
  ADD KEY `fk_users_rango` (`rango_id`),
  ADD KEY `fk_users_estado` (`estado_id`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependencia_id` (`subcircuito_id`),
  ADD KEY `fk_vehiculos_estado` (`estado_id`),
  ADD KEY `fk_vehiculos_marca` (`marca_id`),
  ADD KEY `fk_vehiculos_tipo_vehiculo` (`tipo_vehiculo_id`);

--
-- Indexes for table `vehiculo_subcircuito`
--
ALTER TABLE `vehiculo_subcircuito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculo_id` (`vehiculo_id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`),
  ADD KEY `user3_id` (`user3_id`),
  ADD KEY `user4_id` (`user4_id`),
  ADD KEY `fk_vehiculo_subcircuito_subcircuito` (`subcircuito_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `circuito`
--
ALTER TABLE `circuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4403;

--
-- AUTO_INCREMENT for table `personal_subcircuito`
--
ALTER TABLE `personal_subcircuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rango`
--
ALTER TABLE `rango`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `solicitudes_mantenimiento`
--
ALTER TABLE `solicitudes_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcircuito`
--
ALTER TABLE `subcircuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;

--
-- AUTO_INCREMENT for table `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipo_sangre`
--
ALTER TABLE `tipo_sangre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehiculo_subcircuito`
--
ALTER TABLE `vehiculo_subcircuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `circuito`
--
ALTER TABLE `circuito`
  ADD CONSTRAINT `fk_circuito_distrito` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`);

--
-- Constraints for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `fk_provincia_parroquia` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`);

--
-- Constraints for table `personal_subcircuito`
--
ALTER TABLE `personal_subcircuito`
  ADD CONSTRAINT `fk_personal_subcitrcuito_subcircuito` FOREIGN KEY (`subcircuito_id`) REFERENCES `subcircuito` (`id`),
  ADD CONSTRAINT `personal_subcircuito_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `solicitudes_mantenimiento`
--
ALTER TABLE `solicitudes_mantenimiento`
  ADD CONSTRAINT `solicitudes_mantenimiento_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicitudes_mantenimiento_ibfk_2` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`),
  ADD CONSTRAINT `solicitudes_mantenimiento_ibfk_3` FOREIGN KEY (`tipo_mantenimiento_id`) REFERENCES `tipo_mantenimiento` (`id`);

--
-- Constraints for table `subcircuito`
--
ALTER TABLE `subcircuito`
  ADD CONSTRAINT `fk_subcitrcuito_circuito` FOREIGN KEY (`circuito_id`) REFERENCES `circuito` (`id`),
  ADD CONSTRAINT `fk_subcitrcuito_parroquia` FOREIGN KEY (`parroquia_id`) REFERENCES `parroquia` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_ciudad_nacimiento` FOREIGN KEY (`ciudad_nacimiento_id`) REFERENCES `ciudades` (`id`),
  ADD CONSTRAINT `fk_users_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `fk_users_rango` FOREIGN KEY (`rango_id`) REFERENCES `rango` (`id`),
  ADD CONSTRAINT `fk_users_tipo_sangre` FOREIGN KEY (`tipo_sangre_id`) REFERENCES `tipo_sangre` (`id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`subcircuito_id`) REFERENCES `subcircuito` (`id`);

--
-- Constraints for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculos_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `fk_vehiculos_marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `fk_vehiculos_tipo_vehiculo` FOREIGN KEY (`tipo_vehiculo_id`) REFERENCES `tipo_vehiculo` (`id`),
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`subcircuito_id`) REFERENCES `subcircuito` (`id`);

--
-- Constraints for table `vehiculo_subcircuito`
--
ALTER TABLE `vehiculo_subcircuito`
  ADD CONSTRAINT `fk_vehiculo_subcircuito_subcircuito` FOREIGN KEY (`subcircuito_id`) REFERENCES `subcircuito` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_3` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_4` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_5` FOREIGN KEY (`user3_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_6` FOREIGN KEY (`user4_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
