<?php
echo '';
require_once('includes/main.php');
require_once('includes/navbar.php');

if (isset($_GET['id'])){
  $stmt = $con->prepare('SELECT * FROM `advertentie` WHERE advertentieID LIKE ?');
  $stmt->bind_param("i",$_GET['id']);
  $stmt->execute();
  $stmt->bind_result($advertentieID,$categorieID,$subcategorieID,$userID,$prijs,$beschrijving,$datumplaatsing,$tijdplaatsing,$titel,$image1path);

  if ($stmt->fetch()){
    echo "<div class='advertentie'>
        <img class=\"main\" src=\"$image1path\"/>
        <div class=\"informatie\">
          
        </div>
      </div>";
  }else{
    header("location: index.php?advertentie=sqlfailure");
    exit;  
  }
}else{
  header("location: index.php?advertentie=noid");
  exit;
}
?>


<?php
require_once('includes/mainend.php');