<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$acaoJudicialName = $_POST['acaoJudicialName'];
    $acaoJudicialStatus = $_POST['acaoJudicialStatus']; 

	$sql = "INSERT INTO tb_acao (nm_acao, acao_active, cd_status) 
	VALUES ('$acaoJudicialName', '$acaoJudicialStatus', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Ação judicial adicionada com sucesso.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Erro ao adicionar ação judicial.";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST