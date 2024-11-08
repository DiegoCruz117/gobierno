<h3>Apoyo Alimentario</h3>
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
          $query_alimentario = "SELECT * FROM solicitudes_apoyo WHERE tipo_apoyo = 'Alimentario' ORDER BY id_solicitud ASC";
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