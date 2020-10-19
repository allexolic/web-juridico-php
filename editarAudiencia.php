<?php


//including the database connection file
include_once("classes/Crud.php");

 if($_GET['o'] == 'add') { 
// add order
	echo "<div class='div-request div-hide'>add</div>";
} else if($_GET['o'] == 'manpro') { 
	echo "<div class='div-request div-hide'>manord</div>";
} else if($_GET['o'] == 'editPro') { 
	echo "<div class='div-request div-hide'>editOrd</div>";
} // /else manage order


$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT id_andamento,id_processo,nu_processo, dt_andamento, tp_andamento,ds_andamento, st_andamento
            FROM andamento_listar";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;

?>
 <?php require_once 'includes/header.php'; ?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Página Inicial</a></li>
  <li>Andamentos</li>
  <li class="active">
  	<?php if($_GET['o'] == 'add') { ?>
  		Adicionar Andamento
		<?php } else if($_GET['o'] == 'manpro') { ?>
			Gerenciar Andamento
		<?php } // /else manage order ?>
  </li>
</ol>
<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php if($_GET['o'] == 'add') {
		echo "Adicionar Andamento";
	} else if($_GET['o'] == 'manpro') { 
		echo "Gerenciar Andamento";
	} else if($_GET['o'] == 'editPro') { 
		echo "Editar Andamento";
	}
	?>	
</h4> 
 
<html>
<head>    
    <title>Gerenciar Andamento</title>
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

		<?php if($_GET['o'] == 'add') { ?>
  		<i class="glyphicon glyphicon-plus-sign"></i>	Adicionar Andamento
		<?php } else if($_GET['o'] == 'manpro') { ?>
			<i class="glyphicon glyphicon-edit"></i> Gerenciar Andamento
		<?php } else if($_GET['o'] == 'editPro') { ?>
			<i class="glyphicon glyphicon-edit"></i> Editar Andamento
		<?php } ?>

	</div> <!--/panel-->	
	
		<div class="panel-body">

		<?php if($_GET['o'] == 'manpro') { 
			// add order

			?>	
			<?php $id_advogado = $_SESSION['userId']; ?>

	<div class="remove-messages"></div>
		<!--div class="div-action pull pull-right" style="padding-bottom:20px;">
		<button class="btn btn-default button1" data-toggle="modal" data-target="#modalForm"> 
		<i class="glyphicon glyphicon-plus-sign"></i> Adicionar Andamento </button>
	</div--> <!-- /div-action -->		
<!----------------------------------------------------------------------------->    

<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" data-target="#addAndamento">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Fechar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Adicionar Andamento</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" action="addAndamento.php" name="cadAndamentoForm" method="post">
				   
				   <?php $id_advogado = $_SESSION['userId'];

						$sql = "SELECT id_andamento,id_processo,nu_processo, dt_andamento, tp_andamento,ds_andamento, st_andamento
								FROM andamento_listar where id_advogado = {$id_advogado} ";

						  $result = $connect->query($sql);
						  $data = $result->fetch_row();				
						?>

					
                    <div class="form-group">
                        <label for="dt_andamento">Data Andamento</label>
                        <input type="text" class="form-control" name="dt_andamento" id="datepicker" placeholder="Data Andamento" 
						autocomplete="off" required onKeyUp="maskData(this);" maxlength="10" />
                    </div>
                    <div class="form-group">
                        <label for="tp_andamento">Tipo Andameno</label>
                        <!--input type="text" class="form-control" name="tp_andamento" placeholder="Tipo Andamento" required/-->
						<select class="form-control" name="tp_andamento" required>
									<option value="">Selecione</option>
									<option value="1">Andamento Comum</option>
									<option value="2">Audiência</option>
									<option value="3">Petição Inicial</option>
						</select>	
						
                    </div>
                    <div class="form-group">
                        <label for="id_advogado">Responsável Andamento</label>
                        <select type="text" class="form-control" name="id_advogado" required/>
				        <option value="">Selecione</option>
							<?php
							$sql = "Select user_id, nm_usuario from tb_usuario where fl_advogado = 1";
							$result = $connect->query($sql);
								
								while($row = $result->fetch_array()){
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								}
							?>
			            </select>
                    </div>					
                    <div class="form-group">
                        <label for="ds_andamento">Descrição</label>
                        <textarea class="form-control" name="ds_andamento" placeholder="" required></textarea>
                    </div>
					
											<!-- Modal Footer -->
						<div class="modal-footer">
						      <input type="hidden" name="id_processo" id="id_processo" value="<?php echo $data[1]; ?>" />
							  
							<button type="reset" class="btn btn-default" data-dismiss="modal">Fechar</button>
							<button type="submit" class="btn btn-primary submitBtn" name="Submit" value="Submit">Salvar</button>
						</div>
                </form>
            </div>
            

			
			
			
        </div>
    </div>
</div>


	
<!----------------------------------------------------------------------------->    
    <?php $id_advogado = $_SESSION['userId'];

    $sql = "SELECT id_andamento,id_processo,nu_processo, dt_andamento, tp_andamento,ds_andamento, st_andamento
            FROM andamento_listar where id_advogado ={$id_advogado} and tp_andamento = 2 ";

      $result = $connect->query($sql);
      $data = $result->fetch_row();				
    ?>

	<!--h4><span class="label label-success"> <b>Processo Nº: </b> <?php echo $data[2] ?> </span> </h4> <br--> 
<!----------------------------------------------------------------------------->    
	
	
    <table class="table" id="GerenciarAndamentoTable1">
    <thead>
    <tr>
        <th>ID</th>	  
        <th>Data</th>
        <th>Tipo Andamento</th>				
        <th>Descrição Audiência</th>
		<th>Status Audiência</th>
        <th style="width:15%;">Gerenciar</th>
    </tr>
	</thead>
	
	
    <?php 
	

 
	 
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
        echo "<tr>"; 
        echo "<td>".$res['id_andamento']."</td>";		
        echo "<td>".$res['dt_andamento']."</td>";
		echo "<td>".$res['tp_andamento']."</td>";
        echo mb_strimwidth("<td>".$res['ds_andamento']."</td>",0,50,"..."); 
		
		if($res['st_andamento'] == 1)
		echo "<td><label class='label label-success'>Em Andamento</label></td>";
	       Else
			   if($res['st_andamento'] == 2)
		echo "<td><label class='label label-danger'>Encerrado</label></td>";  	
	   else
		   echo "<td>".$res['st_andamento']."</td>"; 
        //echo "<td>".$res['st_andamento']."</td>"; 
		 //if($res['st_andamento']==1){ echo  "<td>"  .["Ativo"]. "</td>"; }
       
	   
	   // echo "<td> <div class='btn-group'>
	   // <a href=\"atualizarAudiencia.php?id=$res[id_andamento]\">Editar</a> | <a href=\"delAndamento.php?id=$res[id_andamento]\" onClick=\"return confirm('Confirma a exclusão do andamento?')\">Remover</a></td> </div>";     
		

       echo "<td>
	   <div class='btn-group'>
	  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
	    Ação <span class='caret'></span>
	  </button>
	    <ul class='dropdown-menu'>
	    <li><a href='atualizarAudiencia.php?id=$res[id_andamento]' id='editOrderModalBtn'> <i class='glyphicon glyphicon-edit'></i> Editar</a></li>
	    
       
	   </ul>
		</td>
	   </div>";
			

    }
	


    ?>
    </table>

	
		      <button type="button" id="voltar" name="voltar" value="Voltar" data-loading-text="Loading..." 
              class="btn btn-primary" onclick="window.location.href='editarProcesso.php?o=manpro'">
              <i class="glyphicon glyphicon-ok-sign"></i> Voltar</button>    
  

			  
  		<?php 
		// /else manage order
		} else if($_GET['o'] == 'editOrd') {
			// get order
			?>    

<div class="success-messages"></div> <!--/success-messages-->


  <?php
} // /get order else  ?>


</div> <!--/panel-->	
</div> <!--/panel-->	




	</div>	
</div>	


</body>
</html>

    <script src="custom/js/editarAndamento.js"></script>

	<?php require_once 'includes/footer.php'; ?>