<?php require_once '../header.php'; ?>


<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar(); //llamar al metodo para hacer conexion a la BD
$mensaje = "";

if ($_POST) { //si ya se ingresaron los datos
   /*
   addslashes(string $str)
   Devuelve un string con barras invertidas delante de los caracteres 
   que necesitan ser escapados. Estos caracteres son la comilla simple ('), comilla doble ("),
    barra invertida (\) y NUL (el byte null). 
   */
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

   if (
      !empty($planta) && !empty($sc_creation_date) && !empty($shopping_cart_no) && !empty($shipper_no)
      && !empty($sc_description) && !empty($product_description) && !empty($created_by_name)
      && !empty($po_number) && !empty($ir) && !empty($vendor_name)
      && !empty($product_type_text) && !empty($item_net_value) && !empty($document_currency)
      && !empty($cost_center) && !empty($tarea) && !empty($status) && !empty($observaciones)
   ) { //validar que los campos no esten vacios

      if ($status == ('CERRADO' || 'cerrado')) {

        // if (!empty($_FILES['archivo1'])) { //si se envio algo 

      $sql = "INSERT INTO reporte_servicios (planta, sc_creation_date, shopping_cart_no, shipper_no, sc_description,
      product_description, created_by_name, po_number, ir, vendor_name, product_type_text, 
      item_net_value, document_currency, cost_center, tarea, status, observaciones, tipo)
      VALUES ('$planta','$sc_creation_date',' $shopping_cart_no','$shipper_no','$sc_description',
      '$product_description','$created_by_name',' $po_number','$ir','$vendor_name',' $product_type_text',
      '$item_net_value','$document_currency','$cost_center','$tarea','$status','$observaciones', 'REPARACION')"; //generar query

            $result = mysqli_query($con, $sql); //ejecutar query

            if ($result) { //si se ejecuto correctamente el query  

               $ultimo_id = mysqli_insert_id($con); //recibo el último id insertado

               //agregar archivo1
               if ($_FILES["archivo1"]) { //si se subio un archivo
                  $nombre_base = basename($_FILES["archivo1"]["name"]); //obtener el nombre del archivo
                  $nombre_final = date("d-m-y") . "_" . date("H-i-s") . "-" . $nombre_base; //agregar fecha y hora al nombre
                  $ruta = "../archivos_servicios/" . $ultimo_id . "/" . $nombre_final;

                  if (!file_exists("../archivos_servicios/" . $ultimo_id . "/")) { //sino existe la ruta, crearla
                     mkdir("../archivos_servicios/" . $ultimo_id . "/"); //crear ruta
                  }
                  $subirarchivo = move_uploaded_file($_FILES["archivo1"]["tmp_name"], $ruta); //mover el archivo del formulario a la ruta que le indique
                  if ($subirarchivo) { //si se movio el archivo en la ruta que le indique
                     $insertar = "INSERT INTO archivos_reporte_servicios(descripcion, id_servicio) VALUES ('$nombre_final', '$ultimo_id')"; //query
                     $resultado_archivo = mysqli_query($con, $insertar); //ejecutar query
                     if ($resultado_archivo) { //si se inserto el archivo en la bd
                        //echo "<script>alert('se ha enviado archivo')</script>";
                     } else {
                        // echo "<script>alert('error al guardar archivo')</script>";
                     }
                  }
               }
               //agregar archivo2
               if ($_FILES["archivo2"]) { //si se subio un archivo
                  $nombre_base = basename($_FILES["archivo2"]["name"]); //obtener el nombre del archivo
                  $nombre_final = date("d-m-y") . "_" . date("H-i-s") . "-" . $nombre_base; //agregar fecha y hora al nombre
                  $ruta = "../archivos_servicios/" . $ultimo_id . "/" . $nombre_final;

                  if (!file_exists("../archivos_servicios/" . $ultimo_id . "/")) { //sino existe la ruta, crearla
                     mkdir("../archivos_servicios/" . $ultimo_id . "/"); //crear ruta
                  }
                  $subirarchivo = move_uploaded_file($_FILES["archivo2"]["tmp_name"], $ruta); //mover el archivo del formulario a la ruta que le indique
                  if ($subirarchivo) { //si se movio el archivo en la ruta que le indique
                     $insertar = "INSERT INTO archivos_reporte_servicios(descripcion, id_servicio) VALUES ('$nombre_final', '$ultimo_id')"; //query
                     $resultado_archivo = mysqli_query($con, $insertar); //ejecutar query
                     if ($resultado_archivo) { //si se inserto el archivo en la bd
                        //echo "<script>alert('se ha enviado archivo')</script>";
                     } else {
                        // echo "<script>alert('error al guardar archivo')</script>";
                     }
                  }
               }

               $planta = ""; //limpiar campos
               $sc_creation_date = "";
               $shopping_cart_no = "";
               $shipper_no = "";
               $sc_description = "";
               $product_description = "";
               $created_by_name = "";
               $po_number = "";
               $ir = "";
               $vendor_name = "";
               $product_type_text = "";
               $item_net_value = "";
               $document_currency = "";
               $cost_center = "";
               $tarea = "";
               $status = "";
               $observaciones = "";

               $_POST['planta'] = ""; //limpiar campos post
               $_POST['sc_creation_date'] = "";
               $_POST['shopping_cart_no'] = "";
               $_POST['shipper_no'] = "";
               $_POST['sc_description'] = "";
               $_POST['product_description'] = "";
               $_POST['created_by_name'] = "";
               $_POST['po_number'] = "";
               $_POST['ir'] = "";
               $_POST['vendor_name'] = "";
               $_POST['product_type_text'] = "";
               $_POST['item_net_value'] = "";
               $_POST['document_currency'] = "";
               $_POST['cost_center'] = "";
               $_POST['tarea'] = "";
               $_POST['status'] = "";
               $_POST['observaciones'] = "";

               echo "<script>alert('Reparación agregada exitosamente')</script>";
            } else {
               echo "<script>alert('ERROR al registrar servicio')</script>";
            }

         /*} else {
            echo '<h3 style="color: red;">NO FUE POSIBLE REALIZAR EL REGISTRO, FAVOR DE ADJUNTAR LOS ARCHIVOS NECESARIOS PARA EL STATUS "CERRADO"</h3>';
         }*/


      } else 
        if($status == 'ABIERTO' || 'abierto' ){
         //si el status es abierto
      $sql = "INSERT INTO reporte_servicios (planta, sc_creation_date, shopping_cart_no, shipper_no, sc_description,
      product_description, created_by_name, po_number, ir, vendor_name, product_type_text, 
      item_net_value, document_currency, cost_center, tarea, status, observaciones, tipo)
      VALUES ('$planta','$sc_creation_date',' $shopping_cart_no','$shipper_no','$sc_description',
      '$product_description','$created_by_name',' $po_number','$ir','$vendor_name',' $product_type_text',
      '$item_net_value','$document_currency','$cost_center','$tarea','$status','$observaciones', 'REPARACION')"; //generar query

            $result = mysqli_query($con, $sql); //ejecutar query

            if ($result) { //si se ejecuto correctamente el query  
        
               $planta = ""; //limpiar campos
               $sc_creation_date = "";
               $shopping_cart_no = "";
               $shipper_no = "";
               $sc_description = "";
               $product_description = "";
               $created_by_name = "";
               $po_number = "";
               $ir = "";
               $vendor_name = "";
               $product_type_text = "";
               $item_net_value = "";
               $document_currency = "";
               $cost_center = "";
               $tarea = "";
               $status = "";
               $observaciones = "";

               $_POST['planta'] = ""; //limpiar campos post
               $_POST['sc_creation_date'] = "";
               $_POST['shopping_cart_no'] = "";
               $_POST['shipper_no'] = "";
               $_POST['sc_description'] = "";
               $_POST['product_description'] = "";
               $_POST['created_by_name'] = "";
               $_POST['po_number'] = "";
               $_POST['ir'] = "";
               $_POST['vendor_name'] = "";
               $_POST['product_type_text'] = "";
               $_POST['item_net_value'] = "";
               $_POST['document_currency'] = "";
               $_POST['cost_center'] = "";
               $_POST['tarea'] = "";
               $_POST['status'] = "";
               $_POST['observaciones'] = "";

               echo "<script>alert('reparacion agregado exitosamente')</script>";
            } else {
               echo "<script>alert('ERROR al registrar servicio')</script>";
            }
         
      }//si el status es abierto
   } //validar que los campos no esten vacios

} //POST
?>
<script>
   $("#cerrado").hide(); //con jquery oculta etiqueta al cargar la pagina

   $(document).ready(function(){
    $('#select').on('change', function(){
        var selectValor = '#'+$(this).val();

        if(selectValor == "#abierto"){
            document.querySelector('#archivo1').required = false;
            document.querySelector('#archivo2').required = false;
           }else{
            document.querySelector('#archivo1').required = true;
            document.querySelector('#archivo2').required = true;
           }

        $('#pai').children('div').hide();
        $('#pai').children(selectValor).show();
    })
})
</script>

<h1 class="mt-4">Registrar nueva Reparación</h1>
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
         <label class="form-label">Shopping Cart num.:</label>
         <input type="text" class="form-control" name="shopping_cart_no" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Shipper num.:</label>
         <input type="text" class="form-control" name="shipper_no" required>
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
         <label for="inputState">Status</label>
         <select id="select" class="form-control" name="status" style="width: 150px;">
            <option value="abierto">ABIERTO</option>
            <option value="cerrado">CERRADO</option>
         </select>
      </div>

      <div id="pai">
         <div id="cerrado" class="mb-3">
            <label class="form-label" style="color:orange">Si cambias a status CERRADO es necesario adjuntar el reporte y shipper</label>
            <br>
            <label class="form-label" style="color: orange;">Agregar reporte:</label>
            <input type="file" class="form-control" id="archivo1" name="archivo1" required>
            <br>
            <label class="form-label " style="color: orange;">Agregar shipper:</label>
            <input type="file" class="form-control" id="archivo2" name="archivo2" required>
         </div>
         <div id="abierto"></div>
      </div>

      <div class="mb-3">
         <label class="form-label">Observaciones:</label>
         <textarea name="observaciones" type="text" class="form-control" required></textarea>
      </div>

      <input type="submit" class="btn btn-primary" value="Agregar" onclick="">
   </form>
</div>

<script>
   $("#cerrado").hide(); //con jquery oculta etiqueta al cargar la pagina

   $(document).ready(function(){
    $('#select').on('change', function(){
        var selectValor = '#'+$(this).val();

        if(selectValor == "#abierto"){
            document.querySelector('#archivo1').required = false;
            document.querySelector('#archivo2').required = false;
           }else{
            document.querySelector('#archivo1').required = true;
            document.querySelector('#archivo2').required = true;
           }

        $('#pai').children('div').hide();
        $('#pai').children(selectValor).show();
    })
})
</script>

<?php require_once '../footer.php'; ?>