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
                        $sql_t = "SELECT * FROM tareas WHERE id_tarea='$id_t'"; //generar consulta
                        $resultado_t = $mysqli->query($sql_t); //guardar consulta
                        $row_t = mysqli_fetch_array($resultado_t); //ejecutar consulta (fetch devuelve un solo registro)
                        $num = $resultado_t->num_rows; //si la consulta genero resultados

                        if ($num > 0) {
                ?>
            <div class="card-1" onclick="location.href='detalles_tarea.php?id_tarea=<?php echo $id_t?>'">
                <p>Ha sido asignado a la tarea:</p>
                <h5><?php echo $row_t['nombre'] ?></h5>
                <p>vence el: <?php echo $row_t['fecha_entrega'] ?></p>
            </div>
                <?php
                        } //if
                } //while
                ?>
    </div>
</div>

<?php require_once '../footer.php'; ?>