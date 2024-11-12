<?php
require "conexion.php";

// Recibe y sanitiza los datos del formulario
$nombres = trim($_POST['nombres']);
$apellidos = trim($_POST['apellidos']);
$id_apoyos = trim($_POST['id_apoyos']);
$correo = trim($_POST['correo']);
$numero_tel = trim($_POST['numero_tel']);
$edad = trim($_POST['edad']);
$sexo = trim($_POST['sexo']);

// Verificar que todos los campos estén llenos
if (empty($nombres) || empty($apellidos) || empty($id_apoyos) || empty($correo) || empty($numero_tel) || empty($edad) || empty($sexo)) {
    echo '
        <script>
            alert("Todos los campos son obligatorios.");
            window.history.go(-1);
        </script>
    ';
    exit;
}

// Validar que el nombre y apellido solo contengan letras y espacios
if (!preg_match("/^[a-zA-Z\s]+$/", $nombres) || !preg_match("/^[a-zA-Z\s]+$/", $apellidos)) {
    echo '
        <script>
            alert("El nombre y apellido solo deben contener letras.");
            window.history.go(-1);
        </script>
    ';
    exit;
}

// Validar formato del correo electrónico
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo '
        <script>
            alert("Formato de correo electrónico no válido.");
            window.history.go(-1);
        </script>
    ';
    exit;
}

// Validar que el número de teléfono contenga solo números y tenga una longitud de 10 dígitos
if (!preg_match('/^[0-9]{10}$/', $numero_tel)) {
    echo '
        <script>
            alert("El número de teléfono debe tener 10 dígitos.");
            window.history.go(-1);
        </script>
    ';
    exit;
}

// Validar que el usuario sea mayor de edad (18 años o más)
function esMayorDeEdad($fechaNacimiento) {
    $fechaNacimiento = new DateTime($fechaNacimiento);
    $fechaActual = new DateTime();
    $edad = $fechaNacimiento->diff($fechaActual)->y;
    return $edad >= 18;
}

if (!esMayorDeEdad($edad)) {
    echo '
        <script>
            alert("Debes ser mayor de 18 años para registrarte.");
            window.history.go(-1);
        </script>
    ';
    exit;
}

// Preparar y ejecutar la consulta
$insertar = "INSERT INTO crear_encargados (nombres, apellidos, id_apoyos, correo, numero_tel, edad, sexo) VALUES ('$nombres', '$apellidos', '$id_apoyos', '$correo', '$numero_tel', '$edad', '$sexo')";

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
            window.history.go(-1);
        </script>
    ';
}
?>
