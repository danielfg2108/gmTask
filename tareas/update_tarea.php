<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if (!isset($_SESSION['id'])) { //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}

$id_tarea = $_GET['id_tarea'];
$id_proyecto = $_GET['id_proyecto'];

$nombre_tarea = addslashes($_POST['nombre_tarea']);
$descripcion = addslashes($_POST['descripcion']);
$fecha_entrega = addslashes($_POST['fecha_entrega']);


if (!empty($nombre_tarea) && !empty($descripcion) && !empty($fecha_entrega)) { //validar que los campos no esten vacios

    $sql = "UPDATE tareas SET nombre='$nombre_tarea', descripcion ='$descripcion', fecha_entrega ='$fecha_entrega' WHERE id_tarea='$id_tarea'";

    $query = mysqli_query($con, $sql); //ejecutar consulta

    if ($query) {
        Header("Location: detalles_tarea.php?id_tarea=$id_tarea&id_proyecto=$id_proyecto");
    }else{
        echo "error al modificar";
    }
}
