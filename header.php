<?php
session_start(); //iniciar session de usuario

if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}
$nombre = $_SESSION['nombre']; //obtener el nombre de la sesion del usuario
$apellidos = $_SESSION['apellidos']; //obtener apellidos
$correo = $_SESSION['correo'];  //obtener el correo de la sesion del usuario
$id = $_SESSION['id'];  //obtener el id de la sesion del usuario
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="sistema para el control y gestion de tareas"/>
        <meta name="author" content="jafet daniel fonseca garcia"/>
        <title>Task</title>
        <link href="../librerias/jsdelivr_simple_datatables_dist_style.css" rel="stylesheet"/>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../librerias/fontawesome.js"></script>
        <link href="../css/mis_estilos.css" rel="stylesheet"/>
        <script src="../librerias/jquery.js"></script>
        <script src="../librerias/sweetalert.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a href="../home.php" style="margin-left: 1%"><img  id="img_negro" src="../images/logo_negro.jpg" width="30px" height="30px"></a>
            <a class="navbar-brand ps-3" href="../home.php">Task</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">            
            </div>

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-add fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../tareas/tareas.php">Tarea</a></li>
                        <li><a class="dropdown-item" href="../proyectos/proyectos.php">Proyecto</a></li>
    
                    </ul>
                </li>
            </ul>

            <!-- Navbar config del usuario-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       <?php echo $nombre; ?>
                     <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../usuarios/usuarios.php">Configuración</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Salir</a></li>
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
                            
                            <a class="nav-link" href="../home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                                Inicio
                            </a>
                            <a class="nav-link" href="../tareas/tareas.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-check"></i></div>
                                Mis tareas
                            </a>
                           
                            <!-- seccion "proyectos" del menu lateral-->
                            <div class="sb-sidenav-menu-heading">Proyectos</div>     
                            <a class="nav-link" href="../proyectos/proyectos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                                Mis Proyectos
                            </a>                  
                            <a class="nav-link" href="../proyectos/crear_proyecto.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-add"></i></div>
                                Agregar proyecto
                            </a>
                         

                            <!-- seccion "reportes" del menu lateral-->
                            <div class="sb-sidenav-menu-heading">Reporte de servicios</div>
                            <a class="nav-link" href="../reportes/reportes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Reporte
                            </a>
                            <a class="nav-link" href="../reportes/tipo_reporte.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-add"></i></div>
                                Agregar nuevo
                            </a>
                            
                            <a class="nav-link" href="../reportes/status_reporte.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Status
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

                       


                       
            