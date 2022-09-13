<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if (!isset($_SESSION['id'])) { //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}
$id_proyecto = $_GET['id_proyecto'];

$id_tarea_cambiar = addslashes($_POST['id_tarea_cambiar']);
$cambio_seccion = addslashes($_POST['cambio_seccion']);


if (!empty($id_tarea_cambiar) && !empty($cambio_seccion)) { //validar que los campos no esten vacios

  if( ($cambio_seccion == "SIN SECCION") || ($cambio_seccion == "sin seccion") ){
    
    $sql = "DELETE FROM tareas_seccion WHERE id_tarea='$id_tarea_cambiar'";

  }else{
    $sql = "UPDATE tareas_seccion SET id_seccion='$cambio_seccion' WHERE id_tarea='$id_tarea_cambiar'";
 
  }

    $query = mysqli_query($con, $sql); //ejecutar consulta

    if ($query) {
      Header("Location: ../proyectos/detalles_proyecto.php?id_proyecto=$id_proyecto");
    }else{
      echo "Error al modificar";
    }
}
