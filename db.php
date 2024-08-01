<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","root","","inventariogood");
// Check connection
if (mysqli_connect_errno())
  {
  echo "No se pudo conectar a MySQL: " . mysqli_connect_error();
  }
?>