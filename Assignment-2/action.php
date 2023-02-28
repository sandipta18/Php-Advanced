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
    <title>Php Advanced Assignment 2</title>
</head>
<?php
global $error_email;
$error_email = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if submission is succesfull
    if (isset($_POST['submit'])) {
        // fetching email data
        $em = $_POST['mail'];
        // creating an object of class validate
        $obj = new validate();
        //using the object to call the function inside the class to validate the email
        if ($obj->validate_email($em)) {
            // if validtion is succesful storing the email in a session variable and heading back to index.php
            $_SESSION['email'] = $em;
            header('location:index.php');
        } else {
            // if validation have failed put a message in error email field
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