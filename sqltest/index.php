<html>
<!-- author: Sander Buruma // sanderburuma@gmail.com-->
<!-- mostly copy pasted from w3schools -->
<head>
    <title>sql request test page</title>
</head>
<script>
let testvar = '';

if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    console.log('not IE 5 or 6')
} else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    console.log('IE 5 or 6')
}
console.log(xmlhttp)
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
    document.getElementById("deposit").innerHTML = this.responseText;
    testvar = this.responseText;
    console.log(testvar.split('%SPLIT%'));
    }
}

function showText(str) {
    xmlhttp.open("GET","getalltexts.php");
    xmlhttp.send();
}
</script>
<body>
<div id="txtHint"><a href="javascript:;" onclick="showText()">Test "button"</a></div>
<div id="deposit">text here</div>
</body>
</html>