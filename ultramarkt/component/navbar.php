<div id="topbar">
  <a href="./index.php" id="home">
    <svg viewBox="0 -4 400 400" class="font">
      <use xlink:href="#icon-scales"></use>
    </svg>
    UltraMarkt
  </a>
    <?php

    if (isset($_SESSION['sessionID'])){
      $username = $_SESSION['username'];
      $sessionID = $_SESSION['sessionID'];
    };

    if (isset($_SESSION['sessionID']) && strlen($sessionID) > 0){
      echo '<a id="uitloggen-btn" href="uitloggen.php">
        <svg viewBox="0 -72 700 500" class="font">
          <use xlink:href="#icon-sign-out"></use>
        </svg>
        Uitloggen
      </a>
      <a id="advertentie-plaatsen-btn" href="advertentieplaatsen.php">
      <svg viewBox="0 -72 700 500" class="font">
        <use xlink:href="#icon-advertentie"></use>
      </svg>
      Advertentie Plaatsen  
      </a>
      <p id="gebruikersnaam"><img class="navbar-icon" src="http://localhost/ultramarkt/img/user-regular.svg"/>
        '.$username.'
      </p>';
    } else {
      echo '
      <a id="inlog-btn" href="inloggen.php">
      <svg viewBox="0 -72 500 500" class="font">
        <use xlink:href="#icon-sign-in"></use>
      </svg>
       Inloggen
      </a>
      <a id="registreer-btn" href="registreren.php">
        <svg viewBox="0 -72 700 500" class="font">
          <use xlink:href="#icon-user-plus"></use>
        </svg>
         Registreren
      </a>';
    }
    ?>
</div>