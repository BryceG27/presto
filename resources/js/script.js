let testo = "L'annuncio è a portata di click!", output = "";

let i = 0, speed = 150;

let prova = setInterval(scrivi, speed);

function scrivi() {

    let myVariable= document.getElementById("testo");
    
    if (i == testo.length) 
        clearInterval(prova);

    output += testo.charAt(i);
    
    if (myVariable) {
        myVariable.innerHTML = output;
    }
    
    i++;
}

scrivi();
