<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
    Scribo Cursim (Fast Writing)
Author: Sander "Cubit32" Buruma
based on typeracer.com
-->
<html>
<head>
<title>Scribo Cursim!</title>
<link rel="stylesheet" href="./main.css">
<link rel="icon" href="http://icons.iconarchive.com/icons/fatcow/farm-fresh/16/keyboard-icon.png"> 
<nav class="unselectable">
	<a href="./index.php">Scribo Cursim</a><a href="../index.php">Blog</a><a href="./test.php">Test</a><a>Competition</a>
</nav>
<body>
	<div			id="main-menu"		class="main-menu unselectable">
		<span><a id="main-menu-practice" href="javascript:;">>Practice<</a><br>Improve your typing skills!</span>
	</div>
	<div        	id="scribo-box" 	class="scribo-box" hidden="true" >
		<span   	id="wpm-counter" 	class="wpm-counter unselectable">0 wpm</span><br><!--
		--><span   	id="text-was-typed" class="text-was-typed unselectable">loading text</span><!--
		--><span   	id="text-wrong" 	class="text-wrong unselectable"> please hold on... </span><!--
		--><span   	id="text-next-char"	class="text-next-char unselectable"> holding... </span><!--
		--><span   	id="text-to-type" 	class="text-to-type unselectable">don't go anywhere!</span>
		<input  	id="text-input" 	class="text-input" autocorrect="off" autocapitalize="off" type="text" />
	</div>
<script src="./javascript.js"></script>
</body>
</html>