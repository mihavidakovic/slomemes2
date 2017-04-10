

// var getJSON = function(url, callback) {
//     var xhr = new XMLHttpRequest();
//     xhr.open('GET', url, true);
//     xhr.responseType = 'json';
//     xhr.onload = function() {
//       var status = xhr.status;
//       if (status == 200) {
//         callback(null, xhr.response);
//       } else {
//         callback(status);
//       }
//     };
//     xhr.send();
// };

// var zbirka = [];

// getJSON('/posti',
// function(err, data) {
//   if (err != null) {
//     alert('Something went wrong: ' + err);
//   } else {
//     zbirka1 = data;
//   }
// });

// $.ajax({
//         url: 'http://anyorigin.com/get?url=http%3A//slomemes.si/posti%3Fcallback%3D%3F&callback=?',
//         type: 'GET',
//         dataType: "json",
//         success: displayAll
//     });

// function displayAll(data){
//     alert(data);
// }

function prikaz(JSONposti) {
	//Elementi
	const naslov = document.getElementsByClassName('naslov')[0];
	const ustvarjeno = document.getElementsByClassName('ustvarjeno')[0];
	const slika = document.getElementsByClassName('slika')[0];
	const like = document.getElementsByClassName('like')[0];
	const downvote = document.getElementsByClassName('dislike')[0];

	zbirka = JSONposti;

	//začetna pozicija v json zbirki, ki je naključna vrednost v našem primeru 0->20
	var indeks = Math.floor(Math.random() * zbirka.length);

	//Začetna pozicija indeksa in prikaz slike (stvar spremembe)
	naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title;
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
			slika.style.backgroundImage = "url(" + zbirka[indeks].url + ")";
			zbirka.splice(indeks, 1);
			zbirkaPregledanih.push(indeks);
		} else {
			indeks = Math.floor(Math.random() * zbirka.length); //random 0->velikost zbirke
			naslov.innerHTML = "";
			ustvarjeno.innerHTML = "";
			naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title;
			ustvarjeno.innerHTML = "Ustvarjeno: " + zbirka[indeks].created_at + " " + zbirka[indeks].id;
			slika.style.backgroundImage = "url(" + zbirka[indeks].url + ")";
			zbirka.splice(indeks, 1);
			zbirkaPregledanih.push(indeks);
		}

	}

	//Event listenerji
	like.addEventListener('click', naprej);
	downvote.addEventListener('click', naprej);

}

$.ajax({
    type:"GET", 
    url: "/posti", 
    success: function(JSONposti) {
            prikaz(JSONposti.posti);
        },
   dataType: "jsonp"
});

