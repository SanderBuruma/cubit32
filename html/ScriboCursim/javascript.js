let currentText;
//Blessed are the poor in spirit: for theirs is the kingdom of heaven. Blessed are the meek: for they shall possess the land. Blessed are they that mourn: for they shall be comforted. Blessed are they that hunger and thirst after justice: for they shall have their fill. Blessed are the merciful: for they shall obtain mercy. Blessed are the clean of heart: for they shall see God. Blessed are the peacemakers: for they shall be called children of God. Blessed are they that suffer persecution for justice' sake: for theirs is the kingdom of heaven. Blessed are ye when they shall revile you, and persecute you, and speak all that is evil against you, untruly, for my sake:";

document.getElementById("text-input").addEventListener("keyup",         txtInputChange);
document.getElementById("text-input").addEventListener("keydown",       txtInputChange);
document.getElementById("main-menu-practice").addEventListener("click", mainMenuPractice);
let startTypingDate = 0;
let previousLength = 0; //a cheat detection variable, if more than 1 char shows up at a time something was copy pasted

function txtInputChange(a){
    console.log('input triggered')
    if (startTypingDate === 0){
        startTypingDate = +new Date();
        console.log(startTypingDate)
    }
    if (this.value.length-previousLength>1){this.value=''; alert('copy pasting not allowed!')} //reset the input if something gets copy pasted into it
    document.getElementById("wpm-counter").innerHTML = Math.round(this.value.length*12/((+new Date() - startTypingDate)/1e3)) + ' wpm';
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
            document.getElementById("play-again").hidden = false;
            startTypingDate = 0;
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

function mainMenuPractice(a){//trigger when >practice< is clicked
    console.log('trigger')
    currentText = document.getElementById("text-to-type").innerHTML;
    document.getElementById("play-again").hidden = true;
    document.getElementById("main-menu").hidden = true;
    document.getElementById("scribo-box").hidden = false;
    document.getElementById("text-input").hidden = false;
    document.getElementById("text-input").value = '';
    document.getElementById("text-input").focus();
    previousLength = 0;
    document.getElementById("text-was-typed").innerHTML = '';
    document.getElementById("text-wrong").innerHTML = '';
    document.getElementById("text-next-char").innerHTML = '';
    document.getElementById("text-to-type").innerHTML = currentText;
    document.getElementById("scribo-box").classList.remove('complete');
}