<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if( empty(trim($name)) ) $name = 'anonimo';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $name / $email</p>
    <h2>Mensaje</h2>
    $message
HTML;

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Debugoutput = 'error_log';
$mail->Username = "luisema311@gmail.com";
$mail->Password = "akcrdqqfpicrfunk";
$mail->setFrom($email, $name);
$mail->AddReplyTo($email, $name);
$mail->addAddress("luisema311@gmail.com", "Veterinaria");
$mail->Subject = $subject;
$mail->msgHTML($body); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "<script>
        alert('Mensaje enviado');
        window.location = 'index.php'
    </script>";
}
