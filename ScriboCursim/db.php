<?php
include("../passwords.php");
$dbServerName = "localhost";
$dbUserName = "omni";
$dbPassword = $PHPMAPasswords->omni;
$dbName = "scribo_cursim";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL."<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL ."<br>";
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL."<br>";
    die('Could not connect: ' . mysqli_error($con));
}