<?php 

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$currentPassword = md5($_POST['ds_senha']);
	$newPassword = md5($_POST['nds_senha']);
	$conformPassword = md5($_POST['cds_senha']);
	$userId = $_POST['user_id'];

	$sql ="SELECT * FROM tb_usuario WHERE user_id = {$userId}";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();

	if($currentPassword == $result['ds_senha']) {

		if($newPassword == $conformPassword) {

			$updateSql = "UPDATE tb_usuario SET ds_senha = '$newPassword' WHERE user_id = {$userId}";
			if($connect->query($updateSql) === TRUE) {
				$valid['success'] = true;
				$valid['messages'] = "Senha atualizada.";		
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Erro ao atualizar senha.";	
			}

		} else {
			$valid['success'] = false;
			$valid['messages'] = "Verifique a confirmação da nova senha.";
		}

	} else {
		$valid['success'] = false;
		$valid['messages'] = "Senha atual incorreta.";
	}

	$connect->close();

	echo json_encode($valid);

}

?>