<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar(); //llamar al metodo para hacer conexion a la BD

$sql = "SELECT * FROM proyectos WHERE id_usuario='$id' OR privacidad ='PUBLICO'"; //generar consulta proyectos
$resultado = $mysqli->query($sql); //guardar consulta proyectos

$sql_usuarios = "SELECT id_usuario, nombre, apellidos, correo FROM usuarios"; //generar consulta usuarios
$resultado_usuarios = $mysqli->query($sql_usuarios); //guardar consulta proyectos


if ($_POST) { //si ya se ingresaron los datos
 
} //POST
?>

<h1 class="mt-4">Crear nueva Tarea</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="tareas.php">Mis Tareas</a></li>
  <li class="breadcrumb-item active">Nueva Tarea</li>
</ol>

<div class="container mt-3">
  <form action="createBD_tarea.php" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="recipient-name" class="col-form-label">Nombre de la tarea:</label>
      <input type="text" class="form-control" name="nombre_tarea" required style="width: 400px;">
    </div>

    <div class="mb-3">
      <label for="recipient-name" class="col-form-label">Agregar Responsable:</label>
            <select id="responsable" class="form-control" name="responsable" style="width: 400px;">
            <option value="0">sin responsable</option>
              <?php
                while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
              ?>
              <option value="<?php echo $row_usuarios['id_usuario']?>"><?php echo $row_usuarios['nombre']?> - <?php echo $row_usuarios['correo'] ?></option>
              <?php
                 }
              ?>
            </select>
    </div>

    <div class="mb-3">
      <label for="recipient-name" class="col-form-label">Descripcion:</label>
      <textarea  type="text" class="form-control" name="descripcion" rows="5" required style="width: 400px;"></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Fecha de Entrega:</label>
      <input type="date" class="form-control" name="fecha_entrega" required style="width: 150px;">
    </div>

         <div class="mb-3">
            <label class="form-label">Adjunar Archivos</label>
            <input type="file" class="form-control" name="archivo1" style="width: 400px;"> 
            <br>
            <input type="file" class="form-control" name="archivo2" style="width: 400px;">         
         </div>

    <div class="mb-3">
      <label for="inputState">Asignar a Proyecto:</label>
      <select id="select" class="form-control" name="proyecto" style="width: 400px;">
        <option value="SIN PROYECTO">SIN PROYECTO</option>
        <?php
        while ($row = mysqli_fetch_array($resultado)) {
        ?>
          <option value="<?php echo $row['id_proyecto'] ?>"><?php echo $row['nombre'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Crear">
  </form>
</div>

<?php require_once '../footer.php'; ?>