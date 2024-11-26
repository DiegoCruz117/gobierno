<?php
require "conexion.php";

$id_noticia = $_POST["id_noticia"];
$nombrenoticia = $_POST['nombrenoticia'];
$fecha = $_POST['fecha'];
$descripcioncorta = $_POST['descripcioncorta'];
$descripcionlarga = $_POST['editor1'];

//Datos de la foto
$rutaEnServidor = "fotos";
$rutaTemporal = $_FILES['foto_noticia']['tmp_name'];
$nombreImagen = $_FILES['foto_noticia']['name'];

//para que no se sobreescriban los nombres de las fotos 
if ($nombreImagen != '') {
    date_default_timezone_set('UTC');
    $nombreimagenunico = date('Y-m-d-h-i-s') . "_" . $nombreImagen;
    $rutaDestino = $rutaEnServidor. '/' .$nombreimagenunico;

    // Validación del tamaño de la imagen
    $pesofoto = $_FILES['foto_noticia']['size'];
    $tipofoto = $_FILES['foto_noticia']['type'];

    if ($pesofoto > 900000) {
      echo '
      <script>
      alert("Es demasiado pesada para el post");
      window.history.go(-1);
      </script>
      ';
      exit;
    }
    
    if ($tipofoto == 'image/webp' or $tipofoto == 'image/jpeg' or $tipofoto == 'image/png' or $tipofoto == 'image/gif' or $tipofoto == 'image/jpg') {
        move_uploaded_file($rutaTemporal, $rutaDestino);
    } else {
      echo '
      <script>
      alert("No es una IMAGEN válida");
      window.history.go(-1);
      </script>
      ';
      exit;
    }

    // Si se subió una nueva imagen, incluirla en la consulta de actualización
    $actualizar_noticia = "UPDATE publicaciones SET nombrenoticia = '$nombrenoticia', fecha = '$fecha', descripcioncorta = '$descripcioncorta', descripcionlarga = '$descripcionlarga', ruta = '$rutaDestino' WHERE id_noticia = '$id_noticia'";
} else {
    // Si no se subió una nueva imagen, no actualizar la ruta
    $actualizar_noticia = "UPDATE publicaciones SET nombrenoticia = '$nombrenoticia', fecha = '$fecha', descripcioncorta = '$descripcioncorta', descripcionlarga = '$descripcionlarga' WHERE id_noticia = '$id_noticia'";
}

// Ejecutar la consulta
$query = mysqli_query($conectar, $actualizar_noticia);

if ($query){
  echo '
    <script>
      alert("Se actualizaron los datos correctamente");
      location.href="noticias_admin.php";
    </script>
  ';
} else {
  echo '
  <script>
    alert("Hubo un error al actualizar los datos");
    window.history.go(-1);
  </script>
  ';
}

?>