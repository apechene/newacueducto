
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Recaudos Realizados</title>
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


 </head>
<body>

  

     


	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menú de Opciones </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="Usuarios.php">Ver Usuarios</a>
          <a class="dropdown-item" href="facturas.php">Ver Documentos</a>
       </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Convenios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="newconvenio.php">Registrar Convenio</a>
          
       </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Recaudos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="recaudo.php">Reacaudar Factura</a>
          <a class="dropdown-item" href="RecaudosSucces.php">Ver Recaudos</a>
       </div>
      </li>
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Facturación
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="facturar.php">Facturar</a>
          <a class="dropdown-item" href="factura.php">ver Facturas</a>
		  <a class="dropdown-item" href="ImpFacturaLI.php">Facturas Listas para Impresión</a>
		  <a class="dropdown-item" href="ImpFacturaL.php">Facturas Listas para Recaudo</a>
          <a class="dropdown-item" href="Impfactura.php">Imprimir Facturas Todas</a>
        </div>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="https://www.000webhost.com/members/website/gestionkvd/files">Gestionar BD</a>
      </li>
      <li class="nav-item dropdown">
    </ul>
  </div>
</nav>

	<div class="container">
		<div id="buscador"></div>
		<div id="tabla"></div>
	</div>

<!-- Modal para REGISTROS nUEVOS  -->



<!-- Modal -->




<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Resumen de Factura Recaudada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mi_modal">
    
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){


		$('#tabla').load('componentes/tablaRecaudos.php');
		
		
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

<script>
  $(document).on('click', '.btn-warning', function(){

var id= $(this).attr("id8");

    $.ajax({
        url:"php/select.php",
        method:"post",
        data:{id:id},
        success:function(data){
            $('#mi_modal').html(data);
             $('#dataModal').modal("show");  
        }
    });
});
 </script>
