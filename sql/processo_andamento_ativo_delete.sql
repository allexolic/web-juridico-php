CREATE TRIGGER `processo_andamento_ativo_Delete` AFTER DELETE ON `tb_andamento`
 FOR EACH ROW Update tb_Processo a
       Set fl_andamento_ativo = 0
     Where id_processo = old.id_processo
	   And Not Exists (Select null
	                     From tb_andamento b
						Where b.id_processo = a.id_processo
						  And b.st_andamento = 1)