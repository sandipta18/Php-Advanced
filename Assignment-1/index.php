<?php 
require '../class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Advanced-Assignment-1</title>
</head>

<body>

  <?php
  // created an object of class output
  $obj2 = new output();
  // used the object to call a function inside the class output
  $data = $obj2->print_data();
  foreach ($data as $key) { ?>
  <!-- Travering the associative array and printing the data -->
    <div class="container">
      <div class="wrapper">
        <!-- Pringint Image -->
        <img class="img" src="<?php echo $key->image_content; ?>">
        <div class="text">
          <!-- Pringing Title and Body -->
          <h1 class="title"> <?php echo $key->title; ?></h1>
          <span><?php echo $key->body; ?>
          <!-- Printing the anchor tag -->
            <a class="explore" href="<?php echo $key->explore_more; ?>">Explore More</a>
        </div>
      </div>
    </div>
</body>

</html>
<?php } ?>