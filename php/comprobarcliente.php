<?php

require_once "../php/conexion.php";
$connect=conexion(); 
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<title>!!Comprobando Usuario.......</title>
<head>
<link href="./estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(id_Usuario,Saldo_Actual,Lectura,Multa) {
	parent.opener.document.formNuvafactura.id_Usuario.value=id_Usuario;
	parent.opener.document.formNuvafactura.saldo_Anterior.value=Saldo_Actual;
	parent.opener.document.formNuvafactura.Lectura_anterior.value=Lectura;
	parent.opener.document.formNuvafactura.Multa.value=Multa;
	parent.window.close();
}
</script>
<script type="text/javascript">
var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-10143667-20']);
		  _gaq.push(['_trackPageview']);
		  _gaq.push(['_trackPageLoadTime']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
</script>
<style type="text/css">
			body {
				background-color: #EAF2F0;
			}
		</style>
		<link rel="stylesheet" href="../common.css" type="text/css" media="screen" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
		<script src="../Librerias/jquery.uitablefilter.js" type="text/javascript"></script>
		<script language="javascript">
		$(function() {
		  theTable = $("#latabla");
		  $("#q").keyup(function() {
			$.uiTableFilter(theTable, this.value);
		  });
		});
		</script>
		
<body>

		
		
<?php
	$id_Usuario=$_GET["id_Usuario"];
	$consulta="SELECT * from registro_usuario WHERE id_Usuario='$id_Usuario'";
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
				$multa=$row['Multas'];
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
					<td align="center"><div align="center"><a href="javascript:pon_prefijo('<?php echo $id_Usuario?>','<?php echo $Saldo_Actual?>','<?php echo $Lectura?>')"><img src="./img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
			<?php }
					?>
		 </table>
		 <?php
	$id_Usuario=$_GET["id_Usuario"];
	$consulta="	SELECT Cuotas,`Saldo`,`Cuotas_Pagas` FROM convenios JOIN registro_usuario ON convenios.`Cliente` = registro_usuario.Indentificacion WHERE id_Usuario='$id_Usuario'";
	$rs_tabla = mysqli_query($connect,$consulta);
	$nrs=mysqli_num_rows($rs_tabla);
	$Multa=$multa;

	while($row= mysqli_fetch_assoc($rs_tabla)) {
		$coutasp=$row['Cuotas'];
		$Saldop=$row['Saldo'];
		$Cuotaspg=$row['Cuotas_Pagas'];
		if($Saldop>0){

		
		$pagado=$coutasp-$Cuotaspg;

		$Multa=$Saldop/$pagado+$multa;
		}
		else{
			break;
		}

	}
	
?>
		 <script language="javascript">
window.onload = pon_prefijo('<?php echo $id_Usuario?>','<?php echo $Saldo_Actual?>','<?php echo $Lectura?>','<?php echo $Multa?>');
</script>
		 
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</div>
</body>
</html>