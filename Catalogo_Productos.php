<?php
include 'conexion.php';

// Obtener productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Catálogo de Productos</h1>
    <div class="catalogo">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="producto">
            <h2><?php echo $row['nombre']; ?></h2>
            <img src="<?php echo $row['Imagen']; ?>" width="200" height="200">
            <p><?php echo $row['categoria']; ?></p>
            <p>Precio: <?php echo $row['precio']; ?></p>
            <p>Cantidad: <?php echo $row['cantidad']; ?></p>
        </div>
        <?php endwhile; ?>
    </div>
    <a href="CRUD_Productos.php"><button type="button">Ir a CRUD</button></a>
</body>
</html>
