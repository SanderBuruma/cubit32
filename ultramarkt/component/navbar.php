<div id="topbar">
  <a href="./index.php" id="home">
    <img id="homeimage" src="img/scales.svg"/>
    UltraMarkt
  </a>
    <?php 
    $username = $_SESSION['username'];
    $sessionID = $_SESSION['sessionID'];
    if (strlen($sessionID)>0){
      echo '<a id="uitloggen" href="uitloggen.php">
        Uitloggen
      </a>
      <p id="gebruikersnaam">
        '.$username.'
      </p>';
    } else {
      echo '<a id="inlogbtn" href="inloggen.php">
      Inloggen
    </a>
    <a id="registreerbtn" href="registreren.php">
      Registreren
    </a>';
    }
    ?> 
</div>