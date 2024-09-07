<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="./ccs/estilo.css">
    <link rel="stylesheet" type="text/css" href="./librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="./librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="./librerias/select2/css/select2.css">
	<link rel="stylesheet" type="text/css" href="./librerias/datatable/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="./librerias/datatable/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <title>Comprobante de Egreso</title>


    <?php
require_once "../php/conexion.php";
$connect=conexion(); 

?>
 </head>

 <?php
		
$idEgreso=$_POST['id15'];

?>
</head>
<body>

<div  class="oriented">

Asociación Junta Administradora del Acueducto San Roque <br>
Nit. 900668200-9 <br>
Morales Cauca

</div>
<br>
<div class="container">
<div class="title">
    COMPROBANTE DE EGRESO GENERAL N. <?php echo $idEgreso; ?>
    </div>
    <br>
    <?php
			$consulta=("SELECT Descripcion, Valor, Fecha,EntidadPagada, ReciboCaja from egresos 
			WHERE idEgreso ='".$idEgreso."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

$var1 = $row['Descripcion'];
$var2=$row['Valor'];
$var3 = $row['Fecha'];
$var4=$row['EntidadPagada'];
$var5 = $row['ReciboCaja'];

}
                      ?>
     <?php $hoy=date("Y-m-d");?>
    

    

    <div class="row mb-3">
    <div class="col-md-4 themed-grid-col"><div class="title2">FECHA: <?php echo $var3;?> </div>
    
    </div>
    <div class="col-md-4 themed-grid-col"><div class="title2">Codigo del Comporbante: <?php echo $var5;?></div></div>

    <div class="col-md-4 themed-grid-col"><div class="title2">Entidad a la que se le paga: <?php echo $var4;?> </div></div>
    
  </div>

  <br>

  <div class="row mb-3">
    <div class="col-md-8 themed-grid-col"><div class="title2">Descripción del Egreso: <?php echo $var1;?></div></div>
    <div class="col-md-4 themed-grid-col">Valor:$ <?php echo $var2;?> </div>
  </div>


  <div class="row mb-3">
    <div class="col-sm-6 col-lg-8 themed-grid-col">FIRMA ACEPTACIÓN:_____________________________________________</div>
    <div class="col-6 col-lg-4 themed-grid-col">Firma Tesoreria Acueducto:______________________</div>
  </div>


  <div>
      NOTA: Recuerde anexar a este comprobante una copia de la factura y/o cuenta de cobro por parte de la entidad a quien se le paga. 

</div>
<div> Fecha impresión: <?php echo $hoy; ?></div>
<div> Sistema de Información Acueducto San Roque V.3</div>
</div>

 
</body>
</html>