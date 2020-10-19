<?php require_once 'includes/header.php'; ?>
<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Processos</li>
  <li class="active">
  	<?php if($_GET['o'] == 'add') { ?>
  		Adicionar Processo
		<?php } else if($_GET['o'] == 'manpro') { ?>
			Gerenciar Processo
		<?php } // /else manage order ?>
  </li>
</ol>
<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php if($_GET['o'] == 'add') {
		echo "Adicionar Processo";
	} else if($_GET['o'] == 'manpro') { 
		echo "Gerenciar Processo";
	} else if($_GET['o'] == 'editPro') { 
		echo "Editar Processo";
	}
	?>	
</h4>
<html>
<head>
    <title>Adiciona Processo</title>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
  $( function() {
    $( "#datepicker" ).datepicker( {dateFormat: 'dd/mm/yy'});
  } );
  </script>	

  <script language="JavaScript" type="text/javascript">
	function maskData(dt_processo){
		var dt_processo = dt_processo.value;
		if(dt_processo.length == 2){
			
			dt_processo = dt_processo + '/';
			document.forms[0].dt_processo.value = dt_processo;
		return true;
		}
		if(dt_processo.length == 5){
			dt_processo = dt_processo + '/';
			document.forms[0].dt_processo.value = dt_processo;
			return true;
		}
	}
  </script>  
 
  
	
</head>
 
<body>
    
 
 <div class="panel panel-default">
 	<div class="panel-heading">

		<?php if($_GET['o'] == 'add') { ?>
  		<i class="glyphicon glyphicon-plus-sign"></i>	Adicionar Processo
		<?php } else if($_GET['o'] == 'manpro') { ?>
			<i class="glyphicon glyphicon-edit"></i> Gerenciar Processo
		<?php } else if($_GET['o'] == 'editPro') { ?>
			<i class="glyphicon glyphicon-edit"></i> Editar Processo
		<?php } ?>

	</div> <!--/panel-->	
	
	<div class="panel-body">
    <form class="form-horizontal" action="add.php" method="post" name="cadProcessoForm" id="cadProcessoForm">
	<!--
        <div class="form-group">
		    <label for="parte_Pro" class="col-sm-2 control-label">Cliente</label>
            <div class="col-sm-10">
			<input type="text" class="form-control" name="parte_Pro" />
        </div>
		-->
			  <div class="col-md-4">
			  	<div class="form-group">
				    <label for="dt_processo" class="col-sm-5 control-label">Data Processo</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="datepicker" name="dt_processo" onKeyUp="maskData(this);"
                             maxlength="10" autocomplete="off" />
				     
				    </div>
				  </div> <!--/form-group-->	

				  
				  </div> 
				<div class="col-md-8">  
				  <div class="form-group">
				    <label for="nu_processo" class="col-sm-3 control-label">Numero Processo</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="nu_processo" name="nu_processo" required/>
				       
				    </div>
	            </div>
			    
				<div class="form-group">
				    <label for="ds_posicao" class="col-sm-3 control-label">Posição Processual</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="ds_posicao" name="ds_posicao" required/>
				       
				    </div>
	            </div>

				
			  </div>
   
	 
   
        <div class="form-group">
            <label for="parte_Pro" class="col-sm-2 control-label">Cliente</label>
            <div class="col-sm-7">
			<select type="text" class="form-control" name="parte_Pro" required/>
				<option value="">Selecione</option>
					<?php
					$sql = "Select id_parte, nm_parte from tb_parte where parte_status = 1 and parte_active=1";
					$result = $connect->query($sql);
						
						while($row = $result->fetch_array()){
							echo "<option value='".$row[0]."'>".$row[1]."</option>";
						}
					?>
			</select>
		</div>
		</div>
        <div class="form-group">
            <label for="parte_contra" class="col-sm-2 control-label">Parte Contra</label>
            <div class="col-sm-7">
			<select type="text" class="form-control" name="parte_contra" required/>
				<option value="">Selecione</option>
					<?php
					$sql = "Select id_parte, nm_parte from tb_parte where parte_status = 1 and parte_active=1";
					$result = $connect->query($sql);
						
						while($row = $result->fetch_array()){
							echo "<option value='".$row[0]."'>".$row[1]."</option>";
						}
					?>
			</select>
			<!--<input type="text" class="form-control" name="parte_contra" /> -->
		    </div>
		</div>
		
		 <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Descrição do Processo</th>
			  		
			  		</tr>
			  	</thead>
			  	<tbody>
		</table>		
		
		<div class="col-md-6">
        <div class="form-group">
            <label for="area_judicial" class="col-sm-3 control-label">Área Judicial</label>
            <div class="col-sm-9">
			<select class="form-control" name="area_judicial" required>
				<option value="">Selecione</option>
				<option value="1">Cível</option>
				<option value="2">Trabalhista</option>
				<option value="3">Tributário</option>
			</select>	
			<!--<input type="text" class="form-control" name="area_judicial" /> -->
		</div>
		</div>
		
		
		        <div class="form-group">
                 <label for="nm_acao" class="col-sm-3 control-label">Ação Judicial</label>
					<div class="col-sm-9">
					<select type="text" class="form-control" name="nm_acao" required/>
						<option value="">Selecione</option>
							<?php
							$sql = "Select id_acao, nm_acao from tb_acao where cd_status = 1 and acao_active=1";
							$result = $connect->query($sql);
								
								while($row = $result->fetch_array()){
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								}
							?>
					</select>
				</div>
		      </div>
		
		
		
		
				  <div class="form-group">
				    <label for="nm_oficio" class="col-sm-3 control-label">Ofício de Registro</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nm_oficio" name="nm_oficio"/>
				       
				    </div>
	            </div>
				 <div class="form-group">
				    <label for="nm_denominacao" class="col-sm-3 control-label">Denominação</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nm_denominacao" name="nm_denominacao"/>
				       
				    </div>
	            </div>
		      </div>
			  
				<div class="col-md-6">
				  <div class="form-group">
				    <label for="nm_advogado" class="col-sm-3 control-label">Advogado Cliente</label>
				    <div class="col-sm-9">
			         
					<select type="text" class="form-control" name="nm_advogado" required/>
						<option value="">Selecione</option>
							<?php
							$sql = "Select user_id, nm_usuario From tb_usuario where fl_advogado = 1";
							$result = $connect->query($sql);
								
								while($row = $result->fetch_array()){
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								}
							?>
					</select>
				       
				    </div>
	            </div>
				 <div class="form-group">
				    <label for="ds_assunto" class="col-sm-3 control-label">Assunto</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="ds_assunto" name="ds_assunto"/>
				       
				    </div>
	            </div>
				 <div class="form-group">
				    <label for="vl_causa" class="col-sm-3 control-label">Valor Causa</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="vl_causa" name="vl_causa"/>
				       
				    </div>
	            </div><!-- fim form-group vl_causa-->
				 <div class="form-group">
				    <label for="dt_encerramento" class="col-sm-3 control-label">Data Encerramento</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="dt_encerramento" name="dt_encerramento" readonly/>
				       
				    </div>
	            </div>	<!-- fim form-group dt_encerramento-->	

				<div class="form-group">
				    <label for="ds_fase" class="col-sm-3 control-label">Fase Processual</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="ds_fase" name="ds_fase" required/>
				       
				    </div>
	            </div>				
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

<script src="custom/js/processo.js"></script>

<?php require_once 'includes/footer.php'; ?>