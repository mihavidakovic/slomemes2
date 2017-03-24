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
                  <img src="http://lorempixel.com/400/400/">
                  <h3>{{$user->name}}</h3>
                </div>
                <ul class="meni">
                  <li class="active">
                    <a href="#">Moji memeji</a>
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
                <li>
                  <a href="#">
                    <div class="preview" style="background: url(http://lorempixel.com/200/201/);">
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="preview" style="background: url(http://lorempixel.com/200/202/);">
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="preview" style="background: url(http://lorempixel.com/200/203/);">
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="preview" style="background: url(http://lorempixel.com/200/204/);">
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="preview" style="background: url(http://lorempixel.com/200/205/);">
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="preview" style="background: url(http://lorempixel.com/200/206/);">
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="preview" style="background: url(http://lorempixel.com/200/207/);">
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="inside box">
          <header>
            <p>Stranska vrstica</p>
          </header>
          <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

        </div>      
      </div>
    </div>
</div>
@endsection
