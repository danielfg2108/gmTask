<script src="../librerias/sweetalert.js"></script>
<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}

$id_proyecto=$_GET['id_proyecto'];

        $sql_proyecto="DELETE FROM proyectos WHERE id_proyecto='$id_proyecto'";
        $query_proyecto=mysqli_query($con,$sql_proyecto); //ejecutar consulta para eliminar proyecto

        $sql_seccion="DELETE FROM secciones_proyecto WHERE id_proyecto='$id_proyecto'";
        $query_seccion=mysqli_query($con, $sql_seccion); //ejecutar consulta para eliminar proyecto

        if($query_proyecto && $query_seccion){
                header("Location: proyectos.php");
                echo "<script>alert('Elemento eliminado')</script>";               
            }else{
                echo "<script>alert('Error al eliminar elemento')</script>";
            }
?>