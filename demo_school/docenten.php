<?php
session_start();
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
$success = false;
if (isset($_POST['submit'])){
  global $success;
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
		if(!preg_match("/^[a-zA-Z]*$/",$voornaam) || !preg_match("/^[a-zA-Z]*$/",$achternaam) || !preg_match("/^[a-zA-Z0-9 ]*$/",$adres) || !preg_match("/^[a-zA-Z]*$/",$stad)){
      echo "<script>console.log('verkeerd formaat!')</script>";
		} else {
			if($leeftijd < 0){
        echo "<script>console.log('te jong!')</script>";
			} else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          echo "<script>console.log('verkeerde email!')</script>";
        } else {
          $con = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_school');
          $sql = "INSERT INTO `docenten` (`docentID`, `voornaam`, `achternaam`, `leeftijd`, `adres`, `stad`, `email`, `geslacht`) VALUES (NULL, '$voornaam', '$achternaam', '$leeftijd', '$adres', '$stad', '$email', '$geslacht')";
          $result = mysqli_query($con,$sql);
          $success = true;
        }
			}
    }
  
  }
}
?>

<form action="docenten.php" method="POST">
  <h3>Docenten Registratie</h3>
  <input type="text" name="voornaam" placeholder="Voornaam" required><?php 
  if (isset($_POST['submit'])){
    if (!preg_match("/^[a-zA-Z]*$/",$_POST['voornaam'])){
      echo '<span style="color: red;">Ongeldig</span>';
    };
  };?><br/>
  <input type="text" name="achternaam" placeholder="Achternaam" required><?php 
  if (isset($_POST['submit'])){
    if (!preg_match("/^[a-zA-Z]*$/",$_POST['achternaam'])){
      echo '<span style="color: red;">Ongeldig</span>';
    };
  };?><br/>
  <input type="text" name="adres" placeholder="Adres" required><?php 
  if (isset($_POST['submit'])){
    if (!preg_match("/^[a-zA-Z 0-9]*$/",$_POST['adres'])){
      echo '<span style="color: red;">Ongeldig</span>';
    };
  };?><br/>
  <input type="text" name="stad" placeholder="Stad" required><?php 
  if (isset($_POST['submit'])){
    if (!preg_match("/^[a-zA-Z]*$/",$_POST['stad'])){
      echo '<span style="color: red;">Ongeldig</span>';
    };
  };?><br/>
  <input type="text" name="email" placeholder="Email" required><?php 
  if (isset($_POST['submit'])){
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      echo '<span style="color: red;">Ongeldig</span>';
    };
  };?><br/>
  <input type="number" name="leeftijd" placeholder="Leeftijd" required><?php 
  if (isset($_POST['submit'])){
    if ($_POST['leeftijd'] < 1){
      echo '<span style="color: red;">Ongeldig</span>';
    };
  };?><br/>
  <input type="radio" name="geslacht" value="m" checked>M / V
  <input type="radio" name="geslacht" value="v"><br/>
  <input type="textarea" name="notities" placeholder="notities"><?php 
  if (isset($_POST['submit'])){
    if (!preg_match("/^[a-zA-Z 0-9\.]*$/",$_POST['achternaam'])){
      echo '<span style="color: red;">Alleen letters, spaties, nrs, commas en punten!</span>';
    };
  };?><br/>
  <button type="submit" name='submit'>Verstuur</button>
  <?php 
  if ($success){
    echo "<span style=`color: green;`>Success!</span>";
  }
  ?>
</form>

<?php 
require('component/mainend.php');