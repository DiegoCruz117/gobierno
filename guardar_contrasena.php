<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = mysqli_real_escape_string($conectar, $_POST['correo']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $actualizar = "UPDATE registro SET contrasena = ? WHERE correo = ?";
    $stmt = $conectar->prepare($actualizar);
    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conectar->error);
    }

    $stmt->bind_param("ss", $contrasena, $correo);

    if ($stmt->execute()) {
        echo '<script>alert("Contraseña restablecida con éxito. Puedes iniciar sesión."); window.location.href = "login.php";</script>';
    } else {
        echo '<script>alert("Error al restablecer la contraseña. Intenta de nuevo más tarde."); window.history.back();</script>';
    }

    $stmt->close();
    mysqli_close($conectar);
}
?>
    