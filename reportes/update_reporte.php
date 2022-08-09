<?php
include("../bd/conexion.php");
$con = conectar();
session_start(); //iniciar session de usuario
if(!isset ($_SESSION['id']) ){ //validando si el usuario esta loggeado
    header("Location: ../index.php"); //sino esta loggeado redirigir al home
}

$id=$_GET['id'];

        $planta=$_POST['planta'];
        $sc_creation_date=$_POST['sc_creation_date'];
        $shopping_cart_no=$_POST['shopping_cart_no'];
        $sc_description=$_POST['sc_description'];
        $product_description=$_POST['product_description'];
        $created_by_name=$_POST['created_by_name'];
       
        $po_number=$_POST['po_number'];
        $ir=$_POST['ir'];
     
        $vendor_name=$_POST['vendor_name'];
        $product_type_text=$_POST['product_type_text'];
        $item_net_value=$_POST['item_net_value'];
        $document_currency=$_POST['document_currency'];
        $cost_center=$_POST['cost_center'];
        $tarea=$_POST['tarea'];
        $status=$_POST['status'];
        $observaciones=$_POST['observaciones'];

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
      
             $query=mysqli_query($con,$sql);

        if($query){
                Header("Location: detalles_reportes.php?id=$id");
            }
?>