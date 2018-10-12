<?php
session_start();
?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
    Scribo Cursim (Fast Writing)
Author: Sander "Cubit32" Buruma
SanderBuruma@gmail.com
Cubit32@gmail.com
loosely based on typeracer.com
-->
<html>
<head>
<title>Scribo Cursim!</title>
<link rel="stylesheet" href="./main.css">
<link rel="icon" href="http://icons.iconarchive.com/icons/fatcow/farm-fresh/16/keyboard-icon.png"> 
<body>
<!-- login, signup and logout buttons -->
	<div class="user-interface">
	<?php
		if (isset($_SESSION['u_id']) == false){ echo '
			<button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Sign Up</button>
			<!-- login form -->
			<form class="login" action="./login.php" method="POST">
				<input type="text" name="userid" placeholder="username"/>
				<input type="password" name="password" placeholder="password"/>
				<button type="submit" name="submit">Log In</button>
			</form>
			';} else {echo '
		<form action="logout.php" class="logout">
			<button type="submit" name="submit">Log Out ('.$_SESSION['u_id'].')'.' </button>
		</form>';}
		?>
	</div>

	<!-- massive gargantuan registration form -->
	<div id="id01" class="modal">
		
		<form class="modal-content animate" action="./signup.php" method="POST">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="avatar.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<input type="text" placeholder="Enter Username" name="uname" required>
				<input type="text" placeholder="Enter First Name" name="fname" required>
				<input type="text" placeholder="Enter Last Name" name="lname" required>
				<input type="text" placeholder="Enter email" name="email" required>
				<input type="password" placeholder="Enter Password" name="psw" required>
					
				<button type="submit" name='submit'>Sign Up</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
	</div>
<!-- massive gargantuan registration screen -->

	<div class="wrapper">
		<div			id="main-menu"		class="main-menu unselectable">
			<span><a id="main-menu-practice" href="javascript:;">>Practice<</a><br>Improve your typing skills!</span>
		</div>
		<div        	id="scribo-box" 	class="scribo-box" hidden="true" >
			<span   	id="wpm-counter" 	class="wpm-counter unselectable">Waiting for you to type!</span><br>
			<span   	id="text-was-typed" class="text-was-typed unselectable">loading text</span><!--
			--><span   	id="text-wrong" 	class="text-wrong unselectable"> please hold on... </span><!--
			--><span   	id="text-next-char"	class="text-next-char unselectable"> holding... </span><!--
			--><span   	id="text-to-type" 	class="text-to-type unselectable"><?php echo $text;?></span>
			<input  	id="text-input" 	class="text-input" autocorrect="off" autocapitalize="off" type="text" />
		</div>
		<div class="race-info-box" id="race-info-box"><table><tbody>
		<tr><td >Source: </td><td id="race-info-source">none</td></tr>
		<tr><td >Book: </td><td id="race-info-book">none</td></tr>
		<tr><td >WPM: </td><td id="race-info-wpm">0</td></tr>
		<tr><td >Time: </td><td id="race-info-time">0m 0s</td></tr>
		</tbody></table></div>
	</div>
<script src="./javascript.js"></script>
<script>
	// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>
</body>
</html>