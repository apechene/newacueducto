<?php 

require_once "../php/conexion.php";
$conexion=conexion(); ?>
<link rel="stylesheet" type="text/css" href="ccs/estilo.css">

<div class="row">
	<div class="col-sm-12">
		<h3 align="center">Gestión de Usuarios Acueducto<br> Sistema de Información </h3>
		<caption>
				<button class="btn btn-primary" data-toggle="modal" data-target="#add_data_Modal">Agregar Usuario +
				</button>
			</caption>
		
			<br><br>
		<table class="table table-hover table-condensed table-bordered" id="tabladinamicaload" >
			
			
			<thead>
				
				<tr>
				<td>Codigo</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Identificación</td>
				<td>Codigo Medidor</td>
				<td>Tipo de Medidor</td>
				<td>Estrato</td>
				<td>Tipo de Usuario</td>
				<td>Ultimo Saldo Registrado</td>
				<td>Ultima Lectura Registrada</td>
				<td>Zona</td>
				<td>Estado</td>
				<td>Facturas Mora</td>
				<td></td>

				
			</tr>
			</thead>

			<tbody>

			<?php 
			if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$id_U=$_SESSION['consulta'];
						$sql="SELECT id_Usuario,Nombre_usuario,Apellido,Indentificacion,cod_medidor,Tipo_medidor,idEstrato,idTipo_Usuario,Saldo_Actual,Lectura,zona,Estados,Fact_Mora  
						from registro_usuario where id_Usuario='$id_U'";
					}else{
						$sql="SELECT id_Usuario,Nombre_usuario,Apellido,Indentificacion,cod_medidor,Tipo_medidor,idEstrato,idTipo_Usuario,Saldo_Actual,Lectura,zona,Estados,Fact_Mora  
						from registro_usuario ";
					}
				}else{
					$sql="SELECT id_Usuario,Nombre_usuario,Apellido,Indentificacion,cod_medidor,Tipo_medidor,idEstrato,idTipo_Usuario,Saldo_Actual,Lectura,zona,Estados,Fact_Mora  
						from registro_usuario ";
				}
			

			 $result=mysqli_query($conexion,$sql);

			 while ( $ver=mysqli_fetch_row($result)) {

			 	$datos=$ver[0]."||".
			 		   $ver[1]."||".
			 		   $ver[2]."||".
			 		   $ver[3]."||".
			 		   $ver[4]."||".
			 		   $ver[5]."||".
			 		   $ver[6]."||".
			 		   $ver[7]."||".
			 		   $ver[10]."||".
			 		   $ver[11];
			 	
			 ?>

			<tr>
				<td><?php echo  $ver[0] ?></td>
				<td><?php echo  $ver[1] ?></td>
				<td><?php echo  $ver[2] ?></td>
				<td><?php echo  $ver[3] ?></td>
				<td><?php echo  $ver[4] ?></td>
				<td><?php echo  $ver[5] ?></td>
				<td><?php echo  $ver[6] ?></td>
				<td><?php echo  $ver[7] ?></td>
				<td><?php echo  $ver[8] ?></td>
				<td><?php echo  $ver[9] ?></td>
				<td><?php echo  $ver[10] ?></td>
				<td><?php echo  $ver[11] ?></td>
				<td><?php echo  $ver[12] ?></td>
				<td>
					<button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">Editar</button>
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

