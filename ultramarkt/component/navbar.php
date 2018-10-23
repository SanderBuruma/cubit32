<div id="topbar">
  <a href="./index.php" id="home">
    <img id="homeimage" src="img/scales.svg"/>
    UltraMarkt
  </a>
    <?php 
    
    if (isset($_SESSION['sessionID'])){
      $username = $_SESSION['username'];
      $sessionID = $_SESSION['sessionID'];
    };

    if (isset($_SESSION['sessionID']) && strlen($sessionID) > 0){
      echo '<a id="uitloggen" href="uitloggen.php">
        Uitloggen
      </a>
      <a id="advertentie-plaatsen" href="advertentieplaatsen.php">
      Advertentie Plaatsen
      </a>
      <p id="gebruikersnaam">
        '.$sessionID.'
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