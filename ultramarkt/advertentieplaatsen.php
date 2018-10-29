<?php
require('includes/main.php');
if (!isset($_SESSION['sessionID'])){
  header("Location: ./index.php?session=expired");
}
require('includes/navbar.php');
$sessionID = $_SESSION['sessionID'];

if (isset($_POST['submit'])){
  // check file
  $imageFileType = $_FILES['image1']['type'];
  if ($_FILES["image1"]["size"] > 2.08e5){
    $_SESSION["warning"] = "file too big, <200kb required";
  }elseif($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg" && $imageFileType != "image/gif"){
    $_SESSION["warning"] = "only JPG, JPEG, PNG & GIF files are allowed.";
  }else{

    //move file to corect folder and with a unique (numerical) name based on the current date and a random string of numbers designed to prevent matching file names which can not be predicted by the dishonorable user
    $targetFolder = "productafbeeldingen/";
    $extension = ".".explode(".",$_FILES['image1']['name'])[1];
    $image1path = $targetFolder.date("ymdGis").explode(".",(microtime(true)))[1].random_int(1e8,1e9-1).$extension;
    if (move_uploaded_file($_FILES["image1"]["tmp_name"], $image1path)) {
      //success
      $_SESSION['success'] = "file uploaded";
    }else{
      //failure
      $_SESSION['warning'] = "image1 failed to upload";
    }

    //get userID
    $stmt = $con->prepare("SELECT userID FROM users WHERE sessionID = ?");
    $stmt->bind_param("s",$sessionID);
    $stmt->execute();
    $res = $stmt->get_result();
    $result = $res->fetch_all()[0];
    $userID = $result[0];

    $categorieID = filter_var($_POST['categorie'],FILTER_VALIDATE_INT); 
    $subcategorieID = filter_var($_POST['subcategorie'],FILTER_VALIDATE_INT); 
    $prijs = filter_var($_POST['prijs'],FILTER_VALIDATE_FLOAT); 
    $beschrijving = filter_var($_POST['beschrijving'],FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $titel = filter_var($_POST['titel'],FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

    $datumplaatsing = date("y-m-d");
    $tijdplaatsing = date("G:i:s");

    $stmt = $con->prepare("INSERT INTO advertentie (categorieID, subcategorieID, userID, prijs, beschrijving, datumplaatsing, tijdplaatsing, titel, image1) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iiidsssss",$categorieID,$subcategorieID,$userID,$prijs,$beschrijving,$datumplaatsing,$tijdplaatsing,$titel,$image1path);
    $stmt->execute();
  }
}

//get categorieen
$sql = "SELECT * FROM categorieen";
$result = mysqli_query($con,$sql);
$categorieArray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($categorieArray,$row);
}

//get subcategorieen
$sql = "SELECT * FROM subcategorieen ORDER BY naam ASC";
$result = mysqli_query($con,$sql);
$subcategorieArray = array();
while($row = mysqli_fetch_array($result)) {
  array_push($subcategorieArray,$row);
}

?>

<form id="advertentie-formulier" action="advertentieplaatsen.php" method="POST" enctype="multipart/form-data">
  <h3>Plaats Advertentie</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input  type="text" name="titel" pattern="[A-Za-z0-9 \-\_]{6,}" oninvalid="setCustomValidity('minstens 6 tekens en alleen letters & nummers')" placeholder="Titel"><br/>
  <textarea  type="textarea" name="beschrijving" value="" placeholder="beschrijving"></textarea><br/>
  <div>€ <input  type="number" name="prijs" pattern="\d*?,\d{1,2}" oninvalid="setCustomValidity('minstens 6 tekens en alleen letters & nummers')"placeholder="0,00" id="advertentie-prijs"></div><br/>
  <input  type="file" name="image1" accept="image/*" id="file1-upload">
  <select id="select-categorie" name="categorie">
    <option value="0">Selecteer een categorie</option>
  <?php
    foreach ($categorieArray as $key => $value){
      $catID = $value['categorieID'];
      $catNaam = $value['naam'];
      echo "<option value=\"$catID\">$catNaam</option>";
    }
  ?>
  </select>
  <select id="select-sub-categorie" name="subcategorie">
    <option value="0" data-catid="0">Selecteer eerst een categorie</option>
  <?php
    foreach ($subcategorieArray as $key => $value){
      $subCatID = $value['subcategorieID'];
      $catID = $value['categorieID'];
      $subCatNaam = $value['naam'];
      echo "<option value='$subCatID' data-catid='$catID' display='none'>$subCatNaam</option>";
    }
  ?>
  </select>
  <button type="submit"   name='submit'>Plaats!</button>
</form>
<script src="./includes/advertentieplaatsen.js"></script>

<?php
require('includes/mainend.php');