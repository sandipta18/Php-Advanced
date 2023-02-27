
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
  $obj2 = new output();
  $data = $obj2->print_data();
  foreach ($data as $key) { ?>
    <div class="container">
      <div class="wrapper">
        <img class="img" src="<?php echo $key->image_content; ?>">
        <div class="text">

          <h1 class="title"> <?php echo $key->title; ?></h1>
          <span><?php echo $key->body; ?>

            <a class="explore" href="<?php echo $key->explore_more; ?>">Explore More</a>
        </div>
      </div>
    </div>
</body>

</html>
<?php } ?>