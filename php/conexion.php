<?php 

function conexion(){
	 $servidor="192.168.5.6";
	 $usuario="root";
	 $bd="acueducto";
	 $password="19921616";

	$conexion=mysqli_connect($servidor,$usuario,$password,$bd) or die(mysqli_error($conexion));

	return $conexion;
} 
	
?>
