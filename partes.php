<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Página Inicial</a></li>		  
		  <li class="active">Partes</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gerenciar partes</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addParteModel"> <i class="glyphicon glyphicon-plus-sign"></i> Adicionar Parte </button>
				</div> <!-- /div-action -->				
				
				<table class="display" id="manageParteTable" style="width:100%">
					<thead>
						<tr>							
							<th>Nome Parte</th>
							<th>CPF/CNPJ</th>
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

<div class="modal fade" id="addParteModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitParteForm" action="php_action/addParte.php" method="POST">

		  <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Adicionar Parte</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-parte-messages"></div>

	        <div class="form-group">
	        	<label for="nm_parte" class="col-sm-3 control-label">Nome Parte: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nm_parte" placeholder="Nome Parte" 
					         name="nm_parte" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	   
		    
			<div class="form-group">
	        	<label for="nu_cpf_cnpj" class="col-sm-3 control-label">CPF/CNPJ: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nu_cpf_cnpj" 
							placeholder="CPF" name="nu_cpf_cnpj" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	  
			
	        <div class="form-group">
	        	<label for="parte_active" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="parte_active" name="parte_active" required>
				      	<option value="">~~Selecione~~</option>
				      	<option value="1">Ativo</option>
				      	<option value="2">Inativo</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createParteBtn" data-loading-text="Loading..." autocomplete="off">Salvar</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- editar parte -->
<div class="modal fade" id="editParteModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editParteForm" action="php_action/editarParte.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Partes</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-parte-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-parte-result">
		      	<div class="form-group">
		        	<label for="editParteName" class="col-sm-3 control-label">Nome Parte: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editParteName" placeholder="nome parte" 
						   name="editParteName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	   

			<div class="form-group">
	        	<label for="editNu_cpf_cnpj" class="col-sm-3 control-label">CPF/CNPJ: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editNu_cpf_cnpj" 
							placeholder="" name="editNu_cpf_cnpj" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	  
      	        
		        <div class="form-group">
		        	<label for="editParteStatus" class="col-sm-3 control-label">Status: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <select class="form-control" id="editParteStatus" name="editParteStatus">
					      	<option value="">~~Selecione~~</option>
					      	<option value="1">Ativo</option>
					      	<option value="2">Inativo</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /editar parte result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editParteFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
	        
	        <button type="submit" class="btn btn-success" id="editParteBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit parte -->

<!-- remover parte -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remover Parte</h4>
      </div>
      <div class="modal-body">
        <p>Confirma exclusão da parte?</p>
      </div>
      <div class="modal-footer removeParteFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fechar</button>
        <button type="button" class="btn btn-primary" id="removeParteBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove Parte -->

<script src="custom/js/editarParte.js"></script>

<?php require_once 'includes/footer.php'; ?>