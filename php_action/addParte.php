<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$nm_parte = $_POST['nm_parte'];
	$nu_cpf_cnpj = $_POST['nu_cpf_cnpj'];	
	$parte_status = $_POST['parte_active']; 
	//$ehAdvogado = $_POST['fl_advogado'];
	
	// if($ehAdvogado == true){
		// $ehAdvogado = 1;

	// }else{
		// $ehAdvogado = 0;
	// }


	$sql = "INSERT INTO tb_parte (nm_parte, nu_cpf_cnpj,parte_active, parte_status) 
	        VALUES ('$nm_parte','$nu_cpf_cnpj', '$parte_status', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Parte Adicionada.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Erro ao adicionar parte.";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST