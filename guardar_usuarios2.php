<?php
require "conexion.php";

// Validación de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = mysqli_real_escape_string($conectar, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conectar, $_POST['apellido']);
    $correo = mysqli_real_escape_string($conectar, $_POST['correo']);
    $contrasena = mysqli_real_escape_string($conectar, $_POST['contrasena']);
    $fecha = mysqli_real_escape_string($conectar, $_POST['fecha']);

    // Verificar que los campos no estén vacíos
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasena) || empty($fecha)) {
        echo '<script>alert("Por favor, completa todos los campos."); location.href="crear_usuario.php";</script>';
        exit;
    }

    // Validar formato de correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Formato de correo electrónico inválido."); location.href="crear_usuario.php";</script>';
        exit;
    }

    // Verificamos si el usuario ya existe
    $stmt = $conectar->prepare("SELECT * FROM registro WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo '<script>alert("ESTE USUARIO YA SE HA REGISTRADO"); location.href="crear_usuario.php";</script>';
        exit;
    }

    // Encriptar la contraseña
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);
    $rol = 'alcalde'; // Asignar rol directamente

    // Insertamos el usuario en la base de datos
    $stmt = $conectar->prepare("INSERT INTO registro (nombre, apellido, correo, contrasena, fecha, rol) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $apellido, $correo, $contrasena_encriptada, $fecha, $rol);

    if ($stmt->execute()) {
        echo '<script>alert("SE GUARDÓ CORRECTAMENTE"); location.href="crear_usuario.php";</script>';
    } else {
        echo '<script>alert("ERROR AL GUARDAR EL USUARIO: ' . $stmt->error . '. INTENTE NUEVAMENTE."); location.href="crear_usuario.php";</script>';
    }

    $stmt->close();
    mysqli_close($conectar);
} else {
    echo '<script>alert("Método de solicitud no válido."); location.href="crear_usuario.php";</script>';
}
?>
