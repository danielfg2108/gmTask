<?php
ob_start();
?>

<?php
require "../bd/conexion.php"; //llamar a la conexion
$sql = "SELECT * FROM reporte_servicios"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta
//////////////////
$row=mysqli_fetch_array($resultado);
?>
    <link rel="stylesheet" href="../librerias/bootstrap5.css">

<table class="table table-bordered" id="tabla">
    <thead>
        <tr>
            <th>Planta</th>
            <th>SC Creation Date</th>
            <th>Shopping Cart No.</th>
            <th>SC Description</th>
            <th>Product Description</th>
            <th>Created By Name</th>
            <th>PO Number</th>
            <th>IR</th>
            <th>Vendor Name</th>
            <th>Product Type Text</th>
            <th>Item Net Value</th>
            <th>Document Currency</th>
            <th>Cost Center</th>
            <th>Tarea</th>
            <th>Status</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_array($resultado)) {
        ?>
            <tr>
                <td><?php echo $row['planta'] ?></td>
                <td><?php echo $row['sc_creation_date'] ?></td>
                <td><?php echo $row['shopping_cart_no'] ?></td>
                <td><?php echo $row['sc_description'] ?></td>
                <td><?php echo $row['product_description'] ?></td>
                <td><?php echo $row['created_by_name'] ?></td>
                <td><?php echo $row['po_number'] ?></td>
                <td><?php echo $row['ir'] ?></td>
                <td><?php echo $row['vendor_name'] ?></td>
                <td><?php echo $row['product_type_text'] ?></td>
                <td><?php echo $row['item_net_value'] ?></td>
                <td><?php echo $row['document_currency'] ?></td>
                <td><?php echo $row['cost_center'] ?></td>
                <td><?php echo $row['tarea'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['observaciones'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
$html=ob_get_clean();
echo $html;

require "../librerias/Spreadsheet/vendor/autoload.php";;
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions(); //para imagenes
$options->set(array('isRemoteEnabled' => true));//para imagenes
$dompdf->setOptions($options);//para imagenes

$dompdf->loadHtml("hola develoteca");
$dompdf->setPaper('letter'); //tamaño carta
//$dompdf->setPaper('A4','landscape'); //horizontal
$dompdf->render(); //poner todo visible
$dompdf->stream("reporte_servicios.pdf", array("Attachment"=>false));
?>