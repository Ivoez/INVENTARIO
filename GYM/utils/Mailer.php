<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

class Mailer {
    public static function enviarCodigoRecuperacion($emailDestino, $codigo) {
        $mail = new PHPMailer(true);

        try {
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'gimnasiounlz@gmail.com';
            $mail->Password = 'gymunlz123'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            
            $mail->setFrom('gimnasiounlz@gmail.com', 'Sistema');
            $mail->addAddress($emailDestino);

            
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "
                <p>Has solicitado recuperar tu contraseña.</p>
                <p>Tu código de recuperación es: <strong>$codigo</strong></p>
                <p>Ingresa este código en la siguiente página: 
                    <a href='http://localhost/recoverPassword?email=$emailDestino'>Cambiar contraseña</a>
                </p>
            ";

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Mailer error: {$mail->ErrorInfo}");
            return false;
        }
    }
}
