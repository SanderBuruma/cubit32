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
    <a href="./index.php">Scribo Cursim</a><a href="../index.php">Blog</a><a>Contact</a><a>Competition</a>
</nav>
<body>
    <div        id="scribum-box"      class="scribum-box">
        <span   id="text-was-typed"   class="text-was-typed unselectable" unselectable="on"></span>
        <span   id="word-was-typed"   class="word-was-typed unselectable"></span>
        <span   id="word-correct"     class="word-correct unselectable"></span>
        <span   id="word-false"       class="word-false unselectable"></span>
        <span   id="word-next-part"   class="word-next-part"><span>
        <span   id="word-next-char"   class="word-next-char"></span>
        <span   id="text-to-read"     class="text-to-read unselectable" unselectable="on"></span>
        <input  id="text-input" autocorrect="off" autocapitalize="off" maxlength="15" type="text">
    </div>
<script src="./javascript.js"></script>
</body>
</html>