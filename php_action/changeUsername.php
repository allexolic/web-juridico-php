<?php 

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$username = $_POST['nm_usuario'];
	$userId = $_POST['user_id'];
	$id_acesso = $_POST['id_acesso'];
	$fl_advogado = $_POST['fl_advogado'];
	$nu_oab = $_POST['nu_oab'];
	
	$sql = "UPDATE tb_usuario SET nm_usuario = '$username', id_acesso = $id_acesso, fl_advogado = '$fl_advogado',
	               nu_oab = '$nu_oab'
	               dt_atualizacao = CURRENT_TIMESTAMP
 	         WHERE user_id = {$userId}";
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Usuário atualizado.";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Erro ao atualizar usuário.";
	}

	$connect->close();

	echo json_encode($valid);

}

?>