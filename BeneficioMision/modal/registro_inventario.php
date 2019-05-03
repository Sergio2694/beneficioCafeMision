	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoInvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Crear inventario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Fecha de Compra</label>
				<div class="col-sm-8">
				  <input type="date" class="form-control" id="nombre" name="nombre" placeholder="Fecha de la compra" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="Descripción" class="col-sm-3 control-label">Proveedor</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="Descripcion" name="Descripcion" placeholder="Proveedor" required maxlength="255" ></textarea>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="casa_Comercial" class="col-sm-3 control-label">Tiempo</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="casa_Comercial" name="casa_Comercial" placeholder="Tiempo" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="IA" class="col-sm-3 control-label">Kg Oro</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="IA" name="IA" placeholder="Kg Oro" required>
				</div>
			  </div>


			  <div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Rend</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="precio" name="precio" placeholder="Rend" title="Ingresa sólo números." maxlength="8">
				</div>
			  </div>

			 <div class="form-group">
				<label for="unidad" class="col-sm-3 control-label">Kg Tostado</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="unidad" name="unidad" placeholder="Kg Tostado" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			 
			  
			  <div class="form-group">
				<label for="fecha" class="col-sm-3 control-label">Observación</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Observación" required>
				</div>
			  </div>
			 
			</div>	

		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>