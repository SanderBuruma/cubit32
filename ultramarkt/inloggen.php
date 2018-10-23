<?php
require('component/main.php');
require('component/navbar.php');

if (isset($_POST['submit'])){

  require('component/con_db.php');

  $password = $_POST['password'];
  $username = strtolower($_POST['username']);

  //grab MD5 password with same username
  $sql = "SELECT passwordMD5,passwordSalt FROM `users` WHERE `username` LIKE '$username'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  $passwordSalt = $row['passwordSalt'];
  $dbPasswordMD5 = $row['passwordMD5'];
  $passwordMD5 = md5($_POST['password'].$passwordSalt);

  if (empty($password) || empty($username)){

    $_SESSION['warning'] = "Leeg veld";

	} elseif ($dbPasswordMD5 != $passwordMD5){

    $_SESSION['warning'] = "gebruiker/wachtwoord combinatie is ongeldig";

  } else {

    $sessionID = "";
    for ($i=0 ; $i<60 ; $i++){$sessionID .= $hexchars[array_rand($hexchars)];}

    $sql = "UPDATE `users` SET `sessionID` = '$sessionID' WHERE `users`.`username` = `$username`";
    mysqli_query($con,$sql);
    $_SESSION['success'] = "ingelogt als \"$username\"!";
    $_SESSION['sessionID'] = $sessionID;
    $_SESSION['username'] = $username;
    header("Location: ./index.php?inloggen=success");

  }
}
?>

<form id="inloggen" action="inloggen.php" method="POST">
  <h3>Inloggen</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input type="text" name="username" placeholder="Gebruikersnaam"><br/>
  <input type="password" name="password" value="" placeholder="paswoord"><br/>
  <button type="submit" name='submit'>Log in!</button>
</form>

<?php 
require('component/mainend.php');