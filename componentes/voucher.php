<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>

	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Puntored</title>
	

    <link rel='stylesheet' type='text/css' href='./ccs/styles.css' />
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
		
$id=$_POST['id15'];

?>

<body>






	<div id="printableArea">
<div class="ticket">

	<div id="page-wrap">

		<h5 align="center"> TRANSACCIÓN EXITOSA</h5>
	


		</body>
            <table style=" border: 0px !important;">
                
                    <td>Fecha    </td>
                    <td><?php
			$consulta=("SELECT `idconsumo_factura`,`Valor Recaudado`,`Fecha` FROM `recaudo` WHERE `idRecaudo` ='".$id."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

    $fecha= $row['Fecha'];
    $Valor= $row['Valor Recaudado'];
    $factura=$row['idconsumo_factura'];

echo "<h4>".$row['Fecha']."</h4>"; }



					  ?></td>
                
				<tr>
                    <td>HORA    </td>
					<?php $hoy=date('H:i');?>
                    <td><?php echo $hoy?></td>
                </tr>


                <tr>
                <td>Terminal     </td>

                 <td>268333     </td>

                </tr>

                <tr>
                <td>Convrenio     </td>

                 <td>ACUEDUCTO VEREDAL      </td>

                </tr>

                <tr>
                <td>Cod. Convenio     </td>

                 <td>001       </td>

                </tr>

                <tr>
                <td>Comercio     </td>

                 <td>355583     </td>

                </tr>

                <tr>
                <td>Aprobación sistema     </td>
                <?php $six = random_int(100000, 999999);?>
                 <td><?php echo $id?>    </td>

                </tr>

                <tr>
                <td>Factura pagada     </td>

                 <td><?php echo $factura ?>       </td>

                </tr>

                <tr>
                <td>Valor     </td>

                 <td>$ <?php echo $Valor?>      </td>

                </tr>

                <tr>
                <td>Usuario     </td>

                 <td>Rv5sistem    </td>

                </tr>
				</table>

   <div>
	   <h3> Consulta Datos financieros del Acueducto 
		   y une a nuestro Canal en WhatsApp usando el enlace bit.ly/m/sanroque </h3>
	   Escanea el QR: 
<div class="alinear-img">
<img src="./img/qrs.png" alt="QR Code" width="200" height="200">

</div>
   </div>

		<div align="center" class="pago2">
		  <h2>
          Sistema de información
          Acueducto San Roque
          Conserve esta tirilla-
          Es su unico soporte de Pago. 
          2024

</h2>
		</div>

			
			
			
                   
				  
		<?php	
			


	
}



			
			 ?>	 
			 
	
	
			
	</div>				 
		
		
		</div>
		
</body>


</html>


<script>
    window.print();

    // Espera 5 segundos (5000 milisegundos) antes de cerrar la ventana
    setTimeout(function() {
        // Verifica si la ventana fue abierta por un script
        if (window.history.length === 1) {
            window.close();
        }
    }, 5000);  // 5000 milisegundos = 5 segundos
</script>
