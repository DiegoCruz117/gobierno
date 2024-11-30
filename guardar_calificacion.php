<?php
session_start();
require "conexion.php";

// Validar que los campos existen en $_POST
if (isset($_POST['encargado'], $_POST['proyecto'], $_POST['rating'], $_POST['comentario'], $_POST['id_encargado'])) {
    $encargado = $_POST['encargado'];
    $proyecto = $_POST['proyecto'];
    $rating = $_POST['rating'];
    $comentario = $_POST['comentario'];
    $id_encargado = $_POST['id_encargado'];
    
    // Guardar la calificación en la base de datos
    $query = "INSERT INTO calificaciones (encargado, proyecto, rating, comentario) 
              VALUES ('$encargado', '$proyecto', '$rating', '$comentario')";
    $resultado = mysqli_query($conectar, $query);

    if ($resultado) {
        // Agregar el ID del encargado a la sesión como calificado
        $_SESSION['calificados'][] = $id_encargado;
        
        // Mostrar el mensaje de éxito y redirigir con JavaScript
        echo "<script>
            alert('Calificación guardada correctamente.');
            window.location.href = 'inicio.php';
        </script>";
    } else {
        // Mostrar un mensaje de error si la consulta falla
        echo "<script>
            alert('Error al guardar la calificación. Inténtalo de nuevo.');
            window.history.back();
        </script>";
    }
} else {
    // Mostrar un mensaje si faltan datos en el formulario
    echo "<script>
        alert('Faltan datos en el formulario.');
        window.history.back();
    </script>";
}
?>
