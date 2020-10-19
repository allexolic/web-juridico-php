<html>
<head>
    <title>Adiciona Processo</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");
 
$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $data_processo = $crud->escape_string(isset($_POST['dt_processo'])? $_POST['dt_processo'] : "");
	//$data_processo = $crud->date('d-m-y', strtotime($_POST['dt_processo']));
    $nu_processo = $crud->escape_string($_POST['nu_processo']);
    $parte_Pro = $crud->escape_string($_POST['parte_Pro']);
    $parte_contra = $crud->escape_string($_POST['parte_contra']);
    $area_judicial = $crud->escape_string($_POST['area_judicial']);
    $nm_acao = $crud->escape_string($_POST['nm_acao']);
    $nm_oficio = $crud->escape_string(isset($_POST['nm_oficio'])? $_POST['nm_oficio'] : "");
	$nm_denominacao = $crud->escape_string(isset($_POST['nm_denominacao'])? $_POST['nm_denominacao'] : "");
    $vl_causa = $crud->escape_string(isset($_POST['vl_causa'])? $_POST['vl_causa'] : "");
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
        // $result = $crud->execute("INSERT INTO tb_processo(dt_processo,parte_Pro,nu_processo,parte_contra,id_area_judicial,
		// id_acao_judicial,st_processo,nm_oficio,nm_denominacao, vl_causa) 
		 // VALUES('$data_processo', $parte_Pro,'$nu_processo',$parte_contra,$area_judicial,$nm_acao,1,
		        // '$nm_oficio','$nm_denominacao','$vl_causa')");
		
        $result = $crud->execute("call processo_inserir ('$data_processo', '$parte_Pro','$nu_processo', '$parte_contra', 
														'$area_judicial','$nm_acao', 1, '$nm_oficio',
														'$nm_denominacao','$vl_causa', '$nm_advogado','$ds_assunto','$ds_posicao','$ds_fase') ");			
        
        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='index2.php'>View Result</a>";
        //header("location:http://localhost:8080/juridico/editarProcesso.php?o=manpro");
		
        echo "<script type='text/javascript'>alert(\"Processo Atualizado.\");
              window.location = 'editarProcesso.php?o=manpro';
              </script>";
    }
}
?>
</body>
</html>