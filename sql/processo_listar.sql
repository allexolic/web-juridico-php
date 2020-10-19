-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 23-Maio-2018 às 20:57
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
-- Structure for view `processo_listar`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `processo_listar`  AS  select `pro`.`id_processo` AS `id_processo`,`pro`.`nu_processo` AS `nu_processo`,`pro`.`parte_Pro` AS `parte_Pro`,`pro`.`parte_contra` AS `parte_contra`,`con`.`nm_parte` AS `partecon`,`cli`.`nm_parte` AS `partepro`,(case when (`pro`.`id_area_judicial` = 1) then 'Civel' when (`pro`.`id_area_judicial` = 2) then 'Trabalhista' when (`pro`.`id_area_judicial` = 3) then 'Tributario' end) AS `area_judicial`,`aca`.`nm_acao` AS `nm_acao`,`pro`.`st_processo` AS `st_processo`,`pro`.`dt_processo` AS `dt_processo`,`pro`.`id_area_judicial` AS `id_area_judicial`,`pro`.`id_acao_judicial` AS `id_Acao_Judicial`,`pro`.`nm_oficio` AS `nm_oficio`,`pro`.`ds_assunto` AS `ds_assunto`,`pro`.`nm_denominacao` AS `nm_denominacao`,`pro`.`vl_causa` AS `vl_causa`,`adv`.`id_advogado` AS `id_Advogado`,`usu`.`nm_usuario` AS `nm_Usuario`,`pro`.`dt_encerramento` AS `dt_encerramento`,`pro`.`fl_andamento_ativo` AS `fl_andamento_ativo` from (((((`tb_processo` `pro` join `tb_parte` `con` on((`pro`.`parte_contra` = `con`.`id_parte`))) join `tb_parte` `cli` on((`pro`.`parte_Pro` = `cli`.`id_parte`))) join `tb_acao` `aca` on((`pro`.`id_acao_judicial` = `aca`.`id_acao`))) left join `tb_processo_advogado` `adv` on((`adv`.`id_processo` = `pro`.`id_processo`))) left join `tb_usuario` `usu` on((`usu`.`user_id` = `adv`.`id_advogado`))) ;

--
-- VIEW  `processo_listar`
-- Data: Nenhum
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
