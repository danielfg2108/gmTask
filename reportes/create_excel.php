<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=reporte_servicios.xls");

require "../bd/conexion.php"; //llamar a la conexion
$sql = "SELECT * FROM reporte_servicios"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta
//////////////////
$row=mysqli_fetch_array($resultado);
?>

<table>
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