moment.locale('sl');
function prikaz(JSONposti) {
	//Elementi
	const glasovi = document.getElementsByClassName('glasovi')[0];
	const naslov = document.getElementsByClassName('naslov')[0];
	const ustvarjeno = document.getElementsByClassName('ustvarjeno')[0];
	const username = document.getElementsByClassName('username')[0];
	const slika = document.getElementsByClassName('slika')[0];
	const like = document.getElementsByClassName('like')[0];
	const downvote = document.getElementsByClassName('dislike')[0];
	const ul = document.getElementsByClassName('comments')[0];	
	const commentForm = document.getElementsByClassName('commentForm')[0];	
	const token = document.getElementsByName('_token');	
	const loading = document.getElementsByClassName('loading')[0];	
	const addComment = document.getElementsByClassName('add-comment')[0];	

	zbirka = JSONposti;
	prikazPostov();

	//bolje še enkrat nafilati zbirko naknadno, kot pa od začetka
	function nafilajZbirko() {
			zbirkaPregledanih = [];
 			zbirka = [];
			$.ajax({
		    type:"GET", 
		    url: "/posti/168/48", 

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

	function gor(indeks) {
		var id = zbirka[indeks].id;
		id = id - 1;
		$.ajax({
		    type:"POST", 
		    url: "meme/" + id + "/upvote", 
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		    success: function(data) {		    		
		            console.log(data);
		        },
		   dataType: "json"
		});

	}

	function dol(indeks) {
		var id = zbirka[indeks].id;
		id = id - 1;
		$.ajax({
		    type:"POST", 
		    url: "meme/" + id + "/downvote", 
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		    success: function(data) {		    		
		            console.log(data);
		        },
		   dataType: "json"
		});

	}


	//osnovna funkcija prikaza postov
	function prikazPostov() {
		indeks = Math.floor(Math.random() * zbirka.length); //indeks se bo določal le v velikosti tabele zbirka, kar je odličen način omejevanja
		naslov.innerHTML = ""; //ponastavimo tekst saj se v nasprotnem primeru le seštevajo od prej stringi
		ustvarjeno.innerHTML = ""; //ponastavimo tekst saj se v nasprotnem primeru le seštevajo od prej stringi
		glasovi.innerHTML = naslov.innerHTML + zbirka[indeks].aggregate; //nastavimo tekst na vrednost polja v json zbirki z trenutnim indeksom
		naslov.innerHTML = naslov.innerHTML + zbirka[indeks].title; //nastavimo tekst na vrednost polja v json zbirki z trenutnim indeksom
		ustvarjeno.innerHTML = moment(zbirka[indeks].created_at).add('2', 'hours').fromNow();
		username.innerHTML = zbirka[indeks].user.name;
		slika.style.backgroundImage = "url(" + zbirka[indeks].url + ")"; //nastavimo sliko
		/*V tem kosu kode pridobimo komentarje za vsak post*/
		commentForm.action = "/comment/" + zbirka[indeks].id + "/add"; // spremeni id meme-a on the fly
		addComment.setAttribute('data-id' , zbirka[indeks].id);  // doda id posta, za dodajanje komentarjev
		console.log(zbirka[indeks].id);

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
			if (JSONkomentarji.length === 0) {
					var p = document.createElement('p');
					p.className= "no-comments";
					ul.appendChild(p);
					p.innerHTML = "Trenutno še ni komentarjev. Bodi prvi!"
			} else {
				for (var i = 0; i < JSONkomentarji.length; i++) {
					var li = document.createElement('li');
					li.className= "comment";

					ul.appendChild(li);
					li.innerHTML = "<div class='top'> <p><a href='/uporabnik/" + JSONkomentarji[i].user.name + "'><user class='uporabnik'>" + JSONkomentarji[i].user.name + "</user></a> <small>" +  moment(JSONkomentarji[i].created_at).add('2', 'hours').fromNow() + "</small></p> </div> <div class='content'> <p>" + JSONkomentarji[i].content + "</p></div>";
				}
			}
		    $('.comments .comment .uporabnik').mouseover(function() {
		        var uporabnik = $(this);
		        uporabnik.append('<div class="uporabnik-info">ddasdas</div>');
		    });
		    $('.comments .comment .uporabnik').mouseleave(function() {
		        var uporabnik = $(this);
		        uporabnik.parent().find('.uporabnik-info').remove();
		    });
		}
		zbirka.splice(indeks, 1); //iz zbirke odstranimo ogledan post
	}

	//Funkcija naprej se sproži ko likamo ali dislikamo post
	function naprej() {
		gor(indeks);
		loading.className += " visible";
		setTimeout(function() {
			$(loading).removeClass('visible');
		}, 500);
		if (zbirka.length == 0) { //ko pregledamo zbirko
			nafilajZbirko();
		} else {
				prikazPostov();
			}
		}

	function naprej1() {
		dol(indeks);
		loading.className += " visible";
		setTimeout(function() {
			$(loading).removeClass('visible');
		}, 500);
		if (zbirka.length == 0) { //ko pregledamo zbirko
			nafilajZbirko();
		} else {
				prikazPostov();
			}
		}





	//Event listenerji
	like.addEventListener('click', naprej);
	downvote.addEventListener('click', naprej1);

}

//Začetek kode, kjer pridobimo z linka vse poste v json obliki
function pridobiPoste() {
	zbirkaPregledanih = [];
 	zbirka = [];
	$.ajax({
		    type:"GET", 
		    url: "/posti/48/0", 
		    success: function(JSONposti) {		    		
		            prikaz(JSONposti.posti);

		        },
		   dataType: "jsonp"
		});
}
