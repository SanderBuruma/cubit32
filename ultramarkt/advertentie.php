<?php
require('component/main.php');
require('component/navbar.php');

if (isset($_POST['submit'])){

  require('component/con_db.php');

  $sessionID = $_SESSION['sessionID'];
}
?>

<form id="inloggen" action="inloggen.php" method="POST">
  <h3>Plaats Advertentie</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input type="text" name="username" placeholder="Gebruikersnaam"><br/>
  <input type="password" name="password" value="" placeholder="paswoord"><br/>
  <button type="submit" name='submit'>Log in!</button>
</form>

<?php 
require('component/mainend.php');