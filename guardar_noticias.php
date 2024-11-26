<?php

require "conexion.php";

$nombrenoticia = $_POST['nombrenoticia'];
$fecha = $_POST['fecha'];
$descripcioncorta = $_POST['descripcioncorta'];
$descripcionlarga = $_POST['editor1'];
$icono = $_POST['icono'];


//Datos de la foto

$rutaEnServidor = "fotos";
$rutaTemporal = $_FILES['foto_noticia']['tmp_name'];
$nombreImagen = $_FILES['foto_noticia']['name'];

//para que no se sobreescriban los nombres de las fotos 
date_default_timezone_set('UTC');
$nombreimagenunico = date('Y-m-d-h-i-s') . "_" . $nombreImagen;

$rutaDestino = $rutaEnServidor. '/' .$nombreimagenunico;

// validacion del peso de la imagen
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

if ($tipofoto == "image/webp" or $tipofoto == 'image/jpeg' or $tipofoto == 'image/png' or $tipofoto == 'image/gif' or $tipofoto == 'image/jpg' or $nombreImagen == '') {
  move_uploaded_file($rutaTemporal, $rutaDestino);
} else {
echo '
<script>
alert("No es una IMAGEN");
window.history.go(-1);
</script>
';
exit;
}

$insertar = "INSERT INTO publicaciones (nombrenoticia, fecha, descripcioncorta, descripcionlarga, ruta, icono) VALUES ('$nombrenoticia','$fecha','$descripcioncorta','$descripcionlarga','$rutaDestino','$icono')";
$query = mysqli_query($conectar, $insertar);


if ($query) {
echo '
<script>
alert("SE GUARDARO EL POST CORRECTAMENTE");
location.href="noticias_admin.php ";
</script>
';
} else {
echo '
<script>
alert("NO SE GUARDO EL POST");
location.href="crear_post.php";
</script>
';
}

exit();

?>