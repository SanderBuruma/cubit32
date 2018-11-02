<div id="topbar">
  <a href="./index.php" id="home">
    <svg viewBox="0 -4 400 400" class="font">
      <use xlink:href="#icon-scales"></use>
    </svg><!--
    --><span>UltraMarkt</span><!--
--></a>
    <?php

    if (isset($_SESSION['sessionID'])){
      $username = $_SESSION['username'];
      $sessionID = $_SESSION['sessionID'];
    };

    if (isset($_SESSION['sessionID']) && strlen($sessionID) > 0){
      echo '
      <a id="uitloggen-btn" href="uitloggen.php">
        <svg viewBox="0 -72 700 500" class="font">
          <use xlink:href="#icon-sign-out"></use>
        </svg><!--
        --><span>Uitloggen</span><!--
        --></a>
      <a id="advertentie-plaatsen-btn" href="advertentieplaatsen.php"><!--
      --><svg viewBox="0 -72 700 500" class="font">
        <use xlink:href="#icon-advertentie"></use>
      </svg><!--
      --><span>Plaats</span><!--
      --></a><!--
      --><a href="user.php" id="gebruikersnaam"><!--
        --><svg viewBox="0 -72 700 500" class="font">
          <use xlink:href="#icon-user"></use>
        </svg><!--
        --><span>'.$username.'</span><!--
        --></a>';
    } else {
      echo '
      <a id="inlog-btn" href="inloggen.php">
      <svg viewBox="0 -72 500 500" class="font">
        <use xlink:href="#icon-sign-in"></use>
      </svg><!--
      --><span>Inloggen</span><!--
      --></a>
      <a id="registreer-btn" href="registreren.php">
        <svg viewBox="0 -72 700 500" class="font">
          <use xlink:href="#icon-user-plus"></use>
        </svg><!--
        --><span>Registreren</span><!--
        --></a>';
    }
    ?>
</div>