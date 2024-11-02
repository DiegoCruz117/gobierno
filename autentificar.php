<?php
session_start();
require 'conexion.php'; // Asegúrate de que tu conexión esté correctamente configurada

// Recibir credenciales del formulario de login
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta para validar usuario y obtener rol
$query = "SELECT * FROM registro WHERE correo = '$correo' AND contrasena = '$contrasena'";
$result = mysqli_query($conectar, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    // Guardar estado de autenticación y rol en la sesión
    $_SESSION['autentificado'] = "SI";
    $_SESSION['username'] = $user['correo'];
    $_SESSION['rol'] = $user['rol']; // Asumiendo que el rol está almacenado en la columna 'rol'

    // Redirigir según el rol
    if ($user['rol'] === 'administrador') {
        header("Location: admin_dashboard.php");
    } elseif ($user['rol'] === 'jefe') {
        header("Location: jefe_dashboard.php");
    } else {
        header("Location: usuario_dashboard.php");
    }
    exit();
} else {
    // Redirigir a login con error
    header("Location: login.php?errorusuario=SI");
    exit();
}
?>
