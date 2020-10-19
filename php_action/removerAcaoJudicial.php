<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$acaoJudicialId = $_POST['acaoJudicialId'];

if($acaoJudicialId) { 

 $sql = "UPDATE tb_acao SET cd_status = 2 WHERE id_acao = {$acaoJudicialId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Ação judicial removida.";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Erro ao remover ação judicial.";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST