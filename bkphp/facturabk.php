<?php
require('fpdf.php'); // Asegúrate de ajustar la ruta si es necesario
require_once '../includes/conexion.php';

if (isset($_GET['id'])) {

    // Obtener la variable $id_factura
    $id_factura = $_GET['id'];

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            $logoPath = '../img/logoadminpequeno.png'; //'logo4.png';
            $this->Image($logoPath, 10, 8, 33);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Factura', 0, 1, 'C');
            $this->Ln(10);

            // Encabezados de columna
            $this->Cell(60, 10, 'Nombre del cliente', 1);
            $this->Cell(60, 10, 'NIT', 1);
            $this->Cell(60, 10, 'Fecha de factura', 1);
            $this->Cell(60, 10, 'Monto', 1);

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
    $query = "SELECT * FROM Facturas WHERE ID = $id_factura";
    $result = mysqli_query($db, $query);

    // Mostrar resultados en el PDF
    while ($row = mysqli_fetch_assoc($result)) {

        $pdf->Cell(60, 8, $row['nombre_nit'], 1);
        $pdf->Cell(60, 8, $row['NIT'], 1);
        $pdf->Cell(60, 8, $row['FechaFactura'], 1);
        $pdf->Cell(60, 8, number_format($row['monto'], 2), 1);

        $pdf->Ln();

    }

    // Generar PDF
//$pdf->Output('D', 'ReporteClientes.pdf');  // Descargar el PDF al navegador
    $pdf->Output(); // Mostrar el PDF en el navegador

} else {
    Header("Location: ../facturas.php");
}

?>
