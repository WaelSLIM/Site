var formulaire;
var nbErrors = 0;
var nbChamps = 0;
var name;
window.onload = function(){
    formulaire = document.forms[0]; // On récupère le formulaire
    // On compte le nombre de champs qu'il y a en input[type=text],input[type=password],textarea
    nbChamps = formulaire.querySelectorAll('input[type=text],input[type=password],textarea').length;
    formulaire.onsubmit = function(){
        return verifier();
    };
};
function verifier () {
    nbErrors = 0 ;
    for (var i=0;i<nbChamps;i++)
    {
        name = formulaire.elements[i].getAttribute('name');
        // Si un champs du formulaire est vide on montre le span associé
        if (formulaire[i].value == ""){
            formulaire.elements[name].parentNode.getElementsByTagName('span')[i].style.display = 'block';
            nbErrors++;
        }
        else // sinon on cache le span
        {
            formulaire.elements[name].parentNode.getElementsByTagName('span')[i].style.display = 'none';
        }
    }
    return (nbErrors > 0) ? false : true;
};



