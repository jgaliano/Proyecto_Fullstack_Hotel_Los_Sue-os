<?php 


$NumeroHabitacion = $_POST['numero_h'];
$TipoHabitacion = $_POST['tipo_h'];
$precio = $_POST['precio_h'];
$descripcion_habitacion = $_POST['desc_h'];
$nivel_habitacion = $_POST['piso_h'];
$estado_habitacion = $_POST['estado_h'];


require_once 'includes/conexion.php';


$actualizar = "UPDATE Habitaciones SET NumeroHabitacion = '$NumeroHabitacion', TipoHabitacion = '$TipoHabitacion', precio = '$precio', descripcion_habitacion = '$descripcion_habitacion', nivel_habitacion = '$nivel_habitacion', estado_habitacion = '$estado_habitacion' WHERE NumeroHabitacion = ' $NumeroHabitacion'";
$query = mysqli_query($db, $actualizar);


if($query){
    Header("Location: habitacion.php");
}

?>