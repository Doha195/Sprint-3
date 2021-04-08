// Votre script JS
var x=0 
var i=1
function compteur(x) 
{ 
x = x+i;
i = i+1;
document.getElementById('value').innerHTML = x; 
} 

function compteurdesc(x)
{ 
x = x-i;
i = i+1;
document.getElementById('value').innerHTML = x; 
}

function compteur0(x)
{ 
x = 0;
document.getElementById('value').innerHTML = x; 
}