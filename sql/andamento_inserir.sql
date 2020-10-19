DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `andamento_inserir`(IN `id_processo` INT(11), IN `dt_andamento` VARCHAR(12), IN `tp_andamento` VARCHAR(100), 
IN `ds_andamento` VARCHAR(255), IN `id_advogado` INT(11))
    NO SQL
    COMMENT 'Procedimento para inserir andamentos nos processos do sistema.'
INSERT INTO tb_andamento(id_processo, dt_andamento,tp_andamento,ds_andamento, st_andamento, id_advogado) 
VALUES(id_processo, dt_andamento,tp_andamento,ds_andamento, 1, id_advogado)$$
DELIMITER ;