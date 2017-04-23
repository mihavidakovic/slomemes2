@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row subpage profil">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="margin-bottom: 20px; float: left;">
        <div class="inside box">
          <div class="content">
            <div class="top">
              <div class="header">
                <div class="center">
                  <img src="{{Storage::disk('s3')->url($user->avatar)}}">
                  <h3>{{$user->name}} @if($user->verified === 1)<i class="ion ion-checkmark-circled" data-toggle="tooltip" data-placement="right"  title="Potrjen"></i>@endif</h3>
                  <p class="status">{{$user->rank}}</p>
                </div>
                <ul class="meni">
                  <li class="active">
                    <a href="#">Moji memeji <span>({{$posti->count()}})</span></a>
                  </li>
                  <li>
                    <a href="#">Všeč mi je</a>
                  </li>
                  <li>
                    <a href="#">Ni mi všeč</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="profil-content">
              <ul class="posts-grid">
                @foreach($posti as $post)
                  <li>
                    <a href="{{route('meme', $post->id)}}">
                      <div class="preview" style="background: url({{$post->url}});">
                        <div class="title">
                          <p>{{$post->title}}</p>
                        </div>
                      </div>
                    </a>
                  </li>
                @endforeach
              </ul>
              {{ $posti->links() }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 sidebar">
        <div class="inside box">
          <header>
            <p>Nagrade</p>
          </header>
          <div class="content">
            <ul class="profil-nagrade">
              <li>
                  <div class="share">
                    <p>Deli s prijatelji</p>
                    <ul class="moznosti">
                      <li class="fb">
                        <a href="#">
                            <i class="ion ion-social-facebook"></i>
                        </a>
                      </li>
                      <li class="messenger">
                        <a href="#">
                            <img src="{{asset('img/messenger.png')}}">
                        </a>
                      </li>
                    </ul>
                  </div>
                <img src="http://lorempixel.com/300/320/">
                <p>9GAG podpornik</p>
                <small>{{Jenssegers\Date\Date::parse($user->created_at)->diffForHumans()}}</small>
              </li>
              @foreach($user->unlockedAchievements()->sortBy('unlocked_at') as $nagrada)
                <li>
                  <div class="share">
                    <p>Deli s prijatelji</p>
                    <ul class="moznosti">
                      <li class="fb">
                        <a href="#">
                            <i class="ion ion-social-facebook"></i>
                        </a>
                      </li>
                      <li class="messenger">
                        <a href="#">
                            <img src="{{asset('img/messenger.png')}}">
                        </a>
                      </li>
                    </ul>
                  </div>
                  <img src="http://lorempixel.com/320/300/">
                  <p>{{$nagrada->details->name}}</p>
                  <small>{{Jenssegers\Date\Date::parse($nagrada->unlocked_at)->diffForHumans()}}</small>
                </li>
              @endforeach
            </ul>
          </div>

        </div>      
      </div>
    </div>
</div>
@endsection
