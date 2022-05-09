let name = document.getElementById('nameI').innerText;
let prix = document.getElementById('prixI').innerText;
let submit =  document.getElementById('submitI');
function controle(){
    console.log(name, prix);
}
submit.addEventListener('click', controle);