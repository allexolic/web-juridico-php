<html>
<head>
    <title>Edita Processo</title>

</head>
 
<body>
<?php
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");

$valid['success'] = array('success' => false, 'messages' =>array());


$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['update'])) {    
    $idProcesso = $crud->escape_string($_POST['idprocesso']); 
    $data_processo = $crud->escape_string($_POST['dt_processo']);
	//$data_processo = $crud->date('d-m-y', strtotime($_POST['dt_processo']));
    $nu_processo = $crud->escape_string($_POST['nu_processo']);
    $parte_Pro = $crud->escape_string($_POST['parte_Pro']);
    $parte_contra = $crud->escape_string($_POST['parte_contra']);
    $area_judicial = $crud->escape_string($_POST['area_judicial']);
    $nm_acao = $crud->escape_string($_POST['nm_acao']);
    $nm_oficio = $crud->escape_string($_POST['nm_oficio']);
	$nm_denominacao = $crud->escape_string($_POST['nm_denominacao']);
	$vl_causa = $crud->escape_string($_POST['vl_causa']);
	$nm_advogado = $crud->escape_string($_POST['nm_advogado']);
	$ds_assunto = $crud->escape_string($_POST['ds_assunto']);
    $ds_posicao = $crud->escape_string($_POST['ds_posicao']);
    $ds_fase = $crud->escape_string($_POST['ds_fase']);	
			
    $msg = $validation->check_empty($_POST, array('nu_processo', 'parte_Pro', 'parte_contra'));
	
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
        // $result = $crud->execute("Update tb_processo set dt_processo = '$data_processo',parte_Pro = $parte_Pro,nu_processo ='$nu_processo',
		// parte_contra = $parte_contra, id_area_judicial = $area_judicial, id_acao_judicial = $nm_acao,nm_oficio = '$nm_oficio',
		// nm_denominacao = '$nm_denominacao', vl_causa = '$vl_causa' , ds_assunto = '$ds_assunto'
		// WHERE id_processo = {$idProcesso}");
        
		 $result = $crud->execute("call processo_atualizar ('$data_processo', '$parte_Pro','$nu_processo', '$parte_contra', 
														'$area_judicial', '$nm_acao', '$nm_oficio',
														'$nm_denominacao','$vl_causa', '$nm_advogado','$ds_assunto','$idProcesso','$ds_posicao','$ds_fase') ");	
 
		
		
		
		//echo $idProcesso;
        //display success message
        $valid['success'] = true;
        $valid['messages'] = "Processo Atualizado.";

        //echo json_encode($valid);
		
		
        echo "<script type='text/javascript'>alert(\"Processo Atualizado.\");
              window.location = 'editarProcesso.php?o=manpro';
              </script>";
			  
 
    }
}

if(isset($_POST['voltar'])) {    
    header("location:editarProcesso.php?o=manpro");
}

if(isset($_POST['Encerrar'])) {    

    $id_processo = $crud->escape_string($_POST['id_processo']); 
    $dt_encerramento = $crud->escape_string($_POST['dt_encerramento']); 
	$motivo_encerramento = $crud->escape_string($_POST['motivo']); 
	
	$fl_andamento_ativo = $crud->escape_string($_POST['fl_andamento_ativo']); 

    
	if($fl_andamento_ativo == '1')
	{
		        
				
				echo "<script type='text/javascript'>alert(\"Para encerrar o Processo, é necessário encerrar os andamentos ativos.\");
                       window.location = 'editarProcesso.php?o=editOrd&i='+ '$id_processo';
                      </script>";
	}else{
	
	$result = $crud->execute("Update tb_processo set dt_encerramento = '$dt_encerramento', ds_motivo_encerramento = '$motivo_encerramento',
	                                                 st_processo = 2
		                       WHERE id_processo = {$id_processo}");
		
            echo "<script type='text/javascript'>alert(\"Processo Encerrado.\");
              window.location = 'editarProcesso.php?o=editOrd&i='+ '$id_processo';
              </script>";
}
}


if(isset($_POST['reativar'])) {    

    $id_processo = $crud->escape_string($_POST['idprocesso']); 

	

	$result = $crud->execute("Update tb_processo set dt_encerramento = Null, st_processo = 1
		                       WHERE id_processo = {$id_processo}");
		
            echo "<script type='text/javascript'>alert(\"Processo reativado.\");
              window.location = 'editarProcesso.php?o=editOrd&i='+ '$id_processo';
              </script>";

}

?>
</body>
</html>