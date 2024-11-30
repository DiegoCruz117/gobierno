<?php
require "conexion.php";

$id_solicitud = $_GET["id_solicitud"];

// Primero, verifica el estatus de la solicitud
$consulta_estatus = "SELECT * FROM solicitudes_apoyo WHERE id_solicitud = '$id_solicitud'";
$resultado_estatus = mysqli_query($conectar, $consulta_estatus);

if ($resultado_estatus && mysqli_num_rows($resultado_estatus) > 0) {
    $fila = mysqli_fetch_assoc($resultado_estatus);
    $estatus = $fila['estatus'];

    // Solo permite la eliminación si el estatus es "Aceptado" o "Rechazado"
    if ($estatus === 'Aceptado' || $estatus === 'Rechazado') {
        $borrar = "DELETE FROM solicitudes_apoyo WHERE id_solicitud = '$id_solicitud'";
        $resultado = mysqli_query($conectar, $borrar);

        if ($resultado) {
            echo '
            <script>
                alert("Solicitud eliminada correctamente");
                location.href = "blog.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Error al eliminar la solicitud.");
                location.href = "blog.php";
            </script>
            ';
        }
    } else {
        echo '
        <script>
            alert("No se puede eliminar la solicitud hasta que esté en estatus Aceptado o Rechazado.");
            location.href = "blog.php";
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("Solicitud no encontrada.");
        location.href = "blog.php";
    </script>
    ';
}
?>
