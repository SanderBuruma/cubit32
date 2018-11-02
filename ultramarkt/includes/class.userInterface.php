<?php

class UserInterface{

  static function getUserID($con,$sessionID){
    $stmt = $con->prepare("SELECT userID FROM users WHERE sessionID = ?");
    $stmt->bind_param("s",$sessionID);
    $stmt->execute();
    $stmt->bind_result($userID);
    $stmt->fetch();
    $con->close();
    return $userID;
  }

}