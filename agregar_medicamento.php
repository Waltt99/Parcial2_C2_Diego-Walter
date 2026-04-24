<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar medicamento</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="contenedor form-box">
        <h2>Registrar medicamento</h2>

        <form action="guardar_medicamento.php" method="POST">
            <label>Nombre del medicamento</label>
            <input type="text" name="nombre" required>

            <label>Categoría</label>
            <select name="categoria" required>
                <option value="">Seleccione una categoría</option>
                <option value="Analgésico">Analgésico</option>
                <option value="Antiinflamatorio">Antiinflamatorio</option>
                <option value="Antibiótico">Antibiótico</option>
                <option value="Antialérgico">Antialérgico</option>
                <option value="Suplemento">Suplemento</option>
            </select>

            <label>Precio</label>
            <input type="number" name="precio" step="0.01" min="0.01" required>

            <label>Descripción</label>
            <textarea name="descripcion"></textarea>

            <label>Stock</label>
            <input type="number" name="stock" min="0" required>

            <label>Estado de venta</label>
            <div class="radio-group">
                <input type="radio" name="estado" value="Disponible" required> Disponible
                <input type="radio" name="estado" value="Restringido" required> Restringido
            </div>

            <button type="submit">Guardar medicamento</button>
        </form>

        <a class="btn-secundario" href="dashboard.php">Volver al panel</a>
    </div>
</body>
</html>