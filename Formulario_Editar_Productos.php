<?php
include 'conexion.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM productos WHERE id=$id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $Nombre = $_POST['Nombre_Producto'];
    $Categoria = $_POST['Categoria_Producto'];
    $Precio = $_POST['Precio_Producto'];
    $Cantidad = $_POST['Cantidad_Producto'];
    
    // Subir la imagen si se ha cambiado
    if ($_FILES['imagen']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        $imagen = $target_file;
        $sql = "UPDATE productos SET nombre='$Nombre', categoria='$Categoria', precio='$Precio', cantidad='$Cantidad', Imagen='$imagen' WHERE id=$id";
    } else {
        $sql = "UPDATE productos SET nombre='$Nombre', categoria='$Categoria', precio='$Precio', cantidad='$Cantidad' WHERE id=$id";
    }
    
    if ($conn->query($sql) === TRUE) {
        header('Location: CRUD_Productos.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="estilo.crud.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="Formulario_Editar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="Nombre_Producto" value="<?php echo $product['nombre']; ?>" required>
        
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="Categoria_Producto" value="<?php echo $product['categoria']; ?>" required>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="Precio_Producto" step="0.01" value="<?php echo $product['precio']; ?>" required>
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="Cantidad_Producto" value="<?php echo $product['cantidad']; ?>" required>
        
        <label for="imagen">Imagen (dejar en blanco para mantener la imagen actual):</label><br>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>
          
        <input type="submit" value="Actualizar Producto">
    </form>
    <a href="CRUD_Productos.php"><button type="button">Volver</button></a>
</body>
</html>
