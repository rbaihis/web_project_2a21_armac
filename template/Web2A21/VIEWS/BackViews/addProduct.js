function ajouterProduit() {
    var libelle = ajouterProduitForm.libelle;
    var nb_calories = ajouterProduitForm.nb_calories;
    var prix = ajouterProduitForm.prix;
    var description = ajouterProduitForm.description;
    var categorie = ajouterProduitForm.categorie;
    var img = ajouterProduitForm.img;


  
    var verif = -1;
    if (libelle.value.length == 0) {
      alert("Le nom est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (isNaN(libelle)== false) {   
      alert("le nom doit  comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (nb_calories.value.length == 0) {
      alert("colies est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (testNumber(nb_calories) == false) {   
        alert("colies ne doit pas comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;
    if (prix.value.length == 0) {
        alert("Prix est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
      if (testNumber  (prix) == false) {
        alert("prix ne doit pas comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;
    if (description.value.length == 0) {
        alert("description est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
    if (isNaN(description) == false) {   
        alert("description doit  comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;
      if (categorie.value.length == 0) {
        alert("categorie est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
      if (testNumber(categorie) == false) {   
        alert("Categorie ne doit pas comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;
      if (img.value.length == 0) {
        alert("Image est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
     
    
  
  
    
     
  
  
  
    if (verif == 1) {
      alert("Merci Pour l ajout");
  
      return true;
    }
  }
  function testNumber(cin) {
    var k = 0;
    for (let i = 0; i < cin.value.length; i++) {
      if (cin.value[i] <= 9 || cin.value[i] >= 0) k = 0;
      else return false;
    }
  }
  
