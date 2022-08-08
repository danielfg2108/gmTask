<?php require_once '../header.php';?>
<?php   
    require "../bd/conexion.php"; //llamar a la conexion
    $sql = "SELECT * FROM reporte_servicios"; //generar consulta
    $resultado = $mysqli->query($sql); //guardar consulta
    //////////////////
    $row=mysqli_fetch_array($resultado);
?>
                        <h1 class="mt-4">Reporte de servicios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Reportes</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Reporte Excel</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Generar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Reporte PDF</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Generar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Enviar Reporte</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Enviar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Servicios
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Ver</th>
                                            <th>Planta</th>
                                            <th>SC Creation Date</th>
                                            <th>Shopping Cart No.</th>
                                            <th>SC Description</th>
                                            <th>Product Description</th>
                                            <th>Created By Name</th>
                                            <th>Document Status</th>
                                            <th>PO Number</th>
                                            <th>IR</th>
                                            <th>Vendor DUNS</th>
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
                                    <tfoot>
                                        <tr>
                                            <th>Ver</th>
                                            <th>Planta</th>
                                            <th>SC Creation Date</th>
                                            <th>Shopping Cart No.</th>
                                            <th>SC Description</th>
                                            <th>Product Description</th>
                                            <th>Created By Name</th>
                                            <th>Document Status</th>
                                            <th>PO Number</th>
                                            <th>IR</th>
                                            <th>Vendor DUNS</th>
                                            <th>Vendor Name</th>
                                            <th>Product Type Text</th>
                                            <th>Item Net Value</th>
                                            <th>Document Currency</th>
                                            <th>Cost Center</th>
                                            <th>Tarea</th>
                                            <th>Status</th>
                                            <th>observaciones</th>       
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                            while($row=mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td>
                                              <a type="button" href="detalles_reportes.php?id=<?php echo $row['id_servicio'] ?>" class="btn btn-primary">Ver</a></th>
                                            </td>
                                            <td><?php echo $row['planta']?></td>
                                            <td><?php echo $row['sc_creation_date']?></td>
                                            <td><?php echo $row['shopping_cart_no']?></td>
                                            <td><?php echo $row['sc_description']?></td>
                                            <td><?php echo $row['product_description']?></td>
                                            <td><?php echo $row['created_by_name']?></td>
                                            <td><?php echo $row['document_status']?></td>
                                            <td><?php echo $row['po_number']?></td>
                                            <td><?php echo $row['ir']?></td>
                                            <td><?php echo $row['vendor_duns']?></td>
                                            <td><?php echo $row['vendor_name']?></td>
                                            <td><?php echo $row['product_type_text']?></td>
                                            <td><?php echo $row['item_net_value']?></td>
                                            <td><?php echo $row['document_currency']?></td>
                                            <td><?php echo $row['cost_center']?></td>
                                            <td><?php echo $row['tarea']?></td>
                                            <td><?php echo $row['status']?></td>
                                            <td><?php echo $row['observaciones']?></td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>        
                                    </tbody>
                                </table>
                            </div>
                        </div>

<?php require_once '../footer.php';?>
