<?php
//Autor: Jafet Daniel Fonseca Garcia
 $mysqli = new mysqli("localhost","root","","task"); //conexion con bd

 function conectar(){
    $host="localhost";
    $user="root";
    $pass="";
    $bd="task";

    $con=mysqli_connect($host,$user,$pass);
    mysqli_select_db($con,$bd);
    return $con;
}
//Autor: Jafet Daniel Fonseca Garcia
?>