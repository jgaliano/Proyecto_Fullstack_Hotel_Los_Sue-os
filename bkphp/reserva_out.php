<?php
if (isset($_POST)) {
require_once '../includes/conexion.php';


if (!isset($_SESSION)) {
    session_start();
}

$fecha_ingreso = isset($_POST['r_fecha_in']) ? mysqli_real_escape_string($db, $_POST['r_fecha_in']) : false;
$fecha_salida = isset($_POST['r_fecha_out']) ? mysqli_real_escape_string($db, $_POST['r_fecha_out']) : false;
$id_cliente = isset($_POST['r_nombre']) ? mysqli_real_escape_string($db, $_POST['r_nombre']) : false;
$id_habitacion = isset($_POST['r_habitacion']) ? mysqli_real_escape_string($db, $_POST['r_habitacion']) : false;


$telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) : false;

$fecha1 = new DateTime($fecha_ingreso);
$fecha2 = new DateTime($fecha_salida);

$errores = array();

if (empty($telefono)) {
    $errores['telefono'] = "No ingreso numero de telefono";
}

if (empty($fecha_ingreso)) {
    $errores['r_fecha_in'] = "La fecha de ingreso está vacía";
}

if (empty($fecha_salida)) {
    $errores['r_fecha_out'] = "La fechad de salida está vacía";
}

if (empty($id_cliente)) {
    $errores['r_nombre'] = "El ID de cliente es invalido";
}

if (empty($id_habitacion)) {
    $errores['r_habitacion'] = "El ID de habitación es invalido";
}

$timestamp_entrada = strtotime($_POST['r_fecha_in']);
$timestamp_salida = strtotime($_POST['r_fecha_out']);

function verificarSolapamientoFechas($nuevaFechaInicio, $nuevaFechaFin, $habitacion) {
    global $db;

    $query = "SELECT VerificarSolapamientoFechas('$nuevaFechaInicio', '$nuevaFechaFin', $habitacion) AS solapamiento";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['solapamiento'] == 0;
}


if ($timestamp_entrada < $timestamp_salida) {
    //$solapamiento = verificarSolapamientoFechas($fecha_ingreso, $fecha_salida, $id_reservation);

    require_once '../includes/conexion.php';

    // $query = "SELECT VerificarSolapamientoFechas('$fecha_ingreso', '$fecha_salida', $id_habitacion) AS solapamiento";
    // $result = mysqli_query($db, $query);
    // $solapamiento = mysqli_fetch_assoc($result);
    $solapamiento = verificarSolapamientoFechas($fecha_ingreso, $fecha_salida, $id_habitacion);


    if ($solapamiento) {
        $_SESSION['errores']['general'] = "Existe solapamiento";
        header("Location: ../reservacion_out.php");
        exit();
    } else {

        if ($fecha1 && $fecha2) {
            // Calcula la diferencia
            $diferencia = $fecha1->diff($fecha2);
            $cant_noches = $diferencia->days;
        }


        $no_h = $id_habitacion;

        $consultar_habitacion = "SELECT precio FROM Habitaciones WHERE NumeroHabitacion = '$no_h'";
        $query_habitacion = mysqli_query($db, $consultar_habitacion);

        if ($query_habitacion) {
            if (mysqli_num_rows($query_habitacion) > 0) {
                $row_habitacion = mysqli_fetch_assoc($query_habitacion);
                $precio_habitacion = $row_habitacion["precio"];
            }
        } else {
            echo "Error en la consulta: " . mysqli_error($db);
        }

        $subtotal_reser = $precio_habitacion * $cant_noches;



        if (count($errores) == 0) {
            try {
                $sql = "INSERT INTO Reservaciones (FechaInicio, FechaFin, IDcliente, NumeroHabitacion, Estado, Cant_noches, r_sub) VALUES('$fecha_ingreso', '$fecha_salida', '$id_cliente', '$id_habitacion', 'Pendiente', '$cant_noches', $subtotal_reser);";
                $guardar = mysqli_query($db, $sql);


                if ($guardar) {
                    $sql2 = "UPDATE clientes set telefono = '$telefono' WHERE id = $id_cliente;";

                    $guardar1 = mysqli_query($db, $sql2);


                    if ($guardar1) {
                        $_SESSION['completado'] = "El registro se ha completado con éxito.... El equipo del hotel se comunicara con usted para confirar su reservacion";
                    } else {
                        $_SESSION['errores']['general'] = "Fallo";
                    }
                    
                } else {
                    $_SESSION['errores']['general'] = "Fallo";
                }
            } catch (Exception $e) {
                $_SESSION['errores']['general'] = "Fallo al guardar ";
            }
        } else {
            $_SESSION['errores'] = $errores;
        }


    }
} else {
    $_SESSION['errores']['general'] = "Ingrese fechas correctas.";
}
}
Header("Location: ../reservacion_out.php");