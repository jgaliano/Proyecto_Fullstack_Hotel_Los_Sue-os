<?php

if (isset($_POST)) {


    require_once '../includes/conexion.php';

  
    if (!isset($_SESSION)) {
        session_start();
    }

    $metodo_pago = isset($_POST['metodo_pago']) ? mysqli_real_escape_string($db, $_POST['metodo_pago']) : false; //metodo_pago
    $cargo_pago = isset($_POST['cargos_add']) ? mysqli_real_escape_string($db, $_POST['cargos_add']) : false; //cargo_adicional
    $data_habitacion = isset($_POST['r_nombre']) ? mysqli_real_escape_string($db, $_POST['r_nombre']) : false; // id_cliente




    $consulta3 = "SELECT IDcliente FROM Reservaciones WHERE NumeroHabitacion = $data_habitacion";
    $resultado3 = mysqli_query($db, $consulta3);

    if ($resultado3) {
        $fila = mysqli_fetch_assoc($resultado3);
        if ($fila) {
            $get_cliente = $fila['IDcliente'];
        }
    }
    $cliente_pago = $get_cliente; 










    // $consulta = "SELECT NumeroHabitacion FROM Reservaciones WHERE IDcliente = $cliente_pago";
    // $resultado = mysqli_query($db, $consulta);

    // if ($resultado) {
    //     $fila = mysqli_fetch_assoc($resultado);
    //     if ($fila) {
    //         $numero_habitacion = $fila['NumeroHabitacion'];
    //     }
    // }
    $habitacion_pago = $data_habitacion; //habitacion_pago









    
    
    $consulta = "SELECT r_sub FROM Reservaciones WHERE IDcliente = $cliente_pago";
    $resultado = mysqli_query($db, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila) {
            $subtotal_hospedaje = $fila['r_sub'];
        }
    }    
    $hospedaje_pago = $subtotal_hospedaje; // hospedaje_tt






    $consulta = "SELECT sum(Precio) FROM Pedidos WHERE IDHabitacion = $habitacion_pago";
    $resultado = mysqli_query($db, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila) {
            $subtotal_comida = $fila['sum(Precio)'];
        }
    }    
    $totalcomida_pago =  $subtotal_comida; // comida_tt  

    $totalcliente_pago = $hospedaje_pago + $totalcomida_pago + $cargo_pago; // total_tt



    // Array de errores
    $errores = array();

    // Validaciones
    if (!empty($metodo_pago)) {
        $metodo_pago_validado = true;
    } else {
        $metodo_pago_validado = false;
        $errores['metodo_pago'] = "El numero de habitacion está vacío";
    }
    // 
    if (!empty($cargo_pago)) {
        $cargo_pago_validado = true;

    } else {
        $cargo_pago_validado = false;
        $errores['cargos_add'] = "el numero de piso está vacío";
    }
    // Validaciones
    if (!empty($cliente_pago)) {
        $cliente_pago_validado = true;
    } else {
        $cliente_pago_validado = false;
        $errores['r_nombre'] = "La descripcion está vacía";
    }
    //OBTENER HABITACIÓN
    $guardar_habitacion = false;
    $estado_pago ="Por Cancelar";


    if (count($errores) == 0) {
        try {
            $guardar_habitacion = true;

            // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
            $sql = "INSERT INTO Pagos (metodo_pago, cargo_adicional, id_cliente, hospedaje_tt, comida_tt, total_tt, habitacion_pago, estado_pago) VALUES('$metodo_pago', '$cargo_pago', '$cliente_pago', '$hospedaje_pago', '$totalcomida_pago', '$totalcliente_pago', '$habitacion_pago', '$estado_pago');";
            $guardar = mysqli_query($db, $sql);


            //ver errores de base de datos
            //var_dump(mysqli_error($db));
            //die();

            if ($guardar) {
                $_SESSION['completado'] = "El registro se ha completado con éxito";
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar la habitacion!!";
            }
        } catch (Exception $e) {
            $_SESSION['errores']['general'] = "Fallo al guardar la habitacion!!";
        }


    } else {
        $_SESSION['errores'] = $errores;
    }
}
header("Location: ../pagos.php");