<?php

//arrays with information with which to randomly populate database
$fNamesArr = ['Noah','William','James','Logan','Benjamin','Mason','Elijah','Oliver','Jacob','Lucas','Michael','Alexander','Mathew','Emma','Mary','Olivia','Ava','Isabella','Sophia','Mia','Charlotte','Amelia','Evelyn','Abigail','Harper','Emily','Elizabeth','Avery','Ethan','Alexander','Daniel','Sofia','Ella','Madison','Aiden','Henry','Jospeh','Victorio','Aria','Jackson','Samuel','Sebastian','David','Camilia','Chloe','John'];
$lNamesArr = ['Jones','Brown','Johnson','Williams','Miller','Taylor','Wilson','Davis','White','Clark','Hall','Thomas','Thomas','Thompson','Moore','Hill','Walker','Anderson','County','Turner','Parker','Cook','Mc','Edwards','Morris','Mitchell','Bell','Ward','Watson','Morgan','Davies','Cooper','Phillips','Rogers','Gray'];
$citiesArr = ['New York','New Orleans','Missouri','Arlington','Philadelphia','Los Angelos','Chicago','Houston','Phoenix','San Antonio','San Diego','Dallas','San Jose','Austin','Jacksonville','Columbus','Forth Worth','Charlotte','Seattle','Denver','Boston','El Paso','Detroit','Nashville','Memphis','Portland','Las Vegas','Baltimore','Milwaukee','Albuquerque','Fresno','Washington'];
$postCodesArr = ['00000','03612','07788','11202','14021','16232','29999','35050','38900','41005','41050','48120','51950','53000','57000','61000','64500','67500','70100','73000','78000','810','81000','85000','88000','91555','94444','97111','98111','98255','98256','99911'];
$streetNamesArr = ['Third','First','Fourth','Park','Fifth','Main','Sixth','Oak','Seventh','Pine','Maple','Cedar','Eight','Elm','View','Washington','Ninth','Lake','Hill','Dogwood','Maple','Pine','Reindeer','StJoan','StJoseph','Park','Train','Truck','Keyboard','Javascript','Water','Court'];

//populate table
$conn = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_ordersystem');
for ($i=0; $i<=1e3 ; $i++){
  $fname = $fNamesArr[array_rand($fNamesArr)];
  $lname = $lNamesArr[array_rand($lNamesArr)];
  $name = $fname.' '.$lname;
  $rn32 = random_int(0,31);
  $postcode = $postCodesArr[$rn32];
  $city = $citiesArr[$rn32];
  $address = random_int(1,255).' '.$streetNamesArr[array_rand($streetNamesArr)].' Street';
  $creditlimit = random_int(1,99)*10**random_int(2,4);
  $phone = ''.random_int(9e8,(1e9-1))-9e8;
  while (strlen($phone) < 9){
    $phone = '0'.$phone;
  }
  $sql = "INSERT INTO `customers` (`name`, `fname`, `lname`, `city`, `postcode`, `address`, `creditlimit`, `phone`) VALUES ('$name', '$fname', '$lname', '$city', '$postcode', '$address', '$creditlimit', '$phone')";
  $result = mysqli_query($conn,$sql);
}

mysqli_close($conn);