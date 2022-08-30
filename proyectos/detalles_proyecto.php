<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar();
$id = $_GET['id'];
$sql = "SELECT * FROM proyectos WHERE id_proyecto='$id'"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta
$row = mysqli_fetch_array($resultado); //ejecutar consulta (fetch devuelve un solo registro)
?>

<h1 class="mt-4">Detalles</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="proyectos.php">Proyectos</a></li>
    <li class="breadcrumb-item active">Detalles</li>
</ol>

<h2 style="display:inline;"><?php echo $row['nombre'] ?>. </h2>
<p style="display:inline;"><?php echo $row['privacidad'] ?></p>
<br>
<br>
<a type="button" class="btn btn-warning" style="height: 30px; padding-top: 3px;" data-bs-toggle="modal" data-bs-target="#modalProyecto">Editar proyecto</a>
<a type="button" class="btn btn-danger"  style="height: 30px; padding-top: 3px;" data-bs-toggle="modal" data-bs-target="#modalProyecto">Eliminar</a>

<?php require_once '../footer.php'; ?>