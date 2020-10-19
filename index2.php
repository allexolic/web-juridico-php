<?php
//including the database connection file
include_once("classes/Crud.php");

 
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM processo_listar ORDER BY id_processo DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;
?>
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
    <title>Gerenciar Processo</title>
	
<script type="text/javascript" language="javascript" src="js/jQuery-1.12.3.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" class="init">    
    $(document).ready(function() {
        $('#ConsultaProcesso').dataTable({
                        "aaSorting": [[ 3, "asc" ]],
            "bPaginate": true,
            "bFilter": true,
            "sType": "brazilian", 
            "aoColumns": [

            { "sType": 'text' },
            { "sType": 'text' },
            { "sType": 'text' },

            null
            ]            
        });
        
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
		<?php } else if($_GET['o'] == 'editPro') { ?>
			<i class="glyphicon glyphicon-edit"></i> Editar Processo
		<?php } ?>

	</div> <!--/panel-->	
	
		<div class="panel-body">

    <table class="table" id="ConsultaProcesso" style="width:100%">
    <thead>
    <tr bgcolor='#CCCCCC'>
        <td>Numero Processo</td>
        <td>Parte cli</td>
        <td>Parte con</td>
		<td>Área Judicial</td>
        <td>Gerenciar</td>
    </tr>
	</thead>
    <?php 
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$res['nu_processo']."</td>";
        echo "<td>".$res['partepro']."</td>";
        echo "<td>".$res['partecon']."</td>";  
        echo "<td>".$res['area_judicial']."</td>";  
       // echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
	</div>	
</div>	
</body>
</html>

    <script type="text/javascript" src="custom/js/processo.js"></script>

	<?php require_once 'includes/footer.php'; ?>