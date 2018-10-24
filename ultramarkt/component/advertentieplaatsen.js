let selectCategorie = document.getElementById('select-categorie');
let selectSubCategorie = document.getElementById('select-sub-categorie');

for (i of selectSubCategorie){ 
  if (i.dataset.catid > 0){
    i.disabled = true;
    i.hidden = true;
  }
}

selectCategorie.onchange = function(){
  let categorieIndex = this[this.selectedIndex].value;
  for (i in selectSubCategorie){//compare current categorieID to the subcategorie-categorieID and display or hide accordingly
    let firstIndex;
    if (selectSubCategorie[i].dataset.catid == categorieIndex){
      selectSubCategorie[i].disabled = false;
      selectSubCategorie[i].hidden = false;
      selectSubCategorie.selectedIndex = i;
    }else{
      selectSubCategorie[i].disabled = true;
      selectSubCategorie[i].hidden = true;
    }
  }
  selectSubCategorie.selectedIndex = 0;
}

var uploadField = document.getElementById("file1-image");

uploadField.onchange = function() {
  if(this.files[0].size > 207152){
    alert("File is too big! Max size 200kB");
    this.value = "";
  };
};