	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModaInve" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar el Registro</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="nombre_Producto" class="col-sm-3 control-label">Fecha de Compra</label>
				<div class="col-sm-8">
				  	<input type="date" class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Fecha de Compra" required>
					<input type="hidden" name="mod_id" id="mod_id">

				</div>
			  </div>
			  <div class="form-group">
					<label for="descripcion_Producto" class="col-sm-3 control-label">Proveedor</label>
					<div class="col-sm-8">
					<textarea class="form-control" id="mod_descripcion" name="mod_descripcion" placeholder="Proveedor" required maxlength="255" ></textarea>
				</div>
			  </div>
			  
			  	<div class="form-group">
					<label for="casa_Comercial" class="col-sm-3 control-label">Tiempo</label>
					<div class="col-sm-8">
				  		<input type="text" class="form-control" id="mod_casa_comercial" name="mod_casa_comercial" placeholder="Tiempo" required>
					</div>
			  	</div>

			  <div class="form-group">
				<label for="IA" class="col-sm-3 control-label">Kg Oro</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_IA" name="mod_IA" placeholder="Kg Oro" required>
				</div>
			  </div>	

			  <div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Rend</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_precio" name="mod_precio" placeholder="Rend">
				</div>
			  </div>

			 <div class="form-group">
				<label for="unidad" class="col-sm-3 control-label">Kg Tostado</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_unidad" name="mod_unidad" placeholder="Kg Tostado">
				</div>
			  </div>
			 

			
			  <div class="form-group">
				<label for="fecha" class="col-sm-3 control-label">Observación</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_fecha" name="mod_fecha" placeholder="Observación" required>
				</div>
			  </div>
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>