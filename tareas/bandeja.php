<?php require_once '../header.php'; ?>
<?php
$sql_bandeja = "SELECT * FROM colaboradores_tareas WHERE id_usuario='$id'"; //generar consulta colaboradores
$resultado_bandeja = $mysqli->query($sql_bandeja); //guardar consulta proyectos
?>
<h1 id="saludo" class="mt-4">Bandeja de Entrada</h1>
<link rel="stylesheet" href="../css/estilos_bandeja.css">

<div class="container">
    <div class="row">
               <?php
                while ($row_bandeja = mysqli_fetch_array($resultado_bandeja)) {

                        $id_t = $row_bandeja['id_tarea'];

                        $sql_notificaciones = "SELECT notificaciones.id_notificacion, notificaciones.tipo, notificaciones.leido, 
                                                      notificaciones.fecha, notificaciones.id_tarea, notificaciones.id_usuario,
                                                      usuarios.nombre, usuarios.apellidos
                                               FROM notificaciones
                                               NATURAL JOIN usuarios
                                               WHERE id_tarea='$id_t'"; //generar consulta
                        $resultado_notificaciones = $mysqli->query($sql_notificaciones); //guardar consulta 
                        $row_notify = mysqli_fetch_array($resultado_notificaciones); //ejecutar consulta (fetch devuelve un solo registro)
                        $num = $resultado_notificaciones->num_rows; //si la consulta genero resultados

                        $sql_t = "SELECT * FROM tareas WHERE id_tarea='$id_t'"; //generar consulta
                        $resultado_t = $mysqli->query($sql_t); //guardar consulta
                        $row_t = mysqli_fetch_array($resultado_t); //ejecutar consulta (fetch devuelve un solo registro)
                        
                        if($num > 0){
                ?>
            <div class="card-1">
                <?php 
                   if($row_notify['leido'] == "1"){
                ?>
                <p style="text-align: right; font-weight: bold;">visto <i class="fa-solid fa-check-double"></i></p>
                <?php
                   }           
                ?>      
                <h5><?php echo $row_notify['fecha'] ?></h5>
                <p>
                  <?php echo $row_notify['nombre'] ?> <?php echo $row_notify['apellidos'] ?>
                  Ha <?php echo $row_notify['tipo'] ?> en la tarea:
                </p>
                <p><?php echo $row_t['nombre'] ?></p>

                <input type="button" onclick="location.href='detalles_tarea.php?id_tarea=<?php echo $id_t?>'" value="Ir a tarea" class="btn btn-info">
            </div>
                <?php       
                 } //if            
                  } //while
                ?>
    </div>
</div>

<?php require_once '../footer.php'; ?>


<script>

</script>