<?php 

session_start();
require_once "conexion.php";
$conexion=conexion(); 

$usuario=$_POST['usuario'];
$pass=$_POST['password'];

$sql="SELECT * from users where Correo='$usuario' and password='$pass'";
$result=mysqli_query($conexion,$sql);

        if(mysqli_num_rows($result)>0){

            $_SESSION['user']=$usuario;
            echo 1;
                    }

        else{

            echo 0;
        }








?>