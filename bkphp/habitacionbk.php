<?php
//session_start();
if (isset($_POST)) {


    require_once '../includes/conexion.php';



    // Iniciar sesión
    if (!isset($_SESSION)) {
        session_start();
    }


    $numeroHabitacion = isset($_POST['numeroHabitacion']) ? mysqli_real_escape_string($db, $_POST['numeroHabitacion']) : false;
    $numeroPiso = isset($_POST['numeroPiso']) ? mysqli_real_escape_string($db, $_POST['numeroPiso']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $tipo = isset($_POST['tipo']) ? mysqli_real_escape_string($db, $_POST['tipo']) : false;
    $precio = isset($_POST['precio']) ? mysqli_real_escape_string($db, $_POST['precio']) : false;
    $estado = isset($_POST['estado']) ? mysqli_real_escape_string($db, $_POST['estado']) : false;

    

    if (isset($_FILES['imagenHabitacion']) && $_FILES['imagenHabitacion']['error'] == UPLOAD_ERR_OK) {
        $nombre_temporal = $_FILES['imagenHabitacion']['tmp_name'];
        $nombre_archivo = $_FILES['imagenHabitacion']['name'];
        $ruta_destino = "imagenes/" . $nombre_archivo;

        // Mover el archivo a su destino final
        move_uploaded_file($nombre_temporal, $ruta_destino);

        if (empty($nombre_archivo)) {
            $errores['imagenHabitacion'] = "No se pudo cargar la imagen";
        }

        // Ahora $ruta_destino contiene la ruta donde se guardó la imagen
        // Puedes almacenar esta ruta en la base de datos o usarla según tus necesidades.
    }


    // Array de errores
    $errores = array();

    if (empty($_FILES['imagenHabitacion']['name'])) {
        $errores['imagenHabitacion'] = "No ha seleccionado una imagen para la habitacion";
    }

    // Validaciones
    if (!empty($numeroHabitacion)) {
        $numeroHabitacion_validado = true;
    } else {
        $numeroHabitacion_validado = false;
        $errores['numeroHabitacion'] = "El numero de habitacion está vacío";
    }
    // 
    if (!empty($numeroPiso)) {
        $numeroPiso_validado = true;

    } else {
        $numeroPiso_validado = false;
        $errores['numeroPiso'] = "el numero de piso está vacío";
    }
    // Validaciones
    if (!empty($descripcion)) {
        $descripcion_validado = true;
    } else {
        $descripcion_validado = false;
        $errores['descripcion'] = "La descripcion está vacía";
    }
    // 
    if (!empty($tipo)) {
        $tipo_validado = true;

    } else {
        $tipo_validado = false;
        $errores['tipo'] = "El tipo está vacío";
    }
    // Validaciones
    if (!empty($precio)) {
        $precio_validado = true;
    } else {
        $precio_validado = false;
        $errores['precio'] = "El precio está vacío";
    }
    // 
    if (!empty($estado)) {
        $estado_validado = true;

    } else {
        $estado_validado = false;
        $errores['estado'] = "El estado está vacío";
    }


    $guardar_habitacion = false;

    if (count($errores) == 0) {
        try {
            $guardar_habitacion = true;

           // 
            $sql = "INSERT INTO habitaciones VALUES($numeroHabitacion, '$tipo', $precio, '$descripcion', $numeroPiso,$estado,'$ruta_destino');";
            $guardar = mysqli_query($db, $sql);


          

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
header("Location: ../habitacion.php");