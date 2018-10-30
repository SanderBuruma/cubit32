<?php
require_once('includes/main.php');
$_SESSION['page'] = "home";
require_once('includes/navbar.php');

require_once('includes/get.categorieen.php');

?>
<div class="wrapper">
  <form action="index.php">
    <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
    <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
    <div id="search-input">
      <input type="text" name="searchInput" placeholder="typ hier uw zoekopdracht!">
      <select name="categorieID">
        <option value="0">Alle groepen...</option>
        <?php 
          foreach ($categorieArray as $key => $value){
            $catID = $value['categorieID'];
            $catNaam = $value['naam'];
            echo "<option value=\"$catID\">$catNaam</option>";
          }
        ?>
      </select>
    </div>
  </form>
    <?php
    if (isset($_POST['submit'])){
      echo '<div id="zoek-resultaten">';
      
      function postAdvertenties($stmt){
        $stmt->execute();
        $stmt->bind_result($advertentieID,$prijs,$titel);
        while($stmt->fetch()){
          echo "<div class='advertentie'></div>";
        }
      }
      if ($_POST['categorieID'] == 0){
        $stmt=$con->prepare('SELECT advertentieID,prijs,titel FROM advertenties WHERE title = ? OR beschrijving = ? ORDER BY datumplaatsing DESC, tijdplaatsing DESC LIMIT 10');
        $stmt->bind_param("ss",$_POST['searchInput'],$_POST['searchInput']);
        postAdvertenties($stmt);
      }else{
        $stmt=$con->prepare('SELECT advertentieID,prijs,titel FROM advertenties WHERE title = ? OR beschrijving = ? AND categorieID = ? ORDER BY datumplaatsing DESC, tijdplaatsing DESC LIMIT 10');
        $stmt->bind_param("ssi",$_POST['searchInput'],$_POST['searchInput'],$_POST['categorieID']);
        postAdvertenties($stmt);
      }

      echo '</div">';
    }
    ?>
</div>
<?php
require_once('includes/mainend.php');