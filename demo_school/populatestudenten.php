<?php

require('informationarrays.php');

//populate table
$conn = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_school');
for ($i=0 ; $i<=1e3 ; $i++){
  if (random_int(0,1) == 1){
    //jongen
    $voornaam = $fNamesMaleArr[array_rand($fNamesMaleArr)];
    $geslacht = 'm';
  }else{
    //meid
    $voornaam = $fNamesFemaleArr[array_rand($fNamesFemaleArr)];
    $geslacht = 'v';
  }
  $achternaam = $achterNamen[array_rand($achterNamen)];
  $klasID = floor(i/25)+1;
  $sql = "SELECT schooljaar FROM `klassen` WHERE klasID = $klasID";
  $schooljaar = mysqli_query($conn,$sql);
  $leeftijd = $schooljaar + random_int(12,14);
  $sql = "INSERT INTO `studenten` (`studentID`, `voornaam`, `achternaam`, `leeftijd`, `geslacht`, `notities`, `klasID`) VALUES (NULL, '$voornaam', '$achternaam', '$leeftijd', '$geslacht', '', '$klasID')";
  $result = mysqli_query($conn,$sql);
}

mysqli_close($conn);