DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `andamento_ativo`(IN `id` INT, OUT `count` INT)
    NO SQL
Select count(*)
   into count
   From tb_Andamento 
  Where st_andamento = 1
    And id_Processo = id$$
DELIMITER ;