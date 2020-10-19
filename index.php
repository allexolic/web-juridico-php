﻿<?php 
require_once 'php_action/db_connect.php';

session_start();



if(isset($_SESSION['userId']) ) {
	header('location: dashboard.php');	
}

$errors = array();

if($_POST) {		

	$username = $_POST['cd_usuario'];
	$password = $_POST['ds_senha'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Preencha o campo usuário.";
		} 

		if($password == "") {
			$errors[] = "Preencha o campo senha.";
		}
	} else {
		$sql = "SELECT * FROM tb_usuario WHERE cd_usuario = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM tb_usuario WHERE cd_usuario = '$username' AND ds_senha = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];
                $nm_usuario = $value['nm_usuario'];
				$id_acesso = $value['id_acesso'];
				
				// set session
				$_SESSION['userId'] = $user_id;
                $_SESSION['nm_usuario'] = $nm_usuario;
				$_SESSION['id_acesso'] = $id_acesso;
				
				header('location: dashboard.php');	
			} else{
				
				$errors[] = "Usuários e/ou senha inválidos.";
			} // /else
		} else {		
			$errors[] = "Usuário inexistente.";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema Jurídico</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">	

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">LOGIN</h3>
					</div>
					<div class="panel-body">

						<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
							  <div class="form-group">
									<label for="cd_usuario" class="col-sm-2 control-label">Usuário</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="cd_usuario" name="cd_usuario" 
									  placeholder="Usuário" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label for="ds_senha" class="col-sm-2 control-label">Senha</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" id="ds_senha" name="ds_senha"
									  placeholder="Senha" autocomplete="off" />
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Login</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
</body>
</html>







	