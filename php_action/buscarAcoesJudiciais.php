<?php 	

require_once 'core.php';

$sql = "SELECT id_acao, nm_acao, acao_active, cd_status FROM tb_acao WHERE cd_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeAcaoJudicial = ""; 

 while($row = $result->fetch_array()) {
 	$acaoJudicialId = $row[0];
 	// active 
 	if($row[2] == 1) {
 		// activate member
 		$activeAcaoJudicial = "<label class='label label-success'>Ativo</label>";
 	} else {
 		// deactivate member
 		$activeAcaoJudicial = "<label class='label label-danger'>Inativo</label>";
 	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Ação <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editAcaoJudicialModalBtn" data-target="#editAcaoJudicialModal" onclick="editarAcaoJudicial('.$acaoJudicialId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeAcaoJudicialModal" id="removeAcaoJudicialModalBtn" onclick="removeAcaoJudicial('.$acaoJudicialId.')"> <i class="glyphicon glyphicon-trash"></i> Remover</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 		
 		$activeAcaoJudicial,
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);