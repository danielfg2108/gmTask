<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario

if (!isset($_SESSION['id'])) { //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}
$nombre = $_SESSION['nombre']; //obtener el nombre de la sesion del usuario
$apellidos = $_SESSION['apellidos']; //obtener apellidos
$correo = $_SESSION['correo'];  //obtener el correo de la sesion del usuario
$id = $_SESSION['id'];  //obtener el id de la sesion del usuario


  $nombre_tarea = addslashes($_POST['nombre_tarea']);
  $colaborador = addslashes($_POST['responsable']);
  $descripcion = addslashes($_POST['descripcion']);

  $fecha_entrega = addslashes($_POST['fecha_entrega']);
  $date_entrega = strtotime($fecha_entrega);
  $date = date('d/m/Y', $date_entrega);

  $proyecto = addslashes($_POST['proyecto']);

  if (!empty($nombre_tarea) && !empty($descripcion) && !empty($fecha_entrega)) { //validar que los campos no esten vacios

    $sql = "INSERT INTO tareas (nombre, descripcion, fecha_entrega, status, id_usuario)
              VALUES ('$nombre_tarea','$descripcion','$date', 'ACTIVA', '$id')"; //generar query

    $result = mysqli_query($con, $sql); //ejecutar query insercion en tareas

    if ($result) { //si se ejecuto correctamente el query 

      $id_tarea =  mysqli_insert_id($con);

      if (!empty($proyecto)) { //validar que los campos no esten vacios
        if (($proyecto == "SIN PROYECTO") || ($proyecto == "sin proyeto")) { //si NO se asigno un proyecto
          
          $nombre_tarea = ""; //limpiar campos
          $descripcion = "";
          $fecha_entrega = "";
          $proyecto = "";
          $_POST['nombre_tarea'] = ""; //limpiar campos post
          $_POST['descripcion'] = "";
          $_POST['fecha_entrega'] = "";
          $_POST['proyecto'] = "";
        } else {

          $sql_pt = "INSERT INTO proyectos_tareas (id_proyecto, id_tarea)
                  VALUES ('$proyecto','$id_tarea')"; //generar query
          $result_pt = mysqli_query($con, $sql_pt); //ejecutar query

          $nombre_tarea = ""; //limpiar campos
          $descripcion = "";
          $fecha_entrega = "";
          $proyecto = "";
          $_POST['nombre_tarea'] = ""; //limpiar campos post
          $_POST['descripcion'] = "";
          $_POST['fecha_entrega'] = "";
          $_POST['proyecto'] = "";
        }
      }

      if( (!empty($colaborador)) && ($colaborador != "0") ){
        $sql_colaborador = "INSERT INTO colaboradores_tareas (id_tarea, id_usuario)
                            VALUES ('$id_tarea','$colaborador')"; //generar query
        $resultado_colaborador = mysqli_query($con, $sql_colaborador); //ejecutar query
      }

      //agregar archivo
      if($_FILES["archivo1"]){ //si se subio un archivo
        $nombre_base = basename($_FILES["archivo1"]["name"]); //obtener el nombre del archivo
        $nombre_final = date("d-m-y")."_".date("H-i-s")."-".$nombre_base; //agregar fecha y hora al nombre
        $ruta = "../archivos_tareas/".$id_tarea."/".$nombre_final;
        
        if(!file_exists("../archivos_tareas/".$id_tarea."/")){ //sino existe la ruta, crearla
            mkdir("../archivos_tareas/".$id_tarea."/"); //crear ruta
        }
        $subirarchivo = move_uploaded_file($_FILES["archivo1"]["tmp_name"], $ruta); //mover el archivo del formulario a la ruta que le indique
        if($subirarchivo){ //si se movio el archivo en la ruta que le indique
           $insertar = "INSERT INTO archivos_tareas(descripcion, id_tarea) VALUES ('$nombre_final', '$id_tarea')"; //query
           $resultado = mysqli_query($con, $insertar); //ejecutar query
          
        }
     }

     if($_FILES["archivo2"]){ //si se subio un archivo
      $nombre_base = basename($_FILES["archivo2"]["name"]); //obtener el nombre del archivo
      $nombre_final = date("d-m-y")."_".date("H-i-s")."-".$nombre_base; //agregar fecha y hora al nombre
      $ruta = "../archivos_tareas/".$id_tarea."/".$nombre_final;
      
      if(!file_exists("../archivos_tareas/".$id_tarea."/")){ //sino existe la ruta, crearla
          mkdir("../archivos_tareas/".$id_tarea."/"); //crear ruta
      }
      $subirarchivo = move_uploaded_file($_FILES["archivo2"]["tmp_name"], $ruta); //mover el archivo del formulario a la ruta que le indique
      if($subirarchivo){ //si se movio el archivo en la ruta que le indique
         $insertar = "INSERT INTO archivos_tareas(descripcion, id_tarea) VALUES ('$nombre_final', '$id_tarea')"; //query
         $resultado = mysqli_query($con, $insertar); //ejecutar query
         
      }
   }
      echo "<script>swal('Tarea creada exitosamente', '', 'success')</script>";
      Header("Location: create_tarea.php");
    } else {
      echo "<script>swal('ERROR al registrar tarea', '', 'error')</script>";
    }
  }