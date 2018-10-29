
<?php
// ini_set('display_errors', 'On');
// error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sanitizer</title>
  <style>
  </style>
</head>
<body>
  <form action="sanitizer.php" method="POST">
    <input type="text" name="input" placeholder="" value="<?php echo $_POST['input'] ?>">
    <button tyoe="submit" name="submit">Sanitize!</button>
    <?php
    if (isset($_POST['submit'])){
      echo '<pre>';
      echo (filter_var($_POST['input'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED));
      echo '</pre>';
    }
    ?>
  </form>
</body>
</html>
