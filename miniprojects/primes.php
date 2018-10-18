<?php

#turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);

#initial primes array
$primesArr = array(2);

#function that checks whether something is prime
function findPrime($nr){
  global $primesArr;
  $iterate = 0;
  while ($primesArr[$iterate] <= sqrt($nr)){
    if($nr%$primesArr[$iterate] == 0){
      return null;
    }
    $iterate++;
  }
  $primesArr [] = $nr;
}

for ($i=3 ; $i<1e7 ; $i+=2){
  findPrime($i);
}
print_r("<p>");
print_r($primesArr);
print_r("</p>");
?>