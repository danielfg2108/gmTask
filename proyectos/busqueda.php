<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar();

$id_proyecto = $_GET['id_proyecto'];

$busqueda = addslashes($_POST['busqueda']);

$sql_tareas = "SELECT * FROM proyectos_tareas WHERE id_proyecto='$id_proyecto'"; //generar tareas del proyecto
$resultado_tareas = $mysqli->query($sql_tareas); //guardar consulta
?>

<h1 class="mt-4"></h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="proyectos.php">Proyectos</a></li>
    <li class="breadcrumb-item active">Detalles</li>
</ol>

<h2 style="display:inline;">Resultados de la Busqueda</h2>
<br>

<link rel="stylesheet" href="../css/estilos_cards.css">

<!-- TAREAS SIN SECCIÓN-->
<section class="product">
    <?php
     if(!empty($busqueda)){
    ?>
    <button class="pre-btn"><img src="../images/arrow.png" alt=""></button>
    <button class="nxt-btn"><img src="../images/arrow.png" alt=""></button>
    <div class="product-container">
        <?php
        while ($row_tareas = mysqli_fetch_array($resultado_tareas)) { //id de todas las tareas que tiene el proyecto

            $id_tarea_sin = $row_tareas['id_tarea']; //guardar id en variable

            $sql_busqueda1 = "SELECT * FROM tareas WHERE id_tarea='$id_tarea_sin' AND nombre LIKE '%$busqueda%'
                              UNION
                              SELECT * FROM tareas WHERE id_tarea='$id_tarea_sin' AND descripcion LIKE '%$busqueda%'
                              UNION
                              SELECT * FROM tareas WHERE id_tarea='$id_tarea_sin' AND fecha_entrega LIKE '%$busqueda%'
                              UNION
                              SELECT * FROM tareas WHERE id_tarea='$id_tarea_sin' AND status LIKE '%$busqueda%';"; //generar consulta secciones
            
            $resultado_busqueda1 = $mysqli->query($sql_busqueda1); //guardar consulta
            $num_busqueda1 = $resultado_busqueda1->num_rows; //si la consulta genero resultados
        
            if($num_busqueda1 > 0){
                while( $row_busqueda1 = mysqli_fetch_array($resultado_busqueda1) ){ //ejecutar consulta (fetch devuelve un solo registro)) { //si se encontro una tarea
             ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php
                            $sql_imagen = "SELECT * FROM archivos_tareas WHERE id_tarea='$id_tarea_sin' AND descripcion LIKE '%.%g' LIMIT 1"; //generar archivos
                            $resultado_imagen = $mysqli->query($sql_imagen); //guardar consulta
                            $row_imagen = mysqli_fetch_array($resultado_imagen); //ejecutar consulta (fetch devuelve un solo registro)
                            $num_imagen = $resultado_imagen->num_rows; //si la consulta genero resultados          
                            if($num_imagen > 0){
                                $ruta_imagen =  "archivos_tareas/".$id_tarea_sin."/".$row_imagen['descripcion'];
                            }else{
                                $ruta_imagen = "images/tarea.jpg";
                            }
                            ?>
                            <img src="../<?php echo $ruta_imagen?>" class="product-thumb" alt="">
                            <a type="button" class="btn btn-secondary" onclick="AsignarSeccion('<?php echo $row_todas['id_tarea'] ?>')">MOVER A SECCIÓN</a>
                        </div>

                        <div class="product-info">
                            <p class="product-short-description"><?php echo $row_busqueda1['fecha_entrega'] ?></p>
                            <p class="price"><?php echo $row_busqueda1['nombre'] ?></p>

                            <?php
                            if (($row_busqueda1['status'] == "ACTIVA") || ($row_busqueda1['status'] == "activa")) { //si el status es ACTIVA            
                            ?>
                                <p class="price" style="font-size: 13px; color: green; font-weight: bold;"><?php echo $row_busqueda1['status'] ?></p>
                            <?php
                            } else { //si es status es FINALIZADA   
                            ?>
                                <p class="price" style="font-size: 13px; color: red; font-weight: bold;"><?php echo $row_busqueda1['status'] ?></p>
                            <?php
                            }
                            ?>
                            <a href="../tareas/detalles_tarea.php?id_tarea=<?php echo $row_busqueda1['id_tarea'] ?>&id_proyecto=<?php echo $id_proyecto ?>">Ver</a>
                        </div>
                    </div>
        <?php
                } //while de busqueda
            }// if num
        } //while id de todas las tareas
    } //si hay texto en el buscador
    else{
        ?>
        <br><br><br><br>
        <h2 style="color: gray;">SIN RESULTADOS</h2>
        <?php
        }
        ?>
    </div>
</section><!-- TAREAS SIN SECCIÓN-->

<?php require_once '../footer.php'; ?>



