<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
		}else if (empty($_POST['mod_nombre'])) {
           $errors[] = "nombre vacíos";
        }else if (empty($_POST['mod_descripcion'])) {
           $errors[] = "Descripcion vacío";
        } else if (empty($_POST['mod_casa_comercial'])){
			$errors[] = "Casa comercial vacío";
		} else if (empty($_POST['mod_IA'])){
			$errors[] = "Ingrediente Activo del producto vacío";
		} else if (empty($_POST['mod_precio'])){
			$errors[] = "Precio del producto vacío";
		} else if (empty($_POST['mod_unidad'])){
			$errors[] = "Unidad vacía";
		} else if (empty($_POST['mod_fecha'])){
			$errors[] = "Fecha vacío";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_nombre']) &&
			!empty($_POST['mod_descripcion']) &&
			!empty($_POST['mod_casa_comercial']) &&
			!empty($_POST['mod_IA']) &&
			!empty($_POST['mod_precio']) &&
			!empty($_POST['mod_unidad']) &&
			!empty($_POST['mod_fecha'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion parse_str(str)a conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		//$id=intval($_POST['mod_id']);

		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$descripcion_Producto=mysqli_real_escape_string($con,(strip_tags($_POST["mod_descripcion"],ENT_QUOTES)));
		$casa_comercial=mysqli_real_escape_string($con,(strip_tags($_POST["mod_casa_comercial"],ENT_QUOTES)));
		$IA=mysqli_real_escape_string($con,(strip_tags($_POST["mod_IA"],ENT_QUOTES)));
		$precio=intval($_POST['mod_precio']);
		$unidad=intval($_POST['mod_unidad']);
		$uso_tecnico="";
		$finca=3;
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["mod_fecha"],ENT_QUOTES)));


		$id_producto=$_POST['mod_id'];

		$sql="UPDATE inventario SET fecha_De_Compra='".$nombre."', proveedor='".$descripcion_Producto."', tiempo='".$casa_comercial."',
		kg_Oro='".$IA."', Rend='".$precio."',
		kg_Tostado='".$unidad."', Observación='".$fecha."'
		 WHERE id_Inventario='".$id_producto."'";

		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "inventario ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
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