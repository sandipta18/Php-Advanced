<?php
session_start();
require '../class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<?php
global $error_email;
$error_email = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $em = $_POST['mail'];
        $obj = new validate();
        if ($obj->validate_email($em)) {
            $_SESSION['email'] = $em;
            header('location:index.php');
            echo '<script language="javascript">';
            echo 'alert("Message Delivered")';
            echo '</script>';
        } else {
            $error_email = "Incorrect Email ID";
        }
    }
}
?>

<body>
    <div class="container">
        <div class="container-close">&times;</div>
        <img src="https://mir-s3-cdn-cf.behance.net/projects/404/15353e48243197.Y3JvcCw3MTcsNTYxLDEyMiww.jpg" alt="image">
        <div class="container-text">
            <h2>Fill to Subscribe</h2>
            <form action="action.php" method="POST">
                <input type="email" placeholder="Email address" name="mail"><span class="error"><?php echo $error_email; ?></span>
                <input type="submit" name="submit" placeholder="Submit" class="sub">
            </form>
        </div>
    </div>
</body>

</html>