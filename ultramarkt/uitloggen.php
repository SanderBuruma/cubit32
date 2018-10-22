<?php
$_SESSION['username'] = NULL;
$_SESSION['sessionID'] = NULL;
header("Location: ./index.php?logout");