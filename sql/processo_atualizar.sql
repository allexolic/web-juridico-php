DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `processo_atualizar`(IN `dt_processo` VARCHAR(12), IN `parte_Pro` INT(11), 
IN `nu_processo` VARCHAR(255), IN `parte_contra` INT(11), IN `id_area_judicial` INT(11), IN `id_acao_judicial` INT(11), 
IN `nm_oficio` VARCHAR(255), IN `nm_denominacao` VARCHAR(255), IN `vl_causa` VARCHAR(20), IN `id_advogado` INT(11), 
IN `ds_assunto` VARCHAR(255), IN `id` INT(11), IN `ds_posicao` VARCHAR(50), IN `ds_fase` VARCHAR(100))
    NO SQL
    COMMENT 'Procedimento para ATUALIZAR processos do sistema.'
BEGIN

Update tb_processo set dt_processo = dt_processo, parte_Pro = parte_Pro, nu_processo = nu_processo, parte_contra = parte_contra,
                       id_area_judicial = id_area_judicial, id_acao_judicial = id_acao_judicial, nm_oficio = nm_oficio,
					   nm_denominacao = nm_denominacao, vl_causa = vl_causa, ds_assunto = ds_assunto, ds_posicao_cli= ds_posicao,
					   ds_fase = ds_fase
  Where id_processo = id;
  

  update tb_processo_advogado set id_advogado = id_advogado
    Where id_processo = id;
  
  end$$
DELIMITER ;