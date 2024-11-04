<?php
require('fpdf.php'); // Asegúrate de que el archivo FPDF.php está en el mismo directorio

// $id_solicitud = $_POST['id_solicitud'];
// require "conexion.php"; // Conexión a la base de datos
// $verSolicitud = "SELECT * FROM solicitudes_apoyo WHERE id_solicitud = '$id_solicitud'";
// $resultado = mysqli_query($conectar, $verSolicitud);
// $fila = mysqli_fetch_assoc($resultado);

// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial', 'B', 16);
// $pdf->Cell(0, 10, 'Solicitud de Apoyo', 0, 1, 'C');
// $pdf->Ln(10);

// $pdf->SetFont('Arial', '', 12);
// foreach ($fila as $campo => $dato) {
//     $pdf->Cell(40, 10, ucfirst($campo) . ':', 0, 0);
//     $pdf->Cell(0, 10, $dato, 0, 1);
// }

// $pdf->Output('D', 'Solicitud_' . $id_solicitud . '.pdf'); // Descarga el PDF
?>
