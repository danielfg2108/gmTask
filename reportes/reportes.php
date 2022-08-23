<?php require_once '../header.php';?>
<?php   
    require "../bd/conexion.php"; //llamar a la conexion
    $sql = "SELECT * FROM reporte_servicios"; //generar consulta
    $resultado = $mysqli->query($sql); //guardar consulta
?>

                        <h1 class="mt-4">Reporte de reparaciones y servicios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Reporte</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Reporte Excel</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" data-bs-toggle="modal" data-bs-target="#modalExcel" data-bs-whatever="@mdo">Generar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Reporte PDF</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" data-bs-toggle="modal" data-bs-target="#modalPDF" data-bs-whatever="@mdo">Generar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Enviar Reporte</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="enviar_correo.php">Enviar</a>
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
                                            <th>Shopping Cart Num.</th>
                                            <th>Shipper Num.</th>
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
                                            <th>Tipo</th>                     
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Ver</th>
                                            <th>Planta</th>
                                            <th>SC Creation Date</th>
                                            <th>Shopping Cart Num.</th>
                                            <th>Shipper Num.</th>
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
                                            <th>observaciones</th> 
                                            <th>Tipo</th>      
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                            while($row = mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td>
                                              <a type="button" href="detalles_reportes.php?id=<?php echo $row['id_servicio'] ?>" class="btn btn-primary">Ver</a>
                                            </td>
                                            <td><?php echo $row['planta']?></td>
                                            <td><?php echo $row['sc_creation_date']?></td>
                                            <td><?php echo $row['shopping_cart_no']?></td>
                                            <td><?php echo $row['shipper_no']?></td>
                                            <td><?php echo $row['sc_description']?></td>
                                            <td><?php echo $row['product_description']?></td>
                                            <td><?php echo $row['created_by_name']?></td>
                                    
                                            <td><?php echo $row['po_number']?></td>
                                            <td><?php echo $row['ir']?></td>
                                
                                            <td><?php echo $row['vendor_name']?></td>
                                            <td><?php echo $row['product_type_text']?></td>
                                            <td><?php echo $row['item_net_value']?></td>
                                            <td><?php echo $row['document_currency']?></td>
                                            <td><?php echo $row['cost_center']?></td>
                                            <td><?php echo $row['tarea']?></td>
                                            <td><?php echo $row['status']?></td>
                                            <td><?php echo $row['observaciones']?></td>
                                            <td><?php echo $row['tipo']?></td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>        
                                    </tbody>
                                </table>
                            </div>
                        </div>

<?php require_once '../footer.php';?>


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exportar Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="generar_excel.php">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">¿Desea generar archivo Excel?</label>
          </div>     
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-success" value="Generar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalPDF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exportar PDF</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="generar_pdf.php">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">¿Desea generar archivo PDF?</label>
          </div>     
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-danger" value="Generar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


