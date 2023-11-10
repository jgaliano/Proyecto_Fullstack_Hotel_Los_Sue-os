<?php
//session_start();
if (isset($_POST)) {

    // Conexión a la base de datos
    require_once '../includes/conexion.php';

    // Iniciar sesión
    if (!isset($_SESSION)) {
        session_start();
    }

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $tipo = isset($_POST['tipo']) ? mysqli_real_escape_string($db, $_POST['tipo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? mysqli_real_escape_string($db, $_POST['categoria']) : false;
    $precio = isset($_POST['precio']) ? mysqli_real_escape_string($db, $_POST['precio']) : false;
    
    // Array de errores
    $errores = array();

    // Validaciones
    if (empty($nombre)) {
        $errores['nombre'] = "El campo nombre está vacío";
    }
    if (empty($tipo)) {
        $errores['tipo'] = "El campo tipo está vacío";
    }
    if (empty($descripcion)) {
        $errores['descripcion'] = "El campo descripcion está vacío";
    }
    if (empty($categoria)) {
        $errores['categoria'] = "El campo categoria está vacío";
    }
    if (empty($precio)) {
        $errores['precio'] = "El campo precio está vacío";
    }
    

    $guardar_habitacion = false;

    if (count($errores) == 0) {
        try {
            
            // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
            $sql = "INSERT INTO menu VALUES(null, '$nombre', '$categoria', '$tipo', '$descripcion', $precio);";
            $guardar = mysqli_query($db, $sql);

            //ver errores de base de datos
            //var_dump(mysqli_error($db));
            //die();

            if ($guardar) {
                $_SESSION['completado'] = "El registro se ha completado con éxito";
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar el registro de menu!!";
            }
        } catch (Exception $e) {
            $_SESSION['errores']['general'] = "Fallo al guardar el registro de menu!!";
        }


    } else {
        $_SESSION['errores'] = $errores;
    }
}
header("Location: ../barestaurante.php");