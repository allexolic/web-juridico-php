<?php 	

require_once 'core.php';

$acaoJudicialId = $_POST['acaoJudicialId'];

$sql = "SELECT id_acao, nm_acao, acao_active, cd_status FROM tb_acao WHERE id_acao = $acaoJudicialId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);