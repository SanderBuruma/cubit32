
<!DOCTYPE html><!-- mostly copy pasted from w3schools.com -->
<html>
<body>

<?php
require('../../hidden/con_readonly.php');
mysqli_select_db($con,"the precise content of this line should not be important at all");
$sql="SELECT id FROM texts";
$result = mysqli_query($con,$sql);
$idarray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($idarray, $row['id']);
}
$sql="SELECT * FROM texts where id = ".($idarray[array_rand($idarray)]);
$result = mysqli_query($con,$sql);
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