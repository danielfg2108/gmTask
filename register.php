<?php
require "bd/conexion.php"; //llamar a la conexion
$con = conectar();
$mensaje = "";

if($_POST){//si ya se ingresaron los datos

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

  if (!empty($nombre) && !empty($apellidos) && !empty($correo) && 
      !empty($password) && !empty($confirm_password)) {//validar que los campos no esten vacios

        if( $password  == $confirm_password){ //si ambas contraseñas son iguales
           $sql_verificar = "SELECT * FROM usuarios WHERE correo='$correo'"; //consulta para ver si ya existe usuario con ese correo
           $resultado = $mysqli->query($sql_verificar); // guardar(obtener) consulta realizada
      
           if(!$resultado->num_rows > 0){ //verificar si no existe el usuario en la base de datos
            
            $pass_cifrado = sha1($password); //cifrar password ingresada
            $sql = "INSERT INTO usuarios (nombre, apellidos, correo, password, tipo_usuario) VALUES ('$nombre', '$apellidos', '$correo', '$pass_cifrado', '1')"; //query para insertar
            $result=mysqli_query($con, $sql); //ejecutar query
            if ($result) {//si se ejecuto correctamente el query
                echo "<script>alert('Usuario registrado exitosamente')</script>";
                $nombre = "";
                $apellidos = "";
                $correo = "";
                $password = "";
                $confirm_password = "";
                $_POST['nombre'] ="";
                $_POST['apellidos']="";
                $_POST['correo']="";
                $_POST['password']="";
                $_POST['confirm_password']="";

                $mensaje = "";
                //sleep(5);
                //header("Location: index.php"); //mandar llamar a la siguiente pagina
            }else{
                echo "<script>alert('ERROR al registrar usuario')</script>";
                
            }
           }else{ //verificar si no existe el usuario en la base de datos
            $mensaje = "el usuario ya existe";
           }
        
        }else{//si ambas contraseñas son iguales
            $mensaje = "las contraseñas no coinciden";
        }
  }//validar que los campos no esten vacios
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - task</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="librerias/fontawesome.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nueva cuenta</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Ingrese su nombre" name="nombre" required/>
                                                        <label for="inputFirstName">Nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="apellidos" required/>
                                                        <label for="inputLastName">Apellidos</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="correo" name="correo" required/>
                                                <label for="inputEmail">Dirección de correo electrónico</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="password" required/>
                                                        <label for="inputPassword">Contraseña</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="confirm_password" required/>
                                                        <label for="inputPasswordConfirm">Confirmación de contraseña</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 style="color: red;"><?php echo $mensaje ?></h6>		
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Crear cuenta">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">¿Ya tienes una cuenta? Iniciar Sesion</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="librerias/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>