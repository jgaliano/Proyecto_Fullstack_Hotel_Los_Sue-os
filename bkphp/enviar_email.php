<?php
require '../includes/email.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptchaSecretKey = "6Lcai5UoAAAAADqYMW5PyGaTT4tIXWGNbPEoAT-Q";
    $recaptchaResponse = $_POST["g-recaptcha-response"];

    // Verificar reCAPTCHA
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = array(
        "secret" => $recaptchaSecretKey,
        "response" => $recaptchaResponse
    );

    $options = array(
        "http" => array(
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $recaptchaResult = file_get_contents($url, false, $context);
    $recaptchaResultJson = json_decode($recaptchaResult, true);

    if ($recaptchaResultJson["success"] === true) {
        // reCAPTCHA validado correctamente, procesa el formulario aquí
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];

        try {
            $mail = getConfiguredMailer();
            $mail->addAddress('hotellossuenos5@gmail.com');
            $mail->Subject = 'Nuevo mensaje de contacto desde el sitio web';
            $mail->Body = "Nombre: $name\nCorreo Electrónico: $email\nTeléfono: $phone\nMensaje: $message";
            $mail->send();
            echo json_encode(array('status' => 'success', 'message' => '¡Mensaje enviado correctamente!'));
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => 'Error al enviar el mensaje: ' . $mail->ErrorInfo));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Por favor, completa el reCAPTCHA correctamente.'));
    }
}
?>
