
<!DOCTYPE html><!-- mostly copy pasted from w3schools.com -->
<html>
<body>

<?php
$con = mysqli_connect('localhost','readonly','password','scribo_cursim');
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL."<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL ."<br>";
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL."<br>";
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"the precise content of this line should not be important at all");
$sql="SELECT id FROM texts";
$result = mysqli_query($con,$sql);
$idarray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($idarray, $row['id']);
}
// print_r($idarray).'<br>';
// print_r($result).'<br>';
$sql="SELECT * FROM texts where id = ".($idarray[array_rand($idarray)]);
$result = mysqli_query($con,$sql);
// print_r($result).'<br>';
while($row = mysqli_fetch_array($result)) {
    echo '%SPLIT%'.$row['id'].'%SPLIT%';
    echo $row['author'].'%SPLIT%';
    echo $row['book'].'%SPLIT%';
    echo $row['text'].'%SPLIT%';
}
mysqli_close($con);
?>
</body>
</html> 