<?php
session_start();
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

if (isset($_POST['submit'])){
  $voornaam = htmlspecialchars($_POST['voornaam']);
  $achternaam = htmlspecialchars($_POST['achternaam']);
  $leeftijd = $_POST['leeftijd'];
  $geslacht = $_POST['geslacht'];
  $klasID = $_POST['klasID'];
  $notities = htmlspecialchars($_POST['notities']);
  
  if(empty($voornaam) || empty($achternaam) || empty($leeftijd) || empty($geslacht) || empty($klasID)){
		header("Location: ./studenten.php?signup=leegveld");
		exit();
	} else {
		if(!preg_match("/^[a-zA-Z ]*$/",$voornaam) || !preg_match("/^[a-zA-Z]*$/",$achternaam)){
			header("Location: ./studenten.php?signup=ongeldigenaam");
			exit();
		} else {
			if($leeftijd < 0){
				header("Location: ./studenten.php?signup=ongeldigeleeftijd");
				exit();
			} else {
        $con = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_school');
				$sql = "INSERT INTO `studenten` (`studentID`, `voornaam`, `achternaam`, `leeftijd`, `geslacht`, `notities`, `klasID`) VALUES (NULL, '$voornaam', '$achternaam', '$leeftijd', '$geslacht', '$notities', '$klasID')";
        mysqli_query($con,$sql);
        print_r($sql);
				header("Location: ./studenten.php?signup=success");
			}
    }
    
  }
}
?>

<form action="studenten.php" method="POST">
  <h3>Studenten Registratie</h3>
  <input type="text" name="voornaam" placeholder="Voornaam"><br/>
  <input type="text" name="achternaam" placeholder="Achternaam"><br/>
  <input type="number" name="leeftijd" value="" placeholder="Leeftijd"><br/>
  <input type="radio" name="geslacht" value="m" checked>M / V
  <input type="radio" name="geslacht" value="v"><br/>
  <input tyoe="number" name="klasID" placeholder="KlasID"><br/>
  <input tyoe="textarea" name="notities" placeholder="notities"><br/>
  <button type="submit" name='submit'>Verstuur</button>
</form>

<?php 
require('component/mainend.php');