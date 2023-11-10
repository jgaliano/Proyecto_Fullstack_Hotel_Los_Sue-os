<?php


if (isset($_POST)) {

    require_once '../includes/conexion.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $subtotal = isset($_POST["subtotal"]) ? floatval($_POST["subtotal"]) : 0.0;
    $id_cliente = isset($_POST['r_nombre']) ? mysqli_real_escape_string($db, $_POST['r_nombre']) : false;
    $descripcion = isset($_POST['dato_desc']) ? mysqli_real_escape_string($db, $_POST['dato_desc']) : false;

  
    $errores = array();


    // Validaciones
    if (!empty($subtotal)) {
        $subtotal_validado = true;
    } else {
        $subtotal_validado = false;
        $errores['subtotal'] = "El numero de habitacion está vacío";
    }
    // 
    if (!empty($id_cliente)) {
        $numero_habitacion_validado = true;

    } else {
        $numero_habitacion_validado = false;
        $errores['r_nombre'] = "el numero de piso está vacío";
    }
 
    // 
 

    $guardar_habitacion = false;

    if (count($errores) == 0) {
        try {
            $guardar_habitacion = true;
           
            $sql = "INSERT INTO Detallecargo (fechaCargo, clienteID, descripcion, valor, estado_cargo) VALUES(CURDATE(), '$id_cliente', '$descripcion', '$subtotal','Pendiente');";
            $guardar = mysqli_query($db, $sql);

            if ($guardar) {
                $_SESSION['completado'] = "El registro se ha completado con éxito";
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar registro!!";
            }
        } catch (Exception $e) {
            $_SESSION['errores']['general'] = "Fallo al guardar registro!!";
        }


    } else {
        $_SESSION['errores'] = $errores;
    }
}
header("Location: ../pedido.php");