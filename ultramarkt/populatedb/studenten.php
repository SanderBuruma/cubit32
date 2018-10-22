<?php

require('zzzinformationarrays.php');
require('../component/con_db.php');

//populate table
$con = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_school');
for ($i=0 ; $i<(41*4) ; $i++){
  if (random_int(0,1)){
    //jongen
    $voornaam = $fNamesMaleArr[array_rand($fNamesMaleArr)];
    $geslacht = 'm';
  }else{
    //meid
    $voornaam = $fNamesFemaleArr[array_rand($fNamesFemaleArr)];
    $geslacht = 'v';
  }
  $achternaam = $achterNamen[array_rand($achterNamen)];
  $klasID = ($i%41+1);

  $sql = "SELECT schooljaar FROM `klassen` WHERE klasID = $klasID";
  $result = mysqli_query($con,$sql);
  $idarray = array();
  while($row = mysqli_fetch_array($result)) {
      array_push($idarray, $row['schooljaar']);
  }
  $schooljaar = $idarray[0];

  $leeftijd = $schooljaar + random_int(12,14);
  $sql = "INSERT INTO `studenten` (`studentID`, `voornaam`, `achternaam`, `leeftijd`, `geslacht`, `notities`, `klasID`) VALUES (NULL, '$voornaam', '$achternaam', '$leeftijd', '$geslacht', '', '$klasID')";
  $temp = escapeshellcmd($sql);
  
  $result = mysqli_query($con,$sql);
}

mysqli_close($con);