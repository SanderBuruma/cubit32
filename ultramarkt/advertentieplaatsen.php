<?php
require('component/main.php');
require('component/navbar.php');
require('component/con_db.php');
$sessionID = $_SESSION['sessionID'];

//grab categorieen
$sql = "SELECT * FROM `categorieen`";
$result = mysqli_query($con,$sql);
$categorieArray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($categorieArray,$row);
}

//grab subcategorieen
$sql = "SELECT * FROM `subcategorieen` ORDER BY `naam` ASC";
$result = mysqli_query($con,$sql);
$subcategorieArray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($subcategorieArray,$row);
}

if (isset($_POST['submit'])){

}

?>

<form id="advertentie-formulier" action="inloggen.php" method="POST">
  <h3>Plaats Advertentie</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input  type="text"     name="title"        placeholder="Titel"><br/>
  <textarea  type="textarea" name="beschrijving" value="" placeholder="beschrijving"></textarea><br/>
  <div>€ <input  type="number"   name="prijs"        placeholder="0,00" id="advertentie-prijs"></div><br/>
  <input  type="file"     name="image1"       accept="image/*">
  <select id="select-categorie">
    <option value="0">Selecteer een categorie...</option>
  <?php 
    foreach ($categorieArray as $key => $value){
      $catID = $value['categorieID'];
      $catNaam = $value['naam'];
      echo "<option value=\"$catID\">$catNaam</option>";
    }
  ?>
  </select>
  <select id="select-sub-categorie">
    <option value="0" data-catid="0">Selecteer een subcategorie</option>
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
<script src="./main.js"></script>

<?php 
require('component/mainend.php');