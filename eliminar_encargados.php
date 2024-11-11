<?php 
require "conexion.php";

$id_encargados = $_GET["id_encargados"];

$borrar = "DELETE FROM crear_encargados WHERE id_encargados  = '$id_encargados'";

$resultado = mysqli_query($conectar, $borrar);

if($resultado){
  echo '
  <script>
    alert("Curso eliminada correctamente");
    location.href = "encargados_admin.php";
  </script>
  ';
}
?>