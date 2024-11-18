<?php
session_start();
//aca en seguridad implemente la parte del tiempo

// Definir el tiempo máximo de inactividad (por ejemplo, 15 minutos = 900 segundos)
$tiempo_inactividad_maximo = 86400;

// Verificar si el usuario está autenticado
if ($_SESSION["autentificado"] != "SI") {
    header("Location: login.php");
    exit();
}

// Comprobar el tiempo de inactividad
if (isset($_SESSION['ultimo_acceso'])) {
    $tiempo_inactividad = time() - $_SESSION['ultimo_acceso'];

    if ($tiempo_inactividad > $tiempo_inactividad_maximo) {
        // Si ha pasado el tiempo máximo, destruir la sesión y redirigir al login
        session_unset();
        session_destroy();
        header("Location: login.php?timeout=1"); // Opción para indicar que la sesión expiró por inactividad
        exit();
    }
}

// Actualizar el tiempo de último acceso
$_SESSION['ultimo_acceso'] = time();

// Crear la cookie si no existe
$nombre_cookie = "usuario";
if (!isset($_COOKIE[$nombre_cookie])) {
    $valor_cookie = $_SESSION['username'];
    $duracion = time() + (86400 * 30); // 30 días
    $ruta = "/"; // Disponible en todo el sitio

    setcookie($nombre_cookie, $valor_cookie, $duracion, $ruta);
}
?>
