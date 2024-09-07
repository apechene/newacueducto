<?php

session_start();
if(isset ($_SESSION['user'])){

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>.::Acuasoft-Usuarios::.</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="ccs/estilo.css">


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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



 </head>
<body>

  <?php 

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
	include("navbar.php");
	?>



	<div class="container">
		<div id="buscador"></div>
		<div id="tabla"></div>
	</div>

<!-- Modal para REGISTROS nUEVOS  -->



<!-- Modal -->





<div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="POST" id="insert_form" action="php/agregarDatos.php">
        <label>Nombre</label>
        <div class="orm-control input-sm">
         <input type="text" name="nombre" class="form-control input-sm" id="nombre">
       </div>
        <label>Apellido</label>
        <div class="orm-control input-sm">
        <input type="text" name="apellido" class="form-control input-sm" id="apellido">
        </div>
        <label>Identificación</label>
        <div class="orm-control input-sm">
        <input type="text" name="cedula" class="form-control input-sm" id="cedula">
        </div>
        <label>Cod. Medidor</label>
        <div class="orm-control input-sm">
        <input type="text" name="medidor" class="form-control input-sm" id="medidor">
        </div>
        <label>Tipo Medidor</label>
        <div class="orm-control input-sm">
        <input type="text" name="tipomedidor" class="form-control input-sm" id="tipomedidor">
        </div>
        <label>Estrato</label>
        <div class="orm-control input-sm">
        <select class="form-control" id="estrato" name="estrato">
                                                        <?php
                                                        #Include the connect.php file

                                                        include ('php/conexion.php');
                                                        $conexion=conexion();
                                                        $query = "SELECT * FROM estrato";
                                                        $result = mysqli_query($conexion,$query);
                                                        while ($rows = mysqli_fetch_Array($result)) {
                                                          ?>
                                                        <option value="<?php echo $rows['idEstrato']?>"><?php echo $rows['Numero']?> </option>
                                                        <?php  
                                                        }
                                                        ?> 
                                                    </select>
        </div>
		    <label>Tipo de Usuario</label>
        <div class="orm-control input-sm">
       <select class="form-control" id="tipouser" name="tipouser">
                                                        <?php
                                                        #Include the connect.php file

                                                        $query = "SELECT * FROM tipo_usuario";
                                                        $result = mysqli_query($conexion,$query);
                                                        while ($rows = mysqli_fetch_Array($result)) {
                                                          ?>
                                                        <option value="<?php echo $rows['idTipo_Usuario']?>"><?php echo $rows['Nombre']?> </option>
                                                        <?php  
                                                        }
                                                        ?> 
                                                    </select>
        </div>
        <label>Zona</label>
        <div class="orm-control input-sm" >
              <select class="form-control" id="zona" name="zona">
              <option selected>Seleccione una Zona</option>
              <option value="1">1-Arriba Centro</option>
              <option value="2">2-Ramal 1</option>
              <option value="3">3-Ramal 2</option>
              <option value="4">4-Ramal 3</option>
              <option value="5">5-Ramal 4</option>
			  <option value="6">6-Ramal 5</option>
			  <option value="7">7-Ramal Cementerio</option>
			  <option value="8">8-Ramal Cancha</option>
			  <option value="9">9-Disperso</option>

            </select>
        </div>
        <label>Estado</label>
        <div class="orm-control input-sm">
         <div class="orm-control input-sm" >
              <select class="form-control" id="estados" name="estados">
              <option selected>Seleccione un Estado</option>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Suspendido">Suspendido por Mora</option>
              </select>
        </div>

        <label for="exampleInputFile">Subir archivo Cedula</label>
        <center><input type="file"  id="fileToUpload" onchange="upload_image();"></center>
        <div class="upload-msg"></div>
        <br />
     <input type="submit" name="insert" id="insert" value="Guardar" class="btn btn-success" />

      </div>
      
       
      </div>
    </div>
  </div>
</div>


<!-- Modal para EDICION DE DATOS   -->

<!-- Modal -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" id="update_form" action="php/agregarDatos.php">
      	<input type="text" hidden="" id="id" name="id">
         <label>Nombre</label>
        <input type="text" name="nombreu" class="form-control input-sm" id="nombreu">
        <label>Apellido</label>
        <input type="text" name="apellidou" class="form-control input-sm" id="apellidou">
        <label>Identificación</label>
        <input type="text" name="cedulau" class="form-control input-sm" id="cedulau">
        <label>Cod. Medidor</label>
        <input type="text" name="medidoru" class="form-control input-sm" id="medidoru">
        <label>Tipo Medidor</label>
        <input type="text" name="tipomedidoru" class="form-control input-sm" id="tipomedidoru">
        <label>Estrato</label>
        <input type="text" name="estratou" class="form-control input-sm" id="estratou">
		    <label>Tipo de Usuario</label>
        <input type="text" name="tipouseru" class="form-control input-sm" id="tipouseru">
        <label>Zona</label>
        <div class="orm-control input-sm" >
              <select class="form-control" id="zonau" name="zonau">
              <option selected>Seleccione una Zona</option>
              <option value="1">1-Arriba Centro</option>
              <option value="2">2-Ramal 1</option>
              <option value="3">3-Ramal 2</option>
              <option value="4">4-Ramal 3</option>
              <option value="5">5-Ramal 4</option>
			  <option value="6">6-Ramal 5</option>
			  <option value="7">7-Ramal Cementerio</option>
			  <option value="8">8-Ramal Cancha</option>
			  <option value="9">9-Disperso</option>

            </select>
         <label>Estado</label>
        <div class="orm-control input-sm" >
              <select class="form-control" id="estadou" name="estadou">
              <option selected>Seleccione un Estado</option>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Suspendido">Suspendido por Mora</option>
              </select>

      </div>
      <div class="modal-footer">
         <input type="submit" name="edit" id="edit" value="Guardar" class="btn btn-success" />
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
} else {

  header("location:login.php");
}
?>

<script type="text/javascript">
	$(document).ready(function(){


		$('#tabla').load('componentes/tabla.php');
		
		
	});

</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#guardarnuevo').click(function(){

      nombre=$('#nombre').val();
      apellido=$('#apellido').val();
      cedula=$('#cedula').val();
      medidor=$('#medidor').val();
      tipomedidor=$('#tipomedidor').val();
      estrato=$('#estrato').val();
      tipouser=$('#tipouser').val();
      zona=$('#zona').val();
      estados=$('#estados').val();

        agregardatos(nombre,apellido,cedula,medidor,tipomedidor,estrato,tipouser,zona,estados);



    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $('#insert_form').validate({
        rules: {
            nombre: { required: true },
            apellido: {
                required: true           
            },
            cedula: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            nombre: {
                required: "Por favor ingrese un Nombre...",
            },
            apellido: {
                required: "por favor ingrese un apellido ...",
                minlength: "Password must have at least 5 characters...",
            },
            passConfir: {
                required: "Please write a password...",
                minlength: "Password must have at least 5 characters...",
                equalTo: "Password must match...",
            },
            email: {
                required: "Please write an email...",
                email: "Format must be: example@domain.com",
            }
        },


       
    });
});



 


</script>

<script>
  function upload_image(){//Funcion encargada de enviar el archivo via AJAX
        $(".upload-msg").text('Cargando...');
        var inputFileImage = document.getElementById("fileToUpload");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('fileToUpload',file);
        
        /*jQuery.each($('#fileToUpload')[0].files, function(i, file) {
          data.append('file'+i, file);
        });*/
              
        $.ajax({
          url: "php/agregardatos.php",        // Url to which the request is send
          type: "POST",             // Type of request to be send, called as method
          data: data,         // Data sent to server, a set of key/value pairs (i.e. form fields and values)
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,        // To send DOMDocument or non processed data file it is set to false
          success: function(data)   // A function to be called if request succeeds
          {
            $(".upload-msg").html(data);
            window.setTimeout(function() {
            $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            }); }, 5000);
          }
        });
        
      }
</script>