<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}

$id=$_GET['id'];

        $sql="DELETE FROM reporte_servicios WHERE id_servicio='$id'";
             $query=mysqli_query($con,$sql);

        if($query){
                header("Location: reportes.php");
                echo "<script>alert('Elemento eliminado')</script>";               
            }else{
                echo "<script>alert('Error al eliminar elemento')</script>";
            }
?>