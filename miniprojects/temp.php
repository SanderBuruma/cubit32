<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php 
function test(){
  static $count = 0;

  $count++;
  echo "$count ";
  if ($count < 1e1){
    test();
  }
  $count--;
  echo "$count ";
}
test();
print_r (str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJVKLMNOPQRSTUVWXYZ1234567890"));
?>
</body>
</html>