<?php 	

require_once 'core.php';

$sql = "SELECT id_Processo, nu_processo, partepro, area_judicial,nm_acao, st_processo 
          FROM processo_listar WHERE st_processo = 1 order by id_Processo desc";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$idprocesso = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM tb_processo WHERE id_Processo = $idprocesso";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 	// Processo ativo 
 	if($row[5] == 1) { 		
 		$paymentStatus = "<label class='label label-success'>Ativo</label>";
 	} else if($row[5] == 2) { 		
 		$paymentStatus = "<label class='label label-danger'>Encerrado</label>";
 	} else { 		
 		$paymentStatus = "<label class='label label-warning'>Suspenso</label>";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Ação <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="editarProcesso.php?o=editOrd&i='.$idprocesso.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Visualizar</a></li>
		
		<li><a href="editarAndamento.php?o=manpro&i='.$idprocesso.'" id="cadAndamentoForm"> <i class="glyphicon glyphicon-edit"></i> Andamentos</a></li>
	    
	    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$idprocesso.')"> <i class="glyphicon glyphicon-save"></i> Baixar</a></li>

	    <li><a type="button" onclick="printOrder('.$idprocesso.')"> <i class="glyphicon glyphicon-print"></i> Imprimir </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$idprocesso.')"> <i class="glyphicon glyphicon-trash"></i> Excluir</a></li>       
	  </ul>
	</div>';		

 	$output['data'][] = array( 		
 		// Gerenciar processo
 		$x,      // ID
 		$row[1], // numero processo
 		$row[2], // cliente
 		$row[3], //área judicial		 	
 		$row[4], //ação judicial		 	
 		$paymentStatus, //status processo
 		// button
 		$button  //gerenciar	
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);