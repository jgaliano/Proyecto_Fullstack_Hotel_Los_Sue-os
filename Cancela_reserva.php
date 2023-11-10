<?php 

$no_h = $_GET['id'];


require_once 'includes/conexion.php';


$actualizar = "UPDATE reservaciones SET Estado = 'Cancelada' WHERE id = ' $no_h'";
$query = mysqli_query($db, $actualizar);

if($query){
    Header("Location: reservacion_out.php");
}

?>