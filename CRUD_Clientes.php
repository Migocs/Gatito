<?php
include 'conexion.php';

// Procesar el formulario para insertar un nuevo cliente
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Nombre_Trabajador'])) {
    $nombre = $_POST['Nombre_clientes'];
    $apellido = $_POST['Apellido_clientes'];
    $edad = $_POST['Edad_clientes'];
    $sexo = $_POST['Sexo_clientes'];

    // Insertar datos
    $sql = "INSERT INTO clientes (nombre, apellidos, edad, sexo) VALUES ('$nombre', '$apellido', '$edad', '$sexo')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo cliente registrado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Eliminar Cliente
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM clientes WHERE id=$id";
    $conn->query($sql);
}

// Buscador
$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

// Obtener Clientes
$sql = "SELECT * FROM clientes WHERE id LIKE '%$search%' OR nombre LIKE '%$search%' OR apellidos LIKE '%$search%' OR edad LIKE '%$search%' OR sexo LIKE '%$search%'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Clientes</title>
    <link rel="stylesheet" href="estilo.crud.css">
</head>
<body>
    <h1>Lista de Clientes</h1>

    <!-- Formulario de búsqueda -->
    <form action="CRUD_Clientes.php" method="POST">
        <input type="text" name="search" placeholder="Buscar..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Buscar">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellidos']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['sexo']; ?></td>
            <td>
                <a href="Formulario_Editar_Clientes.php?edit=<?php echo $row['id']; ?>">Editar</a>
                <a href="CRUD_Clientes.php?delete=<?php echo $row['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="Formulario_Clientes.php"><button type="button">Agregar Nuevo Trabajador</button></a>
</body>
</html>
