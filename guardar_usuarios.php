<?php

require "conexion.php";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$fecha = $_POST['fecha'];

$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);


//validar usuario
$verificar_usuario = mysqli_query($conectar, "SELECT * FROM registro WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_usuario) > 0) {
  echo '
  <script>
    alert("ESTE USUARIO YA SE HA REGISTRADO")
    location.href="crear_usuario.php";
  </script>
  ';
  exit;
}

$insertar = "INSERT INTO registro (nombre, apellido, correo, contrasena,fecha) VALUES ('$nombre','$apellido','$correo','$contrasena_encriptada','$fecha')";

$query = mysqli_query($conectar, $insertar);

if ($query){
  echo '
    <script>
      alert("SE GUARDO CORRECTAMENTE");
      location.href="crear_usuario.php";
    </script>
  
  ';
}



?>