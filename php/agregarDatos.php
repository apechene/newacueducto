<?php 
 session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$mysqli = new mysqli ('172.17.0.1:3306','root','19921616','acueducto') or die(mysqli_error($mysqli)); 

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

$_SESSION['Message']=" El Usuario ha sido agregado con Exito, continue con la Generación de la Factura.";
$_SESSION['msg_type']= "success";

header("location:../Usuarios.php");


    
}

if(isset($_POST['edit'])){

    $id=$_POST['id'];
    
        $n=$_POST['nombreu'];
        $a=$_POST['apellidou'];
        $c=$_POST['cedulau'];
        $m=$_POST['medidoru'];
        $t=$_POST['tipomedidoru'];
        $e=$_POST['estratou'];
        $usert=$_POST['tipouseru'];
        $zona=$_POST['zonau'];
        $estado=$_POST['estadou'];

        $mysqli ->query ("UPDATE  registro_usuario set Nombre_usuario='$n',Apellido='$a',Indentificacion='$c',cod_medidor='$m',Tipo_medidor='$t',idEstrato='$e',idTipo_Usuario='$usert',zona='$zona',Estados='$estado' where id_Usuario='$id'") or die($mysqli->error);

        $_SESSION['Message']=" El Usuario ha sido Actualizado con Exito! :) .";
        $_SESSION['msg_type']= "success";

        header("location:../Usuarios.php");


    }

//echo count($_FILES["file0"]["name"]);exit;
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["fileToUpload"]["type"])){
$target_dir = "../IdUser/";
$carpeta=$target_dir;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
 
$target_file = $carpeta . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $errors[]= "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $errors[]= "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $errors[]="Lo sentimos, archivo ya existe.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 524288) {
    $errors[]= "Lo sentimos, el archivo es demasiado grande.  Tamaño máximo admitido: 0.5 MB";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $errors[]= "Lo sentimos, sólo archivos JPG, JPEG, PNG & GIF  son permitidos.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $errors[]= "Lo sentimos, tu archivo no fue subido.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       $messages[]= "El Archivo ha sido subido correctamente.";
       
       
    } else {
       $errors[]= "Lo sentimos, hubo un error subiendo el archivo.";
    }
}
 
if (isset($errors)){
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Error!</strong> 
      <?php
      foreach ($errors as $error){
          echo"<p>$error</p>";
      }
      ?>
    </div>
    <?php
}
 
if (isset($messages)){
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Aviso!</strong> 
      <?php
      foreach ($messages as $message){
          echo"<p>$message</p>";
      }
      ?>
    </div>
    <?php
}
}


 
 

 if(isset($_POST['id'])){
$idconsumo_factura=$_POST['id'];

$sql1=("select Estado from consumo_factura where idconsumo_factura=".$idconsumo_factura."");
$resultado = mysqli_query($conexion,$sql1);

while ($fila = mysqli_fetch_row($resultado)) {
    
    $valor="Lista para Recaudo";
    $valor2=$fila[0];
    if($valor2==$valor){
    //captura variable id enviada mediante el metodo REQUEST
    $sql="Update consumo_factura set Estado='Factura Recaudada' where idconsumo_factura=".$idconsumo_factura."";
    mysqli_query($conexion,$sql);
    $num=mysqli_affected_rows($conexion);
    
    if($num>0)  {
        echo " <div class='alert alert-success'> <h4>La Factura se recaudo exitosamente.";// retorna ok si el registro se actualizo correctamente 
		
					$sql11=("select `idconsumo_factura`,id_Usuario,`valor_total` from consumo_factura where idconsumo_factura=".$idconsumo_factura."");
					$resultado = mysqli_query($conexion,$sql11);
					while ($fila = mysqli_fetch_row($resultado)) {
						$fila[0];
						$fila[2];
						$fila[1];
						$hoy=date("Y-m-d");
					$sql8=("INSERT INTO recaudo(idconsumo_factura,`Valor Recaudado`,`tipo`,`Fecha`) values ( '".$fila[0]."','".$fila[2]."','Pago Total','".$hoy."')");
					mysqli_query($conexion,$sql8);
					$res = mysqli_insert_id($conexion);
				
					
					printf(" El recaudo se registro bajo el consecutivo 🔴🟢 N. %d\n 🔴🟢 . El Valor recaudado fue $".$fila[2]." 👌😎✔🤑 
					<div> 	<input type='submit' name='insert' id='getsoporte' id36=".$res." value='Imprimir soporte'  class='btn btn-warning'/> </div></div>", mysqli_insert_id($conexion));
				 
					$factmes=0;
					$sql9=("Update registro_usuario set Saldo_Actual='0', monthfact='$factmes'  where id_Usuario='".$fila[1]."'");
					mysqli_query($conexion,$sql9);
					$facven=0;
					$sq20=("Update registro_usuario set Fact_Mora='$facven' where id_Usuario='".$fila[1]."'");
					mysqli_query($conexion,$sq20);
			}
        
        }
    else{
        
		echo " <div class='alert alert-danger'>❌ Error en el Recaudo, no pudo ser procesado debido a que no sepudo actualizar elregistro en la BD, verifique por favor!🤷‍♀️😵 </div>";
    }

    




}


else{
    
    echo "<div class='alert alert-warning'>❌ La factura tiene un estado: '$valor2' que impide realizar el Recaudo, Valida el codigo ingresado. 😥😲</div>"; 

    }
    
    
}






}  





// para abono de facturas


if(isset($_POST['id12'])){

$idconsumo_factura=$_POST['id12'];
$valorpagado=$_POST['id13'];

if($valorpagado>0){

$sql1=("select Estado from consumo_factura where idconsumo_factura=".$idconsumo_factura."");
$resultado = mysqli_query($conexion,$sql1);

while ($fila = mysqli_fetch_row($resultado)) {
    
    $valor="Lista para Recaudo";
    $valor2=$fila[0];
    if($valor2==$valor){
    //captura variable id enviada mediante el metodo REQUEST
    $sql="Update consumo_factura set Estado='Factura Abonada' where idconsumo_factura=".$idconsumo_factura."";
    mysqli_query($conexion,$sql);
    $num=mysqli_affected_rows($conexion);
    
    if($num>0)  {
        echo " <div class='alert alert-success'>La Factura fue Abonada Exitosamente, Los cambios ya fueron procesados,";// retorna ok si el registro se actualizo correctamente 
        
        }
    else{
        echo "Error en el recaudo, Factura ya esta paga ";
    }

    

$sql11=("select `idconsumo_factura`,id_Usuario,`valor_total` from consumo_factura where idconsumo_factura=".$idconsumo_factura."");
$resultado = mysqli_query($conexion,$sql11);
while ($fila = mysqli_fetch_row($resultado)) {
     $fila[0];
     $fila[2];
     $fila[1];
     $oper=$fila[2]-$valorpagado;
    $hoy=date("Y-m-d");
$sql8=("INSERT INTO recaudo(idconsumo_factura,`Valor Recaudado`,`tipo`,`Fecha`) values ( '".$fila[0]."','".$valorpagado."','Abono a Factura','".$hoy."')");
mysqli_query($conexion,$sql8);
printf(" El Recaudo fue registrado con el Consecutivo N. %d\n ✔🤑</div>", mysqli_insert_id($conexion));
$factmes=0;
$sql9=("Update registro_usuario set Saldo_Actual='".$oper."',monthfact='$factmes' where id_Usuario='".$fila[1]."'");
mysqli_query($conexion,$sql9);
$facven=0;
$sq20=("Update registro_usuario set Fact_Mora='$facven' where id_Usuario='".$fila[1]."'");
mysqli_query($conexion,$sq20);
}



}


else{
    
    
    echo " <div class='alert alert-danger'>Error en el Recaudo, la Factura ingresada esta Vencida o tiene un estado que no permite recibir el pago, verifique por favor! 😫😢</div>";

    }
    
    
}
}

//     $mysqli ->query ("Update consumo_factura set Estado='Factura Recaudada' where idconsumo_factura=".$n."") or die($mysqli->error);

else{
	echo "<div class='alert alert-warning'>El valor Ingresado como abono es Invalido, el recaudo no se puede procesar.😓😓☹</div>";
}


}  


if(isset($_POST['savefact'])){

    $consulta="	SELECT `FacturaDian` FROM consumo_factura ORDER BY `idconsumo_factura` DESC LIMIT 1";
	$rs_tabla = mysqli_query($conexion,$consulta);
	$nrs=mysqli_num_rows($rs_tabla);
	$Multa=0;

	while($row= mysqli_fetch_assoc($rs_tabla)) {
        $coder=$row['FacturaDian'];
        
    }


    $n=$_POST['id_Usuario'];
    $a=$_POST['Fecha'];
    $c=$_POST['Lectura_anterior'];
    $m=$_POST['Lectura_actual'];
    $t=$_POST['consumo'];
    $e=$_POST['Minima'];
    $varu=$_POST['Valor_Unitario'];
    $fpago=$_POST['Fecha_Pago'];
    $multa=$_POST['Multa'];
    $santerior=$_POST['saldo_Anterior'];
    $vtotal=$_POST['valor_total'];
    $estado=$_POST['Estado'];
    $recaudo=$coder+1;
    
         $conexion ->query ("INSERT into  consumo_factura (id_Usuario,Fecha,Lectura_anterior,Lectura_actual,consumo,Minima,Valor_Unitario,Fecha_Pago,Multa,saldo_Anterior,valor_total,Estado,FacturaDian)
                                values ('$n','$a','$c','$m','$t','$e','$varu','$fpago','$multa','$santerior','$vtotal','$estado','$recaudo')");
    

    $num=mysqli_affected_rows($conexion);

    if($multa>0){
        $sq2=("Update registro_usuario set Multas='0' where id_Usuario='$n'");
         mysqli_query($conexion,$sq2);
    }  

    
   if($num>0){
    
    header("location:../facturar.php?condicion=succes");
    
    
        
    }
    else{

        header("location:../facturar.php?condicion=error");

    }
    
        $consulta="	SELECT Cuotas,`Saldo`,`Cuotas_Pagas`,Indentificacion FROM convenios JOIN registro_usuario ON convenios.`Cliente` = registro_usuario.Indentificacion WHERE id_Usuario='$n'";
	$rs_tabla = mysqli_query($conexion,$consulta);
	$nrs=mysqli_num_rows($rs_tabla);
	$Multa=0;

	while($row= mysqli_fetch_assoc($rs_tabla)) {
		$coutasp=$row['Cuotas'];
		$Saldop=$row['Saldo'];
        $Cuotaspg=$row['Cuotas_Pagas'];
        $cedula=$row['Indentificacion'];

		$pagado=$coutasp-$Cuotaspg;

        $Multa=$Saldop/$pagado;
        
        $nuevosaldo=$Saldop-$Multa;
        $nuevacuota=$Cuotaspg+1;

	}

    $sq1=("Update convenios set Saldo='$nuevosaldo',Cuotas_Pagas='$nuevacuota' where Cliente='$cedula'");
    mysqli_query($conexion,$sq1);
    }
    
    
    
    if(isset($_POST['saveconvenio'])){
    $n=$_POST['id_Usuario'];
    $a=$_POST['descripcion'];
    $c=$_POST['saldo'];
    $m=$_POST['cuotas'];
    $t=$_POST['fecha'];
    $V=$_POST['saldo'];
        
    $conexion ->query ("INSERT into convenios (Cliente,Descripcion,Saldo_Financiar,Cuotas,Fecha,Saldo)
                                values ('$n','$a','$c','$m','$t','$V')");
    

    $num=mysqli_affected_rows($conexion);



    
   if($num>0){
    
    header("location:../newconvenio.php?condicion=succes");
    
    
        
    }
    else{

        header("location:../newconvenio.php?condicion=error");

    }

    

}

if(isset($_POST['saveegreso'])){

    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','pdf');
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = '../uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'No fue posible subir elarchivo de soporte.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }

$_SESSION['message'] = $message;
header("Location: ../Egresos.php");

            $n=$_POST['Descripcion'];
            $a=$_POST['valor_egreso'];
            $c=$_POST['Fecha_Pago'];
            $m=$_POST['entidad'];
            $t=$_POST['comprobante'];
                
            $conexion ->query ("INSERT into egresos (Descripcion,Valor,Fecha,EntidadPagada,ReciboCaja)
                                        values ('$n','$a','$c','$m','$t')");


            $num=mysqli_affected_rows($conexion);




            if($num>0){

            header("location:../Egresos.php?condicion=succes");


                
            }
            else{

                header("location:../Egresos.php?condicion=error");

            } 

    

}


if(isset($_POST['id1'])){

    //para poder actualziar a false la nueva facturación 
    $factmes=0;
    $sqlq="Update registro_usuario set monthfact='$factmes' where Estados='Activo'";
    mysqli_query($conexion,$sqlq);
    $numk=mysqli_affected_rows($conexion);
    
    

    //captura variable id enviada mediante el metodo REQUEST
    $sql="Update consumo_factura set Estado='Factura Vencida' where Estado='Lista para Recaudo'";
    mysqli_query($conexion,$sql);
    $num=mysqli_affected_rows($conexion);
    
    if($num>0)  {
        echo " <div class='alert alert-success'>El proceso se realizo de Manera Exitosa 👌😎✔🤑";// retorna ok si el registro se actualizo correctamente 
		
								}
        
        
    else{
        
		echo " <div class='alert alert-danger'>❌ Error en proceso, es posible que haya Fallado la conexion a la Base de Datos o no hayan Facturas pendientes por Recaudar. !🤷‍♀️😵 </div>";
    }

    




}

//Para Anulación 

if(isset($_POST['id7'])){
    $idconsumo_factura=$_POST['id7'];
    
    $sql1=("select Estado from consumo_factura where idconsumo_factura=".$idconsumo_factura."");
    $resultado = mysqli_query($conexion,$sql1);
    
    while ($fila = mysqli_fetch_row($resultado)) {
        
        $valor="Lista para Imprimir";
        $valor2=$fila[0];
        if($valor2==$valor){
        //captura variable id enviada mediante el metodo REQUEST
        $sql="Update consumo_factura set Lectura_anterior='0', 	Lectura_actual='0', consumo='0', saldo_Anterior='0', valor_total='0', Estado='Factura Anulada' where idconsumo_factura=".$idconsumo_factura."";
        mysqli_query($conexion,$sql);
        $num=mysqli_affected_rows($conexion);
        
        if($num>0)  {
            echo " <div class='alert alert-success'>La Factura fue Anulada Exitosamente, los cambios ya fueron procesados. ✔✔👍";// retorna ok si el registro se actualizo correctamente 
            
                                        }
            
            
        else{
            
            echo " <div class='alert alert-danger'>❌ Error en la Anualción, no pudo ser procesado debido a que no sepudo actualizar elregistro en la BD, verifique por favor!🤷‍♀️😵 </div>";
        }
    
        
    
    
    
    
    }
    
    
    else{
        
        echo "<div class='alert alert-warning'>❌ La factura tiene un estado: '$valor2' que impide realizar la Anulación, Valida el codigo ingresado. 😥😲</div>"; 
    
        }
        
        
    }
    
    
    
    
    
    
    }  

     //Para CAMBIO DE ESTATUS 

if(isset($_POST['id97'])){
    $idconsumo_factura=$_POST['id97'];
    
    $sql1=("select Estado from consumo_factura where idconsumo_factura=".$idconsumo_factura."");
    $resultado = mysqli_query($conexion,$sql1);
    
    while ($fila = mysqli_fetch_row($resultado)) {
        
        $valor="Lista para Recaudo";
        $valor2=$fila[0];
        if($valor2==$valor){
        //captura variable id enviada mediante el metodo REQUEST
        $sql="Update consumo_factura set Estado='Lista para Imprimir' where idconsumo_factura=".$idconsumo_factura."";
        mysqli_query($conexion,$sql);
        $num=mysqli_affected_rows($conexion);
        
        if($num>0)  {
            echo " <div class='alert alert-success'>El Cambio de estado de la Factura se realizo de manera Exitosa, los cambios ya fueron procesados. ✔✔👍";// retorna ok si el registro se actualizo correctamente 
            
                                        }
            
            
        else{
            
            echo " <div class='alert alert-danger'>❌ Error en el cambio de estado, no pudo ser procesado debido a que no sepudo actualizar elregistro en la BD, verifique por favor..!🤷‍♀️😵 </div>";
        }
    
        
    
    
    
    
    }
    
    
    else{
        
        echo "<div class='alert alert-warning'>❌ La factura tiene un estado: '$valor2' que impide realizar el cambio de estado, Valida el codigo ingresado... 😥😲</div>"; 
        
    
        }
        
        
    }
    
    
    
    
    
    
    }  

    //para poder realizar anulación de pagos realizados 
    if(isset($_POST['id99'])){

        $sql1=("select idconsumo_factura from recaudo where idRecaudo=".$_POST['id99']."");
        $resultado = mysqli_query($conexion,$sql1);
        
        while ($fila = mysqli_fetch_row($resultado)) {
    
            $valor3=$fila[0];
    
        }
    
            $code=$_POST['id99'];
    
            //captura variable id enviada mediante el metodo REQUEST
            $sql="Update recaudo set `Valor Recaudado`='0',tipo='Anulado'  where idRecaudo=".$code."";
            mysqli_query($conexion,$sql);
            $num=mysqli_affected_rows($conexion);
    
            $sqls="Update consumo_factura set `Estado`='Lista para Imprimir' where idconsumo_factura=".$valor3."";
            mysqli_query($conexion,$sqls);
            $nums=mysqli_affected_rows($conexion);
            
            if($num>0)  {
                echo " <div class='alert alert-success'> El recaudo #$code se Anulo de Forma Exitosa. La factura #$valor3 actualizo su estado a Lista para Imprimir, Continúe el procedimiento. 👌😎✔🤑";// retorna ok si el registro se actualizo correctamente 
                
                                        }
                
                
            else{
                
                echo " <div class='alert alert-danger'>❌ Error en proceso, es posible que haya Fallado la conexion a la Base de Datos o no hayan Facturas pendientes por Recaudar. !🤷‍♀️😵 </div>";
            }
        
            
        
        
        
        
        
    }


    if(isset($_POST['idcon'])){

        $idconvenio=$_POST['idcon'];
        $cuotas=$_POST['nunc'];
        $des=$_POST['des'];

        
        if($cuotas>0){
        
                  
                          
            $sql="Update convenios set Descripcion='".$des."',Cuotas='".$cuotas."' where Id_Convenio=".$idconvenio."";
            mysqli_query($conexion,$sql);
            $num=mysqli_affected_rows($conexion);
            
            if($num>0)  {
                echo " <div class='alert alert-success'>La Actualización del convenio se realizo de Manera Exitosa!! 😎🎈🎈";// retorna ok si el registro se actualizo correctamente 
                
                }
            else{
                echo "Error en la Actualización, Revisa el estado del Convenio,$sql";
            }
        
            
        
        
        
        
        
        
        
        
        
            
            
        }
        
        
        //     $mysqli ->query ("Update consumo_factura set Estado='Factura Recaudada' where idconsumo_factura=".$n."") or die($mysqli->error);
        
        else{
            echo "<div class='alert alert-warning'>El valor Ingresado como abono es Invalido, el recaudo no se puede procesar.😓😓☹</div>";
        }
        
        
        }  


        if(isset($_POST['idasig'])){

            $m3asigna=$_POST['idasig'];
            $zona=$_POST['nunc'];
           
    
            
            if($m3asigna>0){
            
                      
                              
                $sql="Update registro_usuario set ConNmarcado=".$m3asigna." where zona=".$zona."";
                mysqli_query($conexion,$sql);
                $num=mysqli_affected_rows($conexion);
                
                if($num>0)  {
                    echo " <div class='alert alert-success'>La asignación de valores a esta zona se realizo de Manera Exitosa!! 😎🎈🎈";// retorna ok si el registro se actualizo correctamente 
                    
                    }
                else{
                    echo "<div class='alert alert-warning'>El valor Ingresado es invalido, la signación no se puede procesar.😓😓☹</div>,$sql";
                }
            
                
            
            
            
            
            
            
            
            
            
                
                
            }
            
            
            //     $mysqli ->query ("Update consumo_factura set Estado='Factura Recaudada' where idconsumo_factura=".$n."") or die($mysqli->error);
            
            else{
                echo "<div class='alert alert-warning'>El valor Ingresado es invalido, la signación no se puede procesar.😓😓☹</div>";
            }
            
            
            }



            if(isset($_POST['savepayment'])){

              
                $n=$_POST['referenciap'];
                $a=$_POST['valorp'];
                $c= "Activo";
                $currentDate = date("Y-m-d");
                     $conexion ->query ("INSERT into  registro_energia (Referencia,Valor,Fecha,Estado)
                                            values ('$n','$a','$currentDate','$c')");
                
            
                $num=mysqli_affected_rows($conexion);
            
            
            
                
               if($num>0){
                
                header("location:../Impenergia.php?condicion=succes");
                
                
                    
                }
                else{
            
                    header("location:../Impenergia.php?condicion=error");
            
                }
                
                 
                }

 ?>


<script>

$(document).ready(function(){
    
      $("#dataModal").on('hidden.bs.modal', function () {
    
    			 
                       location.reload();
   }); 

});


</script>

<script>

$(document).ready(function(){
    
      $("#dataModals").on('hidden.bs.modal', function () {
    
    			 
                       location.reload();
   }); 

});


</script>

<script>

$(document).ready(function(){
    
      $("#dataModalcierre").on('hidden.bs.modal', function () {
    
    			 
                       location.reload();
   }); 

});


</script>


<script>

        $(document).on('click', '#getsoporte', function(){

        var id15= $(this).attr("id36");

            $.ajax({
                url:"componentes/voucher.php",
                method:"post",
                data:{id15:id15},
                success:function(data){
                var newWindow = window.open("/Acueductonew/recaudo.php", "new window", "width=900, height=600");
        //write the data to the document of the newWindow
                newWindow.document.write(data);
                }
            });
        });

        
    </script>
