<?php 	

require_once 'core.php';

$id_processo = $_POST['id_processo'];

$sql = "SELECT id_andamento,id_processo,nu_processo, dt_andamento, tp_andamento,ds_andamento, st_andamento
          FROM andamento_listar Where id_processo = $id_processo";
		  
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $st_andamento = ""; 
// $fl_advogado ="";

 while($row = $result->fetch_array()) {
 	$id_andamento = $row[0];
 	// active 
 	if($row[6] == 1) {
 		// activate member
 		$st_andamento = "<label class='label label-success'>Ativo</label>";
 	} else {
 		// deactivate member
 		$st_andamento = "<label class='label label-danger'>Encerrado</label>";
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
	    <li><a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editBrands('.$id_andamento.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeBrands('.$id_andamento.')"> <i class="glyphicon glyphicon-trash"></i> Encerrar</a></li>  		
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeBrands('.$id_andamento.')"> <i class="glyphicon glyphicon-trash"></i> Remover</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
		 $row[0],
		 $row[3],
         $row[4],	
         $row[5],		 
 		 $st_andamento,
 		 $button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);