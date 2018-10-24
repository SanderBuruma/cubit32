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
$sql = "SELECT * FROM `subcategorieen`";
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
  <input  type="textarea" name="beschrijving" value="" placeholder="beschrijving"><br/>
  <input  type="number"   name="prijs"        placeholder="prijs"><br/>
  <input  type="file"     name="image1"       accept="image/*">
  <button type="submit"   name='submit'>Plaats!</button>
</form>

<?php 
require('component/mainend.php');