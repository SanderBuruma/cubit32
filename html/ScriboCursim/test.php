<?php
echo 'hello world<br>';

foreach (file("database.txt") as $for){
    echo $for."<br>";
}

$txtdbs = file("database.txt");//text database
$text = $txtdbs[mt_rand(count($txtdbs))];
echo $txtdbs[(rand(0,count($txtdbs)-1))];

?>