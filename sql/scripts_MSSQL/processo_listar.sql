Create View processo_listar
As 

Select pro.id_processo, pro.nu_processo, pro.parte_Pro, pro.parte_contra, con.nm_parte as partecon,
       cli.nm_parte AS partepro, (case when (pro.id_area_judicial = 1) then 'Civel' 
	                                   when (pro.id_area_judicial = 2) then 'Trabalhista' 
									   when (pro.id_area_judicial = 3) then 'Tributario' end) AS area_judicial,
       aca.nm_acao, st_processo, dt_processo, pro.id_area_judicial, pro.id_Acao_Judicial, pro.nm_oficio, pro.nm_denominacao,
	   pro.vl_causa, adv.id_Advogado, usu.nm_Usuario

  From tb_processo pro
 Inner Join tb_parte con
    On pro.parte_contra = con.id_Parte
 Inner Join tb_parte cli
    On pro.parte_Pro = cli.id_Parte
 Inner Join tb_acao aca
    On pro.id_acao_judicial = aca.id_acao
 
 left Join tb_processo_advogado adv
    On adv.id_Processo = pro.id_Processo
 
 left Join tb_usuario usu
    On usu.user_id = adv.id_advogado