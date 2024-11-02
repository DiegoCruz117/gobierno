<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = mysqli_real_escape_string($conectar, $_POST['correo']);
    $pregunta = mysqli_real_escape_string($conectar, $_POST['pregunta']);
    $respuesta = mysqli_real_escape_string($conectar, $_POST['respuesta']);

    // Verificar si el correo y la respuesta son correctos
    $consulta = "SELECT * FROM registro WHERE correo = ? AND pregunta = ? AND respuesta = ?";
    $stmt = $conectar->prepare($consulta);
    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conectar->error);
    }

    $stmt->bind_param("sss", $correo, $pregunta, $respuesta);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Si el correo, la pregunta y la respuesta son correctos, redirigir a restablecer.php
        header("Location: restablecer.php?correo=" . urlencode($correo));
        exit();
    } else {
        echo '<script>alert("El correo, la pregunta o la respuesta son incorrectos."); window.history.back();</script>';
    }

    $stmt->close();
    mysqli_close($conectar);
}
?>
