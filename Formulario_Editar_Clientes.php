<?php
include 'conexion.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM clientes WHERE id=$id";
    $result = $conn->query($sql);
    $cliente = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['Nombre_clientes'];
    $apellido = $_POST['Apellido_clientes'];
    $edad = $_POST['Edad_clientes'];
    $sexo = $_POST['Sexo_clientes'];
    
    $sql = "UPDATE clientes SET nombre='$nombre', apellidos='$apellido', edad='$edad', sexo='$sexo' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: CRUD_Clientes.php');
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
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="estilo.crud.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="Formulario_Editar_Clientes.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="Nombre_clientes" value="<?php echo $cliente['nombre']; ?>" required>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="Apellido_clientes" value="<?php echo $cliente['apellidos']; ?>" required>
        
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="Edad_clientes" value="<?php echo $cliente['edad']; ?>" required>
        
        <div class="form-group">          
            <label>Sexo:</label><br>
            <label>Masculino</label>
            <input type="radio" name="Sexo_clientes" value="Masculino" <?php echo ($cliente['sexo'] == 'Masculino') ? 'checked' : ''; ?>><br>
            <label>Femenino</label>
            <input type="radio" name="Sexo_clientes" value="Femenino" <?php echo ($cliente['sexo'] == 'Femenino') ? 'checked' : ''; ?>>        
        </div>
          
        <input type="submit" value="Actualizar Cliente">
    </form>
    <a href="CRUD_Clientes.php"><button type="button">Volver</button></a>
</body>
</html>
