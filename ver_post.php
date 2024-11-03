<?php
require "seguridad.php";
$usuario = $_SESSION['username'];
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
    <?php 
    include "menudashboard.php"; // Incluye el menú de navegación del dashboard
    ?>
    <div class="cont_panel_derecho">
      <div class="cont_panel_derecho_hijo1">
        <div class="elemento_salir">
          <img src="imagenes/cancelar.png" class="img_cancelar">
          <a href="salir.php" class="salir">Salir</a>
        </div>
      </div>
      <br>
      <div class="cont_panel_derecho_hijo2">
        <h2 class="titulo_panel">VER SOLICITUD</h2>
        <br>
        <a href="blog.php" class="btn_rojo2"><< Regresar</a>
        <br><br>
        <?php
        require "conexion.php"; // Conexión a la base de datos
        $id_solicitud = $_GET['id']; // ID de la solicitud desde la URL

        // Consulta para obtener los detalles de la solicitud
        $verSolicitud = "SELECT * FROM solicitudes_apoyo WHERE id_solicitud = '$id_solicitud'";
        $resultado = mysqli_query($conectar, $verSolicitud);

        // Obtener la fila correspondiente a la solicitud
        $fila = mysqli_fetch_assoc($resultado);
        ?>
        <div class="contenedor_ver_usuarios">
          <p class="campo">ID Solicitud</p>
          <p class="dato"><?php echo $fila["id_solicitud"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Nombre</p>
          <p class="dato"><?php echo $fila["nombre"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Identificación</p>
          <p class="dato"><?php echo $fila["identificacion"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Fecha de Nacimiento</p>
          <p class="dato"><?php echo $fila["fecha_nacimiento"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Teléfono</p>
          <p class="dato"><?php echo $fila["telefono"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Email</p>
          <p class="dato"><?php echo $fila["email"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Dirección</p>
          <p class="dato"><?php echo $fila["direccion"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Ocupación</p>
          <p class="dato"><?php echo $fila["ocupacion"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Seguro Médico</p>
          <p class="dato"><?php echo $fila["seguro_medico"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Nivel Educativo</p>
          <p class="dato"><?php echo $fila["nivel_educativo"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Tipo de Vivienda</p>
          <p class="dato"><?php echo $fila["tipo_vivienda"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
          <p class="campo">Descripción de Situación</p>
          <p class="dato"><?php echo $fila["descripcion"]; ?></p>
          <hr>
        </div>
        <div class="contenedor_ver_usuarios">
        <p class="campo">Identificación (Archivo)</p>
        <p class="dato"><a target="_blank" href="uploads/<?php echo $fila['identificacion']; ?>">Ver Archivo Identificación</a></p>
        <hr>
        </div>
        <div class="contenedor_ver_usuarios">
        <p class="campo">Comprobante de Domicilio (Archivo)</p>
        <p class="dato"><a target="_blank" href="uploads/<?php echo $fila['comprobante_domicilio']; ?>">Ver Comprobante de Domicilio</a></p>
        <hr>
        </div>
        <div class="contenedor_ver_usuarios">
        <p class="campo">Informe de Daños (Archivo)</p>
        <p class="dato"><a target="_blank" href="uploads/<?php echo $fila['informe_danos']; ?>">Ver Informe de Daños</a></p>
        <hr>
        </div>
        <div class="contenedor_ver_usuarios">
        <p class="campo">Documentación del Terreno (Archivo)</p>
        <p class="dato"><a target="_blank" href="uploads/<?php echo $fila['documentacion_terreno']; ?>">Ver Documentación del Terreno</a></p>
        <hr>
    </div>



      
    </div>
  </div>
  
</body>
</html>
