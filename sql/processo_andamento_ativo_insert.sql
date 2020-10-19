CREATE TRIGGER `processo_andamento_ativo_Insert` AFTER INSERT ON `tb_andamento`
 FOR EACH ROW Update tb_Processo 
       Set fl_andamento_ativo = 1
     Where id_processo = new.id_processo