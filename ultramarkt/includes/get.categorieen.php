<?php
$stmt = $con->prepare("SELECT * FROM categorieen ORDER BY naam ASC");
$stmt->execute();
$stmt->bind_result($categorieID,$naam);
$categorieArray = array();
while($stmt->fetch()){
  array_push($categorieArray,array('categorieID' => $categorieID,'naam'=>$naam));
}