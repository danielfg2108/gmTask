<?php  
include("../bd/conexion.php");
include("../notificaciones/funciones_notificaciones.php");
$con = conectar();
session_start(); //iniciar session de usuario

if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}
date_default_timezone_set('America/Mexico_City');  
$fecha_sistema = date('d/m/Y h:i:s a', time());

// Llamando a los campos
$id_tarea = $_GET['id_tarea'];
$id = $_SESSION['id'];  //obtener el id de la sesion del usuario

$comentario= $_POST['comentario'];

date_default_timezone_set('America/Mexico_City');  
$fecha = date('d-m-Y h:i:s a', time());  

$sql_colaboradores = "SELECT * FROM colaboradores_tareas WHERE id_tarea='$id_tarea'"; //generar consulta colaboradores
$resultado_colaboradores = $mysqli->query($sql_colaboradores); //guardar consulta proyectos

if (!empty($comentario) ) { //validar que los campos no esten vacios

    $sql = "INSERT INTO comentarios_tareas (descripcion, fecha, id_tarea, id_usuario)
            VALUES ('$comentario','$fecha', '$id_tarea', '$id')";

    $query = mysqli_query($con, $sql); //ejecutar consulta

    if ($query) {
        while ($row_colaboradores = mysqli_fetch_array($resultado_colaboradores)) {
            notificacion_comentario($fecha_sistema, $id_tarea, $id, $row_colaboradores['id_usuario'], $con);
        }
        
        Header("Location: ../tareas/detalles_tarea.php?id_tarea=$id_tarea");
    }else{
        echo "error al modificar";
    }
}
?>