<?php require_once '../header.php'; ?>

<h1 class="mt-4">Registrar nuevo reporte</h1>
<br>

<h3 class="mt-4">Seleccione el tipo de registro que desea realizar</h3>
<div class="container mt-3">
   <form action="opcion.php" method="POST">
      
      <div class="mb-3">
      <select class="form-control" name="tipo" style="width: 200px;">
        <option selected>REPARACION</option>
        <option>SERVICIO</option>
      </select>
    </div>

      <input type="submit" class="btn btn-primary" value="Continuar">
   </form>
</div>

<?php require_once '../footer.php'; ?>