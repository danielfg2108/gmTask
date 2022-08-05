<?php
include("../bd/conexion.php");
$con = conectar();

session_start(); //iniciar session de usuario
$id = $_SESSION['id']; //obtener id del usuario

        $correo = $_POST['correo'];
        $sql="UPDATE usuarios SET correo='$correo' WHERE id_usuario='$id'";
        $query=mysqli_query($con,$sql);

        if($query){
                Header("Location: usuarios.php");
            }
?>