
//   var memeSize = 700;

//   var canvas = document.getElementById('memecanvas');
//   ctx = canvas.getContext('2d');


//   // Set the text style to that to which we are accustomed



//   canvas.width = memeSize;
//   canvas.height = memeSize;

//   //  Grab the nodes
//   var img = document.getElementById('start-image');
//   var topText = document.getElementById('top-text');
//   var bottomText = document.getElementById('bottom-text');
//   var submitMeme = document.getElementById('submit');

//   var title = $('.meme-generator-title');

//   $('.meme-initial').on('click', function() {
//   	var id = $(this).data('id'); // dobimo id
//   	var src = $(this).data('src'); // dobimo src slike
//   	$('#start-image').attr('src', src); // spremenimo src slike elementa, ki ga bo uporabil canvas
//   	$('.step-1').removeClass('current');
//   	$('.step-2').addClass('current');
//   	$('#top-text').prop('disabled', false);
//   	$('#bottom-text').prop('disabled', false);
//   	$('#submit').prop('disabled', false);
//   	$('#reset').prop('disabled', false);
//   	title.html("Ime mema");
//   });
// 	img.onload = function() {
// 	    drawMeme()
// 	 }  

//   topText.addEventListener('keydown', drawMeme);
//   topText.addEventListener('keyup', drawMeme);
//   topText.addEventListener('change', drawMeme);

//   bottomText.addEventListener('keydown', drawMeme);
//   bottomText.addEventListener('keyup', drawMeme);
//   bottomText.addEventListener('change', drawMeme);

//   submitMeme.addEventListener('click', submit);

//   function drawMeme() {
//     ctx.clearRect(0, 0, canvas.width, canvas.height);

//     ctx.drawImage(img, 0, 0, memeSize, memeSize);

//     ctx.lineWidth  = 6;
//     ctx.font = '40pt sans-serif';
//     ctx.strokeStyle = 'black';
//     ctx.fillStyle = 'white';
//     ctx.textAlign = 'center';
//     ctx.textBaseline = 'top';

//     var text1 = document.getElementById('top-text').value;
//     text1 = text1.toUpperCase();
//     x = memeSize / 2;
//     y = 0;

//     wrapText(ctx, text1, x, y, 600, 55, false);

//     ctx.textBaseline = 'bottom';
//     var text2 = document.getElementById('bottom-text').value;
//     text2 = text2.toUpperCase();
//     y = memeSize;

//     wrapText(ctx, text2, x, y, 600, 55, true);

//   }

//   function wrapText(context, text, x, y, maxWidth, lineHeight, fromBottom) {

//     var pushMethod = (fromBottom)?'unshift':'push';
    
//     lineHeight = (fromBottom)?-lineHeight:lineHeight;

//     var lines = [];
//     var y = y;
//     var line = '';
//     var words = text.split(' ');

//     for (var n = 0; n < words.length; n++) {
//       var testLine = line + ' ' + words[n];
//       var metrics = context.measureText(testLine);
//       var testWidth = metrics.width;

//       if (testWidth > maxWidth) {
//         lines[pushMethod](line);
//         line = words[n] + ' ';
//       } else {
//         line = testLine;
//       }
//     }
//     lines[pushMethod](line);

//     for (var k in lines) {
//       context.strokeText(lines[k], x, y + lineHeight * k);
//       context.fillText(lines[k], x, y + lineHeight * k);
//     }


//   }

// 	function dataURItoBlob(dataURI) {
//     var binary = atob(dataURI.split(',')[1]);
//     var array = [];
//     for(var i = 0; i < binary.length; i++) {
//         array.push(binary.charCodeAt(i));
//     }
//     return new Blob([new Uint8Array(array)], {type: 'image/jpeg'});
// }

//   $('.ustvari-form').submit(function(e) {
//   	e.preventDefault();
// 	var formData = $(this).serialize();
//     var blob = dataURItoBlob(canvas.toDataURL('image/jpg'));
//     var memeData = [formData, blob];
// 	var token = $('.text input[name="_token"]');
// 	console.log(blob);
// 	$.ajax({
// 	    type:"POST", 
// 	    url: "", 
// 	   	"_token": token,
// 	   	dataType: "json",
// 	   	data: memeData,
// 	    success: function(data) {		    		
// 	            prikaz1(data);
// 	    },
// 	});  });

// // //elementi kanvasa
// // var canvas = document.getElementById('meme');
// // const shrani = document.getElementById('shrani');
// // const dodajSliko = document.getElementById('dodaj');
// // const reset = document.getElementById('reset');

// // //lastnosti kanvasa
// // var ctx = canvas.getContext("2d");
// // canvas.width=500;//horizontal resolution (?) - increase for better looking text
// // canvas.height=500;//vertical resolution (?) - increase for better looking text
// // canvas.style.width=500;//actual width of canvas
// // canvas.style.height=500;//actual height of canvas

// // //FUNKCIJE KANVASA
// // //Preview funkcija
// // function memePreview() {	
// // 	tekst = document.getElementById('tekst').value;
// // 	if (tekst == null) {
// // 		console.log(tekst);
// // 	} else {
// // 		ctx.lineWidth  = 4;
// // 		ctx.font = '20pt sans-serif';
// // 		ctx.strokeStyle = 'black';
// // 		ctx.fillStyle = 'white';
// // 		ctx.textAlign = 'center';
// // 		ctx.textBaseline = 'top';
// // 	}
// // }

// // //funkcija, ki doda vnešeni url v kanvas
// // function dodajUrl() {
// // 	var urlSlike = document.getElementById('url').value;
// // 	canvas.style.backgroundImage = "url('"+ urlSlike + "')";
// // 	//potreben element za kasnejšo manipulacijo
// // 	img = new Image();
// // 	img.src = urlSlike;
// // 	ctx.drawImage(img, 0, 0, 500, 500);
// // }

// // //funkcija, ki pretvori canvas v url
// // function shraniMeme() {
// // 	var dataURL = canvas.toDataURL("image/jpeg");	
// // 	console.log(dataURL);
// // }

// // function ponastaviMeme() {
// // 	ctx.clearRect(0, 0, 500, 500);
// // 	document.getElementById('tekst').value = "";
// // }

// // //eventlistenerji
// // shrani.addEventListener('click', shraniMeme);
// // dodajSliko.addEventListener('click', dodajUrl);
// // reset.addEventListener('click', ponastaviMeme);

// // // var e = {}, // A container for DOM elements
// // //     reader = new FileReader(),
// // //     image = new Image(),
// // //     ctxt = null, // For canvas' 2d context
// // //     renderMeme = null, // For a function to render memes
// // //     get = function (id) {
// // //         // Short for document.getElementById()
// // //         return document.getElementById(id);
// // //     };
// // // // Get elements (by id):
// // // e.box1 = get("box1");
// // // e.ifile = get("ifile");
// // // e.box2 = get("box2");
// // // e.topline = get("topline");
// // // e.bottomline = get("bottomline");
// // // e.c = get("c"); // canvas;
// // // e.downloadLink = get("downloadLink");
// // // // Get canvas context:
// // // ctxt = e.c.getContext("2d");

// // // renderMeme = function () {
// // //     var writeText = function (text, x, y) {
// // //         var f = 36; // Font size (in pt)
// // //         for (; f >= 0; f -=1) {
// // //             ctxt.font = "bold " + f + "pt Impact, Charcoal, sans-serif";
// // //             if (ctxt.measureText(text).width < e.c.width - 10) {
// // //                 ctxt.fillText(text, x, y);
// // //                 ctxt.strokeText(text, x, y);
// // //                 break;
// // //             }
// // //         }
// // //     };
// // //     e.c.width = image.width;
// // //     e.c.height = image.height;
// // //     ctxt.drawImage(image, 0, 0, e.c.width, e.c.height);
// // //     ctxt.textAlign = "center";
// // //     ctxt.fillStyle = "white";
// // //     ctxt.strokeStyle = "black";
// // //     ctxt.lineWidth = 2;
// // //     writeText(e.topline.value, e.c.width / 2, 50);
// // //     writeText(e.bottomline.value, e.c.width / 2, e.c.height - 20);
// // //     e.downloadLink.href = e.c.toDataURL("image/jpeg");
// // // };

// // // e.ifile.onchange = function () {
// // //     reader.readAsDataURL(e.ifile.files[0]);
// // //     reader.onload = function () {
// // //         image.src = reader.result;
// // //         image.onload = function () {
// // //             renderMeme();
// // //             e.box1.style.display = "none";
// // //             e.box2.style.display = "";
// // //         };
// // //     };
// // // };
// // // e.topline.onkeyup = renderMeme;
// // // e.bottomline.onkeyup = renderMeme;