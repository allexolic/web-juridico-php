-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 23-Maio-2018 às 20:56
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
-- Estrutura da tabela `tb_processo`
--

DROP TABLE IF EXISTS `tb_processo`;
CREATE TABLE IF NOT EXISTS `tb_processo` (
  `id_processo` int(11) NOT NULL AUTO_INCREMENT,
  `dt_processo` varchar(12) DEFAULT NULL,
  `parte_Pro` int(11) NOT NULL,
  `nu_processo` varchar(255) NOT NULL,
  `parte_contra` int(11) NOT NULL,
  `id_area_judicial` int(11) NOT NULL,
  `id_acao_judicial` int(11) NOT NULL,
  `st_processo` int(1) NOT NULL DEFAULT '1',
  `nm_oficio` varchar(255) DEFAULT NULL,
  `nm_denominacao` varchar(255) DEFAULT NULL,
  `ds_assunto` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `vl_causa` varchar(20) DEFAULT NULL,
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fl_andamento_ativo` bit(1) NOT NULL DEFAULT b'0',
  `dt_encerramento` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_processo`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_processo`
--

INSERT INTO `tb_processo` (`id_processo`, `dt_processo`, `parte_Pro`, `nu_processo`, `parte_contra`, `id_area_judicial`, `id_acao_judicial`, `st_processo`, `nm_oficio`, `nm_denominacao`, `ds_assunto`, `vl_causa`, `dt_cadastro`, `fl_andamento_ativo`, `dt_encerramento`) VALUES
(6, NULL, 1, '12345', 1, 1, 0, 1, '', '', NULL, NULL, '2018-04-19 15:07:44', b'0', NULL),
(7, NULL, 1, '12345', 1, 1, 0, 1, '', '', NULL, NULL, '2018-04-19 15:09:45', b'0', NULL),
(8, NULL, 1, '142365', 1, 1, 0, 1, '', '', NULL, NULL, '2018-04-19 17:18:25', b'0', NULL),
(9, NULL, 1, '0100023-72.2018.5.01.0000', 1, 1, 0, 1, '', '', NULL, NULL, '2018-04-19 17:57:19', b'0', NULL),
(10, NULL, 1, '111111', 1, 1, 0, 1, '', '', NULL, NULL, '2018-04-19 17:59:15', b'0', NULL),
(11, NULL, 5, '12312121', 4, 1, 0, 1, '', '', NULL, NULL, '2018-04-19 17:59:58', b'0', NULL),
(12, NULL, 1, '9393999', 3, 1, 0, 1, '', '', NULL, NULL, '2018-04-19 18:33:36', b'0', NULL),
(13, NULL, 5, '0100023-72.2018.5.01.0000', 6, 2, 0, 1, '', '', NULL, NULL, '2018-04-19 18:37:52', b'0', NULL),
(14, NULL, 1, '038.01.2008.001755-0/0000', 4, 3, 0, 1, '', '', NULL, NULL, '2018-04-20 14:44:25', b'0', NULL),
(15, NULL, 1, '0100023-72.2018.5.01.0000', 2, 1, 0, 1, '', '', NULL, NULL, '2018-04-20 14:51:57', b'0', NULL),
(16, NULL, 1, '', 1, 1, 0, 1, '', '', NULL, NULL, '2018-04-20 16:00:47', b'0', NULL),
(17, NULL, 1, '0001215-80.2011.8.26.0016', 6, 1, 0, 1, '', '', NULL, NULL, '2018-04-20 16:02:36', b'0', NULL),
(18, NULL, 2, '0001215-80.2011.8.26.0016', 3, 1, 0, 1, '', '', NULL, NULL, '2018-04-20 16:03:46', b'0', NULL),
(19, NULL, 1, '', 3, 1, 0, 1, '', '', NULL, NULL, '2018-04-20 16:03:57', b'0', NULL),
(20, NULL, 1, '', 1, 1, 0, 1, '', '', NULL, NULL, '2018-04-20 16:09:42', b'0', NULL),
(21, NULL, 1, '0100023-72.2018.5.01.0000', 2, 1, 0, 1, '', '', NULL, NULL, '2018-04-20 16:21:11', b'0', NULL),
(22, '04/24/2018', 7, '0100023-72.2018.5.01.0000', 8, 1, 0, 1, '', '', NULL, NULL, '2018-04-24 16:12:54', b'0', NULL),
(23, '04/24/2018', 7, '0100023-72.2018.5.01.0000', 2, 1, 3, 2, '', '', NULL, '', '2018-04-24 17:18:16', b'0', NULL),
(24, '04/26/2018', 1, '1423656288', 3, 1, 2, 2, '', '', NULL, '', '2018-04-26 10:49:24', b'0', '16/05/2018'),
(25, '04/26/2018', 5, '0102122-33.2017.5.01.0070', 6, 2, 4, 1, '', '70Âª Vara do Trabalho do Rio de Janeiro', NULL, '9.383.533,72', '2018-04-26 10:53:26', b'0', NULL),
(26, '03/27/2018', 9, '0007073-55.2018.8.19.0206', 10, 1, 6, 2, '4Âº OfÃ­cio de Registro de DistribuiÃ§Ã£o', '1Âª Vara CÃ­vel de Santa Cruz', 'Teste', '1000,00', '2018-04-27 10:31:54', b'0', '18/05/2018'),
(27, '01/27/2016', 11, '0100097-20.2016.5.01.0058', 12, 2, 4, 1, '', '58Âª Vara do Trabalho do Rio de Janeiro', NULL, '500,00', '2018-04-27 11:38:40', b'0', NULL),
(28, '10/05/2018', 1, '99999194470', 7, 1, 2, 2, '', 'Vara cÃ­vel', 'CobranÃ§a indevida', '1.000,00', '2018-05-10 14:55:59', b'0', '16/05/2018'),
(29, '', 2, '0100023-72.2018.5.01.0000', 8, 1, 2, 1, '', '', '', '', '2018-05-10 14:57:22', b'0', '16/05/2018'),
(30, '', 2, '0100023-72.2018.5.01.0000', 8, 1, 2, 2, '', '', NULL, '', '2018-05-10 14:57:39', b'0', '16/05/2018'),
(31, '', 2, '0100023-72.2018.5.01.0000', 8, 1, 2, 2, '', '', NULL, '', '2018-05-10 14:57:44', b'0', '16/05/2018'),
(32, '05/10/2018', 2, '0100023-72.2018.5.01.0000', 8, 1, 2, 1, '', '1 vara civel', NULL, '', '2018-05-10 14:58:04', b'0', NULL),
(33, '05/10/2018', 5, '0103700-14.2006.5.01.0071', 6, 1, 2, 1, '', '', NULL, '', '2018-05-10 15:09:41', b'0', NULL),
(34, '11/28/2016', 22, '0101839-22.2016.5.01.0045', 23, 2, 4, 1, '', '16Âª Vara do Trabalho do Rio de Janeiro', 'Acidente de Trabalho', '', '2018-05-10 17:55:29', b'0', NULL),
(35, '26/05/2009', 24, '0130351-44.2009.8.19.0001', 25, 1, 10, 1, '3Âº OfÃ­cio de Registro de DistribuiÃ§Ã£o', '18Âª Vara CÃ­vel do Rio de Janeiro', 'InclusÃ£o Indevida em Cadastro de Inadimplentes', '', '2018-05-18 17:53:17', b'1', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
