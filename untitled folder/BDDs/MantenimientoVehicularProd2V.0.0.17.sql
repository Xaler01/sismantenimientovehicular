-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2023 at 05:00 AM
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
-- Database: `MantenimientoVehicularProd2`
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

--
-- Dumping data for table `circuito`
--

INSERT INTO `circuito` (`id`, `distrito_id`, `codigo`, `nombre`, `estado`) VALUES
(1, 1, '11D01C01', 'METROPOLITANO DE LOJA VILCABAMBA', 'Activo'),
(47, 1, '11D01C02', 'METROPOLITANO DE LOJA SUR', 'Activo'),
(48, 1, '11D01C03', 'METROPOLITANO DE LOJA CENTRO', 'Activo'),
(49, 1, '11D01C04', 'METROPOLITANO DE LOJA NORTE', 'Activo'),
(50, 2, '11D02C02', 'CHAGUARPAMBA SUR', 'Activo'),
(51, 2, '11D02C03', 'CHAGUARPAMBA CENTRO', 'Activo'),
(52, 2, '11D02C04', 'CHAGUARPAMBA NORTE', 'Activo'),
(53, 3, '11D03C02', 'CATAMAYO SUR', 'Activo'),
(54, 3, '11D03C03', 'CATAMAYO CENTRO', 'Activo'),
(55, 3, '11D03C04', 'CATAMAYO NORTE', 'Activo'),
(56, 4, '11D04C02', 'CELICA SUR', 'Activo'),
(57, 4, '11D04C03', 'CELICA CENTRO', 'Activo'),
(58, 4, '11D04C04', 'CELICA NORTE', 'Activo'),
(59, 5, '11D05C02', 'ESPÍNDOLA SUR', 'Activo'),
(60, 5, '11D05C03', 'ESPÍNDOLA CENTRO', 'Activo'),
(61, 5, '11D05C04', 'ESPÍNDOLA NORTE', 'Activo'),
(62, 6, '11D06C02', 'GONZANAMÁ SUR', 'Activo'),
(63, 6, '11D06C03', 'GONZANAMÁ CENTRO', 'Activo'),
(64, 6, '11D06C04', 'GONZANAMÁ NORTE', 'Activo'),
(65, 7, '11D07C02', 'MACARÁ SUR', 'Activo'),
(66, 7, '11D07C03', 'MACARÁ CENTRO', 'Activo'),
(67, 7, '11D07C04', 'MACARÁ NORTE', 'Activo'),
(68, 8, '11D08C02', 'PALTAS SUR', 'Activo'),
(69, 8, '11D08C03', 'PALTAS CENTRO', 'Activo'),
(70, 8, '11D08C04', 'PALTAS NORTE', 'Activo'),
(71, 9, '11D09C02', 'PINDAL SUR', 'Activo'),
(72, 9, '11D09C03', 'PINDAL CENTRO', 'Activo'),
(73, 9, '11D09C04', 'PINDAL NORTE', 'Activo'),
(74, 10, '11D10C02', 'PUYANGO SUR', 'Activo'),
(75, 10, '11D10C03', 'PUYANGO CENTRO', 'Activo'),
(76, 10, '11D10C04', 'PUYANGO NORTE', 'Activo'),
(77, 11, '11D11C02', 'QUILANGA SUR', 'Activo'),
(78, 11, '11D11C03', 'QUILANGA CENTRO', 'Activo'),
(79, 11, '11D11C04', 'QUILANGA NORTE', 'Activo'),
(80, 12, '11D12C02', 'SARAGURO SUR', 'Activo'),
(81, 12, '11D12C03', 'SARAGURO CENTRO', 'Activo'),
(82, 12, '11D12C04', 'SARAGURO NORTE', 'Activo'),
(83, 13, '11D13C02', 'SOZORANGA SUR', 'Activo'),
(84, 13, '11D13C03', 'SOZORANGA CENTRO', 'Activo'),
(85, 13, '11D13C04', 'SOZORANGA NORTE', 'Activo'),
(86, 14, '11D14C02', 'ZAPOTILLO SUR', 'Activo'),
(87, 14, '11D14C03', 'ZAPOTILLO CENTRO', 'Activo'),
(88, 14, '11D14C04', 'ZAPOTILLO NORTE', 'Activo');

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
,`subcircuito_codigo` varchar(15)
,`subcircuito_nombre` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dependencia2`
-- (See below for the actual view)
--
CREATE TABLE `dependencia2` (
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
,`subcircuito_codigo` varchar(15)
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

--
-- Dumping data for table `distrito`
--

INSERT INTO `distrito` (`id`, `codigo`, `nombre`, `estado`) VALUES
(1, '11D01', 'DISTRITO METROPOLITANO DE LOJA', 'Activo'),
(2, '11D02', 'DISTRITO CHAGUARPAMBA', 'Activo'),
(3, '11D03', 'DISTRITO CATAMAYO', 'Activo'),
(4, '11D04', 'DISTRITO CELICA', 'Activo'),
(5, '11D05', 'DISTRITO ESPÍNDOLA', 'Activo'),
(6, '11D06', 'DISTRITO GONZANAMÁ', 'Activo'),
(7, '11D07', 'DISTRITO MACARÁ', 'Activo'),
(8, '11D08', 'DISTRITO PALTAS', 'Activo'),
(9, '11D9', 'DISTRITO PINDAL', 'Activo'),
(10, '11D10', 'DISTRITO PUYANGO', 'Activo'),
(11, '11D11', 'DISTRITO QUILANGA', 'Activo'),
(12, '11D12', 'DISTRITO SARAGURO', 'Activo'),
(13, '11D13', 'DISTRITO SOZORANGA', 'Activo'),
(14, '11D14', 'DISTRITO ZAPOTILLO', 'Activo');

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
-- Stand-in structure for view `inf_mes_atenciones_mantenimiento`
-- (See below for the actual view)
--
CREATE TABLE `inf_mes_atenciones_mantenimiento` (
`Mes` varchar(7)
,`NombreMes` varchar(64)
,`NombreMesAbreviado` varchar(32)
,`Atenciones` bigint(21)
,`Mant1` decimal(22,0)
,`Mant2` decimal(22,0)
,`Mant3` decimal(22,0)
,`Mant4` decimal(22,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `inicio`
--

CREATE TABLE `inicio` (
  `id` int(11) NOT NULL,
  `dias` text NOT NULL,
  `email` text NOT NULL,
  `horaInicio` text NOT NULL,
  `horaFin` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inicio`
--

INSERT INTO `inicio` (`id`, `dias`, `email`, `horaInicio`, `horaFin`, `direccion`, `telefono`, `logo`) VALUES
(1, 'Lunes -Sabado', 'info@polin.com', '08:30', '18:00', 'Quito - Av. Universitaria y Bolivia esq', '022227700 ext 202', 'inicio/ETXVFIXJSv8SLk5I4zvckD8UeirTNvez0reuWSVN.png');

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
  `estado` varchar(11) NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parroquia`
--

INSERT INTO `parroquia` (`id`, `nombre`, `provincia_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'EL VALLE', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-21 08:24:44'),
(2, 'MALACATOS', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-21 11:53:35'),
(3, 'VILCABAMBA (VICTORIA)', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-21 12:15:56'),
(4, 'YANGANA', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(5, 'SAN LUCAS', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(6, 'GUALEL', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(7, 'SAN PEDRO DE VILCABAMBA', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(8, 'TAQUIL', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(9, 'SANTIAGO', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(10, 'CHUQUIRIBAMBA', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(11, 'QUINARA', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(12, 'EL CISNE', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(13, 'LOURDES', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(14, 'MERCEDES', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(15, 'SUCRE', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(16, 'CATAMAYO', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(17, 'GONZANAMÁ', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(18, 'CHANTACO', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(19, 'SAN ROQUE', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(20, 'EL SAGRARIO', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(21, 'SAN SEBASTIÁN', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(22, 'EL CISNE', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(23, 'CHILIBULO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(24, 'CHILLOGALLO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(25, 'COTOCOLLAO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(26, 'GUALEA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(27, 'GUAMANÍ', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(28, 'IÑAQUITO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(29, 'ITCHIMBÍA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(30, 'JIPIJAPA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(31, 'KENNEDY', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(32, 'LA ARGELIA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(33, 'LA CONCEPCIÓN', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(34, 'LA ECUATORIANA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(35, 'LA FERROVIARIA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(36, 'LA LIBERTAD', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(37, 'LA MAGDALENA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(38, 'LA MENA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(39, 'LA PAZ', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(40, 'LA VICTORIA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(41, 'LLANO CHICO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(42, 'LLANO GRANDE', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(43, 'MARISCAL SUCRE', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(44, 'PONCEANO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(45, 'PUENGASÍ', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(46, 'PUELLARO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(47, 'SAN ANTONIO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(48, 'SAN BARTOLO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(49, 'SAN ISIDRO DEL INCA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(50, 'SAN JOSÉ DE MINAS', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(51, 'SAN JUAN', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(52, 'SAN MATEO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(53, 'SAN ROQUE', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(54, 'SANGOLQUÍ', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(55, 'SANTA BÁRBARA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(56, 'SANTA LUCÍA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(57, 'SANTA ROSA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(58, 'SANTA TERESA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(59, 'SANTO DOMINGO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(60, 'SANTO TOMÁS', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(61, 'SOLANDA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(62, 'TABABELA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(63, 'TUMBACO', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(64, 'TURUBAMBA', 17, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(65, 'TULCÁN', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(66, 'EL CARMELO', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(67, 'HUACA', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(68, 'JULIO ANDRADE (OREJUELA)', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(69, 'MALDONADO', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(70, 'PIOTER', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(71, 'SANTA MARTHA DE CUBA', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(72, 'TOBAR DONOSO (LA BOCANA DE CAMUMBÍ)', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(73, 'TUFIÑO', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(74, 'URBINA', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(75, 'EL CHICAL', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(76, 'EL PLAYÓN DE SAN FRANCISCO', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(77, 'GONZÁLEZ SUÁREZ', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(78, 'HUACA', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(79, 'HUACO', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(80, 'LA PAZ', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(81, 'MONTALVO', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(82, 'SAN GABRIEL', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(83, 'TUFILLO (LAS PEÑAS)', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(84, 'LOS ANDES', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(85, 'MIRA', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(86, 'JUAN MONTALVO', 4, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(87, 'CUENCA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(88, 'BAÑOS', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(89, 'CHIQUINTAD', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(90, 'LLACAO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(91, 'MOLLETURO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(92, 'NULTI', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(93, 'OCTAVIO CORDERO PALACIOS (SANTA ROSA)', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(94, 'PACCHA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(95, 'QUINGEO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(96, 'RICAURTE', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(97, 'SAN FELIPE DE OÑA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(98, 'SAN JOAQUÍN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(99, 'SANTA ANA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(100, 'SAYAUSÍ', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(101, 'SIDCAY', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(102, 'SININCAY', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(103, 'TARQUI', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(104, 'TURI', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(105, 'VALLE', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(106, 'VICTORIA DEL PORTETE (IRQUIS)', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(107, 'YANUNCAY', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(108, 'GUALACEO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(109, 'CHORDELEG', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(110, 'GUACHAPALA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(111, 'JADÁN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(112, 'PAUTE', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(113, 'SEVILLA DE ORO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(114, 'GUARUMALES', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(115, 'CAMILO PONCE ENRÍQUEZ (SAN LUIS)', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(116, 'EL CABO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(117, 'EL CARMEN DE PUJILÍ', 11, 'Activo', '2023-07-19 09:24:47', '2023-07-22 18:33:40'),
(118, 'EL TAMBO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(119, 'LITARCO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(120, 'SAN SEBASTIÁN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(121, 'SÍGSIG', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(122, 'GIRÓN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(123, 'SAN GERARDO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(124, 'SIMÓN BOLÍVAR', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(125, 'TADAY', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(126, 'ZHIDMAD', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(127, 'NABÓN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(128, 'COJITAMBO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(129, 'EL PROGRESO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(130, 'ILDÁN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(131, 'LA TRONCAL DEL TIEMPO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(132, 'ZHAGLLI (SHAGLLI)', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(133, 'TARQUI', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(134, 'ZHOÑ', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(135, 'MATOBO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(136, 'NULTI', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(137, 'EL SAGRARIO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(138, 'LAS NIEVES', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(139, 'EL BATÁN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(140, 'LAS VEGA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(141, 'GIRONCABAMBA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(142, 'QUINGEO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(143, 'TANICUCHÍ', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(144, 'EL CABO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(145, 'EL VALLE', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(146, 'EL CARMEN DE PUJILÍ1', 11, 'Eliminado', '2023-07-19 09:24:47', '2023-07-22 18:33:27'),
(147, 'LITARCO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(148, 'SAN SEBASTIÁN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(149, 'ZHIDMAD', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(150, 'NABÓN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(151, 'COJITAMBO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(152, 'EL PROGRESO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(153, 'ILDÁN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(154, 'LA TRONCAL DEL TIEMPO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(155, 'ZHAGLLI (SHAGLLI)', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(156, 'TARQUI', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(157, 'ZHOÑ', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(158, 'MATOBO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(159, 'NULTI', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(160, 'EL SAGRARIO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(161, 'LAS NIEVES', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(162, 'EL BATÁN', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(163, 'LAS VEGA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(164, 'GIRONCABAMBA', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(165, 'QUINGEO', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(166, 'TANICUCHÍ', 1, 'Elimindo', '2023-07-19 09:24:47', '2023-07-19 09:27:05'),
(168, 'NUEVA PARROQUIA', 11, 'Activo', '2023-07-19 15:01:34', '2023-07-19 15:01:34'),
(169, 'XXX', 11, 'Eliminado', '2023-07-19 17:08:48', '2023-07-22 18:34:45'),
(170, 'COTOCOLLAO X', 11, 'Eliminado', '2023-07-21 08:27:41', '2023-07-21 08:27:56'),
(171, 'QUINARA 2', 11, 'Activo', '2023-07-25 13:35:03', '2023-07-25 13:35:03'),
(172, 'NUEVA PARROQUIA 2', 11, 'Activo', '2023-07-25 13:48:35', '2023-07-25 13:48:35'),
(173, 'PARROQUIA DE PRUEBA PARA MANUAL EDITADO', 11, 'Eliminado', '2023-08-30 10:01:41', '2023-08-30 10:10:46'),
(174, 'ABC', 11, 'Eliminado', '2023-08-30 10:01:56', '2023-08-30 10:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_subcircuito`
--

CREATE TABLE `personal_subcircuito` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dependencia_id` int(11) DEFAULT NULL,
  `fecha_asignacion` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_subcircuito`
--

INSERT INTO `personal_subcircuito` (`id`, `user_id`, `dependencia_id`, `fecha_asignacion`, `created_at`, `updated_at`) VALUES
(1, 2, 9, '2023-07-22', '2023-07-23 02:40:45', '2023-07-25 13:37:21'),
(2, 3, 6, '2023-07-23', '2023-07-23 13:42:32', '2023-07-24 00:56:05'),
(3, 4, 3, '2023-07-23', '2023-07-23 23:12:59', '2023-09-18 09:50:17'),
(4, 5, 6, '2023-07-23', '2023-07-24 02:26:46', '2023-07-24 02:26:46'),
(5, 6, 10, '2023-07-25', '2023-07-25 13:53:36', '2023-08-30 13:56:10'),
(6, 7, 12, '2023-09-17', '2023-09-18 09:57:55', '2023-09-18 09:57:55');

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
-- Table structure for table `solicitud_mantenimiento`
--

CREATE TABLE `solicitud_mantenimiento` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehiculo_id` int(11) DEFAULT NULL,
  `tipo_mantenimiento_id` int(15) NOT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `hora_solicitud` time DEFAULT NULL,
  `kilometraje_actual` int(11) NOT NULL,
  `tipo_vehiculo_id` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `observacionesTaller` text DEFAULT NULL,
  `estado_solicitud` varchar(20) NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solicitud_mantenimiento`
--

INSERT INTO `solicitud_mantenimiento` (`id`, `user_id`, `vehiculo_id`, `tipo_mantenimiento_id`, `fecha_solicitud`, `hora_solicitud`, `kilometraje_actual`, `tipo_vehiculo_id`, `observaciones`, `observacionesTaller`, `estado_solicitud`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, '2023-07-27', '08:30:00', 7050, 1, 'La luz trasera derecha, parpadea cuando se frena  por mucho tiempo', '', 'Rechazada', '2023-07-25 10:03:44', '2023-07-25 13:30:11'),
(2, 2, 3, 4, '2023-07-26', '10:00:00', 7050, 1, 'Los destellos de luz de los carros que vienen de frente hacia mi, lastiman mis ojos.', '', 'Recalendarizar', '2023-07-25 10:04:31', '2023-07-25 13:33:36'),
(3, 3, 1, 3, '2023-07-27', '12:00:00', 123480, 3, 'necesito un mantenimiento', 'Nuevo mensaje', 'Atendida', '2023-07-25 11:42:48', '2023-09-20 07:26:27'),
(4, 3, 1, 4, '2023-07-28', '10:00:00', 123480, 3, 'Requiero un mantenimiento completo', 'Se hizo un mantenimiento completo desde el manubrio hasta la placa', 'Revisando', '2023-07-25 13:31:04', '2023-09-19 14:57:46'),
(5, 3, 4, 4, '2023-07-26', '14:30:00', 2000, 3, 'Requiere ajuste de pernos de la llanta delantera izquierda ya que se desacoplo al pasar por un bache', '', 'Activo', '2023-07-25 13:43:54', '2023-07-25 13:43:54'),
(6, 6, 5, 2, '2023-07-27', '11:00:00', 12000, 2, 'Mantenimiento vehicular julio', 'se finaliza mantenimiento', 'Atendida', '2023-07-25 13:57:31', '2023-09-20 05:51:29'),
(7, 5, 2, 1, '2023-07-28', '12:30:00', 9678, 2, 'Alguna observacion', 'se aqtendio', 'Atendida', '2023-07-28 03:25:45', '2023-09-20 07:07:33'),
(8, 2, 1, 1, '2023-08-07', '08:30:00', 123480, 3, 'limpieza de la tapicería por favor', 'Se finaliza la revision del vehículo, no se presentan novedades.\r\nSe el cambio de faro para que parpadeen los dos.', 'Atendida', '2023-08-06 00:03:37', '2023-09-19 14:56:21'),
(9, 3, 4, 3, '2023-08-09', '08:30:00', 2500, 3, 'test', '', 'Activo', '2023-08-08 10:05:13', '2023-08-08 10:05:13'),
(10, 6, 5, 2, '2023-09-01', '11:00:00', 12000, 2, 'Faro delantero parpadea', '', 'Aprobada', '2023-08-30 14:32:48', '2023-08-30 14:45:26'),
(11, 2, 1, 2, '2023-09-08', '15:00:00', 123480, 3, 'Cambio de llanta delantera', '', 'Activo', '2023-09-08 08:52:20', '2023-09-08 08:55:26'),
(12, 5, 2, 4, '2023-09-11', '09:00:00', 9900, 2, 'la llanta se desinfla seguido', '', 'Activo', '2023-09-10 04:06:57', '2023-09-10 06:48:43'),
(13, 3, 4, 4, '2023-09-12', '09:30:00', 2500, 3, 'La llanta no se infla.', '', 'Activo', '2023-09-10 23:10:43', '2023-09-10 23:10:43'),
(14, 2, 1, 1, '2023-09-13', '10:00:00', 130000, 3, 'Las plumas no tienen agua', '', 'Cancelada', '2023-09-10 23:11:48', '2023-09-11 11:08:26'),
(15, 5, 2, 2, '2023-09-12', '11:00:00', 9950, 2, 'Bajada de motor', '', 'Activo', '2023-09-10 23:12:20', '2023-09-11 10:13:30'),
(16, 2, 1, 3, '2023-09-12', '11:30:00', 130500, 3, 'La llanta de adelante se hace para un lado', '', 'Cancelada', '2023-09-11 07:51:32', '2023-09-11 11:08:21'),
(17, 4, 3, 2, '2023-09-15', '09:00:00', 8700, 1, 'La direccion se mueve a la derecha', '', 'Activo', '2023-09-13 07:40:11', '2023-09-13 07:40:11'),
(18, 2, 1, 4, '2023-09-15', '12:00:00', 131510, 3, 'Mantenimiento completo de lujo.', '', 'Activo', '2023-09-13 07:40:34', '2023-09-13 07:40:34'),
(19, 3, 4, 2, '2023-09-14', '09:30:00', 2500, 3, 'nuevo mantenimietno', '', 'Activo', '2023-09-13 10:36:00', '2023-09-13 10:36:00'),
(20, 2, 1, 2, '2023-09-19', '09:30:00', 131510, 3, 'ajustar retrovisor', '', 'Recalendarizar', '2023-09-17 03:52:02', '2023-09-18 10:05:48'),
(21, 4, 3, 4, '2023-09-19', '12:00:00', 8705, 1, 'mover la gata', '', 'Activo', '2023-09-17 04:15:35', '2023-09-17 04:15:35'),
(22, 2, 1, 2, '2023-09-20', '11:00:00', 131510, 3, 'LIBERACION', '', 'Cancelada', '2023-09-17 06:36:36', '2023-09-17 07:08:11'),
(23, 2, 1, 2, '2023-09-21', '10:30:00', 132000, 3, 'SE RAYO UN RIN', '', 'Cancelada', '2023-09-17 06:46:12', '2023-09-20 05:52:17'),
(24, 2, 1, 2, '2023-09-22', '08:30:00', 132005, 3, 'kalel', '', 'Activo', '2023-09-17 06:56:09', '2023-09-17 06:56:09'),
(25, 3, 4, 2, '2023-09-20', '09:30:00', 2550, 3, 'recorrer la cadena', 'Se finaliza la revision del vehículo, no se presentan novedades.\r\nSe el cambio de faro para que parpadeen los dos.', 'Atendida', '2023-09-17 07:07:57', '2023-09-19 14:59:45'),
(26, 2, 1, 1, '2023-09-21', '12:30:00', 132005, 3, 'subir', '', 'Rechazada', '2023-09-17 08:04:28', '2023-09-19 07:39:37'),
(27, 3, 4, 1, '2023-09-22', '11:00:00', 2550, 3, 'asd', '', 'Activo', '2023-09-17 10:09:42', '2023-09-17 10:09:42'),
(28, 2, 1, 2, '2023-09-20', '12:00:00', 132005, 3, 'nuevo', '', 'Activo', '2023-09-17 10:10:42', '2023-09-17 10:10:42'),
(29, 2, 1, 1, '2023-09-21', '09:00:00', 132005, 3, 'cambio def gasolina', '', 'Rechazada', '2023-09-18 01:04:16', '2023-09-19 07:39:11'),
(30, 4, 3, 4, '2023-09-22', '12:30:00', 10705, 1, 'Mantenimiento completo por favor', '', 'Activo', '2023-09-18 01:05:35', '2023-09-18 01:05:35'),
(31, 7, 6, 4, '2023-09-19', '08:30:00', 1300, 1, 'cambio de parabrisas', '', 'Aprobada', '2023-09-18 10:04:01', '2023-09-18 10:04:59'),
(32, 4, 5, 2, '2023-09-20', '11:00:00', 12000, 2, 'Cambio de luces', '', 'Activo', '2023-09-19 07:15:53', '2023-09-19 07:15:53'),
(33, 3, 4, 2, '2023-09-20', '14:00:00', 2550, 3, 'cambio de retrovisor', '', 'Activo', '2023-09-19 07:18:34', '2023-09-19 07:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `subcircuito`
--

CREATE TABLE `subcircuito` (
  `id` int(11) NOT NULL,
  `circuito_id` int(11) NOT NULL,
  `parroquia_id` int(11) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` varchar(11) DEFAULT 'Activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcircuito`
--

INSERT INTO `subcircuito` (`id`, `circuito_id`, `parroquia_id`, `codigo`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '11D01C01S01', 'VILCABAMBA HERMOSA', 'Eliminado', '2023-07-21 06:35:05', '2023-07-24 00:44:10'),
(2, 1, 3, '11D01C01S02', 'VILCABAMBA 2', 'Eliminado', '2023-07-21 06:35:05', '2023-07-23 22:30:06'),
(3, 56, 2, '11D04C02S01', 'CELICA SUR 1', 'Activo', '2023-07-22 23:23:39', '2023-07-22 23:42:16'),
(4, 84, 18, '11D13C03S01', 'SOZORANCA CENTRO 1', 'Activo', '2023-07-22 23:45:42', '2023-07-22 23:45:42'),
(5, 48, 6, '11D01C03S01\n', 'LOJA CENTRO 1', 'Activo', '2023-07-22 23:49:20', '2023-07-22 23:49:20'),
(6, 82, 9, '11D12C04S01', 'SARAGURO NORTE 1', 'Activo', '2023-07-22 23:53:33', '2023-07-22 23:53:33'),
(7, 86, 20, '11D14C02S01', 'ZARPOTILLO SUR', 'Activo', '2023-07-22 23:57:19', '2023-07-23 18:48:36'),
(8, 67, 14, '11D07C04S01', 'MACARA NORTE 01', 'Activo', '2023-07-23 00:28:32', '2023-07-23 00:28:32'),
(9, 78, 171, '11D11C11S01', 'QUILANGA 1', 'Activo', '2023-07-25 13:35:53', '2023-07-25 13:35:53'),
(10, 55, 172, '11D03C04S01', 'NUEVO SUBCIRCUITO 1 PRUEBA', 'Activo', '2023-07-25 13:51:33', '2023-07-25 13:51:33'),
(11, 77, 4, '11D11C02S01', 'SUBCIRCUITO X', 'Activo', '2023-07-28 03:24:07', '2023-07-28 03:24:07'),
(12, 47, 10, '11D01C02S01', 'PEDRO CARBO', 'Activo', '2023-08-30 10:15:30', '2023-09-18 09:58:28'),
(13, 49, 9, '11D01C04S01', 'SUBCIRCUITO DE PRUEBAS PARA MANUAL EDITADO', 'Eliminado', '2023-08-30 10:17:00', '2023-08-30 10:24:11');

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

--
-- Dumping data for table `tipo_mantenimiento`
--

INSERT INTO `tipo_mantenimiento` (`id`, `nombre`, `detallemantenimiento`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'MANTENIMIENTO 1', 'Cambio de aceite - \nRevisión y cambio de pastillas - \nLíquido de frenos - \nFiltro de combustible.', 43.59, '2023-07-09 01:35:21', '2023-07-09 01:35:21'),
(2, 'MANTENIMIENTO 2 (Vehículos)', 'Cambio de aceite -\nRevisión y cambio de pastillas - \nLíquido de frenos - \nFiltro de combustible - \nCambio de filtro de aire - \nCambio del líquido refrigerante - \nCambio de luces delanteras - \nCambio de luces posteriores.', 60, '2023-07-09 01:40:06', '2023-07-09 01:40:06'),
(3, 'MANTENIMIENTO 2 (Motos)', 'Cambio de aceite - \nRevisión y cambio de pastillas - \nLíquido de frenos - \nFiltro de combustible - \nCambio del líquido refrigerante - \nCambio de luces delanteras - \nCambio de luces posteriores.', 45, '2023-07-09 01:41:35', '2023-07-09 01:41:35'),
(4, 'MANTENIMIENTO 3', 'Cambio de aceite - \nRevisión y cambio de pastillas - \nLíquido de frenos - \nFiltro de combustible - \nCambio del líquido refrigerante - \nCambio de luces delanteras - \nCambio de luces posteriores - \nCambio de batería - \nAjustes en el sistema eléctrico.', 180, '2023-07-09 01:43:31', '2023-07-09 01:43:31');

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
  `dependencia_id` int(11) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `estado_id` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `cedula`, `fecha_nacimiento`, `tipo_sangre_id`, `ciudad_nacimiento_id`, `celular`, `rango_id`, `dependencia_id`, `rol`, `estado_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alexander Jácome', 'eajacome1@utpl.edu.ec', '2023-09-20 02:31:51', '$2y$10$hURW6sGM2oofbaGiH2DUZ.cM8cqp6lyz3J1X6zM9LnE7Qh0nmaRaq', '1720108908', '2000-09-29', 7, 2, '0994246317', 15, NULL, 'Encargado', 1, 'LcmgWfvjuEz5Rw6vHuL6ZWzKvEtutEsGKZIbdOssslDqZLTIexF1dR0v9KQ1', '2023-06-16 19:07:31', '2023-09-18 09:49:36'),
(2, 'Lucas Solovino Mendoza', 'test1@utpl.edu.ec', '2023-09-19 09:07:27', '$2y$10$cSHmwVsJfzCvKyu688428erHBfBmQ6CjTaMZcs0rSBnOYz2YzN1w.', '1723734859', '1988-11-25', 4, 19, '0993476243', 5, 9, 'Policia', 1, NULL, '2023-07-17 03:55:42', '2023-09-19 14:07:27'),
(3, 'Lucero  Guaman', 'test2@utpl.edu.ec', '2023-07-23 19:56:05', '$2y$10$3Kl1MgYC8QzrrGSC2yWpLOGDLsXiegGiKGbU.ACgNlOCQYLy7T8o6', '0703927481', '1082-02-04', 4, 8, '0994246319', 3, 6, 'Policia', 1, NULL, '2023-07-23 13:40:09', '2023-07-24 00:56:05'),
(4, 'Juana Albuja', 'test3@utpl.edu.ec', '2023-09-18 04:50:17', '$2y$10$/bGNPZNIXbBBT/RQIsMqWe0P7uhpKZIa58aZkExc7oufAvY0Oymkm', '0703927481', '1973-11-24', 6, 5, '0994246318', 3, 3, 'Policia', 1, NULL, '2023-07-23 23:12:37', '2023-09-18 09:50:17'),
(5, 'Lizzeth Pantoja', 'test4@utpl.edu.ec', '2023-09-17 09:36:22', '$2y$10$z5pSyZXjwbRAKAUA7rWB.u.UMwAZkpRr2VFTs0xkMfnkyD5pmb5Vm', '1732479860', '1990-03-04', 6, 2, '0994246318', 1, 6, 'Policia', 1, NULL, '2023-07-24 02:26:27', '2023-09-17 14:23:17'),
(6, 'Elizabeth Recalde', 'test6@utpl.edu.ec', '2023-09-18 02:40:47', '$2y$10$ibaHH57O95LU4KDPh3pRQ.FFhGGkp3HA7JdCPZGu3JBk1kJB.oRlO', '0703927483', '1970-12-12', 4, 20, '0994246313', 2, 10, 'Policia', 1, NULL, '2023-07-25 13:53:18', '2023-09-18 07:40:47'),
(7, 'Pepe Banderas', 'nuevopolicia@gmail.com', '2023-09-18 04:57:55', '$2y$10$ejj9HLx5mgtk36wuBs4FwOVsrwrqIv6eVcsauFtod.Z/8KYptSMNu', '1769696962', '1999-05-17', 6, 18, '0992232412', 3, 12, 'Policia', 1, NULL, '2023-08-29 10:22:59', '2023-09-18 09:57:55'),
(8, 'Miguel Cervantes y fuentes', 'miguel@utpl.edu.ec', '2023-09-18 05:06:13', '$2y$10$KRwHniOmbXg4t3kN6dp1DuI2oPmyyyllBeP2.eFNXoSuSXRn9S.a6', '1719348101', '1999-12-12', 7, 2, '0994246317', 4, NULL, 'Administrador', 1, NULL, '2023-09-17 11:36:11', '2023-09-18 10:06:13'),
(9, 'Gabriel Don Gato', 'Gabriel@utpl.edu.ec', '2023-09-18 04:49:55', '$2y$10$Hp.todRUVV7Yrb7m3emmduXWLpgfDUYhZ/kUYS.WTrtIO0oUnblyC', '1732479868', '2000-10-19', 6, 8, '0994246313', 2, NULL, 'Encargado', 1, NULL, '2023-09-17 12:37:38', '2023-09-18 09:49:55'),
(10, 'Frida Clarive', 'Frida@utpl.edu.ec', '2023-09-17 09:37:43', '$2y$10$7.xQABpOMfQhh2cKZKWVg.qm3ySnTFj/Gk0vGmm3MUy0AgMsa9VHS', '1729384765', '1988-07-17', 1, 23, '0983451223', 14, NULL, 'Encargado', 1, NULL, '2023-09-17 13:23:40', '2023-09-17 14:18:29');

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
  `dependencia_id` int(11) DEFAULT NULL,
  `estado_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `tipo_vehiculo_id`, `placa`, `chasis`, `marca_id`, `modelo`, `motor`, `kilometraje`, `cilindraje`, `capacidad_carga`, `capacidad_pasajeros`, `dependencia_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'HN348Z', 'XQ123ABC456XYZ', 12, '2021', 'PEQ934OW', 132005, 220, 1, 1, 9, 1, '2023-07-17 04:01:11', '2023-09-17 06:56:09'),
(2, 2, 'PBW4135', 'QXT089ENY283', 4, '2022', 'PEQ934OWX', 9950, 2200, 2, 4, 6, 1, '2023-07-23 07:16:36', '2023-09-10 23:12:20'),
(3, 1, 'PBW4133', 'XQ123ABC456XYZ', 4, '2022', 'PEQ934OW', 10705, 1600, 1, 4, 6, 1, '2023-07-23 23:44:05', '2023-09-18 01:05:35'),
(4, 3, 'HN349Z', 'HTP98YNHG', 8, '2018', 'QW45HRE', 2550, 250, 1, 2, 6, 1, '2023-07-24 02:24:24', '2023-09-17 07:07:57'),
(5, 2, 'HN379Z', 'QXT089ENY284TH', 8, '2021', 'QW45HROIL', 12000, 2200, 2, 4, 3, 1, '2023-07-25 13:54:32', '2023-09-18 09:50:52'),
(6, 1, 'PDS4988', 'HLK23JA23NT56', 6, '2011', '1600', 1300, 1600, 4, 5, 12, 1, '2023-08-30 09:25:33', '2023-09-18 10:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo_subcircuito`
--

CREATE TABLE `vehiculo_subcircuito` (
  `id` int(11) NOT NULL,
  `vehiculo_id` int(11) DEFAULT NULL,
  `dependencia_id` int(11) DEFAULT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `user3_id` int(11) DEFAULT NULL,
  `user4_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehiculo_subcircuito`
--

INSERT INTO `vehiculo_subcircuito` (`id`, `vehiculo_id`, `dependencia_id`, `user1_id`, `user2_id`, `user3_id`, `user4_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 2, NULL, NULL, NULL, '2023-07-23 07:07:41', '2023-07-25 13:37:31'),
(2, 2, 6, NULL, NULL, 5, NULL, '2023-07-23 07:24:21', '2023-07-25 13:36:14'),
(3, 3, 6, NULL, NULL, NULL, NULL, '2023-07-23 23:44:30', '2023-09-18 09:50:17'),
(4, 4, 6, NULL, NULL, NULL, 3, '2023-07-24 02:25:08', '2023-09-10 09:26:21'),
(5, 5, 3, 4, NULL, NULL, NULL, '2023-07-25 13:54:54', '2023-09-18 09:53:35'),
(6, 6, 12, 7, NULL, NULL, NULL, '2023-08-30 14:08:45', '2023-09-18 09:58:56');

-- --------------------------------------------------------

--
-- Structure for view `dependencia`
--
DROP TABLE IF EXISTS `dependencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mantenimientovehicularprod2`.`dependencia`  AS SELECT `p`.`id` AS `provincia_id`, `p`.`nombre` AS `provincia_nombre`, `par`.`id` AS `parroquia_id`, `par`.`nombre` AS `parroquia_nombre`, `d`.`id` AS `distrito_id`, `d`.`codigo` AS `distrito_codigo`, `d`.`nombre` AS `distrito_nombre`, `c`.`id` AS `circuito_id`, `c`.`codigo` AS `circuito_codigo`, `c`.`nombre` AS `circuito_nombre`, `s`.`id` AS `subcircuito_id`, `s`.`codigo` AS `subcircuito_codigo`, `s`.`nombre` AS `subcircuito_nombre` FROM ((((`mantenimientovehicularprod`.`subcircuito` `s` join `mantenimientovehicularprod`.`circuito` `c` on(`s`.`circuito_id` = `c`.`id`)) join `mantenimientovehicularprod`.`distrito` `d` on(`c`.`distrito_id` = `d`.`id`)) join `mantenimientovehicularprod`.`parroquia` `par` on(`par`.`id` = `s`.`parroquia_id`)) join `mantenimientovehicularprod`.`provincia` `p` on(`par`.`provincia_id` = `p`.`id`)) WHERE `p`.`estado` = 'Activo' AND `par`.`estado` = 'Activo' AND `d`.`estado` = 'Activo' AND `c`.`estado` = 'Activo' AND `s`.`estado` = 'Activo' ORDER BY `p`.`nombre` ASC, `par`.`nombre` ASC, `d`.`nombre` ASC, `c`.`nombre` ASC, `s`.`nombre` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `dependencia2`
--
DROP TABLE IF EXISTS `dependencia2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mantenimientovehicularprod2`.`dependencia2`  AS SELECT `p`.`id` AS `provincia_id`, `p`.`nombre` AS `provincia_nombre`, `par`.`id` AS `parroquia_id`, `par`.`nombre` AS `parroquia_nombre`, `d`.`id` AS `distrito_id`, `d`.`codigo` AS `distrito_codigo`, `d`.`nombre` AS `distrito_nombre`, `c`.`id` AS `circuito_id`, `c`.`codigo` AS `circuito_codigo`, `c`.`nombre` AS `circuito_nombre`, `s`.`id` AS `subcircuito_id`, `s`.`codigo` AS `subcircuito_codigo`, `s`.`nombre` AS `subcircuito_nombre` FROM ((((`mantenimientovehicularprod`.`subcircuito` `s` join `mantenimientovehicularprod`.`circuito` `c` on(`s`.`circuito_id` = `c`.`id`)) join `mantenimientovehicularprod`.`distrito` `d` on(`c`.`distrito_id` = `d`.`id`)) join `mantenimientovehicularprod`.`parroquia` `par` on(`par`.`id` = `s`.`parroquia_id`)) join `mantenimientovehicularprod`.`provincia` `p` on(`par`.`provincia_id` = `p`.`id`)) ORDER BY `p`.`nombre` ASC, `par`.`nombre` ASC, `d`.`nombre` ASC, `c`.`nombre` ASC, `s`.`nombre` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `inf_mes_atenciones_mantenimiento`
--
DROP TABLE IF EXISTS `inf_mes_atenciones_mantenimiento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`inf_mes_atenciones_mantenimiento`@`%` SQL SECURITY DEFINER VIEW `mantenimientovehicularprod2`.`inf_mes_atenciones_mantenimiento`  AS SELECT date_format(`mantenimientovehicularprod2`.`solicitud_mantenimiento`.`fecha_solicitud`,'%Y-%m') AS `Mes`, date_format(`mantenimientovehicularprod2`.`solicitud_mantenimiento`.`fecha_solicitud`,'%M') AS `NombreMes`, date_format(`mantenimientovehicularprod2`.`solicitud_mantenimiento`.`fecha_solicitud`,'%b') AS `NombreMesAbreviado`, count(0) AS `Atenciones`, sum(case when `mantenimientovehicularprod2`.`solicitud_mantenimiento`.`tipo_mantenimiento_id` = 1 then 1 else 0 end) AS `Mant1`, sum(case when `mantenimientovehicularprod2`.`solicitud_mantenimiento`.`tipo_mantenimiento_id` = 2 then 1 else 0 end) AS `Mant2`, sum(case when `mantenimientovehicularprod2`.`solicitud_mantenimiento`.`tipo_mantenimiento_id` = 3 then 1 else 0 end) AS `Mant3`, sum(case when `mantenimientovehicularprod2`.`solicitud_mantenimiento`.`tipo_mantenimiento_id` = 4 then 1 else 0 end) AS `Mant4` FROM `mantenimientovehicularprod2`.`solicitud_mantenimiento` WHERE `mantenimientovehicularprod2`.`solicitud_mantenimiento`.`estado_solicitud` = 'Atendida' GROUP BY date_format(`mantenimientovehicularprod2`.`solicitud_mantenimiento`.`fecha_solicitud`,'%Y-%m') ORDER BY date_format(`mantenimientovehicularprod2`.`solicitud_mantenimiento`.`fecha_solicitud`,'%Y-%m') ASC ;

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
-- Indexes for table `inicio`
--
ALTER TABLE `inicio`
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
  ADD KEY `subcircuito_id` (`dependencia_id`) USING BTREE;

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
-- Indexes for table `solicitud_mantenimiento`
--
ALTER TABLE `solicitud_mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_mantenimiento_id` (`tipo_mantenimiento_id`),
  ADD KEY `fk_solicitud_mantenimiento_vehiculo` (`vehiculo_id`),
  ADD KEY `fk_solicitud_mantenimiento_tipo_vehiculo` (`tipo_vehiculo_id`);

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
  ADD KEY `fk_users_tipo_sangre` (`tipo_sangre_id`),
  ADD KEY `fk_users_ciudad_nacimiento` (`ciudad_nacimiento_id`),
  ADD KEY `fk_users_rango` (`rango_id`),
  ADD KEY `fk_users_estado` (`estado_id`),
  ADD KEY `subcircuito_id` (`dependencia_id`) USING BTREE;

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependencia_id` (`dependencia_id`),
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
  ADD KEY `fk_vehiculo_subcircuito_subcircuito` (`dependencia_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `circuito`
--
ALTER TABLE `circuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `personal_subcircuito`
--
ALTER TABLE `personal_subcircuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `solicitud_mantenimiento`
--
ALTER TABLE `solicitud_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subcircuito`
--
ALTER TABLE `subcircuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehiculo_subcircuito`
--
ALTER TABLE `vehiculo_subcircuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `fk_personal_subcitrcuito_subcircuito` FOREIGN KEY (`dependencia_id`) REFERENCES `subcircuito` (`id`),
  ADD CONSTRAINT `personal_subcircuito_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `solicitud_mantenimiento`
--
ALTER TABLE `solicitud_mantenimiento`
  ADD CONSTRAINT `fk_solicitud_mantenimiento_tipo_vehiculo` FOREIGN KEY (`tipo_vehiculo_id`) REFERENCES `tipo_vehiculo` (`id`),
  ADD CONSTRAINT `fk_solicitud_mantenimiento_vehiculo` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo_subcircuito` (`id`),
  ADD CONSTRAINT `solicitud_mantenimiento_ibfk_3` FOREIGN KEY (`tipo_mantenimiento_id`) REFERENCES `tipo_mantenimiento` (`id`);

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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`dependencia_id`) REFERENCES `subcircuito` (`id`);

--
-- Constraints for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculos_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `fk_vehiculos_marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `fk_vehiculos_tipo_vehiculo` FOREIGN KEY (`tipo_vehiculo_id`) REFERENCES `tipo_vehiculo` (`id`),
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`dependencia_id`) REFERENCES `subcircuito` (`id`);

--
-- Constraints for table `vehiculo_subcircuito`
--
ALTER TABLE `vehiculo_subcircuito`
  ADD CONSTRAINT `fk_vehiculo_subcircuito_subcircuito` FOREIGN KEY (`dependencia_id`) REFERENCES `subcircuito` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_3` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_4` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_5` FOREIGN KEY (`user3_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vehiculo_subcircuito_ibfk_6` FOREIGN KEY (`user4_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
