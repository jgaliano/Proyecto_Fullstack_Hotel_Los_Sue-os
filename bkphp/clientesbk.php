<?php
//session_start();
if (isset($_POST)) {

    // Conexión a la base de datos
    require_once '../includes/conexion.php';

    // Iniciar sesión
    if (!isset($_SESSION)) {
        session_start();
    }

    $nombres = isset($_POST['nombres']) ? mysqli_real_escape_string($db, $_POST['nombres']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) : false;
    $nacionalidad = isset($_POST['nacionalidad']) ? mysqli_real_escape_string($db, $_POST['nacionalidad']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $numero_id = isset($_POST['numero_id']) ? mysqli_real_escape_string($db, $_POST['numero_id']) : false;
    $tipo_id = isset($_POST['tipo_id']) ? mysqli_real_escape_string($db, $_POST['tipo_id']) : false;

    // Array de errores
    $errores = array();

    // Validaciones
    if (!empty($nombres) && !is_numeric($nombres) && !preg_match("/[0-9]/", $nombres)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombres'] = "El nombre no es valido";
    }

    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['apellidos'] = "El nombre no es valido";
    }

    if (empty($telefono) || !is_numeric($telefono)) {
        $errores['telefono'] = "El campo telefono no es valido";
    }

    if (empty($nacionalidad)) {
        $errores['nacionalidad'] = "El campo nacionalidad está vacío";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "El campo email esta vacio";
    }

    if (empty($numero_id)) {
        $errores['numero_id'] = "El campo numero_id está vacío";
    }
    if (empty($tipo_id)) {
        $errores['tipo_id'] = "El campo tipo_id está vacío";
    }


    $guardar_habitacion = false;

    if (count($errores) == 0) {
        try {
            
           
            $sql = "INSERT INTO clientes VALUES(null, '$nombres', '$apellidos', '$telefono', '$nacionalidad', '$email', '$tipo_id', '$numero_id', 'A');";
            $guardar = mysqli_query($db, $sql);

           

            if ($guardar) {
                $_SESSION['completado'] = "El registro se ha completado con éxito";
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar el cliente!!";
            }
        } catch (Exception $e) {
            $_SESSION['errores']['general'] = "Fallo al guardar el cliente!!";
        }


    } else {
        $_SESSION['errores'] = $errores;
    }
}
header("Location: ../cliente.php");