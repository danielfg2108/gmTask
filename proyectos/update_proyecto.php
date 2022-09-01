<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if (!isset($_SESSION['id'])) { //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}

$id_proyecto = $_GET['id_proyecto'];

$nombre = addslashes($_POST['nombre']);
$privacidad = addslashes($_POST['privacidad']);


if (
    !empty($nombre) && !empty($privacidad)) { //validar que los campos no esten vacios

    $sql = "UPDATE proyectos SET nombre='$nombre', privacidad ='$privacidad' WHERE id_proyecto='$id_proyecto'";

    $query = mysqli_query($con, $sql); //ejecutar consulta

    if ($query) {
        Header("Location: detalles_proyecto.php?id=$id");
    }
}
