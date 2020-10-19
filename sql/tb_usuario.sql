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
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(255) NOT NULL,
  `cd_usuario` varchar(20) NOT NULL,
  `ds_senha` varchar(255) NOT NULL,
  `fl_advogado` bit(1) NOT NULL DEFAULT b'0',
  `nu_oab` varchar(8) DEFAULT NULL,
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`user_id`, `nm_usuario`, `cd_usuario`, `ds_senha`, `fl_advogado`, `nu_oab`, `dt_cadastro`) VALUES
(2, 'Usuário Administrador', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', b'0', NULL, '2018-03-28 10:33:21'),
(9, 'Alexandre', 'acurvelo', '81dc9bdb52d04dc20036dbd8313ed055', b'0', '', '2018-05-09 20:28:17')
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
