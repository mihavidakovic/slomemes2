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
    $('.sharing .messenger').click(function() {
    	window.open('fb-messenger://share?link=' + encodeURIComponent(link) + '&app_id=' + encodeURIComponent(app_id));
    });

    $('.commentForm').on('submit', function(e) {
        e.preventDefault();
        var forma = $(this);
        var id = $(this).parent().data('id');
        var content = $('.commentForm .type-comment').val();
        var comments = $(this).parent().parent().find('.comments');
        if (comments.find('.no-comments').length) {
            comments.find('.no-comments').remove();
        }
        $.ajax({
            type:"POST", 
            data: forma.serialize(),
            dataType: "json",
            url: "/comment/" + id  + "/add",
            "_token": "{{ csrf_token() }}",
            beforeSend: function(data){
                comments.append("<li class='comment new'><div class='top'> <p><a href='#'><span></span></a> <small><span></span></small></p> </div> <div class='content'> <p>" + content + "</p></div></li>");
                comments.scrollTop(($('.comments .comment.new').position().top)-(comments.position().top)+(100)); 
            },
            complete: function(data){
            },
            success: function(data) {
                forma.find('.type-comment').val('');
                comments.find('.new').remove();            
                comments.append("<li class='comment'><div class='top'> <p><a href='/uporabnik/" + data.user.name + "'>" + data.user.name + "</a> <small>" + moment(data.comment.created_at).add('2', 'hours').fromNow() + "</small></p> </div> <div class='content'> <p>" + data.comment.content + "</p></div></li>");
            },
            error: function() {
                setTimeout(function() {
                    comments.find('.new').remove(); 
                }, 1000);                           
            }
        });
    });

});