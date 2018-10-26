<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>1Sec Prime Calculator</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <!-- <table>
    <tr>
    <th>ID</th>
    <th>Prime</th>
    <th>Gap</th>
    </tr> -->
    <?php

    #turn on error reporting
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    #initial primes array
    $primesArr = array(2,3,5);

    #function that checks whether a number is prime
    function findPrime($nr){
      global $primesArr;
      $sqsrtnr = sqrt($nr);
      $iterate = 1;
      while ($primesArr[$iterate] <= $sqsrtnr){
        if($nr%$primesArr[$iterate] == 0){
          return null;
        }
        $iterate++;
      }
      $primesArr [] = $nr;
    }

    $currNr = 7;
    $startDate = intval(date("Gisv"));
    while(intval(date("Gisv"))-$startDate < 1e4){
      findPrime($currNr);
      findPrime($currNr+4);
      $currNr+=6;
    }
    // for ($i=7 ; $i<1e6 ; $i+=6){
    //   findPrime($i);
    //   findPrime($i+4);
    // }
    echo'<pre>';
    print_r($primesArr);
    echo '</pre>'
    // foreach($primesArr as $j => $i){
    //   echo '<tr>';
    //   echo "<td>".$j.'</td><td>'.$i.'</td><td>'.($i-$prevPrime).'</td>';
    //   echo '</tr>';
    //   $prevPrime = $i;
    // }
    ?>
  <!-- </table> -->
</body>
</html>