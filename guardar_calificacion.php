<?php
require "conexion.php"; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $encargado = mysqli_real_escape_string($conectar, $_POST['encargado']);
    $proyecto = mysqli_real_escape_string($conectar, $_POST['proyecto']);
    $rating = (int)$_POST['rating'];
    $comentario = mysqli_real_escape_string($conectar, $_POST['comentario']);

    // Insertar datos en la base de datos
    $query = "INSERT INTO calificaciones (encargado, proyecto, rating, comentario)
              VALUES ('$encargado', '$proyecto', $rating, '$comentario')";

    if (mysqli_query($conectar, $query)) {
        mysqli_close($conectar); // Cerrar conexión antes de redirigir
        exit(); // Asegura que no se ejecuta código adicional
    } else {
        echo "Error al guardar la calificación: " . mysqli_error($conectar);
    }

    mysqli_close($conectar); // Cerrar conexión
} else {
    echo "Método no permitido.";
}
?>