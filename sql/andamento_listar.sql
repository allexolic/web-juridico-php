-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21-Maio-2018 às 22:10
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
-- Structure for view `andamento_listar`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `andamento_listar`  
AS  select `ado`.`id_andamento` AS `id_andamento`,`pro`.`id_processo` AS `id_processo`,`pro`.`nu_processo` AS `nu_processo`,
`ado`.`dt_andamento` AS `dt_andamento`,`ado`.`tp_andamento` AS `tp_andamento`,`ado`.`ds_andamento` AS `ds_andamento`,
`ado`.`st_andamento` AS `st_andamento`, `ado`.`id_advogado` AS `id_advogado`
from (`tb_processo` `pro` 
left join `tb_andamento` `ado` on((`ado`.`id_processo` = `pro`.`id_processo`))) ;

--
-- VIEW  `andamento_listar`
-- Data: Nenhum
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
