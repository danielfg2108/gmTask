<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if (!isset($_SESSION['id'])) { //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}
$id_proyecto = $_GET['id_proyecto'];

$id_tarea_asignar = addslashes($_POST['id_tarea_asignar']);
$asignar_seccion = addslashes($_POST['asignar_seccion']);


if (!empty($id_tarea_asignar) && !empty($asignar_seccion)) { //validar que los campos no esten vacios

    $sql = "INSERT INTO tareas_seccion (id_seccion, id_tarea)
             VALUES ('$asignar_seccion','$id_tarea_asignar')"; //generar query

    $query = mysqli_query($con, $sql); //ejecutar consulta

    if ($query) {
      Header("Location: ../proyectos/detalles_proyecto.php?id_proyecto=$id_proyecto");
    }else{
      echo "Error al modificar";
    }
}
