<?php
session_start();
session_destroy(); //cerrar la session

header("Location: index.php"); //enviar al login
?>