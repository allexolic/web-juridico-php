<?php
include_once("classes/Crud.php");
include_once("classes/Validation.php");
$crud = new Crud();

if(isset($_POST['createOrderBtn'])) {    
	
	$dt_processo = $crud->escape_string($_POST['dt_processo']);
    $parte_pro = $crud->escape_string($_POST['parte_pro']);
    $nu_processo = $crud->escape_string($_POST['nu_processo']);
    $parte_contra = $crud->escape_string($_POST['parte_contra']);
    $id_area_judicial = $crud->escape_string($_POST['id_area_judicial']);
    $st_processo = $crud->escape_string($_POST['st_processo']);
	
$result = $crud->execute("INSERT INTO tb_Processo (dt_processo,parte_pro,nu_processo,parte_contra,id_area_judicial, st_processo) 
                          VALUES('$dt_processo','$parte_pro','$nu_processo','$parte_contra','$id_area_judicial','$st_processo')");

}

?>