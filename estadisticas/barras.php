<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario

if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}

$sql = "SELECT nombre, fecha_entrega FROM tareas ORDER BY STR_TO_DATE(fecha_entrega, '%d/%m/%Y') ASC"; //generar consulta
$resultado = $mysqli->query($sql); //guardar consulta

$valoresY = array(); //tarea
$valroesX = array(); //fecha

while($ver = mysqli_fetch_row($resultado)){
  $valoresY[]=$ver[1];
  $valoresX[]=$ver[0];
}

$datosX=json_encode($valoresX);
$datosY=json_encode($valoresY);
?>
<!-- Autor: Jafet Daniel Fonseca Garcia -->
<div id="graficaBarras"></div>

<script>
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script>
  datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');

    var data = [
  {
    x: datosX,
    y: datosY,
    type: 'bar'
  }
];

var layout = {
title: 'Tareas por Fecha',
font:{
  family: 'Raleway, sans-serif'
},
xaxis: {
  tickangle: -45,
  title: ''
},
yaxis: {
  title: ''
},
bargap :0.05
};

Plotly.newPlot('graficaBarras', data, layout);
</script>
<!-- Autor: Jafet Daniel Fonseca Garcia -->