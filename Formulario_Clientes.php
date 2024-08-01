<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
    <link rel="stylesheet" href="estilo.crud.css">
</head>
<body>
    
<div class="conten">
  <div class="registro">
    <h1>FORMULARIO DE INSCRIPCIÓN DE CLIENTES</h1>	  
    <form method="POST" action="Guardar_Clientes.php">
        <div class="form-group">
          <label for="example">Nombre Completo</label>
          <input type="text" class="form-control" name="Nombre_clientes" required>        
        </div>

        <div class="form-group">
          <label for="example">Apellido</label>
          <input type="text" class="form-control" name="Apellido_clientes" required>         
        </div>

        <div class="form-group">
          <label for="example">Edad</label>
          <input type="number" class="form-control" name="Edad_clientes" required>         
        </div>


        <div class="form-group">          
            <label>Sexo:</label>
            <label>Masculino</label>
            <input type="radio" name="Sexo_clientes" value="Masculino"><br>
            <label>Femenino</label>
            <input type="radio" name="Sexo_clientes" value="Femenino">        
        </div>

        <div class="form-group">
        <input type="submit" value="Guardar Clientes">
        <a href="CRUD_Clientes.php"><button type="button">Ir a CRUD de Clientes</button></a>
        </div>
      </form>
  </div>
</div>
</body>
</html>