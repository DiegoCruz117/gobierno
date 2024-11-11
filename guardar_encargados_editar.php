<?php
require "conexion.php";

$id_encargados = addslashes($_POST['id_encargados']);
$nombres = addslashes($_POST['nombres']);
$apellidos = addslashes($_POST['apellidos']);
$sexo = addslashes($_POST['sexo']);
$id_apoyos = addslashes($_POST['id_apoyos']);
$numero_tel = addslashes($_POST['numero_tel']);

// Consulta de actualización
$actualizar = "UPDATE crear_encargados SET nombres='$nombres', apellidos='$apellidos', sexo='$sexo', id_apoyos='$id_apoyos', numero_tel='$numero_tel'WHERE id_encargados='$id_encargados'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
    <script>
        alert("Los datos se guardaron correctamente");
        location.href="encargados_admin.php";
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
