<?php 	

require_once 'core.php';

$parteId = $_POST['parteId'];

$sql = "SELECT id_parte, nm_parte, nu_cpf_cnpj, parte_active, parte_status FROM tb_parte WHERE id_parte = $parteId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);