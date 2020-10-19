


<html>
<head>
    <title>Relatório Processo</title>

	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"-->


		
	</head>
 
<body>

<?php

 
  include_once("relatorio.php");

//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");

$valid['success'] = array('success' => false, 'messages' =>array());

$crud = new Crud();
$validation = new Validation();


 
if(isset($_POST['executar'])) {    


	//$result = $crud->execute ("SELECT * FROM tb_processo");
	
	$st_processo =  $_POST['st_processo'];
	$nm_cliente = $_POST['nm_cliente'];
	
	if ($nm_cliente == 0)
		$nm_cliente = "'%%'";
	
	if ($st_processo == 0)
		$st_processo = "1,2";
	
	$query = "SELECT id_processo,nu_processo, dt_processo, st_processo, partepro, nm_acao,dt_encerramento, ds_motivo_encerramento
              FROM processo_listar where st_processo in( $st_processo) and parte_Pro like $nm_cliente";
    $result = $crud->getData($query);
    
 	//echo count($result);
   
   if($st_processo != 2)   { 
	
   $table = '
    
<input type="button" id="btnExport" class="btn btn-success" value="Exportar Excel" />
<input type="button" id="btnExportpdf" class="btn btn-warning" value="Exportar Pdf" />
<br/>
<br/>
<div id="dvData">
	<table border="5" class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0" cellpadding="0" style="width:100%;">
		<thead>
		<tr>
			<th class="table-active" scope="col">Data processo</th>
			<th class="table-active" scope="col">Número processo</th>
			<th class="table-active" scope="col">Cliente</th>
	        <th class="table-active" scope="col">Ação Judicial</th>
		</tr>
		</theadd>
        <tbody id="relatorio">
		<tr>';
		$total = "";
		foreach ($result as $key => $res) {
			$table .= '<tr>
				<td><center>'.$res['dt_processo'].'</center></td>
				<td><center>'.$res['nu_processo'].'</center></td>
				<td><center>'.$res['partepro'].'</center></td>
				<td><center>'.$res['nm_acao'].'</center></td>
			</tr>';	
			
			$total = count($result);
		}
		$table .= '
		</tr>

		<tr>
			<td class="success" colspan="3"><center>Total Processos</center></td>
			<td class="success"><center>'.$total.'</center></td>
		</tr>
		</tbody>
	</table>
	<ul class="pagination pagination-lg" id="pagina"></ul>
   </div>
	';	

	echo $table;
   }else {
	   
	      $table = '
	<input type="button" id="btnExport" class="btn btn-success" value="Exportar Excel" />
	<input type="button" id="btnExportpdf" class="btn btn-warning" value="Exportar Pdf" />

	<br/>
	<br/>
	<div id="dvData">
	<table border="1" class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0" cellpadding="0" style="width:100%;">
		<thead>
		<tr>
			<th class="table-active" scope="col">Data processo</th>
			<th class="table-active" scope="col">Número processo</th>
			<th class="table-active" scope="col">Cliente</th>
	        <th class="table-active" scope="col">Ação Judicial</th>
			<th class="table-active" scope="col">Data encerramento</th>
			<th class="table-active" scope="col">Motivo encerramento</th>
		</tr>
        </theadd>
        <tbody id="relatorio">
		<tr>';
		$total = "";
		foreach ($result as $key => $res) {
			$table .= '<tr>
				<td><center>'.$res['dt_processo'].'</center></td>
				<td><center>'.$res['nu_processo'].'</center></td>
				<td><center>'.$res['partepro'].'</center></td>
				<td><center>'.$res['nm_acao'].'</center></td>
				<td><center>'.$res['dt_encerramento'].'</center></td>
				<td><center>'.$res['ds_motivo_encerramento'].'</center></td>
			</tr>';	
			
			$total = count($result);
		}
		$table .= '
		</tr>

		<tr>
			<td class="success" colspan="5"><center>Total Processos</center></td>
			<td class="success"><center>'.$total.'</center></td>
		</tr>
		 
		</tbody>
	</table>
	<ul class="pagination pagination-lg" id="pagina"></ul>
    </div>
	';	

	echo $table;
	   
   }
}





?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assests/jquery.table2excel.js"></script>

<!-- 
$("input").click(function(){
  $("#btnExport").table2excel({
    // exclude CSS class
    //exclude: ".noExl",
    name: "Worksheet Name",
    filename: "RelatorioProcesso" //do not include extension
  });
});
-->

 
<script>
$("#btnExport").click(function(e) {
  var a = document.createElement('a');
  var data_type = 'data:application/vnd.ms-excel';
  var table_div = document.getElementById('dvData');
  var table_html = table_div.outerHTML.replace(/ /g, '%20');
  a.href = data_type + ', ' + table_html;
  a.download = 'Relatorio.xls';
  a.click();
  e.preventDefault();
});
</script>


		<script type="text/javascript" charset="utf-8">
		$.fn.pageMe = function(opts){
			var $this = this,
				defaults = {
					perPage: 7,
					showPrevNext: false,
					hidePageNumbers: false
				},
				settings = $.extend(defaults, opts);
			
			var listElement = $this;
			var perPage = settings.perPage; 
			var children = listElement.children();
			var pager = $('.pager');
			
			if (typeof settings.childSelector!="undefined") {
				children = listElement.find(settings.childSelector);
			}
			
			if (typeof settings.pagerSelector!="undefined") {
				pager = $(settings.pagerSelector);
			}
			
			var numItems = children.size();
			var numPages = Math.ceil(numItems/perPage);

			pager.data("curr",0);
			
			if (settings.showPrevNext){
				$('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
			}
			
			var curr = 0;
			while(numPages > curr && (settings.hidePageNumbers==false)){
				$('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
				curr++;
			}
			
			if (settings.showPrevNext){
				$('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
			}
			
			pager.find('.page_link:first').addClass('active');
			pager.find('.prev_link').hide();
			if (numPages<=1) {
				pager.find('.next_link').hide();
			}
			  pager.children().eq(1).addClass("active");
			
			children.hide();
			children.slice(0, perPage).show();
			
			pager.find('li .page_link').click(function(){
				var clickedPage = $(this).html().valueOf()-1;
				goTo(clickedPage,perPage);
				return false;
			});
			pager.find('li .prev_link').click(function(){
				previous();
				return false;
			});
			pager.find('li .next_link').click(function(){
				next();
				return false;
			});
			
			function previous(){
				var goToPage = parseInt(pager.data("curr")) - 1;
				goTo(goToPage);
			}
			 
			function next(){
				goToPage = parseInt(pager.data("curr")) + 1;
				goTo(goToPage);
			}
			
			function goTo(page){
				var startAt = page * perPage,
					endOn = startAt + perPage;
				
				children.css('display','none').slice(startAt, endOn).show();
				
				if (page>=1) {
					pager.find('.prev_link').show();
				}
				else {
					pager.find('.prev_link').hide();
				}
				
				if (page<(numPages-1)) {
					pager.find('.next_link').show();
				}
				else {
					pager.find('.next_link').hide();
				}
				
				pager.data("curr",page);
				pager.children().removeClass("active");
				pager.children().eq(page+1).addClass("active");
			
			}
		};
			$(document).ready(function() 
			{   
			     
				$("#relatorio").pageMe({pagerSelector:'#pagina',showPrevNext:true,hidePageNumbers:false,perPage:10});
				
				 
			} 
		); 
		</script>
		


</body>
</html>

<?php require_once 'includes/footer.php'; ?>