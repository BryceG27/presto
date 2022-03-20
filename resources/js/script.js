const prova = document.querySelector('#homeHeader');
const prova2 = document.createElement('span');

console.log(prova.innerHTML);

prova.innerHTML = 'Caccapupu';
prova2.innerHTML = 'Bambini morti';

prova2.classList.add('bg-white');
prova2.classList.add('text-primary');

prova.append(prova2);