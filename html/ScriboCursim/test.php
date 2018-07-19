<?php
echo 'hello world<br>';

foreach (file("database.txt") as $for){
    echo $for."<br>";
}
echo fgets($myfile);
fclose($myfile);

?>