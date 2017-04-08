$(document).ready(function(){
    var id = $('.picture').attr("data-id");
	var link = "http://slomemes.si/meme/" + id;
	var app_id = 239832329821923;
    $('[data-toggle="tooltip"]').tooltip(); 
    $('.comments-header .hide-comments').click(function() {
    	$('.main').addClass('comments-off');
    });
    $('.picture-wrap .title .hide-comments').click(function() {
    	$('.main').removeClass('comments-off');
    });
    $('.sharing .messenger').click(function() {
        window.open('fb-messenger://share?link=' + encodeURIComponent(link) + '&app_id=' + encodeURIComponent(app_id));
    });

    $('.comment .odgovori').click(function() {
        var username = $(this).attr("data-username");
        $('.add-comment .type-comment').text('@' + username + ' ');   
        $('.add-comment .type-comment').focus();   
    });

    $.getJSON('/posti', function(data){
        $.each(data.posti, function (key, data) {
            $('.test-posti').append('<li style="margin-bottom: 20px;"><p>' + data.title + '</p><img src="' + data.url + '"></li>');
        });
    });



});