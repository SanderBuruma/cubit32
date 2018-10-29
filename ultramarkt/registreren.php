<?php
require('includes/main.php');
require('includes/navbar.php');

if (isset($_POST['submit'])){

  require('includes/con_db.php');

  $username = strtolower(mysqli_real_escape_string($con,$_POST['username']));
  $email = strtolower(mysqli_real_escape_string($con,$_POST['email']));
  $passwordConfirm = mysqli_real_escape_string($con,$_POST['passwordConfirm']);
  $password = mysqli_real_escape_string($con,$_POST['password']);

  //grab users with same username
  $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
  $result = mysqli_query($con,$sql);
  $resultnruser = mysqli_num_rows ($result);

  //grab users with same email
  $sql = "SELECT * FROM `users` WHERE `email` = '$email' ";
  $result = mysqli_query($con,$sql);
  $resultnremail = mysqli_num_rows ($result);

  if       ($resultnruser > 0){

    $_SESSION['warning'] = "Gebruikernaam bestaat al";

  } elseif ($resultnremail > 0){

    $_SESSION['warning'] = "Email al in gebruik";

	} elseif (empty($password) || empty($passwordConfirm) || empty($username) || empty($email)){

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
    $passwordMD5 = md5($password.$passwordSalt);

    $sql = "INSERT INTO `users` (`userID`, `username`, `email`, `passwordMD5`, `sessionID`, `passwordSalt`) VALUES (NULL, '$username', '$email', '$passwordMD5', '$sessionID','$passwordSalt')";
    mysqli_query($con,$sql);
    $_SESSION['success'] = "$username geregistreerd!";
    $_SESSION['sessionID'] = $sessionID;
    $_SESSION['username'] = $username;
    header("Location: ./index.php?register=success");
    
  }
}
?>

<form id="registreer" action="registreren.php" method="POST">
  <h3>Registratie</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input type="text" name="username" pattern="[A-Za-z0-9 \-\_]{6,}" oninvalid="setCustomValidity('minstens 6 tekens en alleen letters, nummers, `-` en `_`')" placeholder="Gebruikersnaam"><br/>
  <input type="text" name="email" pattern="^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$"  oninvalid="setCustomValidity('ongeldige e-mail')" placeholder="E-Mail"><br/>
  <input type="password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})" oninvalid="setCustomValidity('minstens 1 kleine letter, 1 hoofdletter, 1 getal en meer dan 7 tekens')" name="password" value="" placeholder="paswoord"><br/>
  <input type="password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})" oninvalid="setCustomValidity('minstens 1 kleine letter, 1 hoofdletter, 1 getal en meer dan 7 tekens')" name="passwordConfirm" placeholder="zelfde paswoord"><br/>
  <button type="submit" name='submit'>Registreer!</button>
</form>

<?php
require('includes/mainend.php');