<?php

require('zzzinformationarrays.php');
require('../includes/con_db.php');
//populate table


for ($i=0 ; $i<1e1 ; $i++){

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
  $email = $voornaam.$achternaam.'@GMail.com';
  $adres = $stratenArray[array_rand($stratenArray)].' '.random_int(1,150);
  if (random_int(0,9)){
    $stad = 'Groningen';
  }else{
    $stad = 'Haren';
  }

  $leeftijd = random_int(21,65);
  $sql = "INSERT INTO `docenten` (`docentID`, `voornaam`, `achternaam`, `leeftijd`, `adres`, `stad`, `email`, `geslacht`) VALUES (NULL, '$voornaam', '$achternaam', '$leeftijd', '$adres', '$stad', '$email', '$geslacht')";
  $temp = escapeshellcmd($sql);
  
  $result = mysqli_query($con,$sql);
}

mysqli_close($con);