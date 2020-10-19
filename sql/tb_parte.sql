-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21-Maio-2018 às 22:07
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juridico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_parte`
--

DROP TABLE IF EXISTS `tb_parte`;
CREATE TABLE IF NOT EXISTS `tb_parte` (
  `id_parte` int(11) NOT NULL AUTO_INCREMENT,
  `nm_parte` varchar(255) NOT NULL,
  `fl_advogado` bit(1) NOT NULL DEFAULT b'0',
  `parte_active` int(11) NOT NULL DEFAULT '0',
  `parte_status` int(11) NOT NULL DEFAULT '0',
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_parte`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_parte`
--

INSERT INTO `tb_parte` (`id_parte`, `nm_parte`, `fl_advogado`, `parte_active`, `parte_status`, `dt_cadastro`) VALUES
(1, 'Alexandre', b'0', 1, 1, '2018-04-18 12:25:28'),
(2, 'Manoela', b'0', 1, 1, '2018-04-18 12:44:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
