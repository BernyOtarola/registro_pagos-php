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

// Obtener datos del formulario
$deudor = $_POST["deudor"];
$cuota = $_POST["cuota"];
$cuota_capital = $_POST["cuota_capital"];
$fecha_pago = $_POST["fecha_pago"];

// Insertar nuevo pago en la tabla
$sql = "INSERT INTO pagos (deudor, cuota, cuota_capital, fecha_pago) VALUES ('$deudor', '$cuota', '$cuota_capital', '$fecha_pago')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo pago ingresado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión a la base de datos
$conn->close();

