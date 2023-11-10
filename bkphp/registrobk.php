<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar reCAPTCHA
    $recaptchaSecretKey = "6Lcai5UoAAAAADqYMW5PyGaTT4tIXWGNbPEoAT-Q";
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse";
    $recaptcha = json_decode(file_get_contents($recaptchaUrl));

    if (!$recaptcha->success) {
        $_SESSION['errores']['g-recaptcha-response'] = "Por favor, verifica que no eres un robot.";
        header("Location: ../registro.php");
        exit();
    }

    require_once '../includes/conexion.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['pass1']) ? mysqli_real_escape_string($db, $_POST['pass1']) : false;
    $password2 = isset($_POST['pass2']) ? $_POST['pass2'] : false;

    $errores = array();

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }


    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son válido";
    }


    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es válido";
    }

    // Validar la contraseña
    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['pass1'] = "La contraseña está vacía";
    }
    // Validar la confirmacion contraseña
    if (!empty($password2)) {
        $password_validado = true;

    } else {
        $password_validado = false;
        $errores['pass1'] = "La confirmacion de contraseña está vacía";
    }


    if ($password !== $password2) {
        $password_validado = false;
        $errores['pass1'] = "Las contraseñas no coinciden";
    }
    $guardar_usuario = false;

    if (count($errores) == 0) {
        try {
            $guardar_usuario = true;


            $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);


            $sql = "INSERT INTO usuarios(id,nombre,apellidos,email,password, fecha_ingreso, rol) VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura',CURDATE(),'U');";
            $guardar = mysqli_query($db, $sql);


            if ($guardar) {
                $sql = "INSERT INTO clientes (nombres, apellidos, telefono, nacionalidad, correo, tipo_id, numero_id, estado) VALUES('$nombre', '$apellidos', 'PENDIENTE', 'PENDIENTE', '$email', 'P', 'PENDIENTE', 'A')";
                //$guardar2 = mysqli_query($db, $sql);

                if ($db->query($sql) === TRUE) {
                    // Envío de correo electrónico de bienvenida
                    require_once '../includes/email.php'; // Incluir el archivo con la configuración del correo electrónico
                    $mail = getConfiguredMailer(); // Inicializar $mail fuera del bloque try-catch

                    if ($mail !== null) {
                        $mail->addAddress($email, $nombre);
                        $rutaImagen = '../assets/img/sueños.jpeg';

                        // Obtén el contenido de la imagen y codifícalo en base64
                        $imagenContenido = file_get_contents($rutaImagen);
                        $imagenCodificada = base64_encode($imagenContenido);

                        // Agrega la imagen como un archivo adjunto con dimensiones específicas
                        $mail->addStringEmbeddedImage($imagenCodificada, 'logo.jpeg', 'logo.jpeg', 'base64', 'image/jpeg', 'inline');
                        $mail->Subject = 'Bienvenido a Hotel Los Sueños';
                        $mail->Body = 'Hola ' . $nombre . ', ¡Bienvenido a Hotel Los Sueños! Gracias por registrarte en nuestra plataforma. '
                            . 'Estamos emocionados de tenerte con nosotros.<br>Ahora eres parte de nuestra comunidad. Puedes acceder a la plataforma desde el siguiente link: <a href="https://190.242.50.171">https://190.242.50.171</a>.'
                            . '<br>Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo.<br>¡Esperamos que tengas una experiencia increíble!'
                            . '<br>Hotel Los Sueños<br><img src="cid:logo.jpeg" width="300" height="200">';
                        $mail->send();
                    } else {
                        $_SESSION['errores']['general'] = "Error al configurar el envío del correo electrónico.";
                        header("Location: ../registro.php");
                        exit();
                    }

                    $_SESSION['completado'] = "El registro se ha completado con éxito.";
                    header("Location: ../registro.php");
                    exit();
                } else {
                    $_SESSION['errores']['general'] = "Fallo al guardar el cliente!!";
                }

            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
            }

        } catch (Exception $e) {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario: " . $e->getMessage();
            header("Location: ../registro.php");
            exit();
        }


    } else {
        $_SESSION['errores'] = $errores;
    }
}
header("Location: ../registro.php");