<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar();
$id_tarea = $_GET['id_tarea'];

$sql = "SELECT * FROM tareas WHERE id_tarea='$id_tarea'"; //generar consulta tareas
$resultado = $mysqli->query($sql); //guardar consulta
$row = mysqli_fetch_array($resultado); //ejecutar consulta (fetch devuelve un solo registro)

$id_usuario_creador = $row['id_usuario'];
$sql_usuario = "SELECT * FROM usuarios WHERE id_usuario='$id_usuario_creador'"; //generar consulta tareas
$resultado_usuario = $mysqli->query($sql_usuario); //guardar consulta
$row_usuario = mysqli_fetch_array($resultado_usuario); //ejecutar consulta (fetch devuelve un solo registro)


$sql_archivos = "SELECT * FROM archivos_tareas WHERE id_tarea='$id_tarea'"; //generar consulta archivos
$resultado_archivos = $mysqli->query($sql_archivos); //guardar consulta de archivos
$num_archivos = $resultado_archivos->num_rows; //si la consulta genero resultados

$sql_proyectos = "SELECT * FROM proyectos WHERE id_usuario='$id' OR privacidad ='PUBLICO'"; //obteenr proyectos
$resultado_proyectos = $mysqli->query($sql_proyectos); //guardar consulta de archivos
?>

<h1 class="mt-4">Tarea</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
    <li class="breadcrumb-item active">Detalles</li>
</ol>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id_BD <?php echo $id_tarea ?></th>
            <th>Descripción</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Nombre:</td>
            <td><?php echo $row['nombre'] ?></td>
        </tr>

        <tr>
            <td>Descripcion:</td>
            <td><?php echo $row['descripcion'] ?></td>
        </tr>

        <tr>
            <td>Fecha de entrega:</td>
            <td><?php echo $row['fecha_entrega'] ?></td>
        </tr>

        <tr>
            <td>Creada por:</td>
            <td><?php echo $row_usuario['correo'] ?></td>
        </tr>

        <tr>
            <td>Proyecto asignado:</td>
            <?php
            $sql_t = "SELECT id_proyecto FROM proyectos_tareas WHERE id_tarea='$id_tarea'"; //saber a que proyecto pertenece
            $resultado_t = $mysqli->query($sql_t); //guardar consulta
            $row_t = mysqli_fetch_array($resultado_t); //ejecutar consulta (fetch devuelve un solo registro)
            $num = $resultado_t->num_rows; //si la consulta genero resultados

            if ($num > 0) {
                $id_p = $row_t['id_proyecto'];
                $sql_p = "SELECT nombre FROM proyectos WHERE id_proyecto='$id_p'"; //generar consulta
                $resultado_p = $mysqli->query($sql_p); //guardar consulta
                $row_p = mysqli_fetch_array($resultado_p); //ejecutar consulta (fetch devuelve un solo registro)
            ?>
                <td><?php echo $row_p['nombre'] ?></td>
            <?php
            } else {
            ?>
                <td>SIN PROYECTO
                <a type="button" class="btn btn-warning" style="height: 25px; padding-top: 1px; margin-left: 10px;" 
                   data-bs-toggle="modal" data-bs-target="#modalAsignarProyecto" data-bs-whatever="@mdo">
                   Asignar a proyecto</a>
                </td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Estado de la tarea:</td>
            <?php
                if (($row['status'] == "ACTIVA") || ($row['status'] == "activa")) {
                ?>
            <td style="color: green; font-weight: bold;"><?php echo $row['status'] ?>
              <a type="button" class="btn btn-warning" style="height: 25px; padding-top: 1px; margin-left: 60px;" href="status_finalizada.php?id_tarea=<?php echo $row['id_tarea'] ?>">Marcar como finalizada</a>
            </td>
        <?php
                } else {
        ?>
            <td style="color: red; font-weight: bold;"><?php echo $row['status'] ?></td>
        <?php
                }
        ?>

        </tr>

        <tr>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarTarea" data-bs-whatever="@mdo">Modificar</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarTarea" data-bs-whatever="@mdo">Eliminar</button>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

<!-- TABLA DE ARCHIVOS-->
<h5 class="mt-4">Archivos adjuntados</h5>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Archivo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row_archivos = mysqli_fetch_array($resultado_archivos)) {
        ?>
            <tr>
                <td><?php echo $row_archivos['descripcion'] ?>
                <?php
                if(str_contains($row_archivos['descripcion'], ".jpg") || //si el archivo es una imagen
                   str_contains($row_archivos['descripcion'], ".png")){
                ?>
                <br>
                <img src="../archivos_tareas/<?php echo $id_tarea?>/<?php echo $row_archivos['descripcion']?>" width="200px"  height="150px">
                <?php
                } //si el archivo es una imagen
                ?>
               </td>
                <td>
                    <a type="button" class="btn btn-success" href="../archivos_tareas/<?php echo $id_tarea ?>/<?php echo $row_archivos['descripcion'] ?>"><i class="fa-solid fa-eye"></i></a>
                    <a type="button" class="btn btn-danger" href="eliminar_archivo_tarea.php?id_archivo_tarea=<?php echo $row_archivos['id_archivo_tarea'] ?>&id_tarea=<?php echo $id_tarea ?>"><i class="fa-solid fa-trash-can"></i></a>
                </td>
                <td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarArchivo" data-bs-whatever="@mdo">Agregar nuevo</button>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

<h5 class="mt-4">Comentarios</h5>


<?php require_once '../footer.php'; ?>


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="agregarArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="agregar_archivo_tarea.php?id_tarea=<?php echo $row['id_tarea'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Adjuntar nuevo archivo:</label>
                        <input name="archivo_tarea" type="file" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<!--  ltrim — Retira espacios en blanco (u otros caracteres) del inicio de un string -->
<div class="modal fade" id="modificarTarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_tarea.php?id_tarea=<?php echo $id_tarea ?>" method="POST">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre de la tarea:</label>
                        <input type="text" class="form-control" name="nombre_tarea" required value="<?php echo ltrim($row['nombre']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" required value="<?php echo ltrim($row['descripcion']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Fecha de entega:</label>
                        <input type="text" class="form-control" name="fecha_entrega" required value="<?php echo ltrim($row['fecha_entrega']) ?>" style="width: 150px;">
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


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="eliminarTarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="delete_tarea.php?id_tarea=<?php echo $id_tarea ?>" method="POST">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">¿Esta seguro que desea eliminar esta tarea?</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalAsignarProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../proyectos/asignar_proyecto.php?id_tarea=<?php echo $id_tarea?>" method="POST">

                    <div class="mb-3">
                       <label for="recipient-name" class="col-form-label">Asignar a:</label>
                        <select class="form-control" name="asignar_proyecto" style="width: 300px;">
                           
                            <?php
                            while ($row_proyectos = mysqli_fetch_array($resultado_proyectos)) {
                            ?>
                                <option value="<?php echo $row_proyectos['id_proyecto'] ?>"><?php echo $row_proyectos['nombre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" value="Asignar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->