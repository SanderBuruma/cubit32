<nav>
  <ul>
    <li>
      <a href="./" 
      <?php 
      if ($_SESSION['page'] == "home"){echo 'class="active"';}
      ?>
      >
        Home
      </a>
    </li>
    <li>
      <a href="./studenten.php" 
      <?php 
      if ($_SESSION['page'] == "studenten"){echo 'class="active"';}
      ?>
      >
        Studenten
      </a>
    </li>
    <li>
      <a href="./docenten.php" 
      <?php 
      if ($_SESSION['page'] == "docenten"){echo 'class="active"';}
      ?>
      >
        Docenten
      </a>
    </li>
    <li>
      <a href="./niveaus.php" 
      <?php 
      if ($_SESSION['page'] == "niveaus"){echo 'class="active"';}
      ?>
      >
        Niveaus
      </a>
    </li>
    <li>
      <a href="./vakken.php" 
      <?php 
      if ($_SESSION['page'] == "vakken"){echo 'class="active"';}
      ?>
      >
        Vakken
      </a>
    </li>
  </ul>
</nav>