<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Object Oriented PHP</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
<pre>
<?php

class Cube{
  public $height;
  protected $shapeIdentity;
  private $opinion;

  function __construct($height, $shapeIdentity, $opinion){
    $this->height = $height;
    $this->shapeIdentity = $shapeIdentity;
    $this->opinion = $opinion;
  }

  public function statement(){
    echo "I'm a cube. I am $this->height cubits tall, wide and long. $this->opinion. My shape identity is $this->shapeIdentity.<br/>";
  }
  public function stateFact(){
    echo '1 Cubit is 10 millionth of the earth\'s radius!<br/>';
  }
}

class Sphere extends Cube{
  public function sphereTalk(){
    echo 'my volume is '.round($this->height**3*3.14159265*4/3,1).' cubic cubits.<br/>';
  }
}

$bigCube = new Cube(5,"sphere","The world should be a sphere");
$bigCube->statement();
$bigSphere = new Sphere(3,"cube","The world should be a cube");
$bigSphere->stateFact();
$bigSphere->sphereTalk();

?>
</pre>
</body>
</html