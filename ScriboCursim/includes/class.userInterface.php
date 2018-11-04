<?php

class UserInterface{

	protected static $con;
	static function init() {
		global $PHPMARootPassword;
		self::$con = new mysqli('localhost', 'root', "$PHPMARootPassword") or die(product::$con->connect_error);
		self::$con->select_db('scribo_cursim') or die('database niet geselecteerd');
	}

	static function fetchCategoryName($categoryID){
		self::init();
		$stmt = self::$con->prepare('SELECT `name` FROM category WHERE categoryID = ?');
		$stmt->bind_param('i',$categoryID);
		$stmt->execute();
		$stmt->bind_result($categoryName);
		$stmt->fetch();
		return $categoryName;
	}

	static function fetchSubcategoryInfo($subcategoryID){
		self::init();
		$stmt = self::$con->prepare('SELECT `name`,`categoryID` FROM subcategory WHERE subcategoryID = ?');
		$stmt->bind_param('i',$subcategoryID);
		$stmt->execute();
		$stmt->bind_result($subcategoryName,$categoryID);
		$stmt->fetch();
		$categoryName = self::fetchCategoryName($categoryID);
		return array($categoryName,$subcategoryName);
	}

	static function randomText($categoryID){

		self::init();
		if ($categoryID == 'random'){
			$stmt = self::$con->prepare('SELECT id FROM texts');
		}else{
			//2 queries here work all the same
			//SELECT T.id FROM texts T JOIN subcategory S ON S.subcategoryID = T.subcategoryID WHERE S.categoryID = ?
			//SELECT id FROM texts WHERE texts.subcategoryID IN (SELECT subcategoryID FROM subcategory WHERE categoryID = ?)
			$stmt = self::$con->prepare('SELECT T.id FROM texts T JOIN subcategory S ON S.subcategoryID = T.subcategoryID WHERE S.categoryID = ?');
			$stmt->bind_param('i',$categoryID);
		}
		$arr = [];
		$stmt->execute();
		$stmt->bind_result($id);
		while($stmt->fetch()){
			$arr[] = $id;
		}

		$randId = $arr[array_rand($arr)];
		$stmt = self::$con->prepare('SELECT `text`,subcategoryID FROM texts WHERE id = ?');
		$stmt->bind_param('i',$randId);
		$stmt->execute();
		$stmt->bind_result($textText,$subcategoryID);
		$stmt->fetch();
		$returnArr = self::fetchSubcategoryInfo($subcategoryID);
		$returnArr[] = $textText; $returnArr[] = $randId;
		return $returnArr;
	}

	static function categoryInfo(){
		self::init();
		$stmt = self::$con->prepare('SELECT `categoryID`,`name` FROM category');
		$stmt->execute();
		$stmt->bind_result($id,$name);
		$arr = [];
		while($stmt->fetch()){
			$arr[] = array('categoryID'=>$id,'name'=>$name);
		}
		return $arr;
	}

}