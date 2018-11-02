<?php
require_once('includes/main.php');
if (!isset($_SESSION['sessionID'])){
  header("Location: ./index.php?session=expired");
}
require_once('includes/mainopen.php');
require_once('includes/navbar.php');
$sessionID = $_SESSION['sessionID'];

if (isset($_POST['submit'])){
}

?>

<div id="user-interface">
  <div class="gebuikers-advertenties">
<?php 
  echo UserInterface::getUserID($con,$sessionID);
?>
  </div>
</div>

<?php
require_once('includes/mainend.php');