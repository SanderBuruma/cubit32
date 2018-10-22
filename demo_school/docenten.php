<?php
require('component/main.php');
$_SESSION['page'] = "docenten";
require('component/navbar.php');

// code voor oproepen sql informatie
// $sql = "SELECT * FROM `studenten` ORDER BY `studenten`.`voornaam` ASC, `studenten`.`achternaam` ASC "; 
// $result = mysqli_query($con,$sql);
// $idarray = array();
// while($row = mysqli_fetch_array($result)) {
//     array_push($idarray, $row);
// }
if (isset($_POST['submit'])){
  $voornaam = htmlspecialchars($_POST['voornaam']);
  $achternaam = htmlspecialchars($_POST['achternaam']);
  $leeftijd = $_POST['leeftijd'];
  $geslacht = $_POST['geslacht'];
  $notities = htmlspecialchars($_POST['notities']);
  $adres = htmlspecialchars($_POST['adres']);
  $stad = htmlspecialchars($_POST['stad']);
  $email = htmlspecialchars($_POST['email']);

  if(empty($voornaam) || empty($achternaam) || empty($leeftijd) || empty($geslacht) || empty($adres) || empty($stad) || empty($email)){
    echo "<script>console.log('leegveld!')</script>";
	} else {
		if(!preg_match("/^[a-zA-Z ]*$/",$voornaam) || !preg_match("/^[a-zA-Z ]*$/",$achternaam) || !preg_match("/^[a-zA-Z0-9 ]*$/",$adres) || !preg_match("/^[a-zA-Z ]*$/",$stad)){
      $_SESSION['warning'] = "Voornaam, achternaam, adres of stad ongeldig! ";
		} else {
			if($leeftijd < 0){
        $_SESSION['warning'] = "Te Jong!";
			} else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $_SESSION['warning'] = "Email ongeldig!";
        } else {
          $con = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_school');
          $sql = "INSERT INTO `docenten` (`docentID`, `voornaam`, `achternaam`, `leeftijd`, `adres`, `stad`, `email`, `geslacht`) VALUES (NULL, '$voornaam', '$achternaam', '$leeftijd', '$adres', '$stad', '$email', '$geslacht')";
          $result = mysqli_query($con,$sql);
          $_SESSION['success'] = "Docent ".$_POST['voornaam']." geregistreerd!" ;
          header('location: ./docenten.php?signup=success');
        }
			}
    }
  }
}
?>

<form action="docenten.php" method="POST">
  <h3>Docenten Registratie</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input type="text" name="voornaam" placeholder="Voornaam" required><br/>
  <input type="text" name="achternaam" placeholder="Achternaam" required><br/>
  <input type="text" name="adres" placeholder="Adres" required><br/>
  <input type="text" name="stad" placeholder="Stad" required><br/>
  <input type="text" name="email" placeholder="Email" required><br/>
  <input type="number" name="leeftijd" placeholder="Leeftijd" required><br/>
  <input type="radio" name="geslacht" value="m" checked> M / V
  <input type="radio" name="geslacht" value="v"><br/>
  <input type="textarea" name="notities" placeholder="notities"><br/>
  <button type="submit" name='submit'>Verstuur</button>
</form>

<?php 
require('component/mainend.php');