<?php 



require_once "../php/conexion.php";

$conexion=conexion(); ?>

			

			<div class="card text-center">

  <div class="card-header">

    

  </div>

  <div class="card-body">

    <h5 class="card-title">ASOCIACIÓN JUNTA ADMINISTRADORA DEL ACUEDUCTO SAN ROQUE - MORALES</h5>

    <p class="card-text">Sistema de Información Acueducto San Roque</p>

     </div>

  <div class="card-footer text-muted">

    MÓDULO IMPRESIÓN FACTURAS EMITIDAS

  </div>

</div>



<div class="card text-center">

  <div class="card-header">

    <ul class="nav nav-tabs card-header-tabs">

      <li class="nav-item">

        <a class="nav-link active" href="#">Sección Consolidado Facturas</a>

      <!-- </li>

      <li class="nav-item">

        <a class="nav-link" href="#">Link</a>

      </li>

      <li class="nav-item">

        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>

      </li> -->

    </ul>

  </div>

  

		

			<br><br>

		<table class="table table-hover table-condensed table-bordered" id="tabladinamicaload" >

		<div class="card-body">

			

			<thead>

				

				<tr>

				<td>Factura N.</td>

				<td>Identificación</td>

				<td>Nombre</td>

				<td>Apellido</td>

				<td>Fecha Emisión</td>

				<td>Consumo M3</td>

				<td>Saldo Anterior</td>

				<td>Valor a Pagar</td>

				<td>Estado</td>

				<td></td>



				

			</tr>

			</thead>



			<tbody>



			<?php 

			if(isset($_SESSION['consulta'])){

					if($_SESSION['consulta'] > 0){

						$id_U=$_SESSION['consulta'];

						$sql="SELECT id_Usuario,Nombre_usuario,Apellido,Fecha,Indentificacion,cod_medidor,Tipo_medidor,idEstrato,idTipo_Usuario,Saldo_Actual,Lectura,zona,Estados,Fact_Mora  

						from registro_usuario where id_Usuario='$id_U'";

					}else{

						$sql="SELECT idconsumo_factura, Indentificacion	,Nombre_usuario,Apellido,Fecha,valor_total,saldo_Anteior,Estado,consumo FROM consumo_factura JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.id_Usuario where Estado='Lista para Recaudo'";

					}

				}else{

					$sql="SELECT idconsumo_factura, Indentificacion	,Nombre_usuario,Apellido,Fecha,valor_total,saldo_Anterior,Estado,consumo FROM consumo_factura JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.id_Usuario where Estado='Lista para Recaudo'";

				}

			



			 $result=mysqli_query($conexion,$sql);



			 while ( $ver=mysqli_fetch_row($result)) {



			 	$datos=$ver[0];

			 	

			 ?>



			<tr>

				<td><?php echo  $ver[0] ?></td>

				<td><?php echo  $ver[1] ?></td>

				<td><?php echo  $ver[2] ?></td>

				<td><?php echo  $ver[3] ?></td>

				<td><?php echo  $ver[4] ?></td>

				<td><?php echo  $ver[8] ?></td>

				<td><?php echo  $ver[6] ?></td>

				<td><?php echo  $ver[5] ?></td>

				<td><?php echo  $ver[7] ?></td>



				<td>

					<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter" id8="<?php echo $datos ?>">Imprimir Factura</button>

					<span class="material-icons"></span>

					





				</td>



			</tr>

			

			<?php } ?>

			</tbody>

		</table>







	</div>



</div>

<script type="text/javascript">

	

	$(document).ready(function(){



		$('#tabladinamicaload').DataTable({

			   



			language:{

    "sProcessing":     "Procesando...",

    "sLengthMenu":     "Mostrar _MENU_ registros",

    "sZeroRecords":    "No se encontraron resultados",

    "sEmptyTable":     "Ningún dato disponible en esta tabla",

    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",

    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

    "sInfoPostFix":    "",

    "sSearch":         "Buscar:",

    "sUrl":            "",

    "sInfoThousands":  ",",

    "sLoadingRecords": "Cargando...",

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

}, dom: 'Bfrtip',

        buttons: [

            'copyHtml5',

            'excelHtml5',

            'csvHtml5',

            'pdfHtml5'

        ]



		})





	});



</script>