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
-- Estrutura da tabela `tb_acao`
--

DROP TABLE IF EXISTS `tb_acao`;
CREATE TABLE IF NOT EXISTS `tb_acao` (
  `id_acao` int(11) NOT NULL AUTO_INCREMENT,
  `nm_acao` varchar(255) NOT NULL,
  `acao_active` int(11) NOT NULL DEFAULT '0',
  `cd_status` int(11) NOT NULL DEFAULT '0',
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_acao`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_acao`
--

INSERT INTO `tb_acao` (`id_acao`, `nm_acao`, `acao_active`, `cd_status`, `dt_cadastro`) VALUES
(2, 'CobranÃ§a', 1, 1, '2018-04-10 17:37:45'),
(3, 'Enriquecimento sem Causa ', 1, 1, '2018-04-24 16:18:30'),
(4, 'ReclamaÃ§Ã£o Trabalhista', 1, 1, '2018-04-26 15:17:35'),
(5, 'IndenizatÃ³ria', 1, 1, '2018-04-26 16:34:43'),
(6, 'Defeito, Nulidade Ou AnulaÃ§Ã£o / Ato Ou NegÃ³cio JurÃ­dico', 1, 1, '2018-04-27 10:29:34'),
(7, 'COB', 1, 2, '2018-05-02 10:17:48'),
(8, 'Dano Moral', 1, 1, '2018-05-02 10:26:07'),
(9, 'att', 1, 2, '2018-05-07 18:29:49'),
(10, 'IndenizaÃ§Ã£o Por Dano Moral', 1, 1, '2018-05-18 17:51:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
