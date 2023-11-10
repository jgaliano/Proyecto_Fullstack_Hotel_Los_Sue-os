<?php

if (isset($_POST['registros_a_pagar'])) {

    require_once 'includes/conexion.php';

    /*$datos = $_POST;
    $metodo_pago = $datos['metodo_pago'];*/

    // Obtener el total de los registros a pagar
    $total = 0;

    foreach ($_POST['registros_a_pagar'] as $id) {
        // Obtener el monto del cargo
        $sql = "SELECT valor FROM Detallecargo WHERE ID = $id";
        $resultado = mysqli_query($db, $sql);
        $registro = mysqli_fetch_assoc($resultado);
        $monto = $registro['valor'];

        // Sumar el monto al total
        $total += $monto;
    }

    if ($total > 0) {

        try {
            $sql = "INSERT INTO Pagos (FechaPago, Monto, estado_pago, metodo_pago) VALUES (CURDATE(), $total, 'Pagado', '$_POST[metodo_pago]');";
            $guardar = mysqli_query($db, $sql);

            // Obtener el ID del registro insertado
            $id_pago = mysqli_insert_id($db);

            if ($guardar) {
                // Recorrer el array de registros a pagar y actualizar el estado de cada registro
                foreach ($_POST['registros_a_pagar'] as $id) {
                    $sql = "UPDATE Detallecargo SET estado_cargo = 'Pagado', IDpago = $id_pago WHERE ID = $id";
                    mysqli_query($db, $sql);
                }
                // Mostrar un mensaje de confirmación al usuario
                $_SESSION['completado'] = 'Los registros seleccionados se han pagado correctamente.';
            } else {
                $_SESSION['errores']['general'] = "Fallo al registrar pago!!";
            }
        } catch (Exception $e) {
            $_SESSION['errores']['general'] = "Fallo al actualizar registro!!";
        }

    }
}
Header("Location: pagos.php");

?>