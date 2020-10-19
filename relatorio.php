


 <?php require_once 'includes/header.php'; ?>

 
<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Relatórios</li>
  <li class="active">
  	
  		Relatório Processo

  </li>
</ol>
<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php 
		echo "Relatório Processo";

	?>	
</h4> 
 
<html>
<head>    
    <title>Relatório Processo</title>


</head>

<body>
	<div class="panel panel-default">

	 	<div class="panel-heading">

  		<i class="glyphicon glyphicon-plus-sign"></i>	Relatório Processo		

	</div> <!--/panel-->	
	
		<div class="panel-body">

		
	<form class="form-horizontal" action="RelatorioProcesso.php" method="post" id="getOrderReportForm">
		
				  <div class="form-group">
				    <label for="st_processo" class="col-sm-2 control-label">Listar por Status</label>
				    <div class="col-xs-3">
				      <!--input type="text" class="form-control" id="st_processo" name="st_processo" placeholder="" /-->
					  <select class="selectpicker form-control" name="st_processo" required>
							<option value="0">Selecione</option>
							<option value="1">Ativo</option>
							<option value="2">Encerrado</option>
							
					  </select>	
				    </div>
				 
				    <label for="nm_cliente" class="col-sm-2 control-label">Listar por Cliente</label>
				    <div class="col-xs-3">
				      <!--input type="text" class="form-control" id="st_processo" name="st_processo" placeholder="" /-->
					  <select class="selectpicker form-control" name="nm_cliente">
							<option value="">Selecione</option>
							<?php 
							      $sql = "Select id_parte, nm_parte from tb_parte where parte_status = 1 and parte_active=1";
								  $result = $connect->query($sql);
											
											while ($row = $result->fetch_array()){
												echo "<option value='".$row[0]."'>".$row[1]."</option>";
											}
							?>
							
					  </select>	
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" name="executar" value="executar" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Executar</button>
				    </div>
				  </div>
				  
				  
				</form>

				
<div class="success-messages"></div> <!--/success-messages-->

  
	   
            

				 
            </div>				
		</div>


</body>
</html>

  



<!--?php require_once 'includes/footer.php'; ?-->

