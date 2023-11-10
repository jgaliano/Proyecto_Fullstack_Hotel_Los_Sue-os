<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
function getConfiguredMailer() {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.brevo.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'normananselmo@gmail.com';
    $mail->Password = 'Xt8SZ9sOzdhNvI3r';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('noreply@gmail.com', 'Hotel Los Sueños');
    $mail->addReplyTo('adminhotel@gmail.com', 'Gerencia Hotel Los Sueños');
    return $mail;
}
?>
