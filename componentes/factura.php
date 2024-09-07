<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>

	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Sistema de Informaci&oacuten Acueducto San Roque</title>
	
	<link rel='stylesheet' type='text/css' href='./ccs/style.css' />
	<link rel='stylesheet' type='text/css' href='./ccs/print.css' media="print" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 	<link href="https://fonts.googleapis.com/css?family=Cantarell&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
</head>
<?php
require_once "../php/conexion.php";
$connect=conexion(); 
if(isset($_POST["id15"]))  
{  
	 $output = '';  
	
?><body >


<?php
		
$idconsumo_factura=$_POST['id15'];

?>

<body>




<?php
$sql1=("select Estado, FacturaDian from consumo_factura where idconsumo_factura=".$idconsumo_factura."");
$resultado = mysqli_query($connect,$sql1);
while ($fila = mysqli_fetch_assoc($resultado)) {
	
	$valor="Lista para Imprimir";
	$valor2=$fila["Estado"];
	$numpago= $fila["FacturaDian"];
	if($valor2==$valor){}
	
	else{ 
		 
	?>
<!-- <script language="javascript">

function alerta(){
 swal({
   title: "¡ERROR!",
   text: "Esta Factura tienen un estado= <?php echo $valor2; ?>",
   type: "error",
 });
}

alerta=window.confirm("La factura Solicitada tiene un estado : esta seguro de Imprimirla Nuevamente?");
if(alerta){
	
}
else{
window.close();
}
</script> -->
<?php
	
	}
	}
	?>
	<div id="printableArea">
<div class="ticket">

	<div id="page-wrap">

		<h5 align="center">Factura de Consumo</h5>

		
		<div id="identity">
		<h5 align="center">ASOCIACI&OacuteN JUNTA ADMINISTRADORA DEL ACUEDUCTO SAN ROQUE Nit 900668200-9</h5>
		</body>
            <table >
                
                    <td><h4>FECHA LIMITE DE PAGO: <h4></td>
                    <td><?php
			$consulta=("SELECT Fecha_Pago,saldo_Anterior FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){
if($row['saldo_Anterior']==0){

echo "<h4>".$row['Fecha_Pago']."</h4>"; }
else {
    echo "<h4>INMEDIATO</h4>";}

}
					  ?></td>
                
				<tr>
                    <td><h4 >SUSPENSI&OacuteN DESDE: </h4></td>
					<?php $hoy=date("Y-m-29");?>
                    <td><h4><?php echo $hoy?><h4></td>
                </tr>
				</table>
<div class="ticket1">
	<h3>Informaci&oacuten de Usuario:</h3>
			<?php
			$consulta=("SELECT registro_usuario.`id_Usuario`,Indentificacion,Nombre_usuario,Apellido,idEstrato,cod_medidor,Fecha,Asistencia FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){
	echo "Suscripción  : ".$row['id_Usuario']."<br>"; 
echo "Nombre  : ".$row['Nombre_usuario']."--";  echo "".$row['Apellido']."<br>"; 
echo "Identificacion  : ".$row['Indentificacion']."<br>";
echo "Estrato   : ".$row['idEstrato']."<br>";
echo " N. Medidor  : ".$row['cod_medidor']."<br>";
$var1 = $row['Indentificacion'];
$varmil=$row['Asistencia'];
}
					  ?>
	
		 <h3>Datos de Medici&oacuten:</h3>
		 
		 <?php
			$consulta=("SELECT Lectura_anterior,Lectura_actual,consumo FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "Lectura Anterior :  ".$row['Lectura_anterior']."<br>"; 
echo "Lectura Actual   :  ".$row['Lectura_actual']."<br>";  
echo "Consumo Mes        :  ".$row['consumo']."-metros<br> ";

}?>

<p align="Left">
 
<H4>*INFORMACION IMPORTANTE*</H4>


<h4 align="left"> <?php
			$consulta=("SELECT  `mensaje_fact` FROM  `administracion`");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo " ".$row['mensaje_fact']."<br>";

}?>  </h4>

</p>		
 <td colspan="2" align="center"> <h4></h3><h2><?php

 if($varmil==1){
	
	 echo 'Aun no realizas el Aporte de $10.000, en esta factura se realiza el cobro. ';
}
else{}
			  
			 // ?>
			  </h2></td>
	<!--	<div style="clear:both">
		<table>
		<tr>
                    <td class="meta-head" ><h5>N. FACTURA <br/>AUTORIZADA <br/>POR LA DIAN </h5></td>
                    <td>***<?php echo $idconsumo_factura;?>***</td>
                </tr>
		</table>
		
		</div>
		-->
		         

            <table id="meta">
			<tr> <td class="meta-head">FACTURA N.: </td> 
				<td><?php echo "<h2> F-", $idconsumo_factura;"</h2>"?></td></43>
				</tr>

				<tr>
                    <h4><td class="meta-head">REF. PARA PAGO: </td>
                    <td><?php echo "<h2> A-", $numpago;"</h2>"?></td></43>
                </tr>
                <tr>

                    <td class="meta-head">PERIODO FACTURADO: </td>
                    <td><?php
			$consulta=("SELECT Fecha FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "<h4>".$row['Fecha']."</h4>";  
}
					  ?></td>
                </tr>
               <!-- <tr>
                    <td class="meta-head">TOTAL A PAGAR</td>
                    <td><div class="due"><?php
			$consulta=("SELECT valor_total FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "$".$row['valor_total']."";  
}
					  ?></div></td>
                </tr>-->

            </table>
		
		</div>
		
		
		
		<div style="overflow-x:auto;">
		<table id="items" class="ticket12">
		
		  <tr>
		      
		      <th align="left">Tus Consumos:</th>
		      <th align="left">Costo Unitario</th>
		      <th align="left">Cantidad</th>
		      <th align="left">Total</th>
		  </tr>
		  
		  <tr >
		      <td align="Left">CONSUMO M3</td>
		      <td align="left"><?php
			$consulta=("SELECT Valor_Unitario FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "$".$row['Valor_Unitario']."";  
}
					  ?></td>
		      <td align="left"><?php
			$Cnormal=15;
			$consulta=("SELECT consumo FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

$normal="".$row['consumo']."";  
if($normal>$Cnormal){
$Sobligatoria=15;
echo $Sobligatoria;
}
else{
echo $normal;
}

}
					  ?></td>
		      <td align="center"><?php
			$consulta=("SELECT consumo,Valor_Unitario FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){
$Cnormal2="".$row['consumo'].""; 
$Cnormal3="".$row['Valor_Unitario'].""; 
if($Cnormal2<=15){ 

$salidafinal=$Cnormal2*$Cnormal3;
echo "$".$salidafinal;  
}
else{
$consumop=15;
$total1=$consumop*$Cnormal3;
echo "$".$total1;
}
}
					  ?></td>
		  </tr>
		  <tr >
		      <td align="left" ">CONSUMO DE M3 ADIC.</td>
		      <td align="left"><?php
			$consulta=("SELECT Cadicional FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "$".$row['Cadicional']."";  
}
					  ?></td>
		      <td align="Left"><?php
			$promedio=15;
			$salida3=0;
			$consulta=("SELECT consumo FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){


$salida="".$row['consumo']."";

if($salida>$promedio){

$salida2=$salida-$promedio;
 echo $salida2;
}
else{
echo $salida3;
$salida2=0;
}
}
					  ?></td>
		      <td align="center">
			  <?php
			$consulta=("SELECT Cadicional FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

$valor1="".$row['Cadicional']."";
$valor2= $valor1*$salida2;
echo "$".$valor2;
}
					  ?></td>
		  </tr>
		  
		  <tr >

		      <td align="left">MINIMA</td>
		      <td align="left"><?php
			$consulta=("SELECT Minima FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "$".$row['Minima']."";  
}
					  ?></td>
		      <td align="left">1</td>
		      <td align="left"><?php
			$consulta=("SELECT Minima FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "$".$row['Minima']."";  
}
					  ?></td>
		  </tr>
		  
		  <tr ">

		      <td " >OTROS</td>
		      <td align="left"><?php
			$consulta=("SELECT Multa FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "$".$row['Multa']."";  

if($row['Multa']>0){
 $uno=1;	}
else {
   $uno=0;}
}
	
	?></td>
		      <td align="left"><?php echo $uno ?></td>
		      <td align="left"><?php
			$consulta=("SELECT Multa FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "$".$row['Multa']."";  
}
					  ?></td>
		  </tr>
		  
		  <tr id="hiderow">
		    
		  </tr>
		  
		  <tr>
		   <td  align="left" ><h4>Facturas Vencidas: <?php


$sql1=("select `idconsumo_factura`,id_Usuario,Lectura_actual,`valor_total`, Estado from consumo_factura where idconsumo_factura='".$idconsumo_factura."'");
$resultado = mysqli_query($connect,$sql1);


while ($fila = mysqli_fetch_assoc($resultado)) {
$fila["id_Usuario"];

	$sql5=("select Fact_Mora from registro_usuario where id_Usuario='".$fila['id_Usuario']."'");
$resultado1 = mysqli_query($connect,$sql5);

while ($fila = mysqli_fetch_assoc($resultado1)) {
	
	 $moraTotal=$fila["Fact_Mora"];


}
echo $moraTotal;
}		  ?></h4></td>
    <td  >Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php
			$prom1=15;
			$consulta=("SELECT consumo,Valor_Unitario,Minima,Multa,Cadicional FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

$valorfinal2= "".$row['Minima']."";  
$valorfinal3= "".$row['Multa']."";
$var3="".$row['consumo']."";
$var4="".$row['Valor_Unitario']."";
$var5="".$row['Cadicional']."";

if($var3>15){
$var6=$var3-15;
$sub1=$var6*$var5;
$var8=$prom1*$var4;
$subtotal1=$valorfinal2+$sub1+$valorfinal3+$var8;
echo "$".$subtotal1;
}
else{

$var9=$var3*$var4;
$subtotal2=$var9+$valorfinal2+$valorfinal3;
echo "".$subtotal2;
}


}
					  ?></div></td>
		  </tr>
		  <tr>

		      <td  align="center"> <h4>Tu Financiación:</h4><h5><?php
			  
			  $sql5=("select Descripcion,Saldo from convenios where Cliente='$var1'");
                $resultado1 = mysqli_query($connect,$sql5);
                  if (mysqli_num_rows($resultado1) > 0) {
                   while ($fila = mysqli_fetch_assoc($resultado1)) {
	
				 $Descrip=$fila["Descripcion"];
				 echo $Descrip;
				}
                              } else {
                                         echo 'Sin Convenios activos';
                                              }
                
			  ?>
			  </h5></td>
		     
			  <td class="total-line"><h4>Saldo Anterior: </h4></td>
		      <td class="total-value"><div id="total"><h4><?php
			$consulta=("SELECT saldo_Anterior FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "<h2>$".$row['saldo_Anterior']."<h2>";  
}
					  ?><h4></div></td>
		  </tr>
		 
		  <tr>
		      <td  align="Center"><h4>Saldo de Financiación:</h4><h5><?php
			  
			  $sql5=("select Descripcion,Saldo from convenios where Cliente='$var1'");
                $resultado1 = mysqli_query($connect,$sql5);
                  if (mysqli_num_rows($resultado1) > 0) {
                   while ($fila = mysqli_fetch_assoc($resultado1)) {
	
				 $Descrip=$fila["Saldo"];
				 echo "$".$Descrip;
				}
                              } else {
                                         echo '0';
                                              }
                
			  ?> </h5></td></table>
			<table><tr><div class="pago"> 
		      <td> <h3>Total a Pagar:</h3></td>
		    <div class="pago"><td><?php
			$consulta=("SELECT valor_total FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo  " <h1> $".$row['valor_total']."</h1>";  
}
?></td>
</div>
</div>
		
		</table>
		<?php
$sql1=("select `idconsumo_factura`,id_Usuario,Lectura_actual,`valor_total`,Estado from consumo_factura where idconsumo_factura='".$idconsumo_factura."'");
$resultado = mysqli_query($connect,$sql1);
while ($fila = mysqli_fetch_assoc($resultado)) {

$valor="Lista para Recaudo";
$valor2=$fila["Estado"];

if($valor2==$valor){   
	$consultaq=("Update registro_usuario set Saldo_Actual='".$fila['valor_total']."' where id_Usuario='".$fila['id_Usuario']."'"); 
	$sql9=mysqli_query($connect,$consultaq);
	$consultar=("Update registro_usuario set Lectura='".$fila['Lectura_actual']."' where id_Usuario='".$fila['id_Usuario']."'");
	$sql9=mysqli_query($connect,$consultar);
	
	}
	else{
	}
	}
					  ?>
		<div align="center" class="pago2">
		  <h2>***Recuerde!***</h2>
		 PAGUE  OPORTUNAMENTE, EVITE  SUSPENSIONES<br>
		 Este documento equivalente a la factura, presta merito ejecutivo de acuerdo con el art. 130 de la ley 142-94<br>
		     Sistema de Informaci&oacuten Acueducto "San Roque" v3.1<br>
		   2020
		</div>
<h2 align="center">----------------------</h2>	
	<h4 align="center"> DESPRENDIBLE DE PAGO</h4>
	<table >
	<tr>
                    <td>Código Factura: </td>
                    <td><?php echo $idconsumo_factura;?></td>
                </tr>
                <tr>

                    <td>Fecha Exp.:</td>
                    <td><?php
			$consulta=("SELECT Fecha FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "".$row['Fecha']."";  
}
					  ?></td>
                </tr>
                <tr>
                    <td>Total a Pagar:</td>
                    <td><div><?php
			$consulta=("SELECT valor_total FROM consumo_factura
			JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.`id_Usuario` 
			WHERE idconsumo_factura ='".$idconsumo_factura."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

echo "$".$row['valor_total']."";  
}
					  ?></div></td>
				</tr>
				
				<tr> 
				<td>
				Ref. Recaudo:
				</td>
				<td>
					<?php
					echo $numpago;
					?>
				</td>

				</tr>

            </table>
			 <div align="center">
			
		<br>
			
					  <img src="./php/barcode.php?text=<?php echo $idconsumo_factura?>&codetype=code39&size=40&print=true"/>
					  
	</div>
	</div>
	 
			
			
			<?php
			


$sql1=("select `idconsumo_factura`,id_Usuario,Lectura_actual,`valor_total`, Estado from consumo_factura where idconsumo_factura='".$idconsumo_factura."'");
$resultado = mysqli_query($connect,$sql1);


while ($fila = mysqli_fetch_assoc($resultado)) {
 $valor="Lista para Imprimir";
$valor28=$fila["Estado"];
if($valor28==$valor){
	 $fila["idconsumo_factura"];
     $fila["valor_total"];
	 $fila["id_Usuario"];
	 $fila["Lectura_actual"];
	$consulta=("update registro_usuario set Saldo_Actual='".$fila['valor_total']."' where id_Usuario='".$fila['id_Usuario']."'");
	$sql9=mysqli_query($connect,$consulta);
	$consultas=("update registro_usuario set Lectura='".$fila['Lectura_actual']."' where id_Usuario='".$fila['id_Usuario']."'");
	$sq0l9=mysqli_query($connect,$consultas);
	}
	
	else{
	}
	
	}
	
					  ?>
                   
				  
		<?php	
			

$sql1=("select `idconsumo_factura`,id_Usuario,Lectura_actual,`valor_total`, Estado from consumo_factura where idconsumo_factura='".$idconsumo_factura."'");
$resultado = mysqli_query($connect,$sql1);


while ($fila = mysqli_fetch_assoc($resultado)) {
 $valor="Lista para Imprimir";
$valor2=$fila["Estado"];
if($valor2==$valor){

	$fila["id_Usuario"];

	$sql5=("select id_Usuario,Fact_Mora from registro_usuario where id_Usuario='".$fila['id_Usuario']."'");
$resultado1 = mysqli_query($connect,$sql5);

while ($fila = mysqli_fetch_assoc($resultado1)) {
	
	 $fila["Fact_Mora"];
	 $fila["id_Usuario"];
	$moraactual=$fila["Fact_Mora"];
	$moraa=1;
	$moraTotal=$moraactual+$moraa;
	$consulta=("update registro_usuario set Fact_Mora='$moraTotal', Asistencia=0 where id_Usuario='".$fila['id_Usuario']."'");
	$sql9=mysqli_query($connect,$consulta);	


	
}}


}



			
			 ?>	 

<?php
$sql1=("select `idconsumo_factura`,id_Usuario,Lectura_actual,`valor_total`, Estado from consumo_factura where idconsumo_factura='".$idconsumo_factura."'");
$resultado = mysqli_query($connect,$sql1);


while ($fila = mysqli_fetch_assoc($resultado)) {
 $valor8="Lista para Imprimir";
$valor29=$fila["Estado"];
if($valor29==$valor8){
$estado1="Lista para Recaudo";
$consulta=("Update consumo_factura set Estado='$estado1' where idconsumo_factura=".$idconsumo_factura."");
$sql1= mysqli_query($connect,$consulta);
}
}
}
?>
			 
	
	
			
	</div>				 
		
		
		</div>
		
</body>


</html>

<script>

</script>
<script>
window.print();


</script> 
