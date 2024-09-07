<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="ccs/estilo.css">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="librerias/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
 	 <script src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
	<script src="librerias/select2/js/select2.js"></script>
	<script src="librerias/datatable/jquery.dataTables.min.js"></script>
	<script src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="librerias/datatable/buttons/dataTables.buttons.min.js"></script>
	<script src="librerias/datatable/buttons/jszip.min.js"></script>
	<script src="librerias/datatable/buttons/pdfmake.min.js"></script>
	<script src="librerias/datatable/buttons/vfs_fonts.js"></script>
	<script src="librerias/datatable/buttons/buttons.html5.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <title>Validador de Recaudos</title>
</head>
<body>
<?php
	include("navbar.php");
	?>
<div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5 class="card-title">ASOCIACIÓN JUNTA ADMINISTRADORA DEL ACUEDUCTO SAN ROQUE - MORALES</h5>
    <p class="card-text">Sistema de Información Acueducto San Roque</p>
     </div>
  <div class="card-footer text-muted">
   ESTIMACIÓN DE PRECIOS DE VENTA 
  </div>
</div>
<div class="container">
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">Sección Formulario</a>
      <!-- </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
  </div>
  <div class="card-body">
  <table class="table table-bordered" id="table">
  <thead>
    <tr>
      <th scope="col">Datos Númericos Producto</th>
	  <th scope="col">RESULTADOS PRECIOS </th>
	  
      </tr>
  </thead>
  <tbody>
    <tr >
      <td> <input type="number" class="form-control" id="50mil" placeholder="Cantidad" onFocus="calcular();" onBlur="NoSumar();">Valor del Producto</td>
      <td><input type="text"class="form-control  p-3 mb-2 bg-info text-white font-weight-bold" name="total1" id="total1"   readonly><p class="text-danger">PRECIO DE VENTA CLIENTE</p> </td>
      
    </tr>
    <tr>
	  <td><input type="number" class="form-control" id="20mil" placeholder="Cantidad" onFocus="calcular();" onBlur="NoSumar();">Número de Unidades</td>
	   <td><input type="text"class="form-control" name="total2" id="total2"  readonly> VALOR UNIDAD PRODUCTO</td>
      
     
    </tr>
    <tr >
	  <td><input type="number" class="form-control" id="10mil" placeholder="Cantidad" value="30" onFocus="calcular();" onBlur="NoSumar();">Utilidad en %</td>
	  <td><input type="text"class="form-control" name="total3" id="total3"   readonly> GANANCIA ESTIMADA</td>
	  
	</tr>
	<tr>
		<th scope="row"></th>
		
		<td> <input type="button" value="Limpiar" class="btn btn-success" onclick="limpiar();"> </td>

		
	</tr>

	

	
	
  </tbody>
</table>
</div>






  </div>
</div>







<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields

function calcular(){
      interval = setInterval("Sumar()",1);
}
function Sumar(){

	uno = document.getElementById("50mil").value;
  dos = document.getElementById("20mil").value;
  tres = document.getElementById("10mil").value;
  porce= tres/100;
	val1= document.getElementById("total1").value = (uno / dos)*porce+(uno/dos);
	val2= document.getElementById("total2").value = (uno/dos);
	val3=  document.getElementById("total3").value = ((val1 * dos)-uno);
	

	





}
function NoSumar(){
      clearInterval(interval);
}

function limpiar(){

  document.getElementById('50mil').value = '0';
  document.getElementById('20mil').value = '0';
  document.getElementById('10mil').value = '0';
  document.getElementById('total1').value = '0';
  document.getElementById('total2').value = '0';
  document.getElementById('total3').value = '0';
  

}


</script>
</body>
</html>
    
</body>
</html>