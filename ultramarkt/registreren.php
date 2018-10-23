<?php
require('component/main.php');
require('component/navbar.php');

if (isset($_POST['submit'])){

  require('component/con_db.php');

  $username = strtolower($_POST['username']);
  $email = strtolower($_POST['email']);
  $passwordConfirm = $_POST['passwordConfirm'];
  $password = $_POST['password'];

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
    for ($i=0 ; $i<60 ; $i++){$sessionID .= $hexchars[array_rand($hexchars)];}
    $passwordSalt = '';
    for ($i=0 ; $i<16 ; $i++){$passwordSalt .= $hexchars[array_rand($hexchars)];}
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
  <input type="text" name="username" placeholder="Gebruikersnaam"><br/>
  <input type="text" name="email" placeholder="E-Mail"><br/>
  <input type="password" name="password" value="" placeholder="paswoord"><br/>
  <input type="password" name="passwordConfirm" placeholder="zelfde paswoord"><br/>
  <button type="submit" name='submit'>Registreer!</button>
</form>

<?php 
require('component/mainend.php');