<?php
session_start();
require_once '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sandiptasardar99@gmail.com';
$mail->Password = 'tbwczrfesfmfyxge';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('sandiptasardar99@gmail.com');
$mail->addAddress($_SESSION['email']);
$mail->isHTML(true);
$mail->Subject = 'Thank you for Subscribing';
$mail->Body = 'Welcome User';
$mail->send();
header('location:action.php');
?>

