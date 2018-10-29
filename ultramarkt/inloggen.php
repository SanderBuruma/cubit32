<?php
require('includes/main.php');
require('includes/navbar.php');

if (isset($_POST['submit'])){

  require('includes/con_db.php');

  $password = mysqli_real_escape_string($con,$_POST['password']);
  $username = strtolower(mysqli_real_escape_string($con,$_POST['username']));

  //grab MD5 password with same username
  $sql = "SELECT passwordMD5,passwordSalt FROM `users` WHERE `username` LIKE '$username'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  $passwordSalt = $row['passwordSalt'];
  $dbPasswordMD5 = $row['passwordMD5'];
  $passwordMD5 = md5(mysqli_real_escape_string($con,$_POST['password']).$passwordSalt);

  if (empty($password) || empty($username)){

    $_SESSION['warning'] = "Leeg veld";

	} elseif ($dbPasswordMD5 != $passwordMD5){

    $_SESSION['warning'] = "gebruiker/wachtwoord combinatie is ongeldig";

  } else {

    $sessionID = "";
    for ($i=0 ; $i<60 ; $i++){$sessionID .= $alphaNumericChars[array_rand($alphaNumericChars)];}

    $sql = "UPDATE `users` SET `sessionID` = '$sessionID' WHERE `users`.`username` = '$username'";
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
  <input required autofocus type="text" name="username" pattern="[A-Za-z0-9]{6,}" oninvalid="setCustomValidity('minstens 6 karakters')" placeholder="Gebruikersnaam"><br/>
  <input type="password" name="password" value="" placeholder="paswoord"><br/>
  <button type="submit" name='submit'>Log in!</button>
</form>

<?php
require('includes/mainend.php');