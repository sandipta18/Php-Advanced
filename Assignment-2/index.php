<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailer Tutorial</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="email" name="mail" placeholder="Enter Email">
        <input type="submit" name="submit">
    </form>
    
</body>
<?php 
require('vendor/autoload.php'); 

    if(isset($_POST['submit'])){
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'sandiptasardar99@gmail.com';
      $mail->Password = 'tbwczrfesfmfyxge';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->setFrom('sandiptasardar99@gmail.com');
      $mail->addAddress($_POST['mail']);
      $mail->isHTML(true);
      $mail->Subject = 'Thank you for Subscribing';
      $mail->Body = 'Welcome User';
      $mail->send();
      echo "success";
    }

?>
</html>