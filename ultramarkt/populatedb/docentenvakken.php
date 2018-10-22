<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

//populate table
require('../component/con_db.php');

//form vakIDArray
$sql="SELECT vakID FROM vakken";
$result = mysqli_query($con,$sql);
$vakIDArray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($vakIDArray, $row['vakID']);
}
print_r('<p>');
print_r($vakIDArray);
print_r('</p>');

//form docentIDArray
$sql="SELECT docentID FROM docenten";
$result = mysqli_query($con,$sql);
$docentIDArray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($docentIDArray, $row['docentID']);
}
print_r('<p>');
print_r($docentIDArray);
print_r('</p>');

foreach ($docentIDArray as $i){
  print_r('<p>');
  print_r($i);
  print_r(' ');
  $vakID = $vakIDArray[random_int(0,12)];
  print_r($vakID);
  print_r('</p>');
  $docentID = $i;
  $sql = "INSERT INTO `docentenvakken` (`docentenvakkenID`, `vakID`, `docentID`) VALUES (NULL, '$vakID', '$docentID')";
  $temp = escapeshellcmd($sql);
  $result = mysqli_query($con,$sql); 
}

mysqli_close($con);