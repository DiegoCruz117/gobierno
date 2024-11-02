<?php
require "conexion.php"; // Incluye la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir los datos del formulario
    $nombre = mysqli_real_escape_string($conectar, $_POST['nombre']);
    $fecha_nacimiento = mysqli_real_escape_string($conectar, $_POST['fecha_nacimiento']);
    $telefono = mysqli_real_escape_string($conectar, $_POST['telefono']);
    $email = mysqli_real_escape_string($conectar, $_POST['email']);
    $direccion = mysqli_real_escape_string($conectar, $_POST['direccion']);
    $estado_civil = mysqli_real_escape_string($conectar, $_POST['estado_civil']);
    $ocupacion = mysqli_real_escape_string($conectar, $_POST['ocupacion']);
    $ingresos = mysqli_real_escape_string($conectar, $_POST['ingresos']);
    $seguro_medico = mysqli_real_escape_string($conectar, $_POST['seguro_medico']);
    $nivel_educativo = mysqli_real_escape_string($conectar, $_POST['nivel_educativo']);
    $tipo_vivienda = mysqli_real_escape_string($conectar, $_POST['tipo_vivienda']);
    $descripcion = mysqli_real_escape_string($conectar, $_POST['descripcion']);
    
    // Campo nuevo para tipo de apoyo
    $tipo_apoyo = mysqli_real_escape_string($conectar, $_POST['tipo_apoyo']);

    // Requisitos (checkboxes)
    $mayor_edad = isset($_POST['mayor_edad']) ? 1 : 0;
    $residencia = isset($_POST['residencia']) ? 1 : 0;
    $nacionalidad = isset($_POST['nacionalidad']) ? 1 : 0;
    $ingresos_menores = isset($_POST['ingresos']) ? 1 : 0;
    $identificacion_vigente = isset($_POST['identificacion_vigente']) ? 1 : 0;

    // Consentimiento y términos
    $consentimiento = isset($_POST['consentimiento']) ? 1 : 0;
    $terminos = isset($_POST['terminos']) ? 1 : 0;

    // Manejo de archivos
    $identificacion = $_FILES['identificacion']['name'];
    $comprobante_domicilio = $_FILES['comprobante_domicilio']['name'];
    $informe_danos = $_FILES['informe_danos']['name'];
    $documentacion_terreno = $_FILES['documentacion_terreno']['name'];

    // Directorio de subida
    $target_dir = "uploads/";

    // Subir archivos
    $target_file_identificacion = $target_dir . basename($identificacion);
    move_uploaded_file($_FILES["identificacion"]["tmp_name"], $target_file_identificacion);

    $target_file_comprobante = $target_dir . basename($comprobante_domicilio);
    move_uploaded_file($_FILES["comprobante_domicilio"]["tmp_name"], $target_file_comprobante);

    if (!empty($informe_danos)) {
        $target_file_informe_danos = $target_dir . basename($informe_danos);
        move_uploaded_file($_FILES["informe_danos"]["tmp_name"], $target_file_informe_danos);
    }

    if (!empty($documentacion_terreno)) {
        $target_file_documentacion_terreno = $target_dir . basename($documentacion_terreno);
        move_uploaded_file($_FILES["documentacion_terreno"]["tmp_name"], $target_file_documentacion_terreno);
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO solicitudes_apoyo (nombre, fecha_nacimiento, telefono, email, direccion, estado_civil, ocupacion, ingresos, seguro_medico, nivel_educativo, tipo_vivienda, descripcion, mayor_edad, residencia, nacionalidad, ingresos_menores, identificacion_vigente, identificacion, comprobante_domicilio, informe_danos, documentacion_terreno, consentimiento, terminos, tipo_apoyo) 
            VALUES ('$nombre', '$fecha_nacimiento', '$telefono', '$email', '$direccion', '$estado_civil', '$ocupacion', '$ingresos', '$seguro_medico', '$nivel_educativo', '$tipo_vivienda', '$descripcion', '$mayor_edad', '$residencia', '$nacionalidad', '$ingresos_menores', '$identificacion_vigente', '$identificacion', '$comprobante_domicilio', '$informe_danos', '$documentacion_terreno', '$consentimiento', '$terminos', '$tipo_apoyo')";

    if ($conectar->query($sql) === TRUE) {
        // Redirigir a apoyos.php después de insertar los datos
        header("Location: apoyos.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error: " . $sql . "<br>" . $conectar->error;
    }

    // Cerrar la conexión
    $conectar->close();
}
?>
