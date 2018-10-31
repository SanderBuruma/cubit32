<?php
require_once('includes/main.php');
$_SESSION['page'] = "home";
require_once('includes/navbar.php');

require_once('includes/get.categorieen.php');

require_once('includes/mainopen.php');

if(isset($_GET['advertentie'])){
  echo "<script>alert('advertentie.php fout: ".$_GET['advertentie']."')</script>";
}
if(isset($_GET['session']) && $_GET['session'] == 'expired'){
  echo "<script>alert('fout: sessie is verlopen')</script>";
}
?>
<div class="wrapper">
  <div id="search-index">
    <form action="index.php" id="search-form" method="GET">
      <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
      <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
      <div id="search-input">
        <input type="text" name="searchInput" placeholder="typ hier uw zoekopdracht">
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
          echo "<a href='advertentie.php?id=$advertentieID'><div class='advertentie-in-lijst'><img src='$image1path' /><h6> €".$prijs."</h6><p>".$titel."</p></div></a>";
        }
      }
      if ($_GET['categorieID'] == 0){
        $stmt = $con->prepare('SELECT advertentieID,prijs,titel,image1 FROM advertentie WHERE titel LIKE ? ORDER BY datumplaatsing DESC, tijdplaatsing DESC LIMIT 15');
        $param = "%".$_GET['searchInput']."%";
        $stmt->bind_param("s",$param);
        postAdvertenties($stmt);
      }else{
        $stmt = $con->prepare('SELECT advertentieID,prijs,titel,image1 FROM advertentie WHERE categorieID = ? AND titel LIKE ? ORDER BY datumplaatsing DESC, tijdplaatsing DESC LIMIT 15');
        $param = "%".$_GET['searchInput']."%";
        $stmt->bind_param("is",$_GET['categorieID'],$param);
        postAdvertenties($stmt);
      }

      echo '</div">';
    }
    ?>
  </div>
</div>
<?php
require_once('includes/mainend.php');

