<?php
include "Conexion.php";
$con=@mysqli_connect("127.0.0.1","root","","cafemision");
$query=mysqli_query($con,"select (SELECT clientes.nombre_cliente FROM clientes WHERE clientes.id_cliente = facturas.id_cliente) AS PRODUCTO, facturas.id_cliente AS cliente,  facturas.fecha_factura, facturas.numero_factura ,
    (SELECT detalle_factura.cantidad from detalle_factura where detalle_factura.id_producto = 2 AND detalle_factura.numero_factura = facturas.numero_factura) AS CAJUELA, 
      (SELECT detalle_factura.cantidad from detalle_factura where detalle_factura.id_producto = 3 AND detalle_factura.numero_factura = facturas.numero_factura) AS DHL,
      (SELECT detalle_factura.cantidad from detalle_factura where detalle_factura.id_producto = 4 AND detalle_factura.numero_factura = facturas.numero_factura) AS CUARTILLO, 
      (SELECT  (detalle_factura.cantidad*10) from detalle_factura where detalle_factura.id_producto = 3 AND detalle_factura.numero_factura = facturas.numero_factura ) AS DHLCAJ, 
    (select DAY(facturas.fecha_factura))  AS DIA, (select MONTH(facturas.fecha_factura))  AS MES, 
    (select YEAR(facturas.fecha_factura))  AS ANO,  (select DAY(NOW()))  AS DIA_AC, (select MONTH(NOW()))  AS MES_AC, 
    (select YEAR(NOW()))  AS ANO_AC,(SELECT IF(DIA>15, 1,0)) AS DIA_CLAVE,  (select DAY(NOW()))  AS DIA_ACTUAL, 
    (SELECT IF(DIA_ACTUAL>15, 1,0)) AS DIA_CLAVE2,  (SELECT IF(DIA_CLAVE=DIA_CLAVE2, 1,0)) AS MOSTRAR, (SELECT IF(MES=MES_AC, 1,0)) AS MOSTRAR_MES, (SELECT IF(ANO=ANO_AC, 1,0)) AS MOSTRAR_ANIO
      FROM detalle_factura INNER JOIN facturas ON detalle_factura.numero_factura = facturas.numero_factura GROUP BY numero_factura");
$clientes = array();
$n=0;
while($r=$query->fetch_object()){ $clientes[]=$r; $n++;
 
}

?>
<!DOCTYPE html>
<html>
<head>

<title>Generar PDF con el reporte quincenal</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jspdf/dist/jspdf.min.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>

<meta charset="utf-8">
</head>
<body style="background-image: url('../img/b3.png');">
    <br>
    <div class="container" style="text-align: center;">
      <div class="panel panel-default">

      <div class="panel-body">

      <div class="row">
          <div class="col-md-12">

            <h1>Crear un PDF con una Tabla</h1>
            <br>
          </div>

          <div class="col-md-12">
            <p><strong>Continuar con la descarga...</strong></p>
            <button id="GenerarMysql" class="btn btn-default">Descargar Reporte</button>
            <br>
          </div>

          <div class="col-md-4"></div>

      </div>

      </div>

      </div><!-- /.Cierra-default-panel -->
    </div><!-- /.container-fluid -->



<script>
$("#GenerarMysql").click(function(){
  var pdf = new jsPDF('l', 'mm', [337, 210]);
  pdf.text(20,20,"Mostrando una Tabla con PHP y MySQL");


 
 var columns = ["PRODUCTOR", "FECHA", "RECIBO", "DOBLE HECTOLTS", "DHLCAJ", "CAJUELAS", "CUARTOS", "TOTAL", "DHL"];
  var data = [
<?php foreach($clientes as $c):
    

    if ($c->cliente = 1) {
      $DHL = "PROPIO DHL";
    }else{
      $DHL = "COMPRADO DHL";

    }



    if (is_null($c->DHL)){
        $c->DHL = 0;

    }
    if (is_null($c->DHLCAJ)){
        $c->DHLCAJ = 0;

    }
    if (is_null($c->CAJUELA)){
        $c->CAJUELA = 0;

    }

    if (is_null($c->CUARTILLO)){
        $c->CUARTILLO = 0;

    }

    if ($c->MOSTRAR == 1 AND $c->MOSTRAR_MES == 1 and $c->MOSTRAR_ANIO == 1) {    

    $TOTAL = $c->DHLCAJ + $c->CAJUELA + $c->CUARTILLO;
  ?>



 ["<?php echo $c->PRODUCTO; ?>", "<?php echo $c->fecha_factura; ?>", "<?php echo $c->numero_factura; ?>", "<?php echo $c->DHL; ?>", "<?php echo $c->DHLCAJ; ?>", "<?php echo $c->CAJUELA; ?>",  "<?php echo $c->CUARTILLO; ?>", "<?php echo $TOTAL; ?>", "<?php echo $DHL; ?>",],
<?php } ?>  
<?php endforeach; ?>  
  ];

  pdf.autoTable(columns,data,
    { margin:{ top: 40,  }}
  );



  pdf.save('MiTabla.pdf');

});
</script>

</body>
</html>