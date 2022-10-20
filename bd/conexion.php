<?php
//Autor: Jafet Daniel Fonseca Garcia
 $mysqli = new mysqli("localhost","root","","task"); //conexion con bd
//Autor: Jafet Daniel Fonseca Garcia
 function conectar(){
    $host="localhost";
    $user="root";
    $pass="";
    $bd="task";
//Autor: Jafet Daniel Fonseca Garcia
    $con=mysqli_connect($host,$user,$pass);
    mysqli_select_db($con,$bd);
    return $con;
}
//Autor: Jafet Daniel Fonseca Garcia
?>