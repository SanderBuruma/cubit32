let changingTextsArray = [
  "Ik codeer simpele en responsive websites!",
  "Ik speel graag Piano!",
  "Nummers en hun relaties met realiteit vind ik razend interesant!",
  "\"When I was in college I wanted to be involved in things that change the world!\" -Elon Musk",
  "In het kluis Warfhuizen dien ik soms den heilige mis."], 
  changingTextsNum=0;

function changingText() {
  let curNrRemain = changingTextsNum++%changingTextsArray.length;
  document.getElementById("changing-text").innerHTML = changingTextsArray[curNrRemain];
  setTimeout(changingText,changingTextsArray[curNrRemain].length*2.5e2+1e3);
}
setTimeout(changingText,8e3);