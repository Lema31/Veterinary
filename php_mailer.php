<?php
// if($_SERVER['REQUEST_METHOD'] != 'POST' ){
//     header("Location: index.html" );
// }

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

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

$mailer = new PHPMailer();
$mailer->setFrom( $email, "$name" );
$mailer->addAddress('luisema31@gmail.com','Veterinaria');
$mailer->Subject = "Mensaje web: $subject";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$mailer->CharSet = 'UTF-8';

$send = $mailer->send( );

// // if ($send) {
// //     echo "<script>alert('mensaje enviado con exito')</script>";
// // }

var_dump($send);