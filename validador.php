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
    VALIDADOR DE RECAUDOS POR DENOMINACIÓN
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
      <th scope="col">Denominación de Dinero</th>
      <th scope="col">cantidad Recibida</th>
	  <th scope="col">Valor Resultante</th>
	  <th scope="col">VALIDACIÓN FINAL TOTALES</th>
      </tr>
  </thead>
  <tbody>
    <tr >
      <th scope="row"><img class="billete" src="img/50mil.jpg" alt="50 Mil pesos" ></th>
      <td><input type="text" class="inputs" id="50mil" placeholder="Cantidad" onFocus="calcular();" onBlur="NoSumar();"></td>
      <td><input type="text"class="form-control" name="total1" id="total1"   readonly></td>
      <td class="table-info">TOTAL RECIBIDO <input type="text"class="form-control" name="total7" id="total7"   readonly> </td>
    </tr>
    <tr>
      <th scope="row"><img class="billete" src="img/20mil.jpg" alt="20 Mil pesos" ></th>
	  <td><input type="text" class="inputs" id="20mil" placeholder="Cantidad" onFocus="calcular();" onBlur="NoSumar();"></td>
	   <td><input type="text"class="form-control" name="total2" id="total2"  readonly></td>
      
      <td class="table-info">TOTAL A PAGAR <input type="text"class="form-control" name="total8" id="total8"  onFocus="calcular();" onBlur="NoSumar();" > </td>
    </tr>
    <tr >
      <th scope="row"><img class="billete" src="img/10Mil.png" alt="10 Mil pesos" ></th>
	  <td><input type="text" class="inputs" id="10mil" placeholder="Cantidad" onFocus="calcular();" onBlur="NoSumar();"></td>
	  <td><input type="text"class="form-control" name="total3" id="total3"   readonly></td>
	  <td class="table-danger">A DEVOLVER O FALTA <input type="text"class="form-control" name="total9" id="total9"   readonly> </td>
	</tr>
	<tr>
		<th scope="row"><img class="billete" src="img/5mil.jpg" alt="5 Mil pesos" ></th>
		<td><input type="text" class="inputs" id="5mil" placeholder="Cantidad"onFocus="calcular();" onBlur="NoSumar();"></td>
		<td><input type="text"class="form-control" name="total4" id="total4"   readonly></td>
		<td> <input type="button" value="Limpiar" class="btn btn-success" onclick="limpiar();"> </td>

		
	</tr>

	<tr>
		<th scope="row"><img class="billete" src="img/2mil.jpg" alt="2 Mil pesos" ></th>
		<td><input type="text" class="inputs" id="2mil" placeholder="Cantidad"onFocus="calcular();" onBlur="NoSumar();"></td>
		<td><input type="text"class="form-control" name="total5" id="total5"   readonly></td>
	</tr>

	<tr>
		<th scope="row"><img class="billete" src="img/1mil.jpg" alt="1 Mil pesos" ></th>
		<td><input type="text" class="inputs" id="1mil" placeholder="Cantidad"onFocus="calcular();" onBlur="NoSumar();"></td>
		<td><input type="text"class="form-control" name="total6" id="total6"   readonly></td>
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
	val1= document.getElementById("total1").value = (uno * 50000);
	dos = document.getElementById("20mil").value;
	val2= document.getElementById("total2").value = (dos * 20000);
	tres = document.getElementById("10mil").value;
	val3=  document.getElementById("total3").value = (tres * 10000);
	cuatro = document.getElementById("5mil").value;
	val4= document.getElementById("total4").value = (cuatro * 5000);
	cinco = document.getElementById("2mil").value;
	val5= document.getElementById("total5").value = (cinco * 2000);
	seis = document.getElementById("1mil").value;
	val6= document.getElementById("total6").value = (seis * 1000);

	sumatoria= document.getElementById("total7").value =(val1+val2+val3+val4+val5+val6);
	siete= document.getElementById("total8").value;
	document.getElementById("total9").value = sumatoria-siete;





}
function NoSumar(){
      clearInterval(interval);
}

function limpiar(){

  document.getElementById('50mil').value = '0';
  document.getElementById('20mil').value = '0';
  document.getElementById('10mil').value = '0';
  document.getElementById('5mil').value = '0';
  document.getElementById('2mil').value = '0';
  document.getElementById('1mil').value = '0';
  document.getElementById('total8').value = '0';
  document.getElementById('total9').value = '0';
  document.getElementById('total7').value = '0';
  document.getElementById('total1').value = '0';
  document.getElementById('total2').value = '0';
  document.getElementById('total3').value = '0';
  document.getElementById('total4').value = '0';
  document.getElementById('total5').value = '0';
  document.getElementById('total6').value = '0';


}


</script>
</body>
</html>
    
</body>
</html>