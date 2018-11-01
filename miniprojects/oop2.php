<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Object Oriented 2</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
<pre>
<?php
interface ShapeInterface{
  public function draw(){};
  public function colour(){};
  public function reDraw(){};
}

class Circle implements ShapeInterface{
  public function draw(){};
  public function colour(){};
  public function reDraw(){};
}
class Square implements ShapeInterface{
  public function draw(){};
  public function colour(){};
  public function reDraw(){};
}
class Line implements ShapeInterface{
  public function draw(){};
  public function colour(){};
  public function reDraw(){};
}
class Painter{
  public function ShapeInterface(){
    return $shape->draw();
  }
}

$shape = New Circle();
$artist = new Painter();
$artist->addShape(Circle $shape);

?>
</pre>
</body>
</html>