<?php

session_start();
if(isset ($_SESSION['user'])){

  ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>.:: Acuasoft- Recaudo de Facturas ::.</title>
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

<?php
	include("navbar.php");
	?>
  



	<div class="container">
		<div id="buscador"></div>
		<div id="tabla"></div>
	</div>

<!-- Modal para REGISTROS nUEVOS  -->
<!-- Modal cierre -->
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


<!-- Modal Recaudo -->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Procesando pago Total de la Factura </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mi_modal">
    
      </div>
      <div class="modal-footer">
      <div align="center">
     
    </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal Pago Parcial -->
<div class="modal fade" id="dataModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Resumen de Factura Pago Parcial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mi_modals">
    
      </div>
      <div class="modal-footer">
      <div align="center">
      


    </div>
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


		$('#tabla').load('componentes/tablacobro.php');
		
		
	});

</script>








<script>
  $(document).on("click", "#botoncierre", function(){

var id1=1;

    $.ajax({
        url:"php/select.php",
        method:"post",
        data:{id1:id1},
        success:function(data){
            $('#modalcierre').html(data);
             $('#dataModalcierre').modal("show");  
        }
    });
});
 </script>
 <script>
  $(document).on("click", "#botonpago", function(){

var id2= document.getElementById("codigo").value;
    
    $.ajax({
        url:"php/select.php",
        method:"post",
        data:{id2:id2},
        success:function(data){
            $('#mi_modal').html(data);
             $('#dataModal').modal("show");  
        }
    });
});
 </script>

 <script>
  $(document).on("click", "#pagoparcial", function(){

var id6= document.getElementById("codigo").value;

    $.ajax({
        url:"php/abono.php",
        method:"post",
        data:{id6:id6},
        success:function(data){
            $('#mi_modals').html(data);
             $('#dataModals').modal("show");  
        }
    });
});
 </script>