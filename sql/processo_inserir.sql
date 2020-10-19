DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `processo_inserir`(IN `dt_processo` VARCHAR(12), IN `parte_Pro` INT(11), IN `nu_processo` VARCHAR(255), 
               IN `parte_contra` INT(11), IN `id_area_judicial` INT(11), IN `id_acao_judicial` INT(11), IN `st_processo` INT(1), IN `nm_oficio` VARCHAR(255), 
			   IN `nm_denominacao` VARCHAR(255), IN `vl_causa` VARCHAR(20), IN `id_advogado` INT(11), IN `ds_assunto` VARCHAR(255))
    NO SQL
    COMMENT 'Procedimento para inserir processos do sistema.'
BEGIN
INSERT INTO tb_processo(dt_processo,parte_Pro,nu_processo,parte_contra, id_area_judicial,id_acao_judicial,st_processo,nm_oficio,
                        nm_denominacao, vl_causa, ds_assunto) 		
VALUES(dt_processo,parte_Pro,nu_processo,parte_contra,id_area_judicial,id_acao_judicial,1,nm_oficio,nm_denominacao, vl_causa, ds_assunto);


INSERT INTO tb_processo_advogado (id_processo, id_advogado)		
VALUES (LAST_INSERT_ID(), id_advogado);	

END$$
DELIMITER ;