<?php
require "../conexion.php";

$id = addslashes($_POST['id']);
$nombres = addslashes($_POST['nombre']);
$apellidos = addslashes($_POST['apellido']);
// $contrasena = addslashes($_POST['contrasena']);

// Consulta de actualización
$actualizar = "UPDATE registro SET nombre='$nombres', apellido='$apellidos' WHERE id='$id'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
    <script>
        alert("Los datos se guardaron correctamente");
        location.href="../perfil.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("No se pudo guardar en la base de datos");
        window.history.go(-1);
    </script>
    ';
}
?>
