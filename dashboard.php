

<?php 

require_once 'includes/header.php'; 

?>



<b><?php echo $_SESSION['nm_usuario']; ?></b>

<?php    
    
	$advogado = $_SESSION['userId'];
	
$sql = "SELECT * FROM tb_Processo WHERE st_processo = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM tb_Andamento WHERE tp_Andamento = 2 and id_advogado = '$advogado' ";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$AndamentoSql = "SELECT * FROM tb_Andamento";
$AndamentoQuery = $connect->query($AndamentoSql);
$countAndamento = $AndamentoQuery->num_rows;


$totalAndamentos = $countAndamento;



$totalRevenue = "0";
while ($AndamentoTotal = $AndamentoQuery->fetch_assoc()) {
	$totalRevenue += $AndamentoTotal['id_andamento'];
}

$lowStockSql = "SELECT * FROM tb_Processo WHERE st_processo <> 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$connect->close();

?>

<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>


<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
    <link rel="stylesheet" href="assests/typicons/typicons.min.css">


<div class="row">
	
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="editarProcesso.php?o=manprocativo" style="text-decoration:none;color:black;">
					Total Processos Ativos
					<span class="badge pull pull-right"><?php echo $countProduct; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->

		<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="editarAudiencia.php?o=manpro" style="text-decoration:none;color:black;">
					Total Audiências
					<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		</div> <!--/col-md-4-->

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="editarProcesso.php?o=manprocenc" style="text-decoration:none;color:black;">
					Processos Encerrados
					<span class="badge pull pull-right"><?php echo $countLowStock; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->

	<div class="col-md-4">
		<div class="card">
		  <div class="cardHeader">
		    <h1><?php echo date('d'); ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		  </div>
		</div> 
		<br/>

		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php if($totalAndamentos) {
		    	echo $totalAndamentos;
		    	} else {
		    		echo '0';
		    		} ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p> <i class="glyphicon glyphicon-folder-close"></i> Total de Andamentos</p>
		  </div>
		</div> 

	</div>

	<div class="col-md-8">
		<div class="panel panel-info">
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Calendário</div>
			<div class="panel-body">
				<div id="calendar"></div>
			</div>	
		</div>
		
	</div>

	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/main.min.js"></script>


<script type="text/javascript">
/*	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title',
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


	});*/
	
</script>

<?php require_once 'includes/footer.php'; ?>