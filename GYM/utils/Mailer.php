<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    public static function enviarCodigoRecuperacion($email, $codigo) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'gimnasiounlz@gmail.com'; 
            $mail->Password = 'vyzh fbtf xaty vrrv'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('gimnasiounlz@gmail.com', 'Gimnasio');
            $mail->addAddress($email);

            $url = "http://localhost/GYM/index.php?url=auth/resetPassword/$codigo/" . urlencode($email);

            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "
                <p>Tu código de recuperación es: <strong>$codigo</strong></p>
                <p>Para cambiar tu contraseña, ingresá al siguiente enlace:</p>
                <p><a href='$url'>Cambiar contraseña</a></p>
                <p>Si no solicitaste este cambio, ignorá este correo.</p>
            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Error de PHPMailer: " . $mail->ErrorInfo;
            error_log('PHPMailer Error: ' . $mail->ErrorInfo);
            return false;
        }
    }
}

