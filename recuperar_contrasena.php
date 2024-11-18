

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
</head>
<body>
    <div class="container">
        <div class="form_wrapper">
            <h1 class="titulo">Recuperar Contraseña</h1>
            <form action="recuperar.php" method="POST" class="formulario">
                
                <div class="input_group">
                    <label for="correo" class="label">Correo Electrónico:</label>
                    <input type="email" name="correo" class="input" required>
                </div>

                <div class="input_group">
                    <label for="pregunta" class="label">Pregunta de Seguridad:</label>
                    <select name="pregunta" class="input" required>
                        <option value="nombre_mascota">¿Cómo se llama tu primera mascota?</option>
                        <option value="lugar_nacimiento">¿En qué ciudad naciste?</option>
                        <option value="escuela_primaria">¿Cómo se llama tu escuela primaria?</option>
                    </select>
                </div>

                <div class="input_group">
                    <label for="respuesta" class="label">Respuesta:</label>
                    <input type="text" name="respuesta" class="input" required>
                </div>

            
                    <button type="submit" class="btn_crear2">Recuperar Contraseña</button>

                    <a href="login.php" class="btn_regresar2">Regresar</a>

            </form>
        </div>
    </div>  
</body>
</html>
