<?php
require('component/main.php');
require('component/navbar.php');

if (isset($_POST['submit'])){

  require('component/con_db.php');

  $password = $_POST['password'];
  $username = $_POST['username'];
  $passwordConfirm = $_POST['passwordConfirm'];
  $email = $_POST['email'];

  //grab users with same username
  $sql = "SELECT * FROM `users` WHERE `username` = `Bol159`";
  $result = mysqli_query($con,$sql);
  $resultnr = mysqli_num_rows ($result);

  if ($resultnr > 0){

    $_SESSION['warning'] = "Gebruikernaam bestaat al";

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
    $hexchars = array("a","b","c","d","e","f","0","1","2","3","4","5","6","7","8","9");
    for ($i=0 ; $i<60 ; $i++){$sessionID .= $hexchars[array_rand($hexchars)];}
    $passwordSalt = '';
    for ($i=0 ; $i<16 ; $i++){$passwordSalt .= $hexchars[array_rand($hexchars)];}
    $passwordMD5 = md5($password.$passwordSalt);

    $sql = "INSERT INTO `users` (`userID`, `username`, `email`, `passwordMD5`, `sessionID`, `passwordSalt`) VALUES (NULL, '$username', '$email', '$passwordMD5', '$sessionID','$passwordSalt')";
    mysqli_query($con,$sql);
    $_SESSION['success'] = " $username geregistreerd!";
    $_SESSION['sessionID'] = $sessionID;
    $_SESSION['username'] = $username;
    
  }
}
?>

<form id="registreer" action="registreren.php" method="POST">
  <h3>Registratie</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input type="text" name="username" placeholder="Gebruikersnaam"><br/>
  <input type="text" name="email" placeholder="E-Mail"><br/>
  <input type="password" name="password" value="" placeholder="paswoord"><br/>
  <input type="password" name="passwordConfirm" placeholder="zelfde paswoord"><br/>
  <button type="submit" name='submit'>Registreer!</button>
</form>

<?php 
require('component/mainend.php');