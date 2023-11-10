<?php
session_start();

require_once 'includes/conexion.php';

if (isset($_POST['r_nombre'], $_POST['r_habitacion'], $_POST['estado'], $_POST['fechaInicio'], $_POST['fechaFin'], $_POST['id_reservacion'])) {
    $id_cliente = $_POST['r_nombre'];
    $id_reservation = $_POST['r_habitacion'];
    $status_reser = $_POST['estado'];
    $fecha_ingreso = $_POST['fechaInicio'];
    $fecha_salida = $_POST['fechaFin'];
    $id_reservacion = $_POST['id_reservacion'];
    $variable_contenedora = $_POST['fecha_date_in'];
    $variable_contenedora2 = $_POST['fecha_date_out'];
    
    $new_fecha_i = $fecha_ingreso;
    $new_fecha_o = $fecha_salida;

    $fecha1 = new DateTime($fecha_ingreso);
    $fecha2 = new DateTime($fecha_salida);

    

    

    function verificarSolapamientoFechas_update($nuevaFechaInicio, $nuevaFechaFin, $id_reservation, $habitacion) {
        global $db;
        $query = "SELECT VerificarSolapamientoFechas_update('$nuevaFechaInicio', '$nuevaFechaFin', '$id_reservation', '$habitacion') AS solapamiento";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
    
        return $row['solapamiento'] == 0;
    }

    if ($fecha_ingreso < $fecha_salida) {
        
        $solapamiento = verificarSolapamientoFechas_update($fecha_ingreso, $fecha_salida, $id_reservacion, $id_reservation);

        if ($solapamiento) {
            $sql = "UPDATE Reservaciones SET FechaInicio = '$variable_contenedora2', FechaFin = '$variable_contenedora' WHERE ID ='$id_reservacion'";
            $guardar = mysqli_query($db, $sql);
            $_SESSION['errores']['general'] = "Existe solapamiento";
        } else {
            if ($fecha1 && $fecha2) {
                // Calcula la diferencia
                $diferencia = $fecha1->diff($fecha2);
                $cant_noches = $diferencia->days;
            }


            $no_h = $id_reservation;

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

            require_once 'includes/conexion.php';

            $actualizar = "UPDATE Reservaciones SET FechaInicio = '$fecha_ingreso', FechaFin = '$fecha_salida', IDcliente = '$id_cliente', NumeroHabitacion = '$id_reservation', Estado = '$status_reser', Cant_noches = '$cant_noches', r_sub = '$subtotal_reser' WHERE ID = '$id_reservacion'";
            $query = mysqli_query($db, $actualizar);

            if ($query) {

                if ($status_reser == 'Activa') {
                    try {
                        $descripcion =  "Se activa la reservacion de la habitacion " . $id_reservation;
                        $sql = "INSERT INTO Detallecargo (fechaCargo, clienteID, descripcion, valor, estado_cargo) VALUES('$fecha_ingreso', '$id_cliente', '$descripcion', $subtotal_reser,'Pendiente');";

                        $guardar = mysqli_query($db, $sql);
            
                        if ($guardar) {
                            $_SESSION['completado'] = "El registro se ha completado con éxito";
                        } else {
                            $_SESSION['errores']['general'] = "Fallo al actualizar registro!!";
                        }
                    } catch (Exception $e) {
                        $_SESSION['errores']['general'] = "Fallo al actualizar registro!!";
                    }
                } else {
                    $_SESSION['completado'] = "El registro se ha actualizado con éxito";
                }
            } else {
                $_SESSION['errores']['general'] = "Fallo al actualizar registro!!";
            }
        }
    } else {
        $_SESSION['errores']['general'] = "Ingrese fechas correctas.";
    }
}

header("Location: reservacion.php");


?>