<?php  
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario

if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}
date_default_timezone_set('America/Mexico_City');  
$fecha_sistema = date('d/m/Y h:i:s a', time());

// Llamando a los campos
$id_servicio = $_GET['id_servicio'];
$id = $_SESSION['id'];  //obtener el id de la sesion del usuario

$comentario= $_POST['comentario'];

date_default_timezone_set('America/Mexico_City');  
$fecha = date('d-m-Y h:i:s a', time());  

if (!empty($comentario) ) { //validar que los campos no esten vacios

    $sql = "INSERT INTO comentarios_servicios (descripcion, fecha, id_servicio, id_usuario)
            VALUES ('$comentario','$fecha', '$id_servicio', '$id')";

    $query = mysqli_query($con, $sql); //ejecutar consulta

    if ($query) {
        Header("Location: ../reportes/detalles_reportes.php?id=$id_servicio");
    }else{
        echo "error al modificar";
    }
}
?>