<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Acuasoft-Asignación no Marcado:.</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.css">
  
  <link rel="stylesheet" type="text/css" href="ccs/estilo.css">
  <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


	<script src="librerias/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
 	 <script src="js/funciones.js"></script>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
	<script src="librerias/select2/js/select2.js"></script>
	<script src="librerias/datatable/jquery.dataTables.min.js"></script>
	<script src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="librerias/datatable/buttons/dataTables.buttons.min.js"></script>
	<script src="librerias/datatable/buttons/jszip.min.js"></script>
	<script src="librerias/datatable/buttons/pdfmake.min.js"></script>
	<script src="librerias/datatable/buttons/vfs_fonts.js"></script>
	<script src="librerias/datatable/buttons/buttons.html5.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>

<?php
	include("navbar.php");
	?>
<div class="container">
<div class="modal fade" id="dataModalcierre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Esperando confirmación </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalcierre">
    
      </div>
      <div class="modal-footer">
      <div align="center">
     
    </div>
      </div>
    </div>
  </div>
</div>

<main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/logo.png" alt="" width="300" height="150">
      <h2>Asignación de Consumos no Marcados</h2>
      <p class="lead">En este módulo podemos asignar el consumo de m3 consumidos sin facturar en sel sector. </p>
    </div>
	
	<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Paso  N.1: Selecciona el Sector</h5>
        <p class="card-text">Este es el sitio donde se presento la medición y se evidencia consumo no facturado.</p>
        <select class="form-select" aria-label="Default select example" id="zona">
			<option selected>Sectores del Acueducto</option>
			  <option value="0">1-Arriba Centro</option>
              <option value="1">2-Ramal 1</option>
              <option value="2">3-Ramal 2  Medidor 01141</option>
              <option value="3">4-Ramal 3</option>
              <option value="4">5-Ramal 4</option>
			  <option value="5">6-Ramal 5</option>
			  <option value="6">7-Ramal Cementerio</option>
			  <option value="7">8-Ramal Cancha</option>
			  <option value="8">9-Disperso</option>
			</select>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Paso N.2: Asigna la cantidad de M3 a cobrar</h5>
        <p class="card-text">Despúes de validar el consumo de m3 que no se facturo. Digita la diferencia.</p>
 		 <input type="number" class="form-control" id="m3" placeholder="m3 de diferencia">
      </div>
    </div>
  </div>
  <div class="col-sm">
    <div class="card" align="center">
      <div class="card-body">
        <h5 class="card-title" align="center">Paso N.3: Asigna los cambios</h5>
        <p class="card-text" align="center"> Presiona enviar para asignar los datos, recuerda que esta acción no tiene forma de deshacerse.</p>
		<button class="btn btn-info" data-toggle="modal" id="botoncierre" ">Enviar <span class="far fa-calendar-times">
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>


<script>
  $(document).on("click", "#botoncierre", function(){

var id6= document.getElementById("zona").value;
var id7= document.getElementById("m3").value;

    $.ajax({
        url:"php/select.php",
        method:"post",
        data:{id6:id6, id7:id7},
        success:function(data){
            $('#modalcierre').html(data);
             $('#dataModalcierre').modal("show");  
        }
    });
});
 </script>