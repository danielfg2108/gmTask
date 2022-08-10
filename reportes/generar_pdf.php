<?php
require('../librerias/fpdf184/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de servicios',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
}
}

require "../bd/conexion.php"; //llamar a la conexion
$sql = "SELECT * FROM reporte_servicios"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta
$row=mysqli_fetch_array($resultado);

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while ($row = mysqli_fetch_array($resultado)) {
    $pdf->Cell(40,15, 'planta', 1, 0,'',0);
    $pdf->Cell(150,15, $row['planta'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['sc_creation_date'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['shopping_cart_no'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['sc_description'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['product_description'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['created_by_name'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['po_number'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['ir'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['vendor_name'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['product_type_text'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['item_net_value'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['document_currency'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['cost_center'], 1, 1,'',0);

    $pdf->Cell(150,15,  $row['tarea'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['status'], 1, 1,'',0);

    $pdf->Cell(150,15, $row['observaciones'], 1, 1,'',0);    
     
    }

$pdf->Output();
?>