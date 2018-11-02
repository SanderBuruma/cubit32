<?php
require_once('includes/main.php');

if (isset($_POST['submit'])){


  $password = $_POST['password'];
  $username = strtolower($_POST['username']);

  //grab password hash and password salt from same username
  $stmt = $con->prepare("SELECT passwordMD5,passwordSalt FROM users WHERE username LIKE ? OR email LIKE ?");
  $stmt->bind_param("ss",$username,$username);
  $stmt->execute();
  $stmt->bind_result($dbPasswordMD5,$passwordSalt);
  $stmt->fetch();
  $con->close();

  $passwordMD5 = hash("sha3-512",$password.$passwordSalt);

  if (empty($password) || empty($username)){

    $_SESSION['warning'] = "Leeg veld";

	} elseif ($dbPasswordMD5 != $passwordMD5){

    $_SESSION['warning'] = "gebruiker/wachtwoord combinatie is ongeldig";

  } else {

    $sessionID = "";
    for ($i=0 ; $i<60 ; $i++){$sessionID .= $alphaNumericChars[array_rand($alphaNumericChars)];}

    include('includes/con_db_ultramarkt.php');
    $stmt = $con->prepare("UPDATE users SET sessionID = ? WHERE username = ?");
    $stmt->bind_param("ss",$sessionID,$username);
    $stmt->execute();
    $con->close();
    $_SESSION['success'] = "ingelogt als \"$username\"!";
    $_SESSION['sessionID'] = $sessionID;
    $_SESSION['username'] = $username;
    header("Location: ./index.php?inloggen=$username");

  }
}

require_once('includes/mainopen.php');
require_once('includes/navbar.php');
?>

<form id="inloggen" action="inloggen.php" method="POST">
  <h3>Inloggen</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input required autofocus type="text" name="username" pattern="[A-Za-z0-9 \-\_]{6,}" oninvalid="setCustomValidity('minstens 6 tekens en alleen letters, nummers, `-` en `_`')" placeholder="Gebruikersnaam"><br/>
  <input type="password" name="password" value="" placeholder="paswoord"><br/>
  <button type="submit" name='submit'>Log in!</button>
</form>

<?php
require_once('includes/mainend.php');