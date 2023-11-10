<?php


require_once 'includes/conexion.php';

$Nombre_platillo = isset($_POST['b_platillo']) ? mysqli_real_escape_string($db, $_POST['b_platillo']) : false;
$Categoria = isset($_POST['b_categoria']) ? mysqli_real_escape_string($db, $_POST['b_categoria']) : false;
$descripcion = isset($_POST['b_descripcion']) ? mysqli_real_escape_string($db, $_POST['b_descripcion']) : false;
$precio = isset($_POST['b_precio']) ? mysqli_real_escape_string($db, $_POST['b_precio']) : false;
$id_bar = isset($_POST['id_bar']) ? mysqli_real_escape_string($db, $_POST['id_bar']) : false;

try {


    $actualizar = "UPDATE menu SET nombre = '$Nombre_platillo', categoria = '$Categoria', descripcion = '$descripcion', precio = '$precio' WHERE id = ' $id_bar'";
    $query = mysqli_query($db, $actualizar);

    if ($query) {
        $_SESSION['completado'] = "El registro se ha actualizado con éxito";
    } else {
        $_SESSION['errores']['general'] = "Fallo al actualizar registro!!";
    }
} catch (Exception $e) {
    $_SESSION['errores']['general'] = "Fallo al actualizar registro!!";
}



Header("Location: barestaurante.php");

?>