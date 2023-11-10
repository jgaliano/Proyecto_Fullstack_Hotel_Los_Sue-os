<?php
session_start();
require_once '../includes/conexion.php';

function generarNuevaContrasena() {
    return substr(md5(rand()), 0, 10);
}

function enviarCorreo($destinatario, $contrasena) {
    require_once '../includes/email.php';
    $mail = getConfiguredMailer();
    $mail->addAddress($destinatario);
    $rutaImagen = '../assets/img/sueños.jpeg';

    // Obtén el contenido de la imagen y codifícalo en base64
    $imagenContenido = file_get_contents($rutaImagen);
    $imagenCodificada = base64_encode($imagenContenido);
    $mail->addStringEmbeddedImage($imagenCodificada, 'logo.jpeg', 'logo.jpeg', 'base64', 'image/jpeg');

    $mail->Subject = 'Nueva Contraseña - Hotel Los Sueños';
    $mail->Body = 'Tu nueva contraseña es: ' . $contrasena
    . '<br>Hotel Los Sueños<br><img src="cid:logo.jpeg" width="300" height="200">';
    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($db, $_POST['email']);

    try {
        // Verificar si el correo existe en la base de datos
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            throw new Exception("El correo electrónico no existe en la base de datos.");
        }

        // Generar nueva contraseña y cifrarla
        $nueva_contrasena = generarNuevaContrasena();
        $contrasena_cifrada = password_hash($nueva_contrasena, PASSWORD_BCRYPT);

        // Actualizar la contraseña en la base de datos
        $sql_update = "UPDATE usuarios SET password = '$contrasena_cifrada' WHERE email = '$email'";
        if (!mysqli_query($db, $sql_update)) {
            throw new Exception("Error al actualizar la contraseña en la base de datos.");
        }

        // Enviar correo electrónico con la nueva contraseña
        if (enviarCorreo($email, $nueva_contrasena)) {
            $_SESSION['completado'] = "Se ha enviado una nueva contraseña a tu correo electrónico.";
        } else {
            throw new Exception("Error al enviar el correo electrónico.");
        }
    } catch (Exception $e) {
        $_SESSION['errores']['general'] = "Error: " . $e->getMessage();
    }
}

header("Location: ../password.php");
