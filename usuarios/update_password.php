<?php
include("../bd/conexion.php");
$con = conectar();

session_start(); //iniciar session de usuario
$id = $_SESSION['id']; //obtener id del usuario

        $password=$_POST['password'];
        $pass_cifrado = sha1($password); //cifrar password ingresada
        $sql="UPDATE usuarios SET  password='$pass_cifrado' WHERE id_usuario='$id'";
        $query=mysqli_query($con,$sql);

        if($query){
                Header("Location: usuarios.php");
            }
?>