<?php
require('fpdf.php'); // Asegúrate de ajustar la ruta si es necesario
require_once '../includes/conexion.php';

function obtenerNombreCliente($clienteID, $conect)
{

    $query = "SELECT CONCAT(nombres, ' ', apellidos) AS NOMBRE FROM clientes WHERE ID = $clienteID";

    $result = mysqli_query($conect, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['NOMBRE'];
    } else {
        return "Error al obtener el nombre del cliente.";
    }
}

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $logoPath = '../img/logoadminpequeno.png';//'logo4.png';
        $this->Image($logoPath, 10, 8, 33);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Reservaciones', 0, 1, 'C');
        $this->Ln(10);

        // Encabezados de columna
        $this->Cell(40, 10, 'Id reservacion', 1);
        $this->Cell(20, 10, 'ID cliente', 1);
        $this->Cell(40, 10, 'Nombre cliente', 1);
        $this->Cell(40, 10, 'Numero habitacion', 1);
        $this->Cell(45, 10, 'Estado reservacion', 1);
        $this->Cell(40, 10, 'Fecha inicio', 1);
        $this->Cell(40, 10, 'Fecha Fin', 1);

        $this->Ln(10);

    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage('L');
//$pdf->AddPage();


// Consulta a la base de datos
$query = "SELECT * FROM reservaciones";
$result = mysqli_query($db, $query);

// Mostrar resultados en el PDF
while ($row = mysqli_fetch_assoc($result)) {

    $id_cli = $row['IDcliente'];

    $pdf->Cell(40, 8, $row['ID'], 1);
    $pdf->Cell(20, 8, $row['IDcliente'], 1);

    $_nombre_cli = obtenerNombreCliente($id_cli, $db);

    $pdf->Cell(40, 8, $_nombre_cli, 1);
    $pdf->Cell(40, 8, $row['NumeroHabitacion'], 1);
    $pdf->Cell(45, 8, $row['Estado'], 1);

    $fechaInicio = date("d/m/Y", strtotime($row['FechaInicio']));
    $fechaFin = date("d/m/Y", strtotime($row['FechaFin']));

    $pdf->Cell(40, 8, $fechaInicio, 1);
    $pdf->Cell(40, 8, $fechaFin, 1);

    $pdf->Ln();
}

// Generar PDF
//$pdf->Output('D', 'ReporteClientes.pdf');  // Descargar el PDF al navegador
$pdf->Output(); // Mostrar el PDF en el navegador

?>