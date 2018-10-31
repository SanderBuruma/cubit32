<?php

class User{

  public $username;
  protected $userID;
  protected $password;
  public $sessionID;

  function __constructor(){
    $this->username = $username;
    $this->userID = $userID;
    $this->password = $password;
    $this->sessionID = $sessionID;
  }
}