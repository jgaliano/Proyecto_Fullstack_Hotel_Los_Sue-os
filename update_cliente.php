<?php
//var_dump($_POST);

require_once 'includes/conexion.php';

$id = isset($_POST['id']) ? mysqli_real_escape_string($db, $_POST['id']) : false;
$Nombres = isset($_POST['nombres']) ? mysqli_real_escape_string($db, $_POST['nombres']) : false;
$Apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
$Telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) : false;
$Nacionalidad = isset($_POST['nacionalidad']) ? mysqli_real_escape_string($db, $_POST['nacionalidad']) : false;
$Correo = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
$Numero_ID = isset($_POST['numero_id']) ? mysqli_real_escape_string($db, $_POST['numero_id']) : false;
$Tipo_ID = isset($_POST['tipo_ID']) ? mysqli_real_escape_string($db, $_POST['tipo_ID']) : false;
$Estado = isset($_POST['estado']) ? mysqli_real_escape_string($db, $_POST['estado']) : false;

    try {

        
        $actualizar = "UPDATE clientes SET nombres = '$Nombres', apellidos = '$Apellidos', telefono = '$Telefono', nacionalidad = '$Nacionalidad', correo = '$Correo', numero_id = '$Numero_ID', tipo_id = '$Tipo_ID', estado = '$Estado' WHERE ID = $id";

        $query = mysqli_query($db, $actualizar);

        if ($query) {
            $_SESSION['completado'] = "El registro se ha actualizado con éxito";
        } else {
            $_SESSION['errores']['general'] = "Fallo al actualizar el cliente!!";
        }
    } catch (Exception $e) {
        $_SESSION['errores']['general'] = "Fallo al actualizar el cliente!!";
    }



Header("Location: cliente.php");

?>