<?php 
    require "../bd/conexion.php"; //llamar a la conexion
    session_start(); //iniciar session de usuario

    if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
        header("Location: ../index.php"); //sino esta loggeado redirigir al home
    }
    $nombre = $_SESSION['nombre']; //obtener el nombre del usuario
    $id = $_SESSION['id']; //obtener id del usuario

    $sql = "SELECT id_usuario, nombre, apellidos, correo, password  FROM usuarios WHERE id_usuario = '$id'"; //generar consulta
    $resultado = $mysqli->query($sql); //guardar consulta
	  $num = $resultado->num_rows; //si la consulta genero resultados

    //////////////////
    $row=mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Configuración de usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../librerias/bootstrap5.css" rel="stylesheet">

        <link href="../librerias/jsdelivr_simple_datatables_dist_style.css" rel="stylesheet"/>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../librerias/fontawesome.js"></script>
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        <h1>Configuración de usuario</h1>   
                        <br>
                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>                                
                                        <th>Datos personales</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                            <tr>
                                                <th>Id: <?php  echo $row['id_usuario']?></th>   
                                                <th></th>     
                                            </tr>
                                            <tr>
                                                <th>Nombre: <?php  echo $row['nombre']?></th>    
                                                <th>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNombre" data-bs-whatever="@mdo">Editar</button>
                                                </th>                    
                                            </tr>
                                            <tr>
                                                <th>Apellidos: <?php  echo $row['apellidos']?></th>    
                                                <th>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalApellidos" data-bs-whatever="@mdo">Editar</button>
                                                </th> 
                                            </tr>
                                            <tr>
                                                <th>Correo: <?php  echo $row['correo']?></th>  
                                                <th>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCorreo" data-bs-whatever="@mdo">Editar</button>
                                                </th>   
                                            </tr>
                                            <tr>
                                                <th>Contraseña: -----</th>    
                                                <th>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalContraseña" data-bs-whatever="@mdo">Editar</button>
                                                </th> 
                                            </tr>                                                                           
                                </tbody>
                            </table>
                            <a href="../home.php" class="btn btn-secondary" style="margin-top: 80px;">Regresar</a></th>
                        </div>
                    </div>  
            </div>


 <!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalNombre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar nombre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update_nombre.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input name="nombre" type="text" class="form-control" value="<?php  echo $row['nombre']?>" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Modificar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->

 <!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
 <div class="modal fade" id="modalApellidos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar apellidos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update_apellidos.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Apellidos:</label>
            <input name="apellidos" type="text" class="form-control" value="<?php  echo $row['apellidos']?>" required>
          </div>    
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Modificar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->

 <!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
 <div class="modal fade" id="modalCorreo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar correo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update_correo.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo:</label>
            <input name="correo" type="text" class="form-control" value="<?php  echo $row['correo']?>" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Modificar">
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->

 <!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
 <div class="modal fade" id="modalContraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update_password.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Ingrese contraseña nueva:</label>
            <input name="password" type="text" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Modificar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->



        <script src="../librerias/bootstrap.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../librerias/ajax_chart.js"></script>
        <script src="../demo/chart-area-demo.js"></script>
        <script src="../demo/chart-bar-demo.js"></script>
        <script src="../librerias/jsdelivr_simple_datatables.js"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>