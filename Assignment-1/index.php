<?php
require '../class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced-Assignment-1</title>
</head>
<body>
<?php
$url = 'https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services';
$obj = new fetch();
$arr_body = $obj->fetch_data($url);
$obj2 = new output();
$data = $obj2->print_data($arr_body);
for($i=0;$i<count($data);$i++){
  if($i%3==2){?>
   <img src="<?php echo $data[$i] ?>">
  <?php
  }
  if($i%3==0){
    echo $data[$i];
  }
  if($i%3==1){
    echo $data[$i];
  }
  
}
?>

</body>

</html>

  
