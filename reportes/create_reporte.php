<?php require_once '../header.php';?>
<?php


?>
    <h1 class="mt-4">Agregar nuevo servicio</h1>
    <br>
    
    <div class="container mt-3">
    <form action="" method="POST">
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
         <label class="form-label">Document Status:</label>
         <input type="text" class="form-control" name="document_status" required>
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
         <label class="form-label">Vendor DUNS:</label>
         <input type="text" class="form-control" name="vendor_duns" required>
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
      
      <input type="submit" class="btn btn-primary" value="Agregar">
</form>
</div>
                       
<?php require_once '../footer.php';?>
