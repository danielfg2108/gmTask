<?php
session_start(); //iniciar session de usuario

if (!isset($_SESSION['id'])) { //validando si el usuario esta loggeado
    header("Location: index.php"); //sino esta loggeado redirigir al home
}
$nombre = $_SESSION['nombre']; //obtener el nombre del usuario
$apellidos = $_SESSION['apellidos']; //obtener apellidos del usuario
$correo = $_SESSION['correo'];  //obtener el correo de la sesion del usuario
$id = $_SESSION['id'];

require "bd/conexion.php"; //llamar a la conexion
$sql = "SELECT * FROM tareas WHERE id_usuario='$id' LIMIT 2"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta

$sql_colaboradores = "SELECT * FROM colaboradores_tareas WHERE id_usuario='$id' LIMIT 2"; //generar consulta colaboradores
$resultado_colaboradores = $mysqli->query($sql_colaboradores); //guardar consulta proyectos

$sql_proy = "SELECT * FROM proyectos WHERE id_usuario='$id' OR privacidad ='PUBLICO' LIMIT 4"; //generar consulta
$resultado_proy = $mysqli->query($sql_proy); //guardar consulta

$sql_imagen = "SELECT nombre FROM imagenes_perfil WHERE id_usuario='$id'"; //generar consulta imagen perfil
$resultado_imagen = $mysqli->query($sql_imagen); //guardar consulta
$row_imagen = mysqli_fetch_array($resultado_imagen); //ejecutar consulta (fetch devuelve un solo registro)
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="sistema para el control y gestion de tareas" />
    <meta name="author" content="jafet daniel fonseca garcia" />
    <title>Home Task</title>
    <link href="css/mis_estilos.css" rel="stylesheet" />
    <link href="librerias/jsdelivr_simple_datatables_dist_style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="librerias/fontawesome.js"></script>

</head>
<style>
    @-webkit-keyframes aitf {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 100% 50%;
        }
    }

    p {
        text-transform: uppercase;
        border: 4px double rgba(255, 255, 255, .25);
        text-align: center;
        font-size: 130%;
    }

    span {
        font: 900 4em/1 'Oswald', Tangerine;
        padding: .25em 0 .325em;
        text-shadow: 0 0 80px rgba(255, 255, 255, .5);

        /* Clip Background Image */
        background: url("images/diagonal.jpg") repeat-y;
        -webkit-background-clip: text;
        background-clip: text;

        /* Animate Background Image */
        -webkit-text-fill-color: transparent;
        -webkit-animation: aitf 10s linear infinite;

        /* Activate hardware acceleration for smoother animations */
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-backface-visibility: hidden;
    }

    #image_perfil{
        width: 25px;
        height: 25px;
        border-radius: 12.5px;
    }
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a href="home.php" style="margin-left: 1%"><img id="img_negro" src="images/logo_negro.jpg" width="30px" height="30px"></a>
        <a class="navbar-brand ps-3" href="home.php">Task</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-add fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="tareas/create_tarea.php">Tarea</a></li>
                    <li><a class="dropdown-item" href="proyectos/create_proyecto.php">Proyecto</a></li>

                </ul>
            </li>
        </ul>

        <!-- Navbar config del usuario-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $nombre; ?>
                    <img id="image_perfil" src="<?php echo $row_imagen['nombre']?>">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="usuarios/usuarios.php">Configuración</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                </ul>
            </li>
        </ul>

    </nav>

    <!-- primera seccion del menu lateral-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                            Inicio
                        </a>
                        <a class="nav-link" href="tareas/bandeja.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bell"></i></div>
                            Bandeja de entrada
                        </a>

                        <a class="nav-link" href="proyectos/proyectos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                            Mis Proyectos
                        </a>

                        <a class="nav-link" href="tareas/tareas.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-check"></i></div>
                            Mis tareas
                        </a>

                        <a class="nav-link" href="tareas/agenda.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                            Agenda
                        </a>


                        <!-- seccion "reportes" del menu lateral-->
                        <div class="sb-sidenav-menu-heading">Reporte</div>
                        <a class="nav-link" href="reportes/reportes.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Reparaciones y Servicios
                        </a>

                        <a class="nav-link" href="reportes/tipo_reporte.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-add"></i></div>
                            Agregar nuevo
                        </a>

                        <a class="nav-link" href="reportes/status_reporte.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Status
                        </a>

                        <!-- seccion "proyectos del menu lateral-->
                        <div class="sb-sidenav-menu-heading">Proyectos y Tareas</div>

                        <a class="nav-link" href="proyectos/create_proyecto.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-add"></i></div>
                            Nuevo Proyecto
                        </a>

                        <a class="nav-link" href="tareas/create_tarea.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-add"></i></div>
                            Nueva Tarea
                        </a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $correo ?>
                </div>
            </nav>
        </div>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <p>
                        <span>Mantenimiento</span>
                    </p>

                    <h1 class="mt-4">Task</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">general motors</li>
                    </ol>
                    <h1 id="saludo" class="mt-4" style="font-family: 'Tangerine', serif; text-shadow: 4px 4px 4px #aaa;">Welcome <?php echo $nombre . ' ' . $apellidos; ?></h1>
                    <br>

                    <div class="row">

                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Tareas Recientes
                                </div>
                                <div class="card-body">
                                    <table class="table table-primary table-striped">
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($resultado)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <a href="tareas/detalles_tarea.php?id_tarea=<?php echo $row['id_tarea'] ?>"><i class="fa-solid fa-eye" style="width: 23px; height: 23px;"></i></a>
                                                        <?php echo $row['nombre'] ?>
                                                    </td>
                                                    <td><?php echo $row['fecha_entrega'] ?></td>

                                                </tr>
                                            <?php
                                            }
                                            ?>


                                            <?php
                                            while ($row_colaboradores = mysqli_fetch_array($resultado_colaboradores)) {

                                                $id_t_colaborador = $row_colaboradores['id_tarea']; //guardar id en variable

                                                $sql_t_colaborador = "SELECT * FROM tareas WHERE id_tarea='$id_t_colaborador'"; //consulta para obtener los datos de la tarea
                                                $resultado_t_colaborador = $mysqli->query($sql_t_colaborador); //guardar consulta
                                                $row_t_colaborador = mysqli_fetch_array($resultado_t_colaborador); //ejecutar consulta (fetch devuelve un solo registro)
                                                $num_t_colaborador = $resultado_t_colaborador->num_rows; //si la consulta genero resultados  

                                                if ($num_t_colaborador > 0) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <a href="tareas/detalles_tarea.php?id_tarea=<?php echo $row_t_colaborador['id_tarea'] ?>"><i class="fa-solid fa-eye" style="width: 23px; height: 23px;"></i></a>
                                                            <?php echo $row_t_colaborador['nombre'] ?>
                                                        </td>
                                                        <td><?php echo $row_t_colaborador['fecha_entrega'] ?></td>

                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Proyectos recientes
                                </div>
                                <div class="card-body">
                                    <table class="table table-primary table-striped">
                                        <tbody>
                                            <?php
                                            while ($row_proy = mysqli_fetch_array($resultado_proy)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <a href="proyectos/detalles_proyecto.php?id_proyecto=<?php echo $row_proy['id_proyecto'] ?>"><i class="fa-solid fa-eye" style="width: 23px; height: 23px;"></i></a>
                                                        <?php echo $row_proy['nombre'] ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022.</div>
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
    <script src="librerias/ajax_chart.js"></script>
    <script src="demo/chart-area-demo.js"></script>
    <script src="demo/chart-bar-demo.js"></script>
    <script src="librerias/jsdelivr_simple_datatables.js"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>