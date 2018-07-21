<html>
<!-- author: Sander Buruma // sanderburuma@gmail.com-->
<!-- mostly copy pasted from w3schools -->
<head>
    <title>sql request test page</title>
</head>
<script>
function showText(str) {
    console.log('button pushed')
    if (str == "") {
		document.getElementById("txtHint").innerHTML = "";
		console.log('failure to read string')
        return;
    } else {
    	console.log('progressing to xmlhttp')
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
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getalltexts.php");
        xmlhttp.send();
    }
}
</script>
<body>
<div id="txtHint"><a href="javascript:;" onclick="showText()">Test "Button"</a></div>
</body>
</html>