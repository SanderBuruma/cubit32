<?php
session_start();
require('component/main.php');
$_SESSION['page'] = "docenten";
require('component/navbar.php');
require('component/mainend.php');