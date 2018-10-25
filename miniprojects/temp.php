<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
<?php 
$var = 5;
function test(&$arg){
  static $count = 0;
  $count++;
  $arg++;
  print_r("C:$count ");
}
for ($i=0 ; $i<5 ; $i++){
  test($var);
  print_r("V:$var <br/>");
}
?>
</body>
</html>