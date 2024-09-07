<?php

require_once "/php/conexion.php";


if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];

    // Conexión a la base de datos
   $conexion=conexion(); 

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Escapa la fecha para prevenir inyecciones SQL
    $fecha = $conexion->real_escape_string($fecha);

    // Consulta utilizando la fecha recibida
    $query = "SELECT SUM(`consumo`) AS consumo_mes
FROM consumo_factura WHERE DATE_FORMAT(`Fecha`, '%Y-%m') = $fecha'";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            // Procesa cada fila de resultados
            echo "ID: " . $fila['id'] . " - Fecha: " . $fila['fecha_registro'] . "<br>";
        }
    } else {
        echo "No se encontraron resultados para la fecha ingresada.";
    }

    $conexion->close();
}
?>
Con este enfoque, la página no se recargará por completo, y los resultados de la consulta se mostrarán directamente en la sección "resultados" de la página después de hacer clic en el botón "Consultar".





