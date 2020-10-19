DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `usuario_inserir`(IN `nm_usuario` VARCHAR(255), IN `cd_usuario` VARCHAR(20), IN `ds_senha` VARCHAR(255), 
        IN `fl_advogado` BIT(1), IN `nu_oab` VARCHAR(8), IN `id_acesso` INT(11))
    NO SQL
    COMMENT 'Procedimento para inserir usuários do sistema.'
INSERT INTO tb_usuario(nm_usuario,cd_usuario,ds_senha, fl_advogado, nu_oab, id_acesso) 
VALUES(nm_usuario,cd_usuario,ds_senha, fl_advogado, nu_oab, id_acesso)$$
DELIMITER ;