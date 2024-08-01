<?php
echo "<meta charset='UTF-8'>";

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_pro = $_POST['Nombre_Producto'];
    $categoria_pro = $_POST['Categoria_Producto'];
    $precio_pro = $_POST['Precio_Producto'];
    $cantidad_pro = $_POST['Cantidad_Producto'];

    // Sanitizar los datos
    $nombre_pro = $conn->real_escape_string($nombre_pro);
    $categoria_pro = $conn->real_escape_string($categoria_pro);
    $precio_pro = $conn->real_escape_string($precio_pro);
    $cantidad_pro = $conn->real_escape_string($cantidad_pro);

    $sql = "INSERT INTO productos (nombre, categoria, precio, cantidad) VALUES ('$nombre_pro', '$categoria_pro', '$precio_pro', '$cantidad_pro')";

    if ($conn->query($sql) === TRUE) {
        echo "Se agregó un nuevo registro satisfactoriamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=""></form>
    <a href="CRUD_Productos.php"><button>Ir a Buscar</button></a>
</body>
</html>