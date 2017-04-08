<div class="comments-header">
  @if($comments)
    <h3>Komentarji ({{$comments->count()}})</h3>
  @else
    <h3>Komentarji </h3>
  @endif
  <div class="hide-comments" data-toggle="tooltip" data-placement="left"  title="Skrij komentarje"><i class="ion ion-eye"></i></div>
</div>
<ul class="comments">
  @foreach($comments as $comment)
     <li class="comment">
         <div class="top">
             <p><a href="{{route('profil', $comment->user->name)}}">{{$comment->user->name}}</a> <small class="odgovori" data-username="{{$comment->user->name}}"><a href="#">Odgovori</a></small> <small>{{Jenssegers\Date\Date::parse($comment->created_at)->diffForHumans()}}</small></p>
         </div>
         <div class="content">
             <p>{{$comment->content}}</p>
         </div>
     </li>
    @endforeach
  @if($post)
  @else
    @if(!$comments)
      <p class="no-comments">Trenutno še ni komentarjev. Bodi prvi!</p>
    @endif
  @endif
 </ul>
 <div class="add-comment">
  @if($post)
   <form method="POST" action="{{route('add-comment', $post->id)}}">
    {!! mention()->asTextArea('content', old('content'), 'users', 'name', 'type-comment', 'lol') !!}
     <button type="submit" class="btn btn-default"><i class="ion ion-android-send"></i></button>
     {{ csrf_field() }}
   </form>
  @else
   <form>
     <textarea name="content" placeholder="Napiši komentar" class="type-comment"></textarea>
     <button type="submit" class="btn btn-default"><i class="ion ion-android-send"></i></button>
   </form>
  @endif
 </div> 