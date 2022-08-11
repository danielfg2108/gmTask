<?php require_once '../header.php';?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar(); //llamar al metodo para hacer conexion a la BD
$mensaje = "";

if($_POST){//si ya se ingresaron los datos
   
$planta=$_POST['planta'];
$sc_creation_date=$_POST['sc_creation_date'];
$shopping_cart_no=$_POST['shopping_cart_no'];
$sc_description=$_POST['sc_description'];
$product_description=$_POST['product_description'];
$created_by_name=$_POST['created_by_name'];
$po_number=$_POST['po_number'];
$ir=$_POST['ir'];
$vendor_name=$_POST['vendor_name'];
$product_type_text=$_POST['product_type_text'];
$item_net_value=$_POST['item_net_value'];
$document_currency=$_POST['document_currency'];
$cost_center=$_POST['cost_center'];
$tarea=$_POST['tarea'];
$status=$_POST['status'];
$observaciones=$_POST['observaciones'];



  if (!empty($planta) && !empty($sc_creation_date) && !empty($shopping_cart_no) 
      && !empty($sc_description) && !empty($product_description) && !empty($created_by_name)
      && !empty($po_number) && !empty($ir) && !empty($vendor_name)
      && !empty($product_type_text) && !empty($item_net_value) && !empty($document_currency)
      && !empty($cost_center) && !empty($tarea) && !empty($status) && !empty($observaciones)) {//validar que los campos no esten vacios
   
            $sql = "INSERT INTO reporte_servicios (planta, sc_creation_date, shopping_cart_no, sc_description,
                    product_description, created_by_name, po_number, ir, vendor_name, product_type_text, 
                    item_net_value, document_currency, cost_center, tarea, status, observaciones)
                    VALUES ('$planta','$sc_creation_date',' $shopping_cart_no','$sc_description',
                    '$product_description','$created_by_name',' $po_number','$ir','$vendor_name',' $product_type_text',
                    '$item_net_value','$document_currency','$cost_center','$tarea','$status','$observaciones')";

            $result=mysqli_query($con, $sql); //ejecutar query
            
            if ($result) {//si se ejecuto correctamente el query

                echo "<script>alert('servicio agregado exitosamente')</script>";

                $planta="";
                $sc_creation_date="";
                $shopping_cart_no="";
                $sc_description="";
                $product_description="";
                $created_by_name="";
                $po_number="";
                $ir="";
                $vendor_name="";
                $product_type_text="";
                $item_net_value="";
                $document_currency="";
                $cost_center="";
                $tarea="";
                $status="";
                $observaciones="";

                $_POST['planta']="";
                $_POST['sc_creation_date']="";
                $_POST['shopping_cart_no']="";
                $_POST['sc_description']="";
                $_POST['product_description']="";
                $_POST['created_by_name']="";
                $_POST['po_number']="";
                $_POST['ir']="";
                $_POST['vendor_name']="";
                $_POST['product_type_text']="";
                $_POST['item_net_value']="";
                $_POST['document_currency']="";
                $_POST['cost_center']="";
                $_POST['tarea']="";
                $_POST['status']="";
                $_POST['observaciones']="";

                $mensaje = "";              
            }else{
                echo "<script>alert('ERROR al registrar servicio')</script>";               
            }       
  }//validar que los campos no esten vacios
}
?>
    <h1 class="mt-4">Agregar nuevo servicio</h1>
    <br>
    
    <div class="container mt-3">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
         <label class="form-label">Planta:</label>
         <input type="text" class="form-control" name="planta" required>
      </div>
      <div class="mb-3">
         <label class="form-label">SC Creation Date:</label>
         <input type="text" class="form-control" name="sc_creation_date" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Shopping Cart no.:</label>
         <input type="text" class="form-control" name="shopping_cart_no" required>
      </div>

      <div class="mb-3">
         <label class="form-label">SC Description:</label>
         <input type="text" class="form-control" name="sc_description" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Product Description:</label>
         <input type="text" class="form-control" name="product_description" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Created By Name:</label>
         <input type="text" class="form-control" name="created_by_name" required>
      </div>

    

      <div class="mb-3">
         <label class="form-label">PO Number:</label>
         <input type="text" class="form-control" name="po_number" required>
      </div>

      <div class="mb-3">
         <label class="form-label">IR:</label>
         <input type="text" class="form-control" name="ir" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Vendor Name:</label>
         <input type="text" class="form-control" name="vendor_name" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Product Tipe Text:</label>
         <input type="text" class="form-control" name="product_type_text" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Item Net Value:</label>
         <input type="text" class="form-control" name="item_net_value" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Document Currency:</label>
         <input type="text" class="form-control" name="document_currency" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Cost Center:</label>
         <input type="text" class="form-control" name="cost_center" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Tarea:</label>
         <input type="text" class="form-control" name="tarea" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Status:</label>
         <input type="text" class="form-control" name="status" list="status" required>
         <datalist id="status">
              <option value="ABIERTO">
              <option value="CERRADO">
            </datalist>
         <div id="emailHelp" class="form-text">ABIERTO /CERRADO</div>
      </div>

      <div class="mb-3">
            <label class="form-label">Observaciones:</label>
            <textarea name="observaciones" type="text" class="form-control" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Adjuntar archivo: (Opcional)</label>
            <input type="file" class="form-control" name="archivo">
          </div>
      
      <input type="submit" class="btn btn-primary" value="Agregar">
</form>
</div>
                       
<?php require_once '../footer.php';?>