<?php require_once '../header.php';?>

<?php 
     require "../bd/conexion.php"; //llamar a la conexion

    $id=$_GET['id'];
    $sql = "SELECT * FROM reporte_servicios WHERE id_servicio='$id'"; //generar consulta
    $resultado = $mysqli->query($sql); //guardar consulta
    
    //////////////////
    $row=mysqli_fetch_array($resultado);
?>

                        <h1 class="mt-4">Detalles</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="reportes.php">Reportes</a></li>
                            <li class="breadcrumb-item active">Detalles</li>
                        </ol>

                        
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php  echo $row['id_usuario']?></th> 
                                            <th>Descripción</th>                    
                                        </tr>
                                    </thead>
                               
                                    <tbody>
                                        <tr>
                                          <td>Planta:</td>
                                          <td></td>                                                                                
                                        </tr>

                                        <tr>
                                          <td>SC Creation Date: </td>
                                          <td></td>                                       
                                        </tr>

                                        <tr>
                                          <td>Shopping Cart no.:</td>
                                          <td></td>                                      
                                        </tr>

                                        <tr>
                                          <td>SC Description:</td>
                                          <td></td>                                                        
                                        </tr>

                                        <tr>
                                          <td>Product Description:</td>
                                          <td></td>
                                        </tr>

                                        <tr>
                                          <td>Created By Name:</td>
                                          <td></td>
                                        </tr>

                                        <tr>
                                          <td>Document Status:</td>
                                          <td></td>                                        
                                        </tr>

                                        <tr>
                                          <td>PO Number:</td>
                                          <td></td>                                        
                                        </tr> 

                                        <tr>
                                          <td>IR:</td>
                                          <td></td>                                        
                                        </tr> 

                                        <tr>
                                          <td>Vendor DUNS:</td>
                                          <td></td>                                        
                                        </tr> 

                                        <tr>
                                          <td>Vendor Name:</td>
                                          <td></td>                                        
                                        </tr> 

                                        <tr>
                                          <td>Product Tipe Text:</td>
                                          <td></td>                                        
                                        </tr> 

                                        <tr>
                                          <td>Item Net Value:</td>
                                          <td></td>                                        
                                        </tr> 

                                        <tr>
                                          <td>Document Currency:</td>
                                          <td></td>                                        
                                        </tr>

                                        <tr>
                                          <td>Cost Center:</td>
                                          <td></td>                                        
                                        </tr>

                                        <tr>
                                          <td>Tarea:</td>
                                          <td></td>                                        
                                        </tr>
                                        
                                        <tr>
                                          <td>Status:</td>
                                          <td></td>                                        
                                        </tr>

                                        <tr>
                                          <td>Observaciones:</td>
                                          <td></td>                                        
                                        </tr>   
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReporte" data-bs-whatever="@mdo">Editar</button>
                                            </td>
                                            <td></td>    
                                        </tr> 

                                    </tbody>
                                </table>
                           

<?php require_once '../footer.php';?>


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar datos de reporte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Planta:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">SC Creation Date:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Shopping Cart No.:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">SC Description:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Description:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Created By Name:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Document Status:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">PO Number:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">IR:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Vendor DUNS:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Vendor Name:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Tipe Text:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Item Net Value:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Document Currency:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cost Center:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tarea:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Status:</label>
            <input name="nombre" type="text" class="form-control" list="status">
            <datalist id="status">
              <option value="ABIERTO">
              <option value="CERRADO">
            </datalist>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Observaciones:</label>
            <input name="nombre" type="text" class="form-control" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Actualizar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->