<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Pagina Inicial</a></li>		  
		  <li class="active">Ações Judiciais</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gerenciar Ações</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addAcoesJudiciaisModalBtn" data-target="#addAcoesJudiciaisModal"> <i class="glyphicon glyphicon-plus-sign"></i> Adicionar ações</button>
				</div> <!-- /div-action -->				
				
				<table class="display" id="manageAcoesJudiciaisTable" style="width:100%">
					<thead>
						<tr>							
							<th>Nome Ação</th>
							<th>Status</th>
							<th style="width:15%;">Gerenciar</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add acoes judiciais -->
<div class="modal fade" id="addAcoesJudiciaisModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitAcaoJudicialForm" action="php_action/addAcoesJudiciais.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Adicionar Ações</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-acaoJudicial-messages"></div>

	        <div class="form-group">
	        	<label for="acaoJudicialName" class="col-sm-4 control-label">Nome Ação: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="acaoJudicialName" placeholder="nome ação" name="acaoJudicialName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<label for="acaoJudicialStatus" class="col-sm-4 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <select class="form-control" id="acaoJudicialStatus" name="acaoJudicialStatus">
				      	<option value="">~~Selecione~~</option>
				      	<option value="1">Ativo</option>
				      	<option value="2">Inativo</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
	        
	        <button type="submit" class="btn btn-primary" id="addAcoesJudiciaisBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add acoes judiciais -->


<!-- edit acoes judiciais-->
<div class="modal fade" id="editAcaoJudicialModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editAcaoJudicialForm" action="php_action/editarAcaoJudicial.php" method="POST">
	          
		  
		  <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Ações</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-acaoJudicial-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-acaoJudicial-result">
		      	<div class="form-group">
		        	<label for="editAcaoJudicialName" class="col-sm-4 control-label">Nome Ação: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editAcaoJudicialName" placeholder="nome ação" name="editAcaoJudicialName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editAcaoJudicialStatus" class="col-sm-4 control-label">Status: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <select class="form-control" id="editAcaoJudicialStatus" name="editAcaoJudicialStatus">
					      	<option value="">~~Selecione~~</option>
					      	<option value="1">Ativo</option>
					      	<option value="2">Inativo</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	 
		      </div>         	        
		      <!-- /edit Acao judicial result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editAcaoJudicialFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
	        
	        <button type="submit" class="btn btn-success" id="editAcaoJudicialBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /acao judicial -->

<!-- acao judicial -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeAcaoJudicialModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remover ação</h4>
      </div>
      <div class="modal-body">
        <p>Confirma a exclusão do registro ?</p>
      </div>
      <div class="modal-footer removeAcaoJudicialFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
        <button type="button" class="btn btn-primary" id="removeAcaoJudicialBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /acao judicial -->


<script src="custom/js/editarAcoes.js"></script>

<?php require_once 'includes/footer.php'; ?>