<div class="col-lg-8 col-md-8 col-sm-8 picture-wrap">
    <div class="title">
      <div class="votes">
        @if($post)
          <span><i class="ion-thumbsup"></i> {{$skupni_glasovi}}</span>
        @else
          <span><i class="ion-thumbsup"></i> 0</span>
        @endif
      </div>
      @if($post)
        <h2 title="{{$post->title}}">{{$post->title}}</h2>
      @else
        <h2><span></span></h2>
      @endif
      <div class="admin-functions">
        <div class="edit-button">
          <i class="ion ion-edit"></i>
        </div>
        <div class="delete-button">
          <i class="ion ion-ios-trash"></i>
        </div>
      </div>
      <div class="hide-comments" data-toggle="tooltip" data-placement="left"  title="Skrij komentarje"><i class="ion ion-eye-disabled"></i></div>
    </div>
    <div class="picture">
      @if($post)
        <a href="{{ route('post-downvote', $post->id) }}">
          <div class="control dislike">
              <i class="ion ion-thumbsdown"></i>
          </div>
        </a>
      @else
        <a href="#">
          <div class="control dislike">
              <i class="ion ion-thumbsdown"></i>
          </div>
        </a>
      @endif
        @if($post)
        <div class="show-picture" style="background-image: url({{$post->url}});">
            <div class="share-bar">
                <ul>
                  <li class="facebook">
                    <a href="#">
                      <div class="inside">
                        <i class="ion ion-social-facebook"></i>
                        <p>Deli na Facebook-u</p>
                      </div>
                    </a>
                  </li>
                  <li class="messenger">
                    <a href="#">
                      <div class="inside">
                        <img src="{{asset('img/messenger.svg')}}">
                        <p>Pošlji kot sporočilo</p>
                      </div>
                    </a>
                  </li>
                </ul>
            </div>  
        </div>
        @else
          <div class="empty">
            <h3>:(</h3>
            <h4>Trenutno ni na voljo noben meme</h4>
          </div>
        @endif
      @if($post)
        <a href="{{ route('post-upvote', $post->id) }}">
          <div class="control like">
              <i class="ion ion-thumbsup"></i>
          </div>
        </a>
      @else
        <a href="#">
          <div class="control like">
              <i class="ion ion-thumbsup"></i>
          </div>
        </a>
      @endif
    </div>
    <div style="clear: both;"></div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 comments-wrap">
  @include('partials.comments')
</div>
