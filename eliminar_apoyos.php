<?php 
require "conexion.php";

$id_apoyos = $_GET["id_apoyos"];

$borrar = "DELETE FROM crear_apoyos WHERE id_apoyos  = '$id_apoyos '";

$resultado = mysqli_query($conectar, $borrar);

if($resultado){
  echo '
  <script>
    alert("Curso eliminada correctamente");
    location.href = "apoyo_admin.php";
  </script>
  ';
}
?>