<?php
require "bd/conexion.php"; //llamar a la conexion
session_start(); //iniciar session
$mensaje = "";

if($_POST){
	$correo = $_POST['correo']; //obtener correo ingresado
	$password = $_POST['password']; //obtener password ingresada

	$sql = "SELECT id_usuario, correo, nombre, password FROM usuarios WHERE correo ='$correo'"; //generar consulta

	$resultado = $mysqli->query($sql); //guardar consulta
	$num = $resultado->num_rows; //si la consulta genero resultados

	if($num > 0){ //si devolvio filas la consulta
		$row = $resultado->fetch_assoc();
		$password_bd = $row['password'];

		$pass_cifrado = sha1($password); //cifrar password ingresada
		$mensaje = "";

		if ($password_bd == $pass_cifrado) {
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['id'] = $row['id_usuario'];

			header("Location: home.php"); //mandar llamar a la siguiente pagina
			$mensaje = "";
		}else{
			$mensaje = "la contraseña es incorrecta";
		}

	}else{
		$mensaje = "el correo es incorrecto";
	}

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="sistema para el control y gestion de tareas"/>
    <meta name="author" content="jafet daniel fonseca garcia"/>
    <title>Task - login</title>

    <link rel="stylesheet" href="css/estilos_login.css">
</head>
<body>
    <section class="login">
		<div class="login_box">
			<div class="left">
				<div class="contact">
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>Iniciar Sesion</h3>
						<input type="email" placeholder="EMAIL" name="correo">					
						<input type="password" placeholder="PASSWORD" name="password">		
						<h4 style="color: red;"><?php echo $mensaje ?></h4>							
 					    <button class="submit">Ingresar</button>
						<a class="small" href="password.html">¿Olvido su contraseña?</a>
						<br>
						<a class="small" href="register.html">Crear una nueva cuenta</a>						
 				</form>		
				</div>
				
			</div>
			<div class="right">
				<div class="right-text">
					<h2>Task</h2>
					<h5>General Motors</h5>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div >
				<div class="text-muted">Copyright &copy; Your Website 2022</div>
		</div>
	</footer>
</body>
</html>