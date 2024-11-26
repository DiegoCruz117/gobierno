<?php 

$host ="localhost";
$user = "root";
$contrasena = "";
$bd = "gobierno1";


$conectar = mysqli_connect($host, $user, $contrasena,$bd);


if(!$conectar){
  echo "no se pudo conectar a la base de datos";
}


?>