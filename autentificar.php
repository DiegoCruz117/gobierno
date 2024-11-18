<?php

require "conexion.php";

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta preparada para evitar inyecciones SQL
$stmt = $conectar->prepare("SELECT * FROM registro WHERE correo = ? LIMIT 1");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($contrasena, $fila['contrasena'])) {
        session_start();
        $_SESSION['username'] = $fila['nombre']; // Guarda el nombre del usuario
        $_SESSION['rol'] = $fila['rol']; // Guarda el rol del usuario
        $_SESSION["autentificado"] = "SI";

        // Establece la cookie para el tiempo de actividad (10 minutos)
        setcookie("last_activity", time(), time() + (10 * 60), "/"); // 10 minutos

        header("Location: inicio.php");
        exit();
    } else {
        // Contraseña incorrecta
        echo '
        <script>
            alert("Contraseña incorrecta. Inténtalo de nuevo.");
            location.href = "login.php?errorusuario=SI";
        </script>
        ';
    }
} else {
    // El correo no está registrado
    echo '
    <script>
        alert("El correo electrónico no está registrado.");
        location.href = "login.php?errorusuario=SI";
    </script>
    ';
}

$stmt->close();
mysqli_close($conectar);

?>
