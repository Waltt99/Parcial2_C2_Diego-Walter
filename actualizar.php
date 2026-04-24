<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$estado = $_POST['estado'];

$sql = "UPDATE medicamentos 
SET nombre=?, categoria=?, precio=?, descripcion=?, stock=?, estado=? 
WHERE id=?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssdsssi", $nombre, $categoria, $precio, $descripcion, $stock, $estado, $id);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error al actualizar";
}
?>