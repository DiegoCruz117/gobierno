<?php

require "conexion.php";

$tipo = $_POST['tipo'];
$mensaje = $_POST['mensaje'];


//Datos de la foto

// $rutaEnServidor = "fotos";
// $rutaTemporal = $_FILES['foto']['tmp_name'];
// $nombreImagen = $_FILES['foto']['name'];

// //para que no se sobreescriban los nombres de las fotos
// date_default_timezone_set('UTC');
// $nombreimagenunico = date('Y-m-d-h-i-s') . "_" . $nombreImagen;

// $rutaDestino = $rutaEnServidor. '/' .$nombreimagenunico;

// // validacion del peso de la imagen
// $pesofoto = $_FILES['foto']['size'];
// $tipofoto = $_FILES['foto']['type'];

// if ($pesofoto > 900000) {
// echo '
// <script>
// alert("Es demasiado pesada para el post");
// window.history.go(-1);
// </script>
// ';
// exit;
// }

// if ($tipofoto == "image/webp" or $tipofoto == 'image/jpeg' or $tipofoto == 'image/png' or $tipofoto == 'image/gif' or $tipofoto == 'image/jpg' or $nombreImagen == '') {
//   move_uploaded_file($rutaTemporal, $rutaDestino);
// } else {
// echo '
// <script>
// alert("No es una IMAGEN");
// window.history.go(-1);
// </script>
// ';
// exit;
// }

$insertar = "INSERT INTO quejas_sugerencias (tipo, mensaje) VALUES ('$tipo','$mensaje')";
$query = mysqli_query($conectar, $insertar);


if ($query) {
echo '
<script>
alert("SE GUARDARO EL POST CORRECTAMENTE");
location.href="inicio.php ";
</script>
';
} else {
echo '
<script>
alert("NO SE GUARDO EL POST");
window.history.go(-1);
</script>
';
}

exit();

?>