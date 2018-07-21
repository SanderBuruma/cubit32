
<!DOCTYPE html><!-- mostly copy pasted from w3schools.com -->
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$con = mysqli_connect('localhost','root','w34#9^lgBJKV','scribo_cursim');
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL."<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL ."<br>";
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL."<br>";
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"if you're reading this then the precise content of this line is not important at all");
$sql="SELECT id FROM texts";
$result = mysqli_query($con,$sql);
$idarray = array();
while($row = mysqli_fetch_array($result)) {
    array_push($idarray, $row['id']);
}
print_r($idarray).'<br>';
print_r($result).'<br>';
$sql="SELECT * FROM texts where id = ".($idarray[array_rand($idarray)]);
$result = mysqli_query($con,$sql);
print_r($result).'<br>';
while($row = mysqli_fetch_array($result)) {
    echo $row['id'].'<br>';
    echo $row['author'].'<br>';
    echo $row['book'].'<br>';
    echo $row['text'].'<br>';
}
mysqli_close($con);
?>
</body>
</html> 