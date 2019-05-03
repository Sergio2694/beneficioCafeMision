	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Beneficio Café Misión</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active_facturas;?>"><a href="facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Entrega de Productos<span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $active_productos;?>"><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i>Productos</a></li>

		<li class="<?php echo $active_clientes;?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
		<li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
    <!--
    <li class="<?php echo $active_abono;?>"><a href="abono.php"><i  class='glyphicon glyphicon-eur'></i> Abonos</a></li>
  -->
    <li class="<?php echo $active_inventario;?>"><a href="inventario.php"><i class='glyphicon glyphicon-question-sign'></i>Tostado</a></li>

		<li class="<?php if(isset($active_perfil)){echo $active_perfil;}?>"><a href="perfil.php"><i  class='glyphicon glyphicon-cog'></i> Configuración</a></li>
    <!--
    <li class="<?php echo $active_perfil;?>"><a href="FullCalendar/index.php"><i  class='glyphicon glyphicon-list-alt'></i> Calendario</a></li>
-->
       </ul>
      <ul class="nav navbar-nav navbar-right">
    <!-- 
    <li class="<?php echo $active_productos;?>"><a href="VerProductos.php"><i class='glyphicon glyphicon-question-sign'></i>Información</a></li>
    -->
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>