<?php require_once '../header.php'; ?>
<?php
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

$sql_usuarios = "SELECT id_usuario, nombre, apellidos, correo FROM usuarios"; //generar consulta usuarios
$resultado_usuarios = $mysqli->query($sql_usuarios); //guardar consulta proyectos

$sql_colaboradores = "SELECT * FROM colaboradores_tareas WHERE id_tarea='$id_tarea'"; //generar consulta colaboradores
$resultado_colaboradores = $mysqli->query($sql_colaboradores); //guardar consulta proyectos

?>
<style>
     #image_perfil{
        width: 25px;
        height: 25px;
        border-radius: 12.5px;
    }
</style>

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
            <td>Descripción:</td>
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
                    <a type="button" class="btn btn-warning" style="height: 25px; padding-top: 1px; margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#modalAsignarProyecto" data-bs-whatever="@mdo">
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
        <?php
        while ($row_c = mysqli_fetch_array($resultado_colaboradores)) {

            $id_usu = $row_c['id_usuario']; //guardar id en variable

            $sql_usu = "SELECT id_usuario, nombre, apellidos, correo FROM usuarios WHERE id_usuario='$id_usu'"; //consulta para obtener los datos de la tarea
            $resultado_usu = $mysqli->query($sql_usu); //guardar consulta
            $row_usu = mysqli_fetch_array($resultado_usu); //ejecutar consulta (fetch devuelve un solo registro)
            $num_usu = $resultado_usu->num_rows; //si la consulta genero resultados  

            if ($num_usu > 0) {

        ?>
                <tr>
                    <td>Colaborador:</td>
                    <td> <?php echo $row_usu['nombre'] ?> - <?php echo $row_usu['correo'] ?></td>
                </tr>
        <?php
            }
        }
        ?>

        <tr>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarTarea" data-bs-whatever="@mdo" style="width: 130px;">Modificar</button>
                <br>
                <br>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarTarea" data-bs-whatever="@mdo" style="width: 130px;">Eliminar</button>
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
            <th>Descripción</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row_archivos = mysqli_fetch_array($resultado_archivos)) {
        ?>
            <tr>
                <td><?php echo $row_archivos['nombre'] ?>
                    <?php
                    if (
                        str_contains($row_archivos['nombre'], ".jpg") || //si el archivo es una imagen
                        str_contains($row_archivos['nombre'], ".png")
                    ) {
                    ?>
                        <br>
                        <img src="../archivos_tareas/<?php echo $id_tarea ?>/<?php echo $row_archivos['nombre'] ?>" width="200px" height="150px">
                    <?php
                    } //si el archivo es una imagen
                    ?>
                </td>
                <td><?php  echo $row_archivos['descripcion']?></td>
                <td>
                    <a type="button" class="btn btn-success" href="../archivos_tareas/<?php echo $id_tarea ?>/<?php echo $row_archivos['nombre'] ?>"><i class="fa-solid fa-eye"></i></a>
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

<!-- Comentario section-->
<form method="POST" action="../comentarios/enviar_comentario.php?id_tarea=<?php echo $id_tarea?>">
    <section id="contact">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="col-xs-12">      
                       
                        <?php
                         $sql_comentarios = "SELECT * FROM comentarios_tareas WHERE id_tarea='$id_tarea'"; //generar consulta
                         $resultado_comentarios = $mysqli->query($sql_comentarios); //guardar consulta

                        while ($row_comentario = mysqli_fetch_array($resultado_comentarios)) {

                            $id_usu_comentario = $row_comentario['id_usuario']; //guardar id en variable
               
                            $sql_usu_comentario = "SELECT nombre, apellidos FROM usuarios WHERE id_usuario='$id_usu_comentario'"; //consulta para obtener los datos de la tarea
                            $resultado_usu_comentario = $mysqli->query($sql_usu_comentario); //guardar consulta
                            $row_usu_comentario = mysqli_fetch_array($resultado_usu_comentario); //ejecutar consulta (fetch devuelve un solo registro)
                            $num_usu_comentario = $resultado_usu_comentario->num_rows; //si la consulta genero resultados
                            
                            if ($num_usu_comentario > 0) { 

                                //imagen del perfil usuario
                                $sql_imagen_perfil = "SELECT nombre FROM imagenes_perfil WHERE id_usuario='$id_usu_comentario'"; //consulta para obtener imagen de perfil
                                $resultado_imagen_perfil = $mysqli->query($sql_imagen_perfil); //guardar consulta
                                $row_imagen_perfil = mysqli_fetch_array($resultado_imagen_perfil); //ejecutar consulta (fetch devuelve un solo registro)
                            
                            ?>
                            <b><img src="../<?php echo $row_imagen_perfil['nombre']?>" id="image_perfil"></b>
                            <b><?php echo $row_usu_comentario['nombre']?> <?php echo $row_usu_comentario['apellidos']?>
                            </b> (<?php echo $row_comentario['fecha']?>)
                            <br>
                            <?php echo $row_comentario['descripcion']?>
                            <br>
                            <hr/>
                        <?php
                            }
                        }
                        ?>

                        <div class="form-group">
                            <label for="comentario" class="form-label">Comentario:</label>
                            <textarea class="form-control" name="comentario" cols="30" rows="5" type="text" id="comentario" placeholder="Escribe tu comentario......"></textarea>
                        </div>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Enviar Comentario">
</form>
</div>
</section>

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
                        <br>
                        <input type="text" class="form-control" name="descripcion_archivo" placeholder="Descripción del archivo adjuntado" required> 
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
                        <label for="recipient-name" class="col-form-label">Agregar Colaborador:</label>
                        <select id="responsable" class="form-control" name="responsable">
                            <option value="0">sin responsable</option>
                            <?php
                            while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
                            ?>
                                <option value="<?php echo $row_usuarios['id_usuario'] ?>"><?php echo $row_usuarios['nombre'] ?> - <?php echo $row_usuarios['correo'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
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
                <form action="../proyectos/asignar_proyecto.php?id_tarea=<?php echo $id_tarea ?>" method="POST">

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