<?php
include 'conexion.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM trabajadores WHERE id=$id";
    $result = $conn->query($sql);
    $trabajador = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['Nombre_Trabajador'];
    $apellido = $_POST['Apellido_Trabajador'];
    $direccion = $_POST['Direccion_Trabajador'];
    $edad = $_POST['Edad_Trabajador'];
    $sexo = $_POST['Sexo_Trabajador'];
    
    $sql = "UPDATE trabajadores SET nombre='$nombre', apellidos='$apellido', direccion='$direccion', edad='$edad', sexo='$sexo' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: CRUD_Trabajadores.php');
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
    <title>Editar Trabajador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Trabajador</h1>
    <form action="Formulario_Editar_Trabajadores.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $trabajador['id']; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="Nombre_Trabajador" value="<?php echo $trabajador['nombre']; ?>" required>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="Apellido_Trabajador" value="<?php echo $trabajador['apellidos']; ?>" required>
        
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="Direccion_Trabajador" value="<?php echo $trabajador['direccion']; ?>" required>
        
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="Edad_Trabajador" value="<?php echo $trabajador['edad']; ?>" required>
        
        <div class="form-group">          
            <label>Sexo:</label><br>
            <label>Masculino</label>
            <input type="radio" name="Sexo_Trabajador" value="Masculino" <?php echo ($trabajador['sexo'] == 'Masculino') ? 'checked' : ''; ?>><br>
            <label>Femenino</label>
            <input type="radio" name="Sexo_Trabajador" value="Femenino" <?php echo ($trabajador['sexo'] == 'Femenino') ? 'checked' : ''; ?>>        
        </div>
          
        <input type="submit" value="Actualizar Trabajador">
    </form>
    <a href="CRUD_Trabajadores.php"><button type="button">Volver</button></a>
</body>
</html>
