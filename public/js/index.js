function prikaz(JSONposti) {
	//Elementi
	const naslov = document.getElementsByClassName('naslov')[0];
	const ustvarjeno = document.getElementsByClassName('ustvarjeno')[0];
	const slika = document.getElementsByClassName('slika')[0];
	const like = document.getElementsByClassName('like')[0];
	const downvote = document.getElementsByClassName('dislike')[0];
	const ul = document.getElementsByClassName('comments')[0];
	console.log("Začetek kode!");

	var zbirkaPregledanih = [];
	var zbirka = [];
	zbirka = JSONposti;
	
	//začetna pozicija v json zbirki, ki je naključna vrednost v našem primeru 0->20
	var indeks = Math.floor(Math.random() * zbirka.length);

	//Začetna pozicija indeksa in prikaz slike (stvar spremembe)
	naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title; //nastavimo tekst na vrednost polja v json zbirki z trenutnim indeksom
	ustvarjeno.innerHTML = "Ustvarjeno: " + zbirka[indeks].created_at + " " + zbirka[indeks].id;
	slika.style.backgroundImage = "url(" + zbirka[indeks].url + ")";
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

			ul.appendChild(li);
			li.innerHTML = JSONkomentarji[i].content;
		}
	}
	zbirka.splice(indeks, 1);
	zbirkaPregledanih.push(indeks);
	console.log("Dolžina zbirke1: " + zbirka.length);
	console.log("Indeks: " + indeks);	
	console.log("Dolžina pregledanih:" + zbirkaPregledanih.length);	
	//FUNKCIJE
	//funkcija za prestavljanje
	function naprej() {
		if (zbirka.length == 1) {
			pridobiPoste();
			zbirkaPregledanih = [];			
			console.log("Dolžina zbirke2: " + zbirka.length);
			console.log("Indeks: " + indeks);
			console.log("Dolžina pregledanih:" + zbirkaPregledanih.length);			
		} else {
			if(indeks > zbirka.length - 1) { //tukaj omejimo delovanje funkcije na velikost jsona v našem primeru 20
			indeks = Math.floor(Math.random() * zbirka.length); //random 0->velikost zbirke
			naslov.innerHTML = ""; //ponastavimo tekst na prazen string, če ne nam jih sešteva
			ustvarjeno.innerHTML = "";
			naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title; //nastavimo tekst na vrednost polja v json zbirki z trenutnim indeksom
			ustvarjeno.innerHTML = "Ustvarjeno: " + zbirka[indeks].created_at + " " + zbirka[indeks].id;
			slika.style.backgroundImage = "url(" + zbirka[indeks].url + ")";			
			zbirkaPregledanih.push(indeks);
			function komentarji(JSONkomentarji) {
				ul.innerHTML = "";
				for (var i = 0; i < JSONkomentarji.length; i++) {
					var li = document.createElement('li');

					ul.appendChild(li);
					li.innerHTML = JSONkomentarji[i].content;
				}
			}
			$.ajax({
			    type:"GET", 
			    url: "/komentarji/" + zbirka[indeks].id, 
			    success: function(JSONkomentarji) {
			           komentarji(JSONkomentarji.komentarji);
			        },
			   dataType: "jsonp"
			});
			zbirka.splice(indeks, 1);
			console.log("Dolžina zbirke3: " + zbirka.length);
			console.log("Indeks: " + indeks);
			console.log("Dolžina pregledanih:" + zbirkaPregledanih.length);	
		} else {
			indeks = Math.floor(Math.random() * zbirka.length); //random 0->velikost zbirke
			naslov.innerHTML = "";
			ustvarjeno.innerHTML = "";
			naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title;
			ustvarjeno.innerHTML = "Ustvarjeno: " + zbirka[indeks].created_at + " " + zbirka[indeks].id;
			slika.style.backgroundImage = "url(" + zbirka[indeks].url + ")";			
			zbirkaPregledanih.push(indeks);
			function komentarji(JSONkomentarji) {
					ul.innerHTML = "";
				for (var i = 0; i < JSONkomentarji.length; i++) {
					var li = document.createElement('li');

					ul.appendChild(li);
					li.innerHTML = JSONkomentarji[i].content;
				}
			}
			$.ajax({
			    type:"GET", 
			    url: "/komentarji/" + zbirka[indeks].id, 
			    success: function(JSONkomentarji) {
			           komentarji(JSONkomentarji.komentarji);
			        },
			   dataType: "jsonp"
			});
			zbirka.splice(indeks, 1);
			console.log("Dolžina zbirke4: " + zbirka.length);
			console.log("Indeks: " + indeks);
			console.log("Dolžina pregledanih:" + zbirkaPregledanih.length);				

		}
	}

}

	//Event listenerji
	like.addEventListener('click', naprej);
	downvote.addEventListener('click', naprej);

}

function pridobiPoste() {
	$.ajax({
		    type:"GET", 
		    url: "/posti", 
		    success: function(JSONposti) {
		            prikaz(JSONposti.posti);
		        },
		   dataType: "jsonp"
		});
}
