  <div>
    <div>
      <a href="./" <?php if ($_SESSION['page'] == "home"){echo 'class="active"';} ?>>Home</a>
    </div>
    <div>
      <a href="./studenten.php" <?php if ($_SESSION['page'] == "studenten"){echo 'class="active"';} ?>>Studenten</a>
    </div>
    <div>
      <a href="./docenten.php" <?php if ($_SESSION['page'] == "docenten"){echo 'class="active"';} ?>>Docenten</a>
    </div>
    <div>
      <a href="./niveaus.php" <?php if ($_SESSION['page'] == "niveaus"){echo 'class="active"';} ?>>Niveaus</a>
    </div>
    <div>
      <a href="./vakken.php" <?php if ($_SESSION['page'] == "vakken"){echo 'class="active"';} ?>>Vakken</a>
    </div>
  </div>
