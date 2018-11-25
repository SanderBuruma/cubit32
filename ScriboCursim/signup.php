<?php

if (isset($_POST['submit'])){

	include_once('../passwords.php');
	$conn = mysqli_connect('localhost','omni',$PHPMAPasswords->omni,'scribo_cursim');

	$first = mysqli_real_escape_string($conn, $_POST['fname']);
	$last = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uname']);
	$pwd = mysqli_real_escape_string($conn, $_POST['psw']);

	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
		header("Location: ./index.php?signup=emptyfield");
		exit();
	} else {
		if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last) || !preg_match("/^[a-zA-Z\d]*$/",$uid)){
			header("Location: ./index.php?signup=invalidname");
			exit();
		} else {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo $first.' '.$last.' '.$email.' '.$uid.' '.$pwd;
				header("Location: ./index.php?signup=invalidemail");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_uid = '$uid'";
				$result = mysqli_query($conn,$sql);
				$resultcheck = mysqli_num_rows ($result);
				if ($resultcheck > 0){
					header("Location: ./index.php?signup=usernametaken");
					exit();
				} else {
					//hasing the password
					$hashed_pwd = password_hash($pwd,PASSWORD_DEFAULT);
					//insert the user into the database
					$sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('$first','$last','$email','$uid','$hashed_pwd');";
					$result = mysqli_query($conn, $sql);
					header("Location: ./index.php?signup=signupsuccess");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ./index.php?signup=nosubmit");
	exit();
}