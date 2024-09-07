<?php

session_start();
if(isset ($_SESSION['user'])){

  ?>
<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



  <title>JUNTA ADMISNITRADORA ACUDUCTO SAN ROQUE-MORALES C. Cambio de estado Factura </title>

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
	include("navbar.php");
	?>
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

        <h5 class="modal-title" id="exampleModalCenterTitle">Cambio de estado Facturas 😃👀</h5>

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

<?php
} else {

  header("location:login.php");
}
?>



<script type="text/javascript">

	$(document).ready(function(){





		$('#tabla').load('componentes/tablachange.php');

		

		

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
  $(document).on("click", "#botonstatus", function(){

var id633= $(this).attr("id8");

    $.ajax({
        url:"php/select.php",
        method:"post",
        data:{id633:id633},
        success:function(data){
            $('#mi_modal').html(data);
             $('#dataModal').modal("show");  
        }
    });
});
 </script>