let currentText = "Blessed are the poor in spirit: for theirs is the kingdom of heaven. Blessed are the meek: for they shall possess the land. Blessed are they that mourn: for they shall be comforted. Blessed are they that hunger and thirst after justice: for they shall have their fill. Blessed are the merciful: for they shall obtain mercy. Blessed are the clean of heart: for they shall see God. Blessed are the peacemakers: for they shall be called children of God. Blessed are they that suffer persecution for justice' sake: for theirs is the kingdom of heaven. Blessed are ye when they shall revile you, and persecute you, and speak all that is evil against you, untruly, for my sake:";

document.getElementById('text-to-read').innerHTML = "Blessed are the poor in spirit: for theirs is the kingdom of heaven. Blessed are the meek: for they shall possess the land. Blessed are they that mourn: for they shall be comforted. Blessed are they that hunger and thirst after justice: for they shall have their fill. Blessed are the merciful: for they shall obtain mercy. Blessed are the clean of heart: for they shall see God. Blessed are the peacemakers: for they shall be called children of God. Blessed are they that suffer persecution for justice' sake: for theirs is the kingdom of heaven. Blessed are ye when they shall revile you, and persecute you, and speak all that is evil against you, untruly, for my sake:";
document.getElementById("text-input").addEventListener("keyup",txtInputChange);
document.getElementById("text-input").addEventListener("keydown",txtInputChange);

function txtInputChange(a){
    console.log('textbox text:')
    console.log(this.value);
    console.log(document.getElementById('text-to-read').innerHTML.match(/^\S+\s*/g).join('') +'\n'+this.value);
    console.log(this.value===document.getElementById('text-to-read').innerHTML.match(/^\S+\s*/g).join(''));
    if (this.value===document.getElementById('text-to-read').innerHTML.match(/^\S+\s*/g).join('')){
        console.log('success');
        document.getElementById('text-was-typed').innerHTML += this.value;
        console.log(document.getElementById('text-to-read').innerHTML);
        document.getElementById('text-to-read').innerHTML = document.getElementById('text-to-read').innerHTML.slice(this.value.length);
        document.getElementById('text-input').value = '';
    }
}