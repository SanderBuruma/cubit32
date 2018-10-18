<?php
session_start();
require('component/main.php');
$_SESSION['page'] = "studenten";
require('component/navbar.php');
require('component/mainend.php');