// //Elementi
const naslov = document.getElementsByClassName('naslov');
const ustvarjeno = document.getElementsByClassName('ustvarjeno');
const slika = document.getElementsByClassName('slika');
const like = document.getElementsByClassName('like')[0];
const downvote = document.getElementsByClassName('dislike')[0];

function drek() {
	console.log("drek");
}

var getJSON = function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status == 200) {
        callback(null, xhr.response);
      } else {
        callback(status);
      }
    };
    xhr.send();
};

var zbirka = [];

getJSON('/posti',
function(err, data) {
  if (err != null) {
    alert('Something went wrong: ' + err);
  } else {
    zbirka1 = data;
  }
});

zbirka = zbirka1;

//začetna pozicija v json zbirki, ki je naključna vrednost v našem primeru 0->20
console.log(zbirka1);

var indeks = Math.floor(Math.random() * zbirka.length);

//Začetna pozicija indeksa in prikaz slike (stvar spremembe)
naslov.innerHTML = naslov.innerHTML + zbirka[1].title;
ustvarjeno.innerHTML = ustvarjeno.innerHTML + zbirka[indeks].created_at;
slika.src = zbirka[indeks].url;


var zbirkaPregledanih = [];
//FUNKCIJE
//funkcija za prestavljanje
function naprej() {
	if(indeks >= zbirka.length - 1 || indeks < 0) { //tukaj omejimo delovanje funkcije na velikost jsona v našem primeru 20
		indeks = Math.floor(Math.random() * zbirka.length); //random 0->velikost zbirke
		naslov.innerHTML = ""; //ponastavimo tekst na prazen string, če ne nam jih sešteva
		ustvarjeno.innerHTML = "";
		naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title; //nastavimo tekst na vrednost polja v json zbirki z trenutnim indeksom
		ustvarjeno.innerHTML = "Ustvarjeno: " + zbirka[indeks].created_at + " " + zbirka[indeks].id;
		slika.src = zbirka[indeks].url;
		zbirka.splice(indeks, 1);
		zbirkaPregledanih.push(indeks);
		console.log(zbirkaPregledanih.length);
	} else {
		indeks = Math.floor(Math.random() * zbirka.length); //random 0->velikost zbirke
		naslov.innerHTML = "";
		ustvarjeno.innerHTML = "";
		naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title;
		ustvarjeno.innerHTML = "Ustvarjeno: " + zbirka[indeks].created_at + " " + zbirka[indeks].id;
		slika.src = zbirka[indeks].url;
		zbirka.splice(indeks, 1);
		zbirkaPregledanih.push(indeks);
		console.log(zbirkaPregledanih.length);
	}

}

//Event listenerji
like.addEventListener('click', naprej);
downvote.addEventListener('click', naprej);