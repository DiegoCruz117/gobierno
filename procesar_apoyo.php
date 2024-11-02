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

    // Validar que si se marca mayor de edad, la fecha de nacimiento sea válida
    if ($mayor_edad) {
        $fecha_nacimiento_date = new DateTime($fecha_nacimiento);
        $fecha_actual = new DateTime();
        $edad = $fecha_actual->diff($fecha_nacimiento_date)->y;

        if ($edad < 18) {
            echo "<script>
                    alert('Debes ser mayor de 18 años de edad.');
                    window.history.go(-1);
                  </script>";
            exit;
        }
    }

    // Validar el campo de teléfono
    if (!preg_match('/^[0-9]{10}$/', $telefono)) {
        echo "<script>
                alert('El teléfono debe contener solo números y tener exactamente 10 dígitos.');
                window.history.go(-1);
              </script>";
        exit;
    }

    // Directorio de subida
    $target_dir = "uploads/";

    // Validación y subida de archivos PDF (máx. 2 MB)
    $archivos = ['identificacion', 'comprobante_domicilio', 'informe_danos', 'documentacion_terreno'];
    $archivos_subidos = [];

    foreach ($archivos as $archivo) {
        if (!empty($_FILES[$archivo]['name'])) {
            $archivo_nombre = $_FILES[$archivo]['name'];
            $archivo_tipo = $_FILES[$archivo]['type'];
            $archivo_peso = $_FILES[$archivo]['size'];
            $archivo_temporal = $_FILES[$archivo]['tmp_name'];
            $ruta_final = $target_dir . basename($archivo_nombre);

            // Validación de formato y tamaño
            if ($archivo_tipo != 'application/pdf') {
                echo "<script>
                        alert('El archivo $archivo_nombre debe ser un PDF.');
                        window.history.go(-1);
                      </script>";
                exit;
            }
            if ($archivo_peso > 2000000) { // 2MB
                echo "<script>
                        alert('El archivo $archivo_nombre supera el tamaño permitido de 2MB.');
                        window.history.go(-1);
                      </script>";
                exit;
            }

            // Subir archivo
            move_uploaded_file($archivo_temporal, $ruta_final);
            $archivos_subidos[$archivo] = $archivo_nombre; // Guarda el nombre para la BD
        }
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO solicitudes_apoyo (nombre, fecha_nacimiento, telefono, email, direccion, estado_civil, ocupacion, ingresos, seguro_medico, nivel_educativo, tipo_vivienda, descripcion, mayor_edad, residencia, nacionalidad, ingresos_menores, identificacion_vigente, identificacion, comprobante_domicilio, informe_danos, documentacion_terreno, consentimiento, terminos, tipo_apoyo)
            VALUES ('$nombre', '$fecha_nacimiento', '$telefono', '$email', '$direccion', '$estado_civil', '$ocupacion', '$ingresos', '$seguro_medico', '$nivel_educativo', '$tipo_vivienda', '$descripcion', '$mayor_edad', '$residencia', '$nacionalidad', '$ingresos_menores', '$identificacion_vigente', '{$archivos_subidos['identificacion']}', '{$archivos_subidos['comprobante_domicilio']}', '{$archivos_subidos['informe_danos']}', '{$archivos_subidos['documentacion_terreno']}', '$consentimiento', '$terminos', '$tipo_apoyo')";

    if ($conectar->query($sql) === TRUE) {
        // Redirigir a apoyos.php después de insertar los datos
        header("Location: apoyos.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conectar->error;
    }

    // Cerrar la conexión
    $conectar->close();
}
?>