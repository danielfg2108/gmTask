<?php

if ($_POST) { //si ya se ingresaron los datos
 
   $tipo = addslashes($_POST['tipo']);
   echo $tipo;

   if($tipo == 'REPARACION'){
    Header("Location: create_reparacion.php");

   }else if($tipo == 'SERVICIO'){
    Header("Location: create_servicio.php");

   }else{
    echo "error de seleccion";
   }

   
}
?>