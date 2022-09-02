<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar(); //llamar al metodo para hacer conexion a la BD

$id_seccion = $_GET['id_seccion'];
$sql = "SELECT * FROM secciones_proyecto WHERE id_seccion='$id_seccion'"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta
//////////////////
$row = mysqli_fetch_array($resultado); //ejecutar consulta (fetch devuelve un solo registro)


if ($_POST) { //si ya se ingresaron los datos
  $nombre_seccion = addslashes($_POST['nombre_seccion']);

  if (!empty($nombre) && !empty($privacidad)) { //validar que los campos no esten vacios

      $query = "UPDATE secciones_proyecto SET nombre='$nombre' WHERE id_seccion='$id_seccion'"; //generar query
      $query = mysqli_query($con, $sql); //ejecutar consulta

      if ($query) {
          Header("Location: ../proyectos/detalles_proyecto.php?id=$id");
      }
  }

} //POST
?>

<h1 class="mt-4">Detalles Sección</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
  <li class="breadcrumb-item"><a href="../proyectos/delete_proyecto.php">Inicio</a></li>
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