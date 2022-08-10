<?php
session_start(); //iniciar session de usuario
if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}


require "../librerias/Spreadsheet/vendor/autoload.php";
require "../bd/conexion.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$sql = "SELECT * FROM reporte_servicios";
$resultado = $mysqli->query($sql); 

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("SP SERVICIOS FINAL_CSV");

$hojaActiva->setCellValue('A1','Planta');
$hojaActiva->setCellValue('B1','SC Creation Date');
$hojaActiva->setCellValue('C1','Shopping Cart No.');
$hojaActiva->setCellValue('D1','SC Description');
$hojaActiva->setCellValue('E1','Product Description');
$hojaActiva->setCellValue('F1','Created By Name');
$hojaActiva->setCellValue('G1','PO Number');
$hojaActiva->setCellValue('H1','IR');
$hojaActiva->setCellValue('I1','Vendor Name');
$hojaActiva->setCellValue('J1','Product Type Text');
$hojaActiva->setCellValue('K1','Item Net Value');
$hojaActiva->setCellValue('L1','Document Currency');
$hojaActiva->setCellValue('M1','Cost Center');
$hojaActiva->setCellValue('N1','Tarea');
$hojaActiva->setCellValue('O1','Status');
$hojaActiva->setCellValue('P1','Observaciones');

$fila = 2;

while($rows = $resultado->fetch_assoc()){
    $hojaActiva->setCellValue('A'.$fila, $rows['planta']);
    $hojaActiva->setCellValue('B'.$fila, $rows['sc_creation_date']);
    $hojaActiva->setCellValue('C'.$fila, $rows['shopping_cart_no']);
    $hojaActiva->setCellValue('D'.$fila, $rows['sc_description']);
    $hojaActiva->setCellValue('E'.$fila, $rows['product_description']);
    $hojaActiva->setCellValue('F'.$fila, $rows['created_by_name']);
    $hojaActiva->setCellValue('G'.$fila, $rows['po_number']);
    $hojaActiva->setCellValue('H'.$fila, $rows['ir']);
    $hojaActiva->setCellValue('I'.$fila, $rows['vendor_name']);
    $hojaActiva->setCellValue('J'.$fila, $rows['product_type_text']);
    $hojaActiva->setCellValue('K'.$fila, $rows['item_net_value']);
    $hojaActiva->setCellValue('L'.$fila, $rows['document_currency']);
    $hojaActiva->setCellValue('M'.$fila, $rows['cost_center']);
    $hojaActiva->setCellValue('N'.$fila, $rows['tarea']);
    $hojaActiva->setCellValue('O'.$fila, $rows['status']);
    $hojaActiva->setCellValue('P'.$fila, $rows['observaciones']);
    $fila++;
}

// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReporteServicios.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
