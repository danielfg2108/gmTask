<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar(); //llamar al metodo para hacer conexion a la BD

if ($_POST) { //si ya se ingresaron los datos
  $nombre = addslashes($_POST['nombre']);
  $privacidad = addslashes($_POST['privacidad']);

  if (!empty($nombre) && !empty($privacidad)) { //validar que los campos no esten vacios

      $sql = "INSERT INTO proyectos (nombre, correo_creador, privacidad, id_usuario)
              VALUES ('$nombre','$correo','$privacidad', '$id')"; //generar query para registrar nuevo proyecto

            $result = mysqli_query($con, $sql); //ejecutar query


            $id_proyecto =  mysqli_insert_id($con); //obtener ultimo id
            $sql_seccion = "INSERT INTO secciones_proyecto (nombre, id_proyecto)
            VALUES ('mi sección','$id_proyecto')"; //generar query para insertar seccion en  proyecto
             $result_seccion = mysqli_query($con, $sql_seccion); //ejecutar query


            if ($result && $result_seccion) { //si se ejecuto correctamente el query 
              
               $nombre = ""; //limpiar campos
               $privacidad = "";
               $id_proyecto="";
               $_POST['nombre'] = ""; //limpiar campos post
               $_POST['privacidad'] = "";
            
               echo "<script>swal('Proyecto creado exitosamente', '', 'success')</script>";
            }else{            
                echo "<script>swal('ERROR al registrar proyecto', '', 'error')</script>";
            }
  }

} //POST
?>

<h1 class="mt-4">Crear nuevo Proyecto</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="proyectos.php">Mis proyectos</a></li>
  <li class="breadcrumb-item active">Nuevo proyecto</li>
</ol>

<div class="container mt-3">
  <form action="" method="POST">

    <div class="mb-3">
      <label for="recipient-name" class="col-form-label">Nombre del proyecto:</label>
      <input type="text" class="form-control"  name="nombre" required style="width: 300px;">
    </div>

    <div class="mb-3">
      <label for="inputState">Privacidad</label>
      <select id="select" class="form-control" name="privacidad" required style="width: 300px;">
        <option >PUBLICO</option>
        <option >PRIVADO</option>
      </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Crear">
  </form>
</div>


<?php require_once '../footer.php'; ?>