<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}
$id_tarea=$_GET['id_tarea'];

        //agregar archivo
        if($_FILES["archivo_tarea"]){ //si se subio un archivo
            $nombre_base = basename($_FILES["archivo_tarea"]["name"]); //obtener el nombre del archivo
            $nombre_final = date("d-m-y")."_".date("H-i-s")."-".$nombre_base; //agregar fecha y hora al nombre
            $ruta = "../archivos_tareas/".$id_tarea."/".$nombre_final;
            
            if(!file_exists("../archivos_tareas/".$id_tarea."/")){ //sino existe la ruta, crearla
                mkdir("../archivos_tareas/".$id_tarea."/"); //crear ruta
            }
            $subirarchivo = move_uploaded_file($_FILES["archivo_tarea"]["tmp_name"], $ruta); //mover el archivo del formulario a la ruta que le indique
            if($subirarchivo){ //si se movio el archivo en la ruta que le indique
               $insertar = "INSERT INTO archivos_tareas(descripcion, id_tarea) VALUES ('$nombre_final', '$id_tarea')"; //query
               $resultado = mysqli_query($con, $insertar); //ejecutar query
               if($resultado){//si se inserto el archivo en la bd
                  echo "<script>alert('se ha enviado archivo')</script>";
               }else{
                  echo "<script>alert('error al guardar archivo')</script>";
               }
            }
         }
        
        if($resultado){
                Header("Location: detalles_tarea.php?id_tarea=$id_tarea");
            }else{
               echo "<script>alert('error al cargar archivo')</script>";
            }
?>