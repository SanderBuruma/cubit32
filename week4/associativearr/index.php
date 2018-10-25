<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MD5ifier</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>

<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$people = Array(
  "Martijn" => 29,
  "Andrew" => 35,
  "Erwin" => 8,
  "Elise" => 19,
  "Paul" => 38,
  "Sander" => 31,
  "Raoul" => 113,
  "Sjoerd" => 32,
  "Marloes" => 6,
  "Daantje" => 15
);

function func($people){
  $arrSize = count($people);
  $string=""; $count=0 ;
  $avgAge = array_sum($people);

  foreach($people as $i => $j){
    $count++;
    if ($arrSize-$count == 1){$string.="$i en ";}elseif($arrSize-$count == 0){$string.="$i ";}else{$string.="$i, ";}
  };

  $avgAge = round($totalAge / $count);
  $string.=" zijn gemiddeld $avgAge jaar oud!";
  print_r($string);
};
func($people);

?>
  
</body>
</html>