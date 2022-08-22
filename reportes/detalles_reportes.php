<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar();
$id = $_GET['id'];
$sql = "SELECT * FROM reporte_servicios WHERE id_servicio='$id'"; //generar consulta
$sql_archivos = "SELECT * FROM archivos_reporte_servicios WHERE id_servicio='$id'"; //generar consulta archivos

$resultado = $mysqli->query($sql); //guardar consulta
$resultado_archivos = $mysqli->query($sql_archivos); //guardar consulta de archivos
//////////////////
$row = mysqli_fetch_array($resultado); //ejecutar consulta (fetch devuelve un solo registro)
$mensaje = "";


if ($_POST) { //si ya se ingresaron los datos para modificar
  $planta = addslashes($_POST['planta']);
  $sc_creation_date = addslashes($_POST['sc_creation_date']);
  $shopping_cart_no = addslashes($_POST['shopping_cart_no']);
  $shipper_no = addslashes($_POST['shipper_no']);
  $sc_description = addslashes($_POST['sc_description']);
  $product_description = addslashes($_POST['product_description']);
  $created_by_name = addslashes($_POST['created_by_name']);
  $po_number = addslashes($_POST['po_number']);
  $ir = addslashes($_POST['ir']);
  $vendor_name = addslashes($_POST['vendor_name']);
  $product_type_text = addslashes($_POST['product_type_text']);
  $item_net_value = addslashes($_POST['item_net_value']);
  $document_currency = addslashes($_POST['document_currency']);
  $cost_center = addslashes($_POST['cost_center']);
  $tarea = addslashes($_POST['tarea']);
  $status = addslashes($_POST['status']);
  $observaciones = addslashes($_POST['observaciones']);


  if ($status == ('ABIERTO' || 'abierto' || 'CERRADO' || 'cerrado')) {
    $mensaje = "";

  $sql = "UPDATE reporte_servicios SET planta='$planta', 
  sc_creation_date='$sc_creation_date', 
  shopping_cart_no=' $shopping_cart_no', 
  shipper_no=' $shipper_no', 
  sc_description=' $sc_description',
  product_description='$product_description', 
  created_by_name=' $created_by_name', 
  po_number=' $po_number', 
  ir='$ir', 
  vendor_name='$vendor_name', 
  product_type_text='$product_type_text', 
  item_net_value='$item_net_value', 
  document_currency='$document_currency', 
  cost_center=' $cost_center',
  tarea=' $tarea', 
  status=' $status', 
  observaciones='$observaciones'
  WHERE id_servicio='$id'";

    $query = mysqli_query($con, $sql); //ejecutar consulta
    if ($query) {
      echo("<meta http-equiv='refresh' content='0.1'>"); //refrecar pagina / llamarse asi misma
    }


  } else {
    $mensaje = "ERROR: ingrese un status valido (ABIERTO/CERRADO)";
  }
}
?>

<h1 class="mt-4">Detalles</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
  <li class="breadcrumb-item"><a href="reportes.php">Reporte</a></li>
  <li class="breadcrumb-item active">Detalles</li>
</ol>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Id_BD <?php echo $id ?></th>
      <th>Descripción</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>Planta:</td>
      <td><?php echo $row['planta'] ?></td>
    </tr>

    <tr>
      <td>SC Creation Date: </td>
      <td><?php echo $row['sc_creation_date'] ?></td>
    </tr>

    <tr>
      <td>Shopping Cart num. :</td>
      <td><?php echo $row['shopping_cart_no'] ?></td>
    </tr>

    <tr>
      <td>Shipper num. :</td>
      <td><?php echo $row['shipper_no'] ?></td>
    </tr>

    <tr>
      <td>SC Description:</td>
      <td><?php echo $row['sc_description'] ?></td>
    </tr>

    <tr>
      <td>Product Description:</td>
      <td><?php echo $row['product_description'] ?></td>
    </tr>

    <tr>
      <td>Created By Name:</td>
      <td><?php echo $row['created_by_name'] ?></td>
    </tr>


    <tr>
      <td>PO Number:</td>
      <td><?php echo $row['po_number'] ?></td>
    </tr>

    <tr>
      <td>IR:</td>
      <td><?php echo $row['ir'] ?></td>
    </tr>

    <tr>
      <td>Vendor Name:</td>
      <td><?php echo $row['vendor_name'] ?></td>
    </tr>

    <tr>
      <td>Product Tipe Text:</td>
      <td><?php echo $row['product_type_text'] ?></td>
    </tr>

    <tr>
      <td>Item Net Value:</td>
      <td><?php echo $row['item_net_value'] ?></td>
    </tr>

    <tr>
      <td>Document Currency:</td>
      <td><?php echo $row['document_currency'] ?></td>
    </tr>

    <tr>
      <td>Cost Center:</td>
      <td><?php echo $row['cost_center'] ?></td>
    </tr>

    <tr>
      <td>Tarea:</td>
      <td><?php echo $row['tarea'] ?></td>
    </tr>

    <tr>
      <td>Status:</td>
      <td><?php echo $row['status'] ?></td>
    </tr>

    <tr>
      <td>Observaciones:</td>
      <td><?php echo $row['observaciones'] ?></td>
    </tr>

    <tr>
      <td>Tipo:</td>
      <td><?php echo $row['tipo'] ?></td>
    </tr>

    <tr>
      <td>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReporte" data-bs-whatever="@mdo">Modificar datos</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-bs-whatever="@mdo">Eliminar</button>
      </td>
      <td></td>
    </tr>
  </tbody>
</table>

<!-- TABLA DE ARCHIVOS-->
<br>
<h6 class="mt-4">Archivos adjuntados</h6>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Archivo</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row_archivos = mysqli_fetch_array($resultado_archivos)) {
    ?>
      <tr>
        <td><?php echo $row_archivos['descripcion'] ?></td>
        <td>
          <a type="button" class="btn btn-success" href="../archivos_servicios/<?php echo $row_archivos['id_servicio'] ?>/<?php echo $row_archivos['descripcion'] ?>"><i class="fa-solid fa-eye"></i></a>
          <a type="button" class="btn btn-danger" href="eliminar_archivo.php?id_archivo=<?php echo $row_archivos['id_archivo'] ?>&id_servicio=<?php echo $id ?>"><i class="fa-solid fa-trash-can"></i></a>
        </td>
        <td>
      </tr>
    <?php
    }
    ?>
    <tr>
      <td>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalArchivo" data-bs-whatever="@mdo">Agregar nuevo</button>
      </td>
      <td></td>
    </tr>
  </tbody>
</table>

<?php require_once '../footer.php'; ?>


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar datos del servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Planta:</label>
            <input name="planta" type="text" class="form-control" value="<?php echo $row['planta'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">SC Creation Date:</label>
            <input name="sc_creation_date" type="text" class="form-control" value="<?php echo $row['sc_creation_date'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Shopping Cart Num. :</label>
            <input name="shopping_cart_no" type="text" class="form-control" value="<?php echo $row['shopping_cart_no'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Shipper Num. :</label>
            <input name="shipper_no" type="text" class="form-control" value="<?php echo $row['shipper_no'] ?>">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">SC Description:</label>
            <input name="sc_description" type="text" class="form-control" value="<?php echo $row['sc_description'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Description:</label>
            <input name="product_description" type="text" class="form-control" value="<?php echo $row['product_description'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Created By Name:</label>
            <input name="created_by_name" type="text" class="form-control" value="<?php echo $row['created_by_name'] ?>">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">PO Number:</label>
            <input name="po_number" type="text" class="form-control" value="<?php echo $row['po_number'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">IR:</label>
            <input name="ir" type="text" class="form-control" value="<?php echo $row['ir'] ?>">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Vendor Name:</label>
            <input name="vendor_name" type="text" class="form-control" value="<?php echo $row['vendor_name'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Tipe Text:</label>
            <input name="product_type_text" type="text" class="form-control" value="<?php echo $row['product_type_text'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Item Net Value:</label>
            <input name="item_net_value" type="text" class="form-control" value="<?php echo $row['item_net_value'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Document Currency:</label>
            <input name="document_currency" type="text" class="form-control" value="<?php echo $row['document_currency'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cost Center:</label>
            <input name="cost_center" type="text" class="form-control" value="<?php echo $row['cost_center'] ?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tarea:</label>
            <input name="tarea" type="text" class="form-control" value="<?php echo $row['tarea'] ?>">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Status:</label>
            <input name="status" id="select" type="text" class="form-control" list="status" value="<?php echo $row['status'] ?>">
            <datalist id="status">
              <option value="ABIERTO">
              <option value="CERRADO">
            </datalist>
            <div id="msg"><? echo $mensaje ?></div>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Observaciones:</label>
            <textarea name="observaciones" type="text" class="form-control"><?php echo $row['observaciones'] ?>"</textarea>
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



<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="delete_reporte.php?id=<?php echo $row['id_servicio'] ?>" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">¿Esta seguro que desea eliminar este elemento?</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-danger" value="Eliminar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar archivo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="agregar_archivo.php?id=<?php echo $row['id_servicio'] ?>" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Adjuntar nuevo archivo:</label>
            <input name="archivo" type="file" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Agregar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->