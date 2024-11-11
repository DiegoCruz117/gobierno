<?php
include('conexion.php'); // Asegúrate de tener la conexión a la base de datos

// Obtener los datos enviados por AJAX
$encargado = $_POST['encargado'];
$rating = $_POST['rating'];
$comentario = $_POST['comentario'];
$usuario_id = $_POST['usuario_id']; // Recibir el ID del usuario

// Verificar si el usuario ya calificó a este encargado
$sql_check = "SELECT * FROM calificaciones WHERE usuario_id = ? AND encargado = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("is", $usuario_id, $encargado);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    echo "Ya has calificado a este encargado."; // Enviar mensaje de que ya calificó
    exit();
}

$stmt_check->close();

// Insertar la calificación si no ha calificado previamente
$sql_insert = "INSERT INTO calificaciones (usuario_id, encargado, rating, comentario) VALUES (?, ?, ?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("isis", $usuario_id, $encargado, $rating, $comentario);
$stmt_insert->execute();

// Verificar si la inserción fue exitosa
if ($stmt_insert->affected_rows > 0) {
    echo "Calificación guardada con éxito.";
} else {
    echo "Hubo un error al guardar la calificación.";
}

$stmt_insert->close();
$conn->close();
?>
