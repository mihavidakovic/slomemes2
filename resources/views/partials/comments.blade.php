<div class="comments-header">
  <h3>Komentarji ({{$comments->count()}})</h3>
  <div class="hide-comments" data-toggle="tooltip" data-placement="left"  title="Skrij komentarje"><i class="ion ion-eye"></i></div>
</div>
<ul class="comments">
  @foreach($comments as $comment)
     <li class="comment">
         <div class="top">
             <p><a href="#">{{$comment->user->name}}</a> <small>{{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small></p>
         </div>
         <div class="content">
             <p>{{$comment->content}}</p>
         </div>
     </li>
    @endforeach
 </ul>
 <div class="add-comment">
   <form method="POST" action="{{route('add-comment', $post->id)}}">
     <textarea name="content" placeholder="Napiši komentar"></textarea>
     <button type="submit" class="btn btn-default"><i class="ion ion-android-send"></i></button>
     {{ csrf_field() }}
   </form>
 </div> 