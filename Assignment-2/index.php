<?php
session_start();
require_once '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer(true);
$mail->isSMTP();
// facilitating gmail smtp server
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
// setting username, username field and setFrom field must be same
$mail->Username = 'sandiptasardar99@gmail.com';
// setting password
$mail->Password = 'tbwczrfesfmfyxge';
// setting security protocol
$mail->SMTPSecure = 'ssl';
// setting port number
$mail->Port = 465;
// setting email id from which mail will be delivered
$mail->setFrom('sandiptasardar99@gmail.com');
// setting the address to which mail will be delivered
$mail->addAddress($_SESSION['email']);
$mail->isHTML(true);
// setting the subject of mail
$mail->Subject = 'Welcome User';
// setting the body of mail
$mail->Body = 'Thank you for your submission';
$mail->send();
header('location:action.php');
?>

