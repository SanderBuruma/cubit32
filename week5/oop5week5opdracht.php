<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

interface CRUD{
  public function create();
  public function update();
  public function delete();
  public static function read($id);
}

class Entity{
  protected static $conn;
  protected static $id;

  static function init() {
    include_once('../passwords.php');
    self::$conn = new mysqli('localhost', 'omni', $PHPMAPasswords->omni) or die(product::$conn->connect_error);
    self::$conn->select_db('gorilla') or die('database niet geselecteerd');
  }
}

class Product extends Entity implements CRUD{

  public $name;
  protected $description;


  function __construct($name, $description, $id=-1) {
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
  }

  function get_id() {
      return $this->id;
  }

  function create() {
    $query = "SELECT id FROM product WHERE id = $this->id";
    $result = self::$conn->query($query);
    if ($result->num_rows == 0){
      $stmt = self::$conn->prepare('insert into product (name, description) values (?, ?)');
      $stmt->bind_param("ss", $this->name, $this->description);
      $stmt->execute();
      $this->id = $stmt->insert_id;
      return $stmt;
    }else{
      print_r('create() failure, already created;');
    }
  }

  static function read($id) {
    $result = self::$conn->query("select * from product where id=$id") or die(self::$conn->error);
    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return new Product($row['name'], $row['description'], $row['id']);
    } else {
      return null;
    }
  }

  function update() {
    if ($this->id == -1){
      print_r('update() error, not created yet;<br/>');
    }else{
      $stmt = self::$conn->prepare('update product set name=?, description=? where id=?');
      $stmt->bind_param("sssi", $this->name, $this->description, $this->id);
      $stmt->execute();
      return $stmt;
    }
  }

  function delete() {
    if ($this->id == -1){
      print_r('delete error, not created yet;<br/>');
    }else{
      return self::$conn->query("delete from product where id=$this->id") or die(self::$conn->error);
    }
  }
}

class Person extends Entity implements CRUD{

    public $name;
    protected $birthday;
    private $phone;


    function __construct($name, $birthday, $phone, $id=-1) {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->phone = $phone;
    }

    function get_id() {
        return $this->id;
    }

    function create() {
      $query = "SELECT id FROM person WHERE id = $this->id";
      $result = self::$conn->query($query);
      if ($result->num_rows == 0){
        $stmt = self::$conn->prepare('insert into person (name, birthday, phone) values (?, ?, ?)');
        $stmt->bind_param("sss", $this->name, $this->birthday, $this->phone);
        $stmt->execute();
        $this->id = $stmt->insert_id;
        return $stmt;
      }else{
        print_r('create() failure, already created;');
      }
    }

    static function read($id) {
        $result = self::$conn->query("select * from person where id=$id") or die(self::$conn->error);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Person($row['name'], $row['birthday'], $row['phone'], $row['id']);
        } else {
            return null;
        }
    }

    function update() {
      if ($this->id == -1){
        print_r('update() error, not created yet;<br/>');
      }else{
        $stmt = self::$conn->prepare('update person set name=?, birthday=?, phone=? where id=?');
        $stmt->bind_param("sssi", $this->name, $this->birthday, $this->phone, $this->id);
        $stmt->execute();
        return $stmt;
      }
    }

    function delete() {
      if ($this->id == -1){
        print_r('delete error, not created yet;<br/>');
      }else{
        return self::$conn->query("delete from person where id=$this->id") or die(self::$conn->error);
      }
    }
}


Person::init();

echo "<h1>CRUD</h1>Demontratie of Create, Read, Update, Delete";

echo '<h2>Construct</h2>';
$jan = new Person("Jan", "1990-12-20", "0612345678");
print_r($jan);

echo '<h2>Create</h2>';
$jan->delete();
$jan->update();
$jan->create();
print_r($jan);
print_r('<br/>');
$jan->create();

echo '<h2>Select</h2>';
print_r(Person::read($jan->get_id()));

echo '<h2>Update</h2>';
$jan->name = 'Janet';
$jan->update();
print_r($jan);

echo '<h2>Delete</h2>';
$previous = Person::read($jan->get_id()-1);
if($previous) {
    print_r($previous);
    echo "<p>";
    print_r($previous->delete());
} else {
    echo "Nothing to delete";
}

/*
Opdrachten:
-/ Zorg dat een object maar één keer "create" kan aanroepen en voorkom update/delete als een object nog niet in de database staat.
-/ Maak en gebruik een interface "CRUD" met de methode "create/read/update/delete".
-/ Maak een superclass "Entity" voor Person met velden conn/id en method "init".
-/ Voeg een class "Product" met velden  "name/description" toe, inclusief CRUD methods.

-/ = compleet
 */