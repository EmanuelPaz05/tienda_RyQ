<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../librerias/vendor/phpmailer/phpmailer/src/Exception.php';
require '../librerias/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../librerias/vendor/phpmailer/phpmailer/src/SMTP.php';

require '../librerias/vendor/autoload.php'; 

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
            );

        // Configurar el servidor SMTP (en este caso, Gmail)
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'emanuelpazq2005@gmail.com'; // Cambiar esto por tu correo electrónico de Gmail
        $mail->Password = 'xnqx hzwd subz mtjc'; // Cambiar esto por tu contraseña de Gmail
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Configurar remitente y destinatario
        $mail->setFrom('emanuelpazq2005@gmail.com', 'Pagina Bajo Online'); // Cambiar esto por tu correo y nombre
        $mail->addAddress('emanuelpazdeveloper@gmail.com'); // Cambiar esto por tu correo electrónico donde quieres recibir los mensajes

        // Configurar el contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto';
        $mail->Body    = "Nombre: $nombre<br>Email: $email<br>Mensaje: $mensaje";

        // Enviar el correo
        $mail->send();

        // Redirige a una página de confirmación o muestra un mensaje de éxito
        $mensaje = "¡Hola! Gracias por contactarte con nosotros. Te responderemos pronto.";
        echo "<script>alert('$mensaje');</script>";
        header("Location: ../contacto.html");
        exit; 
    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
    }
}
?>
