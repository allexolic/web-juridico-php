<?php require_once 'includes/header.php'; ?>

<?php 
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM tb_usuario";// WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

//$connect->close();
?>
<html>
<head>
    <title>Gerenciar Usuário</title>
<script>
function usuarios(){
    var x = document.getElementById('mySelect').value;
    var z = x.split("|");
	
    document.getElementById("user_id").value =  z[0];
	document.getElementById("nm_usuario").value =  z[1];
    document.getElementById("ds_senha").value =  z[2];
	
		
}
</script>	
<script>
function redirect(){
   
   alert("Usuário Atualizado.");   
   window.location=document.location.href;
   
}
</script>
<script>
  $(document).ready(function(){
	  
	  $('#fl_advogado').change(function(){
	    
		$("#nu_oab").prop("disabled",!$(this).is(':checked'));
	
			if (!this.checked){
				$("#nu_oab").val('');
			}
	});
  });
  </script>	



</head>
 
<body>
	
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Página Inicial</a></li>		  
		  <li class="active">Gerenciar Usuário</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Atualizar Usuário</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

                <form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Atualizar Senha</legend>
                        

						
						<div class="changePasswordMessages"></div>
						<!-- -->
						<div class="form-group">
					    <label for="cd_usuario" class="col-sm-2 control-label">Usuário</label>
					    <div class="col-sm-10">						
						<select class="form-control" name="cd_usuario" onChange="usuarios()" id="mySelect" required />
							<option value="">Selecione</option>
							
							<?php
							$sql = "Select user_Id, nm_usuario, ds_senha
  							          from tb_usuario";
							$result = $connect->query($sql);
								
								while($row = $result->fetch_array()){
									echo "<option value='".$row[0].'|'.$row[1].'|'.$row[2]."'>".$row[1]."</option>";
									
								}
							?>
						</select>	
					    </div>
					    </div>						
						<!-- -->
						
						<div class="form-group">
					    <label for="ds_senha" class="col-sm-2 control-label">Senha Atual</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="ds_senha" name="ds_senha" placeholder="Senha Atual">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="nds_senha" class="col-sm-2 control-label">Nova Senha</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="nds_senha" name="nds_senha" placeholder="Nova Senha">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cds_senha" class="col-sm-2 control-label">Confirma Senha</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="cds_senha" name="cds_senha" placeholder="Confirma Senha">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	
							<input type="hidden" name="user_id" id="user_id" /> 
							
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Salvar </button>
					      
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->
</body>
</html>

<script src="custom/js/setting.js"></script>
<?php require_once 'includes/footer.php'; ?>				