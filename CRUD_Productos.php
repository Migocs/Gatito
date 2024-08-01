<?php
include 'conexion.php';
// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen'])) {
    $nombre = $_POST['Nombre_Producto'];
    $categoria = $_POST['Categoria_Producto'];
    $precio = $_POST['Precio_Producto'];
    $cantidad = $_POST['Cantidad_Producto'];

    // Subir la imagen
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        $imagen = $target_file;

        // Insertar datos
        $sql = "INSERT INTO productos (nombre, categoria, precio, cantidad, Imagen) VALUES ('$nombre', '$categoria', '$precio', '$cantidad', '$imagen')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo producto creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }


// Eliminar producto
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM productos WHERE id=$id";
    $conn->query($sql);
}

// Buscador
$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

// Obtener productos
$sql = "SELECT * FROM productos WHERE id LIKE '%$search%' OR nombre LIKE '%$search%' OR categoria LIKE '%$search%' OR precio LIKE '%$search%' OR cantidad LIKE '%$search%'";
$result = $conn->query($sql);

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="estilo.crud.css">
</head>
<body>
    <h1>Lista de Productos</h1>

    <!-- Formulario de búsqueda -->
    <form action="CRUD_Productos.php" method="POST">
        <input type="text" name="search" placeholder="Buscar..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Buscar">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['categoria']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><img src="<?php echo $row['Imagen']; ?>" width="100" height="100" alt="Imagen del producto"></td>
            <td>
                <a href="Formulario_Editar.php?edit=<?php echo $row['id']; ?>">Editar</a>
                <a href="CRUD_Productos.php?delete=<?php echo $row['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="Formulario_Productos.php"><button type="button">Agregar Nuevo Producto</button></a>
    <a href="Catalogo_Productos.php"><button type="button">Ir al Catálogo</button></a>
</body>
</html>
