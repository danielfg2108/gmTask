<?php
include("../bd/conexion.php");
$con = conectar();

session_start(); //iniciar session de usuario
$id = $_SESSION['id']; //obtener id del usuario

        $nombre=$_POST['nombre'];
        $sql="UPDATE usuarios SET  nombre='$nombre' WHERE id_usuario='$id'";
        $query=mysqli_query($con,$sql);

        if($query){
                Header("Location: usuarios.php");
            }

?>