<?php
require "seguridad.php";
require "conexion.php";
require 'fpdf/fpdf.php';

// Obtener el ID de la solicitud desde el formulario
$id_solicitud = $_POST['id_solicitud'];

// Consulta para obtener los detalles de la solicitud
$verSolicitud = "SELECT * FROM solicitudes_apoyo WHERE id_solicitud = '$id_solicitud'";
$resultado = mysqli_query($conectar, $verSolicitud);
$fila = mysqli_fetch_assoc($resultado);

// Crear una instancia de FPDF y configurar la página
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Colores personalizados
$headerColor = [30, 50, 100];
$textColor = [60, 60, 60];
$sectionBgColor = [240, 248, 255];
$fieldBgColor = [225, 235, 245];

// Título principal con fondo de color
$pdf->SetFillColor($headerColor[0], $headerColor[1], $headerColor[2]);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0, 15, 'Solicitud de Apoyo - ID ' . $fila["id_solicitud"], 0, 1, 'C', true);
$pdf->Ln(8);

// Función para encabezados de sección
function sectionHeader($pdf, $title) {
    global $headerColor, $sectionBgColor;
    $pdf->SetFillColor($sectionBgColor[0], $sectionBgColor[1], $sectionBgColor[2]);
    $pdf->SetTextColor($headerColor[0], $headerColor[1], $headerColor[2]);
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 10, utf8_decode($title), 0, 1, 'L', true);
    $pdf->Ln(3);
}

// Función para agregar un campo y su dato en el PDF
function addField($pdf, $field, $value) {
    global $textColor, $fieldBgColor;
    $pdf->SetFillColor($fieldBgColor[0], $fieldBgColor[1], $fieldBgColor[2]);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(60, 8, utf8_decode($field), 0, 0, 'L', true);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(0, 8, utf8_decode($value), 0, 1, 'L', true);
    $pdf->Ln(2);
}

// Información Personal
sectionHeader($pdf, 'Información Personal');
addField($pdf, 'Nombre:', $fila["nombre"]);
addField($pdf, 'Fecha de Nacimiento:', $fila["fecha_nacimiento"]);
addField($pdf, 'Teléfono:', $fila["telefono"]);
addField($pdf, 'Email:', $fila["email"]);
addField($pdf, 'Dirección:', $fila["direccion"]);
addField($pdf, 'Estado Civil:', $fila["estado_civil"]);
$pdf->Ln(5);

// Información Socioeconómica
sectionHeader($pdf, 'Información Socioeconómica');
addField($pdf, 'Ocupación:', $fila["ocupacion"]);
addField($pdf, 'Seguro Médico:', $fila["seguro_medico"]);
addField($pdf, 'Nivel Educativo:', $fila["nivel_educativo"]);
addField($pdf, 'Tipo de Vivienda:', $fila["tipo_vivienda"]);
$pdf->Ln(5);

// Situación
sectionHeader($pdf, 'Situación');
$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor($sectionBgColor[0], $sectionBgColor[1], $sectionBgColor[2]);
$pdf->MultiCell(0, 8, utf8_decode($fila["descripcion"]), 0, 'L', true);
$pdf->Ln(5);

// Documentación Adjunta
sectionHeader($pdf, 'Documentación Adjunta');
$pdf->SetFont('Arial', '', 11);
$attachments = [
    'Identificación' => $fila['identificacion'],
    'Comprobante de Domicilio' => $fila['comprobante_domicilio']
];

if ($fila["tipo_apoyo"] === "vivienda") {
    $attachments['Informe de Daños'] = $fila['informe_danos'];
    $attachments['Documentación del Terreno'] = $fila['documentacion_terreno'];
}

// Recuadro para cada documento
foreach ($attachments as $docName => $fileName) {
    $pdf->Cell(0, 10, utf8_decode($docName), 1, 1, 'L', true);
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->SetTextColor($headerColor[0], $headerColor[1], $headerColor[2]);
    $pdf->Cell(0, 8, 'Ver archivo: ' . $fileName, 0, 1, 'L', false);
    $pdf->Ln(3);
}

// Guardar o enviar el PDF al navegador
$pdf->Output('I', 'Solicitud_Apoyo_' . $fila["id_solicitud"] . '.pdf');
?>
