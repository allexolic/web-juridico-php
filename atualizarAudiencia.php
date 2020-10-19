<?php
//including the database connection file
include_once("classes/Crud.php");



$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT id_andamento,id_processo,nu_processo, dt_andamento, tp_andamento,ds_andamento, st_andamento
              FROM andamento_listar ORDER BY id_andamento DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;
?>
 <?php require_once 'includes/header.php'; ?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Andamentos</li>
  <li class="active">
  	
			Gerenciar Andamento

  </li>
</ol>
<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	
		 Gerenciar Andamento 
	
</h4> 
 
<html>

<head>    
    <title>Gerenciar Andamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

  <script>
  $( function() {
    $( "#datepicker" ).datepicker( {dateFormat: 'dd/mm/yy'});
  } );
  </script>	

  <script language="JavaScript" type="text/javascript">
	function maskData(dt_andamento){
		var dt_andamento = dt_andamento.value;
		if(dt_andamento.length == 2){
			
			dt_andamento = dt_andamento + '/';
			document.forms[0].dt_andamento.value = dt_andamento;
		return true;
		}
		if(dt_andamento.length == 5){
			dt_andamento = dt_andamento + '/';
			document.forms[0].dt_andamento.value = dt_andamento;
			return true;
		}
	}
  </script>  
	
	
</head>

<body>
	<div class="panel panel-default">

	 	<div class="panel-heading">

 
			<i class="glyphicon glyphicon-edit"></i> Gerenciar Andamento
		 

	</div> <!--/panel-->	
	
		<div class="panel-body">

	

<div class="success-messages"></div> <!--/success-messages-->

<form class="form-horizontal" method="POST" action="EditAudienciaControl.php" id="editOrderForm">

    <?php $id_andamento = $_GET['id'];

    $sql = "SELECT id_andamento,id_processo,nu_processo, dt_andamento, tp_andamento,ds_andamento, st_andamento, id_advogado
              FROM andamento_listar 	
             WHERE id_andamento = {$id_andamento}";

      $result = $connect->query($sql);
      $data = $result->fetch_row();				
    ?>
    
    <div class="col-md-4">
     <div class="form-group">
       <label for="dt_andamento" class="col-sm-5 control-label">Data Andamento</label>
       <div class="col-sm-6">
         <input type="text" class="form-control" id="datepicker" name="dt_andamento" onKeyUp="maskData(this);" 
		        maxlength="10" autocomplete="off" 
               value="<?php echo $data[3] ?>" />
       </div>
      </div> <!--/form-group-->
    </div>

    <div class="col-md-8">    
    <div class="form-group">
      <label for="nu_processo" class="col-sm-3 control-label">Numero Processo</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="nu_processo" name="nu_processo" placeholder="Numero Processo" 
               autocomplete="off" value="<?php echo $data[2] ?>" />
      </div>
    </div> <!--/form-group-->
    </div>

      

        <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Descrição do Andamento</th>
			  		
			  		</tr>
			  	</thead>
			  	<tbody>
		</table>		
		
		<div class="col-md-6">
       	
		
				  <div class="form-group">
				    <label for="tp_andamento" class="col-sm-3 control-label">Tipo Andamento</label>
				    <div class="col-sm-9">
				    
				    
							<select class="form-control" name="tp_andamento" required>
											<option value="">Selecione</option>
											<option value="1" <?php if($data[4] == 'Andamento Comum'){
												echo "selected";
											} ?> 
											 >Andamento Comum</option>

											<option value="2" <?php if($data[4] == 'Audiencia'){
												echo "selected";
											} ?> 
											>Audiencia</option>
											<option value="3" <?php if($data[4] == 'Peticao Inicial'){
												echo "selected";
											} ?>
											>Peticao Inicial</option>
							</select>						
				    </div>
					

	            </div>
				<div class="form-group">
					 <label for="id_advogado" class="col-sm-3 control-label">Advogado Responsável</label>
				    <div class="col-sm-9">
						<select type="text" class="form-control" name="id_advogado" required/>
							<option value="">Selecione</option>
								<?php
								$sql = "Select user_id, nm_usuario From tb_usuario where fl_advogado = 1";
								$result = $connect->query($sql);
									
									while($row = $result->fetch_array()){
										$selected = "";
													if($row['user_id'] == $data[7]){
														$selected = "selected";
													}else{
														$selected = "";
													}
										echo "<option value='".$row[0]."' ".$selected.">".$row[1]."</option>";
									}
								?>
						</select>			       
				    </div>
					</div>
				 <div class="form-group">
				    <label for="ds_andamento" class="col-sm-3 control-label">Descrição</label>
				    <div class="col-sm-9">
				      <textarea type="text" class="form-control" id="ds_andamento" name="ds_andamento"
					            style="width:800px; height:150px;"
                                placeholder="Descrição do andamento" autocomplete="off"><?php echo $data[5] ?></textarea>
				       
				    </div>
	            </div>

			
		      </div>
			  



    <div class="form-group editButtonFooter">
      <div class="col-sm-offset-2 col-sm-10">

      <input type="hidden" name="id_andamento" id="id_andamento" value="<?php echo $_GET['id']; ?>" />
      <input type="hidden" name="id_processo" id="id_processo" value="<?php echo $data[1] ?>" />
	  
      <button type="submit" name="update" value="update" id="editOrderBtn" data-loading-text="Loading..." 
              class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Atualizar Andamento</button>
 
      <button type="submit" name="finaliza" value="finaliza" id="editOrderBtn" data-loading-text="Loading..." 
              class="btn btn-warning"><i class="glyphicon glyphicon-lock"></i> Encerrar Andamento</button>
			  
      <button type="submit" name="voltar" value="voltar" id="editOrderBtn" data-loading-text="Loading..." 
              class="btn btn-primary">
              <i class="glyphicon glyphicon-ok-sign"></i> Voltar</button>       
      </div>
    </div>
  </form>



</div> <!--/panel-->	
</div> <!--/panel-->	




	</div>	
</div>	
</body>
</html>

    <script src="custom/js/editarProcesso.js"></script>

	<?php require_once 'includes/footer.php'; ?>