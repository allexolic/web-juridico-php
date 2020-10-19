CREATE TRIGGER `processo_andamento_ativo_Update` AFTER UPDATE ON `tb_andamento`
 FOR EACH ROW Update tb_Processo a
       Set fl_andamento_ativo = case 
                                when (Select count(*)
	                                    From tb_andamento b
						               Where b.id_processo = a.id_processo
						                 And b.st_andamento = 1) = 0 then 0
									 else 1 end
     Where id_processo = new.id_processo