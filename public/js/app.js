$(document).ready(function(){
	var link = "https://developers.facebook.com/docs/sharing/messenger";
	var app_id = 239832329821923;
    $('[data-toggle="tooltip"]').tooltip(); 
    $('.comments-header .hide-comments').click(function() {
    	$('.main').addClass('comments-off');
    });
    $('.picture-wrap .title .hide-comments').click(function() {
    	$('.main').removeClass('comments-off');
    });
    $('.share-bar .messenger').click(function() {
    	window.open('fb-messenger://share?link=' + encodeURIComponent(link) + '&app_id=' + encodeURIComponent(app_id));
    });

    $.getJSON('/posti', function(data){
        $.each(data.posti, function (key, data) {
            $('.test-posti').append('<li style="margin-bottom: 20px;"><p>' + data.title + '</p><img src="' + data.url + '"></li>');
        });
    });

});