<?php 

session_start();
$_SESSION = [];
session_destroy();
echo '
  <script>
    alert("AHORA YA SALISTE DEL SISTEMA");
    location.href = "inicio.php";
  </script>
';

?>