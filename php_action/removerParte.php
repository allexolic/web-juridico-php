<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$parteId = $_POST['parteId'];

if($parteId) { 

 $sql = "UPDATE tb_parte SET parte_status = 2 WHERE id_parte = {$parteId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Parte Removida.";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Erro ao remover Parte.";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST