<html>
<head>
    <title>Adiciona Usu�rio</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");
 
$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    
	$nm_usuario = $crud->escape_string($_POST['nm_usuario']);
    $cd_usuario = $crud->escape_string($_POST['cd_usuario']);
    $ds_senha = $crud->escape_string(md5($_POST['ds_senha']));
    $ds_senha_confirma = $crud->escape_string(md5($_POST['ds_senha_confirma']));
	//$fl_advogado = $crud->escape_string($_POST['fl_advogado']);
	$fl_advogado = $crud->escape_string(isset ($_POST['fl_advogado'])? $_POST['fl_advogado'] : "");
    
	$nu_oab = $crud->escape_string(isset ($_POST['nu_oab'])? $_POST['nu_oab'] : "");
	//$nu_oab = $crud->escape_string($_POST['nu_oab']);
	
	$id_acesso = $crud->escape_string($_POST['id_acesso']);

	
    	if($fl_advogado == true){
				$fl_advogado = 1;

			}else{
				$fl_advogado = 0;
			}
	

	
    $msg = $validation->check_empty($_POST, array('nm_usuario', 'cd_usuario', 'ds_senha'));
	
    //$check_age = $validation->is_age_valid($_POST['parte_Pro']);
    //$check_email = $validation->is_email_valid($_POST['parte_contra']);
    
    // checking empty fields
    if($msg != null) {
        echo $msg;        
        //link to the previous page
		
		

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }   
    else  if($ds_senha == $ds_senha_confirma) { 
        // if all the fields are filled (not empty) 
        

		
        //insert data to database    
        //$result = $crud->execute("INSERT INTO tb_usuario(nm_usuario,cd_usuario,ds_senha, fl_advogado, nu_oab) 
		//							VALUES('$nm_usuario', '$cd_usuario','$ds_senha',$fl_advogado,'$nu_oab')");
        $result = $crud->execute("call usuario_inserir ('$nm_usuario', '$cd_usuario',
														'$ds_senha', $fl_advogado, 
														'$nu_oab','$id_acesso') ");									

        //display success message
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='index2.php'>View Result</a>";
         
          echo "<script type='text/javascript'>alert(\"Usuário cadastrado.\");
              window.location = 'addUsuario.php';
              </script>";
		
    }else {
            echo  "<script type='text/javascript'>alert(\"Verifique a senha.\");
             window.location = 'addUsuario.php';
              </script>";
		}

}
?>
</body>
</html>