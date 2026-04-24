<?php
$conexion = new mysqli("localhost", "root", "", "farmacia_brasil");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
else {
    // echo "Conexión exitosa a la base de datos.";
}

$conexion->set_charset("utf8");
?>