<?php
require "conexion.php";


$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$id_apoyos = $_POST['id_apoyos'];
$correo = $_POST['correo'];
$numero_tel = $_POST['numero_tel'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];


$insertar = "INSERT INTO encargados (nombres, apellidos, id_apoyos, correo, numero_tel, edad, sexo) 
             VALUES ('$nombres', '$apellidos', '$id_apoyos', '$correo', '$numero_tel', '$edad', '$sexo')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
        <script>
            alert("Se guardaron los datos del encargado correctamente");
            location.href="encargados_admin.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al guardar los datos del encargado");
            location.href="crear_encargados.php";
        </script>
    ';
}
?>