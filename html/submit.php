<?php
	if (isset($_POST['submit'])){
		$name = $_POST['name'];
		$emailFrom = $_POST['email'];
		$comment = $_POST['comment'];

		$mailTo = "cubit32@gmail.com";
		$headers = "From: ".$emailFrom;
		$txt = "You have received an email from: ".$name.".\n\n".$comment;

		mail($mailTo,$txt,$headers);
		header("Location: index.php?mailsend");
	}
?>