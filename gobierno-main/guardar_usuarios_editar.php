<?php

require "conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$fecha = $_POST['fecha'];
/*
echo $id ."<br>";
echo $nombre ."<br>";
echo $apellidos ."<br>";
echo $correo ."<br>";
echo $contrasena ."<br>";
echo $fecha ."<br>";*/

$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);


$actualizar = "UPDATE registro SET nombre = '$nombre', apellido = '$apellido', correo = '$correo',contrasena = '$contrasena_encriptada', fecha = '$fecha' WHERE id = '$id'";

$query = mysqli_query($conectar, $actualizar);

if ($query){
  echo '
    <script>
      alert("se actualizaron los datos correctamente");
      location.href="dashboard_usuarios.php";
    </script>
  ';
}else{
  echo '
  <script>
    alert("se actualizaron los datos correctamente");
    location.href="editar_usuario.php";
  </script>
';
}


?>