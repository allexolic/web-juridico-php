<html>
<head>
    <title>Remover Andamento</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");
 
$crud = new Crud();
$validation = new Validation();


 
if(isset($_POST['Submit'])) {    

	$id_andamento = $crud->escape_string($_POST['id_andamento']);    

	

	

	
    $msg = $validation->check_empty($_POST, array('id_andamento'));
	
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
	
	    
		
        $result = $crud->execute("DELETE tb_andamento where id_andamento = '$id_andamento' ");									

        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='index2.php'>View Result</a>";
         
          echo "<script type='text/javascript'>alert(\"Andamento Excluído.\");
              window.location = 'http://localhost:8080/juridico/editarAudiencia.php?o=manpro&i='+ '$id_processo';
              </script>";
		
    
}



}

// if(isset($_POST['voltar'])) {    
    // header("location:http://localhost:8080/juridico/editarProcesso.php?o=manpro");
// }

?>
</body>
</html>