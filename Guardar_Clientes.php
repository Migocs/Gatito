<?php
echo "<meta charset='UTF-8'>";

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cli = $_POST['Nombre_clientes'];
    $apellido_cli = $_POST['Apellido_clientes'];
    $edad_cli = $_POST['Edad_clientes'];
    $sexo_cli = $_POST['Sexo_clientes'];

    // Sanitizar los datos
    $nombre_cli = $conn->real_escape_string($nombre_cli);
    $apellido_cli = $conn->real_escape_string($apellido_cli);
    $edad_cli = $conn->real_escape_string($edad_cli);
    $sexo_cli = $conn->real_escape_string($sexo_cli);

    $sql = "INSERT INTO clientes (nombre, apellidos, edad, sexo) VALUES ('$nombre_cli', '$apellido_cli', '$edad_cli', '$sexo_cli')";

    if ($conn->query($sql) === TRUE) {
        echo "Se registro un Nuevo Cliente";
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
    <a href="CRUD_Clientes.php"><button>Ir a Buscar</button></a>
</body>
</html>