<?php
session_start();
$_SESSION['username'] = '';
$_SESSION['sessionID'] = '';
header("Location: ./index.php?logout=success");