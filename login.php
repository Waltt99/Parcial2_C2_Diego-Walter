<?php
include("conexion.php");

// Consulta de medicamentos
$sql = "SELECT * FROM medicamentos ORDER BY nombre ASC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Farmacia Brasil</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="contenedor login-box">

    <h2>Iniciar sesión</h2>

    <form action="validar_login.php" method="POST">
        <label>Usuario</label>
        <input type="text" name="usuario" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <button type="submit">Ingresar</button>
    </form>

    <a class="btn-secundario" href="index.php">Volver</a>

</div>

<!-- TABLA SOLO VISUAL -->
<div class="contenedor">

    <h2>Medicamentos disponibles</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Estado</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['categoria']; ?></td>
            <td>$<?php echo $fila['precio']; ?></td>
            <td><?php echo $fila['descripcion']; ?></td>
            <td><?php echo $fila['stock']; ?></td>
            <td><?php echo $fila['estado']; ?></td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>