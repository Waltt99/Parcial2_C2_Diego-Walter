<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$nombre = trim($_POST['nombre']);
$categoria = trim($_POST['categoria']);
$precio = trim($_POST['precio']);
$descripcion = trim($_POST['descripcion']);
$stock = trim($_POST['stock']);
$estado = trim($_POST['estado']);

if (empty($nombre) || empty($categoria) || empty($precio) || $stock === "" || empty($estado)) {
    echo "Todos los campos obligatorios deben completarse";
    exit();
}

if (!is_numeric($precio) || $precio <= 0) {
    echo "El precio debe ser válido";
    exit();
}

if (!is_numeric($stock) || $stock < 0) {
    echo "El stock debe ser válido";
    exit();
}

if ($descripcion == "") {
    $descripcion = NULL;
}

// 🔥 AQUÍ ESTABA EL ERROR → faltaba estado
$stmt = $conexion->prepare("INSERT INTO medicamentos (nombre, categoria, precio, descripcion, stock, estado) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssdsis", $nombre, $categoria, $precio, $descripcion, $stock, $estado);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Error al guardar el medicamento";
}
?>