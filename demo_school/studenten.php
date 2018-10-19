<?php
require('component/main.php');
$_SESSION['page'] = "studenten";
require('component/navbar.php');

// code voor oproepen sql informatie
// $sql = "SELECT * FROM `studenten` ORDER BY `studenten`.`voornaam` ASC, `studenten`.`achternaam` ASC "; 
// $result = mysqli_query($con,$sql);
// $idarray = array();
// while($row = mysqli_fetch_array($result)) {
//     array_push($idarray, $row);
// }

$success = false;
if (isset($_POST['submit'])){
  global $success;
  $voornaam = htmlspecialchars($_POST['voornaam']);
  $achternaam = htmlspecialchars($_POST['achternaam']);
  $leeftijd = $_POST['leeftijd'];
  $geslacht = $_POST['geslacht'];
  $klasID = $_POST['klasID'];
  $notities = htmlspecialchars($_POST['notities']);
  
  if(empty($voornaam) || empty($achternaam) || empty($leeftijd) || empty($geslacht) || empty($klasID)){
    $_SESSION['warning'] = "Leeg veld...";
	} else {
		if(!preg_match("/^[a-zA-Z ]*$/",$voornaam) || !preg_match("/^[a-zA-Z ]*$/",$achternaam)){
      $_SESSION['warning'] = "Ongeldige voor of achternaam!";
		} else {
			if($leeftijd < 0){
        $_SESSION['warning'] = "Te Jong!";
			} else {
        $con = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_school');
				$sql = "INSERT INTO `studenten` (`studentID`, `voornaam`, `achternaam`, `leeftijd`, `geslacht`, `notities`, `klasID`) VALUES (NULL, '$voornaam', '$achternaam', '$leeftijd', '$geslacht', '$notities', '$klasID')";
        mysqli_query($con,$sql);
        $_SESSION['success'] = "Student ".$_POST['voornaam']." geregistreerd!";
			}
    }
  }
}
?>

<form action="studenten.php" method="POST">
  <h3>Studenten Registratie</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input type="text" name="voornaam" placeholder="Voornaam"><br/>
  <input type="text" name="achternaam" placeholder="Achternaam"><br/>
  <input type="number" name="leeftijd" value="" placeholder="Leeftijd"><br/>
  <input type="radio" name="geslacht" value="m" checked>M / V
  <input type="radio" name="geslacht" value="v"><br/>
  <input tyoe="number" name="klasID" placeholder="KlasID"><br/>
  <input tyoe="textarea" name="notities" placeholder="notities"><br/>
  <button type="submit" name='submit'>Verstuur</button><br/>
</form>

<?php 
require('component/mainend.php');