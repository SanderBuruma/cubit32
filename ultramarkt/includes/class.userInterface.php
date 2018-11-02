<?php

class UserInterface{

  protected static $con;
  static function init() {
    global $PHPMARootPassword;
    self::$con = new mysqli('localhost', 'root', "$PHPMARootPassword") or die(product::$con->connect_error);
    self::$con->select_db('ultramarkt') or die('database niet geselecteerd');
  }

  static function getUserID($con,$sessionID){
    $stmt = self::$con->prepare("SELECT userID FROM users WHERE sessionID = ?");
    $stmt->bind_param("s",$sessionID);
    $stmt->execute();
    $stmt->bind_result($userID);
    $stmt->fetch();
    return $userID;
  }

  static function deleteAdvertentie($advertentieID,$sessionID){
    $userID = self::getUserID(self::$con,$sessionID);
    $stmt = self::$con->prepare("DELETE FROM advertentie WHERE advertentieID = ? AND userID = ?");
    $stmt->bind_param("ii",$advertentieID,$userID);
    $stmt->execute();
  }

}
UserInterface::init();