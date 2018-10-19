
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
    form{
      border: 2px #aaf solid;
      background-color: #eef;
      text-align: center;
      padding: 0 6px;
      display: block;
      position: relative;
      top: 100px;
      border-radius: 8px;
      width: 400px;
      margin: 0 auto;
    }
    form>p{
      background-color: #ddf;
    }
    form>input{
      text-align: center;
    }
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
