<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM medicamentos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$med = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar medicamento</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="contenedor">
    <h2>Editar medicamento</h2>

    <form action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $med['id']; ?>">

        <input type="text" name="nombre" value="<?php echo $med['nombre']; ?>" required>

        <input type="text" name="categoria" value="<?php echo $med['categoria']; ?>" required>

        <input type="number" step="0.01" name="precio" value="<?php echo $med['precio']; ?>" required>

        <textarea name="descripcion"><?php echo $med['descripcion']; ?></textarea>

        <input type="number" name="stock" value="<?php echo $med['stock']; ?>" required>

        <select name="estado">
            <option <?php if($med['estado']=="Disponible") echo "selected"; ?>>Disponible</option>
            <option <?php if($med['estado']=="Restringido") echo "selected"; ?>>Restringido</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>

</div>

</body>
</html>