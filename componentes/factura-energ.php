<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>

	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Puntored</title>
	

    <link rel='stylesheet' type='text/css' href='./ccs/styles.css' />
	<link rel='stylesheet' type='text/css' href='./ccs/print.css' media="print" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 	<link href="https://fonts.googleapis.com/css?family=Cantarell&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css">
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
			$consulta=("SELECT Referencia,Valor,Fecha FROM registro_energia 
            WHERE Id ='".$id."'");
			$sql=mysqli_query($connect,$consulta);
while($row=mysqli_fetch_array($sql)){

    $referencia= $row['Referencia'];
    $Valor= $row['Valor'];


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

                 <td>ESP - ENERGIA
COMP ENERGETICA
DE OCCIDENTE
POPAYAN       </td>

                </tr>

                <tr>
                <td>Cod. Convenio     </td>

                 <td>5006       </td>

                </tr>

                <tr>
                <td>Comercio     </td>

                 <td>355583     </td>

                </tr>

                <tr>
                <td>No. aprob Banco     </td>
                <?php $six = random_int(100000, 999999);?>
                 <td><?php echo $six?>    </td>

                </tr>

                <tr>
                <td>Referencia     </td>

                 <td><?php echo $referencia ?>       </td>

                </tr>

                <tr>
                <td>No. aprob Puntored   </td>

                <?php $seven = random_int(100000, 999999);?>
                 <td><?php echo $seven?>      </td>

                </tr>

                <tr>
                <td>Valor     </td>

                 <td>$ <?php echo $Valor?>      </td>

                </tr>

                <tr>
                <td>Usuario de Venta     </td>

                 <td>MULTISERVICIOS
SAN      </td>

                </tr>
				</table>



		<div align="center" class="pago2">
		  <h2>
          Línea de atención Nacional
01 8000 512825 Opción 2
Email:
corresponsalesaval@encontacto.
co
BANCO DE OCCIDENTE
VIGILADO SUPERINTENDENCIA
FINANCIERA DE COLOMBIA

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

</script>
<script>
window.print();


</script> 
