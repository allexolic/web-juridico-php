<html>
<head>
    <title>Adiciona Andamento</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");
 
$crud = new Crud();
$validation = new Validation();


 
if(isset($_POST['Submit'])) {    

	$id_processo = $crud->escape_string($_POST['id_processo']);    
	$dt_andamento = $crud->escape_string($_POST['dt_andamento']);
    $tp_andamento = $crud->escape_string($_POST['tp_andamento']);
    $ds_andamento = $crud->escape_string($_POST['ds_andamento']);
    $id_advogado = $crud->escape_string($_POST['id_advogado']);
	

	

	
    $msg = $validation->check_empty($_POST, array('dt_andamento', 'tp_andamento', 'ds_andamento'));
	
    //$check_age = $validation->is_age_valid($_POST['parte_Pro']);
    //$check_email = $validation->is_email_valid($_POST['parte_contra']);
    
    // checking empty fields
    if($msg != null) {
        echo $msg;        
        //link to the previous page
		
		

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }   

        // if all the fields are filled (not empty) 
        
else{
	
	    
		
        $result = $crud->execute("call andamento_inserir ('$id_processo' ,'$dt_andamento', '$tp_andamento','$ds_andamento','$id_advogado') ");									

        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='index2.php'>View Result</a>";
         
          echo "<script type='text/javascript'>alert(\"Andamento cadastrado.\");
              window.location = 'editarAndamento.php?o=manpro&i='+ '$id_processo';
              </script>";
		
    
}



}

// if(isset($_POST['voltar'])) {    
    // header("location:http://localhost:8080/juridico/editarProcesso.php?o=manpro");
// }

?>
</body>
</html>