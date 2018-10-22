<div id="topbar">
  <a href="./index.php" id="home">
    <img id="homeimage" src="img/scales.svg"/>
    UltraMarkt
  </a>
  <a id="inlogbtn" href="inloggen.php">
    Inloggen
  </a>
  <a id="registreerbtn" href="registreren.php">
    Registreren
  </a>
  <a href="uitloggen.php" id="uitloggen">
    Uitloggen
  </a>
  <p id="gebruikersnaam">
    <?php echo $_SESSION['username'] ?>
  </p>
</div>