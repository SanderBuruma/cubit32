<?php
require_once('includes/main.php');
if (!isset($_SESSION['sessionID'])){
  header("Location: ./index.php?session=expired");
}
require_once('includes/mainopen.php');
require_once('includes/navbar.php');
$sessionID = $_SESSION['sessionID'];
if (isset($_POST['advertentieID'])){
  UserInterface::deleteAdvertentie($_POST['advertentieID'],$sessionID);
}

?>

<div id="user-interface">
  <div class="gebruikers-advertenties">
<?php 
  $userID = UserInterface::getUserID($con,$sessionID);
  $stmt = $con->prepare('SELECT advertentieID,titel,image1 FROM advertentie WHERE userID = ?');
  $stmt->bind_param('s',$userID);
  $stmt->execute();
  $stmt->bind_result($advertentieID,$titel,$image1);
  while($stmt->fetch()){
    echo "<div class='advertenties'><img src='$image1'/><a class='link' href='advertentie.php?id=$advertentieID'>$titel</a><form class='delete' action='user.php' method='POST'><input name='advertentieID' type='hidden' value='$advertentieID'/><input type='submit' name='submit' value='X'></form></div>";
  };
?>
  </div>
</div>

<?php
require_once('includes/mainend.php');