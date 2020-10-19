-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21-Maio-2018 às 22:08
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
-- Estrutura da tabela `tb_processo_advogado`
--

DROP TABLE IF EXISTS `tb_processo_advogado`;
CREATE TABLE IF NOT EXISTS `tb_processo_advogado` (
  `id_processo_advogado` int(11) NOT NULL AUTO_INCREMENT,
  `id_processo` int(11) NOT NULL,
  `id_advogado` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_processo_advogado`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_processo_advogado`
--

INSERT INTO `tb_processo_advogado` (`id_processo_advogado`, `id_processo`, `id_advogado`, `dt_cadastro`) VALUES
(1, 28, 10, '2018-05-10 14:55:59'),
(2, 29, 10, '2018-05-10 14:57:22'),
(3, 30, 10, '2018-05-10 14:57:39'),
(4, 31, 10, '2018-05-10 14:57:45'),
(5, 32, 10, '2018-05-10 14:58:04'),
(6, 33, 10, '2018-05-10 15:09:41'),
(7, 34, 11, '2018-05-10 17:55:29'),
(8, 6, 10, '2018-05-18 16:41:35'),
(9, 7, 10, '2018-05-18 16:41:35'),
(10, 8, 10, '2018-05-18 16:41:35'),
(11, 9, 10, '2018-05-18 16:41:35'),
(12, 10, 10, '2018-05-18 16:41:35'),
(13, 11, 10, '2018-05-18 16:41:35'),
(14, 12, 10, '2018-05-18 16:41:35'),
(15, 13, 10, '2018-05-18 16:41:35'),
(16, 14, 10, '2018-05-18 16:41:35'),
(17, 15, 10, '2018-05-18 16:41:35'),
(18, 16, 10, '2018-05-18 16:41:35'),
(19, 17, 10, '2018-05-18 16:41:35'),
(20, 18, 10, '2018-05-18 16:41:35'),
(21, 19, 10, '2018-05-18 16:41:35'),
(22, 20, 10, '2018-05-18 16:41:35'),
(23, 21, 10, '2018-05-18 16:41:35'),
(24, 22, 10, '2018-05-18 16:41:35'),
(25, 23, 10, '2018-05-18 16:41:35'),
(26, 24, 10, '2018-05-18 16:41:35'),
(27, 25, 10, '2018-05-18 16:41:35'),
(28, 26, 11, '2018-05-18 16:41:35'),
(29, 27, 10, '2018-05-18 16:41:35'),
(30, 35, 13, '2018-05-18 17:53:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
