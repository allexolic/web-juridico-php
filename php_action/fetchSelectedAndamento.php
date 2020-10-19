<?php 	

require_once 'core.php';

$id_andamento = $_POST['id_andamento'];

$sql = "SELECT id_andamento,id_processo,nu_processo, dt_andamento, tp_andamento,ds_andamento, st_andamento
          FROM andamento_listar WHERE id_andamento = $id_andamento";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);