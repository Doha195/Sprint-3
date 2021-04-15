// Votre script JS
var x=0 
var i=1
function compteur(x) 
{ 
x = x+i;
i = i+1;
document.getElementById('value').innerHTML = x;
document.getElementById('value').style.color = "green"; 
} 

function compteurdesc(x)
{ 
x = x-i;
i = i+1;
document.getElementById('value').innerHTML = x; 
document.getElementById('value').style.color = "red"; 
}

function compteur0(x)
{ 
x = 0;
document.getElementById('value').innerHTML = x; 
document.getElementById('value').style.color = "black"; 
}