<?php 
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])) {
           $errors[] = "nombre vacíos";
        }else if (empty($_POST['Descripcion'])) {
           $errors[] = "Descripcion vacío";
        } else if (empty($_POST['casa_Comercial'])){
			$errors[] = "Casa comercial vacío";
		} else if ($_POST['IA']==""){
			$errors[] = "Ingrediente Activo del producto vacío";
		} else if ($_POST['precio']==""){
			$errors[] = "Precio del producto vacío";
		} else if (empty($_POST['unidad'])){
			$errors[] = "Unidad vacía";
		} else if (empty($_POST['fecha'])){
			$errors[] = "fecha vacío";
		} else if (
			!empty($_POST['nombre']) &&
			!empty($_POST['Descripcion']) &&
			!empty($_POST['casa_Comercial']) &&
			$_POST['IA']!="" &&
			!empty($_POST['precio']) &&
			!empty($_POST['unidad']) &&
			!empty($_POST['fecha'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$descripcion_Producto=mysqli_real_escape_string($con,(strip_tags($_POST["Descripcion"],ENT_QUOTES)));
		$casa_comercial=mysqli_real_escape_string($con,(strip_tags($_POST["casa_Comercial"],ENT_QUOTES)));
		$IA=mysqli_real_escape_string($con,(strip_tags($_POST["IA"],ENT_QUOTES)));
		$precio=intval($_POST['precio']);
		$unidad=intval($_POST['unidad']);
		$uso_tecnico="";
		$lote=1;
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));

		$sql="INSERT INTO inventario (fecha_De_Compra, proveedor, kg_Oro, kg_Tostado, rend, tiempo, observacion, id_Finca) VALUES ('$nombre','$descripcion_Producto','$IA', '$unidad','$precio','$casa_comercial','$fecha','3')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "El inventario ha sido creado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con).$sql;
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>