<?php

//error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once('../passwords.php');
$PHPMARootPassword = $PHPMAPasswords['omni'];
require('includes/class.userInterface.php');

echo implode("%SPLIT%",userInterface::randomText($_GET['category']));
?>