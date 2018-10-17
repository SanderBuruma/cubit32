<?php

require('informationarrays.php');

//populate table
$conn = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_school');
for ($i=0 ; $i<=40 ; $i++){
  $niveauID = random_int(1,4);
  $sql = "INSERT INTO `klassen` (`klasID`, `niveauID`) VALUES (NULL, '$niveauID')";
  $result = mysqli_query($conn,$sql);
}

mysqli_close($conn);