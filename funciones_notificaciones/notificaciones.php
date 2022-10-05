<?php

  function notificacion_colaborador($id_colaborador, $fecha_sistema, $id_tarea, $id_user, $con, $mysqli){

    $sql_colaborador = "SELECT nombre, apellidos FROM usuarios WHERE id_usuario='$id_colaborador'"; //generar consulta
    $resultado_colaborador = $mysqli->query($sql_colaborador); //guardar consulta
    $row_colaborador = mysqli_fetch_array($resultado_colaborador); //ejecutar consulta (fetch devuelve un solo registro)
    $nombre_colaborador =  $row_colaborador['nombre'];
    $apellidos_colaborador =  $row_colaborador['apellidos'];

    $sql_notificacion = "INSERT INTO notificaciones (tipo, leido, fecha, id_tarea, id_usuario)
                         VALUES ('Agrego a $nombre_colaborador $apellidos_colaborador como nuevo colaborador', '0', '$fecha_sistema', '$id_tarea','$id_user')"; //generar query
    $resultado_notificacion = mysqli_query($con, $sql_notificacion); //ejecutar query

    return $resultado_notificacion;
  }

  function notificacion_update_datos($fecha_sistema, $id_tarea, $id_user, $con){

    $sql_notificacion = "INSERT INTO notificaciones (tipo, leido, fecha, id_tarea, id_usuario)
                         VALUES ('Modifico los datos de la tarea', '0', '$fecha_sistema', '$id_tarea','$id_user')"; //generar query
    $resultado_notificacion = mysqli_query($con, $sql_notificacion); //ejecutar query

    return $resultado_notificacion;
  }

  ?>