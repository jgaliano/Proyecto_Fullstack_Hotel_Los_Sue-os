<?php 

$id_cargo = $_GET['id'];


require_once 'includes/conexion.php';


$actualizar = "UPDATE Detallecargo SET estado_cargo = 'Cancelado' WHERE ID = ' $id_cargo'";
$query = mysqli_query($db, $actualizar);

if($query){
    Header("Location: pedido.php");
}

?>