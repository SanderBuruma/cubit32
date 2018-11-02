<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Temp Document</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
<pre>
  <form action="./">
    <input type="submit" value="submit">
  </form>
<?php
if (isset($_POST['submit'])){
  echo $_POST['submit'];
}
?>
</pre>
</body>
</html>