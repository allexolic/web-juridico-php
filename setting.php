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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
<script>
function usuarios(){
    var x = document.getElementById('mySelect').value;
    var z = x.split("|");
	
    document.getElementById("user_id").value =  z[0];
	document.getElementById("nm_usuario").value =  z[2];
    document.getElementById("id_acesso").value =  z[3];
	
	document.getElementById("fl_advogado").value =  z[4];

	document.getElementById("nu_oab").value =  z[5];
	document.getElementById("dt_atualizacao").value =  z[6];		
    
    var adv = document.getElementById("fl_advogado");
		if(adv.value == '1'){
			
			//document.getElementById("fl_advogado").checked = true;
             adv.checked = true;
		}else{
			
			adv.checked = false;
			 
		}
	
    var nome = document.getElementById("nm_usuario");	
		if (nome.value == 'undefined')
			nome.value = '';

    var oab = document.getElementById("nu_oab");	
		if (oab.value == 'undefined')
			oab.value = '';

    var data = document.getElementById("dt_atualizacao");	
		if (data.value == 'undefined')
			data.value = '';		
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

 

				<form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
				
				   
					<fieldset>
						<legend>Login Usuário</legend>

						<div class="changeUsenrameMessages"></div>	
						
						<div class="form-group">
					    <label for="cd_usuario" class="col-sm-2 control-label">Usuário</label>
					    <div class="col-sm-10">						
						<select class="form-control" name="cd_usuario" onChange="usuarios()" id="mySelect" required />
							<option value="">Selecione</option>
							
							<?php
							$sql = "Select user_Id, cd_usuario, nm_usuario, id_acesso, fl_advogado, nu_oab,
							               dt_atualizacao
  							          from tb_usuario";
							$result = $connect->query($sql);
								
								while($row = $result->fetch_array()){
									echo "<option value='".$row[0].'|'.$row[1].'|'.$row[2].'|'.$row[3].'|'.$row[4].'|'.$row[5].'|'.$row[6]."'>".$row[1].' | '.$row[2]."</option>";
									
								}
							?>
						</select>	
						
					    </div>
					    </div>
                        

						
						<legend>Descrição Usuário</legend>

						<div class="changeUsenrameMessages"></div>	
						
                        <div class="col-md-6">
						<div class="form-group">
					    <label for="nm_usuario" class="col-sm-2 control-label">Nome</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="nm_usuario" name="nm_usuario" placeholder="Nome Usuário" 
						         autocomplete="off" required />
					    </div>
					    </div>
						
						<div class="form-group">
					    <label for="id_acesso" class="col-sm-2 control-label">Perfil de Acesso</label>
					    <div class="col-sm-10">
							<select class="form-control" name="id_acesso" id="id_acesso" required>
							<option value="">Selecione</option>
							<option value="1">Administrador</option>
							<option value="2">Assistente Jurídico</option>
							<option value="3">Advogado</option>
							</select>
					    </div>
					    </div>
					  </div>
					  
 
					  
					  <!-- Bloco 2 -->
					  <div class="col-md-6">
						   <div class="form-group">
							<label for="fl_advogado" class="col-sm-3 control-label">É Advogado?</label>
							<div class="col-sm-9">
							<input type="checkbox" class="form-check-input" id="fl_advogado"
							name="fl_advogado" />				       
							</div>
						    </div>
                           
						   <div class="form-group">
							<label for="nu_oab" class="col-sm-3 control-label">Nº OAB</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="nu_oab" name="nu_oab" maxlength="8" value="" />
							   
							</div>
	                       </div>					  
							 <div class="form-group">
								<label for="dt_atualizacao" class="col-sm-3 control-label">Atualização</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" id="dt_atualizacao" name="dt_atualizacao" readonly/>
								   
								</div>
							</div>					  
					  </div><!-- Bloco 2 fim -->
					   
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
						    
					    	<input type="hidden" name="user_id" id="user_id" /> 
							
							 
							
					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn" onclick="redirect()"> 
						  <i class="glyphicon glyphicon-ok-sign"></i> Salvar </button>
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