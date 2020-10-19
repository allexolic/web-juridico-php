<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$acaoJudicialName = $_POST['editAcaoJudicialName'];
    $acaoJudicialStatus = $_POST['editAcaoJudicialStatus']; 
    $acaoJudicialId = $_POST['editAcaoJudicialId'];

  
	
	$sql = "UPDATE tb_acao SET nm_acao = '$acaoJudicialName', acao_active = '$acaoJudicialStatus' WHERE id_acao = '$acaoJudicialId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Ação atualizada com sucesso.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Erro ao atualizar ações judiciais.";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST