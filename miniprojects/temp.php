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
<?php

print_r (date("ymdGis").explode(".",(microtime(true)))[1].random_int(10000,99999));
print_r (htmlspecialchars("<html><body><script>alert('test')</script></body></html>"))

?>
</pre>
</body>
</html>