<?php
session_start();
include("conexion.php");

// Consulta
$sql = "SELECT * FROM medicamentos ORDER BY nombre ASC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Farmacia Brasil</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="contenedor">

    <!-- HEADER -->
    <div class="header">
        <!-- RUTA CORREGIDA (RELATIVA, NO FALLA) -->
        <img src="img/logo.jpg" alt="Logo Farmacia Brasil" class="logo">
        <h1>Farmacia Brasil</h1>
    </div>

    <h2>Listado de medicamentos</h2>

    <!-- CONTROL DE SESIÓN -->
    <?php if (isset($_SESSION['usuario'])) { ?>
        <p>Usuario: <?php echo $_SESSION['usuario']; ?></p>

        <a class="btn" href="agregar_medicamento.php">Agregar medicamento</a>
        <a class="btn-secundario" href="cerrar_sesion.php">Cerrar sesión</a>
    <?php } else { ?>
        <a class="btn" href="login.php">Iniciar sesión</a>
    <?php } ?>

    <!-- TABLA -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Descripción</th>

            <!-- SOLO SI HAY SESIÓN -->
            <?php if (isset($_SESSION['usuario'])) { ?>
                <th>Acciones</th>
            <?php } ?>

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
           

            <!-- BOTONES SOLO SI HAY SESIÓN -->
            <?php if (isset($_SESSION['usuario'])) { ?>
            <td>
                <a class="btn" href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>
                <a class="btn-secundario" href="eliminar.php?id=<?php echo $fila['id']; ?>">Eliminar</a>
            </td>
            <?php } ?>

            <td><?php echo $fila['stock']; ?></td>
            <td><?php echo $fila['estado']; ?></td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>