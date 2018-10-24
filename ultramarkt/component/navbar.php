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
      echo '<a id="uitloggen-btn" href="uitloggen.php">
        Uitloggen
      </a>
      <a id="advertentie-plaatsen-btn" href="advertentieplaatsen.php">
      Advertentie Plaatsen
      </a>
      <p id="gebruikersnaam"><img class="navbar-icon" src="http://localhost/ultramarkt/img/user-regular.svg"/>
        '.$username.'
      </p>';
    } else {
      echo '<a id="inlog-btn" href="inloggen.php">
      Inloggen
    </a>
    <a id="registreer-btn" href="registreren.php">
      Registreren
    </a>';
    }
    ?> 
</div>