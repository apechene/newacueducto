<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>JUNTA ADMISNITRADORA ACUDUCTO SAN ROQUE-MORALES C. </title>
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

<div class="card text-center">

<div class="card-header">

    

  </div>

  <div class="card-body">

    <h5 class="card-title">ASOCIACIÓN JUNTA ADMINISTRADORA DEL ACUEDUCTO SAN ROQUE - MORALES</h5>

    <p class="card-text">Sistema de Información Acueducto San Roque</p>

     </div>

  <div class="card-footer text-muted">

    MÓDULO EGRESOS REALIZADOS

  </div>

</div>

<br> 

<div class="table-responsive">

    <div class="container">


  <table id="example" class=" display  table-bordered table-responsive" style="width:100%; text-align:center;">

  	<div class="card-body" >
            <thead>
            <tr>
                <th>Codigo Egreso </th>
                <th>Descripción del Egreso</th>
                <th>Valor </th>
                <th>Fecha de Realización</th>
                <th>Entidad a la que se le pago</th>
                <th>Factura o comprobante Relacionada</th>
                <th>Acción</th>

            </tr>
            </thead>
        </table>

        </div>
		
</div>
</div>
</body>
</html>

<script>
        $(document).ready(function(){

          var id19= 1;
            var dataTable=$('#example').DataTable({
              
                "processing": true,
                "serverSide":true,
                "responsive": true,
               
                "ajax":{
                    url:"php/consultaegresos.php",
                    type:"post"

                },
            retrieve: true,
            dom: 'Blfrtip',
            "pageLength": 10,
              buttons: [ 
               {
                 extend: 'excelHtml5',
                 text: 'EXCEL'
               },
               {
                 extend: 'csvHtml5',
                 text: 'CSV'
               },
               {
                  extend: 'pdfHtml5',
                  text: 'PDF'
              }            
            ],
            "columnDefs": [
              {
                "visible": true,
                "searchable": true,
              }
            ],
            "language": {
              "sProcessing":     "",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "searchPlaceholder": "Escribe aquí para buscar..",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "<img style='display: block;width:100px;margin:0 auto;' src='assets/img/loading.gif' />",
              "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
              },
              "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
            },buttons: [
        'copy', 'excel', 'pdf'
    ]
            });
        });
    </script>

 
<script>

        $(document).on('click', '#getEdit', function(){

        var id15= $(this).data("idconsumo_factura");

            $.ajax({
                url:"componentes/cegreso.php",
                method:"post",
                data:{id15:id15},
                success:function(data){
                var newWindow = window.open("", "new window", "width=900, height=600");
        //write the data to the document of the newWindow
                newWindow.document.write(data);
                }
            });
        });

        
    </script>