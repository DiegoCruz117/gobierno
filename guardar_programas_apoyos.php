<?php

require "conexion.php";

$nombre_programa = $_POST['nombre_programa'];
$fecha_programa = $_POST['fecha_programa'];
$descripcioncorta = $_POST['descripcioncorta'];
$descripcionlarga = $_POST['editor1'];
$icono_apoyos = $_POST['icono_apoyos'];

$insertar = "INSERT INTO crear_apoyos ( nombre_programa, fecha_programa, descripcioncorta, descripcionlarga, icono_apoyos) VALUES
( '$nombre_programa', '$fecha_programa', '$descripcioncorta', '$descripcionlarga', '$icono_apoyos')";
$query = mysqli_query($conectar, $insertar);


if ($query) {
echo '
<script>
alert("SE GUARDARO EL POST CORRECTAMENTE");
location.href="apoyo_admin.php ";
</script>
';
} else {
echo '
<script>
alert("NO SE GUARDO EL POST");
location.href="crear_programa_apoyos.php";
</script>
';
}

exit();

?>