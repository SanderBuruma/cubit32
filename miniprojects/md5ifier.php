
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
  <title>MD5ifier</title>
  <style>
  </style>
</head>
<body>
  <form action="md5ifier.php" method="POST">
    <input type="text" name="input" placeholder="" value="<?php echo $_POST['input'] ?>">
    <button tyoe="submit" name="submit">Show MD5!</button>
    <?php
    if (isset($_POST['submit'])){
      echo '<p>';
      echo md5($_POST['input']);
      echo '</p>';
    }
    ?>
  </form>
</body>
</html>
