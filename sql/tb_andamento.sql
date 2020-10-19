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
-- Estrutura da tabela `tb_andamento`
--

DROP TABLE IF EXISTS `tb_andamento`;
CREATE TABLE IF NOT EXISTS `tb_andamento` (
  `id_andamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_processo` int(11) NOT NULL,
  `dt_andamento` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `tp_andamento` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `ds_andamento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `st_andamento` int(1) NOT NULL DEFAULT '1',
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_andamento`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `tb_andamento`
--

INSERT INTO `tb_andamento` (`id_andamento`, `id_processo`, `dt_andamento`, `tp_andamento`, `ds_andamento`, `st_andamento`, `dt_cadastro`) VALUES
(5, 34, '13/05/2018', 'AUDIÃŠNCIA DE MEDIAÃ‡ÃƒO', 'AUDIÃŠNCIA DE MEDIAÃ‡ÃƒO\r\nCENTRO JUDICIÃRIO DE SOLUÃ‡ÃƒO DE CONFLITOS E CIDADANIA\r\nBECO DA MÃšSICA, 121, LÃMINA V, TÃ‰RREO, SALA T06', 1, '2018-05-13 22:37:00'),
(6, 34, '13/05/2018', 'petiÃ§Ã£o inicial', 'teste cadastro de petiÃ§Ã£o', 1, '2018-05-14 00:49:37'),
(7, 34, '13/05/2018', 'andamento 3', 'andamento 3 14/05/2018', 1, '2018-05-14 00:55:41'),
(8, 34, '13/05/2018', 'petiÃ§Ã£o inicial', 'Teste de andamento', 1, '2018-05-14 00:56:00'),
(9, 34, '13/05/2018', 'petiÃ§Ã£o inicial', 'petiÃ§Ã£o inicial', 1, '2018-05-14 00:56:22'),
(10, 34, '13/05/2018', 'petiÃ§Ã£o inicial', 'petiÃ§Ã£o inicial', 1, '2018-05-14 00:56:57'),
(11, 31, '13/05/2018', 'petiÃ§Ã£o inicial', 'petiÃ§Ã£o inicial', 1, '2018-05-14 00:58:30'),
(12, 25, '16/04/2018', 'AudiÃªncia', 'AudiÃªncia de conciliaÃ§Ã£o.', 1, '2018-05-14 11:10:00'),
(13, 26, '16/04/2018', 'AudiÃªncia', 'teste', 2, '2018-05-17 16:48:20'),
(14, 26, '16/04/2018', 'AudiÃªncia 2', 'teste 2', 2, '2018-05-17 16:48:32'),
(15, 26, '16/04/2018', 'AudiÃªncia 3', 'teste 3', 2, '2018-05-18 15:10:36'),
(16, 35, '31/08/2017', '	Ato OrdinatÃ³rio Praticado', '	Certifico e dou fÃ© que envio para o expediente do dia 04/09/2017, o despacho proferido Ã  fl. 396.', 1, '2018-05-18 17:54:34');

--
-- Acionadores `tb_andamento`
--
DROP TRIGGER IF EXISTS `processo_andamento_ativo_Delete`;
DELIMITER $$
CREATE TRIGGER `processo_andamento_ativo_Delete` AFTER DELETE ON `tb_andamento` FOR EACH ROW Update tb_Processo a
       Set fl_andamento_ativo = 0
     Where id_processo = old.id_processo
	   And Not Exists (Select null
	                     From tb_andamento b
						Where b.id_processo = a.id_processo
						  And b.st_andamento = 1)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `processo_andamento_ativo_Insert`;
DELIMITER $$
CREATE TRIGGER `processo_andamento_ativo_Insert` AFTER INSERT ON `tb_andamento` FOR EACH ROW Update tb_Processo 
       Set fl_andamento_ativo = 1
     Where id_processo = new.id_processo
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `processo_andamento_ativo_Update`;
DELIMITER $$
CREATE TRIGGER `processo_andamento_ativo_Update` AFTER UPDATE ON `tb_andamento` FOR EACH ROW Update tb_Processo a
       Set fl_andamento_ativo = case 
                                when (Select count(*)
	                                    From tb_andamento b
						               Where b.id_processo = a.id_processo
						                 And b.st_andamento = 1) = 0 then 0
									 else 1 end
     Where id_processo = new.id_processo
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
