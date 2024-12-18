<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud de Apoyo</title>
    <link rel="stylesheet" href="estilos_apoyos.css"> <!-- Enlace al archivo CSS -->
</head>
<body>

<form action="procesar_apoyo.php" method="post" class="form_solicitud_apoyo" enctype="multipart/form-data">
<input type="hidden" name="tipo_apoyo" value="vivienda">
    <!-- Requisitos para el Apoyo -->
    <a href="apoyo_vivienda.php" class="btn_detalle">Regresar</a>
    <h3>Requisitos para solicitar este apoyo</h3>
    <input type="checkbox" name="mayor_edad" required> Soy mayor de 18 años.<br>
    <input type="checkbox" name="residencia" required> Resido en el municipio de Mérida.<br>
    <input type="checkbox" name="situacion_vulnerabilidad" required> Demuestro la situación de vulnerabilidad o daños a la vivienda.<br>
    <input type="checkbox" name="identificacion_vigente" required> Cuento con identificación oficial vigente (INE, pasaporte).<br>

    <!-- Información Personal -->
    <h3>Información Personal</h3>
    <input type="text" name="nombre" class="elemento_inp2" placeholder="Nombre Completo" required>
    <p>Fecha de Nacimiento</p>
    <input type="date" name="fecha_nacimiento" class="elemento_inp2" required>
    <input type="number" name="telefono" class="elemento_inp2" placeholder="Teléfono de Contacto" required>
    <input type="email" name="email" class="elemento_inp2" placeholder="Correo Electrónico" required>
    <input type="text" name="direccion" class="elemento_inp2" placeholder="Dirección Completa" required>
    <select name="estado_civil" class="elemento_inp2" required>
        <option value="" disabled selected>Estado Civil</option>
        <option value="soltero">Soltero/a</option>
        <option value="casado">Casado/a</option>
        <option value="divorciado">Divorciado/a</option>
        <option value="viudo">Viudo/a</option>
    </select>

    <!-- Información Socioeconómica -->
    <h3>Información Socioeconómica</h3>
    <input type="text" name="ocupacion" class="elemento_inp2" placeholder="Ocupación" required>
    <select name="seguro_medico" class="elemento_inp2" required>
        <option value="" disabled selected>¿Cuenta con seguro médico?</option>
        <option value="si">Sí</option>
        <option value="no">No</option>
    </select>
    <select name="nivel_educativo" class="elemento_inp2" required>
        <option value="" disabled selected>Nivel Educativo</option>
        <option value="primaria">Primaria</option>
        <option value="secundaria">Secundaria</option>
        <option value="bachillerato">Bachillerato</option>
        <option value="universidad">Universidad</option>
    </select>
    <select name="tipo_vivienda" class="elemento_inp2" required>
        <option value="" disabled selected>Tipo de Vivienda</option>
        <option value="propia">Propia</option>
        <option value="rentada">Rentada</option>
        <option value="prestada">Prestada</option>
    </select>

    <!-- Tipo de Apoyo Solicitado -->
    <h3>Situación</h3>
    <textarea name="descripcion" placeholder="Describa su situación actual" class="elemento_inp2 textdesc" required></textarea>

    <!-- Documentación Requerida -->
    <h3>Documentación Adjunta</h3>
    <p>Subir copia de identificación oficial (INE, pasaporte):</p>
    <input type="file" name="identificacion" class="elemento_inp2" accept=".pdf,.jpg,.jpeg,.png" required>
    <p>Subir comprobante de domicilio (no mayor a 3 meses):</p>
    <input type="file" name="comprobante_domicilio" class="elemento_inp2" accept=".pdf,.jpg,.jpeg,.png" required>
    <p>Subir informe técnico de daños en la vivienda (si aplica):</p>
    <input type="file" name="informe_danos" class="elemento_inp2" accept=".pdf,.jpg,.jpeg,.png">
    <p>Subir título de propiedad o documentación legal del terreno (si aplica):</p>
    <input type="file" name="documentacion_terreno" class="elemento_inp2" accept=".pdf,.jpg,.jpeg,.png">

    <!-- Consentimiento -->
    <h3>Consentimiento</h3>
    <input type="checkbox" name="consentimiento" required> Autorizo la verificación de la información.<br>
    <input type="checkbox" name="terminos" required> Acepto los términos y condiciones.<br>

    <!-- Botones -->
    <br>
    <button class="btn_amarillo2" type="submit">Enviar Solicitud</button>
</form>

</body>
</html>
