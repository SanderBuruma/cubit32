let selectCategorie = document.getElementById('select-categorie');
let selectSubCategorie = document.getElementById('select-sub-categorie');

for (i of selectSubCategorie){ //compare current categorieID to the subcategorie-categorieID and display or hide accordingly
  if (i.dataset.catid > 0){
    i.hidden = true;
  }
}

selectCategorie.onchange = function(){
  let categorieIndex = this[this.selectedIndex].value;
  for (i in selectSubCategorie){ //compare current categorieID to the subcategorie-categorieID and display or hide accordingly
    if (selectSubCategorie[i].dataset.catid == categorieIndex){
      selectSubCategorie[i].hidden = false;
      selectSubCategorie.selectedIndex = i;
    }else{
      selectSubCategorie[i].hidden = true;
    }
  }
  selectSubCategorie.selectedIndex = 0;
}
