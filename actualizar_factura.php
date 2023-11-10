<?php

if (isset($_POST['registros_a_fac'])) {

    require_once 'includes/conexion.php';

    // Obtener el total de los registros a pagar
    $total = 0;

    foreach ($_POST['registros_a_fac'] as $id) {
        // Obtener el monto del cargo
        $sql = "SELECT Monto FROM Pagos WHERE ID = $id";
        $resultado = mysqli_query($db, $sql);
        $registro = mysqli_fetch_assoc($resultado);
        $monto = $registro['Monto'];

        
        // Sumar el monto al total
        $total += $monto;

    }

    if ($total > 0) {

        try {
            $sql = "INSERT INTO Facturas (FechaFactura,nombre_nit,NIT,monto) VALUES (CURDATE(),'$_POST[nombre]','$_POST[nit]',$total);";
            $guardar = mysqli_query($db, $sql);

            // Obtener el ID del registro insertado
            $id_factura = mysqli_insert_id($db);

            if ($guardar) {
                // Recorrer el array de registros a pagar y actualizar el estado de cada registro
                foreach ($_POST['registros_a_fac'] as $id) {
                    $sql = "UPDATE Pagos SET IDFactura = $id_factura, estado_pago = 'Facturado' WHERE ID = $id";
                    mysqli_query($db, $sql);
                }
                // Mostrar un mensaje de confirmación al usuario
                $_SESSION['completado'] = 'Los registros seleccionados se han facturado correctamente.';
                
            } else {
                $_SESSION['errores']['general'] = "Fallo al registrar Factura!!";
                
            }
        } catch (Exception $e) {
            $_SESSION['errores']['general'] = "Fallo al registrar Factura!!";
            
        }

    }
}

Header("Location: facturas_detalle.php");

?>