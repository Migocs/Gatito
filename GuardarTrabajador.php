<?php
echo "<meta charset='UTF-8'>";

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_tra = $_POST['Nombre_Trabajador'];
    $apellido_tra = $_POST['Apellido_Trabajador'];
    $direccion_tra = $_POST['Direccion_Trabajador'];
    $edad_tra = $_POST['Edad_Trabajador'];
    $sexo_tra = $_POST['Sexo_Trabajador'];

    // Sanitizar los datos
    $nombre_tra = $conn->real_escape_string($nombre_tra);
    $apellido_tra = $conn->real_escape_string($apellido_tra);
    $direccion_tra = $conn->real_escape_string($direccion_tra);
    $edad_tra = $conn->real_escape_string($edad_tra);
    $sexo_tra = $conn->real_escape_string($sexo_tra);

    $sql = "INSERT INTO trabajadores (nombre, apellidos, direccion, edad, sexo) VALUES ('$nombre_tra', '$apellido_tra', '$direccion_tra', '$edad_tra', '$sexo_tra')";

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
    <a href="CRUD_Trabajadores.php"><button>Ir a Buscar</button></a>
</body>
</html>