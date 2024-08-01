<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
<style>
    body {
        background-image: url('images/SETTORI-OPERATIVI-TECNOLOGY.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
        height: 100vh;
    }

    .formulario {
        background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con 80% de opacidad */
        border-radius: 10px; /* Bordes redondeados */
        padding: 20px; /* Espaciado interno */
        max-width: 400px; /* Ancho máximo del formulario */
        margin: 100px auto 0 auto; /* Centra el formulario y añade espaciado desde el top */
        text-align: center; /* Centra el texto */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Sombra sutil */
    }

    .formulario h1 {
        margin-bottom: 20px; /* Espaciado inferior */
    }

    .username, .contraseña {
        margin: 10px 0; /* Margen para separar los elementos */
    }

    .username input, .contraseña input {
        width: calc(100% - 22px); /* Ajusta el ancho del input */
        padding: 10px; /* Espaciado interno */
        border: 1px solid #ddd; /* Borde de color gris claro */
        border-radius: 5px; /* Bordes redondeados */
        box-sizing: border-box; /* Incluye el padding y el border en el ancho total del elemento */
    }

    .iniciar {
        margin: 20px 0; /* Margen superior e inferior para el botón */
    }

    .iniciar button {
        padding: 10px 20px; /* Espaciado interno del botón */
        background-color: #007BFF; /* Color de fondo del botón */
        color: #fff; /* Color del texto del botón */
        border: none; /* Sin borde */
        border-radius: 5px; /* Bordes redondeados */
        cursor: pointer; /* Cambia el cursor a mano al pasar sobre el botón */
        font-size: 16px; /* Tamaño de fuente del botón */
    }

    .iniciar button:hover {
        background-color: #0056b3; /* Color de fondo del botón al pasar el mouse */
    }

    .formulario p {
        margin: 10px 0; /* Margen para separar los párrafos */
    }

    .registrarse a {
        color: #007BFF; /* Color del enlace */
        text-decoration: none; /* Sin subrayado */
        font-size: 16px; /* Tamaño de fuente del enlace */
    }

    .registrarse a:hover {
        text-decoration: underline; /* Subraya el enlace al pasar el mouse */
    }
</style>
</head>
<body>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
         
	    header("Location: principal.php");
         }else{
	echo "<div class='formulario'>
<center><h3>El nombre de usuario/contraseña es incorrecto</h3>
<br><br><img src='images/denegado1.png'><br><br><br><br><center>Click aquí para <a href='index.php'>Volver Intentar</a></div></center>";
	}
    }else{
?>
<div class="formulario">
<h1>Inicio de sesión</h1>
<form action="" method="post" name="login">
    <div class="username">
        <input type="text" name="username" placeholder="Username" required />
    </div>
    <div class="contraseña">
        <input type="password" name="password" placeholder="Password" required />
    </div>
    <div class="iniciar">
        <button type="submit" name="submit">Iniciar</button>
    </div>
    <p>O</p>
    <div class="registrarse">
        <a href='registration.php'>Registrarse</a>
    </div>
</form>
</div>
<?php } ?>
</body>
</html>