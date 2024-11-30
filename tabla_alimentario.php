<link rel="icon" type="image/x-icon" href="imagenes/logo_icono.png">
    <div class="tab1">
        <div class="tablinks pestaña color1" id="aceptados" onclick="openTab(event, 'aceptados')">Aceptados</div>
        <div class="tablinks pestaña color3" id="rechazados" onclick="openTab(event, 'rechazados')">Rechazados</div>
            <div class="buscar">
                    <form action="" method="post">
                        <input type="text" name="buscar_titulo" placeholder="Buscar" class="caja4">
                        <button type="submit" name="boton_buscar" class="btn_buscar">Buscar</button>
                    </form>
                </div>
    </div>
          <table class="tabla_usuarios">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <!-- <th>Tipo de Programa</th> -->
            <th>Estatus</th>
            <th>Acciones</th>
            <th>Ver</th>
            <th>Eliminar</th>

          </tr>
          <?php
          // Consulta para obtener solicitudes de apoyo alimentario
          $query_alimentario = "SELECT * FROM solicitudes_apoyo WHERE tipo_apoyo = 'alimentario' ORDER BY id_solicitud ASC";
          $resultado_alimentario = mysqli_query($conectar, $query_alimentario);

          // Bucle para mostrar cada solicitud en una fila de la tabla
          while ($fila = mysqli_fetch_assoc($resultado_alimentario)) {
          ?>
          <tr>
            <td><?php echo $fila["id_solicitud"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["email"]; ?></td>
            <td><?php echo $fila["telefono"]; ?></td>
            <!-- <td><?php echo $fila["tipo_apoyo"]; ?></td> -->
            <td><?php echo $fila["estatus"]; ?></td>
            <td>
              <!-- Formulario para actualizar estatus -->
              <form method="POST" style="display:inline;">
                <input type="hidden" name="id_solicitud" value="<?php echo $fila["id_solicitud"]; ?>">
                <input type="hidden" name="actualizar_estatus" value="1">

                <!-- Botones de estatus -->
                <button type="submit" name="estatus" value="Aceptado" class="btn_estatus aceptado">Aceptado</button>
                <button type="submit" name="estatus" value="Rechazado" class="btn_estatus rechazado">Rechazado</button>
              </form>
            </td>
            <td><a href="ver_post.php?id=<?php echo $fila["id_solicitud"]; ?>"><img src="imagenes/icono_ver.png" class="img_ver"></a></td>
            <td><a href="#" Onclick="validar('borrar_registros.php?id_solicitud=<?php echo $fila["id_solicitud"]; ?>')"><img src="imagenes/icono_eliminar.png" class="img_eliminar"></a></td>
          </tr>
          <?php
          }
          ?>
        </table>
        <script>

      function validar(url){
        var eliminar = confirm("¿Desea eliminar el registro?");
        if(eliminar == true){
          window.location = url;
        }
      }

    function openTab(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tab-content");

      // Ocultar todas las pestañas
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        tabcontent[i].classList.remove("active");
      }

      tablinks = document.getElementsByClassName("tablinks");

      // Eliminar la clase activa de todas las pestañas
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
      }

      // Mostrar la pestaña seleccionada
      document.getElementById(tabName).style.display = "block";
      document.getElementById(tabName).classList.add("active");

      // Marcar la pestaña seleccionada como activa
      evt.currentTarget.classList.add("active");

      // Guardar la pestaña activa en el almacenamiento local
      localStorage.setItem("activeTab", tabName);
    }

    // Al cargar la página, verificar si hay una pestaña guardada en el almacenamiento local
    window.onload = function() {
      var activeTab = localStorage.getItem("activeTab");

      if (activeTab) {
        var tabcontent = document.getElementsByClassName("tab-content");
        var tablinks = document.getElementsByClassName("tablinks");

        // Ocultar todas las pestañas
        for (var i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
          tabcontent[i].classList.remove("active");
        }

        // Eliminar la clase activa de todos los enlaces de pestaña
        for (var i = 0; i < tablinks.length; i++) {
          tablinks[i].classList.remove("active");
        }

        // Mostrar la pestaña activa
        document.getElementById(activeTab).style.display = "block";
        document.getElementById(activeTab).classList.add("active");

        // Agregar la clase activa al enlace correspondiente para mantener el estilo visual
        for (var i = 0; i < tablinks.length; i++) {
          if (tablinks[i].id === "tab1" + activeTab) {
            tablinks[i].classList.add("active");
          }
        }
      } else {
        // Si no hay una pestaña guardada, mostrar la primera pestaña por defecto
        document.getElementsByClassName("tablinks")[0].click();
      }
    }
  </script>