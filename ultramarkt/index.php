<?php
require_once('includes/main.php');
$_SESSION['page'] = "home";
require_once('includes/navbar.php');

require_once('includes/get.categorieen.php');

?>
<div class="wrapper">
  <form action="index.php" method="GET">
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
    if (isset($_GET['categorieID'])){
      echo '<div id="zoek-resultaten">';
      
      function postAdvertenties($stmt){
        $stmt->execute();
        $stmt->bind_result($advertentieID,$prijs,$titel,$image1path);
        while($stmt->fetch()){
          echo "<a src='advertentie.php'><div class='advertentie'><img src='$image1path' /><h6> €".$prijs."</h6><p>".$titel."</p></div></a>";
        }
      }
      if ($_GET['categorieID'] == 0){
        $stmt = $con->prepare('SELECT advertentieID,prijs,titel,image1 FROM advertentie WHERE titel LIKE ? OR beschrijving LIKE ? ORDER BY datumplaatsing DESC, tijdplaatsing DESC LIMIT 10');
        $param = "%".$_GET['searchInput']."%";
        $stmt->bind_param("ss",$param,$param);
        postAdvertenties($stmt);
      }else{
        $stmt = $con->prepare('SELECT advertentieID,prijs,titel,image1 FROM advertentie WHERE titel LIKE ? OR beschrijving LIKE ? AND categorieID = ? ORDER BY datumplaatsing DESC, tijdplaatsing DESC LIMIT 10');
        $param = "%".$_GET['searchInput']."%";
        $stmt->bind_param("ssi",$param,$param,$_GET['categorieID']);
        postAdvertenties($stmt);
      }

      echo '</div">';
    }
    ?>
</div>
<?php
require_once('includes/mainend.php');

