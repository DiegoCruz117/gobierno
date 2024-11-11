<?php 
require "conexion.php";

$id_noticia = $_GET["id_noticia"];

$borrar = "DELETE FROM publicaciones WHERE id_noticia  = '$id_noticia '";

$resultado = mysqli_query($conectar, $borrar);

if($resultado){
  echo '
  <script>
    alert("Curso eliminada correctamente");
    location.href = "noticias_admin.php";
  </script>
  ';
}
?>