<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$sql = "SELECT * FROM proyectos WHERE id_usuario='$id' OR privacidad ='PUBLICO'"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta
?>
<h1 id="saludo" class="mt-4">Mis Proyectos</h1>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Nuevo proyecto</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="crear_proyecto.php">Crear</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Proyectos
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Creador</th>
                    <th>Privacidad</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Creador</th>
                    <th>Privacidad</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($resultado)) {
                ?>
                    <tr>
                        <td>
                            <a type="button" href="detalles_proyecto.php?id_proyecto=<?php echo $row['id_proyecto'] ?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        </td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['correo_creador'] ?></td>
                        <td><?php echo $row['privacidad'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../footer.php'; ?>


