<?php 
require "conexion.php";

$id_solicitud = $_GET["id_solicitud"];

$borrar = "DELETE FROM solicitudes_apoyo WHERE id_solicitud = '$id_solicitud'";

$resultado = mysqli_query($conectar, $borrar);

if($resultado){
  echo '
  <script>
    alert("Curso eliminada correctamente");
    location.href = "blog.php";
  </script>
  ';
}
?>