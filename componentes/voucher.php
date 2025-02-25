<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Venta</title>
    <style>

	    
        body {
            font-family: 'Courier New', monospace;
    	    font-size: 14px; /* Ajusta el tamaño según sea necesario */
            line-height: 1.2; /* Ajusta el espaciado entre líneas */
            background-color: #f8f8f8;
        }
        .ticket {
            width: 250px;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin: auto;
        }
        .ticket h1 {
            font-size: 20px;
            font-weight: bold;
        }
        .ticket p {
            font-size: 14px;
            margin: 5px 0;
        }
        .ticket .bold {
            font-weight: bold;
        }
        .separator {
            border-top: 1px dashed black;
            margin: 10px 0;
        }
    </style>

    <?php
require_once "../php/conexion.php";
$connect = conexion(); 
if (isset($_POST["id15"])) {  
    $output = '';  
?>

<?php
    $id = $_POST['id15'];
?>
    
</head>
<body>
    <?php
    $consulta = "SELECT `idconsumo_factura`, `Valor Recaudado`, `Fecha` FROM `recaudo` WHERE `idRecaudo` = '".$id."'";
    $sql = mysqli_query($connect, $consulta);
    while ($row = mysqli_fetch_array($sql)) {
        $fecha = $row['Fecha'];
        $Valor = $row['Valor Recaudado'];
        $factura = $row['idconsumo_factura'];
    }
    ?>

<div class="ticket">
    <h3>Acueducto San Roque</h3>
    <p class="bold">Comprobante de Recaudo</p>
    <p>Fecha: <?php echo date('j-m-y'); ?></p>
    <p>Hora: <?php echo date("H:i:s"); ?></p>
    <p>Factura: <?php echo $factura; ?> </p>
    <p>Cod. exito.: <?php echo $id; ?> </p>
    <p>Valor: $<?php echo $Valor; ?> </p>
    <div class="separator"></div>
    <p>Gracias por tu Pago!</p>
    <p></p>
</div>
    

</body>
</html>
<?php
}
?>
<script>
    window.print();
</script>
