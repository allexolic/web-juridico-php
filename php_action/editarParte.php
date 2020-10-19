<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$parteName = $_POST['editParteName'];
    $parteStatus = $_POST['editParteStatus']; 
    $cpf = $_POST['editNu_cpf_cnpj']; 	
    $parteId = $_POST['parteId'];


	$sql = "UPDATE tb_parte SET nm_parte = '$parteName', nu_cpf_cnpj = '$cpf', parte_active = '$parteStatus' 
	         WHERE id_parte = '$parteId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Parte Atualizada.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Erro ao atualizar Parte";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST