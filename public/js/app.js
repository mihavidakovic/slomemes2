$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    $('.comments-header .hide-comments').click(function() {
    	$('.main').addClass('comments-off');
    });
    $('.picture-wrap .title .hide-comments').click(function() {
    	$('.main').removeClass('comments-off');
    });
});