<?php
// Configuración de la conexión a la base de datos (ajusta los valores según tu entorno)
$servername = "localhost";
$username = "root";
$password = "";
$database = "registro_pagos";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener todos los registros de la tabla pagos
$sql = "SELECT * FROM pagos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pagos</title>
</head>
<body>
    <h1>Registro de Pagos</h1>

    <!-- Tabla para mostrar los registros -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Deudor</th>
            <th>Cuota</th>
            <th>Cuota Capital</th>
            <th>Fecha de Pago</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["deudor"]."</td><td>".$row["cuota"]."</td><td>".$row["cuota_capital"]."</td><td>".$row["fecha_pago"]."</td></tr>";
            }
        } else {
            echo "0 resultados";
        }
        ?>
    </table>

    <h2>Ingresar Nuevo Pago</h2>
    <!-- Formulario para ingresar nuevos pagos -->
    <form action="insertar_pago.php" method="post">
        Deudor: <input type="text" name="deudor"><br>
        Cuota: <input type="text" name="cuota"><br>
        Cuota Capital: <input type="text" name="cuota_capital"><br>
        Fecha de Pago: <input type="date" name="fecha_pago"><br>
        <input type="submit" value="Ingresar Pago">
    </form>

</body>
</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>
