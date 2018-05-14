-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2018 a las 17:35:18
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaplacetopay`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bank`
--

CREATE TABLE `bank` (
  `idbank` int(11) NOT NULL,
  `bankCode` varchar(4) NOT NULL,
  `bankName` varchar(60) DEFAULT NULL,
  `entityCode` varchar(12) DEFAULT NULL,
  `serviceCode` varchar(12) DEFAULT NULL,
  `amountValue` double DEFAULT NULL,
  `taxValue` double DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `idperson` int(11) NOT NULL,
  `document` varchar(12) DEFAULT NULL,
  `documentType` varchar(3) DEFAULT NULL,
  `firstName` varchar(60) DEFAULT NULL,
  `lastName` varchar(60) DEFAULT NULL,
  `company` varchar(60) DEFAULT NULL,
  `emailAddres` varchar(80) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`idperson`, `document`, `documentType`, `firstName`, `lastName`, `company`, `emailAddres`, `address`, `city`, `province`, `country`, `phone`, `mobile`) VALUES
(1, '123123', 'CC', 'Argemiro', 'Martinez', NULL, 'argemiro@gmail.com', 'calle 10', NULL, NULL, NULL, NULL, '300123123'),
(2, '123456', 'NIT', 'Empresa', 'Empresa', 'Company1', 'company@mail.com', 'calle 50', NULL, NULL, NULL, NULL, NULL),
(3, '84759-5', 'NIT', NULL, NULL, NULL, NULL, 'calle 50', NULL, NULL, NULL, NULL, '87459'),
(4, '847582059-5', 'NIT', NULL, NULL, 'Empresa1', 'email@mail.com', 'calle 50', NULL, NULL, NULL, NULL, '87459'),
(5, '847582059-6', 'NIT', NULL, NULL, 'anta sas', 'anta@gmail.com', 'calle 51', NULL, NULL, NULL, NULL, '239810239801293');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactionresult`
--

CREATE TABLE `transactionresult` (
  `transactionID` int(11) NOT NULL,
  `sessionID` varchar(32) DEFAULT NULL,
  `returnCode` varchar(30) DEFAULT NULL,
  `trazabilityCode` varchar(40) DEFAULT NULL,
  `transactionCycle` int(11) DEFAULT NULL,
  `bankCurrency` varchar(3) DEFAULT NULL,
  `bankFactor` float DEFAULT NULL,
  `bankURL` varchar(255) DEFAULT NULL,
  `responseCode` int(11) DEFAULT NULL,
  `responseReasonCode` varchar(3) DEFAULT NULL,
  `responseReasonText` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transactionresult`
--

INSERT INTO `transactionresult` (`transactionID`, `sessionID`, `returnCode`, `trazabilityCode`, `transactionCycle`, `bankCurrency`, `bankFactor`, `bankURL`, `responseCode`, `responseReasonCode`, `responseReasonText`) VALUES
(1452840854, '943f9ead64dd6c560d0f072229c940ec', 'FAIL_NOHOST', '000000', -1, 'COP', 1, '', 0, 'XH', 'No se pudo crear la transacción, por favor intente más tarde o comuníquese con la empresa.'),
(1452840864, '8d2b0d21973dae1676207c4f95c7abab', 'SUCCESS', '1367493', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu1642Y1XzSH19HLEVZn%2b4axevHlZxuGTgQ%2bg9VMn1Auj', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452846088, '29475ed6028a8c605e960d6cb4f2c077', 'SUCCESS', '1367555', 5, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvN7AuLr7uAvR7rSuFd418IT', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452846345, '1f45e7f97ab4bffdc70f64ffe25b4b1d', 'SUCCESS', '1367559', 6, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvNOGCBFw0msclhWTrcHiiaK', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452846477, 'bd75bfca5d5ec964cdb38a267d7143e1', 'SUCCESS', '1367560', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvOtvlV1epR%2fioznlYTik8ja', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452846542, '7dd9355d402e3c114cebfb8c71cbd304', 'SUCCESS', '1367561', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvO%2b1FPKnd6ccjdGmukusNT%2b', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452846547, '78d5cc30b32baa6f56666778c38c26e2', 'SUCCESS', '1367562', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvNqU7gx7bSTtZ%2bEViIgqtNb', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452846566, '11f2fb1f60b73a624833cad964d0b4a9', 'SUCCESS', '1367564', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvOAMKFVI49lijpcPuglXS12', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452846581, '4c496ecb706dea66ca2951ad6ef9741a', 'SUCCESS', '1367565', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvNVc37R410J0h22dq3x4mDW', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452850179, '34620623368247dbcc57056f56024cf1', 'SUCCESS', '1367580', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=V%2brHQIwzrDzFvDKfmDEJ7lJJ7A7vnPIzyI3ELS9zpJHzetHPhKOAfty5FujDicKX', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452850430, '97072cd3fd69f5ef6161bd275ae5a5a1', 'SUCCESS', '1367581', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvNehTJBZeyVaZatG5TsGoip', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452851032, '31ee11ecb5548e140a0192011f10338e', 'SUCCESS', '1367582', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvObqXQqgCRrf83LUMjXbCKy', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452851197, '79f0a87bbe9f1ce56178cff07eb052e9', 'SUCCESS', '1367583', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvPfyn45cTK4xYugNG1WHXjL', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1452851299, '2a8f720fbadbdcce605b488b122d47f7', 'SUCCESS', '1367584', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu%2fJdAZ36Bh5EMNC0hTVUGvO88PN32BhvhojPLUs3gxq1', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1457968850, '1ce40b1c22a664c1265c7fdc88da52b3', 'SUCCESS', '1424583', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=tnPcJHMKlSnmRpHM8fAbu7bEiCeEVVDgIc9IBRH%2f5enHS5%2bTdydWDWyfNf3u%2fAnL', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1457968877, '9dd7e88a2dfe50e8da6816420e2f2dff', 'SUCCESS', '1424584', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=V%2brHQIwzrDzFvDKfmDEJ7j7jV2VMwcSuNcxZxEnd2nMWm8R3cc8MyH%2bHypgPVQrN', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.'),
(1457968957, '10e9c440cc45f9512c6e4ab8d9f7872e', 'SUCCESS', '1424590', 1, 'COP', 1, 'https://registro.desarrollo.pse.com.co/PSEUserRegister/StartTransaction.htm?enc=V%2brHQIwzrDzFvDKfmDEJ7j7jV2VMwcSuNcxZxEnd2nM0Ywa5xeF%2bwVFsfqNXVlL%2b', 3, '?-', 'Transacción pendiente. Por favor verificar si el débito fue realizado en el Banco.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`idbank`),
  ADD UNIQUE KEY `bankCode_UNIQUE` (`bankCode`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`idperson`);

--
-- Indices de la tabla `transactionresult`
--
ALTER TABLE `transactionresult`
  ADD PRIMARY KEY (`transactionID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
