<?php
require_once('includes/main.php');

if (isset($_POST['submit'])){

  $username = filter_var(strtolower($_POST['username']),FILTER_SANITIZE_STRING);
  $email = filter_var(strtolower($_POST['email']),FILTER_SANITIZE_EMAIL);
  $username = filter_var($_POST['telefoonNr'],FILTER_SANITIZE_STRING);
  $passwordConfirm = $_POST['passwordConfirm'];
  $password = $_POST['password'];

  //grab users with same username
  $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
  $stmt = $con->prepare("SELECT * FROM users WHERE username = ? ");
  $stmt->bind_param("s",$username);
  $stmt->execute();
  $res = $stmt->get_result();
  $result = $res->fetch_all();
  $resultnruser = count($result);

  //grab users with same email
  $sql = "SELECT * FROM `users` WHERE `email` = '$email' ";
  $stmt = $con->prepare("SELECT * FROM users WHERE email = ? ");
  $stmt->bind_param("s",$email);
  $stmt->execute();
  $res = $stmt->get_result();
  $result = $res->fetch_all();
  $resultnremail = count($result);

  if       ($resultnruser > 0){

    $_SESSION['warning'] = "Gebruikersnaam bestaat al";

  } elseif ($resultnremail > 0){

    $_SESSION['warning'] = "Email al in gebruik";

	} elseif (empty($password) || empty($telefoonNr) || empty($passwordConfirm) || empty($username) || empty($email)){

    $_SESSION['warning'] = "Leeg veld";

	} elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)){

    $_SESSION['warning'] = "Gebruik alleen letters en nummers in de gebruikersnaam a.u.b.";

  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $_SESSION['warning'] = "Ongeldige email!";

  } elseif ($password != $passwordConfirm){

    $_SESSION['warning'] = "Paswoorden niet hetzelfde!";

  } else {

    $_SESSION['success'] = "";

    $sessionID = "";
    for ($i=0 ; $i<60 ; $i++){$sessionID .= $alphaNumericChars[array_rand($alphaNumericChars)];}
    $passwordSalt = '';
    for ($i=0 ; $i<16 ; $i++){$passwordSalt .= $alphaNumericChars[array_rand($alphaNumericChars)];}
    $passwordMD5 = hash("sha3-512",$password.$passwordSalt);

    $sql = "SELECT * FROM `users` WHERE `email` = '$email' ";
    $stmt = $con->prepare("INSERT INTO users (username, email, passwordMD5, sessionID, passwordSalt) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$username,$email,$passwordMD5,$sessionID,$passwordSalt);
    $stmt->execute();

    $_SESSION['success'] = "$username geregistreerd!";
    $_SESSION['sessionID'] = $sessionID;
    $_SESSION['username'] = $username;
    header("Location: ./index.php?register=success");
    
  }
}
require_once('includes/mainopen.php');
require_once('includes/navbar.php');
?>

<form id="registreer" action="registreren.php" method="POST">
  <h3>Registratie</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input type="text" name="username" pattern="[A-Za-z0-9 \-\_]{6,}" oninvalid="setCustomValidity('minstens 6 tekens en alleen letters, nummers, `-` en `_`')" placeholder="Gebruikersnaam"><br/>
  <input type="text" name="email" pattern="^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$"  oninvalid="setCustomValidity('ongeldige e-mail')" placeholder="E-Mail"><br/>
  <input type="text" name="telefoonNr" pattern="\d{2,5}-\d{4,15}"  oninvalid="setCustomValidity('alleen nrs en \'-\' toegestaan)" placeholder="06-12345678"><br/>
  <input type="password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})" oninvalid="setCustomValidity('minstens 1 kleine letter, 1 hoofdletter, 1 getal en meer dan 7 tekens')" name="password" value="" placeholder="paswoord"><br/>
  <input type="password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})" oninvalid="setCustomValidity('minstens 1 kleine letter, 1 hoofdletter, 1 getal en meer dan 7 tekens')" name="passwordConfirm" placeholder="zelfde paswoord"><br/>
  <button type="submit" name='submit'>Registreer!</button>
</form>

<?php
require_once('includes/mainend.php');