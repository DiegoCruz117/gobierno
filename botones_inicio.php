
<?php

// Verifica si la variable de sesión 'rol' está definida y asígnala
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : ''; // Si no está definida, asigna un valor vacío
?>

<nav class="menu">
    <!-- Botones visibles para todos los usuarios -->
    <a href="inicio.php" class="nav-button">Inicio</a>
    <a href="apoyos.php" class="nav-button">Apoyos</a>
    <a href="noticias.php" class="nav-button">Noticias</a>
    <a href="testimonios.php" class="nav-button">Testimonios</a>
    
    <?php if ($rol === 'administrador'): ?>
        <!-- Botones visibles solo para administradores -->
        <a href="encargados_apoyos.php" class="nav-button">Encargado de Apoyos</a>
        <a href="principal.php" class="nav-button">Administrar</a>
    <?php endif; ?>

    <?php if ($rol === 'alcalde'): ?>
        <!-- Botones visibles solo para administradores -->
        <a href="principal.php" class="nav-button">Administrar</a>
        <a href="#" class="nav-button">Quejas y Sugerencias</a>
    <?php endif; ?>
</nav>
