<?php
require_once "../php/conexion.php";
$connect=conexion(); 
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../ccs/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(cedula) {
	parent.opener.document.formNuvafactura.id_Usuario.value=cedula;
	parent.window.close();
}
</script>
<!-- <script type="text/javascript">
var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-10143667-20']);
		  _gaq.push(['_trackPageview']);
		  _gaq.push(['_trackPageLoadTime']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
</script> -->
<style type="text/css">
			body {
				background-color: #EAF2F0;
			}
		</style>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
		<script src="../librerias/jquery.uitablefilter.js" type="text/javascript"></script>
		<script language="javascript">
		$(function() {
		  theTable = $("#latabla");
		  $("#q").keyup(function() {
			$.uiTableFilter(theTable, this.value);
		  });
		});
		</script>
		
<?php

?><body>

		<div id="busqueda">
		<label>Busqueda!</label><br>
			<input type="text" id="q" name="q" value="" />
			
		</div>
		<br />
		
<?php
	
	$consulta="SELECT * FROM registro_usuario where Estados='Activo' ORDER BY id_Usuario ASC";
	$rs_tabla = mysqli_query($connect,$consulta);
	$nrs=mysqli_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<? if (CLIENTES) ?>
		<table id="latabla" class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b>Codigo</b></div></td>
			<td width="25%"><div align="center"><b>Cliente</b></div></td>
			<td width="10%"><div align="center"><b>Apellido</b></div></td>
			<td width="20%"><div align="center"><b>N.CC</b></div></td>
			<td width="20%"><div align="center"><b>Saldo a la Fecha</b></div></td>
			<td width="10%"><div align="center"><b>Lectura</b></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			while ($row= mysqli_fetch_assoc($rs_tabla)) {
				$id_Usuario=$row['id_Usuario'];
				$Nombre_usuario=$row['Nombre_usuario'];
				$Apellido=$row['Apellido'];
				$Indentificacion=$row['Indentificacion'];
				$Saldo_Actual=$row['Saldo_Actual'];
				$Lectura=$row['Lectura'];
				 ?>
						<tr >
					<td>
        <div align="center"><?php echo $id_Usuario;?></div></td>
					<td>
        <div align="center"><?php echo utf8_encode($Nombre_usuario);?></div></td>
		<td><div align="center"><?php echo $Apellido;?></div></td>
					<td><div align="center"><?php echo $Indentificacion;?></div></td>
					<td><div align="center"><?php echo $Saldo_Actual;?></div></td>
						<td><div align="center"><?php echo $Lectura;?></div></td>
					<td align="center"><div align="center"><a href="javascript:pon_prefijo('<?php echo $Indentificacion?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
			<?php }
					?>
		 </table>

<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</div>
</body>
</html>