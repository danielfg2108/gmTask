<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}

$id=$_GET['id'];

$planta = addslashes($_POST['planta']);
$sc_creation_date = addslashes($_POST['sc_creation_date']);
$shopping_cart_no = addslashes($_POST['shopping_cart_no']);
$sc_description = addslashes($_POST['sc_description']);
$product_description = addslashes($_POST['product_description']);
$created_by_name = addslashes($_POST['created_by_name']);
$po_number = addslashes($_POST['po_number']);
$ir = addslashes($_POST['ir']);
$vendor_name = addslashes($_POST['vendor_name']);
$product_type_text = addslashes($_POST['product_type_text']);
$item_net_value = addslashes($_POST['item_net_value']);
$document_currency = addslashes($_POST['document_currency']);
$cost_center = addslashes($_POST['cost_center']);
$tarea = addslashes($_POST['tarea']);
$status = addslashes($_POST['status']);
$observaciones = addslashes($_POST['observaciones']);

        $sql="UPDATE reporte_servicios SET planta='$planta', 
              sc_creation_date='$sc_creation_date', 
              shopping_cart_no=' $shopping_cart_no', 
              sc_description=' $sc_description',
              product_description='$product_description', 
              created_by_name=' $created_by_name', 
              po_number=' $po_number', 
              ir='$ir', 
              vendor_name='$vendor_name', 
              product_type_text='$product_type_text', 
              item_net_value='$item_net_value', 
              document_currency='$document_currency', 
              cost_center=' $cost_center',
              tarea=' $tarea', 
              status=' $status', 
              observaciones='$observaciones'
              WHERE id_servicio='$id'";
      
             $query=mysqli_query($con,$sql); //ejecutar consulta

        if($query){
                Header("Location: detalles_reportes.php?id=$id");
            }
?>