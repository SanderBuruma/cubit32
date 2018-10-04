let lijstInformatie, lijstLengte, kamerInformatie;
let paginaLoaded = false;

window.setTimeout(haalKamerInformatie,0);

function haalKamerInformatie(a){
    console.log('haal kamer lijst informatie')
    xmlhttp.open("GET","callroomlistinfo.php");
    xmlhttp.send();
}

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
    if (this.readyState == 4 && this.status == 200) {//kamer informatie laden
        if (!paginaLoaded){ //de eerste instantie wanneer de lijst nog gemaakt moet worden
            lijstInformatie = this.responseText.split("%SPLIT%")
            lijstInformatie.pop(); lijstInformatie.shift();
            lijstLengte = Math.floor(lijstInformatie.length/7+1)
            console.log(lijstInformatie)
            console.log(lijstLengte)
            for (let i = 0; i < lijstLengte; i++){
                console.log(lijstInformatie[0+i*7])
                //kamer div
                let kamerdiv = document.createElement('div');
                kamerdiv.id = 'kamer'+lijstInformatie[0+i*7];
                kamerdiv.classList.add('kamerdiv');
                kamerdiv.onclick = function(clickie){
                    console.log (clickie)
                    xmlhttp.open("GET","callroominfo.php?"+"kamerId="+lijstInformatie[0+i*7]);
                    xmlhttp.send();
                }
                document.getElementById('maindiv').appendChild(kamerdiv)
                //kamer info
                let informatie = document.createElement('div');
                informatie.innerHTML = '<p>Address: '+lijstInformatie[2+i*7]+'<br> Monthly Rent: € '+lijstInformatie[3+i*7]+'<br> Surface: '+lijstInformatie[4+i*7]+' m2'+'<br>City: '+lijstInformatie[5+i*7]+'</p>';
                informatie.classList.add('kamerlijstinfotekst')
                kamerdiv.appendChild(informatie);
                paginaLoaded = true;
                //kamer img
                let thumbnail = document.createElement('img');
                thumbnail.src='thumbnails/'+lijstInformatie[1+i*7];
                thumbnail.height="128";
                thumbnail.width="128";
                thumbnail.classList.add('thumbnail');
                informatie.appendChild(thumbnail);
            }
        } else {//wanneer de lijst al gemaakt is en xmlhttp veranderd betekent dat de specifieke kamerinformatie moet worden vertoont
            kamerInformatie = this.responseText.split('%SPLIT%');
            lijstInformatie.pop(); lijstInformatie.shift();
            console.log(kamerInformatie);
        }
    }
}