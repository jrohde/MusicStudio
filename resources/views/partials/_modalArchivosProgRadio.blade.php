<!--INICIO MODAL ARCHIVOS-->
<div class="modal fade modalArchivosProgRadio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-body">
      			<div class="row">
        			<div class="col-md-4">
        				{{Form::label('image', 'Imagen Programa:', ['class' => 'space-form'])}}
						{{Form::file('image',null, ['class' => 'form-control'])}}
        			</div>
        			<div class="col-md-4">
        				
        			</div>
        			<div class="col-md-4">
        			</div>
        		</div>
        		<div class="row" style="margin-top: 35px">
        			<div class="col-md-4">
        				<div class="panel panel-success">
						  	<div class="panel-heading">
						   		<h3 class="panel-title">Fotos cargadas</h3>
						  	</div>
						 	<div class="panel-body">
						    	<div class="row">
						    		<div class="col-md-8">
						    			
						    		</div>
						    		<div class="col-md-4">
						    			<button type="submit" class="btn btn-danger btn-small"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						    		</div>
						    	</div>
						  	</div>
						</div>
        			</div>
        			<div class="col-md-4">
        				<div class="panel panel-success">
						  	<div class="panel-heading">
						   		<h3 class="panel-title">Videos cargados</h3>
						  	</div>
						 	<div class="panel-body">
						    	<div class="row">
						    		<div class="col-md-8">
						    			<img src="#" class="img-responsive" style="width:120px">
						    		</div>
						    		<div class="col-md-4">
						    			<button type="submit" class="btn btn-danger btn-small"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						    		</div>
						    	</div>
						  	</div>
						</div>
        			</div>
        			<div class="col-md-4">
        				<div class="panel panel-success">
						  	<div class="panel-heading">
						   		<h3 class="panel-title">Historial cargado</h3>
						  	</div>
						 	<div class="panel-body">
						    	<div class="row" style="margin-top: 15px">
						    		<div class="col-md-8">
						    			<div class="embed-responsive embed-responsive-4by3" style="padding-bottom: 50%">
							                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/PFPh5PL2c8Y" frameborder="0" allowfullscreen></iframe>
							            </div>
						    		</div>
						    		<div class="col-md-4">
						    			<button type="submit" class="btn btn-danger btn-small"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						    		</div>
						    	</div>
						  	</div>
						</div>
        			</div>
        		</div>
      		</div>
      		 <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
    	</div>
  	</div>
</div>