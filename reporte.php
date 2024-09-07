<!DOCTYPE html>
<html>
<head>
    <title>Consulta con fecha</title>
</head>
<body>
    <label for="fecha">Ingrese una fecha:</label>
    <input type="date" id="fecha" name="fecha" >
    <button onclick="consultar()">Consultar</button>
    <div id="resultados"></div>

    <script>
        function consultar() {
            var fecha = document.getElementById("fecha").value;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 500) {
                    document.getElementById("resultados").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "consultar.php?fecha=" + fecha, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>
