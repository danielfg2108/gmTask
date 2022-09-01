<?php require_once '../header.php'; ?>
<?php
require "../bd/conexion.php"; //llamar a la conexion
$con = conectar();
$id_proyecto = $_GET['id_proyecto'];
$sql = "SELECT * FROM proyectos WHERE id_proyecto='$id_proyecto'"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta
//////////////////
$row = mysqli_fetch_array($resultado); //ejecutar consulta (fetch devuelve un solo registro)
?>

<h1 class="mt-4"></h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="../home.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="proyectos.php">Proyectos</a></li>
    <li class="breadcrumb-item active">Detalles</li>
</ol>

<h2 style="display:inline;"><?php echo $row['nombre'] ?>. </h2>
<p style="display:inline;"><?php echo $row['privacidad'] ?></p>
<br>
<br>
<?php
if ($row['correo_creador'] == $correo && $row['id_usuario'] == $id) {
?>
    <a type="button" class="btn btn-warning" style="height: 30px; padding-top: 3px;" data-bs-toggle="modal" data-bs-target="#modalProyecto">Editar proyecto</a>
    <a type="button" class="btn btn-danger" style="height: 30px; padding-top: 3px;" data-bs-toggle="modal" data-bs-target="#modalEliminar_p">Eliminar</a>
<?php
}
?>
<br>
<div style="text-align: right;">
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Buscar ..." aria-label="Buscar ..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <a type="button" class="btn btn-secondary" style="height: 30px; padding-top: 3px;" data-bs-toggle="modal" data-bs-target="#modalSeccion">Agregar sección</a>
</div>

<link rel="stylesheet" href="../css/estilos_cards.css">
<br>
<br>
<div style="text-align: center;">
    <h4 style="display: inline-block;">Máximo</h4>
    <a type="button"><i class="fa-solid fa-pen-to-square"></i></a>
</div>

<section class="product">
    <button class="pre-btn"><img src="../images/arrow.png" alt=""></button>
    <button class="nxt-btn"><img src="../images/arrow.png" alt=""></button>
    <div class="product-container">

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

    </div>
</section>


<br>
<br>
<div style="text-align: center;">
    <h4 style="display: inline-block;">Máximo</h4>
    <a type="button"><i class="fa-solid fa-pen-to-square"></i></a>
</div>
<section class="product">
    <button class="pre-btn"><img src="../images/arrow.png" alt=""></button>
    <button class="nxt-btn"><img src="../images/arrow.png" alt=""></button>
    <div class="product-container">

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058" class="product-thumb" alt="">
            </div>
            <div class="product-info">
                <p class="product-short-description">a short line about the cloth..</p>
                <p class="price">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="#">Ir</a>
            </div>
        </div>

    </div>
</section>


<?php require_once '../footer.php'; ?>


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<!--  ltrim — Retira espacios en blanco (u otros caracteres) del inicio de un string -->
<div class="modal fade" id="modalProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar datos del proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_proyecto.php?id_proyecto=<?php echo $row['id_proyecto'] ?>" method="POST">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre del proyecto:</label>
                        <input name="nombre" type="text" class="form-control" value="<?php echo ltrim($row['nombre']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputState">Privacidad</label>
                        <select class="form-control" name="privacidad" required>
                            <option>PUBLICO</option>
                            <option>PRIVADO</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<div class="modal fade" id="modalEliminar_p" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="delete_proyecto.php?id_proyecto=<?php echo $row['id_proyecto'] ?>" method="POST">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">¿Esta seguro que desea eliminar este proyecto?</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->
<!--  ltrim — Retira espacios en blanco (u otros caracteres) del inicio de un string -->
<div class="modal fade" id="modalSeccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar sección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="create_seccion.php?id_proyecto=<?php echo $row['id_proyecto'] ?>" method="POST">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input name="nombre_seccion" type="text" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL MODAL MODAL MODAL MODAL  MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


<script>
    const productContainers = [...document.querySelectorAll('.product-container')];
    const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
    const preBtn = [...document.querySelectorAll('.pre-btn')];

    productContainers.forEach((item, i) => {
        let containerDimensions = item.getBoundingClientRect();
        let containerWidth = containerDimensions.width;

        nxtBtn[i].addEventListener('click', () => {
            item.scrollLeft += containerWidth;
        })

        preBtn[i].addEventListener('click', () => {
            item.scrollLeft -= containerWidth;
        })
    })
</script>