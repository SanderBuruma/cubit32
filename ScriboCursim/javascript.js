let currentText, wpmInterval, textInformation;

document.getElementById("text-input").addEventListener("keyup",         txtInputChange);
document.getElementById("text-input").addEventListener("keydown",       txtInputChange);
document.getElementById("main-menu-practice").addEventListener("click", mainMenuPractice);
let startTypingDate = 0;
let previousLength = 0; //a cheat detection variable, if more than 1 char shows up at a time something was copy pasted

function txtInputChange(a){
    console.log(a)
    if (document.getElementById("text-input").value.length === 1){
        startTypingDate = +new Date();
        console.log(startTypingDate)
    }
    if (this.value.length-previousLength>1){this.value=''; alert('copy pasting not allowed!')} //reset the input if something gets copy pasted into it
    if (currentText.indexOf(this.value) === 0){ //input is congruent with the text
        document.getElementById("text-was-typed").innerHTML = this.value;
        document.getElementById("text-wrong").innerHTML = '';
        document.getElementById("text-next-char").innerHTML = currentText.slice(this.value.length,this.value.length+1);
        document.getElementById("text-to-type").innerHTML = currentText.slice(this.value.length+1);
        document.getElementById("text-input").classList.remove('error');
        console.log(`${this.value.length} ${currentText.length}`)
        if (this.value.length===currentText.length-1){//input equals text (ie. race complete)
            document.getElementById("scribo-box").classList.add('complete');
            document.getElementById("text-input").hidden = true;
            document.getElementById("main-menu").hidden = false;
            clearInterval(wpmInterval)
            document.getElementById('race-info-box').hidden = false;
            document.getElementById('race-info-time').innerHTML=    Math.round(((+new Date() - startTypingDate)/1e3)/60)+"m "+(Math.round((+new Date() - startTypingDate)/1e3)%60)+'s';
            document.getElementById('race-info-wpm').innerHTML=     Math.round(document.getElementById("text-input").value.length*12/((+new Date() - startTypingDate)/1e3));
        } else {//input does not equal text
            document.getElementById("scribo-box").classList.remove('complete');
        }
    } else { //input does not match text
        document.getElementById("scribo-box").classList.remove('complete');
        document.getElementById("text-next-char").innerHTML = '';
        document.getElementById("text-input").classList.add('error');
        for (let i = 0; i<currentText.length; i++){
            if (currentText.charAt(i)!==this.value.charAt(i)){//find the first character where text does not match input
                document.getElementById("text-was-typed").innerHTML = this.value.slice(0,i);
                document.getElementById("text-wrong").innerHTML = currentText.slice(i,this.value.length)
                document.getElementById("text-to-type").innerHTML = currentText.slice(this.value.length)
                break;
            }
        }
    }
    previousLength = this.value.length;
}

function wpmCounterChange(){
    document.getElementById("wpm-counter").innerHTML = Math.round(document.getElementById("text-input").value.length*12/((+new Date() - startTypingDate)/1e3)) + ' wpm';
}

function mainMenuPractice(a){//trigger when >practice< is clicked
    xmlhttp.open("GET","getrandomtext.php");
    xmlhttp.send();
    wpmInterval = setInterval(wpmCounterChange,100);
    document.getElementById('race-info-box').hidden=true;
}

if (window.XMLHttpRequest) {//update typing text
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    console.log('not IE 5 or 6')
} else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    console.log('IE 5 or 6')
}
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {//start the practice
        textInformation = this.responseText.split("%SPLIT%")
        console.log('trigger')
        currentText = textInformation[4]+' ';
        document.getElementById("main-menu").hidden = true;
        document.getElementById("scribo-box").hidden = false;
        document.getElementById("text-input").hidden = false;
        document.getElementById("text-input").value = '';
        document.getElementById("text-input").focus();
        previousLength = 0;
        document.getElementById("wpm-counter").innerHTML = '0 wpm';
        document.getElementById("text-was-typed").innerHTML = '';
        document.getElementById("text-wrong").innerHTML = '';
        document.getElementById("text-next-char").innerHTML = '';
        document.getElementById("text-to-type").innerHTML = currentText;
        document.getElementById("scribo-box").classList.remove('complete');
        //race information to display
        document.getElementById('race-info-source').innerHTML=  textInformation[3];
        document.getElementById('race-info-book').innerHTML=    textInformation[2];
    }
}