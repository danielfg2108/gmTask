<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar(); //llamar al metodo para hacer conexion a la BD


$sql = "SELECT * FROM proyectos WHERE id_usuario='$id' OR privacidad ='PUBLICO'"; //generar consulta proyectos
$resultado = $mysqli->query($sql); //guardar consulta proyectos


if ($_POST) { //si ya se ingresaron los datos
  $nombre_tarea = addslashes($_POST['nombre_tarea']);
  $descripcion = addslashes($_POST['descripcion']);

  $fecha_entrega = addslashes($_POST['fecha_entrega']);
  $date_entrega = strtotime($fecha_entrega);
  $date = date('d/m/Y', $date_entrega);

  $proyecto = addslashes($_POST['proyecto']);

  if (!empty($nombre_tarea) && !empty($descripcion) && !empty($fecha_entrega)) { //validar que los campos no esten vacios

    $sql = "INSERT INTO tareas (nombre, descripcion, fecha_entrega, id_usuario)
              VALUES ('$nombre_tarea','$descripcion','$date', '$id')"; //generar query

    $result = mysqli_query($con, $sql); //ejecutar query insercion en tareas


    if ($result) { //si se ejecuto correctamente el query 

      $id_tarea =  mysqli_insert_id($con);

      if (!empty($proyecto)) { //validar que los campos no esten vacios
        if (($proyecto == "SIN PROYECTO") || ($proyecto == "sin proyeto")) { //si se asigno un proyecto
          $nombre_tarea = ""; //limpiar campos
          $descripcion = "";
          $fecha_entrega = "";
          $proyecto = "";
          $id_tarea = "";
          $_POST['nombre_tarea'] = ""; //limpiar campos post
          $_POST['descripcion'] = "";
          $_POST['fecha_entrega'] = "";
          $_POST['proyecto'] = "";
        } else {
          $sql_pt = "INSERT INTO proyectos_tareas (id_proyecto, id_tarea)
                  VALUES ('$proyecto','$id_tarea')"; //generar query
          $result_pt = mysqli_query($con, $sql_pt); //ejecutar query

          $nombre_tarea = ""; //limpiar campos
          $descripcion = "";
          $fecha_entrega = "";
          $proyecto = "";
          $id_tarea = "";
          $_POST['nombre_tarea'] = ""; //limpiar campos post
          $_POST['descripcion'] = "";
          $_POST['fecha_entrega'] = "";
          $_POST['proyecto'] = "";
        }
      }


      echo "<script>swal('Tarea creada exitosamente', '', 'success')</script>";
    } else {
      echo "<script>swal('ERROR al registrar tarea', '', 'error')</script>";
    }
  }
} //POST
?>

<h1 class="mt-4">Crear nueva Tarea</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
  <li class="breadcrumb-item active">Nueva Tarea</li>
</ol>

<div class="container mt-3">
  <form action="" method="POST">

    <div class="mb-3">
      <label for="recipient-name" class="col-form-label">Nombre de la tarea:</label>
      <input type="text" class="form-control" name="nombre_tarea" required style="width: 300px;">
    </div>

    <div class="mb-3">
      <label for="recipient-name" class="col-form-label">Descripcion:</label>
      <input type="text" class="form-control" name="descripcion" required style="width: 300px;">
    </div>

    <div class="mb-3">
      <label class="form-label">Fecha de Entrega:</label>
      <input type="date" class="form-control" name="fecha_entrega" required style="width: 300px;">
    </div>

    <div class="mb-3">
      <label for="inputState">Asignar a Proyecto:</label>
      <select id="select" class="form-control" name="proyecto" style="width: 300px;">
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