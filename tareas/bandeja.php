<?php require_once '../header.php'; ?>
<?php
$sql_bandeja = "SELECT notificaciones.id_notificacion, notificaciones.tipo, notificaciones.leido,  notificaciones.fecha,
                       colaboradores_tareas.id_tarea,
                       notificaciones.id_usuario
                FROM notificaciones
                INNER JOIN colaboradores_tareas
                ON notificaciones.id_tarea = colaboradores_tareas.id_tarea
                WHERE colaboradores_tareas.id_usuario = '$id' AND notificaciones.id_usuario_receptor  = '$id'
                ORDER BY notificaciones.id_notificacion DESC"; //generar consulta colaboradores

$resultado_bandeja = $mysqli->query($sql_bandeja); //guardar consulta proyectos
?>
<style>
  #borrar_notificacion{
    display: block; 
    text-align: right; 
    color: red;
}
</style>

<h1 id="saludo" class="mt-4">Bandeja de Entrada</h1>
<link rel="stylesheet" href="../css/estilos_bandeja.css">

<div class="container">
    <div class="row">
               <?php
                while ($row_bandeja = mysqli_fetch_array($resultado_bandeja)) {

                        $id_t = $row_bandeja['id_tarea']; //id de tarea en la que colabora
                        $id_u = $row_bandeja['id_usuario']; //id del usuario credor de la notificacion

                          $sql_tarea = "SELECT * FROM tareas WHERE id_tarea='$id_t'"; //generar consulta datos de la tarea
                          $resultado_tarea = $mysqli->query($sql_tarea); //guardar consulta
                          $row_tarea = mysqli_fetch_array($resultado_tarea); //ejecutar consulta (fetch devuelve un solo registro)

                          $sql_usuario = "SELECT nombre, apellidos FROM usuarios WHERE id_usuario='$id_u'"; //generar consulta datos del usuario
                          $resultado_usuario = $mysqli->query($sql_usuario); //guardar consulta
                          $row_usuario = mysqli_fetch_array($resultado_usuario); //ejecutar consulta (fetch devuelve un solo registro)
                ?>
            <div class="card-1">
                 <a href="../notificaciones/delete_notificacion.php?id_notificacion=<?php echo $row_bandeja['id_notificacion']?>" id="borrar_notificacion"><i class="fa-solid fa-xmark" style="  width: 30px; height: 30px;"></i></a>
                <?php 
                   if($row_bandeja['leido'] == "1"){
                ?>
                <p style="text-align: right; font-weight: bold;">
                  visto <i class="fa-solid fa-check-double"></i>
                </p>
                <?php
                   }           
                ?>      
                <h5><?php echo $row_bandeja['fecha'] ?></h5>
                <p>
                  <?php 
                  echo $row_usuario['nombre']." ".$row_usuario['apellidos']." ".$row_bandeja['tipo'];    
                  ?>
                </p>
                <p>Tarea: <?php echo $row_tarea['nombre'] ?></p>
                <p>vence el: <?php echo $row_tarea['fecha_entrega']?> status: <?php echo $row_tarea['status']?></p>

                <input type="button" onclick="location.href='detalles_tarea.php?id_tarea=<?php echo $id_t?>'" value="Ir a tarea" class="btn btn-info">
            </div>
                <?php                    
                  } //while
                ?>
    </div>
</div>

<?php require_once '../footer.php'; ?>


<script>

</script>