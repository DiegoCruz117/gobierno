<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
require "conexion.php"; // Conexión a la base de datos

// Obtener el ID de la solicitud desde la URL
$id_solicitud = $_GET['id'];

// Consulta para obtener los detalles de la solicitud
$verSolicitud = "SELECT * FROM solicitudes_apoyo WHERE id_solicitud = '$id_solicitud'";
$resultado = mysqli_query($conectar, $verSolicitud);

// Obtener la fila correspondiente a la solicitud
$fila = mysqli_fetch_assoc($resultado);
$tipo_apoyo = $fila["tipo_apoyo"]; // Tipo de programa
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitud de Apoyo</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="cont_padre_panel ancho">
        <?php include "menudashboard.php"; // Incluye el menú de navegación del dashboard ?>
        <div class="cont_panel_derecho">
            <div class="cont_panel_derecho_hijo1">
                <div class="elemento_salir">
                    <img src="imagenes/cancelar.png" class="img_cancelar" alt="Salir">
                    <a href="salir.php" class="salir">Salir</a>
                </div>
            </div>
            <br>
            <div class="cont_panel_derecho_hijo2">
                <h2 class="titulo_panel">VER SOLICITUD</h2>
                <a href="blog.php" class="btn_rojo2"><< Regresar</a>
                <br><br>
                <div class="contenedor_ver_usuarios">
                    <div class="datos_solicitud">
                         <h3>Información Personal </h3><br>
                        <p class="campo">ID Solicitud: <span class="dato"><?php echo $fila["id_solicitud"]; ?></span></p>
                        <p class="campo">Nombre: <span class="dato"><?php echo $fila["nombre"]; ?></span></p>
                        <p class="campo">Fecha de Nacimiento: <span class="dato"><?php echo $fila["fecha_nacimiento"]; ?></span></p>
                        <p class="campo">Teléfono: <span class="dato"><?php echo $fila["telefono"]; ?></span></p>
                        <p class="campo">Email: <span class="dato"><?php echo $fila["email"]; ?></span></p>
                        <p class="campo">Dirección: <span class="dato"><?php echo $fila["direccion"]; ?></span></p>
                        <p class="campo">Estado Civil: <span class="dato"><?php echo $fila["estado_civil"]; ?></span></p><br>

                        <h3>Información Socioeconómica</h3><br>
                        <p class="campo">Ocupación: <span class="dato"><?php echo $fila["ocupacion"]; ?></span></p>
                        <p class="campo">Seguro Médico: <span class="dato"><?php echo $fila["seguro_medico"]; ?></span></p>
                        <p class="campo">Nivel Educativo: <span class="dato"><?php echo $fila["nivel_educativo"]; ?></span></p>
                        <p class="campo">Tipo de Vivienda: <span class="dato"><?php echo $fila["tipo_vivienda"]; ?></span></p><br>

                        <h3>Situación</h3><br>
                        <p class="campo">Descripción de Situación: <span class="dato"><?php echo $fila["descripcion"]; ?></span></p><br>
                    </div>
                    <div class="archivos">
                        <h3>Documentación Adjunta</h3><br>
                        <ul>
                            <li><a target="_blank" href="uploads/<?php echo $fila['identificacion']; ?>">Identificación (Archivo)</a></li>
                            <li><a target="_blank" href="uploads/<?php echo $fila['comprobante_domicilio']; ?>">Comprobante de Domicilio (Archivo)</a></li>
                            <?php if ($tipo_apoyo === "vivienda") : ?>
                                <li><a target="_blank" href="uploads/<?php echo $fila['informe_danos']; ?>">Informe de Daños (Archivo)</a></li>
                                <li><a target="_blank" href="uploads/<?php echo $fila['documentacion_terreno']; ?>">Documentación del Terreno (Archivo)</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <br>
                <form action="generar_pdf.php" method="post">
                    <input type="hidden" name="id_solicitud" value="<?php echo $id_solicitud; ?>">
                    <button type="submit" class="btn_pdf">Generar PDF</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
