<?php
// Incluir el archivo de seguridad y conexión a la base de datos
require "seguridad.php";
require "conexion.php";

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id_apoyos = $_POST['id_apoyos'];
    $icono_apoyos = $_POST['icono_apoyos'];
    $nombre_programa = mysqli_real_escape_string($conectar, $_POST['nombre_programa']);
    $descripcioncorta = mysqli_real_escape_string($conectar, $_POST['descripcioncorta']);
    $descripcionlarga = mysqli_real_escape_string($conectar, $_POST['editor1']);

    // Actualizar los datos en la base de datos
    $query = "UPDATE crear_apoyos SET 
                icono_apoyos = '$icono_apoyos',
                nombre_programa = '$nombre_programa',
                descripcioncorta = '$descripcioncorta',
                descripcionlarga = '$descripcionlarga' 
              WHERE id_apoyos = '$id_apoyos'";

    if (mysqli_query($conectar, $query)) {
        // Redirigir al usuario con un mensaje de éxito
        header("Location: apoyo_admin.php?mensaje=actualizado");
    } else {
        echo "Error al actualizar el programa de apoyo: " . mysqli_error($conectar);
    }
} else {
    // Si no se envió el formulario, redirige al usuario a la página de inicio
    header("Location: apoyo_admin.php");
}
?>
