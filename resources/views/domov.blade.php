@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="main box col-lg-12">
      @if($post)
        <div class="col-lg-8 col-md-8 col-sm-8 picture-wrap">
            <div class="title">
              <div class="votes">
                <span><i class="ion-thumbsup"></i> {{$skupni_glasovi}}</span>
              </div>
              <h2 title="{{$post->title}}">{{$post->title}}</h2>
              <div class="share">
                <p><a href="#"><i class="ion ion-social-facebook"></i> <span class="text">Deli<span class="hidden-sm hidden-xs"> s prijatelji</span></span></a></p>
              </div>
              <div class="hide-comments" data-toggle="tooltip" data-placement="left"  title="Skrij komentarje"><i class="ion ion-eye-disabled"></i></div>
            </div>
            <div class="picture">
                <a href="{{ route('post-downvote', $post->id) }}">
                  <div class="control dislike">
                      <i class="ion ion-thumbsdown"></i>
                  </div>
                </a>
                <div class="show-picture" style="background-image: url({{$post->url}});">
                    <div class="bottom-bar">
                        <ul>
                            <li class="votes">
                                <span><i class="ion-thumbsup"></i> 512</span>
                            </li>
                            <li class="title">
                                <h2>Naslov tega bednga mema z zelo dolgim naslovom fakkk</h2>
                            </li>
                            <li class="share">
                                <p><a href="#"><i class="ion ion-social-facebook"></i> <span class="hidden-md hidden-sm hidden-xs">Deli s prijatelji</span></a></p>
                            </li>
                        </ul>
                    </div>  
                </div>
                <a href="{{ route('post-upvote', $post->id) }}">
                  <div class="control like">
                      <i class="ion ion-thumbsup"></i>
                  </div>
                </a>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 comments-wrap">
          @include('partials.comments')
        </div>
      @else
        <div class="col-lg-8 col-md-8 col-sm-8 picture-wrap empty">
            <div class="title">
              <div class="votes">
                <span><i class="ion-thumbsup"></i></span>
              </div>
              <h2><span></span></h2>
              <div class="share">
                <p><a href="#"><i class="ion ion-social-facebook"></i> <span class="hidden-md hidden-sm hidden-xs">Deli s prijatelji</span></a></p>
              </div>
            </div>
            <div class="picture">
                <a href="#">
                  <div class="control dislike">
                      <i class="ion ion-thumbsdown"></i>
                  </div>
                </a>
                <div class="show-picture">
                    <div class="empty-error">
                      <p>Žal ni na voljo noben meme več, poizkusi čez nekaj trenutkov! :)</p>
                    </div>
                    <div class="bottom-bar">
                        <ul>
                            <li class="votes">
                                <span><i class="ion-thumbsup"></i> 512</span>
                            </li>
                            <li class="title">
                                <h2>Naslov tega bednga mema z zelo dolgim naslovom fakkk</h2>
                            </li>
                            <li class="share">
                                <p><a href="#"><i class="ion ion-social-facebook"></i> <span class="hidden-md hidden-sm hidden-xs">Deli s prijatelji</span></a></p>
                            </li>
                        </ul>
                    </div>  
                </div>
                <a href="#">
                  <div class="control like">
                      <i class="ion ion-thumbsup"></i>
                  </div>
                </a>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 comments-wrap">
          <div class="comments-header">
            <h3>Komentarji (252)</h3>
            <div class="hide-comments" data-toggle="tooltip" data-placement="left"  title="Skrij komentarje"><i class="ion ion-eye-disabled"></i></div>
          </div>
          <ul class="comments">
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - {{Carbon\Carbon::now()}}</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                   </div>
               </li>
               <li class="comment">
                   <div class="top">
                       <p><b>341 glasov</b> - <a href="#">wrvim3i4</a> - pred 5 minutami</p>
                   </div>
                   <div class="content">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                   </div>
               </li>
           </ul>
        </div>
      @endif
      </div>
    </div>
</div>
@endsection
