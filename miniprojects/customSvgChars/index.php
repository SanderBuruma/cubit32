<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Custom Svg Characters</title>
  <style>

    body {
      padding: 20px;
    }
    h1:nth-of-type(1) {
      color: blue;
    }
    h1:nth-of-type(2) {
      color: green;
    }
    h1:nth-of-type(3) {
      color: orange;
    }
    h1:nth-of-type(4) {
      color: red;
    }
    svg {
      height: 1em;
      fill: currentColor;
      vertical-align: bottom;
    }
    
  </style>
</head>
<body>
<?php 
require("svg.php");
?>

  <h1>
    <svg viewBox="0 0 32 32">
      <use xlink:href="#icon-phone"></use>
    </svg>
    Call me
  </h1>

  <h1>
    Add to
    <svg viewBox="0 0 32 32">
      <use xlink:href="#icon-cart"></use>
    </svg>
    Cart 
  </h1>

  <h1>
    Photo Gallery
    <svg viewBox="0 0 32 32">
      <use xlink:href="#icon-image"></use>
    </svg>
  </h1>

  <h1>
    <svg viewBox="0 0 32 32">
      <use xlink:href="#icon-play"></use>
    </svg>
    Play
  </h1>
</body>
</html>