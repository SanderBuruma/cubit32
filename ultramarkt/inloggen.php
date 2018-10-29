<?php
require('includes/main.php');
require('includes/navbar.php');

if (isset($_POST['submit'])){


  $password = $_POST['password'];
  $username = strtolower($_POST['username']);

  //grab password hash and password salt from same username
  $stmt = $con->prepare("SELECT passwordMD5,passwordSalt FROM users WHERE username LIKE ?");
  $stmt->bind_param("s",$username);
  $stmt->execute();
  $res = $stmt->get_result();
  $result = $res->fetch_all()[0];
  $dbPasswordMD5 = $result[0];
  $passwordSalt = $result[1];
  $passwordMD5 = md5($password.$passwordSalt);

  if (empty($password) || empty($username)){

    $_SESSION['warning'] = "Leeg veld";

	} elseif ($dbPasswordMD5 != $passwordMD5){

    $_SESSION['warning'] = "gebruiker/wachtwoord combinatie is ongeldig";

  } else {

    $sessionID = "";
    for ($i=0 ; $i<60 ; $i++){$sessionID .= $alphaNumericChars[array_rand($alphaNumericChars)];}

    $sql = "UPDATE users SET sessionID = '$sessionID' WHERE users.username = '$username'";
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