<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 class sendEmail {

    public function send($userName, $email, $url){

       // Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'padhaistuffngp@gmail.com';                     // SMTP username
    $mail->Password   = 'fgthx987';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('padhaistuffngp@gmail.com', 'Padhaistuff');
    $mail->addAddress($email, $userName);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirm your email';
    $mail->Body    = '<p> Welcome to Padhaistuff ' . $userName . ' please confirm your email click on the below link</p> <p><a href="'. $url .'">Confirm email</a></p><p> OR copy and paste this link '. $url .'</p>';
    $mail->AltBody = '<p> Welcome to Padhaistuff ' . $userName . ' please confirm your email click on the below link</p> <p><a href="'. $url .'">Confirm email</a></p><p> OR copy and paste this link '. $url .'</p>';

    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}

    }

 }


?>