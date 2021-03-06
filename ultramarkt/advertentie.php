<?php
require_once('includes/main.php');

if (isset($_GET['id'])){
  $stmt = $con->prepare('SELECT * FROM advertentie WHERE advertentieID LIKE ?');
  $stmt->bind_param("i",$_GET['id']);
  $stmt->execute();
  $stmt->bind_result($advertentieID,$categorieID,$subcategorieID,$userID,$prijs,$beschrijving,$datumplaatsing,$tijdplaatsing,$titel,$image1path);
  print_r ("$categorieID");

  if ($stmt->fetch()){
    $con->close();

    include('includes/con_db_ultramarkt.php');
    $stmt = $con->prepare('SELECT naam FROM categorieen WHERE categorieID LIKE ?');
    $stmt->bind_param("i",$categorieID);
    $stmt->execute();
    $stmt->bind_result($hoofdcategorieNaam);
    if ($stmt->fetch()){
      $con->close();
  
      include('includes/con_db_ultramarkt.php');
      $stmt = $con->prepare('SELECT naam FROM subcategorieen WHERE subcategorieID LIKE ?');
      $stmt->bind_param("i",$subcategorieID);
      $stmt->execute();
      $stmt->bind_result($subcategorieNaam);
      if($stmt->fetch()){
        $con->close();
    
        include('includes/con_db_ultramarkt.php');
        $stmt = $con->prepare('SELECT username,email,telefoonNr FROM users WHERE userID LIKE ?');
        $stmt->bind_param("i",$userID);
        $stmt->execute();
        $stmt->bind_result($gebruikersNaam,$contactEmail,$telefoonNr);
        if(!$stmt->fetch()){
          header("location: index.php?advertentie=getusernamefail");
          exit;  
        }
      }else{
        header("location: index.php?advertentie=getsubcategoriefail");
        exit;  
      }
    }else{
      header("location: index.php?advertentie=getcategoriefail");
      exit;  
    };
  }else{
    header("location: index.php?advertentie=sqlfailure");
    exit;  
  }
}else{
  header("location: index.php?advertentie=noid");
  exit;
}

require_once('includes/mainopen.php');
require_once('includes/navbar.php');

$titel = filter_var($titel,FILTER_SANITIZE_STRING);
$prijs = filter_var($prijs,FILTER_SANITIZE_STRING);
$beschrijving = filter_var($beschrijving,FILTER_SANITIZE_STRING);
echo "
<div class=\"advertentie\">
  <div class=\"titel\">$titel<br/><p>$hoofdcategorieNaam - $subcategorieNaam</p></div>
  <div class=\"afbeelding\">
    <img class=\"main\" src=\"$image1path\"/>
  </div>
  <div class=\"informatie\">
    <div class=\"beschrijving\"><h6>Prijs: €$prijs,-</h6><br/><p>$beschrijving</p></div>
  </div>
</div>";
echo "<div class=\"contact-info\"><h6>$gebruikersNaam</h6><p class=\"email\">$contactEmail</p><p class=\"telefoonNr\">$telefoonNr</p></div>"
?>


<?php
require_once('includes/mainend.php');