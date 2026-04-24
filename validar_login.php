<?php
session_start();
include("conexion.php");

$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);

if (empty($usuario) || empty($password)) {
    echo "Todos los campos son obligatorios";
    exit();
}

// Consulta segura
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
$stmt->bind_param("ss", $usuario, $password);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $_SESSION['usuario'] = $usuario;

    // 🔥 REDIRECCIÓN CORRECTA
    header("Location: index.php");
    exit();
} else {
    echo "Usuario o contraseña incorrectos";
}
?>