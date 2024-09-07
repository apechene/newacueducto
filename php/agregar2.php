<?php 

$mysqli = new mysqli ('localhost','root','','acueducto') or die(mysqli_error($mysqli)); 

if(isset($_POST['insert'])){
$n=$_POST['nombre'];
$a=$_POST['apellido'];
$c=$_POST['cedula'];
$m=$_POST['medidor'];
$t=$_POST['tipomedidor'];
$e=$_POST['estrato'];
$usert=$_POST['tipouser'];
$zona=$_POST['zona'];
$estado=$_POST['estados'];

	$mysqli ->query ("INSERT into  registro_usuario (Nombre_usuario,Apellido,Indentificacion,cod_medidor,Tipo_medidor,idEstrato,idTipo_Usuario,zona,Estados)
							values ('$n','$a','$c','$m','$t','$e','$usert','$zona','$estado')") or die($mysqli->error);

	
}

 ?>



<?php 

session_start();
    require_once "conexion.php";
    $conexion=conexion();
$n=$_POST['nombre'];
$a=$_POST['apellido'];
$c=$_POST['cedula'];
$m=$_POST['medidor'];
$t=$_POST['tipomedidor'];
$e=$_POST['estrato'];
$usert=$_POST['tipouser'];
$zona=$_POST['zona'];
$estado=$_POST['estados'];



    $sql="INSERT into  registro_usuario (Nombre_usuario,Apellido,Indentificacion,cod_medidor,Tipo_medidor,idEstrato,idTipo_Usuario,zona,Estados)
                            values ('$n','$a','$c','$m','$t','$e','$usert','$zona','$estado')";


    echo $result=mysqli_query($conexion,$sql);

$_SESSION['Message']="Usuario ha sido agregado con Exito, continue con la Generaciòn de la Factura.";
$_SESSION['msg_type']= "success";

header("location:Usuarios.php");

 ?>
