<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Prime Calculator</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <table>
    <tr>
    <th>ID</th>
    <th>Prime</th>
    <th>Gap</th>
    </tr>
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
    $prevPrime = 2;
    foreach($primesArr as $j => $i){
      echo '<tr>';
      echo "<td>".$j.'</td><td>'.$i.'</td><td>'.($i-$prevPrime).'</td>';
      echo '</tr>';
      $prevPrime = $i;
    }
    ?>
  </table>
</body>
</html>