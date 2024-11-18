
  <div class="cont_panel_izquierdo">
      <div class="img_logo_panel">
        <a href="principal.php"><img  class="img_logo" src="imagenes/logo.jpg" ></a>
        <br><br>
        <p><?php echo $usuario?></p>
      </div>
      <br><br><br>
      <div class="cont_menu_lateral">
        <ul class="menu">
            <a href="inicio.php" class="menu_opciones">Inicio</a>
            <hr>
            <li><a href="blog.php" class="menu_opciones"><i class="fa-solid fa-file-magnifying-glass"></i>Seguimiento</a></li>
            <hr>
            <li><a href="dashboard_usuarios.php	" class="menu_opciones"><i class="fa-solid fa-users"></i>Usuarios</a></li>
            <hr>
            <li><a href="noticias_admin.php" class="menu_opciones"><i class="fa-solid fa-newspaper"></i>Noticias</a></li>
            <hr>
            <li><a href="apoyo_admin.php" class="menu_opciones"><i class="fa-solid fa-handshake"></i><span class="derecha">Apoyos</span></a></li>
            <hr>
            <li><a href="encargados_admin.php" class="menu_opciones">Encargados</a></li>
            <!-- <hr>
            <li><a href="alcalde.php" class="menu_opciones">Alcalde</a></li> -->
        </ul>
      </div>
    </div>

    <style>

.menu {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.menu li {
  margin: 5px 0;
}

.menu_opciones {
  display: block;
  padding: 12px;
  font-size: 16px;
  color: #611232; /* Color del texto */
  text-decoration: none;
  border-radius: 5px;
  background-color: #fffc; /* Fondo inicial del botón */
  transition: background-color 0.3s ease, color 0.3s ease;
}

.menu_opciones:hover {
  background-color:  #611232; /* Fondo al pasar el cursor */
  color: #ffffff; /* Color del texto al pasar el cursor */
}

hr {
  border: none;
  height: 1px;
  background-color: #ddd;
}

    </style>