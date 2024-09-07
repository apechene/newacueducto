
<!DOCTYPE html>
<html lang="en">
<head>
<?php 

require_once "php/conexion.php";
$conexion=conexion(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Información Acueducto San Roque</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="ccs/login.css">
    
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
    <title>Document</title>
</head>
<body class="text-center">
<form class="form-signin">
  <img class="mb-4" src="img/logo.png" alt="" width="310" height="111">
  <h1 class="h3 mb-3 font-weight-normal">SIAV- Inicia sesión</h1>
  <label for="inputEmail" class="sr-only">Email</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
  <label for="inputPassword" class="sr-only">Contraseña</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Recordar datos
    </label>
  </div>

  <button type="button" class="btn btn-lg btn-primary btn-block" id="entrarSistema">Accceder </button>
  
  <?php $hoy=date("Y");?>
  <p class="mt-5 mb-3 text-muted">&copy; 2013-<? echo $hoy?></p>
</form>


</body>
</html>



<script type="text/javascript">
    $(document).ready(function(){

        $('#entrarSistema').click(function(){

        cadena="usuario="+ $('#inputEmail').val() +
                "&password=" + $('#inputPassword').val();           

        $.ajax({
            type:"POST",
            url:"php/validate.php",
            data:cadena,
            success:function(r){
                if(r==1){

                    window.location="recaudo.php";


                }

                else{
                    alertify.alert('Sistema de Información Acueductos Veredales', '❌ La información ingresada no es Valida o los datos estan incompletos. ☹😒😥', function(){ alertify.error('Recuerda los datos de Ingreso'); });
                    
                }
            }

        });
    });
    });
</script>
