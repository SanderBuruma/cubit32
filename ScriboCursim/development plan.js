// Dit is niet een functioneel document dat als normale code gebruikt dient te worden. Het is een soort van blueprint voor het plannen van dit project.
let epicPlan = new Array("Text box met input.",
"Verwerking vd input dat uitwerkt in het kleuren van de tekst, goed getypte tekst is groen en fout rood.")
epicPlan.push('Zelfde als 1 maar txt is vervangen door sql.')
epicPlan.push('Zelfde navbar op elke pagina.')
epicPlan.push('Vertoont auteur en boek na correct typen tekst.')
epicPlan.push('Inlog & registratie database + functionaliteit.')
epicPlan.push('Opslag wpm races en deze weergeven op request.')
epicPlan.push('Aggregatie en vergeleiking race informatie.')
let toDoIndex = 2;
for (let i in epicPlan){
    if (i<toDoIndex){console.log(`*${i} ${epicPlan[i]}`);continue};
    console.log(`${i} ${epicPlan[i]}`);
};
console.log('* = compleet')