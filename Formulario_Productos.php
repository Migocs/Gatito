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
    <h1>FORMULARIO DE INSCRIPCIÓN DE PRODUCTOS</h1>	  
<form action="CRUD_Productos.php" method="post" enctype="multipart/form-data">
  
        <div class="form-group">
          <label for="example">Nombre Del Producto</label>
          <input type="text" class="form-control" name="Nombre_Producto">        
        </div>

        <div class="form-group">
          <label for="example">Categoria</label>
          <input type="text" class="form-control" name="Categoria_Producto">       
        </div>

        <div class="form-group">
          <label for="example">Precio</label>
          <input type="number" class="form-control" name="Precio_Producto">         
        </div>
        
        <div class="form-group">
          <label for="example">Cantidad</label>
          <input type="Number" class="form-control" name="Cantidad_Producto">         
        </div>
        <div class="form-group">
          <label for="imagen">Imagen:</label><br>
          <input type="file" id="imagen" name="imagen" accept="image/*" required><br><br>     
        </div>
        

        <div class="form-group">
        <input type="submit" value="Guardar Producto">
        <a href="CRUD_Productos.php"><button type="button">Ir a CRUD de Productos</button></a>
        </div>	
      </form>
  </div>
</div>


</body>
</html>
