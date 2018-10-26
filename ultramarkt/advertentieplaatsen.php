<?php
require('component/main.php');
if (!isset($_SESSION['sessionID'])){
  header("Location: ./index.php?session=expired");
}
require('component/navbar.php');
require('component/con_db.php');
$sessionID = $_SESSION['sessionID'];

if (isset($_POST['submit'])){
  echo '<pre>';
  print_r($_FILES);
  echo '</pre>';
  // check file
  $imageFileType = $_FILES['image1']['type'];
  if ($_FILES["image1"]["size"] > 2.08e5){
    $_SESSION["warning"] = "file too big, <200kb required";
  }elseif($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg" && $imageFileType != "image/gif"){
    $_SESSION["warning"] = "only JPG, JPEG, PNG & GIF files are allowed.";
  }else{
    
    //move file to corect folder and with a unique (numerical) name based on the current date and a random string of numbers
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
    $sql = "SELECT userID FROM users WHERE sessionID = '$sessionID'";
    $result = mysqli_query($con,$sql);
    $userIDArr = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($userIDArr,$row);
    }
    $userID = $userIDArr[0][0];

    $categorieID = $_POST['categorie']; 
    $subcategorieID = $_POST['subcategorie']; 
    $prijs = $_POST['prijs']; 
    $beschrijving = $_POST['beschrijving']; 
    $titel = $_POST['titel']; 



    //sql voorbeeld
    //INSERT INTO `advertentie` (`advertentieID`, `categorieID`, `subcategorieID`, `userID`, `prijs`, `beschrijving`, `datumplaatsing`, `tijdplaatsing`, `titel`, `image1`) VALUES (NULL, '1', '1', '15', '15', 'mooi ding ja', '2018-12-20', '07:25', 'telraam', 'productafbeeldingen/image1.jpg')
    $datumplaatsing = date("y-m-d");
    $tijdplaatsing = date("G:i:s");

    $sql = "INSERT INTO `advertentie` (`categorieID`, `subcategorieID`, `userID`, `prijs`, `beschrijving`, `datumplaatsing`, `tijdplaatsing`, `titel`, `image1`) VALUES ('$categorieID', '$subcategorieID', '$userID', '$prijs', '$beschrijving', '$datumplaatsing', '$tijdplaatsing', '$titel', '$image1path')";
    $result = mysqli_query($con,$sql);
    echo '<pre>';
    print_r($sql);
    echo '</pre>';
  }
}

//get categorieen
$sql = "SELECT * FROM `categorieen`";
$result = mysqli_query($con,$sql);
$categorieArray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($categorieArray,$row);
}

//get subcategorieen
$sql = "SELECT * FROM `subcategorieen` ORDER BY `naam` ASC";
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
<script src="./component/advertentieplaatsen.js"></script>

<?php
require('component/mainend.php');