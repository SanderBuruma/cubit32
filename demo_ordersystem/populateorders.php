<?php
//populate table
$con = mysqli_connect('localhost','root','w34#9^lgBJKV','demo_ordersystem');

$sql="SELECT customerID FROM customers";
$result = mysqli_query($con,$sql);
$idarray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($idarray, $row['customerID']);
}

for ($i=0 ; $i<=1e4 ; $i++){
  $orderdate=date_create(random_int(2012,2018)."-".random_int(1,12)."-".random_int(1,30));
  echo date_format($date,"Y/m/d");
  $sql = "INSERT INTO `orders` (`orderdate`, `status`, `comments`, `customerID`, `shippedDate`, `requiredDate`) VALUES ('2018-10-19', 'received', '', '2299', '2018-10-20', '2018-12-20')";
}

mysqli_close($con);