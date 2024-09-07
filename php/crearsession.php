<?php 
	session_start();

	$id_U=$_POST['valor'];

	$_SESSION['consulta']=$id_U;

	echo $id_U;

 ?>