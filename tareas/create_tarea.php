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

    $sql = "INSERT INTO tareas (nombre, descripcion, fecha_entrega, status, id_usuario)
              VALUES ('$nombre_tarea','$descripcion','$date', 'ACTIVA', '$id')"; //generar query

    $result = mysqli_query($con, $sql); //ejecutar query insercion en tareas

    if ($result) { //si se ejecuto correctamente el query 

      $id_tarea =  mysqli_insert_id($con);

      if (!empty($proyecto)) { //validar que los campos no esten vacios
        if (($proyecto == "SIN PROYECTO") || ($proyecto == "sin proyeto")) { //si NO se asigno un proyecto
          
          $nombre_tarea = ""; //limpiar campos
          $descripcion = "";
          $fecha_entrega = "";
          $proyecto = "";
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
          $_POST['nombre_tarea'] = ""; //limpiar campos post
          $_POST['descripcion'] = "";
          $_POST['fecha_entrega'] = "";
          $_POST['proyecto'] = "";
        }
      }


      //agregar archivo
      if($_FILES["archivo1"]){ //si se subio un archivo
        $nombre_base = basename($_FILES["archivo1"]["name"]); //obtener el nombre del archivo
        $nombre_final = date("d-m-y")."_".date("H-i-s")."-".$nombre_base; //agregar fecha y hora al nombre
        $ruta = "../archivos_tareas/".$id_tarea."/".$nombre_final;
        
        if(!file_exists("../archivos_tareas/".$id_tarea."/")){ //sino existe la ruta, crearla
            mkdir("../archivos_tareas/".$id_tarea."/"); //crear ruta
        }
        $subirarchivo = move_uploaded_file($_FILES["archivo1"]["tmp_name"], $ruta); //mover el archivo del formulario a la ruta que le indique
        if($subirarchivo){ //si se movio el archivo en la ruta que le indique
           $insertar = "INSERT INTO archivos_tareas(descripcion, id_tarea) VALUES ('$nombre_final', '$id_tarea')"; //query
           $resultado = mysqli_query($con, $insertar); //ejecutar query
          
        }
     }

     if($_FILES["archivo2"]){ //si se subio un archivo
      $nombre_base = basename($_FILES["archivo2"]["name"]); //obtener el nombre del archivo
      $nombre_final = date("d-m-y")."_".date("H-i-s")."-".$nombre_base; //agregar fecha y hora al nombre
      $ruta = "../archivos_tareas/".$id_tarea."/".$nombre_final;
      
      if(!file_exists("../archivos_tareas/".$id_tarea."/")){ //sino existe la ruta, crearla
          mkdir("../archivos_tareas/".$id_tarea."/"); //crear ruta
      }
      $subirarchivo = move_uploaded_file($_FILES["archivo2"]["tmp_name"], $ruta); //mover el archivo del formulario a la ruta que le indique
      if($subirarchivo){ //si se movio el archivo en la ruta que le indique
         $insertar = "INSERT INTO archivos_tareas(descripcion, id_tarea) VALUES ('$nombre_final', '$id_tarea')"; //query
         $resultado = mysqli_query($con, $insertar); //ejecutar query
         
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
  <li class="breadcrumb-item"><a href="tareas.php">Mis Tareas</a></li>
  <li class="breadcrumb-item active">Nueva Tarea</li>
</ol>

<div class="container mt-3">
  <form action="" method="POST" enctype="multipart/form-data">

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
            <label class="form-label">Adjunar Archivos</label>
            <input type="file" class="form-control" name="archivo1" style="width: 300px;"> 
            <br>
            <input type="file" class="form-control" name="archivo2" style="width: 300px;">         
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