<?php

require('zzzinformationarrays.php');
require('../component/con_db.php');

//populate table
for ($i=0 ; $i<=40 ; $i++){
  $niveauID = random_int(1,4);
  $sql = "INSERT INTO `klassen` (`klasID`, `niveauID`) VALUES (NULL, '$niveauID')";
  $result = mysqli_query($conn,$sql);
}

mysqli_close($con);