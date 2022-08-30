<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$sql = "SELECT * FROM proyectos WHERE correo_creador='$correo' OR privacidad ='PUBLICO'"; //generar consulta
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
                            <a type="button" href="detalles_proyecto.php?id=<?php echo $row['id_proyecto'] ?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
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


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<!--  ltrim — Retira espacios en blanco (u otros caracteres) del inicio de un string -->
<div class="modal fade" id="modalProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar datos del proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre del proyecto:</label>
                        <input name="nombre" type="text" class="form-control" value="<?php echo ltrim($row_id['nombre']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputState">Privacidad</label>
                        <select id="select" class="form-control" name="privacidad" required>
                            <option><?php echo ltrim($row_id['privacidad']) ?></option>
                            <?php
                            if (ltrim($row_id['privacidad']) == "PRIVADO" || "privado") {
                            ?>
                                <option>PUBLICO</option>
                            <?php
                            } else if (ltrim($row_id['privacidad']) == "PUBLICO" || "publico") {
                            ?>
                                <option>PRIVADO</option>
                            <?PHP
                            }
                            ?>

                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->