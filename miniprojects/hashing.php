
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
  <title>Hashing Tester</title>
  <style>
  </style>
</head>
<body>
  <form action="hashing.php" method="POST">
    <input type="text" name="input" placeholder="input" value="<?php echo $_POST['input'] ?>"><br/>
    <select name="algo" value="<?php echo $_POST['algo'] ?>">
      <?php 
      foreach(hash_algos() as $value){
        echo "<option value=\"$value\">$value</option>";
      }
      ?>
    </select>
    <button tyoe="submit" name="submit">Hash!</button>
    <?php
    if (isset($_POST['submit'])){
      echo '<pre>';
      echo $_POST["algo"]." : ".hash($_POST['algo'],$_POST['input']."<br/>");
      echo '</pre>';
    }
    ?>
  </form>
</body>
</html>
  