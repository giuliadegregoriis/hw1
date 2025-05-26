const cerca = document.querySelector('.cerca');
const cercaTesto = cerca.querySelector('.categorie');
const lente = cerca.querySelector('.icona');

let attiva = false;
let input = null;
let chiudi = null;

function attivaRicerca() {
  if (attiva) return;

  cercaTesto.classList.add('hidden');
  lente.classList.add('hidden');

  input = document.createElement('input');
  input.type = 'text';
  input.className = 'input-cerca';
  input.placeholder = 'Cerca...';
  cerca.appendChild(input);
 

  chiudi = document.createElement('span');
  chiudi.textContent = '✖';
  chiudi.className = 'chiudi-cerca';
  cerca.appendChild(chiudi);

  attiva = true;
}

function disattivaRicerca() {
  if (!attiva) return;

  cercaTesto.classList.remove('hidden');
  lente.classList.remove('hidden');

  if (input) input.remove();
  if (chiudi) chiudi.remove();

  document.getElementById('infopersonaggi').innerHTML = '';
  attiva = false;
}

function gestisciClick(event) {
  if (event.target === chiudi) {
    disattivaRicerca();
  } else {
    attivaRicerca();
  }
}

cerca.addEventListener('click', gestisciClick);




const immaginiProdotti = document.querySelectorAll('.prodotti_primopiano img.immagineprod');

function cambiaImmagineHover(event) {
  const immagine = event.currentTarget;
  const nuovaSrc = immagine.dataset.hover;
  if (nuovaSrc) {
    immagine.setAttribute('src', nuovaSrc);
  }
}

function ripristinaImmagine(event) {
  const immagine = event.currentTarget;
  const srcOriginale = immagine.dataset.src;
  if (srcOriginale) {
    immagine.setAttribute('src', srcOriginale);
  }
}


for (let i = 0; i < immaginiProdotti.length; i++) {
  const immagine = immaginiProdotti[i];
  const src = immagine.getAttribute('src');

  
  if (src.includes('1.png')) {
    const hoverSrc = src.replace('1.png', '2.png');
    immagine.dataset.src = src;
    immagine.dataset.hover = hoverSrc;

    immagine.addEventListener('mouseenter', cambiaImmagineHover);
    immagine.addEventListener('mouseleave', ripristinaImmagine);
  }
}


function generaNumeroCasuale() {
  return Math.floor(Math.random() * 308) + 1;
}

function personaggioDisney(event)
{
  event.preventDefault();
  const numerocasuale=generaNumeroCasuale();
  fetch("personaggiodisney.php?q="+numerocasuale)
  .then(onSucc,onErr)
  .then(onJsonDisney);


}

function onErr(err){
  console.log('errore'+err);
}

function onSucc(res){
  return res.json();
}

function onJsonDisney(json)
{
  console.log(json.data);
   const nome=json.data.name;
   const img=document.createElement('img');
   img.src=json.data.imageUrl;
   img.classList.add('img');

   const info=document.querySelector('#info');
   info.innerHTML='';

   const datipers=document.createElement('div');

   const nomepers=document.createElement('div');
   nomepers.classList.add('nomepers');
   nomepers.append(nome);

   const imgpers= document.createElement('div');
   imgpers.appendChild(img);

   datipers.appendChild(nomepers);
    

  info.appendChild(datipers);
  info.appendChild(imgpers);

}

document.querySelector('#generazione').addEventListener('submit',personaggioDisney);

function ottieniAnnoCorrente() {

  const oggi = new Date();
  return oggi.getFullYear();
}


function dateChiusura()
{
  const annocorrente= ottieniAnnoCorrente();
  fetch("date.php?q="+annocorrente)
  .then(onSucc,onErr)
  .then(onJsonCalendar);

}

function onJsonCalendar(json)
{
  console.log(json);
   let max =json.length;

   const infodate=document.querySelector('#infodate');

  if(max>10) max=json.length;

  for(let i=0; i<max; i++)
  {
   const festa=json[i].localName;
   const data=json[i].date;
   const festivita=document.createElement('div');
   festivita.classList.add('festivita');
   festivita.append(festa);

   const datafesta=document.createElement('div');
   datafesta.classList.add('datafesta');
   datafesta.append(data);

   const datifeste=document.createElement('div');
   datifeste.classList.add('datifeste');
   datifeste.appendChild(festivita);
   datifeste.appendChild(datafesta);
  
   infodate.appendChild(datifeste);
}

}

dateChiusura();

function lettura(event){
    event.preventDefault();
    const input=document.querySelector('.input-cerca');
    console.log(input.value);
    if(input.value)
    {
        fetch("cercapersonaggio.php?q="+encodeURIComponent(input.value))
        .then(onSucc,onErr)
        .then(JsonLettura);
    }
}

function JsonLettura(json){
    const listapers=document.querySelector('#infopersonaggi');
    listapers.innerHTML='';

      if (json.length === 0) {
       listapers.innerHTML = '<div class="errore">Nessun risultato trovato.</div>';
        return;
    }
    console.log(json);
    const nome=json.data.name;
   const img=document.createElement('img');
   const allies=json.data.allies;
   const enemies=json.data.enemies;
   const films=json.data.films;
   const tvshows=json.data.tvShows;
   const videogames=json.data.videoGames;
   
   img.src=json.data.imageUrl;
   img.classList.add('img');

   const infopersonaggi=document.querySelector('#infopersonaggi');
   infopersonaggi.innerHTML='';

   const datipers=document.createElement('div');
  
  const nomepers=document.createElement('div');
   nomepers.classList.add('nomepers');
   nomepers.append(nome);

    const imgpers= document.createElement('div');
    imgpers.appendChild(img);

    const alleati=document.createElement('div');
    alleati.classList.add('nomepers');
    alleati.append("Alleati: ", allies);

    const nemici=document.createElement('div');
    nemici.classList.add('nomepers');
    nemici.append("Nemici: ", enemies);

    const pellicola=document.createElement('div');
    pellicola.classList.add('nomepers');
    pellicola.append("Films: ", films);

    const series=document.createElement('div');
    series.classList.add('nomepers');
    series.append("Serie Tv: ", tvshows);


    const videogiochi=document.createElement('div');
    videogiochi.classList.add('nomepers');
    videogiochi.append("Videogiochi: ", videogames);


  
   datipers.appendChild(alleati);
   datipers.appendChild(nemici);
   datipers.appendChild(pellicola);
   datipers.appendChild(series);
   datipers.appendChild(videogiochi);

  infopersonaggi.appendChild(nomepers);
  infopersonaggi.appendChild(imgpers);
  infopersonaggi.appendChild(datipers);
  }

document.querySelector('form').addEventListener('submit',lettura);

function salvanelcarrello(event)
{
    event.stopPropagation();
  const prodotto = event.currentTarget.closest('.acquistorapido');
  const formData = new FormData();
  formData.append('image',prodotto.dataset.image);
  formData.append('name',prodotto.dataset.name);
  formData.append('price',prodotto.dataset.price);
  fetch("aggiungicarrello.php",{method:'post',body:formData})
  .then(onSucc,onErr)
}

function carelloclick() {
    const product = document.querySelectorAll('.acquistorapido');
    for(let pulsante of product) {

        pulsante.removeEventListener('click', salvanelcarrello);

        pulsante.addEventListener('click', salvanelcarrello);
    }
}

carelloclick();