<?php

session_start();
if(isset ($_SESSION['user'])){

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>.:: Acuasoft-Crear Covenios ::.</title>
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


 </head>
 <body>
    
 <?php
	include("navbar.php");
	?>

  <?php  
		if ( isset($_GET["condicion"]) && $_GET["condicion"] == "succes" ) {
			echo "<script> window.onload=mensajefulL();</script>";
		}
	if ( isset($_GET["condicion"]) && $_GET["condicion"] == "error" ) {
			echo "<script> window.onload=mensajeerror();</script>";
		}

  	session_start();

  if(isset($_SESSION ['Message'])):   ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

      <?php


      echo $_SESSION['Message'];
      unset($_SESSION['Message']);



        ?>

      </div>

    <?php endif?>
<?php
/*
Car�cter 	HTML 		Unicode
� 			&Aacute; 	\u00C1
� 			&aacute; 	\u00E1
� 			&Eacute; 	\u00C9
� 			&eacute; 	\u00E9
� 			&Iacute; 	\u00CD
� 			&iacute; 	\u00ED
� 			&Oacute; 	\u00D3
� 			&oacute; 	\u00F3
�		 	&Uacute; 	\u00DA
� 			&uacute; 	\u00FA
� 			&Uuml; 		\u00DC
� 			&uuml; 		\u00FC
? 			&Ntilde; 	\u00D1
� 			&ntilde; 	\u00F1
*/
?>
<style>
.ui-datepicker{
	display:none;
}
</style>

<script>
  $( function() {
    $( "#Fecha" ).datepicker();
  } );

  $( function() {
    $( "#Fecha_Pago" ).datepicker();
  } );
  </script>

	<script type="text/javascript">
function Sumar(){
      interval = setInterval("calcular()",1);
}
function calcular(){
      uno = document.formNuvafactura.Lectura_actual.value;
      dos = document.formNuvafactura.Lectura_anterior.value; 
	  
      document.formNuvafactura.consumo.value = (uno * 1) - (dos * 1);
}
function NoSumar(){
      clearInterval(interval);
}
	</script>
<script type="text/javascript">
function operar(){
      interval = setInterval("editar()",1);
}
function editar(){
            document.formNuvafactura.Minima.value =1500 ;
			document.formNuvafactura.Valor_Unitario.value =550 ;
			document.formNuvafactura.Estado.value ='Lista para Imprimir' ;
			
}
function Nooperar(){
      clearInterval(interval);
}
function total(){
      interval = setInterval("ejecto()",1);
}
function ejecto(){
      uno = document.formNuvafactura.consumo.value;
      dos = document.formNuvafactura.Valor_Unitario.value; 
	  tres = document.formNuvafactura.Minima.value;
	  cuatro = document.formNuvafactura.saldo_Anterior.value;
	  cinco = document.formNuvafactura.Multa.value;
	  if(uno<15){
      document.formNuvafactura.valor_total.value = (uno * 1) * (dos * 1)+(tres * 1)+(cuatro *1)+(cinco *1);
	  }
	  else  {
	  multa=uno-15;
	  mit=15;
	  valorfinal=multa*1050;
	  document.formNuvafactura.valor_total.value = (mit* 1) * (dos * 1)+(tres * 1)+(cuatro *1)+(cinco *1)+(valorfinal *1);
	  }
}
function Nototal(){
      clearInterval(interval);
}
function buscar() {
			var cadena;
			cadena=hacer_cadena_busqueda();
			document.getElementById("cadena_busqueda").value=cadena;
			if (document.getElementById("iniciopagina").value=="") {
				document.getElementById("iniciopagina").value=1;
			} else {
				document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			}
			document.getElementById("form_busqueda").submit();
		}
		function validarcliente(){
			var codigo=document.getElementById("id_Usuario").value;
			miPopup = window.open("php/comprobarcliente.php?id_Usuario="+codigo,"frame_datos","width=450px,height=100,scrollbars=yes");
		}	
		function abreVentana(){
			miPopup = window.open("php/ventana_clientes_convenios.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}
		

	</script>



<div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5 class="card-title">ASOCIACIÓN JUNTA ADMINISTRADORA DEL ACUEDUCTO SAN ROQUE - MORALES</h5>
    <p class="card-text">Sistema de Información Acueducto San Roque</p>
     </div>
  <div class="card-footer text-muted">
    MÓDULO DE REGISTRO DE CONVENIOS
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
  <form name="formNuvafactura" id="formNuvafactura" method="POST" action="php/agregarDatos.php" title="Generar convenios" >

  <div class="form-row">
    
	<div class="col-md-4 mb-5">
	<label for="id_Usuario">Cedula Cliente</label>
	<input id="id_Usuario" type="text" class="form-control" name="id_Usuario" maxlength="10" value=""> <img src="img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar cliente" > <img src="img/cliente.png" width="16" height="16" onClick="validarcliente()" title="Validar cliente" > 
	</div> 
	<div class="col-md-4 mb-5">
	<label for="descripcion">Descripción del Convenio</label>
	<TEXTAREA id="descripcion" NAME="descripcion"  class="form-control"> </TEXTAREA>
   	</div>
	<div class="col-md-4 mb-5">
	<label for="saldo">Saldo a Financiar</label>
	<input type="text" name="saldo" value="" class="form-control" id="saldo" rel="2" >
    </div>	
	<div class="col-md-4 mb-5">
	<label for="cuotas">Número de Cuotas</label>
	<input type="text" name="cuotas" value="" class="form-control" id="cuotas" rel="3">
   	</div>	
	<div class="col-md-4 mb-5">	
		<?php
	$hoy=date("Y-m-28");?>
	<label for="Fecha">Fecha Resgistro Convenio</label>
	<input type="text" class="form-control" name="fecha" value="<?php echo $hoy?>" id="fecha" class="form-control" rel="7" readonly>
   </div>
   
    <br>
</div>
<button type="submit" name="saveconvenio" id="saveconvenio"class="btn btn-primary">Guardar Convenio</button>
</div>
  
  
</form>



</div>



            











<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

</script>



</body>
</html>
<?php
} else {

  header("location:login.php");
}
?>
<script>
	
</script>

