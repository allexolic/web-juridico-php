<html>
<head>
    <title>Atualizar Andamento</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");
 
$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['update'])) {    
    
	$id_andamento = $crud->escape_string($_POST['id_andamento']);
    $dt_andamento = $crud->escape_string($_POST['dt_andamento']);
    $tp_andamento = $crud->escape_string($_POST['tp_andamento']);
    $ds_andamento = $crud->escape_string($_POST['ds_andamento']);
    $id_advogado = $crud->escape_string($_POST['id_advogado']);
 	
	$id_processo = $crud->escape_string($_POST['id_processo']);

	//$nu_oab = $crud->escape_string($_POST['nu_oab']);
	


	
    $msg = $validation->check_empty($_POST, array('dt_andamento', 'tp_andamento', 'ds_andamento'));
	
    //$check_age = $validation->is_age_valid($_POST['parte_Pro']);
    //$check_email = $validation->is_email_valid($_POST['parte_contra']);
    
    // checking empty fields
    if($msg != null) {
        echo $msg;        
        //link to the previous page

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }   
    else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = $crud->execute("Update tb_andamento set dt_andamento = '$dt_andamento', tp_andamento = '$tp_andamento',
		                                                  ds_andamento = '$ds_andamento', id_advogado = '$id_advogado'
		                           WHERE id_andamento = {$id_andamento}");
        
		//echo $idProcesso;
        //display success message
        $valid['success'] = true;
        $valid['messages'] = "Audiência Atualizada.";

        //echo json_encode($valid);
		
        echo "<script type='text/javascript'>alert(\"Andamento Atualizado.\");
              window.location = 'http://localhost:8080/juridico/editarAudiencia.php?o=manpro';
              </script>";
            
			// header("location:http://localhost:8080/juridico/editarProcesso.php?o=manpro");

        //header("location:http://localhost:8080/juridico/editarProcesso.php?o=manpro");
    }
	


}
if(isset($_POST['voltar'])) {    
    
	$id_processo = $crud->escape_string($_POST['id_processo']);

	
    header("location:http://localhost:8080/juridico/editarAudiencia.php?o=manpro");
	

     
}

if(isset($_POST['finaliza'])) {    
    
	$id_processo = $crud->escape_string($_POST['id_processo']);
    $id_andamento = $crud->escape_string($_POST['id_andamento']);
	
	$result = $crud->execute("Update tb_andamento set st_andamento = 2
		                           WHERE id_andamento = {$id_andamento}");
	
           echo "<script type='text/javascript'>alert(\"Audiencia Encerrada.\");
              window.location = 'http://localhost:8080/juridico/editarAudiencia.php?o=manpro';
              </script>";


  //header("location:http://localhost:8080/juridico/editarAndamento.php?o=manpro&i=$id_processo");
	

     
}

?>
</body>
</html>