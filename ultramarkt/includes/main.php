<?php
session_start();
if (!isset($_SESSION['success'])){
  $_SESSION['success'] = '';
}
if (!isset($_SESSION['warning'])){
  $_SESSION['warning'] = '';
}

//error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//everyting else
require_once('../../hidden/passwords.php');
$PHPMARootPassword = $PHPMAPasswords['root'];
//iniate connection to db
require_once('includes/con_db_ultramarkt.php');
require_once('includes/class.userInterface.php');
//grab special svg font characters 
require_once("svg.php");

//initiate reference arrays
$alphaNumericChars = str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJVKLMNOPQRSTUVWXYZ1234567890");