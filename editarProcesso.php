<?php
//including the database connection file
include_once("classes/Crud.php");

 if($_GET['o'] == 'add') { 
// add processo
	echo "<div class='div-request div-hide'>add</div>";
} else if($_GET['o'] == 'manpro') { 
	echo "<div class='div-request div-hide'>manord</div>";
} else if($_GET['o'] == 'manprocativo') { 
	echo "<div class='div-request div-hide'>manprocativo</div>";	
} else if($_GET['o'] == 'manprocenc') { 
	echo "<div class='div-request div-hide'>manprocenc</div>";	
} else if($_GET['o'] == 'editPro') { 
	echo "<div class='div-request div-hide'>editOrd</div>";
} // /else manage processo


$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT id_processo, nu_processo,partepro,area_judicial,nm_acao, st_processo, dt_encerramento, fl_andamento_ativo
            FROM processo_listar ORDER BY id_processo DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;

$procAtivo = "SELECT id_processo, nu_processo,partepro,area_judicial,nm_acao, st_processo, dt_encerramento, fl_andamento_ativo
            FROM processo_listar WHERE st_processo = 1 ORDER BY id_processo DESC";
$result2 = $crud->getData($procAtivo);

?>
 <?php require_once 'includes/header.php'; ?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Página Inicial</a></li>
  <li>Processos</li>
  <li class="active">
  	<?php if($_GET['o'] == 'add') { ?>
  		Adicionar Processo
		<?php } else if($_GET['o'] == 'manpro') { ?>
			Gerenciar Processo
		<?php } // /else manage processo ?>
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
    <title>Gerenciar Processo</title>

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
 <script>
    $(function() {
      $('[data-toggle="datepicker"]').datepicker( {dateFormat: 'dd/mm/yy'});
  } );
  </script> 

</head>

<body>
	<div class="panel panel-default">

	 	<div class="panel-heading">

		<?php if($_GET['o'] == 'add') { ?>
  		<i class="glyphicon glyphicon-plus-sign"></i>	Adicionar Processo
		<?php } else if($_GET['o'] == 'manpro') { ?>
			<i class="glyphicon glyphicon-edit"></i> Gerenciar Processo
        <?php } else if($_GET['o'] == 'manprocativo') { ?>
			<i class="glyphicon glyphicon-edit"></i> Processos Ativos	
        <?php } else if($_GET['o'] == 'manprocenc') { ?>
			<i class="glyphicon glyphicon-edit"></i> Processos Encerrados			
		<?php } else if($_GET['o'] == 'editPro') { ?>
			<i class="glyphicon glyphicon-edit"></i> Editar Processo
		<?php } ?>

	</div> <!--/panel-->	
	
		<div class="panel-body">

		<?php if($_GET['o'] == 'manpro') { 
			// add processo
			?>	

    <table class="display" id="manageOrderTable" style="width:100%">
    <thead>
    <tr bgcolor='#CCCCCC'>
	    <td>ID</td>
        <td>Numero Processo</td>
        <td>Cliente</td>
        <td>Área Judicial</td>
		<td>Ação Judicial</td>
		<td>Status Processo</td>
        <td>Gerenciar</td>
    </tr>
	</thead>
   <!--
   <//?php 
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
     
        echo "<td>".$res['nu_processo']."</td>";
        echo "<td>".$res['partepro']."</td>";
        echo "<td>".$res['area_judicial']."</td>";  
        echo "<td>".$res['nm_acao']."</td>"; 
        echo "<td>".$res['st_processo']."</td>";  
       // echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    
	-->
		</table>
		<?php } else if($_GET['o'] == 'manprocativo') { 
			// add processo
			?>		
			
			<table class="display" id="manageProcAtivoTable" style="width:100%">
			<thead>
			<tr bgcolor='#CCCCCC'>
				<td>ID</td>
				<td>Numero Processo</td>
				<td>Cliente</td>
				<td>Área Judicial</td>
				<td>Ação Judicial</td>
				<td>Status Processo</td>
				<td>Gerenciar</td>
			</tr>
			</thead>

			
		</table>	
		
		<?php } else if($_GET['o'] == 'manprocenc') { 
			// add processo
			?>		
			
			<table class="display" id="manageProcAtivoTable" style="width:100%">
			<thead>
			<tr bgcolor='#CCCCCC'>
				<td>ID</td>
				<td>Numero Processo</td>
				<td>Cliente</td>
				<td>Área Judicial</td>
				<td>Ação Judicial</td>
				<td>Status Processo</td>
				<td>Gerenciar</td>
			</tr>
			</thead>

			
		</table>		
		
		
  		<?php 
		// /else manage processo
		} else if($_GET['o'] == 'editOrd') {
			// get processo
			?>    

<div class="success-messages"></div> <!--/success-messages-->

<form class="form-horizontal" method="POST" action="editpro.php" id="editOrderForm">

    <?php $idprocesso = $_GET['i'];

    $sql = "SELECT id_processo,dt_processo, nu_processo, partecon, parte_contra, partepro,
                   parte_Pro, area_judicial,id_area_judicial, nm_acao, id_acao_judicial, st_processo,
                   nm_oficio, nm_denominacao, vl_causa ,id_advogado, nm_usuario, ds_assunto, dt_encerramento, fl_andamento_ativo,
				   ds_posicao_cli, ds_fase
           FROM processo_listar 	
          WHERE id_Processo = {$idprocesso}";

      $result = $connect->query($sql);
      $data = $result->fetch_row();				
    ?>
    
    <div class="col-md-4">
     <div class="form-group">
       <label for="dt_processo" class="col-sm-5 control-label">Data Processo</label>
       <div class="col-sm-6">
         <input type="text" class="form-control" id="datepicker" name="dt_processo" onKeyUp="maskData(this);"
                autocomplete="off" maxlength="10"
               value="<?php echo $data[1] ?>" />
       </div>
      </div> <!--/form-group-->
    </div>

    <div class="col-md-8">    
    <div class="form-group">
      <label for="nu_processo" class="col-sm-3 control-label">Numero Processo</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="nu_processo" name="nu_processo" placeholder="Numero Processo" 
               autocomplete="off" value="<?php echo $data[2] ?>" required/>
      </div>
    </div> <!--/form-group-->
	 
	 <div class="form-group">
		 <label for="ds_posicao" class="col-sm-3 control-label">Posição Processual</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="ds_posicao" name="ds_posicao" value="<?php echo $data[20] ?>" required/>
			       
				    </div>
	 </div>
    </div>

        <div class="form-group">
            <label for="parte_Pro" class="col-sm-2 control-label">Cliente</label>
            <div class="col-sm-7">
			<select type="text" class="form-control" name="parte_Pro" id="parte_Pro" required/>
				<option value="">Selecione</option>
					<?php
					$sql = "Select id_parte, nm_parte from tb_parte where parte_status = 1 and parte_active=1";
					$result = $connect->query($sql);
						
						while($row = $result->fetch_array()){
                            $selected = "";
			  								if($row['id_parte'] == $data[6]) {
			  									$selected = "selected";
			  								} else {
			  									$selected = "";
                                              }
                                              
							echo "<option value='".$row[0]."' ".$selected.">".$row[1]."</option>";
						}
					?>
			</select>
		</div>
		</div>		

        <div class="form-group">
            <label for="parte_contra" class="col-sm-2 control-label">Parte Contra</label>
            <div class="col-sm-7">
			<select type="text" class="form-control" name="parte_contra" id="parte_contra" required/>
				<option value="">Selecione</option>
					<?php
					$sql = "Select id_parte, nm_parte from tb_parte where parte_status = 1 and parte_active=1";
					$result = $connect->query($sql);
						
						while($row = $result->fetch_array()){
                            $selected = "";
                                        if($row['id_parte'] == $data[4]){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
							echo "<option value='".$row[0]."' ".$selected.">".$row[1]."</option>";
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
			<select class="form-control" name="area_judicial" id="area_judicial" required>
				<option value="">Selecione</option>
				<option value="1" <?php if($data[8] == 1){
                    echo "selected";
                } ?> 
                 >Cível</option>

				<option value="2" <?php if($data[8] == 2){
                    echo "selected";
                } ?> 
                >Trabalhista</option>
				<option value="3" <?php if($data[8] == 3){
                    echo "selected";
                } ?>
                >Tributário</option>
			</select>	
			<!--<input type="text" class="form-control" name="area_judicial" /> -->
		</div>
		</div>
		
		
		        <div class="form-group">
                 <label for="nm_acao" class="col-sm-3 control-label">Ação Judicial</label>
					<div class="col-sm-9">
					<select type="text" class="form-control" name="nm_acao" id="nm_acao" required/>
						<option value="">Selecione</option>
							<?php
							$sql = "Select id_acao, nm_acao from tb_acao where cd_status = 1 and acao_active=1";
							$result = $connect->query($sql);
								
								while($row = $result->fetch_array()){
                                    $selected = "";

                                            if($row['id_acao'] == $data[10]){
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
				    <label for="nm_oficio" class="col-sm-3 control-label">Ofício de Registro</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nm_oficio" name="nm_oficio"
                             placeholder="Ofício de Registro" autocomplete="off" value="<?php echo $data[12] ?>" />
				       
				    </div>
	            </div>
				 <div class="form-group">
				    <label for="nm_denominacao" class="col-sm-3 control-label">Denominação</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nm_denominacao" name="nm_denominacao"
                             placeholder="Denominação" autocomplete="off" value="<?php echo $data[13] ?>" />
				       
				    </div>
	            </div>
		      </div>
			  
				<div class="col-md-6">
				  <div class="form-group">
				    <label for="nm_advogado" class="col-sm-3 control-label">Advogado Cliente</label>
				    <div class="col-sm-9">
						
						<select type="text" class="form-control" name="nm_advogado" id="nm_advogado" required/>
							<option value="">Selecione</option>
								<?php
								$sql = "Select user_id, nm_usuario From tb_usuario where fl_advogado = 1";
								$result = $connect->query($sql);
									
									while($row = $result->fetch_array()){
										$selected = "";
													if($row['user_id'] == $data[15]){
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
				    <label for="ds_assunto" class="col-sm-3 control-label">Assunto</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="ds_assunto" name="ds_assunto"
					         placeholder="Assunto" autocomplete="off" value="<?php echo $data[17] ?>"/>
				       
				    </div>
	            </div>
				 <div class="form-group">
				    <label for="vl_causa" class="col-sm-3 control-label">Valor Causa</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="vl_causa" name="vl_causa"
                      placeholder="Valor Causa" autocomplete="off" value="<?php echo $data[14] ?>"/>
				       
				    </div>
	            </div>
				 <div class="form-group">
				    <label for="dt_encerramento" class="col-sm-3 control-label">Data Encerramento</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="dt_encerramento" name="dt_encerramento" 
					  autocomplete="off" value="<?php echo $data[18] ?>" readonly/>
				       
				    </div>
	            </div>	
				<div class="form-group">
				    <label for="ds_fase" class="col-sm-3 control-label">Fase Processual</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="ds_fase" name="ds_fase" value="<?php echo $data[21] ?>" required/>
				       
				    </div>
	            </div>					
		</div>


    <div class="form-group editButtonFooter">
      <div class="col-sm-offset-3 col-sm-10">

      <input type="hidden" name="idprocesso" id="idprocesso" value="<?php echo $_GET['i']; ?>" />

      <button type="submit" name="update" value="update" id="editOrderBtn" data-loading-text="Loading..." 
              <?php if ($data[11] == '2'){ ?> disabled <?php   } ?> 
			  class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Atualizar Processo</button>
 
      <button type="submit" name="reativar" value="reativar" id="editOrderBtn" data-loading-text="Loading..." 
              <?php if ($data[11] == '1'){ ?> disabled <?php   } ?> 
			  class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Reativar Processo</button>
			  
      <button type="submit" name="voltar" value="voltar" id="editOrderBtn" data-loading-text="Loading..." 
              class="btn btn-primary">
              <i class="glyphicon glyphicon-ok-sign"></i> Voltar</button>     
       

 <!------------------------------------------------------------------------------------------------->


 
			  
      </div>
    </div>
	  </form>
	  
	      <div class="form-group editButtonFooter">
          <div class="col-sm-offset-3 col-sm-10">
	  
	  	   <button class="btn btn-warning" data-toggle="modal" data-target="#modalForm" <?php if ($data[11] == '2'){ ?> disabled <?php   } ?> >
		   
			  <i class="glyphicon glyphicon-lock"></i> Encerrar Processo</button>
		
			  
         </div>

         </div>
		
	 <div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Fechar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Encerrar Processo</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
				
                <form role="form" class="form-horizontal" action="editpro.php" name="cadProcessoForm" method="post">
				   
				   <?php $id_processo = $_GET['i'];

						$sql = "SELECT id_processo,nu_processo, dt_encerramento, fl_andamento_ativo
								FROM processo_listar where id_Processo ={$id_processo} ";

						  $result = $connect->query($sql);
						  $data = $result->fetch_row();				
						?>
						
                    <input type="hidden" name="fl_andamento_ativo" id="fl_andamento_ativo" value="<?php echo $data[3] ?>" />
						
				 
                    <div class="form-group">
                        <label for="dt_encerramento" class="col-sm-3 control-label">Data Encerramento</label>
						<div class="col-sm-9">
						
											
                        <input type="date" class="form-control" id="datepicker" name="dt_encerramento"
						         maxlength="10" placeholder="dd/mm/yyyy" autocomplete="off" required/>
					    
						
						</div>
					</div>
				 
					
                    <div class="form-group">
                        <label for="motivo" class="col-sm-3 control-label">Motivo Encerramento</label>
						<div class="col-sm-9">
                        <input type="text" class="form-control" name="motivo" placeholder="Motivo encerramento" required/>
						</div>
                    </div>
					
					
									
						<div class="modal-footer">
						    <input type="hidden" name="id_processo" id="id_processo" value="<?php echo $_GET['i']; ?>" />
							 
							  
							<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary submitBtn" name="Encerrar" value="Submit">Encerrar</button>
						</div>
				 
				</form>
            </div>				
		</div>
    </div> 		
</div>	
	
	
	

  
  

         <!------------------------------------------------------------------------------------------------->
 
  
  <?php
} // /get processo else  ?>


</div> <!--/panel-->	
</div> <!--/panel-->	




	</div>	
</div>	
</body>
</html>

    <script src="custom/js/editarProcesso.js"></script>

	<?php require_once 'includes/footer.php'; ?>