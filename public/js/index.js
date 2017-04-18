moment.locale('sl');
function prikaz(JSONposti) {
	//Elementi
	const naslov = document.getElementsByClassName('naslov')[0];
	const ustvarjeno = document.getElementsByClassName('ustvarjeno')[0];
	const slika = document.getElementsByClassName('slika')[0];
	const like = document.getElementsByClassName('like')[0];
	const downvote = document.getElementsByClassName('dislike')[0];
	const ul = document.getElementsByClassName('comments')[0];	

	zbirka = JSONposti;
	prikazPostov();

	//bolje še enkrat nafilati zbirko naknadno, kot pa od začetka
	function nafilajZbirko() {
			zbirkaPregledanih = [];
 			zbirka = [];
			$.ajax({
		    type:"GET", 
		    url: "/posti", 
		    success: function(JSONposti) {		    		
		            prikaz1(JSONposti.posti);
		        },
		   dataType: "jsonp"
		});
	}
	//vezano na zgornji komentar
	function prikaz1(JSONposti) {
		zbirka = JSONposti;		
		prikazPostov();
	}

	//osnovna funkcija prikaza postov
	function prikazPostov() {
		var indeks = Math.floor(Math.random() * zbirka.length); //indeks se bo določal le v velikosti tabele zbirka, kar je odličen način omejevanja
		naslov.innerHTML = ""; //ponastavimo tekst saj se v nasprotnem primeru le seštevajo od prej stringi
		ustvarjeno.innerHTML = ""; //ponastavimo tekst saj se v nasprotnem primeru le seštevajo od prej stringi
		naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title; //nastavimo tekst na vrednost polja v json zbirki z trenutnim indeksom
		ustvarjeno.innerHTML = moment(zbirka[indeks].created_at).add('2', 'hours').fromNow();
		slika.style.backgroundImage = "url(" + zbirka[indeks].url + ")"; //nastavimo sliko
		/*V tem kosu kode pridobimo komentarje za vsak post*/
		$.ajax({
		    type:"GET", 
		    url: "/komentarji/" + zbirka[indeks].id, 
		    success: function(JSONkomentarji) {
		           komentarji(JSONkomentarji.komentarji);
		        },
		   dataType: "jsonp"
		});	
		function komentarji(JSONkomentarji) {
			ul.innerHTML = "";
			for (var i = 0; i < JSONkomentarji.length; i++) {
				var li = document.createElement('li');
				li.className= "comment";

				ul.appendChild(li);
				li.innerHTML = "<div class='top'> <p><a href='#'>username</a> <small>datum</small></p> </div> <div class='content'> <p>" + JSONkomentarji[i].content + "</p></div>";
			}
		}
		zbirka.splice(indeks, 1); //iz zbirke odstranimo ogledan post
	}

	//Funkcija naprej se sproži ko likamo ali dislikamo post
	function naprej() {
		if (zbirka.length == 0) { //ko pregledamo zbirko
			nafilajZbirko();
		} else {
				prikazPostov();
			}
		}



	//Event listenerji
	like.addEventListener('click', naprej);
	downvote.addEventListener('click', naprej);

}

//Začetek kode, kjer pridobimo z linka vse poste v json obliki
function pridobiPoste() {
	zbirkaPregledanih = [];
 	zbirka = [];
	$.ajax({
		    type:"GET", 
		    url: "/posti", 
		    success: function(JSONposti) {		    		
		            prikaz(JSONposti.posti);

		        },
		   dataType: "jsonp"
		});
}