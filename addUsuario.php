<?php require_once 'includes/header.php'; ?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Usuários</li>
  <li class="active">
   
  		Adicionar Usuário
 
  </li>
</ol>
<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
 
	 Adicionar Usuário 
 
</h4>


<html>
<head>
    <title>Adiciona Usuário</title>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  
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
    
 
 <div class="panel panel-default">
 	<div class="panel-heading">

 
  		<i class="glyphicon glyphicon-plus-sign"></i>	Adicionar Usuário

 

	</div> <!--/panel-->	
	
	<div class="panel-body">
    <form class="form-horizontal" action="addUsuarioControl.php" method="post" name="cadUsuarioForm" id="cadUsuarioForm">
	<!--
        <div class="form-group">
		    <label for="parte_Pro" class="col-sm-2 control-label">Cliente</label>
            <div class="col-sm-10">
			<input type="text" class="form-control" name="parte_Pro" />
        </div>
		-->

		
		 <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Descrição do Usuário</th>
			  		
			  		</tr>
			  	</thead>
			  	<tbody>
		</table>		
		
		<div class="col-md-6">
        <div class="form-group">
            <label for="nm_usuario" class="col-sm-3 control-label">Nome</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nm_usuario" name="nm_usuario" required/>
			<!--<input type="text" class="form-control" name="nm_usuario" /> -->
		</div>
		</div>
		
		
		        <div class="form-group">
                 <label for="cd_usuario" class="col-sm-3 control-label">Login</label>
					<div class="col-sm-9">
                            <input type="text" class="form-control" id="cd_usuario" name="cd_usuario" required/>
				</div>
		      </div>
		
		
		
		
				  <div class="form-group">
				    <label for="ds_senha" class="col-sm-3 control-label">Senha</label>
				    <div class="col-sm-9">
				      <input type="password" class="form-control" id="ds_senha" name="ds_senha" required/>
				       
				    </div>
	            </div>
				 <div class="form-group">
				    <label for="ds_senha_confirma" class="col-sm-3 control-label">Confirma Senha</label>
				    <div class="col-sm-9">
				      <input type="password" class="form-control" id="ds_senha_confirma" name="ds_senha_confirma" required/>
				       
				    </div>
	            </div>
		      </div>
			  
				<div class="col-md-6">
				  <div class="form-group">
				    <label for="id_acesso" class="col-sm-3 control-label">Perfil de Acesso</label>
				    <div class="col-sm-9">
			         
						<select class="form-control" name="id_acesso" required>
							<option value="">Selecione</option>
							<option value="1">Administrador</option>
							<option value="2">Assistente Jurídico</option>
							<option value="3">Advogado</option>
						</select>	
				    </div>
	            </div>
				
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
				      <input type="text" class="form-control" id="nu_oab" name="nu_oab" maxlength="8" disabled="" value="" />
				       
				    </div>
	            </div><!-- fim form-group vl_causa-->
				 <div class="form-group">
				    <label for="dt_atualizacao" class="col-sm-3 control-label">Atualização</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="dt_atualizacao" name="dt_atualizacao" readonly/>
				       
				    </div>
	            </div>	<!-- fim form-group dt_encerramento-->			
		</div>
           <div class="form-group submitButtonFooter">
		    <div class="col-sm-offset-2 col-sm-10">
           
           <!--<input type="submit" class= "btn btn-default" name="Submit" value="Salvar"> -->
		   <button type="submit" name="Submit" class="btn btn-success">
		   <i class="glyphicon glyphicon-ok-sign"></i>Salvar</button>
		   <button type="reset" class="btn btn-default" onclick="limparProcesso()">
		   <i class="glyphicon glyphicon-erase"></i>Limpar</button>
            
            </div>
		</div>	
	</div>	
</div>	
    </form>
</body>
</html>
<?php require_once 'includes/footer.php'; ?>