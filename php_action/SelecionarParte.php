<?php 	

require_once 'core.php';

$sql = "Select id_parte, nm_parte, parte_active, parte_status
	      From tb_parte 
		 WHERE parte_status = 1";
		 
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $parte_active = ""; 
// $fl_advogado ="";

 while($row = $result->fetch_array()) {
 	$id_parte = $row[0];
 	// active 
 	if($row[2] == 1) {
 		// activate member
 		$parte_active = "<label class='label label-success'>Ativo</label>";
 	} else {
 		// deactivate member
 		$parte_active = "<label class='label label-danger'>Inativo</label>";
	 }
	 
	 // if($row[2] == 0){
		 // $fl_advogado = "<label>Não</label>";

	 // }else{
		// $fl_advogado = "<label>Sim</label>";
	 // }


 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Ação <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editParteModel" onclick="editarPartes('.$id_parte.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removerPartes('.$id_parte.')"> <i class="glyphicon glyphicon-trash"></i> Remover</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
		 $row[1],
		 //$fl_advogado, 		
 		 $parte_active,
 		 $button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);