<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
    <link rel="stylesheet" href="estilo_trabajadores.css">
</head>
<body>
    
<div class="conten">
  <div class="registro">
    <h1>FORMULARIO DE INSCRIPCIÓN DE TRABAJADORES</h1>	  
    <form action="CRUD_Trabajadores.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="example">Nombre Completo</label>
          <input type="text" class="form-control" name="Nombre_Trabajador">        
        </div>

        <div class="form-group">
          <label for="example">Apellido</label>
          <input type="text" class="form-control" name="Apellido_Trabajador">        
        </div>

        <div class="form-group">
          <label for="example">Dirección</label>
          <input type="text" class="form-control" name="Direccion_Trabajador">         
        </div>

        <div class="form-group">
          <label for="example">Edad</label>
          <input type="number" class="form-control" name="Edad_Trabajador">          
        </div>

        <div class="form-group">          
            <label>Sexo:</label><br>
            <label>Masculino</label>
            <input type="radio" name="Sexo_Trabajador" value="Masculino"><br>
            <label>Femenino</label>
            <input type="radio" name="Sexo_Trabajador" value="Femenino">        
        </div>

        <div class="form-group">
        <input type="submit" value="Guardar Trabajadores">
        <a href="CRUD_Trabajadores.php"><button type="button">Ir a CRUD de Trabajadores</button></a>
        </div>	
      </form>
  </div>
</div>
</body>
</html>